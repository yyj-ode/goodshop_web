@include('Frontend.Index.CN.Wap.Layout.doctype')
<body>
<!--现场勘查-->
<div class="live">
   {{-- <div class="head">
        <i class="coordinate"></i>
        <span>北京</span>
        <a href="###"><i class="logo"></i></a>
        <a href="###"><i class="user"></i></a>
    </div>--}}
   @include('Frontend.Index.CN.Wap.Layout.header')
    <!--<div class="headhead"></div>-->
    <div class="live_content">
        <div class="live_cont">
            <h4>选铺100专业现场勘察服务</h4>
            <h6>实勘服务是作为顾客的“眼“，让专业的人代替客户去实勘店铺,产出实勘报告，节省客户时间成本，快速了解店铺。</h6>
            <div class="live_money"><i>100</i>元/次</div>
            <div class="live_ser">
                <p></p>
                <p>服务内容</p>
                <p></p>
            </div>
            <div class="live_con">
                <p>1. 店铺的基本信息（房屋地址、面积、楼层等）、工程信息（电量、上下水、隔油池等）、租赁信息（租金和付款方式、转让费等）；</p>
                <p>2. 证照情况及房产证把控，只做正规店铺、放心租铺。</p>
                <p>3. 绘制店铺平面图。房屋结构一目了然。</p>
                <p>4. 采集照片，室内装修情况和外部环境情况。</p>
                <p>5. 店铺周边信息采集（小区、人流、客群画像、竞争业态等）。</p>
                <p>6. 竞争店信息，知己知彼百战不殆。</p>
                <a href="{{url('index/report')}}"><div class="live_watch">查看服务报告示例</div></a>
            </div>
        </div>
    </div>
    <div class="live_catch">获得服务</div>
    <!--重新支付，去支付-->
    <div class="pay none">
    @include('Frontend.Index.CN.Wap.Layout.header')
        {{--<div class="head">
            <i class="coordinate"></i>
            <span>北京</span>
            <a href="###"><i class="logo"></i></a>
            <a href="###"><i class="user"></i></a>
        </div>--}}
        <!--<div class="headhead"></div>-->
        <div class="pay_content">
            <div class="pay_con">
                <div class="pay_wx">
                    <i></i>
                    <em>微信支付</em>
                    <span val="wx"></span>
                </div>
                <div class="pay_zfb">
                    <i></i>
                    <em>支付宝支付</em>
                    <span val="zfb"></span>
                </div>
                <div class="payNow" onclick="pay()">去支付</div>
            </div>
        </div>
    </div>
</div>
@include('Frontend.Index.CN.Wap.Layout.footer')
<script src="{{asset('assets/frontend/index/wap/js/zepto.js')}}"></script>
<script>
    //点击获得服务
    var olive = document.getElementsByClassName("live_catch")[0];
    var opay = document.getElementsByClassName("pay")[0];
    olive.onclick = function(){
        opay.classList.remove("none");
    };
    //点击选择支付方式
    $(".pay_con").on("click",".pay_con span",function(){
        $(this).addClass("xuanzhong").removeClass("weixuanzhong");
        $(this).parent().siblings().find("span").addClass("weixuanzhong").removeClass("xuanzhong");
    })
    function pay() {
       // window.location="{{url('order/mobile_payment')}}";
        $.ajax({
            type: 'POST',
            url: '{{url("order/mobile_order")}}',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if(data['static'] == 200){
                    window.location="{{url('order/mobile_payment')}}"+'?order_number='+data['order_number'];
                }else{
                    layer.open({
                        content: data['message']
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }
            }
        });
    }
</script>
</body>
</html>