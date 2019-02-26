 <?php
if(!defined('WY_ROOT')) exit;
?>
<?php if(_G('edit_suc')): ?><div class="actived">修改成功</div><?php endif; ?>
<?php if(_G('edit_err')): ?><div class="error">修改失败</div><?php endif; ?>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 商户管理  <span>&raquo;</span> 接入信息</div>
<div class="main">
  <div>
      <form name="search" method="get" action="">
	  <input type="hidden" name="do" value="search" />
	  结算类型：<select name="ctype">
		  <option value="" <?php echo $ctype=='' ? 'selected' : '' ?>>全部</option>
		  <option value="1" <?php echo $ctype=='1' ? 'selected' : '' ?>>自动结算</option>
		  <option value="2" <?php echo $ctype=='2' ? 'selected' : '' ?>>商户提现</option>
	  </select>
	  用户状态：<select name="is_state">
		  <option value="s" <?php echo $is_state=='s' ? 'selected' : '' ?>>全部</option>
		  <option value="s0" <?php echo $is_state=='s0' ? 'selected' : '' ?>>已审核</option>
		  <option value="s1" <?php echo $is_state=='s1' ? 'selected' : '' ?>>未审核</option>
	  </select>
      <input type="text" name="keyword" size="30" class="input" value="<?php echo $keyword ?>" />
	  <input type="submit" class="button_bg_2" value="查询商户" />
	  </form>
  </div>
  <!--#列表#-->
<div class="h10"></div>
<table class="tablelist" border="0" cellspacing="1">
<tr>
  <th>商户ID</th>
  <th>商户名</th>
  <th>真实姓名</th>
  <th class="center">收款方式</th>
  <th class="center">安全问题</th>
  <th class="center">安全密码</th>
  <th class="center">唯一登陆</th>
  <th class="center">密保口令卡</th>
  <th class="center">操作</th>
</tr>

<?php
if($lists):
foreach($lists as $key=>$val):
switch($val['ptype']){
    case '1': $ptype='银行转账';break;
	case '2': $ptype='支付宝转账';break;
	case '3': $ptype='财付通转账';break;
    case '4': $ptype='微信钱包支付';break;
	default: $ptype='未设置';
}
?>
<tr class="lightbox" id="u_<?php echo $val['id'] ?>">
  <td class="bold center"><?php echo $val['userid'] ?></td>
  <td class="bold center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $val['userid'] ?>',{title:'查看商户<?php echo $val['username'] ?>基本信息'})" title="查看商户<?php echo $val['username'] ?>基本信息"><?php echo $val['username'] ?></a></td>
  <td class="bold center"><?php echo $val['realname'] ?></td>
  <td class="center"><?php echo $ptype ?></td>
  <td class="center"><?php echo $val['question']!='' ? '<span class="green">已设置</span>' : '<span class="gray">未设置</span>' ?></td>
  <td class="center"><?php echo $val['is_safe']==1 ? '<span class="green">已设置</span>' : '<span class="gray">未设置</span>' ?></td>
  <td class="center"><?php echo $val['is_login']==1 ? '<span class="green">已设置</span>' : '<span class="gray">未设置</span>' ?></td>
  <td class="center">
      <?php 
	      switch($val['is_pwcard']){
		      case '0': echo '<span class="gray">未初始化</span>';break;
			  case '1': echo '<span class="green">已开启</span>';break;
			  case '2': echo '<span class="gray">未开启</span>';break;
		  }
     ?></td>

  <td class="center">
  <a href="javascript:void(0)" onclick="Boxy.load('message.php?action=write&uname=<?php echo $val['username'] ?>',{title:'写短消息'})" title="给商户<?php echo $val['username'] ?>发送站内消息">消息</a>

  <a href="javascript:void(0)" title="编辑" onclick="Boxy.load('?action=edit&id=<?php echo $val['userid'] ?>',{title:'修改商户[<?php echo $val['username'] ?>]接入信息'})"><img src="views/images/ico_edit.png" alt="编辑" /></a>
  </td>
</tr>
<?php endforeach; ?>
<tr><td colspan="10" class="h30 graybg"><?php echo $PageList ?></td></tr>
<?php endif; ?>
</table>
</div>

<script>
setTimeout(hideMsg,2600);
</script>