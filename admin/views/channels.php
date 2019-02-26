 <?php
if(!defined('WY_ROOT')) exit;
?>
<?php if(_G('del_suc')): ?><div class="actived">删除成功</div><?php endif; ?>
<?php if(_G('del_err')): ?><div class="error">删除失败</div><?php endif; ?>
<?php if(_G('editsuc')): ?><div class="actived">修改保存成功</div><?php endif; ?>
<?php if(_G('edit_err')): ?><div class="error">修改保存失败</div><?php endif; ?>
<?php if(_G('add_suc')): ?><div class="actived">新建成功</div><?php endif; ?>
<?php if(_G('add_err')): ?><div class="error">新建失败</div><?php endif; ?>
<?php if(_G('c_suc')): ?><div class="actived">接入商切换成功</div><?php endif; ?>

 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 通道管理  <span>&raquo;</span> 通道列表</div>
<div class="main">
  <input type="button" onclick="Boxy.load('?action=add',{title:'新建支付通道'})" class="button_bg_2" value="新建通道">
  <?php if($accessProvider): ?>
  <select name="change" onchange="changeAccess()">
      <option value="">切换接入商</option>
	  <?php foreach($accessProvider as $key=>$val): ?>
	      <option value="<?php echo $val['accessType'] ?>"><?php echo $val['accessName'] ?></option>
	  <?php endforeach; ?>
  </select>
  <?php endif; ?>
  <!--#列表#-->
<div class="h10"></div>
<table class="tablelist" border="0" cellspacing="1">
<tr>
  <th class="center">选择</th>
  <th>通道ID</th>
  <th>通道名称</th>
  <th>接入商编号</th>
  <th>商户分成</th>
  <th>平台分成</th>
  <th class="center">状态</th>
  <th class="center">排序</th>
  <th class="center">操作</th>
</tr>
<form name="delall" method="post" action="?action=delall">
<?php
if($lists):
foreach($lists as $key=>$val):
$is_state= $val['is_state']==0 ? '<span style="color:green">已开通</span>' : '<span style="color:red">已关闭</span>' ;
?>
<tr class="lightbox" id="u_<?php echo $val['id'] ?>">
  <td class="center"><input type="checkbox" name="listsid[]" value="<?php echo $val['id'] ?>" /></td>
  <td class="bold"><?php echo $val['id'] ?></td>
  <td class="bold"><?php echo $val['channelname'] ?></td>
  <td><?php echo $val['accessType'] ?></td>
  <td><?php echo $val['price'] ?></td>
  <td><?php echo $val['platformPrice'] ?></td>
  <td class="center"><?php echo $is_state ?></td>
  <td class="center"><?php echo $val['sortid'] ?></td>
  <td class="center">
  <a href="javascript:void(0)" title="编辑" onclick="Boxy.load('?action=edit&id=<?php echo $val['id'] ?>',{title:'编辑通道 [<?php echo $val['channelname'] ?>]'})"><img src="views/images/ico_edit.png" alt="编辑" /></a>
  <a href="javascript:void(0)" title="删除" onclick="delData(<?php echo $val['id'] ?>)"><img src="views/images/ico_del.png" alt="删除" /></a>
  </td>
</tr>
<?php endforeach; ?>
<tr><td colspan="9" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" id="selectall" value="全选" />
<input type="button" class="button_bg_1" id="unselectall" value="反选" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行此操作？'))return false" />
</td></tr>
<tr><td colspan="9" class="h30 graybg"><?php echo $pagelist ?></td></tr>
<?php endif; ?>
</form>
</table>
</div>

<script>
var delData=function(id){
    if(confirm('是否要执行此操作？')){
		$.get('channels.php',{action:'del',id:id},function(data){
		    if(data=='ok'){
				$('tr#u_'+id).fadeOut();
			} else {
			    $('tr#u_'+id).css({'background-color':'red'});
			}
		})
    }
}

function changeAccess(){
   var ap=$('[name=change]').val();
   window.location.href='?action=changeAccess&t='+ap;
}

setTimeout(hideMsg,2600);
</script>