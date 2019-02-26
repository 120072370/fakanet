<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?><?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<link rel="stylesheet" href="tpl/greeny/common/css/style.css"  type="text/css"  media="screen" />
<link href="lin/default/css/nyro.css" rel="stylesheet" type="text/css" />
<link href="includes/libs/boxy.0.1.4/stylesheets/boxy.css" rel="stylesheet" type="text/css" />
<script src="includes/libs/jquery.min.js" type="text/javascript"></script> 
<script src="tpl/greeny/common/js/slides.min.jquery.js" type="text/javascript"></script>
<script src="tpl/greeny/common/js/common.js" type="text/javascript"></script>
<script src="tpl/greeny/common/js/jquery.float-min.js" type="text/javascript"></script>
<script src="includes/libs/boxy.0.1.4/javascripts/jquery.boxy.js" type="text/javascript"></script>
<script src="lin/default/js/nyro.js" type="text/javascript"></script>
<script> $(function(){$('#compaints').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 520, height: 420 });}) </script>
<!--[if lt IE 9]>
<style>
a{behavior:url(htc/a.htc)}
</style>
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="tpl/greeny/common/js/iepng.js"></script><script type=text/javascript> EvPNG.fix('div,input, img,h4,li,a,span');</script>
<style>
a{behavior:url(htc/a.htc)}
body{behavior:url(htc/li.htc)}
</style>
<![endif]-->
</head>

<body>
<div id="wrap">
<?php
switch($this->mod){
    case 'tariff': $current='cashrate'; break;
	case 'contact': $current='jieru'; break;
	case 'orderquery': $current='contact'; break;
	default: $current='index';
}
?>
<div id="header" class="b_clear">
  	<div class="b_clear main">
	  <div class="login-top">
	  <?php if(isset($_SESSION['login_username'])): ?><span style="color:#ff8827;font-weight:bold;">您好！</span><b style="color:#6da004;"> <?php echo $_SESSION['login_username'] ?> </b><a href="usr/">，进入商户管理</a> │ <a href="usr/login.php?action=logout" onclick="return confirm('您确定要退出吗？')">退出登录</a>
	  <?php endif; ?><a href="http://t.qq.com/" rel="target"><img src="tpl/greeny/common/images/share_qq.gif" align="absbottom" alt="收听腾讯微博" /></a>
      <a href="http://weibo.com/" rel="target"><img src="tpl/greeny/common/images/share_sina.gif" align="absbottom" alt="收听新浪微博" /></a>
      </div>
	  <div class="b_l logo"><a href="./"><img src="tpl/greeny/common/images/logo.png" /></a></div>
	  <div class="b_r menu <?php echo $current ?>"><a href="./" class="menu-01">首页│</a><a href="tariff.htm" class="menu-02">资费标准│</a><a href="contact.htm" class="menu-03">联系我们│</a><a href="orderquery.htm" class="menu-04">订单查询</a></div>
	</div>
    <div class="main minav">
	<a href="paytype.htm">付款方式</a> │ <a href="settlement.htm">结算模式</a> │ <a href="useful.htm">使用流程</a> │ <a href="faq.htm">帮助中心</a> │ <a href="myorders.htm">我的订单</a> │ <a href="../lin/report.php?action=search" class="nyroModal" id="compaints">投诉查询</a>
	</div>
	<div class="b_clear main topbox">
	  <div class="b_l note" style="color:#CC6600">

       <div id="notice_list">
					<?php
					$news=$this->cache->get('news');
					$i=0;
					if($news): 
					foreach($news as $key=>$val):
					if($i>=5) break;
					if($val['classid']==4 && $val['is_display_home']):
					?>
					<!--<a href="javascript:void(0)" onclick="Boxy.load('view.htm?id=<?php echo $val['id'] ?>&t=1',{title:'<?php echo $val['title'] ?>'})" style="color:#<?php echo $val['is_color'] ?><?php echo $val['is_bold']!='' ? ';font-weight:bold' : '' ?>"><?php echo $val['title'] ?></a>	-->
					<a href="view.htm?id=<?php echo $val['id'] ?>" style="color:#<?php echo $val['is_color'] ?><?php echo $val['is_bold']!='' ? ';font-weight:bold' : '' ?>"><?php echo $val['title'] ?></a>
					<?php
					$i++;
					endif;
					endforeach;
					endif;
					?>
				</div>

			<script>				
				$(function(){
					var cn=$('#notice_list a').index();
				    if(cn>=0){
					    $('#notice_list a').first().show();
						//$('#notice_link a').first().addClass('current');
						var L=$('#notice_list a').last();
						var F=$('#notice_list a').first();
						setInterval(function(){
						    if(L.is(':visible')){
							    F.fadeIn();L.removeClass('current').hide();
								//$('#notice_link a').removeClass('current');
								//$('#notice_link a').first().addClass('current');
							} else {
							    //$('#notice_link a.current').removeClass('current').next().addClass('current');
								$('#notice_list a:visible').addClass('current');
								$('#notice_list a.current').next().fadeIn();
								$('#notice_list a.current').hide().removeClass('current');
							}
						},3000);
					}

					$('#notice_link a').each(function(i){
					    $(this).click(function(){
						    $('#notice_link a').removeClass('current');
							$(this).addClass('current');
							$('#notice_list a').hide();
							$('#notice_list a').eq(i).fadeIn();
						})
					})
				})
             </script>

      </div>
	  <div class="b_r"><div class="searchbox">
	  <form action="orderquery.htm" method="get" name="form1"><input type="text" name="orderid" id="ddh" class="input" value="输入订单号" /><input type="submit" value="" class="submit" title="提交订单查询" /></form>
	  </div></div>
	</div>
  </div><!--/header end-->

