<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>管端内页</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('common/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('admin/style/admin.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('admin/style/increase.css') }}" media="all">
    @yield('css')
</head>
<body>

<div class="layui-fluid">
    @yield('content')
</div>

<script src="{{ asset('common/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('common/layui/layui.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    layui.config({
        base: "{{ asset('admin/') }}/" //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use('layer', function () {
        var layer = layui.layer;

        //错误提示
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                layer.msg("{{$error}}", {icon: 5});
                @break
            @endforeach
        @endif

        //信息提示
        @if(session('status'))
            layer.msg("{{session('status')}}", {icon: 6});
        @endif
    });

</script>
@yield('script')
</body>
@yield('pop')
</html>



