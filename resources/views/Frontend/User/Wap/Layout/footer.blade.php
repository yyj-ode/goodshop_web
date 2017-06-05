<div class="s_footer">
    <div class="s_footlink">
        <a href="http://www.nndeal.com/company/aboutUs.htm">人类健康网简介</a>
        <span>|</span>
        <a href="http://www.nndeal.com/company/ad.htm">广告服务</a>
        <span>|</span>
        <a href="http://www.nndeal.com/company/job.htm">招贤纳士</a>
        <span>|</span>
        <a href="http://www.nndeal.com/company/contact.htm">联系人类健康网</a>
        <span>|</span>
        <a href="http://www.nndeal.com/company/remark.htm">意见反馈</a>
        <span>|</span>
        <a href="http://www.nndeal.com/company/law.htm">服务条款</a>
        <span>|</span>
        <a href="http://www.nndeal.com/company/sitemap.htm">网站地图</a>
    </div>
    <div class="s_footcopy">
        <span> 特别声明：本站内容仅供参考，不作为诊断及医疗依据。
            <br>
            Copyright&nbsp;©&nbsp;2000-2015&nbsp;&nbsp;Feihua All rights reserved
            <br>
            NNDeal 版权所有
            <br>
        </span>
    </div>
</div>

{{--登录--}}
<script type="text/javascript">
    Wind.use('migrate','jquery','nprogress','cookie','slides','slidesjs','scrollMonitor','qrcode','fancybox','flexisel',function() {
        $(document).ready(function(){
            setTimeout(function() { NProgress.done() }, 100);
        });

        $(document).ready(function() {
            $(window).scroll(function() {

                if ($(document).scrollTop() >= 60 && ($(document).height() - $(document).scrollTop() - $(window).height() - 250) > 0 ){
                    $("#fixedBar").css({"visibility":"visible","opacity":1,"bottom":0})
                }else{
                    $("#fixedBar").css({"visibility":"hidden","opacity":0,"bottom":"-92px"})
                }

            });
        });

        $(function() {
            $(window).scroll(function() {
                var top=$(document).scrollTop();
                var searchWrap = $($("div.s_searchwrap")[0]);
                if (top >= 120) {
                    if (!searchWrap.parent().hasClass("head_move")) {
                        searchWrap.wrap("<div class='head_move'/>");
                        searchWrap.find(".s_searchHot,.s_mainnavwrap01,.s_searchwrap02").hide();
                        searchWrap.find(".s_searchwrap01_2,.s_searchwrap01_3").addClass('s_searchwrap01');
                    }
                } else if (top <= 10) {
                    if (searchWrap.parent().hasClass("head_move")) {
                        searchWrap.unwrap();
                        searchWrap.find(".s_searchHot,.s_mainnavwrap01,.s_searchwrap02").show();
                        searchWrap.find(".s_searchwrap01_2,.s_searchwrap01_3").removeClass('s_searchwrap01');
                    }
                }
            });
        });

        (function () {
            var right_defaultVal = "输入您的问题，10分钟内即可得到多名专家的解答";

            //一、拼接dom
            var menuOnWrapper = $("<div class='btm_right_float tw_rb_on menuOn' style='display:none;right:0px;bottom:0px'><ul></ul><form id='answerForm' action='/question/questionpresent' method='post' target='_blank'><a class='tw_rb_close closeForm'></a><textarea id='content' class='placeholder' name='word' placeholder='" + right_defaultVal + "' ></textarea><input type='submit' value=''/></form><a href='/mobile/weixin' target='_blank' class='tw_rb_myyz'>用微信问医生、约医生 </a></div>");
            var menuOffWrapper = $("<div class='btm_right_float tw_rb_off menuOff' style='display:block;right:0px;bottom:100px'><ul></ul><a class='tw_rb_close exist'></a><p class='quickAsk'></p></div>");

            //二、注册事件
            function bindRightEvent() {


                var menuOn = $(".menuOn");
                var menuOff = $(".menuOff");

                var quickAsk = $(".quickAsk");
                var exist = $(".exist");
                var closeForm = $(".closeForm");

                quickAsk.bind("click", function () {
                    menuOff.css("display", "none");
                    menuOn.css("display", "block");
                    //写入cookie
                    $.cookie("formstate","open",{expires:7});
                });


                exist.bind("click", function (e) {
                    e.stopPropagation();

                    menuOff.css("display", "none");
                    menuOn.css("display", "block");
                    //写入cookie
                    $.cookie("formstate","open",{expires:7});
                });

                closeForm.bind("click", function (e) {
                    e.stopPropagation();
                    menuOff.css("display", "block");
                    //$("#content").val("");
                    menuOn.css("display", "none");
                    //写入cookie
                    $.cookie("formstate","close",{expires:7});
                })

                $("#content").bind({
                    "focusin": function (e) {
                        e.stopPropagation();

                        $(this).removeClass("blur").addClass("focus");
                        if ($(this).val() == right_defaultVal) {
                            $(this).val("");
                        }
                    },
                    "focusout": function (e) {
                        e.stopPropagation();

                        $(this).removeClass("focus").addClass("blur")
                        if ($(this).val().length == 0) {
                            $(this).val(right_defaultVal);
                        }
                    }
                });

                $("#answerForm").bind("submit", function () {

                    //获取提交表单数据
                    var contentControl = $("#content");
                    var content = contentControl.val();

                    if (content == right_defaultVal) {
                        contentControl.val("");
                    }
                    $("#submit").submit();
                })
            };


            //判断是否支持placeholder
            function isPlaceholder() {
                var input = document.createElement('input');
                return 'placeholder' in input;
            }

            //三、添加到页面
            $(function () {
                var isFrom360onebox=$.cookie("from")=="360onebox";
                if(!isFrom360onebox){

                    $("body").append(menuOnWrapper).append(menuOffWrapper);
                    bindRightEvent();
                    //获取cookie值
                    var formstate=$.cookie("formstate");

                    if(formstate!="undefined"&&formstate=="close"){
                        $(".menuOn").css("display","none");
                        $(".menuOff").css("display","block");
                    }else{
                        $(".menuOn").css("display","block");
                        $(".menuOff").css("display","none");
                    }

                    if (!isPlaceholder()) {
                        $("input.placeholder,textarea.placeholder").each(function () {
                            $(this).val($(this).prop("placeholder"));
                            $(this).focusin(function () {
                                if ($(this).val() == $(this).prop("placeholder")) {
                                    $(this).val("");
                                }
                            }).focusout(function () {
                                if ($(this).val() == "") {
                                    $(this).val($(this).prop("placeholder"));
                                }
                            });
                        });
                    }

                }
            });
        })();

        $.each(['a','b','c'], function(i, item) {
            $("#loginwrap_"+item).hover(function () {
                $(this).find("ul").toggle();
                $(this).find("p").toggleClass("loginArrow_off loginArrow_on");
            });
        });

        $("#loginwrap_d").hover(function () {
            $("#loginwrap_e").toggle();
        });

    });
</script>