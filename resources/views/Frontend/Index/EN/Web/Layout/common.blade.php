<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
    <title>NNDeal</title>
    <meta name="keywords" content="基于人工智能的品牌选址专家" />
    <meta name="description" content="基于人工智能的品牌选址专家" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('seo')

    @include('Frontend.Index.EN.Web.Layout.header_index')

</head>
<body class="site-home" data-spy="scroll" data-target="#navbar">
@include('Frontend.Index.EN.Web.Layout.topNav')
@yield('content')
@include('Frontend.Index.EN.Web.Layout.footer')
@yield("javascript")
@include('Frontend.Index.EN.Web.Layout.error')
</body>
</html>