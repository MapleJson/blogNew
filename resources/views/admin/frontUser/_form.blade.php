<div class="layui-form" id="lay-admin-data-form" style="padding: 20px 0 0 0; display: none">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="username" lay-verify="required" value="" readonly autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="email" lay-verify="required" value="" readonly autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">GITHUB ID</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="githubId" lay-verify="required" value="" readonly autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">GITHUB名称</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="githubName" lay-verify="required" value="" readonly autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">GITHUB链接</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="githubUrl" lay-verify="required" value="" readonly autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">QQ OPEN ID</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="qqOpenid" lay-verify="required" value="" readonly autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">WB OPEN ID</label>
        <div class="layui-input-inline layui-input-sm">
            <input type="text" name="wbOpenId" lay-verify="required" value="" readonly autocomplete="off"
                   class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <input type="radio" name="state" value="1" title="启用" checked>
            <input type="radio" name="state" value="2" title="停用">
        </div>
    </div>
    <div class="layui-form-item" style="text-align: center">
        <input type="button" class="layui-btn" lay-submit lay-filter="LAY-admin-data-submit" id="LAY-admin-data-submit" value="确认">
    </div>
</div>