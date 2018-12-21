<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Ext\Code;
use App\Ext\Upload;
use App\Models\Photo;

class PhotoController extends AdminController
{
    use Upload;

    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'photoStore';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'photoUpdate';

    public function index(int $id)
    {
        return $this->responseView('photo.list', compact('id'));
    }

    public function data()
    {
        $get = self::getValidateParam('photoSearch');

        Photo::$limit             = $this->getPageOffset(self::limitParam());
        Photo::$where['travelId'] = (int)$get['id'];
        empty($get['state']) ?: Photo::$where['state'] = (int)$get['state'];

        $photos = Photo::getList();
        $this->setCount(Photo::getListCount());
        foreach ($photos as $photo) {
            $photo->img = self::uploadImageUrl($photo->img);
        }

        return $this->responseJson($photos);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Photo
     */
    public function getModelAccessor()
    {
        return app(Photo::class);
    }

    /**
     * 预处理数据
     * @param string $type
     */
    public function formatModelData(string $type = 'store')
    {
        if ($type === 'store') {
            Photo::$data['img']   = $this->uploadFile(Photo::$data['file']);
            Photo::$data['state'] = Code::ENABLED_STATUS;
            unset(Photo::$data['file']);
        }
    }

}