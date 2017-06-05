<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <link rel="Shortcut Icon" href="{{asset('assets/frontend/index/web/images/favicon.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="robots" content="All" />
    <meta name="copyright" content="" />
    <meta name="application-name" content="" />
    <meta name="msapplication-tooltip" content="" />
    <meta name="mobile-agent" content="format=html5;url=http://www.nndeal.com/">
    <meta name="msapplication-starturl" content="http://www.nndeal.com/" />
    <meta name="baidu-site-verification" content="r49gUEsySi" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('seo')

    @include('Frontend.User.Web.Layout.header')

</head>
<body>
@include('Frontend.User.Web.Layout.topNav')
@yield('content')
@include('Frontend.User.Web.Layout.footer')
@yield("javascript")
@include('Frontend.User.Web.Layout.error')
</body>
</html>