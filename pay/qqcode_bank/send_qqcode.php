<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';


function is_weixin() { 
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) { 
        return true; 
    } return false; 
}

//初始化日志
//$logHandler= new CLogFileHandler("logs/".date('Y-m-d').'.log');
//$log = Log::Init($logHandler, 15);
//$log->DEBUG('test'); 

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

$openId="";

if(is_weixin()){
  
    //①、获取用户openid
    $tools = new JsApiPay();
    $openId = $tools->GetOpenid();
    //echo $openId;

}

//②、统一下单
$input = new WxPayUnifiedOrder();

$input->SetBody($_REQUEST['orderid']);
$input->SetAttach($_REQUEST['orderid']);
$input->SetOut_trade_no($_REQUEST['orderid']);
$input->SetTotal_fee($_REQUEST['price']*100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag($_REQUEST['orderid']);
$input->SetNotify_url("http://".$_SERVER['HTTP_HOST']."/pay/qqcode_bank/notify.php");
if(is_weixin()){
    $input->SetTrade_type("JSAPI");
    $input->SetOpenid($openId);
}else{
    
    $input->SetTrade_type("MWEB");
    $input->SetScene_info('{"h5_info": {"type":"Wap","wap_url": "http://"'.$_SERVER['HTTP_HOST'].'","wap_name": "微奇发卡"}}');
}

//$input->SetSpbill_create_ip(get_client_ip());
;
$order = WxPayApi::unifiedOrder($input);


//printf_info($order);
if(!is_weixin()){
    if($order["mweb_url"]){
        $redurl = $order["mweb_url"]."&redirect_url=http://".$_SERVER['SERVER_NAME']."/pay/qqcode_bank/result_qqcode.php?res_orderid=".$_REQUEST['orderid'];
        header("location:".$redurl) ;

    }
}else{
    $jsApiParameters = $tools->GetJsApiParameters($order);
    $editAddress = $tools->GetEditAddressParameters();
}
//

//获取共享收货地址js函数参数
//

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>微信支付</title>
    <script type="text/javascript">
        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                <?php echo $jsApiParameters; ?>,
			function(res){
			    WeixinJSBridge.log(res.err_msg);
			    //alert(res.err_code+res.err_desc+res.err_msg);
			}
		);
        }
        function is_weixn(){ 
            var ua = navigator.userAgent.toLowerCase(); 
            if(ua.match(/MicroMessenger/i)=="micromessenger") { 
                return true; 
            } else { 
                return false; 
            } 
        }
        window.onload = function(){
            if(is_weixn()){
                if (typeof WeixinJSBridge == "undefined"){
                    if( document.addEventListener ){
                        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                    }else if (document.attachEvent){
                        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                    }
                }else{
                    jsApiCall();
			
                }
            }
        }
    
    </script>
</head>
<body>
    <br />
    <div align="center">
        <a style="padding:10px 30px; border-radius: 15px;background-color:#FE6714; color:white;  font-size:16px;" href="/orderquery.htm?st=orderid&kw=<?php echo $_REQUEST['orderid'];?>" >查看订单</a>
    </div>
</body>
</html>
