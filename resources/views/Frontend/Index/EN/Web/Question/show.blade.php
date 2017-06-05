@extends('Frontend.Index.Web.Layout.base')

@section('seo')
    @if(isset($question) && $question)
        <title>{{$question->title}}_问医生，健康问答_人类健康网</title>
        <meta name="keywords" content="{{str_limit($question->keywords, $limit = 110, $end = '...')}}"/>
        <meta name="description" content="{{str_limit($question->description, $limit = 220, $end = '...')}}"/>
    @endif
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

    <div class="main_content" id="appContent">
        {{--文字广告--}}
        <div class="w645"></div>
        <div class="iask_navigator">
            <a href="http://nndeal/">人类健康网</a>
            <span>&gt;</span>
            <a href="{{url('')}}">问医生</a>
            @if(isset($allData['categoryLinkData']) && !empty($allData['categoryLinkData']))
                @foreach($allData['categoryLinkData']  as $key => $value)
                    <span>&gt;</span>
                    <a href="{{url('question'.DIRECTORY_SEPARATOR.'c'.$value['id'].'s6p1.html')}}">{{$value['category_name']}}</a>
                @endforeach
            @endif
        </div>
        <ul class="w645 left">
            {{--问题--}}
            <div class="iask_detail01">
                @if(isset($question) && $question)
                <div class="iask_detail01a">
                    <dl>
                        <dt><a href="javascript:void(0);"><img src="http://static.fh21.com.cn/images/passport/avator_11.jpg" /><span></span></a></dt>
                        <dd>
                            <ul>{{$question->title}}</ul>
                            <ol>
                                来自于：{{$question->area}}<span>|</span>
                                提问时间：{{$question->created_at}}<span>|</span>
                                2人回答
                            </ol>
                        </dd>
                    </dl>
                </div>
                <div class="iask_detail01b">
                    <ul class="iask_detail01b_icon"></ul>

                    <div class="iask_detail01b1">
                        <dl>
                            <dt>基本信息：</dt>
                            <dd>@if($question->sex==1){{'男'}}@else {{'女'}}@endif {{(date('Y', time())) - ($question->year)}}岁</dd>
                        </dl>
                        <dl>
                            <dt>病情描述：</dt>
                            <dd>{{$question->description}}</dd>
                        </dl>
                        {{--补充问题--}}
                        <span id='supply_content'>
                        @if(isset($answers) && count($answers)!=0)
                            @foreach($answers as $key=>$value)
                                @if($value->type == 2)
                                <dl>
                                    <dt>补充问题：</dt>
                                    <dd>{!! $value->suggestion !!}</dd>
                                </dl>
                                @endif
                            @endforeach
                        @endif
                        </span>
                    </div>

                    <div class="iask_detail01b3">
                        <a target="_blank" href="{{url('add.html')}}" class="iask_detail01b3a">{{--我要提问--}}</a>
                        <a href="javascript:void(0);" class="iask_detail01b3b" style="display:none;" v-show="partake_answer_visible" v-on:click="partakeAnswer()">{{--参与回答--}}</a>
                        <a href="javascript:void(0);" class="iask_detail01b3c" style="display:none;" v-show="partake_question_visible" v-on:click="partakeQuestion()">{{--补充提问--}}</a>
                        <p>相关疾病：<a target="_blank" href="http://www.fh21.com.cn/sjk/sm/" class="link03">失眠</a></p>
                    </div>
                    {{--回答--}}
                    <div class="iask_tiwen" style="display:none;" v-show="add_answer_visible">
                        <p id='answer_supply_fromtitle'>我要回答</p>
                        <ol>
                            <div value="" class="ivu-input-wrapper ivu-input-type">
                                <textarea class="ivu-input" placeholder="请输入不少于5个字" rows="6" v-model="answer.content" v-bind:value="content">  </textarea>
                            </div>
                        </ol>
                        <ul>
                            <i-input :value.sync="answer.captcha" placeholder="请输入验证码" style="width: 88px" v-on:click="changeCode"></i-input>
                            <img id='code_img' :src="code_img" onclick='this.src=this.src.split("?")[0]+"?s="+Math.random()'>
                            <a id="anotherCode" v-on:click="changeCode">换一个</a>

                            <i-button type="primary" v-on:click="answerStore" :loading="loading">
                                <span v-if="!loading">确定</span>
                                <span v-else>Loading...</span>
                            </i-button>
                            <i-button v-on:click="partakeAnswer">取消</i-button>
                        </ul>
                        <i class="ivu-icon ivu-icon-close-round" style="font-size:20px"  v-on:click="partakeAnswer()"></i>
                    </div>
                    {{--回答end--}}

                    {{--补充问题start--}}
                    <div class="iask_tiwen" style="display:none;" v-show="add_question_visible">
                        <p id='answer_supply_fromtitle'>补充问题：补充提问细节，有助于医生更详细的解答</p>
                        <ol>
                            <div value="" class="ivu-input-wrapper ivu-input-type">
                                <textarea class="ivu-input" placeholder="请输入不少于5个字" rows="6" v-model="answer.content" v-bind:value="content">  </textarea>
                            </div>
                        </ol>
                        <ul>
                            <i-input :value.sync="answer.captcha" placeholder="请输入验证码" style="width: 88px" v-on:click="changeCode"></i-input>
                            <img id='code_img' :src="code_img" onclick='this.src=this.src.split("?")[0]+"?s="+Math.random()'>
                            <a id="anotherCode" v-on:click="changeCode">换一个</a>

                            <i-button type="primary" v-on:click="questionSupply" :loading="loading">
                                <span v-if="!loading">确定</span>
                                <span v-else>Loading...</span>
                            </i-button>
                            <i-button v-on:click="partakeQuestion">取消</i-button>
                        </ul>
                        <i class="ivu-icon ivu-icon-close-round" style="font-size:20px"  v-on:click="partakeQuestion"></i>
                    </div>
                    {{--补充问题end--}}
                </div>
                @endif
                <div class="iask_detail01c">
                    <p>看了该问题的网友还看了：</p>
                    <ul>
                        <li><a target="_blank" href="{{url('')}}/question/16377311.html" title="治疗入眠困难有哪些">治疗入眠困难有哪些</a>
                            <img style="display:none;" src="http://static.fh21.com.cn/images/iask/hot.gif" />
                        </li>
                        <li><a target="_blank" href="{{url('')}}/question/35615230.html" title="中成药治疗入眠困难有哪些">中成药治疗入眠困难有哪些</a>
                            <img style="display:none;" src="http://static.fh21.com.cn/images/iask/hot.gif" />
                        </li>
                        <li><a target="_blank" href="{{url('')}}/question/48294716.html" title="治疗失眠，整夜无法入眠">治疗失眠，整夜无法入眠</a>
                            <img style="display:none;" src="http://static.fh21.com.cn/images/iask/hot.gif" />
                        </li>
                        <li><a target="_blank" href="{{url('')}}/question/11215058.html" title="5岁男童，睡觉入眠后出汗，如何治疗？">5岁男童，睡觉入眠后出汗，如何治疗...</a>
                            <img style="display:none;" src="http://static.fh21.com.cn/images/iask/hot.gif" />
                        </li>
                        <li><a target="_blank" href="{{url('')}}/question/21097315.html" title="晚上睡觉难入眠且多梦易醒怎么回事?如果治疗?">晚上睡觉难入眠且多梦易醒怎么回事?...</a>
                            <img style="display:none;" src="http://static.fh21.com.cn/images/iask/hot.gif" />
                        </li>
                        <li><a target="_blank" href="{{url('')}}/question/2688012.html" title="面部浮肿、浑身疼痛、时而嗜睡、时而难以入眠如何治疗">面部浮肿、浑身疼痛、时而嗜睡、时而...</a>
                            <img style="display:none;" src="http://static.fh21.com.cn/images/iask/hot.gif" />
                        </li>
                        <li><a target="_blank" href="{{url('')}}/question/11090704.html" title="头晕不能入眠，起床困难，怎样治疗">头晕不能入眠，起床困难，怎样治疗</a>
                            <img style="display:none;" src="http://static.fh21.com.cn/images/iask/hot.gif" />
                        </li>
                        <li><a target="_blank" href="{{url('')}}/question/30637936.html" title="骨蒸如何治疗？骨蒸浑身超热，每天晚上难以入眠">骨蒸如何治疗？骨蒸浑身超热，每天晚...</a>
                            <img style="display:none;" src="http://static.fh21.com.cn/images/iask/hot.gif" />
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="height12"></ul>
            {{--满意答案--}}
            @if(isset($answers) && count($answers)!=0)
                @foreach($answers as $key=>$value)
                    @if($value->status == 8 && $value->type == 1)
                    <div class="iask_detail02">
                        <ul class="iask_detail02_title">满意答案</ul>
                        <div class="iask_answer">
                            <!--用户部分-->
                            <dl class="iask_answer01">
                                <!--touxiang-->
                                <dt><a target="_blank" href="http://iask.fh21.com.cn/zx-2092403-1.html"><img src="http://file.fh21.com.cn/fhfile1/M00/09/35/oYYBAFRwcxiANwTAAAA0OfOw6WU946.jpg"><span></span></a></dt>
                                <dd>
                                    <ul>
                                        <a target="_blank" href="http://iask.fh21.com.cn/zx-2092403-1.html" class="link03">{{$value->user->really_name}}</a>
                                        <span>主治医师</span>
                                        <img src="http://static.fh21.com.cn/images/iask/bg07b.gif">
                                        <em>因不能面诊，医生的建议仅供参考</em>
                                    </ul>
                                    <ol>
                                        <div class="fh_ad_placeholder_52"><a target="_blank" href="http://partners.fh21.com.cn/ad/count?appid=advertisement&amp;aid=230437&amp;group_id=4068&amp;ip=221.222.25.86&amp;backUrl=http%3A%2F%2Fbwt.zoossoft.cn%2FLR%2FChatpre.aspx%3Fid%3DBWT57561283%26lng%3Dcn%26e%3D%25e9%25a3%259e%25e5%258d%258e%25e5%2581%25a5%25e5%25ba%25b7%25e7%25bd%2591%25e9%2597%25ae%25e7%25ad%2594%26r%3D%25e9%25a3%259e%25e5%258d%258e%25e5%2581%25a5%25e5%25ba%25b7%25e7%25bd%2591%25e9%2597%25ae%25e7%25ad%2594%26p%3D%25e9%25a3%259e%25e5%258d%258e%25e5%2581%25a5%25e5%25ba%25b7%25e7%25bd%2591%25e9%2597%25ae%25e7%25ad%2594&amp;token=098ca3ce2c3235e87db9de6b5e70e278c9302a0e" class="iask_answer01a"></a><input type="hidden" name="allad" value="PC-问答白癜风向TA提问-石家庄远大白癜风医院,PC-问答白癜风向TA提问-北京国丹白癜风医院,PC-问答皮肤科向TA提问-北京京城皮肤病医院"></div>
                                        <em>帮助网友：</em><span>21210</span><em>收到了：</em>
                                        <a target="_blank" href="http://iask.fh21.com.cn/zx-2092403-1.html?tab_type=thanks" class="iask_answer01b">1</a><em>&nbsp;封感谢信</em>
                                        <a target="_blank" href="http://iask.fh21.com.cn/zx-2092403-1.html?tab_type=gift" class="iask_answer01c">104</a><em>&nbsp;个礼物</em>
                                    </ol>
                                </dd>
                            </dl>
                            <!--用户部分end-->
                            <div class="iask_answer02  iask_detail03_2 ">
                                <ul class="iask_answer02_icon"></ul>
                                <div class="iask_answer02a">
                                    @if(isset($value->analyse) && !empty($value->analyse))
                                    <dl>
                                        <dt>病情分析：</dt>
                                        <dd>{!! $value->analyse !!}</dd>
                                    </dl>
                                    <dl>
                                        <dt>指导意见：</dt>
                                        <dd>{!! $value->suggestion !!}</dd>
                                    </dl>
                                    @else
                                    <dl>
                                        <dd>{!! $value->suggestion !!}</dd>
                                    </dl>
                                    @endif
                                    {{--追问 追答--}}
                                    <span>
                                         @if(isset($answers) && count($answers)!=0)
                                            @foreach($answers as $item)
                                                @if($item->answer_id == $value->id)
                                                    @if($item->type == 3)
                                                        <dl>
                                                            <dt style="color:#FF9010;">追问：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                    @endif
                                                    @if($item->type == 4)
                                                        <dl>
                                                            <dt>回答：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <!--guanggao-->
                            <!--guangaoend-->
                            <dl class="iask_answer03">
                                <dt>2016-11-04 13:49:23</dt>
                                <dd>
                                    <a href="javascript:void(0);" onclick="_style_display('tousu'); ts(406033021,1870856);"  id="mts_406033021" class="link03">投诉</a><span>|</span>
                                    <a target='_blank' href="{{url('')}}/question/add/1870856.html" class="link03 ask_to" style="display: none;" v-show="ask_question_visible">向TA提问</a>
                                    <a href="javascript:void(0);" class="link03 m_z" style="display:none;" v-show="supply_question_visible">继续追问</a><span>|</span>
                                    <a href="javascript:void(0);" onclick="adopt(this,103030277,406033021,2)" class="link03 w_c" style="display:none" v-show="adopt_question_visible">采纳回答</a>
                                </dd>
                            </dl>
                            <!--追问追答-->
                            <div class="iask_tiwen" id="a_reveal" style="margin:15px 0px 0px 95px;display:none">
                                <p id="a_reveal_406248768_fromtitle"></p>
                                <input type="hidden" id="answer_406248768" value="2092403">
                                <ol><textarea name="" cols="" rows="" id="a_reveal_406248768_content">请输入不少于5个字</textarea></ol>
                                <ul>
                                    <span id="a_reveal_406248768_postfrom"></span>
                                    <input type="button" onfocus="this.blur();" class="input02" onclick="box_hide('a_reveal_406248768')" value="取消">
                                </ul>
                                <img src="http://static.fh21.com.cn/images/iask/close01.gif" class="close" onclick="box_hide('a_reveal_406248768')">
                            </div>
                            <!--追问追答end-->
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
            <ul class="height12"></ul>
            {{--医生回答专区--}}
            <div class="iask_detail03">
                @if(isset($answers) && count($answers)!=0)
                    <?php $first_data = 0;?>
                    @foreach($answers as $key=>$value)
                        @if(isset($value->user->type) && isset($value->type) && $value->user->type == 1 && $value->type == 1)
                            @if(empty($first_data))
                            <ul class="iask_detail03_title">医生回答专区</ul>
                            <div class="iask_answer ">
                                <dl class="iask_answer01">
                                    {{--touxiang--}}
                                    <dt><a target='_blank' href="{{url('zx-1870856-1.html')}}"><img src="http://file.fh21.com.cn/fhfile1/M00/05/C5/ooYBAFRBB9yARcdSAAAggotM_5I671.jpg" /><span></span></a></dt>
                                    <dd>
                                        <ul>
                                            <a target='_blank' href="{{url('')}}/zx-1870856-1.html" class="link03">{{$value->user->really_name}}</a>
                                            <span>主治医师</span>
                                            <img src="http://static.fh21.com.cn/images/iask/bg07b.gif" />
                                            <em>因不能面诊，医生的建议仅供参考</em>
                                        </ul>
                                        <ol>
                                            <a target='_blank' href="{{url('/question/add/1870856.html')}}" class="iask_answer01a">{{--向TA提问--}}</a>
                                            <em>帮助网友：</em><span>50856</span><em>收到了：</em>
                                            <a target='_blank' href="{{url('/zx-1870856-1.html?tab_type=thanks')}}" class="iask_answer01b">16</a><em>&nbsp;封感谢信</em>
                                            <a target='_blank' href="{{url('/zx-1870856-1.html?tab_type=gift')}}" class="iask_answer01c">245</a><em>&nbsp;个礼物</em>
                                        </ol>
                                    </dd>
                                </dl>
                                <div class="iask_answer02 ">
                                    <ul class="iask_answer02_icon"></ul>
                                    <div class="iask_answer02a">
                                        @if(isset($value->analyse) && !empty($value->analyse))
                                            <dl>
                                                <dt>病情分析：</dt>
                                                <dd>{!! $value->analyse !!}</dd>
                                            </dl>
                                            <dl>
                                                <dt>指导意见：</dt>
                                                <dd>{!! $value->suggestion !!}</dd>
                                            </dl>
                                        @else
                                            <dl>
                                                <dd>{!! $value->suggestion !!}</dd>
                                            </dl>
                                        @endif
                                        {{--追问 追答--}}
                                        <span>
                                            @if(isset($answers) && count($answers)!=0)
                                                @foreach($answers as $item)
                                                    @if($item->answer_id == $value->id)
                                                        @if($item->type == 3)
                                                        <dl>
                                                            <dt style="color:#FF9010;">追问：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                        @endif
                                                        @if($item->type == 4)
                                                        <dl>
                                                            <dt>回答：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <dl class="iask_answer03">
                                    <dt>{{$value->created_at}}</dt>
                                    <dd>
                                        <a href="javascript:void(0);" onclick="_style_display('tousu'); ts(406033021,1870856);"  id="mts_406033021" class="link03">投诉<span>|</span></a>
                                        <a target='_blank' href="{{url('')}}/question/add/1870856.html" class="link03 ask_to" style="display: none;" v-show="create_question_visible">向TA提问<span>|</span></a>
                                        <a href="javascript:void(0);" class="link03 m_z" style="display:none;" v-show="supply_question_visible" v-on:click="partakeQuestionTrace('{{$value->id}}')">继续追问<span>|</span></a>
                                        <a href="javascript:void(0);" onclick="adopt(this,103030277,406033021,2)" class="link03 w_c" style="display:none" v-show="adopt_question_visible">采纳回答</a>
                                    </dd>
                                </dl>
                                {{--追问追答--}}
                                <div class="iask_tiwen" id="supply_question_visible_{{$value->id}}" style="margin:15px 0px 0px 95px;display:none">
                                    <p id='answer_supply_fromtitle'>继续追问</p>
                                    <ol>
                                        <div value="" class="ivu-input-wrapper ivu-input-type">
                                            <textarea class="ivu-input" placeholder="请输入不少于5个字" rows="6" v-model="answer.content" v-bind:value="content">  </textarea>
                                        </div>
                                    </ol>
                                    <ul>
                                        <i-input :value.sync="answer.captcha" placeholder="请输入验证码" style="width: 88px" v-on:click="changeCode"></i-input>
                                        <img id='code_img' :src="code_img" onclick='this.src=this.src.split("?")[0]+"?s="+Math.random()'>
                                        <a id="anotherCode" v-on:click="changeCode">换一个</a>

                                        <i-button type="primary" v-on:click="questionTrace('{{$value->id}}')" :loading="loading">
                                            <span v-if="!loading">确定</span>
                                            <span v-else>Loading...</span>
                                        </i-button>
                                        <i-button v-on:click="partakeQuestionTrace('{{$value->id}}')">取消</i-button>
                                    </ul>
                                    <i class="ivu-icon ivu-icon-close-round" style="font-size:20px" v-on:click="partakeQuestionTrace('{{$value->id}}')"></i>
                                </div>
                                {{--追问追答end--}}
                            </div>
                            @else
                                <div class="iask_answer iask_answer_2">
                                <dl class="iask_answer01">
                                    {{--touxiang--}}
                                    <dt><a target='_blank' href="{{url('')}}/zx-1290374-1.html"><img src="http://file.fh21.com.cn/fhfile1/M00/00/B1/ooYBAFOrjviABhQIAAAypm7eKIw925.jpg" /><span></span></a></dt>
                                    <dd>
                                        <ul>
                                            <a target='_blank' href="{{url('')}}/zx-1290374-1.html" class="link03">{{$value->user->really_name}}</a>
                                            <span>医师/住院医师</span>
                                            <img src="http://static.fh21.com.cn/images/iask/bg07b.gif" />
                                            <em>因不能面诊，医生的建议仅供参考</em>
                                        </ul>
                                        <ol>
                                            <a target='_blank' href="{{url('')}}/question/add/1290374.html" class="iask_answer01a">{{--向TA提问--}}</a>
                                            <em>帮助网友：</em><span>28224</span><em>收到了：</em>
                                            <a target='_blank' href="{{url('')}}/zx-1290374-1.html?tab_type=thanks" class="iask_answer01b">4</a><em>&nbsp;封感谢信</em>
                                            <a target='_blank' href="{{url('')}}/zx-1290374-1.html?tab_type=gift" class="iask_answer01c">59</a><em>&nbsp;个礼物</em>
                                        </ol>
                                    </dd>
                                </dl>
                                <div class="iask_answer02 ">
                                    <ul class="iask_answer02_icon"></ul>
                                    <div class="iask_answer02a">
                                        @if(isset($value->analyse) && !empty($value->analyse))
                                            <dl>
                                                <dt>病情分析：</dt>
                                                <dd>{!! $value->analyse !!}</dd>
                                            </dl>
                                            <dl>
                                                <dt>指导意见：</dt>
                                                <dd>{!! $value->suggestion !!}</dd>
                                            </dl>
                                        @else
                                            <dl>
                                                <dd>{!! $value->suggestion !!}</dd>
                                            </dl>
                                        @endif
                                        {{--追问 追答--}}
                                        <span>
                                            @if(isset($answers) && count($answers)!=0)
                                                @foreach($answers as $item)
                                                    @if($item->answer_id == $value->id)
                                                        @if($item->type == 3)
                                                        <dl>
                                                            <dt style="color:#FF9010;">追问：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                        @endif
                                                        @if($item->type == 4)
                                                        <dl>
                                                            <dt>回答：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <dl class="iask_answer03">
                                    <dt>{{$value->created_at}}</dt>
                                    <dd>
                                        <a href="javascript:void(0);" onclick="_style_display('tousu'); ts(406033021,1870856);"  id="mts_406033021" class="link03">投诉<span>|</span></a>
                                        <a target='_blank' href="{{url('')}}/question/add/1870856.html" class="link03 ask_to" style="display: none;" v-show="create_question_visible">向TA提问<span>|</span></a>
                                        <a href="javascript:void(0);" class="link03 m_z" style="display:none;" v-show="supply_question_visible" v-on:click="partakeQuestionTrace('{{$value->id}}')">继续追问<span>|</span></a>
                                        <a href="javascript:void(0);" onclick="adopt(this,103030277,406033021,2)" class="link03 w_c" style="display:none" v-show="adopt_question_visible">采纳回答</a>
                                    </dd>
                                </dl>
                                {{--追问追答--}}
                                <div class="iask_tiwen" id="supply_question_visible_{{$value->id}}" style="margin:15px 0px 0px 95px;display:none">
                                    <p id='answer_supply_fromtitle'>继续追问</p>
                                    <ol>
                                        <div value="" class="ivu-input-wrapper ivu-input-type">
                                            <textarea class="ivu-input" placeholder="请输入不少于5个字" rows="6" v-model="answer.content" v-bind:value="content">  </textarea>
                                        </div>
                                    </ol>
                                    <ul>
                                        <i-input :value.sync="answer.captcha" placeholder="请输入验证码" style="width: 88px" v-on:click="changeCode"></i-input>
                                        <img id='code_img' :src="code_img" onclick='this.src=this.src.split("?")[0]+"?s="+Math.random()'>
                                        <a id="anotherCode" v-on:click="changeCode">换一个</a>

                                        <i-button type="primary" v-on:click="questionTrace('{{$value->id}}')" :loading="loading">
                                            <span v-if="!loading">确定</span>
                                            <span v-else>Loading...</span>
                                        </i-button>
                                        <i-button v-on:click="partakeQuestionTrace('{{$value->id}}')">取消</i-button>
                                    </ul>
                                    <i class="ivu-icon ivu-icon-close-round" style="font-size:20px" v-on:click="partakeQuestionTrace('{{$value->id}}')"></i>
                                </div>
                                {{--追问追答end--}}
                            </div>
                            @endif
                            <?php $first_data++;?>
                        @endif
                    @endforeach
                @endif
            </div>
            <ul class="height12"></ul>
            {{--网友回答专区--}}
            <div class="iask_detail03">
                @if(isset($answers) && count($answers)!=0)
                    <?php $first_data = 0;?>
                    @foreach($answers as $key=>$value)
                        @if(isset($value->user->type) && isset($value->type) && $value->user->type == 0 && $value->type == 1)
                            @if(empty($first_data))
                                <ul class="iask_detail03_title">网友回答专区</ul>
                                <div class="iask_answer ">
                                    <dl class="iask_answer01">
                                        <dt><a href="javascript:void(0);"><img src="http://static.fh21.com.cn/images/passport/avator_13.jpg"><span></span></a></dt>
                                        <dd>
                                            <ul><a href="javascript:void(0);" class="link03"></a><span>{{$value->user->name}}</span></ul>
                                        </dd>
                                    </dl>
                                    <div class="iask_answer02">
                                        <ul class="iask_answer02_icon"></ul>
                                        <div class="iask_answer02a">
                                            <dl>
                                                <dd>{!! $value->suggestion !!}</dd>
                                            </dl>
                                            {{--追问 追答--}}
                                            <span>
                                                @if(isset($answers) && count($answers)!=0)
                                                    @foreach($answers as $item)
                                                        @if($item->answer_id == $value->id)
                                                            @if($item->type == 3)
                                                                <dl>
                                                            <dt style="color:#FF9010;">追问：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                            @endif
                                                            @if($item->type == 4)
                                                                <dl>
                                                            <dt>回答：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <dl class="iask_answer03">
                                        <dt>{{$value->created_at}}</dt>
                                        <dd>
                                            <a href="javascript:void(0);" onclick="_style_display('tousu'); ts(406033021,1870856);"  id="mts_406033021" class="link03">投诉<span>|</span></a>
                                            <a target='_blank' href="{{url('')}}/question/add/1870856.html" class="link03 ask_to" style="display: none;" v-show="create_question_visible">向TA提问<span>|</span></a>
                                            <a href="javascript:void(0);" class="link03 m_z" style="display:none;" v-show="supply_question_visible" v-on:click="partakeQuestionTrace('{{$value->id}}')">继续追问<span>|</span></a>
                                            <a href="javascript:void(0);" onclick="adopt(this,103030277,406033021,2)" class="link03 w_c" style="display:none" v-show="adopt_question_visible">采纳回答</a>
                                        </dd>
                                    </dl>
                                    {{--追问追答--}}
                                    <div class="iask_tiwen" id="supply_question_visible_{{$value->id}}" style="margin:15px 0px 0px 95px;display:none">
                                        <p id='answer_supply_fromtitle'>继续追问</p>
                                        <ol>
                                            <div value="" class="ivu-input-wrapper ivu-input-type">
                                                <textarea class="ivu-input" placeholder="请输入不少于5个字" rows="6" v-model="answer.content" v-bind:value="content">  </textarea>
                                            </div>
                                        </ol>
                                        <ul>
                                            <i-input :value.sync="answer.captcha" placeholder="请输入验证码" style="width: 88px" v-on:click="changeCode"></i-input>
                                            <img id='code_img' :src="code_img" onclick='this.src=this.src.split("?")[0]+"?s="+Math.random()'>
                                            <a id="anotherCode" v-on:click="changeCode">换一个</a>

                                            <i-button type="primary" v-on:click="questionTrace('{{$value->id}}')" :loading="loading">
                                                <span v-if="!loading">确定</span>
                                                <span v-else>Loading...</span>
                                            </i-button>
                                            <i-button v-on:click="partakeQuestionTrace('{{$value->id}}')">取消</i-button>
                                        </ul>
                                        <i class="ivu-icon ivu-icon-close-round" style="font-size:20px" v-on:click="partakeQuestionTrace('{{$value->id}}')"></i>
                                    </div>
                                    {{--追问追答end--}}
                                </div>
                            @else
                                <div class="iask_answer iask_answer_2">
                                    <dl class="iask_answer01">
                                        <dt><a href="javascript:void(0);"><img src="http://static.fh21.com.cn/images/passport/avator_13.jpg"><span></span></a></dt>
                                        <dd>
                                            <ul><a href="javascript:void(0);" class="link03"></a><span>{{$value->user->name}}</span></ul>
                                        </dd>
                                    </dl>
                                    <div class="iask_answer02">
                                        <ul class="iask_answer02_icon"></ul>
                                        <div class="iask_answer02a">
                                            <dl>
                                                <dd>{!! $value->suggestion !!}</dd>
                                            </dl>
                                            {{--追问 追答--}}
                                            <span>
                                                @if(isset($answers) && count($answers)!=0)
                                                    @foreach($answers as $item)
                                                        @if($item->answer_id == $value->id)
                                                            @if($item->type == 3)
                                                                <dl>
                                                            <dt style="color:#FF9010;">追问：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                            @endif
                                                            @if($item->type == 4)
                                                                <dl>
                                                            <dt>回答：</dt>
                                                            <dd>{!! $item->suggestion !!}</dd>
                                                        </dl>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <dl class="iask_answer03">
                                        <dt>{{$value->created_at}}</dt>
                                        <dd>
                                            <a href="javascript:void(0);" onclick="_style_display('tousu'); ts(406033021,1870856);"  id="mts_406033021" class="link03">投诉<span>|</span></a>
                                            <a target='_blank' href="{{url('')}}/question/add/1870856.html" class="link03 ask_to" style="display: none;" v-show="create_question_visible">向TA提问<span>|</span></a>
                                            <a href="javascript:void(0);" class="link03 m_z" style="display:none;" v-show="supply_question_visible" v-on:click="partakeQuestionTrace('{{$value->id}}')">继续追问<span>|</span></a>
                                            <a href="javascript:void(0);" onclick="adopt(this,103030277,406033021,2)" class="link03 w_c" style="display:none" v-show="adopt_question_visible">采纳回答</a>
                                        </dd>
                                    </dl>
                                    {{--追问追答--}}
                                    <div class="iask_tiwen" id="supply_question_visible_{{$value->id}}" style="margin:15px 0px 0px 95px;display:none">
                                        <p id='answer_supply_fromtitle'>继续追问</p>
                                        <ol>
                                            <div value="" class="ivu-input-wrapper ivu-input-type">
                                                <textarea class="ivu-input" placeholder="请输入不少于5个字" rows="6" v-model="answer.content" v-bind:value="content">  </textarea>
                                            </div>
                                        </ol>
                                        <ul>
                                            <i-input :value.sync="answer.captcha" placeholder="请输入验证码" style="width: 88px" v-on:click="changeCode"></i-input>
                                            <img id='code_img' :src="code_img" onclick='this.src=this.src.split("?")[0]+"?s="+Math.random()'>
                                            <a id="anotherCode" v-on:click="changeCode">换一个</a>

                                            <i-button type="primary" v-on:click="questionTrace('{{$value->id}}')" :loading="loading">
                                                <span v-if="!loading">确定</span>
                                                <span v-else>Loading...</span>
                                            </i-button>
                                            <i-button v-on:click="partakeQuestionTrace('{{$value->id}}')">取消</i-button>
                                        </ul>
                                        <i class="ivu-icon ivu-icon-close-round" style="font-size:20px" v-on:click="partakeQuestionTrace('{{$value->id}}')"></i>
                                    </div>
                                    {{--追问追答end--}}
                                </div>
                            @endif
                            <?php $first_data++;?>
                        @endif
                    @endforeach
                @endif
            </div>
            {{--投诉弹窗--}}
            <div class="iask_win iask_win04" style="left:20%;position:fixed;top:200px;z-index:99;display:none; _position: absolute;_top: expression(documentElement.scrollTop + documentElement.clientHeight-this.offsetHeight);" id="tousu">
                <ul class="iask_win_title">
                    投诉 <img src="http://static.fh21.com.cn/images/iask/close02.gif" onclick="document.getElementById('tousu').style.display='none'" />
                </ul>
                <div class="iask_win04a">
                    <p>感谢您对我们的帮助！</p>
                    <dl>
                        <dt>投诉类型：</dt>
                        <dd style="padding-top:5px;*padding-top:4px;">
                            <select name="keywords" id="keyword_question" style="display:none">
                                <option value = '-1'>--请选择--</option>
                                <option value = '0'>含有反动的内容</option>
                                <option value = '1'>含有人身攻击的内容</option>
                                <option value = '2'>含有广告性质的内容</option>
                                <option value = '3'>涉及违法犯罪的内容</option>
                                <option value = '4'>含有违背伦理道德的内容</option>
                                <option value = '5'>含色情、暴力、恐怖的内容</option>
                                <option value = '6'>含有恶意无聊灌水的内容</option>
                            </select>
                            <select name="keywords" id="keyword_answer" style="display:none">
                                <option value = '-1'>--请选择--</option>
                                <option value = '0'>涉嫌广告</option>
                                <option value = '1'>色情暴力</option>
                                <option value = '2'>无意义回答</option>
                                <option value = '3'>其他投诉理由</option>
                            </select>
                        </dd>
                    </dl>
                    <dl>
                        <dt>投诉说明：</dt>
                        <dd><textarea name="content" id="content_ts" cols="" rows="" >请输入5-200个字</textarea></dd>
                    </dl>
                    <ul>
                        <input type="button" onfocus="this.blur();" id="ts_btn" class="input01" value="提交" />
                        <input type="button" onfocus="this.blur();" class="input02" onclick="document.getElementById('tousu').style.display='none'" value="取消" />
                    </ul>
                </div>
            </div>
            {{--投诉弹窗end--}}

            {{--类似问题--}}
            <ul class="height12"></ul>
            <div class="iask10">
                <div class="iask10_tag" style="height:56px;">
                    <ul id="tag_sameQuestion" class="curr" onclick="changeTag(1)">类似问题</ul>
                </div>
                <ul class="iask_catalog02 iask_catalog02c" id='sameQuestion'>
                    <li><a target='_blank' href="{{url('')}}/question/35038628.html" title="我晚上难以入眠易醒请问用什么方法可以治疗">我晚上难以入眠易醒请问用什么方法可以治疗</a></li>
                    <li><a target='_blank' href="{{url('')}}/question/41821663.html" title="伽玛刀治疗">伽玛刀治疗</a></li>
                    <li><a target='_blank' href="{{url('')}}/question/761520.html" title="治疗阴道炎？治疗阴道炎？治疗阴道炎？">治疗阴道炎？治疗阴道炎？治疗阴道炎？</a></li>
                    <li><a target='_blank' href="{{url('')}}/question/761524.html" title="治疗阴道炎药物，治疗阴道炎药物，治疗阴道炎药物？">治疗阴道炎药物，治疗阴道炎药物，治疗阴道炎药物？</a></li>
                    <li><a target='_blank' href="{{url('')}}/question/825318.html" title="治疗痔疮除了手术治疗还有最佳治疗偏方吗？">治疗痔疮除了手术治疗还有最佳治疗偏方吗？</a></li>
                    <li><a target='_blank' href="{{url('')}}/question/2661619.html" title="治疗前列腺炎需要排毒治疗吗排毒后还有什么治疗？">治疗前列腺炎需要排毒治疗吗排毒后还有什么治疗？</a></li>
                    <li><a target='_blank' href="{{url('')}}/question/13466055.html" title="治疗非常小的卵巢囊肿？什么是保守治疗和微创的治疗">治疗非常小的卵巢囊肿？什么是保守治疗和微创的治疗</a></li>
                    <li><a target='_blank' href="{{url('')}}/question/15858932.html" title="治疗哮喘是中医治疗好，还是西医治疗好？">治疗哮喘是中医治疗好，还是西医治疗好？</a></li>
                    <li><a target='_blank' href="{{url('')}}/question/16099134.html" title="治疗抑郁症药物治疗重要还是心理治疗重要">治疗抑郁症药物治疗重要还是心理治疗重要</a></li>
                    <li><a target='_blank' href="{{url('')}}/question/18820314.html" title="治疗白带异常有异味怎样治疗白带异常效果好治疗白带">治疗白带异常有异味怎样治疗白带异常效果好治疗白带</a></li>
                </ul>
            </div>

            {{--类似问题end--}}
            {{-- <ul class="height12">曾经的广告位</ul> --}}
            <ul class="height12"></ul>
            <div class="iask_border02">
                <ul class="iask_border02_head">
                    <ul><span>咨询&nbsp;</span>相关专家</ul>
                    <a target='_blank' href="{{url('')}}/doctor/list-0-0.html" class="more01">更多</a>
                </ul>
                <ul class="height10"></ul>
                <ul class="height10"></ul>

                <div class="iask05_con">
                    <div>
                        <dl>
                            <dt><a target='_blank' href="{{url('')}}/zx-3028205-1.html"><img src="http://file.fh21.com.cn/fhfile1/M00/0F/33/o4YBAFVR_a-AHdiNAAAgcpPJMY027.jpeg" /><span></span></a></dt>
                            <dd>
                                <p><strong><a target='_blank' href="{{url('')}}/zx-3028205-1.html" class="link03">刘宇鸿</a></strong></p>
                                <span>在线</span>
                                <a target='_blank' href="{{url('')}}/question/add/3028205.html" class="iask05Link">向TA提问</a>
                            </dd>
                        </dl>
                        <ul>
                            <p></p>
                            <li>
                                TA帮助了<span>147</span>人
                                目前共收到<a target='_blank' href="{{url('')}}/zx-3028205-1.html?tab_type=thanks" class="link02">0</a>封感谢信
                                <a target='_blank' href="{{url('')}}/zx-1290374-1.html?tab_type=gift" class="link02">29</a>个礼物<img src="http://static.fh21.com.cn/images/iask/point03b.gif" />
                            </li>
                        </ul>
                    </div>
                    <div>
                        <dl>
                            <dt><a target='_blank' href="{{url('')}}/zx-2983776-1.html"><img src="http://file.fh21.com.cn/fhfile1/M00/0E/AC/oYYBAFU_jxWAXFimAAA0_VAQcpI216.jpg" /><span></span></a></dt>
                            <dd>
                                <p><strong><a target='_blank' href="{{url('')}}/zx-2983776-1.html" class="link03">吴家豪</a></strong></p>
                                <span>在线</span>
                                <a target='_blank' href="{{url('')}}/question/add/2983776.html" class="iask05Link">向TA提问</a>
                            </dd>
                        </dl>
                        <ul>
                            <p></p>
                            <li>
                                TA帮助了<span>24</span>人
                                目前共收到<a target='_blank' href="{{url('')}}/zx-2983776-1.html?tab_type=thanks" class="link02">0</a>封感谢信
                                <a target='_blank' href="{{url('')}}/zx-1290374-1.html?tab_type=gift" class="link02">18</a>个礼物<img src="http://static.fh21.com.cn/images/iask/point03b.gif" />
                            </li>
                        </ul>
                    </div>
                    <div>
                        <dl>
                            <dt><a target='_blank' href="{{url('')}}/zx-2981461-1.html"><img src="http://file.fh21.com.cn/fhfile1/M00/0E/A3/ooYBAFU-9yKAMVDeAAAlRDY4kac989.jpg" /><span></span></a></dt>
                            <dd>
                                <p><strong><a target='_blank' href="{{url('')}}/zx-2981461-1.html" class="link03">刘合珍</a></strong></p>
                                <span>在线</span>
                                <a target='_blank' href="{{url('')}}/question/add/2981461.html" class="iask05Link">向TA提问</a>
                            </dd>
                        </dl>
                        <ul>
                            <p></p>
                            <li>
                                TA帮助了<span>199</span>人
                                目前共收到<a target='_blank' href="{{url('')}}/zx-2981461-1.html?tab_type=thanks" class="link02">0</a>封感谢信
                                <a target='_blank' href="{{url('')}}/zx-1290374-1.html?tab_type=gift" class="link02">14</a>个礼物<img src="http://static.fh21.com.cn/images/iask/point03b.gif" />
                            </li>
                        </ul>
                    </div>
                    <div>
                        <dl>
                            <dt><a target='_blank' href="{{url('')}}/zx-2981461-1.html"><img src="http://file.fh21.com.cn/fhfile1/M00/0E/A3/ooYBAFU-9yKAMVDeAAAlRDY4kac989.jpg" /><span></span></a></dt>
                            <dd>
                                <p><strong><a target='_blank' href="{{url('')}}/zx-2981461-1.html" class="link03">刘合珍</a></strong></p>
                                <span>在线</span>
                                <a target='_blank' href="{{url('')}}/question/add/2981461.html" class="iask05Link">向TA提问</a>
                            </dd>
                        </dl>
                        <ul>
                            <p></p>
                            <li>
                                TA帮助了<span>199</span>人
                                目前共收到<a target='_blank' href="{{url('')}}/zx-2981461-1.html?tab_type=thanks" class="link02">0</a>封感谢信
                                <a target='_blank' href="{{url('')}}/zx-1290374-1.html?tab_type=gift" class="link02">14</a>个礼物<img src="http://static.fh21.com.cn/images/iask/point03b.gif" />
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div id='symptom_part'  class="iask13" style="display:none;margin-top:12px;"></div>

            <ul class="height12"></ul>
            {{---新加的 小柔换量合作------}}
            <div class="iask_border02">
                <ul class="iask_border02_head">
                    <ul><span>神经内科&nbsp;</span>图片</ul>
                </ul>
                <ul class="iask_catalog03" id="wwwpiclists">
                </ul>
            </div>
        </ul>
        <ul class="w300 right">
            <div class="clear">{{--右侧跟随--}}
                <div id="right1Ad" style="clear:both;padding:2px;position:relative;zoom:1;">
                    <img class="fhPop" src="http://www.fh21.com.cn/templets/image/fhtg.gif" alt="人类健康网推广" style="position:absolute;right:0;_right:-1px;bottom:0;_bottom:-1px;" />
                </div>

                <ul class="height12"></ul>
                <input type="hidden" id='recommendCid1' value="6">
                <div class="iask_border01">
                    <ul class="iask_border01_head iask_border01_head03">
                        <ul><span><span>内科</span>在线的医生(<em>742</em>名)</span></ul>
                    </ul>
                    <ul class="onLineDoctor">
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

                    </ul>
                </div>

                <ul class="height12"></ul>
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
                <ul class="height12"></ul>

                {{--相关疾病--}}
                <ul class="height12"></ul>
                <input type='hidden' id='host_disease' value='{{url('disease/index')}}' />
                {{--相关疾病end--}}

                <div>
                    <ul class="height12"></ul>
                </div>
                
            </div>
        </ul>
        <div class="clearfloat"></div>
    </div>

    <script type="text/javascript">
        Wind.use('jquery','vue','iview','vue_resource','cookie',function() {
            new Vue({
                el: '#appContent',
                ready: function () {
                    this.$http.post(this.apiUrl,{}).then((response) => {
                        if(response.data.status == true){
                            this.user_id = response.data.user_id;
                            this.user_name = response.data.user_name;
                            this.answer.token = response.data.token;

                            if(parseInt(this.user_id) === parseInt(this.q_user_id)){
                                this.partake_answer_visible = false;
                                this.ask_question_visible = false;
                                this.partake_question_visible = true;
                                this.supply_question_visible = true;
                                this.adopt_question_visible = true;
                            }
                        }
                    }).catch(function (response) {
                        console.log(response);
                    });
                },
                data: {
                    loading: false,
                    q_id: "{{$question->id}}",
                    q_user_id: "{{$question->user_id}}",
                    user_id: '',
                    user_name: '',
                    answer: {
                        content: '',
                        token: '',
                        captcha: '',
                    },
                    partake_answer_visible: true,
                    partake_question_visible: false,
                    add_answer_visible: false,
                    add_question_visible: false,
                    supply_question_visible: false,
                    adopt_question_visible: false,
                    ask_question_visible: false,
                    create_question_visible: true,

                    code_img: "{{captcha_src('flat')}}",
                    apiUrl: "{{url('index/checklogin')}}",
                    answerStoreUrl: "{{url('answer/store')}}",
                    answerSupplyUrl: "{{url('answer/supply')}}",

                    questionSupplyUrl: "{{url('question/supply')}}",
                    questionTraceUrl: "{{url('question/trace')}}",
                    loginUrl: "{{url('user/login')}}",
                },
                methods: {
                    submit: function () {
                        var formData = JSON.stringify(this.question);
                        if(!this.question.title.trim()){
                            this.$Notice.warning({
                                title: '错误提示',
                                desc: '请填写标题！',
                                duration: 3,
                            });
                            return false;
                        }

                        if(!this.question.description.trim()){
                            this.$Notice.warning({
                                title: '错误提示',
                                desc: '请填写描述！',
                                duration: 3,
                            });
                            return false;
                        }

                        if(!this.question.captcha.trim()){
                            this.$Notice.warning({
                                title: '错误提示',
                                desc: '请填写验证码！',
                                duration: 3,
                            });
                            return false;
                        }

                        if(!this.question.year.trim()){
                            this.$Notice.warning({
                                title: '错误提示',
                                desc: '请选择出生年份！',
                                duration: 3,
                            });
                            return false;
                        }

                        this.$http.post(this.apiUrl, formData).then((response) => {
                            if(response.data.status == true){
                            this.$Notice.success({
                                title: '成功提示',
                                desc: response.data.message,
                                duration: 3,
                            });
                        }else{
                            this.$Notice.warning({
                                title: '错误提示',
                                desc: response.data.message,
                                duration: 3,
                            });
                            this.changeCode();
                            return false;
                        }
                        }).catch(function (response) {
                                console.log(response)
                        });
                    } ,
                    changeCode:function () {
                        this.code_img = this.code_img.split("?")[0]+"?s="+Math.random();
                    },
                    partakeAnswer:function () {
                        if(this.add_answer_visible == false){
                            if(this.user_id){
                                this.add_answer_visible = true;
                            } else {
                                self.location= this.loginUrl;
                            }
                        }else {
                            this.add_answer_visible = false;
                        }
                    },
                    {{--追问--}}
                    partakeQuestion:function () {
                        if(this.add_question_visible == false){
                            if(this.user_id){
                                this.add_question_visible = true;
                            } else {
                                self.location= this.loginUrl;
                            }
                        }else {
                            this.add_question_visible = false;
                        }
                    },

                    partakeQuestionTrace:function (answer_id) {

                        $("#supply_question_visible_"+answer_id).toggle();

                    },
                    {{--添加答案--}}
                    answerStore:function (){
                        this.loading = true;
                        this.$http.post(this.answerStoreUrl,{'q_id':this.q_id,'content':this.answer.content,'_token':this.answer.token,'captcha':this.answer.captcha}).then((response) => {
                            if(response.data.status == true){
                                this.$Notice.success({
                                    title: '操作成功!',
                                    desc: response.data.message
                                });
                                this.loading = false;
                                this.add_answer_visible = false;
                                this.answer.content = '';
                            }else{
                                this.$Notice.warning({
                                    title: '错误提示!',
                                    desc: response.data.message,
                                    duration: 3,
                                });
                                this.changeCode();
                                this.loading = false;
                            };
                        }).catch(function (response) {
                            console.log(response);
                        });
                    },
                    {{--问题补充--}}
                    questionSupply:function () {
                        this.loading = true;
                        this.$http.post(this.questionSupplyUrl,{'q_id':this.q_id,'content':this.answer.content,'_token':this.answer.token,'captcha':this.answer.captcha}).then((response) => {
                            if(response.data.status == true){
                            this.$Notice.success({
                                title: '操作成功!',
                                desc: response.data.message
                            });
                            this.loading = false;
                            this.add_question_visible = false;
                            this.answer.content = '';
                        }else{
                            this.$Notice.warning({
                                title: '错误提示!',
                                desc: response.data.message,
                                duration: 3,
                            });
                            this.changeCode();
                            this.loading = false;
                        };
                        }).catch(function (response) {
                            console.log(response);
                        });
                    },
                    {{--追问--}}
                    questionTrace:function (answer_id) {
                        this.loading = true;
                        this.$http.post(this.questionTraceUrl,{'q_id':this.q_id,'content':this.answer.content,'_token':this.answer.token,'captcha':this.answer.captcha,'answer_id':answer_id}).then((response) => {
                            if(response.data.status == true){
                            this.$Notice.success({
                                title: '操作成功!',
                                desc: response.data.message
                            });
                            this.loading = false;
                            this.partakeQuestionTrace(answer_id);
                            this.answer.content = '';
                        }else{
                            this.$Notice.warning({
                                title: '错误提示!',
                                desc: response.data.message,
                                duration: 3,
                            });
                            this.changeCode();
                            this.loading = false;
                        };
                        }).catch(function (response) {
                            console.log(response);
                        });
                    },

                    getName: function() {
                        return this.name;
                    },
                    setName: function(name) {
                        this.name = name;
                    }
                }
            });
        });
    </script>

@stop