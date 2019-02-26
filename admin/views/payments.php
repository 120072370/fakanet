<?php if(!defined('WY_ROOT')) exit;?>
<?php if(_G('del_suc')): ?><div class="actived">删除成功</div><?php endif ?>
<?php if(_G('edit_suc')): ?><div class="actived">修改成功</div><?php endif ?>
<?php if(_G('add_err')): ?><div class="error">新建失败</div><?php endif ?>
<?php if(_G('edit_err')): ?><div class="error">修改失败</div><?php endif ?>
<?php if(_G('del_err')): ?><div class="error">请选择要删除的记录</div><?php endif ?>
<script>
setTimeout(hideMsg,2600);
</script>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 结算管理  <span>&raquo;</span> 结算记录</div>
<div class="main">
<!--####搜索查询####-->
<form name="s" method="get" action="">
商户信息：<input type="text" name="username" class="input" maxlength="20" size="10" value="<?php echo $username ?>" />&nbsp;&nbsp;
流水号：<input type="text" name="snum" class="input" size="8" value="<?php echo $snum ? $snum : '' ?>" />&nbsp;&nbsp;
开始日期：<input type="text" name="fdate" class="input" id="txtDate" onclick="SelectDate(this)" size="12" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
至 <input type="text" name="tdate" class="input" id="txtDate1" onclick="SelectDate(this)" size="12" readonly="readonly" value="<?php echo $tdate ?>" />&nbsp;

类型：<select name="paycid" class="input">
<option value="" <?php if($paycid=='') echo 'selected'; ?>>所有</option>
<option value="t1" <?php if($paycid=='t1') echo 'selected'; ?>>平台结算</option>
<option value="t2" <?php if($paycid=='t2') echo 'selected'; ?>>商户提款</option>
</select>&nbsp;

处理状态：<select name="is_state" class="input">
<option value="" <?php if($is_state=='') echo 'selected'; ?>>所有</option>
<option value="s0" <?php if($is_state=='s0') echo 'selected'; ?>>待处理</option>
<option value="s1" <?php if($is_state=='s1') echo 'selected'; ?>>成功</option>
<option value="s2" <?php if($is_state=='s2') echo 'selected'; ?>>已取消</option>
</select>&nbsp;

银行：<select name="bank" class="input">
<option value=""<?php echo $bank=='' ? 'selected' : '' ?>>所有</option>
<?php foreach($selectBanks as $bankname): ?>
<option value="<?php echo $bankname ?>"<?php echo $bank==$bankname ? ' selected' : '' ?>><?php echo $bankname ?></option>
<?php endforeach; ?>
</select>&nbsp;

<input type="submit"  class="button_bg_2" value="查询结算" />&nbsp;&nbsp;
<input type="button" onclick="Boxy.load('?action=deldata&fdate=<?php echo $fdate ?>&tdate=<?php echo $tdate ?>&is_state=<?php echo $is_state ?>&paycid=<?php echo $paycid ?>&username=<?php echo $username ?>',{title:'清除结算记录',unloadOnHide:true})"  class="button_bg_2" value="清除记录" />
<input type="hidden" name="do" value="search" />
</form>
<div class="h10"></div>
<!--####信息列表####-->
<table border="0" cellspacing="1" class="tablelist">
<tr>
<th class="center">选择</th>
<th>商户编号</th>
<th>商户名</th>
<th>收款人</th>
<th>收款方式</th>
<th>金额</th>
<th>手续费</th>
<th>实际金额</th>
<th class="center">结算类型</th>
<th class="center">状态</th>
<th>备注说明</th>
<th>流水号</th>
<th class="center">日期</th>
<th class="center">操作</th>
</tr>

<?php
if($lists): 
foreach($lists as $key=>$row):
if($row['pid']==1) $paycid='<span style="color:green">平台结算</span>';
if($row['pid']==2) $paycid='<span style="color:blue">商户提款</span>' ;
?>
<form name="list" method="post" action="?action=delall">
<tr class="lightbox" id="u_<?php echo $row['id'] ?>">
<td class="center"><input type="checkbox" name="listid[]" class="checkbox" value="<?php echo $row['id'] ?>" /></td>
<td  class="center"><?php echo $row['userid'] ?></td>
<td class="bold center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>',{title:'查看商户<?php echo $row['username'] ?>基本信息'})" title="查看商户<?php echo $row['username'] ?>基本信息"><?php echo $row['username'] ?></a></td>
<td class="bold center"><a href="javascript:void(0)" onclick="Boxy.load('userInfo.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>',{title:'商户<?php echo $row['username'] ?>收款信息'})" title="商户<?php echo $row['username'] ?>收款信息"><?php echo $row['realname'] ?></a></td>

<td class="center" ><a href="javascript:void(0)" style="color:red" onclick="Boxy.load('userInfo.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>&t=1',{title:'商户<?php echo $row['username'] ?>收款信息'})" title="商户<?php echo $row['username'] ?>收款信息"><?php echo $row['bank'] ?></a></td>

<td><?php echo $row['money'] ?></td>
<td><?php echo $row['fee'] ?></td>
<td class="bold"><?php echo number_format($row['money']-$row['fee'],2) ?></td>
<td class="center"><?php echo $paycid ?></td>
<td class="center">
<!--<a href="javascript:void(0)" onclick="user_ctype_menu(<?php echo $row['id'] ?>)">-->
<?php 
switch($row['is_state']){
    //case '0': echo '<a href="?action=updateState&id='.$row['id'].'&t=1"><span class="blue">待处理</span></a>'; break;
    //case '1': echo '<a href="?action=updateState&id='.$row['id'].'&t=0"><span class="green">成功</span></a>'; break;
            case '0': echo '<span class="blue">待处理</span>'; break;
            case '1': echo '<span class="green">成功</span>'; break;
	case '2': echo '<span class="red">拒绝</span>'; break;	
}
?>
<!--</a>
      <ul class="user_status" style="width:60px" id="user_ctype_<?php echo $row['id'] ?>">
		  <li><a href="?action=updateState&id=<?php echo $row['id'] ?>&t=0">待处理</a></li>
		  <li><a href="?action=updateState&id=<?php echo $row['id'] ?>&t=1">成功</a></li>
		  <li><a href="?action=updateState&id=<?php echo $row['id'] ?>&t=2">拒绝</a></li>		  
	  </ul>
-->
</td>
<td><?php echo $row['remark'] ?></td>
<td class="center"><?php echo $row['id'] ?></td>
<td class="center"><span title="最后一次修改时间：<?php echo $row['updatetime'] ?>"><?php echo $row['addtime'] ?></span></td>
<td class="center">
	<a href="javascript:void(0)" onclick="Boxy.load('?action=edit&id=<?php echo $row['id'] ?>',{title:'修改结算信息',unloadOnHide:true})"><img src="views/images/ico_edit.png"></a>

    <a href="report.php?is_read=&is_state=&reason=&keyword=<?php echo $row['username'] ?>" target="_blank" style="text-decoration:underline;color:#666">查询举报</a>

	<a href="javascript:void(0)" onclick="delData(<?php echo $row['id'] ?>)"><img src="views/images/ico_del.png"></a> 

	<a href="javascript:void(0)" onclick="Boxy.load('message.php?action=write&uname=<?php echo $row['username'] ?>',{title:'写新消息',unloadOnHide:true})" title="给商户<?php echo $row['username'] ?>发送站内消息" style="text-decoration:underline;color:#666">消息</a> 

	<a href="javascript:void(0)" onclick="Boxy.load('userInfo.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>',{title:'商户<?php echo $row['username'] ?>收款信息',unloadOnHide:true})" title="商户<?php echo $row['username'] ?>收款信息">资料</a>

	<a href="users.php?action=loginusercenter&id=<?php echo $row['userid'] ?>" target="_blank" title="登陆到<?php echo $row['username'] ?>的商户中心" style="text-decoration:underline;color:#666">登陆</a>
</td>
</tr>
<?php endforeach;?>
<tr><td colspan="14" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" value="全选" id="selectall" />
<input type="button" class="button_bg_1" value="反选" id="unselectall" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
</td></tr>
<tr><td colspan="14" class="h30 whitebg">
今日结算总金额：<span class="red bold"><?php echo number_format($today_pay,2,'.','') ?></span>元&nbsp;
结算总金额：<span class="red bold"><?php echo number_format($total_pay,2,'.','') ?></span>元&nbsp;
结算手续费：<span class="red bold"><?php echo number_format($total_fee,2,'.','') ?></span>元&nbsp;
实结金额：<span class="red bold"><?php echo number_format($total_realmoney-$total_fee,2,'.','') ?></span>元
</td></tr>
<tr><td colspan="14" class="h30 graybg"><?php echo $pagelist ?></td></tr>
</form>
<?php endif; ?>
</table>
</div>

<script>
var delData=function(id){
    if(confirm('是否要执行此操作？')){
		$.get('payments.php',{action:'del',id:id},function(data){
		    if(data=='ok'){
				$('tr#u_'+id).fadeOut();
			} else {
			    $('tr#u_'+id).css({'background-color':'red'});
			}
		})
    }
}

function user_ctype_menu(id){
	$('td ul').hide();
	$('#user_ctype_'+id).show();
}
</script>