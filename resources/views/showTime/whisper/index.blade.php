@extends('showTime/common/layouts')

@section('title')
    秋枫阁-耳语
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('showTime/css/time.css') }}">
@stop

@section('article')
    <div class="timebox">
        <ul>
            @foreach($whispers as $whisper)
                <li>
                    <span>{{ $whisper['created_at'] }}</span><i><a
                                href="javascript:;">{!! $whisper['content'] !!}</a></i>
                </li>
            @endforeach
        </ul>
    </div>
    @if(!empty($pages) and $pages > 1)
        <div class="pagelist">
            <a title="Total record">总页数:&nbsp;<b>{{ $pages }}</b> </a>&nbsp;&nbsp;
            @for($page = 1; $page <= $pages; $page++)
                @if($page == $current)
                    &nbsp;<b>{{ $page }}</b>
                @else
                    &nbsp;<a href="{{ route('whisper') }}?page={{ $page }}">{{ $page }}</a>
                @endif
            @endfor
            @if($current < $pages)
                &nbsp;<a href="{{ route('whisper') }}?page={{ $current + 1 }}">下一页</a>
            @endif
            &nbsp;<a href="{{ route('whisper') }}?page={{ $pages }}">尾页</a>
        </div>
    @endif
@stop

@section('aside')
@stop