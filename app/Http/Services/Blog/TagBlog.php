<?php

namespace App\Http\Services\Blog;

use App\Common\FrontController;
use App\Http\Services\FrontCommon;
use App\Models\Tag;

class TagBlog extends FrontController
{
    public static $data = [
        'noFlow'  => true,
        'blogs'   => [],
        'propose' => [],
        'tags'    => [],
    ];

    /**
     * 根据标签获取文章
     * @param int $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tagBlog(int $tag)
    {
        /*
         * 标签
         */
        Tag::$pivot = ['tag_id' => $tag];

        self::$data['tags'] = FrontCommon::getTags();

        foreach (self::$data['tags'] as $tag) {
            foreach ($tag->blog as $item) {
                $item->img = self::uploadImageUrl($item->img);

                self::$data['blogs'][] = $item;
            }
        }
        /*
         * 站长推荐
         */
        self::$data['propose'] = FrontCommon::recommendBlog();

        return $this->responseView('blog.index');
    }

}