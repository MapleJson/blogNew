@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-body">
            <div style="padding-bottom: 10px;">
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="batchdel">删除</button>
            </div>

            <table id="LAY-admin-data-list" lay-filter="LAY-admin-data-list"></table>
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
        layui.use(['index', 'table', 'form'], function () {
            var $ = layui.$
                , table = layui.table
                , admin = layui.admin
                , form = layui.form;

            var title = "标签"
                , delUrl = "{{ route('admin.delFrontUser') }}"
                , editUrl = '/admin/front/edit/'
                , popArea = ['600px', '95%'];

            function setAddPop() {}

            function setEditPop(filed) {
                $("#lay-admin-data-form input[name=username]").val(filed.username);
                $("#lay-admin-data-form input[name=email]").val(filed.email);
                $("#lay-admin-data-form input[name=githubId]").val(filed.githubId);
                $("#lay-admin-data-form input[name=githubName]").val(filed.githubName);
                $("#lay-admin-data-form input[name=githubUrl]").val(filed.githubUrl);
                $("#lay-admin-data-form input[name=qqOpenid]").val(filed.qqOpenid);
                $("#lay-admin-data-form input[name=wbOpenId]").val(filed.wbOpenId);
                $("#lay-admin-data-form :radio[name='state'][value='" + filed.state + "']").prop("checked", "checked");
            }

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
                , url: "{{ route('admin.getFrontUsers') }}" //模拟接口
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
                    , {field: 'githubId', title: 'GITHUB Id', align: 'center', minWidth: 100}
                    , {field: 'qqOpenid', title: 'QQ OPEN Id', align: 'center', minWidth: 100}
                    , {field: 'wbOpenId', title: 'WEI BO Id', align: 'center', minWidth: 100}
                    , {field: 'state', sort: true, title: '状态', align: 'center', width: 80, toolbar: '#stateTpl'}
                    , {field: 'created_at', sort: true, title: '添加时间', align: 'center', minWidth: 140}
                    , {title: '操作', align: 'center', fixed: 'right', width: 100, toolbar: '#table-admin-data-do'}
                ]]
                , page: true
                , limit: 30
                , limits: [10, 30, 50]
                , height: 'full-100'
                , text: {none: '暂无数据！'}
            });

            @include('admin.js._js')
        });
    </script>
@stop

@section('pop')
    @include('admin.frontUser._form')
@stop