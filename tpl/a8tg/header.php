<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?>
<?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<link rel="stylesheet" type="text/css" href="tpl/a8tg/Css/index.css">
<link rel="stylesheet" type="text/css" href="tpl/a8tg/Css/global.css">
<link rel="stylesheet" type="text/css" href="tpl/a8tg/Css/Public.css">
<link rel="stylesheet" type="text/css" href="tpl/a8tg/Css/index_login.css">
<link rel="stylesheet" type="text/css" href="tpl/a8tg/Css/style.css">
<script src="tpl/a8tg/Js/jquery.js" type="text/javascript"></script>
<script src="tpl/a8tg/Js/jquery1.5.js" type="text/javascript"></script>
<script type="text/javascript" src="tpl/a8tg/Js/kefu.js"></script>
<script src="tpl/a8tg/Js/input.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="tpl/a8tg/Css/stylee.css">
</head>
<body>
<table width="0" border="0">
  <tr>
    <td>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_topb">
 
    <td height="172" valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">

 
</table>


<div class="top">
    <div class="width980_top">
        <div class="welcome">
		
           <span style="font-size:13px;color:#666666;"> 欢迎来到<?php echo $this->config['sitename'] ?>&nbsp;&nbsp;<?php if(isset($_SESSION['login_username'])): ?>
            <a class="user_reg" href="usr/" style="color:red"><strong><?php echo $_SESSION['login_username'] ?> 商户中心</a><span>|</span> <a class="user_logout" href="usr/login.php?action=logout">安全退出</a><span>|</span>
            <?php else: ?>
            <a class="user_login" href="login.htm">商户登录</a><span>|</span> <a class="user_reg" href="register.htm">新商户注册</a><span>|</span>
            <?php endif; ?>
            <a class="user_help" href="faq.htm">帮助中心</a></span></div>
        <div id="div_blog" class="right obtainTop top_index">
        <div class="my_rice nav_text_3">
                <a href="orderquery.htm" rel="nofollow">投诉建议</a></div>
        </div>
        <span class="right_top3">&nbsp;|&nbsp;</span>
        <div id="div_Service" class="right obtainTop myService">
            <div class="my_rice nav_text_4">
                <a href="contact.htm" rel="nofollow">商户注册</a></div>
        </div>
        <span class="right_top3">|&nbsp;</span>
        <div id="div_seller" class="right obtainTop top_index">
            <div class="my_rice nav_text_2">
                <a href="login.htm" rel="nofollow">查询卡密</a></div>
        </div>
        </span><span class="right_top3">&nbsp;|</span> 
		<span class="right_top2"><a href="usr" rel="nofollow">个人中心</a></span></div>
</div>

    <!--  -->
    <div class="center logo">
        <div class="left">
            <a href="/" rel="nofollow">
                <img src="/images/logo.gif" alt="自动发卡平台源码尽在扎兰屯市爱发网络科技有限公司购买、www.a8tg.com" border="0"></a></div>   
                <div class="right search">
            <div id="menu_con">
                <div style="display: block" id="qhcon0">
                    <div style="height: 30px">
                        <input name="js_search_q_input" type="text" id="js_search_q_input" style="background: transparent; border: 1px solid #ffffff;
                            height: 20px; width: 309px;" onkeydown="enterSearch(event);" value="请输入订单号" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}">
                        <button id="search_bnt" type="button" onclick="$('#search').click()">
                        </button>
                        <input type="submit" name="search" value="" onclick="return Search();" id="search" style="display: none;">
                    </div>
                </div>
                <div style="display: none" id="qhcon1">
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
        <!--<img src="/Images/login/by.png" width="274" height="25" />-->

    </div>
    <div class="Navigation">
        <div class="center Part">
            <ul>
                <li><a style="background: #43b6d3; color: #fff" rel="nofollow" href="/">网站首页</a>  
				 <a href="about.htm" rel="nofollow">关于我们</a>
                 <a href="contact.htm" rel="nofollow">联系我们</a>
				 <a rel="nofollow" href="faq.htm">帮助中心</a>
                 <a rel="nofollow" href="qiye.htm">企业资质</a>
				<!-- <a href="http://www.a8tg.com" target="_blank">爱发官网</a></li>-->
                <li class="Part_goumai" onclick="top.location.href='orderquery.htm'" rel="nofollow"></li>
            </ul>
        </div>
    </div>
    <div id="preloader">
    </div>     
    <!--头部结束-->        
        