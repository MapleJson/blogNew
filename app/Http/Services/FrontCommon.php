<?php

namespace App\Http\Services;

use App\Common\FrontController;
use App\Ext\Code;
use App\Models\Blog;
use App\Models\Tag;

class FrontCommon extends FrontController
{
    /**
     * 获取站长推荐列表
     * @return mixed
     */
    public static function recommendBlog()
    {
        /*
         * 站长推荐
         */
        Blog::_destroy();
        Blog::$where = [
            'recommend' => Code::ENABLED_STATUS,
            'state'     => Code::ENABLED_STATUS,
        ];
        Blog::$limit = [
            'limit'  => config('siteConfig.proposeCount'),
            'offset' => 0,
        ];
        $recommend   = Blog::getList();
        Blog::_destroy();
        foreach ($recommend as &$item) {
            $item->img = self::uploadImageUrl($item->img);
        }

        return $recommend;
    }

    /**
     * 获取标签列表
     * @return mixed
     */
    public static function getTags()
    {
        Tag::$where = ['state' => Code::ENABLED_STATUS];
        $tags       = Tag::getList();
        Tag::_destroy();
        return $tags;
    }
}