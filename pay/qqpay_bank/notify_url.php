<?php
require_once 'inc.php';
require_once ('qpayMchApI.class.php');

$xml = $GLOBALS['HTTP_RAW_POST_DATA'];
$postObj =  simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);

$orderid  = $postObj->out_trade_no;    // 商户订单号
$ovalue   = $postObj->cash_fee;    //总价格
$attach   = $postObj->transaction_id; //QQ钱包订单号
$sign     = $postObj->sign;
$nonce_str = $postObj->nonce_str;
$amount = $postObj->total_fee;

//$params = array();
//$params["out_trade_no"] = $orderid;
////$params["sub_mch_id"] = "";
//$params["body"] = $orderid;
//$params["device_info"] = "WP00000001";
//$params["fee_type"] = "CNY";
//$params["notify_url"] = "http://www.weiqihd.cn/pay/qqpay_bank/notify_url.php";
//$params["spbill_create_ip"] = "127.12.12.1";
//$params["total_fee"] = $amount;
//$params["trade_type"] = "NATIVE";
////商户号
//$params["mch_id"] = QpayMchConf::MCH_ID;
////随机字符串
//$params["nonce_str"] = $nonce_str;
////签名
//$sign_qpay = QpayMchUtil::getSign($params);

//校验订单
$params = array();
$params["out_trade_no"] = $order_id;
$params["sub_mch_id"] = "";
$qpayApi = new QpayMchAPI('https://qpay.qq.com/cgi-bin/pay/qpay_order_query.cgi', null, 10);
$ret = $qpayApi->reqQpay($params);
$postRet = QpayMchUtil::xmlToArray($ret);

//$log_text = "\n orderid=".$orderid."\n ovalue".$amount.":&ttach=".$attach.";".QpayMchConf::MCH_ID."\n===".$sign."===".$sign_qpay."\n ".$ret."\n ".$postRet["return_code"] ;
//echo $log_text."\n ".array_key_exists("return_code",$ret);
if(array_key_exists("return_code",$postRet) && $postRet["return_code"] =="SUCCESS"){
    try
    {
        $ob=new HandleOrders_Model($orderid,$ovalue/100,1);
        $ob->updateOrderStatusForBank();  
    }
    //捕获异常
    catch(Exception $e)
    {
        $log_text = 'Message: ' .$e->getMessage();
    }
}
echo "<xml><return_code>SUCCESS</return_code></xml>";
//$retpay_db = QpayMchUtil::xmlToArray($postObj);

//$retpay_db = unset($postObj[10]);   
// $sign_retpay= QpayMchUtil::getSign($params);
// $log_text =$sign_retpay."====".$sign;
//$myfile = fopen("log.txt", "a") or die("Unable to open file!");
//fwrite($myfile, $log_text);
//fclose($myfile);




