/**
 * Created by lichunjing on 2017/5/5.
 */
//设置弹窗剧中
$(function () {
    $(".filter .filter_content").css("left",(parseInt($("body").css("width"))-390)/2+"px");
});
// ----------------------------首页的货--------------------------
//最开始的蒙层
$("body").on("click",".filter_content>p>span",function(){
    $(".filter").addClass("none");
    //打开页面3秒后弹窗消失
    setTimeout(function () {
        $(".content .show .alert").addClass("none");
    },3000);

});
$("body").on("click",".filter_con>i",function(){
    $(".filter").addClass("none");
    //打开页面3秒后弹窗消失
    setTimeout(function () {
        $(".content .show .alert").addClass("none");
    },3000);

});
// *******************登录模块***************
// 点击用户弹出登录页面
$(".head").on("click","._user",function(){
    $(".mask").removeClass("none");
});
//取消登录
$(".login").on("click",".btn_one",function(){
    $(".mask").addClass("none");
});
//输入手机号码，
$(".phoneNumber input").focus(function () {
    // $(this).attr("placeholder"," ");
});
//*********************************


// **********************************


// **********************************
//判断滚动高度 返回顶部出现
$(window).scroll(function(){
    var num = $(window).scrollTop();
    if(num>800){
        $(".return").fadeIn();
    }else{
        $(".return").fadeOut();
    }
});
//鼠标移入 显示客服电话
$(".phone").mouseenter(function(e){
    $(this).addClass("phone_mouseover");
    $(".server_phone").removeClass("none");
});
//鼠标移出 客服电话消失
$(".phone").mouseleave(function(e){
    $(this).removeClass("phone_mouseover");
    $(".server_phone").addClass("none");
});
//点击回到顶部
$(".return").on("click",".top",function (){
    //window.scrollTo(0,0);
    $('body').animate({ scrollTop: 0 }, 500);
});


// //点击出现筛选框
// $(document).on("click",".domain",function(){
//     $(".first, .third, .forth, .second").addClass("none");
//     $(".domain .first").removeClass("none");
//
// });
// //鼠标划过出现二级联动
// $(".domain .all li").mouseenter(function(e){
//     $(".domain .erji").removeClass("none");
//     $(".domain .erji").html($(this).find("ul").html());
// });
// //点击选中显示
// $(document).on("click",".erji li",function(){
//     //console.log($(this).index())
//     $(".domain i").text(($(this).text()));
//     $(".first").addClass("none");
//     // $(".first").addClass("none");
// });
// //鼠标移出
// $(".first, .third, .forth, .second").mouseleave(function(e){
//     //alert(8)
//     $(this).addClass("none");
// });
// //点击出现筛选框2
// $(document).on("click",".type",function(){
//     $(".first, .third, .forth, .second").addClass("none");
//     $(".second").removeClass("none");
// });
// //点击选中显示
// $(document).on("click",".second ul li",function(){
//     $(".type i").text(($(this).text()));
//     $(".second").addClass("none");
// });
// //鼠标移出
// /*$(".second").mouseleave(function(e){
//  $(this).addClass("none");
//  });*/
// //点击出现筛选框3
// $(document).on("click",".area",function(){
//     $(".first, .third, .forth, .second").addClass("none");
//     $(".third").removeClass("none");
// });
// //点击选中显示
// $(document).on("click",".third ul li",function(){
//     $(".area i").text(($(this).text()));
//     $(".third").addClass("none");
// });
// //鼠标移出
// /*$(".third").mouseleave(function(e){
//  $(this).addClass("none");
//  });*/
//
// //点击出现筛选框4
// $(document).on("click",".budget",function(){
//     $(".first, .third, .forth, .second").addClass("none");
//     $(".forth").removeClass("none");
// });
// //点击选中显示
// $(document).on("click",".forth ul li",function(){
//     $(".budget i").text(($(this).text()));
//     $(".forth").addClass("none");
// });
// //鼠标移出
// /*$(".forth").mouseleave(function(e){
//  $(this).addClass("none");
//  });*/
//
//
//





//----------------------------------收藏页的货-------------------------------
//收藏页取消收藏
$("._coll_con .bom_right p").click(function(){
    //console.log($(this).parent().parent().parent().parent().index());
    $("._coll_con .quxiao").removeClass("none");
    setTimeout(function () {
        $("._coll_con .quxiao").addClass("none");
        $("._coll_con ul li").eq($(this).parent().parent().parent().parent().index()).remove();
    },3000);
});

