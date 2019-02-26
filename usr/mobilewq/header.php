<?php if(!defined('WY_ROOT')) exit; ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?php echo isset($title) ? $title.' - ' : '' ?><?php echo SITENAME ?></title>


    <link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/css/neon-core.css">
    <link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/css/neon-theme.css">
    <link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/css/neon-forms.css">
    <link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/css/skins/blue.css">


    <!--<script>
        $(function () {
            $('#compaints').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 520, height: 420 });
            if (jQuery("#main_left").height() > jQuery("#main_right").height()) {
                jQuery("#main_right").height(jQuery("#main_left").height());
            } else {
                jQuery("#main_left").height(jQuery("#main_right").height());
            }

        })
    </script>
       

    <?php if($message): ?>
    <bgsound src="<?php echo USER_THEME ?>/images/dingling.mp3" loop="-1">
<?php endif ?>-->
    <script src="<?php echo USER_THEME ?>/assets/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo USER_THEME ?>/js/common.js"></script>


    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="page-body page-left-in skin-blue">

    <div class="page-container">
        <div class="sidebar-menu">


            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="/index.htm">
                        <img src="/images/logo.png" width="120" alt="" />
                    </a>
                </div>

                <!-- logo collapse icon -->

                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon with-animation">
                        <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation">
                        <!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

            </header>

            <ul id="main-menu" class="">

                <?php if($_SESSION['istg']=='0'): ?>
                <li class="opened active">
                    <a href="./">
                        <i class="entypo-gauge"></i>
                        <span>账户信息</span>
                    </a>
                    <ul>
                        <li>
                            <a href="./">
                                <span>账户信息</span>
                            </a>
                        </li>
                        <li>
                            <a href="userWEIXIN.php">
                                <span>绑定微信</span>
                            </a>
                        </li>
                        <li>
                            <a href="userinfo.php">
                                <span>信息修改</span>
                            </a>
                        </li>
                        <li>
                            <a href="applyForSettlement.php">
                                <span>申请结算</span>
                            </a>
                        </li>
                        <li>
                            <a href="userPwd.php">
                                <span>修改密码</span>
                            </a>
                        </li>
                        <li>
                            <a href="userSafe.php">
                                <span>安全设置</span>
                            </a>
                        </li>
                        <li>
                            <a href="usermoney.php">
                                <span>结算记录</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="opened">
                    <a href="#">
                        <i class="entypo-layout"></i>
                        <span>商品管理</span>
                    </a>
                    <ul>
                        <li>
                            <a href="goodcate.php">
                                <span>商品分类</span>
                            </a>
                        </li>
                        <li>
                            <a href="goodlist.php">
                                <span>商品列表</span>
                            </a>
                        </li>
                        <li>
                            <a href="goodlist.php?action=add">
                                <span>添加商品</span>
                            </a>
                        </li>
                        <li>
                            <a href="goods.php">
                                <span>添加卡密</span>
                            </a>
                        </li>
                        <li>
                            <a href="goodInvent.php">
                                <span>库存卡密</span>
                            </a>
                        </li>
                        <li>
                            <a href="goodSell.php">
                                <span>最近卖出</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="opened">
                    <a href="index.html">
                        <i class="entypo-newspaper"></i>
                        <span>交易管理</span>
                    </a>
                    <ul>
                        <li>
                            <a href="paylinks.php">
                                <span>我的支付链接</span>
                            </a>
                        </li>
                        <li>
                            <a href="rates.php">
                                <span>换购价值设置</span>
                            </a>
                        </li>
                        <li>
                            <a href="passageway.php">
                                <span>支付方式管理</span>
                            </a>
                        </li>
                        <li>
                            <a href="analyforchannel.php">
                                <span>交易渠道分析</span>
                            </a>
                        </li>
                        <li>
                            <a href="analyforuser.php">
                                <span>我的收益统计</span>
                            </a>
                        </li>
                        <li>
                            <a href="orders.php">
                                <span>订单交易记录</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="opened">
                    <a href="#">
                        <i class="entypo-mail"></i>
                        <span>商家助手</span>
                    </a>
                    <ul>
                        <?php if(!isset($_SESSION['login_is_api']) || !$_SESSION['login_is_api']): ?>
                        <li>
                            <a href="coupon.php?action=add">
                                <i class="entypo-inbox"></i>
                                <span>生成优惠券</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="coupon.php">
                                <i class="entypo-pencil"></i>
                                <span>管理优惠券</span>
                            </a>
                        </li>
                        <li>
                            <a href="businessesPedia.php">
                                <span>商家百科</span>
                            </a>
                        </li>
                        <li>
                            <a href="message.php">
                                <span>站内信息</span>
                            </a>
                        </li>
                        <li>
                            <a href="userlogs.php">
                                <span>登陆日志</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php endif; ?>
            </ul>

        </div>
        <div class="main-content">

            <div class="row">

                <!-- Profile Info and Notifications -->
                <div class="col-xs-12 clearfix">

                    <div class="user-info pull-left pull-none-xsm">
                        <div class="sui-normal">
                            <a href="userinfo.php" class="user-link">
                                <img src="<?php echo USER_THEME ?>/images/default_family.png" width="50" alt="" class="img-circle" />

                                <span>欢迎您</span>
                                <strong><?php echo $_SESSION['login_username'] ?></strong>

                            </a>
                        </div>
                    </div>
                    <ul class="user-info pull-left pull-right-xs pull-none-xsm">
                        <li class="notifications dropdown">
                            <a href="/usr">主页<i class="entypo-layout"></i>
                            </a>
                        </li>

                        <li class="notifications dropdown">

                            <a href="message.php" class="dropdown-toggle">
                                <i class="entypo-mail"></i>
                                <span class="badge badge-secondary"><?php echo $message ?></span>
                            </a>

                        </li>
                        <li class="notifications dropdown">
                            <a href="login.php?action=logout">退出 <i class="entypo-logout right"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!--<div class="col-md-12 clearfix">
                       <ol class="breadcrumb bc-1">
                            <li>
                                <a href="#"><i class="entypo-megaphone"></i>广告赞助：</a>
                            </li>
                            <li>
                                <a href="" target="_blank" class="text-danger" style="color:red;">xs批发,作者直招代理</a>
                            </li>
                            <li class="active">
                                    <a href="#">广告发布联系客服</a>
                            </li>
                        </ol>
                </div>-->



            </div>
            <!--  <hr />-->
