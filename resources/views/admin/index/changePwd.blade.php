@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>修改密码</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{ route('admin.updatePwd', $administrator->id) }}" method="post">
                <input type="hidden" name="id" value="{{ $administrator->id }}">
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="layui-form-item">
                    <label class="layui-form-label">新密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password" lay-verify="pass" lay-verType="tips"
                               autocomplete="off" id="LAY_password" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">6到16个字符</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">确认新密码</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password_confirmation" lay-verify="repass"
                               lay-verType="tips"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop