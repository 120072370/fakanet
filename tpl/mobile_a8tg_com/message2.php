<?php if(!defined('WY_ROOT')) exit; ?>
<div class="lawyer-infor-bar bg-fff">
        <p style="font-size:16px;font-weight:bold;color:#000"><img src="tpl/skyblue/images/success.gif" align="absmiddle" /> <?php echo $msg ?></p>
		<p style="font-size:14px;color:red"><a class="blue" href="<?php echo $url ?>">如果3秒后没有跳转，请点击这里继续！</a></p>
	</div>
	<script>
	var JumpUrl=function(){
	    window.location.href='<?php echo $url ?>';
	}
	$(function(){setTimeout(JumpUrl,3000);})
	</script>