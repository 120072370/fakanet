<?php if(!defined('WY_ROOT')) exit;?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="a8tg/css/style.css" rel="stylesheet" type="text/css" />
<title>Sign In</title>
<style type="text/css">
	body{background:url(weiqi/images/bg.png)}
	#login{width:350px;margin:auto;margin-top:80px;background:#fff url(weiqi/images/top_bg.gif) top repeat-x;border-radius:5px;border:1px solid #333;box-shadow:2px 2px 2px #ccc}
	#page_title{height:60px;line-height:60px;padding-left:30px;font-weight:bold;color:#fff;text-shadow:1px 1px 1px #333;font-size:16px;font-family:Tahoma}
	#input_info{padding:10px 30px}
	label span{margin-right:10px;font-size:12px;text-align:right}
    .input{border-radius:3px;border:1px solid #ccc;padding:4px;font-size:14px;width:200px}
    .input:focus{outline:none;box-shadow:0px 0px 6px #ccc}
	.msg{position:relative;top:-20px;left:45px;height:20px;font-size:12px;font-weight:100;color:#f00;text-shadow:0px 0px 0px}
    .submit{background:url(weiqi/images/submit_bg.gif) repeat-x;color:#fff;padding:5px 10px;border:1px solid #0068b8;border-radius:2px;font-weight:bold}
    .submit:hover{background:#0057cc}
	.h10{height:10px}
</style>
</head>

<body>

<form name="login" method="post" action="?action=login">
	<div id="login">
    	<div id="page_title">商户登陆
<?php if(_G('a')): ?><div class="msg">验证码不正确！</div><?php endif; ?>
<?php if(_G('b')): ?><div class="msg">用户名不能为空！</div><?php endif; ?>
<?php if(_G('c')): ?><div class="msg">用户名长度在5至20个字符之间！</div><?php endif; ?>
<?php if(_G('d')): ?><div class="msg">登陆密码不能为空！</div><?php endif; ?>
<?php if(_G('e')): ?><div class="msg">密码长度在6至20个字符之间！</div><?php endif; ?>
		</div>
        <div id="input_info">
      	  <div class="h10"></div>
        	<label><span>用户名</span><input type="text" class="input" name="usr" maxlength="20" size="30" /></label>
            <div class="h10"></div>
            <label><span>密&nbsp;&nbsp;码</span><input type="password" class="input" name="pwd" maxlength="20" size="30" /></label>
            <div class="h10"></div>
            <label><span>验证码</span><input type="text" class="input" name="chk" style="width:100px" maxlength="5" size="15" /> <img src="../includes/libs/chkcode.php" align="absmiddle" alt="验证码"></label>
            <div class="h10"></div>
          	<input type="submit" class="button_bg_2" style="margin-left:47px" value="用户登陆" />
            <div class="h10"></div>
        </div>
    </div>
</form>
</body>
</html>