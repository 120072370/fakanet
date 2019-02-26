<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo $title;?></title>
<title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?>
<?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<link href="css/pub.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='pub_images/jquery.js'></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
<!--
.STYLE2 {color: #FFFFFF}
-->
</style>
</head>
<body>
<div id="wrapper" style="position:relative;width:100%;height:54px;background-image:url('pub_images/topline.png')">
    <div id="header" style="position:relative;width:1200px;min-width:1200px;height:54px;margin:0 auto;background-image:url('pub_images/topline.png');">
	    <div id="logo" style="position:relative;float:left;height:54px;width:103px;background-image:url('pub_images/logo.png');"></div>
	    <div id="menu">
	        <ul style="padding:0;margin:0;">
		        <li style="width:65px;background-image:url("pub_images/index_b.png");"><a href="./">首 页</a></li>
		        <li style="width:79px;"><a href="about.htm">关于我们</a></li>
		        <li style="width:79px;"><a href="contact.htm">联系我们</a></li>
				<li style="width:79px;"><a href="news.htm">新闻资讯</a></li>
		        <li style="width:79px;"><a href="faq.htm">帮助中心</a></li>
		        <li style="width:79px;"><a href="qiye.htm">企业资质</a></li>
				 <li style="width:79px;"><wb:share-button appkey="1408865487" addition="number" type="button" ralateUid="2114467064" default_text="自动发卡平台,发卡平台,219自动发卡平台,219发卡平台，卡密寄售平台" pic="http%3A%2F%2Fwww.219ka.com%2Fimages%2Flogo.png"></wb:share-button></li>
		    </ul>
	    </div>
		
		<div style="position:relative;width:300px;height:54px;line-height:54px;float:right;">
		<?php if(isset($_SESSION['login_username'])): ?>
		<b style="color:#ffffff">您好<b style="color:#6da004;"> <a href="usr/" class="STYLE2"><?php echo $_SESSION['login_username'] ?>进入</a>  
		 <?php else: ?>
		<dl style="float:left;color:#ffffff;width:60px;text-align:center;"><a href="login.htm" style="color:#ffffff;" >登陆</a></dl>
		<dl style="float:left;color:#ffffff;width:60px;text-align:center;margin-right:30px;"><a href="sendcode.htm" style="color:#ffffff;">注册</a></dl>
		<?php endif; ?>
		
		<dl style="float:left;height:30px;width:100px;line-height:30px;text-align:center;color:#000000;border:1px solid #dfdfdf;margin-top:11px;color:#ffffff;"><a href="orderquery.htm" style="color:#ffffff;" target="_blank">订单查询</a></dl>
		
	  </div>
    </div>
</div>