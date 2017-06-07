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
    //---------------------登录-------------------//
    //点击小人登录
    $(".head").on("click",".head ._user",function(){
        $(".login_page").removeClass("none");
        $(".con").addClass("none");
        $(this).css({"zIndex":"0"});
    });
    //登录后点击小人  !!!!!!!!!wode????????
    $(".head").on("click",".user_login",function(){
        $(".mine").removeClass("none");
        $(".con").addClass("none");
    });
    $(".head").on("click",".head .wode",function(){
        $(".mine").removeClass("none");
        $(".con").addClass("none");
    });
    //登录返回
    $(".login_page").on("click",".login_page .coordinate",function(){
        $(".login_page").addClass("none");
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
    //取消登录
    $(".login").on("click",".btn_one",function(){
        $(".mask").addClass("none");
    });
    //输入手机号码，
    $(".phoneNumber input").focus(function () {
        // $(this).attr("placeholder"," ");
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
                    location.reload();
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

//    验证码
    $(".phoneNumber input").blur(function () {
        var phone = $(".phoneNumber input").val()
        if(!(/^1[34578]\d{9}$/.test(phone))){
            alert("手机号码有误，请重填");
            return false;
        }else {
            //------------------发送验证码-------------------
            $(".verifica").on("click",".send",function(){
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
                            var send_html=$(".send").html();
                            var sed_num=60;
                            var judge=true;  //此变量解决点击连续点击 触发多次事件问题
                            if(judge){
                                judge=false;
                                $(".send").html(sed_num+"s");
                                if(send_html=="发送验证码"){
                                    var setInt = setInterval(function(){
                                        if(sed_num==1){
                                            $(".send").html("重新获取");
                                            //judge = true;
                                            sed_num=60;
                                            judge=true;
                                            clearInterval(setInt);
                                        }else{
                                            sed_num--;
                                            $(".send").html(sed_num+"s");
                                        }
                                    },1000);
                                }
                            }
                        }
                    },
                    error: function(xhr, type){
                    }
                });
            });

        }
    });
</script>