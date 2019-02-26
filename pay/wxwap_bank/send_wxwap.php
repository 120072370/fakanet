<?php 
ini_set('date.timezone','Asia/Shanghai');
include_once '../../init_notify.php';
//error_reporting(E_ERROR);
$url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$host=$_SERVER['HTTP_HOST'];
$wxpay_host=$wddb->getOne("select wxpay_host from ".DB_PREFIX."config");
if($wxpay_host!=$host){
	$url=str_replace($host, $wxpay_host, $url);
    header("location:".$url);
}
require_once "lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
//$log->DEBUG('test'); 

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody($_REQUEST['orderid']);
$input->SetAttach($_REQUEST['orderid']);
$input->SetOut_trade_no($_REQUEST['orderid']);
$input->SetTotal_fee($_REQUEST['price']*100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag($_REQUEST['orderid']);
$input->SetNotify_url("http://".$_SERVER['HTTP_HOST']."/pay/weixin_bank/notify.php");//这里网址需要修改成您自己的网址
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
//printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);
$editAddress = $tools->GetEditAddressParameters();

?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
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
	window.onload = function(){
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
	</script>
</head>
<body>
    <br/>
	<div align="center">
		<a style="padding:10px 30px; border-radius: 15px;background-color:#FE6714; color:white;  font-size:16px;" href="/orderquery.htm?orderid=<?php echo $_REQUEST['orderid'];?>" >查看订单</a>
	</div>
</body>
</html>