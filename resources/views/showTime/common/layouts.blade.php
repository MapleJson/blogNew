<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <title>
        @yield('title', '秋枫阁')
    </title>
    <meta name="keywords" content="{{ $about->keywords or '个人博客,Maple,秋枫阁' }}"/>
    <meta name="description" content="{{ $about->description or '秋枫阁，是一个PHPer记录生活点滴，学习之路的个人网站。' }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(config('app.secure'))
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}" title="RSS Feed">
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/font-awesome.min.css') }}">
    <link href="{{ asset('showTime/css/base.css') }}" rel="stylesheet">
    @yield('css')
    <link href="{{ asset('showTime/css/m.css') }}" rel="stylesheet">
</head>

<body>
<header class="header-navigation" id="header">
    <nav>
        <div class="logo"><a href="{{ route('home') }}">{{ $about->siteName or '秋枫阁' }}</a></div>
        <h2 id="mnavh"><span class="navicon"></span></h2>
        <ul id="starlist">
            <li><a data-type="/home" href="{{ route('home') }}">首页</a></li>
            <li><a data-type="/travels" href="{{ route('travels') }}">点滴</a></li>
            <li><a data-type="/blog" href="{{ route('blog') }}">博客</a></li>
            <li><a data-type="/whisper" href="{{ route('whisper') }}">耳语</a></li>
            <li><a data-type="/message" href="{{ route('message') }}">留言</a></li>
            <li><a data-type="/about" href="{{ route('about') }}">关于</a></li>
            <li><a data-type="/home" href="http://maplejson.cn" target="_blank">简历</a></li>
            <li><a data-type="/links" href="{{ route('links') }}">友链</a></li>
        </ul>
        <div class="searchbox" style="display: none">
            <div id="search_bar" class="search_bar">
                <form id="searchform" action="" method="post" name="searchform">
                    <input class="input" placeholder="想搜点什么呢..." type="text" name="keyboard" id="keyboard">
                    <p class="search_ico"><span></span></p>
                </form>
            </div>
        </div>
    </nav>
</header>

<article>
    @yield('article')
    @section('aside')
        <aside class="r_box">
            @yield('right')
            <div class="guanzhu">
                <h2>关注我 么么哒</h2>
                <ul>
                    <img src="{{ $about->weChatQR ?: asset('common/images/wx.jpg') }}"/>
                </ul>
            </div>
        </aside>
    @show
</article>

<footer>
    <p class="footer-contact">
        <a href="https://github.com/MapleJson" target="_blank"><i class="fa fa-github"></i></a>
        <a href="https://wpa.qq.com/msgrd?v=3&amp;uin={{ $about->qq }}&amp;site=qq&amp;menu=yes" target="_blank"
           title="928046320"><i class="fa fa-qq"></i></a>
        <a href="javascript:void(0)"><i class="fa fa-weixin"></i></a>
        <a href="{{ route('siteMap') }}" target="_blank"><i class="fa fa-map"></i></a>
        <a href="{{ route('rss') }}" target="_blank"><i class="fa fa-rss"></i></a>
    </p>
    <p>
        <a href="{{ route('links') }}" class="links">友情链接</a>
        <a href="{{ route('hutui') }}">中国博客联盟</a>
    </p>
    <p>
        Copyright © 2018 by {{ $about->siteName or '秋枫阁' }} <a href="/">鄂ICP备18019316号</a>
    </p>
</footer>
<a href="#" class="cd-top">Top</a>

<script src="{{ asset('common/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('showTime/js/jquery.easyfader.min.js') }}"></script>
<script src="{{ asset('showTime/js/hc-sticky.js') }}"></script>
<script src="{{ asset('showTime/js/scrollReveal.js') }}"></script>
<script src="{{ asset('showTime/js/comm.js') }}"></script>
<script src="{{ asset('common/js/love.js') }}"></script>
@yield('js')
<!--[if lt IE 9]>
<script src="{{ asset('common/js/modernizr.js') }}"></script>
<![endif]-->
</body>
</html>
