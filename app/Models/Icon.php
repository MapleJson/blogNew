<?php

namespace App\Models;

use App\Common\PublicModel;

class Icon extends PublicModel
{
    protected $table = 'icons';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}