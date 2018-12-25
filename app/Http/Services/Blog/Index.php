<?php

namespace App\Http\Services\Blog;

use App\Common\FrontController;
use App\Ext\Code;
use App\Http\Services\FrontCommon;
use App\Models\Blog;
use App\Models\Photo;

class Index extends FrontController
{
    public static $data = [
        'propose' => [],
        'tags'    => [],
    ];

    public function blogList()
    {
        /*
         * 博客列表
         */
        if ($this->checkTemplate('!morning')) {
            list(self::$data['blogs'],
                self::$data['pages'],
                self::$data['current']
                ) = $this->getBlog();
            // 精选图片
            self::$data['featured'] = $this->getFeatured();
        }
        /*
         * 站长推荐
         */
        self::$data['propose'] = FrontCommon::recommendBlog();
        /*
         * 标签
         */
        self::$data['tags'] = FrontCommon::getTags();

        return $this->responseView('blog.index');
    }

    /**
     * 获取博客列表
     * @return mixed
     */
    private function getBlog()
    {
        $this->setPageLimit();
        Blog::$limit = $limit =$this->getPageOffset(self::limitParam());
        $posts       = Blog::getList();
        /*
         * 分页
         */
        $pages = ceil(Blog::getListCount() / $limit['limit']);
        Blog::_destroy();

        foreach ($posts as &$post) {
            $post->img = self::uploadImageUrl($post->img);
        }
        return [$posts, $pages, $limit['page']];
    }

    /**
     * 获取相册中精选照片
     * @return mixed
     */
    private function getFeatured()
    {
        Photo::$where   = [
            'state' => Code::ENABLED_STATUS,
        ];
        Photo::$limit   = [
            'limit'  => Code::SIX,
            'offset' => Code::ZERO,
        ];
        Photo::$groupBy = 'travelId';
        $photos         = Photo::getList();
        foreach ($photos as &$photo) {
            $photo->img = self::uploadImageUrl($photo->img);
        }
        return $photos;
    }
}