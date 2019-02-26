<?php if(!defined('WY_ROOT')) exit; ?>
	<div id="msg_tip" style="position:relative;min-width:1200px;width:100%;margin:0 auto;text-align:center;height:200px;line-height:40px;">
        <p style="font-size:16px;font-weight:bold;color:red;padding-top:50px;">
		<img src="tpl/default/images/<?php echo !isset($img) ? 'ico_msg' : 'success' ?>.gif" align="absmiddle" /> <?php echo $msg ?>
		</p>
		<p style="font-size:14px;color:red"><a class="green" href="<?php echo $url ?>">如果<span id="times">3</span>秒后没有跳转，请点击这里继续！</a></p>
	</div>
	<script>
	var JumpUrl=function(){
	    window.location.href='<?php echo $url ?>';
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