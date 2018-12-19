@extends('admin.base')

@section('content')
    <div class="layui-col-md6">
        <div class="layui-card">
            <div class="layui-card-header">账号信息</div>
            <div class="layui-card-body layui-text">
                <table class="layui-table">
                    <colgroup>
                        <col width="150">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr>
                        <td>账号</td>
                        <td>{!! $administrator->username !!}</td>
                    </tr>
                    <tr>
                        <td>昵称</td>
                        <td>{!! $administrator->name !!}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{!! $administrator->email !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        layui.use('index');
    </script>
@stop