<?php

namespace App\Http\Controllers\Front\About;

use App\Common\FrontController;

class AboutController extends FrontController
{
    /**
     * 关于我内容展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return $this->responseView('about.index');
    }

    /**
     * 互推
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function hutui()
    {
        return $this->responseView('about.hutui');
    }
}
