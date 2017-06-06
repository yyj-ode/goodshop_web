
<style>
    .wd{
        width:215px;
        height:40px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 2px -3px 5px #ddd;
        line-height:40px;
        background: #fff;
        text-align: center;
        position: absolute;
        right:0;
        bottom: -30px;
    }
</style>

<div class="head">
    <ul>
        <li>
            <a href="<?php echo e(url('/')); ?>" id="logo"></a>
        </li>
        <li>
            <a href="###" class="_addr"><span class="addr"></span><i>北京</i></a>
        </li>
        <li>
            <a href="###" class="_user" id="user_login"  <?php if($user_login): ?> style="display: none" <?php else: ?> style="display: block" <?php endif; ?>  ><span class="user"></span><i>登录</i></a>
            <a href="###" <?php if($user_login): ?> style="display: block" <?php else: ?> style="display: none" <?php endif; ?> id="user_center"><span class="user"></span><i>个人中心</i></a>
        </li>
        <li>
            <a href="###" class="_read"><span class="read_"></span><i>店址订阅</i></a>
        </li>
    </ul>
    <!--********遮罩层*********-->

    <!--我的展开-->
    <div class="wd" id="wd" <?php if($user_login): ?> style="display: block" <?php else: ?> style="display: none" <?php endif; ?> >
        <a href="<?php echo e(url('collection/index')); ?>"><span class="collect">我的收藏</span></a>
        <a href="<?php echo e(url('order/index')); ?>"><span class="order">我的订单</span></a>
        <a href="###"><span class="back" id="userLogout">退出</span></a>
    </div>
</div>