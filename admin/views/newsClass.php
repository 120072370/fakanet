<?php if(!defined('WY_ROOT')) exit;?>
<?php if(_G('add_suc')): ?><div class="actived">分类新建成功！</div><?php endif ?>
<?php if(_G('del_suc')): ?><div class="actived">分类删除成功！</div><?php endif ?>
<?php if(_G('edit_suc')): ?><div class="actived">分类修改成功！</div><?php endif ?>
<?php if(_G('add_err')): ?><div class="error">分类新建失败！</div><?php endif ?>
<?php if(_G('del_err')): ?><div class="error">请选择要删除的记录！</div><?php endif ?>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 文章管理  <span>&raquo;</span> 文章分类</div>
<div class="main">
<input type="button" onClick="addClass()" class="button_bg_2" value="新建分类">
<div class="h10"></div>

<div id="addClass" style="display:none;margin-bottom:10px">
<form name="add" method="post" action="?action=add">
<input type="text" class="input" name="cname" size="30" maxlength="30" />
<input type="submit" class="button_bg_2" value="保存分类" />
</form>
</div>
<table class="tablelist" border="0" cellspacing="1">
<tr>
<th>分类ID</th>
<th>分类名称</th>
<th class="center">操作</th>
</tr>

<?php
if($lists): 
foreach($lists as $key=>$row):
?>
<form name="list" method="post" action="?action=delall">
<tr class="lightbox">
<td class="center"><?php echo $row['id'] ?></td>
<td><?php echo $row['classname'] ?></td>
<td class="center">
<a href="?action=edit&id=<?php echo $row['id'] ?>"><img src="views/images/ico_edit.png"></a>
<a href="?action=del&id=<?php echo $row['id'] ?>" onclick="if(!confirm('是否要执行 删除 操作？'))return false"><img src="views/images/ico_del.png"></a>
</td>
</tr>
<?php endforeach;?>
</form>
<?php endif; ?>
</table>
<script>
var addClass=function(){
	$('#addClass').toggle();
	}

setTimeout(hideMsg,2600);
$('#addClass [type=submit]').click(function(){
	var $ob=$('[name=cname]');
	var $cname=$.trim($ob.val());
	if($cname==''){
		alert('分类名称不能为空！');
		$ob.focus();
		return false;
		}
	else{
		var reg1=/[^\a-zA-Z\u4e00-\u9fa5]/g;
		if(reg1.test($cname)){
			alert('分类名称只能是汉字或字母！');
			$ob.focus();
			return false;
			}
		}
	})
</script>
</div>