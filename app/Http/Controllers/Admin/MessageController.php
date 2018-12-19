<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Ext\Code;
use App\Models\Blog;
use App\Models\Message;

class MessageController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'messageStore';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'messageUpdate';

    public function index()
    {
        return $this->responseView('message.list');
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        Message::$limit = $this->getPageOffset(self::limitParam());
        $get            = self::getValidateParam('messageSearch');
        if (!empty($get['content'])) {
            Message::$where = [['content', 'like', "%{$get['content']}%"]];
        }
        empty($get['state']) ?: Message::$where['state'] = (int)$get['state'];
        $data = Message::getList();
        $this->setCount(Message::getListCount());
        return $this->responseJson($data);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Message
     */
    public function getModelAccessor()
    {
        return app(Message::class);
    }

    public function formatModelData(string $type = 'store')
    {
        /*
         * 回复留言，此处默认通过审核，可以修改为审核后才展示
         * 'state'    => Code::DISABLED_STATUS
         */
        if ($type === 'store') {
            Message::$data['avatar']   = self::uploadImageUrl(auth('admin')->user()->avatar);
            Message::$data['username'] = auth('admin')->user()->username;
            Message::$data['reply']    = Code::ONE;
            if (empty(Message::$data['articleId'])) {
                Message::$data['articleId'] = Code::EMPTY;
            } else {
                Blog::where('id', (int)trim(Message::$data['articleId']))->increment('comments', Code::ONE);
            }
        }
    }
}