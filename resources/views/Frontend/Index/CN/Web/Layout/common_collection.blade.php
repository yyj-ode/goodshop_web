<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="Shortcut Icon" href="{{asset('assets/frontend/index/web/images/favicon.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="robots" content="All" />
    <meta name="copyright" content="基于人工智能的品牌选址专家" />
    <meta name="application-name" content="基于人工智能的品牌选址专家" />
    <meta name="msapplication-tooltip" content="基于人工智能的品牌选址专家" />
    <meta name="mobile-agent" content="format=html5;url=http://nndeal/">
    <meta name="msapplication-starturl" content="http://nndeal/" />
    <meta name="baidu-site-verification" content="r49gUEsySi" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('seo')

    @include('Frontend.Index.CN.Web.Layout.header_collection')

</head>
<body>
@yield('reminder')
<div class="box">
    @include('Frontend.Index.CN.Web.Layout.topNav')
    @yield('header')
    @yield('banner')
    @yield('content')
</div>
@include('Frontend.Index.CN.Web.Layout.footer')
@yield("javascript")
@include('Frontend.Index.CN.Web.Layout.error')
</body>
</html>