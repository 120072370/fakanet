<?php if(!defined('WY_ROOT')) exit;?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>自动发卡平台管理系-扎兰屯市爱发网络科技有限公司独家开发www.a8tg.com</title>
<link href="views/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	body{background:url(views/images/bg.png)}
	#login{width:350px;margin:auto;margin-top:80px;background:#fff url(views/images/top_bg.gif) top repeat-x;border-radius:5px;border:1px solid #333;box-shadow:2px 2px 2px #ccc}
	#page_title{height:60px;line-height:60px;padding-left:30px;font-weight:bold;color:#fff;text-shadow:1px 1px 1px #333;font-size:16px;font-family:Tahoma}
	#input_info{padding:10px 30px}
	.input{width:200px}
	label span{margin-right:10px;font-size:12px;text-align:right}
	.msg{position:relative;top:-20px;left:45px;height:20px;font-size:12px;font-weight:100;color:#f00;text-shadow:0px 0px 0px}
</style>
</head>

<body>

<form name="login" method="post" action="?action=do">
	<div id="login">
    	<div id="page_title">验证授权
<?php if(_G('a')): ?><div class="msg">验证码不正确</div><?php endif; ?>
<?php if(_G('b')): ?><div class="msg">用户名不能为空</div><?php endif; ?>
<?php if(_G('c')): ?><div class="msg">用户名长度在5至20个字符之间</div><?php endif; ?>
<?php if(_G('d')): ?><div class="msg">登陆密码不能为空</div><?php endif; ?>
<?php if(_G('e')): ?><div class="msg">密码长度在6至20个字符之间</div><?php endif; ?>
<?php if(_G('f')): ?><div class="msg">登陆IP无权限</div><?php endif; ?>
<?php if(_G('g')): ?><div class="msg">请输入安全码</div><?php endif; ?>
<?php if(_G('h')): ?><div class="msg">安全码错误</div><?php endif; ?>
		</div>
        <div id="input_info">
      	  	<div class="h10"></div>
        	<textarea name="" rows="5" cols="40"></textarea>
            <div class="h10"></div>
          	<input type="submit" class="button_bg_2" style="margin-left:47px" value="立即授权" />
            <div class="h10"></div>
        </div>
    </div>
</form>
</body>
</html>