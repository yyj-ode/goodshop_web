
@include('Frontend.Index.CN.wap.Layout.doctype')
<body>
<!--//页面默认-->
    <div class="con">
    @include('Frontend.Index.CN.wap.Layout.header')
        <!--<div class="headhead"></div>-->
        <div class="search">
            <div class="search_key _search_key">
                <input placeholder="输入关键字搜索铺源店址" readonlyunselectable="on" type="text">
                <i></i>
            </div>
        </div>
        <div class="select">
            <ul class="select_con">
                <li class="bor_right">
                    <div class="bor_right_li">
                        <span>区域</span>
                        <i></i>
                    </div>
                    <!--主页筛选部分-->
                    <div class="shaixuan1 shaixuan none" id="area">
                        <ul>
                            <li>全部
                                <ul class="aa none">
                                    <li>全部</li>
                                </ul>
                            </li>
                            <li>东城区
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
                                    <li>不限</li>
                                    <li>大峪</li>
                                    <li>东辛房</li>
                                    <li>其他</li>
                                </ul>
                            </li>
                            <li>房山区
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
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
                                <ul class="aa none">
                                    <li>不限</li>
                                    <li>怀柔城区</li>
                                    <li>雁栖</li>
                                    <li>其他</li>
                                </ul>
                            </li>
                            <li>平谷区
                                <ul class="aa none">
                                    <li>不限</li>
                                    <li>平谷城区</li>
                                    <li>滨河路</li>
                                    <li>其他</li>
                                </ul>
                            </li>
                            <li>密云县
                                <ul class="aa none">
                                    <li>密云城区</li>
                                    <li>其他</li>
                                </ul>
                            </li>
                            <li>延庆县
                                <ul class="aa none">
                                    <li>不限</li>
                                    <li>延庆</li>
                                    <li>康庄</li>
                                    <li>八达岭</li>
                                    <li>大榆树</li>
                                    <li>永宁</li>
                                </ul>
                            </li>
                            <li>燕郊
                                <ul class="aa none">
                                    <li>不限</li>
                                    <li>燕顺路</li>
                                    <li>迎宾路</li>
                                    <li>上上城</li>
                                </ul>
                            </li>
                        </ul>
                        <div class="erci">
                            <ul>
                                {{--向这里添加二级的东西--}}
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="bor_right">
                    <div class="bor_right_li">
                        <span>类型</span>
                        <i></i>
                    </div>
                    <!--主页筛选部分-->
                    <div class="shaixuan shaixuan2 none">
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
                </li>
                <li class="bor_right">
                    <div class="bor_right_li">
                        <span>面积</span>
                        <i></i>
                    </div>
                    <!--主页筛选部分-->
                    <div class="shaixuan shaixuan2 none">
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
                </li>
                <li>
                    <div class="bor_right_li">
                        <span>预算</span>
                        <i></i>
                    </div>
                    <!--主页筛选部分-->
                    <div class="shaixuan shaixuan2 none">
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
                </li>
            </ul>
        </div>

        <ul class="shop_list">
            <a href="{{url('detail/index')}}">
                <li class="list_detail">
                    <div class="img">
                        <img src="img/shop.png">
                    </div>
                    <div class="detail_mess">
                        <p>
                            <span class="mess_class">区域类型：</span>
                            <span class="mess_kind">生活社区- 高端</span>
                        </p>
                        <p class="mess_people mess_peo">客流：<i>20万+</i></p>
                        <p class="mess_people">商业街店铺</p>
                        <p class="mess_mon">
                            <span class="mess_area">200<i>㎡</i></span>
                            <span class="mess_money">100000<i class="mess_each">元/月</i></span>
                        </p>
                    </div>
                    <div class="detail_near">
                        <div class="detail_addr">
                            <i></i>
                            <span>海淀区-安宁庄</span>
                        </div>
                        <ul class="detail_ul">
                            <li class="near">医院1</li>
                            <li class="near">医院1</li>
                            <li class="near">医院1</li>
                        </ul>
                    </div>
                </li>
            </a>
            <li class="list_detail">
                <div class="img">
                    <img src="img/shop.png">
                </div>
                <div class="detail_mess">
                    <p>
                        <span class="mess_class">区域类型：</span>
                        <span class="mess_kind">生活社区- 高端</span>
                    </p>
                    <p class="mess_people mess_peo">客流：<i>20万+</i></p>
                    <p class="mess_people">商业街店铺</p>
                    <p class="mess_mon">
                        <span class="mess_area">200<i>㎡</i></span>
                        <span class="mess_money">100000<i class="mess_each">元/月</i></span>
                    </p>
                </div>
                <div class="detail_near">
                    <div class="detail_addr">
                        <i></i>
                        <span>海淀区-安宁庄</span>
                    </div>
                    <ul class="detail_ul">
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                    </ul>
                </div>
            </li>
            <li class="list_detail">
                <div class="img">
                    <img src="img/shop.png">
                </div>
                <div class="detail_mess">
                    <p>
                        <span class="mess_class">区域类型：</span>
                        <span class="mess_kind">生活社区- 高端</span>
                    </p>
                    <p class="mess_people mess_peo">客流：<i>20万+</i></p>
                    <p class="mess_people">商业街店铺</p>
                    <p class="mess_mon">
                        <span class="mess_area">200<i>㎡</i></span>
                        <span class="mess_money">100000<i class="mess_each">元/月</i></span>
                    </p>
                </div>
                <div class="detail_near">
                    <div class="detail_addr">
                        <i></i>
                        <span>海淀区-安宁庄</span>
                    </div>
                    <ul class="detail_ul">
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                    </ul>
                </div>
            </li>
            <li class="list_detail">
                <div class="img">
                    <img src="img/shop.png">
                </div>
                <div class="detail_mess">
                    <p>
                        <span class="mess_class">区域类型：</span>
                        <span class="mess_kind">生活社区- 高端</span>
                    </p>
                    <p class="mess_people mess_peo">客流：<i>20万+</i></p>
                    <p class="mess_people">商业街店铺</p>
                    <p class="mess_mon">
                        <span class="mess_area">200<i>㎡</i></span>
                        <span class="mess_money">100000<i class="mess_each">元/月</i></span>
                    </p>
                </div>
                <div class="detail_near">
                    <div class="detail_addr">
                        <i></i>
                        <span>海淀区-安宁庄</span>
                    </div>
                    <ul class="detail_ul">
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                    </ul>
                </div>
            </li>
            <li class="list_detail">
                <div class="img">
                    <img src="img/shop.png">
                </div>
                <div class="detail_mess">
                    <p>
                        <span class="mess_class">区域类型：</span>
                        <span class="mess_kind">生活社区- 高端</span>
                    </p>
                    <p class="mess_people mess_peo">客流：<i>20万+</i></p>
                    <p class="mess_people">商业街店铺</p>
                    <p class="mess_mon">
                        <span class="mess_area">200<i>㎡</i></span>
                        <span class="mess_money">100000<i class="mess_each">元/月</i></span>
                    </p>
                </div>
                <div class="detail_near">
                    <div class="detail_addr">
                        <i></i>
                        <span>海淀区-安宁庄</span>
                    </div>
                    <ul class="detail_ul">
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                    </ul>
                </div>
            </li>
            <li class="list_detail">
                <div class="img">
                    <img src="img/shop.png">
                </div>
                <div class="detail_mess">
                    <p>
                        <span class="mess_class">区域类型：</span>
                        <span class="mess_kind">生活社区- 高端</span>
                    </p>
                    <p class="mess_people mess_peo">客流：<i>20万+</i></p>
                    <p class="mess_people">商业街店铺</p>
                    <p class="mess_mon">
                        <span class="mess_area">200<i>㎡</i></span>
                        <span class="mess_money">100000<i class="mess_each">元/月</i></span>
                    </p>
                </div>
                <div class="detail_near">
                    <div class="detail_addr">
                        <i></i>
                        <span>海淀区-安宁庄</span>
                    </div>
                    <ul class="detail_ul">
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                        <li class="near">医院1</li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="find_more">查看更多</div>
        <div class="xuanpu">&copy;&nbsp;2017&nbsp;xuanpu100.com&nbsp;&nbsp;北京基石动力科技有限公司</div>
        <div class="foot">
            <div class="free_server">
                <a href="###">
                    <i></i>
                    <span>免费客服咨询</span>
                </a>
            </div>
            <div class="free_read">
                <a href="read.blade.php">
                    <i></i>
                    <span>免费订阅店址</span>
                </a>
            </div>
        </div>
        <div class="show none">
            已为您从&nbsp;<span>33567256</span>&nbsp;个店址中筛选出&nbsp;<i>36896</i>&nbsp;个有执照的有效店址
        </div>
    </div>
<!--选择类型-->
    <!--<div class="mold ">-->
        <!--<div class="mold_con">-->
            <!--<p class="mold_xz">请选择你的经营类型-->
                <!--<span></span>-->
            <!--</p>-->
            <!--<div class="mold_box">-->
                <!--<p>酒楼餐饮</p>-->
                <!--<p>服饰鞋包</p>-->
                <!--<p>休闲娱乐</p>-->
                <!--<p>美容美发</p>-->
                <!--<p>生活服务</p>-->
                <!--<p>百货超市</p>-->
                <!--<p>家居建材</p>-->
                <!--<p>电器通讯</p>-->
                <!--<p>汽修美容</p>-->
                <!--<p>医药保健</p>-->
                <!--<p>教育培训</p>-->
                <!--<p>旅馆宾馆</p>-->
                <!--<p>其他业态</p>-->
            <!--</div>-->
            <!--<div class="mold_ok">确定</div>-->
        <!--</div>-->
    <!--</div>-->
<!--//搜索页-->
    <div class="search_main none">
        <div class="head">
            <i class="coordinate"></i>
            <span>北京</span>
            <a href="###"><i class="logo"></i></a>
            <a href="###"><i class="user"></i></a>
        </div>
        <!--<div class="headhead"></div>-->
        <div class="search">
            <div class="search_key">
                <input placeholder="输入关键字搜索铺源店址" readonlyunselectable="on" type="text">
                <a href="###"><i></i></a>
            </div>
        </div>
        <div class="search_content">
            <h4>历史搜索</h4>
            <div class="search_detail">
                <a href="###"><span class="search_one">南锣鼓巷</span></a>
                <a href="###"><span class="search_two">西单大悦城</span></a>
            </div>
        </div>
    </div>
 <!--登录页-->
    <div class="login_page none">
        <div class="head">
            <i class="coordinate"></i>
            <span>北京</span>
            <a href="###"><i class="logo"></i></a>
            <a href="###"><i class="user"></i></a>
        </div>
        <!--<div class="headhead"></div>-->
        <div class="login_content ">
            <form action="" class="registerForm">
                <h4>用户登录</h4>
                <div class="phoneNumber">
                    <span></span>
                    <!--<img src="images/phone.png" alt="">-->
                    <input type="text" placeholder="请输入手机号码">
                </div>
                <div class="verifica">
                    <div class="verificationCode">
                        <span></span>
                        <!--<img src="images/yanzheng.png" alt="">-->
                        <input type="text" placeholder="请输入验证码">
                    </div>
                    <div class="send">发送验证码</div>
                </div>
                <div class="rightNow"><a href="###">立即登录</a></div>
                <p>登录代表您已同意&nbsp;&nbsp;<a href="###">选铺100 用户服务协议</a></p>
                <!--<div class="login_text"><h6>其他方式登录</h6><a href="###"><img src="images/weixin.png" alt=""></a></div>-->
            </form>
        </div>
    </div>
<!--用户协议-->
    <div class="agreement none">
        <div class="head">
            <i class="coordinate"></i>
            <span>北京</span>
            <a href="###"><i class="logo"></i></a>
            <a href="###"><i class="user"></i></a>
        </div>
        <!--<div class="headhead"></div>-->
        <div class="agreement_content">
            <h4>选铺100 用户服务协议</h4>
            <div class="agreement_detail">
                <p>1.一切网民在进入选铺100主页及各层页面时均被视为已经仔细看过本条款并完全同意。凡以任何方式登录本网站，或直接，间接使用本网站资料者，均被视为自愿接受本网站相关声明和用户服务协议的约束。</p>
                <p>2.选铺100转载的内容并不代表选铺100之意见及观点，也不意味着本网赞同其观点或证实其内容的真实性。</p>
                <p>3.选铺100转载的文字，图片，音视频等资料均由本网站用户提供，其真实性，准确性和合法性由信息发布人负责，选铺100不提供任何保证，并不承担任何法律责任。</p>
                <p>4.选铺100所转载的文字，图片，音视频等资料，如果侵犯了第三方的知识产权或其他权利，责任由作者或转载者本人承担，本网站对此不承担责任。</p>
                <p>5.选铺100不保证为用户提供便利而设置的外部链接的准确性和完整性，同时，对于该外部链接指向的不由选铺100实际控制的任何网页上的内容，选铺100不承担任何责任。</p>
                <p>6.用户明确并同意其使用选铺100服务所存在的风险将完全由其本人承担；因其使用选铺100服务而产生的一切后果也由本人承担，选铺100对此不承担任何责任。</p>
                <p>7.除选铺100注明之服务条款外，其他因不当使用本网而导致的任何意外，疏忽，合约毁坏，诽谤，版权或其他知识产权侵犯及其所造成的任何损失（包括因不当下载而感染电脑病毒等），选铺100概不负责，亦不承担任何法律责任。</p>
                <p>8.对于因不可抗力或因黑客攻击，通讯线路中断等选铺100不能控制的原因造成的网络服务中断或其他缺陷，导致用户不能正常使用选铺100，选铺100不承担任何责任，担将尽力减少因此给用户造成的损失或影响。</p>
                <p>9.本声明未涉及的问题请参见国家有关法律法规，当本声明与国家有关法律法规冲突时，以国家法律法规为准。</p>
            </div>
        </div>
    </div>
<!--我的展开(登录成功后)-->
    <div class="mine none">
        <div class="head">
            <i class="coordinate"></i>
            <span>北京</span>
            <a href="###"><i class="logo"></i></a>
            <a href="###"><i class="user"></i></a>
        </div>
        <!--<div class="headhead"></div>-->
        <div class="my_content">
            <a href="collect.html"><div class="my_collect _my">
                <span></span><em>我的收藏</em>
                <i></i>
            </div></a>
            <a href="order.html"><div class="my_order _my">
                <span></span><em>我的订单</em>
                <i></i>
            </div></a>
            <a href="###"><div class="my_back">退出</div></a>
        </div>
    </div>

<!--拨打客服电话-->
    <div class="telephone none">
        <div class="telephone_con">
            <p>客服咨询电话</p>
            <div class="phone_call">
                <p>010-58220156</p>
                <a href="###"><div class="call_no">取消</div></a>
                <a href="tel:01058220156"><div class="call_sure">确定拨打</div></a>
            </div>
        </div>
    </div>
<!--&lt;!&ndash;主页筛选部分&ndash;&gt;-->
    <!--<div class="shaixuan none">-->
        <!--<ul></ul>-->
        <!--<div class="erci none">-->
            <!--<ul></ul>-->
        <!--</div>-->
    <!--</div>-->
@include('Frontend.Index.CN.wap.Layout.footer')
<script>


</script>
</body>
</html>

<!--实勘介绍-->
<!--实勘服务是作为顾客的“眼“，让专业的人代替客户去实勘店铺，产出实勘报告，节省客户时间成本，快速了解店铺。实勘内容主要有：-->
<!--1.          店铺的基本信息（房屋地址、面积、楼层等）、工程信息（电量、上下水、隔油池等）、租赁信息（租金和付款方式、转让费等）；-->
<!--2.          证照情况及房产证把控，只做正规店铺、放心租铺。-->
<!--3.          绘制店铺平面图。房屋结构一目了然。-->
<!--4.          采集照片，室内装修情况和外部环境情况。-->
<!--5.          店铺周边信息采集（小区、人流、客群画像、竞争业态等）。-->
<!--6.          竞争店信息，知己知彼百战不殆。-->