<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?>
<?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<meta itemprop="name" content="<?php echo isset($title) && $title!='' ? $title.' - ' : '' ?> www.a8tg.com"/>
<meta itemprop="image" content="http://<?php echo $_SERVER['SERVER_NAME'];?>/tpl/219kacom/images/logo.png" />
<meta name="description" itemprop="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<meta name="author" content="www.219ka.com" />
<meta name="revisit-after" content="1 days" />
<meta name="rating" content="general" />
<link rel="shortcut icon" href="/favicon.ico" />
<link href="tpl/219kacom/css/public.css" rel="stylesheet">
<link href="tpl/219kacom/css/yekepay.css" rel="stylesheet" type="text/css"/>
<link href="tpl/219kacom/css/style.css" rel="stylesheet" type="text/css"/>
<link href="tpl/219kacom/css/nyro.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="tpl/219kacom/js/jquery.min.js"></script>
<script type="text/javascript" src="tpl/219kacom/js/yekepay.js"></script>
<script type="text/javascript" src="tpl/219kacom/js/common.js"></script>
<script type="text/javascript" src="tpl/219kacom/js/nyro.js"></script>
<script type="text/javascript">
  $(function(){
      $("#J_open-details td").hover(function(){
        $(this).addClass("hover")
      },function(){
        $(this).removeClass("hover")
      })
  });

    </script>
</head>

<div class="top_menu">
<div class="w">
<span class="top_a_qq">欢迎您来到：<?php echo $_SERVER['SERVER_NAME'];?> (<?php echo $this->config['sitename'] ?>) 我们竭力提供最好的服务</span>
<span class="top_a_service">
<span class="floatl">客服电话:<?php echo $this->config['tel'] ?></span>
</span> </div>
</div>
<div class="header" style="border: 1px solid #e2e2e2;line-height: 75px; ">
    <div class="nav">
        <div class="navlogo">
            <a href="index.htm">
                <img src="tpl/219kacom/images/logo.png"  alt="<?php echo isset($title) && $title!='' ? $title.' - ' : '' ?>">
            </a>
        </div>
        <div class="navbar-collapse " id="header">

<div class="navbar-login" >
        <a href="./" target="_self" class="btn btn-primary none">首页</a>
		<span style="color:#b3b3b3; display:inline-block; ">|</span>
	    <a href="useful.htm" target="_self" class="btn btn-primary none">API接口</a>
		<span style="color:#b3b3b3; display:inline-block; ">|</span>
	    <a href="orderquery.htm" target="_self" class="btn btn-primary non">订单查询  </a>
        <span style="color:#b3b3b3; display:inline-block; ">|</span>
		<a href="contact.htm" target="_self" class="btn btn-primary none"> 联系我们   </a>
		<span style="color:#b3b3b3; display:inline-block; ">|</span>
        <a href="about.htm" target="_self" class="btn btn-primary none">关于我们</a>
		<span style="color:#b3b3b3; display:inline-block; ">|</span>				
        <a href="faq.htm" target="_self" class="btn btn-primary none">帮助中心</a>
		<span style="color:#b3b3b3; display:inline-block; ">|</span>
        <a href="/links/report.php?action=search" class="nyroModal" id="compaints" target="_self">
	
    </a>
</div>
    <!--头部结束-->        
<div style="clear:both"></div>

        </div>
    </div>
</div>
