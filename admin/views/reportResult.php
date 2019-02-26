<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding:10px;width:350px;">
<table>
<tr>
<td class="right">内容：</td>
<td><textarea name="content_<?php echo $id ?>" cols="34" rows="5" class="input"></textarea></td>
</tr>

<tr>
<td class="right"></td>
<td>
<input type="hidden" name="id_<?php echo $id ?>" value="<?php echo $id ?>" />
<input type="submit" onclick="checkForm()" class="button_bg_2" value="保存结果" /> <span id="msgtip"></span></td>
</tr>
</table>
</div>

<script>
var checkForm=function(){

    var content=$.trim($('[name=content_<?php echo $id ?>]').val());
	if(content==''){
	    alert('消息内容不能为空！');
		$('[name=content]').focus();
		return false;
	}

	var id=$('[name=id_<?php echo $id ?>]').val();
	$('#msgtip').html('<img src="views/images/load.gif" align="absmiddle"> 请稍候，正在保存...');
	$.get('report.php',{action:'save',id:id,content:content,t:new Date().getTime()},function(data){
	    
		if(data=='ok'){
			$('#msgtip').html('');
		    alert('处理结果保存成功！');
		} else {
			$('#msgtip').html('');
		    alert('处理结果保存失败！');
		}
	})
}
</script>