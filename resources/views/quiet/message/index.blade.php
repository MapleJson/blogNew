@extends('quiet/common/layouts')

@section('title')
    秋枫阁-留言
@stop

@section('mainClass')message @stop

@section('mainContent')
    <div class="item">
        <!--PC和WAP自适应版-->
        <div id="SOHUCS"></div>
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
                    loadJs("https://changyan.sohu.com/upload/changyan.js", function () {
                        window.changyan.api.config({appid: appid, conf: conf})
                    });
                }
            })();
        </script>
    </div>
@stop

@section('js')
    <script>
        layui.use(['jquery'], function () {
            var $ = layui.jquery;

            $('.layui-this').removeClass('layui-this');
            $('#layui-nav-message').addClass('layui-this');
        });
    </script>
@stop