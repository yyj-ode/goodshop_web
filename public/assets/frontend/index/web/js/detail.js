/**
 * Created by lichunjing on 2017/5/18.
 */

//详情左右点击事件
var my_ul=$(".autoShow ul");
var li_num=$(".autoShow ul li").length;
var page=0;
var mar_left = $(".autoShow ul").css("marginLeft");
// console.log(mar_left)
$(".rr").click(function(){
    if(page>=li_num-4){
        return false;
    }
    page++;
    if(page<=li_num-4){
        my_ul.css("margin-left",-150*page+"px");
    }
});
$(".ll").click(function(){
    if(page<=0)return false;
    page--;
    if(page>=0){
        my_ul.css("margin-left",-150*page+"px");
    }
});
//选中小图大图改变
$("body").on("click",".autoShow ul li img",function(){
    var pic = $(this).attr("src");
    $("._detailLeft>img").attr("src",pic);
});
//商铺基本信息和线上销售分析切换
$("._message>ul li").mouseenter(function(){
    //console.log($(this).index());
    if($(this).index()==0){
        $(".messOne").removeClass("none");
        $(".messTwo").addClass("none");
        $("#online").css({"border":"0","color":"#333"});
        $(this).css({"borderBottom":"2px solid #083680","color":"#083680"});
    }else{
        $(".messTwo").removeClass("none");
        $(".messOne").addClass("none");
        $("#message").css({"border":"0","color":"#333"});
        $(this).css({"borderBottom":"2px solid #083680","color":"#083680"});
    }
});

//详情吸顶效果
// $(window).scroll(function(){
//     var num = $(window).scrollTop();
//     if(num>80){
//        $()
//     }else{
//         alert(0)
//     }
// });


//构建自定义信息窗体
function createInfoWindow( content) {
    var info = document.createElement("div");
    info.className = "info";
    // 定义中部内容
    var middle = document.createElement("div");
    middle.className = "info-middle";
    middle.style.backgroundColor = 'white';
    middle.innerHTML = content;
    info.appendChild(middle);

    // // // // 定义底部内容
    var bottom = document.createElement("div");
    bottom.className = "info-bottom";
    bottom.style.position = 'relative';
    bottom.style.top = '0px';
    bottom.style.margin = '0 auto';
    var sharp = document.createElement("img");
    sharp.src = "https://webapi.amap.com/images/sharp.png";
    bottom.appendChild(sharp);
    info.appendChild(bottom);
    return info;
}






//画折线图！！！！
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('tOne'));
var myChart2 = echarts.init(document.getElementById('tTwo'));
// 指定图表的配置项和数据
option = {
//            title: {
//                text: '折线图堆叠'
//            },
    tooltip: {
        trigger: 'axis'
    },
//            legend: {
//                data:['邮件营销','联盟广告','视频广告','直接访问','搜索引擎']
//            },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
//            toolbox: {
//                feature: {
//                    saveAsImage: {}
//                }
//            },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: ['12月','1月','2月','3月','4月','5月']
    },
    yAxis: {
        type: 'value',
        data: ['0单','1000单','2000单','3000单','4000单','5000单']
    },
    series: [
        {
            name:'销售',
            type:'line',
            stack: '总量',
            data:[1800, 2000, 4050, 3000, 2509, 5000]
        }
    ]
};
// 使用刚指定的配置项和数据显示图表。
myChart.setOption(option);
myChart2.setOption(option);

//鼠标滑过分享时
$(".det_sc i").mouseenter(function(){
    $(".bdsharebuttonbox").show();
});
$(".bdsharebuttonbox").mouseleave(function(){
    $(".bdsharebuttonbox").hide();
});
// $(".det_sc span").click(function(){
//     $(this).addClass("bgt");
// });