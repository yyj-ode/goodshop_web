{{--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <title>Title</title>
    <link rel="stylesheet" href="css/common.css" type="text/css">
    <link rel="stylesheet" href="css/detail.css" type="text/css">
    <link rel="stylesheet" href="css/swiper-3.4.2.min.css">
    <script>
        document.querySelector("html").style.fontSize = document.documentElement.clientWidth/375*50+"px";
    </script>
</head>
<body>--}}
@include('Frontend.Index.CN.wap.Layout.doctype')
<div class="detail">
@include('Frontend.Index.CN.wap.Layout.header')
    <!--<div class="headhead"></div>-->
    <div class="detail_pic">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($data['our_image'] as $our_image)
                    <div class="swiper-slide"><img src="{{asset($our_image)}}" alt=""></div>
                @endforeach
            </div>
        </div>
        <a href="{{url('/')}}"><i></i></a>
        <!--<p class="leixing">-->
        <!--<span>生活社区型</span>-->
        <!--<span>1</span>/ 7-->
        <!--</p>-->
    </div>
    <div class="det_time">
        <p>发布时间：<i>{{$data['publish_time']}}</i></p>
        <p>客流：<i>统计中</i></p>
    </div>
    <ul class="det_message">
        <li>商铺基本信息</li>
        <li>线上销售分析</li>
    </ul>
    <div class="xx">
        <div class="spjbxx ">
            <div class="jbxx">
                <h4> 基本信息  <span style="margin-left: 2.8rem;font-size: 0.26rem;font-weight: 400;">商铺编号:<i>{{$data['shop_id']}}</i></span></h4>
                <ul class="det_money">
                    <li>
                        <p><i>{{$data['rent']}} </i> 元/月</p>
                        <p>{{$data['payment_type']}}</p>
                    </li>
                    <li>
                        <p>转让费：<i>{{$data['leasing_payment']}}</i><i>元</i></p>
                        <p>{{$data['deposit']}}元</p>
                    </li>
                    <li>
                        <p><i>{{$data['total_area']}}</i><i>㎡</i></p>
                        <p>建筑面积</p>
                    </li>
                </ul>
                <p class="det_domian">区域：<i>{{$data['name']}}</i></p>
                <p class="det_buss">商圈：<i>{{$data['business_district']}}</i></p>
                <p class="det_do">地址：<i>{{$data['location']}}</i></p>
                <div class="det_around"><p>周边建筑：</p><p><i>小区{{$village_num}}</i><i>写字楼{{$officebuilding_num}}</i><i>商铺{{$shopsurrounding_num}}</i><i>购物中心{{$shoppingcenter_num}}</i></p></div>
                <p class="det_cb">投资成本估算：<i>{{floatval($data['rent'])}}*{{intval($data['payment_type'])}}+{{$data['deposit']}}=</i><span>{{floatval($data['budget']/10000)}}</span><i>（万）</i></p>
            </div>
            <div class="jzxx">
                <h4>建筑信息</h4>
                <div class="det_mi">
                    <p>商铺类型：<i>{{$data['format_name']}}</i></p>
                    <p>进深：<i>{{$data['depth']}}</i><i>米</i></p>
                    <p>所在楼层：<i>{{$data['floor_level']}}</i><i>层</i></p>
                </div>
                <div class="det_ceng">
                    <p>门头宽度：<i>{{$data['width']}}</i><i>米</i></p>
                    <p>层高：<i>{{$data['floor_height']}}米</i></p>
                </div>
            </div>
            <div class="zlxg">
                <h4>租赁相关</h4>
                <div class="det_zl">
                    <p>租赁状态 ：<i>{{$data['status']}}</i></p>
                    <p>剩余租约（月）：<i>{{intval($data['remian_duration'])}}</i></p>
                    <p>续约情况 ：<i>{{$data['contact_status']}}</i></p>
                </div>
                <div class="det_sy">
                    <p>租赁类型：<i>{{$data['leasing_type']}}</i></p>
                    <p>当前租约（年）：<i>{{intval($data['current_duration'])}}</i></p>
                    <p>最长可租约（月）：<i>{{intval($data['max_duration'])}}</i></p>
                </div>
            </div>
            <div class="gctj">
                <h4>工程条件</h4>
                <div class="_project">
                    @if($data['engineering_water_supply'])
                        <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat 0.08rem -0.9rem;background-size: 4.5rem;"></i><p>上水</p></div>
                    @else
                        <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat 0.08rem -3.6rem;background-size: 4.5rem;"></i><p style="color:#666;">上水</p></div>
                    @endif

                        @if($data['engineering_draignage'])
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -0.82rem -0.9rem;background-size: 4.5rem;"></i><p>下水</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -0.82rem -3.6rem;background-size: 4.5rem;"></i><p style="color:#666;">下水</p></div>
                        @endif

                        @if($data['engineering_380_volt'])
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -1.72rem -0.9rem;background-size: 4.5rem;"></i><p>380伏</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -1.72rem -3.6rem;background-size: 4.5rem;"></i><p style="color:#666;">380伏</p></div>
                        @endif

                        @if($data['engineering_gas_tube'])
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -2.62rem -0.9rem;background-size: 4.5rem;"></i><p>煤气罐</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -2.62rem -3.6rem;background-size: 4.5rem;"></i><p style="color:#666;">煤气罐</p></div>
                        @endif

                        @if($data['engineering_smoke_tube'])
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat 0.05rem -1.8rem;background-size: 4.5rem;"></i><p>烟道管</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat 0.05rem -4.5rem;background-size: 4.5rem;"></i><p style="color:#666;">烟道管</p></div>
                        @endif

                        @if($data['engineering_sewage'])
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -3.54rem -0.9rem;background-size: 4.5rem;"></i><p>排污管道</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -3.54rem -3.6rem;background-size: 4.5rem;"></i><p style="color:#666;">排污管道</p></div>
                        @endif

                        @if($data['engineering_parking_lot'])
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -0.9rem -1.8rem;background-size: 4.5rem;"></i><p>停车位</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -0.9rem -4.5rem;background-size: 4.5rem;"></i><p style="color:#666;">停车位</p></div>
                        @endif

                        @if($data['engineering_nature_gas'])
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -1.72rem -1.8rem;background-size: 4.5rem;"></i><p>天然气</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -1.72rem -4.5rem;background-size: 4.5rem;"></i><p style="color:#666;">天然气</p></div>
                        @endif

                        @if($data['engineering_outside_area'])
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -2.65rem -1.8rem;background-size: 4.5rem;"></i><p>外摆区</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -2.65rem -4.5rem;background-size: 4.5rem;"></i><p style="color:#666;">外摆区</p></div>
                        @endif

                        @if($data['engineering_falme'])
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -3.52rem -1.8rem;background-size: 4.5rem;"></i><p>可明火</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -3.52rem -4.5rem;background-size: 4.5rem;"></i><p style="color:#666;">可明火</p></div>
                        @endif

                        @if($data['license'] != '不可办照')
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat 0.06rem -2.64rem;background-size: 4.5rem;"></i><p>可办照</p></div>
                        @else
                            <div class="pro"><i style="background: url({{asset('assets/frontend/index/wap/img/detailicon.png')}}) no-repeat -0.88rem -2.64rem;background-size: 4.5rem;"></i><p style="color:#666;">可办照</p></div>
                        @endif
                </div>
            </div>
            <div class="dtxx">
                <h4>地图信息</h4>
                <div class="_map" id="container" tabindex="0"></div>
            </div>
            <div class="footxx">
                <div class="footsc">
                    <i></i>
                    <span>收藏</span>
                </div>
                <a href="{{url('index/live')}}"><div class="footkc">
                        <i></i>
                        <span>勘察服务</span>
                    </div></a>
                <div class="footkd">
                    <i></i>
                    <span>联系看店</span>
                </div>
                <!--联系看店-->
                <div class="lxtel none">
                    <div class="lxcon">
                        <p><a href="tel:18674980385"><i>998商铺</i><span>李先生</span><i>18674980385</i></a></p>
                        <p><a href="tel:18674980385"><i>选铺100</i><span>店址陪看</span><i>18674980385</i></a></p>
                        <p class="exit">取消</p>
                    </div>
                </div>
                <!--已收藏-->
                <div class="hadcollect none">已收藏</div>
                <div class="_hadcollect none">取消收藏</div>
            </div>
        </div>
        <div class="xsxsfx ">
            <div class="havedata">
                <h5>预计每月线上订单数：<i>1500-4280</i><i>单</i></h5>
                <h5>周边同类商家最近半年线上订单总量变化</h5>
                <div class="fxreport">
                    <h6>椒香川菜馆</h6>
                    <p>上月订单数：<i>1500</i><i>单</i></p>
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>月份</th>
                            <th>线上订单数量</th>
                        </tr>
                        <tr>
                            <td>5月</td>
                            <td>1500单</td>
                        </tr>
                        <tr>
                            <td>4月</td>
                            <td>4757单</td>
                        </tr>
                        <tr>
                            <td>3月</td>
                            <td>2375单</td>
                        </tr>
                        <tr>
                            <td>2月</td>
                            <td>1759单</td>
                        </tr>
                        <tr>
                            <td>1月</td>
                            <td>4475单</td>
                        </tr>
                        <tr>
                            <td>2016年12月</td>
                            <td>1437单</td>
                        </tr>
                    </table>
                </div>
                <div class="fxreport">
                    <h6>椒香川菜馆</h6>
                    <p>上月订单数：<i>1500</i><i>单</i></p>
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>月份</th>
                            <th>线上订单数量</th>
                        </tr>
                        <tr>
                            <td>5月</td>
                            <td>1500单</td>
                        </tr>
                        <tr>
                            <td>4月</td>
                            <td>4757单</td>
                        </tr>
                        <tr>
                            <td>3月</td>
                            <td>2375单</td>
                        </tr>
                        <tr>
                            <td>2月</td>
                            <td>1759单</td>
                        </tr>
                        <tr>
                            <td>1月</td>
                            <td>4475单</td>
                        </tr>
                        <tr>
                            <td>2016年12月</td>
                            <td>1437单</td>
                        </tr>
                    </table>
                </div>
                <div class="fxreport">
                    <h6>椒香川菜馆</h6>
                    <p>上月订单数：<i>1500</i><i>单</i></p>
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>月份</th>
                            <th>线上订单数量</th>
                        </tr>
                        <tr>
                            <td>5月</td>
                            <td>1500单</td>
                        </tr>
                        <tr>
                            <td>4月</td>
                            <td>4757单</td>
                        </tr>
                        <tr>
                            <td>3月</td>
                            <td>2375单</td>
                        </tr>
                        <tr>
                            <td>2月</td>
                            <td>1759单</td>
                        </tr>
                        <tr>
                            <td>1月</td>
                            <td>4475单</td>
                        </tr>
                        <tr>
                            <td>2016年12月</td>
                            <td>1437单</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="nodata none">
                <i></i>
                <p>数据暂无</p>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="longitude" value="{{$data['longitude']}}">
<input type="hidden" id="latitude" value="{{$data['latitude']}}">
@include('Frontend.Index.CN.wap.Layout.footer')
<script>
    //-------------  详情页  --------------//
    //调取高德地图，根据经纬度定位
    var longitude = $('#longitude').val();
    var latitude = $('#latitude').val();
    var map = new AMap.Map('container',{
        resizeEnable: true,
        zoom: 10,
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
//                image: "http://web.nndeal.app/assets/frontend/index/wap/img/pcdt.png",
                image: "{{asset('assets/frontend/index/wap/img/pcdt.png')}}",

                size: new AMap.Size(23, 29),  //图标大小
                imageSize: new AMap.Size(23,29)
            }),
            position:new AMap.LngLat(j,w)
        });
        marker.setMap(map);  //在地图上添加点
        //鼠标点击marker弹出自定义的信息窗体
        AMap.event.addListener(marker, 'click', function() {
            infoWindow.open(map, marker.getPosition());
        });
    }
    addMarker(longitude, latitude);


    //点击收藏与取消
    $(".xx").on("click",".footsc",function(){
//        if($(".footsc span").html()=="收藏"){
//            $(".hadcollect").removeClass("none");
//            setTimeout(function(){
//                $(".hadcollect").addClass("none");
//            },1500);
//            $(".footsc i").addClass("marBgt");
//            $(".footsc span").addClass("marRight");
//            $(".footsc span").html("已收藏");
//        }else{
//            $("._hadcollect").removeClass("none");
//            setTimeout(function(){
//                $("._hadcollect").addClass("none");
//            },1500);
//            $(".footsc i").removeClass("marBgt");
//            $(".footsc span").removeClass("marRight");
//            $(".footsc span").html("收藏");
//        }
//        alert(1);
        $.ajax({
            type:'GET',
            url:'{{url("collection/create")}}?id={{$data["id"]}}',
            dataType:'json',
            header:{},
            success:function(data){
                if(data == '您尚未登录'){
//                    setTimeout(function(){
//                        $(".xxxx").addClass("none");
//                    },1500);
                    layer.open({
                        content: '您尚未登录'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
//                    alert('您尚未登录');
                }
                if(data == '收藏成功'){
                    $(".hadcollect").removeClass("none");
                    setTimeout(function(){
                        $(".hadcollect").addClass("none");
                    },1500);
                    $(".footsc i").addClass("marBgt");
                    $(".footsc span").addClass("marRight");
                    $(".footsc span").html("已收藏");
                }
                if(data != '收藏成功'  && data != '您尚未登录'){
                    $("._hadcollect").removeClass("none");
                    setTimeout(function(){
                        $("._hadcollect").addClass("none");
                    },1500);
                    $(".footsc i").removeClass("marBgt");
                    $(".footsc span").removeClass("marRight");
                    $(".footsc span").html("收藏");
                }
            },
            error:function(data){
                alert('收藏失败');
            }
        });
    });
</script>
