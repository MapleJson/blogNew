<?php
/**
 * 公共函数
 * 只负责逻辑处理
 * 不链接数据库
 */

namespace App\Ext;

use Illuminate\Support\Facades\Storage;

trait Common
{
    /**
     * 返回提示信息
     *
     * @param $code
     * @param string $file
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public function translateInfo($code, $file = '')
    {
        if (empty($file)) {
            if (is_int($code)) {
                if ($code < 2000) {
                    $file = 'error';
                } else {
                    $file = 'success';
                }
                if ($code === Code::SUCCESS) {
                    $file = 'success';
                }
            } else {
                $file = 'lang';
            }
        }

        return $this->trans($code, $file);
    }

    /**
     * 语言包翻译
     *
     * @param $column
     * @param string $file
     * @return array|\Illuminate\Contracts\Translation\Translator|null|string
     */
    public function trans($column, $file = 'lang')
    {
        return trans("{$file}.{$column}");
    }

    /**
     * 获取完整图片路径
     *
     * @param $src
     * @return mixed
     */
    public static function uploadImageUrl($src)
    {
        if (self::isUrl($src)) {
            return $src;
        }
        return Storage::disk(config('admin.upload.disk'))->url($src);
    }

    /**
     * 判断是否是URL
     * @param $src
     * @return bool
     */
    public static function isUrl($src)
    {
        return substr($src, 0, 7) === 'http://' ||
            substr($src, 0, 8) === 'https://';
    }

    /**
     * 获取分页查询条件
     *
     * @param array $page
     * @return array
     */
    public function getPageOffset(array $page)
    {
        return [
            'page'   => (int)$page['page'],
            'limit'  => (int)$page['limit'],
            'offset' => ($page['page'] - 1) * $page['limit']
        ];
    }

    /**
     * 留言排序
     *
     * @param $message
     * @return mixed
     */
    public function sortMessage($message)
    {
        if (!$message) {
            return [];
        }
        $array   = [];
        $sort    = [
            'direction' => 'SORT_ASC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
            'field'     => 'id',       //排序字段
        ];
        $arrSort = array();
        foreach ($message as $unique => $msg) {
            // 取出最顶级
            if ($msg['parentId'] === Code::EMPTY) {
                $array[$msg['id']] = (object)$msg;
            }
            foreach ($msg as $key => $value) {
                $arrSort[$key][$unique] = $value;
            }
        }
        if ($sort['direction']) {
            array_multisort(
                $arrSort[$sort['field']],
                constant($sort['direction']),
                $message
            );
        }

        foreach ($message as $msg) {
            if ($msg['parentId'] !== Code::EMPTY) {
                $array[$msg['parentId']]->child[] = (object)$msg;
            }
        }

        return $array;
    }


}