@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')
<div id="main">
    <div class="mod-main">
        <div class="mt">
            <ul class="extra-l">
                <li class="fore-1"><a class="curr" href="javascript:void(0);">添加收货地址</a></li>
            </ul>
        </div>
        <div class="mc">
            <div class="user-set userset-lcol">
                <div class="form">
                    <div class="item">
                        <span class="label"><em>*</em>收货人：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width: 300px;">
                        </div>
                    </div>
                    <div class="item">
                        <span class="label"><em>*</em>所在地区：</span>
                        <div class="example-case">
                            <div slot="demo">
                                <div style="width:150px" class="ivu-select ivu-select-single">
                                    <div class="ivu-select-selection">
                                        <span class="ivu-select-placeholder">请选择</span>
                                        <span class="ivu-select-selected-value" style="display: none;"></span>
                                        <i class="ivu-select-arrow ivu-icon ivu-icon-ios-close" style="display: none;"></i>
                                        <i class="ivu-select-arrow ivu-icon ivu-icon-arrow-down-b"></i>
                                    </div>
                                    <div class="ivu-select-dropdown slide-up-transition" style="width: 200px; transform-origin: center top 0px; display: none;">
                                        <ul class="ivu-select-not-found" style="display: none;"><li>无匹配数据</li></ul>
                                        <ul class="ivu-select-dropdown-list">
                                            <li class="ivu-select-item">北京市</li>
                                            <li class="ivu-select-item">上海市</li>
                                            <li class="ivu-select-item">深圳市</li>
                                            <li class="ivu-select-item">杭州市</li>
                                            <li class="ivu-select-item">南京市</li>
                                            <li class="ivu-select-item">重庆市</li>
                                        </ul>
                                    </div>
                                </div>
                                <div style="width:150px" class="ivu-select ivu-select-single">
                                    <div class="ivu-select-selection">
                                        <span class="ivu-select-placeholder">请选择</span>
                                        <span class="ivu-select-selected-value" style="display: none;"></span>
                                        <i class="ivu-select-arrow ivu-icon ivu-icon-ios-close" style="display: none;"></i>
                                        <i class="ivu-select-arrow ivu-icon ivu-icon-arrow-down-b"></i>
                                    </div>
                                    <div class="ivu-select-dropdown slide-up-transition" style="width: 200px; transform-origin: center top 0px; display: none;">
                                        <ul class="ivu-select-not-found" style="display: none;"><li>无匹配数据</li></ul>
                                        <ul class="ivu-select-dropdown-list">
                                            <li class="ivu-select-item">北京市</li>
                                            <li class="ivu-select-item">上海市</li>
                                            <li class="ivu-select-item">深圳市</li>
                                            <li class="ivu-select-item">杭州市</li>
                                            <li class="ivu-select-item">南京市</li>
                                            <li class="ivu-select-item">重庆市</li>
                                        </ul>
                                    </div>
                                </div>
                                <div style="width:150px" class="ivu-select ivu-select-single">
                                    <div class="ivu-select-selection">
                                        <span class="ivu-select-placeholder">请选择</span>
                                        <span class="ivu-select-selected-value" style="display: none;"></span>
                                        <i class="ivu-select-arrow ivu-icon ivu-icon-ios-close" style="display: none;"></i>
                                        <i class="ivu-select-arrow ivu-icon ivu-icon-arrow-down-b"></i>
                                    </div>
                                    <div class="ivu-select-dropdown slide-up-transition" style="width: 200px; transform-origin: center top 0px; display: none;">
                                        <ul class="ivu-select-not-found" style="display: none;"><li>无匹配数据</li></ul>
                                        <ul class="ivu-select-dropdown-list">
                                            <li class="ivu-select-item">北京市</li>
                                            <li class="ivu-select-item">上海市</li>
                                            <li class="ivu-select-item">深圳市</li>
                                            <li class="ivu-select-item">杭州市</li>
                                            <li class="ivu-select-item">南京市</li>
                                            <li class="ivu-select-item">重庆市</li>
                                        </ul>
                                    </div>
                                </div>
                                 <span class="demo-data"></span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <span class="label"><em>*</em>详细地址：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width:400px">
                        </div>
                    </div>
                    <div class="item">
                        <span class="label"><em>*</em>手机号码：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width:300px">
                        </div>
                    </div>
                    <div class="item">
                        <span class="label">固定电话：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width:300px">
                        </div>
                    </div>
                    <div class="item">
                        <span class="label">邮箱：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width:300px">
                        </div>
                    </div>
                    <div class="item">
                        <span class="label">邮编：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" style="width:300px">
                        </div>
                    </div>

                    <div class="item">
                        <span class="label">&nbsp;</span>
                        <div class="fl">
                            <input id="code" value="517372" style="display:none">
                            <input id="rkey" value="736e6f5f315f67657455736572496e666f79616e6763756977616e67353137333732" style="display:none">
                            <button class="ivu-btn ivu-btn-info" type="button">
                                <span>保存地址</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clr"></div>
        </div>
    </div>
</div>
@stop

@section('js')
@stop