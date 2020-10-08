<?php

namespace App\Http\Services\Blog;

use App\Common\FrontController;
use App\Ext\Code;
use App\Models\Blog;

class LoadBlog extends FrontController
{
    /**
     * 懒加载文章列表，一次加载 5 篇文章
     * @return \Illuminate\Http\JsonResponse
     */
    public function lazyLoadBlog()
    {
        /*
         * 文章列表
         */
        Blog::_destroy();
        Blog::$limit = $this->getPageOffset(self::limitParam());
        Blog::$where = ['state' => Code::ENABLED_STATUS];

        $blog = Blog::getList();
        $data = $blog->toArray();
        foreach ($blog as $key => $item) {
            $data[$key]['img'] = self::uploadImageUrl($item->img);
            foreach ($item->tags as $tag) {
                $data[$key]['tags'][] = $tag->name;
            }
        }
        /*
         * 分页
         */
        self::$response['pages'] = ceil(Blog::getListCount() / Blog::$limit['limit']);

        return $this->responseJson($data);
    }

}
