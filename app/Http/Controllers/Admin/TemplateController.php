<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\Template;

class TemplateController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'templateStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'templateStoreUpdate';

    public function index()
    {
        return $this->responseView('template.list');
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        Template::$limit = $this->getPageOffset(self::limitParam());

        $get = self::getValidateParam('templateSearch');
        empty($get['state']) ?: Template::$where['state'] = (int)$get['state'];
        $data = Template::getList();
        $this->setCount(Template::getListCount());
        return $this->responseJson($data);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Template
     */
    public function getModelAccessor()
    {
        return app(Template::class);
    }
}