@extends('showTime/common/layouts')

@section('title')点滴@stop

@section('css')
    <link href="{{ asset('showTime/css/share.css') }}" rel="stylesheet">
@stop

@section('article')
    @if(!empty($galleries) && $galleries != '[]')
        <div class="topbox">
            <ul>
                @foreach($galleries as $key => $gallery)
                    <li>
                        <i>
                            <a href="{{ route("photo", $gallery->id) }}">
                                <span class="tnum">{{ $key + 1 }}</span>
                                <span class="tpic">
                                    <img src="{{ $gallery->cover }}" alt="秋枫阁-{{ $gallery->title }}"/>
                                </span>
                                <span class="toptext">{{ $gallery->title }}</span>
                            </a>
                        </i>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@stop

@section('aside')
@stop
