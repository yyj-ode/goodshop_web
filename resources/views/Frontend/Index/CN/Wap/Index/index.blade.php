
@include('Frontend.Index.CN.Wap.Layout.doctype')
<body>
<!--//页面默认-->
    <div class="con">
        <div class="head _head">
            <i class="coordinate" onclick="javascript:history.back(-1);"></i>
            <span>北京</span>
            <i class="logo" onclick="javascript:window.location.href='{{url('/')}}'"></i>
            {{--@if(Session::get('USER_DATA'))
                <i class="_user user_type" id="login_user"></i>
            @else
                <i class="_user user_type" id="login_none"></i>
                @endif--}}
            <i class="_user user_type" id="login_user"></i>
            <em class="wode"></em>
        </div>
        <div class="headhead"></div>
        <div class="search">
            <div class="search_key _search_key">
                <input id="shop_area" name="shop_area" value="" type="hidden">
                <input id="shop_type" name="business_type" value="0" type="hidden">
                <input id="min_area" name="min_area" value="0" type="hidden">
                <input id="max_area" name="max_area" value="99999999" type="hidden">
                <input id="min_rent" name="min_rent" value="0" type="hidden">
                <input id="max_rent" name="max_rent" value="9999999" type="hidden">
                <input placeholder="输入关键字搜索铺源店址" id="show_key" readonlyunselectable="on" type="text">
                <i></i>
            </div>
        </div>
        <div class="select">
            <ul class="select_con">
                <li class="bor_right">
                    <div class="bor_right_li">
                        <span>区域</span>
                        <i></i>
                    </div>
                    <!--主页筛选部分-->
                    <div class="shaixuan1 shaixuan none" id="area">
                        <ul>
                            <li>全部
                                <ul class="aa none">
                                    <li>全部</li>
                                </ul>
                            </li>
                            @foreach($area_level['area_level2'] as $k2 => $v2)
                                <li>{{$v2['name']}}
                                    <ul class="aa none">
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
                        <div class="erci">
                            <ul>
                                {{--向这里添加二级的东西--}}
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="bor_right">
                    <div class="bor_right_li">
                        <span>类型</span>
                        <i></i>
                    </div>
                    <!--主页筛选部分-->
                    <div class="shaixuan shaixuan2 none">
                        <ul>
                            @foreach($format as $value)
                                <li class="business_type" value="{{$value['id']}}">{{$value['name']}}</li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="bor_right">
                    <div class="bor_right_li">
                        <span>面积</span>
                        <i></i>
                    </div>
                    <!--主页筛选部分-->
                    <div class="shaixuan shaixuan2 none">
                        <ul>
                            <li min="0" max="99999999" class="area_type">不限</li>
                            @foreach($totalarea as $value)
                                <li class="area_type" min="{{$value['min_area']}}" max="{{$value['max_area']}}">{{$value['value']}}㎡</li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="bor_right_li">
                        <span>预算</span>
                        <i></i>
                    </div>
                    <!--主页筛选部分-->
                    <div class="shaixuan shaixuan2 none">
                        <ul>
                            <li min="0" max="99999999" class="budget_type">不限</li>
                            @foreach($price as $v)
                                <li min="{{$v['price_min']}}" class="budget_type" max="{{$v['price_max']}}">{{$v['value']}}</li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <ul class="shop_list">
            @foreach($data as $key => $value)
            <a href="{{url('detail/index').'?id='.$value['id']}}" class="shop_data">
                <li class="list_detail">
                    <div class="img">
                        <img src="{{asset(strExplode($value['our_image']))}}">
                    </div>
                    <div class="detail_mess">
                        <p>
                            {{--<span class="mess_class">区域类型：</span>
                            <span class="mess_kind">生活社区- 高端</span>--}}
                            <span class="mess_class">商铺类型：</span>
                            <span class="mess_kind">生活社区- 高端</span>
                        </p>
                        <p class="mess_people mess_peo">客流：<i>20万+</i></p>
                        <p class="mess_people">{{$value['business_type']}}</p>
                        <p class="mess_mon">
                            <span class="mess_area">{{$value['total_area']}}<i>㎡</i></span>
                            <span class="mess_money">{{$value['rent']}}<i class="mess_each">元/月</i></span>
                        </p>
                    </div>
                    <div class="detail_near">
                        <div class="detail_addr">
                            <i></i>
                            <span>{{$value['city_county']}}</span>
                        </div>
                        <ul class="detail_ul">
                            <li class="near">写字楼{{$value['officebuilding_num']}}</li>
                            <li class="near">小区{{$value['village_num']}}</li>
                            <li class="near">商铺{{$value['shopsurrounding_num']}}</li>
                        </ul>
                    </div>
                </li>
            </a>
             @endforeach
        </ul>
        <div class="find_more" id="more">查看更多</div>
        <div class="xuanpu">&copy;&nbsp;2017&nbsp;xuanpu100.com&nbsp;&nbsp;北京基石动力科技有限公司</div>
        <div class="foot">
            <div class="free_server">
                <a href="###">
                    <i></i>
                    <span>免费客服咨询</span>
                </a>
            </div>
            <div class="free_read">
                <a href="read.blade.php">
                    <i></i>
                    <span>免费订阅店址</span>
                </a>
            </div>
        </div>
        <div class="show none">
            已为您从&nbsp;<span>33567256</span>&nbsp;个店址中筛选出&nbsp;<i>36896</i>&nbsp;个有执照的有效店址
        </div>
    </div>
<!--选择类型-->
    <!--<div class="mold ">-->
        <!--<div class="mold_con">-->
            <!--<p class="mold_xz">请选择你的经营类型-->
                <!--<span></span>-->
            <!--</p>-->
            <!--<div class="mold_box">-->
                <!--<p>酒楼餐饮</p>-->
                <!--<p>服饰鞋包</p>-->
                <!--<p>休闲娱乐</p>-->
                <!--<p>美容美发</p>-->
                <!--<p>生活服务</p>-->
                <!--<p>百货超市</p>-->
                <!--<p>家居建材</p>-->
                <!--<p>电器通讯</p>-->
                <!--<p>汽修美容</p>-->
                <!--<p>医药保健</p>-->
                <!--<p>教育培训</p>-->
                <!--<p>旅馆宾馆</p>-->
                <!--<p>其他业态</p>-->
            <!--</div>-->
            <!--<div class="mold_ok">确定</div>-->
        <!--</div>-->
    <!--</div>-->
<!--//搜索页-->
    <div class="search_main none">
        <div class="head">
            <i class="coordinate"></i>
            <span>北京</span>
            <a href="###"><i class="logo"></i></a>
            <a href="###"><i class="user"></i></a>
        </div>
        <div class="headhead"></div>
        <div class="search">
            <div class="search_key">
                <input placeholder="输入关键字搜索铺源店址" id="search_content" readonlyunselectable="on" type="text">
                <a href="###"><i onclick="key_search()"></i></a>
            </div>
        </div>
        <div class="search_content">
            <h4>历史搜索</h4>
            <div class="search_detail">
                @if($session_key)
                @foreach($session_key as $v)
                <a href="###" onclick="key_search('{{$v}}')"><span class="search_two">{{$v}}</span></a>
                @endforeach
                @endif
            </div>
        </div>
    </div>

<!--登录页  用户协议  个人中心-->
@include('Frontend.Index.CN.Wap.Layout.login')


<!--拨打客服电话-->
    <div class="telephone none">
        <div class="telephone_con">
            <p>客服咨询电话</p>
            <div class="phone_call">
                <p>010-58220156</p>
                <a href="###"><div class="call_no">取消</div></a>
                <a href="tel:01058220156"><div class="call_sure">确定拨打</div></a>
            </div>
        </div>
    </div>
<!--&lt;!&ndash;主页筛选部分&ndash;&gt;-->
    <!--<div class="shaixuan none">-->
        <!--<ul></ul>-->
        <!--<div class="erci none">-->
            <!--<ul></ul>-->
        <!--</div>-->
    <!--</div>-->
@include('Frontend.Index.CN.Wap.Layout.footer')
<script type="text/javascript">
    $('#more').on('click',function(){
        layer.open({
            content: '正在加载中...'
            ,skin: 'msg'
            ,time: 2 //2秒后自动关闭
        });
        var start = $('.shop_list a').length;
        var key = $('#show_key').val();
        var shop_area = $('#shop_area').val();
        var business_type = $('#shop_type').val();
        var min_area = $('#min_area').val();
        var max_area = $('#max_area').val();
        var min_rent = $('#min_rent').val();
        var max_rent = $('#max_rent').val();
        var map = {'start':start,'shop_area':shop_area,'key':key,'business_type':business_type,'min_area':min_area,'max_area':max_area,'min_rent':min_rent,'max_rent':max_rent};
        content(map,'more');
    });
    //关键词搜索
    function key_search($history) {
        if($history){
            var key = $history;
        }else{
            var key = $('#search_content').val();
        }
        var shop_area = $('#shop_area').val();
        var business_type = $('#shop_type').val();
        var min_area = $('#min_area').val();
        var max_area = $('#max_area').val();
        var min_rent = $('#min_rent').val();
        var max_rent = $('#max_rent').val();
        //搜索条件显示
        $('#show_key').val(key);

        var map = {'start':0,'shop_area':shop_area,'key':key,'business_type':business_type,'min_area':min_area,'max_area':max_area,'min_rent':min_rent,'max_rent':max_rent};
        content(map,'key');
    }
    //ajax获取房源信息
    function content(map,type) {
        $.ajax({
            type: 'POST',
            url: '{{url("index/moredata")}}',
           /* data:{'start':start,'shop_area':shop_area,'key':key,'business_type':business_type,'min_area':min_area,'max_area':max_area,'min_rent':min_rent,'max_rent':max_rent},*/
           data:map,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data){
                if(data['status'] == 200){
                    var html = '';
                    $.each(data['content'], function(k, v){

                        html += '<a href="{{url('detail/index')}}?id='+v['id']+'" class="shop_data">';
                        html += '<li class="list_detail"><div class="img"><img src="'+v.our_image+'">';
                        html += '</div><div class="detail_mess"><p><span class="mess_class">区域类型：</span>';
                        html += '<span class="mess_kind">生活社区- 高端</span></p><p class="mess_people mess_peo">客流：<i>20万+</i></p>';
                        html += '<p class="mess_people">'+v.business_type+'</p><p class="mess_mon"><span class="mess_area">'+v.total_area+'<i>㎡</i></span>';
                        html += '<span class="mess_money">'+v.rent+'<i class="mess_each">元/月</i></span>';
                        html += '</p></div><div class="detail_near"><div class="detail_addr"><i></i>';
                        html += '<span>'+v.city_county+'</span></div> <ul class="detail_ul"><li class="near">写字楼'+v.officebuilding_num+'</li>';
                        html += '<li class="near">小区'+v.village_num+'</li> <li class="near">商铺'+v.shopsurrounding_num+'</li> </ul></div></li></a>';

                    });
                    if(type == 'more'){
                        $('.shop_list').append(html);
                    }else{
                        $('.shop_list').html(html);
                        if(type == 'key'){
                            //搜索页隐藏
                            $(".search_main").addClass("none");
                            $(".con").removeClass("none");
                        }
                    }

                }else{
                    layer.open({
                        content: data.error
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    if(type == 'key'){
                        $(".search_main").addClass("none");
                        $(".con").removeClass("none");
                    }

                }
            }
        });
    }

    //-------------------区域筛选-------------
    var that;
    $(".select_con").on("click",".bor_right_li",function () {
        $(".shop_list").addClass("none");
        $(".shaixuan").addClass("none");
        $(this).siblings(".shaixuan").removeClass("none");
        var that =  $(this).parent().index();
    });
    //地区
    $("body").delegate(".erci ul li","click",function(){
        $(this).css({"color":"#083680"}).siblings().css({"color":"#000"});
        if($(this).html().length>4){
            $(".bor_right").eq(0).find("span").html($(this).html().substring(0,3)+"...");
        }else{
            $(".bor_right").eq(0).find("span").html($(this).html());
        }
        $(this).parent().parent().parent().addClass("none");
        $(".shop_list").removeClass("none");
        //我的
        $('#shop_area').val($(this).attr('value'));
        var key = $('#show_key').val();
        var shop_area = $('#shop_area').val();
        var business_type = $('#shop_type').val();
        var min_area = $('#min_area').val();
        var max_area = $('#max_area').val();
        var min_rent = $('#min_rent').val();
        var max_rent = $('#max_rent').val();
        var map = {'start':0,'shop_area':shop_area,'key':key,'business_type':business_type,'min_area':min_area,'max_area':max_area,'min_rent':min_rent,'max_rent':max_rent};
        content(map,'new');
    });
    //其他
    $(".shaixuan2 ul li").click(function() {
        $(this).css({"color": "#083680"}).siblings().css({"color": "#000"});
        if($(this).html().length>4){
            $(this).parent().parent().parent().find("span").html($(this).html().substring(0,3)+"...");
        }else{
            $(this).parent().parent().parent().find("span").html($(this).html());
        }
        $(this).parent().parent().addClass("none");
        $(".shop_list").removeClass("none");
        //我的
        var type = $(this).attr('class');
        if(type == 'business_type'){
            $('#shop_type').val($(this).attr('value'));
        }
        if(type == 'area_type'){
            $('#min_area').val($(this).attr('min'));
            $('#max_area').val($(this).attr('max'));
        }
        if(type == 'budget_type'){
            $('#min_rent').val($(this).attr('min'));
            $('#max_rent').val($(this).attr('max'));
        }

        var key = $('#show_key').val();
        var shop_area = $('#shop_area').val();
        var business_type = $('#shop_type').val();
        var min_area = $('#min_area').val();
        var max_area = $('#max_area').val();
        var min_rent = $('#min_rent').val();
        var max_rent = $('#max_rent').val();
        var map = {'start':0,'shop_area':shop_area,'key':key,'business_type':business_type,'min_area':min_area,'max_area':max_area,'min_rent':min_rent,'max_rent':max_rent};
        content(map,'new');
    });
    $(".shaixuan1>ul>li").click(function(){
        $(this).css({"color":"#083680"}).siblings().css({"color":"#000"});
        $(".erci ul").html($(this).find(".aa").html());
    })
</script>
</body>
</html>

<!--实勘介绍-->
<!--实勘服务是作为顾客的“眼“，让专业的人代替客户去实勘店铺，产出实勘报告，节省客户时间成本，快速了解店铺。实勘内容主要有：-->
<!--1.          店铺的基本信息（房屋地址、面积、楼层等）、工程信息（电量、上下水、隔油池等）、租赁信息（租金和付款方式、转让费等）；-->
<!--2.          证照情况及房产证把控，只做正规店铺、放心租铺。-->
<!--3.          绘制店铺平面图。房屋结构一目了然。-->
<!--4.          采集照片，室内装修情况和外部环境情况。-->
<!--5.          店铺周边信息采集（小区、人流、客群画像、竞争业态等）。-->
<!--6.          竞争店信息，知己知彼百战不殆。-->