<!--登录-->
<div class="mask none">
    <div class="login">
        <form action="" class="registerForm">
            <h4>用户登录</h4>
            <div class="phoneNumber">
                <!--<span></span>-->
                <img src="<?php echo e(asset('assets/frontend/index/web/images/phone.png')); ?>" alt="">
                <input type="text" placeholder="请输入手机号码" id="mobile_data">
            </div>
            <div class="verifica">
                <div class="verificationCode">
                    <!--<span></span>-->
                    <img src="<?php echo e(asset('assets/frontend/index/web/images/yanzheng.png')); ?>" alt="">
                    <input type="text" placeholder="请输入验证码" id="sms_code">
                </div>
                <div class="send" id="send"><a href="###">发送验证码</a></div>
            </div>
            <div class="rightNow" id="userLogin"><a href="###">立即登录</a></div>
            <p>登录代表您已同意&nbsp;&nbsp;<a href="<?php echo e(url('index/protocal')); ?>" target="_blank">NNDeal用户服务协议</a></p>
            <div class="login_text"><h6>其他方式登录</h6><a href="###"><img src="<?php echo e(asset('assets/frontend/index/web/images/weixin.png')); ?>" alt=""></a></div>
        </form>
        <div class="btn_one"></div>
    </div>
    <div class="wxlogin none">
        <h6>微信登录</h6>
        <div class="wximg">
            <img src="" alt="">
        </div>
        <p>请使用微信扫描二维码登录</p>
        <div class="btn_one1"></div>
    </div>
</div>

<div class="read none">
    <div class="shop_read">
        <p>店址订阅</p>
        <div class="shop_mess">
            <h6>实时获得最精确的店址推荐</h6>
            <div class="shop_choice">
                <div class="show_ul">
                    <input type="text" placeholder="请选择你的经营类型">
                    <span></span>
                </div>
                <div class="kuang none">
                    <ul>
                        <li type="subscribe_management_class"  val="type_restaurant_catering">酒楼餐饮</li>
                        <li type="subscribe_management_class" val="type_shoes_bag">服饰鞋包</li>
                        <li type="subscribe_management_class" val="type_beauty_salon">美容美发</li>
                        <li type="subscribe_management_class" val="type_recreation">休闲娱乐</li>
                        <li type="subscribe_management_class" val="type_life_service">生活服务</li>
                        <li type="subscribe_management_class" val="type_store">百货超市</li>
                        <li type="subscribe_management_class" val="type_materials">家居建材</li>
                        <li type="subscribe_management_class" val="type_communication">电气通讯</li>
                        <li type="subscribe_management_class" val="type_auto">汽修美容</li>
                        <li type="subscribe_management_class" val="type_medical_care">医药保健</li>
                        <li type="subscribe_management_class" val="type_training">教育培训</li>
                        <li type="subscribe_management_class" val="type_am_turm">旅游宾馆</li>
                        <li type="subscribe_management_class" val="type_formats">其他业态</li>
                    </ul>
                </div>
            </div>
            <div class="shop_choice">
                <div class="show_ul">
                    <input type="text" placeholder="请选择商铺类型">
                    <span></span>
                </div>
                <div class="kuang none">
                    <ul>
                        <?php $__currentLoopData = $subscribe['format']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li type="subscribe_format_id" val="<?php echo e($value['id']); ?>"><?php echo e($value['name']); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="shop_choice _choice">
                <!--<div class="_choice">请选择目标开店区域</div>-->
                <div class="shop_choice1">
                    <input type="text" placeholder="请选择目标开店区域">
                    
                    <span></span>
                </div>
                <div class="none list">
                    <div class="erji none"></div>
                    <ul class="all">
                        <li>全部
                            <ul class="aa none">
                              
                                <li>全部</li>
                            </ul>
                        </li>
                        <?php $__currentLoopData = $subscribe['area_level']['area_level2']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $v2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li cityid="<?php echo e($v2['id']); ?>"><?php echo e($v2['name']); ?>

                                <ul class="aa none">
                                    <?php $__currentLoopData = $subscribe['area_level']['area_level3']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k3 =>$v3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($k2 == $k3): ?>
                                            
                                            <?php $__currentLoopData = $v3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k4 => $v4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li type="subscribe_totalarea_id" countyid="<?php echo e($v4['id']); ?>"><?php echo e($v4['name']); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="shop_choice">
                <div class="show_ul">
                    <input type="text" placeholder="请选择你的经营面积">
                    <span></span>
                </div>
                <div class="kuang none">
                    <ul>
                        <?php $__currentLoopData = $subscribe['totalarea']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li type="subscribe_price_id" val="<?php echo e($value['id']); ?>" id="<?php echo e($value['id']); ?>" min_area="<?php echo e($value['min_area']); ?>" max_area="<?php echo e($value['max_area']); ?>"><?php echo e($value['string']); ?>㎡</li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="shop_choice">
                <div class="show_ul">
                    <input type="text" placeholder=" 请选择你的开店预算">
                    <span></span>
                </div>
                <div class="kuang none">
                    <ul>
                        <?php $__currentLoopData = $subscribe['price']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li type="subscribe_region_id" val="<?php echo e($value['id']); ?>" id="<?php echo e($value['id']); ?>" min_price="<?php echo e($value['min_price']); ?>" max_price="<?php echo e($value['max_price']); ?>"><?php echo e($value['string']); ?>㎡</li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="readNow">立即订阅</div>
        </div>
        <div class="btn_two"></div>
    </div>
</div>
<input type="hidden" id="subscribe_management_class" value="">
<input type="hidden" id="subscribe_format_id" value="">
<input type="hidden" id="subscribe_totalarea_id" value="">
<input type="hidden" id="subscribe_price_id" value="">
<input type="hidden" id="subscribe_region_id" value="">