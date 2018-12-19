<?php

namespace App\Http\Services\Travels;

use App\Common\FrontController;
use App\Ext\Code;
use App\Http\Services\FrontCommon;
use App\Models\Travel;

class Index extends FrontController
{
    public static $data = [
        'galleries' => [],
        'propose'   => [],
    ];

    /**
     * 相册列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function travels()
    {
        /*
         * 相册
         */
        self::$data['galleries'] = $this->getTravels();

        /*
         * 站长推荐
         */
        $data['propose'] = FrontCommon::recommendBlog();

        return $this->responseView('travels.index');
    }

    /**
     * 获取相册列表
     * @return mixed
     */
    private function getTravels()
    {
        Travel::$where = ['state' => Code::ENABLED_STATUS];
        $galleries     = Travel::getList();
        foreach ($galleries as &$gallery) {
            $gallery->cover = self::uploadImageUrl($gallery->cover);
        }
        return $galleries;
    }

}