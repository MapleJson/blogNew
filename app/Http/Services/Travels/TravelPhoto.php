<?php

namespace App\Http\Services\Travels;

use App\Common\FrontController;
use App\Ext\Code;
use App\Models\Photo;
use App\Models\Travel;

class TravelPhoto extends FrontController
{
    public static $data = [];

    /**
     * 展示照片页
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photo(int $id)
    {
        $travel        = Travel::getOne($id);
        $travel->cover = self::uploadImageUrl($travel->cover);

        self::$data = [
            'photos'     => $this->getPhotos($id),
            'travel' => $travel,
        ];

        return $this->responseView('travels.photo');
    }

    /**
     * 懒加载图片，一次展示8张（两行）
     * @return \Illuminate\Http\JsonResponse
     */
    public function lazyLoadPhoto()
    {
        $get = self::getValidateParam(__FUNCTION__);
        /*
         * 相册中的相片
         */
        Photo::_destroy();
        Photo::$limit = $this->getPageOffset(self::limitParam());

        $data = $this->getPhotos((int)$get['id']);

        /*
         * 分页
         */
        $count = Photo::getListCount();

        self::$response['pages'] = ceil($count / Photo::$limit['limit']);

        return $this->responseJson($data);
    }

    /**
     * 获取相册中的所有照片
     * @param int $id
     * @return mixed
     */
    private function getPhotos(int $id)
    {
        Photo::$where = [
            'state'    => Code::ENABLED_STATUS,
            'travelId' => $id,
        ];

        $photos = Photo::getList();
        foreach ($photos as &$photo) {
            $photo->img = self::uploadImageUrl($photo->img);
        }
        return $photos;
    }
}