<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "lib/WxPay.PayTransfers.php";

$result = "";
$PayTran = new PayTransfers();

$input = new WxPayTransfers();
$input->SetOpenid($_REQUEST["openid_wx"]);
$input->SetAmount($_REQUEST["money"] * 100);
$input->SetCheckName("NO_CHECK");
$input->SetDesc("付款结算");
$input->Setre_user_name($_REQUEST["realname"]);
$input->SetTradeno($_REQUEST["Trondeo"]);


$result = $PayTran->PayTranbank($input);

if($result["return_code"]=="SUCCESS"){
    $result = "支付成功";
}else{
    $result = "支付失败".$result["return_msg"];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>企业付款</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="static/css/comm.css" />
    <link rel="stylesheet" type="text/css" href="static/css/weixinpay.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        <!-- .STYLE1 {
            font-size: 24px;
        }

        .STYLE2 {
            color: #FF0000;
        }

        .STYLE3 {
            color: #FFFFFF;
        }

        -->
    </style>
</head>
<body>
    <input name="hidShopID" type="hidden" id="hidShopID" value="151208110318084743" />
    <input name="hidIsBuyPay" type="hidden" id="hidIsBuyPay" value="0" />
    <div class="wx_header">
        <div class="wx_logo">
            <span class="mab10 STYLE1"><span class="STYLE3">本交易委托本站网代收款|应付金额：
                    <span class="STYLE2">￥</span></span><span class="STYLE2"><?php echo $_REQUEST['money']?>元</span></span>
        </div>
    </div>
    <div class="weixin">
        <div class="weixin2">
            <b class="wx_box_corner left pngFix"></b><b class="wx_box_corner right pngFix"></b>
            <div class="wx_box pngFix">
                <div class="wx_money">
                    <span>￥</span><?php echo $_REQUEST['money']?>
                </div>
                <!--支付订单号-->
                <div class="wx_pay">
                    <p>
                        支付单号：	<?php echo $_REQUEST['Trondeo']?>
                    </p>
                    <!--p><span class="wx_left">支付订单号</span><span class="wx_right"></span></p-->
                </div>
                <div class="wx_kf">
                    <div class="wx_kf_img icon_wx"></div>
                    <div class="wx_kf_wz">
                        <p>
                            收款人姓名：<?php echo $_REQUEST['realname']?>
                        </p>
                    </div>
                </div>
                <div class="wx_kf">
                    <div class="wx_kf_img icon_wx"></div>
                    <div class="wx_kf_wz">
                        <p>
                            付款状态：<?php echo $result ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--版权-->
    <div class="g-copyrightCon">
    </div>

</body>
</html>
