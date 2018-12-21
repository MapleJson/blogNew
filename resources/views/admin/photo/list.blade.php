@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block" style="width: 100px">
                        <select name="state">
                            <option value="0">请选择</option>
                            <option value="1">启用</option>
                            <option value="2">停用</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn layuiadmin-btn-forum-list" lay-submit
                            lay-filter="LAY-admin-data-forum-search">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="layui-card-body">
            <div style="padding-bottom: 10px;">
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="batchdel">删除</button>
                <button class="layui-btn layuiadmin-btn-forum-list" id="lay-upload-img-more"><i class="layui-icon layui-icon-upload"></i>上传文件</button>
            </div>
            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                预览图：
                <div class="layui-upload-list" id="lay-upload-more-list"></div>
            </blockquote>

            <table id="LAY-admin-data-list" lay-filter="LAY-admin-data-list"></table>
            <script type="text/html" id="imgTpl">
                <a href="javascript:;" lay-event="showPhotos">
                    <img style="display: inline-block; width: 50%; height: 100%;" src="@{{ d.img }}"/>
                </a>
            </script>
            <script type="text/html" id="stateTpl">
                @{{#  if(d.state == 1){ }}
                <button class="layui-btn layui-btn-xs">启用</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">停用</button>
                @{{#  } }}
            </script>
            <script type="text/html" id="table-admin-data-do">
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i
                            class="layui-icon layui-icon-edit"></i></a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i
                            class="layui-icon layui-icon-delete"></i></a>
            </script>
        </div>
    </div>
@stop

@section('script')
    <script>
        layui.use(['index', 'table', 'form', 'upload'], function () {
            var $ = layui.$
                , table = layui.table
                , admin = layui.admin
                , upload = layui.upload
                , form = layui.form;

            var title = "照片"
                , delUrl = "{{ route('admin.delPhoto') }}"
                , addUrl = "{{ route('admin.addPhoto') }}"
                , editUrl = '/admin/photo/edit/'
                , popArea = ['99%', '99%'];

            function setAddPop() {}

            function setEditPop(filed) {
                $("#lay-admin-data-form #current-edit-photo").attr('src', filed.img);
                $("#lay-admin-data-form input[name=summary]").val(filed.summary);
                $("#lay-admin-data-form :radio[name='state'][value='" + filed.state + "']").prop("checked", "checked");
            }

            function tableOnTool(obj) {
                var data = obj.data;
                if (obj.event === 'showPhotos') {
                    var photos = JSON.parse(window.sessionStorage.getItem('photos'));
                    var images = [], current = 0;
                    layui.each(photos, function (index, photo) {
                        if (data.id === photo.id) {
                            current = index;
                        }
                        images.push({
                            "alt": photo.summary,
                            "pid": photo.id, //图片id
                            "src": photo.img, //原图地址
                            "thumb": "" //缩略图地址
                        });
                    });
                    console.log(current, images)
                    layui.layer.photos({
                        photos: {
                            "title": data.title, //相册标题
                            "id": data.travelId, //相册id
                            "start": current, //初始显示的图片序号，默认0
                            "data": images
                        }
                    });
                }
            }

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
                , url: "{{ route('admin.getPhotos') }}" //模拟接口
                , where: {
                    id: '{{ $id }}'
                }
                , response: {
                    separator: '.'
                    , statusName: 'code' //数据状态的字段名称，默认：code
                    , statusCode: 200 //成功的状态码，默认：0
                    , msgName: 'msg' //状态信息的字段名称，默认：msg
                    , countName: 'count' //数据总数的字段名称，默认：count
                    , dataName: 'data' //数据列表的字段名称，默认：data
                }
                , cols: [[
                    {type: 'checkbox', fixed: 'left'}
                    , {field: 'img', title: '相册封面', align: 'center', width: 100, toolbar: '#imgTpl'}
                    , {field: 'summary', title: '相册简介', align: 'center', minWidth: 100}
                    , {field: 'state', sort: true, title: '状态', align: 'center', width: 80, toolbar: '#stateTpl'}
                    , {field: 'created_at', sort: true, title: '添加时间', align: 'center', width: 180}
                    , {title: '操作', align: 'center', fixed: 'right', width: 100, toolbar: '#table-admin-data-do'}
                ]]
                , page: true
                , limit: 8
                , limits: [8, 30, 50]
                , height: 'full-260'
                , text: {none: '暂无数据！'}
                , done: function(res){
                    window.sessionStorage.setItem('photos', JSON.stringify(res.data));
                }
            });

            //多图片上传
            upload.render({
                elem: '#lay-upload-img-more'
                , url: addUrl
                , data: {travelId: '{{ $id }}'}
                , multiple: true
                , before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#lay-upload-more-list').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
                    });
                }
                , done: function(res){
                    table.reload('LAY-admin-data-list');
                }
            });

            @include('admin.js._js')
        });
    </script>
@stop

@section('pop')
    @include('admin.photo._form')
@stop