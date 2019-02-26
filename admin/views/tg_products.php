 <?php
if(!defined('WY_ROOT')) exit;
?>
<?php if(_G('del_suc')): ?><div class="actived">删除成功</div><?php endif; ?>
<?php if(_G('del_err')): ?><div class="error">删除失败</div><?php endif; ?>
<?php if(_G('add_err_1')): ?><div class="error">账户资料填写不完整</div><?php endif; ?>
<?php if(_G('add_err_2')): ?><div class="error">账户已存在</div><?php endif; ?>
<?php if(_G('add_suc')): ?><div class="actived">账户创建成功</div><?php endif; ?>
<?php if(_G('edit_suc')): ?><div class="actived">修改保存成功</div><?php endif; ?>
<?php if(_G('edit_err')): ?><div class="error">修改保存失败</div><?php endif; ?>

 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 分销推广  <span>&raquo;</span> 商品列表</div>
<div class="main">
  <input type="button" onclick="javascript:location.href='?action=add'" class="button_bg_2" value="添加商品" />
  <!--#列表#-->
<div class="h10"></div>
<table class="tablelist" border="0" cellspacing="1">
<tr>
  <th class="center">选 择</th>
  <th>编号</th>
  <th>商品名称</th>
  <th>链接</th>
  <th>会员分成</th>
  <th>平台分成</th>
  <th class="center">操 作</th>
</tr>
<form name="delall" method="post" action="?action=delall">
<?php
if($lists):
foreach($lists as $key=>$val):
?>
<tr class="lightbox" id="u_<?php echo $val['id'] ?>">
  <td class="center"><input type="checkbox" name="listsid[]" value="<?php echo $val['id'] ?>" /></td>
  <td><?php echo $val['id'] ?></td>
  <td><?php echo $val['title'] ?></td>
  <td><?php echo $val['url'] ?></td>
  <td><?php echo $val['fencheng1'] ?></td>
  <td><?php echo $val['fencheng2'] ?></td>
  <td class="center" width="80">

	  <a href="?action=edit&id=<?php echo $val['id'] ?>" title="编辑"><img src="views/images/ico_edit.png" alt="编辑" align="absmiddle" /></a>

	  <a href="javascript:void(0)" title="删除" onclick="delUser(<?php echo $val['id'] ?>)"><img src="views/images/ico_del.png" alt="删除"  align="absmiddle" /></a>
  </td>
</tr>
<?php endforeach; ?>
<tr><td colspan="9" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" id="selectall" value="全选" />
<input type="button" class="button_bg_1" id="unselectall" value="反选" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行此操作？'))return false" />
</td></tr>
<tr><td colspan="9" class="h30 graybg"><?php echo $PageList ?></td></tr>
<?php endif; ?>
</form>
</table>
</div>

<script>
var delUser=function(id){
    if(confirm('是否要执行此操作？')){
		$.get('tg_products.php',{action:'del',id:id},function(data){
		    if(data=='ok'){
				$('tr#u_'+id).fadeOut();
			} else {
			    $('tr#u_'+id).css({'background-color':'red'});
			}
		})
    }
}

setTimeout(hideMsg,2600);
</script>