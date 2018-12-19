<?php

namespace App\Models;

use App\Common\PublicModel;

class Whisper extends PublicModel
{
    protected $table = 'whispers';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = ['id', 'desc'];

}
