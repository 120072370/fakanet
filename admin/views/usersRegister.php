<?php
if(!defined('WY_ROOT')) exit;
?>
<div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> <a href="users.php">商户管理</a>  <span>&raquo;</span> 添加新商户</div>
<div class="main"> 
<style>
td p{padding:5px 0;display:none}
td.right{text-align:right}
.input{width:250px}
</style>
<form name="add" method="post" action="?action=addsave">
<table class="register">
<tr>
<td width="100" class="right">设置状态：</td>
<td>
<select name="is_state" class="input">
<option value="0">审核通过</option>
<option value="1">暂停用户</option>
</select>
</td>
</tr>

<tr>
<td class="right">结算方式</td>
<td>
<select name="ctype" class="input">
<option value="1">自动结算</option>
<option value="2">商户提现</option>
</select>
</td>
</tr>

<tr>
<td class="right">购买页公告</td>
<td>
<select name="is_user_popup" class="input">
<option value="0">关闭提示</option>
<option value="1">提示一</option>
<option value="2">提示二</option>
</select>
</td>
</tr>

    <tr>
<td class="right">商户类型</td>
<td>
<select name="is_tg" class="input">
<option value="0">普通商户</option>
<option value="1">推广商户</option>
</select>
</td>
</tr>
<tr>
<td width="100" class="right">商户登陆名：</td>
<td><input type="text" name="username" class="input" size="40" maxlength="50" /> <span class="err_msg" id="err_msg_1"></span></td>
</tr>

<tr>
<td width="100" class="right">登陆密码：</td>
<td><input type="password" name="userpass" class="input" size="40" maxlength="20" /> <span class="err_msg" id="err_msg_2"></span></td>
</tr>

<tr>
<td width="100" class="right">确认登陆密码：</td>
<td><input type="password" name="userpass1" class="input" size="40" maxlength="20" /> <span class="err_msg" id="err_msg_5"></span></td>
</tr>

<tr>
<td width="100" class="right">联系QQ：</td>
<td><input type="text" name="qq" class="input" size="40" maxlength="60" /> <span class="err_msg" id="err_msg_3"></span></td>
</tr>

<tr>
<td width="100" class="right">联系手机：</td>
<td><input type="text" name="tel" class="input" size="40" maxlength="12"  /> <span class="err_msg" id="err_msg_4"></span></td>
</tr>

<tr>
<td width="100" class="right">联系邮箱：</td>
<td><input type="text" name="email" class="input" size="40" maxlength="50"  /> <span class="err_msg" id="err_msg_7"></span></td>
</tr>

<tr>
<td width="100" class="right">站点名称：</td>
<td><input type="text" name="sitename" class="input" size="40" maxlength="50"  /> <span class="err_msg" id="err_msg_8"></span></td>
</tr>

<tr>
<td width="100" class="right">站点URL：</td>
<td><input type="text" name="siteurl" class="input" size="40" maxlength="50"  /> <span class="err_msg" id="err_msg_9"></span></td>
</tr>

<tr>
<td width="100" class="right">统计JS：</td>
<td><input type="text" name="statistics" class="input" size="40" /></td>
</tr>

<tr>
<td width="100" class="right"></td>
<td><input type="submit" class="button_bg_2" value="保存用户" /> <span id="returnMsg"></span></td>
</tr>
</table>
</form>
</div>

<script>
$(function(){
  $('[type=submit]').click(function(){
    username=$.trim($('[name=username]').val());
	if(username=='' || username.length<5 || username.length>20){
	  $('#err_msg_1').html('商户登陆账号不能为空！长度在5-20个字符之间！').show();
	  $('[name=username]').focus();
	  return false;
	}

	if($('#err_msg_1').html()!=''){$('#err_msg_1').html('').hide();}

    userpass=$.trim($('[name=userpass]').val());
	if(userpass=='' || userpass.length<6 || userpass>20){
	  $('#err_msg_2').html('登陆密码不能为空！长度在6-20个字符之间！').show();
	  $('[name=userpass]').focus();
	  return false;
	}

	if($('#err_msg_2').html()!=''){$('#err_msg_2').html('').hide();}

    userpass1=$.trim($('[name=userpass1]').val());
	if(userpass1!=userpass){
	  $('#err_msg_5').html('两次输入的密码不同！').show();
	  $('[name=userpass1]').focus();
	  return false;
	}

	if($('#err_msg_5').html()!=''){$('#err_msg_5').html('').hide();}

    qq=$.trim($('[name=qq]').val());
	var reg=/\d/;
	if(qq=='' || !reg.test(qq)){
	  $('#err_msg_3').html('QQ不能为空，格式为数字！').show();
	  $('[name=qq]').focus();
	  return false;
	}

	if($('#err_msg_3').html()!=''){$('#err_msg_3').html('').hide();}

    tel=$.trim($('[name=tel]').val());
	var reg=/^[1][3,5,8][0-9]{9}$/;
	if(tel=='' || !reg.test(tel)){
	  $('#err_msg_4').html('手机格式错误！').show();
	  $('[name=tel]').focus();
	  return false;
	}

	if($('#err_msg_4').html()!=''){$('#err_msg_4').html('').hide();}

	email=$.trim($('[name=email]').val());
	var reg=/^[^\.@]+@[^\.@]+\.[a-z]+$/;
	if(email!='' && !reg.test(email)){
	  $('#err_msg_7').html('邮箱格式错误！').show();
	  $('[name=email]').focus();
	  return false;
	}

	if($('#err_msg_7').html()!=''){$('#err_msg_7').html('').hide();}

	siteurl=$.trim($('[name=siteurl]').val());
	if(siteurl!=''){
	    siteurl=siteurl.replace(/^http:\/\//i,'');
	}

  })
})
</script>