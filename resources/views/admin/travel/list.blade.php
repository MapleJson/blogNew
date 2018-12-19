@extends('admin.base')

@section('content')
    <div class="layui-card-body">
        <div style="padding-bottom: 10px;">
            <button class="layui-btn layuiadmin-btn-forum-list" data-type="add">添加</button>
        </div>
        <div class="layui-row layui-col-space30">
            <div class="layui-col-md2 layui-col-sm4">
                <div class="cmdlist-container">
                    <a href="javascript:;">
                        <img src="../../layuiadmin/style/res/template/portrait.png">
                    </a>
                    <a href="javascript:;">
                        <div class="cmdlist-text">
                            <p class="info">2018春夏季新款港味短款白色T恤+网纱中长款chic半身裙套装两件套</p>
                            <div class="price">
                                <b>￥79</b>
                                <p>
                                    ¥
                                    <del>130</del>
                                </p>
                                <span class="flow">
                      <i class="layui-icon layui-icon-rate"></i>
                      433
                    </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        layui.use(['index', 'table', 'form', 'laypage'], function () {
            var $ = layui.$
                , table = layui.table
                , admin = layui.admin
                , layPage = layui.laypage
                , form = layui.form;

            //总页数低于页码总数
            layPage.render();

            //用户管理
            table.render({
                elem: '#LAY-tags-list'
                , url: "{{ route('admin.getTags') }}" //模拟接口
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
                    , {field: 'name', title: '标签名', align: 'center', minWidth: 100}
                    , {field: 'state', sort: true, title: '状态', align: 'center', minWidth: 80, toolbar: '#stateTpl'}
                    , {field: 'created_at', sort: true, title: '添加时间', align: 'center', minWidth: 80}
                    , {title: '操作', align: 'center', fixed: 'right', minWidth: 150, toolbar: '#table-tags-do'}
                ]]
                , page: true
                , limit: 10
                , limits: [10, 30, 50]
                , height: 'full-180'
                , text: {none: '暂无数据！'}
            });

            //监听搜索
            form.on('submit(LAY-tags-forum-search)', function (data) {
                var field = data.field;

                //执行重载
                table.reload('LAY-tags-list', {
                    where: field
                });
            });

            function delTags(id, callback) {
                layer.confirm('确定删除吗？', function (index) {
                    //执行 Ajax 后重载
                    admin.req({
                        url: "{{ route('admin.delTag') }}"
                        , type: 'POST'
                        , data: {id: id, _method: 'DELETE'}
                        , done: function (res) {
                            callback();
                            layer.msg('已删除');
                        }
                    });
                });
            }

            function updateTags(type, url) {
                //提交 Ajax 成功后，静态更新表格中的数据
                form.on('submit(LAY-tags-submit)', function (data) {
                    if (type === 'PUT') data.field._method = 'PUT';
                    admin.req({
                        url: url
                        , type: 'POST'
                        , data: data.field
                        , done: function (res) {
                            layer.msg(res.msg);
                            table.reload('LAY-tags-list'); //数据刷新
                            layer.closeAll(); //关闭弹层
                        }
                    });
                });
            }

            //事件
            var active = {
                batchdel: function () {
                    var checkStatus = table.checkStatus('LAY-tags-list')
                        , checkData = checkStatus.data; //得到选中的数据

                    if (checkData.length === 0) {
                        return layer.msg('请选择数据');
                    }

                    var id = [];
                    layui.each(checkData, function (i, t) {
                        id.push(t.id);
                    });

                    delTags(id, function () {
                        table.reload('LAY-tags-list');
                    });
                }
                , add: function () {
                    $("#lay-tags-form input[name=name]").val('');
                    $("#lay-tags-form :radio[name='state'][value='1']").prop("checked", "checked");
                    form.render();
                    updateTags('POST', "{{ route('admin.addTag') }}");
                    layer.open({
                        type: 1
                        , title: '添加标签'
                        , content: $('#lay-tags-form')
                        , maxmin: true
                        , area: ['400px', '300px']
                    });
                }
            };

            //监听工具条
            table.on('tool(LAY-tags-list)', function (obj) {
                var id = obj.data.id;
                if (obj.event === 'del') {
                    delTags(id, function () {
                        obj.del();
                    });
                } else if (obj.event === 'edit') {
                    var filed = obj.data;
                    $("#lay-tags-form input[name=name]").val(filed.name);
                    $("#lay-tags-form :radio[name='state'][value='" + filed.state + "']").prop("checked", "checked");
                    form.render();
                    updateTags('PUT', '/admin/tag/edit/' + id);
                    layer.open({
                        type: 1
                        , title: '编辑标签'
                        , content: $('#lay-tags-form')
                        , maxmin: true
                        , area: ['400px', '300px']
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
    @include('admin.tag._form')
@stop