<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="Shortcut Icon" href="{{asset('assets/frontend/index/web/images/favicon.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="robots" content="All" />
    <meta name="copyright" content="本网站版权归人类健康网所有" />
    <meta name="application-name" content="人类健康网" />
    <meta name="msapplication-tooltip" content="人类健康网" />
    <meta name="mobile-agent" content="format=html5;url={{url('')}}">
    <meta name="msapplication-starturl" content="{{url('')}}" />
    <meta name="baidu-site-verification" content="r49gUEsySi" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('seo')
    @include('Frontend.Center.Web.Layout.header')
    @yield('css')
</head>
<body>
<div id="loading" style="display: block;">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_four"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_one"></div>
        </div>
    </div>
</div>
@include('Frontend.Center.Web.Layout.topNav')
@include('Frontend.Center.Web.Layout.headerNav')

<div id="container">
    <div class="w">
        <div id="content">
            @include('Frontend.Center.Web.Layout.leftNav')
            @yield('content')
            {{--<div class="backpanel-inner">--}}
                {{--<div class="bp-item " id="bp-research">--}}
                    {{--<a class="research" target="_blank" href="//surveys.jd.com/index.php?r=survey/index/sid/829769/lang/zh-Hans"><b></b>调查问卷</a>--}}
                {{--</div>--}}
                {{--<div class="bp-item " id="bp-gotop">--}}
                    {{--<a title="使用快捷键T也可返回顶部哦！" class="gotop" href="#" target="_self"><b></b>返回顶部</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>

@include('Frontend.Center.Web.Layout.footerNav')
@include('Frontend.Center.Web.Layout.footer')
@yield("js")
@include('Frontend.Center.Web.Layout.error')
</body>
</html>