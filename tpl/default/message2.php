<?php if(!defined('WY_ROOT')) exit; ?>
	<div id="msg_tip" style="position:relative;min-width:1200px;width:100%;margin:50px auto;text-align:center;height:200px;line-height:40px;">
        <p style="font-size:16px;font-weight:bold;color:#000"><img src="tpl/default/images/success.gif" align="absmiddle" /> <?php echo $msg ?></p>
		<p style="font-size:14px;color:red"><a class="green" href="<?php echo $url ?>">如果3秒后没有跳转，请点击这里继续！</a></p>
	</div>
	<script>
	var JumpUrl=function(){
	    window.location.href='<?php echo $url ?>';
	}
	$(function(){setTimeout(JumpUrl,3000);})
	</script>