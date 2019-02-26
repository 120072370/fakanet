<?php if (!defined('WY_ROOT')) exit; ?>




asdf
<div id="dowebok">
    <div class="section section1">
        <div class="reg_bg" style="margin-bottom: 100px">
            <div class="reg_title">
		系统提示
            </div>
            <div class="detail_con">

		<p style="font-size:16px;font-weight:bold;color:#000"><img src="tpl/green/common/images/success.gif" align="absmiddle" /> <?php echo $msg ?></p>
		<p style="font-size:14px;color:red"><a class="green" href="<?php echo $url ?>">如果3秒后没有跳转，请点击这里继续！</a></p>
            </div>
        </div>
    </div>
</div>


<script>
    var JumpUrl = function () {
	window.location.href = '<?php echo $url ?>';
    }
    $(function () {
	setTimeout(JumpUrl, 3000);
    })
</script>