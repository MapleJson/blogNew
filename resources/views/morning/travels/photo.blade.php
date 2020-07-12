@extends('morning/common/layouts')

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

        article .share {
            background: #fff;
        }
    </style>
@stop

@section('breadSpan')
    雨打梨花深闭门，忘了青春，误了青春。赏心乐事共谁论？花下销魂，月下销魂。
@stop

@section('breadN2')
    <a href="javascript:window.history.back();" class="n2">返回</a>
@stop

@section('contents')
    <div class="photo-list mt20" id="MAPLE_photo_load">
        @foreach($photos as $photo)
            <a href="{{ $photo->img }}" title="{{ $photo->summary or '' }}"><img src="{{ $photo->img }}" alt="秋枫阁-{{ $photo->img }}"></a>
        @endforeach
    </div>
    <div class="social-share share" data-title="相册-{{ $travel->title }}"
         data-description="{{ $travel->summary }}"
         data-image="{{ $travel->cover }}"
         data-wechat-qrcode-helper="<p>微信扫一扫</p><p>然后将相册分享至朋友圈</p>"
         data-mobile-sites="weibo,qq,qzone,tencent">
    </div>
@stop

@section('script')
    <script src="{{ asset('common/js/social-share.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('common/js/baguettebox.min.js') }}"></script>
    <script type="text/javascript">
        // 相册点击效果渲染
        baguetteBox.run("#MAPLE_photo_load", {
            animation: 'fadeIn'
        });
    </script>
@stop
