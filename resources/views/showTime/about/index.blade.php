@extends('showTime/common/layouts')

@section('title')
    秋枫阁-关于我
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('showTime/css/about.css') }}">
@stop

@section('article')
    <div class="abox">
        <h2>博主简介</h2>
        <div class="biji-content" id="content">
            {{ $about->authorName }}，{{ $about->mood }}
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
                    <p>个人微信：</p>
                    <p><img style="width: 260px;height: 260px;" src="{{ asset('common/images/wx.jpeg') }}"></p>
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
                    <p><img src="{{ asset('common/images/reward.png') }}"></p>

                </div>
            </div>
        </div>
    </div>
@stop

@section('aside')
@stop

@section('js')
    <script>
        $('.navlist li').click(function () {
            $(this).addClass('navcurrent').siblings().removeClass('navcurrent');
            $('.navtab>div:eq(' + $(this).index() + ')').show().siblings().hide();
        });
    </script>
@stop