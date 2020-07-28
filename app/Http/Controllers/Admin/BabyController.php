<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Ext\Code;
use App\Models\Baby;

class BabyController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'babyStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'babyStoreUpdate';

    public function index()
    {
        return $this->responseView('baby.list');
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        Baby::$limit = $this->getPageOffset(self::limitParam());

        $get = self::getValidateParam('babySearch');
        empty($get['day']) ?: Baby::$where['day'] = (string)$get['day'];
        $data = Baby::getList();
        $this->setCount(Baby::getListCount());
        return $this->responseJson($data);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Baby
     */
    public function getModelAccessor()
    {
        return app(Baby::class);
    }

    /**
     * 新增数据
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $model = $this->getModelAccessor();

        $model::$data = self::getValidateParam($this->storeValidate);
        if (in_array($model::$data['action'], [Code::ONE, Code::TWO]) && $model::hasUndoneAction()) {
            return $this->responseJson(Code::HAS_UNDONE);
        }
        (int)$model::$data['action'] !== Code::ONE ?: Baby::$data['status'] = Code::TWO;
        $model::$data['day'] = date('Y-m-d');
        if ($model::addToData()) {
            return $this->responseJson();
        }
        return $this->responseJson(Code::FAIL_TO_ADD);
    }

    /**
     * 编辑数据
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id)
    {
        $model = $this->getModelAccessor();

        $model::$data = self::getValidateParam($this->updateValidate);
        $model::$where['id'] = $id;
        if ($model::editToData()) {
            return $this->responseJson();
        }
        return $this->responseJson(Code::FAIL_TO_EDIT);
    }
}
