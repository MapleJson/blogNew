
//监听搜索
form.on('submit(LAY-admin-data-forum-search)', function (data) {
    var field = data.field;

    //执行重载
    table.reload('LAY-admin-data-list', {
        where: field
    });
});

// 删除数据
function delData(id, callback) {
    layer.confirm('确定删除吗？', function (index) {
        //执行 Ajax 后重载
        admin.req({
            url: delUrl
            , type: 'POST'
            , data: {id: id, _method: 'DELETE'}
            , done: function (res) {
                callback();
                layer.msg('已删除');
            }
        });
    });
}

// 更新数据
function updateData(type, url) {
    //提交 Ajax 成功后，静态更新表格中的数据
    form.on('submit(LAY-admin-data-submit)', function (data) {
        if(typeof(formatUpdateData) === 'function') data = formatUpdateData(data);
        if (type === 'PUT') data.field._method = 'PUT';
        admin.req({
            url: url
            , type: 'POST'
            , data: data.field
            , done: function (res) {
                layer.msg(res.msg);
                setAddPop(); //清除提交表单的数据
                table.reload('LAY-admin-data-list'); //数据刷新
                layer.closeAll(); //关闭弹层
            }
        });
    });
}

//事件
var active = {
    batchdel: function () {
        var checkStatus = table.checkStatus('LAY-admin-data-list')
            , checkData = checkStatus.data; //得到选中的数据

        if (checkData.length === 0) {
            return layer.msg('请选择数据');
        }

        var id = [];
        layui.each(checkData, function (i, t) {
            id.push(t.id);
        });

        delData(id, function () {
            table.reload('LAY-admin-data-list');
        });
    }
    , add: function () {
        setAddPop();
        form.render();
        layer.open({
            type: 1
            , title: '添加' + title
            , content: $('#lay-admin-data-form')
            , maxmin: true
            , area: popArea
            , success: function (layero, index) {
                (typeof(layerOpenSuccess) === 'function') && layerOpenSuccess()
            }
        });
        updateData('POST', addUrl);
    }
};

//监听工具条
table.on('tool(LAY-admin-data-list)', function (obj) {
    var id = obj.data.id;
    if (obj.event === 'del') {
        delData(id, function () {
            obj.del();
        });
    } else if (obj.event === 'edit') {
        setEditPop(obj.data);
        form.render();
        layer.open({
            type: 1
            , title: '编辑' + title
            , content: $('#lay-admin-data-form')
            , maxmin: true
            , area: popArea
            , success: function (layero, index) {
                (typeof(layerOpenSuccess) === 'function') && layerOpenSuccess()
            }
            , cancel: function(index, layero){
                (typeof(cancelPop) === 'function') && cancelPop()
            }
        });
        updateData('PUT', editUrl + id);
    }
    (typeof(tableOnTool) === 'function') && tableOnTool(obj)
});

$('.layui-btn.layuiadmin-btn-forum-list').on('click', function () {
    var type = $(this).data('type');
    active[type] ? active[type].call(this) : '';
});
