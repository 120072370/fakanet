<?php
include 'inc.php';
$orderid = $_POST['orderid'];

if($orderid != ""){
    //$order = new Orders_Model();
    //$res = $order->getOneData( $orderid );
    $res=$wddb->getRow("select * from ".DB_PREFIX."orderlist where orderid='".$orderid."'");
    echo $res["is_pay"];exit;
}

?>