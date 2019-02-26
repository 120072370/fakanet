<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?><?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<link href="tpl/orange/css/style.css" rel="stylesheet" type="text/css" />
<link href="links/default/css/nyro.css" rel="stylesheet" type="text/css" />
<script src="includes/libs/jquery.min.js" type="text/javascript"></script>
<script src="links/default/js/nyro.js" type="text/javascript"></script>
<script> $(function(){$('#compaints').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 520, height: 420 });}) </script>
<!--[if lt IE 9]>
<style>
a{behavior:url(htc/a.htc)}
</style>
<![endif]-->
<!--[if IE 6]>
<style>
body{behavior:url(htc/li.htc)}
</style>
<![endif]-->
</head>

<body>
<div id="wrapper">
    <div id="header">
	<div id="header_content">
	    <div id="logo"><a href="./"><img src="/images/logo.gif" /></a></div>
		<div id="topinfo">
		  <?php if(isset($_SESSION['login_username'])): ?>
		  <a class="user_reg" href="usr/" style="color:#ff6600;">商户中心</a><span>|</span>
		  <a class="user_logout" href="usr/login.php?action=logout">安全退出</a><span>|</span>
		  <?php else: ?>
		  <a class="user_reg" href="register.htm">新商户注册</a><span>|</span>
		  <a class="user_login" href="login.htm">商户登录</a><span>|</span>
		  <?php endif; ?>
		  <a class="my_order" href="myorders.htm">我的订单</a><span>|</span>
		  <a class="user_help" href="faq.htm">帮助中心</a>
		</div>
		<div class="clear"></div>
 	<div id="nav">
		  <a href="./" class="index"></a>
		  <a href="paytype.htm" class="paytype"></a>
		  <a href="tariff.htm" class="tariff"></a>
		  <a href="settlement.htm" class="settlement"></a>
	      <a href="useful.htm" class="useful"></a>
		  <a href="contact.htm" class="contact"></a>
		  <a href="orderquery.htm" class="orderquery"></a>
		  <p style="clear:left"></p>
		<div class="clear"></div>
	</div>
	</div>
	</div>