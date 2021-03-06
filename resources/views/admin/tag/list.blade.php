@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">标签名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" placeholder="请输入" autocomplete="off" class="layui-input">
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
                , delUrl = "{{ route('admin.delTag') }}"
                , addUrl = "{{ route('admin.addTag') }}"
                , editUrl = '/admin/tag/edit/'
                , popArea = ['400px', '300px'];

            function setAddPop() {
                $("#lay-admin-data-form input[name=name]").val('');
                $("#lay-admin-data-form :radio[name='state'][value='1']").prop("checked", "checked");
            }

            function setEditPop(filed) {
                $("#lay-admin-data-form input[name=name]").val(filed.name);
                $("#lay-admin-data-form :radio[name='state'][value='" + filed.state + "']").prop("checked", "checked");
            }

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
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
                    , {title: '操作', align: 'center', fixed: 'right', minWidth: 150, toolbar: '#table-admin-data-do'}
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
    @include('admin.tag._form')
@stop