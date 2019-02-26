<?php if(!defined('WY_ROOT')) exit;?>
<?php if(_G('del_suc')): ?><div class="actived">删除成功！</div><?php endif ?>
<?php if(_G('del_err')): ?><div class="error">请选择要删除的记录！</div><?php endif ?>
<div class="actived" id="retMsg"></div>
<script>
setTimeout(hideMsg,2600);
</script>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span>  订单管理  <span>&raquo;</span> 查询订单</div>
<div class="main">
<!--####搜索查询####-->
<form name="s" method="get" action="">
<p>开始日期： <input type="text" name="fdate" class="input" id="txtDate" onclick="SelectDate(this)" size="12" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
至 <input type="text" name="tdate" class="input" id="txtDate1" onclick="SelectDate(this)" size="12" readonly="readonly" value="<?php echo $tdate ?>" />&nbsp;
商品类型：<select name="is_api" class="input">
<option value="" <?php if($is_api=='') echo 'selected'; ?>>全部</option>
<option value="a0" <?php if($is_api=='a0') echo 'selected'; ?>>在线售卡</option>
<option value="a1" <?php if($is_api=='a1') echo 'selected'; ?>>API充值</option>
</select>&nbsp;

结算状态：<select name="is_ship" class="input">
<option value="" <?php if($is_ship=='') echo 'selected'; ?>>全部</option>
<option value="a1" <?php if($is_ship=='a1') echo 'selected'; ?>>已结算</option>
<option value="a0" <?php if($is_ship=='a0') echo 'selected'; ?>>未结算</option>
</select>&nbsp;</p>

<p style="margin-top:10px">
支付状态：<select name="is_status" class="input">
<option value="" <?php if($is_status=='') echo 'selected'; ?>>全部</option>
<option value="s1" <?php if($is_status=='s1') echo 'selected'; ?>>未付款</option>
<option value="s2" <?php if($is_status=='s2') echo 'selected'; ?>>部分付款</option>
<option value="s3" <?php if($is_status=='s3') echo 'selected'; ?>>已付款</option>
<option value="s4" <?php if($is_status=='s4') echo 'selected'; ?>>已退款</option>
</select>&nbsp;&nbsp;

支付类型：<select name="channelid" class="input">
<option value="">所有</option>
<?php
if($channels):
foreach($channels as $key => $val):
$selected= $val['id']==$channelid ? 'selected' : '';
?>
<option value="<?php echo $val['id'] ?>" <?php echo $selected ?>><?php echo $val['channelname'] ?></option>
<?php
endforeach;
endif;
?>
<option value="99999" <?php echo $channelid==99999 ? 'selected' : '' ?>>组合支付</option>
<option value="999999" <?php echo $channelid==999999 ? 'selected' : '' ?>>优惠券</option>
<option value="9999999" <?php echo $channelid==9999999 ? 'selected' : '' ?>>批发优惠</option>
</select>
&nbsp;&nbsp;

<select name="searchtype" class="input">
<option value="t0" <?php if($searchtype=='t0') echo 'selected'; ?>>商户名</option>
<option value="t2" <?php if($searchtype=='t2') echo 'selected'; ?>>订单号</option>
<option value="t3" <?php if($searchtype=='t3') echo 'selected'; ?>>联系方式</option>
<option value="t4" <?php if($searchtype=='t4') echo 'selected'; ?>>充值卡号</option>
<option value="t5" <?php if($searchtype=='t5') echo 'selected'; ?>>来源IP</option>
<option value="t6" <?php if($searchtype=='t6') echo 'selected'; ?>>商品卡号</option>
</select> = 
<input type="text" class="input" size="20" name="searchtext" value="<?php echo $searchtext ?>" /> 

<input type="submit"  class="button_bg_2" value="查询订单" />
<input type="button" onclick="Boxy.load('?action=deldata&fdate=<?php echo $fdate ?>&tdate=<?php echo $tdate ?>&is_status=<?php echo $is_status ?>&channelid=<?php echo $channelid ?>&searchtype=<?php echo $searchtype ?>&searchtext=<?php echo $searchtext ?>',{title:'清除订单记录'})"  class="button_bg_2" value="清除订单" />&nbsp;
<input type="button" onclick="Boxy.load('?action=closeOrder&fdate=<?php echo $fdate ?>&tdate=<?php echo $tdate ?>&is_status=<?php echo $is_status ?>&channelid=<?php echo $channelid ?>&searchtype=<?php echo $searchtype ?>&searchtext=<?php echo $searchtext ?>',{title:'批量关闭订单记录'})"  class="button_bg_2" value="关闭订单" />&nbsp;
<?php
$search_cons='&fdate='.$fdate.'&tdate='.$tdate.'&channelid='.$channelid.'&searchtype='.$searchtype.'&searchtext='.$searchtext.'';
?>
<a href="orders.php" <?php if($is_status=='') echo ' style="font-weight:bold"'; ?>>全部</a> | 
<a href="orders.php?do=search&is_status=s1<?php echo $search_cons ?>" <?php if($is_status=='s1') echo ' style="font-weight:bold"'; ?>>未付款</a> | 
<a href="orders.php?do=search&is_status=s2<?php echo $search_cons ?>" <?php if($is_status=='s2') echo ' style="font-weight:bold"'; ?>>部分付款</a> | 
<a href="orders.php?do=search&is_status=s3<?php echo $search_cons ?>" <?php if($is_status=='s3') echo ' style="font-weight:bold"'; ?>>已付款</a> | 
<a href="orders.php?do=search&is_status=s4<?php echo $search_cons ?>" <?php if($is_status=='s4') echo ' style="font-weight:bold"'; ?>>已退款</a> | 
<a href="orders.php?do=search&is_receive=s0<?php echo $search_cons ?>" <?php if($is_receive=='s0') echo ' style="font-weight:bold"'; ?>>未领取卡密</a>
</p>
<input type="hidden" name="do" value="search" />
</form>
<div class="h10"></div>
<!--####信息列表####-->
<table border="0" cellspacing="1" class="tablelist">
<tr>
<th class="center">选择</th>
<th class="center">商户名称</th>
<th width="190" class="center">商品名称</th>
<th>买家信息</th>
<th class="center">订单号</th>
<th class="center">订单日期</th>
<th>通道名称</th>
<th>提交金额</th>
<th>成功金额</th>
<th>商户收入</th>
<th>平台收入</th>
<th>推广会员分成</th>
<th>平台分成</th>
<th class="center">状态栏</th>

<th>来源IP</th>
<th class="center">操作</th>
<th class="center">结算栏</th>
</tr>

<?php
if($lists): 
foreach($lists as $key=>$row):
?>
<form name="list" method="post" action="?action=delall">
<tr class="lightbox" id="r_<?php echo $row['id'] ?>">
<td class="center"><input type="checkbox" name="listid[]" class="checkbox" value="<?php echo $row['id'] ?>" /></td>
<td class="center"><a href="javascript:void(0)" onclick="Boxy.load('users.php?action=getuserinfo&userid=<?php echo $row['userid'] ?>',{title:'查看商户<?php echo $row['username'] ?>基本信息'})" title="查看商户<?php echo $row['username'] ?>基本信息"><?php echo $row['username'] ?></a></td>

<td>
<?php if($row['is_status']==1): ?>
    <a <?php echo $row['is_receive'] ? '' : 'style="color:blue;"' ?> href="javascript:void(0)" onclick="Boxy.load('?action=getgoodinfo&orderid=<?php echo $row['orderid'] ?>',{title:'<?php echo $row['goodname'] ?>'})"><?php echo $row['goodname'] ?></a>
<?php else: ?>
    <span style="color:#999"><?php echo $row['goodname'] ?></span>
<?php endif; ?>
(<span class="red"><?php echo $row['quantity'] ?></span>张)<?php echo $row['is_api'] ? '<span style="vertical-align:super;color:red;font-size:9px;font-style:italic">api</span>' : '' ?> <?php echo $row['is_discount_state'] ? '<span style="color:red;vertical-align:super;font-size:9px">批</span>' : '' ?> <?php echo $row['is_coupon_state'] ? '<span style="color:red;vertical-align:super;font-size:9px">券</span>' : '' ?> <?php echo $row['pwdforsearch'] ? '<span style="color:red;vertical-align:super;font-size:9px">取</span>' : '' ?></td>

<td class="center"><a href="javascript:void(0)" onclick="copyToClipboard('<?php echo $row['contact'] ?>');"><?php echo $row['contact'] ?></a></td>

<td class="center"><a href="../orderquery.htm?orderid=<?php echo $row['orderid'] ?>" target="_blank"><?php echo $row['orderid'] ?></a></td>

<td class="center"><?php echo $row['addtime'] ?></td>

<td  class="center"><a href="javascript:void(0)" onclick="Boxy.load('orders.php?action=getcards&orderid=<?php echo $row['orderid'] ?>',{title:'查看充值卡密'})" title="查看订单<?php echo $row['orderid'] ?>充值卡密信息"><?php echo $row['channelname'] ?></a></td>

<td class="center"><?php echo $row['total_money'] ?></td>
<td class="center"><?php echo $row['success_money'] ?></td>
<td class="center"><?php echo number_format($row['income_money'],2,'.','') ?></td>
<td class="center"><?php echo number_format($row['platformincome_money'],2,'.','') ?></td>
<!--推广会员分成-->
<td class="center"><?php echo number_format($row['tghyfc']/100 * $row['success_money'],2,'.','') ?></td>
<!--平台分成-->
<td class="center"><?php echo number_format($row['ptfc']/100*$row['success_money'],2,'.','') ?></td>
<td class="center"><span id="is_status_<?php echo $row['orderid'] ?>"><?php
//状态
if($row['is_status']==0){
	echo '<span style="color:#999">未付款</span>';
} elseif($row['is_status']==2){
	echo '<span class="red">部分付款</span>';
} elseif($row['is_status']==1){
	echo '<span class="blue">已付款</span>';
} elseif($row['is_status']==4){
	echo '<span class="red">已退款</span>';
}
?></span></td>



<td class="center"><a href="http://www.baidu.com/s?wd=<?php echo $row['fromip'] ?>" target="_blank" title="点击查看登陆IP来源"><?php echo $row['fromip'] ?></a></td>

<td width="90" class="center">
    <a href="javascript:void(0)" onclick="Boxy.load('message.php?action=write&uname=<?php echo $row['username'] ?>',{title:'写短消息'})" title="给商户<?php echo $row['username'] ?>发送站内消息">消息</a>

	<!--<span id="refound_<?php echo $row['orderid'] ?>" <?php echo $row['is_status']!=4 ? 'style="display:"' : 'style="display:none"' ?>><a href="javascript:void(0)" onclick="refoundData('<?php echo $row['orderid'] ?>')" title="执行订单退款">退</a></span><span id="restore_<?php echo $row['orderid'] ?>" <?php echo $row['is_status']!=4 ? 'style="display:none"' : 'style="display:"' ?>><a href="javascript:void(0)" style="color:red" onclick="restoreData('<?php echo $row['orderid'] ?>')" title="退款订单恢复">恢</a></span>-->

	<a href="users.php?action=loginusercenter&id=<?php echo $row['userid'] ?>" target="_blank" title="登陆到<?php echo $row['username'] ?>的商户中心" style="text-decoration:underline;color:#666">登陆</a>

	<?php if($row['is_status']==4): ?>
	<a href="javascript:void(0)" onclick="user_status_menu('<?php echo $row['orderid'] ?>')" style="color:red">恢</a>
	  <ul class="user_status" id="user_status_<?php echo $row['orderid'] ?>">
		  <li><a href="?action=restore&orderid=<?php echo $row['orderid'] ?>&t=1">标为已售</a></li>
		  <li><a href="?action=restore&orderid=<?php echo $row['orderid'] ?>&t=0">标为未售</a></li>
	  </ul>
	<?php else: ?>
	<a href="javascript:void(0)" onclick="user_status_menu('<?php echo $row['orderid'] ?>')">退</a>
	  <ul class="user_status" id="user_status_<?php echo $row['orderid'] ?>">
		  <li><a href="?action=refound&orderid=<?php echo $row['orderid'] ?>&t=1">商品回库</a></li>
		  <li><a href="?action=refound&orderid=<?php echo $row['orderid'] ?>&t=0">不回库存</a></li>
	  </ul>
	<?php endif; ?>

	<a href="javascript:void(0)" onclick="delData(<?php echo $row['id'] ?>)" title="删除此订单">删</a>
</td>

<td class="center"><?php  echo $row['is_status']==1 ? $row['is_ship'] ? '<span class="red">已结算</span>'  : '<span class="green">未结算</span>'  : '<span style="color:#999">未付款</span>'?></td>
</tr>




<?php
endforeach;
?>

<tr><td colspan="15" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" value="全选" id="selectall" />
<input type="button" class="button_bg_1" value="反选" id="unselectall" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
</td>
</tr>
<tr><td colspan="15" class="h30 graybg"><?php echo $pagelist ?></td></tr>
</form>
<?php endif; ?>
</table>
</div>

<script>
var ShowOrderDetail=function(id){
	showOptions();	
	$.get('orders.php',{action:'detail' , id:id},function(data){		
		$('#showcontent').html(data);
	})
}

var delData=function(id){
	if(confirm('是否要移除此订单？')){
		$.get('orders.php',{action:'del',id:id},function(data){
			if(data=='ok'){
				$('#r_'+id).fadeOut();
			} else {
				alert('订单移除失败！');
			}
		})
	}
}

var refoundData=function(orderid){
	if(confirm('是否要执行退款操作？')){
		$.get('orders.php',{action:'refound',orderid:orderid},function(data){
			if(data=='ok'){
				$('#refound_'+orderid).hide();
				$('#restore_'+orderid).show();
				$('#is_status_'+orderid).html('<span class="red">已退款</span>');
			} else {
				alert('退款失败！');
			}
		})
	}
}

var restoreData=function(orderid){
	if(confirm('是否要恢复退款操作？')){
		$.get('orders.php',{action:'restore',orderid:orderid},function(data){
			if(data=='ok'){
				$('#refound_'+orderid).show();
				$('#restore_'+orderid).hide();
				$('#is_status_'+orderid).html('<span class="blue">已付款</span>');
			} else {
				alert('恢复退款失败！');
			}
		})
	}
}

function user_status_menu(id){
	$('td ul').hide();
	$('#user_status_'+id).addClass('usms');
	$('#user_status_'+id).show();
	var doc_width=$(window).width();
	var ul_width=$('#user_status_'+id).width()+20;
	var left_width=(doc_width-ul_width);
	$('#user_status_'+id).css({'left':left_width});

}

$(window).resize(function(){
	$('td ul').each(function(){
		if($(this).hasClass('usms')){
			var ob=$(this).attr('id');
			var doc_width=$(window).width();
			var ul_width=$('#'+ob).width()+20;
			var left_width=(doc_width-ul_width);
			$('#'+ob).css({'left':left_width});
		}
	})
})
</script>

<script>
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