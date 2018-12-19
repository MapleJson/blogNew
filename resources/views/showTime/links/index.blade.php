@extends('showTime/common/layouts')

@section('title')
    秋枫阁-友情链接
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('showTime/css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('showTime/css/links.css') }}">
@stop

@section('article')
    <main>
    <div class="whitebg">
        <h2 class="htitle"><span class="hnav">故人入我梦，明我长相忆。</span>友情链接</h2>
        @if($links != '[]')
            <ul class="friend_links">
                @foreach($links as $link)
                    <li><a href="{{ $link->domain }}" target="_blank" title="{{ $link->title }}">{{ $link->title }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    </main>
@stop

@section('right')
    <div class="apply_link">
        <h2>申请友链</h2>
        <ul>
            <li>
                <i class="fa fa-close"></i><span>不合法规</span>
                <i class="fa fa-close"></i><span>插边球站</span>
                <i class="fa fa-close"></i><span>红标报毒</span>
            </li>
            <li>
                <i class="fa fa-check"></i><span>原创优先</span>
                <i class="fa fa-check"></i><span>https优先</span>
                <i class="fa fa-check"></i><span>添加我为友链</span>
            </li>
            <li>
                <i style="color: red">我的站点名称：</i><span>{{ $about->siteName or '秋枫阁' }}</span>
            </li>
            <li>
                <i style="color: red">我的链接：</i><span>https://52zoe.cn</span>
            </li>
            <li>
                <i style="color: red">我的头像：</i><span>https://52zoe.cn/favicon.ico</span>
            </li>
            <li>
                <i style="color: red">我的描述：</i><span>{{ $about->description or '秋枫阁，是一个PHPer记录生活点滴，学习之路的个人网站。' }}</span>
            </li>
        </ul>
    </div>
@stop