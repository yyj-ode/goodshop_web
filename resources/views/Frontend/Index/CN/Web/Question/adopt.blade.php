@extends('Frontend.Index.Web.Layout.base')

@section('seo')
    @include('Frontend.Index.Web.Layout.seo')
@stop

@section('content')
    <div class="s_mainnavwrap">
        <dl>
            <dt>
            <div class="menu">
                <ul class="curr"><a href="{{url('')}}">图文咨询</a></ul>
                <ul><a href="{{url('online/index')}}">电话咨询</a></ul>
                <ul><a href="{{url('clinic/index')}}">门诊预约</a></ul>
                <ul><a href="{{url('myzx/index')}}">名医义诊</a></ul>
            </div>
            </dt>
            <dd>
                <ul><a href="{{url('hospital/index')}}">找医院</a></ul>
                <ul><a href="{{url('expert/index')}}">找医生</a></ul>
                <ul><a href="{{url('disease/index')}}">疾病百科</a></ul>
                <ul><a href="{{url('symptom/index')}}">症状自查</a></ul>
            </dd>
        </dl>
    </div>

    <div class="main_content">
        <div class="iask_navigator">
            <a href="http://www.fh21.com.cn">人类健康网</a>
            <span>&gt;</span>
            <a href="index.html">问医生</a>
            <span>&gt;</span>内科
        </div>

        <ul class="w645 left">
            <div class="iask09">
                <div class="iask09_tag">
                    <ul style="left:0;"></ul>

                    <p><a href="{{url('')}}" style="padding:0 4px 0 10px;font-size:14px">呼吸科</a></p>
                    <span style="display:;">|</span>

                    <p><a href="{{url('')}}" style="padding:0 4px;font-size:14px">内分泌科</a></p>
                    <span style="display:;">|</span>

                    <p><a href="{{url('')}}" style="padding:0 4px;font-size:14px">神经内科</a></p>
                    <span style="display:;">|</span>

                    <p><a href="{{url('')}}" style="padding:0 4px;font-size:14px">消化内科</a></p>
                    <span style="display:;">|</span>

                    <p><a href="{{url('')}}" style="padding:0 4px;font-size:14px">心血管内科</a></p>
                    <span style="display:;">|</span>

                    <p><a href="{{url('')}}" style="padding:0 4px;font-size:14px">血液科</a></p>
                    <span style="display:;">|</span>

                    <p><a href="{{url('')}}" style="padding:0 4px;font-size:14px">肾内科</a></p>
                    <span style="display:;">|</span>

                    <p><a href="{{url('')}}" style="padding:0 4px;font-size:14px">感染内科</a></p>
                    <ul style="right:0;"></ul>
                </div>
            </div>
            <div class="iask10">
                <div class="iask10_tag">
                    <ul><a href="{{url('question/c'.$allData['category_id'].'.html')}}">全部问题</a></ul>
                    <ul class="curr"><a href="{{url('/question/adopt.html')}}">已采纳问题</a></ul>
                    <p>共收录<span>481203</span>题</p>
                </div>


                <ul class="iask10_title">
                    <p style="width:566px;">标题</p>
                    <p style="width:72px;">回复数</p>
                    <p style="width:71px;">状态</p>
                    <p>提问时间</p>
                </ul>
                <div class="iask10_con">
                    <ul>
                        <li class="iask10a">
                            <span>[<a href="{{url('')}}" class="link03">内科</a>]</span>
                            <a href="{{url('')}}" target="_blank">神经焦虑症</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-10</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="{{url('')}}" class="link03">内科</a>]</span>
                            <a href="{{url('')}}" target="_blank">头重半年多，无法根治</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-10</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="{{url('')}}" class="link03">内科</a>]</span>
                            <a href="{{url('')}}" target="_blank">你好！我45岁突然两个多月不来了，我是不是绝经了</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-06-10</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="{{url('')}}" class="link03">内科</a>]</span>
                            <a href="{{url('')}}" target="_blank">治疗肠胃病</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-06-10</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="{{url('')}}" class="link03">内科</a>]</span>
                            <a href="{{url('')}}" target="_blank">人很累全身无力</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-06-10</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="{{url('')}}" class="link03">内科</a>]</span>
                            <a href="{{url('')}}" target="_blank">肚子痛死了</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-06-10</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="{{url('')}}" class="link03">内科</a>]</span>
                            <a href="{{url('')}}" target="_blank">胸口闷堵得慌四肢无力...</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-06-10</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103034057.html" target="_blank">生产后疾病</a></li>
                        <li class="iask10b">0</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-06-10</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103034032.html" target="_blank">冠心病用什么药好</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-08-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103034019.html" target="_blank">一躺下就天旋地转</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-08-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103034013.html" target="_blank">孕21周，查MP阳性</a></li>
                        <li class="iask10b">0</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-08-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033988.html" target="_blank">肠胃炎恶心呕吐</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-08-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033953.html" target="_blank">剑突下游离气体是什么病？</a></li>
                        <li class="iask10b">0</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-09-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033915.html" target="_blank">脑梗塞右边瘫痪能治疗吗？</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-09-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033904.html" target="_blank">早上起来恶心胃里边咕咕叫胃酸是什么原因？</a></li>
                        <li class="iask10b">2</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-09-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033845.html" target="_blank">打嗝胸口胀痛，后背也痛</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033836.html" target="_blank">服用华法林是否会造成流产</a></li>
                        <li class="iask10b">0</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033779.html" target="_blank">脚上起的东西</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033778.html" target="_blank">出现低血糖</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033766.html" target="_blank">长期身体无力</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033765.html" target="_blank">睡觉时腿部不停痉挛蹬腿</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033744.html" target="_blank">一天拉好几回烂屎</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-08</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033728.html" target="_blank">头晕头疼流鼻涕</a></li>
                        <li class="iask10b">2</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033708.html" target="_blank">心口窝被踹后反胃</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033701.html" target="_blank">请问做完肺结核皮试后皮肤紫并且肿有问题吗</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033697.html" target="_blank">全身在发抖</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-10-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033622.html" target="_blank">过敏性鼻炎</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-11-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033617.html" target="_blank">去年胃突发疼痛到医院点滴6542，好了说是胃痉挛，后来有时候就痛以为是胃炎吃管胃炎药也好使但一停药胃痛还</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-11-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033590.html" target="_blank">反复发烧十多天，起皮疹，发烧时疹子疼痛，病因不明</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-11-18</li>
                    </ul>

                    <ul>
                        <li class="iask10a">
                            <span>[<a href="/question/list-6.html" class="link03">内科</a>]</span>
                            <a href="/question/103033562.html" target="_blank">我要询医生</a></li>
                        <li class="iask10b">1</li>
                        <li class="iask10c"><p class="iask10c_yes">已采纳</p></li>
                        <li class="iask10d">2016-11-18</li>
                    </ul>

                </div>

                <div class="pageStyle" style="display:;"><p><span class="current">1</span><a href="/question/list-6-1-0-2.html">2</a><a href="/question/list-6-1-0-3.html">3</a><a href="/question/list-6-1-0-4.html">4</a><a href="/question/list-6-1-0-5.html">5</a><a href="/question/list-6-1-0-6.html">6</a> ...&nbsp;&nbsp;<a href="/question/list-6-1-0-100.html">100</a><a href="/question/list-6-1-0-2.html">下一页</a><a href="/question/list-6-1-0-100.html">末页</a></p></div>
            </div>
            <ul class="height12"></ul>
            <script type="text/javascript">var cpro_id = "u1593430";</script>

            <ul class="height12"></ul>
            <div class="iask_border02">
                <ul class="iask_border02_head">
                    <ul>您还可以咨询的专家</ul><a href="/doctor/list-0-0.html" class="more01" target="_blank">更多</a>
                </ul>
                <ul class="height10"></ul>
                <ul class="height10"></ul>

                <div class="iask05_con">
                    <div>
                        <dl>
                            <dt><a href="/zx-3028205-1.html" target="_blank"><img src="http://file.fh21.com.cn/fhfile1/M00/0F/32/ooYBAFVR_a-AXAXcAABi-Nvbv8I66.jpeg" /><span></span></a></dt>
                            <dd>
                                <p><strong><a href="/zx-3028205-1.html" target="_blank" class="link03">刘宇鸿</a></strong>内科</p>
                                <span>在线</span>
                                <a href="/question/add/3028205.html" class="iask05Link" target="_blank">向TA提问</a>
                            </dd>
                        </dl>
                        <ul>
                            <p></p>
                            <li>TA帮助了<span>147</span>人目前共收到<a href="/gx-3028205-1.html" target="_blank" class="link02">0</a>封感谢信<a href="/lw-3028205-1.html" class="link02" target="_blank">29</a>个礼物<img src="http://static.fh21.com.cn/images/iask/point03b.gif" /></li>
                        </ul>
                    </div>
                    <div>
                        <dl>
                            <dt><a href="/zx-2983776-1.html" target="_blank"><img src="http://file.fh21.com.cn/fhfile1/M00/0E/AC/oYYBAFU_jxWAfCNCAACAlTTXgA8417.jpg" /><span></span></a></dt>
                            <dd>
                                <p><strong><a href="/zx-2983776-1.html" target="_blank" class="link03">吴家豪</a></strong>内科</p>
                                <span>在线</span>
                                <a href="/question/add/2983776.html" class="iask05Link" target="_blank">向TA提问</a>
                            </dd>
                        </dl>
                        <ul>
                            <p></p>
                            <li>TA帮助了<span>24</span>人目前共收到<a href="/gx-2983776-1.html" target="_blank" class="link02">0</a>封感谢信<a href="/lw-2983776-1.html" class="link02" target="_blank">18</a>个礼物<img src="http://static.fh21.com.cn/images/iask/point03b.gif" /></li>
                        </ul>
                    </div>
                    <div>
                        <dl>
                            <dt><a href="/zx-2981461-1.html" target="_blank"><img src="http://file.fh21.com.cn/fhfile1/M00/0E/A4/oYYBAFU-9yKAZOUtAABt6yJVASg080.jpg" /><span></span></a></dt>
                            <dd>
                                <p><strong><a href="/zx-2981461-1.html" target="_blank" class="link03">刘合珍</a></strong>妇产科</p>
                                <span>在线</span>
                                <a href="/question/add/2981461.html" class="iask05Link" target="_blank">向TA提问</a>
                            </dd>
                        </dl>
                        <ul>
                            <p></p>
                            <li>TA帮助了<span>199</span>人目前共收到<a href="/gx-2981461-1.html" target="_blank" class="link02">0</a>封感谢信<a href="/lw-2981461-1.html" class="link02" target="_blank">14</a>个礼物<img src="http://static.fh21.com.cn/images/iask/point03b.gif" /></li>
                        </ul>
                    </div>
                    <div>
                        <dl>
                            <dt><a href="/zx-2981461-1.html" target="_blank"><img src="http://file.fh21.com.cn/fhfile1/M00/0E/A4/oYYBAFU-9yKAZOUtAABt6yJVASg080.jpg" /><span></span></a></dt>
                            <dd>
                                <p><strong><a href="/zx-2981461-1.html" target="_blank" class="link03">刘合珍</a></strong>妇产科</p>
                                <span>在线</span>
                                <a href="/question/add/2981461.html" class="iask05Link" target="_blank">向TA提问</a>
                            </dd>
                        </dl>
                        <ul>
                            <p></p>
                            <li>TA帮助了<span>199</span>人目前共收到<a href="/gx-2981461-1.html" target="_blank" class="link02">0</a>封感谢信<a href="/lw-2981461-1.html" class="link02" target="_blank">14</a>个礼物<img src="http://static.fh21.com.cn/images/iask/point03b.gif" /></li>
                        </ul>
                    </div>

                </div>
            </div>

            <ul class="height12"></ul>
            <!-- 2015/4/16 -->
            <script type="text/javascript">
                var cpro_id="u2049773";
                (window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",rsi0:"680",rsi1:"250",pat:"6",tn:"baiduCustNativeAD",rss1:"#FFFFFF",conBW:"1",adp:"1",ptt:"0",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",titSU:"0",ptbg:"90",piw:"0",pih:"0",ptp:"0"}
            </script>
            <ul class="height12"></ul>

            <div class="iask_border02">
                <ul class="iask_border02_head">
                    <ul><span>内科&nbsp;</span>图片</ul>
                </ul>
                <ul class="iask_catalog03" id="wwwpiclists">
                </ul>
            </div>
        </ul>

        <ul class="w300 right">
            {{--<script type="text/javascript">--}}
                {{--/*主题广告300*150，创建于2013-7-9*/--}}
                {{--var cpro_id = "u1593429";--}}
            {{--</script>--}}

            <ul class="height12"></ul>
            <div class="iask_border01">
                <ul class="iask_border01_head iask_border01_head02">
                    <ul>内科<span>&nbsp;热点问题</span></ul>
                </ul>
                <ul class="iask_catalog02 iask_catalog02a">
                    <li><a href="/question/2195382.html" target="_blank">怎样才不会经常感冒不会咳嗽</a></li>
                    <li><a href="/question/1409265.html" target="_blank">陈旧性肺结核会复发吗</a></li>
                    <li><a href="/question/1405555.html" target="_blank">血压90-140算高血压吗</a></li>
                    <li><a href="/question/1405325.html" target="_blank">检查有冠心病但没明显症状怎么办</a></li>
                    <li><a href="/question/1403913.html" target="_blank">脑血栓有什么好的治疗方法</a></li>
                    <li><a href="/question/1309786.html" target="_blank">喝白醋对高血压有好处么</a></li>
                    <li><a href="/question/1307205.html" target="_blank">甲亢服用他巴唑后变甲减怎么办呢</a></li>
                </ul>
            </div>
            <input type="hidden" id='recommendCid1' value="6">
            <ul class="height12"></ul>
            <div class="iask_border01">
                <ul class="iask_border01_head iask_border01_head03">
                    <ul><span><span>内科</span>在线的医生(<em>461</em>名)</span></ul>
                </ul>
                <div class="onLineDoctor">
                    <li>
                        <a class="docLink" href="{{url('')}}/zx-579515-1.html" target="_blank">
                            <img class="docImg" width="84px" src="http://file.fh21.com.cn/fhfile1/M00/00/6B/oYYBAFOioH6APA2kAAAv9NBdTUE703.jpg">
                        </a>
                        <p>
                            <a class="docLink docLinkWithName" href="{{url('')}}/zx-579515-1.html" target="_blank">王晋军</a>
                            <img style="padding: 0px; height: 20px; width: 38px; border: medium none; margin: 0 0 0 10px;*vertical-align:middle;" src="http://img01.fh21.com.cn/statics/img/bg25c.gif">
                        </p>
                        <p class="depart">内科医生</p>
                        <span><a class="askTA" href="{{url('')}}/question/add/579515.html" target="_blank"><img src="http://img01.fh21.com.cn/statics/img/btn04.gif"></a></span>
                    </li>
                    <li>
                        <a class="docLink" href="{{url('')}}/zx-534315-1.html" target="_blank">
                            <img class="docImg" width="84px" src="http://file.fh21.com.cn/fhfile1/M00/00/2C/oYYBAFOinHOAICsjAAAso4bTgb4137.jpg">
                        </a>
                        <p>
                            <a class="docLink docLinkWithName" href="{{url('')}}/zx-534315-1.html" target="_blank">邹艳</a>
                            <img style="padding: 0px; height: 20px; width: 38px; border: medium none; margin: 0 0 0 10px;*vertical-align:middle;" src="http://img01.fh21.com.cn/statics/img/bg25c.gif">
                        </p>
                        <p class="depart">内科医生</p>
                        <span><a class="askTA" href="{{url('')}}/question/add/534315.html" target="_blank"><img src="http://img01.fh21.com.cn/statics/img/btn04.gif"></a></span>
                    </li>
                    <li>
                        <a class="docLink" href="{{url('')}}/zx-581786-1.html" target="_blank">
                            <img class="docImg" width="84px" src="http://file.fh21.com.cn/fhfile1/M00/00/40/oYYBAFOinbmAGE24AAAyDzumQlI552.jpg">
                        </a>
                        <p>
                            <a class="docLink docLinkWithName" href="{{url('')}}/zx-581786-1.html" target="_blank">胡道锋</a>
                            <img style="padding: 0px; height: 20px; width: 38px; border: medium none; margin: 0 0 0 10px;*vertical-align:middle;" src="http://img01.fh21.com.cn/statics/img/bg25c.gif">
                        </p>
                        <p class="depart">内科医生</p>
                        <span><a class="askTA" href="{{url('')}}/question/add/581786.html" target="_blank"><img src="http://img01.fh21.com.cn/statics/img/btn04.gif"></a></span>
                    </li>
                </div>
            </div>
            <ul class="height12"></ul>
            <script  type="text/javascript">var cpro_id = "u1452653";</script>
            <ul class="height12"></ul>
            <div class="iask_border01">
                <ul class="iask_border01_head iask_border01_head02">
                    <ul>焦点话题</ul>
                    <div><a href="http://baby.fh21.com.cn/" class="link01" target="_blank">育儿</a><span>|</span><a href="http://sex.fh21.com.cn/" class="link01"  target="_blank">两性</a><span>|</span><a href="http://jianfei.fh21.com.cn/" class="link01"  target="_blank">减肥</a><span>|</span><a href="http://www.fh21.com.cn/meirong/" class="link01"  target="_blank">整形</a><span>|</span><a href="http://care.fh21.com.cn/" class="link01"  target="_blank">养生</a></div>
                </ul>
                <ul class="iask_catalog03 iask_catalog03a" id="sexpiclist">
                </ul>
                <ul class="iask_catalog02 iask_catalog02b" id="sexcont">
                </ul>
            </div>

            <ul class="height12"></ul>
            <script  type="text/javascript">var cpro_id = "u1316752";</script>
            <ul class="height12"></ul>
            <!-- 曾经的广告位 -->
            <!-- <ul class="height12"></ul> -->

            <script type="text/javascript">
                var cpro_id="u1593429";
                (window["cproStyleApi"] = window["cproStyleApi"] || {})[cpro_id]={at:"3",rsi0:"300",rsi1:"250",pat:"6",tn:"baiduCustNativeAD",rss1:"#FFFFFF",conBW:"1",adp:"1",ptt:"0",titFF:"%E5%BE%AE%E8%BD%AF%E9%9B%85%E9%BB%91",titFS:"14",rss2:"#000000",titSU:"0",ptbg:"90",piw:"0",pih:"0",ptp:"0"}
            </script>
            <ul class="height12"></ul>
        </ul>
        <div class="clearfloat"></div>
    </div>
@stop