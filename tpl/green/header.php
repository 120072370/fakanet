<?php if (!defined('WY_ROOT')) exit; ?>

<!doctype html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo isset($title) && $title != '' ? $title . ' ' : '' ?><?php echo $this->config['sitetitle'] != '' ? ' - ' . $this->config['sitetitle'] : '' ?></title>
	<meta name="description" content="<?php echo $this->config['description'] ?>" />
	<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
	<script src="/new2/jquery-1.8.3.min.js"></script>
	<script src="/new2/jquery.fullPage.min.js"></script>
	<script src="/new2/wow.min.js"></script>
	<link href="/new2/style.css" rel="stylesheet" type="text/css">
	<link href="/new2/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="/new2/animate.min.css" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
	
	<style>
	a{behavior:url(htc/a.htc)}
	</style>
	<![endif]-->
	<!--[if IE 6]>
	<script type="text/javascript" src="tpl/green/common/js/iepng.js"></script><script type=text/javascript> EvPNG.fix('div,input, img,h4,li,a,span');</script>
	<style>
	a{behavior:url(htc/a.htc)}
	body{behavior:url(htc/li.htc)}
	</style>
	<![endif]-->
    </head>

    <body>

	<div id="menu_bg" data-wow-duration="1.6s">
	    <div id="container">
		<a href="/"><div class="logo"></div></a>
		<a href="/orderquery.htm" class="cx_btn"><i class="fa fa-calendar"></i> <b>订单查询</b></a>
		<div class="header-userInfo">
		    <a href="/register.htm" class="login_btn"><i class="fa fa-user-circle-o"></i> <b>商户注册</b></a>
                    <ul id="menu">
			<li><a href="/index.htm">首页</a></li>
			<li><a href="/paytype.htm">企业资质</a></li>
			<li><a href="/useful.htm">APP下载</a></li>
			<!--<li><a href="/about.htm">关于我们</a></li>-->
			<li><a href="/faq.htm">帮助中心</a></li>
			<li><a href="/contact.htm">联系我们</a></li>
		    </ul>
		</div>
	    </div>
	</div>


<div class="pf">
    <a href="#page1"><div class="li0"><i class="fa fa-arrow-up"></i></div></a>
    <div class="li1"><i class="fa fa-phone"></i> <b><?php echo $this->config['tel'] ?></b></div>
    <div class="li1"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes" rel="nofollow"><i class="fa fa-qq"></i> <b><?php echo $this->config['qq'] ?></b></a></div>
    <div class="li2"><i class="fa fa-qrcode"></i></div>
</div>


