<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding:10px 15px;max-height:300px;overflow-x:auto;overflow-y:none">
<p style="color:#000;font-weight:bold;margin:10px 0">卡密信息：</p>
<?php echo $cards ?>
<br />
<p style="text-align:center"><input name="close" class="close button_bg_1" onclick="copyToClipboard('<?php echo $cards ?>');" type="button" value="复制" />&nbsp;&nbsp;<input name="close" class="close button_bg_1" type="button" value="关闭" /></p>
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