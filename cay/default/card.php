<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>该页面请勿刷新或关闭,否则会导致交易丢失!</title>
<script src="../includes/libs/jquery.min.js" type="text/javascript"></script>
<style>
body{margin:0 auto; padding:0; font-family:"Microsoft YaHei",Verdana,Arial; background:#fff; font-size:12px; color:#333;}
a{color:#59aa15;text-decoration:none;}
a:hover{color:#ff7500;}
ul{list-style:none; margin:0; padding:0;}
#main{clear:both;display:block;margin:auto;overflow:hidden;width:500px;height:auto;}
.bankInfo{margin:15px auto;}
.infotitle{background-color:#0087d1; color:#fff; height:26px; line-height:28px; font-size:14px; font-weight:bold; text-align:center; width:94px;}
.bankInfo dt{line-height:26px; display:block; padding:10px 0 15px 0; margin:auto; border:1px solid #0087d1;}
.bankInfo dt s{text-decoration:none; color:#666;}
.bankInfo dt strong{color:#f00; font-size:14px;}
.dt1{float:left; margin:50px 50px 0;}
.dt2{float:left;}
.goto{background:url(common/pay/goto.png) no-repeat; width:91px; height:30px; border:0; cursor: pointer; margin-right:30px;}
.back{background:url(common/pay/back.png) no-repeat; width:91px; height:30px; border:0; cursor: pointer;}
.goto1{background:url(common/pay/goto1.png) no-repeat; width:91px; height:30px; border:0; cursor: pointer; margin-right:30px;}
.result{background:url(common/pay/result.png) no-repeat; width:91px; height:30px; border:0; cursor: pointer;}
.banktitle{background-color:#ff6b04; color:#fff; height:26px; line-height:28px; font-size:14px; font-weight:bold; text-align:center; width:94px;}
.bankInfogo{background-color:#fff6d6; border:1px solid #ff6b04; margin:auto; padding:10px 0 10px 20px; line-height:20px;}
.bankInfogo li{background:url(common/pay/li.png) no-repeat scroll left center transparent; padding-left:20px; margin:4px 0;}
</style>
</head>
<body>

<div id="main">
	<dl class="bankInfo">
        <span><img id="mimg" src="default/images/ajaxLoader.gif" /></span>
    	<dt>
		<b style="text-align:center;margin-top:20px;font-size:16px;font-weight:bold" id="result">正在支付中,请勿关闭或刷新页面！</b><br/>
		您的订单号：<strong><?php echo strlen($orderid)==20 ? substr($orderid,0,16) : $orderid ?></strong><br/>
        <s>请保存好您的订单号，方便日后查询交易记录。</s><br/>
        <b>支付金额：</b><strong><?php echo $paymoney ?>元</strong><br/>
		<?php if($couponcode): ?>
		<b>优&nbsp;惠&nbsp;券：</b><?php echo $couponcode ?> (优惠金额:<s style="color:red"><?php echo $coupon ?></s>元)<br/>
		<?php endif; ?>
        <b>支付方式：</b><img src="default/images/<?php echo isset($imgurl) ? $imgurl :'myhero.gif' ?>" align="absmiddle" />
        <!--<p class="einfo"><b>商品名称：</b><?php echo isset($goodname) ? $goodname : '' ?><br/>
        <b>购买数量：</b><strong><?php echo $quantity ?></strong></p>--></dt>        
	</dl>

   <div class="banktitle">免责声明</div>
	<div class="bankInfogo">
        <ul>
		<li>本平台仅提供自动发卡服务，并非销售商，不负责商品相关售后问题。</li>
        <li>如产生交易纠纷请与商家自行协商处理，与<span style="font-size:12px"><?php echo $config_sitename ?></span>无关！</li>
		<li>如果您遇到虚假商品或取卡问题，请与<span style="font-size:12px"><?php echo $config_sitename ?></span>客服联系。</li>
        <li>若5分钟内没有响应，点击此处查看<a href="../myorders.htm" target="_blank">【购买记录】</a>查询订单。</li>
        </ul>
  </div>

	<div style="width:420px; margin:15px auto 0; text-align:center;" id="d2">
		<button class="goto1" name="back" type="button" onclick="back_url()" disabled="disabled" /></button>
		<button class="result" onClick="query_url()" name="button" type="button" style="color:red" disabled="disabled" /></button>
	</div> 
</div>


<script type="text/javascript">
var getorderstatus=function(t){
	if(t==0){
		$('#mimg').attr('src','default/images/eimg.png');
		$('#result').html('操作超时，请点击订单查询，查看详情！');
		$('#d2 button').attr('disabled',false);
		alert('操作超时，请点击订单查询，查看详情！');
	} else {
		t=t-1;
		var orderid='<?php echo strlen($orderid)==20 ? substr($orderid,0,16) : $orderid ?>';	
		$.post('ajax.php',{action:'getorderstatus',orderid:orderid,t:new Date().getTime()},function(data){
			if(data=='1'){
				$('#mimg').attr('src','default/images/success.gif');
				$('#d2 button').attr('disabled',false);
				$('#result').html('<strong style="color:green">支付成功，请提取卡密码！</strong>');
				$('[name=button]').text('提取卡密');
				alert('支付成功，请提取卡密码！');
				<?php if($is_getgood): ?>
				parent.location.href='../orderquery.htm?orderid='+orderid;
				<?php endif; ?>
			} else if(data=='2'){
				$('#mimg').attr('src','default/images/success.gif');
				$('#d2 button').attr('disabled',false);
				$('#result').html('<strong style="color:green">部分支付成功，请复制您的订单号进行继续付款操作！</strong>');
				alert('部分支付成功，请复制您的订单号进行继续付款操作！');
				parent.location.href='../orderquery.htm?orderid='+orderid;
			} else {
				if(t==0){
					$('#mimg').attr('src','default/images/eimg.png');
					$('#d2 button').attr('disabled',false);
					$('#result').html('<strong style="color:red">支付失败，请点击订单查询，查看详情！</strong>');
					alert('支付失败，请点击订单查询，查看详情！');
					return false;
				}
				setTimeout("getorderstatus("+t+")",10000);
			}
		})
	}
}

$(function(){
    setTimeout("getorderstatus(20)",10000);
})

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
		parent.location.href='../orderquery.htm?orderid=<?php echo $orderid ?>';
	} catch(err){
		window.location.href='../orderquery.htm?orderid=<?php echo $orderid ?>';
	}
	return false; 
}
</script>
</body>
</html>