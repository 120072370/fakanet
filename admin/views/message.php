<?php if(!defined('WY_ROOT')) exit; ?>
<?php if(_G('add_suc')): ?><div class="actived">消息发送成功</div><?php endif; ?>
<?php if(_G('add_err')): ?><div class="error">消息发送失败</div><?php endif; ?>
<?php if(_G('del_suc')): ?><div class="actived">删除成功</div><?php endif; ?>
<?php if(_G('del_err')): ?><div class="error">删除失败</div><?php endif; ?>
<?php if(_G('del_err_1')): ?><div class="error">请选择要删除的记录</div><?php endif; ?>
<script>setTimeout(hideMsg,2600)</script>
<style>
#msg{float:right;position:relative;margin-top:-46px}
#msg a{display:inline-block;background:#f1f1f1;border:1px solid #ccc;padding:5px 10px}
#msg a.current{background:#fff;border-bottom:1px solid #fff;font-weight:bold}
</style>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 站内消息</div>
<div class="main">
<div id="msg">
<a href="message.php"<?php echo $action=='' ? ' class="current"' : '' ?>>收件箱</a>
<a href="message.php?action=outbox"<?php echo $action=='outbox' ? ' class="current"' : '' ?>>发件箱</a>
<a href="javascript:void(0)" onclick="Boxy.load('?action=write',{title:'写新消息',unloadOnHide:true})">写新消息</a>
<a href="javascript:void(0)" onclick="Boxy.load('?action=clear',{title:'清除消息',unloadOnHide:true})">清除消息</a>
</div>

<?php if($action==''): ?>
<a href="?action=setAllRead">全部设为已读</a>
<p class="h10"></p>
<form name="del" method="post" action="?action=delall">
<table class="tablelist" border="0" cellspacing="1">
<tr>
<th class="center">选择</th>
<th>标题</th>
<th class="center">发件人</th>
<th class="center">时间</th>
<th class="center">操作</th>
</tr>
<?php if($lists): ?>
<?php foreach($lists as $key=>$val): ?>
<tr class="lightbox">
<td class="center"><input type="checkbox" name="listid[]" value="<?php echo $val['id'] ?>" /></td>
<td><a href="javascript:void(0)" onclick="Boxy.load('?action=view&id=<?php echo $val['id'] ?>',{title:'<?php echo $val['title'] ?>',unloadOnHide:true})"<?php echo $val['is_read']==0 ? ' class="bold"' : '' ?>><?php echo $val['title'] ?></a></td>
<td class="center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $val['from_userid'] ?>',{title:'商户<?php echo $val['from_user'] ?>基本信息'})" title="商户<?php echo $val['from_user'] ?>基本信息" style="text-decoration:underline;color:#000"><?php echo $val['from_user'] ?></a></td>
<td class="center"><?php echo $val['addtime'] ?></td>
<td class="center">
    <a href="report.php?is_read=&is_state=&reason=&keyword=<?php echo $val['from_user'] ?>" target="_blank" style="text-decoration:underline;color:#666">查询举报</a>
    <a href="javascript:void(0)" onclick="Boxy.load('?action=write&uname=<?php echo $val['from_user'] ?>',{title:'写新消息',unloadOnHide:true})">回复</a>
    <a href="users.php?action=loginusercenter&id=<?php echo $val['from_userid'] ?>" target="_blank" title="登陆到<?php echo $val['username'] ?>的商户中心" style="text-decoration:underline;color:#666">登陆</a>
</td>
    
</tr>
<?php endforeach; ?>
<tr><td colspan="5" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" value="全选" id="selectall" />
<input type="button" class="button_bg_1" value="反选" id="unselectall" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
</tr>
<tr><td class="graybg h30 " colspan="5" style="text-align:left;padding-left:10px"><?php echo $pagelist ?></td></tr>
<?php else: ?>
<tr><td colspan="5" class="whitebg center">暂无消息</td></tr>
<?php endif; ?>
</table>
</form>
<?php endif; ?>

<?php if($action=='outbox'): ?>
<form name="del" method="post" action="?action=delall">
<table class="tablelist" border="0" cellspacing="1">
<tr>
<th class="center">选择</th>
<th>标题</th>
<th class="center">收件人</th>
<th class="center">时间</th>
    <th class="center">操作</th>
</tr>
<?php if($lists): ?>
<?php foreach($lists as $key=>$val): ?>
<tr class="lightbox">
<td class="center"><input type="checkbox" name="listid[]" value="<?php echo $val['id'] ?>" /></td>
<td><a href="javascript:void(0)" onclick="Boxy.load('?action=view&id=<?php echo $val['id'] ?>',{title:'<?php echo $val['title'] ?>',unloadOnHide:true})"><?php echo $val['title'] ?></a></td>
<td class="center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $val['to_userid'] ?>',{title:'商户<?php echo $val['to_user'] ?>基本信息',unloadOnHide:true})" title="商户<?php echo $val['to_user'] ?>基本信息" style="text-decoration:underline;color:#000"><?php echo $val['to_user'] ?></a>
<td class="center">
         <a href="users.php?action=loginusercenter&id=<?php echo $val['to_userid'] ?>" target="_blank" title="登陆到<?php echo $val['username'] ?>的商户中心" style="text-decoration:underline;color:#666">登陆</a>
</td>
</td>
<td class="center"><?php echo $val['addtime'] ?></td>
</tr>
<?php endforeach; ?>
<tr><td colspan="4" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" value="全选" id="selectall" />
<input type="button" class="button_bg_1" value="反选" id="unselectall" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
</tr>
<tr><td class="graybg h30" colspan="4"><?php echo $pagelist ?></td></tr>
<?php else: ?>
<tr><td colspan="4" class="whitebg center">暂无消息</td></tr>
<?php endif; ?>
</table>
</form>
<?php endif; ?>
</div>