<?php

namespace App\Models;

use App\Common\PublicModel;

class Carousel extends PublicModel
{
    protected $table = 'carousels';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = ['id', 'desc'];

}