@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">内容</label>
                    <div class="layui-input-block">
                        <input type="text" name="content" placeholder="请输入" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block" style="width: 100px">
                        <select name="state">
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
                <button class="layui-btn layuiadmin-btn-forum-list" data-type="add">添加</button>
            </div>

            <table id="LAY-admin-data-list" lay-filter="LAY-admin-data-list"></table>
            <script type="text/html" id="stateTpl">
                @{{#  if(d.state == 1){ }}
                <button class="layui-btn layui-btn-xs">展示</button>
                @{{#  } else { }}
                <button class="layui-btn layui-btn-danger layui-btn-xs">不展示</button>
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
        layui.use(['index', 'table', 'form', 'layedit'], function () {
            var $ = layui.$
                , table = layui.table
                , admin = layui.admin
                , layEdit = layui.layedit
                , form = layui.form;

            var title = "心情"
                , delUrl = "{{ route('admin.delWhisper') }}"
                , addUrl = "{{ route('admin.addWhisper') }}"
                , editUrl = '/admin/whisper/edit/'
                , popArea = ['70%', '90%'];

            function setAddPop() {
                $("#lay-admin-data-form textarea[name=content]").val('');
                $("#lay-admin-data-form :radio[name='state'][value='1']").prop("checked", "checked");
            }

            function setEditPop(filed) {
                $("#lay-admin-data-form textarea[name=content]").val(filed.content);
                $("#lay-admin-data-form :radio[name='state'][value='" + filed.state + "']").prop("checked", "checked");
            }

            function layerOpenSuccess()
            {
                window.contentEditor = layEdit.build('whisperContent', {
                    height: 150,
                    tool: [
                        "strong", "italic", "underline", "del", "|",
                        "left", "center", "right", "|",
                        "link", "unlink", "face"
                    ]
                });
            }

            function formatUpdateData(data)
            {
                data.field.content = layEdit.getContent(window.contentEditor);
                return data;
            }

            //用户管理
            table.render({
                elem: '#LAY-admin-data-list'
                , url: "{{ route('admin.getWhispers') }}" //模拟接口
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
                    , {field: 'author', title: '作者', align: 'center', width: 100}
                    , {field: 'content', title: '内容', align: 'center', minWidth: 100}
                    , {field: 'state', sort: true, title: '状态', align: 'center', width: 80, toolbar: '#stateTpl'}
                    , {field: 'created_at', sort: true, title: '添加时间', align: 'center', width: 180}
                    , {title: '操作', align: 'center', fixed: 'right', width: 100, toolbar: '#table-admin-data-do'}
                ]]
                , page: true
                , limit: 30
                , limits: [10, 30, 50]
                , height: 'full-180'
                , text: {none: '暂无数据！'}
            });

            @include('admin.js._js')

        });
    </script>
@stop

@section('pop')
    @include('admin.whisper._form')
@stop