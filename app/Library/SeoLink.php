<?php
namespace App\Library;
class SeoLink {
    static function portalcp_seoreal($content,$title=''){
        $words = array (
            "人类"=>"<a target='_blank' href='http://www.iqilong.com'>人类</a>",
            "健康"=>"<a target='_blank' href='http://www.iqilong.com'>健康</a>",
            "新闻"=>"<a href='http://www.iqilong.com/main-358.html' target='_blank'>新闻</a>",
            "男科"=>"<a target='_blank' href='http://www.iqilong.com/main-8.html'>男科</a>",
            "妇科"=>"<a target='_blank' href='http://www.iqilong.com/main-43.html'>妇科</a>",
            "育儿"=>"<a target='_blank' href='http://www.iqilong.com/main-347.html'>育儿</a>",
            "两性"=>"<a target='_blank' href='http://www.iqilong.com/main-356.html'>两性</a>",
            "整形"=>"<a target='_blank' href='http://www.iqilong.com/main-39.html'>整形</a>",
            "美容"=>"<a target='_blank' href='http://www.iqilong.com/main-14.html'>美容</a>",
            "健身"=>"<a target='_blank' href='http://www.iqilong.com/main-42.html'>健身</a>",
            "减肥"=>"<a target='_blank' href='http://www.iqilong.com/main-22.html'>减肥</a>",
            "保健"=>"<a target='_blank' href='http://www.iqilong.com/main-355.html'>保健</a>",
            "饮食"=>"<a target='_blank' href='http://www.iqilong.com/main-366.html'>饮食</a>",
            "心理"=>"<a target='_blank' href='http://www.iqilong.com/main-365.html'>心理</a>",
            "癌症"=>"<a target='_blank' href='http://www.iqilong.com/main-371.html'>癌症</a>",
            "性病"=>"<a target='_blank' href='http://www.iqilong.com/main-383.html'>性病</a>",
            "男性"=>"<a href='http://www.iqilong.com/main-1.html' target='_blank'>男性</a>",
            "女性"=>"<a href='http://www.iqilong.com/main-2.html' target='_blank'>女性</a>",
            "男人"=>"<a href='http://www.iqilong.com/main-1.html' target='_blank'>男人</a>",
            "女人"=>"<a href='http://www.iqilong.com/main-2.html' target='_blank'>女人</a>",
            "产科"=>"<a href='http://www.iqilong.com/main-41.html' target='_blank'>产科</a>",
            "老人"=>"<a href='http://www.iqilong.com/main-228.html' target='_blank'>老人</a>",
            "儿科"=>"<a href='http://www.iqilong.com/main-192.html' target='_blank'>儿科</a>",
            "性爱"=>"<a href='http://www.iqilong.com/main-356.html' target='_blank'>性爱</a>",
            "早泄"=>"<a href='http://www.iqilong.com/main-119.html' target='_blank'>早泄</a>",
            "调查"=>"<a href='http://www.iqilong.com/main-368.html' target='_blank'>调查</a>",
            "阅读"=>"<a href='http://www.iqilong.com/main-369.html' target='_blank'>阅读</a>",
            "评测"=>"<a href='http://www.iqilong.com/main-357.html' target='_blank'>评测</a>",
            "风湿"=>"<a href='http://www.iqilong.com/main-394.html' target='_blank'>风湿</a>",
            "阳痿"=>"<a href='http://www.iqilong.com/main-128.html' target='_blank'>阳痿</a>",
            "中医"=>"<a href='http://www.iqilong.com/main-350.html' target='_blank'>中医</a>",
            "药品"=>"<a href='http://www.iqilong.com/main-351.html' target='_blank'>药品</a>",
            "瑜伽"=>"<a href='http://www.iqilong.com/main-277.html' target='_blank'>瑜伽</a>",
            "流产"=>"<a href='http://www.iqilong.com/main-170.html' target='_blank'>流产</a>",
            "体检"=>"<a href='http://www.iqilong.com/main-363.html' target='_blank'>体检</a>",
            "急救"=>"<a href='http://www.iqilong.com/main-364.html' target='_blank'>急救</a>",
            "壮阳"=>"<a href='http://www.iqilong.com/main-39.html' target='_blank'>壮阳</a>",
            "避孕"=>"<a href='http://www.iqilong.com/lists-1257.html' target='_blank'>避孕</a>",
            "亲子"=>"<a href='http://www.iqilong.com/main-1382.html' target='_blank'>亲子</a>",
            "胃病"=>"<a href='http://www.iqilong.com/main-386.html' target='_blank'>胃病</a>",
            "养生"=>"<a href='http://www.iqilong.com/main-747.html' target='_blank'>养生</a>",
            "眼科"=>"<a href='http://www.iqilong.com/main-379.html' target='_blank'>眼科</a>",
            "骨科"=>"<a href='http://www.iqilong.com/main-381.html' target='_blank'>骨科</a>",
            "外遇"=>"<a href='http://www.iqilong.com/lists-478.html' target='_blank'>外遇</a>",
            "乙肝"=>"<a href='http://www.iqilong.com/main-387.html' target='_blank'>乙肝</a>",
            "散光"=>"<a href='http://www.iqilong.com/lists-1823.html' target='_blank'>散光</a>",
            "隆鼻"=>"<a href='http://www.iqilong.com/main-1632.html' target='_blank'>隆鼻</a>",
            "淋病"=>"<a href='http://www.iqilong.com/main-1698.html' target='_blank'>淋病</a>",
            "除皱"=>"<a href='http://www.iqilong.com/main-1636.html' target='_blank'>除皱</a>",
            "隆胸"=>"<a href='http://www.iqilong.com/main-1633.html' target='_blank'>隆胸</a>",
            "脱毛"=>"<a href='http://www.iqilong.com/main-2746.html' target='_blank'>脱毛</a>",
            "新生儿"=>"<a href='http://www.iqilong.com/main-1345.html' target='_blank'>新生儿</a>",
            "幼儿期"=>"<a href='http://www.iqilong.com/main-1354.html' target='_blank'>幼儿期</a>",
            "婴儿期"=>"<a href='http://www.iqilong.com/main-1371.html' target='_blank'>婴儿期</a>",
            "祛斑"=>"<a href='http://www.iqilong.com/lists-1635.html' target='_blank'>祛斑</a>",
            "提臀"=>"<a href='http://www.iqilong.com/lists-1637.html' target='_blank'>提臀</a>",
            "家居"=>"<a href='http://www.iqilong.com/lists-752.html' target='_blank'>家居</a>",
            "闭经"=>"<a href='http://www.iqilong.com/lists-913.html' target='_blank'>闭经</a>",
            "痛经"=>"<a href='http://www.iqilong.com/main-917.html' target='_blank'>痛经</a>",
            "人流"=>"<a href='http://www.iqilong.com/lists-923.html' target='_blank'>人流</a>",
            "避孕"=>"<a href='http://www.iqilong.com/lists-922.html' target='_blank'>避孕</a>",
            "护肤"=>"<a href='http://www.iqilong.com/main-47.html' target='_blank'>护肤</a>",
            "美白"=>"<a href='http://www.iqilong.com/main-63.html' target='_blank'>美白</a>",
            "美体"=>"<a href='http://www.iqilong.com/lists-2431.html' target='_blank'>美体</a>",
            "皱纹"=>"<a href='http://www.iqilong.com/lists-77.html' target='_blank'>皱纹</a>",
            "卸妆"=>"<a href='http://www.iqilong.com/lists-55.html' target='_blank'>卸妆</a>",
            "保湿"=>"<a href='http://www.iqilong.com/lists-58.html' target='_blank'>保湿</a>",
            "洁面"=>"<a href='http://www.iqilong.com/lists-56.html' target='_blank'>洁面</a>",
            "黑头"=>"<a href='http://www.iqilong.com/lists-553.html' target='_blank'>黑头</a>",
            "角质"=>"<a href='http://www.iqilong.com/lists-556.html' target='_blank'>角质</a>",
            "毛孔粗大"=>"<a href='http://www.iqilong.com/lists-554.html' target='_blank'>毛孔粗大</a>",
            "问题肌肤"=>"<a href='http://www.iqilong.com/main-52.html' target='_blank'>问题肌肤</a>",
            "彩妆"=>"<a href='http://www.iqilong.com/main-50.html' target='_blank'>彩妆</a>",
            "分娩"=>"<a href='http://www.iqilong.com/main-1329.html' target='_blank'>分娩</a>",
            "产后"=>"<a href='http://www.iqilong.com/main-1337.html' target='_blank'>产后</a>",
            "零食"=>"<a href='http://www.iqilong.com/lists-581.html' target='_blank'>零食</a>",
            "节食"=>"<a href='http://www.iqilong.com/lists-2406.html' target='_blank'>节食</a>",
            "果蔬"=>"<a href='http://www.iqilong.com/lists-579.html' target='_blank'>果蔬</a>",
            "茶饮"=>"<a href='http://www.iqilong.com/lists-580.html' target='_blank'>茶饮</a>",
            "瑜伽"=>"<a href='http://www.iqilong.com/main-277.html' target='_blank'>瑜伽</a>",
            "性交"=>"<a href='http://www.iqilong.com/lists-2352.html' target='_blank'>性交</a>",
            "前戏"=>"<a href='http://www.iqilong.com/lists-1251.html' target='_blank'>前戏</a>",
            "隐睾"=>"<a href='http://www.iqilong.com/main-2260.html' target='_blank'>隐睾</a>",
            "痛风"=>"<a href='http://www.iqilong.com/main-3414.html' target='_blank'>痛风</a>",
            "风湿热"=>"<a href='http://www.iqilong.com/main-3419.html' target='_blank'>风湿热</a>",
            "血管炎"=>"<a href='http://www.iqilong.com/main-3435.html' target='_blank'>血管炎</a>",
            "硬皮病"=>"<a href='http://www.iqilong.com/lists-3440.html' target='_blank'>硬皮病</a>",
            "骨关节炎"=>"<a href='http://www.iqilong.com/lists-3442.html' target='_blank'>骨关节炎</a>",
            "骨质疏松"=>"<a href='http://www.iqilong.com/main-1795.html' target='_blank'>骨质疏松</a>",
            "颈腰椎疾病"=>"<a href='http://www.iqilong.com/main-1757.html' target='_blank'>颈腰椎疾病</a>",
            "银屑病关节炎"=>"<a href='http://www.iqilong.com/lists-3443.html' target='_blank'>银屑病关节炎</a>",
            "强直性脊柱炎"=>"<a href='http://www.iqilong.com/main-3430.html' target='_blank'>强直性脊柱炎</a>",
            "类风湿性关节炎"=>"<a href='http://www.iqilong.com/main-3425.html' target='_blank'>类风湿性关节炎</a>",
            "系统性红斑狼疮"=>"<a href='http://www.iqilong.com/main-3446.html' target='_blank'>系统性红斑狼疮</a>",
            "输尿管结石"=>"<a href='http://www.iqilong.com/lists-2874.html' target='_blank'>输尿管结石</a>",
            "膀胱结石"=>"<a href='http://www.iqilong.com/lists-2875.html' target='_blank'>膀胱结石</a>",
            "尿道结石"=>"<a href='http://www.iqilong.com/lists-2876.html' target='_blank'>尿道结石</a>",
            "输尿管肿瘤"=>"<a href='http://www.iqilong.com/lists-2870.html' target='_blank'>输尿管肿瘤</a>",
            "膀胱肿瘤"=>"<a href='http://www.iqilong.com/lists-2871.html' target='_blank'>膀胱肿瘤</a>",
            "尿道肿瘤"=>"<a href='http://www.iqilong.com/lists-2872.html' target='_blank'>尿道肿瘤</a>",
            "尿道炎"=>"<a href='http://www.iqilong.com/lists-2863.html' target='_blank'>尿道炎</a>",
            "尿路感染"=>"<a href='http://www.iqilong.com/lists-2864.html' target='_blank'>尿路感染</a>",
            "骨折"=>"<a href='http://www.iqilong.com/main-1748.html' target='_blank'>骨折</a>",
            "膀胱炎"=>"<a href='http://www.iqilong.com/main-2859.html' target='_blank'>膀胱炎</a>",
            "尿道综合征"=>"<a href='http://www.iqilong.com/main-2865.html' target='_blank'>尿道综合征</a>",
            "泌尿系炎症"=>"<a href='http://www.iqilong.com/main-2858.html' target='_blank'>泌尿系炎症</a>",
            "泌尿系肿瘤"=>"<a href='http://www.iqilong.com/main-2869.html' target='_blank'>泌尿系肿瘤</a>",
            "泌尿系结石"=>"<a href='http://www.iqilong.com/main-2873.html' target='_blank'>泌尿系结石</a>",
            "脱位"=>"<a href='http://www.iqilong.com/main-1753.html' target='_blank'>脱位</a>",
            "肩周炎"=>"<a href='http://www.iqilong.com/main-1772.html' target='_blank'>肩周炎</a>",
            "鼠标手"=>"<a href='http://www.iqilong.com/main-1778.html' target='_blank'>鼠标手</a>",
            "膝关节炎"=>"<a href='http://www.iqilong.com/main-1782.html' target='_blank'>膝关节炎</a>",
            "踝关节扭伤"=>"<a href='http://www.iqilong.com/lists-1776.html' target='_blank'>踝关节扭伤</a>",
            "关节疾病"=>"<a href='http://www.iqilong.com/main-1771.html' target='_blank'>关节疾病</a>",
            "运动损伤"=>"<a href='http://www.iqilong.com/lists-3535.html' target='_blank'>运动损伤</a>",
            "腰腿痛"=>"<a href='http://www.iqilong.com/lists-1763.html' target='_blank'>腰腿痛</a>",
            "颈椎病"=>"<a href='http://www.iqilong.com/main-1758.html' target='_blank'>颈椎病</a>",
            "腰肌劳损"=>"<a href='http://www.iqilong.com/lists-1769.html' target='_blank'>腰肌劳损</a>",
            "腰部扭伤"=>"<a href='http://www.iqilong.com/lists-1770.html' target='_blank'>腰部扭伤</a>",
            "腰椎间盘突出"=>"<a href='http://www.iqilong.com/main-1764.html' target='_blank'>腰椎间盘突出</a>",
            "佝偻病"=>"<a href='http://www.iqilong.com/main-1791.html' target='_blank'>佝偻病</a>",
            "骨质增生"=>"<a href='http://www.iqilong.com/main-1799.html' target='_blank'>骨质增生</a>",
            "红眼病"=>"<a href='http://www.iqilong.com/lists-1832.html' target='_blank'>红眼病</a>",
            "明目饮食"=>"<a href='http://www.iqilong.com/lists-1837.html' target='_blank'>明目饮食</a>",
            "眼部肿瘤"=>"<a href='http://www.iqilong.com/lists-1829.html' target='_blank'>眼部肿瘤</a>",
            "老花眼"=>"<a href='http://www.iqilong.com/lists-1824.html' target='_blank'>老花眼</a>",
            "远视眼"=>"<a href='http://www.iqilong.com/lists-1822.html' target='_blank'>远视眼</a>",
            "屈光不正"=>"<a href='http://www.iqilong.com/main-1818.html' target='_blank'>屈光不正</a>",
            "眼镜"=>"<a href='http://www.iqilong.com/main-1846.html' target='_blank'>眼镜</a>",
            "眼药水"=>"<a href='http://www.iqilong.com/lists-1844.html' target='_blank'>眼药水</a>",
            "斜视与弱视"=>"<a href='http://www.iqilong.com/lists-1828.html' target='_blank'>斜视与弱视</a>",
            "色盲与色弱"=>"<a href='http://www.iqilong.com/lists-1833.html' target='_blank'>色盲与色弱</a>",
            "麦粒肿"=>"<a href='http://www.iqilong.com/lists-1826.html' target='_blank'>麦粒肿</a>",
            "牙齿矫正"=>"<a href='http://www.iqilong.com/main-1896.html' target='_blank'>牙齿矫正</a>",
            "拔牙"=>"<a href='http://www.iqilong.com/lists-1891.html' target='_blank'>拔牙</a>",
            "补牙"=>"<a href='http://www.iqilong.com/lists-1892.html' target='_blank'>补牙</a>",
            "烤瓷牙"=>"<a href='http://www.iqilong.com/lists-1893.html' target='_blank'>烤瓷牙</a>",
            "种植牙"=>"<a href='http://www.iqilong.com/lists-1894.html' target='_blank'>种植牙</a>",
            "洗牙"=>"<a href='http://www.iqilong.com/lists-1904.html' target='_blank'>洗牙</a>",
            "刷牙"=>"<a href='http://www.iqilong.com/lists-1905.html' target='_blank'>刷牙</a>",
            "牙膏"=>"<a href='http://www.iqilong.com/lists-1906.html' target='_blank'>牙膏</a>",
            "牙线"=>"<a href='http://www.iqilong.com/lists-1907.html' target='_blank'>牙线</a>",
            "漱口水"=>"<a href='http://www.iqilong.com/lists-1913.html' target='_blank'>漱口水</a>",
            "口腔溃疡"=>"<a href='http://www.iqilong.com/lists-1873.html' target='_blank'>口腔溃疡</a>",
            "嘴唇干裂"=>"<a href='http://www.iqilong.com/lists-1880.html' target='_blank'>嘴唇干裂</a>",
            "口腔扁平苔藓"=>"<a href='http://www.iqilong.com/lists-1878.html' target='_blank'>口腔扁平苔藓</a>",
            "口腔黏膜白斑"=>"<a href='http://www.iqilong.com/lists-1882.html' target='_blank'>口腔黏膜白斑</a>",
            "口腔癌"=>"<a href='http://www.iqilong.com/lists-1881.html' target='_blank'>口腔癌</a>",
            "口臭"=>"<a href='http://www.iqilong.com/lists-1879.html' target='_blank'>口臭</a>",
            "牙痛"=>"<a href='http://www.iqilong.com/lists-1876.html' target='_blank'>牙痛</a>",
            "龋齿"=>"<a href='http://www.iqilong.com/lists-1877.html' target='_blank'>龋齿</a>",
            "蛀牙"=>"<a href='http://www.iqilong.com/lists-1877.html' target='_blank'>蛀牙</a>",
            "牙周炎"=>"<a href='http://www.iqilong.com/lists-1875.html' target='_blank'>牙周炎</a>",
            "牙髓炎"=>"<a href='http://www.iqilong.com/lists-1874.html' target='_blank'>牙髓炎</a>",
            "肺癌"=>"<a href='http://www.iqilong.com/main-927.html' target='_blank'>肺癌</a>",
            "皮肤癌"=>"<a href='http://www.iqilong.com/main-3513.html' target='_blank'>皮肤癌</a>",
            "恶性淋巴癌"=>"<a href='http://www.iqilong.com/lists-3510.html' target='_blank'>恶性淋巴癌</a>",
            "睾丸癌"=>"<a href='http://www.iqilong.com/lists-3503.html' target='_blank'>睾丸癌</a>",
            "阴茎癌"=>"<a href='http://www.iqilong.com/lists-3504.html' target='_blank'>阴茎癌</a>",
            "白血病"=>"<a href='http://www.iqilong.com/main-3511.html' target='_blank'>白血病</a>",
            "脑瘤"=>"<a href='http://www.iqilong.com/main-3512.html' target='_blank'>脑瘤</a>",
            "骨癌"=>"<a href='http://www.iqilong.com/lists-3509.html' target='_blank'>骨癌</a>",
            "肝癌"=>"<a href='http://www.iqilong.com/main-944.html' target='_blank'>肝癌</a>",
            "胃癌"=>"<a href='http://www.iqilong.com/main-933.html' target='_blank'>胃癌</a>",
            "孕前"=>"<a href='http://www.iqilong.com/main-1313.html' target='_blank'>孕前</a>",
            "怀孕"=>"<a href='http://www.iqilong.com/main-1320.html' target='_blank'>怀孕</a>",
            "分娩"=>"<a href='http://www.iqilong.com/main-1329.html' target='_blank'>分娩</a>",
            "产后"=>"<a href='http://www.iqilong.com/main-1337.html' target='_blank'>产后</a>",
            "学龄前"=>"<a href='http://www.iqilong.com/main-1372.html' target='_blank'>学龄前</a>",
            "母婴用品"=>"<a href='http://www.iqilong.com/main-1400.html' target='_blank'>母婴用品</a>",
            "生男生女"=>"<a href='http://www.iqilong.com/lists-1317.html' target='_blank'>生男生女</a>",
            "优生优育"=>"<a href='http://www.iqilong.com/lists-1319.html' target='_blank'>优生优育</a>",
            "产检"=>"<a href='http://www.iqilong.com/lists-1324.html' target='_blank'>产检</a>",
            "胎教"=>"<a href='http://www.iqilong.com/lists-1328.html' target='_blank'>胎教</a>",
            "孕期B超"=>"<a href='http://www.iqilong.com/lists-3547.html' target='_blank'>孕期B超</a>",
            "孕晚期"=>"<a href='http://www.iqilong.com/lists-1323.html' target='_blank'>孕晚期</a>",
            "孕中期"=>"<a href='http://www.iqilong.com/lists-1322.html' target='_blank'>孕中期</a>",
            "孕早期"=>"<a href='http://www.iqilong.com/lists-1321.html' target='_blank'>孕早期</a>",
            "剖腹产"=>"<a href='http://www.iqilong.com/lists-1330.html' target='_blank'>剖腹产</a>",
            "顺产"=>"<a href='http://www.iqilong.com/lists-1331.html' target='_blank'>顺产</a>",
            "早产"=>"<a href='http://www.iqilong.com/lists-1332.html' target='_blank'>早产</a>",
            "难产"=>"<a href='http://www.iqilong.com/lists-1333.html' target='_blank'>难产</a>",
            "会阴侧切"=>"<a href='http://www.iqilong.com/lists-1334.html' target='_blank'>会阴侧切</a>",
            "坐月子"=>"<a href='http://www.iqilong.com/lists-1338.html' target='_blank'>坐月子</a>",
            "宝宝健康"=>"<a href='http://www.iqilong.com/lists-1344.html' target='_blank'>宝宝健康</a>",
            "微整形"=>"<a href='http://www.iqilong.com/main-1575.html' target='_blank'>微整形</a>",
            "注射美白"=>"<a href='http://www.iqilong.com/lists-1576.html' target='_blank'>注射美白</a>",
            "注射除皱"=>"<a href='http://www.iqilong.com/lists-1577.html' target='_blank'>注射除皱</a>",
            "注射丰满"=>"<a href='http://www.iqilong.com/lists-1578.html' target='_blank'>注射丰满</a>",
            "注射美容"=>"<a href='http://www.iqilong.com/main-2661.html' target='_blank'>注射美容</a>",
            "自体脂肪移植"=>"<a href='http://www.iqilong.com/lists-2666.html' target='_blank'>自体脂肪移植</a>",
            "胶原蛋白"=>"<a href='http://www.iqilong.com/lists-2668.html' target='_blank'>胶原蛋白</a>",
            "激光美容"=>"<a href='http://www.iqilong.com/main-1579.html' target='_blank'>激光美容</a>",
            "激光嫩肤"=>"<a href='http://www.iqilong.com/lists-1584.html' target='_blank'>激光嫩肤</a>",
            "激光去纹身"=>"<a href='http://www.iqilong.com/main-2691.html' target='_blank'>激光去纹身</a>",
            "激光除痣"=>"<a href='http://www.iqilong.com/main-1583.html' target='_blank'>激光除痣</a>",
            "激光祛疤"=>"<a href='http://www.iqilong.com/main-2698.html' target='_blank'>激光祛疤</a>",
            "激光祛痘"=>"<a href='http://www.iqilong.com/main-2711.html' target='_blank'>激光祛痘</a>",
            "电波拉皮"=>"<a href='http://www.iqilong.com/main-1585.html' target='_blank'>电波拉皮</a>",
            "光子美容"=>"<a href='http://www.iqilong.com/main-1586.html' target='_blank'>光子美容</a>",
            "光子嫩肤"=>"<a href='http://www.iqilong.com/main-1587.html' target='_blank'>光子嫩肤</a>",
            "去红血丝"=>"<a href='http://www.iqilong.com/main-2760.html' target='_blank'>去红血丝</a>",
            "纹绣美容"=>"<a href='http://www.iqilong.com/lists-1590.html' target='_blank'>纹绣美容</a>",
            "皮肤磨削"=>"<a href='http://www.iqilong.com/lists-1591.html' target='_blank'>皮肤磨削</a>",
            "抽脂塑性"=>"<a href='http://www.iqilong.com/main-1623.html' target='_blank'>抽脂塑性</a>",
            "抗老养颜"=>"<a href='http://www.iqilong.com/lists-2428.html' target='_blank'>抗老养颜</a>",
            "防晒"=>"<a href='http://www.iqilong.com/main-61.html' target='_blank'>防晒</a>",
            "控油"=>"<a href='http://www.iqilong.com/main-59.html' target='_blank'>控油</a>",
            "开眼角"=>"<a href='http://www.iqilong.com/main-2517.html' target='_blank'>开眼角</a>",
            "切眉术"=>"<a href='http://www.iqilong.com/lists-2524.html' target='_blank'>切眉术</a>",
            "纹眼线"=>"<a href='http://www.iqilong.com/lists-2525.html' target='_blank'>纹眼线</a>",
            "黑眼圈"=>"<a href='http://www.iqilong.com/main-2526.html' target='_blank'>黑眼圈</a>",
            "纹唇"=>"<a href='http://www.iqilong.com/lists-2489.html' target='_blank'>纹唇</a>",
            "厚唇变薄"=>"<a href='http://www.iqilong.com/lists-2487.html' target='_blank'>厚唇变薄</a>",
            "酒窝成形"=>"<a href='http://www.iqilong.com/lists-2488.html' target='_blank'>酒窝成形</a>",
            "丰唇术"=>"<a href='http://www.iqilong.com/main-2479.html' target='_blank'>丰唇术</a>",
            "唇珠成形"=>"<a href='http://www.iqilong.com/lists-2486.html' target='_blank'>唇珠成形</a>",
            "缺牙修补"=>"<a href='http://www.iqilong.com/lists-2615.html' target='_blank'>缺牙修补</a>",
            "隆下巴"=>"<a href='http://www.iqilong.com/lists-2730.html' target='_blank'>隆下巴</a>",
            "丰额头"=>"<a href='http://www.iqilong.com/lists-2732.html' target='_blank'>丰额头</a>",
            "乳晕漂红"=>"<a href='http://www.iqilong.com/lists-1634.html' target='_blank'>乳晕漂红</a>",
            "多发性肌炎与皮肌炎"=>"<a href='http://www.iqilong.com/main-3451.html' target='_blank'>多发性肌炎与皮肌炎</a>",
            "性误区"=>"<a href='http://www.iqilong.com/lists-1250.html' target='_blank'>性误区</a>",
            "性冷淡"=>"<a href='http://www.iqilong.com/lists-1239.html' target='_blank'>性冷淡</a>",
            "性高潮"=>"<a href='http://www.iqilong.com/lists-1240.html' target='_blank'>性高潮</a>",
            "安全期"=>"<a href='http://www.iqilong.com/lists-1241.html' target='_blank'>安全期</a>",
            "生殖器"=>"<a href='http://www.iqilong.com/lists-1242.html' target='_blank'>生殖器</a>",
            "性幻想"=>"<a href='http://www.iqilong.com/lists-2359.html' target='_blank'>性幻想</a>",
            "一夜情"=>"<a href='http://www.iqilong.com/lists-2344.html' target='_blank'>一夜情</a>",
            "性骚扰"=>"<a href='http://www.iqilong.com/lists-1259.html' target='_blank'>性骚扰</a>",
            "性技巧"=>"<a href='http://www.iqilong.com/lists-1615.html' target='_blank'>性技巧</a>",
            "瘦身霜"=>"<a href='http://www.iqilong.com/main-613.html' target='_blank'>瘦身霜</a>",
            "瘦身汤"=>"<a href='http://www.iqilong.com/lists-2405.html' target='_blank'>瘦身汤</a>",
            "性生活"=>"<a href='http://www.iqilong.com/main-2347.html' target='_blank'>性生活</a>",
            "外阴炎"=>"<a href='http://www.iqilong.com/lists-925.html' target='_blank'>外阴炎</a>",
            "皮肤科"=>"<a href='http://www.iqilong.com/main-382.html' target='_blank'>皮肤科</a>",
            "宫外孕"=>"<a href='http://www.iqilong.com/lists-171.html' target='_blank'>宫外孕</a>",
            "安全期"=>"<a href='http://www.iqilong.com/lists-1241.html' target='_blank'>安全期</a>",
            "同性恋"=>"<a href='http://www.iqilong.com/lists-2354.html' target='_blank'>同性恋</a>",
            "性虐待"=>"<a href='http://www.iqilong.com/lists-2355.html' target='_blank'>性虐待</a>",
            "偷窥癖"=>"<a href='http://www.iqilong.com/lists-2356.html' target='_blank'>偷窥癖</a>",
            "性高潮"=>"<a href='http://www.iqilong.com/lists-1240.html' target='_blank'>性高潮</a>",
            "口腔科"=>"<a href='http://www.iqilong.com/main-380.html' target='_blank'>口腔科</a>",
            "耳鼻喉"=>"<a href='http://www.iqilong.com/main-378.html' target='_blank'>耳鼻喉</a>",
            "艾滋病"=>"<a href='http://www.iqilong.com/main-388.html' target='_blank'>艾滋病</a>",
            "泌尿科"=>"<a href='http://www.iqilong.com/main-377.html' target='_blank'>泌尿科</a>",
            "内分泌"=>"<a href='http://www.iqilong.com/main-395.html' target='_blank'>内分泌</a>",
            "肝病科"=>"<a href='http://www.iqilong.com/main-374.html' target='_blank'>肝病科</a>",
            "肾病科"=>"<a href='http://www.iqilong.com/main-375.html' target='_blank'>肾病科</a>",
            "肛肠科"=>"<a href='http://www.iqilong.com/main-376.html' target='_blank'>肛肠科</a>",
            "血液科"=>"<a href='http://www.iqilong.com/main-390.html' target='_blank'>血液科</a>",
            "呼吸科"=>"<a href='http://www.iqilong.com/main-385.html' target='_blank'>呼吸科</a>",
            "糖尿病"=>"<a href='http://www.iqilong.com/main-372.html' target='_blank'>糖尿病</a>",
            "心血管"=>"<a href='http://www.iqilong.com/main-373.html' target='_blank'>心血管</a>",
            "减肥操"=>"<a href='http://www.iqilong.com/lists-2382.html' target='_blank'>减肥操</a>",
            "青光眼"=>"<a href='http://www.iqilong.com/lists-1815.html' target='_blank'>青光眼</a>",
            "白内障"=>"<a href='http://www.iqilong.com/lists-1817.html' target='_blank'>白内障</a>",
            "干眼症"=>"<a href='http://www.iqilong.com/lists-1831.html' target='_blank'>干眼症</a>",
            "眼睑病"=>"<a href='http://www.iqilong.com/lists-1825.html' target='_blank'>眼睑病</a>",
            "近视眼"=>"<a href='http://www.iqilong.com/lists-1819.html' target='_blank'>近视眼</a>",
            "软下疳"=>"<a href='http://www.iqilong.com/main-1651.html' target='_blank'>软下疳</a>",
            "颈椎病"=>"<a href='http://www.iqilong.com/main-1758.html' target='_blank'>颈椎病</a>",
            "腰腿痛"=>"<a href='http://www.iqilong.com/lsits-1763.html' target='_blank'>腰腿痛</a>",
            "腺用药"=>"<a href='http://www.iqilong.com/lsits-140.html' target='_blank'>腺用药</a>",
            "精囊炎"=>"<a href='http://www.iqilong.com/main-126.html' target='_blank'>精囊炎</a>",
            "阴道炎"=>"<a href='http://www.iqilong.com/main-158.html' target='_blank'>阴道炎</a>",
            "宫腔镜"=>"<a href='http://www.iqilong.com/lists-893.html' target='_blank'>宫腔镜</a>",
            "宫颈炎"=>"<a href='http://www.iqilong.com/main-894.html' target='_blank'>宫颈炎</a>",
            "宫颈癌"=>"<a href='http://www.iqilong.com/main-899.html' target='_blank'>宫颈癌</a>",
            "乳腺癌"=>"<a href='http://www.iqilong.com/main-865.html' target='_blank'>乳腺癌</a>",
            "乳腺炎"=>"<a href='http://www.iqilong.com/lists-863.html' target='_blank'>乳腺炎</a>",
            "盆腔炎"=>"<a href='http://www.iqilong.com/main-161.html' target='_blank'>盆腔炎</a>",
            "卵巢癌"=>"<a href='http://www.iqilong.com/lists-908.html' target='_blank'>卵巢癌</a>",
            "附件炎"=>"<a href='http://www.iqilong.com/lists-910.html' target='_blank'>附件炎</a>",
            "食道癌"=>"<a href='http://www.iqilong.com/main-968.html' target='_blank'>食道癌</a>",
            "子宫癌"=>"<a href='http://www.iqilong.com/main-974.html' target='_blank'>子宫癌</a>",
            "胰腺癌"=>"<a href='http://www.iqilong.com/main-979.html' target='_blank'>胰腺癌</a>",
            "鼻咽癌"=>"<a href='http://www.iqilong.com/main-985.html' target='_blank'>鼻咽癌</a>",
            "大肠癌"=>"<a href='http://www.iqilong.com/main-950.html' target='_blank'>大肠癌</a>",
            "冠心病"=>"<a href='http://www.iqilong.com/main-1497.html' target='_blank'>冠心病</a>",
            "性行为"=>"<a href='http://www.iqilong.com/main-2353.html' target='_blank'>性行为</a>",
            "恋童癖"=>"<a href='http://www.iqilong.com/lists-2357.html' target='_blank'>恋童癖</a>",
            "露阴癖"=>"<a href='http://www.iqilong.com/lists-2358.html' target='_blank'>露阴癖</a>",
            "自慰手淫"=>"<a href='http://www.iqilong.com/lists-2372.html' target='_blank'>自慰手淫</a>",
            "食色男女"=>"<a href='http://www.iqilong.com/lists-2373.html' target='_blank'>食色男女</a>",
            "婆媳关系"=>"<a href='http://www.iqilong.com/lists-37.html' target='_blank'>婆媳关系</a>",
            "都市恋情"=>"<a href='http://www.iqilong.com/lists-35.html' target='_blank'>都市恋情</a>",
            "有氧舞蹈"=>"<a href='http://www.iqilong.com/lists-256.html' target='_blank'>有氧舞蹈</a>",
            "休闲养生"=>"<a href='http://www.iqilong.com/lists-1021.html' target='_blank'>休闲养生</a>",
            "营养搭配"=>"<a href='http://www.iqilong.com/lists-824.html' target='_blank'>营养搭配</a>",
            "性福药膳"=>"<a href='http://www.iqilong.com/lists-1034.html' target='_blank'>性福药膳</a>",
            "中西合璧"=>"<a href='http://www.iqilong.com/lists-1152.html' target='_blank'>中西合璧</a>",
            "抗癌果蔬"=>"<a href='http://www.iqilong.com/lists-1003.html' target='_blank'>抗癌果蔬</a>",
            "认识癌症"=>"<a href='http://www.iqilong.com/lists-1007.html' target='_blank'>认识癌症</a>",
            "防癌抗癌"=>"<a href='http://www.iqilong.com/lists-1006.html' target='_blank'>防癌抗癌</a>",
            "致癌因素"=>"<a href='http://www.iqilong.com/lists-1008.html' target='_blank'>致癌因素</a>",
            "预防护理"=>"<a href='http://www.iqilong.com/lists-152.html' target='_blank'>预防护理</a>",
            "用药知识"=>"<a href='http://www.iqilong.com/lists-154.html' target='_blank'>用药知识</a>",
            "生理常识"=>"<a href='http://www.iqilong.com/lists-155.html' target='_blank'>生理常识</a>",
            "卵巢早衰"=>"<a href='http://www.iqilong.com/lists-909.html' target='_blank'>卵巢早衰</a>",
            "卵巢囊肿"=>"<a href='http://www.iqilong.com/lists-911.html' target='_blank'>卵巢囊肿</a>",
            "健康常识"=>"<a href='http://www.iqilong.com/main-3245.html' target='_blank'>健康常识</a>",
            "不孕不育"=>"<a href='http://www.iqilong.com/main-163.html' target='_blank'>不孕不育</a>",
            "有氧运动"=>"<a href='http://www.iqilong.com/lists-2386.html' target='_blank'>有氧运动</a>",
            "排毒美体"=>"<a href='http://www.iqilong.com/lists-632.html' target='_blank'>排毒美体</a>",
            "梅毒症状"=>"<a href='http://www.iqilong.com/main-1643.html' target='_blank'>梅毒症状</a>",
            "尖锐湿疣"=>"<a href='http://www.iqilong.com/main-1657.html' target='_blank'>尖锐湿疣</a>",
            "人工授精"=>"<a href='http://www.iqilong.com/lists-217.html' target='_blank'>人工授精</a>",
            "计划生育"=>"<a href='http://www.iqilong.com/lists-224.html' target='_blank'>计划生育</a>",
            "睾丸异常"=>"<a href='http://www.iqilong.com/lists-204.html' target='_blank'>睾丸异常</a>",
            "心律失常"=>"<a href='http://www.iqilong.com/main-1511.html' target='_blank'>心律失常</a>",
            "骨质疏松"=>"<a href='http://www.iqilong.com/main-1795.html' target='_blank'>骨质疏松</a>",
            "腰肌劳损"=>"<a href='http://www.iqilong.com/lists-1769.html' target='_blank'>腰肌劳损</a>",
            "膝关节炎"=>"<a href='http://www.iqilong.com/main-1782.html' target='_blank'>膝关节炎</a>",
            "生活百科"=>"<a href='http://www.iqilong.com/lists-807.html' target='_blank'>生活百科</a>",
            "身体护理"=>"<a href='http://www.iqilong.com/lists-758.html' target='_blank'>身体护理</a>",
            "秋季护肤"=>"<a href='http://www.iqilong.com/lists-769.html' target='_blank'>秋季护肤</a>",
            "情感驿站"=>"<a href='http://www.iqilong.com/lists-658.html' target='_blank'>情感驿站</a>",
            "壮阳助性"=>"<a href='http://www.iqilong.com/lists-408.html' target='_blank'>壮阳助性</a>",
            "生活用品"=>"<a href='http://www.iqilong.com/lists-753.html' target='_blank'>生活用品</a>",
            "包皮包茎"=>"<a href='http://www.iqilong.com/lists-116.html' target='_blank'>包皮包茎</a>",
            "性交障碍"=>"<a href='http://www.iqilong.com/lists-515.html' target='_blank'>性交障碍</a>",
            "性欲障碍"=>"<a href='http://www.iqilong.com/lists-518.html' target='_blank'>性欲障碍</a>",
            "无精死精"=>"<a href='http://www.iqilong.com/lists-532.html' target='_blank'>无精死精</a>",
            "尿道结石"=>"<a href='http://www.iqilong.com/lists-508.html' target='_blank'>尿道结石</a>",
            "附睾炎症"=>"<a href='http://www.iqilong.com/main-121.html' target='_blank'>附睾炎症</a>",
            "前列腺癌"=>"<a href='http://www.iqilong.com/main-145.html' target='_blank'>前列腺癌</a>",
            "前列腺炎"=>"<a href='http://www.iqilong.com/main-135.html' target='_blank'>前列腺炎</a>",
            "射精障碍"=>"<a href='http://www.iqilong.com/main-129.html' target='_blank'>射精障碍</a>",
            "阴囊湿疹"=>"<a href='http://www.iqilong.com/main-123.html' target='_blank'>阴囊湿疹</a>",
            "子宫肌瘤"=>"<a href='http://www.iqilong.com/main-880.html' target='_blank'>子宫肌瘤</a>",
            "子宫肉瘤"=>"<a href='http://www.iqilong.com/lists-887.html' target='_blank'>子宫肉瘤</a>",
            "子宫脱垂"=>"<a href='http://www.iqilong.com/lists-891.html' target='_blank'>子宫脱垂</a>",
            "宫颈涂片"=>"<a href='http://www.iqilong.com/lists-892.html' target='_blank'>宫颈涂片</a>",
            "乳腺增生"=>"<a href='http://www.iqilong.com/lists-864.html' target='_blank'>乳腺增生</a>",
            "月经不调"=>"<a href='http://www.iqilong.com/lists-912.html' target='_blank'>月经不调</a>",
            "推拿按摩"=>"<a href='http://www.iqilong.com/lists-3491.html' target='_blank'>推拿按摩</a>",
            "恋爱心情"=>"<a href='http://www.iqilong.com/lists-660.html' target='_blank'>恋爱心情</a>",
            "外遇心情"=>"<a href='http://www.iqilong.com/lists-662.html' target='_blank'>外遇心情</a>",
            "亲子沟通"=>"<a href='http://www.iqilong.com/lists-691.html' target='_blank'>亲子沟通</a>",
            "心灵鸡汤"=>"<a href='http://www.iqilong.com/lists-707.html' target='_blank'>心灵鸡汤</a>",
            "孕期营养"=>"<a href='http://www.iqilong.com/lists-1325.html' target='_blank'>孕期营养</a>",
            "成人用品"=>"<a href='http://www.iqilong.com/lists-2351.html' target='_blank'>成人用品</a>",
            "情趣助性"=>"<a href='http://www.iqilong.com/lists-2350.html' target='_blank'>情趣助性</a>",
            "单身广场"=>"<a href='http://www.iqilong.com/lists-1248.html' target='_blank'>单身广场</a>",
            "恋爱时分"=>"<a href='http://www.iqilong.com/lists-1247.html' target='_blank'>恋爱时分</a>",
            "婚姻生活"=>"<a href='http://www.iqilong.com/lists-1246.html' target='_blank'>婚姻生活</a>",
            "输精管堵塞"=>"<a href='http://www.iqilong.com/lists-534.html' target='_blank'>输精管堵塞</a>",
            "前列腺与性"=>"<a href='http://www.iqilong.com/lists-544.html' target='_blank'>前列腺与性</a>",
            "生殖器疱疹"=>"<a href='http://www.iqilong.com/main-1693.html' target='_blank'>生殖器疱疹</a>",
            "健康大视野"=>"<a href='http://www.iqilong.com/lists-806.html' target='_blank'>健康大视野</a>",
            "附睾炎常识"=>"<a href='http://www.iqilong.com/lists-501.html' target='_blank'>附睾炎常识</a>",
            "附睾炎诊治"=>"<a href='http://www.iqilong.com/lists-502.html' target='_blank'>附睾炎诊治</a>",
            "前列腺自测"=>"<a href='http://www.iqilong.com/lists-141.html' target='_blank'>前列腺自测</a>",
            "包皮龟头炎"=>"<a href='http://www.iqilong.com/main-485.html' target='_blank'>包皮龟头炎</a>",
            "前列腺原创"=>"<a href='http://www.iqilong.com/lists-142.html' target='_blank'>前列腺原创</a>",
            "子宫内膜癌"=>"<a href='http://www.iqilong.com/lists-886.html' target='_blank'>子宫内膜癌</a>",
            "子宫内膜炎"=>"<a href='http://www.iqilong.com/lists-889.html' target='_blank'>子宫内膜炎</a>",
            "外阴皮肤病"=>"<a href='http://www.iqilong.com/lists-173.html' target='_blank'>外阴皮肤病</a>",
            "前庭大腺病"=>"<a href='http://www.iqilong.com/lists-924.html' target='_blank'>前庭大腺病</a>",
            "更年期综合征"=>"<a href='http://www.iqilong.com/lists-916.html' target='_blank'>更年期综合征</a>",
            "经前期综合征"=>"<a href='http://www.iqilong.com/lists-915.html' target='_blank'>经前期综合征</a>",
            "前列腺癌常识"=>"<a href='http://www.iqilong.com/lists-539.html' target='_blank'>前列腺癌常识</a>",
            "前列腺癌检查"=>"<a href='http://www.iqilong.com/lists-540.html' target='_blank'>前列腺癌检查</a>",
            "前列腺癌治疗"=>"<a href='http://www.iqilong.com/lists-541.html' target='_blank'>前列腺癌治疗</a>",
            "前列腺炎常识"=>"<a href='http://www.iqilong.com/lists-136.html' target='_blank'>前列腺炎常识</a>",
            "前列腺炎检查"=>"<a href='http://www.iqilong.com/lists-137.html' target='_blank'>前列腺炎检查</a>",
            "前列腺炎治疗"=>"<a href='http://www.iqilong.com/lists-139.html' target='_blank'>前列腺炎治疗</a>",
            "子宫发育异常"=>"<a href='http://www.iqilong.com/lists-890.html' target='_blank'>子宫发育异常</a>",
            "乳房疾病治疗"=>"<a href='http://www.iqilong.com/lists-874.html' target='_blank'>乳房疾病治疗</a>",
            "乳腺外科自测"=>"<a href='http://www.iqilong.com/lists-873.html' target='_blank'>乳腺外科自测</a>",
            "乳腺良性肿瘤"=>"<a href='http://www.iqilong.com/lists-872.html' target='_blank'>乳腺良性肿瘤</a>",
            "多囊卵巢综合征"=>"<a href='http://www.iqilong.com/lists-914.html' target='_blank'>多囊卵巢综合征</a>",
            "附睾炎预防保健"=>"<a href='http://www.iqilong.com/lists-503.html' target='_blank'>附睾炎预防保健</a>",
            "男性不育症常识"=>"<a href='http://www.iqilong.com/lists-529.html' target='_blank'>男性不育症常识</a>",
            "寡人的健康纠结"=>"<a href='http://www.iqilong.com/lists-805.html' target='_blank'>寡人的健康纠结</a>",
            "子宫内膜异位症"=>"<a href='http://www.iqilong.com/lists-888.html' target='_blank'>子宫内膜异位症</a>",
            "前列腺癌预防保健"=>"<a href='http://www.iqilong.com/lists-542.html' target='_blank'>前列腺癌预防保健</a>",
            "前列腺炎预防保健"=>"<a href='http://www.iqilong.com/lists-138.html' target='_blank'>前列腺炎预防保健</a>",
        );

        $result = strtr(self::Replace_Links($content), array_unique($words));

        /**
        $pattern ='#<img src="(.*)" width="(.*)" height="(.*)" title="(.*)" alt="(.*)" />#iUs';

        preg_match_all($pattern,$result,$matche);

        if(count($matche[4])!=0){
            foreach($matche[4] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }

        if(count($matche[5])!=0){
            foreach($matche[5] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }


        $pattern ='#<img src="(.*)" width="(.*)" height="(.*)" title="(.*)" alt="(.*)" />#iUs';

        preg_match_all($pattern,$result,$matche);

        if(count($matche[4])!=0){
            foreach($matche[4] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }

        if(count($matche[5])!=0){
            foreach($matche[5] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }

        $pattern ='#<img src="(.*)" width="(.*)" height="(.*)" title="(.*)" alt="(.*)" align="(.*)" />#iUs';


        preg_match_all($pattern,$result,$matche);

        if(count($matche[4])!=0){
            foreach($matche[4] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }

        if(count($matche[5])!=0){
            foreach($matche[5] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }


        $pattern ='#<img src="(.*)" width="(.*)" height="(.*)" alt="(.*)" title="(.*)" align="(.*)" />#iUs';

        preg_match_all($pattern,$result,$matche);

        if(count($matche[4])!=0){
            foreach($matche[4] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }

        if(count($matche[5])!=0){
            foreach($matche[5] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }


        $pattern ='#<img title="(.*)" border="(.*)" src="(.*)" width="(.*)" height="(.*)" align="(.*)" />#iUs';

        preg_match_all($pattern,$result,$matche);

        if(count($matche[1])!=0){
            foreach($matche[1] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }**/

        $pattern ='#alt="(.*)"#iUs';

        preg_match_all($pattern,$result,$matche);

        if(count($matche[1])!=0){
            foreach($matche[1] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }

        $pattern ='#title="(.*)"#iUs';

        preg_match_all($pattern,$result,$matche);

        if(count($matche[1])!=0){
            foreach($matche[1] as $key=>$value){
                $result = str_replace($value,$title,$result);
            }
        }

        $result = str_replace('title=""','title="'.$title.'"',$result);
        $result = str_replace('alt=""','alt="'.$title.'"',$result);

        return $result;
    }

    /**
     *过滤指定URL以外所有的链接
     * @access    public
     * @param     string  $body  文本内容
     * @param     array  $allow_urls  允许的超链接
     * @return    string
     */
    static function Replace_Links( &$body, $allow_urls=array() )
    {
        $host_rule = join('|', $allow_urls);
        $host_rule = preg_replace("#[\n\r]#", '', $host_rule);
        $host_rule = str_replace('.', "\\.", $host_rule);
        $host_rule = str_replace('/', "\\/", $host_rule);
        $arr = '';
        preg_match_all("#<a([^>]*)>(.*)<\/a>#iU", $body, $arr);
        if( is_array($arr[0]) ) {
            $rparr = array();
            $tgarr = array();
            foreach($arr[0] as $i=>$v) {
                if( $host_rule != '' && preg_match('#'.$host_rule.'#i', $arr[1][$i]) ) {
                    continue;
                } else {
                    $rparr[] = $v;
                    $tgarr[] = $arr[2][$i];
                }
            }
            if( !empty($rparr) ) {
                $body = str_replace($rparr, $tgarr, $body);
            }
        }
        return $body;
    }
}