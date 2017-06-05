@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')
    <div id="main">
        <div class="mod-main mod-comm">
            <div class="mt">
                <ul class="extra-l">
                    <li class="fore-1"><a class="curr" href="javascript:void(0);">账户充值</a></li>
                </ul>
            </div>

            <div class="mc">
                <div id="step1" class="step">
                    <ul>
                        <li class="fore1 on">1.填写充值金额<b></b></li>
                        <li class="fore2">2.在线支付<b></b></li>
                        <li class="fore3">3.充值完成</li>
                    </ul>
                </div>
                <div class="user-set userset-lcol">
                    <div class="form">
                        <div class="item">
                            <span class="label">充值账户：</span>
                            <div class="fl">
                                <div><strong>yangcuiwang</strong></div>
                            </div>
                        </div>
                        <div class="item">
                            <span class="label">充值金额：</span>
                            <div class="fl">
                                <input class="ivu-input" type="text" style="width: 150px;">&nbsp;&nbsp;元
                            </div>
                        </div>
                        <div class="msg-text">请注意：支持国内主流银行储蓄卡充值，在线支付成功后，充值金额会在1分钟内到账；如果需要提现，请致电恰列客服办理</div>

                    </div>
                </div>
            </div>
            <div class="item">
                <span class="label">&nbsp;</span>
                <div class="fl">
                    <button class="ivu-btn ivu-btn-info" type="button" style="width: 150px;margin-left: 150px;">
                        <span>下一步</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="mod-main mod-comm">
            <div class="mt">
                <h3>温馨提示：</h3>
            </div>
            <div class="mc">
                <div>1. 充值成功后，余额可能存在延迟现象，一般1到5分钟内到账，如有问题，请咨询客服；</div>
                <div>2. 充值金额输入值必须是不小于10且不大于50000的正整数；</div>
                <div>3. 您只能用储蓄卡和支付宝进行充值，如遇到任何支付问题可以查看在线支付帮助；</div>
                <div>4. 充值完成后，您可以进入账户充值记录页面进行查看余额充值状态。</div>
            </div>
        </div>
    </div>
@stop

@section('js')
@stop