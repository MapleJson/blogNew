<?php

namespace App\Http\Services\Search;

use App\Common\FrontController;
use App\Ext\Code;
use App\Models\Blog;

class Search extends FrontController
{
    /**
     * 搜索功能
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        $post = self::getValidateParam(__FUNCTION__);

        $post['keyboard'] = trim($post['keyboard']);
        /*
         * 搜索标题与搜索内容有关的文章，可添加简介和文章内容模糊搜索
         */
        Blog::$where = [
            ['state', '=', Code::ENABLED_STATUS],
            ['title', 'like', "%{$post['keyboard']}%"],
        ];

        $blog = Blog::getList();

        $data = [];
        foreach ($blog as $key => $item) {
            $data[$key] = [
                'id'    => (int)$item->id,
                'title' => $item->title,
            ];
        }

        return $this->responseJson($data);
    }
}