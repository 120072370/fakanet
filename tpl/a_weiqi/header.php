<?php if(!defined('WY_ROOT')) exit; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <link href="tpl/weiqi/content/webcss/global.css" rel="stylesheet" type="text/css">
    <link href="tpl/weiqi/content/webcss/layout.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="tpl/weiqi/content/webjs/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="tpl/weiqi/content/webjs/layout.js"></script>
    <meta name="baidu-site-verification" content="eae3TWlfRE" />
    <title><?php echo $title ?></title>
    <meta name="title" content="<?php echo $title ?>" />
    <meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
    <meta name="description" content="<?php echo $this->config['description']!='' ? $this->config['description'] : '' ?>" />
    <link rel="Shortcut Icon" href="/favicon.ico" />
</head>
<body>
    <div class="page_init">
        <!--{头部-->
        <div class="head">
            <div class="web clearfix">
                <h1>
                    <a href="index.htm">
                        <img src="tpl/weiqi/img/logo.png" alt="" style="width: 240px">
                    </a>
                </h1>
                <div class="search">
                       <a href="/orderquery.htm"> <span></span></a>

                </div>
                <ul class="nav clearfix">
                    <li>
                        <h3>
                            <a href="index.htm">首页</a>
                        </h3>
                    </li>
                    <li>
                        <h3>

                            <a href="about.htm" id="_topChannel2">关于我们</a>

                        </h3>
                    </li>
                    <li>
                        <h3>

                            <a href="contact.htm" id="_topChannel3">客服中心</a>

                        </h3>
                    </li>
                     <li>
                        <h3>
                            <a href="news.htm" id="_topChannel5">最新动态</a>
                        </h3>
                    </li>
                     <li>
                        <h3>
                            <a href="orderquery.htm" id="A1">订单查询</a>
                        </h3>
                    </li>
                </ul>
            </div>
        </div>
        <!--头部}-->
