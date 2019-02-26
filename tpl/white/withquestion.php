<?php if(!defined('WY_ROOT')) exit; ?>
  <div id="content" class="b_clear b_m_b mycustom">
    <div class="b_l b_m_t area-l">
	  <div class="area-box" style="margin:auto">
	    <div class="area-t">
		  <div class="titbn"><h4>找回密码</h4></div>
		</div>
		<div class="clear"></div>
		<div class="area-c" style="height:100%">

<?php echo $msg ?>
	    
			<form name="ft" method="post" action="withquestion.htm">
			<input type="hidden" value="<?php echo $userid ?>" name="uid" />
			<table class="tablestyle">
			<tr>
			<td class="right bold">安全问题：</td>
			<td><?php echo $question ?></td>
			</tr>
			<tr>
			<td class="right bold">安全答案：</td>
			<td><input type="text" name="answer" maxlength="50" /></td>
			</tr>
			<tr>
			<td class="right bold">新密码：</td>
			<td><input type="password" name="newpassword" maxlength="20" /></td>
			</tr>
			<tr>
			<td class="right bold">确认新密码：</td>
			<td><input type="password" name="confirmpassword" maxlength="20" /></td>
			</tr>
			<tr>
			<td class="right bold">验证码：</td>
			<td><input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></td>
			</tr>
			<tr>
			<td></td>
			<td><input type="submit" style="font-size:12px;padding:3px 10px" value="立即找回" /></td>
			</tr>
			</table>
			</form>

			</div>
	  </div><!--/box end-->
	</div><!--/left end-->
  </div><!--/content end-->