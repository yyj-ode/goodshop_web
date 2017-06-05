
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
                    <dl class="first done">
                        <dt class="s-num">1</dt>
                        <dd class="s-text">验证身份<s></s><b></b></dd>
                        <dd></dd>
                    </dl>
                    <dl class="normal doing">
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
                    <label class="layui-form-label" style="width: 250px;"><em>*</em>新的登录密码：</label>
                    <div class="layui-input-block ">
                        <input type="password" value="" name="password" placeholder="请新的登录密码" class="layui-input" lay-verify="required" style="width: 200px;">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: 250px;"><em>*</em>请再输入一次密码：</label>
                    <div class="layui-input-block ">
                        <input type="password" value="" name="password_confirmation" placeholder="请再输入一次密码" class="layui-input" lay-verify="required" style="width: 200px;">
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
                    <div class="layui-input-block" style="left: 170px;">
                        <button class="layui-btn" lay-submit="submit" lay-filter="submit" >提交</button>
                    </div>
                </div>
                {!! csrf_field() !!}
                {{ Form::close() }}
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
                    url: "{{url('center/user/passwordChange')}}",
                    type: 'post',
                    data:  {
                        captcha:data.field.captcha,
                        password:data.field.password,
                        password_confirmation:data.field.password_confirmation,
                    },
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(result){
                        if(result.status == true){
                            loadFadeOut();
                            layer.msg(result.message);
                            window.location.href = result.url;
                        } else {
                            loadFadeOut();
                            layer.msg(result.message);
                            $("#captcha_src").attr('src',$("#captcha_src").attr('src').split("?")[0]+"?s="+Math.random());
                        }
                    }
                });
                return false;
            });

            $("#captchaChange").on('click',function () {
                $("#captcha_src").attr('src',$("#captcha_src").attr('src').split("?")[0]+"?s="+Math.random());
            });

        });
    </script>
@stop