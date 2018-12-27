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
        self::$data['tags'] = FrontCommon::getTags();

        list(self::$data['blogs'],
            self::$data['limit'],
            self::$data['pages'],
            self::$data['current']
            ) = $this->getTagBlog($tag);
        /*
         * 站长推荐
         */
        self::$data['propose'] = FrontCommon::recommendBlog();

        return $this->responseView('blog.index');
    }

    private function getTagBlog(int $id)
    {
        $this->setPageLimit();
        $limit = $this->getPageOffset(self::limitParam());
        $tag   = Tag::getOne($id);
        $posts = $tag->blog()
            ->orderBy('isTop', 'asc')
            ->orderBy('id', 'desc')
            ->limit($limit['limit'])
            ->offset($limit['offset'])
            ->get();
        foreach ($posts as &$post) {
            $post->img = self::uploadImageUrl($post->img);
        }
        return [
            $posts,
            $limit['limit'],
            ceil($tag->blog()->count() / $limit['limit']),
            $limit['page']
        ];
    }

}