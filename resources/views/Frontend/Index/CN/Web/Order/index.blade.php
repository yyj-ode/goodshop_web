@extends('Frontend.Index.CN.Web.Layout.common_collection')

@section('seo')
    @include('Frontend.Index.CN.Web.Layout.seo')
@stop

@section('reminder')
    {{--订阅登录--}}
    @include('Frontend.Index.CN.Web.Layout.reminder')
@stop

@section('header')
    @include('Frontend.Index.CN.Web.Layout.header')
@stop

@section('banner')
    {{--<!--**************************************banner**************************************-->--}}
    <div class="mine">
        <div class="my">我的 > <i>我的订单</i></div>
    </div>
@stop

@section('content')
    {{--<!--**************************************内容**************************************-->--}}
    <div class="coll_con">
        <div class="coll_concon">
            <ul>
                <div class="quxiao none">已取消收藏</div>
                @foreach($data as $k=>$v)
                <li>
                   <div class="pic"><a href="{{url('detail/index')}}?id={{$v['id']}}"><img src="{{asset(strExplode($v['our_image']))}}" alt=""></a></div>
                    <div class="pic_right">
                        <div class="rit_top">
                            <h4>区域类型：<i>正在评估中</i></h4>
                            <div class="keliu">
                                <span>客流:<i>评估中</i></span>
                                <span class="aa">{{$v['business_type']}}</span>
                                <em class="aa">{{$v['total_area']}}㎡</em>
                            </div>
                            <div class="jiage"><i>{{$v['rent']}}</i>元/月</div>
                        </div>
                        <div class="rit_bom">
                            <div class="bom_left">
                                <div class="diqu">
                                    <i></i>
                                    <em>{{$v['city']}}-{{$v['county']}}</em>
                                    <span>写字楼{{$v['officebuilding_num']}}</span>
                                    <span>小区{{$v['village_num']}}</span>
                                    <span>商铺{{$v['shopsurrounding_num']}}</span>
                                    <span>购物中心{{$v['shoppingcenter_num']}}</span>
                                </div>
                                <p>申请于<em>{{timeShow($v['created_at'])}}</em></p>
                            </div>
                            <div class="bom_right">
                                <p class="different">{{$v['order_status']}}</p>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="page">
                <a href="{{url('order/index')}}?page={{$last_page}}"><div></div></a>
                @foreach($pages_show as $v)
                    @if($v == '...')
                        <div>{{$v}}</div>
                    @else
                        <div><a href="{{url('order/index')}}?page={{$v}}" style="<?php if($v==$current_page) echo 'background-color:#888';?>">{{$v}}</a></div>
                    @endif
                @endforeach
                <a href="{{url('order/index')}}?page={{$next_page}}"><div></div></a>
            </div>
        </div>

    </div>
    <div class="return">
        <!--<a href="###"><div class="top"></div></a>-->
        <div class="server_phone none">客服电话<br>010-58220156</div>
        <a href="###"><div class="phone"></div></a>
    </div>
@stop


@section('javascript')
    <script src="{{asset('assets/frontend/index/web/js/index.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/frontend/index/web/js/jquery.js')}}"></script>
    <script src="{{asset('assets/frontend/index/web/js/index.js')}}"></script>
@stop