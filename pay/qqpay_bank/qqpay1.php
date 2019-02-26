<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    <title>QQ钱包扫码支付</title>
    <script src="file_qqpay/jquery.min.js"></script>
    <script type="text/javascript" src="file_qqpay/jquery.qrcode.js"></script>
    <script type="text/javascript" src="file_qqpay/qrcode.js"></script>
    <style>
</style>

    <script>
        function checkorder(b, c) {
            $.ajax({
                type: "post", url: "/pay/qqpay_bank/orderquery.php", data: { orderid: b }, complete: function () { }, error: function (a) { }, success: function (a) {
                    if (a == "1") { location.href = c }

                }
            });
        }
        $(document).ready(function () {
            setInterval("checkorder('<?=$attach?>','../../result.htm?orderid=<?=$attach?>')", 3000);
        });

    </script>
    <script src="http://open.mobile.qq.com/sdk/qqapi.js?_bid=152"></script>
    <script>
        //alert(mqq.android);
        //isMobileQQ(function (result) {
        //    alert(result);
        //});
        if (mqq.android || mqq.iOS) {
            var tokid = '<?php echo $prepay_id?>';
           // alert(tokid);
            if (tokid != "") {
                mqq.tenpay.pay({
                    tokenId:tokid,
                    //pubAcc: '',
                    //pubAccHint: "",
                    appInfo: "bargainor_id#<?php echo QpayMchConf::MCH_ID?>|channel#wallet"
                }, function (result, resultCode) {
                    if (resultCode == 0) {
                        alert("支付成功！");
                        location.href = '/orderquery.htm?st=orderid&kw=<?php echo $attach?>';
                    } else {
                        alert("支付失败，请重新支付！");
                      //  location.href = '/orderquery.htm?st=orderid&kw=<?php echo $attach?>';
                    }
                });
            }
        }
    </script>
</head>
<body>
    <table border="0" width="740" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="78" align="center" valign="middle"><span id="res" style="font-size: 14px; color: #000;">交易订单号：<?=$order_id?></span>&nbsp;&nbsp;<span style="font-size: 14px; color: #000;">金额：<?=$amount?>元</span></td>
        </tr>
        <tr>
            <td style="border: 7px solid #9E9E9E;">
                <div class="modal-left" style="box-sizing: content-box; float: left; width: 250px; padding: 20px 50px 25px 45px; color: rgb(102, 102, 102); font-family: 'PingFang SC', 'Hiragino Sans GB', 'WenQuanYi Micro Hei', tahoma, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px;">
                    <p style="box-sizing: content-box; margin: 0px 0px 16px; font-size: 18px; text-align: center; line-height: 32px;">
                        <span style="box-sizing: content-box; vertical-align: middle;">请使用<span class="Apple-converted-space">&nbsp;</span></span><span class="orange" style="box-sizing: content-box; color: rgb(255, 136, 0); vertical-align: middle;">QQ钱包<span class="Apple-converted-space">&nbsp;</span></span><i class="icon icon-qrcode" style="box-sizing: content-box; font-size: 0px; display: inline-block; width: 17px; height: 17px; vertical-align: middle; background-size: 168px; background-image: url('/pay/qqpay_bank/img/icon-common@2x.KyXBh.png'); background-position: 0px -88px"></i><span class="orange" style="box-sizing: content-box; color: rgb(255, 136, 0); vertical-align: middle;"><span class="Apple-converted-space">&nbsp;</span>扫一扫</span>
                        <br style="box-sizing: content-box;">
                        扫描二维码支付
                         <br style="box-sizing: content-box;">
                        如您在使用手机QQ中，请长按二维码支付
                    </p>
                    <div class="modal-qr" style="box-sizing: content-box; padding-top: 20px; border: 1px solid rgb(221, 221, 221);">
                        <div id="qrcodeTable" style="box-sizing: content-box; border: 0px; vertical-align: middle; width: 210px; height: 210px; display: block; margin: 0px auto 20px;">
                            <img class="" src="qrcode.php?text=<?=$code?>" width="200" />
                        </div>
                        <div class="modal-info" style="box-sizing: content-box; height: 14px; color: rgb(255, 136, 0); font-size: 12px; line-height: 1; padding: 13px 0px; text-align: center; background-color: rgb(247, 247, 247);">
                            <img class="icon-clock" src="<?=$code?>" style="box-sizing: content-box; border: 0px; vertical-align: middle; width: 12px; height: 12px; margin-right: 5px;"><span style="box-sizing: content-box; vertical-align: middle;">二维码有效时长为2小时, 
			请尽快支付</span>
                        </div>
                    </div>
                </div>
                <div class="modal-right" style="box-sizing: content-box; float: left; color: rgb(102, 102, 102); font-family: 'PingFang SC', 'Hiragino Sans GB', 'WenQuanYi Micro Hei', tahoma, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 21px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px;">

                    <img src="file_qqpay/qqpay.jpg" style="box-sizing: content-box; border: 0px; vertical-align: middle; width: 371px; height: 438px;">
                </div>
            </td>
        </tr>
    </table>


</body>
</html>
