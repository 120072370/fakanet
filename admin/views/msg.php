<?php if(!defined('WY_ROOT')) exit; ?>
<div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 跳转提示</div>
<div class="main" style="padding:50px 0;text-align:center;font-size:14px">
<img src="views/images/<?php echo $img ?>.gif" align="absmiddle" /> <?php echo $msg ?>

<p style="font-size:12px;margin-top:20px"><a href="<?php echo $url ?>">如果3秒后没有跳转，请点击这里继续！</a></p>
</div>
<script>
var JumpUrl=function(){
	window.location.href='<?php echo $url ?>';
}
$(function(){setTimeout(JumpUrl,3000);})
</script>