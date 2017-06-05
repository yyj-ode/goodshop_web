@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')
<div id="main">
    <div class="mod-main mod-comm">
        <div class="mt">
            <ul class="extra-l">
                <li class="fore-1"><a class="curr" href="javascript:void(0);">修改手机</a></li>
            </ul>
        </div>
        <div class="mc">
            <div class="mc">
                <div id="sflex03" class="stepflex ">
                    <dl class="first">
                        <dt class="s-num">1</dt>
                        <dd class="s-text">验证身份<s></s><b></b></dd>
                        <dd></dd>
                    </dl>
                    <dl class="normal ">
                        <dt class="s-num">2</dt>
                        <dd class="s-text">修改已验证手机<s></s><b></b></dd>
                    </dl>
                    <dl class="last doing">
                        <dt class="s-num">&nbsp;</dt>
                        <dd class="s-text">完成<s></s><b></b></dd>
                    </dl>
                </div>

                <div class="form" style="margin-left: 258px;">
                    <div>手机号码修改成功!</div>
                </div>
            </div>
        </div>
    </div>
    <div class="mod-main mod-comm">
        <div class="mt">
            <h3>为什么要进行身份验证？</h3>
        </div>
        <div class="mc">
            <div>1. 为保障您的账户信息安全，在变更账户中的重要信息时需要身份验证，感谢您的理解与支持。</div>
            <div>2. 验证身份遇到问题？请提供用户名，手机号，历史发票，点击联系我司<a class="ftx-05" href="" target="_blank">在线客服</a>或者拨打13911052021咨询。</div>
        </div>
    </div>
</div>
@stop

@section('js')
@stop