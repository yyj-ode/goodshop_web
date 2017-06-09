{{--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <title>Title</title>
    <link rel="stylesheet" href="css/common.css" type="text/css">
    <link rel="stylesheet" href="css/collect.css" type="text/css">
    <script>
        document.querySelector("html").style.fontSize = document.documentElement.clientWidth/375*50+"px";
    </script>
</head>--}}

@include('Frontend.Index.CN.Wap.Layout.doctype')
<body>
<div class="order con">
@include('Frontend.Index.CN.Wap.Layout.header')
    <div class="headhead"></div>
    <div class="keepCon con">
        <ul class="shop_list">
            @foreach($data as $key => $value)
                <a href="{{url('detail/index')}}?id={{$value['id']}}">
                    <li class="list_detail">
                        <div class="img">
                            <img src="{{asset(strExplode($value['our_image']))}}">
                        </div>
                        <div class="detail_mess">
                            <p>
                                <span class="mess_class">区域类型：</span>
                                <span class="mess_kind">暂无数据</span>
                            </p>
                            <p class="mess_people mess_peo">客流：<i>评估中</i></p>
                            <p class="mess_people">{{$value['business_type']}}</p>
                            <p class="mess_mon">
                                <span class="mess_area">{{$value['total_area']}}<i>㎡</i></span>
                                <span class="mess_money">{{$value['rent']}}<i class="mess_each">元/月</i></span>
                            </p>
                        </div>
                        <div class="detail_near">
                            <div class="detail_addr">
                                <i></i>
                                <span>{{$value['city']}}-{{$value['county']}}</span>
                            </div>
                            <ul class="detail_ul">
                                <span class="near">写字楼{{$value['officebuilding_num']}}</span>
                                <span class="near">小区{{$value['village_num']}}</span>
                                <span class="near">购物中心{{$value['shoppingcenter_num']}}</span>
                            </ul>
                        </div>
                        <div class="keep_time">
                            <p>申请于{{timeShow($value['created_at'])}}</p>
                            <p class="keep_already">{{$value['order_status']}}</p>
                        </div>
                    </li>
                </a>
            @endforeach
           {{-- <a href="detail.html">
                <li class="list_detail">
                    <div class="img">
                        <img src="img/shop.png">
                    </div>
                    <div class="detail_mess">
                        <p>
                            <span class="mess_class">区域类型：</span>
                            <span class="mess_kind">生活社区- 高端</span>
                        </p>
                        <p class="mess_people mess_peo">客流：<i>20万+</i></p>
                        <p class="mess_people">商业街店铺</p>
                        <p class="mess_mon">
                            <span class="mess_area">200<i>㎡</i></span>
                            <span class="mess_money">100000<i class="mess_each">元/月</i></span>
                        </p>
                    </div>
                    <div class="detail_near">
                        <div class="detail_addr">
                            <i></i>
                            <span>海淀区-安宁庄</span>
                        </div>
                        <ul class="detail_ul">
                            <span class="near">医院1dewdew</span>
                            <span class="near">医院1</span>
                            <span class="near">医院1</span>
                        </ul>
                    </div>
                    <div class="keep_time">
                        <p>申请于<i>1</i>小时前</p>
                        <p class="keep_already">已申请勘察服务</p>
                    </div>
                </li>
            </a>--}}

        </ul>
        <div class="keep_bottom">
            <div class="keep_foot">查看更多</div>
        </div>
    </div>
</div>
<!--登录页  用户协议  个人中心-->
@include('Frontend.Index.CN.Wap.Layout.login')

@include('Frontend.Index.CN.Wap.Layout.login')
@include('Frontend.Index.CN.Wap.Layout.footer')
<!--引入或许需要更改-->
<!--<script src="js/index.js"></script>-->
<script>
    //        加载更多
    $('.keep_bottom').on('click',function(){
        layer.open({
            content: '正在加载中...'
            ,skin: 'msg'
            ,time: 2 //2秒后自动关闭
        });
        var start = $('.shop_list a').length;
        var map = {'start':start};
        content(map);
    });
    //ajax获取房源信息
    function content(map) {
        $.ajax({
            type: 'POST',
            url: '{{url("order/moredata")}}',
            data:map,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if(data.success == 200){
                    var html = '';
                    $.each(data['content'], function(k, v){
                        html += '<a href="{{url('detail/index')}}?id='+v['id']+'">';
                        html += '<li class="list_detail"><div class="img"><img src="'+v.our_image+'">';
                        html += '</div><div class="detail_mess"><p><span class="mess_class">区域类型：</span>';
                        html += '<span class="mess_kind">暂无数据</span></p><p class="mess_people mess_peo">客流：<i>分析中</i></p>';
                        html += '<p class="mess_people">'+v.business_type+'</p><p class="mess_mon"><span class="mess_area">'+v.total_area+'<i>㎡</i></span>';
                        html += '<span class="mess_money">'+v.rent+'<i class="mess_each">元/月</i></span>';
                        html += '</p></div><div class="detail_near"><div class="detail_addr"><i></i>';
                        html += '<span>'+v.city+'-'+v.county+'</span></div> <ul class="detail_ul"><li class="near">写字楼'+v.officebuilding_num+'</li>';
                        html += '<li class="near">小区'+v.village_num+'</li> <li class="near">购物中心'+v.shoppingcenter_num+'</li> </ul></div>'
                        html += '<div class="keep_time">申请于'+v.created_at+'<p class="keep_already">'+v.order_status+'</p></div></li></a>';
                    });
                    $('.shop_list').append(html);
                }else{
                    layer.open({
                        content: data.message
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