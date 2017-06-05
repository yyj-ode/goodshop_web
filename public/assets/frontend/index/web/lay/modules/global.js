layui.define(['layer', 'code', 'form', 'element', 'util'], function(exports){
    var $ = layui.jquery
        ,layer = layui.layer
        ,form = layui.form()
        ,util = layui.util
        ,device = layui.device();

    //阻止IE7以下访问
    if(device.ie && device.ie < 8){
        layer.alert('Layui最低支持ie8，您当前使用的是古老的 IE'+ device.ie + '，你丫的肯定不是程序猿！');
    }


    //搜索组件
    form.on('select(component)', function(data){
        var value = data.value;
        location.href = '/doc/'+ value;
    });


    //首页banner
    setTimeout(function(){
        $('.site-zfj').addClass('site-zfj-anim');
        setTimeout(function(){
            $('.site-desc').addClass('site-desc-anim')
        }, 5000)
    }, 100);


    for(var i = 0; i < $('.adsbygoogle').length; i++){
        (adsbygoogle = window.adsbygoogle || []).push({});
    }

    //固定Bar
    util.fixbar({
        bar1: true
        ,click: function(type){
            if(type === 'bar1'){
                location.href = '#';
            }
        }
    });

    //代码修饰
    layui.code({
        elem: 'pre'
    });

    //目录
    var siteDir = $('.site-dir');
    if(siteDir[0] && $(window).width() > 750){
        layer.open({
            type: 1
            ,content: siteDir
            ,skin: 'layui-layer-dir'
            ,area: 'auto'
            ,title: '目录'
            ,offset: 'r'
            ,shade: false
            ,success: function(layero, index){
                layer.style(index, {
                    marginLeft: -15
                })
            }
        });
        siteDir.find('li').on('click', function(){
            var othis = $(this);
            othis.find('a').addClass('layui-this');
            othis.siblings().find('a').removeClass('layui-this');
        });
    }

    //在textarea焦点处插入字符
    var focusInsert = function(str){
        var start = this.selectionStart
            ,end = this.selectionEnd
            ,offset = start + str.length

        this.value = this.value.substring(0, start) + str + this.value.substring(end);
        this.setSelectionRange(offset, offset);
    };

    //演示页面
    $('body').on('keydown', '#LAY_editor, .site-demo-text', function(e){
        var key = e.keyCode;
        if(key === 9 && window.getSelection){
            e.preventDefault();
            focusInsert.call(this, '  ');
        }
    });

    var editor = $('#LAY_editor')
        ,iframeElem = $('#LAY_demo')
        ,demoForm = $('#LAY_demoForm')[0]
        ,demoCodes = $('#LAY_demoCodes')[0]
        ,runCodes = function(){
        if(!iframeElem[0]) return;
        var html = editor.val();

        html = html.replace(/=/gi,"layequalsign");
        html = html.replace(/script/gi,"layscrlayipttag");
        demoCodes.value = html.length > 100*1000 ? '<h1>卧槽，你的代码过长</h1>' : html;

        demoForm.action = '/api/runHtml/';
        demoForm.submit();

    };
    $('#LAY_demo_run').on('click', runCodes), runCodes();

    //手机设备的简单适配
    var treeMobile = $('.site-tree-mobile')
        ,shadeMobile = $('.site-mobile-shade')

    treeMobile.on('click', function(){
        $('body').addClass('site-mobile');
    });

    shadeMobile.on('click', function(){
        $('body').removeClass('site-mobile');
    });

    exports('global', {});
});