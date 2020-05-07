<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', '秋枫阁')</title>
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
<h1 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h1>
<h2 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h2>
<h3 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h3>
<h4 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h4>
<h5 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h5>
<h6 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h6>
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
                    <img src="{{ $about->weChatQR ?: asset('common/images/wx.jpg') }}" alt="秋枫阁-微信"/>
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
<!--粒子特效背景-->
<script>
    !function () {
        function A(a, b, c) {
            return a.getAttribute(b) || c
        }

        function F(a) {
            return document.getElementsByTagName(a);
        }

        function D() {
            var c = F("script"),
                a = c.length,
                b = c[a - 1];
            return {
                l: a,
                z: A(b, "zIndex", -1),
                o: A(b, "opacity", 0.5),
                c: A(b, "color", "0,0,0"),
                n: A(b, "count", 199)
            }
        }

        function E() {
            x = i.width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            B = i.height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
        }

        function M() {
            J.clearRect(0, 0, x, B);
            var c = [I].concat(v);
            var b, d, a, g, e, f;
            v.forEach(function (h) {
                h.x += h.xa,
                    h.y += h.ya,
                    h.xa *= h.x > x || h.x < 0 ? -1 : 1,
                    h.ya *= h.y > B || h.y < 0 ? -1 : 1,
                    J.fillRect(h.x - 0.5, h.y - 0.5, 1, 1);
                for (d = 0; d < c.length; d++) {
                    b = c[d];
                    if (h !== b && null !== b.x && null !== b.y) {
                        g = h.x - b.x;
                        e = h.y - b.y;
                        f = g * g + e * e;
                        f < b.max && (b === I && f >= b.max / 2 && (h.x -= 0.03 * g, h.y -= 0.03 * e), a = (b.max - f) / b.max, J.beginPath(), J.lineWidth = a / 2, J.strokeStyle = "rgba(" + w.c + "," + (a + 0.2) + ")", J.moveTo(h.x, h.y), J.lineTo(b.x, b.y), J.stroke())
                    }
                }
                c.splice(c.indexOf(h), 1);
            }),
                C(M);
        }

        var i = document.createElement("canvas"),
            w = D(),
            L = "c_n" + w.l, //c_n2
            J = i.getContext("2d"),
            x,
            B,
            C = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
                function (a) {
                    window.setTimeout(a, 1000 / 45)
                },
            N = Math.random,
            I = {
                x: null,
                y: null,
                max: 20000
            };
        i.id = L;
        i.style.cssText = "position:fixed;top:0;left:0;z-index:" + w.z + ";opacity:" + w.o;
        F("body")[0].appendChild(i);
        E();
        window.onresize = E;
        window.onmousemove = function (a) {
            a = a || window.event,
                I.x = a.clientX,
                I.y = a.clientY
        };
        window.onmouseout = function () {
            I.x = null,
                I.y = null
        };
        for (var v = [], z = 0; w.n > z; z++) {
            var G = N() * x,
                H = N() * B,
                y = 2 * N() - 1,
                K = 2 * N() - 1;
            v.push({
                x: G,
                y: H,
                xa: y,
                ya: K,
                max: 6000
            });
        }
        setTimeout(function () {
            M()
        }, 100)
    }();
</script>
<!--[if lt IE 9]>
<script src="{{ asset('common/js/modernizr.js') }}"></script>
<![endif]-->
</body>
</html>
