{{--登录frontend/index/web/--}}
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=da80f7804959bbd9cb6a88b06b3904a4"></script>
<script src="{{asset('assets/frontend/index/wap/layer_mobile/layer.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/tongji.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/index/wap/js/Zepto.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/index/wap/js/zepto.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/index/wap/js/swiper-3.4.2.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/index/wap/js/common.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/frontend/index/wap/js/index.js')}}" type="text/javascript"></script>

<script>

    document.querySelector("html").style.fontSize = document.documentElement.clientWidth/375*50+"px";
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端

    if(isiOS == true){
        console.log(1);
        $(".headhead").hide();
        $(".head").addClass("headIos");
    }else{
        console.log(0);
        $(".head").addClass("headAndr");
    }

    //---------------------登录-------------------//
    //登录返回
    $(".login_page").on("click",".login_page .coordinate",function(){
        $(".login_page").addClass("none");
        $(".con").removeClass("none");
    });
    //个人中心头部返回
    $(".mine").on("click",".mine .head .coordinate",function(){
        $(".mine").addClass("none");
        $(".con").removeClass("none");
    });
    //点击协议
    $(".login_content .registerForm").on("click",".registerForm p a",function(){
        $(".agreement").removeClass("none");
        $(".con").addClass("none");
    });
    //协议返回
    $(".agreement").on("click",".agreement .head .coordinate",function(){
        $(".agreement").addClass("none");
        $(".con").removeClass("none");
    });
    //-----------------------登录手机号验证-------------------//
    // 点击用户弹出登录页面
    $(".head").on("click","._user",function(){
        $(".mask").removeClass("none");
    });
    //登录 点击小人
    /*$('#login_user').on('click',function () {
        $(".mine").removeClass("none");
        $(".con").addClass("none");
        $(".login_page").addClass("none");
    });
    //没登录点    击小人
    $('#login_none').on('click',function () {
        $(".login_page").removeClass("none");
        $(".con").addClass("none");
        $(".mine").addClass("none");
    });*/
    //取消登录
    $(".login").on("click",".btn_one",function(){
        $(".mask").addClass("none");
    });
    //输入手机号码，
    $(".phoneNumber input").focus(function () {
        // $(this).attr("placeholder"," ");
    });

    {{-- 判断是否登录 --}}
    $('#login_user').on('click',function () {
        $.ajax({
            type: 'GET',
            url: '{{url("user/check")}}',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if(data.status == 200){
                    $(".mine").removeClass("none");
                    $(".con").addClass("none");
                    $(".login_page").addClass("none");
                }
                if(data.status == 500){
                    $(".login_page").removeClass("none");
                    $(".con").addClass("none");
                    $(".mine").addClass("none");
                }
            },
            error: function(xhr, type){
                alert('Ajax error!');
            }
        });
    });
    {{-- 退出 --}}
$('#userLogout').on('click',function () {
        $.ajax({
            type: 'GET',
            url: '{{url("user/ajaxLogout")}}',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if(data.status == 200){
                    $(".mine").addClass("none");
                    $(".con").removeClass("none");
                    layer.open({
                        content: '退出成功'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }
            },
            error: function(xhr, type){
                alert('Ajax error!')
            }
        });
    });
    {{-- 登录 --}}
    $('#userLogin').on('click',function () {
        $.ajax({
            type: 'POST',
            url: '{{url("user/ajax")}}',
            data: {type:1,'sms_code':$("#sms_code").val(),'mobile':$('#mobile_data').val()},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if(data.status == 200){
                    layer.open({
                        content: '登录成功'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });

                   $(".con").removeClass("none");
                   $(".login_page").addClass("none");
                   $('.user_type').attr('id','user_login');
                }else{
                    layer.open({
                        content: data.message
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }
            },
            error: function(xhr, type){
                alert('Ajax error!')
            }
        });
    });

    //发送验证码
    $('#send').on('click',function () {
        var phone = $(".phoneNumber input").val();
        $.ajax({
            type: 'POST',
            url: "{{url("index/send_tel")}}",
            data: { mobile : phone},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                layer.open({
                    content: data.message
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
                if(data.status == 1){
                    var send_html=$("#send").html();
                    var sed_num=60;
                    var judge=true;  //此变量解决点击连续点击 触发多次事件问题
                    if(judge){
                        judge=false;
                        $("#send").html(sed_num+"s");
                        if(send_html=="发送验证码"){
                            var setInt = setInterval(function(){
                                if(sed_num==1){
                                    $("#send").html("重新获取");
                                    sed_num=60;
                                    judge=true;
                                    clearInterval(setInt);
                                }else{
                                    sed_num--;
                                    $("#send").html(sed_num+"s");
                                }
                            },1000);

                        };
                    }
                }
            },
            error: function(xhr, type){
            }
        });
    });
</script>