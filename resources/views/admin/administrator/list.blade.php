@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">
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
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="add">添加</button>
            </div>

            <table id="LAY-admin-data-list" lay-filter="LAY-admin-data-list"></table>
            <script type="text/html" id="avatarTpl">
                <img style="display: inline-block; width: 50%; height: 100%;" src=@{{ d.avatarUrl }}>
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

            var title = "标签"
                , delUrl = "{{ route('admin.delAdministrator') }}"
                , addUrl = "{{ route('admin.addAdministrator') }}"
                , editUrl = '/admin/administrator/edit/'
                , popArea = ['600px', '500px'];

            function setAddPop() {
                $("#lay-admin-data-form input[name=username]").val('');
                $("#lay-admin-data-form input[name=name]").val('');
                $("#lay-admin-data-form input[name=password]").val('');
                $("#lay-admin-data-form input[name=password_confirmation]").val('');
                $("#lay-admin-data-form input[name=avatar]").val('');
                $("#lay-admin-data-form input[name=email]").val('');
                $("#lay-admin-data-form input[name=file]").val('');
            }

            function setEditPop(filed) {
                $("#lay-admin-data-form input[name=username]").val(filed.username);
                $("#lay-admin-data-form input[name=name]").val(filed.name);
                $("#lay-admin-data-form input[name=password]").val('');
                $("#lay-admin-data-form input[name=password_confirmation]").val('');
                $("#lay-admin-data-form input[name=avatar]").val(filed.avatar);
                $("#lay-admin-data-form input[name=email]").val(filed.email);
            }

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
                , url: "{{ route('admin.getAdministrators') }}" //模拟接口
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
                    , {field: 'username', title: '用户名', align: 'center', minWidth: 100}
                    , {field: 'name', title: '昵称', align: 'center', minWidth: 100}
                    , {field: 'avatarUrl', title: '头像', align: 'center', width: 80, toolbar: '#avatarTpl'}
                    , {field: 'email', title: '邮箱', align: 'center', minWidth: 100}
                    , {field: 'state', sort: true, title: '状态', align: 'center', width: 80, toolbar: '#stateTpl'}
                    , {field: 'created_at', sort: true, title: '添加时间', align: 'center', minWidth: 80}
                    , {title: '操作', align: 'center', fixed: 'right', width: 100, toolbar: '#table-admin-data-do'}
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
    @include('admin.administrator._form')
@stop