<div class="layui-form" id="lay-admin-data-form" style="padding: 20px 0 0 0; display: none">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="username" lay-verify="required" placeholder="请输入用户名" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">昵称</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="name" lay-verify="required" placeholder="请输入昵称" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="password" name="password" placeholder="请输入密码" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">确认密码</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="password" name="password_confirmation" placeholder="请重复密码"
                   autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">头像</label>
        <div class="layui-input-inline layui-input-xs">
            <input type="text" name="avatar" lay-verify="required" placeholder="请上传头像" autocomplete="off"
                   class="layui-input">
        </div>
        <button style="float: left;" type="button" class="layui-btn" id="lay-upload-img">上传图片</button>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="email" lay-verify="required|email" placeholder="请输入邮箱" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item" style="text-align: center">
        <input type="button" class="layui-btn" lay-submit lay-filter="LAY-admin-data-submit" id="LAY-admin-data-submit"
               value="确认">
    </div>
</div>