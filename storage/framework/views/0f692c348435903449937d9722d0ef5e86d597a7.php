<?php $__env->startSection('seo'); ?>
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.seo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('reminder'); ?>
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.reminder', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <?php echo $__env->make('Frontend.Index.CN.Web.Layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--**************************************内容**************************************-->
    <div class="background">
        <div class="user_agreement">
            <h5>选铺100&nbsp;&nbsp;用户服务协议</h5>
            <div class="article">
                <p>1.一切网民在进入选铺100主页及各层页面时均被视为已经仔细看过本条款并完全同意。凡以任何方式登录本网站，或直接，间接使用本网站资料者，均被视为自愿接受本</p><p>网站相关声明和用户服务协议的约束。</p>
                <p>2.选铺100转载的内容并不代表选铺100之意见及观点，也不意味着本网赞同其观点或证实其内容的真实性。</p>
                <p>3.选铺100转载的文字，图片，音视频等资料均由本网站用户提供，其真实性，准确性和合法性由信息发布人负责，选铺100不提供任何保证，并不承担任何法律责任。</p>
                <p>4.选铺100所转载的文字，图片，音视频等资料，如果侵犯了第三方的知识产权或其他权利，责任由作者或转载者本人承担，本网站对此不承担责任。</p>
                <p>5.选铺100不保证为用户提供便利而设置的外部链接的准确性和完整性，同时，对于该外部链接指向的不由选铺100实际控制的任何网页上的内容，选铺100不承担任何责任</p><p>。</p>
                <p>6.用户明确并同意其使用选铺100服务所存在的风险将完全由其本人承担；因其使用选铺100服务而产生的一切后果也由本人承担，选铺100对此不承担任何责任。</p>
                <p>7.除选铺100注明之服务条款外，其他因不当使用本网而导致的任何意外，疏忽，合约毁坏，诽谤，版权或其他知识产权侵犯及其所造成的任何损失（包括因不当下载而感</p><p>染电脑病毒等），选铺100概不负责，亦不承担任何法律责任。</p>
                <p>8.对于因不可抗力或因黑客攻击，通讯线路中断等选铺100不能控制的原因造成的网络服务中断或其他缺陷，导致用户不能正常使用选铺100，选铺100不承担任何责任，担</p><p>将尽力减少因此给用户造成的损失或影响。</p>
                <p>9.本声明未涉及的问题请参见国家有关法律法规，当本声明与国家有关法律法规冲突时，以国家法律法规为准。</p>
            </div>
            <a href="###"><div class="btn" onclick="window.close()">我知道了</div></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.Index.CN.Web.Layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('assets/frontend/index/web/js/index.js')); ?>" type="text/javascript"></script>
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
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.Index.CN.Web.Layout.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>