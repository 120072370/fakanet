<?php if(!defined('WY_ROOT')) exit;?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>微奇发卡自动发卡平台管理系统</title>
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
<style type="text/css">
html{height:100%; overflow: hidden;}
.bg{height:100%;background:url(/App/Admin/View/images/bg_dot.png) repeat;}
#row1{position:absolute;left:0;_left:50%;*left:50%; margin:auto;_margin-left:-310px;*margin-left:-310px;right:0; top: 200px; width: 620px; overflow:visible}
#row1 h1,#row1 h2{color: #fff; font-size: 14px; margin: 0;}
#row1 h1{font-size: 30px; margin: 5px 0 15px;text-shadow:0 2px 0 #000; font-family: "Microsoft Yahei";font-weight: 700;}
#row1 input{border: 0; margin-left: 10px;*margin-left: 10px; height:40px;line-height: 40px; position:absolute; width:165px; left:20px; top:0}
#row1 li{ float: left; background: #fff; width: 200px; margin-right: 10px; height: 40px; line-height: 40px; text-indent: 0.5em; overflow: hidden; position: relative;}
#row1 li .iconfont{font-size: 20px;*position:absolute; *left:0; *top:3px;}
#row1 li img{ position: absolute; left: 0; top: 40px; display:none}
#row1 li.li3{ overflow: visible; width:100px; text-indent: 0;}
#row1 li.li3 input{ width: 85px; height:35px; line-height:35px;_height:30px; _line-height:30px; text-indent: 0;top:3px;left:0px}
#row1 li.li4{ text-indent:0; width:auto; background:none}
#row1 li.li4 button{ background:#5AC3DE; border: none; width: 70px; margin: 0 auto; color: #fff; padding:0 10px}
#row2{position: absolute; bottom: 5px; color: #fff; width: 100%; text-align: center;}
</style>
</head>

<body>

<form name="login" method="post" action="?action=login">
	<div id="login">
    	<div id="page_title">用户登陆
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
        	<label><span>用户名</span><input type="text" class="input" name="usr" maxlength="20" size="30" /></label>
            <div class="h10"></div>
            <label><span>密&nbsp;&nbsp;&nbsp;码</span><input type="password" class="input" name="pwd" maxlength="20" size="30" /></label>
            <div class="h10"></div>
            <label><span>安全码</span><input type="password" class="input" name="safepwd" maxlength="20" size="30" /></label>
            <div class="h10"></div>
            <label><span>验证码</span><input type="text" class="input" style="width:120px" name="chk" maxlength="5" size="15" /> <img src="../includes/libs/chkcode.php"  align="absmiddle" alt="验证码"></label>
            <div class="h10"></div>
          	<input type="submit" class="button_bg_2" style="margin-left:47px" value="用户登陆" />
            <div class="h10"></div>
        </div>
    </div>
</form>
</body>
</html>