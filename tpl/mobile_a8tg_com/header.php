<?php if(!defined('WY_ROOT')) exit; ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no;">

    <title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?></title>
    <meta name="title" content="<?php echo ''.$this->config['sitename'] ?>" />
    <meta name="keywords" content="<?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?>" />
    <meta name="description" content="<?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?>" />

    <link rel="stylesheet" type="text/css" href="tpl/weiqi/css/index_2f3dc5b.css?1039" />
    <script src="/tpl/weiqi/js/jquery.js"></script>

</head>
<body class="body-box">
    <!--首页头部的开始-->
    <header class="mui-bar mui-bar-nav nav-gradient nav-absolute">
        <span class="mui-pull-nav">
            <a href="/register.htm" class="mui-pull-left mui-pull-login">商户入驻</a>
            <a href="/login.htm" class="mui-pull-left mui-pull-login">商户登录</a></span>
    </header>
    <div class="mui-content">
        <div class="banner-bar ban-index pr">
            <div class="ban-abs">
                <div class="ft-logo">
                    <p>
                        <!--<i class="icon-hualv icon-logo f30"></i><i class="icon-hualv icon-logo2 f50 mr5"></i>-->
                        <img src="/images/logo.png" style="width: 50%; margin: 3px auto;" />
                    </p>
                   
                    <p class="f16 lh18 mt5 mb20"></p>
                </div>
                <div class="questdlg-bar">
                    <form id="s" action="/orderquery.htm" method="get">
                        <input name="st" value="orderid" type="hidden" />
                        <input type="text" class="wen-text" name="kw" placeholder="请在此输入.." value="<?php echo $kw ?>" maxlength="20"></input>
                        <div class="ban-search">
                            <p class="tl">请输入订单号或联系方式查询</p>
                            <button type="submit" class="mui-btn btn-gn" onclick="if($('[name=kw]').val()){s.submit();}else{$('[name=kw]').focus();alert('请填写查询内容！');return false;}">查询</button>
                        </div>
                    </form>
                </div>
                <p class="f12 lh12 s-cfff mt10"></p>
            </div>
        </div>
