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
        <div class="my"><a href="<?php echo e(url('')); ?>">我的 > </a><i>我的收藏</i></div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="coll_con">
        <div class="coll_concon">
            <ul>
                <div class="quxiao none">已取消收藏</div>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="pic"><a href="<?php echo e(url('detail/index')); ?>?id=<?php echo e($value['id']); ?>"><img src="<?php echo e(asset(strExplode($value['our_image']))); ?>" alt=""></a></div>
                        <div class="pic_right">
                            <div class="rit_top">
                                <h4>区域类型：<i>暂无数据</i></h4>
                                <div class="keliu">
                                    <span>客流:<i>暂无</i></span>
                                    <span class="aa">暂无数据</span>
                                    <em class="aa"><?php echo e($value['total_area']); ?>㎡</em>
                                </div>
                                <div class="jiage"><i><?php echo e(intval($value['rent'])); ?></i>元/月</div>
                            </div>
                            <div class="rit_bom">
                                <div class="bom_left">
                                    <div class="diqu">
                                        <i></i>
                                        <em><?php echo e($value['city']); ?>-<?php echo e($value['county']); ?></em>
                                        <span>写字楼<?php echo e($value['officebuilding_num']); ?></span>
                                        <span>小区<?php echo e($value['village_num']); ?></span>
                                        <span>商铺<?php echo e($value['shopsurrounding_num']); ?></span>
                                        <span>购物中心<?php echo e($value['shoppingcenter_num']); ?></span>
                                    </div>
                                    <p>收藏于<em><?php echo e(timeShow($value['updated_at'])); ?></em></p>
                                </div>
                                <div class="bom_right">
                                    <p id="<?php echo e($value['id']); ?>"><i></i>取消收藏</p>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="page">
               
                <a href="<?php echo e(url('collection/index')); ?>?page=<?php echo e($last_page); ?>"><div></div></a>
                <?php $__currentLoopData = $pages_show; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($v == '...'): ?>
                        <div><?php echo e($v); ?></div>
                    <?php else: ?>
                        <div><a href="<?php echo e(url('collection/index')); ?>?page=<?php echo e($v); ?>" style="<?php if($v==$current_page) echo 'background-color:#888';?>"><?php echo e($v); ?></a></div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url('collection/index')); ?>?page=<?php echo e($next_page); ?>"><div></div></a>
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
    <script src="<?php echo e(asset('assets/frontend/index/web/js/jquery.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/frontend/index/web/layui.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/tongji.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/frontend/index/web/js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/index/web/js/index.js')); ?>"></script>
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
//                    layui.use('layer', function(){
//                        var layer = layui.layer;
//                        layer.msg(data.message);
//                    });

                        $(".mask").addClass("none");
                        $(".mymy").removeClass("none");

                        $('#user_login').css('display','none');
                        $('#user_center').css('display','block');

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
                        $(".mymy").addClass("none");
                        $("._user").removeClass("none");
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg("登录成功退出！");
                            location.reload();
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
                    $(".mymy").removeClass("none");
                    $("._user").addClass("none");

                    /*  $('#user_login').css('display','none');
                     $('#user_center').css('display','block');*/
                }
            },
            error: function(xhr, type){
                alert('Ajax error!')
            }
        });


        // 点击用户弹出登录页面
        $(".head").on("click","._user",function(){
            $(".mask").removeClass("none");
        });

        // 点击取消收藏
        $('div.rit_bom > div.bom_right > p').on('click',function(){
            var detail_id = $(this).attr('id');
            var detail_element = $(this);
//            alert(detail_id);
            $.ajax({
                type:'GET',
                url:'<?php echo e(url('collection/delete')); ?>',
                dataType: 'json',
                data:{'id':detail_id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    alert(data);
                    if(data == '收藏成功'){
                        detail_element.html('<i></i> 取消收藏');
                    }else{
                        detail_element.html('<i></i> 收藏');
                    }
                },
                error:function(){
                    alert('请求失败');
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.Index.CN.Web.Layout.common_collection', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>