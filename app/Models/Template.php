<?php

namespace App\Models;

use App\Common\PublicModel;

class Template extends PublicModel
{
    protected $table = 'templates';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = '`id` desc';

}