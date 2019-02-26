<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    .mm-kb {
    padding-left: 180px;
    background: url(tpl/weiqi/content/images/page-middle.jpg) repeat-y;
    width: 1000px;
    padding-bottom: 100px;
    }
        .pageAll {
    width: 1000px;
    margin: 50px auto 50px;
    padding: 20px;
    background: #FFFFFF;
}
.page-top {
    background: url(tpl/weiqi/content/images/page-top2.jpg) no-repeat;
    width: 1000px;
    height: 170px;
    margin: 0 auto;
}
    .message-top {
    background: url(tpl/weiqi/content/images/message-top2.jpg) no-repeat;
    width: 1000px;
    height: 170px;
    margin: 0 auto;
}
</style>
<div class="container">
    <div class="pageAll">
        <div class="message-top"></div>
        <div class="mm-kb" style="text-align: left; padding-left: 40px; margin-top: -1px;">
            <p style="font-size:16px;font-weight:bold;color:red;text-align:center">
                <img src="tpl/skyblue/images/success.gif" align="absmiddle" />
                <?php echo $msg ?>
            </p>
            <p style="font-size:14px;color:red;text-align:center">
                <a style="color:green" href="<?php echo $url ?>">
                    如果
                    <span id="times">3</span>秒后没有跳转，请点击这里继续！
                </a>
            </p>
        </div>
        <div class="page-bottom" style="width: 1000px; height: 30px; margin: 0 auto;">
            <img src="tpl/weiqi/content/images/page-bottom.jpg" />
        </div>
    </div>
</div>

<script>
    var JumpUrl = function () {
        window.location.href = '<?php echo $url ?>';
	}
	$(function () {
	    setTimeout(changeTimes, 1000);
	})

	var changeTimes = function () {
	    if ($('#times').text() == 0) {
	        JumpUrl();
	        return false;
	    } else {
	        $('#times').text($('#times').text() - 1);
	        setTimeout(changeTimes, 1000);
	    }
	}
</script>