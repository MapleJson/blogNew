@extends('quiet/common/layouts')

@section('title')
    秋枫阁-耳语
@stop

@section('mainClass')mood @stop

@section('mainContent')
    @foreach($whispers as $whisper)
        <div class="item">
            <div class="item-content">
                <p class="time">
                    <span><i class="layui-icon layui-icon-date"></i>{{ $whisper['created_at'] }}</span>
                    <strong>{{ $whisper['author'] }}</strong>
                </p>
                <p class="brief">{!! $whisper['content'] !!}</p>
            </div>
        </div>
    @endforeach
    <div id="whisper-page"></div>
@stop

@section('js')
    <script>
        layui.use(['jquery', 'laypage'], function () {
            var $ = layui.jquery
                , laypage = layui.laypage;

            $('.layui-this').removeClass('layui-this');
            $('#layui-nav-whisper').addClass('layui-this');

            laypage.render({
                elem: 'whisper-page'
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