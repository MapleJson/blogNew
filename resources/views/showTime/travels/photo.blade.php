@extends('showTime/common/layouts')

@section('title')相册@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/share.min.css') }}">
    <link rel='stylesheet' href='{{ asset('common/css/baguettebox.min.css') }}' type='text/css' media='all'/>
    <style>
        #baguetteBox-overlay .full-image figcaption {
            width: 80%;
            padding: 0 10%;
            white-space: normal;
            line-height: 2.3
        }

        .photo-list {
            background: #fff;
            width: 96%;
            height: 500px;
            padding: 24px;
            overflow: auto;
            text-align: center
        }

        .photo-list:after {
            content: '';
            display: block;
            height: 2px;
            margin: .5em 0 1.4em;
            background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(77, 77, 77, 1) 50%, rgba(0, 0, 0, 0) 100%);
            background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(77, 77, 77, 1) 50%, rgba(0, 0, 0, 0) 100%);
        }

        .photo-list img {
            height: 100%;
            margin: 0 auto;
        }

        .photo-list a {
            width: 265px;
            height: 180px;
            display: inline-block;
            overflow: hidden;
            margin: 4px 10px;
            box-shadow: 0 0 4px -1px #cec4c4;
        }

        article .share {
            background: #fff;
            text-align: center;
            padding: 20px;
        }
    </style>
@stop

@section('article')
    <div class="photo-list mt20" id="MAPLE_photo_load">
        @foreach($photos as $photo)
            <a href="{{ $photo->img }}" title="{{ $photo->summary or ''}}">
                <img src="{{ $photo->img }}" alt="秋枫阁-{{ $photo->img }}"/>
            </a>
        @endforeach
    </div>
    <div class="social-share share" data-title="相册-{{ $travel->title }}"
         data-description="{{ $travel->summary }}"
         data-image="{{ $travel->cover }}"
         data-wechat-qrcode-helper="<p>微信扫一扫</p><p>然后将相册分享至朋友圈</p>"
         data-mobile-sites="weibo,qq,qzone,tencent">
    </div>
@stop

@section('aside')
@stop

@section('js')
    <script src="{{ asset('common/js/social-share.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('common/js/baguettebox.min.js') }}"></script>
    <script type="text/javascript">
        // 相册点击效果渲染
        baguetteBox.run("#MAPLE_photo_load", {
            animation: 'fadeIn'
        });
    </script>
@stop
