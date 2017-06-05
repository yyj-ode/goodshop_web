/**
 * Created by lichunjing on 2017/5/9.
 */
//-----------------------经营类型选择---------------------
// $(".mold_box p").on("tap",function(){
//     $(this).addClass("mold_boxp");
// });

//搜索框得焦事件
$("._search_key input").focus(function(){
    $(".search_main").removeClass("none");
    $(".con").addClass("none");
});
//搜索返回
$(".search_main").on("click",".search_main .coordinate",function(){
    $(".search_main").addClass("none");
    $(".con").removeClass("none");
});

//免费客服咨询
$(".foot").on("click",".free_server",function(){
    $(".telephone").removeClass("none");
});
$(".telephone").on("click",".call_no",function () {
    $(".telephone").addClass("none");
});
// 首页选框~~~~~~~~~~
// //一级
// $(document).on("click",".shop_choice span",function(){
//     //console.log($(this).parent())
//     $(this).parent().find(".kuang").removeClass("none");
// });
// //点击选中显示
// $(document).on("click",".kuang>ul>li",function(){
//     //click1 ++;
//     //console.log($(this).parent().parent().parent().find("input").val(($(this).text())));
//     // if(click1 == 1){
//         $(this).parent().parent().parent().find("input").val(($(this).text()));
//     // }else{
//     //     console.log(888)
//     // }
// });
// //二级
// $(document).on("click",".list>.all>li",function(){
//     //var oLi = $("<li>返回上一级</li>");
//     //console.log($(this).children()[0]);
//     //$(this).children().prepend(oLi);
//     $(this).children().removeClass("none");
// });
// //
//
// $(document).on("click",".kuang>ul>li>.aa>li",function(){
//     // click2 ++;
//     // if(click2 == 1){
//         if($(this).text()=="返回上一级"){
//             $(this).addClass("none");
//             $("._choice>ul>li").removeClass("none");
//         }else{
//             $(".dingwei").text($(this).text());
//         }
//     // }else{
//     //     console.log(444)
//     // }
//
// });
// //鼠标移出
// $(".kuang").mouseleave(function(e){
//     $(this).addClass("none");
// });
// $(".myread").on("click",".myread .coordinate",function(){
//     $(".myread").addClass("none");
//     $(".con").removeClass("none");
// });
//
//
// //-----------------我的---------------
// $(".mine").on("click",".mine .coordinate",function(){
//     $(".mine").addClass("none");
//     $(".con").removeClass("none");
// });
// $(".mine").on("click",".mine .my_back",function(){
//     $(".mine").addClass("none");
//     $(".con").removeClass("none");
// });
// $(".mine").on("click",".mine .my_collect i",function(){
//     location.href="collect.html";
// });
// $(".mine").on("click",".mine .my_order i",function(){
//     location.href="order.html";
// });
//
 //-------------------区域筛选-------------
var that;
$(".select_con").on("click",".bor_right_li",function () {
    $(".shop_list").addClass("none");
    $(".shaixuan").addClass("none");
    $(this).siblings(".shaixuan").removeClass("none");
    var that =  $(this).parent().index();
});
$("body").delegate(".erci ul li","click",function(){
    $(this).css({"color":"#083680"}).siblings().css({"color":"#000"});
    if($(this).html().length>4){
        $(".bor_right").eq(0).find("span").html($(this).html().substring(0,3)+"...");
    }else{
        $(".bor_right").eq(0).find("span").html($(this).html());
    }
    $(this).parent().parent().parent().addClass("none");
    $(".shop_list").removeClass("none");
});
$(".shaixuan2 ul li").click(function() {
    $(this).css({"color": "#083680"}).siblings().css({"color": "#000"});
    if($(this).html().length>4){
        $(this).parent().parent().parent().find("span").html($(this).html().substring(0,3)+"...");
    }else{
        $(this).parent().parent().parent().find("span").html($(this).html());
    }
    $(this).parent().parent().addClass("none");
    $(".shop_list").removeClass("none");
});
$(".shaixuan1>ul>li").click(function(){
    $(this).css({"color":"#083680"}).siblings().css({"color":"#000"});
    $(".erci ul").html($(this).find(".aa").html());
})

// // 点击选择 筛选类别
//     $(".select_con").on("click",".select_con>li",function () {
//         $(".shop_list").addClass("none");
//         $(".shaixuan").addClass("none");
//         $(this).children(".shaixuan").removeClass("none");
//     });
// //点击地区选择一级
//     $(".shaixuan1>ul>li").click(function(){
//         $(this).css({"color":"#083680"}).siblings().css({"color":"#000"});
//         $(".erci ul").html($(this).find(".aa").html());
//     });
// //点击选择二级
//     $(".erci").on("click",".erci>ul>li",function(){
//         $(this).css({"color":"#083680"}).siblings().css({"color":"#000"});
//         $(".bor_right").eq(0).find("span").html($(this).html());
//         $(".shaixuan1").addClass("none");
//     });
// //点击选择一级
//     $(".shaixuan>ul>li").click(function() {
//         $(this).css({"color": "#083680"}).siblings().css({"color": "#000"});
//         $(this).parent().parent().parent().find("span").html($(this).html());
//         console.log($(this).parent().parent().parent(".shaixuan"))
//         $(this).parent().parent(".shaixuan").addClass("none");
//        // $(".shaixuan").addClass("none");
//     });


