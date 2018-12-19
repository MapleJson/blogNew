<?php

namespace App\Http\Controllers\Front\Message;

use App\Http\Services\Message\Create;
use App\Http\Services\Message\Index;

class MessageController
{
    /**
     * 展示留言
     * @param Index $index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function message(Index $index)
    {
        return $index->messageList();
    }

    /**
     * 添加留言
     * @param Create $create
     * @return \Illuminate\Http\JsonResponse
     */
    public function addMessage(Create $create)
    {
        return $create->createMessage();
    }
}
