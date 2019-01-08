<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\Blog;

class BlogController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'blogStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'blogStoreUpdate';

    public function index()
    {
        return $this->responseView('blog.list');
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        Blog::$limit = $this->getPageOffset(self::limitParam());
        $get         = self::getValidateParam('blogSearch');
        if (!empty($get['title'])) {
            Blog::$where = [['title', 'like', "%{$get['title']}%"]];
        } else {
            empty($get['isTop']) ?: Blog::$where['isTop'] = (int)$get['isTop'];
            empty($get['recommend']) ?: Blog::$where['recommend'] = (int)$get['recommend'];
            empty($get['state']) ?: Blog::$where['state'] = (int)$get['state'];
        }
        $posts = Blog::getList();
        $this->setCount(Blog::getListCount());
        foreach ($posts as &$post) {
            unset($post['content']);
            $post->imgUrl = empty($post->img) ? '' : self::uploadImageUrl($post->img);
            $post->tags   = $post->tags->toArray();
        }
        return $this->responseJson($posts);
    }

    /**
     * 如果列表卡可使用分次查询
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $post = Blog::getOne($id);
        return $this->responseJson($post);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Blog
     */
    public function getModelAccessor()
    {
        return app(Blog::class);
    }

    public function formatModelData(string $type = 'store')
    {
        if (empty(Blog::$data['img'])) {
            unset(Blog::$data['img']);
        }
        Blog::$data['authorName']  = auth('admin')->user()->username;
        Blog::$data['authorEmail'] = auth('admin')->user()->email;
        Blog::$tagId               = explode(',', Blog::$data['tags']);
        unset(Blog::$data['tags']);
    }

}