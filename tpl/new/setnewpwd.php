<?php
if (!defined('WY_ROOT'))
	exit ;
 ?>
<link rel="stylesheet" href="/tpl/new/Skin/Home/Red/css/style.css" />
<link rel="stylesheet" href="/tpl/new/Skin/Home/Red/css/page.css" />
<div class="content">
	<div class="page_gonggao">
		<div class="page_header">
			<h1>找回密码</h1>
			<div class="recent"> <span>当前位置：<a href="/">首页 </a> > 找回密码</span> </div>
		</div>
		<div class="page_content">
			<div class="left_nav">
				<ul>
					<li><a href="/login.htm">登录平台</a></li>
					<li><a href="/sendcode.htm">免费注册</a></li>
					<li class="nav_current"><a href="/retpwd.htm">找回密码</a></li>
					<li><a href="/orderquery.htm">交易查询</a></li>
				</ul>
		  </div>
			<div class="center_text">
				<h2>找回方式</h2>
			   <?php echo $msg ?>
    <div id="login_main">
		<div class="login_s">
			<ul class="login_i">
			<form name="login" method="post" action="setnewpwd.htm">
			    <input type="hidden" name="verifycode" value="<?php echo $verifycode ?>" />
				<li class="login_t">商户账号</li>
				<li class="login_f"><input type="text" name="username" maxlength="20" /></li>
				<li class="login_t">重设密码</li>
				<li class="login_f"><input type="password" name="password" maxlength="20" /></li>
				<li class="login_t">验证码</li>
				<li class="login_f"><input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></li>
				<li class="button"><input type="submit" class="reset_pwd" value="" /></li>
			</form>
			</ul>
			</div>
	</div>
			</form>
			</ul>
		</div>
	</div>
			</div>
		</div>
	</div>
	<div class="safely"></div>
</div>