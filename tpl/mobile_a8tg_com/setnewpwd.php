<?php if(!defined('WY_ROOT')) exit; ?>
<?php echo $msg ?>
<link rel="stylesheet" href="tpl/mobile_a8tg_com/css/regapp.css" />
<div style="margin-top:0px;padding-top:8px;background-color:#f1f1f1">
<ul class="nav nav-tabs" role="tablist">
<li role="presentation">&nbsp;&nbsp;&nbsp;</li><li role="presentation" class="active"><a href="#">重设密码</a></li></ul>
<div class="tab-content" style="padding:10px 20px">
<div role="tabpanel" class="tab-pane active content_style">
			<form name="login" method="post" action="setnewpwd.htm">
			<input type="hidden" name="verifycode" value="<?php echo $verifycode ?>" />
<div class="form-group">
<label class="radio-inline">
<div class="form-group"><label for="username">用户名</label>
<input class="form-control" id="username" name="username" maxlength="20" required="" type="text"></div>
<div class="form-group"><label for="password">重设密码：</label>
<input class="form-control" id="password" name="password" maxlength="20" required="" type="password"></div>
<div class="form-group"><label for="chkcode">验&nbsp;证&nbsp;码</label>
<div class="input-group"><input class="form-control" id="chkcode" name="chkcode" required="" type="text">

<img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" class="chkcode" title="点击刷新验证码" height="30" align="absmiddle"></span></div></div>
<div class="form-group">

<input type="submit" class="reset_pwd" value="    立即重设   " /></li>
</form></div></div>﻿	</div>
