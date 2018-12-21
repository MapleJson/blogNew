<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\Travel;

class TravelController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'travelStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'travelStoreUpdate';

    public function index()
    {
        return $this->responseView('travel.list');
    }

    public function data()
    {
        Travel::$limit = $this->getPageOffset(self::limitParam());
        $get = self::getValidateParam('travelSearch');
        if (!empty($get['title'])) {
            Travel::$where = [['title', 'like', "%{$get['title']}%"]];
        }
        empty($get['state']) ?: Travel::$where['state'] = (int)$get['state'];
        $travels = Travel::getList();
        $this->setCount(Travel::getListCount());
        foreach ($travels as &$travel) {
            $travel->coverUrl = self::uploadImageUrl($travel->cover);
        }
        return $this->responseJson($travels);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Travel
     */
    public function getModelAccessor()
    {
        return app(Travel::class);
    }

}