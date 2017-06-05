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

    <!--页面主内容区域开始-->
    <!-- 引入验证码文开始件 -->
    <style type="text/css">
        .hide{display:none;}
        #code_img{width:70px;height:30px;margin-left:7px;border:1px solid #d9dce1;vertical-align:middle;cursor:pointer;}
        .progress { position:relative; width:35%; border: 1px solid #ddd; padding: 1px; border-radius: 3px;margin-left:58%;display:none;}
        .bar { background-color: #B4F5B4; width:0%; height:33px;line-height:33px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:11px;left:50%;}
        .admin03b8{padding-bottom:12px;}
        .admin03b8 span{color:#ff0000;padding-right:3px;font-weight:bold;}
        .admin03b8 p{display:inline;position:relative;padding:0 10px 0 22px;}
        .admin03b8 p input{position: absolute;left:0;top:-3px;}
        .admin03b8_2 p{padding:0 55px 0 5px;text-align:right;}
        .admin03b8_2 select{width:100px;height:30px;font-size:14px;color:#333;font-family:"Microsoft YaHei";}
        .admin03b8_2 p em{position: absolute;left:28px;top:-3px;font-style:normal;}
        .admin03b8_2 label {display: inline;}
        .patientInfo{
            margin-left:25px;
            width:100%;
            border-collapse: collapse;
            font-size: 14px;
            color: #666;
        }

        .patientInfo tr {
            height: 40px;
        }

        .patientInfo .status{
            width: 90px;
            padding:0px 2px;
        }
        .patientInfo .required{
            padding-right: 5px;
            color:red;
        }

        .patientInfo select{
            height: 30px;
            line-height:30px;
            font-size: 14px;
            color: #333;
            font-family: "Microsoft YaHei";
            width:112px;
            position:relatvie;
            border:1px solid #D4D4D4;
        }

        .patientInfo .radio{
            height: 30px;
            font-size: 14px;
            padding: 0 7px;
            color: #535353;
            outline: none;
        }

        .patientInfo .code{
            height: 30px;
            line-height:30px;
            width:62px;
            font-size: 14px;
            padding: 0 7px;
            color: #000;
            outline: none;
            border: 1px solid #d4d4d4;
        }

        .patientInfo td div{
            float:left;
        }

        .patientInfo .multline{
            height:50px;
        }
        .patientInfo .tip{
            float:left;
            display:inline-block;
            width:220px;
            height:30px;
            background: url("http://static.fh21.com.cn/images/iask/tipbg2.gif");
            display:none;
            margin-left:10px;
        }

        .patientInfo .tiperror,.patientInfo .tipwarning{
            margin: 0px 5px 0px 15px;
        }

        .patientInfo .tipsuccess{
            margin: 6px 5px 0px 15px;
        }
        .patientInfo .content{
            display:inline-block;
            margin: 8px 5px 0px 10px;
        }
        .btn_upload_case {
            border-radius: 2px;
            background: #e9e9e9;
            border-width: 1px;
            border-color: #d8d8d8;
            color: #333;
            text-shadow: none;
            text-align: center;
            font-size: 14px;
        }
    </style>

    <!--页面主内容区域开始-->
    <div class="main_content">
        <div class="qs_left">
            <div class="qs_left_con">
                <h2 class="qs01">问答流程</h2>
                <ul class="qs02">
                    填写好您的症状，描述清楚您的健康问题
                </ul>
                <ul class="qs02 qs02a">
                    等待医生回答，十分钟内就会有回答！如果您不满意，还可以追问哦！
                </ul>
                <ul class="height15"></ul>
                <h2 class="qs01">向您承诺</h2>
                <ul class="qs02 qs02b">
                    全国数万专业医生<br />免费提供健康咨询<br />十分钟内即时解答
                </ul>
            </div>
            <ul class="qs_left_bg"></ul>
        </div>
        <div id="appContent" class="qs_right">

            <dl class="qs05" style="display:;">
                <dt><a href="{{url('doctor/detail?uid=1290374')}}" target="_blank" title="吴莉"><img src="http://file.fh21.com.cn/fhfile1/M00/00/B1/ooYBAFOrjviABhQIAAAypm7eKIw925.jpg" /></a></dt>
                <dd>
                    <ul><strong><a href="{{url('')}}/doctor/detail?uid=1290374" target="_blank">吴莉</a></strong>项城市花园社区卫生服务中心&nbsp;&nbsp;医师/住院医师</ul>
                    <ol title="妇产科，内科常见病，熟练掌握了内科常见病，多发病诊治，愿意利用所学知识服务更多的患者">
                        <strong>擅长：</strong>妇产科，内科常见病，熟练掌握了内科常见病，多发病诊治，愿意利用所学知识服务更多的患者<a href="{{url('')}}/doctor/detail?uid=1290374" target="_blank">[详细]</a>
                    </ol>
                </dd>
            </dl>
            <form enctype="application/x-www-form-urlencoded;charset=UTF-8">
                <div class="qs04">
                    <ul class="qs04a"></ul>
                    <ul class="qs04b">
                        <style type="text/css">
                            #asktitle {
                                float: left;
                                border: 1px solid #d4d4d4;
                                width: 443px;
                                height: 32px;
                                line-height: 32px \9;
                                font-size: 14px;
                                padding: 0 7px;
                                color: #535353;
                                vertical-align: top;
                                outline: none;
                            }
                        </style>
                        <ul class="qs04b1"><span style="color:#f70303;padding-right:7px;">*</span><h2>标题</h2><span>(5-25字)</span></ul>
                        <ul class="qs04b2">
                            <div>
                                <i-input :value.sync="question.title" placeholder="请简述您的问题作为标题"></i-input>
                            </div>
                            <p>白带增多，小肚子涨是怎么回事？该怎么治疗？</p>
                        </ul>

                        <ul class="qs04b1"><span style="color:#f70303;padding-right:7px;">*</span><h2>病情描述</h2><span>(20-500字)</span></ul>
                        <ul class="qs04b2">
                            <div>
                                <i-input :value.sync="question.description" type="textarea" :autosize="{minRows: 4,maxRows: 8}" placeholder="请填写:比如症状持续时间，以前接受过什么治疗，服用过什么药物，是否过敏，需要什么帮助等"></i-input>
                            </div>
                            <p>我今年20岁，15岁开始来例假的，以前月经正常，现在五个月没来月经了，已经排除怀孕，但白带增多，有时候有点偏黄，小肚子也有点涨涨的感觉，请问是什么回事？该怎么治疗？</p>
                        </ul>


                        <ul class="qs04b1"><span style="color:#f70303;padding-right:7px;">*</span><h2>想得到怎样的帮助?</h2><span>(20-500字)</span></ul>
                        <ul class="qs04b2">
                            <div>
                                <i-input :value.sync="question.help" type="textarea" :autosize="{minRows: 4,maxRows: 8}" placeholder="请填写:比如症状持续时间，以前接受过什么治疗，服用过什么药物，是否过敏，需要什么帮助等"></i-input>
                            </div>
                            <p>我今年20岁，15岁开始来例假的，以前月经正常，现在五个月没来月经了，已经排除怀孕，但白带增多，有时候有点偏黄，小肚子也有点涨涨的感觉，请问是什么回事？该怎么治疗？</p>
                        </ul>

                        <ul class="qs04b1"><h2>上传图片</h2></ul>
                        <div id="uploader-demo">
                            <div id="fileList" class="uploader-list"></div>
                            <div id="filePicker">选择图片</div>
                        </div>
                        <!-- 图片上传后的显示区域		-->
                        <div style='clear:both;' class='show_upload_img'></div>
                    </ul>
                    <ul class="qs04c"></ul>
                </div>

                <h2 id="personalInformation" class="qs03 qs03b">患者信息</h2>
                <div class="iask_tw02d">
                    <table class="patientInfo">
                        <tr>
                            <td class="status">
                                <span class="required">*</span>
                                性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：
                            </td>
                            <td>
                                <div>
                                    <Radio-group :model.sync="question.sex" type="button">
                                        <Radio value="1">男</Radio>
                                        <Radio value="2">女</Radio>
                                    </Radio-group>
                                </div>
                                <div id="sex_ts" class="tip"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="status">
                                <span class="required">*</span>
                                出生日期：
                            </td>
                            <td>
                                <div>
                                    <i-select :model.sync="question.year" style="width:200px">
                                        <i-option v-for="year in years" :value="year">@{{ year }}年</i-option>
                                    </i-select>
                                </div>
                                <div id="age_ts" class="tip"></div>
                            </td>
                        </tr>
                        <tr class="multline">
                            <td class="status">
                                <span class="required">*</span>
                                验&nbsp;&nbsp;证&nbsp;&nbsp;码：
                            </td>
                            <td>
                                <div>
                                    <i-input :value.sync="question.captcha" placeholder="请输入验证码" style="width: 88px"></i-input>
                                    <img id='code_img' :src="code_img" onclick='this.src=this.src.split("?")[0]+"?s="+Math.random()'>
                                    <a id="anotherCode" v-on:click="changeCode">换一个</a>
                                </div>
                                <div id="code_ts" class="tip"></div>
                            </td>
                        </tr>
                    </table>
                    <p class='submitQ'>
                        <input id="qsubmit" name="qsubmit" type="button" value="提交问题" v-on:click="submit"/>
                    </p>
                    <input id="dosubmit" name="dosubmit" type="hidden" value="0" />
                    <input v-model="question._token" name="_token" type="hidden" value="{{csrf_token()}}"/>
                </div>
            </form>
        </div>
        <div class="clearfloat"></div>
    </div>

    <!--页面主内容区域结束-->
    <script type="text/javascript">
        Wind.css('webuploader');
        Wind.use('jquery','vue','iview','vue_resource','webuploader',function() {
            // 初始化Web Uploader
            var uploader = WebUploader.create({
                // 选完文件后，是否自动上传。
                auto: true,
                // swf文件路径
                swf: base_url + '/assets/frontend/util_libs/webuploader/Uploader.swf',
                // 文件接收服务端。
                server: 'http://webuploader.duapp.com/server/fileupload.php',
                // 选择文件的按钮。可选。
                // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                pick: '#filePicker',
                // 只允许选择图片文件。
                accept: {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes: 'image/*'
                }
            });

            new Vue({
                el: '#appContent',
                ready: function () {
                    var datatime=new Date();
                    var current_year = datatime.getFullYear();
                    for(var i=0;i <= 100;i++){
                        this.years.push((current_year-i).toString());
                    }
                },
                data: {
                    years: [],
                    images: [],
                    visible: false,
                    code_img: "{{captcha_src('flat')}}",
                    apiUrl: "{{url('center/question/store')}}",
                    successUrl: "{{url('center/question/create')}}",
                    question: {
                        year: '',
                        title: '',
                        description: '',
                        help: '',
                        category_id: '',
                        sex: '1',
                        captcha: '',
                        _token: '',
                    }
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
                            //self.location= this.successUrl;
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
                        })
                    } ,
                    changeCode:function () {
                        this.code_img = this.code_img.split("?")[0]+"?s="+Math.random();
                    }
                }
            });
        });
    </script>
@stop