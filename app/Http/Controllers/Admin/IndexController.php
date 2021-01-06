<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Ext\Code;
use App\Models\About;
use App\Models\Administrator;
use App\Models\AdminMenu;

/**
 * 首页
 *
 * Class IndexController
 *
 * @package App\Http\Controllers\Admin
 */
class IndexController extends AdminController
{
    public function redirect()
    {
        return redirect(route('admin.layout'));
    }

    /**
     * 后台布局
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function layout()
    {
        $menus = [];

        AdminMenu::$orderBy = ['order', 'ASC'];
        $adminMenus = AdminMenu::getList()->toArray();
        foreach ($adminMenus as $adminMenu) {
            if (!$adminMenu['parent_id']) {
                $adminMenu['url'] = $this->getMenuUrl($adminMenu);
                $menus[$adminMenu['id']] = $adminMenu;
            }
        }
        foreach ($adminMenus as $adminMenu) {
            if ($adminMenu['parent_id']) {
                $adminMenu['url'] = $this->getMenuUrl($adminMenu);
                $menus[$adminMenu['parent_id']]['child'][] = $adminMenu;
            }
        }

        $born = null;
        $setting = About::getOne(Code::ONE);
        if ($setting->birthday) {
            $birthday = date_create($setting->birthday);
            $now = date_create(date('Y-m-d H:i:s'));
            $interval = date_diff($birthday, $now);
            $born = $interval->format(('%r%y年%r%m月%r%d天%r%h时%r%i分'));
        }

        return $this->responseView('layout', compact('menus', 'born'));
    }

    /**
     * 获取菜单链接
     *
     * @param $menu
     * @return mixed
     */
    private function getMenuUrl($menu)
    {
        if (!empty($menu['name'])) {
            return config('app.secure') ?
                str_replace('https:', '', route($menu['name'])) :
                str_replace('http:', '', route($menu['name']));
        }
        return $menu['uri'];
    }

    /**
     * 后台首页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->responseView('index.index');
    }

    /**
     * 个人资料
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userInfo()
    {
        return $this->responseView('index.userInfo');
    }

    /**
     * 更新个人资料
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdminUser(int $id)
    {
        Administrator::$data = self::getValidateParam(__FUNCTION__);

        Administrator::$where['id'] = (int)$id;
        if (Administrator::editToData()) {
            return redirect(route('admin.userInfo'))->with(['status' => '更新用户成功']);
        }
        return redirect(route('admin.userInfo'))->withErrors(['status' => '系统错误']);
    }

    /**
     * 修改密码页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePwd()
    {
        return $this->responseView('index.changePwd');
    }

    /**
     * 修改密码
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updatePwd($id)
    {
        $put = self::getValidateParam(__FUNCTION__);

        Administrator::$where['id'] = (int)$id;
        Administrator::$data['password'] = bcrypt($put['password']);
        if (Administrator::editToData()) {
            return redirect(route('admin.changePwd'))->with(['status' => '修改密码成功']);
        }
        return redirect(route('admin.changePwd'))->withErrors(['status' => '系统错误']);
    }

}
