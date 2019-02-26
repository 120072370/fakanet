<?php
require_once('../../init_notify.php');
require_once 'Config.php';

$signstr = join('',array($_POST['aoid'], $_POST['order_id'], $_POST['order_uid'], $_POST['price'], $_POST['pay_price'], $TOKEN));

$sign = md5($signstr);


//$log_text =$sign."====".$_POST['sign'];
//$myfile = fopen("log.txt", "a") or die("Unable to open file!");
//fwrite($myfile, $log_text);
//fclose($myfile);


if ($sign == $_POST['sign']) {

    $ob=@new HandleOrders_Model($_POST['order_id'],$_POST['pay_price'],1);
    $ob->updateOrderStatusForBank();
    echo "success";		//请不要修改或删除
    
} else {
    header("HTTP/1.0 405 Method Not Allowed");
    exit();
}

?>