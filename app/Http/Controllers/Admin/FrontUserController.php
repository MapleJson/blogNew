<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\FrontUser;

class FrontUserController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = '';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'frontUserUpdate';

    public function index()
    {
        return $this->responseView('frontUser.list');
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        FrontUser::$limit = $this->getPageOffset(self::limitParam());
        $data = FrontUser::getList();
        $this->setCount(FrontUser::getListCount());
        return $this->responseJson($data);
    }

    /**
     * 获取需要注册的模型
     *
     * @return FrontUser
     */
    public function getModelAccessor()
    {
        return app(FrontUser::class);
    }
}