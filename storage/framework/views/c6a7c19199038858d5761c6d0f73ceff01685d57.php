<?php $__env->startSection('seo'); ?>
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.seo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('reminder'); ?>
    
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.reminder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('banner'); ?>
    
    <div class="mine">
        <div class="my">我的 > <i>我的订单</i></div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="coll_con">
        <div class="coll_concon">
            <ul>
                <div class="quxiao none">已取消收藏</div>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                   <div class="pic"><a href="<?php echo e(url('detail/index')); ?>?id=<?php echo e($v['id']); ?>"><img src="<?php echo e(asset(strExplode($v['our_image']))); ?>" alt=""></a></div>
                    <div class="pic_right">
                        <div class="rit_top">
                            <h4>区域类型：<i>正在评估中</i></h4>
                            <div class="keliu">
                                <span>客流:<i>评估中</i></span>
                                <span class="aa">写字楼配套</span>
                                <em class="aa"><?php echo e($v['total_area']); ?>㎡</em>
                            </div>
                            <div class="jiage"><i><?php echo e($v['rent']); ?></i>元/月</div>
                        </div>
                        <div class="rit_bom">
                            <div class="bom_left">
                                <div class="diqu">
                                    <i></i>
                                    <em><?php echo e($v['city']); ?>-<?php echo e($v['county']); ?></em>
                                    <span>写字楼<?php echo e($v['officebuilding_num']); ?></span>
                                    <span>小区<?php echo e($v['village_num']); ?></span>
                                    <span>商铺<?php echo e($v['shopsurrounding_num']); ?></span>
                                    <span>购物中心<?php echo e($v['shoppingcenter_num']); ?></span>
                                </div>
                                <p>申请于<em><?php echo e(timeShow($v['created_at'])); ?></em></p>
                            </div>
                            <div class="bom_right">
                                <p class="different"><?php echo e($v['order_status']); ?></p>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="page">
                <a href="<?php echo e(url('order/index')); ?>?page=<?php echo e($last_page); ?>"><div></div></a>
                <?php $__currentLoopData = $pages_show; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($v == '...'): ?>
                        <div><?php echo e($v); ?></div>
                    <?php else: ?>
                        <div><a href="<?php echo e(url('order/index')); ?>?page=<?php echo e($v); ?>" style="<?php if($v==$current_page) echo 'background-color:#888';?>"><?php echo e($v); ?></a></div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url('order/index')); ?>?page=<?php echo e($next_page); ?>"><div></div></a>
            </div>
        </div>

    </div>
    <div class="return">
        <!--<a href="###"><div class="top"></div></a>-->
        <div class="server_phone none">客服电话<br>010-58220156</div>
        <a href="###"><div class="phone"></div></a>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('assets/frontend/index/web/js/index.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('assets/frontend/index/web/js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/index/web/js/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.Index.CN.Web.Layout.common_collection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>