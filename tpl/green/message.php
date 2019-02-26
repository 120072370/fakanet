<?php if(!defined('WY_ROOT')) exit; ?>
<link href="tpl/green/common/css/page.css" rel="stylesheet" type="text/css" />
<div class="content">
  <div class="page_banner">
     <img src="banner/images/banner_1.jpg" />
  </div>
  <div class="new_wnwl">
  <div class="page_gonggao">
				
				<div class="page_content">
					
					<div id="msg_tip">
        <p style="font-size:16px;font-weight:bold;color:red; text-align:center;" ><img src="tpl/green/common/images/<?php echo !isset($img) ? 'ico_msg' : 'success' ?>.gif" align="absmiddle"  style="position:relative;top:25px; left:455px;"/> <?php echo $msg ?></p>
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
				</div>
			</div>
		</div>


</div>
</div>