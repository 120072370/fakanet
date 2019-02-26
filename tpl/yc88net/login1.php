<?php if(!defined('WY_ROOT')) exit; ?>

<!DOCTYPE html>
<html>
<head>
    <title>用户登录 -新天诚自动发卡平台、自动发卡平台、发卡平台、自动发卡网站</title>
    <meta name="keywords" content="新天诚自动发卡平台、自动发卡平台、发卡平台、自动发卡网站,自动发卡平台,自动发卡,发卡平台,在线售卡,寄售平台,新天诚自动发卡平台、自动发卡平台、发卡平台、自动发卡网站" />
    <meta name="description" content="新天诚自动发卡平台、自动发卡平台、发卡平台、自动发卡网站-自动发卡平台,专业的卡密寄售平台，安全、稳定、快捷，交易透明开放，发货效率保障，灵活的完成全自动的销售发卡平台" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta name="renderer" content="webkit">
    <link href="/tpl/yc88net/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/tpl/yc88net/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/tpl/yc88net/css/style.css" rel="stylesheet" />
    <script src="/tpl/yc88net/js/jquery.min.js"></script>
    <!--[if lte IE 9]>
      <script src="js/html5.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="bgimg" class="clearfix">
        
        <img src="/tpl/yc88net/picture/index.jpg" />
    </div>
    <div id="login-box">
        <div class="logo-big fc">
            
            <img src="/tpl/yc88net/picture/logo2.png"/>
        </div>
        <div class="H30"></div>
        <form class="fc form-horizontal" action="userlogin.htm"  method="post" autocomplete="off">
		
            <div class="form-group">
                <div class="col-xs-12">
                    
					<input value="请输入商户账号" class="form-control" id="userEmail" name="username" onblur="if(!value){value=yellowValue;}" onfocus="if(value=='请输入商户账号'){this.value='';}" onkeydown="enterSearch(event);" tabindex="1" type="text">
                    <i class="fa fa-user form-control-feedback"></i>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input style="display:none">
                   
					<input value="请输入商户登录密码" class="form-control" id="userPass" name="password" onblur="if(!value){value=yellowValue;}" onfocus="if(value=='请输入商户登录密码'){this.value='';}" onkeydown="enterSearch(event);" tabindex="2" type="password">
                    <i class="fa fa-lock form-control-feedback"></i>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                  
                   
					
					<input type="text" id="code" placeholder="请输入验证码" class="form-control pull-left" name="chkcode" required>
					
					<i class="fa fa-shield form-control-feedback"></i>
                    <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码" /></li>
                </div>
            </div>
    
                    <button type="submit" class="btn btn-block btn-success btn-lg">确定登陆</button>
					
                </div>
            </div>
            <div class="stat">
                <a href="/register" class="pull-left">注册账号</a>
                <a href="/findPwd" class="pull-right">找回密码</a>
            </div>
        </form>
    </div>
    <script src="/tpl/yc88net/js/bootstrap.min.js"></script>
    <script src="/tpl/yc88net/js/bootbox.min.js"></script>
    <script src="/tpl/yc88net/js/login.js"></script>
    <div style="display: none">
        <script src="/tpl/yc88net/js/z_stat.js" language="JavaScript"></script>
    </div>
</body>
</html>

