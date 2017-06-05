<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
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
    <script>
        document.querySelector("html").style.fontSize = document.documentElement.clientWidth/375*50+"px";
    </script>
    @yield('seo')

    @include('Frontend.Index.CN.Wap.Layout.header_index')

</head>
<body class="site-home" data-spy="scroll" data-target="#navbar">
@include('Frontend.Index.CN.Wap.Layout.topNav')
@yield('content')
@yield('type')
@yield('search')
@yield('login_page')
@yield('agreement')
@yield('mine')
@yield('myread')
@yield('live')
@yield('success')
@yield('false')
@yield('pay')
@yield('telephone')
@include('Frontend.Index.CN.Wap.Layout.footer')
@yield("javascript")
@include('Frontend.Index.CN.Wap.Layout.error')
</body>
</html>