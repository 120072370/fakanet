<?php if(!defined('WY_ROOT')) exit;?>

<form name="edit" method="post" action="?action=editsave&id=<?php echo $id ?>">
    <table class="register">
        <tr>
            <td width="60" class="right">账单设置</td>
            <td>
                <select name="is_state" class="input">
                    <option value="0"<?php echo $is_state==0 ? ' selected' : '' ?>>正在处理</option>
                    <option value="1"<?php echo $is_state==1 ? ' selected' : '' ?>>处理成功</option>
                    <option value="2"<?php echo $is_state==2 ? ' selected' : '' ?>>处理失败</option>
                </select>

                <select name="paycid" class="input">
                    <option value="1"<?php echo $pid==1 ? ' selected' : '' ?>>平台结算</option>
                    <option value="2"<?php echo $pid==2 ? ' selected' : '' ?>>商户提款</option>
                </select>
            </td>
        </tr>

        <tr>
            <td class="right">收款方式：</td>
            <td><?php echo $strfs ?>
                <?php if($data["ptype"] == 4 ):?>
                <a href="javascript:void(0)"  onclick="Boxy.load('?action=editpaywx&yest=2&id=<?php echo $id?>&Trondeo=<?php echo $data["Trondeo"]?>',{title:'微信付款',unloadOnHide:true})" target="_blank">去微信付款</a>

                <input type="hidden" value="<?php echo $data['ptype'] ?>" name="ptype" />
                <input type="hidden" value="<?php echo $data['realname'] ?>" name="realname" />
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td class="right">商户名</td>
            <td>
                <input type="text" class="input" name="username"  size="49" maxlength="20" value="<?php echo $username ?>" disabled /></td>
        </tr>

        <tr>
            <td class="right">结算金额</td>
            <td>
                <input type="text" class="input" name="money" size="49" maxlength="6" value="<?php echo $money ?>" /></td>
        </tr>

        <tr>
            <td class="right">手续费</td>
            <td>
                <input type="text" class="input" name="fee"  size="49" maxlength="6" value="<?php echo $fee ?>" /></td>
        </tr>
        <tr>
            <td class="right">明细</td>
            <td><strong class="green">当前余额：<?php echo $unpaid ?> 元 昨日收入：<?php echo $yestodayUserIncome ?> 元 
            </strong>
                <br />
                <strong class="green">上次提现时间：<?php echo $lastaddtime =="1900-1-1 00:00:00"? "":$lastaddtime?>
                    <br />
                    累计销售<?php echo $allUserIncome?>
                </strong>

            </td>
        </tr>
        <tr>
            <td class="right">备注说明</td>
            <td>
                <textarea name="remark" id="remark" cols="50" rows="5" class="input"><?php echo $remark ?></textarea></td>
        </tr>

        <tr>
            <td class="right"></td>
            <td>
                <input type="submit" class="button_bg_2" value="保存结算" />&nbsp;&nbsp;<span id="returnMsg"></span></td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    setTimeout(function () {
        var str = '<?php echo $remark ?>';
    jQuery("#remark").html(str.replace(/<br>/g, '\n'));
}, 500);
</script>
