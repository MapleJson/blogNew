<?php

namespace App\Http\Services\Whisper;

use App\Common\FrontController;
use App\Ext\Code;
use App\Http\Services\FrontCommon;
use App\Models\Whisper;

class Whispers extends FrontController
{
    public static $data = [
        'propose' => []
    ];

    /**
     * 耳语页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function whisper()
    {
        self::$data['propose'] = FrontCommon::recommendBlog();

        if ($this->checkTemplate('!morning')) {
            list(self::$data['whispers'],
                self::$data['pages'],
                self::$data['current']
                ) = $this->getWhispers();
        }

        return $this->responseView('whisper.index');
    }

    /**
     * 懒加载文章列表，一次加载 5 篇文章
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadWhisper()
    {
        /*
         * 耳语列表
         */
        list($data, self::$response['pages']) = $this->getWhispers();
        return $this->responseJson($data);
    }

    /**
     * 获取耳语数据
     * @return array
     */
    private function getWhispers()
    {
        /*
         * 耳语列表
         */
        Whisper::_destroy();
        $this->setPageLimit(12);
        Whisper::$limit = $limit = $this->getPageOffset(self::limitParam());
        Whisper::$where = ['state' => Code::ENABLED_STATUS];

        $data = Whisper::getList()->toArray();
        foreach ($data as &$item) {
            $item['created_at'] = date('Y-m-d', strtotime((string)$item['created_at']));
        }
        /*
         * 分页
         */
        $count = Whisper::getListCount();
        $pages = ceil($count / Whisper::$limit['limit']);
        Whisper::_destroy();

        return [$data, $pages, $limit['page']];
    }

}