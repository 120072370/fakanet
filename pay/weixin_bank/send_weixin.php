<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once 'log.php';

//模式一
/**
 * 流程：
 * 1、组装包含支付信息的url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
 * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
 * 5、支付完成之后，微信服务器会通知支付成功
 * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$notify = new NativePay();
$url1 = $notify->GetPrePayUrl("123456789");

//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$input = new WxPayUnifiedOrder();
$input->SetBody($_REQUEST['orderid']);
$input->SetAttach($_REQUEST['orderid']);
$input->SetOut_trade_no($_REQUEST['orderid']);
$input->SetTotal_fee($_REQUEST['price']*100);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag($_REQUEST['orderid']);
$input->SetNotify_url("http://".$_SERVER['HTTP_HOST']."/pay/weixin_bank/notify.php");
$input->SetTrade_type("NATIVE");
$input->SetProduct_id("123456789");
$result = $notify->GetPayUrl($input);
$url2 = $result["code_url"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>微信扫码支付</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="static/css/comm.css" />
		<!--[if IE 6]>
		<script type="text/javascript" src="static/js/iepng.js"></script>
		<script type="text/javascript">
		EvPNG.fix('.search a.seaIcon i,.m-menu-all h3 em,.nav-cart-btn i.f-cart-icon,a.u-cart s,.u-mui-tab a.u-menus s,.u-mui-tab li.f-cart a.u-menus i,.u-mui-tab li.f-both-top a.u-menus,.u-mui-tab li.f-both-bottom a.u-menus,.i-ctrl a s,.g-list li cite,.f-list-sorts li.m-value s,.nav-main li.f-nav-thanks span,.u-float-list a i,.cartEmpty i,.transparent-png');
		</script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="static/css/weixinpay.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css"><!-- .STYLE1 {
	font-size: 24px
}

.STYLE2 {
	color: #FF0000
}

.STYLE3 {
	color: #FFFFFF
}

--></style>
	</head>
	<body>
		<input name="hidShopID" type="hidden" id="hidShopID" value="151208110318084743" />
		<input name="hidIsBuyPay" type="hidden" id="hidIsBuyPay" value="0" />
		<div class="wx_header">
			<div class="wx_logo">
				<span class="mab10 STYLE1"><span class="STYLE3">本交易委托本站网代收款|应付金额：<span class="STYLE2">￥</span></span><span class="STYLE2"><?php echo $_REQUEST['price']?>元</span></span>
			</div>
		</div>
		<div class="weixin">
			<div class="weixin2">
				<b class="wx_box_corner left pngFix"></b><b class="wx_box_corner right pngFix"></b>
				<div class="wx_box pngFix">
					<div class="wx_box_area">
						<div class="pay_box qr_default">
							<div class="area_bd">
								<span class="wx_img_wrapper" id="qr_box">
								<img id="ImgPic" alt="模式二扫码支付" src="phpqrcode/index.php?data=<?php echo urlencode($url2);?>" border="0" height="310" width="310"/>
								
								<img style="left: 50%; opacity: 0; display: none; margin-left: -101px;" class="guide pngFix" src="static/images/qqwebpay_guide.png" alt="" id="guide" />
								</span>
								<div class="msg_default_box1">
									<i class="icon60_qr pngFix"></i>
									<p>
										请使用手机微信
										<br />
										扫一扫完成支付
									</p>
								</div>
								<div style="margin:10px auto; width:260px;  height:70px; background-color:#900">
									<p>&nbsp;
										
									</p>
									<p class="STYLE1">
										<a href="/orderquery.htm?orderid=<?php echo $_REQUEST['orderid']?>" target="_blank">
											<span style="color:#FFF">支付完成 点击取货</span>
										</a>
									</p>
									<p>&nbsp;
										
									</p>
								</div>
								<div class="msg_box">
									<i class="icon_wx pngFix"></i>
									<p>
										<strong>扫描成功</strong>请在手机确认支付
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="wx_hd">
						<div class="wx_hd_img icon_wx"></div>
					</div>
					<div class="wx_money">
						<span>￥</span><?php echo $_REQUEST['price']?>
					</div>
					<!--支付订单号-->
					<div class="wx_pay">
						<p>
							
						</p>
						<!--p><span class="wx_left">支付订单号</span><span class="wx_right"></span></p-->
					</div>
					<div class="wx_kf">
						<div class="wx_kf_img icon_wx"></div>
						<div class="wx_kf_wz">
							<p>
				
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--版权-->
		<div class="g-copyrightCon">

		</div>

	</body>
</html>
