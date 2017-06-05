
@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('assets/frontend/center/safe.css')}}">
@stop

@section('content')

    <div id="main">
        <div class="mod-main mod-comm">
            <div class="mt">
                <h3>修改登录密码</h3>
            </div>
            <div class="mc">
                <div id="sflex03" class="stepflex ">
                    <dl class="first doing">
                        <dt class="s-num">1</dt>
                        <dd class="s-text">验证身份<s></s><b></b></dd>
                        <dd></dd>
                    </dl>
                    <dl class="normal ">
                        <dt class="s-num">2</dt>
                        <dd class="s-text">修改登录密码<s></s><b></b></dd>
                    </dl>
                    <dl class="last">
                        <dt class="s-num">&nbsp;</dt>
                        <dd class="s-text">完成<s></s><b></b></dd>
                    </dl>
                </div>

                {{ Form::open(array('url' => '', 'method' => 'POST','class'=>'layui-form')) }}
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: 250px;">已验证手机：</label>
                    <div class="layui-input-block ">
                        <input type="text" value="{{encodeString($result->mobile,3,3)}}" class="layui-input layui-disabled" style="width: 200px;">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: 250px;"><em>*</em>验证码：</label>
                    <div class="layui-input-inline ">
                        <input type="text" value="" name="captcha" id="captcha" lay-verify="required" placeholder="请输入验证码" class="layui-input" style="width: 200px;">
                    </div>
                    <div class="layui-input-inline" style="width: 120px;">
                        <img src="{{ captcha_src() }}" id="captcha_src" onclick="javascript:this.src=this.src+Math.random();" style="height: 34px;width:120px;line-height: 34px;margin-left: 4px;">
                    </div>
                    <div class="layui-form-mid layui-word-aux">看不清？<a href="javascript:void(0);" id="captchaChange" class="ftx-05">换一张</a></div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: 250px;"><em>*</em>请填写手机校验码：</label>
                    <div class="layui-input-inline">
                        <input type="text" value="" name="code" lay-verify="required" placeholder="请输入手机号码" class="layui-input" style="width: 200px;">
                    </div>
                    <div class="layui-input-inline" style="width: 120px;margin-left: 4px;">
                        <a href="javascript:void(0);" class="layui-btn" id="SendCode">获取短信校验码</a>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block" style="left: 170px;">
                        <button class="layui-btn" lay-submit="submit" lay-filter="submit" >提交</button>
                    </div>
                </div>
                {!! csrf_field() !!}
                {{ Form::close() }}
            </div>
        </div>
        <div class="mod-main mod-comm">
            <div class="mt">
                <h3>为什么要进行身份验证？</h3>
            </div>
            <div class="mc">
                <div>1. 为保障您的账户信息安全，在变更账户中的重要信息时需要身份验证，感谢您的理解与支持。</div>
                <div>2. 验证身份遇到问题？请提供用户名，手机号，历史发票，点击联系我司<a class="ftx-05" href="//chat.jd.com/jdchat/custom.action" target="_blank">在线客服</a>或者拨打4006065500转7号键咨询。</div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script type="text/javascript">
        layui.use(['form', 'layedit', 'laydate','upload'], function() {
            var InterValObj; //timer变量，控制时间
            var DisabledSendCode = false; //timer变量，控制时间
            var count = 120; //间隔函数，1秒执行
            var curCount;//当前剩余秒数

            var form = layui.form(),
                    layer = layui.layer,
                    layedit = layui.layedit,
                    laydate = layui.laydate;

            //监听提交
            form.on('submit(submit)', function(data) {
                loadShow();
                $.ajax({
                    url: "{{url('center/user/password')}}",
                    type: 'post',
                    data:  {
                        code:data.field.code,
                    },
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(result){
                        loadFadeOut();
                        layer.msg(result.message);
                        if(result.status == true){
                            window.location.href = result.url;
                        }
                    }
                });
                return false;
            });

            $("#captchaChange").on('click',function () {
                $("#captcha_src").attr('src',$("#captcha_src").attr('src').split("?")[0]+"?s="+Math.random());
            });

            $("#SendCode").on("click",function () {
                if(DisabledSendCode == false){
                    $.ajax({
                        url: "{{url('center/user/mobileCode')}}",
                        type: 'post',
                        data:  {
                            captcha:$("#captcha").val(),
                        },
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        success:function(result){
                            if(result.status == true){
                                layer.msg(result.message);

                                DisabledSendCode = true;
                                curCount = count;
                                $("#SendCode").attr("disabled", "true");
                                $("#SendCode").html("请在<em>" + curCount + "</em>秒内输入验证码");
                                InterValObj = window.setInterval(SetRemainTime, 1000);
                            } else {
                                layer.msg(result.message);
                                $("#captcha_src").attr('src',$("#captcha_src").attr('src').split("?")[0]+"?s="+Math.random());
                            }
                        }
                    });
                }
            });

            function SetRemainTime() {
                if (curCount == 0) {
                    window.clearInterval(InterValObj);//停止计时器
                    $("#SendCode").removeAttr("disabled");//启用按钮
                    $("#SendCode").html("重新发送验证码");
                    DisabledSendCode = false;
                } else {
                    curCount--;
                    $("#SendCode").html("请在<em>" + curCount + "</em>秒内输入验证码");
                }
            }

        });
    </script>
@stop