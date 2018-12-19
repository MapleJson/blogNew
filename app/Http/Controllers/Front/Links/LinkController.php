<?php

namespace App\Http\Controllers\Front\Links;

use App\Http\Services\Links\Links;

class LinkController
{
    /**
     * 展示友情链接
     * @param Links $links
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function links(Links $links)
    {
        return $links->index();
    }

    /**
     * 添加友情链接
     * @param Links $links
     * @return \Illuminate\Http\JsonResponse
     */
    public function applyLink(Links $links)
    {
        return $links->applyLink();
    }
}
