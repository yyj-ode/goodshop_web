<!--登录页-->
<div class="login_page none">
    <div class="head">
        <i class="coordinate"></i>
        <span>北京</span>
        <a href="###"><i class="logo"></i></a>
        <a href="###"><i class="user"></i></a>
    </div>
    <!--<div class="headhead"></div>-->
    <div class="login_content ">
        <form action="" class="registerForm">
            <h4>用户登录</h4>
            <div class="phoneNumber">
                <span></span>
                <!--<img src="images/phone.png" alt="">-->
                <input type="text" placeholder="请输入手机号码" id="mobile_data">
            </div>
            <div class="verifica">
                <div class="verificationCode">
                    <span></span>
                    <!--<img src="images/yanzheng.png" alt="">-->
                    <input type="text" placeholder="请输入验证码" id="sms_code">
                </div>
                <div class="send" id="send">发送验证码</div>
            </div>
            <div class="rightNow"  id="userLogin"><a href="###">立即登录</a></div>
            <p>登录代表您已同意&nbsp;&nbsp;<a href="###">选铺100 用户服务协议</a></p>
            <!--<div class="login_text"><h6>其他方式登录</h6><a href="###"><img src="images/weixin.png" alt=""></a></div>-->
        </form>
    </div>
</div>
<!--用户协议-->
<div class="agreement none">
    <div class="head">
        <i class="coordinate"></i>
        <span>北京</span>
        <a href="###"><i class="logo"></i></a>
        <a href="###"><i class="user"></i></a>
    </div>
    <!--<div class="headhead"></div>-->
    <div class="agreement_content">
        <h4>选铺100 用户服务协议</h4>
        <div class="agreement_detail">
            <p>1.一切网民在进入选铺100主页及各层页面时均被视为已经仔细看过本条款并完全同意。凡以任何方式登录本网站，或直接，间接使用本网站资料者，均被视为自愿接受本网站相关声明和用户服务协议的约束。</p>
            <p>2.选铺100转载的内容并不代表选铺100之意见及观点，也不意味着本网赞同其观点或证实其内容的真实性。</p>
            <p>3.选铺100转载的文字，图片，音视频等资料均由本网站用户提供，其真实性，准确性和合法性由信息发布人负责，选铺100不提供任何保证，并不承担任何法律责任。</p>
            <p>4.选铺100所转载的文字，图片，音视频等资料，如果侵犯了第三方的知识产权或其他权利，责任由作者或转载者本人承担，本网站对此不承担责任。</p>
            <p>5.选铺100不保证为用户提供便利而设置的外部链接的准确性和完整性，同时，对于该外部链接指向的不由选铺100实际控制的任何网页上的内容，选铺100不承担任何责任。</p>
            <p>6.用户明确并同意其使用选铺100服务所存在的风险将完全由其本人承担；因其使用选铺100服务而产生的一切后果也由本人承担，选铺100对此不承担任何责任。</p>
            <p>7.除选铺100注明之服务条款外，其他因不当使用本网而导致的任何意外，疏忽，合约毁坏，诽谤，版权或其他知识产权侵犯及其所造成的任何损失（包括因不当下载而感染电脑病毒等），选铺100概不负责，亦不承担任何法律责任。</p>
            <p>8.对于因不可抗力或因黑客攻击，通讯线路中断等选铺100不能控制的原因造成的网络服务中断或其他缺陷，导致用户不能正常使用选铺100，选铺100不承担任何责任，担将尽力减少因此给用户造成的损失或影响。</p>
            <p>9.本声明未涉及的问题请参见国家有关法律法规，当本声明与国家有关法律法规冲突时，以国家法律法规为准。</p>
        </div>
    </div>
</div>
<!--我的展开(登录成功后)-->
<div class="mine none">
    <div class="head">
        <i class="coordinate"></i>
        <span>北京</span>
        <a href="###"><i class="logo"></i></a>
        <a href="###"><i class="user"></i></a>
    </div>
    <div class="headhead"></div>
    <div class="my_content">
        <a href="{{url('collection/index')}}"><div class="my_collect _my">
                <span></span><em>我的收藏</em>
                <i></i>
            </div></a>
        <a href="{{url('order/index')}}"><div class="my_order _my">
                <span></span><em>我的订单</em>
                <i></i>
            </div></a>
        <a href="###"><div class="my_back" id="userLogout">退出</div></a>
    </div>
</div>