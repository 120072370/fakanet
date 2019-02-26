<?php if(!defined('WY_ROOT')) exit; ?>
<?php echo $msg ?>
    <div id="login_main">	
		<div class="login_ss">
			<ul class="login_ii">		    
			<form name="ft" method="post" action="withquestion.htm">
			<input type="hidden" value="<?php echo $userid ?>" name="uid" />
			<li class="login_tt">安全问题：<?php echo $question ?></li>
			<li class="login_ff">问题答案：<input type="text" name="answer" maxlength="50" /></li>
			<li class="login_ff">重设密码：<input type="password" name="newpassword" maxlength="20" /></li>
			<li class="login_ff">确认密码：<input type="password" name="confirmpassword" maxlength="20" /></li>
			<li class="login_ff">&nbsp;&nbsp;&nbsp;验证码：<input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></li>
			<li class="button"><input type="submit" class="getback_pwd" style="margin-left:85px" value="" /></li>
			</form>
			</ul>
		</div>
	</div>