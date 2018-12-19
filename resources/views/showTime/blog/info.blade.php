@extends('showTime/common/layouts')

@section('title')
    秋枫阁-{{ $info->title }}
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/share.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('showTime/css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('showTime/css/info.css') }}">
@stop

@section('article')
    <main>
        <div class="infosbox">
            <div class="newsview">
                <h3 class="news_title">{{ $info->title }}</h3>
                <div class="bloginfo">
                    <ul>
                        <li class="author">作者：<a href="mailto:{{ $info->authorEmail }}">{{ $info->authorName }}</a></li>
                        <li class="timer">时间：{{ $info->created_at }}</li>
                        <li class="view">{{ $info->read }}人已阅读</li>
                    </ul>
                </div>
                <div class="tags">
                    @foreach($info->tags as $tag)
                        <a href="{{ route("tags", $tag->id) }}" target="_blank">{{ $tag->name }}</a>&nbsp
                    @endforeach
                </div>
                @if(!empty($info->summary))
                    <div class="news_about"><strong>简介</strong>{{ $info->summary }}</div>
                @endif
                <div class="news_con">
                    {!! $info->content !!}
                </div>
            </div>
            <div class="share">
                <!-- 代码1：放在页面需要展示的位置  -->
                <!-- 如果您配置过sourceid，建议在div标签中配置sourceid、cid(分类id)，没有请忽略  -->
                <div id="cyReward" role="cylabs" data-use="reward" sourceid="{{ $info->id }}"></div>
                <!-- 代码2：用来读取评论框配置，此代码需放置在代码1之后。 -->
                <!-- 如果当前页面有评论框，代码2请勿放置在评论框代码之前。 -->
                <!-- 如果页面同时使用多个实验室项目，以下代码只需要引入一次，只配置上面的div标签即可 -->
                <script type="text/javascript" charset="utf-8" src="https://changyan.itc.cn/js/lib/jquery.js"></script>
                <script type="text/javascript" charset="utf-8"
                        src="https://changyan.sohu.com/js/changyan.labs.https.js?appid=cytXTxfaG"></script>
            </div>
            <div class="social-share share" data-title="{{ $info->title }}"
                 data-description="{{ $info->summary or $info->title }}"
                 data-image="{{ $info->img }}"
                 data-wechat-qrcode-helper="<p>微信扫一扫</p><p>然后将本文分享至朋友圈</p>"
                 data-mobile-sites="weibo,qq,qzone,tencent">
            </div>
            <div class="nextinfo">
                @if(!empty($pre))
                    <p>上一篇：<a href="{{ route('info', $pre->id) }}">{{ $pre->title }}</a></p>
                @else
                    <p>上一篇：<a href="javascript:;">没有了...</a></p>
                @endif
                @if(!empty($next))
                    <p>下一篇：<a href="{{ route('info', $next->id) }}">{{ $next->title }}</a></p>
                @else
                    <p>下一篇：<a href="javascript:;">没有了...</a></p>
                @endif
            </div>

            <div class="news_pl">
                <h2>文章评论</h2>
                <!--PC和WAP自适应版-->
                <div id="SOHUCS" sid="{{ $info->id }}"></div>
                <script type="text/javascript">
                    (function () {
                        var appid = 'cytXTxfaG';
                        var conf = 'prod_d2b1775335de7bd9a7534ed2c36d07ef';
                        var width = window.innerWidth || document.documentElement.clientWidth;
                        if (width < 960) {
                            window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>');
                        } else {
                            var loadJs = function (d, a) {
                                var c = document.getElementsByTagName("head")[0] || document.head || document.documentElement;
                                var b = document.createElement("script");
                                b.setAttribute("type", "text/javascript");
                                b.setAttribute("charset", "UTF-8");
                                b.setAttribute("src", d);
                                if (typeof a === "function") {
                                    if (window.attachEvent) {
                                        b.onreadystatechange = function () {
                                            var e = b.readyState;
                                            if (e === "loaded" || e === "complete") {
                                                b.onreadystatechange = null;
                                                a()
                                            }
                                        }
                                    } else {
                                        b.onload = a
                                    }
                                }
                                c.appendChild(b)
                            };
                            loadJs("http://changyan.sohu.com/upload/changyan.js", function () {
                                window.changyan.api.config({appid: appid, conf: conf})
                            });
                        }
                    })();
                </script>
            </div>
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
                            <img src="{{ $feat->img }}"></a>
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

@section('js')
    <script src="{{ asset('common/js/social-share.min.js') }}"></script>
@stop