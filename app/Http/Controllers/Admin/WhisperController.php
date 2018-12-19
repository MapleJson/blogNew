<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\Whisper;

class WhisperController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'whisperStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'whisperStoreUpdate';

    public function index()
    {
        return $this->responseView('whisper.list');
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        Whisper::$limit = $this->getPageOffset(self::limitParam());
        $get = self::getValidateParam('whisperSearch');
        if (!empty($get['content'])) {
            Whisper::$where = [['content', 'like', "%{$get['content']}%"]];
        }
        empty($get['state']) ?: Whisper::$where['state'] = (int)$get['state'];
        $data = Whisper::getList();
        $this->setCount(Whisper::getListCount());
        return $this->responseJson($data);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Whisper
     */
    public function getModelAccessor()
    {
        return app(Whisper::class);
    }

    public function formatModelData(string $type = 'store')
    {
        Whisper::$data['author'] = auth('admin')->user()->username;
    }

}