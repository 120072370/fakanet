<?php
if(!defined('WY_ROOT')) exit;
?>
<form name="edit" method="post" onsubmit="return checkForm()" action="?action=editsave&id=<?php echo $id ?>">
<table class="register">
<tr>
<td class="right">接入商</td>
<td>
<select name="accessProvider" onchange="select_gateway(this.options[this.selectedIndex].value)" class="input">
<option value="">请选择接入商</option>
<?php
if($accessProvider):
foreach($accessProvider as $key=>$val):
?>  
<option value="<?php echo $val['accessType'] ?>" <?php echo $val['accessType']==$accessType ? 'selected' : '' ?>><?php echo $val['accessName'] ?></option>
<?php
endforeach;
endif;
?>
</select>
<span id="gateway<?php echo $id ?>"></span>
<span class="err_msg" id="err_msg_5"></span>
</td>
</tr>

<tr>
<td width="60" class="right">设置状态</td>
<td>
<select name="is_state" class="input">
<option value="0" <?php echo $is_state==0 ? 'selected' : '' ?>>正式开通</option>
<option value="1" <?php echo $is_state==1 ? 'selected' : '' ?>>暂时关闭</option>
</select>
</td>
</tr>

<tr>
<td class="right">通道名称</td>
<td><input type="text" name="channelname" class="input" size="40" maxlength="50" value="<?php echo $channelname ?>" /> <span class="err_msg" id="err_msg_1"></span></td>
</tr>

<tr>
<td class="right">商户分成</td>
<td><input type="text" name="price" class="input" size="40" maxlength="6" value="<?php echo $price ?>" /> <span class="err_msg" id="err_msg_2"></span></td>
</tr>

<tr>
<td class="right">平台分成</td>
<td><input type="text" name="platformPrice" class="input" size="40" maxlength="6" value="<?php echo $platformPrice ?>" /> <span class="err_msg" id="err_msg_3"></span></td>
</tr>

<tr>
<td class="right">排序</td>
<td><input type="text" name="sortid" class="input" size="40" maxlength="6" value="<?php echo $sortid ?>" /> <span class="err_msg" id="err_msg_4"></span></td>
</tr>

<tr>
<td class="right">卡密位数</td>
<td><input type="text" name="cardlength" class="input" size="40" maxlength="6" value="<?php echo $cardlength ?>" /></td>
</tr>

<tr>
<td class="right"></td>
<td><input type="submit" class="button_bg_2" value="保存通道" /> <span id="returnMsg"></span></td>
</tr>
</table>
</form>

<script>
var select_gateway=function(accessType){//获取所有网关
	$('#gateway').html('<img src="views/images/load.gif" align="absmiddle"> 正在载入网关...');
	var gateway='<?php echo isset($gateway) ? $gateway : '' ?>';
	var id=<?php echo isset($id) ? $id : 0 ?>;
    if(accessType!=''){
	    $.get('channels.php',{action:'getGateway',accessType:accessType,gateway:gateway,id:id},function(data){			
		    $('#gateway'+id).html(data);
		})
	} else {
		$('#gateway'+id).html('');
		}
}

select_gateway('<?php echo $accessType ?>');

  var checkForm=function(){
    var accessProvider=$.trim($('[name=accessProvider]').val());
	if(accessProvider==''){
	  $('#err_msg_5').html('请选择接入商！').show();
	  $('[name=accessProvider]').focus();
	  return false;
	}
	if($('#err_msg_5').html()!=''){$('#err_msg_5').html('').hide();}

    var gateway=$.trim($('[name=gateway]').val());
	if(gateway==''){
	  $('#err_msg_5').html('请选择接入网关！').show();
	  $('[name=gateway]').focus();
	  return false;
	}
	if($('#err_msg_5').html()!=''){$('#err_msg_5').html('').hide();}

    var channelname=$.trim($('[name=channelname]').val());
	if(channelname==''){
	  $('#err_msg_1').html('通道名称不能为空！').show();
	  $('[name=channelname]').focus();
	  return false;
	}
	if($('#err_msg_1').html()!=''){$('#err_msg_1').html('').hide();}

    var price=$.trim($('[name=price]').val());
	if(price==''){
	  $('#err_msg_2').html('分成金额不能为空！').show();
	  $('[name=price]').focus();
	  return false;
	}
	if($('#err_msg_2').html()!=''){$('#err_msg_2').html('').hide();} 
  }
</script>