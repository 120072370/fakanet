<?php if(!defined('WY_ROOT')) exit; ?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-danger" data-collapsed="0">
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">跳转提示</div>
            </div>

            <!-- panel body -->
            <div class="panel-body">

                <table style="width: 60%; margin: auto">
                    <tr>
                        <td style="text-align: center; line-height: 22px">
                            <img src="weiqi/images/<?php echo !isset($img) ? 'success' : $img ?>.gif" align="absmiddle" />
                            <?php echo $msg ?></td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 12px; text-align: center; margin-top: 20px;"><a href="<?php echo $url ?>">如果3秒后没有跳转，请点击这里继续！</a></p>
                        </td>
                    </tr>
                </table>
            </div>

        </div>

    </div>
</div>
<script>
    var JumpUrl = function () {
        window.location.href = '<?php echo $url ?>';
}
$(function () { setTimeout(JumpUrl, 3000); })
</script>
