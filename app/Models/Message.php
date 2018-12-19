<?php

namespace App\Models;

use App\Common\PublicModel;

class Message extends PublicModel
{
    protected $table = 'messages';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = ['id', 'desc'];

}