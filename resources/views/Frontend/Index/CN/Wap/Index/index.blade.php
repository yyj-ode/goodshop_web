
@include('Frontend.Index.CN.wap.Layout.doctype')
<body>
<!--//页面默认-->
    <div class="con">
    @include('Frontend.Index.CN.wap.Layout.header')
        <!--<div class="headhead"></div>-->
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
        <!--<div class="headhead"></div>-->
        <div class="search">
            <div class="search_key">
                <input placeholder="输入关键字搜索铺源店址" id="search_content" readonlyunselectable="on" type="text">
                <a href="###"><i onclick="key_search()"></i></a>
            </div>
        </div>
        <div class="search_content">
            <h4>历史搜索</h4>
            <div class="search_detail">
                <a href="###"><span class="search_one">南锣鼓巷</span></a>
                <a href="###"><span class="search_two">西单大悦城</span></a>
            </div>
        </div>
    </div>
 <!--登录页-->
    <div class="login_page none">
        <div class="head">
            <i class="coordinate"></i>
            <span>北京</span>
            <a href="###"><i class="logo"></i></a>
            <a href="###"><i class="user"></i></a>
        </div>
        <!--<div class="headhead"></div>-->
        <div class="login_content ">
            <form action="" class="registerForm">
                <h4>用户登录</h4>
                <div class="phoneNumber">
                    <span></span>
                    <!--<img src="images/phone.png" alt="">-->
                    <input type="text" placeholder="请输入手机号码" id="mobile_data">
                </div>
                <div class="verifica">
                    <div class="verificationCode">
                        <span></span>
                        <!--<img src="images/yanzheng.png" alt="">-->
                        <input type="text" placeholder="请输入验证码" id="sms_code">
                    </div>
                    <div class="send">发送验证码</div>
                </div>
                <div class="rightNow"  id="userLogin"><a href="###">立即登录</a></div>
                <p>登录代表您已同意&nbsp;&nbsp;<a href="###">选铺100 用户服务协议</a></p>
                <!--<div class="login_text"><h6>其他方式登录</h6><a href="###"><img src="images/weixin.png" alt=""></a></div>-->
            </form>
        </div>
    </div>
<!--用户协议-->
    <div class="agreement none">
        <div class="head">
            <i class="coordinate"></i>
            <span>北京</span>
            <a href="###"><i class="logo"></i></a>
            <a href="###"><i class="user"></i></a>
        </div>
        <!--<div class="headhead"></div>-->
        <div class="agreement_content">
            <h4>选铺100 用户服务协议</h4>
            <div class="agreement_detail">
                <p>1.一切网民在进入选铺100主页及各层页面时均被视为已经仔细看过本条款并完全同意。凡以任何方式登录本网站，或直接，间接使用本网站资料者，均被视为自愿接受本网站相关声明和用户服务协议的约束。</p>
                <p>2.选铺100转载的内容并不代表选铺100之意见及观点，也不意味着本网赞同其观点或证实其内容的真实性。</p>
                <p>3.选铺100转载的文字，图片，音视频等资料均由本网站用户提供，其真实性，准确性和合法性由信息发布人负责，选铺100不提供任何保证，并不承担任何法律责任。</p>
                <p>4.选铺100所转载的文字，图片，音视频等资料，如果侵犯了第三方的知识产权或其他权利，责任由作者或转载者本人承担，本网站对此不承担责任。</p>
                <p>5.选铺100不保证为用户提供便利而设置的外部链接的准确性和完整性，同时，对于该外部链接指向的不由选铺100实际控制的任何网页上的内容，选铺100不承担任何责任。</p>
                <p>6.用户明确并同意其使用选铺100服务所存在的风险将完全由其本人承担；因其使用选铺100服务而产生的一切后果也由本人承担，选铺100对此不承担任何责任。</p>
                <p>7.除选铺100注明之服务条款外，其他因不当使用本网而导致的任何意外，疏忽，合约毁坏，诽谤，版权或其他知识产权侵犯及其所造成的任何损失（包括因不当下载而感染电脑病毒等），选铺100概不负责，亦不承担任何法律责任。</p>
                <p>8.对于因不可抗力或因黑客攻击，通讯线路中断等选铺100不能控制的原因造成的网络服务中断或其他缺陷，导致用户不能正常使用选铺100，选铺100不承担任何责任，担将尽力减少因此给用户造成的损失或影响。</p>
                <p>9.本声明未涉及的问题请参见国家有关法律法规，当本声明与国家有关法律法规冲突时，以国家法律法规为准。</p>
            </div>
        </div>
    </div>
<!--我的展开(登录成功后)-->
    <div class="mine none">
        <div class="head">
            <i class="coordinate"></i>
            <span>北京</span>
            <a href="###"><i class="logo"></i></a>
            <a href="###"><i class="user"></i></a>
        </div>
        <!--<div class="headhead"></div>-->
        <div class="my_content">
            <a href="{{url('collection/index')}}"><div class="my_collect _my">
                <span></span><em>我的收藏</em>
                <i></i>
            </div></a>
            <a href="order.html"><div class="my_order _my">
                <span></span><em>我的订单</em>
                <i></i>
            </div></a>
            <a href="###"><div class="my_back">退出</div></a>
        </div>
    </div>

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
    function key_search() {
        var key = $('#search_content').val();
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