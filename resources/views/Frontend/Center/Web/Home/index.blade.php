@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')
<div id="main">
    <div class="lyt-c-0">
        <div id="fc-msg-link" class="fc-msg" data-vip="false">
            <span></span>
            <a href="{{url('center/home')}}" target="_blank">
                支付有礼
            </a>
            <b>
                |
            </b>
            <a href="{{url('center/home')}}" target="_blank">
                恰列客服
            </a>
        </div>
        <div id="user-info" class="user-info">
            <div class="info-lcol">
                <div class="u-pic">
                    <img alt="用户头像" src="">
                    <a id="accountImg" href="">
                        <div class="mask">
                        </div>
                    </a>
                </div>
                <div class="info-m">
                    <div class="u-name">
                        <a href="{{url('center/home')}}" target="_blank">
                            yangcuiwang
                        </a>
                    </div>
                    <div class="u-level">
                    <span class="rank r4" >
                        <s>
                        </s>
                        <a href="{{url('center/home')}}" target="_blank">
                            金牌会员
                        </a>
                    </span>
                        <a href="{{url('center/home')}}" target="_blank">
                            <img id="userPlusIcon" src="/misc/img/weikaitong.png" alt="plus_icon"
                                 title="购买PLUS会员，尊享顶级特权">
                        </a>
                    </div>
                    <div class="u-safe">
                        <a id="accountSafe" href="{{url('center/home')}}">
                        <span>
                            账户安全：
                        </span>
                        </a>
                        <i id="cla" class="safe-rank05">
                        </i>
                        <strong id="rank-text" class="rank-text ftx-05">
                            较高
                        </strong>
                        <a id="up" href="{{url('center/home')}}"
                           style="display: none;">
                            提升
                        </a>
                    </div>
                    <div class="clr mb10">
                    </div>
                    <div class="u-medal">
                        <a href="{{url('center/home')}}" target="_blank">
                            我的勋章
                        </a>
                    </div>
                    <div class="info-line">
                    <span class="top-icon">
                    </span>
                        <span class="bottom-icon">
                    </span>
                        <span class="left-icon">
                    </span>
                    </div>
                </div>
            </div>
            <div class="info-rcol">
                <div class="user-counts">
                    <ul>
                        <li>
                            <div class="count-item">
                                <a href="{{url('center/home')}}" target="_self">
                                    <i class="count-icon count-icon01">
                                    </i>
                                    待付款
                                    <em id="waitPay">
                                        0
                                    </em>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="count-item">
                                <a href="{{url('center/home')}}" target="_self">
                                    <i class="count-icon count-icon02">
                                    </i>
                                    待收货
                                    <em id="waitReceive">
                                        2
                                    </em>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="count-item">
                                <a href="{{url('center/home')}}" target="_self">
                                    <i class="count-icon count-icon03">
                                    </i>
                                    待自提
                                    <em id="waitPick">
                                        0
                                    </em>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="count-item">
                                <a href="{{url('center/home')}}">
                                    <i class="count-icon count-icon04">
                                    </i>
                                    待评价
                                    <em id="productCount">
                                        14
                                    </em>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="acco-info">
                    <ul>
                        <li class="fore1">
                            <div class="acco-item">
                                <div>
                                    <label>
                                        余额：
                                    </label>
                                    <a href="{{url('center/home')}}" id="BalanceCount">
                                        0.00
                                    </a>
                                </div>
                                <div>
                                    <label>
                                        京豆：
                                    </label>
                                    <a href="{{url('center/home')}}" id="JingdouCount">
                                        <em>
                                            338
                                        </em>
                                    </a>
                                    <a id="exchangeGangben" target="_blank" href="{{url('center/home')}}"
                                       title="换钢镚" style="position: relative;top: -10px;">
                                        <img width="19" height="16" src="//img12.360buyimg.com/da/jfs/t2458/15/2917490921/18034/4dd292c3/56f0f0dcN08c0a2f1.png">
                                    </a>
                                </div>
                                <div>
                                    <label>
                                        京东卡/E卡：
                                    </label>
                                    <a href="{{url('center/home')}}" id="LipinkaCount" >
                                        0
                                    </a>
                                </div>
                                <div>
                                    <label>
                                        优惠券：
                                    </label>
                                    <a href="{{url('center/home')}}" id="CouponCount">
                                        <em>
                                            4
                                        </em>
                                    </a>
                                    　
                                    <a href="{{url('center/home')}}" id="" class="alink" target="_blank">
                                        领券
                                    </a>
                                </div>
                                <div>
                                    <label>
                                        通信B：
                                    </label>
                                    <a class="mr5" href="{{url('center/home')}}"
                                       id="BValue">
                                        0
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="fore2">
                            <div class="acco-item">
                                <div id="baitiao-info" class="baitiao-info">
                                    <div>
                                        白条欠款
                                        <span class="ftx03">
                                        （元）
                                    </span>
                                    </div>
                                    <div class="ftx01 ">
                                        <a href="{{url('center/home')}}"
                                           target="_blank">
                                            <em>
                                                46.12
                                            </em>
                                        </a>
                                    </div>
                                    <div>
                                        白条额度
                                    </div>
                                    <div>
                                        <a href="{{url('center/home')}}"
                                           target="_blank">
                                            <em>
                                                5000
                                            </em>
                                        </a>
                                    </div>
                                </div>
                                <div class="baitiao-info">
                                    <div class="u-auth" id="userVerifyRight_passed" sytle="display:none;"
                                         style="display: block;">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            小白信用：
                                        </a>
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <em>
                                                95.1
                                            </em>
                                        </a>
                                    </div>
                                    <div class="u-auth" id="userVerifyRight_unpassed" sytle="display:none;">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="fore3">
                            <div class="acco-item">
                                <div id="jinku-info" class="jinku-info ">
                                    <div id="income">
                                        昨天收益
                                        <span class="ftx03">
                                        （元）
                                    </span>
                                    </div>
                                    <div class="ftx01 profit">
                                        <a class="ftx01 jk-income" href="{{url('center/home')}}">
                                            0.00
                                        </a>
                                        <span class="btn-hide">
                                        隐藏
                                    </span>
                                        <span class="btn-show">
                                        显示收益和金额
                                    </span>
                                    </div>
                                    <div id="balance">
                                        <a href="{{url('center/home')}}">
                                            小金库
                                        </a>
                                        ：
                                        <a class="jk-total" href="{{url('center/home')}}">
                                            <em>
                                                2.48
                                            </em>
                                        </a>
                                    </div>
                                    <div id="xjk0" class="mb">
                                        <a href="{{url('center/home')}}" target="_blank" class="alink">
                                            转入
                                        </a>
                                        <a href="{{url('center/home')}}" target="_blank" class="alink ml10">
                                            转出
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="lyt-c-1">
        <div class="mod-main">
            <div class="mt">
                <h3>
                    我的订单
                </h3>
                <div class="extra-r">
                    <a href="{{url('center/home')}}" target="_self">
                        查看全部订单
                    </a>
                </div>
            </div>
            <div class="mc">
                <div id="tb-order" class="tb-order">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <colgroup>
                            <col class="col-1">
                            <col class="col-2">
                            <col class="col-3">
                            <col class="col-4">
                            <col class="col-5">
                            <col>
                        </colgroup>
                        <tbody class="fore0">
                        <tr>
                            <td>
                                <div class="img-list">
                                    <a href="{{url('center/home')}}" target="_blank">
                                        <img src="//img10.360buyimg.com/N5/jfs/t2605/338/619175978/185284/e48fd432/571d88ffN9a780fd3.jpg"
                                             title="【京东超市】欧莱雅（LOREAL）奇焕润发精油100ml（受损发质 免洗 防损伤）（新老包装随机发货）">
                                    </a>
                                    <a href="{{url('center/home')}}" target="_blank">
                                        <img src="//img10.360buyimg.com/N5/jfs/t2857/82/2829990061/208949/f4f6d18e/5774cc78N01977271.jpg"
                                             title="美即  润白狂享曲补水亮肤润颜定制面膜礼盒25片（补水保湿舒缓 控油 嫩滑细致亮肤 男女士面膜贴">
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="u-name">
                                    杨斌
                                </div>
                            </td>
                            <td>
                                ￥224.80
                                <br>
                                货到付款
                            </td>
                            <td>
                                <span class="ftx-03">
                                    2016-12-26
                                    <br>
                                    21:40:34
                                </span>
                            </td>
                            <td>
                                <span class="ftx-03">
                                    已完成
                                </span>
                            </td>
                            <td class="order-doi">
                                <a target="_blank" href="{{url('center/home')}}">
                                    查看
                                </a>
                            </td>
                        </tr>
                        </tbody>
                        <tbody class="fore1">
                        <tr>
                            <td>
                                <div class="img-list">
                                    <a href="{{url('center/home')}}" target="_blank">
                                        <img src="//img10.360buyimg.com/N5/jfs/t2833/178/964022094/120760/7c9bba0a/572ff3e4Nf9556a6b.jpg"
                                             title="{包邮} 慕丝妮肉松饼 整箱2000g（约55个左右）休闲糕点零食品">
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="u-name">
                                    杨斌
                                </div>
                            </td>
                            <td>
                                ￥29.90
                                <br>
                                在线支付
                            </td>
                            <td>
                                <span class="ftx-03">
                                    2016-12-26
                                    <br>
                                    21:32:41
                                </span>
                            </td>
                            <td class="td-01">
                                <strong class="ftx-04 order-statu">
                                    等待收货
                                </strong>
                                <div class="tooltip">
                                    跟踪
                                    <s>
                                    </s>
                                    <div class="prompt-01" style="display: none;">
                                        <div class="pc">
                                            <div class="close" onclick="$(this).parent().parent().hide()">
                                            </div>
                                            <dl>
                                                <dt>
                                                    处理时间
                                                </dt>
                                                <dd>
                                                    处理信息
                                                </dd>
                                            </dl>
                                            <ul>
                                                <li>
                                                    <div class="fore1">
                                                        2016-12-26 21:32:41
                                                    </div>
                                                    <div class="fore2">
                                                        您提交了订单，请等待第三方卖家系统确认
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="fore1">
                                                        2016-12-26 21:33:09
                                                    </div>
                                                    <div class="fore2">
                                                        您的订单已进入第三方卖家库房，准备出库
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="fore1">
                                                        2016-12-27 10:00:11
                                                    </div>
                                                    <div class="fore2">
                                                        第三方卖家已经开始拣货
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="fore1">
                                                        2016-12-27 10:08:34
                                                    </div>
                                                    <div class="fore2">
                                                        您的订单由第三方卖家拣货完毕，待出库交付圆通快递，运单号为883918640054391209
                                                    </div>
                                                </li>
                                                <li class="pr-more">
                                                    <div class="fore1">
                                                        &nbsp;
                                                    </div>
                                                    <div class="fore2">
                                                        运单号：883918640054391209
                                                        <br>
                                                        信息来源：
                                                        <strong>
                                                            圆通快递
                                                        </strong>
                                                        <em class="icon-show">
                                                        </em>
                                                    </div>
                                                </li>
                                                <li class="third-li">
                                                    <ul>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-27 15:27:16
                                                            </div>
                                                            <div class="fore2">
                                                                【湖南省长沙市岳麓区公司】 取件人: 周永诚 已收件
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-27 17:57:59
                                                            </div>
                                                            <div class="fore2">
                                                                【湖南省长沙市岳麓区公司】 已收件
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-27 17:57:59
                                                            </div>
                                                            <div class="fore2">
                                                                【湖南省长沙市岳麓区公司】 已打包
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-27 20:53:46
                                                            </div>
                                                            <div class="fore2">
                                                                【长沙转运中心】 已收入
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-27 20:55:48
                                                            </div>
                                                            <div class="fore2">
                                                                【长沙转运中心】 已发出 下一站 【北京转运中心】
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-29 20:43:24
                                                            </div>
                                                            <div class="fore2">
                                                                【北京转运中心】 已收入
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-29 20:45:40
                                                            </div>
                                                            <div class="fore2">
                                                                【北京转运中心】 已发出 下一站 【北京市朝阳区十里堡公司】
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-30 02:17:06
                                                            </div>
                                                            <div class="fore2">
                                                                【北京市朝阳区十里堡公司】 已收入
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-30 07:26:39
                                                            </div>
                                                            <div class="fore2">
                                                                【北京市朝阳区十里堡公司】 派件人: 胡凤超 派件中 派件员电话18911592957
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="fore1">
                                                                2016-12-30 13:45:24
                                                            </div>
                                                            <div class="fore2">
                                                                客户 签收人: 家人 已签收 感谢使用圆通速递，期待再次为您服务
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="p-arrow p-arrow-left">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="order-doi">
                                <a target="_blank" href="{{url('center/home')}}">
                                    查看
                                </a>
                            </td>
                        </tr>
                        </tbody>
                        <tbody class="fore2">
                        <tr>
                            <td>
                                <div class="img-list">
                                    <a href="{{url('center/home')}}" target="_blank">
                                        <img src="//img10.360buyimg.com/N5/jfs/t3496/332/1559061199/174396/e1e2afaf/5829701bNd6e10c84.jpg"
                                             title="技光 手机支架铝合金懒人支架ipad平板电脑支架苹果桌面支架iphone充电底座 太空银">
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="u-name">
                                    杨斌
                                </div>
                            </td>
                            <td>
                                ￥16.80
                                <br>
                                在线支付
                            </td>
                            <td>
                                <span class="ftx-03">
                                    2016-12-26
                                    <br>
                                    20:58:13
                                </span>
                            </td>
                            <td class="td-01">
                                <strong class="ftx-04 order-statu">
                                    等待收货
                                </strong>
                                <div class="tooltip">
                                    跟踪
                                    <s>
                                    </s>
                                </div>
                            </td>
                            <td class="order-doi">
                                <a target="_blank" href="{{url('center/home')}}">
                                    查看
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="nocont-box nocont-order" style="display: none;">
                        <b class="icon-order">
                        </b>
                        您买的东西太少了，这里都空空的，快去挑选合适的商品吧！
                    </div>
                </div>
            </div>
        </div>
        <div class="mod-main">
            <div class="mt">
                <h3>
                    买什么
                </h3>
                <div class="extra-r">
                    <a href="{{url('center/home')}}">
                        查看更多商品专辑
                    </a>
                </div>
            </div>
            <div class="mc">
                <div class="album-slider" id="albumSlider">
                    <a class="slider-prev slider-disable">
                        <b>
                        </b>
                    </a>
                    <a class="slider-next">
                        <b>
                        </b>
                    </a>
                    <div class="album-slider-show">
                        <div class="album-slider-cont" style="position: relative;">
                            <ul class="album-list clearfix" style="width: 3740px; left: 0px; position: absolute;">
                                <li class="album-item current" data-slider-idx="0" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                炎炎夏日，甜品让你欲罢不能～
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    Micamika蛋糕
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        1
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        1
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img10.360buyimg.com/n1/s250x250_jfs/t2875/133/2509938317/551051/25b8d9ff/5768a0b9Na49b5af0.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="米卡米卡 Micamika 语语心知下午茶  红丝绒 创意心形小蛋糕 北京速递 情侣蛋糕"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img12.360buyimg.com/n1/s76x76_jfs/t2173/58/1848392220/513530/71f72753/568b7b21N005ae236.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="米卡米卡 百利甜之恋 新鲜水果 乳脂奶油 生日蛋糕 鲜花蛋糕 北京同城 冷链配送 饼干蛋糕 1.5磅 适合3-5人食用"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img11.360buyimg.com/n1/s76x76_jfs/t3142/149/4217609811/580044/906f2523/5837cbe4N12fe9ffd.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="米卡米卡 黑森林蛋糕 巧克力蛋糕 新鲜水果 黑巧克力 生日蛋糕 饼干蛋糕 北京同城配送 1.5磅 适合3-5人食用"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img11.360buyimg.com/n1/s76x76_jfs/t3010/134/1823822505/716196/7d6be99/57ce4331Nf77e7046.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    6
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="album-item" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                舌尖的诱惑 唇齿的依恋
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    艾波索旗舰店-小邱
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        6
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        4
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img14.360buyimg.com/n1/s250x250_jfs/t3103/217/2483402346/321018/3ae7aea4/57e24c98Na69190b2.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="艾波索 草莓黑金砖 巧克力水果蛋糕 240g草莓慕斯巧克力生日蛋糕全国配送 下午茶蛋糕甜点"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img11.360buyimg.com/n1/s76x76_jfs/t2185/256/2129146285/441285/4ac76e27/56a8284bN9fe51017.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="艾波索 双馅熔岩牛奶 布丁鸡蛋牛奶双味 80奶香浓郁甜点糕点点心 单个装" href="{{url('center/home')}}">
                                                            <img width="74" height="74" src="//img12.360buyimg.com/n1/s76x76_jfs/t2350/237/1436761755/512106/3959019a/56a8298fN57bf2601.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="艾波索 碧螺春甜心卷 卡士达内馅抹茶蛋糕 330g美味可口点心" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t1948/169/2126585900/455868/f68eecfd/56a82915N2bc02da0.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    11
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="album-item" _id="5840" data-slider-idx="2" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                “看得见品质“的坚果
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    秋滋叶小柯
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like" _id="5840"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        3
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow" _id="5840"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        2
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img14.360buyimg.com/n1/s250x250_jfs/t2113/23/1741889704/466298/b0622280/5670edcdN8b87f4b3.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="秋滋叶临安山核桃仁 新货坚果休闲零食特产 少糖小山核桃仁 山核桃肉食品" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img11.360buyimg.com/n1/s76x76_jfs/t3298/300/5385095012/597874/278ddc16/586ded8bN3c770102.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="秋滋叶休闲零食食品 生夏威夷果仁肉 0号特大夏威夷果仁 原味" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img13.360buyimg.com/n1/s76x76_jfs/t2743/151/3524269901/225826/5cb8b96b/57901eb9Nb6b1221c.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="秋滋叶长白山野生东北红松子仁休闲零食食品 生松仁肉190g/袋 原味" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img12.360buyimg.com/n1/s76x76_jfs/t2446/323/1085892033/379135/8e2c0b0f/5670ee9cNb35c8c48.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    9
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="album-item" _id="7030" data-slider-idx="3" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                粒上皇零食精选
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    粒上皇旗舰店
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like" _id="7030"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        2
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow" _id="7030"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        3
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img14.360buyimg.com/n1/s250x250_jfs/t2590/180/4118882117/411910/6ed01c01/57aae635N959602b0.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="粒上皇 原味夏威夷果245gx2袋  坚果炒货干果零食" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img13.360buyimg.com/n1/s76x76_jfs/t3850/349/642664182/85176/79e6c018/58171689N93e4cd9a.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="【京东超市】粒上皇 原色开心果210gx2袋 坚果干果零食特产原味无漂白" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img12.360buyimg.com/n1/s76x76_jfs/t3817/162/313158810/342775/a0b9eb7a/580da858Nf0afe2f5.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="【京东超市】粒上皇 蒸汽奶香花生158gx2袋 坚果炒货干果零食小吃特产奶油味" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img12.360buyimg.com/n1/s76x76_jfs/t2788/173/3967023681/367377/45eb00d0/57a30097N3bf87f28.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    9
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="album-item" _id="110240" data-slider-idx="4" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                过年带给爸妈的智能礼物
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    jdzitongder
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like" _id="110240"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        22
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow" _id="110240"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        21
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img10.360buyimg.com/n1/s250x250_jfs/t3376/64/1599785920/37870/3458717f/582c29b5N12407da8.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="华为（HUAWEI）原装蓝牙音箱/音响 华为小天鹅便携音箱低音炮扩音播放器 通用型蓝牙音箱 薄荷绿"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t3208/281/5366305088/43578/a19e9ee4/586dbf8cNe83eb679.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="TROZK特洛克柠檬U站 多功能柠萌智能插座拖插线板多口usb充电器排插 春天绿" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img11.360buyimg.com/n1/s76x76_jfs/t2227/335/1994552444/286310/f52e3d6f/56a071ecN2e6f38c4.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="Benks 手机指环支架iphone7plus粘贴式卡扣苹果7平板电脑通用三星S7edge 玫瑰金"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t3127/73/5327146472/132511/6b782b2e/5869bcbdNdb38689f.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    37
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="album-item" _id="109797" data-slider-idx="5" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                年会奖品---就要高、大、尚
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    会跳舞的胖纸
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like" _id="109797"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        16
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow" _id="109797"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        11
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img12.360buyimg.com/n1/s250x250_jfs/t3049/267/321414843/238650/70df281e/57b12a70N8c7a9741.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="富士（FUJIFILM）趣奇（checky）instax mini25相机 （白色）"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img13.360buyimg.com/n1/s76x76_jfs/t2611/251/2644635268/106180/420c1e96/576cf3c0N925362b0.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="Apple iPad Pro平板电脑 9.7 英寸（32G WLAN版/A9X芯片/Retina显示屏/Multi-Touch技术MM172CH）玫瑰金色"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img14.360buyimg.com/n1/s76x76_jfs/t2416/170/2757059063/375574/cb63e716/56f09d5bN9ef53985.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="罗技（Logitech）G900有线/无线双模式游戏鼠标 RGB鼠标" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img14.360buyimg.com/n1/s76x76_jfs/t2344/193/2586346705/166940/9424a0e8/570f6ac7N16482379.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    20
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="album-item" _id="109060" data-slider-idx="6" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                雾霾来袭，我来“罩”你
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    JD-guliyuan
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like" _id="109060"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        25
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow" _id="109060"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        17
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img10.360buyimg.com/n1/s250x250_jfs/t3826/154/142657482/86342/2fcfdfd/58084528Neff30140.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="3M 耐适康 8550 时尚骑行男女保暖口罩防风沙防寒 男童淡蓝" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img11.360buyimg.com/n1/s76x76_g13/M07/09/02/rBEhU1KcKtcIAAAAAAJj6iabtFMAAGPFAEuLR8AAmQC930.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="爱不释手 pm2.5防尘口罩女男士防雾霾过滤防霾N95个性骑行防风透气 N95口罩 酒红色"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img14.360buyimg.com/n1/s76x76_jfs/t3055/64/1800493577/163342/a2ea5e47/57d511b2N3883b11e.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="凯壹特（KIT）一次性口罩防尘防雾霾防花粉男女秋冬防护款 50只 三层无纺布口罩50只 蓝色 独立装"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t3064/358/3175132020/238989/e783fc99/57eca6b9N99544f8d.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    20
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="album-item" _id="109100" data-slider-idx="7" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                腊八节抢年货，欢欢喜喜过大年
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    广州青三
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like" _id="109100"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        18
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow" _id="109100"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        20
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img10.360buyimg.com/n1/s250x250_jfs/t3508/177/2380150770/175858/4c767119/584fb764N8a84dc06.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="永隆金号 绒沙金鸡年礼物 十二生肖摆件 卡通12生肖 家居摆饰 生日礼物 鸡宝宝 鸡"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img13.360buyimg.com/n1/s76x76_jfs/t994/146/1300693485/55271/2005bd7a/5594d44dN100aeebd.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="烟雨集 2017鸡年卡通小狮创意新年春节过年红包袋利是封 卡通小狮套装红包 10个装 千元红包"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t3910/16/469643548/101521/cfe84fd6/584fe4f1N2abd1655.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="烟雨集 结婚婚礼气球创意婚庆用品婚房布置加厚多色乳胶气球 圆形红色 20个" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t3169/117/4683325493/18812/688b319d/584ff195Nca9a43d6.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    26
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="album-item" _id="108653" data-slider-idx="8" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                年货必买清单
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    jd_珍珍菇凉_ilwoO
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like" _id="108653"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        36
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow" _id="108653"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        32
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img11.360buyimg.com/n1/s250x250_jfs/t3169/246/4646966849/314040/20e77546/584be9cdNd2aea302.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="【百草味】茶几上的春晚1538g 坚果礼盒 年货干果零食大礼包 9袋装" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t3142/135/4473426034/462697/e05f859a/58468844N96e00104.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="【百草味】外婆的灶台1358g 坚果礼盒 零食干果 年货大礼包 8袋装" href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img14.360buyimg.com/n1/s76x76_jfs/t3058/121/4394011160/460758/7f827dcf/58468d40N7b027681.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="【京东超市】稻香村糕点京八件年货礼盒 北京特产点心小吃400g " href="{{url('center/home')}}"
                                                        >
                                                            <img width="74" height="74" src="//img13.360buyimg.com/n1/s76x76_jfs/t3097/329/5389266485/233853/c5650567/586b51cbN82bff1b5.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    13
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="album-item" _id="108018" data-slider-idx="9" style="float: left;">
                                    <div class="item-inner">
                                        <div class="ab-name">
                                            <a href="{{url('center/home')}}">
                                                新年日历福字春联抢先购
                                            </a>
                                        </div>
                                        <div class="ab-info">
                                            <a href="{{url('center/home')}}"
                                               class="ab-creator">
                                                <i>
                                                </i>
                                                <em>
                                                    荣宝斋电商
                                                </em>
                                            </a>
                                            <div class="ab-operate1">
                                                <a href="javascript:void(0);" target="_self" class="btn-like" _id="108018"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        13
                                                    </em>
                                                </a>
                                                <a href="javascript:void(0);" target="_self" class="btn-follow" _id="108018"
                                                >
                                                    <i class="btnico">
                                                    </i>
                                                    <em class="btntxt">
                                                        11
                                                    </em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ab-goods">
                                            <div class="ab-goods-cover">
                                                <a target="_blank" href="{{url('center/home')}}" title=""
                                                >
                                                    <img width="160" height="160" src="//img10.360buyimg.com/n1/s250x250_jfs/t4117/351/484074585/641794/1eb2e78/58510068N946693bc.jpg">
                                                </a>
                                            </div>
                                            <div class="ab-goods-list">
                                                <div class="ab-goods-ul">
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="荣宝斋春联 万年红七言对联横批斗方洒金红宣纸 描红系列 过年过节送礼贴福字 【斗方】福字"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t4117/351/484074585/641794/1eb2e78/58510068N946693bc.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="荣宝斋日历 2016/2017丙申猴年/鸡年丁酉年 馆藏书画珍品印册沈鹏自书记事本台历日历 2017年"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t3349/135/2595050816/453847/f75db61a/5859f8f6N305f458b.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="ab-goods-item">
                                                        <a target="_blank" title="荣宝斋日历 2016/2017丙申猴年/鸡年丁酉年 馆藏书画珍品印册沈鹏自书记事本台历日历 2016年"
                                                           href="{{url('center/home')}}" >
                                                            <img width="74" height="74" src="//img10.360buyimg.com/n1/s76x76_jfs/t2521/247/955211928/300096/8d9c30a7/5673cdb1Nd34c6571.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <a href="{{url('center/home')}}" target="_blank" class="goods-num"
                                                >
                                                    14
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- economical -->
        <!--/ /widget/order-list/order-list.tpl -->
    </div>
    <div class="lyt-c-2">
        <div class="lyt-c-3">
            <!-- /widget/economical/economical.tpl -->
            <!-- economical-->
            <div class="mod-main">
                <div class="mt">
                    <h3>
                        会员推荐
                    </h3>
                </div>
                <div class="mc">
                    <!--帮你省 start-->
                    <div id="economical" class="economical">
                        <ul class="gate-list">
                            <li class="fore1">
                                <div class="gate-item">
                                    <a href="{{url('center/home')}}" target="_blank" >
                                    <span class="fore1">
                                        京东会员
                                    </span>
                                        <span class="fore2">
                                        <b>
                                            &gt;
                                        </b>
                                    </span>
                                    </a>
                                </div>
                            </li>
                            <li class="fore2">
                                <div class="gate-item">
                                    <a href="{{url('center/home')}}" target="_blank">
                                    <span class="fore1">
                                        金融会员
                                    </span>
                                        <span class="fore2">
                                        <b>
                                            &gt;
                                        </b>
                                    </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <ul id="eco-item" class="eco-item">
                            <li>
                                <div class="da-item">
                                    <div class="ext1">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            拼颜值不如拼信用
                                        </a>
                                    </div>
                                    <div class="ext2">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            立即开启享特权
                                        </a>
                                    </div>
                                    <a target="_blank" href="{{url('center/home')}}">
                                        <img width="110" height="60" src="//img10.360buyimg.com/da/jfs/t3031/354/491540733/3975/52649df0/57a2a822Nafbe4d56.png"
                                             alt="">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="da-item">
                                    <div class="ext1">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            特权精品汇
                                        </a>
                                    </div>
                                    <div class="ext2">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            你想要的这里都有
                                        </a>
                                    </div>
                                    <a target="_blank" href="{{url('center/home')}}">
                                        <img width="110" height="60" src="//img14.360buyimg.com/da/jfs/t3199/359/1419576438/17616/6de4adca/57cce91fN9939b931.jpg"
                                             alt="">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="da-item">
                                    <div class="ext1">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            加入会员PLUS
                                        </a>
                                    </div>
                                    <div class="ext2">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            立得150元礼包
                                        </a>
                                    </div>
                                    <a target="_blank" href="{{url('center/home')}}">
                                        <img width="110" height="60" src="//img10.360buyimg.com/da/jfs/t3403/183/598375237/12274/d2ec8275/580f3c92N5bc60b7c.jpg"
                                             alt="">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="da-item">
                                    <div class="ext1">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            山姆会员卡
                                        </a>
                                    </div>
                                    <div class="ext2">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            信息查询
                                        </a>
                                    </div>
                                    <a target="_blank" href="{{url('center/home')}}">
                                        <img width="110" height="60" src="//img13.360buyimg.com/da/jfs/t3790/97/203382969/2751/ad886d00/58030e06Nb5334a7c.jpg"
                                             alt="">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="da-item">
                                    <div class="ext1">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            京豆全额购彩
                                        </a>
                                    </div>
                                    <div class="ext2">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            200京豆中1500万
                                        </a>
                                    </div>
                                    <a target="_blank" href="{{url('center/home')}}">
                                        <img width="110" height="60" src="//img12.360buyimg.com/da/jfs/t679/231/1028567760/9095/eebbee75/54a8b7f9N25e32486.jpg"
                                             alt="帮你省">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="da-item">
                                    <div class="ext1">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            拼图赢京豆
                                        </a>
                                    </div>
                                    <div class="ext2">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            聚少成多哦
                                        </a>
                                    </div>
                                    <a target="_blank" href="{{url('center/home')}}">
                                        <img width="110" height="60" src="//img14.360buyimg.com/da/jfs/t322/75/1930479612/19854/3e0c2803/54477d03N7acec52a.jpg"
                                             alt="帮你省">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="lyt-c-7">
            <div class="lyt-c-4">
                <div class="mod-main" id="r-server">
                    <div class="mt">
                        <h3>
                            便民服务
                        </h3>
                    </div>
                    <div class="mc">
                        <div id="quick-ser" class="quick-ser">
                            <div class="f-tab">
                                <ul>
                                    <li class="ftab-item curr">
                                        <a target="_blank" href="{{url('center/home')}}">
                                            充值
                                        </a>
                                    </li>
                                    <li class="ftab-item">
                                        <a target="_blank" href="{{url('center/home')}}"
                                           class="">
                                            旅行
                                        </a>
                                    </li>
                                    <li class="ftab-item">
                                        <a target="_blank" href="{{url('center/home')}}"
                                           class="">
                                            彩票
                                        </a>
                                    </li>
                                    <li class="ftab-item">
                                        <a target="_blank" href="{{url('center/home')}}"
                                           class="">
                                            游戏
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="f-tab-con ui-switchable-panel-selected" style="display: block;">
                                <iframe width="100%" scrolling="no" height="138px" src="{{url('center/home')}}"
                                        data-src="done">
                                </iframe>
                            </div>
                            <div class="f-tab-con hide" style="display: none;">
                                <iframe width="100%" scrolling="no" height="138px" src="about:blank"
                                        data-src="{{url('center/home')}}{{url('center/home')}}">
                                </iframe>
                            </div>
                            <div class="f-tab-con hide" style="display: none;">
                                <iframe width="100%" scrolling="no" height="138px" src="about:blank"
                                        data-src="{{url('center/home')}}">
                                </iframe>
                            </div>
                            <div class="f-tab-con hide" style="display: none;">
                                <iframe width="100%" scrolling="no" height="138px" src="about:blank"
                                        data-src="{{url('center/home')}}">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lyt-c-5">
                <div class="mod-main" id="history">
                    <div class="mt">
                        <h3>
                            我的足迹
                        </h3>
                        <div class="extra-r">
                            <a href="{{url('center/home')}}" target="_blank" >
                                查看更多
                            </a>
                        </div>
                    </div>
                    <div class="mc">
                        <div class="history-con">
                            <a class="prev ctrl" style="display: none;">
                                <b>
                                </b>
                            </a>
                            <a class="next ctrl">
                                <b>
                                </b>
                            </a>
                            <div class="slider-show">
                                <div class="slider-show-ctn" style="position: relative; left: 0px;">
                                    <ul style="width: 216px;">
                                        <li data-clk="{{url('center/home')}}"
                                            style="margin-right: 12px;">
                                            <div class="history-item">
                                                <div class="p-img">
                                                    <a href="{{url('center/home')}}" target="_blank">
                                                        <img width="50" height="50" data-lazyload="//img11.360buyimg.com/n3/jfs/t607/199/1475107158/53827/a0644e94/54f52c89N0633c653.jpg"
                                                             alt="飞利浦（PHILIPS）S511/12电动剃须刀 刮胡刀" class="err-product" src="//img11.360buyimg.com/n3/jfs/t607/199/1475107158/53827/a0644e94/54f52c89N0633c653.jpg">
                                                    </a>
                                                </div>
                                                <div class="p-price">
                                                    ￥249.00
                                                </div>
                                            </div>
                                        </li>
                                        <li data-clk="{{url('center/home')}}"
                                            style="margin-right: 12px;">
                                            <div class="history-item">
                                                <div class="p-img">
                                                    <a href="{{url('center/home')}}" target="_blank">
                                                        <img width="50" height="50" data-lazyload="//img13.360buyimg.com/n3/jfs/t3631/103/733536696/146921/38e3a03d/58115d3aN9c7f8057.jpg"
                                                             alt="欧莱雅（LOREAL）多效修复润发乳200ml（赠品）" class="err-product" src="//img13.360buyimg.com/n3/jfs/t3631/103/733536696/146921/38e3a03d/58115d3aN9c7f8057.jpg">
                                                    </a>
                                                </div>
                                                <div class="p-price">
                                                    ￥21.00
                                                </div>
                                            </div>
                                        </li>
                                        <li data-clk="{{url('center/home')}}"
                                            style="margin-right: 12px;">
                                            <div class="history-item">
                                                <div class="p-img">
                                                    <a href="{{url('center/home')}}" target="_blank">
                                                        <img width="50" height="50" data-lazyload="//img10.360buyimg.com/n3/jfs/t2605/338/619175978/185284/e48fd432/571d88ffN9a780fd3.jpg"
                                                             alt="【京东超市】欧莱雅（LOREAL）奇焕润发精油100ml（受损发质 免洗 防损伤）（新老包装随机发货）" class="err-product"
                                                             src="//img10.360buyimg.com/n3/jfs/t2605/338/619175978/185284/e48fd432/571d88ffN9a780fd3.jpg">
                                                    </a>
                                                </div>
                                                <div class="p-price">
                                                    ￥59.00
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="history-progress">
                            <div class="progress-cont" style="width:60%;">
                                <b>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lyt-c-8">
                <div id="recmd-entry">
                    <div class="mt">
                        <h3>
                            您的专属推荐
                        </h3>
                    </div>
                    <div class="mc">
                        <div class="noinfo-con">
                            <div class="txt">
                                不知道买什么好？我们根据您的喜好，为您量身打造了专属购物，快来体验吧！
                            </div>
                            <div class="btn-con">
                                <a class="btn-green" href="javascript:void(0)" onclick="modifyPersonStyle();return false;"
                                   target="_blank">
                                    点击设置
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lyt-c-9">
        <div id="fol-goods" class="mod-main fol-goods">
            <div class="mt">
                <h3>我关注的商品</h3>
                <ul class="extra-l">
                    <li>
                        <a target="_self" href="{{url('center/home')}}">
                            降价商品
                            <em class="ftx03">0</em>
                        </a>
                    </li>
                    <li>
                        <a target="_self" href="{{url('center/home')}}">
                            促销商品
                            <em class="ftx03">0</em>
                        </a>
                    </li>

                </ul>
                <div class="extra-r">
                    <a target="_self" href="{{url('center/home')}}">
                        查看更多
                    </a>
                </div>
            </div>
            <div class="mc">
                <div class="nocont-box nocont-fol">
                    <div>您还没有关注任何商品，看到感兴趣的就果断关注吧！</div>
                </div>
                <div id="fol-p-con" class="follow">
                </div>
            </div>
        </div>
    </div>
    <div class="lyt-c-6">
        <div class="mod-main" id="show-2016">
            <div class="show-tab">
                <ul>
                    <li class="curr weixinSwitcher">
                        微信精选
                    </li>
                    <li class="jdSwitcher">
                        京东推荐
                    </li>
                </ul>
            </div>
            <div class="show-con">
                <div class="t-pannel">
                                <span>
                                    以下内容来自微信购物圈
                                </span>
                    <a href="javascript:void(0)" target="_self" class="show-btn" id="weixinShowBtn">
                        去微信晒单
                    </a>
                </div>
                <div class="show-cont">
                    <div class="show-list fore0">
                        <ul>
                            <li class="show-item" id="show-item-980092092941140691">
                                <div class="s-author">
                                    <dl>
                                        <dt class="u-pic">
                                            <img width="50" height="50" alt="用户头像" src="//wx.qlogo.cn/mmopen/PiajxSqBRaEJLcQueTsTa0AicCia2VicJvNpawJds7pkTq019Fz0OhyVVzsq7QkdXFuN3e3fMhqWL3hAs1IroTBJJYp37gJ6awM3eLtXwx0T6VQ/64">
                                        <div class="mask">
                                        </div>
                                        </dt>
                                        <dd class="txt-1">
                                            Waiting
                                        </dd>
                                        <dd class="txt-2">
                                            来自微信精选
                                        </dd>
                                    </dl>
                                    <p class="s-detail">
                                        送给朋友的新年礼物，CK中性香水，这款男女共享香水，在香水界里掀起一阵旋风，它淡淡的香味，让人倍感亲切，让人忍不住想靠近。设计简约时尚，彰显个性风范，白色透明的磨砂玻璃瓶，特别有质感，自用或者送人都是不错的选择呢，推荐给大家。
                                    </p>
                                </div>
                                <div class="s-imgs" style="visibility: visible;">
                                    <ul class="already-attached" style="width: 1140px; height: 306px; line-height: 306px;">
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t4012/267/1223149227/124198/22bf1772/586e682dNfd8c3af0.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t3100/181/5468415560/105123/aee0018e/586e682dNc5f4ff2b.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t3838/65/2911337594/55936/f156451d/586e682cNc7764313.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t3937/301/1261679021/52374/407dbd71/586e682cN39a1fa95.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t4012/264/1229460315/67315/dceb37bc/586e682cNacc124eb.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                    </ul>
                                    <span class="to-prev">
                                    &lt;
                                </span>
                                    <span class="to-next">
                                    &gt;
                                </span>
                                    <div class="num-pannel">
                                    <span>
                                        <i class="current-img-num">
                                            1
                                        </i>
                                        /5
                                    </span>
                                    </div>
                                </div>
                                <dl class="s-goods">
                                    <dt class="p-pic">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <img src="//img10.360buyimg.com/n2/jfs/t730/42/801955675/86672/aa4d1478/54f52ed0N7fd50769.jpg"
                                                 width="50" height="50" alt="">
                                        </a>
                                    </dt>
                                    <dd>
                                        <a class="p-tit" href="{{url('center/home')}}"
                                           target="_blank">
                                            【京东超市】卡文克莱（Calvin Klein）卡莱优淡香水 100ml
                                        </a>
                                        <br>
                                        <strong>
                                            <em>
                                                ￥
                                            </em>
                                            <i class="J_189076">
                                                219.00
                                            </i>
                                        </strong>
                                    </dd>
                                </dl>
                                <div class="s-comment" shareid="980092092941140691">
                                    <div class="s-toolbar">
                                        <div class="s-t-1">
                                            <a class="to-comment"
                                               shareid="980092092941140691" href="javascript:;" target="_self">
                                                <i title="评论">
                                                </i>
                                                <span class="num" shareid="980092092941140691">
                                                0
                                            </span>
                                            </a>
                                        </div>
                                        <div class="s-t-2">
                                            <a class="to-supply" shareid="980092092941140691"
                                               href="javascript:;" target="_self">
                                                <i title="点赞">
                                                </i>
                                                <span class="num">
                                                1
                                            </span>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                        </div>
                                    </div>
                                    <div class="append-comm">
                                    <textarea name="" cols="30" rows="10" class="area on-focus" placeholder="写下您的评论吧">
                                    </textarea>
                                        <div class="ctrl-con">
                                        <span class="msg success-msg">
                                            恭喜，评论发布成功
                                        </span>
                                            <span class="msg error-msg">
                                        </span>
                                            <a href="javascript:;" target="_self"
                                               class="submit-btn">
                                                发布
                                            </a>
                                        </div>
                                        <div class="s-comm-lists">
                                        </div>
                                        <div class="comment-tip">
                                            只展示最新5条评论
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="show-item" id="show-item-4607116664613229557">
                                <div class="s-author">
                                    <dl>
                                        <dt class="u-pic">
                                            <img width="50" height="50" alt="用户头像" src="//wx.qlogo.cn/mmopen/OicsrgN57fqDTgtw8uSjK4koFgg7Vo1rS3shkQBsvv7fYiaSDmJBJqhuItNB3Wrfer8cj73SlINiaibiamQDCNZh6Xlp1SGtaIpSD/0">
                                        <div class="mask">
                                        </div>
                                        </dt>
                                        <dd class="txt-1">
                                            天涯雨
                                        </dd>
                                        <dd class="txt-2">
                                            来自微信精选
                                        </dd>
                                    </dl>
                                    <p class="s-detail">
                                        #家乡的年（华东篇）# 随着新年的到来，亲人好友欢聚，尽情享用美食的同时怎能少了美酒的相伴？作为山东人，过年必定要喝青岛奥古特啤酒，ta口味纯正，泡沫丰富，清澈甘冽，国产啤酒中的最爱。春节走亲访友，喝青岛啤酒绝对是一种享受。
                                    </p>
                                </div>
                                <div class="s-imgs" style="visibility: visible;">
                                    <ul data-ul-shareid="ul-4607116664613229557" class="already-attached"
                                        style="width: 1140px; height: 405px; line-height: 405px;">
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t4045/295/1202583393/27746/b8eabd20/586e4132N85245217.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t4033/255/1228011122/19505/415ec0fd/586e4133N34b49b05.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t3262/90/5403016792/35764/e3b609e4/586e4133Na51c7d38.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t3073/348/5374506625/26416/bbaedee5/586e4132Na0daaed4.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img11.360buyimg.com/shaidan/s220x800_jfs/t3271/201/5394864976/28826/11a9273f/586e4133N638a2be7.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                    </ul>
                                    <span class="to-prev">
                                    &lt;
                                </span>
                                    <span class="to-next">
                                    &gt;
                                </span>
                                    <div class="num-pannel">
                                    <span>
                                        <i class="current-img-num">
                                            1
                                        </i>
                                        /5
                                    </span>
                                    </div>
                                </div>
                                <dl class="s-goods">
                                    <dt class="p-pic">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <img src="//img11.360buyimg.com/N2/jfs/t589/296/1201325432/143545/e8537ade/54bc65c6N09f0526d.jpg"
                                                 width="50" height="50" alt="">
                                        </a>
                                    </dt>
                                    <dd>
                                        <a class="p-tit" href="{{url('center/home')}}"
                                           target="_blank">
                                            【京东超市】青岛啤酒（Tsingtao）奥古特12度500ml*8听/礼盒装
                                        </a>
                                        <br>
                                        <strong>
                                            <em>
                                                ￥
                                            </em>
                                            <i class="J_1319171">
                                                79.00
                                            </i>
                                        </strong>
                                    </dd>
                                </dl>
                                <div class="s-comment">
                                    <div class="s-toolbar">
                                        <div class="s-t-1">
                                            <a class="to-comment"
                                               href="javascript:;" target="_self">
                                                <i title="评论">
                                                </i>
                                                <span class="num">
                                                0
                                            </span>
                                            </a>
                                        </div>
                                        <div class="s-t-2">
                                            <a class="to-supply"
                                               href="javascript:;" target="_self">
                                                <i title="点赞">
                                                </i>
                                                <span class="num">
                                                1
                                            </span>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                        </div>
                                    </div>
                                    <div class="append-comm">
                                    <textarea name="" cols="30" rows="10" class="area on-focus" placeholder="写下您的评论吧">
                                    </textarea>
                                        <div class="ctrl-con">
                                        <span class="msg success-msg">
                                            恭喜，评论发布成功
                                        </span>
                                            <span class="msg error-msg">
                                        </span>
                                            <a href="javascript:;" target="_self"
                                               class="submit-btn">
                                                发布
                                            </a>
                                        </div>
                                        <div class="s-comm-lists">
                                        </div>
                                        <div class="comment-tip">
                                            只展示最新5条评论
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="show-list fore1">
                        <ul>
                            <li class="show-item" id="show-item-14700607296436395984">
                                <div class="s-author">
                                    <dl>
                                        <dt class="u-pic">
                                            <img width="50" height="50" alt="用户头像" src="//wx.qlogo.cn/mmopen/ajNVdqHZLLDlKF8TibYMD1RFsItFIPGY0EicxhbgOYvhJcibJHGWRdNsEHuH4qfhqux5e5wicpqS7toAgeiajD808WA/0">
                                        <div class="mask">
                                        </div>
                                        </dt>
                                        <dd class="txt-1">
                                            芳华落尽
                                        </dd>
                                        <dd class="txt-2">
                                            来自微信精选
                                        </dd>
                                    </dl>
                                    <p class="s-detail">
                                        #晒最美自拍赢vivoX9#我的拍照小窍门是：无论是用手机还是相机拍照，一次多拍几张都是更加保险的选择，因为如果有什么意外发生——比如有谁眨眼了，或者拍糊了——你还能有备选的图片可用。哈哈哈不信你试试。总有你喜欢的
                                    </p>
                                </div>
                                <div class="s-imgs" style="visibility: visible;">
                                    <ul data-ul-shareid="ul-14700607296436395984" class="already-attached"
                                        style="width: 1596px; height: 304px; line-height: 304px; left: -683.994px;">
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3262/226/5405522558/177238/982c1330/586f9567N6ce59b70.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t4117/43/1295069246/116397/3e9e5016/586f9567N8ad00dc1.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3178/270/5428396019/126774/1d85545c/586f9567Nbef402c2.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3151/263/5559879102/157517/dd4a0f48/586f9567N1802d4a1.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3853/253/1217895764/138067/667a5c11/586f9567Necaf6f5a.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3094/318/5484559999/151513/9e12ee9d/586f9566Na99f6aa6.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3847/305/2958933948/132560/f3fc8782/586f9567Nb0ed934a.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                    </ul>
                                    <span class="to-prev">
                                    &lt;
                                </span>
                                    <span class="to-next">
                                    &gt;
                                </span>
                                    <div class="num-pannel">
                                    <span>
                                        <i class="current-img-num">
                                            4
                                        </i>
                                        /7
                                    </span>
                                    </div>
                                </div>
                                <dl class="s-goods">
                                    <dt class="p-pic">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <img src="//img10.360buyimg.com/n2/jfs/t3685/222/1924500541/583595/6dc7aed9/5836668eN8b2a9cc4.png"
                                                 width="50" height="50" alt="">
                                        </a>
                                    </dt>
                                    <dd>
                                        <a class="p-tit" href="{{url('center/home')}}"
                                           target="_blank">
                                            vivo X9 全网通 4GB+64GB 移动联通电信4G手机 双卡双待 金色
                                        </a>
                                        <br>
                                        <strong>
                                            <em>
                                                ￥
                                            </em>
                                            <i class="J_10941037480">
                                                2798.00
                                            </i>
                                        </strong>
                                    </dd>
                                </dl>
                                <div class="s-comment">
                                    <div class="s-toolbar">
                                        <div class="s-t-1">
                                            <a class="to-comment"
                                               href="javascript:;" target="_self">
                                                <i title="评论">
                                                </i>
                                                <span class="num">
                                                0
                                            </span>
                                            </a>
                                        </div>
                                        <div class="s-t-2">
                                            <a class="to-supply"
                                               href="javascript:;" target="_self">
                                                <i title="点赞">
                                                </i>
                                                <span class="num">
                                                0
                                            </span>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                        </div>
                                    </div>
                                    <div class="append-comm">
                                    <textarea name="" cols="30" rows="10" class="area on-focus" placeholder="写下您的评论吧">
                                    </textarea>
                                        <div class="ctrl-con">
                                        <span class="msg success-msg">
                                            恭喜，评论发布成功
                                        </span>
                                            <span class="msg error-msg">
                                        </span>
                                            <a href="javascript:;" target="_self"
                                               class="submit-btn">
                                                发布
                                            </a>
                                        </div>
                                        <div class="s-comm-lists">
                                        </div>
                                        <div class="comment-tip">
                                            只展示最新5条评论
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="show-item" id="show-item-15374370277408957629">
                                <div class="s-author">
                                    <dl>
                                        <dt class="u-pic">
                                            <img width="50" height="50" alt="用户头像" src="//img10.360buyimg.com/promotepic/s608x608_jfs/t3241/220/5438735867/159659/d8c50cda/58704981Na79117c0.jpg">
                                        <div class="mask">
                                        </div>
                                        </dt>
                                        <dd class="txt-1">
                                            JD闫玮
                                        </dd>
                                        <dd class="txt-2">
                                            来自微信精选
                                        </dd>
                                    </dl>
                                    <p class="s-detail">
                                        今选精准电子厨房秤&amp;&amp;&amp;这款厨房秤，小小的，外观漂亮做工精美，挂孔设计方便收纳，操作面板防尘防水易清洗。最大称重5kg，最小称重1g，四种测量单位一键切换，计数，去皮功能也非常的实用，测量称重误差可以无视，完美胜任日常所需。做烘培必备神器推荐给大家！
                                    </p>
                                </div>
                                <div class="s-imgs" style="visibility: visible;">
                                    <ul data-ul-shareid="ul-15374370277408957629" class="already-attached"
                                        style="width: 1824px; height: 228px; line-height: 228px;">
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3289/212/5423962849/1823148/625b83f5/586e3547N53217f85.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3277/216/5426473212/1912351/9d7d242c/586e3547Na35c371e.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3847/150/2914098233/1400379/286f6a6a/586e3547N81c889ab.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3235/188/5491262240/1893054/2efd0475/586e3547Naa0a8ec2.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3907/29/1247316388/2023706/fa332451/586e3548Nd8a643a9.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t4069/182/1215437844/1829513/cfa7dbe2/586e3547N338a5ca8.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3268/112/5325394169/1852279/fd2e3bd7/586e3547Nf1185214.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img10.360buyimg.com/shaidan/s220x800_jfs/t3058/62/5417173540/1843229/3898f67a/586e3548Nfbf2fe0e.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                    </ul>
                                    <span class="to-prev">
                                                    &lt;
                                                </span>
                                    <span class="to-next">
                                                    &gt;
                                                </span>
                                    <div class="num-pannel">
                                                    <span>
                                                        <i class="current-img-num">
                                                            1
                                                        </i>
                                                        /8
                                                    </span>
                                    </div>
                                </div>
                                <dl class="s-goods">
                                    <dt class="p-pic">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <img src="//img10.360buyimg.com/n2/jfs/t3943/13/347242809/169713/6e34279a/584a9b8dN26e3263b.jpg"
                                                 width="50" height="50" alt="">
                                        </a>
                                    </dt>
                                    <dd>
                                        <a class="p-tit" href="{{url('center/home')}}"
                                           target="_blank">
                                            今选 电子厨房称烘焙秤台秤1g高精度0.1g中药秤 茶叶 克称 5kg/1g中文无背光
                                        </a>
                                        <br>
                                        <strong>
                                            <em>
                                                ￥
                                            </em>
                                            <i class="J_11104334335">
                                                35.00
                                            </i>
                                        </strong>
                                    </dd>
                                </dl>
                                <dl class="s-goods">
                                    <dt class="p-pic">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <img src="//img10.360buyimg.com/n2/jfs/t3340/249/452751820/53069/ae372f99/580a4683N6fabade1.jpg"
                                                 width="50" height="50" alt="">
                                        </a>
                                    </dt>
                                    <dd>
                                        <a class="p-tit" href="{{url('center/home')}}"
                                           target="_blank">
                                            今选 精准电子厨房秤 烘焙称 天平秤 中药茶叶秤 5公斤/1克不背光
                                        </a>
                                        <br>
                                        <strong>
                                            <em>
                                                ￥
                                            </em>
                                            <i class="J_10848232398">
                                                20.00
                                            </i>
                                        </strong>
                                    </dd>
                                </dl>
                                <dl class="s-goods">
                                    <dt class="p-pic">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <img src="//img10.360buyimg.com/n2/jfs/t3337/56/492801491/65437/fd2b3ef6/580aeae9N0a0a68ee.jpg"
                                                 width="50" height="50" alt="">
                                        </a>
                                    </dt>
                                    <dd>
                                        <a class="p-tit" href="{{url('center/home')}}"
                                           target="_blank">
                                            今选 电子便携秤手提称 快递秤 50kg厨房挂秤 液晶
                                        </a>
                                        <br>
                                        <strong>
                                            <em>
                                                ￥
                                            </em>
                                            <i class="J_10849761167">
                                                26.00
                                            </i>
                                        </strong>
                                    </dd>
                                </dl>
                                <dl class="s-goods">
                                    <dt class="p-pic">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <img src="//img10.360buyimg.com/n2/jfs/t3913/228/621592662/152126/56aed1d3/5857d5f6N2e363769.jpg"
                                                 width="50" height="50" alt="">
                                        </a>
                                    </dt>
                                    <dd>
                                        <a class="p-tit" href="{{url('center/home')}}"
                                           target="_blank">
                                            今选 电子秤高精度珠宝秤0.01/0.1g 天平便携秤 口袋秤 克称 500g/0.1g英文 液晶
                                        </a>
                                        <br>
                                        <strong>
                                            <em>
                                                ￥
                                            </em>
                                            <i class="J_11152723758">
                                                36.00
                                            </i>
                                        </strong>
                                    </dd>
                                </dl>
                                <dl class="s-goods">
                                    <dt class="p-pic">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <img src="//img10.360buyimg.com/n2/jfs/t3346/15/2148221597/123556/e3cee241/5846b1baN970d842e.jpg"
                                                 width="50" height="50" alt="">
                                        </a>
                                    </dt>
                                    <dd>
                                        <a class="p-tit" href="{{url('center/home')}}"
                                           target="_blank">
                                            今选 高精度电子厨房秤0.01 珠宝秤 克秤0.1g烘焙称台秤茶叶秤 英文1千克/0.1克 液晶
                                        </a>
                                        <br>
                                        <strong>
                                            <em>
                                                ￥
                                            </em>
                                            <i class="J_10848125631">
                                                36.00
                                            </i>
                                        </strong>
                                    </dd>
                                </dl>
                                <div class="s-comment">
                                    <div class="s-toolbar">
                                        <div class="s-t-1">
                                            <a class="to-comment" href="javascript:;" target="_self">
                                                <i title="评论">
                                                </i>
                                                <span class="num">
                                                                0
                                                            </span>
                                            </a>
                                        </div>
                                        <div class="s-t-2">
                                            <a class="to-supply" href="javascript:;" target="_self">
                                                <i title="点赞">
                                                </i>
                                                <span class="num">
                                                                1
                                                            </span>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                        </div>
                                    </div>
                                    <div class="append-comm">
                                                    <textarea name="" cols="30" rows="10" class="area on-focus" placeholder="写下您的评论吧">
                                                    </textarea>
                                        <div class="ctrl-con">
                                                        <span class="msg success-msg">
                                                            恭喜，评论发布成功
                                                        </span>
                                            <span class="msg error-msg">
                                                        </span>
                                            <a href="javascript:;" target="_self" class="submit-btn">
                                                发布
                                            </a>
                                        </div>
                                        <div class="s-comm-lists">
                                        </div>
                                        <div class="comment-tip">
                                            只展示最新5条评论
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="show-list fore2">
                        <ul>
                            <li class="show-item" id="show-item-16246996859067136729">
                                <div class="s-author">
                                    <dl>
                                        <dt class="u-pic">
                                            <img width="50" height="50" alt="用户头像" src="//img10.360buyimg.com/promotepic/s465x465_jfs/t3472/136/1329290005/52048/27c33fb7/58244971N8175623e.jpg">
                                        <div class="mask">
                                        </div>
                                        </dt>
                                        <dd class="txt-1">
                                            一只蟹
                                        </dd>
                                        <dd class="txt-2">
                                            来自微信精选
                                        </dd>
                                    </dl>
                                    <p class="s-detail">
                                        魅族EP-31耳机&amp;&amp;&amp;刚拿到时很有分量感，无论做工还是包装都很精致，耳机、线控和接口处都进行了高光倒角处理，金属质感很强，线控处的按键反馈也不错。耳机一共配有三副耳塞，分为大中小，可以满足不用耳朵大小的需求。音质方面还是可以的，毕竟魅族是MP3起家的，但并没有给我太大的惊喜，只能算中规中矩吧，个人感觉低音倒是不错。
                                    </p>
                                </div>
                                <div class="s-imgs" style="visibility: visible;">
                                    <ul class="already-attached"
                                        style="width: 1140px; height: 228px; line-height: 228px;">
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img12.360buyimg.com/shaidan/s220x800_jfs/t3175/339/5437976851/215247/5eb7cac/586e5a17Ned3770e4.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img12.360buyimg.com/shaidan/s220x800_jfs/t3226/285/5401411133/224860/4ad920ba/586e5a16Nc6768af6.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img12.360buyimg.com/shaidan/s220x800_jfs/t3139/140/5403185083/223958/b159a758/586e5a16N45273439.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img12.360buyimg.com/shaidan/s220x800_jfs/t3307/123/5410751393/243824/c4885cfa/586e5a16Na2c9e0b2.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('center/home')}}" target="_blank">
                                                <img width="228" src="//img12.360buyimg.com/shaidan/s220x800_jfs/t3862/148/1132747384/210753/5b84548b/586e5a17N32e98265.jpg"
                                                     data-img="1">
                                            </a>
                                        </li>
                                    </ul>
                                    <span class="to-prev">
                                                    &lt;
                                                </span>
                                    <span class="to-next">
                                                    &gt;
                                                </span>
                                    <div class="num-pannel">
                                                    <span>
                                                        <i class="current-img-num">
                                                            1
                                                        </i>
                                                        /5
                                                    </span>
                                    </div>
                                </div>
                                <dl class="s-goods">
                                    <dt class="p-pic">
                                        <a href="{{url('center/home')}}" target="_blank">
                                            <img src="//img12.360buyimg.com/N2/jfs/t2119/159/1632656705/120465/65daff13/56664496N3df52784.jpg"
                                                 width="50" height="50" alt="">
                                        </a>
                                    </dt>
                                    <dd>
                                        <a class="p-tit" href="{{url('center/home')}}"
                                           target="_blank">
                                            魅族（MEIZU）EP-31 入耳式耳机 银色
                                        </a>
                                        <br>
                                        <strong>
                                            <em>
                                                ￥
                                            </em>
                                            <i class="J_2201267">
                                                199.00
                                            </i>
                                        </strong>
                                    </dd>
                                </dl>
                                <div class="s-comment">
                                    <div class="s-toolbar">
                                        <div class="s-t-1">
                                            <a class="to-comment" href="javascript:;" target="_self">
                                                <i title="评论">
                                                </i>
                                                <span class="num">
                                                                0
                                                            </span>
                                            </a>
                                        </div>
                                        <div class="s-t-2">
                                            <a class="to-supply" href="javascript:;" target="_self">
                                                <i title="点赞">
                                                </i>
                                                <span class="num">
                                                                0
                                                            </span>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                        </div>
                                    </div>
                                    <div class="append-comm">
                                                    <textarea name="" cols="30" rows="10" class="area on-focus" placeholder="写下您的评论吧">
                                                    </textarea>
                                        <div class="ctrl-con">
                                                        <span class="msg success-msg">
                                                            恭喜，评论发布成功
                                                        </span>
                                            <span class="msg error-msg"> </span>
                                            <a href="javascript:;" target="_self" class="submit-btn">
                                                发布
                                            </a>
                                        </div>
                                        <div class="s-comm-lists">
                                        </div>
                                        <div class="comment-tip">
                                            只展示最新5条评论
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mod-main" id="show">
            <div class="show-tab">
                <ul>
                    <li class="curr weixinSwitcher">
                        微信精选
                    </li>
                    <li class="jdSwitcher">
                        京东推荐
                    </li>
                </ul>
            </div>
            <div class="mt">
                <h3>
                    晒单推荐
                </h3>
                <div class="extra-r">
                    <a href="{{url('center/home')}}" target="_blank" class="show-btn">
                        我也要晒单
                    </a>
                </div>
            </div>
            <div class="mc">
                <div class="show-cont">
                    <div class="show-list fore0">
                        <ul></ul>
                    </div>
                    <div class="show-list fore1">
                        <ul></ul>
                    </div>
                    <div class="show-list fore2">
                        <ul></ul>
                    </div>
                </div>
                <div class="loading-more">
                    <a href="{{url('center/home')}}" target="_blank">
                        去晒单
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="da-main"></div>
</div>
@stop

@section('js')
@stop