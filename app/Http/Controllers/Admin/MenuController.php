<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Ext\Code;
use App\Models\AdminMenu;
use App\Models\Icon;

class MenuController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'menuStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'menuStoreUpdate';

    public function index()
    {
        return $this->responseView('administrator.menus');
    }

    /**
     * icon图标
     * @return \Illuminate\Http\JsonResponse
     */
    public function icons()
    {
        return $this->responseJson(Icon::getList());
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        AdminMenu::$orderBy = ['order', 'ASC'];

        $menus = AdminMenu::getList()->toArray();
        AdminMenu::_destroy();

        $data = [];
        foreach ($menus as $parent) {
            if ((int)$parent['parent_id'] === Code::ZERO) {
                $data[(int)$parent['id']] = $parent;
            }
        }
        foreach ($menus as $child) {
            if ((int)$child['parent_id'] > Code::ZERO) {
                $data[$child['parent_id']]['children'][] = $child;
            }
        }

        return $this->responseJson(array_values($data));
    }

    /**
     * 获取需要注册的模型
     *
     * @return AdminMenu
     */
    public function getModelAccessor()
    {
        return app(AdminMenu::class);
    }

    /**
     * 预处理数据
     * @param string $type
     */
    public function formatModelData(string $type = 'store')
    {
        if (!empty(AdminMenu::$data['uri'])) {
            if (substr(AdminMenu::$data['uri'], 0, 6) !== '/admin') {
                AdminMenu::$data['uri'] = '/admin/' . trim(AdminMenu::$data['uri'], '/');
            }
        }
    }
}