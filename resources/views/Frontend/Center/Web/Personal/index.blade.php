@extends('Frontend.Center.Web.Layout.base')

@section('seo')
    @include('Frontend.Center.Web.Layout.seo')
@stop

@section('content')
<div id="main">
    <div class="mod-main">
        <div class="mt">
            <ul class="extra-l">
                <li class="fore-1"><a class="curr" href="javascript:void(0);">基本信息</a></li>
            </ul>
        </div>
        <div class="mc">
            <div class="user-set userset-lcol">
                <div class="form">
                    <div class="item">
                        <span class="label">用户名：</span>
                        <div class="fl">
                            <div><strong>yangcuiwang</strong></div>
                        </div>
                    </div>
                    <div class="item" id="aliasArea">
                        <span class="label"><em>*</em>登录名：</span>
                        <div class="fl" id="aliasBefore">
                            <strong>yangcuiwang</strong>
                            <a href="javascript:void(0)" class="ftx-05 ml10" onclick="changeAliasName()">修改</a>
                            <span class="ftx03">可用于登录，请牢记哦~</span>
                            <div class="clr"></div><div class="prompt-06"><span id="aliasNameBefore_msg"></span></div>
                        </div>
                        <div class="fl" id="aliasAfter" style="display: none">
                            <input type="text" class="itxt" maxlength="20" id="aliasName" name="aliasName" value="yangcuiwang">
                            <input type="hidden" id="hiddenAliasName" value="yangcuiwang">
                            <span class="ftx03">可用于登录，请牢记哦~</span>
                            <div class="clr"></div><div class="prompt-06"><span id="aliasName_msg"></span></div>
                        </div>

                    </div>

                    <div class="item">
                        <span class="label">上传头像：</span>
                        <div class="example-case">
                            <div slot="demo">
                                <div class="ivu-upload">
                                    <div class="ivu-upload ivu-upload-select">
                                        <input type="file" class="ivu-upload-input">
                                        <button class="ivu-btn ivu-btn-ghost" type="button">
                                            <i class="ivu-icon ivu-icon-ios-cloud-upload-outline"></i>
                                            <span>上传文件</span>
                                        </button>
                                    </div>
                                    <ul class="ivu-upload-list"></ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <span class="label"><em>*</em>真实姓名：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" placeholder="请输入真实姓名">
                        </div>
                    </div>
                    <div class="item">
                        <span class="label"><em>*</em>昵称：</span>
                        <div class="fl">
                            <input class="ivu-input" type="text" placeholder="请输入昵称">
                        </div>
                    </div>
                    <div class="item">
                        <span class="label"><em>*</em>性别：</span>
                        <div class="ivu-radio-group">
                            <label class="ivu-radio-wrapper ivu-radio-group-item">
                                <span class="ivu-radio">
                                    <span class="ivu-radio-inner"></span>
                                    <input type="radio" class="ivu-radio-input">
                                </span>
                                <span>男</span>
                            </label>
                            <label class="ivu-radio-wrapper ivu-radio-group-item">
                                <span class="ivu-radio">
                                    <span class="ivu-radio-inner"></span>
                                    <input type="radio" class="ivu-radio-input">
                                </span>
                                <span>女</span>
                            </label>
                            <label class="ivu-radio-wrapper ivu-radio-group-item ivu-radio-wrapper-checked">
                                <span class="ivu-radio ivu-radio-checked">
                                    <span class="ivu-radio-inner"></span>
                                    <input type="radio" class="ivu-radio-input" checked="">
                                </span>
                                <span>保密</span>
                            </label>
                        </div>
                    </div>
                    <div class="item">
                        <span class="label">生日：</span>
                        <div class="ivu-col ivu-col-span-12">
                            <div style="width: 200px" class="ivu-date-picker">
                                <div class="ivu-date-picker-rel">
                                    <div class="ivu-date-picker-editor ivu-input-wrapper ivu-input-type">
                                        <i class="ivu-icon ivu-icon-ios-calendar-outline ivu-input-icon"></i>

                                        <input class="ivu-input" type="text" placeholder="选择日期">
                                    </div>
                                </div>
                                <div class="ivu-select-dropdown slide-up-transition" style="transform-origin: center top 0px; display: none;"><div class="ivu-picker-panel-body-wrapper ivu-date-picker-with-range">
                                        
                                        <div class="ivu-picker-panel-body">
                                            <div class="ivu-picker-panel-content ivu-picker-panel-content-left">
                                                <div class="ivu-date-picker-header">
                                                    <span class="ivu-picker-panel-icon-btn ivu-date-picker-prev-btn ivu-date-picker-prev-btn-arrow-double"><i class="ivu-icon ivu-icon-ios-arrow-left"></i></span>
                                                    <span class="ivu-picker-panel-icon-btn ivu-date-picker-prev-btn ivu-date-picker-prev-btn-arrow"><i class="ivu-icon ivu-icon-ios-arrow-left"></i></span>
                                                    <span class="ivu-date-picker-header-label">2017年</span>
                                                    <span class="ivu-date-picker-header-label">3 月</span>
                                                    <span class="ivu-picker-panel-icon-btn ivu-date-picker-next-btn ivu-date-picker-next-btn-arrow-double" style="display: none;"><i class="ivu-icon ivu-icon-ios-arrow-right"></i></span>
                                                </div>
                                                <div class="ivu-date-picker-cells">
                                                    <div class="ivu-date-picker-cells-header">
                                                        <span>日</span><span>一</span><span>二</span><span>三</span><span>四</span><span>五</span><span>六</span>
                                                    </div>
                                                    <span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-prev-month"><em index="0">26</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-prev-month"><em index="1">27</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-prev-month"><em index="2">28</em></span><span class="ivu-date-picker-cells-cell"><em index="3">1</em></span><span class="ivu-date-picker-cells-cell"><em index="4">2</em></span><span class="ivu-date-picker-cells-cell"><em index="5">3</em></span><span class="ivu-date-picker-cells-cell"><em index="6">4</em></span><span class="ivu-date-picker-cells-cell"><em index="7">5</em></span><span class="ivu-date-picker-cells-cell"><em index="8">6</em></span><span class="ivu-date-picker-cells-cell"><em index="9">7</em></span><span class="ivu-date-picker-cells-cell"><em index="10">8</em></span><span class="ivu-date-picker-cells-cell"><em index="11">9</em></span><span class="ivu-date-picker-cells-cell"><em index="12">10</em></span><span class="ivu-date-picker-cells-cell"><em index="13">11</em></span><span class="ivu-date-picker-cells-cell"><em index="14">12</em></span><span class="ivu-date-picker-cells-cell"><em index="15">13</em></span><span class="ivu-date-picker-cells-cell"><em index="16">14</em></span><span class="ivu-date-picker-cells-cell"><em index="17">15</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-today"><em index="18">16</em></span><span class="ivu-date-picker-cells-cell"><em index="19">17</em></span><span class="ivu-date-picker-cells-cell"><em index="20">18</em></span><span class="ivu-date-picker-cells-cell"><em index="21">19</em></span><span class="ivu-date-picker-cells-cell"><em index="22">20</em></span><span class="ivu-date-picker-cells-cell"><em index="23">21</em></span><span class="ivu-date-picker-cells-cell"><em index="24">22</em></span><span class="ivu-date-picker-cells-cell"><em index="25">23</em></span><span class="ivu-date-picker-cells-cell"><em index="26">24</em></span><span class="ivu-date-picker-cells-cell"><em index="27">25</em></span><span class="ivu-date-picker-cells-cell"><em index="28">26</em></span><span class="ivu-date-picker-cells-cell"><em index="29">27</em></span><span class="ivu-date-picker-cells-cell"><em index="30">28</em></span><span class="ivu-date-picker-cells-cell"><em index="31">29</em></span><span class="ivu-date-picker-cells-cell"><em index="32">30</em></span><span class="ivu-date-picker-cells-cell"><em index="33">31</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="34">1</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="35">2</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="36">3</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="37">4</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="38">5</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="39">6</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="40">7</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="41">8</em></span><!--v-for-end-->
                                                </div>
                                                <div class="ivu-date-picker-cells ivu-date-picker-cells-year" style="display: none;">
                                                    <span class="ivu-date-picker-cells-cell"><em index="0">2010</em></span><span class="ivu-date-picker-cells-cell"><em index="1">2011</em></span><span class="ivu-date-picker-cells-cell"><em index="2">2012</em></span><span class="ivu-date-picker-cells-cell"><em index="3">2013</em></span><span class="ivu-date-picker-cells-cell"><em index="4">2014</em></span><span class="ivu-date-picker-cells-cell"><em index="5">2015</em></span><span class="ivu-date-picker-cells-cell"><em index="6">2016</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-selected"><em index="7">2017</em></span><span class="ivu-date-picker-cells-cell"><em index="8">2018</em></span><span class="ivu-date-picker-cells-cell"><em index="9">2019</em></span><!--v-for-end-->
                                                </div>
                                                <div class="ivu-date-picker-cells ivu-date-picker-cells-month" style="display: none;">
                                                    <span class="ivu-date-picker-cells-cell"><em index="0">1月</em></span><span class="ivu-date-picker-cells-cell"><em index="1">2月</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-selected"><em index="2">3月</em></span><span class="ivu-date-picker-cells-cell"><em index="3">4月</em></span><span class="ivu-date-picker-cells-cell"><em index="4">5月</em></span><span class="ivu-date-picker-cells-cell"><em index="5">6月</em></span><span class="ivu-date-picker-cells-cell"><em index="6">7月</em></span><span class="ivu-date-picker-cells-cell"><em index="7">8月</em></span><span class="ivu-date-picker-cells-cell"><em index="8">9月</em></span><span class="ivu-date-picker-cells-cell"><em index="9">10月</em></span><span class="ivu-date-picker-cells-cell"><em index="10">11月</em></span><span class="ivu-date-picker-cells-cell"><em index="11">12月</em></span><!--v-for-end-->
                                                </div>
                                            </div>
                                            <div class="ivu-picker-panel-content ivu-picker-panel-content-right">
                                                <div class="ivu-date-picker-header">
                                                    <span class="ivu-picker-panel-icon-btn ivu-date-picker-prev-btn ivu-date-picker-prev-btn-arrow-double" style="display: none;"><i class="ivu-icon ivu-icon-ios-arrow-left"></i></span>
                                                    <span class="ivu-date-picker-header-label">2017年</span>
                                                    <span class="ivu-date-picker-header-label">4 月</span>
                                                    <span class="ivu-picker-panel-icon-btn ivu-date-picker-next-btn ivu-date-picker-next-btn-arrow-double"><i class="ivu-icon ivu-icon-ios-arrow-right"></i></span>
                                                    <span class="ivu-picker-panel-icon-btn ivu-date-picker-next-btn ivu-date-picker-next-btn-arrow"><i class="ivu-icon ivu-icon-ios-arrow-right"></i></span>
                                                </div>
                                                <div class="ivu-date-picker-cells">
                                                    <div class="ivu-date-picker-cells-header">
                                                        <span>日</span><span>一</span><span>二</span><span>三</span><span>四</span><span>五</span><span>六</span>
                                                    </div>
                                                    <span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-prev-month"><em index="0">26</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-prev-month"><em index="1">27</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-prev-month"><em index="2">28</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-prev-month"><em index="3">29</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-prev-month"><em index="4">30</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-prev-month"><em index="5">31</em></span><span class="ivu-date-picker-cells-cell"><em index="6">1</em></span><span class="ivu-date-picker-cells-cell"><em index="7">2</em></span><span class="ivu-date-picker-cells-cell"><em index="8">3</em></span><span class="ivu-date-picker-cells-cell"><em index="9">4</em></span><span class="ivu-date-picker-cells-cell"><em index="10">5</em></span><span class="ivu-date-picker-cells-cell"><em index="11">6</em></span><span class="ivu-date-picker-cells-cell"><em index="12">7</em></span><span class="ivu-date-picker-cells-cell"><em index="13">8</em></span><span class="ivu-date-picker-cells-cell"><em index="14">9</em></span><span class="ivu-date-picker-cells-cell"><em index="15">10</em></span><span class="ivu-date-picker-cells-cell"><em index="16">11</em></span><span class="ivu-date-picker-cells-cell"><em index="17">12</em></span><span class="ivu-date-picker-cells-cell"><em index="18">13</em></span><span class="ivu-date-picker-cells-cell"><em index="19">14</em></span><span class="ivu-date-picker-cells-cell"><em index="20">15</em></span><span class="ivu-date-picker-cells-cell"><em index="21">16</em></span><span class="ivu-date-picker-cells-cell"><em index="22">17</em></span><span class="ivu-date-picker-cells-cell"><em index="23">18</em></span><span class="ivu-date-picker-cells-cell"><em index="24">19</em></span><span class="ivu-date-picker-cells-cell"><em index="25">20</em></span><span class="ivu-date-picker-cells-cell"><em index="26">21</em></span><span class="ivu-date-picker-cells-cell"><em index="27">22</em></span><span class="ivu-date-picker-cells-cell"><em index="28">23</em></span><span class="ivu-date-picker-cells-cell"><em index="29">24</em></span><span class="ivu-date-picker-cells-cell"><em index="30">25</em></span><span class="ivu-date-picker-cells-cell"><em index="31">26</em></span><span class="ivu-date-picker-cells-cell"><em index="32">27</em></span><span class="ivu-date-picker-cells-cell"><em index="33">28</em></span><span class="ivu-date-picker-cells-cell"><em index="34">29</em></span><span class="ivu-date-picker-cells-cell"><em index="35">30</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="36">1</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="37">2</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="38">3</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="39">4</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="40">5</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-next-month"><em index="41">6</em></span><!--v-for-end-->
                                                </div>
                                                <div class="ivu-date-picker-cells ivu-date-picker-cells-year" style="display: none;">
                                                    <span class="ivu-date-picker-cells-cell"><em index="0">2010</em></span><span class="ivu-date-picker-cells-cell"><em index="1">2011</em></span><span class="ivu-date-picker-cells-cell"><em index="2">2012</em></span><span class="ivu-date-picker-cells-cell"><em index="3">2013</em></span><span class="ivu-date-picker-cells-cell"><em index="4">2014</em></span><span class="ivu-date-picker-cells-cell"><em index="5">2015</em></span><span class="ivu-date-picker-cells-cell"><em index="6">2016</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-selected"><em index="7">2017</em></span><span class="ivu-date-picker-cells-cell"><em index="8">2018</em></span><span class="ivu-date-picker-cells-cell"><em index="9">2019</em></span><!--v-for-end-->
                                                </div>
                                                <div class="ivu-date-picker-cells ivu-date-picker-cells-month" style="display: none;">
                                                    <span class="ivu-date-picker-cells-cell"><em index="0">1月</em></span><span class="ivu-date-picker-cells-cell"><em index="1">2月</em></span><span class="ivu-date-picker-cells-cell"><em index="2">3月</em></span><span class="ivu-date-picker-cells-cell ivu-date-picker-cells-cell-selected"><em index="3">4月</em></span><span class="ivu-date-picker-cells-cell"><em index="4">5月</em></span><span class="ivu-date-picker-cells-cell"><em index="5">6月</em></span><span class="ivu-date-picker-cells-cell"><em index="6">7月</em></span><span class="ivu-date-picker-cells-cell"><em index="7">8月</em></span><span class="ivu-date-picker-cells-cell"><em index="8">9月</em></span><span class="ivu-date-picker-cells-cell"><em index="9">10月</em></span><span class="ivu-date-picker-cells-cell"><em index="10">11月</em></span><span class="ivu-date-picker-cells-cell"><em index="11">12月</em></span><!--v-for-end-->
                                                </div>
                                            </div>
                                            <div class="ivu-picker-panel-content" style="display: none;">
                                                <div class="ivu-picker-panel-body-wrapper ivu-time-picker-with-range ivu-time-picker-with-seconds" style="display: none;">
                                                    <div class="ivu-picker-panel-body">
                                                        <div class="ivu-picker-panel-content ivu-picker-panel-content-left">
                                                            <div class="ivu-time-picker-header">
                                                                2017年 3 月

                                                            </div>
                                                            <div class="ivu-time-picker-cells ivu-time-picker-cells-with-seconds">
                                                                <div class="ivu-time-picker-cells-list">
                                                                    <ul class="ivu-time-picker-cells-ul">
                                                                        <li class="ivu-time-picker-cells-cell" index="0">00</li><li class="ivu-time-picker-cells-cell" index="1">01</li><li class="ivu-time-picker-cells-cell" index="2">02</li><li class="ivu-time-picker-cells-cell" index="3">03</li><li class="ivu-time-picker-cells-cell" index="4">04</li><li class="ivu-time-picker-cells-cell" index="5">05</li><li class="ivu-time-picker-cells-cell" index="6">06</li><li class="ivu-time-picker-cells-cell" index="7">07</li><li class="ivu-time-picker-cells-cell" index="8">08</li><li class="ivu-time-picker-cells-cell" index="9">09</li><li class="ivu-time-picker-cells-cell" index="10">10</li><li class="ivu-time-picker-cells-cell" index="11">11</li><li class="ivu-time-picker-cells-cell" index="12">12</li><li class="ivu-time-picker-cells-cell" index="13">13</li><li class="ivu-time-picker-cells-cell" index="14">14</li><li class="ivu-time-picker-cells-cell" index="15">15</li><li class="ivu-time-picker-cells-cell" index="16">16</li><li class="ivu-time-picker-cells-cell" index="17">17</li><li class="ivu-time-picker-cells-cell" index="18">18</li><li class="ivu-time-picker-cells-cell" index="19">19</li><li class="ivu-time-picker-cells-cell" index="20">20</li><li class="ivu-time-picker-cells-cell" index="21">21</li><li class="ivu-time-picker-cells-cell" index="22">22</li><li class="ivu-time-picker-cells-cell" index="23">23</li><!--v-for-end-->
                                                                    </ul>
                                                                </div>
                                                                <div class="ivu-time-picker-cells-list">
                                                                    <ul class="ivu-time-picker-cells-ul">
                                                                        <li class="ivu-time-picker-cells-cell" index="0">00</li><li class="ivu-time-picker-cells-cell" index="1">01</li><li class="ivu-time-picker-cells-cell" index="2">02</li><li class="ivu-time-picker-cells-cell" index="3">03</li><li class="ivu-time-picker-cells-cell" index="4">04</li><li class="ivu-time-picker-cells-cell" index="5">05</li><li class="ivu-time-picker-cells-cell" index="6">06</li><li class="ivu-time-picker-cells-cell" index="7">07</li><li class="ivu-time-picker-cells-cell" index="8">08</li><li class="ivu-time-picker-cells-cell" index="9">09</li><li class="ivu-time-picker-cells-cell" index="10">10</li><li class="ivu-time-picker-cells-cell" index="11">11</li><li class="ivu-time-picker-cells-cell" index="12">12</li><li class="ivu-time-picker-cells-cell" index="13">13</li><li class="ivu-time-picker-cells-cell" index="14">14</li><li class="ivu-time-picker-cells-cell" index="15">15</li><li class="ivu-time-picker-cells-cell" index="16">16</li><li class="ivu-time-picker-cells-cell" index="17">17</li><li class="ivu-time-picker-cells-cell" index="18">18</li><li class="ivu-time-picker-cells-cell" index="19">19</li><li class="ivu-time-picker-cells-cell" index="20">20</li><li class="ivu-time-picker-cells-cell" index="21">21</li><li class="ivu-time-picker-cells-cell" index="22">22</li><li class="ivu-time-picker-cells-cell" index="23">23</li><li class="ivu-time-picker-cells-cell" index="24">24</li><li class="ivu-time-picker-cells-cell" index="25">25</li><li class="ivu-time-picker-cells-cell" index="26">26</li><li class="ivu-time-picker-cells-cell" index="27">27</li><li class="ivu-time-picker-cells-cell" index="28">28</li><li class="ivu-time-picker-cells-cell" index="29">29</li><li class="ivu-time-picker-cells-cell" index="30">30</li><li class="ivu-time-picker-cells-cell" index="31">31</li><li class="ivu-time-picker-cells-cell" index="32">32</li><li class="ivu-time-picker-cells-cell" index="33">33</li><li class="ivu-time-picker-cells-cell" index="34">34</li><li class="ivu-time-picker-cells-cell" index="35">35</li><li class="ivu-time-picker-cells-cell" index="36">36</li><li class="ivu-time-picker-cells-cell" index="37">37</li><li class="ivu-time-picker-cells-cell" index="38">38</li><li class="ivu-time-picker-cells-cell" index="39">39</li><li class="ivu-time-picker-cells-cell" index="40">40</li><li class="ivu-time-picker-cells-cell" index="41">41</li><li class="ivu-time-picker-cells-cell" index="42">42</li><li class="ivu-time-picker-cells-cell" index="43">43</li><li class="ivu-time-picker-cells-cell" index="44">44</li><li class="ivu-time-picker-cells-cell" index="45">45</li><li class="ivu-time-picker-cells-cell" index="46">46</li><li class="ivu-time-picker-cells-cell" index="47">47</li><li class="ivu-time-picker-cells-cell" index="48">48</li><li class="ivu-time-picker-cells-cell" index="49">49</li><li class="ivu-time-picker-cells-cell" index="50">50</li><li class="ivu-time-picker-cells-cell" index="51">51</li><li class="ivu-time-picker-cells-cell" index="52">52</li><li class="ivu-time-picker-cells-cell" index="53">53</li><li class="ivu-time-picker-cells-cell" index="54">54</li><li class="ivu-time-picker-cells-cell" index="55">55</li><li class="ivu-time-picker-cells-cell" index="56">56</li><li class="ivu-time-picker-cells-cell" index="57">57</li><li class="ivu-time-picker-cells-cell" index="58">58</li><li class="ivu-time-picker-cells-cell" index="59">59</li><!--v-for-end-->
                                                                    </ul>
                                                                </div>
                                                                <div class="ivu-time-picker-cells-list">
                                                                    <ul class="ivu-time-picker-cells-ul">
                                                                        <li class="ivu-time-picker-cells-cell" index="0">00</li><li class="ivu-time-picker-cells-cell" index="1">01</li><li class="ivu-time-picker-cells-cell" index="2">02</li><li class="ivu-time-picker-cells-cell" index="3">03</li><li class="ivu-time-picker-cells-cell" index="4">04</li><li class="ivu-time-picker-cells-cell" index="5">05</li><li class="ivu-time-picker-cells-cell" index="6">06</li><li class="ivu-time-picker-cells-cell" index="7">07</li><li class="ivu-time-picker-cells-cell" index="8">08</li><li class="ivu-time-picker-cells-cell" index="9">09</li><li class="ivu-time-picker-cells-cell" index="10">10</li><li class="ivu-time-picker-cells-cell" index="11">11</li><li class="ivu-time-picker-cells-cell" index="12">12</li><li class="ivu-time-picker-cells-cell" index="13">13</li><li class="ivu-time-picker-cells-cell" index="14">14</li><li class="ivu-time-picker-cells-cell" index="15">15</li><li class="ivu-time-picker-cells-cell" index="16">16</li><li class="ivu-time-picker-cells-cell" index="17">17</li><li class="ivu-time-picker-cells-cell" index="18">18</li><li class="ivu-time-picker-cells-cell" index="19">19</li><li class="ivu-time-picker-cells-cell" index="20">20</li><li class="ivu-time-picker-cells-cell" index="21">21</li><li class="ivu-time-picker-cells-cell" index="22">22</li><li class="ivu-time-picker-cells-cell" index="23">23</li><li class="ivu-time-picker-cells-cell" index="24">24</li><li class="ivu-time-picker-cells-cell" index="25">25</li><li class="ivu-time-picker-cells-cell" index="26">26</li><li class="ivu-time-picker-cells-cell" index="27">27</li><li class="ivu-time-picker-cells-cell" index="28">28</li><li class="ivu-time-picker-cells-cell" index="29">29</li><li class="ivu-time-picker-cells-cell" index="30">30</li><li class="ivu-time-picker-cells-cell" index="31">31</li><li class="ivu-time-picker-cells-cell" index="32">32</li><li class="ivu-time-picker-cells-cell" index="33">33</li><li class="ivu-time-picker-cells-cell" index="34">34</li><li class="ivu-time-picker-cells-cell" index="35">35</li><li class="ivu-time-picker-cells-cell" index="36">36</li><li class="ivu-time-picker-cells-cell" index="37">37</li><li class="ivu-time-picker-cells-cell" index="38">38</li><li class="ivu-time-picker-cells-cell" index="39">39</li><li class="ivu-time-picker-cells-cell" index="40">40</li><li class="ivu-time-picker-cells-cell" index="41">41</li><li class="ivu-time-picker-cells-cell" index="42">42</li><li class="ivu-time-picker-cells-cell" index="43">43</li><li class="ivu-time-picker-cells-cell" index="44">44</li><li class="ivu-time-picker-cells-cell" index="45">45</li><li class="ivu-time-picker-cells-cell" index="46">46</li><li class="ivu-time-picker-cells-cell" index="47">47</li><li class="ivu-time-picker-cells-cell" index="48">48</li><li class="ivu-time-picker-cells-cell" index="49">49</li><li class="ivu-time-picker-cells-cell" index="50">50</li><li class="ivu-time-picker-cells-cell" index="51">51</li><li class="ivu-time-picker-cells-cell" index="52">52</li><li class="ivu-time-picker-cells-cell" index="53">53</li><li class="ivu-time-picker-cells-cell" index="54">54</li><li class="ivu-time-picker-cells-cell" index="55">55</li><li class="ivu-time-picker-cells-cell" index="56">56</li><li class="ivu-time-picker-cells-cell" index="57">57</li><li class="ivu-time-picker-cells-cell" index="58">58</li><li class="ivu-time-picker-cells-cell" index="59">59</li><!--v-for-end-->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ivu-picker-panel-content ivu-picker-panel-content-right">
                                                            <div class="ivu-time-picker-header">
                                                                2017年 3 月
                                                            </div>
                                                            <div class="ivu-time-picker-cells ivu-time-picker-cells-with-seconds">
                                                                <div class="ivu-time-picker-cells-list">
                                                                    <ul class="ivu-time-picker-cells-ul">
                                                                        <li class="ivu-time-picker-cells-cell" index="0">00</li><li class="ivu-time-picker-cells-cell" index="1">01</li><li class="ivu-time-picker-cells-cell" index="2">02</li><li class="ivu-time-picker-cells-cell" index="3">03</li><li class="ivu-time-picker-cells-cell" index="4">04</li><li class="ivu-time-picker-cells-cell" index="5">05</li><li class="ivu-time-picker-cells-cell" index="6">06</li><li class="ivu-time-picker-cells-cell" index="7">07</li><li class="ivu-time-picker-cells-cell" index="8">08</li><li class="ivu-time-picker-cells-cell" index="9">09</li><li class="ivu-time-picker-cells-cell" index="10">10</li><li class="ivu-time-picker-cells-cell" index="11">11</li><li class="ivu-time-picker-cells-cell" index="12">12</li><li class="ivu-time-picker-cells-cell" index="13">13</li><li class="ivu-time-picker-cells-cell" index="14">14</li><li class="ivu-time-picker-cells-cell" index="15">15</li><li class="ivu-time-picker-cells-cell" index="16">16</li><li class="ivu-time-picker-cells-cell" index="17">17</li><li class="ivu-time-picker-cells-cell" index="18">18</li><li class="ivu-time-picker-cells-cell" index="19">19</li><li class="ivu-time-picker-cells-cell" index="20">20</li><li class="ivu-time-picker-cells-cell" index="21">21</li><li class="ivu-time-picker-cells-cell" index="22">22</li><li class="ivu-time-picker-cells-cell" index="23">23</li><!--v-for-end-->
                                                                    </ul>
                                                                </div>
                                                                <div class="ivu-time-picker-cells-list">
                                                                    <ul class="ivu-time-picker-cells-ul">
                                                                        <li class="ivu-time-picker-cells-cell" index="0">00</li><li class="ivu-time-picker-cells-cell" index="1">01</li><li class="ivu-time-picker-cells-cell" index="2">02</li><li class="ivu-time-picker-cells-cell" index="3">03</li><li class="ivu-time-picker-cells-cell" index="4">04</li><li class="ivu-time-picker-cells-cell" index="5">05</li><li class="ivu-time-picker-cells-cell" index="6">06</li><li class="ivu-time-picker-cells-cell" index="7">07</li><li class="ivu-time-picker-cells-cell" index="8">08</li><li class="ivu-time-picker-cells-cell" index="9">09</li><li class="ivu-time-picker-cells-cell" index="10">10</li><li class="ivu-time-picker-cells-cell" index="11">11</li><li class="ivu-time-picker-cells-cell" index="12">12</li><li class="ivu-time-picker-cells-cell" index="13">13</li><li class="ivu-time-picker-cells-cell" index="14">14</li><li class="ivu-time-picker-cells-cell" index="15">15</li><li class="ivu-time-picker-cells-cell" index="16">16</li><li class="ivu-time-picker-cells-cell" index="17">17</li><li class="ivu-time-picker-cells-cell" index="18">18</li><li class="ivu-time-picker-cells-cell" index="19">19</li><li class="ivu-time-picker-cells-cell" index="20">20</li><li class="ivu-time-picker-cells-cell" index="21">21</li><li class="ivu-time-picker-cells-cell" index="22">22</li><li class="ivu-time-picker-cells-cell" index="23">23</li><li class="ivu-time-picker-cells-cell" index="24">24</li><li class="ivu-time-picker-cells-cell" index="25">25</li><li class="ivu-time-picker-cells-cell" index="26">26</li><li class="ivu-time-picker-cells-cell" index="27">27</li><li class="ivu-time-picker-cells-cell" index="28">28</li><li class="ivu-time-picker-cells-cell" index="29">29</li><li class="ivu-time-picker-cells-cell" index="30">30</li><li class="ivu-time-picker-cells-cell" index="31">31</li><li class="ivu-time-picker-cells-cell" index="32">32</li><li class="ivu-time-picker-cells-cell" index="33">33</li><li class="ivu-time-picker-cells-cell" index="34">34</li><li class="ivu-time-picker-cells-cell" index="35">35</li><li class="ivu-time-picker-cells-cell" index="36">36</li><li class="ivu-time-picker-cells-cell" index="37">37</li><li class="ivu-time-picker-cells-cell" index="38">38</li><li class="ivu-time-picker-cells-cell" index="39">39</li><li class="ivu-time-picker-cells-cell" index="40">40</li><li class="ivu-time-picker-cells-cell" index="41">41</li><li class="ivu-time-picker-cells-cell" index="42">42</li><li class="ivu-time-picker-cells-cell" index="43">43</li><li class="ivu-time-picker-cells-cell" index="44">44</li><li class="ivu-time-picker-cells-cell" index="45">45</li><li class="ivu-time-picker-cells-cell" index="46">46</li><li class="ivu-time-picker-cells-cell" index="47">47</li><li class="ivu-time-picker-cells-cell" index="48">48</li><li class="ivu-time-picker-cells-cell" index="49">49</li><li class="ivu-time-picker-cells-cell" index="50">50</li><li class="ivu-time-picker-cells-cell" index="51">51</li><li class="ivu-time-picker-cells-cell" index="52">52</li><li class="ivu-time-picker-cells-cell" index="53">53</li><li class="ivu-time-picker-cells-cell" index="54">54</li><li class="ivu-time-picker-cells-cell" index="55">55</li><li class="ivu-time-picker-cells-cell" index="56">56</li><li class="ivu-time-picker-cells-cell" index="57">57</li><li class="ivu-time-picker-cells-cell" index="58">58</li><li class="ivu-time-picker-cells-cell" index="59">59</li><!--v-for-end-->
                                                                    </ul>
                                                                </div>
                                                                <div class="ivu-time-picker-cells-list">
                                                                    <ul class="ivu-time-picker-cells-ul">
                                                                        <li class="ivu-time-picker-cells-cell" index="0">00</li><li class="ivu-time-picker-cells-cell" index="1">01</li><li class="ivu-time-picker-cells-cell" index="2">02</li><li class="ivu-time-picker-cells-cell" index="3">03</li><li class="ivu-time-picker-cells-cell" index="4">04</li><li class="ivu-time-picker-cells-cell" index="5">05</li><li class="ivu-time-picker-cells-cell" index="6">06</li><li class="ivu-time-picker-cells-cell" index="7">07</li><li class="ivu-time-picker-cells-cell" index="8">08</li><li class="ivu-time-picker-cells-cell" index="9">09</li><li class="ivu-time-picker-cells-cell" index="10">10</li><li class="ivu-time-picker-cells-cell" index="11">11</li><li class="ivu-time-picker-cells-cell" index="12">12</li><li class="ivu-time-picker-cells-cell" index="13">13</li><li class="ivu-time-picker-cells-cell" index="14">14</li><li class="ivu-time-picker-cells-cell" index="15">15</li><li class="ivu-time-picker-cells-cell" index="16">16</li><li class="ivu-time-picker-cells-cell" index="17">17</li><li class="ivu-time-picker-cells-cell" index="18">18</li><li class="ivu-time-picker-cells-cell" index="19">19</li><li class="ivu-time-picker-cells-cell" index="20">20</li><li class="ivu-time-picker-cells-cell" index="21">21</li><li class="ivu-time-picker-cells-cell" index="22">22</li><li class="ivu-time-picker-cells-cell" index="23">23</li><li class="ivu-time-picker-cells-cell" index="24">24</li><li class="ivu-time-picker-cells-cell" index="25">25</li><li class="ivu-time-picker-cells-cell" index="26">26</li><li class="ivu-time-picker-cells-cell" index="27">27</li><li class="ivu-time-picker-cells-cell" index="28">28</li><li class="ivu-time-picker-cells-cell" index="29">29</li><li class="ivu-time-picker-cells-cell" index="30">30</li><li class="ivu-time-picker-cells-cell" index="31">31</li><li class="ivu-time-picker-cells-cell" index="32">32</li><li class="ivu-time-picker-cells-cell" index="33">33</li><li class="ivu-time-picker-cells-cell" index="34">34</li><li class="ivu-time-picker-cells-cell" index="35">35</li><li class="ivu-time-picker-cells-cell" index="36">36</li><li class="ivu-time-picker-cells-cell" index="37">37</li><li class="ivu-time-picker-cells-cell" index="38">38</li><li class="ivu-time-picker-cells-cell" index="39">39</li><li class="ivu-time-picker-cells-cell" index="40">40</li><li class="ivu-time-picker-cells-cell" index="41">41</li><li class="ivu-time-picker-cells-cell" index="42">42</li><li class="ivu-time-picker-cells-cell" index="43">43</li><li class="ivu-time-picker-cells-cell" index="44">44</li><li class="ivu-time-picker-cells-cell" index="45">45</li><li class="ivu-time-picker-cells-cell" index="46">46</li><li class="ivu-time-picker-cells-cell" index="47">47</li><li class="ivu-time-picker-cells-cell" index="48">48</li><li class="ivu-time-picker-cells-cell" index="49">49</li><li class="ivu-time-picker-cells-cell" index="50">50</li><li class="ivu-time-picker-cells-cell" index="51">51</li><li class="ivu-time-picker-cells-cell" index="52">52</li><li class="ivu-time-picker-cells-cell" index="53">53</li><li class="ivu-time-picker-cells-cell" index="54">54</li><li class="ivu-time-picker-cells-cell" index="55">55</li><li class="ivu-time-picker-cells-cell" index="56">56</li><li class="ivu-time-picker-cells-cell" index="57">57</li><li class="ivu-time-picker-cells-cell" index="58">58</li><li class="ivu-time-picker-cells-cell" index="59">59</li><!--v-for-end-->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <span class="label">邮箱：</span>
                        <div class="fl">
                            <div>
                                <strong>ya*****ng@qq.com</strong>
                                <a target="_blank" class="ml5 ftx05" href="//safe.jd.com/validate/updateMail">修改</a>
                                <span class="ftx-03">&nbsp;&nbsp;&nbsp;已验证</span>
                            </div>

                        </div>

                        <div class="clr"></div>
                    </div>

                    <div class="item">
                        <span class="label">&nbsp;</span>
                        <div class="fl">
                            <input id="code" value="517372" style="display:none">
                            <input id="rkey" value="736e6f5f315f67657455736572496e666f79616e6763756977616e67353137333732" style="display:none">
                            <button class="ivu-btn ivu-btn-info" type="button">
                                <span>提交</span>
                            </button>
                        </div>
                    </div>



                </div>
            </div>

            <div class="clr"></div>
        </div>
    </div>
</div>

<script>

</script>

@stop

@section('js')

@stop