<?php if(!defined('WY_ROOT')) exit; ?>
<?php echo $msg ?>
    <div id="login_main">
		<div id="logins">
			<div id="login_title"></div>
			<ul id="login_info">
			<form name="login" method="post" action="setnewpwd.htm">
			    <input type="hidden" name="verifycode" value="<?php echo $verifycode ?>" />
				<li class="l_i_t">用户名：</li>
				<li class="l_i_f"><input type="text" name="username" maxlength="20" /></li>
				<li class="l_i_t">重设密码：</li>
				<li class="l_i_f"><input type="password" name="password" maxlength="20" /></li>
				<li class="l_i_t">按右边输入验证码：</li>
				<li class="l_i_f"><input type="text" name="chkcode" maxlength="5" style="width:100px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></li>
				<li class="button"><input type="submit" style="font-size:12px;padding:3px 10px" value="立即重设" /></li>
			</form>
			</ul>
			</div>
	</div>
	</div>