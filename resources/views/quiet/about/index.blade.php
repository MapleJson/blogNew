@extends('quiet/common/layouts')

@section('title')
    秋枫阁-关于我
@stop

@section('mainClass')about @stop

@section('mainContent')
    <div class="item">
        <h4 class="personal">个人简介</h4>
        <img class="portrait" style="width: 113px;" src="{{ asset('common/images/avatar.png') }}" alt="秋枫阁-头像">
        <p class="Introduction">{!! $about->authorName !!}<br />{!! $about->mood !!}</p>
        <div style="color:white">{!! $about->content !!}</div>
        <h4 class="personal">我的技能</h4>
        <div class="layui-progress layui-progress-big" lay-showpercent="true">
            <em>HTML</em>
            <div class="layui-progress-bar layui-bg-red" lay-percent="80%"></div>
        </div>
        <div class="layui-progress layui-progress-big" lay-showpercent="true">
            <em>JS</em>
            <div class="layui-progress-bar layui-bg-blue" lay-percent="80%"></div>
        </div>
        <div class="layui-progress layui-progress-big" lay-showpercent="true">
            <em>PHP</em>
            <div class="layui-progress-bar" lay-percent="80%"></div>
        </div>
        <div class="layui-progress layui-progress-big" lay-showpercent="true">
            <em>MYSQL</em>
            <div class="layui-progress-bar layui-bg-orange" lay-percent="60%"></div>
        </div>
        <div class="layui-progress layui-progress-big" lay-showpercent="true">
            <em>LINUX</em>
            <div class="layui-progress-bar layui-bg-green" lay-percent="70%"></div>
        </div>
        <h4 class="contact">与我联系</h4>
        <img class="code" style="width: 200px;" src="{{ asset('common/images/wx.jpeg') }}" alt="秋枫阁-微信">
        <p class="qq-number">扫码加微信<br />QQ: {{ $about->qq }}</p>
        <h4 class="contact">打赏小的</h4>
        <img class="code" style="width: 200px;" src="{{ asset('common/images/reward.png') }}" alt="秋枫阁-打赏">
    </div>
@stop

@section('article')
    <div class="abox">
        <h2>博主简介</h2>
        <div class="biji-content" id="content">
            <div class="about-mood">
                <strong>{!! $about->authorName !!}</strong>
                {!! $about->mood !!}
            </div>
            {!! $about->content !!}
        </div>
        <div class="navlist">
            <ul>
                <li class="navcurrent"><a href="#top1">基本信息</a></li>
                <li><a href="#top2">工作技能</a></li>
                <li><a href="#top3">我的博客</a></li>
            </ul>
        </div>
        <div class="navtab">
            <div class="navitem" style="display: block;" name="top1">
                <div class="content">
                    <p>网名：{{ $about->authorName }} </p>
                    <p>职业：{{ $about->profession }} </p>
                    <p>邮箱：{{ $about->email }} </p>
                    <p>GITHUB：<a href="https://github.com/MapleJson" target="_blank">https://github.com/MapleJson</a></p>
                    <p>个人微信：</p>
                    <p><img style="width: 260px;height: 260px;" src="{{ asset('common/images/wx.jpeg') }}" alt="秋枫阁-微信"></p>
                </div>
            </div>
            <div class="navitem" name="top2">
                <div class="content">
                    <p class="ab_t">工作技能：</p>
                    <p>1、web前端页面的开发</p>
                    <p>2、PHP后端程序的开发</p>
                    <p>3、能够独立进行web网站开发</p>
                    <p>4、熟悉HTTP协议，了解TCP/IP协议、socket编程等</p>
                    <p>5、熟悉Laravel、CI框架，熟练掌握YII、ThinkPHP等框架</p>
                    <p>6、熟练掌握MySQL的库表设计，索引优化等</p>
                    <p>7、熟练掌握Redis、MongoDB、Memcached在项目中的开发使用</p>
                    <p>8、能独立设计项目架构，制定开发规范，完成基础搭建</p>
                    <p>9、熟练使用常用Linux命令，熟练搭建LNMP，MNMP等环境</p>
                </div>
            </div>
            <div class="navitem" name="top3">
                <div class="content">
                    <p class="ab_t">我的博客：</p>
                    <p>域 名：52zoe.com 创建于2018年06月25日&nbsp;</p>
                    <p>服务器：阿里云服务器&nbsp;&nbsp;<a
                                href="https://promotion.aliyun.com/ntms/yunparter/invite.html?userCode=h6rtubqa"
                                target="_blank"><span
                                    style="color:#FF0000;"><strong>前往阿里云官网购买&gt;&gt;</strong></span></a></p>
                    <p>备案号：鄂ICP备18019316号</p>
                    <p>程 序：PHP 自写，采用Laravel框架</p>
                    <p class="ab_t">微信扫码打赏：</p>
                    <p><img src="{{ asset('common/images/reward.png') }}" alt="秋枫阁-打赏"></p>

                </div>
            </div>
        </div>
    </div>
@stop

@section('aside')
@stop

@section('js')
    <script>
        layui.use(['jquery', 'element'], function () {
            var $ = layui.jquery;
            $('.layui-this').removeClass('layui-this');
            $('#layui-nav-about').addClass('layui-this');
        });
    </script>
@stop
