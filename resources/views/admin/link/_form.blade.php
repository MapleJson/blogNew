<div class="layui-form" id="lay-admin-data-form" style="padding: 20px 0 0 0; display: none">
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-inline layui-input-ml">
            <input type="text" name="title" lay-verify="required" placeholder="请输入标题" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">LOGO</label>
        <div class="layui-input-inline layui-input-ml">
            <input type="text" name="logo" lay-verify="required|url" placeholder="请输入LOGO" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">链接</label>
        <div class="layui-input-inline layui-input-ml">
            <input type="text" name="domain" lay-verify="required|url" placeholder="请输入链接" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">摘要</label>
        <div class="layui-input-inline layui-input-ml">
            <textarea name="summary" lay-verify="required" placeholder="请输入摘要" autocomplete="off"
                      class="layui-textarea"></textarea>
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
        <input type="button" class="layui-btn" lay-submit lay-filter="LAY-admin-data-submit" id="LAY-admin-data-submit"
               value="确认">
    </div>
</div>