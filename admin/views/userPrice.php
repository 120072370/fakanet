<?php if(!defined('WY_ROOT')) exit; ?>

<div style="width: 530px;">
    <?php if(!$userPrice): ?>
    <p>未配置通道！</p>
    <?php else: ?>
    <form name="f" action="?action=saveUserPrice&userid=<?php echo $id ?>" method="post">
        <table class="tablelist" border="0" cellspacing="1">
            <tr>
                <th class="center">通道ID</th>
                <th class="center">通道名称</th>
                <th class="center">商户分成</th>
                <th class="center">状态</th>
            </tr>
            <?php foreach($userPrice as $key=>$val): ?>
            <tr class="lightbox" id="u_<?php echo $val['id'] ?>">
                <td class="center" style="background: #fff"><?php echo $val['channelid'] ?></td>
                <td class="center" style="background: #fff"><?php echo $val['channelname'] ?></td>
                <td class="center" style="background: #fff">
                    <input type="text" name="price_<?php echo $val['id'] ?>" class="input" size="10" value="<?php echo $val['price'] ?>" /></td>
                <td class="center" style="background: #fff">
                    <select name="is_state_<?php echo $val['id'] ?>">
                        <option value="0"<?php echo $val['is_state']==0 ? ' selected' : '' ?>>开启</option>
                        <option value="1"<?php echo $val['is_state']==1 ? ' selected' : '' ?>>关闭</option>
                    </select>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4" class="center whitebg padding_top_bottom_5">
                    <input type="text" name="price_ty" id="price_ty" class="input" size="10" value="0.94" />
                    <input type="button" class="button_bg_2" id="setbtn" onclick="set()" value="统一分成" /></td>
            </tr>
            <tr>
                <td colspan="4" class="center whitebg padding_top_bottom_5">
                    <input type="submit" class="button_bg_2" value="保存设置" /></td>
            </tr>
        </table>
    </form>
    <?php endif; ?>
</div>
<script>
    function set() {
        var price = $("#price_ty").val();
        if (price > 0) {
            $(".tablelist").find("input[type=text]").val(price);
        }
    }
</script>
