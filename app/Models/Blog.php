<?php

namespace App\Models;

use App\Ext\Code;
use App\Common\PublicModel;

class Blog extends PublicModel
{
    protected $table = 'blog';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public static $tagId = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->where('state', Code::ENABLED_STATUS);
    }

    public static function getList(int $type = Code::YES)
    {
        // 一般情况下新增的ID越大所以此处我用id，也可以按时间排序self::CREATED_AT
        self::$orderBy = ['isTop', 'asc'];
        return parent::getList($type)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * 与 标签 表关联，需重写
     *
     * @return mixed
     */
    public static function addToData()
    {
        $client = parent::addToData();
        $client->tags()->attach(self::$tagId);
        return $client;
    }

    /**
     * 与 标签 表关联，需重写
     * @param int $id
     * @return mixed
     */
    public static function editToData(int $id = Code::ZERO)
    {
        $client = parent::getOne($id);

        if (!empty(self::$tagId)) {
            $client->tags()->sync(self::$tagId, $id);
        }

        return parent::editToData();
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
        $tagIds = [];
        foreach ($client->tags as $tag) {
            $tagIds[] = $tag->id;
        }
        if (!empty($tagIds)) {
            $client->tags()->detach($tagIds);
        }
    }
}