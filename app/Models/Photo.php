<?php

namespace App\Models;

use App\Common\PublicModel;

class Photo extends PublicModel
{
    protected $table = 'photos';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = ['id', 'desc'];
}