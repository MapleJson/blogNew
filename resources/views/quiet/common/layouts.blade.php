<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <title>@yield('title', '秋枫阁-Maple的个人博客')</title>
    <meta name="keywords" content="{{ $about->keywords or '个人博客,Maple,秋枫阁' }}"/>
    <meta name="description" content="{{ $about->description or '秋枫阁，是一个PHPer记录生活点滴，学习之路的个人网站。' }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('quiet/css/index.css') }}">
    @yield('css')
</head>
<body>
<!-- 侧边内容 -->
<div class="sidebar-content">
    <div class="layui-card">
        <div class="layui-card-header">
            <img src="{{ asset('common/images/avatar.png') }}" alt="秋枫阁-头像"><br/>
            <span>{{ $about->authorName }}</span>
        </div>
        <div class="layui-card-body">
            <ul>
                <li class="txt">
                    <span>1000</span><br/>
                    <span>文章</span>
                </li>
                <li class="item">
                    <span>50</span><br/>
                    <span>项目</span>
                </li>
                <li class="visitors">
                    <span>5008</span><br/>
                    <span>访问人数</span>
                </li>
            </ul>
        </div>
    </div>
    <ul class="layui-nav">
        <!-- 侧边导航: <ul class="layui-nav layui-nav-tree layui-nav-side"> -->
        <li id="layui-nav-blog" class="layui-nav-item layui-this"><a href="{{ route('blog') }}">文章<br/>ARTICLE</a></li>
        <li id="layui-nav-whisper" class="layui-nav-item"><a href="{{ route('whisper') }}">微语<br/>MOOD</a></li>
        <li id="layui-nav-message" class="layui-nav-item"><a href="{{ route('message') }}">留言<br/>MESSAGE</a></li>
        <li id="layui-nav-about" class="layui-nav-item"><a href="{{ route('about') }}">关于<br/>ABOUT</a></li>
        <li id="layui-nav-resume" class="layui-nav-item last"><a href="http://maplejson.cn" target="_blank">简历<br/>RESUME</a></li>
    </ul>
</div>

@yield('mainRight')

<!-- 主要内容 -->
<div class="main @yield('mainClass')">
    <h1 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h1>
    <h2 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h2>
    <h3 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h3>
    <h4 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h4>
    <h5 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h5>
    <h6 hidden>{{ $about->keywords or '个人博客,Maple,秋枫阁' }}</h6>
    @yield('mainContent')
</div>

<!-- 搜索框 -->
{{--<div class="seach">--}}
    {{--<form class="layui-form seach-box" action="">--}}
        {{--<div class="layui-form-item">--}}
            {{--<div class="layui-input-block">--}}
                {{--<button class="layui-btn"><i class="layui-icon layui-icon-search"></i></button>--}}
                {{--<input type="text" name="username" lay-verify="required" placeholder="搜索相关" autocomplete="off"--}}
                       {{--class="layui-input">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}
{{--</div>--}}

<!-- 底部内容 -->
<footer>
    <p>
        <a href="https://wpa.qq.com/msgrd?v=3&amp;uin={{ $about->qq }}&amp;site=qq&amp;menu=yes" target="_blank"
           title="928046320"><i class="layui-icon layui-icon-login-qq"></i></a>&nbsp;
        Copyright © 2018 by {{ $about->siteName or '秋枫阁' }} <a href="/">鄂ICP备18019316号</a>
    </p>
</footer>

<script src="{{ asset('common/layui/layui.js') }}"></script>
<!--[if lt IE 9]>
<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('js')
</body>
</html>
