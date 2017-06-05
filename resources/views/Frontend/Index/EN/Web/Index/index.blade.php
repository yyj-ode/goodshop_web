@extends('Frontend.Index.EN.Web.Layout.common')

@section('seo')
    @include('Frontend.Index.EN.Web.Layout.seo')
@stop

@section('content')

    <div class="layui-header header header-index" id="sidebar" style="display: block;">
        <div class="layui-main navbar">
            <a class="logo" href="/">
                <img src="{{URL::asset('assets/frontend/index/web/images/logo.png')}}" alt="NNDeal">
            </a>
            <ul class="layui-nav nav nav-tabs" style="margin-left: 290px;">
                <li class="layui-nav-item">
                    <a href="#siteBanner">HOME</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoProduct" class="scrollto">ADVANTAGES</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoQuestion" class="scrollto">PROBLEMS</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoServer" class="scrollto">SERVICE</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoTeam" class="scrollto">TEAM</a>
                </li>
                <li class="layui-nav-item">
                    <a href="#scrolltoBrand" class="scrollto">CONTACT</a>
                </li>

                <li class="layui-nav-item" style="margin-left: 80px;">
                    <a href="{{url('')}}" style="width: 30px;font-size: 14px;">中文</a>
                </li>
                <li class="layui-nav-item" style="width: 1px;margin: 0px;">
                    |
                </li>
                <li class="layui-nav-item">
                    <a href="{{url('index/en')}}" style="width: 20px;margin: 0px;font-size: 14px;color: #00a7d0">En</a>
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
            <div class="layui-anim site-desc">
                <div class="cite">THE BRAND CONSULTANT AND LOCATION SOLUTION EXPERT</div>
                <div class="cite">BASED ON ARTIFICIAL INTELLIGENCE</div>
            </div>
        </div>
    </div>

    <div class="product-datas clearfix">
        <div class="environment app clearfix" id="scrolltoProduct">
            <h2>THE ADVATAGES OF CHOOSING NNDEAl
                AI SOLUTIONS</h2>
            <ul>
                <li><b><i class="advantage-one"></i><span>AI technology based on
                            big data analysis</span></b></li>
                <li><b><i class="advantage-tow"></i><span>Accurate consumer
                            profiling </span></b></li>
                <li><b><i class="advantage-three"></i><span>Obtain the wanted
                            property fast</span></b></li>
            </ul>
            <ul>
                <li><b><i class="advantage-four"></i><span>Budgeting the real
                            operational capability</span></b></li>
                <li><b><i class="advantage-five"></i><span>Precise brand
                            development strategy</span></b></li>
                <li><b><i class="advantage-six"></i><span>Maximum the success
                            rate of new store</span></b></li>
            </ul>
        </div>
    </div>

    <div class="question-datas clearfix">
        <div class="environment clearfix" id="scrolltoQuestion">
            <h2>NNDEAl HELPS YOU GET OVER THREE
                DIFFICULT PROBLEMS</h2>
            <h3>Longer commutes? Higher rents? Fewer opportunities?</h3>
            <h3>The problems facing the new brands are going worse.</h3>

            <div class="main-part">
                <div class="main-left">
                    <ul>
                        <li>
                            <div class="tick"><img src="{{URL::asset('assets/frontend/index/web/images/question/tick.png')}}"></div>
                            <div class="lists">
                                <div class="title">Brand positioning</div>
                                <div class="content">Our senior consultants help you to analyze the brand,the market,the price,the consumer and channels to have a direction for your .</div>
                            </div>
                        </li>
                        <li>
                            <div class="tick"><img src="{{URL::asset('assets/frontend/index/web/images/question/tick.png')}}"></div>
                            <div class="lists">
                                <div class="title">Eliminate the opportunity costs</div>
                                <div class="content">Based on citywide big data resources, our AI system can calculate useful data to find every potential opportunity locations in the city.</div>
                            </div>
                        </li>
                        <li>
                            <div class="tick"><img src="{{URL::asset('assets/frontend/index/web/images/question/tick.png')}}"></div>
                            <div class="lists">
                                <div class="title">Avoid traps of operating business
                                    overseas </div>
                                <div class="content">Rely on our rich experience that working with world well-known brands, localized information to make sure you have the right location, get over negotiation and finish deal.</div>
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
                <h1>SERVICE PROCESS</h1>
                <h2>The process that helps Starbucks and other well-known brands </h2>
            </div>
            <div class="server-flow">
                <img src="{{URL::asset('assets/frontend/index/web/images/server-flow-en.png')}}" alt="logo" class="server-iamge">
            </div>
        </div>
    </div>

    <div class="team-datas">
        <div class="team-main" id="scrolltoTeam">
            <div class="team-desc">
                <h1>ELITE TEAM</h1>
                <h2>Commercial property developing expert; professional brand consultant;
                    big data scientist and other elites from all walks of life</h2>
            </div>
            <div class="team-flow">
                <tr>
                    <td height="595" valign="top">
                        <div id="slider">
                            <div class="slide" style="left: 0px;">
                                <img class="diapo" border="0" src="{{URL::asset('assets/frontend/index/web/images/lisiqi.png')}}" width="920" height="595" style="opacity: 1; visibility: visible;">
                                <div class="text" style="top: 271px;"></div>
                                <div class="content" style="top: 100px;">
                                    <div class="name">Li Siqi</div>
                                    <div class="title">
                                        Brand Consultant<br>
                                        Familiar with the domestic and abroad market environment<br>
                                        He has been engaged in outreach positions in many international<br>
                                    </div>
                                    <div class="domain">
                                        <div style="font-size: 16px;margin-bottom: 5px;">Expertise areas:</div>
                                        <ui>
                                            <li>Help overseas Brands enter Chinese Market</li>
                                            <li>Provide localized brand marketing strategy</li>
                                        </ui>
                                    </div>
                                </div>
                            </div>

                            <div class="slide" style="left: 0px;">
                                <img class="diapo" border="0" src="{{URL::asset('assets/frontend/index/web/images/lichaoyang.png')}}" width="920" height="595" style="opacity: 1; visibility: visible;">
                                <div class="text" style="top: 271px;"></div>
                                <div class="content" style="top: 100px;">
                                    <div class="name">Li Chaoyang</div>
                                    <div class="title">
                                        Chaoyang has been devoted into web promotion market for over 10 years.<br>
                                        He always has the ambition that helps firms to build their own market strategies and international image. <br>
                                    </div>
                                    <div class="domain">
                                        <div style="font-size: 16px;margin-bottom: 5px;">Expertise areas:</div>
                                        <ui>
                                            <li>Mutil-Industry Brand Marketing</li>
                                            <li>Internet and Big Data Marketing</li>
                                            <li>International Market Strategy</li>
                                        </ui>
                                    </div>
                                </div>
                            </div>

                            <div class="slide">
                                <img class="diapo" border="0" src="{{URL::asset('assets/frontend/index/web/images/chengfeng.jpg')}}" width="920" height="595" style="opacity: 0.1; visibility: visible;">
                                <div class="text" style="top: 271px;"></div>
                                <div class="content" style="top: 100px;">
                                    <div class="name">Chen feng</div>
                                    <div class="title">
                                        Senior commercial property developing expert had 16 <br>
                                        years experience, worked with many famous brands. <br>
                                    </div>
                                    <div class="domain">
                                        <div style="font-size: 16px;margin-bottom: 5px;">Expertise areas:</div>
                                        <ui>
                                            <li>Chain store overall arrangement network planning</li>
                                            <li>Multi-city operation, City research</li>
                                            <li>New franchise financial modeling and revenue projection</li>
                                            <li>Location evaluation, negotiation</li>
                                            <li>extending lease agreement</li>
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
                <h1>MAYBE YOU ARE THE NEXT WELL-KNOWN BRAND</h1>
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
                <h1>WANT TO BE THE NEXT WELL-KNOWN
                    CHAIN BRAND?</h1>
                <h2>fill the contact information to get a free consultant trial</h2>
            </div>

            <div class="brand-form">
                <div class="layui-form">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text" name="first_name"  autocomplete="off" placeholder="First Name*" class="layui-input" id="first_name_data">
                            </div>
                        </div>

                        <div class="layui-inline" style="margin-left: 120px;">
                            <div class="layui-input-inline">
                                <input type="text" name="last_name"  autocomplete="off" placeholder="Last Name*" class="layui-input" id="last_name_data">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">


                        <div class="layui-inline">
                            <div class="layui-input-inline" style="width: 560px;height: 60px;">
                                <input type="text" name="email" autocomplete="off" placeholder="Your Email*" class="layui-input" id="email_data">
                            </div>
                        </div>

                        <div class="layui-inline" style="margin-left: 120px;">
                            <div class="layui-input-inline" style="width: 560px;">
                                <select name="category" lay-search="" id="category_data">
                                    <option value="">Business Category*</option>

                                    @if(isset($category) && !empty($category))
                                        @foreach($category as $key=>$value)
                                            <option value="{{$value->id}}">{{$value->title}}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>

                    </div>



                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <div class="layui-input-inline">
                                <input type="text" name="brand_name"  autocomplete="off" placeholder="Brand Name*" class="layui-input" id="brand_name_data">
                            </div>
                        </div>

                        <div class="layui-inline" style="margin-left: 120px;">
                            <div class="layui-input-inline">
                                <input type="text" name="customer"  autocomplete="off" placeholder="Per Customer Transaction*" class="layui-input" id="customer_data">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item" style="margin-top: 66px;">
                        <div class="layui-input-block" style="margin-left: 0;">
                            <button class="layui-btn brand-submit" lay-submit="" id="brand-submit">Get the free consulatant </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="layui-footer footer footer-index">
        <div class="layui-main">
            <div style="width: 600px;margin: 0 auto;">
                <div style="height: 20px;margin-top: 0px;">
                    <span style="float: left;">Tel：+8610-58220156</span>
                    <span>Mon-Fri 8：00-22：00</span>
                    <span style="float: right">Email：bd@nndeal.com</span>
                </div>
            </div>

            <HR style="FILTER: progid:DXImageTransform.Microsoft.Shadow(color:#987cb9,direction:145,strength:15);width: 80%;color:#987cb9;size: 1; margin: 0 auto;margin-top: 30px;">

            <div style="width: 800px;margin: 0 auto;margin-top: 20px;">
                <div style="height: 20px;"><span style="float: left;">&copy; 2017 NNDeal.com Beijing CornerstonePowers Technology</span><span style="float: right;">京ICP备14047684号-8</span></div>
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
            })

            $('body').scrollspy({ target: '.navbar' })

            $('#sidebar').portamento({
                gap: 0,
                disableWorkaround: true
            });

            $('#brand-submit').on('click',function () {
                $.ajax({
                    type: 'POST',
                    url: '{{url("index/store")}}',
                    data: {type:2,'category':$("#category_data").val(),'first_name':$("#first_name_data").val(),'last_name':$('#last_name_data').val(),'email':$("#email_data").val(),'brand':$("#brand_name_data").val(),'unit_price':$("#customer_data")},
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
        });
    </script>

    <script type="text/javascript">
        jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:3});
    </script>

@stop