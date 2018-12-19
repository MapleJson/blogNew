<?php

namespace App\Http\Controllers\Front\Home;

use App\Http\Services\Home\Index;
use App\Http\Services\Home\RssFeed;
use App\Http\Services\Home\SiteMap;

class HomeController
{
    /**
     * 首页展示
     * @param Index $index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Index $index)
    {
        return $index->homePage();
    }

    /**
     * 订阅
     *
     * @param RssFeed $feed
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function rss(RssFeed $feed)
    {
        return response($feed->getRSS(), 200, [
            'Content-type' => 'application/rss+xml;charset=utf-8'
        ]);
    }

    /**
     * 网站地图
     *
     * @param SiteMap $siteMap
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function siteMap(SiteMap $siteMap)
    {
        return response($siteMap->getSiteMap(), 200, [
            'Content-type' => 'text/xml'
        ]);
    }
}
