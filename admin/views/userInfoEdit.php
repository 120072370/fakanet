<?php if(!defined('WY_ROOT')) exit;?>

<form name="add" method="post" action="?action=editsave&id=<?php echo $userid ?>">
    <table class="register">
        <?php if($sn): ?>
        <tr>
            <td class="right">密保卡序列号</td>
            <td class="bold">10 000 000 <?php echo $sn ?> <a href="userinfo.php?action=delPwcard&userid=<?php echo $userid ?>" class="red" onclick="if(!confirm('是否要格式化此密码卡？'))return false">[格式化]</a></td>
        </tr>
        <?php endif; ?>

        <tr>
            <td width="90" class="right">商户登陆名</td>
            <td>
                <input type="text" name="username" disabled class="input" size="40" maxlength="50" value="<?php echo $username ?>" />
                <p class="err_msg" id="err_msg_1"></p>
            </td>
        </tr>

        <tr>
            <td class="right">安全密码开关</td>
            <td>
                <input type="radio" name="is_safe" id="is_safe_1" onclick="$('.safekey').show();" value="1" <?php echo $is_safe==1 ? 'checked' : '' ?> />
                <label for="is_safe_1">打开</label>&nbsp;&nbsp;
                <input type="radio" name="is_safe" id="is_safe_2" onclick="$('.safekey').hide();" value="0" <?php echo $is_safe==0 ? 'checked' : '' ?> />
                <label for="is_safe_2">关闭</label>
            </td>
        </tr>

        <?php if($is_safe==1): ?>
        <tr class="safekey">
            <td class="right">安全密码</td>
            <td>
                <input type="password" name="safekey" class="input" size="40" maxlength="20" />
                <p class="err_msg" id="err_msg_2"></p>
            </td>
        </tr>
        <?php endif; ?>

        <?php if($is_safe==0): ?>
        <tr class="safekey" style="display: none">
            <td class="right">安全密码</td>
            <td>
                <input type="password" name="safekey" class="input" size="40" maxlength="20" />
                <p class="err_msg" id="err_msg_2"></p>
            </td>
        </tr>
        <?php endif; ?>

        <tr>
            <td class="right">唯一登陆开关</td>
            <td>
                <input type="radio" name="is_login" id="is_login_1" value="1" <?php echo $is_login==1 ? 'checked' : '' ?> />
                <label for="is_login_1">打开</label>&nbsp;&nbsp;
                <input type="radio" name="is_login" id="is_login_2" value="0" <?php echo $is_login==0 ? 'checked' : '' ?> />
                <label for="is_login_2">关闭</label>
            </td>
        </tr>

        <tr>
            <td class="right">收款方式</td>
            <td>
                <select name="ptype" onchange="selectptype()">
                    <option value="1" <?php echo $ptype==1 ? 'selected' : '' ?>>银行转账</option>
                    <option value="2" <?php echo $ptype==2 ? 'selected' : '' ?>>支付宝转账</option>
                    <option value="3" <?php echo $ptype==3 ? 'selected' : '' ?>>财付通转账</option>
                    <option value="4" <?php echo $ptype==4 ? 'selected' : '' ?>>微信钱包</option>
                </select>
            </td>
        </tr>

        <tr class="bank" style="display:<?php echo $ptype==1 ? '' : 'none' ?>">
            <td class="right">银行名称</td>
            <td>
                <select name="bank" class="input">
                    <?php foreach($selectBanks as $bankname): ?>
                    <option value="<?php echo $bankname ?>"<?php echo $bank==$bankname ? ' selected' : '' ?>><?php echo $bankname ?></option>
                    <?php endforeach; ?>
                </select><p class="err_msg" id="err_msg_7"></p>
            </td>
        </tr>

        <tr class="bank" style="display:<?php echo $ptype==1 ? '' : 'none' ?>">
            <td class="right">银行卡号</td>
            <td>
                <input type="text" name="card" class="input" size="40" maxlength="50" value="<?php echo $card ?>" />
                <p class="err_msg" id="err_msg_8"></p>
            </td>
        </tr>

        <tr class="bank" style="display:<?php echo $ptype==1 ? '' : 'none' ?>">
            <td class="right">开户地址</td>
            <td>
                <input type="text" name="addr" class="input" size="40" maxlength="50" value="<?php echo $addr ?>" />
                <p class="err_msg" id="err_msg_9"></p>
            </td>
        </tr>

        <tr class="alipay" style="display:<?php echo $ptype==2 ? '' : 'none' ?>">
            <td class="right">支付宝账号</td>
            <td>
                <input type="text" name="alipay" class="input" size="40" maxlength="50" value="<?php echo $alipay ?>" />
                <p class="err_msg" id="err_msg_10"></p>
            </td>
        </tr>

        <tr class="tenpay" style="display:<?php echo $ptype==3 ? '' : 'none' ?>">
            <td class="right">财付通账号</td>
            <td>
                <input type="text" name="tenpay" class="input" size="40" maxlength="50" value="<?php echo $tenpay ?>" />
                <p class="err_msg" id="err_msg_11"></p>
            </td>
        </tr>

        <tr class="wxpay" style="display:<?php echo $ptype==4 ? '' : 'none' ?>">
            <td class="right">微信openid</td>
            <td>
                <input type="text" name="wx_openid" class="input" size="40" maxlength="50" value="<?php echo $wx_openid ?>" />
                <p class="err_msg" id="err_msg_11"></p>
            </td>
        </tr>
         <tr class="wxpay" style="display:<?php echo $ptype==4 ? '' : 'none' ?>">
            <td class="right">微信号</td>
            <td>
                <input type="text" name="wx_nickname" class="input" size="40" maxlength="50" value="<?php echo $wx_nickname ?>" />
                <p class="err_msg" id="P1"></p>
            </td>
        </tr>
        <tr>
            <td class="right">真实姓名</td>
            <td>
                <input type="text" name="realname" class="input" value="<?php echo $realname ?>" size="40" /></td>
        </tr>

        <tr>
            <td class="right">身份证号</td>
            <td>
                <input type="text" name="idcard" class="input" value="<?php echo $idcard ?>" size="40" /></td>
        </tr>

        <tr>
            <td class="right"></td>
            <td>
                <input type="submit" class="button_bg_2" value="保存用户" />
                <span id="returnMsg"></span></td>
        </tr>
    </table>
</form>

<script>
    var selectptype = function () {
        var ptype = $('[name=ptype]').val();
        if (ptype == '1') {
            $('tr.bank').show();
            $('tr.alipay').hide();
            $('tr.tenpay').hide();
            $('tr.wxpay').hide();
        } else if (ptype == '2') {
            $('tr.alipay').show();
            $('tr.bank').hide();
            $('tr.tenpay').hide();
            $('tr.wxpay').hide();
        } else if (ptype == '3') {
            $('tr.tenpay').show();
            $('tr.alipay').hide();
            $('tr.bank').hide();
            $('tr.wxpay').hide();
        } else if (ptype == '4') {
            $('tr.wxpay').show();
            $('tr.tenpay').hide();
            $('tr.alipay').hide();
            $('tr.bank').hide();
        }
    }
</script>
