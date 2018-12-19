<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;
use App\Models\Carousel;

class CarouselController extends AdminController
{
    /**
     * 添加参数验证规则
     * @var string
     */
    public $storeValidate = 'carouselStoreUpdate';

    /**
     * 更新参数验证规则
     * @var string
     */
    public $updateValidate = 'carouselStoreUpdate';

    public function index()
    {
        return $this->responseView('carousels.list');
    }

    /**
     * 获取数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        Carousel::$limit = $this->getPageOffset(self::limitParam());
        $carousels = Carousel::getList();
        $this->setCount(Carousel::getListCount());
        foreach ($carousels as &$carousel) {
            $carousel->imgUrl = self::uploadImageUrl($carousel->img);
        }
        return $this->responseJson($carousels);
    }

    /**
     * 获取需要注册的模型
     *
     * @return Carousel
     */
    public function getModelAccessor()
    {
        return app(Carousel::class);
    }

}