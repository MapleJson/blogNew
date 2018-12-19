<?php

namespace App\Models;

use App\Common\PublicModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OperationLog extends PublicModel
{
    protected $table = 'admin_operation_log';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $orderBy = ['id', 'DESC'];

    public static $methods = [
        'GET', 'POST', 'PUT', 'DELETE', 'OPTIONS', 'PATCH',
        'LINK', 'UNLINK', 'COPY', 'HEAD', 'PURGE',
    ];

    /**
     * Log belongs to users.
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(Administrator::class);
    }

}