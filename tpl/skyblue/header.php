<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?><?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<link href="tpl/skyblue/css/style.css" rel="stylesheet" type="text/css" />
<link href="links/default/css/nyro.css" rel="stylesheet" type="text/css" />
<script src="includes/libs/jquery.min.js" type="text/javascript"></script>
<script src="links/default/js/nyro.js" type="text/javascript"></script>
<script> $(function(){$('#compaints').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 560, height: 420 });}) </script>
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
		  <a class="home" href="./">首页</a><span>|</span>
		  <?php if(isset($_SESSION['login_username'])): ?>
		  <a class="user_reg" href="usr/">商户中心</a><span>|</span>
		  <a class="user_logout" href="usr/login.php?action=logout">安全退出</a><span>|</span>
		  <?php else: ?>
		  <a class="user_login" href="login.htm">商户登录</a><span>|</span>
		  <a class="user_reg" href="register.htm">新商户注册</a><span>|</span>
		  <?php endif; ?>
		  <a class="user_help" href="faq.htm">帮助中心</a>
		</div>
		<div class="clear"></div>
	</div>
	</div>
	<div id="nav">
	<div id="nav_content">
	    <ul>
		    <li><a href="./">首 页</a></li>
			<li><a href="paytype.htm">付款方式</a></li>
			<li><a href="tariff.htm">资费标准</a></li>
			<li><a href="settlement.htm">结算模式</a></li>
			<li><a href="useful.htm">使用流程</a></li>
            <li><a href="myorders.htm">我的订单</a></li>
			<li><a href="links/report.php?action=search" class="nyroModal" id="compaints">投诉查询</a></li>
			<li><a href="contact.htm">联系我们</a></li>
		</ul>
		<div class="nav_search"><a href="orderquery.htm"><img src="tpl/skyblue/images/nav_search.gif" /></a></div>
		<div class="clear"></div>
		</div>
	</div>
