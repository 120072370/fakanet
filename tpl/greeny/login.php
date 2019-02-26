<?php if(!defined('WY_ROOT')) exit; ?>
  <div id="content" class="b_clear b_m_b">
	  <div class="b_m_t jbbox_b">

		<div class="login">
	    <div class="login-t"><h4>商户登录</h4></div>
		<div class="login-d">

		<div id="login_main">
			<div id="logins">
				<ul id="login_info">
				<form name="login" method="post" action="userlogin.htm">
					<li class="l_i_t">商户账号</li>
					<li class="l_i_f"><input type="text" name="username" maxlength="20" /></li>
					<li class="l_i_t">登陆密码<a tabindex="999" href="retpwd.htm">忘记密码？</a></li>
					<li class="l_i_f"><input type="password" name="password" maxlength="20" /></li>
					<li class="l_i_t">验证码</li>
					<li class="l_i_f"><input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码" /></li>
					<li style="margin-top:15px;"><input name="Login" type="submit" class="dl" value="" title="登录"/><input type="button" onclick="javascript:window.location.href='register.htm'" class="zc" value="" title="注册" /></li>
				</form>
				</ul>
				</div>
		</div>
	 </div>
</div>
		</div>
		</div>