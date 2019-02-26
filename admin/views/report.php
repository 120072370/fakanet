<?php if(!defined('WY_ROOT')) exit; ?>
<?php if(_G('add_suc')): ?><div class="actived">处理结果保存成功</div><?php endif; ?>
<?php if(_G('add_err')): ?><div class="error">处理结果保存失败</div><?php endif; ?>
<?php if(_G('del_suc')): ?><div class="actived">删除成功</div><?php endif; ?>
<?php if(_G('del_err')): ?><div class="error">删除失败</div><?php endif; ?>
<?php if(_G('del_err_1')): ?><div class="error">请选择要删除的记录</div><?php endif; ?>
<script>setTimeout(hideMsg,2600)</script>

 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 投诉举报</div>
<div class="main">
<form name="search" action="" method="get">
阅读状态：<select name="is_read">
    <option value=""<?php echo $is_read=='' ? ' selected' : '' ?>>--全部--</option>
	<option value="r0"<?php echo $is_read=='r0' ? ' selected' : '' ?>>未读</option>
	<option value="r1"<?php echo $is_read=='r1' ? ' selected' : '' ?>>已读</option>
</select>&nbsp;
处理状态：<select name="is_state">
    <option value=""<?php echo $is_state=='' ? ' selected' : '' ?>>--全部--</option>
	<option value="s0"<?php echo $is_state=='s0' ? ' selected' : '' ?>>未处理</option>
	<option value="s1"<?php echo $is_state=='s1' ? ' selected' : '' ?>>处理中</option>
	<option value="s2"<?php echo $is_state=='s2' ? ' selected' : '' ?>>已处理</option>
</select>&nbsp;
问题类型：<select name="reason">
    <option value=""<?php echo $reason=='' ? ' selected' : '' ?>>--全部--</option>
	<option value="无效卡密"<?php echo $reason=='无效卡密' ? ' selected' : '' ?>>无效卡密</option>
	<option value="虚假商品"<?php echo $reason=='虚假商品' ? ' selected' : '' ?>>虚假商品</option>
	<option value="非法商品"<?php echo $reason=='非法商品' ? ' selected' : '' ?>>非法商品</option>
	<option value="侵权商品"<?php echo $reason=='侵权商品' ? ' selected' : '' ?>>侵权商品</option>
	<option value="不能购买"<?php echo $reason=='不能购买' ? ' selected' : '' ?>>不能购买</option>
	<option value="恐怖色情"<?php echo $reason=='恐怖色情' ? ' selected' : '' ?>>恐怖色情</option>
	<option value="其他投诉"<?php echo $reason=='其他投诉' ? ' selected' : '' ?>>其他投诉</option>
</select>&nbsp;
关键字：<input type="text" name="keyword" class="input" value="<?php echo $keyword ?>" />
<input type="submit" class="button_bg_1" value="查询">
<a href="?action=setAllRead">全部设为已读</a>
</form>
<p class="h10"></p>
<form name="del" method="post" action="?action=delall">
<table class="tablelist" border="0" cellspacing="1">
<tr>
<th class="center">选择</th>
    <th>商品订单号</th>
<th>凭证号码</th>
<th>举报原因</th>
<th>联系方式</th>
<th>商户名称</th>
<th>投诉内容</th>
<th>回复内容</th>
<th>时间</th>
<th>来源IP</th>
<th>处理状态</th>
<th>操作</th>
</tr>
<?php if($lists): ?>
<?php foreach($lists as $key=>$val): ?>
<tr class="lightbox" id="r_<?php echo $val['id'] ?>">
<td class="center"><input type="checkbox" name="listid[]" value="<?php echo $val['id'] ?>" /></td>

<td class="center"><a href="/orderquery.htm?st=orderid&kw=<?php echo $val['goodsorderid'] ?>" target="_blank" onclick="copyToClipboard('<?php echo $val['goodsorderid'] ?>')"><?php echo $val['goodsorderid'] ?></a></td>

    <td class="center"><?php echo $val['orderid'] ?></td>
<td class="center red"><a href="javascript:void(0)" onclick="Boxy.load('?action=view&id=<?php echo $val['id'] ?>',{title:'<?php echo $val['orderid'] ?>',unloadOnHide:true})"<?php echo $val['is_read']==0 ? ' class="bold"' : '' ?>><?php echo $val['reason'] ?></a></td>

<td class="center"><a href="/orderquery.htm?st=orderid&kw=<?php echo $val['contact'] ?>" target="_blank" onclick="copyToClipboard('<?php echo $val['contact'] ?>')"><?php echo $val['contact'] ?></a></td>

<td class="center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $val['userid'] ?>',{title:'商户<?php echo $val['username'] ?>基本信息'})" title="商户<?php echo $val['username'] ?>基本信息" style="text-decoration:underline;color:#000"><?php echo $val['username'] ?></a></td>

<td class="center"><a href="javascript:void(0)" onclick="Boxy.load('?action=view&id=<?php echo $val['id'] ?>&t=1',{title:'<?php echo $val['orderid'] ?>'})">查看详细</a></td>

<td class="center"><a href="javascript:void(0)" onclick="Boxy.load('?action=view&id=<?php echo $val['id'] ?>&t=2',{title:'<?php echo $val['orderid'] ?>'})">查看详细</a></td>

<td class="center"><?php echo $val['addtime'] ?></td>

<td class="center"><a href="http://www.baidu.com/s?wd=<?php echo $val['ip'] ?>" target="_blank" title="点击查看登陆IP来源"><?php echo $val['ip'] ?></a></td>

<td class="center">
<a href="javascript:void(0)" onclick="user_ctype_menu(<?php echo $val['id'] ?>)">
<?php 
switch($val['is_state']){
    case '0': echo '<span class="red">未处理</span>'; break;
	case '1': echo '<span class="blue">处理中</span>'; break;
	case '2': echo '<span class="green">已处理</span>'; break;
}
?></a>
	  <ul class="user_status" style="width:93px" id="user_ctype_<?php echo $val['id'] ?>">
		  <li><a href="?action=updateState&id=<?php echo $val['id'] ?>&t=0&userid=<?php echo $val['userid'] ?>&reason=<?php echo $val['reason'] ?>&contact=<?php echo $val['contact'] ?>">未处理</a></li>
		  <li><a href="?action=updateState&id=<?php echo $val['id'] ?>&t=1&userid=<?php echo $val['userid'] ?>&reason=<?php echo $val['reason'] ?>&contact=<?php echo $val['contact'] ?>">处理中</a></li>
		  <li><a href="?action=updateState&id=<?php echo $val['id'] ?>&t=2&notfiy=0">已处理</a></li>
          <li><a href="?action=updateState&id=<?php echo $val['id'] ?>&t=2&notfiy=1&userid=<?php echo $val['userid'] ?>&reason=<?php echo $val['reason'] ?>&contact=<?php echo $val['contact'] ?>&orderid=<?php echo $val['orderid'] ?>">已处理发送通知</a></li>
	  </ul>
</td>

<td class="center">

    <a href="javascript:void(0)" 
        onclick="Boxy.load('message.php?action=write&uname=<?php echo $val['username'] ?>&reason=<?php echo $val['reason'] ?>&orderid=<?php echo $val['orderid'] ?>&goodsorderid=<?php echo $val['goodsorderid'] ?>&contact=<?php echo $val['contact'] ?>&title=订单投诉通知，投诉凭证号：<?php echo $val['orderid'] ?> &content=商品订单号：<?php echo $val['goodsorderid'] ?>，买家联系方式：<?php echo $val['contact'] ?>，举报内容：<?php echo $val['reason'] ?>，请及时联系买家解决！',{title:'写新消息',unloadOnHide:true})" title="给商户<?php echo $val['username'] ?>发送站内消息">消息</a>

	<a href="users.php?action=loginusercenter&id=<?php echo $val['userid'] ?>" target="_blank" title="登陆到<?php echo $val['username'] ?>的商户中心" style="text-decoration:underline;color:#666">登陆</a>

    <a href="javascript:void(0)" onclick="Boxy.load('?action=write&id=<?php echo $val['id'] ?>',{title:'回复处理结果',unloadOnHide:true})">回复</a>

    <a href="javascript:void(0)" title="删除" onclick="delReport(<?php echo $val['id'] ?>)"><img src="views/images/ico_del.png" alt="编辑" /></a>
	</td>
</tr>
<?php endforeach; ?>
<tr><td colspan="11" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" value="全选" id="selectall" />
<input type="button" class="button_bg_1" value="反选" id="unselectall" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
</tr>
<tr><td class="graybg h30 " colspan="11" style="text-align:left;padding-left:10px"><?php echo $pagelist ?></td></tr>
<?php else: ?>
<tr><td colspan="11" class="whitebg center">暂无数据</td></tr>
<?php endif; ?>
</table>
</form>
</div>

<script>
var delReport=function(id){
    if(confirm('是否要执行此操作？')){
		$.get('report.php',{action:'del',id:id},function(data){
		    if(data=='ok'){
				$('tr#r_'+id).fadeOut();
			} else {
			    $('tr#r_'+id).css({'background-color':'red'});
			}
		})
    }
}

function user_ctype_menu(id){
	$('td ul').hide();
	$('#user_ctype_'+id).show();
}

function copyToClipboard(txt) {   
     if(window.clipboardData) {    
             window.clipboardData.clearData();    
             window.clipboardData.setData("Text", txt);  
			 alert("成功复制到剪贴板！");
     } else if(navigator.userAgent.indexOf("Opera") != -1) {   
          window.location = txt;    
     } else if (window.netscape) {    
          try {    
               netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");    
          } catch (e) {    
               alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");    
          }    

          var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);   
          if (!clip)    
               return;    
          var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable); 
          if (!trans)    
               return;   
          trans.addDataFlavor('text/unicode');    
          var str = new Object();    
          var len = new Object();    
          var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);   
          var copytext = txt;    
          str.data = copytext;    
          trans.setTransferData("text/unicode",str,copytext.length*2);    
          var clipid = Components.interfaces.nsIClipboard; 
          if (!clip)    
               return false;    
          clip.setData(trans,null,clipid.kGlobalClipboard);    
          alert("成功复制到剪贴板！"); 
     }
}

var ctxt = "";
function cpcards(){
	copyToClipboard(ctxt);
}
</script>