<?php

namespace App\Models;

use App\Common\PublicModel;

class Travel extends PublicModel
{
    protected $table = 'travels';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = ['id', 'desc'];
}