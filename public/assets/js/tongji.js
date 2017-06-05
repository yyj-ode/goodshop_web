//百度统计
var _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?79a354b8562ef013d0da9c29ee53c1c4";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();

//百度推送
/****跳转到手机站***/
/**
Wind.use('jquery','uaredirect',function() {
    var uaredirectUrl = window.location.href;
    uaredirect(uaredirectUrl.replace(window.location.host, 'wap.iqilong.com'))
});
**/

function removeHTMLTag(str) {
    str = str.replace(/<\/?[^>]*>/g,''); //去除HTML tag
    str = str.replace(/[ | ]*\n/g,'\n'); //去除行尾空白
    str = str.replace(/\n[\s| | ]*\r/g,'\n'); //去除多余空行
    str=str.replace(/ /ig,'');//去掉
    return str;
}