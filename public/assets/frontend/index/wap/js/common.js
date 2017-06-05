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
//---------------------登录-------------------//
//点击小人登录
$(".head").on("click",".head ._user",function(){
    $(".login_page").removeClass("none");
    $(".con").addClass("none");
    $(this).css({"zIndex":"0"});
});
//登录后点击小人  !!!!!!!!!wode????????
$(".head").on("click",".user_login",function(){
    $(".mine").removeClass("none");
    $(".con").addClass("none");
});
$(".head").on("click",".head .wode",function(){
    $(".mine").removeClass("none");
    $(".con").addClass("none");
});
//登录返回
$(".login_page").on("click",".login_page .coordinate",function(){
    $(".login_page").addClass("none");
    $(".con").removeClass("none");
});

//点击协议
$(".login_content .registerForm").on("click",".registerForm p a",function(){
    $(".agreement").removeClass("none");
    $(".con").addClass("none");
});
//协议返回
$(".agreement").on("click",".agreement .head .coordinate",function(){
    $(".agreement").addClass("none");
    $(".con").removeClass("none");
});
//-----------------------登录手机号验证-------------------//
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
$(".phoneNumber input").blur(function () {
    var phone = $(".phoneNumber input").val()
    if(!(/^1[34578]\d{9}$/.test(phone))){
        alert("手机号码有误，请重填");
        return false;
    }else {
        //------------------发送验证码-------------------
        var send_html=$(".send").html();
        var sed_num=60;
        var judge=true;  //此变量解决点击连续点击 触发多次事件问题
        $(".verifica").on("click",".send",function(){
            if(judge){
                judge=false;
                $(".send").html(sed_num+"s");
                if(send_html=="发送验证码"){
                    var setInt = setInterval(function(){
                        if(sed_num==1){
                            $(".send").html("重新获取");
                            //judge = true;
                            sed_num=60;
                            judge=true;
                            clearInterval(setInt);
                        }else{
                            sed_num--;
                            $(".send").html(sed_num+"s");
                        }
                    },1000);

                };
            }
        });

    }
});
//-------------  详情页  --------------//
//调取高德地图，根据经纬度定位
var map = new AMap.Map('container',{
    resizeEnable: true,
    zoom: 10,
    center: [116.397428, 39.90923],
    mapStyle:'amap://styles/d6bf8c1d69cea9f5c696185ad4ac4c86'
});
map.plugin(["AMap.ToolBar"], function() {
    map.addControl(new AMap.ToolBar());
});
//添加标注
function addMarker(j,w){
    marker = new AMap.Marker({
        icon:new AMap.Icon({
            image: "img/pcdt.png",
            size: new AMap.Size(23, 29),  //图标大小
            imageSize: new AMap.Size(23,29)
        }),
        position:new AMap.LngLat(j,w)
    });
    marker.setMap(map);  //在地图上添加点
    //鼠标点击marker弹出自定义的信息窗体
    AMap.event.addListener(marker, 'click', function() {
        infoWindow.open(map, marker.getPosition());
    });
}
 addMarker(116.397428, 39.90923);
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

//点击收藏与取消
$(".xx").on("click",".footsc",function(){
    if($(".footsc span").html()=="收藏"){
        $(".hadcollect").removeClass("none");
        setTimeout(function(){
            $(".hadcollect").addClass("none");
        },1500);
        $(".footsc i").addClass("marBgt");
        $(".footsc span").addClass("marRight");
        $(".footsc span").html("已收藏");
    }else{
        $("._hadcollect").removeClass("none");
        setTimeout(function(){
            $("._hadcollect").addClass("none");
        },1500);
        $(".footsc i").removeClass("marBgt");
        $(".footsc span").removeClass("marRight");
        $(".footsc span").html("收藏");
    }
});
//联系看店
$(".xx").on("click",".footkd",function(){
    $(".lxtel").removeClass("none");
});
$(".lxcon").on("click",".exit",function(){
    $(".lxtel").addClass("none");
});