@include('Frontend.Index.CN.wap.Layout.doctype')
<style>
    .myread{
        position: absolute;
        top:0;
        left:0;
        background: #fff;
    }
    .myread_content{
        width:100%;
        height:12.34rem;
        background: #fff;
        /*padding:0 0.9rem;*/
        border-top:1px solid #e1e1e1;
    }
    .myread_content h4{
        width: 100%;
        height:1.6rem;
        font-size: 0.36rem;
        color:#333;
        marign:0 auto 0.42rem;
        padding-top:0.8rem;
        text-align: center;
        font-weight: 900;
    }
    .myread_content .shop_mess h6{
        width: 100%;
        height: 0.7rem;
        font-size: 0.3rem;
        color:#222;
        text-align: center;
    }
    .myread_content .shop_mess  .shopChoice,.myread_content .shop_mess  .shopChoice1{
        width:5.7rem;
        height:0.9rem;
        /*background: #eaeaea;*/
        border:1px solid #e1e1e1;
        margin:0 auto 0.42rem;
        border-radius: 0.05rem;
        line-height:0.9rem;
        color:#999;
        padding-left:0.3rem;
        position: relative;
    }
    .myread_content .shop_mess  .shopChoice input,.myread_content .shop_mess  .shopChoice1 input{
        width:5rem;
        height:0.8rem;
        border:0;
        background: rgba(255,255,255,0.8);
        /*color:#999;*/
    }
    ._choice{
        position: relative;
    }
    .dingwei{
        position: absolute;
        width:1.2rem;
        height:0.9rem;
        border:0;
        background: transparent;
        color:#999;
        right:0.7rem;
        top:0;
        line-height: 0.9rem;
        z-index: 10000;
    }
    .myread_content .shop_mess  .shopChoice input::-webkit-input-placeholder,.myread_content .shop_mess  .shopChoice1 input::-webkit-input-placeholder{
        color: #666;
    }    /* 使用webkit内核的浏览器 */
    .myread_content .shop_mess  .shopChoice input:-moz-placeholder,.myread_content .shop_mess  .shopChoice1 input:-moz-placeholder{
        color: #666;
    }                  /* Firefox版本4-18 */
    .myread_content .shop_mess  .shopChoice input::-moz-placeholder,.myread_content .shop_mess  .shopChoice1 input::-moz-placeholder{
        color: #666;
    }                  /* Firefox版本19+ */
    .myread_content .shop_mess  .shopChoice input:-ms-input-placeholder,.myread_content .shop_mess  .shopChoice1 input:-ms-input-placeholder{
        color: #666;
    }
    /*.myread_content .shop_mess  .shopChoice span{*/
        /*width: 0.4rem;*/
        /*height: 0.4rem;*/
        /*!*background:url(../../../../../../../public/assets/frontend/index/wap/img/icon.png) no-repeat -2.4rem 0;*!*/
        /*background:url(../img/icon.png) no-repeat -2.4rem 0;*/
        /*background-size: 6.4rem;*/
        /*position: absolute;*/
        /*top: 0.42rem;*/
        /*right: 0.3rem;*/
        /*cursor: pointer;*/
    /*}*/
    .myread_content .shop_mess  .shopChoice .yiji{
        width:5.7rem;
        height:3.5rem;
        position: relative;
    }
    .myread_content .shop_mess  .shopChoice1 .yiji1{
        width:2.85rem;
        height:3.5rem;
        position: relative;
        margin-left: -0.15rem;
        /*text-align: center;*/
        color: #000000;
    }
    .myread_content .shop_mess  .shopChoice1 .yiji1>ul>li{
        height: 0.7rem;
        line-height: 0.7rem;
        text-indent: 1rem;
    }
    .myread_content .shop_mess  .shopChoice .yiji>ul,.myread_content .shop_mess  .shopChoice1 .yiji1>ul{
        width:5.7rem;
        height:3.5rem;
        background: #f4f5f9;
        position: absolute;
        left: -0.2rem;
        top: 0.1rem;
        z-index: 1000;
        overflow-y: auto;
        overflow-x: hidden;
        border-radius: 0.05rem;
        box-shadow: 2px -3px 5px #ddd ;
    }
    .myread_content .shop_mess  .shopChoice .yiji>ul>li,.myread_content .shop_mess  .shopChoice1 .yiji1>ul>li ul li{
        width: 100%;
        height:0.7rem;
        color:#000;
        line-height: 0.7rem;
        text-align: center;
    }
    .myread_content .shop_mess  .shopChoice .yiji>ul>li:hover,.myread_content .shop_mess  .shopChoice1 .yiji1>ul>li:hover{
        background: #eaebed;
        color:#000;
    }
    .myread_content .shop_mess  .shopChoice1 .yiji1>ul>li ul{
        width:5.7rem;
        height:3.5rem;
        background: #f4f5f9;
        position: absolute;
        left: 0;
        top: 0;
        z-index: 1000;
        overflow-y: auto;
        overflow-x: hidden;
        border-radius: 0.05rem;
        box-shadow: 2px -3px 5px #ddd ;
    }
    .myread_content .shop_mess  .readNow{
        width:5.7rem;
        height:0.9rem;
        background: #083680;
        text-align: center;
        line-height: 0.9rem;
        color:#fff;
        font-size: 0.3rem;
        border-radius: 0.05rem;
        margin:0 auto;
        cursor: pointer;
    }
    .myread_content .shop_mess  .shopChoice .yiji{
        margin-left: -8px;
    }
    .myread_content .shop_mess  .shopChoice ul.all{
        width: 142px;
        height: 175px;
    }
    .myread_content .shop_mess  .shopChoice1 .erji {
        position: absolute;
        width: 2.85rem;
        height: 3.5rem;
        left: 2.65rem;
        top:0.1rem;
        background: #eaebed;
        z-index: 1001;
        list-style: none;
        text-align: center;
        overflow-y: auto;
        overflow-x: hidden;
        border-radius: 0.05rem;
        box-shadow: 2px -3px 5px #ddd;
        color: #000;
    }
    .myread_content .shop_mess  .shopChoice1 .erji li{
        height: 0.7rem;
        line-height: 0.7rem;
    }
    .myread_content .shop_mess  .shopChoice1 .erji li:hover{
        background: #083680!important;
        color: #fff!important;
    }
</style>
<body>
<div class="myread">
@include('Frontend.Index.CN.wap.Layout.header')
    <!--<div class="headhead"></div>-->
    <div class="myread_content">
        <h4>店址订阅</h4>
        <div class="shop_mess">
            <h6>实时获得最精确的店址推荐</h6>
            <div class="shopChoice">
                <div class="shopClick">
                    <input type="text" placeholder="请选择你的经营类型" disabled>
                    <span></span>
                </div>
                <div class="yiji none">
                    <ul>
                        <li>酒楼餐饮</li>
                        <li>服饰鞋包</li>
                        <li>休闲娱乐</li>
                        <li>美容美发</li>
                        <li>生活服务</li>
                        <li>百货超市</li>
                        <li>家居建材</li>
                        <li>电器通讯</li>
                        <li>汽修美容</li>
                        <li>医药保健</li>
                        <li>教育培训</li>
                        <li>旅游宾馆</li>
                        <li>其他业态</li>
                    </ul>
                </div>
            </div>
            <div class="shopChoice">
                <div class="shopClick">
                    <input type="text" placeholder="请选择商铺类型" disabled>
                    <span></span>
                </div>
                <div class="yiji none">
                    <ul>
                        <li>商业街商铺</li>
                        <li>社区住宅底商</li>
                        <li>写字楼配套</li>
                        <li>百货／购物中心</li>
                        <li>临街门面</li>
                        <li>档口摊位</li>
                        <li>其他</li>
                    </ul>
                </div>
            </div>
            <div class="shopChoice1">
                <div class="shopClick1">
                    <input type="text" placeholder="请选择目标开店区域" disabled>
                    <span></span>
                </div>
                <div class="yiji1 none">
                    <ul>
                        <li>全部
                            <ul class="bb none">
                                <li>全部</li>
                            </ul>
                        </li>
                        <li>东城区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>东直门</li>
                                <li>和平里</li>
                                <li>雍和宫</li>
                                <li>安定门</li>
                                <li>交道口</li>
                                <li>地坛</li>
                                <li>金宝街</li>
                                <li>东四十条</li>
                                <li>东四</li>
                                <li>朝阳门</li>
                                <li>建国门</li>
                                <li>东单</li>
                                <li>王府井</li>
                                <li>灯市口</li>
                                <li>东外大街</li>
                                <li>雅宝路</li>
                                <li>东中街</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>西城区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>西直门</li>
                                <li>新街口</li>
                                <li>积水潭</li>
                                <li>小西天</li>
                                <li>德胜门</li>
                                <li>钓鱼台</li>
                                <li>后海</li>
                                <li>什刹海</li>
                                <li>西四</li>
                                <li>西单</li>
                                <li>复兴门</li>
                                <li>金融街</li>
                                <li>阜成门</li>
                                <li>北营房</li>
                                <li>车公庄</li>
                                <li>南锣鼓巷</li>
                                <li>白云路</li>
                                <li>月坛</li>
                                <li>三里河</li>
                                <li>木樨地</li>
                                <li>西便门</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>崇文区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>幸福大街</li>
                                <li>崇文门</li>
                                <li>东花市</li>
                                <li>广渠门</li>
                                <li>光明楼</li>
                                <li>天坛</li>
                                <li>沙子口</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>宣武区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>广安门</li>
                                <li>西客站</li>
                                <li>马连道</li>
                                <li>天宁寺</li>
                                <li>白纸坊</li>
                                <li>西菜园</li>
                                <li>右安门</li>
                                <li>枣林前街</li>
                                <li>牛街</li>
                                <li>长椿街</li>
                                <li>天伦北里</li>
                                <li>双槐里</li>
                                <li>陶然亭</li>
                                <li>虎坊桥</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>朝阳区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>望京</li>
                                <li>京广</li>
                                <li>酒仙桥</li>
                                <li>化工大学</li>
                                <li>北沙滩</li>
                                <li>中日医院</li>
                                <li>亚运村</li>
                                <li>麦子店</li>
                                <li>八王坟</li>
                                <li>光熙门</li>
                                <li>延静里</li>
                                <li>静安庄</li>
                                <li>安贞</li>
                                <li>大悦城</li>
                                <li>慈云寺</li>
                                <li>芍药居</li>
                                <li>太阳宫</li>
                                <li>西坝河</li>
                                <li>官庄</li>
                                <li>国展</li>
                                <li>左家庄</li>
                                <li>三元桥</li>
                                <li>燕莎</li>
                                <li>朝阳公园</li>
                                <li>团结湖</li>
                                <li>三里屯</li>
                                <li>建外大街</li>
                                <li>东大桥</li>
                                <li>CBD</li>
                                <li>呼家楼</li>
                                <li></li>
                                <li>国贸</li>
                                <li>双井</li>
                                <li>劲松</li>
                                <li>潘家园</li>
                                <li>华威桥</li>
                                <li>大望路</li>
                                <li>百子湾</li>
                                <li>四惠</li>
                                <li>红庙</li>
                                <li>八里庄</li>
                                <li>石佛营</li>
                                <li>十里堡</li>
                                <li>高碑店</li>
                                <li>姚家园</li>
                                <li>定福庄</li>
                                <li>双桥</li>
                                <li>管庄</li>
                                <li>豆各庄</li>
                                <li>堡头</li>
                                <li>十八里店</li>
                                <li>十里河</li>
                                <li>永安里</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>丰台区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>六里桥</li>
                                <li>太平桥</li>
                                <li>开阳里</li>
                                <li>丽泽桥</li>
                                <li>菜户营</li>
                                <li>玉泉营</li>
                                <li>草桥</li>
                                <li>万柳桥</li>
                                <li>马家堡</li>
                                <li>角门</li>
                                <li>洋桥</li>
                                <li>西罗园</li>
                                <li>木樨园</li>
                                <li>赵公口</li>
                                <li>刘家窑</li>
                                <li>蒲黄榆</li>
                                <li>万庄</li>
                                <li>左安门</li>
                                <li>成寿寺</li>
                                <li>宋家庄</li>
                                <li>大红门</li>
                                <li>南苑</li>
                                <li>西局</li>
                                <li>东高地</li>
                                <li>丰益桥</li>
                                <li>花乡</li>
                                <li>世界公园</li>
                                <li>科技园区</li>
                                <li>北大地</li>
                                <li>夏家胡同</li>
                                <li>岳各庄</li>
                                <li>青塔</li>
                                <li>五里店</li>
                                <li>卢沟桥</li>
                                <li>云岗</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>石景山区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>晋元庄</li>
                                <li>玉泉路</li>
                                <li>老山</li>
                                <li>鲁谷</li>
                                <li>八角</li>
                                <li>古城</li>
                                <li>杨庄</li>
                                <li>苹果园</li>
                                <li>金顶街</li>
                                <li>模式口</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>海淀区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>清河</li>
                                <li>小营</li>
                                <li>西三旗</li>
                                <li>西二旗</li>
                                <li>上帝</li>
                                <li>西北望</li>
                                <li>马连洼</li>
                                <li>西苑</li>
                                <li>北京大学</li>
                                <li>苏州街</li>
                                <li>中关村</li>
                                <li>北大清华</li>
                                <li>五道口</li>
                                <li>学院路</li>
                                <li>二里庄</li>
                                <li>牡丹园</li>
                                <li>北太平庄</li>
                                <li>马甸</li>
                                <li>大钟寺</li>
                                <li>知春路</li>
                                <li>双榆村</li>
                                <li>人们大学</li>
                                <li>万柳</li>
                                <li>世纪城</li>
                                <li>魏公村</li>
                                <li>皂君庙</li>
                                <li>交通大学</li>
                                <li>圆明园</li>
                                <li>海淀黄庄</li>
                                <li>紫竹桥</li>
                                <li>万寿寺</li>
                                <li>车道沟</li>
                                <li>北洼路</li>
                                <li>蓟门桥</li>
                                <li>航天桥</li>
                                <li>三义庙</li>
                                <li>甘家口</li>
                                <li>军博</li>
                                <li>公主坟</li>
                                <li>万寿路</li>
                                <li>五棵松</li>
                                <li>永定路</li>
                                <li>定慧寺</li>
                                <li>百万庄</li>
                                <li>四季青</li>
                                <li>香山</li>
                                <li>农大</li>
                                <li>小南庄</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>门头沟区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>大峪</li>
                                <li>东辛房</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>房山区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>长阳</li>
                                <li>良乡</li>
                                <li>行宫园</li>
                                <li>窦店</li>
                                <li>燕山</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>通州区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>北关</li>
                                <li>新华大街</li>
                                <li>西上园</li>
                                <li>果园</li>
                                <li>九棵树</li>
                                <li>梨园</li>
                                <li>梨园城铁</li>
                                <li>临河里</li>
                                <li>土桥</li>
                                <li>玉桥</li>
                                <li>乔庄</li>
                                <li>武夷花园</li>
                                <li>潞城</li>
                                <li>马驹桥</li>
                                <li>物资学院</li>
                                <li>新华联</li>
                                <li>张家湾</li>
                                <li>西门</li>
                                <li>次渠</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>顺义区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>后沙峪</li>
                                <li>胜利</li>
                                <li>樱花园</li>
                                <li>石园</li>
                                <li>建新北门</li>
                                <li>石门苑</li>
                                <li>机场</li>
                                <li>天竺</li>
                                <li>新国展</li>
                                <li>马坡</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>昌平区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>龙泽</li>
                                <li>回龙观</li>
                                <li>霍营</li>
                                <li>立水桥</li>
                                <li>天通苑</li>
                                <li>北七家</li>
                                <li>沙河镇</li>
                                <li></li>
                                <li>昌平县城</li>
                                <li>小汤山</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>大兴区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>黄村</li>
                                <li>西红门</li>
                                <li>旧宫</li>
                                <li>亦庄</li>
                                <li>兴华大街</li>
                                <li>兴华园</li>
                                <li>上清园</li>
                                <li>郁花园</li>
                                <li>海子角</li>
                                <li>高米店</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>怀柔区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>怀柔城区</li>
                                <li>雁栖</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>平谷区
                            <ul class="bb none">
                                <li>不限</li>
                                <li>平谷城区</li>
                                <li>滨河路</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>密云县
                            <ul class="bb none">
                                <li>密云城区</li>
                                <li>其他</li>
                            </ul>
                        </li>
                        <li>延庆县
                            <ul class="bb none">
                                <li>不限</li>
                                <li>延庆</li>
                                <li>康庄</li>
                                <li>八达岭</li>
                                <li>大榆树</li>
                                <li>永宁</li>
                            </ul>
                        </li>
                        <li>燕郊
                            <ul class="bb none">
                                <li>不限</li>
                                <li>燕顺路</li>
                                <li>迎宾路</li>
                                <li>上上城</li>
                            </ul>
                        </li>
                    </ul>
                    <div class="erji">
                        <ul>
                            {{--向这里添加二级的东西--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="shopChoice">
                <div class="shopClick">
                    <input type="text" placeholder="请选择你的经营面积" disabled>
                    <span></span>
                </div>
                <div class="yiji none">
                    <ul>
                        <li>0~50㎡</li>
                        <li>50~100㎡</li>
                        <li>100~150㎡</li>
                        <li>150~200㎡</li>
                        <li>200~300㎡</li>
                        <li>300~500㎡</li>
                        <li>500㎡以上</li>
                    </ul>
                </div>
            </div>
            <div class="shopChoice">
                <div class="shopClick">
                    <input type="text" placeholder=" 请选择你的开店预算" disabled>
                    <span></span>
                </div>
                <div class="yiji none">
                    <ul>
                        <li>30万以下</li>
                        <li>30~50万元</li>
                        <li>50~100万元</li>
                        <li>100~150万元</li>
                        <li>150~200万元</li>
                        <li>200~500万元</li>
                        <li>500万元以上</li>
                    </ul>
                </div>
            </div>
            <div class="readNow">立即订阅</div>
        </div>
    </div>
</div>
@include('Frontend.Index.CN.wap.Layout.footer')
    <script>
//        //订阅选框~~~~~~~~~~
//        //一级
        $(".myread").on("click",".shopChoice",function(){
            $(".yiji,.yiji1").addClass("none");
            $(this).find(".yiji").removeClass("none");
        });
        //点击选中显示
        $(".myread").on("click",".yiji>ul>li",function(){
            $(this).parent().parent().parent().find("input").val(($(this).html()));
            $(".yiji").not(".list").addClass("none");
        });

//         //二级
        $(".myread").on("click",".shopChoice1",function(){
            $(".yiji").addClass("none");
            $(this).find(".yiji1").removeClass("none");
        });
//        // 鼠标划过出现二级联动
        $(".myread").on("click",".yiji1>ul>li",function () {
            $(".erji").html($(this).find(".bb").html());
        });
        $(".myread").on("click",".shopChoice1 .erji>li",function(){
            $(this).parent().parent().parent().find("input").val(($(this).html()));
            $(".yiji1").addClass("none");
        });

    </script>
</body>
</html>