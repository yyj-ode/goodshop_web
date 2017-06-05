@extends('Backend.admin.layouts.layui')



@section('content')
    <div style="margin: 15px;">
        {{ Form::open(array('url' => 'user/login', 'method' => 'POST')) }}
        <div class="layui-user-icon larry-login">
            {{ Form::text('mobile', old('mobile'), ['class'=>'login_txtbx', 'placeholder'=>'账号']) }}
        </div>
        <div class="layui-pwd-icon larry-login">
            {{ Form::password('password', ['class'=>'login_txtbx', 'placeholder'=>'密码']) }}
        </div>
        <div class="layui-val-icon larry-login">
            <div class="layui-code-box">
                {{ Form::text('captcha', '', array('class' => 'login_txtbx', 'placeholder'=>'验证码')) }}
                <img src="{{ url('captcha/default') }}"  class="verifyImg" onclick="javascript:this.src=this.src+Math.random();">
            </div>
        </div>
        <div class="layui-submit larry-login">
            {{ Form::submit('立即登陆', ['class'=>'submit_btn']) }}
        </div>
        {{ Form::close() }}
    </div>
@stop

@section('js')
   
@stop