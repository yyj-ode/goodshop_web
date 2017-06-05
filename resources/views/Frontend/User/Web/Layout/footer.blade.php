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