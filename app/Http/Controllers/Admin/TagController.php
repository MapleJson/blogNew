<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Ext\Code;
use App\Models\Tag;

class TagController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'tagStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'tagStoreUpdate';

    public function index()
    {
        return $this->responseView('tag.list');
    }

    /**
     * 获取数据
     * @param int $state
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(int $state = Code::ZERO)
    {
        $get = self::getValidateParam('tagSearch');
        if (!empty($get['name'])) {
            Tag::$where = [['name', 'like', "%{$get['name']}%"]];
        }
        empty($get['state']) ?: Tag::$where['state'] = (int)$get['state'];
        if ($state) {
            Tag::$where['state'] = Code::ENABLED_STATUS;
        } else {
            Tag::$limit = $this->getPageOffset(self::limitParam());
        }
        $tags = Tag::getList();
        $this->setCount(Tag::getListCount());
        return $this->responseJson($tags);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Tag
     */
    public function getModelAccessor()
    {
        return app(Tag::class);
    }

}