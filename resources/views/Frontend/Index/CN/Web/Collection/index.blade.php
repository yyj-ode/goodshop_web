@extends('Frontend.Index.CN.Web.Layout.common_collection')

@section('seo')
    @include('Frontend.Index.CN.Web.Layout.seo')
@stop

@section('reminder')
    {{--订阅--}}
    @include('Frontend.Index.CN.Web.Layout.reminder')
@stop

@section('header')
    @include('Frontend.Index.CN.Web.Layout.header')
@stop

@section('banner')
    {{--<!--**************************************banner**************************************-->--}}
    <div class="mine">
        <div class="my"><a href="{{url('')}}">我的 > </a><i>我的收藏</i></div>
    </div>
@stop

@section('content')
    {{--<!--**************************************内容**************************************-->--}}
    <div class="coll_con">
        <div class="coll_concon">
            <ul>
                <div class="quxiao none">已取消收藏</div>
                @foreach($data as $key => $value)
                    <li>
                        <div class="pic"><a href="{{url('detail/index')}}?id={{$value['id']}}"><img src="{{asset(strExplode($value['our_image']))}}" alt=""></a></div>
                        <div class="pic_right">
                            <div class="rit_top">
                                <h4>区域类型：<i>暂无数据</i></h4>
                                <div class="keliu">
                                    <span>客流:<i>暂无</i></span>
                                    <span class="aa">{{$value['business_type']}}</span>
                                    <em class="aa">{{$value['total_area']}}㎡</em>
                                </div>
                                <div class="jiage"><i>{{intval($value['rent'])}}</i>元/月</div>
                            </div>
                            <div class="rit_bom">
                                <div class="bom_left">
                                    <div class="diqu">
                                        <i></i>
                                        <em>{{$value['city']}}-{{$value['county']}}</em>
                                        <span>写字楼{{$value['officebuilding_num']}}</span>
                                        <span>小区{{$value['village_num']}}</span>
                                        <span>商铺{{$value['shopsurrounding_num']}}</span>
                                        <span>购物中心{{$value['shoppingcenter_num']}}</span>
                                    </div>
                                    <p>收藏于<em>{{timeShow($value['updated_at'])}}</em></p>
                                </div>
                                <div class="bom_right">
                                    <p id="{{$value['id']}}"><i></i>取消收藏</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="page">
               {{-- <a href="http://web.nndeal.app/collection/index?page={{$last_page}}"><div></div></a>--}}
                <a href="{{url('collection/index')}}?page={{$last_page}}"><div></div></a>
                @foreach($pages_show as $v)
                    @if($v == '...')
                        <div>{{$v}}</div>
                    @else
                        <div><a href="{{url('collection/index')}}?page={{$v}}" style="<?php if($v==$current_page) echo 'background-color:#888';?>">{{$v}}</a></div>
                    @endif
                @endforeach
                <a href="{{url('collection/index')}}?page={{$next_page}}"><div></div></a>
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
    <script src="{{asset('assets/frontend/index/web/js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/frontend/index/web/layui.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/tongji.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/frontend/index/web/js/jquery.js')}}"></script>
    <script src="{{asset('assets/frontend/index/web/js/index.js')}}"></script>
    <script type="text/javascript">

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

        {{-- 登录 --}}
        $('#userLogin').on('click',function () {
            $.ajax({
                type: 'POST',
                url: '{{url("user/ajax")}}',
                data: {type:1,'sms_code':$("#sms_code").val(),'mobile':$('#mobile_data').val()},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    if(data.status == 200){
//                    layui.use('layer', function(){
//                        var layer = layui.layer;
//                        layer.msg(data.message);
//                    });

                        $(".mask").addClass("none");
                        $(".mymy").removeClass("none");

                        $('#user_login').css('display','none');
                        $('#user_center').css('display','block');

                    }else{
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg(data.message);
                        });
                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }
            });
        });

        {{-- 退出 --}}
        $('#userLogout').on('click',function () {
            $.ajax({
                type: 'GET',
                url: '{{url("user/ajaxLogout")}}',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    if(data.status == 200){
                        $(".mymy").addClass("none");
                        $("._user").removeClass("none");
                        layui.use('layer', function(){
                            var layer = layui.layer;
                            layer.msg("登录成功退出！");
                            location.reload();
                        });
                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }
            });
        });

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


        // 点击用户弹出登录页面
        $(".head").on("click","._user",function(){
            $(".mask").removeClass("none");
        });

        // 点击取消收藏
        $('div.rit_bom > div.bom_right > p').on('click',function(){
            var detail_id = $(this).attr('id');
            var detail_element = $(this);
//            alert(detail_id);
            $.ajax({
                type:'GET',
                url:'{{url('collection/delete')}}',
                dataType: 'json',
                data:{'id':detail_id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    alert(data);
                    if(data == '收藏成功'){
                        detail_element.html('<i></i> 取消收藏');
                    }else{
                        detail_element.html('<i></i> 收藏');
                    }
                },
                error:function(){
                    alert('请求失败');
                }
            });
        });
    </script>

@stop