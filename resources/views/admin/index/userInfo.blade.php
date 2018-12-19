@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>修改个人资料</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{ route('admin.updateInfo', $administrator->id) }}"
                  method="post">
                <input type="hidden" name="id" value="{{ $administrator->id }}">
                <input type="hidden" id="avatar-input" name="avatar" value="{{ $administrator->avatar }}">
                {{ method_field('put') }}
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">用户名</label>
                    <div class="layui-input-inline">
                        <input type="text" value="{{ $administrator->username }}"
                               lay-verify="required"
                               placeholder="请输入用户名" readonly class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="" class="layui-form-label">头像</label>
                    <div class="layui-input-inline">
                        <button type="button" class="layui-btn" id="upload-avatar">上传头像</button>
                        <img @if(!empty($administrator->avatarImg))
                             src="{{ $administrator->avatarImg }}"
                             @endif class="layui-upload-img" id="upload-avatar-img">
                        <p id="upload-text"></p>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="" class="layui-form-label">昵称</label>
                    <div class="layui-input-inline">
                        <input type="text" name="name" value="{{ $administrator->name }}" lay-verify="required"
                               placeholder="请输入昵称" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="" class="layui-form-label">邮箱</label>
                    <div class="layui-input-inline">
                        <input type="email" name="email" value="{{ $administrator->email }}" lay-verify="email"
                               placeholder="请输入Email" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn" id="update-form">确 认</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('script')
    <script>
        layui.use(['index', 'upload'], function () {
            var $ = layui.jquery
                , upload = layui.upload;

            //普通图片上传
            var uploadInst = upload.render({
                elem: '#upload-avatar'
                , url: "{{ route('admin.upload') }}"
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#upload-avatar-img').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (parseInt(res.code) !== 200) {
                        return layer.msg('上传失败');
                    }
                    //上传成功
                    $('#avatar-input').val(res.data.src);
                }
                , error: function () {
                    //演示失败状态，并实现重传
                    var demoText = $('#upload-text');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function () {
                        uploadInst.upload();
                    });
                }
            });
        });
    </script>
@stop