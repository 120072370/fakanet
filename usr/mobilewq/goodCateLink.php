<?php if(!defined('WY_ROOT')) exit; 
      $url='http://'._S('HTTP_HOST').'/cay/'.$id;
?>


<form name="link" method="post" action="goodcate.php?action=op&id=<?php echo $cateid ?>">
    <!--<div style="padding:0px"><script src="<?php echo USER_THEME ?>/js/clipboard.min.js"></script>
  <p><strong>超级防御多线路链接：无视一切攻击</strong><br /> <br />
  <a href="http://<?php echo _S('HTTP_HOST') ?>/<?php echo $_SESSION['login_userkey'] ?>.html" class="blue" target="_blank">http://<?php echo _S('HTTP_HOST') ?>/<?php echo $_SESSION['login_userkey'] ?>.html</a>

 </div>-->

    <strong>分类链接：</strong><br />
    <br />
    <?php foreach ($goodurl as $k => $v) {?>
    <div style="margin-top: 10px">线路<?php echo $k+1;?>：<a href="<?php echo $v; ?>" target="_blank" class="blue" target="_blank"><?php echo $v; ?></a></div>
    <?php }?>
    <!--<a href="<?php echo $url ?>" class="blue" target="_blank">
<?php echo $url ?>
</a>-->
    <br />
    <p style="color: red">注意：为防止被封，请务必使用可用短连接进行推广！</p>
    <p style="text-align: center; margin-top: 10px">
        <input type="submit" name="link_state" class="btn btn-red" value="<?php echo $is_link_state==0 ? '关闭链接' : '开启链接' ?>" />
        <!--<input name="close" class="btn btn-info" onclick="copyToClipboard('<?php echo $url ?>');" type="button" value="复制地址" />-->
       <!-- <input name="close" id="copy" class="btn btn-info"  type="button" value="复制地址" />-->
       
    <!--<input name="close" class="btn btn-gold" type="button" value="退出" />-->
    </p>
    <p style="text-align: center; padding: 10px 0; color: #666">提示：关闭链接后，此链接将失效！</p>
</form>

<script>
    //var clipboard = new Clipboard('.copy', {
    //    text: function () {
    //        return '123123';
    //    }
    //});
    //clipboard.on('success', function (e) {
    //    alert("复制成功");
    //});

    //clipboard.on('error', function (e) {
    //    console.log(e);
    //});

    function copyToClipboard(txt) { 
        alert("成功复制到剪贴板！");
       // var clipboard = new ClipboardJS(txt);
        //if(window.clipboardData) {    
        //    window.clipboardData.clearData();    
        //    window.clipboardData.setData("Text", txt);  
        //    alert("成功复制到剪贴板！");
        //} else if(navigator.userAgent.indexOf("Opera") != -1) {   
        //    window.location = txt;    
        //} else if (window.netscape) {    
        //    try {    
        //        netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");    
        //    } catch (e) {    
        //        alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");    
        //    }    

        //    var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);   
        //    if (!clip)    
        //        return;    
        //    var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable); 
        //    if (!trans)    
        //        return;   
        //    trans.addDataFlavor('text/unicode');    
        //    var str = new Object();    
        //    var len = new Object();    
        //    var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);   
        //    var copytext = txt;    
        //    str.data = copytext;    
        //    trans.setTransferData("text/unicode",str,copytext.length*2);    
        //    var clipid = Components.interfaces.nsIClipboard; 
        //    if (!clip)    
        //        return false;    
        //    clip.setData(trans,null,clipid.kGlobalClipboard);    
        //    alert("成功复制到剪贴板！"); 
        //}
    }

    var ctxt = "";
    function cpcards(){
        copyToClipboard(ctxt);
    }
</script>
