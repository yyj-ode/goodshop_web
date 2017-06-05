<link rel="shortcut icon" href="{{asset('assets/frontend/index/images/favicon.ico')}}" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="http://unpkg.com/iview/dist/styles/iview.css">
<script type="text/javascript" src="http://v1.vuejs.org/js/vue.min.js"></script>
<script type="text/javascript" src="http://unpkg.com/iview/dist/iview.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
<script type="text/javascript">
    var base_url = "{{url('')}}";
    var GV = {
        JS_ROOT : base_url+"/assets/frontend/",				//js目录
        JS_VERSION : "20141223",									//js版本号
        TOKEN : '2f3e49fc53a2c9ee',	//token ajax全局
        REGION_CONFIG : {},
    };
</script>
<script src="{{asset('assets/frontend/wind.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    Wind.css('nprogress');
    Wind.css('validator');
    Wind.css('layer');
    Wind.css('layer_espresso');
    Wind.use('jquery','nprogress',function() {
        NProgress.start();
        NProgress.inc();
    });
</script>

<link href="{{asset('assets/frontend/index/css/index/quickmenu.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/frontend/user/css/register.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/frontend/index/css/login_care.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/frontend/index/css/iconfont.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/frontend/index/css/s_head.css')}}" rel="stylesheet" type="text/css" />
