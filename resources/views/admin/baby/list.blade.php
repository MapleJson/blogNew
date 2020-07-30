@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="day" value="{{ date('Y-m-d') }}" id="day" class="layui-input">
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
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="breast">亲喂</button>
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="dried">瓶喂</button>
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="urinate">小便</button>
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="defecate">大便</button>
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="remark">备注</button>
            </div>

            <table id="LAY-admin-data-list" lay-filter="LAY-admin-data-list"></table>
            <script type="text/html" id="actionTpl">
                @{{#  if(d.action == 1) { }}
                <button class="layui-btn layui-btn-xs">亲喂</button>
                @{{#  } else if(d.action == 2) { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">瓶喂</button>
                @{{#  } else if(d.action == 3) { }}
                <button class="layui-btn layui-btn-normal layui-btn-xs">小便</button>
                @{{#  } else if(d.action == 4) { }}
                <button class="layui-btn layui-btn-warm layui-btn-xs">大便</button>
                @{{#  } else if(d.action == 5) { }}
                <button class="layui-btn layui-btn-radius layui-btn-xs">其他情况</button>
                @{{#  } }}
            </script>
            <script type="text/html" id="table-admin-data-do">
                @{{#  if(d.action == 1) { }}
                @{{# if( d.status != 1) { }}
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="done">亲喂结束</a>
                @{{#  } }}
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i
                        class="layui-icon layui-icon-delete"></i></a>
                @{{#  } else if(d.action == 2){ }}
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">编辑</a>
                @{{#  } }}
            </script>
        </div>
    </div>
@stop

@section('script')
    <script>
        layui.use(['index', 'table', 'form', 'laydate'], function () {
            var $ = layui.$
                , table = layui.table
                , admin = layui.admin
                , form = layui.form
                , laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#day ' //指定元素
                , type: 'date'
                , format: 'yyyy-MM-dd'
            });

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
                , url: "{{ route('admin.getBabyLogs') }}" //模拟接口
                , response: {
                    separator: '.'
                    , statusName: 'code' //数据状态的字段名称，默认：code
                    , statusCode: 200 //成功的状态码，默认：0
                    , msgName: 'msg' //状态信息的字段名称，默认：msg
                    , countName: 'count' //数据总数的字段名称，默认：count
                    , dataName: 'data' //数据列表的字段名称，默认：data
                }
                , cols: [[
                    {field: 'action', title: '行为', align: 'center', width: 120, toolbar: '#actionTpl'}
                    , {field: 'breast', title: '瓶喂母乳(ml)', align: 'center', width: 140}
                    , {field: 'dried', title: '瓶喂奶粉(ml)', align: 'center', width: 140}
                    , {field: 'day', title: '日期', align: 'center', width: 140}
                    , {field: 'created_at', title: '开始时间', align: 'center', minWidth: 80}
                    , {field: 'updated_at', title: '结束时间', align: 'center', minWidth: 80}
                    , {field: 'remark', title: '备注', align: 'center', minWidth: 100}
                    , {title: '操作', align: 'center', fixed: 'right', width: 150, toolbar: '#table-admin-data-do'}
                ]]
                , page: true
                , limit: 20
                , limits: [20, 30, 50]
                , height: 'full-180'
                , text: {none: '暂无数据！'}
            });

            //监听搜索
            form.on('submit(LAY-admin-data-forum-search)', function (data) {
                var field = data.field;

                //执行重载
                table.reload('LAY-admin-data-list', {
                    where: field
                });
            });

            // 删除数据
            function delData(id, callback) {
                layer.confirm('确定删除吗？', function (index) {
                    //执行 Ajax 后重载
                    admin.req({
                        url: "{{ route('admin.delBabyLog') }}"
                        , type: 'POST'
                        , data: {id: id, _method: 'DELETE'}
                        , done: function (res) {
                            callback();
                            layer.msg('已删除');
                        }
                    });
                });
            }

            // 更新数据
            function updateData(type, url) {
                //提交 Ajax 成功后，静态更新表格中的数据
                form.on('submit(LAY-admin-data-submit)', function (data) {
                    if (type === 'PUT') data.field._method = 'PUT';
                    data.field.action = 2;
                    admin.req({
                        url: url
                        , type: 'POST'
                        , data: data.field
                        , done: function (res) {
                            layer.msg(res.msg);
                            $("#lay-admin-data-form input[name=breast]").val(0);
                            $("#lay-admin-data-form input[name=dried]").val(0);
                            $("#lay-admin-data-form input[name=remark]").val('');
                            table.reload('LAY-admin-data-list'); //数据刷新
                            layer.closeAll(); //关闭弹层
                        }
                    });
                });
            }

            //事件
            var active = {
                breast: function () {
                    admin.req({
                        url: "{{ route('admin.addBabyLog') }}"
                        , type: 'POST'
                        , data: {
                            action: 1
                        }
                        , done: function (res) {
                            layer.msg(res.msg);
                            table.reload('LAY-admin-data-list'); //数据刷新
                            layer.closeAll(); //关闭弹层
                        }
                    });
                }
                , dried: function () {
                    $("#lay-admin-data-form input[name=breast]").val(0);
                    $("#lay-admin-data-form input[name=dried]").val(0);
                    $("#lay-admin-data-form input[name=remark]").val('');
                    $("#lay-admin-data-form input[name=created_at]").val("{{ date('Y-m-d H:i:s') }}");
                    form.render();
                    layer.open({
                        type: 1
                        , title: '瓶喂参数'
                        , content: $('#lay-admin-data-form')
                        , maxmin: true
                        , area: ['400px', '500px']
                        , success: function (layero, index) {
                            laydate.render({
                                elem: '#created_at ' //指定元素
                                , type: 'datetime'
                                , format: 'yyyy-MM-dd HH:mm:ss'
                            });
                        }
                    });
                    updateData('POST', "{{ route('admin.addBabyLog') }}");
                }
                , urinate: function () {
                    admin.req({
                        url: "{{ route('admin.addBabyLog') }}"
                        , type: 'POST'
                        , data: {
                            action: 3
                        }
                        , done: function (res) {
                            layer.msg(res.msg);
                            table.reload('LAY-admin-data-list'); //数据刷新
                            layer.closeAll(); //关闭弹层
                        }
                    });
                }
                , defecate: function () {
                    layer.open({
                        type: 1
                        , title: '备注'
                        , content: $('#lay-admin-defecate-form')
                        , maxmin: true
                        , area: ['400px', '300px']
                    });
                    //提交 Ajax 成功后，静态更新表格中的数据
                    form.on('submit(LAY-admin-defecate-submit)', function (data) {
                        data.field.action = 4;
                        admin.req({
                            url: "{{ route('admin.addBabyLog') }}"
                            , type: 'POST'
                            , data: data.field
                            , done: function (res) {
                                layer.msg(res.msg);
                                $("#lay-admin-defecate-form input[name=remark]").val('');
                                table.reload('LAY-admin-data-list'); //数据刷新
                                layer.closeAll(); //关闭弹层
                            }
                        });
                    });
                }
                , remark: function () {
                    layer.open({
                        type: 1
                        , title: '备注'
                        , content: $('#lay-admin-defecate-form')
                        , maxmin: true
                        , area: ['400px', '300px']
                    });
                    //提交 Ajax 成功后，静态更新表格中的数据
                    form.on('submit(LAY-admin-defecate-submit)', function (data) {
                        data.field.action = 5;
                        admin.req({
                            url: "{{ route('admin.addBabyLog') }}"
                            , type: 'POST'
                            , data: data.field
                            , done: function (res) {
                                layer.msg(res.msg);
                                $("#lay-admin-defecate-form input[name=remark]").val('');
                                table.reload('LAY-admin-data-list'); //数据刷新
                                layer.closeAll(); //关闭弹层
                            }
                        });
                    });
                }
            };

            //监听工具条
            table.on('tool(LAY-admin-data-list)', function (obj) {
                var id = obj.data.id;
                if (obj.event === 'del') {
                    delData(id, function () {
                        obj.del();
                    });
                } else if (obj.event === 'edit') {
                    $("#lay-admin-data-form input[name=breast]").val(obj.data.breast);
                    $("#lay-admin-data-form input[name=dried]").val(obj.data.dried);
                    $("#lay-admin-data-form input[name=remark]").val(obj.data.remark);
                    $("#lay-admin-data-form input[name=created_at]").val(obj.data.created_at);
                    form.render();
                    layer.open({
                        type: 1
                        , title: '编辑瓶喂'
                        , content: $('#lay-admin-data-form')
                        , maxmin: true
                        , area: ['400px', '500px']
                        , success: function (layero, index) {
                            laydate.render({
                                elem: '#created_at ' //指定元素
                                , type: 'datetime'
                                , format: 'yyyy-MM-dd HH:mm:ss'
                            });
                        }
                    });
                    updateData('PUT', 'baby/edit/' + id);
                } else if (obj.event === 'done') {
                    layer.open({
                        type: 1
                        , title: '备注'
                        , content: $('#lay-admin-defecate-form')
                        , maxmin: true
                        , area: ['400px', '300px']
                    });
                    //提交 Ajax 成功后，静态更新表格中的数据
                    form.on('submit(LAY-admin-defecate-submit)', function (data) {
                        data.field._method = 'PUT';
                        data.field.status = 1;
                        admin.req({
                            url: 'baby/edit/' + id
                            , type: 'POST'
                            , data: data.field
                            , done: function (res) {
                                layer.msg(res.msg);
                                $("#lay-admin-defecate-form input[name=remark]").val('');
                                table.reload('LAY-admin-data-list'); //数据刷新
                                layer.closeAll(); //关闭弹层
                            }
                        });
                    });
                }
            });

            $('.layui-btn.layuiadmin-btn-forum-list').on('click', function () {
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });

        });
    </script>
@stop

@section('pop')
    @include('admin.baby._form')
@stop
