<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<meta itemprop="name" content="<?php echo isset($title) && $title!='' ? $title.' - ' : '' ?> www.a8tg.com"/>
<meta itemprop="image" content="http://<?php echo $_SERVER['SERVER_NAME'];?>/tpl/yc88net/images/logo.png" />
    <link href="tpl/yc88net/css/style.css" rel="stylesheet" />
    <script src="tpl/yc88net/js/jquery.min.js"></script>
    <!--[if lte IE 9]>
      <script src="tpl/yc88net/js/html5.min.js"></script>
      <script src="tpl/yc88net/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="header">
        <div class="header_nav" style="background: none;">
            <div class="header-content">
                <div class="logo">
                    <img src="tpl/yc88net/picture/logo.png">
                </div>
                <ul>
                    <li>
                        <a href="/">网站首页</a>
                    </li>
                    <li>
                        <a href="/about.htm">关于我们</a>
                    </li>
                    <li>
                        <a href="/contact.htm">联系我们</a>
                    </li>
                    <li>
                        <a href="/faq.htm">帮助中心</a>
                    </li>
					 <li>
                        <a href="/qiye.htm">企业资质</a>
                  </li>
					 <li>
                </ul>
                <div class="login">
                    <ul>
                        <li>
                            <a id="login_btn" href="/login.htm">登录</a>
                        </li>
                        <li>
                            <a id="register_btn" href="/sendcode.htm">注册</a>
                        </li>
                        <li id="charge">
                            <a href="/orderquery.htm">交易查询</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
