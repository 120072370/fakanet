<?php if(!defined('WY_ROOT')) exit; ?>

<div style="margin-top:0px;padding-top:8px;background-color:#f1f1f1">
<ul class="nav nav-tabs" role="tablist">
<li role="presentation">&nbsp;&nbsp;&nbsp;</li><li role="presentation" class="active"><a href="#">找回密码</a></li></ul>
<div class="tab-content" style="padding:10px 20px">
<div role="tabpanel" class="tab-pane active content_style">
<form method="post" action="/retpwd.htm">
<div class="form-group">
<label class="radio-inline">
<input id="radio1" name="ftype" value="1" checked="" type="radio"> 通过邮件</label>
<label class="radio-inline"><input id="radio2" name="ftype" value="2" type="radio"> 通过安全问题</label></div>
<div class="form-group"><label for="username">用户名</label>
<input class="form-control" id="username" name="username" maxlength="20" required="" type="text"></div>
<div class="form-group"><label for="chkcode">验&nbsp;证&nbsp;码</label>
<div class="input-group"><input class="form-control" id="chkcode" name="chkcode" required="" type="text">
<span class="input-group-addon">
<img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm"  class="chkcode" title="点击刷新验证码" height="30" align="absmiddle"></span></div></div>
<div class="form-group">


			<td><input class="btn btn-success btn-block" style="/*! font-size:12px; */padding:3px 10px;" value="立即找回" type="submit"></td>
			</tr>
<tr>
<td height="30" align="center">&nbsp;</td>
<td align="left">&nbsp;</td>
<td align="left">&nbsp;</td>
</form></div></div>﻿	</div>


