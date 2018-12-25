<?php

namespace App\Common;

use App\Ext\Code;
use App\Models\About;
use App\Models\Link;

class FrontController extends PublicController
{
    /**
     * 渲染数据
     * @var array
     */
    public static $data = [];

    /**
     * 站点配置
     * @var
     */
    protected $siteConfig;

    public function __construct()
    {
        About::$where     = ['state' => Code::ENABLED_STATUS];
        $this->siteConfig = About::getOne();
        About::_destroy();
        if ($this->siteConfig->weChatQR) {
            $this->siteConfig->weChatQR = self::uploadImageUrl($this->siteConfig->weChatQR);
        }
    }

    /**
     * 判断模板
     * @param string|array $template
     * @return bool
     */
    protected function checkTemplate($template)
    {
        if (substr($template, 0, 1) === '!') {
            return $this->siteConfig->template !== $template;
        }
        if (is_string($template)) {
            return $this->siteConfig->template === $template;
        }
        if (is_array($template)) {
            return in_array($this->siteConfig->template, $template, true);
        }
        return false;
    }

    /**
     * 统一视图返回
     *
     * @param string|null $view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function responseView(string $view)
    {
        $config = [];

        /*
         * 友情链接
         */
        Link::_destroy();
        Link::$where     = [
            'state' => Code::ENABLED_STATUS,
            'me'    => Code::ENABLED_STATUS,
        ];
        $config['links'] = Link::getList();
        /*
         * 关于我
         */
        $config['about'] = $this->siteConfig;

        $version = $this->siteConfig->template;
        return view("{$version}.{$view}", static::$data, $config);
    }

    /**
     * 统一视图返回
     *
     * @param string|null $view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function errorView(string $view)
    {
        return view("errors.{$view}");
    }
}