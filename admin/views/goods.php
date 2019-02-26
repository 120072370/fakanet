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
<form method="post" action="goods.php">
	 商品搜索：
	<select name="is_state">
		<option value="">状态</option>
		<option value="0" <?php if($_REQUEST['is_state']==0){?>selected<?php }?> >下架中</option>
		<option value="1" <?php if($_REQUEST['is_state']==1){?>selected<?php }?> >上架中</option>
		<option value="2" <?php if($_REQUEST['is_state']==2){?>selected<?php }?> >待审核</option>
		<option value="3" <?php if($_REQUEST['is_state']==3){?>selected<?php }?> >审核未通过</option>
	</select>
	<input type="text" name="username" size="30" class="input" value="<?php echo $_REQUEST['username'];?>" placeholder="用户名">
	<input type="submit" class="button_bg_2" value="查询商品"> 
  </form>
<div class="h10"></div>
<!--####信息列表####-->
<table border="0" cellspacing="1" class="tablelist">
<colgroup>
	<col width="80" />
	<col />
	<col />
</colgroup>
<tr>
<th class="center">选择</th>
<th class="center">商品名称</th>
<th class="center">分类名称</th>
<th width="190" class="center">用户名</th>
<th class="center">状态</th>
<th class="center">操作</th>
</tr>

<?php
if($lists): 
foreach($lists as $key=>$row):
?>
<form name="list" method="post" action="?action=delall">
<tr class="lightbox" id="r_<?php echo $row['id'] ?>">
<td class="center"><input type="checkbox" name="listid[]" class="checkbox" value="<?php echo $row['id'] ?>" /></td>
<td class="center"><?php echo $row['goodname'] ?></td>
<td class="center"><?php echo $row['catename'] ?></td>
<td class="center">
  <a href="users.php?do=search&ctype=&keyword=<?php echo $row['username'] ?>" target="_blank"><?php echo $row['username'] ?>
  </a>
</td>
<td class="center">
<?php 
switch ($row['is_state']) {
	case '1':
		echo '<span style="color:green">上架中</span>';
		break;
	case '0':
		echo '<span style="color:red">下架中</span>';
		break;
	case '2':
		echo '待审核';
		break;
	case '3':
		echo '审核未通过';
		break;
}?></td>
<td class="center"><a href="users.php?action=loginusercenter&id=<?php echo $row['userid'];?>" target="_blank">登录</a> <?php if($row['is_state']==2 || $row['is_state']==3){?>| <a href="javascript:;" data-id="<?php echo $row['id']?>" class="shenhe">点击审核</a><?php }?></td>
</tr>




<?php
endforeach;
?>

<tr><td colspan="6" class="padding_top_bottom_5 whitebg">
<input type="button" class="button_bg_1" value="全选" id="selectall" />
<input type="button" class="button_bg_1" value="反选" id="unselectall" />
<input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
</td>
</tr>
<tr><td colspan="6" class="h30 graybg"><?php echo $pagelist ?></td></tr>
</form>
<?php endif; ?>
</table>
</div>

<script>
jQuery(document).ready(function($){ 
    try{
         jQuery(".shenhe").on('click',function () {
         	var the=jQuery(this);
         	if (confirm('确定通过，取消拒绝')) {
         		var is_state=1;
         	}else{
         		var is_state=3;
         	}
         	jQuery.post(
         		'?action=shenhe',
         		{
         			id:the.attr('data-id'),
         			is_state:is_state
         		},
         		function (data) {
         			if (data.status==1) {
         				location.reload();
         			}
         		}
         	);
         });
    }catch(e){}
});
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