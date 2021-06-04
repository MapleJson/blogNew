@extends('showTime/common/layouts')

@section('title')个人博客@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('showTime/css/index.css') }}">
@stop

@section('article')
    @if(!empty($adv))
        <div class="popularize1000">
            <a target="_blank" href="{{ $adv->href }}">
                <img src="{{ $adv->img }}" />
            </a>
        </div>
    @endif
    <main>
        @if(!empty($adv680))
            <div class="popularize680">
                <a target="_blank" href="{{ $adv680->href }}">
                    <img src="{{ $adv680->img }}" />
                </a>
            </div>
        @endif
        @if(!empty($blogs))
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
                            <a href="{{ route("info", $blog->id) }}">
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
            @if(!empty($pages) and $pages > 1)
                <div class="pagelist">
                    <a title="Total record">总页数:&nbsp;<b>{{ $pages }}</b> </a>&nbsp;&nbsp;
                    @for($page = 1; $page <= $pages; $page++)
                        @if($page == $current)
                            &nbsp;<b>{{ $page }}</b>
                        @else
                            &nbsp;<a href="?page={{ $page }}">{{ $page }}</a>
                        @endif
                    @endfor
                    @if($current < $pages)
                        &nbsp;<a href="?page={{ $current + 1 }}">下一页</a>
                    @endif
                    &nbsp;<a href="?page={{ $pages }}">尾页</a>
                </div>
            @endif
        @endif
    </main>
@stop

@section('right')
    @if(!empty($featured) && $featured != '[]')
        <div class="wdxc">
            <h2>图文精选</h2>
            <ul>
                @foreach($featured as $feat)
                    <li>
                        <a href="{{ route('photo', $feat->travelId) }}">
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
                    <a href="{{ route('tags', $tag->id) }}">{{ $tag->name }}</a>
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
                            <a href="{{ route('info', $prop->id) }}" target="_blank">
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
