<?php

namespace App\Models;

use App\Common\PublicModel;
use App\Ext\Code;

class Baby extends PublicModel
{
    protected $table = 'baby_log';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = '`id` desc';

    /**
     * 判断是否还有未完成的母乳行为
     *
     * @return bool
     */
    public static function hasUndoneAction()
    {
        self::$where = [
            'status' => Code::TWO,
            'action' => Code::ONE
        ];

        if (self::getOne()) {
            return true;
        }
        return false;
    }

}
