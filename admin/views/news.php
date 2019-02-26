<?php if(!defined('WY_ROOT')) exit;?>
<script charset="utf-8" src="views/editor4/kindeditor-min.js"></script>
<script charset="utf-8" src="views/editor4/lang/zh_CN.js"></script>
<?php if(_G('add_suc')): ?><div class="actived">文章添加成功</div><?php endif; ?>
<?php if(_G('add_err')): ?><div class="error">文章添加失败</div><?php endif; ?>
<?php if(_G('edit_suc')): ?><div class="actived">文章修改成功</div><?php endif; ?>
<?php if(_G('edit_err')): ?><div class="error">文章修改失败</div><?php endif; ?>
<?php if(_G('del_suc')): ?><div class="actived">文章删除成功</div><?php endif ?>
<?php if(_G('edit_suc')): ?><div class="actived">文章修改成功</div><?php endif ?>
<?php if(_G('del_err')): ?><div class="error">请选择要删除的文章</div><?php endif ?>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 文章管理  <span>&raquo;</span> 文章列表</div>
<div class="main">
<input type="button" onclick="javascript:location.href='?action=addNews'" class="button_bg_2" value="添加文章">
<select name="classid" onchange="window.location.href='news.php?classid='+$(this).val()">
<option value="">全部分类</option>
<?php
if($newsClass):
foreach($newsClass as $key=>$val):
?>
<option value="<?php echo $val['id'] ?>" <?php echo $classid==$val['id'] ? 'selected' : '' ?>><?php echo $val['classname'] ?></option>
<?php
endforeach;
endif;
?>
</select>
<div class="h10"></div>
<!--####信息列表####-->
<table class="tablelist" border="0" cellspacing="1">
<tr>
<th class="center">选择</th>
<th>类别</th>
<th>文章编号</th>
<th>标题</th>
<th class="center">自动弹出</th>
<th class="center">首页显示</th>
<th class="center">日期</th>
<th class="center">操作</th>
</tr>
<form name="list" method="post" action="?action=delall">
<?php 
if($lists):
foreach($lists as $key=>$row):
?>
<tr class="lightbox" id="u_<?php echo $row['id'] ?>">
<td class="center"><input type="checkbox" name="listid[]" class="checkbox" value="<?php echo $row['id'] ?>" /></td>
<td class="center"><?php echo $row['classname'] ?></td>
<td class="center"><?php echo $row['id'] ?></td>
<td><a href="../view.htm?id=<?php echo $row['id'] ?>" target="_blank"><span  style="color:#<?php echo $row['is_color'] ?><?php echo $row['is_bold']!='' ? ';font-weight:bold' : '' ?>"><?php echo $row['title'] ?></span></a></td>
<td class="center"><?php echo $row['is_popup'] ? '是' : '否' ?></td>
<td class="center"><?php echo $row['is_display_home'] ? '是' : '否' ?></td>
<td class="center"><?php echo $row['addtime'] ?></td>
<td class="center">
<a href="?action=edit&id=<?php echo $row['id'] ?>"><img src="views/images/ico_edit.png"></a>
<a href="javascript:void(0)" onclick="delData(<?php echo $row['id'] ?>)"><img src="views/images/ico_del.png"></a>
</td>
</tr>
<?php endforeach;?>
<tr><td colspan="8" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" value="全选" id="selectall" />
<input type="button" class="button_bg_1" value="反选" id="unselectall" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
</td></tr>
<tr><td colspan="8" class="h30 graybg"><?php echo $pagelist ?></td></tr>
</form>
<?php endif; ?>
</table>
</div>

<script>
var delData=function(id){
    if(confirm('是否要执行此操作？')){
		$.get('news.php',{action:'del',id:id},function(data){
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