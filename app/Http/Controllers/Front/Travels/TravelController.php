<?php

namespace App\Http\Controllers\Front\Travels;

use App\Http\Services\Travels\Index;
use App\Http\Services\Travels\TravelPhoto;

class TravelController
{
    /**
     * 展示相册页
     * @param Index $index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function travels(Index $index)
    {
        return $index->travels();
    }

    /**
     * 展示照片页
     * @param int $id
     * @param TravelPhoto $photo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function photo(int $id, TravelPhoto $photo)
    {
        return $photo->photo($id);
    }

    /**
     * 懒加载图片，一次展示8张（两行）
     * @param TravelPhoto $photo
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadPhoto(TravelPhoto $photo)
    {
        return $photo->lazyLoadPhoto();
    }
}
