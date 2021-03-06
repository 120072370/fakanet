<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>该页面请勿刷新或关闭,否则会导致交易丢失!</title>
<style>
body{margin:0 auto; padding:0; font-family:"Microsoft YaHei",Verdana,Arial; background:#fff; font-size:12px;/*字体*/ color:#333;}
ul{list-style:none; margin:0; padding:0;}
#main_bank{clear:both;display:block;margin:auto;overflow:hidden;width:500px;height:lauto;}
.bankInfo{margin:20px auto;}
.infotitle{background-color:#0087d1; color:#fff; height:26px; line-height:28px; font-size:14px; font-weight:bold; text-align:center; width:94px;}
.bankInfo dt{line-height:26px; display:block; padding:10px 0 15px 140px; margin:auto; background:url(common/pay/payinfo.png) no-repeat 36px 40%; border:1px solid #0087d1;}
.bankInfo dt s{text-decoration:none; color:#666;}
.bankInfo dt strong{color:#f00; font-size:14px;}
.goto{background:url(common/pay/goto.png) no-repeat; width:91px; height:30px; border:0; cursor: pointer; margin-right:30px;}
.back{background:url(common/pay/back.png) no-repeat; width:91px; height:30px; border:0; cursor: pointer;}
.goto1{background:url(common/pay/goto1.png) no-repeat; width:91px; height:30px; border:0; cursor: pointer; margin-right:30px;}
.result{background:url(common/pay/result.png) no-repeat; width:91px; height:30px; border:0; cursor: pointer;}
.banktitle{background-color:#ff6b04; color:#fff; height:26px; line-height:28px; font-size:14px; font-weight:bold; text-align:center; width:94px;}/*免费声明*/
.bankInfogo{background-color:#fff6d6; border:1px solid #ff6b04; margin:auto; padding:10px 0 10px 20px; line-height:20px;}
.bankInfogo li{background:url(common/pay/li.png) no-repeat scroll left center transparent; padding-left:20px; margin:4px 0;}
</style>
</head>
<body>
<form name="p" method="post" action="<?php echo $redirectUrl ?>" target="_blank">

<div id="main_bank">
	<dl class="bankInfo">
<div class="infotitle">订单信息</div>
	<dt>
		您的订单号：<strong><?php echo strlen($orderid)==20 ? substr($orderid,0,16) : $orderid ?></strong><br/>
        <s>请保存好您的订单号，方便日后查询交易记录。</s><br/>
        <b>支付金额：</b><strong><?php echo $paymoney ?>元</strong><br/>
		<?php if($couponcode): ?>
		<b>优&nbsp;惠&nbsp;券：</b><?php echo $couponcode ?> (优惠金额:<s style="color:red"><?php echo $coupon ?></s>元)<br/>
		<?php endif; ?>
        <b>支付方式：</b><img src="default/images/<?php echo $pid ?>.gif" align="absmiddle" /><br/>
        <b>商品名称：</b><?php echo isset($goodname) ? $goodname : '' ?><br/>
        <b>购买数量：</b><strong><?php echo $quantity ?></strong>
	  </dt>        
	</dl>
<div class="banktitle">免责声明</div>
	<div class="bankInfogo">
        <ul>
		<li>本平台仅提供自动发卡服务，并非销售商，不负责商品相关售后问题。</li>
        <li>如产生交易纠纷请与商家自行协商处理，与<span style="font-size:12px"><?php echo $config_sitename ?></span>平台无关！</li>
		<li>如果您遇到虚假商品或取卡问题，请与<span style="font-size:12px"><?php echo $config_sitename ?></span>平台客服联系。</li>
	  </ul>
	</div>

	<div style="width:490px; margin:30px auto 0; text-align:center;" id="d1">
		<button class="goto" name="submit" type="submit" onClick="document.getElementById('d1').style.display='none';document.getElementById('d2').style.display=''" /></button>
		<button class="back" name="back" type="button" onclick="back_url()" /></button>
	</div>

	<div style="width:490px; margin:30px auto 0; text-align:center; display:none;" id="d2">
		<button class="goto1" name="back" type="button" onclick="back_url()" /></button>
		<button class="result" onClick="query_url()" name="button" type="button" /></button>
	</div>    
</div>
</form>

<script type="text/javascript"> 
function back_url(){
	try{  
		parent.$.nyroModalRemove(); 
	} catch(err) {
		window.history.back();
	}
	return false; 
}

function query_url(){
	try	{  
		parent.location.href='../orderquery.htm?orderid=<?php echo strlen($orderid)==20 ? substr($orderid,0,16) : $orderid ?>';
	} catch(err){
		window.location.href='../orderquery.htm?orderid=<?php echo strlen($orderid)==20 ? substr($orderid,0,16) : $orderid ?>';
	}
	return false; 
}
</script>

</body>
</html>