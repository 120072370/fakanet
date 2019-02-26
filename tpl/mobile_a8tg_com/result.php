<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>支付结果</title>
<style>
body {margin:20px auto; padding:0; text-align:center; font-family:"Microsoft YaHei",Verdana,Arial; background:#fff; font-size:12px; color:#000; line-height:22px;}
#main1 {CLEAR: both; DISPLAY: block;  MARGIN: 0px auto; OVERFLOW: hidden; WIDTH: 500px; PADDING-TOP: 9px; HEIGHT: auto;border:1px solid #ccc;}
.cuowuDl{ MARGIN: 20px auto; text-align:left; CLEAR: both;  width:420px; }
.cuowuDl dt{width:100px; float:left;  } 
.cuowuDl span{ width:100px; margin-top:20px; float:left; }

.cuowuDl dt{width:260px; float:left; line-height:23px; display:block;}
.cuowuDl dt s{ text-decoration:none; color:#666;}
.cuowuDl dt strong{color:#f00; font-size:18px;}
.cuowuDl dd { clear:both;}
</style>
</head>
<body>
<div id="main1">
	<dl class="cuowuDl">
    <span><img src="tpl/skyblue/images/success.gif" /></span>
    	<dt>您的订单号:<strong><?php echo $orderid ?></strong><br/>
        <s>请保存好您的订单号，方便日后查询交易记录。</s><br/>
        <b>支付金额:</b><strong><?php echo $realmoney ?>元</strong><br/>
		<b>支付方式:</b><?php echo $channelname ?><br/></dt>
        <dd><button style="margin:10px auto; width:190px; color:#fff; background:url(tpl/skyblue/images/button_bg.jpg) no-repeat; height:33px; border:0;cursor:pointer; font-weight:bold; text-align:center;" type="button" onclick="window.location.href='orderquery.htm?orderid=<?php echo $orderid ?>'" name="tiqu" id="tiqu">立即查看支付结果</button>
        </dd>       
    </dl>
</div>
</body>
</html>
