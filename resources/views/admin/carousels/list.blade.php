@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-body">
            <div style="padding-bottom: 10px;">
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="batchdel">删除</button>
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="add">添加</button>
            </div>

            <table id="LAY-admin-data-list" lay-filter="LAY-admin-data-list"></table>
            <script type="text/html" id="imgTpl">
                <a href="javascript:;" lay-event="showImg">
                    <img style="display: inline-block; width: 50%; height: 100%;" src=@{{ d.imgUrl }}>
                </a>
            </script>
            <script type="text/html" id="typeTpl">
                @{{#  if(d.type == 1){ }}
                <button class="layui-btn layui-btn-xs">顶部</button>
                @{{#  } else if(d.type == 2) { }}
                <button class="layui-btn layui-btn-primary layui-btn-xs">轮播</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">右侧</button>
                @{{#  } }}
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

            var title = "图片"
                , delUrl = "{{ route('admin.delCarousel') }}"
                , addUrl = "{{ route('admin.addCarousel') }}"
                , editUrl = '/admin/carousel/edit/'
                , popArea = ['500px', '400px'];

            function setAddPop() {
                $("input[name=title]").val('');
                $("input[name=img]").val('');
                $("#type-select").val(1);
                $(":radio[name='state'][value='1']").prop("checked", "checked");
                $("input[name=file]").val('');
            }

            function setEditPop(filed) {
                $("input[name=title]").val(filed.title);
                $("input[name=img]").val(filed.img);
                $("#type-select").val(filed.type);
                $(":radio[name='state'][value='" + filed.state + "']").prop("checked", "checked");
            }

            function tableOnTool(obj) {
                var data = obj.data;
                if (obj.event === 'showImg') {
                    layui.layer.photos({
                        photos: {
                            "title": data.title, //相册标题
                            "id": data.id, //相册id
                            "start": 0, //初始显示的图片序号，默认0
                            "data": [   //相册包含的图片，数组格式
                                {
                                    "alt": data.title,
                                    "pid": data.id, //图片id
                                    "src": data.imgUrl, //原图地址
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
                , url: "{{ route('admin.getCarousels') }}" //模拟接口
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
                    , {field: 'id', width: 50, title: 'ID', sort: true}
                    , {field: 'title', title: '标题', align: 'center', minWidth: 100}
                    , {field: 'imgUrl', title: '缩略图', align: 'center', width: 100, toolbar: '#imgTpl'}
                    , {field: 'type', title: '类型', align: 'center', toolbar: '#typeTpl'}
                    , {field: 'state', title: '状态', align: 'center', toolbar: '#stateTpl'}
                    , {title: '操作', width: 150, align: 'center', fixed: 'right', toolbar: '#table-admin-data-do'}
                ]]
                , page: true
                , limit: 30
                , limits: [10, 30, 50]
                , height: 'full-100'
                , text: {none: '暂无数据！'}
            });

            upload.render({
                elem: '#lay-upload-carousel'
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
    @include('admin.carousels._form')
@stop