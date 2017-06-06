@extends('Frontend.Index.CN.Web.Layout.common')

@section('seo')
    @include('Frontend.Index.CN.Web.Layout.seo')
@stop

@section('reminder')
    <!--登录-->
    @include('Frontend.Index.CN.Web.Layout.reminder')
@stop

@section('header')
    @include('Frontend.Index.CN.Web.Layout.header')
@stop

@section('banner')
{{--<!--**************************************banner**************************************-->--}}
    <div class="banner">
        <div class="banner_con">
            <div class="text">
                <h4>全网铺源</h4>
                <p>大数据捕获全网真实有效店址</p>
            </div>
            <div class="search">
                <form action="{{url('/')}}" id="search_form">
                    <input id="shop_area" name="shop_area" value="" type="hidden">
                    <input id="shop_type" name="business_type" value="0" type="hidden">
                    <input id="min_area" name="min_area" value="0" type="hidden">
                    <input id="max_area" name="max_area" value="99999999" type="hidden">
                    <input id="min_rent" name="min_rent" value="0" type="hidden">
                    <input id="max_rent" name="max_rent" value="9999999" type="hidden">

                    <input id="management" name="management" value="9999999" type="hidden">
                    <div class="search_key">
                        <input type="text" placeholder="输入关键字" name="key" id="search_content">
                        {{--<a href="###"><span id="search_key" onclick="document.getElementById('search_form').submit();"></span></a>--}}
                        <a href="###"><span id="search_key"></span></a>
                    </div>
                    <div class="line">
                        <div class="lineOne"></div>
                        <div class="find">输入条件找铺</div>
                        <div class="lineTwo"></div>
                    </div>
                    <div class="select">
                        <div class="domain">
                            <div class="shop_choice2">
                                <i bd="" id="check_area">开店区域</i>
                                <span></span>
                            </div>
                            <div class="first none">
                                <div class="erji2 none"></div>
                                <ul class="all2">
                                    <li>全部
                                        <ul>
                                            <li>全部</li>
                                        </ul>
                                    </li>
                                    @foreach($area_level['area_level2'] as $k2 => $v2)
                                        <li>{{$v2['name']}}
                                            <ul>
                                                @foreach($area_level['area_level3'] as $k3 =>$v3)
                                                    @if($k2 == $k3)
                                                        @foreach($v3 as $k4 => $v4)
                                                            <li value="{{$v4['id']}}">{{$v4['name']}}</li>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="type">
                            <div class="yb_shop">
                                <i bd="" id="check_type">商铺类型</i>
                                <span></span>
                            </div>
                            <div class="second none">
                                <ul>
                                    @foreach($format as $value)
                                        <li value="{{$value['id']}}">{{$value['name']}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="area type">
                            <div class="yb_shop">
                                <i bd="" id="check_mj">经营面积</i>
                                <span></span>
                            </div>
                            <div class="third none second">
                                <ul>
                                    <li min="0" max="99999999">不限</li>
                                    @foreach($totalarea as $value)
                                        <li min="{{$value['min_area']}}" max="{{$value['max_area']}}">{{$value['value']}}㎡</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="budget type">
                            <div class="yb_shop">
                                <i bd="" id="check_rent">开店预算</i>
                                <span></span>
                            </div>
                            <div class="forth none second">
                                <ul>
                                    <li min="0" max="99999999">不限</li>
                                    @foreach($price as $v)
                                        <li min="{{$v['price_min']}}" max="{{$v['price_max']}}">{{$v['value']}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="choice" id="choice"><a href="###">开始选铺</a></div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('content')
    {{--<!--**************************************内容**************************************-->--}}
    <div class="content">
        <div class="show">店址推荐
            <div class="alert none">
              已为您从&nbsp;<span id="count">33567256</span>&nbsp;个店址中筛选出&nbsp;<i id="map_count">36896</i>&nbsp;个有效地址
            </div>
        </div>

        <div class="pic_show">
            <!--***********组一***********-->
            {{--<div class="pic_list mar_right">
                <a href="###">
                    <dl>
                        <dt>
                            <img src="{{asset('assets/frontend/index/web/images/shop.png')}}" alt="">
                        <div class="tip"><span>客流：68980</span></div>
                        <h5>样本</h5>
                        </dt>
                        <dd>
                            <div class="shop_mess">
                                <span class="shop_area">100㎡</span>
                                <span class="shop_style">商业街铺</span>
                            </div>
                            <div class="shop_money">
                                <span class="shop_mon_money">80000</span>元/月
                                <span class="shop_forother">转让费：<i>5</i>万元</span>
                            </div>
                            <div class="shop_addr"><span></span>海淀区紫竹桥国际财经中心B座底商</div>
                            <div class="shop_around">
                                <span class="shop_around_one near">学校3</span>
                                <span class="shop_around_two near">医院2</span>
                                <span class="shop_around_three near">写字楼2</span>
                            </div>
                            <div class="shop_news">更新于<i>1</i>小时前</div>
                        </dd>
                    </dl>
                </a>
            </div>--}}
            @foreach($data as $key => $value)
                <div class="pic_list mar_right">
                    <a href="{{url('detail/index').'?id='.$value['id']}}">
                        <dl>
                            <dt>
                              {{--  <img src="{{strExplode($value->photo)}}" alt="">--}}
                                <img src="{{asset(strExplode($value['our_image']))}}" alt="">
                            <div class="tip"><span>客流：暂无</span></div>
                            </dt>
                            <dd>
                                <div class="shop_mess">
                                    <span class="shop_area">{{$value['total_area']}}㎡</span>
                                    <span class="shop_style">{{$value['business_type']}}</span>
                                </div>
                                <div class="shop_money">
                                    <span class="shop_mon_money">{{$value['rent']}}</span>元/月
                                    <span class="shop_forother">转让费：<i>{{$value['leasing_payment']}}</i></span>
                                </div>
                                <div class="shop_addr"><span></span>{{$value['location']}}</div>
                                <div class="shop_around">
                                    <span class=" near">写字楼{{$value['officebuilding_num']}}</span>
                                    <span class=" near">小区{{$value['village_num']}}</span>
                                    <span class=" near">商铺{{$value['shopsurrounding_num']}}</span>
                                    <span class=" near">购物中心{{$value['shoppingcenter_num']}}</span>
                                </div>
                                <div class="shop_news">
                                    {{timeShow($value['updated_at'])}}
                                </div>
                            </dd>
                        </dl>
                    </a>
                </div>
            @endforeach
        </div>
        <input type="hidden" id="start" name="start" value="0">
        <div class="more" id="more"><a href="###">点击查看更多</a></div>

    </div>
    <!--首页筛选-->
    {{--<div class="filter">
        <div class="filter_content">
            <p>选择你的经营类型
                <span></span>
            </p>
            <div class="filter_con">
                <i val="type_restaurant_catering">酒楼餐饮</i>
                <i val="type_shoes_bag">服饰鞋包</i>
                <i val="type_beauty_salon">美容美发</i>
                <i val="type_recreation">休闲娱乐</i>
                <i val="type_life_service">生活服务</i>
                <i val="type_store">百货超市</i>
                <i val="type_materials">家居建材</i>
                <i val="type_communication">电气通讯</i>
                <i val="type_auto">汽修美容</i>
                <i val="type_medical_care">医药保健</i>
                <i val="type_training">教育培训</i>
                <i val="type_am_turm">旅游宾馆</i>
                <i val="type_formats">其他业态</i>
            </div>
        </div>
    </div>--}}
    <div class="return none">
        <a href="###"><div class="top"></div></a>
        <div class="server_phone none">客服电话<br>010-58220156</div>
        <a href="###"><div class="phone"></div></a>
    </div>
@stop

@section('javascript')
    <script src="{{asset('assets/frontend/index/web/js/index.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        // ----------------------------首页的货--------------------------
        //最开始的蒙层
        $("body").on("click",".filter_content>p>span",function(){
            $(".filter").addClass("none");
        });
        $("body").on("click",".filter_con>i",function(){
            $(".filter").addClass("none");
            //打开页面3秒后弹窗消失
            var management = $(this).attr('val');
            $('#management').attr('value',management);
            //经营业态
            $.ajax({
                type: 'POST',
                url: '{{url("index/management_search")}}',
                data:{'management':management},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    //搜索数据结果显示
                    $('#count').html(data['count']);
                    $('#map_count').html(data['map_count']);
                    $(".content .show .alert").removeClass("none");
                    //打开页面3秒后弹窗消失
                    setTimeout(function () {
                        $(".content .show .alert").addClass("none");
                    },3000);
                    if(data['static'] == 200){
                        var start = $('#start').val();
                        var start = parseInt(start) + 6;
                        $('#start').attr('value',start);
                        var html = '';
                        $.each(data['content'], function(k, v){
                            html += '<div class="pic_list mar_right"><a href="{{url('detail/index')}}?id='+v['id']+'"><dl><dt><img src="'+v.our_image+'" alt="">';
                            html += '<div class="tip"><span>客流：暂无</span></div> <!--<h5>暂无数据</h5>--> </dt> <dd><div class="shop_mess">';
                            html += '<span class="shop_area">'+v.total_area+'㎡</span> <span class="shop_style">'+v.business_type+'</span> </div> <div class="shop_money">';
                            html += '<span class="shop_mon_money">'+v.rent+'</span>元/月 <span class="shop_forother">转让费：<i>'+v.leasing_payment+'</i></span>';
                            html += '</div> <div class="shop_addr"><span></span>'+v.location+'</div> <div class="shop_around">';
                            html += '<span class="shop_around_one near">写字楼'+v.officebuilding_num+'</span> <span class="shop_around_two near">小区'+v.village_num+'</span><span class="shop_around_two near">商铺'+v.shopsurrounding_num+'</span><span class="shop_around_two near">购物中心'+v.shoppingcenter_num+'</span> ';
                            html += '</div> <div class="shop_news">'+v.updated_at+'</div> </dd> </dl> </a> </div>';
                        });
                        $('.pic_show').html(html);
                    }else{
                         $('#more').addClass("none");
                        $('.pic_show').html('');
                    }
                },
                error: function(xhr, type){
                }
            });

        });
//banner选择部分
        $(".shop_choice2").click(function () {
            $(this).parent().find(".first,.all2").removeClass("none");
        });
        $(".domain .all2 li").mouseenter(function(e){
            $(".domain .erji2").removeClass("none");
            $(".domain .erji2").html($(this).find("ul").html());
        });
        $(".domain").on("click",".erji2 li",function(){
            $(".first").addClass("none");
            $(".erji2,.all2").addClass("none");
            $(".shop_choice2 i").html($(this).html());
        });

        $(".yb_shop").click(function () {
            $(".select .second").addClass("none");
            $(this).parent().find(".second").removeClass("none");
        });
        $(".second ul li").click(function () {
            $(this).parent().parent().parent().find(".yb_shop").find("i").html($(this).html());
            $(this).parent().parent().addClass("none");
        });
//        //鼠标移出

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


        {{-- 点击 输入关键字 搜索 --}}
           $('#search_key').on('click',function(){
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg('正在查询中...');
            });
            //搜索条件
            var key = $('#search_content').val();
            $.ajax({
                type: 'POST',
                url: '{{url("index/searchkey")}}',
                data:{'key':key},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    if(data.static == 200){
                        var start = $('#start').val();
                        var start = parseInt(start) + 6;
                        $('#start').attr('value',start);
                        var html = '';
                        $.each(data['content'][1], function(k, v){
                            html += '<div class="pic_list mar_right"><a href="{{url('detail/index')}}?id='+v['id']+'"><dl><dt><img src="'+v.our_image+'" alt="">';
                            html += '<div class="tip"><span>客流：暂无</span></div><!-- <h5>暂无数据</h5>--> </dt> <dd><div class="shop_mess">';
                            html += '<span class="shop_area">'+v.total_area+'㎡</span> <span class="shop_style">'+v.business_type+'</span> </div> <div class="shop_money">';
                            html += '<span class="shop_mon_money">'+v.rent+'</span>元/月 <span class="shop_forother">转让费：<i>'+v.leasing_payment+'</i></span>';
                            html += '</div> <div class="shop_addr"><span></span>'+v.location+'</div> <div class="shop_around">';
                            html += '<span class="shop_around_one near">写字楼'+v.officebuilding_num+'</span> <span class="shop_around_two near">小区'+v.village_num+'</span> <span class="shop_around_two near">商铺'+v.shopsurrounding_num+'</span> <span class="shop_around_two near">购物中心'+v.shoppingcenter_num+'</span> ';
                            html += '</div> <div class="shop_news">'+v.updated_at+'</div> </dd> </dl> </a> </div>';
                        });
                        $('#search_content').attr('value',data['content'][2]);
                        $('.pic_show').html(html);
                    }else{
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg(data.error);
                        });
                        $('#more').addClass("none");
                    }
                    //搜索数据结果显示
                    $('#count').html(data['content']['count']);
                    $('#map_count').html(data['content']['map_count']);
                    $(".content .show .alert").removeClass("none");
                    //打开页面3秒后弹窗消失
                    setTimeout(function () {
                        $(".content .show .alert").addClass("none");
                    },3000);
                },
                error: function(xhr, type){
                }
            });

        });

        {{-- 输入条件找铺 --}}

        $('#choice').click(function(){
            //搜索条件
            var shop_area = $('#shop_area').val();
            var business_type = $('#shop_type').val();
            var min_area = $('#min_area').val();
            var max_area = $('#max_area').val();
            var min_rent = $('#min_rent').val();
            var max_rent = $('#max_rent').val();

            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg('正在查询中...');
            });

            $.ajax({
                type: 'POST',
                url: '{{url("index/shop_search")}}',
                data:{'length':12,'shop_area':shop_area,'business_type':business_type,'min_area':min_area,'max_area':max_area,'min_rent':min_rent,'max_rent':max_rent},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){

                    if(data['status'] == 200){
                        var start = $('#start').val();
                        var start = parseInt(start) + 6;
                        $('#start').attr('value',start);
                        var html = '';
                        $.each(data['content'], function(k, v){
                            html += '<div class="pic_list mar_right"><a href="{{url('detail/index')}}?id='+v['id']+'"><dl><dt><img src="'+v.our_image+'" alt="">';
                            html += '<div class="tip"><span>客流：暂无</span></div><!-- <h5>暂无数据</h5>--> </dt> <dd><div class="shop_mess">';
                            html += '<span class="shop_area">'+v.total_area+'㎡</span> <span class="shop_style">'+v.business_type+'</span> </div> <div class="shop_money">';
                            html += '<span class="shop_mon_money">'+v.rent+'</span>元/月 <span class="shop_forother">转让费：<i>'+v.leasing_payment+'</i></span>';
                            html += '</div> <div class="shop_addr"><span></span>'+v.location+'</div> <div class="shop_around">';
                            html += '<span class="shop_around_one near">写字楼'+v.officebuilding_num+'</span> <span class="shop_around_two near">小区'+v.village_num+'</span> <span class="shop_around_two near">商铺'+v.shopsurrounding_num+'</span> <span class="shop_around_two near">购物中心'+v.shoppingcenter_num+'</span> ';
                            html += '</div> <div class="shop_news">'+v.updated_at+'</div> </dd> </dl> </a> </div>';
                        });
                        $('.pic_show').html(html);
                    }else{
                        $('#more').addClass("none");
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg(data.error);
                        });
                    }

                    //搜索数据结果显示
                    $('#count').html(data['count']);
                    $('#map_count').html(data['map_count']);
                    $(".content .show .alert").removeClass("none");
                    //打开页面3秒后弹窗消失
                    setTimeout(function () {
                        $(".content .show .alert").addClass("none");
                    },3000);
                },
                error: function(xhr, type){
                    alert('筛选失败');
                }
            });
        });

        {{-- 查看更多 --}}
        $('.more').on('click',function(){
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg('正在加载...');
            });
            var start = $('.pic_show .pic_list').length;
            var key = $('#search_content').val();
            var shop_area = $('#shop_area').val();
            var business_type = $('#shop_type').val();
            var min_area = $('#min_area').val();
            var max_area = $('#max_area').val();
            var min_rent = $('#min_rent').val();
            var max_rent = $('#max_rent').val();

            $.ajax({
                type: 'POST',
                url: '{{url("index/moredata")}}',
                data:{'start':start,'length':12,'shop_area':shop_area,'key':key,'business_type':business_type,'min_area':min_area,'max_area':max_area,'min_rent':min_rent,'max_rent':max_rent},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    if(data['status'] == 200){
                        var html = '';
                        $.each(data['content'], function(k, v){
                            html += '<div class="pic_list mar_right"><a href="{{url('detail/index')}}?id='+v['id']+'"><dl><dt><img src="'+v.our_image+'" alt="">';
                            html += '<div class="tip"><span>客流：暂无</span></div><!-- <h5>暂无数据</h5>--> </dt> <dd><div class="shop_mess">';
                            html += '<span class="shop_area">'+v.total_area+'㎡</span> <span class="shop_style">'+v.business_type+'</span> </div> <div class="shop_money">';
                            html += '<span class="shop_mon_money">'+v.rent+'</span>元/月 <span class="shop_forother">转让费：<i>'+v.leasing_payment+'</i></span>';
                            html += '</div> <div class="shop_addr"><span></span>'+v.location+'</div> <div class="shop_around">';
                            html += '<span class="shop_around_one near">写字楼'+v.officebuilding_num+'</span> <span class="shop_around_two near">小区'+v.village_num+'</span> <span class="shop_around_two near">商铺'+v.shopsurrounding_num+'</span> <span class="shop_around_two near">购物中心'+v.shoppingcenter_num+'</span> ';
                            html += '</div> <div class="shop_news">'+v.updated_at+'</div> </dd> </dl> </a> </div>';
                        });
                        $('.pic_show').append(html);

                    }else{
                        $('#more').addClass("none");
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg(data.error);
                        });
                    }
                },
                error: function(xhr, type){
                }
            });
        });

    </script>
@stop