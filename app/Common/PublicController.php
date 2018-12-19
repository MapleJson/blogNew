<?php

namespace App\Common;

use App\Ext\Code;
use App\Ext\Common;
use App\Ext\RequestRule;

class PublicController extends Controller
{
    use Common, RequestRule;

    /**
     * 本类实例 单例
     * @var null
     */
    private static $_instances = null;

    /**
     * 返回数据
     * @var array
     */
    protected static $response = [
        'code' => Code::SUCCESS,
        'msg'  => "",
        'data' => [],
    ];

    /**
     * 设置默认分页
     * @param int $limit
     */
    protected function setPageLimit(int $limit = 50)
    {
        if (!request()->has('page')) {
            request()->offsetSet('page', 1);
        }
        if (!request()->has('limit')) {
            request()->offsetSet('limit', $limit);
        }
    }

    /**
     * 如果有分页，需加上此方法接收分页参数
     *
     * @return array
     */
    protected static function limitParam()
    {
        return self::getValidateParam('pageLimit');
    }

    /**
     * 系统验证规则 参数获取
     *
     * @param string $name
     * @return array
     */
    protected static function getValidateParam(string $name)
    {
        if (empty($name)) {
            exit(self::getInstance()->responseJson(trans("validation.paramError")));
        }

        if (empty(self::getInstance()->{$name . 'Rule'})) {
            return request()->all();
        }

        return self::getInstance()->validate(request(), self::getInstance()->{$name . 'Rule'});
    }

    /**
     * 统一数据返回
     *
     * @param $args
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseJson(...$args)
    {
        foreach ($args as $arg) {
            if (is_int($arg)) {
                self::$response['code'] = $arg;
            } elseif (is_string($arg)) {
                self::$response['msg'] = $arg;
            } else {
                self::$response['data'] = $arg;
            }
        }

        if (empty(self::$response['msg'])) {
            self::$response['msg'] = $this->translateInfo(self::$response['code']);
        }

        return response()->json(self::$response);
    }

    /**
     * 获取此类单例
     *
     * @return PublicController|null
     */
    protected static function getInstance()
    {
        if (!empty(self::$_instances)) {
            return self::$_instances;
        }

        return self::$_instances = new self();
    }
}