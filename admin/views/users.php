 <?php
if(!defined('WY_ROOT')) exit;
?>
<?php if(_G('del_suc')): ?><div class="actived">删除成功</div><?php endif; ?>
<?php if(_G('del_err')): ?><div class="error">删除失败</div><?php endif; ?>
<?php if(_G('add_err_1')): ?><div class="error">商户资料填写不完整</div><?php endif; ?>
<?php if(_G('add_err_2')): ?><div class="error">商户已存在</div><?php endif; ?>
<?php if(_G('add_suc')): ?><div class="actived">商户创建成功</div><?php endif; ?>
<?php if(_G('edit_suc')): ?><div class="actived">修改保存成功</div><?php endif; ?>
<?php if(_G('edit_err')): ?><div class="error">修改保存失败</div><?php endif; ?>

 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 商户管理  <span>&raquo;</span> 商户列表</div>
<div class="main">  
  <form name="search" method="get" action="">
  <input type="hidden" name="do" value="search" />
  结算类型：<select name="ctype">
	  <option value="" <?php echo $ctype=='' ? 'selected' : '' ?>>全部</option>
	  <?php foreach($userCtype as $key=>$val): ?>
	  <option value="<?php echo $key ?>" <?php echo $ctype==$key ? 'selected' : '' ?>><?php echo $val ?></option>
	  <?php endforeach; ?>
  </select>
  <input type="text" name="keyword" size="30" class="input" value="<?php echo $keyword ?>" />
  <input type="submit" class="button_bg_2" value="查询商户" /> 
  <!--<input type="button" onclick="javascript:location.href='?action=add'" class="button_bg_2" value="新建商户" />-->
  <input type="button" onclick="Boxy.load('?action=deldata',{title:'清除注册商户'})"  class="button_bg_2" value="清除商户" />&nbsp;
  <a href="users.php"<?php echo $t=='' ? ' style="font-weight:bold"' : '' ?>>全部</a> | 
  <a href="?ctype=<?php echo $ctype ?>&keyword=<?php echo $keyword ?>&t=st0&p=<?php echo $page ?>"<?php echo $t=='st0' ? ' style="font-weight:bold"' : '' ?>>已审核</a> | 
  <a href="?ctype=<?php echo $ctype ?>&keyword=<?php echo $keyword ?>&t=st1&p=<?php echo $page ?>"<?php echo $t=='st1' ? ' style="font-weight:bold"' : '' ?>>未审核</a> | 
  <a href="?ctype=<?php echo $ctype ?>&keyword=<?php echo $keyword ?>&t=st2&p=<?php echo $page ?>"<?php echo $t=='st2' ? ' style="font-weight:bold"' : '' ?>>已冻结</a>
 
  </form>	  

  <!--#列表#-->
<div class="h10"></div>
<table class="tablelist" border="0" cellspacing="1">
<tr>
  <th class="center">选 择</th>
  <th>商户ID</th>
  <th>商户名</th>
  <th>收款人</th>
  <th>结算方式</th>
  <th>联系电话</th>
  <th>QQ</th>
    <th>级别</th>
  <th>注册时间</th>
  <th>最后一次登陆IP</th>
  <th>上级</th>
  <th width="50">公告</th>
  <!--<th width="50">提现</th>-->
  <th class="center" width="50">状 态</th>
      <th class="center" width="50">微信绑定状态</th>
  <th class="center" width="50">实名认证状态</th>
  <th class="center">操 作</th>
</tr>
<form name="delall" method="post" action="?action=delall">
<?php
if($lists):
foreach($lists as $key=>$val):
	switch($val['is_state']){
		case '0': $is_state='<a href="javascript:void(0)" onclick="user_status_menu('.$val['id'].')"><span style="color:green">已开通</span></a>'; break;
		case '1': $is_state='<a href="javascript:void(0)" onclick="user_status_menu('.$val['id'].')"><span style="color:red">未审核</span></a>'; break;
		case '2': $is_state='<a href="javascript:void(0)" onclick="user_status_menu('.$val['id'].')"><span style="color:red">已冻结</span></a>'; break;
	}

$is_apply_settlement= $val['is_apply_settlement']==1 ? '<a href="?action=applyforuser&userid='.$val['id'].'&t=0" title="关闭商户提现"><span style="color:green">已开通</span></a>' : '<a href="?action=applyforuser&userid='.$val['id'].'&t=1" title="允许商户提现"><span style="">未开启</span></a>' ;

?>
<tr class="lightbox" id="u_<?php echo $val['id'] ?>">

  <td class="center"><input type="checkbox" name="listsid[]" value="<?php echo $val['id'] ?>" /></td>
  <td class="center"><?php echo $val['id'] ?></td>

  <td class="center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $val['id'] ?>',{title:'商户<?php echo $val['username'] ?>基本信息'})" title="商户<?php echo $val['username'] ?>基本信息" style="text-decoration:underline;color:#000"><?php echo $val['username'] ?></a></td>

  <td class="bold center"><a href="javascript:void(0)" onclick="Boxy.load('userInfo.php?action=getuserinfo&userid=<?php echo $val['id'] ?>',{title:'商户<?php echo $val['username'] ?>收款信息'})" title="商户<?php echo $val['username'] ?>收款信息"><?php echo $val['realname'] ?></a></td>

<?php 
$uc='style="color:green"';
  switch($val['ctype']){
	  case '2': $uc='style="color:blue"'; break;
	  case '3': $uc='style="color:red"'; break;
	  case '4': $uc='style="color:#ee1289"'; break;
	  case '5': $uc='style="color:#ee00ee"'; break;
	  case '6': $uc='style="color:#0099cc"'; break;
  }
?>
  <td class="center">
      <a  <?php echo $uc ?> href="javascript:void(0)" onclick="user_ctype_menu(<?php echo $val['id'] ?>)">
	      <span ><?php echo $userCtype[$val['ctype']] ?></span>
	  </a>
	  <ul class="user_status" id="user_ctype_<?php echo $val['id'] ?>">
	      <?php foreach($userCtype as $key=>$cname):  ?>
		  <li><a href="?action=ctype&userid=<?php echo $val['id'] ?>&t=<?php echo $key ?>"><?php echo $cname ?></a></li>
		  <?php endforeach; ?>
	  </ul>
  </td>

  <td class="center"><?php echo $val['tel'] ?></td>

  <td class="center"><a target="blank" href="tencent://message/?uin=<?php echo $val['qq'] ?>&Site=&Menu=yes" title="点击直接QQ会话" style="text-decoration:underline;color:#666"><?php echo $val['qq'] ?></a></td>
      <td class="center"><?php echo GetUserLevel($val['level']).'/'.$val['level'] ?></td>

  <td class="center"><span title="最后一次登陆时间：<?php echo $val['lastlogtime'] ?>"><?php echo $val['addtime'] ?></span></td>

  <td class="center"><a href="http://www.baidu.com/s?wd=<?php echo $val['lastlogip'] ?>" target="_blank" title="点击查看登陆IP来源" style="text-decoration:underline;color:#666"><?php echo $val['lastlogip'] ?></a></td>

  <td class="center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $val['superman'] ?>',{title:'商户信息'})" style="text-decoration:underline;color:#000"><?php echo $val['superman'] ?></a></td>

  <td class="center">
    <?php if($val['is_user_popup']): ?>
        <a href="javascript:void(0)" onclick="user_popup_menu(<?php echo $val['id'] ?>)" style="color:green"><?php echo $val['is_user_popup']==1 ? '提示一' : '提示二' ?></a>
	<?php else: ?>
	    <a href="javascript:void(0)" onclick="user_popup_menu(<?php echo $val['id'] ?>)">未开启</a>
	<?php endif; ?>
	  <ul class="user_status" id="user_popup_<?php echo $val['id'] ?>">
		  <li><a href="?action=popupforuser&userid=<?php echo $val['id'] ?>&t=0">关闭提示</a></li>
		  <li><a href="?action=popupforuser&userid=<?php echo $val['id'] ?>&t=1">开启提示1</a></li>
		  <li><a href="?action=popupforuser&userid=<?php echo $val['id'] ?>&t=2">开启提示2</a></li>
	  </ul>
  </td>

  <!--<td class="center"><?php echo $is_apply_settlement ?></td>-->
  <td class="center">
	  <?php echo $is_state ?>
	  <ul class="user_status" id="user_status_<?php echo $val['id'] ?>">
		  <li><a href="?action=verifyuser&userid=<?php echo $val['id'] ?>&t=0">开通商户</a></li>
		  <li><a href="?action=verifyuser&userid=<?php echo $val['id'] ?>&t=1">暂停商户</a></li>
		  <li><a href="?action=verifyuser&userid=<?php echo $val['id'] ?>&t=2">冻结商户</a></li>
	  </ul>
  </td>
    <td class="center">
	<?php
    if($val['openid_wx'] == ""){
        echo '未绑定';
    }else{
        echo '<a href='.$val['openid_wx'].'  style="color:red">已绑定</a>';
    }
    ?>
  </td>
  <td class="center">
	<?php
		if($val['is_auth'] == 0){
			echo '未认证';
		}else if($val['is_auth'] == 1){
			echo '<span style="color:green">已认证</span>';
		}else if($val['is_auth'] == 2){
			echo '<a href="users.php?action=auth&id=' . $val["id"] . '" style="color:red">待审核</a>';
		}else if($val['is_auth'] == 3){
			echo '<a href="#">审核驳回</a>';
		}
	?>
  </td>
  <td class="center" width="160">
  	  <a href="?action=edit&id=<?php echo $val['id'] ?>" title="编辑"><img src="views/images/ico_edit.png" alt="编辑" /></a>

	  <a href="javascript:void(0)" title="删除" onclick="delUser(<?php echo $val['id'] ?>)"><img src="views/images/ico_del.png" alt="编辑" /></a>

	  <a href="?action=loginusercenter&id=<?php echo $val['id'] ?>" target="_blank" title="登陆到<?php echo $val['username'] ?>的商户中心" style="text-decoration:underline;color:#666">登陆</a>

	  <a href="javascript:void(0)" onclick="Boxy.load('message.php?action=write&uname=<?php echo $val['username'] ?>',{title:'写新消息'})" title="给商户<?php echo $val['username'] ?>发送站内消息">消息</a>

	  <a href="javascript:void(0)" title="为商户<?php echo $val['username'] ?>设置分成" onclick="Boxy.load('?action=setUserPrice&id=<?php echo $val['id'] ?>',{title:'为商户[<?php echo $val['username'] ?>]设置分成'})">分成</a>
  </td>
</tr>
<?php endforeach; ?>
<tr><td colspan="14" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" id="selectall" value="全选" />
<input type="button" class="button_bg_1" id="unselectall" value="反选" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行此操作？'))return false" />
</td></tr>
<tr><td colspan="14" class="h30 graybg"><?php echo $PageList ?></td></tr>
<?php else: ?>
<tr><td colspan="14" class="h30 bg center">无数据记录</td></tr>
<?php endif; ?>
</form>
</table>
</div>

<script>

var delUser=function(id){
    if(confirm('是否要执行此操作？')){
		$.get('users.php',{action:'del',id:id},function(data){
		    if(data=='ok'){
				$('tr#u_'+id).fadeOut();
			} else {
			    $('tr#u_'+id).css({'background-color':'red'});
			}
		})
    }
}

setTimeout(hideMsg,2600);

function user_status_menu(userid){
	$('td ul').hide();
	$('#user_status_'+userid).addClass('usms');
	$('#user_status_'+userid).show();
}

function user_popup_menu(userid){
	$('td ul').hide();
	$('#user_popup_'+userid).show();
}

function user_ctype_menu(userid){
	$('td ul').hide();
	$('#user_ctype_'+userid).show();
}
</script>