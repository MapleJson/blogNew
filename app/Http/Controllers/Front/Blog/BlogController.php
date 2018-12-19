<?php

namespace App\Http\Controllers\Front\Blog;

use App\Http\Services\Blog\BlogInfo;
use App\Http\Services\Blog\Index;
use App\Http\Services\Blog\LoadBlog;
use App\Http\Services\Blog\TagBlog;

class BlogController
{
    /**
     * 博客文章列表页展示
     * @param Index $index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog(Index $index)
    {
        return $index->blogList();
    }

    /**
     * 懒加载文章列表，一次加载 5 篇文章
     * @param LoadBlog $loadBlog
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadBlog(LoadBlog $loadBlog)
    {
        return $loadBlog->lazyLoadBlog();
    }

    /**
     * 根据标签ID查找文章
     * @param int $tag
     * @param TagBlog $tagBlog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blogByTag(int $tag, TagBlog $tagBlog)
    {
        return $tagBlog->tagBlog($tag);
    }

    /**
     * 展示文章内容
     * @param int $id
     * @param BlogInfo $blogInfo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info(int $id, BlogInfo $blogInfo)
    {
        return $blogInfo->info($id);
    }
}
