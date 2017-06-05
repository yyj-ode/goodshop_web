@extends('Frontend.User.Web.Layout.base')

@section('seo')
    @include('Frontend.User.Web.Layout.seo')
@stop

@section('content')

    <div class="main_content" id="appContent">
        <div class="">
            <p class="reg01_title">用户登录</p>
            <p class="reg01_icon"></p>
            <div class="reg01_con" id="app">
                <!--当为选中状态时，父层样式追加curr且图片样式设为空-->
                <form id="loginForm" action="{{ url('/user/login') }}" method="post">

                    <ul class="reg01a" id='username_input'>
                        <img src="http://static.fh21.com.cn/images/passport/reg/bg06a.gif" class="imgGray" id='imgname_1' style="left:17px;top:9px;"  />
                        <input name="mobile" id="name" type="text" value="{{ old('mobile') }}" placeholder="请输入用户名!"/>
                    </ul>
                    <ul class="reg01a" id='password_input'>
                        <img src="http://static.fh21.com.cn/images/passport/reg/bg06b.gif" class="imgGray" id='imgname_2' style="left:18px;top:7px;" />
                        <input  name="password" id="password" type="password" value="" placeholder="请输入密码!"/>
                    </ul>
                    <ul class="reg01b">
                        <input id="record" type="checkbox"  checked="checked" />
                        下次自动登录
                        <a href="{{url('user/resetMyPassword')}}" class="link01">忘记密码？</a>
                    </ul>
                    <ul>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </ul>
                    <ul class="reg01c">
                        <input  type="submit" class="reg_btn01" value="" />
                        <a href="{{url('register.html')}}" class="link01">注册</a>
                    </ul>
                    {{ csrf_field() }}
                    <input v-model="user.csrf_token" name="_token" type="hidden" value="{{csrf_token()}}"/>
                </form>

                <div class="reg01d">
                    <p>可以使用以下方式登录</p>
                    <a href="/connect/tencent"><img src="http://static.fh21.com.cn/images/passport/reg/icon01a.gif" />QQ</a>
                    <a href="/connect/sina"><img src="http://static.fh21.com.cn/images/passport/reg/icon01b.gif" />新浪微博</a>
                    <a href="/connect/renren"><img src="http://static.fh21.com.cn/images/passport/reg/icon01c.gif" />人人</a>
                </div>

            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <script>
            @foreach ($errors->all() as $error)
            humane.log("{{ $error }}")
            @endforeach
        </script>
    @endif

@endsection
