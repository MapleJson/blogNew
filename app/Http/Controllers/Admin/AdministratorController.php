<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\Administrator;

class AdministratorController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'administratorStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'administratorStoreUpdate';

    public function index()
    {
        return $this->responseView('administrator.list');
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        Administrator::$limit = $this->getPageOffset(self::limitParam());

        $get = self::getValidateParam('administratorSearch');
        if (!empty($get['username'])) {
            Administrator::$where = [['username', 'like', "%{$get['username']}%"]];
        }
        $data = Administrator::getList();
        foreach ($data as &$datum) {
            $datum->avatarUrl = self::uploadImageUrl($datum->avatar);
        }
        $this->setCount(Administrator::getListCount());
        return $this->responseJson($data);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Administrator
     */
    public function getModelAccessor()
    {
        return app(Administrator::class);
    }

    public function formatModelData(string $type = 'store')
    {
        if ($type === 'update' && empty(Administrator::$data['password'])) {
            unset(Administrator::$data['password']);
        } else {
            Administrator::$data['password'] = bcrypt(Administrator::$data['password']);
        }
    }
}