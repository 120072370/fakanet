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
<div class="h10"></div>
<!--####信息列表####-->
<div id="alertinfo" style="position: absolute; width: 100px; height: 20px; line-height: 20px; text-align: center; color: #fff; background: #2ecc71; margin: auto; left: 0; right: 0; top: 100px; display: none;">
</div>
<table border="0" cellspacing="1" class="tablelist">
<colgroup>
	<col width="80" />
	<col />
	<col />
</colgroup>
<tr>
<th class="center">商品名称</th>
<th width="190" class="center">商户名</th>
<th class="center">价格</th>
<th class="center">推广会员分成(%)</th>
<th class="center">平台分成，大于0表示通过(%)</th>
</tr>

<?php
if($lists): 
foreach($lists as $key=>$row):
?>
<form name="list" method="post" action="?action=delall">
<tr class="lightbox" id="r_<?php echo $row['id'] ?>">

<td class="center"><?php echo $row['goodname'] ?></td>
<td class="center"><?php echo $row['username'] ?></td>
<td class="center"><?php echo $row['price'] ?></td>
<td class="center"><input type="text" size="5" class="tghyfc" data-id="<?php echo $row['id'] ?>" value="<?php echo $row['tghyfc'] ?>" /></td>
<td class="center"><input type="text" size="5" class="ptfc" data-id="<?php echo $row['id'] ?>" value="<?php echo $row['ptfc'] ?>" /></td>

</tr>




<?php
endforeach;
?>

<tr><td colspan="5" class="h30 graybg"><?php echo $pagelist ?></td></tr>
</form>
<?php endif; ?>
</table>
</div>

<script>
jQuery(document).ready(function($){ 
    try{
        $('.tghyfc').on('blur',function () {
        	var the=$(this);
        	$.post(
        		'tg_goods.php?action=tghyfc',
        		{
        			id:the.attr('data-id'),
        			tghyfc:the.val()
        		},
        		function (data) {
        			if (data.status==1) {
        				$("#alertinfo").html('设置成功');
        				$("#alertinfo").show();
        				setTimeout(function () {
        					$("#alertinfo").fadeOut();
        				},1000);
        			}
        		}
        	);
        });
        $('.ptfc').on('blur',function () {
        	var the=$(this);
        	$.post(
        		'tg_goods.php?action=ptfc',
        		{
        			id:the.attr('data-id'),
        			ptfc:the.val()
        		},
        		function (data) {
        			if (data.status==1) {
        				$("#alertinfo").html('设置成功');
        				$("#alertinfo").show();
        				setTimeout(function () {
        					$("#alertinfo").fadeOut();
        				},1000);
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