<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?>
<?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<link href="tpl/yujia/css/main.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="tpl/yujia/css/style.css">
<link href="tpl/yujia/css/lanrenzhijia.css" rel="stylesheet" type="text/css" />
<script src="tpl/yujia/js/jq.js" type="text/javascript"></script>
<script src="tpl/yujia/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="tpl/yujia/js/common.js" type="text/javascript"></script>
<script src="tpl/yujia/js/default.js" type="text/javascript"></script>
</head>
<body>
     <!--头部开始-->

<div id="top">
		<div class="w">
			<div class="fl"><a href=""><img src="/images/logo.png"/></a></div>
			<div class="fr">
			  <ul class="nav f16 tc">
                <li ><a href="/">网站首页</a></li>
			    <li ><a href="/orderquery.htm">订单查询</span></a></li>
			    <li><a href="/about.htm">关于我们</a></li>
			    <li><a href="/contact.htm">联系我们</a></li>
		      </ul>
			</div>
		</div>
	</div>
    <!--头部结束-->        
        <div class="main-im">
	<div id="open_im" class="open-im">&nbsp;</div>  
	<div class="im_main" id="im_main">
		<div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭">&nbsp;</a></div>
		<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes" target="_blank" class="im-qq qq-a" title="在线QQ客服">
			<div class="qq-container"></div>
			<div class="qq-hover-c"><img class="img-qq" src="http://demo.lanrenzhijia.com/2015/service0119/images/qq.png"></div>
			<span> QQ在线咨询</span>
		</a>
		<div class="im-tel">
			<div>售前QQ在线</div>
			<div class="tel-num"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $this->config['qq'] ?>&amp;site=qq&amp;menu=yes"><?php echo $this->config['qq'] ?></a></div>
			<div>售后咨询热线</div>
			<div class="tel-num"><?php echo $this->config['tel'] ?></div>
		</div>
		<div class="im-footer" style="position:relative">
			<div class="weixing-container">
				<div class="weixing-show">
					<div class="weixing-txt">微信扫一扫<br>微信扫一扫</div>
					<img class="weixing-ma" src="http://demo.lanrenzhijia.com/2015/service0119/images/weixing-ma.jpg">
					<div class="weixing-sanjiao"></div>
					<div class="weixing-sanjiao-big"></div>
				</div>
			</div>
			<div class="go-top"><a href="javascript:;" title="返回顶部"></a> </div>
			<div style="clear:both"></div>
		</div>
	</div>
</div>

<script>
$(function(){
	$('#close_im').bind('click',function(){
		$('#main-im').css("height","0");
		$('#im_main').hide();
		$('#open_im').show();
	});
	$('#open_im').bind('click',function(e){
		$('#main-im').css("height","272");
		$('#im_main').show();
		$(this).hide();
	});
	$('.go-top').bind('click',function(){
		$(window).scrollTop(0);
	});
	$(".weixing-container").bind('mouseenter',function(){
		$('.weixing-show').show();
	})
	$(".weixing-container").bind('mouseleave',function(){        
		$('.weixing-show').hide();
	});
});
</script>