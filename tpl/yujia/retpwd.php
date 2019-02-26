<?php if(!defined('WY_ROOT')) exit; ?>
<?php echo $msg ?>
    <div id="login_main">
		<div class="login_s">
			<ul class="login_i">
			<form name="ft" method="post" action="retpwd.htm">
				<li class="login_t">找回方式：</li>
                <li class="login_t">
                <input type="radio" name="ftype" value="1" id="r1" checked> <label for="r1">通过邮件</label>&nbsp;&nbsp;
			    <input type="radio" name="ftype" value="2" id="r2"> <label for="r2">通过安全问题</label>
                </li>
				<li class="login_t">商户账号</li>
                <li class="login_f"><input type="text" name="username" maxlength="20" /></li>
				<li class="login_t">验证码</li>
                <li class="login_f"><input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></li>
				<li class="button"><input type="submit" class="getback_pwd" value="" /></li>
			</form>
			</ul>
		</div>
	</div>