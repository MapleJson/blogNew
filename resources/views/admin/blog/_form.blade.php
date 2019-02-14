<div class="layui-form" id="lay-admin-data-form" style="padding: 20px 0 0 0; display: none">
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-inline layui-input-xxxl">
            <input type="text" name="title" lay-verify="required" placeholder="请输入标题" autocomplete="off"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">标签</label>
        <div class="layui-input-inline layui-input-xxxl">
            <select name="tags" xm-select="select-tags" class="layui-select">
                <option value="">请选择标签</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">封面图</label>
        <div class="layui-input-inline layui-input-xxl">
            <input type="text" name="img" placeholder="请上传封面图" autocomplete="off"
                   class="layui-input">
        </div>
        <button style="float: left;" type="button" class="layui-btn" id="lay-upload-img">上传图片</button>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">摘要</label>
        <div class="layui-input-inline layui-input-xxxl">
            <textarea name="summary" lay-verify="required" placeholder="请输入摘要" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">视频示例</label>
        <div class="layui-input-inline layui-input-xxxl">
            <input style="border:none; color:red" class="layui-input" type="text"
                   value='<iframe src="视频地址" style="width:95%;height:300px;"></iframe>'/>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文章内容</label>
        <div class="layui-input-inline layui-input-xxxl" id="content-editor">
        </div>
        <input type="hidden" name="content" value="">
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">发布</label>
        <div class="layui-input-block">
            <input type="radio" name="state" value="1" title="发布" checked>
            <input type="radio" name="state" value="2" title="不发布">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">置顶</label>
        <div class="layui-input-block">
            <input type="radio" name="isTop" value="1" title="置顶">
            <input type="radio" name="isTop" value="2" title="不置顶" checked>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">推荐</label>
        <div class="layui-input-block">
            <input type="radio" name="recommend" value="1" title="推荐">
            <input type="radio" name="recommend" value="2" title="不推荐" checked>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">原创</label>
        <div class="layui-input-block">
            <input type="radio" name="original" value="1" title="原创" checked>
            <input type="radio" name="original" value="2" title="转载">
        </div>
    </div>
    <div class="layui-form-item" style="text-align: center">
        <input type="button" class="layui-btn" lay-submit lay-filter="LAY-admin-data-submit" id="LAY-admin-data-submit"
               value="确认">
    </div>
</div>