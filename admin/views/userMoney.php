<?php if(!defined('WY_ROOT')) exit;?>
<?php if(_G('add_suc')): ?><div class="actived">结算成功</div><?php endif ?>
<?php if(_G('add_err_1')): ?><div class="error">参数不完整</div><?php endif ?>
<?php if(_G('add_err_2')): ?><div class="error">商户不存在</div><?php endif ?>
<?php if(_G('add_err_3')): ?><div class="error">商户余额为0，暂不能结算</div><?php endif ?>
<?php if(_G('add_err_4')): ?><div class="error">商户余额不足，暂不能结算</div><?php endif ?>

 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 结算管理  <span>&raquo;</span> 商户结算</div>
<div class="main">
<!--####新建信息####-->
<form name="s" method="get" action="">
商户信息：<input type="text" name="username" class="input" maxlength="20" size="20" value="<?php echo $username ?>" />&nbsp;&nbsp;
<input type="submit"  class="button_bg_2" value="查询结算" />
<input type="hidden" name="do" value="search" />

<input type="button" onClick="Boxy.load('?action=add',{title:'为商户结算'})" class="button_bg_2" value="新建结算">&nbsp;&nbsp;
<a href="usermoney.php"<?php echo $ctype=='' ? ' class="bold"' : '' ?>>全部</a>
<?php foreach($userCtype as $key=>$val): ?>
    | <a href="?ctype=<?php echo $key ?>"<?php echo $ctype==$key ? ' class="bold"' : '' ?>><?php echo $val ?></a>
<?php endforeach; ?>
</form>
<div class="h10"></div>
<!--####信息列表####-->
<table border="0" cellspacing="1" class="tablelist">
<tr>
<th class="bold">商户ID</th>
<th>商户名</th>
<th>收款人</th>
<th>收款方式</th>
<th>结算方式</th>
<th><a href="?sort=totalincome"<?php echo $sort=='totalincome' ? ' style="color:#cc3333"' : '' ?> title="按总收入金额降序">总收入</a></th>
<th><a href="?sort=paid"<?php echo $sort=='paid' ? ' style="color:#cc3333"' : '' ?> title="按已结算金额降序">已结算</a></th>
<th><a href="?sort=unpaid"<?php echo $sort=='unpaid' ? ' style="color:#cc3333"' : '' ?> title="按未结算金额降序">未结算</a></th>
<th>操作</th>
</tr>

<?php
if($lists): 
foreach($lists as $key=>$row):
?>
<tr class="lightbox">
<td class="center"><?php echo $row['userid'] ?></td>

<td class="bold center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>',{title:'查看商户<?php echo $row['username'] ?>基本信息'})" title="查看商户<?php echo $row['username'] ?>基本信息"><?php echo $row['username'] ?></a></td>

<td class="bold center"><a href="javascript:void(0)" onclick="Boxy.load('userInfo.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>',{title:'商户<?php echo $row['username'] ?>收款信息'})" title="商户<?php echo $row['username'] ?>收款信息"><?php echo $row['realname'] ?></a></td>

<td class="center" ><a href="javascript:void(0)" style="color:red" onclick="Boxy.load('userInfo.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>&t=1',{title:'商户<?php echo $row['username'] ?>收款信息'})" title="商户<?php echo $row['username'] ?>收款信息"><?php echo $row['bank'] ?></a></td>
<?php 
$uc='style="color:green"';
  switch($row['ctype']){
	  case '2': $uc='style="color:blue"'; break;
	  case '3': $uc='style="color:red"'; break;
	  case '4': $uc='style="color:#ee1289"'; break;
	  case '5': $uc='style="color:#ee00ee"'; break;
	  case '6': $uc='style="color:#0099cc"'; break;
  }
?>
<td class="center">
      <a <?php echo $uc ?> href="javascript:void(0)" onclick="user_ctype_menu(<?php echo $row['userid'] ?>)">
	      <span><?php echo $userCtype[$row['ctype']] ?></span>
	  </a>
	  <ul class="user_status" style="margin-left:25px" id="user_ctype_<?php echo $row['userid'] ?>">
	      <?php foreach($userCtype as $key=>$cname): ?>
		  <li><a href="users.php?action=ctype&userid=<?php echo $row['userid'] ?>&t=<?php echo $key ?>"><?php echo $cname ?></a></li>
		  <?php endforeach; ?>
	  </ul>
</td>

<td class="bold blue"><?php echo number_format($row['paid']+$row['unpaid'],2,'.','') ?></td>

<td class="bold red"><?php echo number_format($row['paid'],2,'.','') ?></td>

<td class="bold green"><?php echo number_format($row['unpaid'],2,'.','') ?></td>

<td class="center" width="170">
	 <a href="javascript:void(0)" onclick="Boxy.load('?action=add&userid=<?php echo $row['userid'] ?>',{title:'为商户 [<?php echo $row['username'] ?>] 结算'})" <?php echo $row['flag'] ? 'style="color:red"' : '' ?> title="为商户<?php echo $row['username'] ?>结算">结算</a>

	<a href="payments.php?username=<?php echo $row['username'] ?>&do=search" target="_blank" title="查看商户<?php echo $row['username'] ?>的结算记录">详单</a>

	<a href="javascript:void(0)" onclick="Boxy.load('message.php?action=write&uname=<?php echo $row['username'] ?>',{title:'写短消息'})" title="给商户<?php echo $row['username'] ?>发送站内消息">消息</a>

	<a href="javascript:void(0)" onclick="Boxy.load('userInfo.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>',{title:'商户<?php echo $row['username'] ?>收款信息'})" title="商户<?php echo $row['username'] ?>收款信息">资料</a>

	<a href="users.php?action=loginusercenter&id=<?php echo $row['userid'] ?>" target="_blank" title="登陆到<?php echo $row['username'] ?>的商户中心" style="text-decoration:underline;color:#666">登陆</a>

	<a href="orders.php?is_status=s3&fdate=<?php echo date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y'))) ?>&tdate=<?php echo date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y'))) ?>&searchtype=t0&searchtext=<?php echo $row['username'] ?>&do=search" target="_blank" title="查看商户<?php echo $row['username'] ?>的订单列表">订单</a>
</td>
</tr>
<?php //endif; ?>
<?php endforeach;?>
<tr><td colspan="9" class="h30 graybg"><?php echo $pagelist ?></td></tr>
<?php endif; ?>
</table>
</div>

<script>
setTimeout(hideMsg,2600);
function user_ctype_menu(userid){
	$('td ul').hide();
	$('#user_ctype_'+userid).show();
}
</script>