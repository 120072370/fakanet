<?php
require_once 'inc.php';

$MCHNO = $userid;//商户号
$NOTIFYURL = 'http://'.$_SERVER['HTTP_HOST'].'/pay/mqpay_bank/Notify.php';//通知地址
$PAYURL = 'https://bufpay.com/api/pay/'.$MCHNO;//请求地址
$TOKEN = $userkey;//token

//$MCHNO = '71143';//商户号
//$NOTIFYURL = 'http://'.$_SERVER['HTTP_HOST'].'/pay/mqpay_bank/Notify.php';//通知地址
//$PAYURL = 'https://bufpay.com/api/pay/'.$MCHNO;//请求地址
//$TOKEN = '84de5e48759f4029876b6f96d79ad9d9';//token
?>