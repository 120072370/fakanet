<?php
if(!defined('WY_ROOT')) exit;
?>
<div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> <a href="adminList.php">管理员管理</a>  <span>&raquo;</span> 修改登陆密码</div>
<div class="main"> 
<style>
td p{padding:5px 0;display:none}
td.right{text-align:right}
.input{width:250px}
</style>

<form name="add" method="post" action="?action=save">
<table class="register">
<tr>
<td class="right" width="100">管理员账号：</td>
<td><?php echo $_SESSION['login_adminname'] ?></td>
</tr>

<tr>
<td class="right">旧密码：</td>
<td><input type="password" name="oldpass" class="input" size="40" maxlength="20" /> <span class="red">*</span></td>
</tr>

<tr>
<td class="right">新密码：</td>
<td><input type="password" name="newpass" class="input" size="40" maxlength="20" /> <span class="red">*</span></td>
</tr>

<tr>
<td class="right">确认新密码：</td>
<td><input type="password" name="confirmnewpass" class="input" size="40" maxlength="20" /> <span class="red">*</span></td>
</tr>

<tr>
<td class="right"></td>
<td><input type="submit" class="button_bg_2" value="保存设置" /></td>
</tr>
</table>
</form>
</div>

<script>
  $(function(){
  $('[type=submit]').click(function(){
  oldpass=$.trim($('[name=oldpass]').val());
  //alert(oldpass.length);
  if(oldpass=='' || oldpass.length < 6 || oldpass.length > 20){
	  alert('旧密码不能为空！长度在6-20个字符之间！');
	  $('[name=oldpass]').focus();
	  return false;
	}

    newpass=$.trim($('[name=newpass]').val());
	if(newpass=='' || newpass.length<6 || newpass.length >20){
	  alert('新密码不能为空！长度在6-20个字符之间！');
	  $('[name=newpass]').focus();
	  return false;
	}

    confirmnewpass=$.trim($('[name=confirmnewpass]').val());
	if(confirmnewpass!=newpass){
	  alert('两次输入的密码不一样！');
	  $('[name=confirmnewpass]').focus();
	  return false;
	}
  })
})
</script>