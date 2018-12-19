<?php

namespace App\Models;

use App\Common\PublicModel;

class AdminMenu extends PublicModel
{
    protected $table = 'admin_menu';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

}