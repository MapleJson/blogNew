<div class="layui-form" id="lay-admin-data-form" style="padding: 20px 0 0 0; display: none">
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-inline">
            <input type="text" name="title" lay-verify="required" placeholder="请输入用户名" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">图片</label>
        <div class="layui-input-inline">
            <input type="text" name="img" lay-verify="required" placeholder="请上传图片" autocomplete="off"
                   class="layui-input">
        </div>
        <button style="float: left;" type="button" class="layui-btn" id="lay-upload-carousel">上传图片</button>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">类型</label>
        <div class="layui-input-inline">
            <select name="type" id="type-select" class="layui-select">
                <option value="1">顶部</option>
                <option value="2">轮播</option>
                <option value="3">右侧</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block">
            <input type="radio" name="state" value="1" title="启用" checked>
            <input type="radio" name="state" value="2" title="停用">
        </div>
    </div>
    <div class="layui-form-item" style="text-align: center">
        <input type="button" class="layui-btn" lay-submit lay-filter="LAY-admin-data-submit" id="LAY-admin-data-submit" value="确认">
    </div>
</div>