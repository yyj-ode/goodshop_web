<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="Shortcut Icon" href="{{asset('assets/frontend/index/web/images/favicon.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="robots" content="All" />
    <meta name="copyright" content="基于人工智能的品牌选址专家" />
    <meta name="application-name" content="基于人工智能的品牌选址专家" />
    <meta name="msapplication-tooltip" content="基于人工智能的品牌选址专家" />
    <meta name="mobile-agent" content="format=html5;url=http://nndeal/">
    <meta name="msapplication-starturl" content="http://nndeal/" />
    <meta name="baidu-site-verification" content="r49gUEsySi" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NNDeal_web</title>
    <meta name="keywords" content="基于人工智能的品牌选址专家" />
    <meta name="description" content="基于人工智能的品牌选址专家" />

    <link rel="stylesheet" href="{{asset('assets/frontend/index/web/css/common.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/index/web/css/detail.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/index/web/css/index.css')}}">


</head>
<body>
<style>
    .layui-fixbar{
        display: none;
    }
</style>
{{--订阅登录--}}
@include('Frontend.Index.CN.Web.Layout.reminder')

<div class="box">
    <!---------头部-------->
    @include('Frontend.Index.CN.Web.Layout.header')
    <div class="mine">
        <div class="my"><a href="{{url('')}}"><span>首页 ></span></a> <span>{{$data['name']}} ></span> <span>{{$data['business_district']}} ></span><i>商铺详情</i></div>

    </div>
    <div class="_detail">
        <div class="_detailLeft">
            {{--<img src="{{$data['our_image'][0]}}" alt="">--}}
            <img src="{{asset($data['our_image'][0])}}" alt="">
            <div class="autoShow">
                <ul>
                    @foreach($data['our_image'] as $our_image)
                        <li><img src="{{asset($our_image)}}" alt=""></li>
                    @endforeach
                </ul>
                <div class="ll"><</div>
                <div class="rr">></div>
            </div>
            <div class="_message">
                <ul>
                    <li id="message">商铺基本信息</li>
                    <li id="online">线上销售分析</li>
                    <!--<li>经营类型分析</li>-->
                </ul>
                <div class="mess_three">
                    <div class="messOne">
                        <div class="building">
                            <p>建筑信息</p>
                            <div class="_building">
                                <div class="bu_one">
                                    <p>商铺类型 :&nbsp;&nbsp;<i>{{$data['format_name']}}</i></p>
                                    <p>门头宽度 :&nbsp;&nbsp;<i>{{$data['width']}}米</i></p>
                                </div>
                                <div class="bu_two">
                                    <p>进深 :&nbsp;&nbsp;<i>{{$data['depth']}}米</i></p>
                                    <p>层高 :&nbsp;&nbsp;<i>{{$data['floor_height']}}米</i></p>
                                </div>
                                <div class="bu_three">
                                    <p>所在楼层 :&nbsp;&nbsp;<i>{{$data['floor_level']}}</i></p>
                                </div>
                            </div>
                        </div>
                        <div class="rent">
                            <p>租赁相关</p>
                            <div class="_rent">
                                <div class="re_one">
                                    <p>租赁状态 :&nbsp;&nbsp;<i>{{$data['status']}}</i></p>
                                    <p>剩余租约（月）:&nbsp;&nbsp;<i>{{$data['remian_duration']}}</i></p>
                                    <p>续约情况 :&nbsp;&nbsp;<i>{{$data['contact_status']}}</i></p>
                                </div>
                                <div class="re_two">
                                    <p>租赁类别 :&nbsp;&nbsp;<i>{{$data['leasing_type']}}</i></p>
                                    <p>当前租约（年）:&nbsp;&nbsp;<i>{{$data['current_duration']}}</i></p>
                                    <p>最长租约（月）:&nbsp;&nbsp;<i>{{$data['max_duration']}}</i></p>
                                </div>
                            </div>
                        </div>
                        <div class="project">
                            <p>工程条件</p>
                            <div class="_project">
                                @if($data['engineering_water_supply'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat 8px -70px;"></i><p>上水</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat 8px -210px;"></i><p style="color:#666;">上水</p></div>
                                @endif

                                @if($data['engineering_draignage'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -62px -70px;"></i><p>下水</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -62px -210px;"></i><p style="color:#666;">下水</p></div>
                                @endif

                                @if($data['engineering_380_volt'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -132px -70px;"></i><p>380伏</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -132px -210px;"></i><p style="color:#666;">380伏</p></div>
                                @endif

                                @if($data['engineering_gas_tube'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -196px -70px;"></i><p>煤气罐</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -196px -210px;"></i><p style="color:#666;">煤气罐</p></div>
                                @endif

                                @if($data['engineering_smoke_tube'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -272px -70px;"></i><p>烟道管</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -272px -210px;"></i><p style="color:#666;">烟道管</p></div>
                                @endif

                                @if($data['engineering_sewage'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -342px -70px;"></i><p>排污管道</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -342px -210px;"></i><p style="color:#666;">排污管道</p></div>
                                @endif

                                @if($data['engineering_parking_lot'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat 10px -140px;"></i><p>停车位</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat 10px -280px;"></i><p style="color:#666;">停车位</p></div>
                                @endif

                                @if($data['engineering_nature_gas'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -62px -140px;"></i><p>天然气</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -62px -280px;"></i><p style="color:#666;">天然气</p></div>
                                @endif

                                @if($data['engineering_outside_area'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -130px -140px;"></i><p>外摆区</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -130px -280px;"></i><p style="color:#666;">外摆区</p></div>
                                @endif

                                @if($data['engineering_falme'])
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -195px -140px;"></i><p>可明火</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -195px -280px;"></i><p style="color:#666;">可明火</p></div>
                                @endif

                                @if($data['license'] != '不可办照')
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -272px -140px;"></i><p>可办照</p></div>
                                @else
                                    <div class="pro"><i style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -272px -280px;"></i><p style="color:#666;">可办照</p></div>
                                @endif
                            </div>
                        </div>
                        <div class="map">
                            <p>地图</p>
                            <div class="_map" id="container" tabindex="0"></div>
                        </div>
                    </div>

                    <div class="messTwo none">
                        <div class="none">
                            <h4>预计每月上线订单数:  <i>暂无数据</i></h4>
                            <p>周边同类商家最近半年线上订单总量变化</p>
                            <div class="tonglei_one tl">
                                <h6>椒香川菜馆</h6>
                                <p>上月订单数:<i>1暂无数据</i></p>
                                <div class="tong_pic" id="tOne"></div>
                            </div>
                            <div class="tonglei_two tl">
                                <h6>聚宝源老北京火锅</h6>
                                <p>上月订单数:<i>暂无数据</i></p>
                                <div class="tong_pic" id="tTwo"></div>
                            </div>
                        </div>

                        <div class="noFenxi">
                            <img src="{{asset('assets/frontend/index/web/images/nodata.png')}}" alt="">
                            <p>数据暂无</p >
                        </div>
                    </div>
                    <!--<div class="messThree none"></div>-->
                </div>
            </div>
        </div>
        <div class="_detailRight">
            <p>发布时间：<i>{{$data['publish_time']}}</i></p>
            <div class="det_mon">
                <div class="det_money"><i>{{intval($data['rent'])}}</i>元/月</div>
                <div class="det_sc"><i></i>
                    @if($collection_status==1)
                        <span style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat -140px 0;"></span>
                    @else
                        <span style="background: url({{asset('assets/frontend/index/web/images/icondetail.png')}}) no-repeat 0 0;"></span>
                    @endif
                </div>
                <!-- JiaThis Button BEGIN -->
                <div class="jiathis_style bdsharebuttonbox">
                    <a class="jiathis_button_qzone"></a >
                    <a class="jiathis_button_tsina"></a >
                    <a class="jiathis_button_tqq"></a >
                    <a class="jiathis_button_weixin"></a >
                    <a class="jiathis_button_renren"></a >
                    <a href=" " class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a >
                    <a class="jiathis_counter_style"></a >
                </div>
                <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                <!-- JiaThis Button END -->
            </div>
            <ul class="det_con">
                <li>
                    <h4><i>{{$data['deposit']}}</i>元</h4>
                    <p>押金</p>
                </li>
                <li>
                    <h4><i>{{$data['leasing_payment']}}</i>元</h4>
                    <p>转让费</p>
                </li>
                <li>
                    <h4><i>{{intval($data['total_area'])}}</i>㎡</h4>
                    <p>建筑面积</p>
                </li>
            </ul>
            <div class="det_area">
                <div class="det_areaL">
                    <p>区域类型：<i>暂无数据</i></p>
                    <p>区域：<i>{{$data['name']}}</i></p>
                    <p>支付方式：<i>{{$data['payment_type']}}</i></p>
                </div>
                <div class="det_areaR">
                    <p>客流：<i>暂无数据</i></p>
                    <p>商圈：<i>{{$data['business_district']}}</i></p>
                    <p>使用面积：<i>{{intval($data['useage_area'])}}㎡</i></p>
                </div>
            </div>
            <div class="det_addr">
                <p>地址：<i>{{$data['location']}}</i></p>
                <p>投资成本估算：<i>{{floatval($data['rent'])}}*{{intval($data['payment_type'])}}+{{$data['deposit']}}+{{$data['leasing_payment']}}=</i><span>{{floatval($data['budget']/10000)}}</span><i>(万)</i></p>
                <div class="_detAround">
                    <span>周边建筑：</span>
                    <div class="_detAroundR">
                        <i>小区{{$village_num}}</i>
                        <i>写字楼{{$officebuilding_num}}</i>
                        <i>商铺{{$shopsurrounding_num}}</i>
                        <i>购物中心{{$shoppingcenter_num}}</i>
                    </div>

                </div>
            </div>
            <div class="shangpu">
                <span>来源：</span>
                <i>{{$data['source']}}</i>
                <em>{{$data['owner_tel']}}</em>
            </div>
            <div class="xuanpu">
                <span>选铺100</span>
                <i>店址陪看</i>
                <em>18510851385</em>
            </div>
            <a href="{{url('index/live')}}?id={{$data['id']}}"><h5>现场勘查服务</h5></a>
        </div>
    </div>
    <input type="hidden" id="longitude" value="{{$data['longitude']}}">
    <input type="hidden" id="latitude" value="{{$data['latitude']}}">
</div>
@include('Frontend.Index.CN.Web.Layout.footer')
<script src="{{asset('assets/frontend/index/web/js/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/frontend/index/web/layui.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/tongji.js')}}" type="text/javascript"></script>
{{--<script src="{{asset('assets/frontend/index/web/js/jquery.js')}}"></script>--}}
<script src="{{asset('assets/frontend/index/web/js/index.js')}}"></script>
<!--<script src="js/index.js"></script>-->
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=da80f7804959bbd9cb6a88b06b3904a4"></script>
<script src="{{asset('assets/frontend/index/web/js/echars.js')}}"></script>
<script src="{{asset('assets/frontend/index/web/js/detail.js')}}"></script>
<script type="text/javascript">
    var longitude = $('#longitude').val();
    var latitude = $('#latitude').val();
    var addr = $('body > div.box > div._detail > div._detailRight > div.det_addr > p:nth-child(1) > i').html();
//    alert(addr);
    //调取高德地图，根据经纬度定位
    var map = new AMap.Map('container',{
        resizeEnable: true,
        zoom: 13,
        center: [longitude, latitude],
        mapStyle:'amap://styles/d6bf8c1d69cea9f5c696185ad4ac4c86'
    });
    map.plugin(["AMap.ToolBar"], function() {
        map.addControl(new AMap.ToolBar());
    });
    //添加标注
    function addMarker(j,w){
        marker = new AMap.Marker({
            icon:new AMap.Icon({
                image: "{{asset('assets/frontend/index/web/images/pcdt.png')}}",
               /* image: "http://web.nndeal.app/assets/frontend/index/web/images/pcdt.png",*/
                size: new AMap.Size(23, 29),  //图标大小
                imageSize: new AMap.Size(23,29)
            }),
            position:new AMap.LngLat(j,w)
        });
        marker.setMap(map);  //在地图上添加点
        //鼠标点击marker弹出自定义的信息窗体
        AMap.event.addListener(marker, 'mouseover', function() {
            infoWindow.open(map, marker.getPosition());
        });
    }
    // addMarker(116.397428, 39.90923);
    addMarker(longitude, latitude);
    //添加窗体信息
    //实例化信息窗体
    var content = [];
    content.push(addr);
    var infoWindow = new AMap.InfoWindow({
        isCustom: true,  //使用自定义窗体
        content: createInfoWindow(content.join("<br/>")),
        offset: new AMap.Pixel(110, -5)
    });


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




    {{-- 判断是否登录 --}}
    $.ajax({
        type: 'GET',
        url: '{{url("user/check")}}',
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

    //点击收藏
    $('body > div.box > div._detail > div._detailRight > div.det_mon > div.det_sc > span').on('click',function(){
        $.ajax({
            type:'GET',
            url:'{{url("collection/create")}}?id={{$data["id"]}}',
          /*  url:'http://web.nndeal.app/collection/create?id={{$data["id"]}}',*/
            dataType:'json',
            header:{},
            success:function(data){
                if(data == '您尚未登录'){
                    layui.use('layer', function(){
                        var layer = layui.layer;
                        layer.msg(data);
                        $(".mask").removeClass("none");
                    });
                }
                if(data == '收藏成功'){
                    $('body > div.box > div._detail > div._detailRight > div.det_mon > div.det_sc > span').removeClass("bg2");
                    $('body > div.box > div._detail > div._detailRight > div.det_mon > div.det_sc > span').addClass("bgt");
                }
                if(data != '收藏成功'){
                    $('body > div.box > div._detail > div._detailRight > div.det_mon > div.det_sc > span').removeClass("bgt");
                    $('body > div.box > div._detail > div._detailRight > div.det_mon > div.det_sc > span').addClass("bg2");
                }
            },
            error:function(data){
                alert('收藏失败');
            }
        });
    });

    // 点击用户弹出登录页面
    $(".head").on("click","._user",function(){
        $(".mask").removeClass("none");
    })
</script>
</body>
</html>