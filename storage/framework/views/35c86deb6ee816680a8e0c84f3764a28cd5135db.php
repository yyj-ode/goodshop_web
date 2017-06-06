
<script src="<?php echo e(asset('assets/frontend/index/web/js/jquery.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/frontend/index/web/layui.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/tongji.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
    layui.config({
        base: '/assets/frontend/index/web/lay/modules/'
        ,version: '1490981130731'
    }).use('global','jquery');

    window.global = {
        preview: function(){
            var preview = document.getElementById('LAY_preview');
            return preview ? preview.innerHTML : '';
        }()
    };

    $(document).ready(function(){
        var start = 50;
        
$('#userLogin').on('click',function () {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("user/ajax")); ?>',
                data: {type:1,'sms_code':$("#sms_code").val(),'mobile':$('#mobile_data').val()},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    if(data.status == 200){
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg(data.message);
                        });

                        $(".mask").addClass("none");
                        $(".my").removeClass("none");

                        $('#user_login').css('display','none');
                        $('#user_center').css('display','block');

                        $('#my').css('display','none');
                        $('#wd').css('display','block');

                    }else{
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg(data.message);
                        });
                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }
            });
        });
        
$('#userLogout').on('click',function () {
            $.ajax({
                type: 'GET',
                url: '<?php echo e(url("user/ajaxLogout")); ?>',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    if(data.status == 200){
                        $(".my").addClass("none");
                        $("._user").removeClass("none");
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg("登录成功退出！");
                            window.location="<?php echo e(url('/')); ?>";
                        });
                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }
            });
        });
        
$.ajax({
            type: 'GET',
            url: '<?php echo e(url("user/check")); ?>',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if(data.status == 200){
                    $(".my").removeClass("none");
                    $("._user").addClass("none");

                    /*  $('#user_login').css('display','none');
                     $('#user_center').css('display','block');*/
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
            url: "<?php echo e(url("index/send_tel")); ?>",
            data: { mobile : phone},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                layui.use('layer', function(){
                    var layer = layui.layer;
                    layer.msg(data.message);
                });
                if(data.status == 1){
                    var send_html=$(".send a").html();
                    var sed_num=60;
                    var judge=true;  //此变量解决点击连续点击 触发多次事件问题
                    if(judge){
                        judge=false;
                        $(".send a").html(sed_num+"s");
                        if(send_html=="发送验证码"){
                            var setInt = setInterval(function(){
                                if(sed_num==1){
                                    $(".send a").html("重新获取");
                                    sed_num=60;
                                    judge=true;
                                    clearInterval(setInt);
                                }else{
                                    sed_num--;
                                    $(".send a").html(sed_num+"s");
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


    // *******************店址订阅模块***************
    //点击店址订阅
    $(".head").on("click","._read",function(){
        $(".read").removeClass("none");
    });
    //取消订阅
    $(".shop_read").on("click",".btn_two",function(){
        $(".read").addClass("none");
    });

    //点击一级菜单部分
    $(".show_ul").click(function () {
        $(".kuang,.list").addClass("none");
        $(this).parent().find(".kuang").removeClass("none");
    });
    //订阅的下拉选中
    $(".kuang ul li").click(function () {
        $(this).parent().parent().parent().find(".show_ul").find("input").val($(this).html());
        $(this).parent().parent().addClass("none");

        //赋值
        var val = $(this).attr('val');
        var type = $(this).attr('type');
        $('#' + type).attr('value',val);
    });
    //二级那个
    $(".shop_choice .shop_choice1").click(function () {
        $(".kuang").addClass("none");
        $(this).parent().find(".list").removeClass("none");
        //$(this).parent().find(".first").removeClass("none");
    });
    // 鼠标划过出现二级联动
    $(".list .all>li").mouseenter(function(e){
        $(".list>.erji").removeClass("none");
        $(".list .erji").html($(this).find("ul").html());
    });
    //点击选中显示订阅的地区
    $(".read").on("click",".list .erji li",function(){
        $(this).parent().parent().parent().find(".shop_choice1 input").val($(this).text());
        $(this).parent().parent().addClass("none");

        var val = $(this).attr('countyid');
        $('#subscribe_totalarea_id').attr('value',val);
    });
    //鼠标移出
    $(".kuang,.list").mouseleave(function(e){
        $(this).addClass("none");
    });
//    $(document).on("click",".first .erji li",function(){
//        $(this).parent().parent().parent().find(".shop_choice1").find("i").html($(this).text());
//        $(this).parent().parent().addClass("none");
//
//    });

    //
//    //订阅选框~~~~~~~~~~
//    //一级
//    $(document).on("click",".shop_choice",function(){
//        $(".kuang").addClass("none");
//        $(this).find(".kuang").removeClass("none");
//    });
//    //点击选中显示
//    $(document).on("click",".kuang>ul>li",function(){
//        $(this).parent().parent().parent().find("input").val(($(this).text()));
//        $(this).parent().parent().css({"display":"none"});
//    });
//
//    // 鼠标划过出现二级联动
//    $(".list .all>li").mouseenter(function(e){
//        $(".list>.erji").removeClass("none");
//        $(".list .erji").html($(this).find("ul").html());
//
//    });
//    //点击选中显示  选择开店区域-商圈
//    $(document).on("click",".list .erji li",function(){
//        //$(".domain i").text(($(this).text()));
//        $(this).parent().parent().parent().find("input").val(($(this).text()));
//        $(this).parent().parent().css({"display":"none"});
////        var region_id = $(this).attr('countyid');
////        $('#subscribe_region_id').val(region_id);
////        alert(region_id);
//    });


    //选择经营类型传值
//    $('body > div.read > div > div.shop_mess > div:nth-child(2) > div > ul > li').on('click',function(){
//        var subscribe_management_class = $(this).attr('val');
//        $('#subscribe_management_class').val(subscribe_management_class);
//    });

    //选择商铺类型传值
//    $('body > div.read > div > div.shop_mess > div:nth-child(3) > div > ul > li').on('click',function(){
//        var subscribe_format_id = $(this).attr('val');
//        $('#subscribe_format_id').val(subscribe_format_id);
//    });



    //选择开店区域-城区
//    $('body > div.read > div > div.shop_mess > div:nth-child(4) > div > ul > li').on('click',function(){
//        var region_id = $(this).attr('cityid');
//        $('#subscribe_region_id').val(region_id);
//    });

//    //选择开店区域-商圈－－－－－－－－－－为什么他么拿不到这个元素！！！！！！！！？？？？？？？？
//    $(document).on("click","body > div.read > div > div.shop_mess > div.shop_choice._choice > div > ul > li > ul > li",function(){
//        alert(1);
//        var subscribe_county = $(this).attr('countyid');
//        $('#subscribe_county').val(subscribe_county);
//    });

    //选择经营面积传值
//    $('body > div.read > div > div.shop_mess > div:nth-child(5) > div > ul > li').on('click',function(){
//        var subscribe_totalarea_id = $(this).attr('id');
//        $('#subscribe_totalarea_id').val(subscribe_totalarea_id);
//    });

    //选择开店预算传值
//    $('body > div.read > div > div.shop_mess > div:nth-child(6) > div > ul > li').on('click',function(){
//        var subscribe_price_id = $(this).attr('id');
//        $('#subscribe_price_id').val(subscribe_price_id);
//    });


//    //鼠标移出
//    $(".kuang").mouseleave(function(e){
//        $(this).addClass("none");
//    });


//    // 鼠标划过出现二级联动
//    $(".list .all>li").mouseenter(function(e){
//        $(".list>.erji").removeClass("none");
//        $(".list .erji").html($(this).find("ul").html());
//    });
//    //点击选中显示
//    $(document).on("click",".list .erji li",function(){
//        //$(".domain i").text(($(this).text()));
//        $(this).parent().parent().parent().find("input").val(($(this).text()));
//        $(this).parent().parent().addClass("none");
//
//    });

    
    $('body > div.read > div > div.shop_mess > div.readNow').on('click',function(){
    //获取经营类型
    var subscribe_management_class = $('#subscribe_management_class').val();
    //获取商铺类型
    var subscribe_format_id = $('#subscribe_format_id').val();
    //获取开店区域－城区/商圈
    var subscribe_region_id = $('#subscribe_region_id').val();
    //获取经营面积
    var subscribe_totalarea_id = $('#subscribe_totalarea_id').val();
    //获取开店预算
    var subscribe_price_id = $('#subscribe_price_id').val();
        $.ajax({
            type:'GET',
            dataType:'json',
            data:{
                'management':subscribe_management_class,
                'format_id':subscribe_format_id,
                'totalarea_id':subscribe_totalarea_id,
                'price_id':subscribe_price_id,
                'region_id':subscribe_region_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'<?php echo e(url('subscribe/create')); ?>',
            success:function(data){
                alert(data);
            },
            error:function(){
                alert('发送失败');
            }
        });
    });
$(".login_text img").click(function(){
    $(".login").addClass("none");
    $(".wxlogin").removeClass("none");
});
$(".btn_one1").click(function(){
    $(".wxlogin").addClass("none");
    $(".login").removeClass("none");
}) ;
</script>