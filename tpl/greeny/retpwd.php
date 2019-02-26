<?php if(!defined('WY_ROOT')) exit; ?>
  <div id="content" class="b_clear b_m_b">
    <div class="b_l b_m_t area-l">
	  <div class="area-box">
	    <div class="area-t">
		  <div class="titbn"><h4>自助找回密码</h4></div>
		</div>
		<div class="clear"></div>
		<div class="area-c" style="height:100%">
		<?php echo $msg ?>
			<form name="ft" method="post" action="retpwd.htm">
			<table class="tablestyle">
			<tr>
			<td class="right bold">找回方式：</td>
			<td>
			<input type="radio" name="ftype" value="1" id="r1" checked> <label for="r1">通过邮件</label>&nbsp;&nbsp;
			<input type="radio" name="ftype" value="2" id="r2"> <label for="r2">通过安全问题</label>
			</td>
			</tr>
			<tr>
			<td class="right bold">用户名：</td>
			<td><input type="text" name="username" maxlength="20" /></td>
			</tr>
			<tr>
			<td class="right bold">验证码：</td>
			<td><input type="text" name="chkcode" maxlength="5" style="width:70px;" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></td>
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
	<div class="b_r b_m_t area-r">
<?php require 'login_common.php'; ?>
	</div><!--/right end-->
  </div><!--/content end-->