@extends('quiet/common/layouts')

@section('title')
    秋枫阁-个人博客
@stop

@section('mainRight')
    @if(!empty($tags) && $tags != '[]')
        <!-- 右侧内容区域 -->
        <div class="article-right-content">
            <h3>推荐文章</h3>
            <ul>
                @foreach($tags as $tag)
                    <li>
                        <a class="layui-btn {{ array_rand(array_flip(['layui-bg-red', 'layui-bg-orange', 'layui-bg-cyan', 'layui-bg-blue', '']), 1) }}"
                           href="{{ route("tags", $tag->id) }}">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@stop

@section('mainClass')article @stop

@section('mainContent')
    @if(!empty($blogs))
        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li class="layui-this">博客文章</li>
            </ul>
            <div class="layui-tab-content"></div>
        </div>
        @foreach($blogs as $blog)
            <div class="item">
                <img src="{{ $blog->img }}" alt="">
                <div class="item-content">
                    <h3>
                        <span class="text-blue">@if($blog->original === 1)【原创】@else
                                【转载】@endif</span>{{ $blog->title }}
                    </h3>
                    @foreach($blog->tags as $tag)
                        <span title="{{ $tag->name }}" class="Subtitle layui-badge">{{ $tag->name }}</span>
                    @endforeach
                    <br/>

                    <p>{{ $blog->summary }}</p>
                    <a href="{{ route("info", $blog->id) }}" target="_blank">
                        <button class="layui-btn">阅读全文</button>
                    </a>
                </div>
                <div class="date-box">
                    <div class="date">
                        <h4>{{ date('d', strtotime($blog->created_at)) }}</h4>
                        <span>{{ date('Y-m', strtotime($blog->created_at)) }}</span>
                    </div>
                </div>
            </div>
        @endforeach
        <div id="blog-page"></div>
    @endif
@stop

@section('js')
    <script>
        layui.use(['laypage'], function () {
            var $ = layui.jquery
                , laypage = layui.laypage;

            laypage.render({
                elem: 'blog-page'
                , curr: {{ $current }}
                , limit: {{ $limit }}
                , count: {{ $limit }} * {{ $pages }} //数据总数
                , jump: function (obj) {
                    if (obj.curr != {{ $current }})
                        window.location.href = '?page=' + obj.curr + '&limit=' + obj.limit;
                }
            });
        });
    </script>
@stop