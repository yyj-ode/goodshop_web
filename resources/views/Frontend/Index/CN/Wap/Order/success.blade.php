@include('Frontend.Index.CN.Wap.Layout.doctype')
<body>
<!--支付成功-->
<div class="success con">
    @include('Frontend.Index.CN.Wap.Layout.header')
    <div class="success_content">
        <div class="success_pic"></div>
        <h4>支付成功</h4>
        <h6>30分钟内会有【选铺100】工作人员与你取得联系，请耐心等待！</h6>
        <a href="{{url("order/index")}}"><div class="success_watch">查看订单</div></a>
        <a href="{{url("/")}}"><div class="success_goon">继续选铺</div></a>
    </div>
</div>

@include('Frontend.Index.CN.Wap.Layout.login')
@include('Frontend.Index.CN.Wap.Layout.footer')
</body>
</html>