@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-body" style="overflow: hidden;">
            <div>
                <div class="layui-form-item atree-reload-btn">
                    <a class="layui-btn" data-type="reload">刷新</a>
                </div>
                <div class="layui-col-md6">
                    <ul id="aTreeMenu" class="divATree" style="margin-top: 10px"></ul>
                </div>
                <div class="layui-col-md5" style="margin-left: 20px">
                    <div class="layui-tab layui-tab-card">
                        <ul class="layui-tab-title">
                            <li class="disabled" style="pointer-events: none;">编辑</li>
                            <li class="layui-this">添加</li>
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item">
                                <form class="layui-form">
                                    <input type="hidden" name="id" id="Id" value="">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">父级菜单</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <select id="menuPid" name="parent_id" lay-filter="menuPid"
                                                    autocomplete="off">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">菜单标题</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="text" name="title" id="menuTitle" lay-verify="required"
                                                   placeholder="请输入菜单标题" value="" autocomplete="off"
                                                   class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">菜单别名</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="text" name="name" id="menuName"
                                                   placeholder="请输入菜单名称" value="" autocomplete="off"
                                                   class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">菜单地址</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="text" name="uri" id="menuHref"
                                                   placeholder="请输入菜单地址" value="" autocomplete="off"
                                                   class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">排序</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="number" min=0 name="order" id="order" autocomplete="off"
                                                   class="layui-input" value=""
                                                   lay-verify="required|orderMunber"
                                                   onKeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)))">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">图标CLASS</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="text" name="icon" id="menuIcon" lay-verify="required"
                                                   placeholder="请选择CLASS" value="" autocomplete="off"
                                                   class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block" align="center" style="margin-left: 0">
                                            <button class="layui-btn" lay-submit lay-filter="settingSuccess">提交</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="layui-tab-item layui-show">
                                <form class="layui-form">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">父级菜单</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <select id="menuPid2" name="parent_id" autocomplete="off">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">菜单标题</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="text" name="title" lay-verify="required" value=""
                                                   placeholder="请输入菜单标题" autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">菜单别名</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="text" name="name" value="" placeholder="请输入菜单名称"
                                                   autocomplete="off"
                                                   class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">菜单地址</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="text" name="uri" value="" placeholder="请输入菜单地址"
                                                   autocomplete="off"
                                                   class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">排序</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="number" min=0 name="order" autocomplete="off"
                                                   class="layui-input" value=""
                                                   lay-verify="required|orderNumber"
                                                   onKeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)))">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">图标CLASS</label>
                                        <div class="layui-input-block" style="width: 300px;">
                                            <input type="text" name="icon" lay-verify="required" value=""
                                                   placeholder="请选择CLASS" autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div align="center" style="margin-left: 0" class="layui-input-block">
                                            <button class="layui-btn" lay-submit lay-filter="settingSuccess">提交</button>
                                            <button type="reset" class="reset layui-btn layui-btn-primary">重置</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        //选择图标
        function choiceIcon(obj) {
            var icon = $(obj).data('class');
            layui.$("input[name='icon']").val(icon);
            layui.layer.closeAll();
        }

        layui.use(['index', 'form', 'atree'], function () {
            var $ = layui.$,
                layer = layui.layer,
                form = layui.form,
                admin = layui.admin;
            var active = {
                reload: function () {
                    var indexOpen = layer.msg('数据加载中，请稍候', {icon: 16, time: false, shade: 0.8});
                    $("#aTreeMenu").html("");
                    $(".reset").trigger("click");
                    resetClass();
                    admin.req({
                        url: "{{ route('admin.getMenus') }}",
                        done: function (res) {
                            layer.close(indexOpen);
                            var data = res.data;
                            var proHtml = '<option value="0">顶级菜单</option>';
                            layui.each(data, function (index, item) {
                                proHtml += '<option value="' + item.id + '">' + item.title + '</option>';
                            });
                            $("#menuPid").html(proHtml);
                            $("#menuPid2").html(proHtml);
                            var tree = layui.atree({
                                elem: '#aTreeMenu',
                                skin: 'as',
                                props: {
                                    deleteBtnLabel: '删除',
                                    name: 'title',
                                    id: 'id',
                                    children: 'children',
                                    addBtnLabel: ' '
                                },
                                nodes: data,
                                click: function (item) {
                                    clickClass();
                                    $("#Id").val(item.id);
                                    $("#menuTitle").val(item.title);
                                    $("#menuName").val(item.name);
                                    $("#menuHref").val(item.uri);
                                    $("#order").val(item.order);
                                    $("#menuIcon").val(item.icon);
                                    editMenu(data, item);
                                },
                                deleteClick: function (item, elem, done) {
                                    layer.confirm('真的删除吗？', function (index) {
                                        var info = layer.msg('删除中，请稍候', {icon: 16, time: false, shade: 0.7});
                                        admin.req({
                                            url: "{{ route('admin.delMenu') }}"
                                            , type: 'POST'
                                            , data: {_method: 'DELETE', id: item.id}
                                            , done: function (res) {
                                                done()
                                                layer.close(info);
                                            }
                                        });
                                        layer.close(index);
                                    });
                                },
                            });
                            form.render();
                        }
                    });
                }
            };

            active.reload();

            $('.atree-reload-btn .layui-btn').on('click', function () {
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });

            function clickClass() {
                $('.layui-tab-title li:first').addClass('layui-this').siblings().removeClass('layui-this')
                $('.layui-tab-content div:first').addClass('layui-show').siblings().removeClass('layui-show')
            }

            function resetClass() {
                $('.layui-tab-title li:first').removeClass('layui-this').siblings().addClass('layui-this')
                $('.layui-tab-content div:first').removeClass('layui-show').siblings().addClass('layui-show')
            }

            function editMenu(data, eData) {
                var proHtml = '<option value="0">顶级菜单</option>';
                layui.each(data, function (index, item) {
                    if (parseInt(item.id) === parseInt(eData.parent_id)) {
                        proHtml += '<option selected value="' + item.id + '">' + item.title + '</option>';
                    } else {
                        proHtml += '<option  value="' + item.id + '">' + item.title + '</option>';
                    }
                });
                // 加载父级菜单选项
                $("#menuPid").html(proHtml);
                form.render();
            }

            function openIconsBox(data) {
                var html = '<ul class="site-doc-icon">';
                $.each(data, function (index, item) {
                    html += '<li onclick="choiceIcon(this)" data-class="' + item.class + '" >';
                    html += '   <i class="layui-icon ' + item.class + '"></i>';
                    html += '   <div class="doc-icon-name">' + item.name + '</div>';
                    html += '   <div class="doc-icon-code"><xmp>' + item.unicode + '</xmp></div>';
                    html += '   <div class="doc-icon-fontclass">' + item.class + '</div>';
                    html += '</li>'
                });
                html += '</ul>';
                layer.open({
                    type: 1,
                    title: '选择图标',
                    area: ['900px', '600px'],
                    content: html
                })
            }

            //弹出图标
            function showIconsBox() {
                var icons = window.sessionStorage.getItem('icons');
                if (icons) {
                    openIconsBox(JSON.parse(icons));
                    return false;
                }
                var index = layer.load();
                admin.req({
                    url: "{{ route('admin.icons') }}"
                    , done: function (res) {
                        window.sessionStorage.setItem('icons', JSON.stringify(res.data));
                        openIconsBox(res.data);
                    }
                    , success: function (data) {
                        layer.close(index);
                        layer.msg(data.msg);
                    }
                    , error: function () {
                        layer.close(index);
                    }
                });
            }

            $("input[name=icon]").on('click', showIconsBox);

            form.on('submit(settingSuccess)', function (obj) {
                var data = obj.field;
                if (!data.uri) delete data.uri;
                if (!data.name) delete data.name;
                if (parseInt(data.id) === parseInt(data.parent_id)) {
                    layer.alert('分级错误');
                    return false;
                }
                var index = layer.msg('提交中，请稍候', {icon: 16, time: false, shade: 0.7});
                if (data.id) {
                    //提交修改
                    data._method = 'PUT';
                    admin.req({
                        url: "/admin/menu/edit/" + data.id
                        , type: 'POST'
                        , data: data
                        , done: function () {
                            layer.closeAll();
                        }
                        , success: function (data) {
                            layer.close(index);
                            layer.msg(data.msg);
                        }
                        , error: function () {
                            layer.close(index);
                        }
                    });
                } else {
                    admin.req({
                        url: "{{ route('admin.addMenu') }}"
                        , type: 'POST'
                        , data: data
                        , done: function () {
                            layer.closeAll();
                            $("#aTreeMenu").html("");
                            active.reload();
                        }
                        , success: function (data) {
                            layer.close(index);
                            layer.msg(data.msg);
                        }
                        , error: function () {
                            layer.close(index);
                        }
                    });
                }
                return false;
            });
        });
    </script>
@stop