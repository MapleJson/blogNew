<?php

namespace App\Http\Services\Home;

use App\Common\FrontController;
use App\Http\Services\FrontCommon;
use App\Models\Blog;
use App\Models\Carousel;
use App\Ext\Code;

class Index extends FrontController
{
    /**
     * @var array
     */
    public static $data = [
        'blogs'   => [],
        'topPic'  => [],
        'banners' => [],
        'rights'  => [],
        'propose' => [],
        'tags'    => [],
    ];

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function homePage()
    {
        $this->getCarousel();

        /*
         * 文章列表
         */
        self::$data['blogs'] = $this->getBlog();
        /*
         * 站长推荐
         */
        self::$data['propose'] = FrontCommon::recommendBlog();
        /*
         * 标签
         */
        self::$data['tags'] = FrontCommon::getTags();

        return $this->responseView('home.index');
    }

    /**
     * 首页文章列表
     * @return mixed
     */
    private function getBlog()
    {
        Blog::$limit = [
            'limit'  => $this->siteConfig->blogShowCount,
            'offset' => 0,
        ];
        $posts       = Blog::getList();
        Blog::_destroy();
        foreach ($posts as &$post) {
            $post->img = self::uploadImageUrl($post->img);
        }
        return $posts;
    }

    /**
     * 首页顶部图片和轮播
     */
    private function getCarousel()
    {
        Carousel::$where = ['state' => Code::ENABLED_STATUS];
        $carousels       = Carousel::getList();
        foreach ($carousels as $carousel) {
            $carousel->img = self::uploadImageUrl($carousel->img);
            if ($carousel->type === Code::TOP_PIC_TYPE) {
                if (count(self::$data['topPic']) <= $this->siteConfig->topPicCount) {
                    self::$data['topPic'][] = $carousel;
                }
            } elseif ($carousel->type === Code::CAROUSEL_TYPE) {
                if (count(self::$data['banners']) <= $this->siteConfig->bannersCount) {
                    self::$data['banners'][] = $carousel;
                }
            } elseif ($carousel->type === Code::RIGHT_SMALL_TYPE) {
                if (count(self::$data['rights']) <= Code::TWO) {
                    self::$data['rights'][] = $carousel;
                }
            }
        }
    }
}