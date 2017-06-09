@include('Frontend.Index.CN.Wap.Layout.doctype')
<style>
    .myread{
        position: absolute;
        top:0;
        left:0;
        background: #fff;
    }
    .myread_content{
        width:100%;
        height:12.34rem;
        background: #fff;
        /*padding:0 0.9rem;*/
        border-top:1px solid #e1e1e1;
    }
    .myread_content h4{
        width: 100%;
        height:1.6rem;
        font-size: 0.36rem;
        color:#333;
        marign:0 auto 0.42rem;
        padding-top:0.8rem;
        text-align: center;
        font-weight: 900;
    }
    .myread_content .shop_mess h6{
        width: 100%;
        height: 0.7rem;
        font-size: 0.3rem;
        color:#222;
        text-align: center;
    }
    .myread_content .shop_mess  .shopChoice,.myread_content .shop_mess  .shopChoice1{
        width:5.7rem;
        height:0.9rem;
        /*background: #eaeaea;*/
        border:1px solid #e1e1e1;
        margin:0 auto 0.42rem;
        border-radius: 0.05rem;
        line-height:0.9rem;
        color:#999;
        padding-left:0.3rem;
        position: relative;
    }
    .myread_content .shop_mess  .shopChoice input,.myread_content .shop_mess  .shopChoice1 input{
        width:5rem;
        height:0.8rem;
        border:0;
        background: rgba(255,255,255,0.8);
        /*color:#999;*/
    }
    ._choice{
        position: relative;
    }
    .dingwei{
        position: absolute;
        width:1.2rem;
        height:0.9rem;
        border:0;
        background: transparent;
        color:#999;
        right:0.7rem;
        top:0;
        line-height: 0.9rem;
        z-index: 10000;
    }
    .myread_content .shop_mess  .shopChoice input::-webkit-input-placeholder,.myread_content .shop_mess  .shopChoice1 input::-webkit-input-placeholder{
        color: #666;
    }    /* 使用webkit内核的浏览器 */
    .myread_content .shop_mess  .shopChoice input:-moz-placeholder,.myread_content .shop_mess  .shopChoice1 input:-moz-placeholder{
        color: #666;
    }                  /* Firefox版本4-18 */
    .myread_content .shop_mess  .shopChoice input::-moz-placeholder,.myread_content .shop_mess  .shopChoice1 input::-moz-placeholder{
        color: #666;
    }                  /* Firefox版本19+ */
    .myread_content .shop_mess  .shopChoice input:-ms-input-placeholder,.myread_content .shop_mess  .shopChoice1 input:-ms-input-placeholder{
        color: #666;
    }
    /*.myread_content .shop_mess  .shopChoice span{*/
        /*width: 0.4rem;*/
        /*height: 0.4rem;*/
        /*!*background:url(../../../../../../../public/assets/frontend/index/wap/img/icon.png) no-repeat -2.4rem 0;*!*/
        /*background:url(../img/icon.png) no-repeat -2.4rem 0;*/
        /*background-size: 6.4rem;*/
        /*position: absolute;*/
        /*top: 0.42rem;*/
        /*right: 0.3rem;*/
        /*cursor: pointer;*/
    /*}*/
    .myread_content .shop_mess  .shopChoice .yiji{
        width:5.7rem;
        height:3.5rem;
        position: relative;
    }
    .myread_content .shop_mess  .shopChoice1 .yiji1{
        width:2.85rem;
        height:3.5rem;
        position: relative;
        margin-left: -0.15rem;
        /*text-align: center;*/
        color: #000000;
    }
    .myread_content .shop_mess  .shopChoice1 .yiji1>ul>li{
        height: 0.7rem;
        line-height: 0.7rem;
        text-indent: 1rem;
    }
    .myread_content .shop_mess  .shopChoice .yiji>ul,.myread_content .shop_mess  .shopChoice1 .yiji1>ul{
        width:5.7rem;
        height:3.5rem;
        background: #f4f5f9;
        position: absolute;
        left: -0.2rem;
        top: 0.1rem;
        z-index: 1000;
        overflow-y: auto;
        overflow-x: hidden;
        border-radius: 0.05rem;
        box-shadow: 2px -3px 5px #ddd ;
    }
    .myread_content .shop_mess  .shopChoice .yiji>ul>li,.myread_content .shop_mess  .shopChoice1 .yiji1>ul>li ul li{
        width: 100%;
        height:0.7rem;
        color:#000;
        line-height: 0.7rem;
        text-align: center;
    }
    .myread_content .shop_mess  .shopChoice .yiji>ul>li:hover,.myread_content .shop_mess  .shopChoice1 .yiji1>ul>li:hover{
        background: #eaebed;
        color:#000;
    }
    .myread_content .shop_mess  .shopChoice1 .yiji1>ul>li ul{
        width:5.7rem;
        height:3.5rem;
        background: #f4f5f9;
        position: absolute;
        left: 0;
        top: 0;
        z-index: 1000;
        overflow-y: auto;
        overflow-x: hidden;
        border-radius: 0.05rem;
        box-shadow: 2px -3px 5px #ddd ;
    }
    .myread_content .shop_mess  .readNow{
        width:5.7rem;
        height:0.9rem;
        background: #083680;
        text-align: center;
        line-height: 0.9rem;
        color:#fff;
        font-size: 0.3rem;
        border-radius: 0.05rem;
        margin:0 auto;
        cursor: pointer;
    }
    .myread_content .shop_mess  .shopChoice .yiji{
        margin-left: -8px;
    }
    .myread_content .shop_mess  .shopChoice ul.all{
        width: 142px;
        height: 175px;
    }
    .myread_content .shop_mess  .shopChoice1 .erji {
        position: absolute;
        width: 2.85rem;
        height: 3.5rem;
        left: 2.65rem;
        top:0.1rem;
        background: #eaebed;
        z-index: 1001;
        list-style: none;
        text-align: center;
        overflow-y: auto;
        overflow-x: hidden;
        border-radius: 0.05rem;
        box-shadow: 2px -3px 5px #ddd;
        color: #000;
    }
    .myread_content .shop_mess  .shopChoice1 .erji li{
        height: 0.7rem;
        line-height: 0.7rem;
    }
    .myread_content .shop_mess  .shopChoice1 .erji li:hover{
        background: #083680!important;
        color: #fff!important;
    }
</style>
<body>
<div class="myread con">
@include('Frontend.Index.CN.Wap.Layout.header')
    <div class="headhead"></div>
    <div class="myread_content con">
        <h4>店址订阅</h4>
        <div class="shop_mess">
            <h6>实时获得最精确的店址推荐</h6>
            <div class="shopChoice">
                <div class="shopClick">
                    <input type="text" placeholder="请选择你的经营类型" disabled>
                    <span></span>
                </div>
                <div class="yiji none">
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
            <div class="shopChoice">
                <div class="shopClick">
                    <input type="text" placeholder="请选择商铺类型" disabled>
                    <span></span>
                </div>
                <div class="yiji none">
                    <ul>
                        @foreach($subscribe['format'] as $value)
                            <li type="subscribe_format_id" val="{{$value['id']}}">{{$value['name']}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="shopChoice1">
                <div class="shopClick1">
                    <input type="text" placeholder="请选择目标开店区域" disabled>
                    <span></span>
                </div>
                <div class="yiji1 none">
                    <ul>
                        {{--<li>全部
                            <ul class="bb none">
                                <li>全部</li>
                            </ul>
                        </li>--}}

                        @foreach($subscribe['area_level']['area_level2'] as $k2 => $v2)
                            <li cityid="{{$v2['id']}}">{{$v2['name']}}
                                <ul class="bb none">
                                    @foreach($subscribe['area_level']['area_level3'] as $k3 =>$v3)
                                        @if($k2 == $k3)
                                            {{--<li class="bac">返回上一级</li>--}}
                                            @foreach($v3 as $k4 => $v4)
                                                <li type="subscribe_region_id" countyid="{{$v4['id']}}">{{$v4['name']}}</li>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach


                        {{--<li>燕郊
                            <ul class="bb none">
                                <li>不限</li>
                                <li>燕顺路</li>
                                <li>迎宾路</li>
                                <li>上上城</li>
                            </ul>
                        </li>--}}
                    </ul>
                    <div class="erji">
                        <ul>
                            {{--向这里添加二级的东西--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="shopChoice">
                <div class="shopClick">
                    <input type="text" placeholder="请选择你的经营面积" disabled>
                    <span></span>
                </div>
                <div class="yiji none">
                    <ul>
                        @foreach($subscribe['totalarea'] as $value)
                            <li type="subscribe_totalarea_id" val="{{$value['id']}}" id="{{$value['id']}}" min_area="{{$value['min_area']}}" max_area="{{$value['max_area']}}">{{$value['string']}}㎡</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="shopChoice">
                <div class="shopClick">
                    <input type="text" placeholder=" 请选择你的开店预算" disabled>
                    <span></span>
                </div>
                <div class="yiji none">
                    <ul>
                        @foreach($subscribe['price'] as $value)
                            <li type="subscribe_price_id" val="{{$value['id']}}" id="{{$value['id']}}" min_price="{{$value['min_price']}}" max_price="{{$value['max_price']}}">{{$value['string']}}㎡</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <input type="hidden" id="subscribe_management_class" value="">
            <input type="hidden" id="subscribe_format_id" value="">
            <input type="hidden" id="subscribe_totalarea_id" value="">
            <input type="hidden" id="subscribe_price_id" value="">
            <input type="hidden" id="subscribe_region_id" value="">
            <div class="readNow" onclick="send()">立即订阅</div>
        </div>
    </div>
</div>
@include('Frontend.Index.CN.Wap.Layout.login')
@include('Frontend.Index.CN.Wap.Layout.footer')
    <script>
//        //订阅选框~~~~~~~~~~
//        //一级
        $(".myread").on("click",".shopChoice",function(){
            $(".yiji,.yiji1").addClass("none");
            $(this).find(".yiji").removeClass("none");
            alert((this).html());
        });
        //弹出其他选择项
        $(".myread").on("click",".yiji>ul>li",function(){
            $(this).parent().parent().parent().find("input").val(($(this).html()));
            $(".yiji").not(".list").addClass("none");
            //赋值
            var val = $(this).attr('val');
            var type = $(this).attr('type');
            $('#' + type).attr('value',val);
        });

//         //二级
        $(".myread").on("click",".shopChoice1",function(){
            $(".yiji").addClass("none");
            $(this).find(".yiji1").removeClass("none");
        });
//        // 鼠标划过出现二级联动
        $(".myread").on("click",".yiji1>ul>li",function () {
            $(".erji").html($(this).find(".bb").html());
        });
        //弹出地区
        $(".myread").on("click",".shopChoice1 .erji>li",function(){
            $(this).parent().parent().parent().find("input").val(($(this).html()));
            $(".yiji1").addClass("none");
            var val = $(this).attr('countyid');
            $('#subscribe_region_id').attr('value',val);
        });
        function send() {
            //获取经营类型
            var subscribe_management_class = $('#subscribe_management_class').val();
            //获取商铺类型
            var subscribe_format_id = $('#subscribe_format_id').val();
            //获取开店区域－城区/商圈
            var subscribe_region_id = $('#subscribe_region_id').val();

            //获取经营面积
            var subscribe_totalarea_id = $('#subscribe_totalarea_id').val();
            //获取开店预算
            var subscribe_price_id = $('#subscribe_price_id').val();
            $.ajax({
                type:'GET',
                dataType:'json',
                data:{
                    'management':subscribe_management_class,
                    'format_id':subscribe_format_id,
                    'totalarea_id':subscribe_totalarea_id,
                    'price_id':subscribe_price_id,
                    'region_id':subscribe_region_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{url('Subscribe/create')}}',
                success:function(data){
                    layer.open({
                        content: data
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    history.back(-1);
                },
                error:function(){
                    alert('发送失败');
                }
            });
        }
    </script>
</body>
</html>