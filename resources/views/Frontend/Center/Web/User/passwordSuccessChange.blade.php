
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
                <h3>修改密码</h3>
            </div>
            <div class="mc">
                <div id="sflex03" class="stepflex ">
                    <dl class="first done">
                        <dt class="s-num">1</dt>
                        <dd class="s-text">验证身份<s></s><b></b></dd>
                        <dd></dd>
                    </dl>
                    <dl class="normal done">
                        <dt class="s-num">2</dt>
                        <dd class="s-text">修改登录密码<s></s><b></b></dd>
                    </dl>
                    <dl class="last doing">
                        <dt class="s-num">&nbsp;</dt>
                        <dd class="s-text">完成<s></s><b></b></dd>
                    </dl>
                </div>
                <div class="safe-icon-box">
                    <s class="icon-succ02 m-icon"></s>
                    <div class="fore">
                        <h3 class="ftx-02">恭喜您，修改密码成功！</h3>
                        <div class="u-safe">
                            最新安全评级：
                            <i class="safe-rank05" id="cla"></i><strong class="rank-text ftx-02">较高</strong>
                        </div>
                        <div class="ftx-03">您的账户安全级还能提升哦，快去<a href="{{url('center/user/edit')}}" class="ftx-05">安全中心</a>完善其它安全设置提高评级吧！</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')

@stop