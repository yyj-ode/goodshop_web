<div id="sub">
    <div id="menu">
        <dl class="fore1">
            <dt id="_MYJD_order">信息管理</dt>
            <dd class="@if(isActive('personal/index')) curr @endif">
                <a href="{{url('index.blade.php')}}" target="_self">基本信息</a>
            </dd>
            <dd class="@if(isActive('password/first.html')) curr @endif">
                <a href="{{url('center/password/first.html')}}" target="_blank">修改密码</a>
            </dd>
            <dd class="@if(isActive('mobile/first.html')) curr @endif">
                <a href="{{url('center/mobile/first.html')}}" target="_self">手机验证</a>
            </dd>
            <dd class="@if(isActive('personal/address-1.html')) curr @endif">
                <a href="{{url('center/personal/address-1.html')}}" target="_self">收货地址</a>
            </dd>
            <dd class="@if(isActive('recharge/first.html')) curr @endif">
                <a href="{{url('center/recharge/first.html')}}" target="_self">账户充值</a>
            </dd>
            <dd class="@if(isActive('personal/account.html')) curr @endif">
                <a href="{{url('center/personal/account.html')}}" target="_self">我的余额</a>
            </dd>
        </dl>
        <dl class="fore2">
            <dt>企业管理</dt>
            <dd class="@if(isActive('business/first.html')) curr @endif">
                <a href="{{url('center/business/first.html')}}" target="_self">基本信息</a>
            </dd>
            <dd class="@if(isActive('business/news-1.html')) curr @endif">
                <a href="{{url('center/business/news-1.html')}}" target="_self">企业动态</a>
            </dd>
            <dd class="@if(isActive('business/case-1.html')) curr @endif">
                <a href="{{url('center/business/case-1.html')}}" target="_self">成功案例</a>
            </dd>
            <dd class="@if(isActive('business/web.html')) curr @endif">
                <a href="{{url('center/business/web.html')}}" target="_self">网站美化</a>
            </dd>
            <dd class="@if(isActive('business/integral.html')) curr @endif">
                <a href="{{url('center/business/integral.html')}}" target="_self">企业积分</a>
            </dd>
            <dd class="@if(isActive('business/message-1.html')) curr @endif">
                <a href="{{url('center/business/message-1.html')}}" target="_blank">访客留言</a>
            </dd>
        </dl>
        <dl class="fore5">
            <dt>产品管理</dt>
            <dd class="@if(isActive('product/add.html')) curr @endif">
                <a href="{{url('center/product/add.html')}}" target="_self">发布供应产品</a>
            </dd>
            <dd class="@if(isActive('product/list-1-1.html')) curr @endif">
                <a href="{{url('center/product/list-1-1.html')}}" target="_self">销售中的产品</a>
            </dd>
            <dd class="@if(isActive('product/list-2-1.html')) curr @endif">
                <a href="{{url('center/product/list-2-1.html')}}" target="_self">未上架的产品</a>
            </dd>
            <dd class="@if(isActive('product/list-3-1.html')) curr @endif">
                <a href="{{url('center/product/list-3-1.html')}}" target="_self">我发布的产品</a>
            </dd>
        </dl>
        <dl class="fore6">
            <dt>交易管理</dt>
            <dd class="@if(isActive('trade/buy.html')) curr @endif">
                <a href="{{url('center/trade/buy.html')}}" target="_self">发布采购产品</a>
            </dd>
            <dd class="@if(isActive('trade/purchases-1.html')) curr @endif">
                <a href="{{url('center/trade/purchases-1.html')}}" target="_self">采购信息管理</a>
            </dd>
            <dd class="@if(isActive('trade/order-1.html')) curr @endif">
                <a href="{{url('center/trade/order-1.html')}}" target="_self">买家订单列表</a>
            </dd>
            <dd class="@if(isActive('trade/guarantee.html')) curr @endif">
                <a href="{{url('center/trade/guarantee.html')}}" target="_self">买家保障服务</a>
            </dd>
            <dd class="@if(isActive('trade/refund-1.html')) curr @endif">
                <a href="{{url('center/trade/refund-1.html')}}" target="_self">退款退货管理</a>
            </dd>
            <dd class="@if(isActive('trade/service-1.html')) curr @endif">
                <a href="{{url('center/trade/service-1.html')}}" target="_self">售后服务管理</a>
            </dd>
        </dl>
        <dl class="fore6">
            <dt>客户管理</dt>
            <dd class="@if(isActive('customer/client-1.html')) curr @endif">
                <a href="{{url('center/customer/client-1.html')}}" target="_self">我的客户</a>
            </dd>
            <dd class="@if(isActive('customer/follow-1.html')) curr @endif">
                <a href="{{url('center/customer/follow-1.html')}}" target="_self">我的关注</a>
            </dd>
        </dl>
    </div>
</div>