@extends('showTime/common/layouts')

@section('css')
    <link href="{{ asset('showTime/css/index.css') }}" rel="stylesheet">
@stop

@section('article')
    @if(!empty($banners))
        <!--banner begin-->
        <div class="banner">
            <div id="banner" class="fader">
                @foreach($banners as $banner)
                    <li class="slide">
                        <a href="/" target="_blank">
                            <img src="{{ $banner->img }}" alt="{{ $banner->title }}">
                            <span class="imginfo">{{ $banner->title }}</span>
                        </a>
                    </li>
                @endforeach
                <div class="fader_controls">
                    <div class="page prev" data-target="prev">&lsaquo;</div>
                    <div class="page next" data-target="next">&rsaquo;</div>
                    <ul class="pager_list"></ul>
                </div>
            </div>
        </div>
        <!--banner end-->
    @endif
    @if(!empty($rights))
        <div class="toppic">
            @foreach($rights as $right)
                <li>
                    <a href="/" target="_blank">
                        <i><img src="{{ $right->img }}" alt="{{ $right->title }}"></i>
                        <h2>{{ $right->title }}</h2>
                        <span>生活</span>
                    </a>
                </li>
            @endforeach
        </div>
    @endif
    <main>
        @if(!empty($topPic))
            <div class="pics">
                <ul>
                    @foreach($topPic as $key => $pic)
                        @if($key < 3)
                            <li>
                                <i>
                                    <a href="{{ route('home') }}" target="_blank">
                                        <img src="{{ $pic->img }}" alt="秋枫阁-{{ $pic->title }}">
                                    </a>
                                </i>
                                <span>{{ $pic->title }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="blogtab">
            @if(!empty($tags) && $tags != '[]')
                <ul id="blogtab">
                    @foreach($tags as $tag)
                        <li><a href="{{ route("tags", $tag->id) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            @endif

            @if($blogs != '[]')
                @foreach($blogs as $blog)

                    <div class="blogs" data-scroll-reveal="enter bottom over 1s">
                        <h3 class="blogtitle">
                            <a href="{{ route("info", $blog->id) }}" target="_blank">
                                <span class="text-blue">
                                    @if($blog->original === 1)
                                        【原创】
                                    @else
                                        【转载】
                                    @endif
                                </span>{{ $blog->title }}
                            </a>
                        </h3>
                        @if(!empty($blog->img))
                            <span class="blogpic">
                                <a href="{{ route("info", $blog->id) }}" title="">
                                    <img src="{{ $blog->img }}" alt="秋枫阁-{{ $blog->title }}">
                                </a>
                            </span>
                        @endif
                        <p class="blogtext">{{ $blog->summary }}</p>
                        <div class="bloginfo">
                            <ul>
                                <li class="author"><a href="{{ route("info", $blog->id) }}">{{ $blog->authorName }}</a>
                                </li>
                                <li class="blog-tags">
                                    @foreach($blog->tags as $tag)
                                        <i title="{{ $tag->name }}" class="fa fa-tags">{{ $tag->name }}</i>
                                    @endforeach
                                </li>
                                <li class="timer">{{ $blog->created_at }}</li>
                                <li class="view"><span>{{ $blog->read }}</span>已阅读</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="blogs">此主人很懒,什么都没有留下</div>
            @endif
        </div>
    </main>
@stop

@section('right')
    @if(!empty($featured) && $featured != '[]')
        <div class="wdxc">
            <h2>图文精选</h2>
            <ul>
                @foreach($featured as $feat)
                    <li>
                        <a href="{{ route("photo", $feat->travelId) }}">
                            <img src="{{ $feat->img }}" alt="秋枫阁-{{ $feat->img }}"></a>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(!empty($tags) && $tags != '[]')
        <div class="cloud">
            <h2>标签云</h2>
            <ul>
                @foreach($tags as $tag)
                    <a href="{{ route("tags", $tag->id) }}">{{ $tag->name }}</a>
                @endforeach
            </ul>
        </div>
    @endif
    @if(!empty($propose) && $propose != '[]')
        <div class="tuijian">
            <h2 id="tab"><a href="#" class="current">站长推荐</a></h2>
            <div id="content">
                <ul style="display:block;">
                    @foreach($propose as $prop)
                        <li>
                            <a href="{{ route("info", $prop->id) }}" target="_blank">
                                <span class="text-blue">
                                    @if($prop->original === 1)
                                        【原创】
                                    @else
                                        【转载】
                                    @endif
                                </span>{{ $prop->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@stop
