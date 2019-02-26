 <?php
if(!defined('WY_ROOT')) exit;
?>
<?php if(_G('add_suc')): ?><div class="actived">保存成功</div><?php endif; ?>
<?php if(_G('add_err')): ?><div class="error">保存失败</div><?php endif; ?>
<?php if(_G('edit_suc')): ?><div class="actived">保存成功</div><?php endif; ?>
<?php if(_G('edit_err')): ?><div class="error">保存失败</div><?php endif; ?>
<script>setTimeout(hideMsg,2600)</script>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 通道管理  <span>&raquo;</span> 接入商信息</div>
<div class="main">
<form name="add" action="?action=add" method="post">
<table class="tableaccess">
<tr>
<td colspan="2" class="bg bold">添加新的接入商</td>
</tr>
<tr>
<td width="100" class="right">接入商名称</td>
<td><input type="text" name="accessName" class="input" size="40" /></td>
</tr>
<tr>
<td width="100" class="right">接入商编号</td>
<td><input type="text" name="accessType" class="input" size="40" /></td>
</tr>
<tr>
<td width="100" class="right">邮箱账号</td>
<td><input type="text" name="email" class="input" size="40" /></td>
</tr>
<tr>
<td width="100" class="right">接入ID</td>
<td><input type="text" name="accessID" class="input" size="40" /></td>
</tr>
<tr>
<td width="100" class="right">接入密钥</td>
<td><input type="text" name="accessKey" class="input" size="40" /></td>
</tr>
<tr>
<td width="100" class="right"></td>
<td><input type="submit" class="button_bg_2" value="保存设置" /></td>
</tr>
</table>
</form>

<?php
if($lists):
foreach($lists as $key=>$val):
?>
<div id="a_<?php echo $val['id'] ?>">
<div class="h10"></div>
<form name="<?php echo $val['accessType'] ?>" action="?action=save&id=<?php echo $val['id'] ?>" method="post">
<table class="tableaccess">
<tr>
<td colspan="2" class="bg bold"><?php echo $val['accessName'] ?></td>
</tr>
<tr>
<td width="100" class="right">邮箱账号</td>
<td><input type="text" name="email" class="input" size="40" value="<?php echo $val['email'] ?>" /></td>
</tr>
<tr>
<td width="100" class="right">接入ID</td>
<td><input type="text" name="accessID" class="input" size="40" value="<?php echo $val['accessID'] ?>" /></td>
</tr>
<tr>
<td width="100" class="right">接入密钥</td>
<td><input type="text" name="accessKey" class="input" size="40" value="<?php echo $val['accessKey'] ?>" /></td>
</tr>
<tr>
<td width="100" class="right"></td>
<td><input type="submit" class="button_bg_2" value="保存设置" />&nbsp;&nbsp;<a href="javascript:void(0)" onclick="delData(<?php echo $val['id'] ?>)">移除</a></td>
</tr>
</table>
</form>
</div>
<?php
endforeach;
endif;
?>
</div>

<script>
var delData=function(id){
	if(confirm('是否要 移除 此接入商信息？')){
        $.get('accessProvider.php',{action:'del',id:id},function(data){
	        if(data=='ok'){
			    $('#a_'+id).fadeOut();
			}
	    })
	}
}
</script>