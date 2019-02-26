<?php
//==================================================================================================
//
//《支付宝免签约即时到账辅助》付款接口提交
//本页面用于将数据库中已记录的订单发送到支付宝网站进行付款
//
//本接口示例代码演示了接口工作流程，您可以修改示例代码进行集成，也可以根据开发文档自行编写接口代码
//如果您不清楚如何集成接口到网站，也可以联系QQ：40386277付费集成
//
//==================================================================================================
//获取付款金额
$Amount = isset($_REQUEST['price'])?$_REQUEST["price"]:0;
//获取付款说明（建议使用订单号，提交到支付宝前先将订单信息记录到数据库）
$Title = isset($_GET['orderid'])?$_GET["orderid"]:'';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <title>支付宝在线支付</title>
</head>
<body>
    <form action="standard/index.php" method="post" name="alidirect" accept-charset="gb2312" onsubmit="document.charset='utf8'">
        <input type="hidden" name="goto" value="https://excashier.alipay.com">
        <input type="hidden" name="money" value="<?php echo $Amount;?>">
        <input type="hidden" name="payOrderId" value="<?php echo $Title;?>" />
        <input type="hidden" name="Order" value="<?php echo $Title;?>" />
        <input type="hidden" name="type" value="1">
        <input type="hidden" name="account" value="lh123456">
    </form>
    <script>document.alidirect.submit();</script>
</body>
</html>
