<?php

namespace App\Http\Services\Message;

use App\Common\FrontController;
use App\Ext\Code;
use App\Models\Blog;
use App\Models\Message;

class Create extends FrontController
{
    public static $data = [
        'message' => [],
    ];

    public function createMessage()
    {
        $post = self::getValidateParam(__FUNCTION__);

        /*
         * 去除内容两端各种奇葩空格
         */
        $post['content'] = trim(
            $post['content'],
            chr(38) . chr(110) . chr(98) .
            chr(115) . chr(112) . chr(59)
        );
        $post['content'] = trim($post['content'], "&nbsp;");
        $post['content'] = trim($post['content'], " &nbsp;");
        /*
         * 还是有空格的话。。。那就放过它吧，它也在努力着！
         */

        /*
         * 添加留言，此处默认通过审核，可以修改为审核后才展示
         * 'state'    => Code::DISABLED_STATUS
         */
        Message::$data = [
            'avatar'   => auth()->user()->avatar,
            'username' => auth()->user()->username,
            'content'  => trim($post['content']),
            'state'    => Code::ENABLED_STATUS,
            'reply'    => Code::ZERO,
        ];
        if (empty($post['articleId'])) {
            Message::$data['articleId'] = Code::EMPTY;
        } else {
            Message::$data['articleId'] = (int)trim($post['articleId']);
            $this->incrementComments((int)trim($post['articleId']));
        }
        if (empty($post['parentId'])) {
            Message::$data['parentId'] = Code::EMPTY;
            Message::$data['targetId'] = Code::EMPTY;
        } else {
            Message::$data['parentId']   = (int)trim($post['parentId']);
            Message::$data['targetId']   = (int)trim($post['targetId']);
            Message::$data['targetUser'] = trim($post['targetUser']);
        }
        if (!Message::addToData()) {
            return $this->responseJson(Code::FAIL_TO_MESSAGE);
        }

        return $this->responseJson(Code::SUCCESS, $this->translateInfo(Code::MESSAGE_SUCCESS));
    }

    /**
     * 增加留言数
     *
     * @param int $id
     */
    private function incrementComments(int $id)
    {
        Blog::where('id', $id)->increment('comments', Code::ONE);
    }
}