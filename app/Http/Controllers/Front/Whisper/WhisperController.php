<?php

namespace App\Http\Controllers\Front\Whisper;

use App\Http\Services\Whisper\Whispers;

class WhisperController
{
    /**
     * 耳语列表页展示
     * @param Whispers $whispers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function whisper(Whispers $whispers)
    {
        return $whispers->whisper();
    }

    /**
     * 懒加载文章列表，一次加载 5 篇文章
     * @param Whispers $whispers
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadWhisper(Whispers $whispers)
    {
        return $whispers->loadWhisper();
    }
}
