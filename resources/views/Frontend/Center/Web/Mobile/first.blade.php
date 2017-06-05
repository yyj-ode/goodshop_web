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
                    <dl class="first doing">
                        <dt class="s-num">1</dt>
                        <dd class="s-text">验证身份<s></s><b></b></dd>
                        <dd></dd>
                    </dl>
                    <dl class="normal ">
                        <dt class="s-num">2</dt>
                        <dd class="s-text">修改已验证手机<s></s><b></b></dd>
                    </dl>
                    <dl class="last">
                        <dt class="s-num">&nbsp;</dt>
                        <dd class="s-text">完成<s></s><b></b></dd>
                    </dl>
                </div>

                <div class="form" style="margin-left: 258px;">
                    <div class="item">
                        <span class="label">请选择验证身份方式：</span>
                        <div style="width:200px" class="ivu-select ivu-select-single ivu-select-visible">
                            <div class="ivu-select-selection">
                                <span class="ivu-select-placeholder">请选择</span>
                                <span class="ivu-select-selected-value" style="display: none;"></span>

                                <i class="ivu-select-arrow ivu-icon ivu-icon-ios-close" style="display: none;"></i>
                                <i class="ivu-select-arrow ivu-icon ivu-icon-arrow-down-b"></i>
                            </div>
                            <div class="ivu-select-dropdown slide-up-transition" x-placement="bottom-start" style="width: 200px;display: none; transform-origin: center top 0px;">
                                <ul class="ivu-select-dropdown-list">
                                    <li class="ivu-select-item">手机验证码</li>
                                    <li class="ivu-select-item">银行卡信息验证+手机验证码</li>
                                    <li class="ivu-select-item">支付密码+手机验证码</li>
                                    <li class="ivu-select-item">银行卡信息验证+支付密码</li>
                                </ul>
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="item">
                        <span class="label">银行卡号：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width: 330px">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="item">
                        <span class="label">持卡人身份证号：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width: 330px">
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="item">
                        <span class="label">已验证手机：</span>
                        <div class="fl">
                            <strong id="mobileSpan" class="ftx-un">139*****021</strong>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="item">
                        <span class="label">请填写手机校验码：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width: 200px;margin-right: 10px;">
                            <button class="ivu-btn" type="button">
                                <span>获取短信校验码</span>
                            </button>
                            <div class="clr"></div>
                            <div id="countDown" class="msg-text" style="display:none;">校验码已发出，请注意查收短信，如果没有收到，你可以在<strong class="ftx-01">60</strong>秒后要求系统重新发送</div>
                            <div class="msg-error" id="sendCode_error" style="display: none;"></div>
                            <div id="code_error" class="msg-error" style="display:none"></div>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="item">
                        <span class="label">验证码：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width: 200px">
                            <label><img id="JD_Verification1" class="ml10" onclick="verc('c00a3670-a73f-4fda-9fae-df1e2b3a82d3')" src="//authcode.jd.com/verify/image?acid=c00a3670-a73f-4fda-9fae-df1e2b3a82d3&amp;srcid=usersafe&amp;_t=&lt;%=new Date().getTime() %&gt;" alt="验证码" style="cursor:pointer;width:100px;height:26px;">看不清？<a href="javascript:verc('c00a3670-a73f-4fda-9fae-df1e2b3a82d3');" class="ftx-05">换一张</a></label>
                            <div class="clr"></div>
                            <div id="authCode_error" class="msg-error"></div>
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
                            <span class="ml10" id="appealSpan" style="">无法验证身份？试试 <a id="autoAppeal" onclick="autoAppeal('appealUpdatePassword','')" href="javascript:void(0);" class="ftx-05" clstag="pageclick|keycount|201604222|1" "="">账户申诉</a></span>
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