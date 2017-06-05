{{--登录--}}
<script type="text/javascript">
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
</script>

<script src="{{asset('assets/js/tongji.js')}}" type="text/javascript"></script>