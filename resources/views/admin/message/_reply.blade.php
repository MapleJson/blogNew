<div class="layui-form" id="lay-message-reply-form" style="padding: 20px 0 0 0; display: none">
    <input type="hidden" name="targetId" value=""/>
    <input type="hidden" name="parentId" value=""/>
    <input type="hidden" name="articleId" value=""/>
    <div class="layui-form-item">
        <label class="layui-form-label">被回复人</label>
        <div class="layui-input-inline layui-input-ml">
            <input type="text" name="targetUser" lay-verify="required" value="" readonly autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">回复内容</label>
        <div class="layui-input-inline layui-input-ml">
            <textarea name="content" lay-verify="required" placeholder="请输入回复内容" autocomplete="off"
                      class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <input type="radio" name="state" value="1" title="展示" checked>
            <input type="radio" name="state" value="2" title="不展示">
        </div>
    </div>
    <div class="layui-form-item" style="text-align: center">
        <input type="button" class="layui-btn" lay-submit lay-filter="LAY-admin-data-reply" id="LAY-admin-data-reply"
               value="确认">
    </div>
</div>