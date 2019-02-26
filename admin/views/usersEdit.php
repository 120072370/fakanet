<?php
if(!defined('WY_ROOT')) exit;
?>
<div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> <a href="users.php">商户管理</a>  <span>&raquo;</span> 修改商户资料</div>
<div class="main"> 
<style>
td p{padding:5px 0;display:none}
.input{width:250px}
</style>

<form name="add" method="post" action="?action=editsave&id=<?php echo $id ?>">
<table class="register">
<tr>
<td width="100" class="right">设置状态</td>
<td>
<select name="is_state" class="input">
<option value="0" <?php echo $is_state==0 ? 'selected' : '' ?>>审核通过</option>
<option value="1" <?php echo $is_state==1 ? 'selected' : '' ?>>暂停用户</option>
<option value="2" <?php echo $is_state==2 ? 'selected' : '' ?>>冻结用户</option>

</select>
</td>
</tr>

<tr>
<td class="right">结算方式</td>
<td>
<select name="ctype" class="input">
<?php foreach($userCtype as $key=>$val): ?>
<option value="<?php echo $key ?>" <?php echo $ctype==$key ? 'selected' : '' ?>><?php echo $val ?></option>
<?php endforeach; ?>
</select>
</td>
</tr>

<tr>
<td width="100" class="right">商户登陆名</td>
<td><input type="text" name="username" disabled class="input" size="40" maxlength="50" value="<?php echo $username ?>" /> <p class="err_msg" id="err_msg_1"></p></td>
</tr>

<tr>
<td width="100" class="right">登陆密码</td>
<td><input type="password" name="userpass" class="input" size="40" maxlength="20" /> <p class="err_msg" id="err_msg_2"></p></td>
</tr>

<tr>
<td width="100" class="right">联系QQ</td>
<td><input type="text" name="qq" class="input" size="40" maxlength="12" value="<?php echo $qq ?>" /> <p class="err_msg" id="err_msg_3"></p></td>
</tr>

<tr>
<td width="100" class="right">联系手机</td>
<td><input type="text" name="tel" class="input" size="40" maxlength="12" value="<?php echo $tel ?>" /> <p class="err_msg" id="err_msg_4"></p></td>
</tr>

<tr>
<td width="100" class="right">联系邮箱</td>
<td><input type="text" name="email" class="input" size="40" maxlength="50" value="<?php echo $email ?>" /> <p class="err_msg" id="err_msg_7"></p></td>
</tr>

<tr>
<td width="100" class="right">站点名称</td>
<td><input type="text" name="sitename" class="input" size="40" maxlength="50" value="<?php echo $sitename ?>" /> <p class="err_msg" id="err_msg_8"></p></td>
</tr>

<tr>
<td width="100" class="right">站点URL</td>
<td><input type="text" name="siteurl" class="input" size="40" maxlength="50" value="<?php echo $siteurl ?>" /> <p class="err_msg" id="err_msg_9"></p></td>
</tr>

    <tr>
<td width="100" class="right">Openid</td>
<td><input type="text" name="openid_wx" class="input" size="40" maxlength="50" value="<?php echo $openid_wx ?>" /> <p class="err_msg" id="P1"></p></td>
</tr>

      <tr>
<td width="100" class="right">商家级别</td>
<td><input type="text" name="level" class="input" size="40" maxlength="50" value="<?php echo $level ?>" /> <p class="err_msg" id="P2"></p></td>
</tr>
<tr>
<td width="100" class="right">统计JS</td>
<td><input type="text" name="statistics" class="input" value="<?php echo $statistics ?>" size="40" /></td>
</tr>

<tr>
<td width="100" class="right">商户链接</td>
<td><input type="text" name="userkey" class="input" size="40" maxlength="16" value="<?php echo $userkey ?>" /> <input type="button" class="button_bg_2" value="重新生成" onclick="getLinkKey(new Date().getTime())"></td>
</tr>

<tr>
<td width="100" class="right">上级商户</td>
<td><input type="text" name="superman" class="input" value="<?php echo $superman ?>" size="40" /></td>
</tr>
<!--
<tr>
<td width="100" class="right">APP_UID</td>
<td><input type="text" name="app_uid" class="input" value="<?php echo $app_uid ?>" size="40" /></td>
</tr>

<tr>
<td width="100" class="right">APP_STATE</td>
<td><input type="text" name="app_state" class="input" value="<?php echo $app_state ?>" size="40" /></td>
</tr>
-->
<tr>
<td class="right">商户后台主题</td>
<td><select name="theme">
<?php foreach($themeList as $key=>$val): ?>						
<option value="<?php echo $key ?>" <?php echo $theme==$key ? 'selected' : '' ?>><?php echo $val ?></option>
<?php endforeach; ?>
</select>
</td>						
</tr>

<tr>
<td class="right">商户购买页面</td>
<td><select name="template">
<option value="" <?php echo $template=='' || $template=='default' ? 'selected' : '' ?>>系统默认</option>
<?php foreach($tplList as $key=>$val): ?>						
<option value="<?php echo $key ?>" <?php echo $template==$key ? 'selected' : '' ?>><?php echo $val ?></option>
<?php endforeach; ?>
</select>
</td>						
</tr>

<tr>
<td class="right">继续付款页面</td>
<td><select name="go_page_theme">
<?php foreach($goPageList as $key=>$val): ?>						
<option value="<?php echo $key ?>" <?php echo $go_page_theme==$key ? 'selected' : '' ?>><?php echo $val ?></option>
<?php endforeach; ?>
</select>
</td>						
</tr>

<tr>
<td width="100" class="right">公告显示</td>
<td><input type="checkbox" name="is_user_popup" value="1" <?php echo $is_user_popup ? 'checked' : '' ?> id="is_user_popup" /> <label for="is_user_popup">允许此用户的购买页面显示公告</label></td>
</tr>

<tr>
<td width="100" class="right">警告显示</td>
<td><input type="checkbox" name="is_search_tips" value="1" <?php echo $is_search_tips ? 'checked' : '' ?> id="is_search_tips" /> <label for="is_search_tips">允许在领取卡密页面显示警告信息</label></td>
</tr>

<tr>
<td width="100" class="right">开通提现</td>
<td><input type="checkbox" name="is_apply_settlement" value="1" <?php echo $is_apply_settlement ? 'checked' : '' ?> id="is_apply_settlement" /> <label for="is_apply_settlement">允许此用户在商户中心申请提现结算</label></td>
</tr>

<tr>
<td width="100" class="right">开通API功能</td>
<td><input type="checkbox" name="is_api" value="1" <?php echo $is_api ? 'checked' : '' ?> id="is_api" /> <label for="is_api">为此用户开通API功能</label></td>
</tr>

<tr>
<td width="100" class="right">API商户密钥</td>
<td><input type="text" name="api_key" class="input" size="40" maxlength="32" value="<?php echo $api_key ?>" /> <input type="button" class="button_bg_2" value="生成KEY" onclick="getApiKey(new Date().getTime())"></td>
</tr>


<tr>
<td width="100" class="right"></td>
<td><input type="submit" class="button_bg_2" value="保存用户" /> <span id="returnMsg"></span></td>
</tr>
</table>
</form>
</div>

<script>
function getApiKey(t){
	$('[name=api_key]').val('正在生成...');
	$.get('users.php',{action:'getApiKey', length:'32', t:new Date().getTime()},function(data){
	    $('[name=api_key]').val(data);
	})
}

function getLinkKey(t){
	$('[name=userkey]').val('正在生成...');
	$.get('users.php',{action:'getApiKey', length:'16', t:new Date().getTime()},function(data){
	    $('[name=userkey]').val(data);
	})
}

$(function(){
  $('[type=submit]').click(function(){
    userpass=$.trim($('[name=userpass]').val());
	if(userpass!='' && (userpass.length<6 || userpass>20)){
	  $('#err_msg_2').html('登陆密码不能为空！长度在6-20个字符之间！').show();
	  $('[name=userpass]').focus();
	  return false;
	}

    qq=$.trim($('[name=qq]').val());
	var reg=/\d/;
	if(qq=='' || !reg.test(qq)){
	  $('#err_msg_3').html('QQ不能为空，格式为数字！').show();
	  $('[name=qq]').focus();
	  return false;
	}

	if($('#err_msg_3').html()!=''){$('#err_msg_3').html('').hide();}

    //tel=$.trim($('[name=tel]').val());
	//var reg=/^[1][3,5,8,6,7,2,4,9][0-9]{9}$/;
	//if(tel=='' || !reg.test(tel)){
	//  $('#err_msg_4').html('手机格式错误！').show();
	//  $('[name=tel]').focus();
	//  return false;
	//}

	if($('#err_msg_4').html()!=''){$('#err_msg_4').html('').hide();}

	email=$.trim($('[name=email]').val());
	var reg=/^[^\.@]+@[\.a-z0-9]+$/;
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