<div class="layui-form" id="lay-admin-data-form" style="padding: 20px 0 0 0; display: none">
    <div class="layui-form-item">
        <label class="layui-form-label">照片</label>
        <div class="layui-input-inline layui-input-xl" style="height: 400px">
            <img id="current-edit-photo" style="height: 100%;" src="" />
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">简介</label>
        <div class="layui-input-inline layui-input-xl">
            <input type="text" name="summary" lay-verify="required" placeholder="请输入简介" autocomplete="off"
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