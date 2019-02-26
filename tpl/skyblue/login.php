<?php if(!defined('WY_ROOT')) exit; ?>
    <div id="login_main">
		<div class="login_s">
			<ul class="login_i">
			<form name="login" method="post" action="userlogin.htm">
				<li class="login_t">商户账号</li>
				<li class="login_f"><input type="text" name="username" maxlength="20" /></li>
				<li class="login_t">登陆密码<a tabindex="999" href="retpwd.htm">忘记密码？</a></li>
				<li class="login_f"><input type="password" name="password" maxlength="20" /></li>
				<li class="login_t">验证码</li>
				<li class="login_f"><input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码" /></li>
				<li class="button"><input type="submit" class="login_submit" value="" /> <input type="button" onclick="javascript:location.href='register.htm'" class="login_register" /></li>
			</form>
			</ul>
			</div>
	</div>