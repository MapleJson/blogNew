<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{!! config('admin.name')!!}</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{ asset('common/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('admin/style/admin.css') }}" media="all">
    <script type="text/javascript">
        function format(num) {
            var data = num;
            if (num < 10) {
                data = '0' + num;
            }
            return data;
        }

        //获得当前时间,刻度为一千分一秒
        function showLeftTime() {
            var now = new Date();
            var year = now.getFullYear();
            var month = now.getMonth() + 1;
            var day = now.getDate();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            document.all.show.innerHTML = year + "-" + format(month) + "-" + format(day) + " " + format(hours) + ":" + format(minutes) + ":" + format(seconds);
            //一秒刷新一次显示时间
            setTimeout(showLeftTime, 1000);
        }
    </script>
</head>
<body class="layui-layout-body" onload="showLeftTime()">

<div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect>
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="{{ route('home') }}" target="_blank" title="前台">
                        <i class="layui-icon layui-icon-website"></i>
                    </a>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;">
                        当前时间：<i id="show" class="layui-icon"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="theme">
                        <i class="layui-icon layui-icon-theme"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="fullscreen">
                        <i class="layui-icon layui-icon-screen-full"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;">
                        <cite>{!! $administrator->name !!}</cite>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a lay-href="{{ route('admin.userInfo') }}">修改信息</a></dd>
                        <dd><a lay-href="{{ route('admin.changePwd') }}">修改密码</a></dd>
                        <hr>
                        <dd style="text-align: center;"><a href="{{ route('admin.logout') }}">退出</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-hide-xs">
                    <div class="layadmin-null-space"></div>
                </li>

            </ul>
        </div>

        <!-- 侧边菜单 -->
        <div class="layui-side layui-side-menu">
            <div class="layui-side-scroll">
                <div class="layui-logo" lay-href="{{ route('admin.index') }}">
                    <span>{!! config('admin.name') !!}</span>
                </div>

                <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu"
                    lay-filter="layadmin-system-side-menu">
                    @foreach($menus as $menu)
                        <li data-name="{{ $menu['name'] }}" class="layui-nav-item">
                            <a href="javascript:;"
                               @if(!empty($menu['name']) || !empty($menu['uri']))
                               lay-href="{{ !empty($menu['name']) ? route($menu['name']) : $menu['uri'] }}"
                               @endif
                               lay-tips="{{ $menu['title'] }}" lay-direction="2">
                                <i class="layui-icon {{ $menu['icon'] ?? '' }}"></i>
                                <cite>{{ $menu['title'] }}</cite>
                            </a>
                            @if(!empty($menu['child']))
                                <dl class="layui-nav-child">
                                    @foreach($menu['child'] as $subMenu)
                                        <dd data-name="{{ $subMenu['name'] }}">
                                            <a lay-href="{{ !empty($subMenu['name']) ? route($subMenu['name']) : $subMenu['uri'] }}">{{ $subMenu['title'] }}</a>
                                        </dd>
                                    @endforeach
                                </dl>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- 页面标签 -->
        <div class="layadmin-pagetabs" id="LAY_app_tabs">
            <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-down">
                <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                    <li class="layui-nav-item" lay-unselect>
                        <a href="javascript:;"></a>
                        <dl class="layui-nav-child layui-anim-fadein">
                            <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                            <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                            <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
                <ul class="layui-tab-title" id="LAY_app_tabsheader">
                    <li lay-id="{{route('admin.index')}}" lay-attr="{{route('admin.index')}}" class="layui-this"><i
                                class="layui-icon layui-icon-home"></i></li>
                </ul>
            </div>
        </div>

        <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">
                <iframe src="{{route('admin.index')}}" frameborder="0" class="layadmin-iframe"></iframe>
            </div>
        </div>

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>

<script src="{{ asset('common/layui/layui.js') }}"></script>
<script>
    layui.config({
        base: "{{ asset('admin') }}/" //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use('index');
</script>
</body>
</html>


