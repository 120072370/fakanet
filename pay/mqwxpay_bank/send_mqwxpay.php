<?php
require(dirname(__FILE__).'/Config.php');
$price = isset($_REQUEST['price'])?$_REQUEST["price"]:0;
//获取付款说明（建议使用订单号，提交到支付宝前先将订单信息记录到数据库）
$orderid = isset($_GET['orderid'])?$_GET["orderid"]:'';

$postdata['name'] = '商品';
$postdata['pay_type'] ='wechat';
$postdata['price'] =$price;
$postdata['order_id'] = $orderid;
$postdata['order_uid'] = '123';
$postdata['notify_url'] = $NOTIFYURL;
$postdata['return_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/orderquery.htm?orderid='.$orderid;
//$postdata['feedback_url'] = '';
$postdata['appsecret'] = $TOKEN;

//ksort($postdata);
$signstr = '';
foreach ($postdata as $key => $value) {
    $signstr .=$value;
}
//$signstr = substr($signstr, 0, -1);
$postdata['sign'] = md5($signstr);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>正在跳转付款</title>
</head>
<body>
    <form action="<?php echo $PAYURL;?>" method="post" name="alidirect" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="name" value="<?php echo $postdata['name']; ?>"/>
        <input type="hidden" name="pay_type" value="<?php echo $postdata['pay_type']; ?>" />
        <input type="hidden" name="price" value="<?php echo $price;?>"/>
        <input type="hidden" name="order_id" value="<?php echo $orderid;?>" />

        <input type="hidden" name="order_uid" value="<?php echo $postdata['order_uid']; ?>" />
        <input type="hidden" name="notify_url" value="<?php echo $NOTIFYURL;?>" />
        <input type="hidden" name="return_url" value="<?php echo  $postdata['return_url']?>" />

        <input type="hidden" name="sign" value="<?php echo $postdata['sign'];?>" />
    </form>
    <script>document.alidirect.submit();</script>
</body>
</html>
