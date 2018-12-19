<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\Administrator;
use App\Models\AdminMenu;

/**
 * 首页
 *
 * Class IndexController
 * @package App\Http\Controllers\Admin
 */
class IndexController extends AdminController
{
    /**
     * 后台布局
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function layout()
    {
        $menus = [];

        AdminMenu::$orderBy = ['order', 'ASC'];
        $adminMenus         = AdminMenu::getList()->toArray();
        foreach ($adminMenus as $adminMenu) {
            if (!$adminMenu['parent_id']) {
                $menus[$adminMenu['id']] = $adminMenu;
            }
        }
        foreach ($adminMenus as $adminMenu) {
            if ($adminMenu['parent_id']) {
                $menus[$adminMenu['parent_id']]['child'][] = $adminMenu;
            }
        }
        return $this->responseView('layout', compact('menus'));
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
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updatePwd($id)
    {
        $put = self::getValidateParam(__FUNCTION__);

        Administrator::$where['id']      = (int)$id;
        Administrator::$data['password'] = bcrypt($put['password']);
        if (Administrator::editToData()) {
            return redirect(route('admin.changePwd'))->with(['status' => '修改密码成功']);
        }
        return redirect(route('admin.changePwd'))->withErrors(['status' => '系统错误']);
    }

}
