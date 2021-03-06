@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">相册名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" placeholder="请输入名称" autocomplete="off" class="layui-input">
                    </div>
                </div>
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
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="add">添加</button>
            </div>

            <table id="LAY-admin-data-list" lay-filter="LAY-admin-data-list"></table>
            <script type="text/html" id="coverTpl">
                <a href="javascript:;" lay-event="showImg">
                    <img style="display: inline-block; width: 50%; height: 100%;" src="@{{ d.coverUrl }}"/>
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
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-text="@{{ d.title }}" lay-href="/admin/photo/@{{ d.id }}.html"><i
                            class="layui-icon layui-icon-picture"></i></a>
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

            var title = "相册"
                , delUrl = "{{ route('admin.delTravel') }}"
                , addUrl = "{{ route('admin.addTravel') }}"
                , editUrl = '/admin/travel/edit/'
                , popArea = ['800px', '350px'];

            function setAddPop() {
                $("#lay-admin-data-form input[name=title]").val('');
                $("#lay-admin-data-form input[name=summary]").val('');
                $("#lay-admin-data-form input[name=cover]").val('');
                $("#lay-admin-data-form input[name=file]").val('');
                $("#lay-admin-data-form :radio[name='state'][value='1']").prop("checked", "checked");
            }

            function setEditPop(filed) {
                $("#lay-admin-data-form input[name=title]").val(filed.title);
                $("#lay-admin-data-form input[name=summary]").val(filed.summary);
                $("#lay-admin-data-form input[name=cover]").val(filed.cover);
                $("#lay-admin-data-form :radio[name='state'][value='" + filed.state + "']").prop("checked", "checked");
            }

            function tableOnTool(obj) {
                var data = obj.data;
                if (obj.event === 'showImg') {
                    //$('#show-cover-img>img').attr('src', obj.coverUrl);
                    layui.layer.photos({
                        photos: {
                            "title": data.title, //相册标题
                            "id": data.id, //相册id
                            "start": 0, //初始显示的图片序号，默认0
                            "data": [   //相册包含的图片，数组格式
                                {
                                    "alt": data.title,
                                    "pid": data.id, //图片id
                                    "src": data.coverUrl, //原图地址
                                    "thumb": "" //缩略图地址
                                }
                            ]
                        } //格式见API文档手册页
                    });
                }
            }

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
                , url: "{{ route('admin.getTravels') }}" //模拟接口
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
                    , {field: 'title', title: '相册名称', align: 'center', minWidth: 100}
                    , {field: 'cover', title: '相册封面', align: 'center', width: 100, toolbar: '#coverTpl'}
                    , {field: 'summary', title: '相册简介', align: 'center', minWidth: 100}
                    , {field: 'state', sort: true, title: '状态', align: 'center', width: 80, toolbar: '#stateTpl'}
                    , {field: 'created_at', sort: true, title: '添加时间', align: 'center', width: 180}
                    , {title: '操作', align: 'center', fixed: 'right', width: 150, toolbar: '#table-admin-data-do'}
                ]]
                , page: true
                , limit: 10
                , limits: [10, 30, 50]
                , height: 'full-180'
                , text: {none: '暂无数据！'}
            });

            upload.render({
                elem: '#lay-upload-img'
                , url: "{{ route('admin.upload') }}"
                , accept: 'images'
                , method: 'post'
                , acceptMime: 'image/*'
                , done: function (res) {
                    $(this.item).prev("div").children("input").val(res.data.src)
                }
            });

            @include('admin.js._js')
        });
    </script>
@stop

@section('pop')
    @include('admin.travel._form')
@stop