<?php if(!defined('WY_ROOT')) exit; ?>
	<div id="msg_tip">
        <p style="font-size:16px;font-weight:bold;color:red"><img src="tpl/default/images/<?php echo !isset($img) ? 'ico_msg' : 'success' ?>.gif" align="absmiddle" /> <?php echo isset($msg) && $msg ? $msg : '呼呼，要访问的页面似乎不见了。' ?></p>
		<p style="font-size:14px;"><a class="green" href="<?php echo isset($url) && $url ? $url : './' ?>">如果<span id="times">3</span>秒后没有跳转，请点击这里继续！</a></p>
	</div>
	<script>
	var JumpUrl=function(){
	    window.location.href='<?php echo isset($url) && $url ? $url : './' ?>';
	}
	$(function(){
		setTimeout(changeTimes,1000);
	})

	var changeTimes=function(){
		if($('#times').text()==0){
		    JumpUrl();
			return false;
		} else {
	        $('#times').text($('#times').text()-1);
			setTimeout(changeTimes,1000);
		}
	}
	</script>