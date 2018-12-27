<?php

namespace App\Models;

use App\Common\PublicModel;
use App\Ext\Code;

class Tag extends PublicModel
{
    protected $table = 'tags';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $pivot = [];

    public static $orderBy = ['id', 'desc'];

    public function blog()
    {
        return $this->belongsToMany(Blog::class)
            ->where('state', Code::ENABLED_STATUS);
    }

    /**
     * 重写 删除
     *
     * @param int|array $id
     * @return mixed
     * @throws \Exception
     */
    public static function delToData($id = null)
    {
        if (is_array($id)) {
            self::$whereIn['id'] = $id;

            $clients = parent::getList();
            foreach ($clients as $client) {
                self::delDetach($client);
            }
        } else {
            $client = parent::getOne($id);
            self::delDetach($client);
        }
        return parent::delToData($id);
    }

    private static function delDetach($client)
    {
        $blogIds = [];
        foreach ($client->blog as $item) {
            $blogIds[] = $item->id;
        }
        if (!empty($blogIds)) {
            $client->blog()->detach($blogIds);
        }
    }

}