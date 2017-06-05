<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <link rel="Shortcut Icon" href="{{asset('assets/frontend/index/web/images/favicon.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="robots" content="All" />
    <meta name="copyright" content="本网站版权归人类健康网所有" />
    <meta name="application-name" content="人类健康网" />
    <meta name="msapplication-tooltip" content="人类健康网" />
    <meta name="mobile-agent" content="format=html5;url=http://nndeal/">
    <meta name="msapplication-starturl" content="http://nndeal/" />
    <meta name="baidu-site-verification" content="r49gUEsySi" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>问医生，健康问答_人类健康网</title>
    <meta name="keywords" content="问医生，健康问答,健康咨询,专家咨询,疾病咨询" />
    <meta name="description" content="人类健康网问医生频道是国内回答最权威的健康问答系统，同时也是专家数量最多，回复最快的健康平台。1分钟提问10分钟内多名专家同时为您解答！" />
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