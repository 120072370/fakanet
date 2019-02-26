<?php if(!defined('WY_ROOT')) exit; ?>
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