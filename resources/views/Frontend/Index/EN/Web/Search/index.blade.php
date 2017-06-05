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
            <a href="http://nndeal/">人类健康网</a>
            <span>&gt;</span>
            <a href="{{url('')}}">问医生</a>
        </div>

        <ul class="w645 left">
            <div class="iask10">
                <div class="iask10_tag">
                    <p>共收录<span>{{$allData['total']}}</span>题</p>
                </div>

                <ul class="iask10_title">
                    <p style="width:566px;">标题</p>
                    <p style="width:72px;">回复数</p>
                    <p style="width:71px;">状态</p>
                    <p>提问时间</p>
                </ul>
                <div class="iask10_con">

                    @if(isset($allData['questions']) && !empty($allData['questions']))
                    @foreach($allData['questions'] as $key=>$value)
                    <ul>
                        <li class="iask10a">
                            <span>[<a href="{{url('question'.DIRECTORY_SEPARATOR.'c'.$value['category_id'].'s6p1.html')}}" class="link03" title="{{$value['category_name']}}">{{$value['category_name']}}</a>]</span>
                            <a href="{{url('question'.DIRECTORY_SEPARATOR.'s'.$value['id'].'.html')}}" target="_blank">{{$value['title']}}</a></li>
                        <li class="iask10b">@if(isset($value['number'])) {{$value['number']}} @else 0 @endif</li>
                        <li class="iask10c">@if($value['status']==8)<p class="iask10c_yes">已采纳</p> @endif </li>
                        <li class="iask10d">{{$value['created_at']}}</li>
                    </ul>
                    @endforeach
                    @endif

                </div>
                @if($allData['totalPage']>1)
                <div class="pageStyle" style="display:block;">
                    <p>
                        {!! $allData['pagelist'] !!}
                    </p>
                </div>
                @endif
            </div>
            <ul class="height12"></ul>

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
            {{---曾经的广告位----}}
            <ul class="height12"></ul>
        </ul>
        <div class="clearfloat"></div>
    </div>
@stop