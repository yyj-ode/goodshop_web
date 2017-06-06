<?php $__env->startSection('seo'); ?>
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.seo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('reminder'); ?>
    <!--登录-->
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.reminder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('banner'); ?>

    <div class="banner">
        <div class="banner_con">
            <div class="text">
                <h4>全网铺源</h4>
                <p>大数据捕获全网真实有效店址</p>
            </div>
            <div class="search">
                <form action="<?php echo e(url('/')); ?>" id="search_form">
                    <input id="shop_area" name="shop_area" value="" type="hidden">
                    <input id="shop_type" name="business_type" value="0" type="hidden">
                    <input id="min_area" name="min_area" value="0" type="hidden">
                    <input id="max_area" name="max_area" value="99999999" type="hidden">
                    <input id="min_rent" name="min_rent" value="0" type="hidden">
                    <input id="max_rent" name="max_rent" value="9999999" type="hidden">

                    <input id="management" name="management" value="9999999" type="hidden">
                    <div class="search_key">
                        <input type="text" placeholder="输入关键字" name="key" id="search_content">
                        
                        <a href="###"><span id="search_key"></span></a>
                    </div>
                    <div class="line">
                        <div class="lineOne"></div>
                        <div class="find">输入条件找铺</div>
                        <div class="lineTwo"></div>
                    </div>
                    <div class="select">
                        <div class="domain"><i bd="" id="check_area">开店区域</i><a href="###"><span></span></a>
                            <div class="first none">
                                <div class="erji none"></div>
                                <ul class="all">
                                    <li>全部
                                        <ul>
                                            <li>全部</li>
                                        </ul>
                                    </li>
                                    <?php $__currentLoopData = $area_level['area_level2']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $v2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($v2['name']); ?>

                                            <ul>
                                                <?php $__currentLoopData = $area_level['area_level3']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k3 =>$v3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($k2 == $k3): ?>
                                                        <?php $__currentLoopData = $v3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k4 => $v4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li value="<?php echo e($v4['id']); ?>"><?php echo e($v4['name']); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="type"><i bd="" id="check_type">商铺类型</i><a href="###"><span></span></a>
                            <div class="second none">
                                <ul>
                                    <?php $__currentLoopData = $format; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li value="<?php echo e($value['id']); ?>"><?php echo e($value['name']); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="area"><i bd="" id="check_mj">经营面积</i><a href="###"><span></span></a>
                            <div class="third none">
                                <ul>
                                    <li min="0" max="99999999">不限</li>
                                    <?php $__currentLoopData = $totalarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li min="<?php echo e($value['min_area']); ?>" max="<?php echo e($value['max_area']); ?>"><?php echo e($value['value']); ?>㎡</li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="budget"><i bd="" id="check_rent">开店预算</i><a href="###"><span></span></a>
                            <div class="forth none">
                                <ul>
                                    <li min="0" max="99999999">不限</li>
                                    <?php $__currentLoopData = $price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li min="<?php echo e($v['price_min']); ?>" max="<?php echo e($v['price_max']); ?>"><?php echo e($v['value']); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="choice"><a href="###">开始选铺</a></div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="content">
        <div class="show">店址推荐
            <div class="alert none">
              已为您从&nbsp;<span id="count">33567256</span>&nbsp;个店址中筛选出&nbsp;<i id="map_count">36896</i>&nbsp;个有效地址
            </div>
        </div>

        <div class="pic_show">
            <!--***********组一***********-->
            
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="pic_list mar_right">
                    <a href="<?php echo e(url('detail/index').'?id='.$value['id']); ?>">
                        <dl>
                            <dt>
                              
                                <img src="<?php echo e(asset(strExplode($value['our_image']))); ?>" alt="">
                            <div class="tip"><span>客流：暂无</span></div>
                            </dt>
                            <dd>
                                <div class="shop_mess">
                                    <span class="shop_area"><?php echo e($value['total_area']); ?>㎡</span>
                                    <span class="shop_style"><?php echo e($value['business_type']); ?></span>
                                </div>
                                <div class="shop_money">
                                    <span class="shop_mon_money"><?php echo e($value['rent']); ?></span>元/月
                                    <span class="shop_forother">转让费：<i><?php echo e($value['leasing_payment']); ?></i></span>
                                </div>
                                <div class="shop_addr"><span></span><?php echo e($value['location']); ?></div>
                                <div class="shop_around">
                                    <span class=" near">写字楼<?php echo e($value['officebuilding_num']); ?></span>
                                    <span class=" near">小区<?php echo e($value['village_num']); ?></span>
                                    <span class=" near">商铺<?php echo e($value['shopsurrounding_num']); ?></span>
                                    <span class=" near">购物中心<?php echo e($value['shoppingcenter_num']); ?></span>
                                </div>
                                <div class="shop_news">
                                    <?php echo e(timeShow($value['updated_at'])); ?>

                                </div>
                            </dd>
                        </dl>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <input type="hidden" id="start" name="start" value="0">
        <div class="more" id="more"><a href="###">点击查看更多</a></div>

    </div>
    <!--首页筛选-->
    
    <div class="return none">
        <a href="###"><div class="top"></div></a>
        <div class="server_phone none">客服电话<br>010-58220156</div>
        <a href="###"><div class="phone"></div></a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('assets/frontend/index/web/js/index.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        // ----------------------------首页的货--------------------------
        //最开始的蒙层
        $("body").on("click",".filter_content>p>span",function(){
            $(".filter").addClass("none");
        });
        $("body").on("click",".filter_con>i",function(){
            $(".filter").addClass("none");
            //打开页面3秒后弹窗消失
            var management = $(this).attr('val');
            $('#management').attr('value',management);
            //经营业态
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("index/management_search")); ?>',
                data:{'management':management},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    //搜索数据结果显示
                    $('#count').html(data['count']);
                    $('#map_count').html(data['map_count']);
                    $(".content .show .alert").removeClass("none");
                    //打开页面3秒后弹窗消失
                    setTimeout(function () {
                        $(".content .show .alert").addClass("none");
                    },3000);
                    if(data['static'] == 200){
                        var start = $('#start').val();
                        var start = parseInt(start) + 6;
                        $('#start').attr('value',start);
                        var html = '';
                        $.each(data['content'], function(k, v){
                            html += '<div class="pic_list mar_right"><a href="<?php echo e(url('detail/index')); ?>?id='+v['id']+'"><dl><dt><img src="'+v.our_image+'" alt="">';
                            html += '<div class="tip"><span>客流：暂无</span></div> <!--<h5>暂无数据</h5>--> </dt> <dd><div class="shop_mess">';
                            html += '<span class="shop_area">'+v.total_area+'㎡</span> <span class="shop_style">'+v.business_type+'</span> </div> <div class="shop_money">';
                            html += '<span class="shop_mon_money">'+v.rent+'</span>元/月 <span class="shop_forother">转让费：<i>'+v.leasing_payment+'</i></span>';
                            html += '</div> <div class="shop_addr"><span></span>'+v.location+'</div> <div class="shop_around">';
                            html += '<span class="shop_around_one near">写字楼'+v.officebuilding_num+'</span> <span class="shop_around_two near">小区'+v.village_num+'</span><span class="shop_around_two near">商铺'+v.shopsurrounding_num+'</span><span class="shop_around_two near">购物中心'+v.shoppingcenter_num+'</span> ';
                            html += '</div> <div class="shop_news">'+v.updated_at+'</div> </dd> </dl> </a> </div>';
                        });
                        $('.pic_show').html(html);
                    }else{
                         $('#more').addClass("none");
                        $('.pic_show').html('');
                    }
                },
                error: function(xhr, type){
                }
            });

        });
        //点击出现筛选框
        $(document).on("click",".domain span",function(){
            $(".first, .third, .forth, .second").addClass("none");
            $(".domain .first").removeClass("none");
        });
        //鼠标划过出现二级联动
        $(".domain .all li").mouseenter(function(e){
            $(".domain .erji").removeClass("none");
            $(".domain .erji").html($(this).find("ul").html());
        });
        //点击选中显示
        $(document).on("click",".erji li",function(){
            $(".domain i").text(($(this).text()));
            $(".domain .first").addClass("none");
            var area_id = $(this).attr('value');
            $('#shop_area').val(area_id);
        });
        //鼠标移出
        // $(".first, .third, .forth, .second").mouseleave(function(e){
        //     alert(8)
        //     $(this).addClass("none");
        // });


        //点击出现筛选框2
        $(document).on("click",".type span",function(){
            $(".first, .third, .forth, .second").addClass("none");
            $(".second").removeClass("none");

        });
        //点击选中显示
        $(document).on("click",".second ul li",function(){
            $(".type i").text(($(this).text()));
            $(".second").addClass("none");

            var type = $(this).attr('value');
            $('#shop_type').val(type);
        });
        //鼠标移出
        /*$(".second").mouseleave(function(e){
         $(this).addClass("none");
         });*/

        //点击出现筛选框3
        $(document).on("click",".area span",function(){
            $(".first, .third, .forth, .second").addClass("none");
            $(".third").removeClass("none");
        });
        //点击选中显示
        $(document).on("click",".third ul li",function(){
            $(".area i").text(($(this).text()));
            $(".third").addClass("none");

            var min_area = $(this).attr('min');
            var max_area = $(this).attr('max');
            $('#min_area').val(min_area);
            $('#max_area').val(max_area);
        });
        //鼠标移出
        /*$(".third").mouseleave(function(e){
         $(this).addClass("none");
         });*/

        //点击出现筛选框4
        $(document).on("click",".budget span",function(){
            $(".first, .third, .forth, .second").addClass("none");
            $(".forth").removeClass("none");
        });
        //点击选中显示
        $(document).on("click",".forth ul li",function(){
            $(".budget i").text(($(this).text()));
            $(".forth").addClass("none");

            var min = $(this).attr('min');
            var max = $(this).attr('max');
            $('#min_rent').val(min);
            $('#max_rent').val(max);

        });
        //鼠标移出

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


        
           $('#search_key').on('click',function(){
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg('正在查询中...');
            });
            //搜索条件
            var key = $('#search_content').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("index/searchkey")); ?>',
                data:{'key':key},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    if(data.static == 200){
                        var start = $('#start').val();
                        var start = parseInt(start) + 6;
                        $('#start').attr('value',start);
                        var html = '';
                        $.each(data['content'][1], function(k, v){
                            html += '<div class="pic_list mar_right"><a href="<?php echo e(url('detail/index')); ?>?id='+v['id']+'"><dl><dt><img src="'+v.our_image+'" alt="">';
                            html += '<div class="tip"><span>客流：暂无</span></div><!-- <h5>暂无数据</h5>--> </dt> <dd><div class="shop_mess">';
                            html += '<span class="shop_area">'+v.total_area+'㎡</span> <span class="shop_style">'+v.business_type+'</span> </div> <div class="shop_money">';
                            html += '<span class="shop_mon_money">'+v.rent+'</span>元/月 <span class="shop_forother">转让费：<i>'+v.leasing_payment+'</i></span>';
                            html += '</div> <div class="shop_addr"><span></span>'+v.location+'</div> <div class="shop_around">';
                            html += '<span class="shop_around_one near">写字楼'+v.officebuilding_num+'</span> <span class="shop_around_two near">小区'+v.village_num+'</span> <span class="shop_around_two near">商铺'+v.shopsurrounding_num+'</span> <span class="shop_around_two near">购物中心'+v.shoppingcenter_num+'</span> ';
                            html += '</div> <div class="shop_news">'+v.updated_at+'</div> </dd> </dl> </a> </div>';
                        });
                        $('#search_content').attr('value',data['content'][2]);
                        $('.pic_show').html(html);
                    }else{
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg(data.error);
                        });
                        $('#more').addClass("none");
                    }
                    //搜索数据结果显示
                    $('#count').html(data['content']['count']);
                    $('#map_count').html(data['content']['map_count']);
                    $(".content .show .alert").removeClass("none");
                    //打开页面3秒后弹窗消失
                    setTimeout(function () {
                        $(".content .show .alert").addClass("none");
                    },3000);
                },
                error: function(xhr, type){
                }
            });

        });

        
        $('.choice').on('click',function(){
            //搜索条件
            var shop_area = $('#shop_area').val();
            var business_type = $('#shop_type').val();
            var min_area = $('#min_area').val();
            var max_area = $('#max_area').val();
            var min_rent = $('#min_rent').val();
            var max_rent = $('#max_rent').val();

            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg('正在查询中...');
            });

            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("index/shop_search")); ?>',
                data:{'length':12,'shop_area':shop_area,'business_type':business_type,'min_area':min_area,'max_area':max_area,'min_rent':min_rent,'max_rent':max_rent},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){

                    if(data['status'] == 200){
                        var start = $('#start').val();
                        var start = parseInt(start) + 6;
                        $('#start').attr('value',start);
                        var html = '';
                        $.each(data['content'], function(k, v){
                            html += '<div class="pic_list mar_right"><a href="<?php echo e(url('detail/index')); ?>?id='+v['id']+'"><dl><dt><img src="'+v.our_image+'" alt="">';
                            html += '<div class="tip"><span>客流：暂无</span></div><!-- <h5>暂无数据</h5>--> </dt> <dd><div class="shop_mess">';
                            html += '<span class="shop_area">'+v.total_area+'㎡</span> <span class="shop_style">'+v.business_type+'</span> </div> <div class="shop_money">';
                            html += '<span class="shop_mon_money">'+v.rent+'</span>元/月 <span class="shop_forother">转让费：<i>'+v.leasing_payment+'</i></span>';
                            html += '</div> <div class="shop_addr"><span></span>'+v.location+'</div> <div class="shop_around">';
                            html += '<span class="shop_around_one near">写字楼'+v.officebuilding_num+'</span> <span class="shop_around_two near">小区'+v.village_num+'</span> <span class="shop_around_two near">商铺'+v.shopsurrounding_num+'</span> <span class="shop_around_two near">购物中心'+v.shoppingcenter_num+'</span> ';
                            html += '</div> <div class="shop_news">'+v.updated_at+'</div> </dd> </dl> </a> </div>';
                        });
                        $('.pic_show').html(html);
                    }else{
                        $('#more').addClass("none");
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg(data.error);
                        });
                    }

                    //搜索数据结果显示
                    $('#count').html(data['count']);
                    $('#map_count').html(data['map_count']);
                    $(".content .show .alert").removeClass("none");
                    //打开页面3秒后弹窗消失
                    setTimeout(function () {
                        $(".content .show .alert").addClass("none");
                    },3000);
                },
                error: function(xhr, type){
                }
            });
        });

        
        $('.more').on('click',function(){
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg('正在加载...');
            });
            var start = $('.pic_show .pic_list').length;
            var key = $('#search_content').val();
            var shop_area = $('#shop_area').val();
            var business_type = $('#shop_type').val();
            var min_area = $('#min_area').val();
            var max_area = $('#max_area').val();
            var min_rent = $('#min_rent').val();
            var max_rent = $('#max_rent').val();

            $.ajax({
                type: 'POST',
                url: '<?php echo e(url("index/moredata")); ?>',
                data:{'start':start,'length':12,'shop_area':shop_area,'key':key,'business_type':business_type,'min_area':min_area,'max_area':max_area,'min_rent':min_rent,'max_rent':max_rent},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    if(data['status'] == 200){
                        var html = '';
                        $.each(data['content'], function(k, v){
                            html += '<div class="pic_list mar_right"><a href="<?php echo e(url('detail/index')); ?>?id='+v['id']+'"><dl><dt><img src="'+v.our_image+'" alt="">';
                            html += '<div class="tip"><span>客流：暂无</span></div><!-- <h5>暂无数据</h5>--> </dt> <dd><div class="shop_mess">';
                            html += '<span class="shop_area">'+v.total_area+'㎡</span> <span class="shop_style">'+v.business_type+'</span> </div> <div class="shop_money">';
                            html += '<span class="shop_mon_money">'+v.rent+'</span>元/月 <span class="shop_forother">转让费：<i>'+v.leasing_payment+'</i></span>';
                            html += '</div> <div class="shop_addr"><span></span>'+v.location+'</div> <div class="shop_around">';
                            html += '<span class="shop_around_one near">写字楼'+v.officebuilding_num+'</span> <span class="shop_around_two near">小区'+v.village_num+'</span> <span class="shop_around_two near">商铺'+v.shopsurrounding_num+'</span> <span class="shop_around_two near">购物中心'+v.shoppingcenter_num+'</span> ';
                            html += '</div> <div class="shop_news">'+v.updated_at+'</div> </dd> </dl> </a> </div>';
                        });
                        $('.pic_show').append(html);

                    }else{
                        $('#more').addClass("none");
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg(data.error);
                        });
                    }
                },
                error: function(xhr, type){
                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.Index.CN.Web.Layout.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>