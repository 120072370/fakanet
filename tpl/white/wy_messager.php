<?php if(!defined('WY_ROOT')) exit; ?>
  <div id="content" class="b_clear b_m_b mycustom">
    <div class="b_l b_m_t area-l">
	  <div class="area-box" style="margin:auto">
	    <div class="area-t">
		  <div class="titbn"><h4>跳转提示</h4></div>
		</div>
		<div class="clear"></div>
		<div class="area-d">
        <p style="font-size:16px;font-weight:bold;color:red;text-align:center;"><img src="tpl/green/common/images/<?php echo !isset($img) ? 'ico_msg' : 'success' ?>.gif" align="absmiddle" /> <?php echo isset($msg) && $msg ? $msg : '呼呼，要访问的页面似乎不见了。' ?></p>
		<p style="font-size:14px;text-align:center;margin-top:16px;"><a style="color:green;text-decoration:underline;" href="<?php echo isset($url) && $url ? $url : './' ?>">如果<span id="times">3</span>秒后没有跳转，请点击这里继续！</a></p>
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

				</div>
	  </div><!--/box end-->
	</div><!--/left end-->
  </div><!--/content end-->