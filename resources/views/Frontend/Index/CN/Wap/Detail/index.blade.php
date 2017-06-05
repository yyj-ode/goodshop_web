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
                <div class="swiper-slide"><img src="{{asset('/assets/frontend/index/wap/img/1.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{asset('/assets/frontend/index/wap/img/2.png')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{asset('/assets/frontend/index/wap/img/3.png')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{asset('/assets/frontend/index/wap/img/4.png')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{asset('/assets/frontend/index/wap/img/5.png')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{asset('/assets/frontend/index/wap/img/6.png')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{asset('/assets/frontend/index/wap/img/7.png')}}" alt=""></div>
            </div>
        </div>
        <i></i>
        <!--<p class="leixing">-->
        <!--<span>生活社区型</span>-->
        <!--<span>1</span>/ 7-->
        <!--</p>-->
    </div>
    <div class="det_time">
        <p>发布时间：<i>2017-05-03</i></p>
        <p>客流：<i>10万+</i></p>
    </div>
    <ul class="det_message">
        <li>商铺基本信息</li>
        <li>线上销售分析</li>
    </ul>
    <div class="xx">
        <div class="spjbxx ">
            <div class="jbxx">
                <h4> 基本信息  <span style="margin-left: 2.8rem;font-size: 0.26rem;font-weight: 400;">商铺编号:<i>121212</i></span></h4>
                <ul class="det_money">
                    <li>
                        <p><i>7000 </i> 元/月</p>
                        <p>12月一付</p>
                    </li>
                    <li>
                        <p>转让费：<i>5000</i><i>元</i></p>
                        <p>无押金</p>
                    </li>
                    <li>
                        <p><i>140</i><i>㎡</i></p>
                        <p>建筑面积</p>
                    </li>
                </ul>
                <p class="det_domian">区域：<i>朝阳区</i></p>
                <p class="det_buss">商圈：<i>酒仙桥</i></p>
                <p class="det_do">地址：<i>北京市朝阳区酒仙桥东路9号院2号楼</i></p>
                <div class="det_around"><p>周边建筑：</p><p><i>医院2</i><i>酒店2</i><i>写字楼5</i><i>学校3</i></p></div>
                <p class="det_cb">投资成本估算：<i>7000*12+5000=</i><span>89000</span><i>（元）</i></p>
            </div>
            <div class="jzxx">
                <h4>建筑信息</h4>
                <div class="det_mi">
                    <p>商铺类型：<i>临街街铺</i></p>
                    <p>进深：<i>2</i><i>米</i></p>
                    <p>所在楼层：<i>3</i><i>层</i></p>
                </div>
                <div class="det_ceng">
                    <p>门头宽度：<i>2</i><i>米</i></p>
                    <p>层高：<i>/</i></p>
                </div>
            </div>
            <div class="zlxg">
                <h4>租赁相关</h4>
                <div class="det_zl">
                    <p>租赁状态 ：<i>租赁中</i></p>
                    <p>剩余租约（月）：<i>3</i></p>
                    <p>续约情况 ：<i>另签一份</i></p>
                </div>
                <div class="det_sy">
                    <p>租赁类型：<i>生意转让</i></p>
                    <p>当前租约（年）：<i>3</i></p>
                    <p>最长可租约（月）：<i>12</i></p>
                </div>
            </div>
            <div class="gctj">
                <h4>工程条件</h4>
                <div class="_project">
                    <div class="pro"><i></i><p>上水</p></div>
                    <div class="pro"><i></i><p>下水</p></div>
                    <div class="pro"><i></i><p>380伏</p></div>
                    <div class="pro"><i></i><p>煤气罐</p></div>
                    <div class="pro"><i></i><p>烟道管</p></div>
                    <div class="pro"><i></i><p>排污管道</p></div>
                    <div class="pro"><i></i><p>停车位</p></div>
                    <div class="pro"><i></i><p>天然气</p></div>
                    <div class="pro"><i></i><p>外摆区</p></div>
                    <div class="pro"><i></i><p>可明火</p></div>
                    <div class="pro"><i></i><p>可办照</p></div>
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
                <a href="live.html"><div class="footkc">
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
                <div class=" _hadcollect none">取消收藏</div>
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
@include('Frontend.Index.CN.wap.Layout.footer')
