<?php
/**
 * cQpayOrderQuery.php
 * Created by by HelloWorld
 * vers: v1.0.0
 * User: Tencent.com
 */

require_once ('qpayMchApI.class.php');
$attach = trim( $_GET['orderid'] );
$order_id = trim( $_GET['payorderid'] );
$amount = floatval( $_GET['price'] );
//入参
$params = array();
$params["out_trade_no"] = $attach;
//$params["sub_mch_id"] = "";
$params["body"] = $attach;
$params["device_info"] = "WP00000001";
$params["fee_type"] = "CNY";
$params["notify_url"] = "http://".$_SERVER['HTTP_HOST']."/pay/qqpay_bank/notify_url.php";
$params["spbill_create_ip"] = "127.12.12.1";
$params["total_fee"] = $amount  * 100 ;
$params["trade_type"] = "NATIVE";

//参数检测
//实际业务中请校验参数，本demo略
//


//api调用
$qpayApi = new QpayMchAPI('https://qpay.qq.com/cgi-bin/pay/qpay_unified_order.cgi', null, 10);
$ret = $qpayApi->reqQpay($params);
$res = QpayMchUtil::xmlToArray($ret);

//$logtext = implode(",",$res)."\n".implode(",",array_keys($res))."\n".$res["prepay_id"];
//$logtext = $res["prepay_id"];
//$myfile1 = fopen("log.txt", "a") or die("Unable to open file!");
//fwrite($myfile1, "\n ".$logtext." \n");
//fclose($myfile1);

$prepay_id = $res["prepay_id"];

$code = $res['code_url'];
include 'qqpay.php';