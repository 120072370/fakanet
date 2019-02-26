<?php
if(!defined('WY_ROOT'))exit;
?>

<?php if(_G('del_suc')): ?><div class="actived">删除成功</div><?php endif; ?>
<?php if(_G('del_err')): ?><div class="error">删除失败</div><?php endif; ?>
<script>
setTimeout(hideMsg,2600);
</script>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 商户管理  <span>&raquo;</span> 登陆日志</div>
<div class="main">
<!--####搜索查询####-->
<form name="s" method="get" action="">
用户名：
<input type="text" name="username" class="input" maxlength="20" size="10" value="<?php echo $username ?>" />&nbsp;

IP：
<input type="text" name="ip" class="input" maxlength="20" value="<?php echo $ip ?>" />&nbsp;

日期范围：<input type="text" name="fdate" class="input" id="txtDate" onclick="SelectDate(this)" size="12" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
至 <input type="text" name="tdate" class="input" id="txtDate1" onclick="SelectDate(this)" size="12" readonly="readonly" value="<?php echo $tdate ?>" />&nbsp;&nbsp;
<input type="submit"  class="button_bg_2" value="查询日志" />
<input type="button" onclick="Boxy.load('?action=deldata&username=<?php echo $username ?>&fdate=<?php echo $fdate ?>&tdate=<?php echo $tdate ?>',{title:'清除登陆日志'})"  class="button_bg_2" value="清除日志" />
<input type="hidden" name="do" value="search" />
</form>
  <!--#列表#-->
<div class="h10"></div>
<table class="tablelist" border="0" cellspacing="1">
<tr>
<th class="center">选择</th>
<th>用户名</th>
<th class="center">IP</th>
<th class="center">日期</th>
<th class="center">操作</th>
</tr>
<?php
if($lists): 
foreach($lists as $key=>$row):
?>
<form name="list" method="post" action="?action=delall">
<tr class="lightbox">
<td class="center"><input type="checkbox" name="listid[]" value="<?php echo $row['id'] ?>" /></td>
<td class="center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>',{title:'商户<?php echo $row['username'] ?>基本信息'})" title="商户<?php echo $row['username'] ?>基本信息" style="text-decoration:underline;color:#000"><?php echo $row['username'] ?></a></td>
<td class="center"><a href="http://www.baidu.com/s?wd=<?php echo $row['logip'] ?>" target="_blank" title="点击查看登陆IP来源"><?php echo $row['logip'] ?></a></td>
<td class="center"><?php echo $row['logtime'] ?></td>
<td class="center">
<a href="<?php echo "?action=del&id=".$row['id'] ?>" onclick="if(!confirm('是否要执行 删除 操作？'))return false"><img src="views/images/ico_del.png"></a>
</td>
</tr>
<?php endforeach;?>
<tr><td colspan="5" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" value="全选" id="selectall" />
<input type="button" class="button_bg_1" value="反选" id="unselectall" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
</td></tr>
<tr><td colspan="5" class="h30 graybg"><?php echo $pagelist ?></td></tr>
</form>
<?php endif; ?>
</table>
</div>