<?php if(!defined('WY_ROOT')) exit; ?>
  <div id="content" class="b_clear b_m_b mycustom">
    <div class="b_l b_m_t area-l">
	  <div class="area-box" style="margin:auto">
	    <div class="area-t">
		  <div class="titbn"><h4>重设密码</h4></div>
		</div>
		<div class="clear"></div>
		<div class="area-c" style="height:100%">
<?php echo $msg ?>

			<form name="login" method="post" action="setnewpwd.htm">
			<input type="hidden" name="verifycode" value="<?php echo $verifycode ?>" />
			<table class="tablestyle">
			<tr>
				<td>用户名：</td>
				<td><input type="text" name="username" maxlength="20" /></td>
			</tr>
			<tr>
				<td>重设密码：</td>
				<td><input type="password" name="password" maxlength="20" /></td>
			</tr>
			<tr>
				<td>验证码：</td>
				<td><input type="text" name="chkcode" maxlength="5" style="width:100px" /><img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></td>
			</tr>
			<tr>
			<td></td>
				<td><input type="submit" style="font-size:12px;padding:3px 10px" value="立即重设" /></td>
				</tr>
				</table>
			</form>
			</div>
	  </div><!--/box end-->
	</div><!--/left end-->
  </div><!--/content end-->