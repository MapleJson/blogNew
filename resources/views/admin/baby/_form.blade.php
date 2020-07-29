{{--  瓶喂参数  --}}
<div class="layui-form" id="lay-admin-data-form" style="padding: 20px 0 0 0; display: none">
    <div class="layui-form-item">
        <label class="layui-form-label">母乳</label>
        <div class="layui-input-inline">
            <input type="number" name="breast" lay-verify="required" value="0" placeholder="请输入母乳量" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">奶粉</label>
        <div class="layui-input-inline">
            <input type="number" name="dried" lay-verify="required" value="0" placeholder="请输入奶粉量" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-inline">
            <input type="text" name="remark" value="" placeholder="请输入备注" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">时间</label>
        <div class="layui-input-inline">
            <input type="text" name="created_at" id="created_at" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item" style="text-align: center">
        <input type="button" class="layui-btn" lay-submit lay-filter="LAY-admin-data-submit" id="LAY-admin-data-submit"
               value="确认">
    </div>
</div>

{{--  备注  --}}
<div class="layui-form" id="lay-admin-defecate-form" style="padding: 20px 0 0 0; display: none">
    <div class="layui-form-item">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-inline">
            <input type="text" name="remark" lay-verify="required" value="" placeholder="请输入备注" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item" style="text-align: center">
        <input type="button" class="layui-btn" lay-submit lay-filter="LAY-admin-defecate-submit" id="LAY-admin-defecate-submit"
               value="确认">
    </div>
</div>
