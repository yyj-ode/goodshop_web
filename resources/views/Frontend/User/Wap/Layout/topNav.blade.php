<div class="loginwrap" id="commonHeader">
    <div class="loginwrap_con" style="display: block;">
        <ul class="loginwrap01">
            <a href="{{url('')}}">人类健康网</a>
            <span></span>
            <a href="{{url('disease/index')}}">疾病</a>
            <span></span>
            <a href="{{url('hospital/index')}}">医院</a>
            <span></span>
            <a href="{{url('add.html')}}">问医生</a>
            <span></span>
            <a href="{{url('online/index')}}">电话咨询</a>
            <span></span>
            <a id="doctorOnlineLink" href="{{url('myzx/index')}}">名医义诊</a>
            <span style="position:relative;">
                <img src="http://static.iqilong.com/images/passport/top_login/loginIcon06.gif" style="display:none;position:absolute;left:0px;top:10px;">
            </span>
        </ul>
        <div class="loginwrap02" id="loginwrap_a">
            <p class="loginArrow_off">资讯频道</p>
            <div class="loginWrapCon">
                <ul style="display:none">
                    <a href="http://nndeal/main-358.html">新闻</a>
                    <a href="http://nndeal/main-1018.html">养生</a>
                    <a href="http://nndeal/main-347.html">育儿</a>
                    <a href="http://nndeal/main-22.html">减肥</a>
                    <a href="http://nndeal/main-356.html">两性</a>
                    <a href="http://nndeal/main-39.html">整形</a>
                    <a href="http://nndeal/main-14.html">美容</a>
                    <a href="http://nndeal/main-2.html">女性</a>
                    <a href="http://nndeal/main-365.html">心理</a>
                    <a href="http://nndeal/main-42.html">健身</a>
                    <a href="http://nndeal/main-366.html">饮食</a>
                    <a href="http://nndeal/main-355.html">保健</a>
                </ul>
            </div>
        </div>
        <div class="loginwrap02 loginwrap02a" id="loginwrap_b">
            <p class="loginArrow_off">看病助手</p>
            <div class="loginWrapCon">
                <ul style="display:none">
                    <a href="{{url('symptom/index')}}">查症状</a>
                    <a href="{{url('disease/index')}}">查疾病</a>
                    <a href="{{url('hospital/index')}}">找医院</a>
                    <a href="{{url('expert/index')}}">找专家</a>

                    {{--
                    <a href="http://ypk.iqilong.com">查药品</a>
                    <a href="http://ssk.iqilong.com">查手术</a>
                    <a href="http://yqk.iqilong.com">找药企</a>
                    <a href="http://hyk.iqilong.com">化验检查</a>
                    <a href="http://test.iqilong.com">健康自测</a>
                    --}}
                </ul>
            </div>
        </div>
        <div class="loginwrap02 loginwrap02b" id="loginwrap_c">
            <p class="loginArrow_off">
                <span>移动端</span>
            </p>
            <div class="loginWrapCon">
                <ul style="display:none">
                    <a href="http://help.iqilong.com/mobile/weixin" target="_blank" class="loginwrap02b2">患者微信</a>
                    <a href="http://help.iqilong.com/download/app?type=doctor" target="_blank" class="loginwrap02b3">医生APP</a>
                    <a href="http://help.iqilong.com/mobile/wap" target="_blank" class="loginwrap02b1">人类健康网WAP</a>
                </ul>
            </div>
        </div>
        <div class="loginwrap03">
            <a target="_blank" href="http://help.iqilong.com/doctor/apply">医生招募</a>
            <span class="loginwrap03a"></span>
            <a href="http://passport.iqilong.com/personal/myquestionlist">我的提问</a>
            <span class="loginwrap03b" id="loginwrap_d">
                <a href="{{url('login.html')}}" target="_blank" class="loginwrap03b1">登录</a>
                <span class="loginwrap03b2"></span>
            </span>
            <span><a href="{{url('register.html')}}" target="_blank">注册</a></span>
        </div>
    </div>
</div>

<div class="s_head">
    <div class="s_searchwrap">
        <a href="{{url('')}}" class="s_searchwrap01" title="人类健康网">
            <img src="{{url('assets/frontend/index/images/logo.png')}}" />
        </a>

        <div class="s_searchMenu">
            <form action="{{url('search/index')}}" method="get" id="searchForm" target="_blank">
                <div class="s_searchForm">
                    <ul class="s_searchForm01"><p><input id="searchContent" name="keywords" placeholder="请输入您要查找的内容" autocomplete="off"></p></ul>
                    <input type="submit" onfocus="this.blur();" class="s_input01" value="">
                </div>
            </form>
        </div>
        <ul class="s_searchwrap02">
            <a href="http://help.iqilong.com/mobile/weixin" target="_blank"><img src="http://static.iqilong.com/images/passport/app_down.jpg" /></a>
        </ul>
        <ul class="s_searchwrap03">
            <a href="{{url('add.html')}}" target="_blank"></a>
        </ul>
    </div>

</div>