<?php

namespace App\Models;

use App\Common\PublicModel;

class About extends PublicModel
{
    protected $table = 'about';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}