<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/index/web/css/common.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/index/web/css/live.css')); ?>">
</head>
<body>
<?php echo $__env->make('Frontend.Index.CN.Web.Layout.reminder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="box">
    <!---------头部-------->
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="mine">
        <div class="my"><a href="<?php echo e(url('detail/index/')); ?>?id=<?php echo e($id); ?>"><span>商铺详情 > </span><a href="<?php echo e(url('index/live')); ?>?id=<?php echo e($id); ?>"><span>现场勘查服务 > </span></a><i>服务报告示例</i></div>
    </div>
    <div class="_articleBig">
        <div class="report_con">
            <h4>选铺100新店实勘报告</h4>
            <h6>目录</h6>
            <ul>
                <li>实勘流程</li>
                <li>平面图</li>
                <li>店铺基本信息（含工程条件、租赁信息）</li>
                <li>店铺实拍</li>
                <li>证照情况</li>
                <li>店铺周边信息采集</li>
                <li>房产信息</li>
            </ul>
            <h6>实勘流程图</h6>
            <div class="lct"></div>
            <h6>店址基本信息</h6>
            <div class="jbxx"></div>
            <h6>店址的工程条件</h6>
            <p>此店址配套设施齐全，无需更多改动，可经营餐饮</p>
            <div class="gctj"></div>
            <h6>店址的租赁信息</h6>
            <div class="zlxx"></div>
            <ul class="zheng">
                <li>
                    <h6>店址的证照情况</h6>
                    <p>此店址证照齐全，可以办餐饮执照</p>
                    <div class="yyzz"></div>
                </li>
                <li>
                    <h6>店址的房产证信息</h6>
                    <p>此店址房产为个人房产，房东直租，产权清晰</p>
                    <div class="fcz"></div>
                </li>
                <li>
                    <h6>房东的身份信息</h6>
                    <p>此店址为房东直租，房源安全可靠</p>
                    <div class="fd"></div>
                </li>
                <li>
                    <h6>店址的平面图</h6>
                    <p>此店址为一层，户型方正，门头9米，</p>
                    <p>厨房面积60平，店内可摆放70个餐位</p>
                    <div class="pmt"></div>
                </li>
            </ul>
            <h6>各角度看新址真实图</h6>
            <div class="p1"></div>
            <div class="p2"></div>
            <div class="p3"></div>
            <div class="p4"></div>
            <div class="p5"></div>
            <div class="p6"></div>
            <h6>新址外看真实图</h6>
            <div class="t1"></div>
            <div class="t2"></div>
            <div class="t3"></div>
            <div class="t4"></div>
            <div class="t5"></div>
            <div class="t6"></div>
            <h6>店铺内部环境照片</h6>
            <div class="qfd">
                <div class="n1"></div>
                <div class="n2"></div>
            </div>

        </div>
    </div>
</div>
<?php echo $__env->make('Frontend.Index.CN.Web.Layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset('assets/frontend/index/web/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/index/web/js/index.js')); ?>"></script>
</body>
</html>