<?php if(!defined('WY_ROOT')) exit; ?>
<!--/header end-->
<div class="clear"></div>
<div class="w-980">
	<div class="banner1"></div>
	<div class="b_l b_m_t area-l">
		<div class="area-box" style="margin:auto;width:980px;">
			<div class="area-t" style="margin:auto;width:980px;">
				<div class="titbn"><h4>跳转提示</h4></div>
			</div>
			<div class="clear"></div>
			<div class="area-c" style="height:100%">
				<p style="font-size:16px;font-weight:bold;color:red;text-align:center">
					<img src="tpl/win8/common/images/<?php echo !isset($img) ? 'ico_msg' : 'success' ?>.gif" align="absmiddle"> <?php echo $msg ?>
				</p>
				<p style="font-size:14px;color:red;text-align:center">
					<a style="color:green" href="login.htm">如果<span id="times">1</span>秒后没有跳转，请点击这里继续！</a>
				</p>
			</div>
		</div><!--/box end-->
	</div><!--/left end-->
</div><!--/content end-->
<div class="clear"></div>

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