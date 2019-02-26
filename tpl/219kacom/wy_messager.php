<div style="clear:both"></div>

        </div>
    </div>
</div>
<div class="Crumbs w">
<p></p>
<div class="Bannerr">
<div class="foot"></div>
</div>
<div class="Crumbs w">
<div class="AffiliateBox w">
<h2 class="card"><i></i>跳转提示<span><span>/</span> Pass</span></h2>
</div>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style=" margin-bottom:1px; border:solid 1px #e6e6e6;">
<tr>
<td align="center" style="padding:100px;">
		<div class="clear"></div>
		<div class="area-c" style="height:100%">
		    <div class="pagecontent">
		<div class="pc_title_1">
<div class="w">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="10"  class="a14b">&nbsp;</td>
</tr>
<tr>
<td height="262" align="center" >
	<p style="font-size:16px;font-weight:bold;color:red;text-align:center">
		<div id="msg_tip">
        <p style="font-size:16px;font-weight:bold;color:red"><img src="tpl/skyblue/images/<?php echo !isset($img) ? 'ico_msg' : 'success' ?>.gif" align="absmiddle" /> <?php echo isset($msg) && $msg ? $msg : '呼呼，要访问的页面似乎不见了。' ?></p>
		<p style="font-size:14px;"><a class="green" href="<?php echo isset($url) && $url ? $url : './' ?>">如果<span id="times">3</span>秒后没有跳转，请点击这里继续！</a></p>
	</div>
	
	
	</a></p>
<table width="520" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="30" align="center">&nbsp;</td>
<td align="left">&nbsp;</td>
<td align="left">&nbsp;</td>

</tr>
	<script>
	var JumpUrl=function(){
	    window.location.href='login.htm';
	}
	$(function(){
		setTimeout(changeTimes,2000);
	})

	var changeTimes=function(){
		if($('#times').text()==0){
		    JumpUrl();
			return false;
		} else {
	        $('#times').text($('#times').text()-1);
			setTimeout(changeTimes,2000);
		}
	}
	</script>
</table>
</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>
</div>
</div></div></div></div></table></div></div>
