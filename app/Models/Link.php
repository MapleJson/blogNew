<?php

namespace App\Models;

use App\Common\PublicModel;

class Link extends PublicModel
{
    protected $table = 'links';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = ['id', 'desc'];

}