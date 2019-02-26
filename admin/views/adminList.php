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

 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 账户管理  <span>&raquo;</span> 账户列表</div>
<div class="main">
  <input type="button" onclick="javascript:location.href='?action=add'" class="button_bg_2" value="新建账号" />
  <!--#列表#-->
<div class="h10"></div>
<table class="tablelist" border="0" cellspacing="1">
<tr>
  <th class="center">选 择</th>
  <th>账号编号</th>
  <th>管理员账号名</th>
  <th>账号类型</th>
  <th>登陆IP限制</th>
  <th>注册时间</th>
  <th>最后一次登陆IP</th>
  <th class="center">状 态</th>
  <th class="center">操 作</th>
</tr>
<form name="delall" method="post" action="?action=delall">
<?php
if($lists):
foreach($lists as $key=>$val):
$is_state= $val['is_state']==0 ? '<span style="color:green">已开通</span>' : '<span style="color:red">未审核</span>' ;
$usertype= $val['utype']==1 ? '总管理员' :'子管理员';
if($val['is_verifyip']==0){
    $is_verifyip='未设置';
} elseif($val['is_verifyip']==1){
    $is_verifyip='限IP';
} elseif($val['is_verifyip']==2){
    $is_verifyip='限IP段';
}
?>
<tr class="lightbox" id="u_<?php echo $val['id'] ?>">
  <td class="center"><input type="checkbox" name="listsid[]" value="<?php echo $val['id'] ?>" /></td>
  <td><?php echo $val['id'] ?></td>
  <td><?php echo $val['username'] ?></td>
  <td><?php echo $usertype ?></td>
  <td><?php echo $is_verifyip ?></td>
  <td><span title="最后一次登陆时间：<?php echo $val['lastlogtime'] ?>"><?php echo $val['addtime'] ?></span></td>
  <td><a href="http://www.baidu.com/s?wd=<?php echo $val['lastlogip'] ?>" target="_blank" title="点击查看登陆IP来源"><?php echo $val['lastlogip'] ?></a></td>
  <td class="center" width="50"><?php echo $is_state ?></td>
  <td class="center" width="80">
	  <a href="?action=adminlogs&username=<?php echo $val['username'] ?>" title="查看登陆日志"><img src="views/images/ico_info.png" alt="查看登陆日志" align="absmiddle" /></a>

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
		$.get('adminList.php',{action:'del',id:id},function(data){
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