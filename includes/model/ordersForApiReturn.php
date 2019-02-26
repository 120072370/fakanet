<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding:15px 10px">
<?php if($row): ?>
<table>
<tr>
<td height="30"><strong>通知状态：</strong></td>
<td><?php echo $row['is_api_return'] ? '<span class="green">通知成功</span>' : '<span class="red">通知失败</span>' ?></td>
</tr>

<tr>
<td><strong>通知地址：</strong></td>
<td><textarea cols="40" rows="5"><?php echo $row['returnUrl'] ?></textarea></td>
</tr>

<tr>
<td colspan="2" height="30" style="text-align:center"><input name="close" class="close button_bg_2" onclick="copyToClipboard('<?php echo $row['returnUrl'] ?>');" type="button" value="复制地址" />&nbsp;&nbsp;<input name="close" class="close button_bg_1" type="button" value="退出" /></td>
</tr>
</table>
<?php endif; ?>
</div>
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