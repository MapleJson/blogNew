<?php

namespace App\Http\Services\Message;

use App\Common\FrontController;
use App\Ext\Code;
use App\Models\Message;

class Index extends FrontController
{
    public static $data = [
        'message' => [],
    ];

    public function messageList()
    {
        /*
         * 留言列表
         */
        Message::$where = [
            'state'     => Code::ENABLED_STATUS,
            'articleId' => Code::EMPTY,
        ];
        Message::$limit = [
            'limit'  => $this->siteConfig->messageCount,
            'offset' => 0,
        ];
        /*
         * 留言排序
         */
        self::$data['message'] = $this->sortMessage(Message::getList()->toArray());
        /*
         * 登陆用户名
         */
        self::$data['authUser'] = '';
        if (auth()->check()) {
            self::$data['authUser'] = auth()->user()->username;
        }

        return $this->responseView('message.index');
    }
}