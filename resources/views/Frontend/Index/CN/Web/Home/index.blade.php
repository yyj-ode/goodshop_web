@extends('Frontend.Index.CN.Web.Layout.common')

@section('seo')
    @include('Frontend.Index.CN.Web.Layout.seo')
@stop

@section('content')

    <div class="layui-header header header-index" id="sidebar" style="display: block;">
        <div class="layui-main navbar">
            <a class="logo" href="/">
                <img src="{{URL::asset('assets/frontend/index/web/images/logo.png')}}" alt="NNDeal">
            </a>
            <ul class="layui-nav nav nav-tabs" style="margin-left: 290px;">
                <li class="layui-nav-item">
                    <a href="#siteBanner">首页</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoProduct" class="scrollto">我们的优势</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoQuestion" class="scrollto">解决的问题</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoServer" class="scrollto">服务流程</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoTeam" class="scrollto">核心团队</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoBrand" class="scrollto">服务咨询</a>
                </li>

                <li class="layui-nav-item" style="margin-left: 80px;">
                    <a href="{{''}}" style="width: 30px;font-size: 14px;color: #00a7d0">中文</a>
                </li>
                <li class="layui-nav-item" style="width: 1px;margin: 0px;">
                    |
                </li>
                <li class="layui-nav-item">
                    <a href="{{url('index/en')}}" style="width: 20px;margin: 0px;font-size: 14px;">En</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="site-banner" id="siteBanner">
        <div class="site-banner-bg">
        </div>
        <div class="site-banner-main">
            <div class="site-zfj">
                <i class="layui-icon" style="color: #fff; color: rgba(255,255,255,.7);"><img src="{{URL::asset('assets/frontend/index/web/images/logo-white.png')}}" alt="logo" class="site-logo"></i>
            </div>
            <div class="site-desc">
                <cite>基于人工智能的品牌选址专家</cite>
            </div>
        </div>
    </div>

    <div class="product-datas clearfix">
        <div class="environment app clearfix" id="scrolltoProduct">
            <h2>NNDeal智能选址六大优势</h2>
            <ul>
                <li><b><i class="advantage-one"></i><span>基于大数据选址</span></b></li>
                <li><b><i class="advantage-tow"></i><span>准确的人群画像</span></b></li>
                <li><b><i class="advantage-three"></i><span>快速获取目标房源</span></b></li>
            </ul>
            <ul>
                <li><b><i class="advantage-four"></i><span>真实运营能力的预测</span></b></li>
                <li><b><i class="advantage-five"></i><span>精准的品牌发展预测</span></b></li>
                <li><b><i class="advantage-six"></i><span>最大限度提升开店成功率</span></b></li>
            </ul>
        </div>
    </div>

    <div class="question-datas clearfix">
        <div class="environment clearfix" id="scrolltoQuestion">
            <h2>NNDeal为您解决<b>三</b>大难题</h2>
            <h3>还在苦恼选择有效地址吗？还在烈日下艰难估算着有效客流吗？</h3>
            <h3>还在为盲目签约而吃亏吗？</h3>

            <div class="main-part">
                <div class="main-left">
                    <ul>
                        <li>
                            <div class="tick"><img src="{{URL::asset('assets/frontend/index/web/images/question/tick.png')}}"></div>
                            <div class="lists">
                                <div class="title">品牌定位模糊</div>
                                <div class="content">资深顾问帮您理清品牌、市场、形象、价格、人群、渠道等各个问题，从而为开店选址指明方向。</div>
                            </div>
                        </li>
                        <li>
                            <div class="tick"><img src="{{URL::asset('assets/frontend/index/web/images/question/tick.png')}}"></div>
                            <div class="lists">
                                <div class="title">选址耗时耗力</div>
                                <div class="content">基于城市大数据的人工智能为品牌高效匹配各项商业数据，快速定位城市机会点。</div>
                            </div>
                        </li>
                        <li>
                            <div class="tick"><img src="{{URL::asset('assets/frontend/index/web/images/question/tick.png')}}"></div>
                            <div class="lists">
                                <div class="title">陷阱多爬坑难</div>
                                <div class="content">凭借全球知名连锁企业的开店经验配合本土化信息确保店址评估、合作谈判、签约成交的顺利进行。</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="main-right">
                    <img src="{{URL::asset('assets/frontend/index/web/images/question/question-three.png')}}">
                </div>
            </div>
        </div>
    </div>

    <div class="server-datas">
        <div class="server-banner-main server-banner-bg" id="scrolltoServer">
            <div class="server-desc">
                <h1>服务流程</h1>
                <h2>星巴克等知名连锁品牌都在使用的选址服务体系</h2>
            </div>
            <div class="server-flow">
                <img src="{{URL::asset('assets/frontend/index/web/images/server-flow.png')}}" alt="logo" class="server-iamge">
            </div>
        </div>
    </div>

    <div class="team-datas">
        <div class="team-main" id="scrolltoTeam">
            <div class="team-desc">
                <h1>核心团队</h1>
                <h2>商业地产选址专家，品牌规划专家，大数据分析专家等各行业精英强强联手</h2>
            </div>
            <div class="team-flow">
                <tr>
                    <td height="595" valign="top">
                        <div id="slider">

                            <div class="slide" style="left: 0px;">
                                <img class="diapo" border="0" src="{{URL::asset('assets/frontend/index/web/images/lisiqi.png')}}" width="920" height="595" style="opacity: 1; visibility: visible;">
                                <div class="text" style="top: 271px;"></div>
                                <div class="content" style="top: 100px;">
                                    <div class="name">李思奇</div>
                                    <div class="title">
                                        海外品牌顾问<br>
                                        海归精英，熟悉海内外市场环境<br>
                                        曾在海内外跨国机构从事外联职务<br>
                                    </div>
                                    <div class="domain">
                                        <div style="font-size: 16px;margin-bottom: 5px;">擅长领域：</div>
                                        <ui>
                                            <li>海外品牌入驻中国市场</li>
                                            <li>本土化品牌运营和管理</li>
                                        </ui>
                                    </div>
                                </div>
                            </div>

                            <div class="slide" style="left: 0px;">
                                <img class="diapo" border="0" src="{{URL::asset('assets/frontend/index/web/images/lichaoyang.png')}}" width="920" height="595" style="opacity: 1; visibility: visible;">
                                <div class="text" style="top: 271px;"></div>
                                <div class="content" style="top: 100px;">
                                    <div class="name">李朝阳</div>
                                    <div class="title">
                                        互联网营销顾问<br>
                                        早期投身互联网广告营销推广产业10年，<br>
                                        今年深感中国企业需要整合战略思维与国际视野的形象塑造。<br>
                                    </div>
                                    <div class="domain">
                                        <div style="font-size: 16px;margin-bottom: 5px;">擅长领域：</div>
                                        <ui>
                                            <li>跨行业品牌营销，</li>
                                            <li>互联网营销，大数据营销</li>
                                            <li>国际化市场营销战略</li>
                                        </ui>
                                    </div>
                                </div>
                            </div>


                            <div class="slide">
                                <img class="diapo" border="0" src="{{URL::asset('assets/frontend/index/web/images/chengfeng.jpg')}}" width="920" height="595" style="opacity: 0.1; visibility: visible;display: block">
                                <div class="text" style="top: 271px;"></div>
                                <div class="content" style="top: 100px;">
                                    <div class="name">陈锋</div>
                                    <div class="title">
                                        资深选址开发专家<br>
                                        澳大利亚昆士兰大学 工商管理硕士<br>
                                        从事开发选址16年，服务了众多大品牌客户<br>
                                        （星巴克、屈臣氏、Apple store等）。<br>
                                    </div>
                                    <div class="domain">
                                        <div style="font-size: 16px;margin-bottom: 5px;">擅长领域：</div>
                                        <ui>
                                            <li>连锁店布局、网络规划</li>
                                            <li>多城市拓展、城市调研</li>
                                            <li>新店财务模型测算及营收计算</li>
                                            <li>选址评估、租金谈判</li>
                                            <li>营运期续约谈判</li>
                                        </ui>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </div>
        </div>
    </div>

    <div class="brand-datas" id="scrolltoBrand">
        <div class="brand-main">
            <div class="brand-desc">
                <h1>下一个品牌也许就是你</h1>
            </div>
            <div class="brand-flow">
                <div class="picScroll-left">
                    <div class="bd">
                        <ul class="picList">
                            <li>
                                <div class="pic"><img src="{{URL::asset('assets/frontend/index/web/images/brand/1.png')}}" /></div>
                            </li>
                            <li>
                                <div class="pic"><img src="{{URL::asset('assets/frontend/index/web/images/brand/2.png')}}" /></div>
                            </li>
                            <li>
                                <div class="pic"><img src="{{URL::asset('assets/frontend/index/web/images/brand/3.png')}}" /></div>
                            </li>
                            <li>
                                <div class="pic"><img src="{{URL::asset('assets/frontend/index/web/images/brand/4.png')}}" /></div>
                            </li>
                            <li>
                                <div class="pic"><img src="{{URL::asset('assets/frontend/index/web/images/brand/5.png')}}" /></div>
                            </li>
                            <li>
                                <div class="pic"><img src="{{URL::asset('assets/frontend/index/web/images/brand/6.png')}}" /></div>
                            </li>
                        </ul>
                    </div>

                    <div class="hd" style="display: none">
                        <a class="next"></a>
                        <ul></ul>
                        <a class="prev"></a>
                        <span class="pageState" style="display: none"></span>
                    </div>
                </div>
            </div>

            <div class="brand-end">
                <h1>想成为下一个大型知名连锁品牌吗？</h1>
                <h2>填写联系信息，获取免费咨询服务，一起共筑大型连锁品牌之梦</h2>
            </div>

            <div class="brand-form">
                <div class="layui-form">
                    <div class="layui-form-item">

                        <div class="layui-inline">
                            <div class="layui-input-inline" style="width: 560px;">
                                <select name="category" lay-search="" id="data-category">
                                    <option value="">选择经营类别</option>

                                    @if(isset($category) && !empty($category))
                                        @foreach($category as $key=>$value)
                                            <option value="{{$value->id}}">{{$value->title}}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="layui-inline" style="margin-left: 120px;">
                            <div class="layui-input-inline" style="width: 560px;height: 60px;">
                                <input type="text" name="name" autocomplete="off" placeholder="请输入姓名" class="layui-input" id="data-name">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text" name="brand" autocomplete="off" placeholder="请输入品牌名称" class="layui-input" id="data-brand">
                            </div>
                        </div>

                        <div class="layui-inline" style="margin-left: 120px;">
                            <div class="layui-input-inline">
                                <input type="text" name="unit_price" autocomplete="off" placeholder="请输入客单价（元）" class="layui-input" id="data-unit-price">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text" name="mobile" autocomplete="off" placeholder="请输入手机号码" class="layui-input" id="mobileData">
                            </div>
                        </div>

                        <div class="layui-inline" style="width: 336px;margin-left: 120px;">
                            <div class="layui-input-inline">
                                <input type="text" name="verification" autocomplete="off" placeholder="请输入验证码" class="layui-input" style="width: 336px;" id="verification-code">
                            </div>
                        </div>

                        <div class="layui-inline" style="width: 210px;">
                            <button class="layui-btn brand-code" style="width: 210px;"  id="brandCode">获取验证码</button>
                        </div>
                    </div>

                    <div class="layui-form-item" style="margin-top: 66px;">
                        <div class="layui-input-block" style="margin-left: 0;">
                            <button class="layui-btn brand-submit" lay-submit=""  id="brand-submit">获取免费电话咨询服务</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="brand-end">
                <h3>*NNDeal专业选址顾问曾任职于星巴克，PUMA等知名连锁企业，为其提供多年选址服务，图中所有品牌仅为其辅助说明，具体成功案例请参照相关说明页面。</h3>
            </div>

        </div>
    </div>

    <div class="layui-footer footer footer-index">
        <div class="layui-main">
            <div style="width: 600px;margin: 0 auto;">
                <div style="height: 20px;margin-top: 0px;">
                    <span style="float: left;">电话：010-58220156</span>
                    <span>周一至周日 8：00-22：00</span>
                    <span style="float: right">邮箱：bd@nndeal.com</span>
                </div>
            </div>

            <HR style="FILTER: progid:DXImageTransform.Microsoft.Shadow(color:#987cb9,direction:145,strength:15);width: 80%;color:#987cb9;size: 1; margin: 0 auto;margin-top: 30px;">

            <div style="width: 800px;margin: 0 auto;margin-top: 20px;">
                <div style="height: 20px;"><span style="float: left;">&copy; 2017 NNDeal.com 北京基石动力科技有限公司 </span><span style="float: right;">京ICP备14047684号-8</span></div>
            </div>
        </div>
    </div>
    <div class="site-tree-mobile layui-hide">
        <i class="layui-icon">&#xe602;</i>
    </div>
    <script src="{{asset('assets/frontend/index/web/js/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/frontend/index/web/layui.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/frontend/index/web/js/jquery.slider.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/frontend/index/web/js/jquery.SuperSlide.2.1.1.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/frontend/index/web/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/frontend/index/web/js/portamento-min.js')}}" type="text/javascript"></script>
    <script>
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

        $(document).ready(function(){
            slider.init();
            $(function(){
                $("#slider div:last").trigger('mouseover');
            });

            $(function () {
                $("#brandCode").on('click',function () {

//                $(this).css('background-color','#f3f5f8');
//                    $(this).html('99999');
                    var mobileData = $("#mobileData").val();
                    console.log(mobileData);
                    $.ajax({
                        type: 'POST',
                        url: '{{url("index/captcha")}}',
                        data: { mobile : mobileData},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data){
                            if(data.status == 1){
                                layui.use('layer', function(){
                                    var layer = layui.layer;
                                    layer.msg(data.message);
                                });
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

                $('#brand-submit').on('click',function () {
                    $.ajax({
                        type: 'POST',
                        url: '{{url("index/store")}}',
                        data: {type:1,'category':$("#data-category").val(),'verification':$("#verification-code").val(),'mobile':$('#mobileData').val(),'unit_price':$("#data-unit-price").val(),'brand':$("#data-brand").val(),'name':$("#data-name").val()},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data){
                            if(data.status == 1){
                                layui.use('layer', function(){
                                    var layer = layui.layer;
                                    layer.msg(data.message);
                                });
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
            })

            $('body').scrollspy({ target: '.navbar' })

            $('#sidebar').portamento({
                gap: 0,
                disableWorkaround: true
            });

            $(window).scroll(function () {
                var showHeight = 400;
                //$(window).height()
                if ($(window).scrollTop() > showHeight) {
                    $("#portamento_container").show();
                }else {
                    $("#portamento_container").hide();
                }
            });
        });
    </script>

    <script type="text/javascript">
        jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:3});
    </script>

@stop