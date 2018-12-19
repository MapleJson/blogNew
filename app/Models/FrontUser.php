<?php

namespace App\Models;

use App\Common\PublicModel;

class FrontUser extends PublicModel
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = ['id', 'desc'];
}