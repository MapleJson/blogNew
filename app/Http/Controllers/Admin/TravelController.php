<?php

namespace App\Http\Controllers\Admin;

use App\Common\AdminController;

class TravelController extends AdminController
{
    public function index()
    {
        return $this->responseView('travel.list');
    }

}