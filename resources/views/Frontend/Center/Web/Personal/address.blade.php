@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')
<div id="main">
    <div id="addressList" class="mod-main mod-comm">
        <div class="mt">
            <button class="ivu-btn" type="button">
                <span><a href="{{"addaddress.html"}}">新增地址</a></span>
            </button>
            <span class="ftx-03">您已创建<span id="addressNum_top" class="ftx-02">4 </span>个收货地址，最多可创建<span class="ftx-02">20</span>个</span>
        </div>

        <div class="mc">
            <div class="sm easebuy-m " id="addresssDiv-132029685">
                <div class="smt">
                    <h3>
                        王雨
                        <span class="ftx-04 ml10">默认地址</span>
                    </h3>
                    <div class="extra">
                        <a onclick="alertDelAddressDiag(132029685);" class="del-btn" href="#none">删除</a>
                    </div>
                    <div id="alias-form-132029685" class="alias-form hide">
                        <div class="alias-new">
                            <input type="text" class="ipt-text" id="ipt-text-132029685" value="王雨" onblur="checkConsigneeAlias('ipt-text-132029685')" maxlength="20">
                            <button type="button" class="btn-save" onclick="saveAddessAlias(132029685,event)">保存</button>
                        </div>
                    </div>
                </div>

                <div class="smc">
                    <div class="items new-items">
                        <div class="item-lcol">
                            <div class="item">
                                <span class="label">收货人：</span>
                                <div class="fl">
                                    杨斌
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">所在地区：</span>
                                <div class="fl">
                                    北京朝阳区管庄
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">地址：</span>
                                <div class="fl">
                                    管庄北一里19号楼4层403室
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">手机：</span>
                                <div class="fl">
                                    139****2021
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">固定电话：</span>
                                <div class="fl">
                                    1381183****
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">电子邮箱：</span>
                                <div class="fl">

                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>

                        <div class="item-rcol">
                            <div class="extra">
                                <a class="ml10 ftx-05" href="{{"editaddress.html"}}" onclick="alertUpdateAddressDiag(132029685);">编辑</a>
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="sm easebuy-m " id="addresssDiv-138556224">
                <div class="smt">
                    <h3>
                        杨翠旺
                    </h3>
                    <div class="extra">
                        <a onclick="alertDelAddressDiag(138556224);" class="del-btn" href="#none">删除</a>
                    </div>
                    <div id="alias-form-138556224" class="alias-form hide">
                        <div class="alias-new">
                            <input type="text" class="ipt-text" id="ipt-text-138556224" value="杨翠旺" onblur="checkConsigneeAlias('ipt-text-138556224')" maxlength="20">
                            <button type="button" class="btn-save" onclick="saveAddessAlias(138556224,event)">保存</button>
                        </div>
                    </div>
                </div>

                <div class="smc">
                    <div class="items new-items">
                        <div class="item-lcol">
                            <div class="item">
                                <span class="label">收货人：</span>
                                <div class="fl">
                                    杨翠旺
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">所在地区：</span>
                                <div class="fl">
                                    北京朝阳区三环到四环之间
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">地址：</span>
                                <div class="fl">
                                    网利金融-东三环北路乙2号海南航空大厦a座7层
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">手机：</span>
                                <div class="fl">
                                    139****2021
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">固定电话：</span>
                                <div class="fl">
                                    139****2021
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">电子邮箱：</span>
                                <div class="fl">

                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>

                        <div class="item-rcol">
                            <div class="extra">
                                <a class="ml10 ftx-05" href="javascript:makeAddressAllDefault('138556224');">设为默认</a>
                                <a class="ml10 ftx-05" href="javascript:;" onclick="alertUpdateAddressDiag(138556224);">编辑</a>
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="sm easebuy-m " id="addresssDiv-138529434">
                <div class="smt">
                    <h3>
                        王雨
                    </h3>
                    <div class="extra">
                        <a onclick="alertDelAddressDiag(138529434);" class="del-btn" href="#none">删除</a>
                    </div>
                    <div id="alias-form-138529434" class="alias-form hide">
                        <div class="alias-new">
                            <input type="text" class="ipt-text" id="ipt-text-138529434" value="王雨" onblur="checkConsigneeAlias('ipt-text-138529434')" maxlength="20">
                            <button type="button" class="btn-save" onclick="saveAddessAlias(138529434,event)">保存</button>
                        </div>
                    </div>
                </div>

                <div class="smc">
                    <div class="items new-items">
                        <div class="item-lcol">
                            <div class="item">
                                <span class="label">收货人：</span>
                                <div class="fl">
                                    王雨
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">所在地区：</span>
                                <div class="fl">
                                    北京朝阳区三环到四环之间
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">地址：</span>
                                <div class="fl">
                                    X space空间-东三环北路甲二号京信大厦院内X-space空间
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">手机：</span>
                                <div class="fl">
                                    138****3223
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">固定电话：</span>
                                <div class="fl">
                                    138****3223
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">电子邮箱：</span>
                                <div class="fl">

                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>

                        <div class="item-rcol">
                            <div class="extra">
                                <a class="ml10 ftx-05" href="javascript:makeAddressAllDefault('138529434');">设为默认</a>
                                <a class="ml10 ftx-05" href="javascript:;" onclick="alertUpdateAddressDiag(138529434);">编辑</a>
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="sm easebuy-m " id="addresssDiv-73646146">
                <div class="smt">
                    <h3>
                        刘桂花
                    </h3>
                    <div class="extra">
                        <a onclick="alertDelAddressDiag(73646146);" class="del-btn" href="#none">删除</a>
                    </div>
                    <div id="alias-form-73646146" class="alias-form hide">
                        <div class="alias-new">
                            <input type="text" class="ipt-text" id="ipt-text-73646146" value="刘桂花" onblur="checkConsigneeAlias('ipt-text-73646146')" maxlength="20">
                            <button type="button" class="btn-save" onclick="saveAddessAlias(73646146,event)">保存</button>
                        </div>
                    </div>
                </div>

                <div class="smc">
                    <div class="items new-items">
                        <div class="item-lcol">
                            <div class="item">
                                <span class="label">收货人：</span>
                                <div class="fl">
                                    刘桂花
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">所在地区：</span>
                                <div class="fl">
                                    黑龙江佳木斯市郊区郊区农垦
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">地址：</span>
                                <div class="fl">
                                    八五九农场
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">手机：</span>
                                <div class="fl">
                                    138****5027
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">固定电话：</span>
                                <div class="fl">
                                    138****5027
                                </div>
                                <div class="clr"></div>
                            </div>
                            <div class="item">
                                <span class="label">电子邮箱：</span>
                                <div class="fl">

                                </div>
                                <div class="clr"></div>
                            </div>
                        </div>

                        <div class="item-rcol">
                            <div class="extra">
                                <a class="ml10 ftx-05" href="javascript:makeAddressAllDefault('73646146');">设为默认</a>
                                <a class="ml10 ftx-05" href="javascript:;" onclick="alertUpdateAddressDiag(73646146);">编辑</a>
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt" id="addAddressDiv_bottom">
            <button class="ivu-btn" type="button">
                <span><a href="{{"addaddress.html"}}">新增地址</a></span>
            </button>
            <span class="ftx-03">您已创建<span id="addressNum_botton" class="ftx-02">4 </span>个收货地址，最多可创建<span class="ftx-02">20</span>个</span>
        </div>
    </div>
</div>
@stop

@section('js')
@stop