@extends('quiet/common/layouts')

@section('title'){{ $info->title }}@stop

@section('mainClass')mood message  mood-details article1 @stop

@section('mainContent')
    <div class="top_title">{{ $info->title }}</div>
    <div class="item1">
        <div class="item-content">
            <h3>{{ $info->title }}</h3>
            <p class="label">
                @foreach($info->tags as $key => $tag)
                    <span class="Subtitle" @if($key === count($info->tags) - 1) style="margin-right: 50px" @endif>{{ $tag->name }}</span>&nbsp;
                @endforeach
                <span class="tb"><i class="layui-icon layui-icon-radio"></i>{{ $info->read }}</span>
                <span>{{ $info->created_at }}</span>
            </p>
            {!! $info->content !!}
            <div class="btn-box">
                @if(!empty($pre))
                    <a class="layui-btn" href="{{ route("info", $pre->id) }}">上一篇</a>
                @endif
                @if(!empty($next))
                    <a class="layui-btn" href="{{ route("info", $next->id) }}">下一篇</a>
                @endif
            </div>
        </div>
    </div>
    <div class="item">
        <div class="layui-card">
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
@stop

@section('js')
    <script>
        layui.use('code', function () {
            layui.code({
                elem: 'pre'
                , title: 'Code'
                , skin: 'notepad'
                , about: false
            });
        });
    </script>
@stop
