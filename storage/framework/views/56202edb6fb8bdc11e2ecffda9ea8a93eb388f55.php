<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="browsermode" content="application">
    <meta name="x5-page-mode" content="app">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <link rel="Shortcut Icon" href="<?php echo e(asset('assets/frontend/index/web/images/favicon.ico')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/index/web/css/common.css')); ?>" type="text/css">
    <link href="<?php echo e(asset('assets/frontend/index/web/css/layui.css')); ?>" rel="stylesheet" type="text/css" />
    <title>大数据告诉你：餐饮做大做强的秘密都在这儿!</title>
    <style>
        body,html{height:100%}.relat{position:relative}.absol{position:absolute;left:50%}
        img{width:100%;display:block}.marginT{margin-top:-1px}.wrap{padding-bottom:.7rem}
        .wagesBtn{width:6.16rem;height:1.14rem;margin:.3rem auto .9rem;font-size:.4rem;text-shadow:0 1px 1px #fbe5b1;text-align:center;background-image:url(https://img.jianlc.cn/app/wagesPlan/btn_normal.png);  background-repeat:no-repeat;background-size:100% 100%}
        .wagesBtn:active{background-image:url(https://img.jianlc.cn/app/wagesPlan/btn_press.png)}
        .wagesBtn a{color:#3f2b06}.a-line{width:100%;height:.14rem;border-bottom:1px solid #eee9dc}
        #wagesBtn{margin: 0;padding: 0px;}
        .wrap{padding-bottom: 0px;}

        .content{display:none;z-index:10;}

        .layui-form-select .layui-input {
            padding-right: 30px;
            cursor: pointer;
            display: block;
        }

        .wechat-head {
            clear: both;
            width:100%;height:100px;font-size:15px;color: #fff;
            text-align:center;background-image:url('<?php echo e(asset("assets/frontend/index/web/images/wechat/wechat-head.png")); ?>');
            background-repeat:no-repeat;background-size:100% 100%
        }

        /*.wechat-assessment{*/
            /*z-index: 100;*/
            /*position: fixed;*/
            /*bottom: 100px;*/
        /*}*/

        /*.wechat-assessment img{*/
            /*width: 80%;*/
            /*margin: 0 auto;*/
        /*}*/

        /*ui-loader ui-corner-all ui-body-a ui-loader-default{*/
            /*display: none;*/
        /*}*/

        /*.layui-form input[type=checkbox], .layui-form input[type=radio], .layui-form select{*/
            /*display: block;*/
        /*}*/

    </style>
</head>
<body class="content640">
<div class="wrap">
    <div class="header">
        <img src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/01.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/02.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/03.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/04.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/05.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/06.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/07.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/08.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/09.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/10.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/11.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/12.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/13.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/14.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/15.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/16.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/17.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/18.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/19.png')); ?>">
        <img class="marginT" src="<?php echo e(URL::asset('assets/frontend/index/web/images/wechat/20.png')); ?>" id="showButton">
    </div>
    
        
    

    
        
    

    <div class="content">
        <form class="brand-form">
            <div class="layui-form">
                <div class="wechat-head">
                    <div style="padding-top: 38px;">填写信息，获得针对你的大数据服务</div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline" style="display: block;width: 85%;margin: 0 auto;margin-top: 10px;">
                        <select name="category" class="layui-input" id="data-category">
                            <option value="">选择经营类别</option>

                            <?php if(isset($category) && !empty($category)): ?>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" style="display: block"><?php echo e($value->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline" style="display: block;width: 85%;margin: 0 auto;margin-top: 10px;border-radius: 5px;">
                        <input type="text" name="name" autocomplete="off" placeholder="请输入您的店铺名称" class="layui-input" id="data-brand" >
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline" style="display: block;width: 85%;margin: 0 auto;margin-top: 10px;border-radius: 5px;">
                        <input type="text" name="name" autocomplete="off" placeholder="请输入客单价（元）" class="layui-input" id="data-unit-price">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: 280px;">您最希望获得的服务（最多两个）</label>
                    <div class="layui-inline" style="display: block;width: 85%;margin: 0 auto;margin-top: 10px;border-radius: 5px;">
                        <span style="margin-left: 20px;"><input type="checkbox" name="service" title="营销服务" value="营销服务"></span>
                        <span style="margin-left: 30px;"><input type="checkbox" name="service" title="竞品分析" value="竞品分析"></span>
                        <span style="margin-left: 20px;"><input type="checkbox" name="service" title="选址评估" value="选址评估"></span>
                        <span style="margin-left: 30px;"><input type="checkbox" name="service" title="签约建议" value="签约建议"></span>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline" style="display: block;width: 85%;margin: 0 auto;margin-top: 10px;border-radius: 5px;">
                        <input type="text" name="mobile" autocomplete="off" placeholder="请输入手机号" class="layui-input" id="mobileData">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline" style="width: 85%;display: block;margin: 0 auto;margin-top: 10px;">
                        <span style="width: 60%;float: left;">
                            <input type="text" name="name" autocomplete="off" placeholder="请输入验证码" class="layui-input" id="verification-code">
                        </span>
                        <span class="layui-btn" id="brandCode" style="float: left;width: 40%;background-color: #083680;color:#fff;">获取验证码</span>
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-input-block" style="width: 300px;height: 44px;margin: 0 auto;">
                        <div class="layui-btn" style="width: 300px;height: 44px;line-height: 44px;margin: 0 auto;background-color: #083680;color:#fff;" lay-filter="*" id="submitButton">立即提交</div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <script src="<?php echo e(asset('assets/frontend/index/web/js/jquery-1.9.1.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/frontend/index/web/layui.js')); ?>" type="text/javascript"></script>
    
    <script>

        layui.config({
            base: '/assets/frontend/index/web/lay/modules/'
            ,version: '1490981130731'
        }).use('global','jquery');

        $(document).ready(function(){
            $("#showButton").on('click',function () {

                layui.use('layer', function(){
                    //示范一个公告层
                    layer.open({
                        type: 1,
                        title: false,
                        closeBtn: true,
                        shadeClose:true,
                        offset: [
                            ($(window).height() - 560)/2,
                        ],
                        shade: 0.5,
                        id: 'LAY_layuipro',
                        resize: false,
                        btnAlign: 'c',
                        moveType: 1, //拖拽模式，0或者1
                        content: $('.content'),
                        success: function(layero){
                            var btn = layero.find('.layui-layer-btn');
                        },
                        yes: function(layero){

                        }
                    });
                });
            });

            $('#submitButton').on('click',function () {

                var chk_value = [];
                $('input[name="service"]:checked').each(function(){
                    chk_value.push($(this).attr('value'));
                });

                if(chk_value.length==0 || chk_value.length > 2){
                    layui.use('layer', function(){
                        var layer = layui.layer;
                        layer.msg("至少选择一项并且最多选择两项服务");
                    });
                }else{
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo e(url("index/dowechat")); ?>',
                        data: {type:3,'service':chk_value.join("，"),'category':$("#data-category").val(),'verification':$("#verification-code").val(),'mobile':$('#mobileData').val(),'unit_price':$("#data-unit-price").val(),'brand':$("#data-brand").val()},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data){

                            if(data.status == 1){
                                layui.use('layer', function(){
                                    var layer = layui.layer;
                                    //layer.msg(data.message);
                                    layer.msg(data.message, {
                                        time: 20000, //20s后自动关闭
                                        btn: ['关闭'],
                                        yes: function(){
                                            layer.closeAll();
                                        }
                                    });
                                    //window.setTimeout(timeout(),3000); //1秒后调用fun函数
                                });
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
                }

            });

            $("#brandCode").on('click',function () {
                var mobileData = $("#mobileData").val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("index/captcha")); ?>',
                    data: { mobile : mobileData},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        if(data.status == 1){
                            layui.use('layer', function(){
                                var layer = layui.layer;
                                layer.msg(data.message);
                            });
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

//            $(document).on("scrollstop",function(){
//                $('.wechat-assessment').show();
//            });
//
//            $(document).on("scrollstart",function(){
//                $('.wechat-assessment').show();
//            });
//            $('.ui-loader-default').hide();
        })
    </script>

    <script src="<?php echo e(asset('assets/js/tongji.js')); ?>" type="text/javascript"></script>
</div>
</body>
</html>