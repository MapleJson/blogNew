@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">用户</label>
                    <div class="layui-input-block" style="width: 120px">
                        <select name="user_id">
                            <option value="">请选择</option>
                            @foreach($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">请求方式</label>
                    <div class="layui-input-block" style="width: 120px">
                        <select name="method">
                            <option value="">请选择</option>
                            @foreach($methods as $method)
                                <option value="{{ $method }}">{{ $method }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">请求路径</label>
                    <div class="layui-input-block">
                        <input type="text" name="path" placeholder="请输入请求路径" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">请求IP</label>
                    <div class="layui-input-block">
                        <input type="text" name="ip" lay-verify="ip" placeholder="请输入请求IP" autocomplete="off" class="layui-input">
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
            <script type="text/html" id="methodTpl">
                <button class="layui-btn layui-btn-xs" style="background: @{{ d.methodColor }}">@{{ d.method }}</button>
            </script>
            <table id="LAY-admin-data-list" lay-filter="LAY-admin-data-list"></table>
            <script type="text/html" id="table-admin-data-do">
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

            var title = "日志"
                , delUrl = "{{ route('admin.delLog') }}"
                , popArea = []
                , setAddPop = function () {}
                , setEditPop = function (filed) {};

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
                , url: "{{ route('admin.getLogs') }}" //模拟接口
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
                    , {field: 'username', title: '操作者', align: 'center', width: 100}
                    , {field: 'method', sort: true, title: '请求方式', align: 'center', width: 100, toolbar: '#methodTpl'}
                    , {field: 'path', sort: true, title: '请求路径', align: 'center', minWidth: 80}
                    , {field: 'ip', sort: true, title: '请求IP', align: 'center', width: 120}
                    , {field: 'input', sort: true, title: '请求参数', align: 'center', minWidth: 80}
                    , {field: 'created_at', sort: true, title: '创建时间', align: 'center', minWidth: 80}
                    , {title: '操作', align: 'center', fixed: 'right', width: 60, toolbar: '#table-admin-data-do'}
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