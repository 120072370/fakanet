<?php if(!defined('WY_ROOT')) exit; ?>
	<div id="msg_tip">
        <p style="font-size:16px;font-weight:bold;color:#000"><img src="tpl/green/common/images/success.gif" align="absmiddle" /> <?php echo $msg ?></p>
		<p style="font-size:14px;color:red"><a class="green" href="<?php echo $url ?>">如果3秒后没有跳转，请点击这里继续！</a></p>
	</div>
	<script>
	var JumpUrl=function(){
	    window.location.href='<?php echo $url ?>';
	}
	$(function(){setTimeout(JumpUrl,3000);})
	</script>