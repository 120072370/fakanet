<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding:10px;width:400px">
    <table class="tablelistinfo" cellspacing="1">
	<?php if(!_G('t')): ?>
	<tr>
	<td class="right bg" width="90">商户编号：</td>
	<td><?php echo $data['userid'] ?></td>
	</tr>
	<tr>
	<td class="right bg">登陆账号：</td>
	<td class="bold"><?php echo $data['username'] ?></td>
	</tr>
	<?php  endif; ?>
	<tr>
	<td class="right bg" width="90">收款方式：</td>
	<td>
	<?php
        switch($data['ptype']){
		    case '1': echo '网上银行';break;
			case '2': echo '支付宝';break;
			case '3': echo '财付通';break;
            case '4': echo '微信钱包';break;
		}
    ?></td>
	</tr>
<?php if($data['ptype']==1): ?>
	<tr>
	<td class="right bg">开户银行：</td>
	<td><?php echo $data['bank'] ?></td>
	</tr>
	<tr>
	<td class="right bg">开户地址：</td>
	<td><?php echo $data['addr'] ?></td>
	</tr>
	<tr>
	<td class="right bg">银行卡号：</td>
	<td><a href="javascript:void(0)" style="color:#660000;text-decoration:none" onclick="copyToClipboard('<?php echo $data['card'] ?>')"><?php echo $data['card'] ?></a></td>
	</tr>

<?php elseif($data['ptype']==2): ?>
	<tr>
	<td class="right bg">支付宝账号：</td>
	<td><a href="javascript:void(0)" style="color:#660000;text-decoration:none" onclick="copyToClipboard('<?php echo $data['alipay'] ?>')"><?php echo $data['alipay'] ?></a></td>
	</tr>
<?php elseif($data['ptype']==3): ?>
	<tr>
	<td class="right bg">财付通账号：</td>
	<td><a href="javascript:void(0)" style="color:#660000;text-decoration:none" onclick="copyToClipboard('<?php echo $data['tenpay'] ?>')"><?php echo $data['tenpay'] ?></a></td>
	</tr>
        <?php elseif($data['ptype']==4): ?>
	<tr>
	<td class="right bg">微信号：</td>
	<td><a href="javascript:void(0)" style="color:#660000;text-decoration:none" onclick="copyToClipboard('<?php echo $data['wx_nickname'] ?>')"><?php echo $data['wx_nickname'] ?></a></td>
	</tr>
        <tr>
	<td class="right bg">Openid：</td>
	<td><a href="javascript:void(0)" style="color:#660000;text-decoration:none" onclick="copyToClipboard('<?php echo $data['wx_openid'] ?>')"><?php echo $data['wx_openid'] ?></a></td>
	</tr>
<?php endif; ?>
	<tr>
	<td class="right bg">收款姓名：</td>
	<td><a href="javascript:void(0)" style="color:#660000;text-decoration:none" onclick="copyToClipboard('<?php echo $data['realname'] ?>')"><?php echo $data['realname'] ?></a></td>
	</tr>
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