<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\Link;

class LinkController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'linkStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'linkStoreUpdate';

    public function index()
    {
        return $this->responseView('link.list');
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        Link::$limit = $this->getPageOffset(self::limitParam());
        $get         = self::getValidateParam('linkSearch');
        if (!empty($get['title'])) {
            Link::$where[] = ['title', 'like', "%{$get['title']}%"];
        }
        if (!empty($get['domain'])) {
            Link::$where[] = ['domain', 'like', "%{$get['domain']}%"];
        }
        empty($get['state']) ?: Link::$where['state'] = (int)$get['state'];
        empty($get['me']) ?: Link::$where['me'] = (int)$get['me'];
        $data = Link::getList();
        $this->setCount(Link::getListCount());
        return $this->responseJson($data);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Link
     */
    public function getModelAccessor()
    {
        return app(Link::class);
    }
}