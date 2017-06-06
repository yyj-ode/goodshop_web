<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/index/web/css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/index/web/css/live.css')); ?>">
</head>
<body>
<!--登录-->
<?php echo $__env->make('Frontend.Index.CN.Web.Layout.reminder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="box">
    <!---------头部-------->
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="mine">
        <div class="my"><span>商铺详情 > </span><i>现场勘查服务</i></div>
    </div>
    <div class="_article">
        <div class="paysuccess">
            <div class="bingo">
                <i></i>
                <div class="bingRight">
                    <h6>支付成功！</h6>
                    <p>30分钟内会有[选铺100]工作人员与你联系，请耐心等待！</p>
                </div>
            </div>
            <div class="xuanze">
                <a href="<?php echo e(url("order/index")); ?>"><p>查看订单</p></a>
                <a href="http://web.nndeal.app"><p>继续选铺</p></a>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('assets/frontend/index/web/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/index/web/js/index.js')); ?>"></script>
</body>
</html>