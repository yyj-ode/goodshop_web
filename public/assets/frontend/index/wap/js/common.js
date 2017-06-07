/**
 * Created by lichunjing on 2017/5/24.
 */
//---------------------titlebar挂顶--------------------//
// window.onload = function() {
//     var oDiv = $(".con ._head");
//     var oTop = oDiv.offset().top;
//     $(body).scroll(function(){
//         var sTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
//         if(sTop>0){
//             oDiv.addClass("abc");
//             //$(".headhead").show();
//         }else if(sTop<=0){
//              $(".headhead").hide();
//             oDiv.removeClass("abc");
//             oDiv.addClass("cba");
//         }else{
//             oDiv.removeClass("abc");
//             $(".headhead").show();
//         }
//
//     })
// };


// // addMarker(116, 39);
// //添加窗体信息
// //实例化信息窗体
// var content = [];
// content.push("地址：北京市朝阳区阜通东大街6号院3号楼东北8.3公里");
// var infoWindow = new AMap.InfoWindow({
//     isCustom: true,  //使用自定义窗体
//     content: createInfoWindow(content.join("<br/>")),
//     offset: new AMap.Pixel(110, -5)
// });
//
// //构建自定义信息窗体
// function createInfoWindow( content) {
//     var info = document.createElement("div");
//     info.className = "info";
//     // 定义中部内容
//     var middle = document.createElement("div");
//     middle.className = "info-middle";
//     middle.style.backgroundColor = 'white';
//     middle.innerHTML = content;
//     info.appendChild(middle);
//
//     // // // // 定义底部内容
//     var bottom = document.createElement("div");
//     bottom.className = "info-bottom";
//     bottom.style.position = 'relative';
//     bottom.style.top = '0px';
//     bottom.style.margin = '0 auto';
//     var sharp = document.createElement("img");
//     sharp.src = "https://webapi.amap.com/images/sharp.png";
//     bottom.appendChild(sharp);
//     info.appendChild(bottom);
//     return info;
// }

//轮播图
$(document).ready(function () {
    var mySwiper = new Swiper ('.swiper-container', {
        direction: 'horizontal',  //轮播方向
        autoplay:2000,  //自动轮播
        loop: true,   //循环
        autoplayDisableOnInteraction : false  //用户操作后不停止
    });
});
// var autoLen = $(".swiper-wrapper").children().length;
// var number = $(".leixing").find("span").eq(1).html();  //找到要变化数字的span
// setInterval(function(){
//     number++;
//     $(".leixing").find("span").eq(1).html(number);
//     if(number>=autoLen){
//         number = 0;
//     }
// },2300);

//商铺信息与销售分析切换
$(".det_message").on("click",".det_message li",function(){
    $(this).addClass("det_li").siblings("li").removeClass("det_li").addClass("yuan_li");
    if($(this).index()==0){
        $(".spjbxx").show().siblings(".xsxsfx").hide();
    }else{
        $(".xsxsfx").show().siblings(".spjbxx").hide();
    }
});


//联系看店
$(".xx").on("click",".footkd",function(){
    $(".lxtel").removeClass("none");
});
$(".lxcon").on("click",".exit",function(){
    $(".lxtel").addClass("none");
});