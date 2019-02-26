<?php

require(dirname(__FILE__).'/Config.php');

$Amount = isset($_REQUEST['price'])?$_REQUEST["price"]:0;
//获取付款说明（建议使用订单号，提交到支付宝前先将订单信息记录到数据库）

$Title = isset($_GET['orderid'])?$_GET["orderid"]:'';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>正在跳转付款</title>
</head>
<body>
<form action="alidirectV2/index2.php" method="post" name="alidirect"  >
<input type="hidden" name="remarks" value="商品">
<input type="hidden" name="price" value="<?php echo $Amount;?>">
<input type="hidden" name="orderCode" value="<?php echo $Title;?>" />
</form>
<script>document.alidirect.submit();</script>
</body>
</html>