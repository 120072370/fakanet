<?php if(!defined('WY_ROOT')) exit;?>
<input type="hidden" id="shouxufeilv" value="<?php echo $config['shouxufeilv']/100;?>" />
<input type="hidden" id="freemin" value="<?php echo $config['freemin'];?>" />
<form name="add" method="post" onsubmit="return checkForm(<?php echo $userid ?>)" action="?action=addsave&userid=<?php echo $userid ?>">
    <table class="register">
        <tr>
            <td width="50" class="right">账单设置</td>
            <td>
                <select name="is_state" class="input">
                    <option value="0">正在处理</option>
                    <option value="1" selected>处理成功</option>
                    <option value="2">处理失败</option>
                </select>
                <select name="pid" class="input">
                    <option value="1" selected>平台结算</option>
                    <option value="2">商户提款</option>
                </select>
            </td>
        </tr>

        <tr>
            <td class="right">商户名</td>
            <td>
                <input type="text" class="input" name="username" id="username<?php echo $userid ?>" size="49" maxlength="20" value="<?php echo $username ?>" /></td>
        </tr>
        <tr>
            <td class="right">结算方式</td>
            <td>
            <?php if($rs_userinfo["ptype"]==1){
                         echo "银行卡结算";
                      }else if($rs_userinfo["ptype"]==2){
                            echo "支付宝";
                      }elseif($rs_userinfo["ptype"]==3){
                          echo "财付通";
                      }else if ($rs_userinfo["ptype"]==4){
                          echo "微信钱包";
                  }?>
                 <?php if($rs_userinfo["ptype"]==4):?>
                <br />
                
                <a href="javascript:void(0)"  onclick="Boxy.load('payments.php?action=editpaywx&yest=1&id=<?php echo $userid?>&Trondeo=<?php echo $Trondeo?>',{title:'微信付款',unloadOnHide:true})" target="_blank">去微信付款</a>
    
                <input type="hidden" value="<?php echo $Trondeo?>" name="Trondeo" />
                <?php endif;?>
            </td>
        </tr>
        <tr>
            <td class="right">结算金额</td>
            <td>
                <input type="text" class="input jsje" name="money" id="money<?php echo $userid ?>" size="49" maxlength="6" value="<?php echo $flag ? 0 : $yestodayUserIncome ?>" /></td>
        </tr>
        <?php if($unpaid!=''):?>
        <tr>
            <td class="right"></td>
            <td><strong class="green">当前余额：<?php echo $unpaid ?> 元 昨日收入：<?php echo $yestodayUserIncome ?> 元 <?php echo $flag ? '<span class="red">[已结算]</span>' : '' ?></strong></td>
        </tr>
        <?php endif;?>

        <tr>
            <td class="right">手续费</td>
            <td>
                <input type="text" class="input sxf" name="fee" size="49" maxlength="6" value="0" /></td>
        </tr>

        <tr>
            <td class="right">备注说明</td>
            <td>
                <textarea name="remark" cols="50" rows="5" class="input"><?php if($rs_userinfo['ptype']==1){
		echo '姓名：'.$rs_userinfo['realname']."\n";	
		echo '开户银行：'.$rs_userinfo['bank']."\n";
		echo '开户地址：'.$rs_userinfo['addr']."\n";
		echo '银行卡号：'.$rs_userinfo['card']."\n";
	}else if($rs_userinfo['ptype']==2){
		echo '姓名：'.$rs_userinfo['realname']."\n";	
		echo "支付宝：".$rs_userinfo['alipay'];
	}else if($rs_userinfo['ptype']==3){
		echo '姓名：'.$rs_userinfo['realname']."\n";	
		echo "财付通：".$rs_userinfo['tenpay'];
	}else if($rs_userinfo['ptype']==4){
		echo '姓名：'.$rs_userinfo['wx_nickname']."\n";	
		echo "Openid：".$rs_userinfo['wx_openid'];
	}
	?>
	
	</textarea></td>
        </tr>

        <tr>
            <td class="right"></td>
            <td>
                <input type="submit" class="button_bg_2" value="保存结算" />&nbsp;&nbsp;<span id="returnMsg"></span></td>
        </tr>
    </table>
</form>

<script>
    jQuery(document).ready(function ($) {
        try {
            //结算金额
            jQuery(document).on('blur', '.jsje', function () {
                if (jQuery('.jsje').val() >= jQuery('#freemin').val()) {
                    jQuery('.sxf').val(0);
                } else {
                    jQuery('.sxf').val(Number(jQuery('#shouxufeilv').val() * jQuery('.jsje').val()).toFixed(2));
                }

            });
            jQuery(document).on('focus', '.sxf', function () {
                jQuery('.jsje').blur();
            });
        } catch (e) { }
    });
    function checkForm(userid) {
        var username = document.getElementById("username" + userid).value;
        if (username == '') {
            alert('商户名不能为空！');
            document.getElementById("username" + userid).focus();
            return false;
        }

        var money = document.getElementById("money" + userid).value;
        if (money == '' || money <= 0) {
            alert('结算金额不能为空且大于0元！');
            document.getElementById("money" + userid).focus();
            return false;
        }
        return true;
    }
</script>
