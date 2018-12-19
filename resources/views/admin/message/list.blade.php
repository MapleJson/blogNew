@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">留言内容</label>
                    <div class="layui-input-block">
                        <input type="text" name="content" placeholder="请输入内容" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block" style="width: 100px">
                        <select name="state" class="layui-select">
                            <option value="0">请选择</option>
                            <option value="1">展示</option>
                            <option value="2">不展示</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn layuiadmin-btn-forum-list" lay-submit lay-filter="LAY-admin-data-forum-search">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="layui-card-body">
            <div style="padding-bottom: 10px;">
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="batchdel">删除</button>
            </div>

            <table id="LAY-admin-data-list" lay-filter="LAY-admin-data-list"></table>
            <script type="text/html" id="isArticleTpl">
                @{{#  if(parseInt(d.articleId) > 0){ }}
                <button class="layui-btn layui-btn-xs" lay-href="/blog/info/@{{ d.articleId }}.htm" >是&nbsp;文章ID&nbsp;:&nbsp;@{{ d.articleId }}</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">否</button>
                @{{#  } }}
            </script>
            <script type="text/html" id="stateTpl">
                @{{#  if(d.state == 1){ }}
                <button class="layui-btn layui-btn-xs">展示</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">不展示</button>
                @{{#  } }}
            </script>
            <script type="text/html" id="table-admin-data-do">
                @{{#  if(d.reply == 0){ }}
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="reply"><i
                            class="layui-icon layui-icon-reply-fill"></i></a>
                @{{#  } }}
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
        layui.use(['index', 'table', 'form'], function () {
            var $ = layui.$
                , table = layui.table
                , admin = layui.admin
                , form = layui.form;

            var title = "留言"
                , delUrl = "{{ route('admin.delMessage') }}"
                , addUrl = "{{ route('admin.addMessage') }}"
                , editUrl = '/admin/message/edit/'
                , popArea = ['700px', '500px'];

            function setAddPop() {}

            function setEditPop(filed) {
                $("#lay-admin-data-form input[name=username]").val(filed.username);
                $("#lay-admin-data-form input[name=targetUser]").val(filed.targetUser);
                $("#lay-admin-data-form textarea[name=content]").val(filed.content);
                $("#lay-admin-data-form :radio[name='state'][value='" + filed.state + "']").prop("checked", "checked");
            }

            function tableOnTool(obj) {
                if (obj.event === 'reply') {
                    var filed = obj.data;
                    $("#lay-message-reply-form input[name=targetId]").val(filed.id);
                    $("#lay-message-reply-form input[name=parentId]").val(parseInt(filed.parentId) > 0 ? filed.parentId : filed.id);
                    $("#lay-message-reply-form input[name=articleId]").val(filed.articleId);
                    $("#lay-message-reply-form input[name=targetUser]").val(filed.username);
                    $("#lay-message-reply-form textarea[name=content]").val('');
                    form.render();
                    layer.open({
                        type: 1
                        , title: '回复' + title
                        , content: $('#lay-message-reply-form')
                        , maxmin: true
                        , area: popArea
                    });
                    form.on('submit(LAY-admin-data-reply)', function (data) {
                        admin.req({
                            url: addUrl
                            , type: 'POST'
                            , data: data.field
                            , done: function (res) {
                                layer.msg(res.msg);
                                table.reload('LAY-admin-data-list'); //数据刷新
                                layer.closeAll(); //关闭弹层
                            }
                        });
                    });
                }
            }

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
                , url: "{{ route('admin.getMessages') }}" //模拟接口
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
                    , {field: 'username', title: '回复人', align: 'center', minWidth: 100}
                    , {field: 'targetUser', title: '被回复人', align: 'center', minWidth: 100}
                    , {field: 'content', title: '内容', align: 'center', minWidth: 100}
                    , {field: 'articleId', title: '文章评论', align: 'center', width: 120, toolbar: '#isArticleTpl'}
                    , {field: 'state', sort: true, title: '状态', align: 'center', width: 80, toolbar: '#stateTpl'}
                    , {field: 'created_at', sort: true, title: '添加时间', align: 'center', minWidth: 80}
                    , {title: '操作', align: 'center', fixed: 'right', width: 150, toolbar: '#table-admin-data-do'}
                ]]
                , page: true
                , limit: 10
                , limits: [10, 30, 50]
                , height: 'full-180'
                , text: {none: '暂无数据！'}
            });

            @include('admin.js._js')

        });
    </script>
@stop

@section('pop')
    @include('admin.message._form')
    @include('admin.message._reply')
@stop