<?php
//==================================================================================================
//
//《支付宝免签约即时到账辅助》回调通知接收
//本页面用于接收《支付宝免签约即时到账辅助》发来的收款信息，验证信息并修改数据库中记录
//
//本接口示例代码演示了接口工作流程，您可以修改示例代码进行集成，也可以根据开发文档自行编写接口代码
//如果您不清楚如何集成接口到网站，也可以联系QQ：40386277付费集成
//
//==================================================================================================
require_once('../../init.php');

require(dirname(__FILE__).'/Config.php');


$postdata["mchNo"] = isset($_POST['mchNo'])?$_POST['mchNo']:'';
$postdata["price"] = isset($_POST['price'])?$_POST['price']:0;
$postdata["orderCode"] = isset($_POST['orderCode'])?$_POST['orderCode']:'';
$postdata["realPrice"] = isset($_POST['realPrice'])?$_POST['realPrice']:0;
$postdata["tradeNo"] = isset($_POST['tradeNo'])?$_POST['tradeNo']:'';
$postdata["remarks"] = isset($_POST['remarks'])?$_POST['remarks']:'';
$postdata["ts"] = isset($_POST['ts'])?$_POST['ts']:'';
$postdata["sign"] = isset($_POST['sign'])?$_POST['sign']:'';

$signstr = '';
ksort($postdata);
foreach ($postdata as $key => $value) {
    if ($key != 'sign') {
        $signstr .= $key . '=' . $value . '&';
    }
}
$signstr = substr($signstr, 0, -1);
$sign = md5($signstr . '&token='.$TOKEN);
if ($sign == $postdata['sign']) {

    $ob=@new HandleOrders_Model($postdata["orderCode"],$postdata["realPrice"],1);
    $ob->updateOrderStatusForBank();
    echo "success";		//请不要修改或删除
    
} else {
    return '验签失败';
}

?>