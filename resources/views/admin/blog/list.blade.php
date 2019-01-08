@extends('admin.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/style/formSelects-v4.css') }}" media="all">
@stop

@section('content')
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" placeholder="请输入" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">置顶</label>
                    <div class="layui-input-block" style="width: 100px">
                        <select name="isTop">
                            <option value="0">请选择</option>
                            <option value="1">置顶</option>
                            <option value="2">不置顶</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">推荐</label>
                    <div class="layui-input-block" style="width: 100px">
                        <select name="recommend">
                            <option value="0">请选择</option>
                            <option value="1">推荐</option>
                            <option value="2">不推荐</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block" style="width: 100px">
                        <select name="state">
                            <option value="0">请选择</option>
                            <option value="1">发布</option>
                            <option value="2">未发布</option>
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
            <script type="text/html" id="imgTpl">
                <a href="javascript:;" lay-event="showImg">
                    @{{# if(d.imgUrl){ }}
                    <img style="display: inline-block; width: 50%; height: 100%;" src=@{{ d.imgUrl }}>
                    @{{# } }}
                </a>
            </script>
            <script type="text/html" id="tagsTpl">
                @{{#  layui.each(d.tags, function(index, tag){ }}
                <span class="layui-btn layui-btn-xs">@{{ tag.name }}</span>
                @{{#  }) }}
            </script>
            <script type="text/html" id="stateTpl">
                @{{#  if(d.state == 1){ }}
                <button class="layui-btn layui-btn-xs">已发布</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">未发布</button>
                @{{#  } }}
            </script>
            <script type="text/html" id="topTpl">
                @{{#  if(d.isTop == 1){ }}
                <button class="layui-btn layui-btn-xs">置顶</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">未置顶</button>
                @{{#  } }}
            </script>
            <script type="text/html" id="recommendTpl">
                @{{#  if(d.recommend == 1){ }}
                <button class="layui-btn layui-btn-xs">推荐</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">未推荐</button>
                @{{#  } }}
            </script>
            <script type="text/html" id="originalTpl">
                @{{#  if(d.original == 1){ }}
                <button class="layui-btn layui-btn-xs">原创</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">非原创</button>
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
    <script src="{{ asset('admin/modules/wangEditor.min.js') }}"></script>
    <script>
        layui.extend({
            formSelects: 'formSelects-v4.min'
        }).use(['index', 'table', 'form', 'upload', 'formSelects', 'wang'], function () {
            var $ = layui.$
                , table = layui.table
                , admin = layui.admin
                , upload = layui.upload
                , formSelects = layui.formSelects
                , wang = layui.wang
                , form = layui.form;

            var title = "文章"
                , delUrl = "{{ route('admin.delPost') }}"
                , addUrl = "{{ route('admin.addPost') }}"
                , editUrl = '/admin/blog/edit/'
                , popArea = ['100%', '100%'];

            function setAddPop() {
                $("#lay-admin-data-form input[name=title]").val('');
                $("#lay-admin-data-form input[name=img]").val('');
                $("#lay-admin-data-form textarea[name=summary]").val('');
                contentEditor.txt.clear();
                contentEditor.change();
                formSelects.value('select-tags', []);
                $("#lay-admin-data-form :radio[name='state'][value='1']").prop("checked", "checked");
                $("#lay-admin-data-form :radio[name='isTop'][value='2']").prop("checked", "checked");
                $("#lay-admin-data-form :radio[name='recommend'][value='2']").prop("checked", "checked");
                $("#lay-admin-data-form :radio[name='original'][value='1']").prop("checked", "checked");
                $("#lay-admin-data-form input[name=file]").val('');
            }

            function setEditPop(filed) {
                admin.req({
                    url: '/admin/blog/show/' + filed.id
                    , done: function (res) {
                        contentEditor.txt.html(res.data.content);
                        contentEditor.change();
                    }
                });
                var tags = [];
                $("#lay-admin-data-form input[name=title]").val(filed.title);
                $("#lay-admin-data-form input[name=img]").val(filed.img);
                $("#lay-admin-data-form textarea[name=summary]").val(filed.summary);
                layui.each(filed.tags, function (index, tag) {
                    tags.push(tag.id);
                });
                formSelects.value('select-tags', tags);
                $("#lay-admin-data-form :radio[name='state'][value='" + filed.state + "']").prop("checked", "checked");
                $("#lay-admin-data-form :radio[name='isTop'][value='" + filed.isTop + "']").prop("checked", "checked");
                $("#lay-admin-data-form :radio[name='recommend'][value='" + filed.recommend + "']").prop("checked", "checked");
                $("#lay-admin-data-form :radio[name='original'][value='" + filed.original + "']").prop("checked", "checked");
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

            function cancelPop() {
                contentEditor.txt.clear();
                contentEditor.change();
            }

            // wangEditor富文本编辑器
            var contentEditor = wang('content-editor', 'content');

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
                , url: "{{ route('admin.getPosts') }}" //模拟接口
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
                    , {field: 'title', title: '标题', align: 'center', minWidth: 100}
                    , {field: 'authorName', sort: true, title: '作者', align: 'center', minWidth: 80}
                    , {field: 'imgUrl', title: '缩略图', align: 'center', width: 80, toolbar: '#imgTpl'}
                    , {field: 'tags', sort: true, title: '标签', align: 'center', minWidth: 150, toolbar: '#tagsTpl'}
                    , {field: 'state', sort: true, title: '发布', align: 'center', minWidth: 80, toolbar: '#stateTpl'}
                    , {field: 'isTop', sort: true, title: '置顶', align: 'center', minWidth: 80, toolbar: '#topTpl'}
                    , {
                        field: 'recommend',
                        sort: true,
                        title: '推荐',
                        align: 'center',
                        minWidth: 80,
                        toolbar: '#recommendTpl'
                    }
                    , {
                        field: 'original',
                        sort: true,
                        title: '原创',
                        align: 'center',
                        minWidth: 80,
                        toolbar: '#originalTpl'
                    }
                    , {field: 'comments', sort: true, title: '留言数', align: 'center', minWidth: 80}
                    , {field: 'read', sort: true, title: '点击数', align: 'center', minWidth: 80}
                    , {title: '操作', align: 'center', fixed: 'right', minWidth: 150, toolbar: '#table-admin-data-do'}
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

            formSelects.config('select-tags', {
                type: 'get',                //请求方式: post, get, put, delete...
                searchUrl: '{{ route('admin.getTags', 1) }}',
                searchName: 'name',         //自定义搜索内容的key值
                keyName: 'name',            //自定义返回数据中name的key, 默认 name
                keyVal: 'id',               //自定义返回数据中value的key, 默认 value
                direction: 'auto',          //多选下拉方向, auto|up|down
                delay: 1000,                 //搜索延迟时间, 默认停止输入500ms后开始搜索
                response: {
                    statusCode: 200,          //成功状态码
                    statusName: 'code',     //code key
                    msgName: 'msg',         //msg key
                    dataName: 'data'        //data key
                }
            }, false);

            @include('admin.js._js')

        });
    </script>
@stop

@section('pop')
    @include('admin.blog._form')
@stop