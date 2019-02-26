<?php if(!defined('WY_ROOT')) exit; 
$url='http://'._S('HTTP_HOST').'/prt/'.$id;
?>
<div> 
<form name="link" method="post" action="goodlist.php?action=op&id=<?php echo $goodid ?>">
<div style="padding:0px;">
  <!--<p><strong>超级防御多线路链接：无视一切攻击</strong><br /> <br />
 	<?php
  	foreach ($mypaylinks as $k => $v) {
				echo "线路".($k+1)."：<br><a target='_blank' href='".$v."' class='blue'>".$v."</a><br><br>";
			}	
     ?>
 
 </div>-->
  <br />
  <p><strong style="color:red;">温馨提示：如需在QQ群发广告,请务必使用"销售连接"短网址进行发送 </strong><br />
      <br />
      	<?php
      	foreach ($goodurl as $k => $v) {
					echo "销售链接".($k+1)."：<br><a target='_blank' href='".$v."' class='blue'>".$v."</a><br><br>";
				}	
          ?>
    </p>
  <p style="text-align:center;margin-top:10px">
    <input type="submit" name="link_state" class="btn btn-red" value="<?php echo $is_link_state==0 ? '关闭链接' : '开启链接' ?>" />
<!--<input name="close" class="close button_bg_2" onclick="copyToClipboard('<?php echo $url ?>');" type="button" value="复制地址" />&nbsp;&nbsp;
    <input name="close" class="close button_bg_2"  style="width:200px; height:30px;"  value="  退  出  " />-->
	<!--<button class="close button_bg_2" style="width:200px;height:50px;"> 退 出 </button>-->
  </p>
  <p style="text-align:center;padding:10px 0;color:#666">提示：关闭链接后，此链接将失效！</p>
</div>
</form>

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
</div>