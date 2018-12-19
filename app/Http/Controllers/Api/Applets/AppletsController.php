<?php

namespace App\Http\Controllers\Api\Applets;

use App\Ext\Code;
use App\Models\Blog;
use App\Models\Photo;
use App\Models\Travel;
use App\Models\Whisper;
use App\Common\FrontController;

class AppletsController extends FrontController
{
    /**
     * 懒加载文章列表，一次加载 5 篇文章
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadBlog()
    {
        /*
         * 文章列表
         */
        Blog::_destroy();
        Blog::$limit = $this->getPageOffset(self::limitParam());
        Blog::$where = ['state' => Code::ENABLED_STATUS];

        $posts = Blog::getList();
        foreach ($posts as $key => &$post) {
            $post->img = self::uploadImageUrl($post->img);
        }
        /*
         * 分页
         */
        $count = Blog::getListCount();

        self::$response['pages'] = ceil($count / Blog::$limit['limit']);

        return $this->responseJson($posts);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function travels()
    {
        /*
         * 相册
         */
        Travel::_destroy();
        Travel::$where = ['state' => Code::ENABLED_STATUS];
        $data          = Travel::getList();
        foreach ($data as &$gallery) {
            $gallery->cover = self::uploadImageUrl($gallery->cover);
        }
        return $this->responseJson($data);
    }

    /**
     * 懒加载图片，一次展示8张（两行）
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadPhoto()
    {
        $get = self::getValidateParam(__FUNCTION__);
        /*
         * 相册中的相片
         */
        Photo::_destroy();
        Photo::$limit = $this->getPageOffset(self::limitParam());
        Photo::$where = [
            'state'    => Code::ENABLED_STATUS,
            'travelId' => (int)$get['id'],
        ];

        $photos = Photo::getList();
        foreach ($photos as &$photo) {
            $photo->img = self::uploadImageUrl($photo->img);
        }

        /*
         * 分页
         */
        $count = Photo::getListCount();

        self::$response['pages'] = ceil($count / Photo::$limit['limit']);

        return $this->responseJson($photos);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function whisper()
    {
        /*
         * 文章列表
         */
        Whisper::_destroy();
        Whisper::$limit = $this->getPageOffset(self::limitParam());
        Whisper::$where = ['state' => Code::ENABLED_STATUS];

        $data = Whisper::getList()->toArray();
        foreach ($data as &$item) {
            $item['created_at'] = date("Y年m月d", strtotime((string)$item['created_at']));
        }

        /*
         * 分页
         */
        $count = Whisper::getListCount();

        self::$response['pages'] = ceil($count / Whisper::$limit['limit']);

        return $this->responseJson($data);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function about()
    {
        return $this->responseJson($this->siteConfig);
    }
}
