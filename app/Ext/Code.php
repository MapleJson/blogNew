<?php

namespace App\Ext;

/**
 * 成功码 2000 开始
 * 错误码 1000 开始 小于 2000
 * 类型、状态等 从 1 开始 小于 100
 *
 * Class Code
 * @package App\Http\Extensions
 */
class Code
{
    /*
     * 后台
     */
    const FAIL_TO_ADD = 1003;
    const FAIL_TO_EDIT = 1004;
    const FAIL_TO_DELETE = 1005;
    /*
     * 前台
     */
    const SUCCESS         = 200;
    const MESSAGE_SUCCESS = 2000;
    const LINK_SUCCESS    = 2001;

    const FAIL_TO_MESSAGE     = 1001;
    const FAIL_TO_ADD_LINK    = 1002;

    const ENABLED_STATUS  = 1;    // 展示
    const DISABLED_STATUS = 2;    // 不展示
    const INVALID_STATUS  = 3;    // 无效

    const TOP_PIC_TYPE  = 1;   // 顶部图片
    const CAROUSEL_TYPE = 2;   // 轮播图片
    const RIGHT_SMALL_TYPE = 3;   // 右侧小图

    const YES   = 1;    // 是
    const NO    = 2;    // 否
    const EMPTY = 0;    // 空

    const ZERO         = 0;
    const ONE          = 1;
    const TWO          = 2;
    const THREE        = 3;
    const FOUR         = 4;
    const SIX          = 6;

    const IS_SUCCESSFUL = 1;    // 成功
    const IS_FAILURE    = 2;    // 失败

}