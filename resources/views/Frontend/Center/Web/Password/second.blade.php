@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')
<div id="main">
    <div class="mod-main mod-comm">
        <div class="mt">
            <ul class="extra-l">
                <li class="fore-1"><a class="curr" href="javascript:void(0);">修改登录密码</a></li>
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
                    <dl class="normal doing">
                        <dt class="s-num">2</dt>
                        <dd class="s-text">修改登录密码<s></s><b></b></dd>
                    </dl>
                    <dl class="last">
                        <dt class="s-num">&nbsp;</dt>
                        <dd class="s-text">完成<s></s><b></b></dd>
                    </dl>
                </div>

                <div class="form" style="margin-left: 258px;">
                    <div class="item">
                        <span class="label">旧密码：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="item">
                        <span class="label">新密码：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="item">
                        <span class="label">重复新密码：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text">
                        </div>
                        <div class="clr"></div>
                    </div>

                    <div class="item">
                        <span class="label">&nbsp;</span>
                        <input type="text" id="signedData" value="" style="display:none">
                        <input type="text" id="serialNumber" value="" style="display:none">
                        <input type="hidden" name="eid" id="eid" value="" class="hide">
                        <input type="hidden" name="fp" id="fp" value="" class="hide">
                        <div class="fl">
                            <button class="ivu-btn ivu-btn-success" type="button">
                                <span>下一步</span>
                            </button>
                        </div>
                        <div class="clr"></div>
                    </div>
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