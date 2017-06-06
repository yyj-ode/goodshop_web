<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="Shortcut Icon" href="<?php echo e(asset('assets/frontend/index/web/images/favicon.ico')); ?>">
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
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>NNDeal_web</title>
    <meta name="keywords" content="基于人工智能的品牌选址专家" />
    <meta name="description" content="基于人工智能的品牌选址专家" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/index/web/css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/index/web/css/live.css')); ?>">
    <script src="<?php echo e(asset('assets/frontend/index/web/js/jquery-1.8.3.min.js')); ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/index/web/css/DialogBySHF.min.css')); ?>">
    <script src="<?php echo e(asset('assets/frontend/index/web/js/DialogBySHF.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/frontend/index/web/js/qrcode.js')); ?>"></script>
</head>
<body>
<style>
    .article .erweima{
        width: 100%;
        height: 206px;
        margin:5px 0 50px 0;
    }
    .article{
        width: 900px;
        height:869px;
        margin:0 auto;
        padding: 60px 45px 0;
        text-align: center;
        background: #fff;
        position: relative;
    }
    .article .float{
        float: left;
        width: 150px;
        height: 210px;
        margin:0 20px;
    }
   /* .article .erweima .maone,.article .erweima .matwo{
        width: 150px;
        height: 210px;
        background: url(../images/border.png) no-repeat;
    }*/
    .article .erweima img{
        width: 115px;
        height: 115px;
        margin-top: 25px;
        margin-bottom: 12px;
    }
    .article .erweima p{
        font-size: 10px;
        color:#999;
        line-height: 20px;
    }
</style>
<!--登录-->
<!--登录-->
<?php echo $__env->make('Frontend.Index.CN.Web.Layout.reminder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--订阅-->

<div class="box">
    <!---------头部-------->

    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="_article">
        <div class="article">
            <h4>选铺100专业现场勘查服务</h4>
            <p>实勘服务是作为顾客的“眼“，让专业的人代替客户去实勘店铺，</p>
            <p>产出实勘报告，节省客户时间成本，快速了解店铺。</p>
            <h6>服务内容</h6>
            <div class="article_con">
                <p>1.店铺的基本信息（房屋地址、面积、楼层等）、工程信息（电量、上下水、隔油池等）、租赁信息（租金和付款方式、转让费等）;</p>
                <p>2.证照情况及房产证把控，只做正规店铺、放心租铺。</p>
                <p>3.绘制店铺平面图。房屋结构一目了然。</p>
                <p>4.采集照片，室内装修情况和外部环境情况。</p>
                <p>5.店铺周边信息采集（小区、人流、客群画像、竞争业态等）。</p>
                <p>6.竞争店信息，知己知彼百战不殆。</p>
                <a href="<?php echo e(url("index/report")); ?>?id=<?php echo e($id); ?>"><h5>查看服务报告示例<i></i></h5></a>
            </div>
            <h6>支付方式</h6>
            <div class="zhifu">
                <!--<a href="###"><i></i></a>-->
                <!--<a href="###"><span></span></a>-->
                <i id="wwzf"></i>
                
            </div>

            <div class="erweima">
                <div class="float">
                    <div class="maone none" id="wxzf">
                       
                      
                        
                    </div>
                </div>
                
                    
                        
                        
                        
                    
                
            </div>

            <div class="zhifujin">
                <i>勘查服务金额:</i>
                <span>￥</span><span>100.00</span>
                
               
            </div>
            <input name="id" value="" id="id" type="hidden">
        </div>
    </div>
</div>

<?php echo $__env->make('Frontend.Index.CN.Web.Layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
    var wx = document.getElementById("wwzf");
    var zfb = document.getElementById("zfb");
    var wxzf = document.getElementById("wxzf");
    var zfbzf = document.getElementById("zfbzf");


    wwzf.onclick=function() {
//        zfb.style.border="1px solid transparent";
//        zfbzf.classList.add("none");
        layui.use('layer', function () {
            var layer = layui.layer;
            layer.msg('请稍后...');
        });


        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("order/pay")); ?>',
            /* data:{'start':start},*/
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.static == 200) {
                    $('#id').attr('value', data.id);
                    wx.style.border = "1px solid #083680";
                    wx.style.borderRadius = "5px";
                    wxzf.classList.remove("none");
                    var code_url = data.code_url;
                    if (code_url) {
                        var url = code_url;
                        //参数1表示图像大小，取值范围1-10；参数2表示质量，取值范围'L','M','Q','H'
                        var qr = qrcode(10, 'M');
                        qr.addData(url);
                        qr.make();
                        var str = qr.createImgTag();
                        str += '<p>请使用微信扫一扫</p><p>扫描二维码支付</p>';
                        $('#wxzf').html(str);

                        element.appendChild(wording);
                        element.appendChild(code);
                    }
                }else if(data.static == 100){
                    layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.msg(data.message);
                        $(".mask").removeClass("none");
                    });

                }else{
                    layui.use('layer', function () {
                        var layer = layui.layer;
                        layer.msg(data.message);
                    });

                }
            },
            error: function (xhr, type) {
                layui.use('layer', function () {
                    var layer = layui.layer;
                    layer.msg(data.error);
                });
            }
        });
    }
//    zfb.onclick=function(){
//        this.style.border="1px solid #083680";
//        this.style.borderRadius="5px";
//        wx.style.border="1px solid transparent";
//        wxzf.classList.add("none");
//        zfbzf.classList.remove("none");
//    }

    function check_pay(){
        /*var id={$order_id};
        $.post("{:U('order/zfstatic')}", {'id':id},function(msg){
            if(msg){
                var url = 'http://zk.tlf123.cn/index.php/Home/order/success/id/'+msg;
                parent.location.href=url;
            }
        })*/
        var id = $('#id').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("order/check_pay")); ?>',
            data:{'id':id},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                var url = '<?php echo e(url("order/success")); ?>';
                if(data.static == 200){
                    window.location.href = url;
                }
            },
            error: function(xhr, type){
                layui.use('layer', function(){
                    var layer = layui.layer;
                    layer.msg('未知错误');
                });
            }
        });
    }
    time=setInterval("check_pay()",5000);
</script>
<script src="<?php echo e(asset('assets/frontend/index/web/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/index/web/js/index.js')); ?>"></script>
</body>
</html>