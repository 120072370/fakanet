<?php if(!defined('WY_ROOT')) exit; ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>系统管理中心</title>
<link href="views/css/style.css" rel="stylesheet" type="text/css" />
<script src="../includes/libs/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="views/js/common.js"></script>
<script src="../includes/libs/plugin-cookie.js" type="text/javascript"></script>
<script type="text/javascript" src="../includes/libs/calendar.js"></script>
<script src="../includes/libs/boxy.0.1.4/javascripts/jquery.boxy.js" type="text/javascript"></script>
<link href="../includes/libs/boxy.0.1.4/stylesheets/boxy.css" rel="stylesheet" type="text/css" />
<?php if($message): ?>
<!--<bgsound src="../usr/default/images/dingling.mp3" loop="-1">-->
<?php endif ?>
</head>

<body>
<div id="retMsg" class="actived"></div>
<div id="wrapper">
    <div id="header">
	    <div id="h_left"><h3><a href="./">系统管理中心</a></h3></div>
		<div id="h_right"><img src="views/images/ico_user.gif" align="absmiddle"> <strong><?php echo $_SESSION['login_adminname'] ?></strong><span> 已登陆 |&nbsp;
		<img src="views/images/ico_mail.gif" align="absmiddle" /> <a href="message.php">站内信息<span>(<span id="message"><?php echo $message>0 ? '<span style="color:red">'.$message.'</span>' : $message ?></span>)</span></a> <span>|</span> 
		<a href="report.php">投诉举报(<?php echo $report_unread>0 ? '<span style="color:red">'.$report_unread.'</span>' : $report_unread ?>,<?php echo $report_unhandle>0 ? '<span style="color:red">'.$report_unhandle.'</span>' : $report_unhandle ?>)</a> <span>|</span> 
		<a href="set.php">系统设置</a> <span>|</span>
		<a href="./">后台首页</a> <span>|</span> 
		<a href="/" target="_blank">前台首页</a> <span>|</span> 
		<?php if($_SESSION['login_adminutype']==1): ?>
		<a href="javascript:void(0)" onClick="RefreshCache()">刷新缓存</a> <span>|</span> 
		<?php endif; ?>
		<a href="login.php?action=logout">安全退出</a></div>
		<div class="clear"></div>
	</div>

	<div id="nav">
	    <div id="nav_left">
	        <ul class="nav_left_menu">
			    <div>商户管理</div>
			    <li <?php if(stripos(_S('PHP_SELF'),'users.php'))  echo 'class="current"'?>><a href="users.php">商户信息</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'tg_users.php'))  echo 'class="current"'?>><a href="tg_users.php">推广会员</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'userInfo.php'))  echo 'class="current"'?>><a href="userinfo.php">接入信息</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'userLogs.php'))  echo 'class="current"'?>><a href="userLogs.php">登陆日志</a></li>
			</ul>

	        <div class="line"></div>
			<ul class="nav_left_menu">
			    <div>订单管理</div>
			    <li <?php if(stripos(_S('PHP_SELF'),'orders.php'))  echo 'class="current"'?>><a href="orders.php">订单查询</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'ordersForUser.php'))  echo 'class="current"'?>><a href="ordersForUser.php">商户分析</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'ordersForChannel.php'))  echo 'class="current"'?>><a href="ordersForChannel.php">通道分析</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'ordersForHour.php'))  echo 'class="current"'?>><a href="ordersForHour.php"> 2 4 小时分析</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'tg_orders.php'))  echo 'class="current"'?>><a href="tg_orders.php">推广商品订单</a></li>
				 <li <?php if(stripos(_S('PHP_SELF'),'goods.php') && !stripos(_S('PHP_SELF'),'tg_goods.php'))  echo 'class="current"'?>><a href="goods.php">平台商品管理</a></li>
				 <li <?php if(stripos(_S('PHP_SELF'),'tg_goods.php'))  echo 'class="current"'?>><a href="tg_goods.php">商品推广审核</a></li>
			</ul>

	        <div class="line"></div>
	        <ul class="nav_left_menu">
			    <div>结算管理</div>
			    <li <?php if(stripos(_S('PHP_SELF'),'userMoney.php'))  echo 'class="current"'?>><a href="usermoney.php">商户结算</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'payments.php'))  echo 'class="current"'?>><a href="payments.php">结算记录</a></li>
			</ul>

	        <div class="line"></div>
	        <ul class="nav_left_menu">
			    <div>通道管理</div>
			    <li <?php if(stripos(_S('PHP_SELF'),'accessProvider.php'))  echo 'class="current"'?>><a href="accessprovider.php">接入信息</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'channels.php'))  echo 'class="current"'?>><a href="channels.php">通道列表</a></li>
			</ul>

	        <div class="line"></div>
	        <ul class="nav_left_menu">
			    <div>文章管理</div>
			    <li <?php if(stripos(_S('PHP_SELF'),'newsClass.php'))  echo 'class="current"'?>><a href="newsClass.php">文章分类</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'news.php'))  echo 'class="current"'?>><a href="news.php">文章列表</a></li>
			</ul>

	        <div class="line"></div>
	        <ul class="nav_left_menu">
			    <div>管理员管理</div>
			    <li <?php if(stripos(_S('PHP_SELF'),'adminPwd.php'))  echo 'class="current"'?>><a href="adminPwd.php">修改密码</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'adminList.php') && $action!='adminlogs')  echo 'class="current"'?>><a href="adminList.php">管理员列表</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'adminList.php') && $action=='adminlogs')  echo 'class="current"'?>><a href="adminList.php?action=adminlogs">登陆日志</a></li>
			</ul>
			
			<!--<div class="line"></div>
	        <ul class="nav_left_menu">
			    <div>分销推广</div>
			    <li <?php if(stripos(_S('PHP_SELF'),'tg_users.php'))  echo 'class="current"'?>><a href="tg_users.php">推广会员</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'tg_goods.php'))  echo 'class="current"'?>><a href="tg_goods.php">商品推广</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'tg_orders.php'))  echo 'class="current"'?>><a href="tg_orders.php">推广订单</a></li>
				<!--<li <?php if(stripos(_S('PHP_SELF'),'adminList.php') && $action=='adminlogs')  echo 'class="current"'?>><a href="adminList.php?action=adminlogs">推广会员结算</a></li>
				<li <?php if(stripos(_S('PHP_SELF'),'adminList.php') && $action=='adminlogs')  echo 'class="current"'?>><a href="adminList.php?action=adminlogs">推广会员统计</a></li>-->
			</ul>
	    </div>
		<div id="nav_right">
             <div id="nav_right_main">