    <!DOCTYPE HTML>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>微信安全支付</title>
        <script src="<?php echo e(asset('assets/frontend/index/web/js/jquery.js')); ?>" type="text/javascript"></script>
    </head>
    <body>
        <div align="center" id="qrcode">
        </div>
        <div align="center">
            <input type="hidden" value="<?php echo e($unifiedOrderResult["code_url"]); ?>" id="code_url">
            <p>订单号：<?php echo $out_trade_no; ?></p>
        </div>


        <!-- <div align="center">
            <form  action="./order_query.php" method="post">
                <input name="out_trade_no" type='hidden' value="<?php echo $out_trade_no; ?>">
                <button type="submit" >查询订单状态</button>
            </form>
        </div>-->
      <!--  <br>-->
       <!-- <div align="center">
            <form  action="./refund.php" method="post">
                <input name="out_trade_no" type='hidden' value="<?php echo $out_trade_no; ?>">
                <input name="refund_fee" type='hidden' value="1">
                <button type="submit" >申请退款</button>
            </form>
        </div>-->
     <!--   <br>-->
       <!-- <div align="center">
            <a href="http://ke.bjzx123.cn">返回首页</a>
        </div>-->



    </body>
        <script src="<?php echo e(asset('assets/frontend/index/web/js/qrcode.js')); ?>"></script>
        <script>
            var code_url = $('#code_url').val();
            if(code_url)
            {
                var url = "<?php echo $code_url;?>";
                //参数1表示图像大小，取值范围1-10；参数2表示质量，取值范围'L','M','Q','H'
                var qr = qrcode(10, 'M');
                qr.addData(url);
                qr.make();
                var wording=document.createElement('p');
                wording.innerHTML = "扫我";
                var code=document.createElement('DIV');
                code.innerHTML = qr.createImgTag();
                var element=document.getElementById("qrcode");
                element.appendChild(wording);
                element.appendChild(code);
            }
        </script>

    </html>