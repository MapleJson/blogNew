@extends('admin.base')

@section('content')
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">网站设置</div>
                <div class="layui-card-body" pad15>
                    <div class="layui-form" wid100 lay-filter="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">站点名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="siteName" value="{{ $set->siteName }}" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">META关键词</label>
                            <div class="layui-input-block">
                                <input type="text" name="keywords" placeholder="多个关键词用英文状态 , 号分割"
                                       value="{{ $set->keywords }}" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">META描述</label>
                            <div class="layui-input-block">
                                <textarea name="description" class="layui-textarea">{{ $set->description }}</textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">作者名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="authorName" value="{{ $set->authorName }}" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">职业</label>
                            <div class="layui-input-block">
                                <input type="text" name="profession" value="{{ $set->profession }}" class="layui-input">
                            </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">一句话描述自己</label>
                            <div class="layui-input-block">
                                <textarea name="mood" class="layui-textarea">{{ $set->mood }}</textarea>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">一篇关于我的文章</label>
                            <div class="layui-input-block" id="aboutMeContent"></div>
                            <input type="hidden" name="content" value="{{ $set->content }}">
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">微信号</label>
                            <div class="layui-input-block">
                                <input type="text" name="weChat" value="{{ $set->weChat }}" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label" style="line-height: 80px">微信二维码图片</label>
                            <div class="layui-input-block">
                                <input type="hidden" name="weChatQR" value="{{ $set->weChatQR }}" id="weChatQR-input"
                                       class="layui-input">
                                <button type="button" class="layui-btn" id="upload-weChatQR">上传二维码</button>
                                <img @if(!empty($set->weChatQRImg))
                                     src="{{ $set->weChatQRImg }}"
                                     @endif class="layui-upload-img" id="upload-weChatQR-img">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">QQ号</label>
                            <div class="layui-input-block">
                                <input type="number" name="qq" value="{{ $set->qq }}" lay-verify="number"
                                       class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">邮箱</label>
                            <div class="layui-input-block">
                                <input type="text" name="email" value="{{ $set->email }}" lay-verify="email"
                                       class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">顶部图片展示</label>
                            <div class="layui-input-inline" style="width: 80px;">
                                <input type="number" name="topPicCount" lay-verify="number"
                                       value="{{ $set->topPicCount }}" class="layui-input">
                            </div>
                            <div class="layui-input-inline layui-input-company">张</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">轮播图片展示</label>
                            <div class="layui-input-inline" style="width: 80px;">
                                <input type="number" name="bannersCount" lay-verify="number"
                                       value="{{ $set->bannersCount }}" class="layui-input">
                            </div>
                            <div class="layui-input-inline layui-input-company">张</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">首页文章</label>
                            <div class="layui-input-inline" style="width: 80px;">
                                <input type="number" name="blogShowCount" lay-verify="number"
                                       value="{{ $set->blogShowCount }}" class="layui-input">
                            </div>
                            <div class="layui-input-inline layui-input-company">篇</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">站长推荐</label>
                            <div class="layui-input-inline" style="width: 80px;">
                                <input type="number" name="proposeCount" lay-verify="number"
                                       value="{{ $set->proposeCount }}" class="layui-input">
                            </div>
                            <div class="layui-input-inline layui-input-company">篇</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">留言展示</label>
                            <div class="layui-input-inline" style="width: 80px;">
                                <input type="number" name="messageCount" lay-verify="number"
                                       value="{{ $set->messageCount }}" class="layui-input">
                            </div>
                            <div class="layui-input-inline layui-input-company">条</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">订阅展示</label>
                            <div class="layui-input-inline" style="width: 80px;">
                                <input type="number" name="rssSize" lay-verify="number" value="{{ $set->rssSize }}"
                                       class="layui-input">
                            </div>
                            <div class="layui-input-inline layui-input-company">条</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">模板选择</label>
                            <div class="layui-input-block" style="width: 120px;">
                                <select name="template">
                                    @foreach($templates as $template)
                                    <option value="{{ $template->name }}" @if($set->template === $template->name)
                                    selected @endif>{{ $template->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit lay-filter="setWebsite">确认保存</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('admin/modules/wangEditor.min.js') }}"></script>
    <script>
        layui.use(['index', 'form', 'upload', 'wang'], function () {
            var $ = layui.$,
                layer = layui.layer,
                form = layui.form,
                admin = layui.admin,
                wang = layui.wang,
                upload = layui.upload;

            // wangEditor富文本编辑器
            var contentEditor = wang('aboutMeContent', 'content');
            contentEditor.txt.html(`{!! $set->content !!}`);
            contentEditor.change();

            form.on('submit(setWebsite)', function (obj) {
                var data = obj.field;
                var index = layer.msg('提交中，请稍候', {icon: 16, time: false, shade: 0.7});
                admin.req({
                    url: "{{ route('admin.setWebsite', $set->id) }}"
                    , type: 'POST'
                    , data: data
                    , done: function (res) {
                        layer.close(index);
                        layer.msg(res.msg);
                    }
                });
            });

            //普通图片上传
            var uploadInst = upload.render({
                elem: '#upload-weChatQR'
                , url: "{{ route('admin.upload') }}"
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function (index, file, result) {
                        $('#upload-weChatQR-img').attr('src', result); //图片链接（base64）
                    });
                }
                , done: function (res) {
                    //如果上传失败
                    if (parseInt(res.code) !== 200) {
                        return layer.msg('上传失败');
                    }
                    //上传成功
                    $('#weChatQR-input').val(res.data.src);
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