<?php

namespace App\Http\Services\Blog;

use App\Common\FrontController;
use App\Ext\Code;
use App\Http\Services\FrontCommon;
use App\Models\Blog;
use App\Models\Message;
use Illuminate\Support\Facades\Cookie;

class BlogInfo extends FrontController
{
    public static $data = [
        'pre'     => [],
        'next'    => [],
        'message' => [],
        'related' => [], // 相关文章，暂未做
        'propose' => [],
    ];

    public function info(int $id)
    {
        /*
         * 文章内容
         */
        self::$data['info'] = $this->getBlogInfo($id);
        if (empty(self::$data['info'])) {
            return $this->errorView(404);
        }
        /*
         * 上一篇
         */
        if ($pre = $this->getPrevArticleId($id)) {
            self::$data['pre'] = Blog::getOne($pre);
        }
        /*
         * 下一篇
         */
        if ($next = $this->getNextArticleId($id)) {
            self::$data['next'] = Blog::getOne($next);
        }

        /*
         * 标签
         */
        self::$data['tags'] = FrontCommon::getTags();

        /*
         * 文章留言
         */
        self::$data['message'] = $this->getBlogMessage($id);

        /*
         * 登陆用户名
         */
        self::$data['authUser'] = '';
        if (auth()->check()) {
            self::$data['authUser'] = auth()->user()->username;
        }

        /*
         * 站长推荐
         */
        self::$data['propose'] = FrontCommon::recommendBlog();

        Cookie::queue("detail{$id}", true, 1440);

        return $this->responseView('blog.info');

    }

    /**
     * 获取下一篇文章的ID
     *
     * 因为列表页是按照时间倒序排列
     * 所以下一篇的id应该比当前文章id小
     *
     * @param int $id
     * @return mixed
     */
    private function getNextArticleId(int $id)
    {
        return Blog::where('id', '<', $id)
            ->where('state', Code::ENABLED_STATUS)
            ->max('id');
    }

    /**
     * 获取上一篇文章的ID
     *
     * 因为列表页是按照时间倒序排列
     * 所以上一篇的id应该比当前文章id大
     *
     * @param int $id
     * @return mixed
     */
    private function getPrevArticleId(int $id)
    {
        return Blog::where('id', '>', $id)
            ->where('state', Code::ENABLED_STATUS)
            ->min('id');
    }

    /**
     * 文章内容
     * @param int $id
     * @return mixed
     */
    private function getBlogInfo(int $id)
    {
        Blog::_destroy();
        $info = Blog::getOne($id);
        if (empty($info)) {
            return false;
        }
        if (!Cookie::has("detail{$id}")) {
            $info->read += Code::YES;
            $info->save();
        }
        $info->img = self::uploadImageUrl($info->img);

        return $info;
    }

    /**
     * 文章留言
     * @param int $id
     * @return mixed
     */
    private function getBlogMessage(int $id)
    {
        Message::$where['articleId'] = $id;

        Message::$limit = [
            'limit'  => $this->siteConfig->messageCount,
            'offset' => 0,
        ];

        return $this->sortMessage(Message::getList()->toArray());
    }

}