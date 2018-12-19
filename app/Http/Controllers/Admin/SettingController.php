<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Ext\Code;
use App\Models\About;

class SettingController extends AdminController
{
    public function index()
    {
        $set = About::getOne(Code::ONE);
        if (!empty($set->weChatQR)) {
            $set->weChatQRImg = self::uploadImageUrl($set->weChatQR);
        }
        return $this->responseView('setting.website', compact('set'));
    }

    /**
     * 编辑站点配置信息
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id)
    {
        About::$data = self::getValidateParam('settingUpdate');

        About::$where['id'] = $id;
        if (About::editToData()) {
            return $this->responseJson();
        }
        return $this->responseJson(self::translateInfo(Code::FAIL_TO_EDIT));
    }

}