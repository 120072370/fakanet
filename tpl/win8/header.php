<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?><?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />


<link rel="stylesheet" type="text/css" href="/tpl/win8/common/css/base.css" />
<link rel="stylesheet" type="text/css" href="/tpl/win8/common/css/homeindex.css" />
<link rel="stylesheet" type="text/css" href="/tpl/win8/common/css/login-box.css" />
<link rel="stylesheet" type="text/css" href="/tpl/win8/common/css/1.css" />
<script src="includes/libs/jquery.min.js" type="text/javascript"></script> 
<script src="/tpl/win8/common/js/common.js" type="text/javascript"></script>




<script>


<script type="text/javascript">
$(document).ready(function() {
		//if(navigator.appName == "Microsoft Internet Explorer")
		if($.browser.msie && parseInt($.browser.version) <= 7)
{
					$('#IEAlert').show();
				}
	});

</script>
</head>
<body>
<div style="margin:0px 0px 2px; width:100%; background:#D4BFFF; height:30px; display:none;color:red;" id="IEAlert" />
<h1 style="font-size:14px;font-weight:bold;text-align:center;margin-top:5px;" />为了更好的体验浏览效果,请将您的浏览器升级到IE8或以上的版本</h1>
</div>
	<div style="display:none" id="weibo_share"><!--百度分享预留-->
		<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" >
		<a href= "#" target="_blank"></a>
		</div>
	</div><!--百度分享预留-->	
<div class="top-bar">
	<div class="w-980 clearfix">
				<ul class="top-menu fr clearfix">
				<?php if(isset($_SESSION['login_username'])): ?>
					<li><a href="usr/" />进入商户管理</a> |&nbsp;</li>
					<li><a href="usr/login.php?action=logout" />退出登录</a> |&nbsp;</li>
				<?php else: ?>
					<li><a href="index.htm" />登录</a> |&nbsp;</li>
					<li><a title="注册" href="../register.htm">注册</a> |&nbsp;</li>
				<?php endif; ?>
			<li><a title="帮助中心" href="../contact.htm">客服中心</a> |&nbsp;</li>
			<li>24小时服务热线：<strong><?php echo $this->config['tel'] ?></strong></li>
		</ul>
	</div>
</div>
<div class="header">
	<div class="w-980 clearfix">
		<div class="logo pr f1">
			
			<a href="./"><img src="/images/logo.gif" border="0" style="margin-top:5px;"/></a></div>
		<a class="ent fr" href="myorders.htm" /></a>
		
	</div>
</div>

	
</div>
<div class="nav">
  <div class="nav_con">
    <ul class="nav_list">
      <li><a class="cur" href="./" target="_parent">首 页</a></li>
      <li><a href="tariff.htm" target="_parent">资费比例</a></li>
      <li><a  href="paytype.htm" target="_parent">付款方式</a></li>
      <li><a  href="contact.htm" target="_parent">联系我们</a></li>
      <li><a  href="orderquery.htm" target="_parent">订单查询</a></li>
    </ul>
    <a href="contact.htm"><img src="/tpl/win8/common/images/rexian.jpg" border="0" /></a> </div>
</div>
