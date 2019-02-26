<?php if(!defined('WY_ROOT')) exit;?>

<form name="edit" id="edit" method="post" action="">
    <table class="register">
        <tr>
            <td class="right">商户名</td>
            <td>
                <input type="text" class="input" name="username"  size="49" maxlength="20" value="<?php echo $username ?>" disabled /></td>
        </tr>
        <tr>
            <td class="right">校验真实姓名：</td>
            <td>
                <select name="is_Check" class="input">
                    <option value="NO_CHECK">不校验真实姓名</option>
                    <option value="FORCE_CHECK" selected>校验真实姓名</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="right">真实姓名</td>
            <td>
                <input type="text" class="input" name="realname" id="realname"  size="49" maxlength="20" value="<?php echo $realname ?>" readonly /></td>
        </tr>
        <tr>
            <td class="right">微信Openid</td>
            <td>
                <input type="text" class="input" name="openid_wx" id="openid_wx"  size="49" maxlength="20" value="<?php echo $openid_wx ?>" readonly /></td>
        </tr>

        <tr>
            <td class="right">结算金额</td>
            <td>
                <input type="hidden" value="<?php echo $money ?>" name="money2" id="money2" />
                <input type="text" class="input" name="money1" id="money1" size="49"  maxlength="6" value="<?php echo $money ?>" readonly /></td>
        </tr>

        <tr>
            <td class="right">订单编号</td>
            <td>
                <input type="text" class="input" name="Trondeo"  size="49"  value="<?php echo $_REQUEST["Trondeo"] ?>" readonly /></td>
        </tr>
         <tr>
            <td class="right">备注说明</td>
            <td>
                <input type="text" class="input" name="remake"  size="49"  value="WeiQi-微奇发卡结算通知-<?php echo $realname ?>" /></td>
        </tr>
         <tr>
            <td class="right">安全验证</td>
            <td>
                <input type="text" class="input" name="safepwd"  size="49"  value="" /></td>
        </tr>
        <tr>
            <td class="right"></td>
            <td>
                <input type="button" id="subbg" class="button_bg_2" onclick="sub($(this))" value="提交结算" />&nbsp;&nbsp;<span id="returnMsg"></span></td>
        </tr>
    </table>
   
</form>
<script type="text/javascript">
    function sub(obj) {
        if ($("#money1").val() > $("#money2").val()) {
            alert("支付金额大于指定金额，禁止转账");
            return;
        }
        if (confirm("您确认要给Wx：" + $("#openid_wx").val() + "付款" + $("#money1").val() + "元吗？")) {
           // alert($('#' + form).serialize());
            if (confirm("付款实际金额：" + $("#money1").val() + "元，请再次确认！")) {
                var form = obj.closest("form").attr("id");
                var AjaxURL = "?action=posteditpaywx";
                $.ajax({
                    type: "POST",
                    url: AjaxURL,
                    data: $('#' + form).serialize(),
                    success: function (data) {
                        var strresult = data;
                        alert(strresult);
                    },
                    error: function (data) {
                        alert("error:" + data.responseText);
                    }
                });
            }
           
        }
    }
</script>
