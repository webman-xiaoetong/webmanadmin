<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <meta name="keywords" content="layuimini,layui,layui模板,layui后台,后台模板,admin,admin模板,layui mini">
    <meta name="description" content="layuimini基杂操作。">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="/lib/layui-v2.5.5/css/layui.css" media="all">
    <link rel="stylesheet" href="/css/layuimini.css?v=2.0.4.2" media="all">
    <link rel="stylesheet" href="/css/themes/default.css" media="all">
    <link rel="stylesheet" href="/lib/font-awesome-4.7.0/css/font-awesome.min.css" media="all">
    <link rel="stylesheet" href="/css/public.css" media="all">
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style id="layuimini-bg-color">
    </style>
    <meta name="csrf-token" content="">
</head>
<body class="layui-layout-body layuimini-all">

@yield('content')

<script src="/lib/layui-v2.5.5/layui.js" charset="utf-8"></script>
<script src="/js/lay-config.js?v=2.0.0" charset="utf-8"></script>

<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    // layui.config({
    //     base: '/static/admin/layuiadmin/' //静态资源所在路径
    // }).extend({
    //     index: 'lib/index' //主入口模块
    //     ,frans: 'lib/frans' //自定义方法
    // }).use(['element','form','layer','table','upload','laydate'],function () {
    //     var element = layui.element;
    //     var layer = layui.layer;
    //     var form = layui.form;
    //     var table = layui.table;
    //     var upload = layui.upload;
    //     var laydate = layui.laydate;

    //错误提示
    {{--        @if(count($errors)>0)--}}
    {{--        @foreach($errors->all() as $error)--}}
    {{--        layer.msg("{{$error}}",{icon:5});--}}
    {{--        @break--}}
    {{--        @endforeach--}}
    {{--        @endif--}}

    //信息提示
    {{--        @if(session('status'))--}}
    {{--        layer.msg("{{session('status')}}",{icon:6});--}}
    {{--        @endif--}}
    //     });


</script>

@yield('script')

</body>
</html>
