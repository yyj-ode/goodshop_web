<link href="{{asset('assets/frontend/index/css/index/iask_common.css')}}" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="{{asset('assets/frontend/index/images/favicon.ico')}}" type="image/x-icon">

<link href="{{asset('assets/frontend/index/css/index/iask_head.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/frontend/index/css/index/quickmenu.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/frontend/index/css/login_care.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/frontend/index/css/iconfont.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/frontend/index/css/s_head.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/frontend/index/css/iask_question.css')}}" rel="stylesheet" type="text/css" />

<script>
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
    Wind.css('iview');
    Wind.css('nprogress');
    Wind.css('validator');
    Wind.css('layer');
    Wind.css('layer_espresso');
    Wind.css('iview');

    Wind.use('jquery','nprogress',function() {
        NProgress.start();
        NProgress.inc();
    });
</script>