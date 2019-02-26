<?php if(!defined('WY_ROOT')) exit; ?>
	<div id="msg_tip">
	    <div style="text-align:center">
			<form name="pw" action="<?php echo $url ?>" method="post" onsubmit="return checkForm()">
			<table style="width:390px;margin:auto">
			<tr>
			<td><?php echo $msg ?></td>
			<td><input type="text" name="pwd" style="border:1px solid #999;padding:5px" maxlength="20" /></td>
			<td><span style="margin-top:30px"><input type="image" src="tpl/default/images/search_button_2.gif" style="border:0;"></span></td>
			</tr>
			</table>
			</form>
		</div>
	</div>
	<script>
	     function checkForm(){
		     var pwd=$.trim($('[name=pwd]').val());
			 var reg=/^([0-9a-zA-Z]+){6,20}$/;
			 if(pwd=='' || !reg.test(pwd)){
			     $('[name=pwd]').focus();
				 alert('请填写查询密码！长度为6-20个数字、字母或组合！');
				 return false;
			 }
		 }
	</script>