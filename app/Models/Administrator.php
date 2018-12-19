<?php

namespace App\Models;

use App\Common\PublicModel;
use Illuminate\Auth\Authenticatable;

class Administrator extends PublicModel implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;

    protected $table = 'admin_users';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

}