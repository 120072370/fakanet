<?php if(!defined('WY_ROOT')) exit; ?>
<div style="clear:both"></div>

        </div>
    </div>
</div>
<div class="Bannerr">
<div class="foot" ></div>
</div>
<div class="Crumbs w">
<div class="AffiliateBox w">
<h2 class="card"><i></i>找回密码<span><span>/</span> Pass</span></h2>
</div>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style=" margin-bottom:1px; border:solid 1px #e6e6e6;">
<tr>
<td align="center" style="padding:100px;">
		<div class="clear"></div>
		<div class="area-c" style="height:100%">
		    <div class="pagecontent">
		<div class="pc_title_1">
<div class="w">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="10"  class="a14b">&nbsp;</td>
</tr>
<tr>
<td height="262" align="center" >

<?php echo $msg ?>
    <div id="login_main">
		<div class="login_s">
			<ul class="login_i">
			<form name="login" method="post" action="setnewpwd.htm">
			    <input type="hidden" name="verifycode" value="<?php echo $verifycode ?>" />
				<li class="login_t">商户账号<span class="login_f">
				  <input type="text" name="username" maxlength="20" />
				</span></li>
				<br> 
				<li class="login_t">重设密码<span class="login_f">
				  <input type="password" name="password" maxlength="20" />
				  <br> 
				</span></li>
				<li class="login_f"></li>
				<li class="login_t">验证码<span class="login_f">
				  <input type="text" name="chkcode" maxlength="5" style="width:70px" />
				</span><span class="login_f"><img onClick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></span></li>
				<li class="login_f"></li>
				<li class="button"><input type="submit" class="reset_pwd" value="   找回密码  " /></li>
			</form>
			</ul>
			</div>
	</div></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr><tr>
<td>&nbsp;</td>
</tr>
</table>
</div></div></div></div></table></div>﻿<div class="safely"></div>
