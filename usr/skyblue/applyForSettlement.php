<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    table {
        border-collapse: collapse;
    }

        table.table_style_2 td {
            padding: 0;
            height: 40px;
            padding: 8px 15px;
            border: 1px solid #eaeaea;
        }

            table.table_style_2 td:nth-child(1) {
                width: 30%;
                background: #f5f4ff;
                font-weight: bold;
            }

            table.table_style_2 td:nth-child(2) {
                text-align: left;
            }

    td span.red {
        color: red;
    }

    .right {
        text-align: right;
    }
</style>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">申请结算</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <form name="applyforsettlement" action="?action=apply" method="post" onsubmit="return checkForm()">
                        <table class="table_style_2">
                            
                            <tr>
                                <td class="right">用户名:</td>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['login_username'] ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="right">收款方式:</td>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $payname ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="right">收款人:</td>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $realname ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                            <?php if($ptype==1): ?>
                            <tr>
                                <td class="right">开户银行:</td>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $bank ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="right">卡号/账号:</td>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo substr($card,0,14) ?>*****" disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="right">开户地址:</td>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $addr ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                            <?php elseif($ptype==2): ?>
                            <tr>
                                <td class="right">支付宝账号:</td>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $alipay ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                            <?php elseif($ptype==3): ?>
                            <tr>
                                <td class="right">财付通账号:</td>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $tenpay ?>" disabled>
                                    </div>
                                </td>
                            </tr>
                            <?php elseif($ptype==4): ?>
                            <tr>
                                <td class="right">微信号:</td>
                                <td>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" value="<?php echo $wx_nickname ?>" disabled>
                                        <input type="hidden" class="form-control" value="<?php echo $wx_openid ?>">
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="right">账户余额:</td>
                                <td class="bold">
                                    <div class="col-md-6">
                                        <span class="green"><?php echo number_format($total_money,2,'.','') ?></span><span class="red">元</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="right">冻结金额:</td>
                                <td class="bold">
                                    <div class="col-md-6">
                                        <span class="red"><?php echo number_format($total_freeze,2,'.','') ?></span>元
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="right">手续费:</td>
                                <td class="bold">
                                    <div class="col-md-2">
                                        <span class="red">
                                            <span class="red bold shouxufei">
                                                <?php if($apply_money >= $Config['freemin']): ?>
                                                <span>0元</span>
                                                <?php else:?>
                                                <?php echo sprintf("%.2f", $Config['zuidishouxufei']>$apply_money*$Config['shouxufeilv']/100?$Config['zuidishouxufei']:$apply_money*$Config['shouxufeilv']/100);?></span>元
                                            <?php endif;?>
                                        </span>
                                    </div>


                                </td>
                            </tr>
                            <?php if($total_money>0): ?>
                            <tr>
                                <td class="right">可提现金额:</td>
                                <td>
                                    <div class="col-md-6">

                                        <div class="input-spinner">
                                           <!-- <button type="button" class="btn btn-default">-</button>-->
                                            <input type="text" data-mask="fdecimal" class="form-control size-2 input apply_money" name="money" maxlength="6" readonly="true"
                                                 value="<?php echo $apply_money ?>" data-max="<?php echo $apply_money ?>" data-min="<?php echo $Config['takecash'] ?>">
                                           <!-- <button type="button" class="btn btn-default">+</button>-->
                                        </div>
                                        <!-- <input type="number" max="<?php echo $apply_money ?>" class="input apply_money form-control" value="<?php echo $apply_money ?>" name="money" maxlength="6">-->
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <p>
                                        当前最低提现金额为<span class="red bold"><?php echo $Config['takecash'] ?></span>元，
                                    费率 <span class="red bold"><?php echo $Config['shouxufeilv'] ?>%</span>
                                        <?php if($Config['zuidishouxufei']>0){?>
                                        ， 单笔最低手续费 <span class="red bold"><?php echo $Config['zuidishouxufei'];?></span><?php }?> 元
                                    <?php if($Config['freemin']>0){?>
                                        ，满<span class="red bold"><?php echo $Config['freemin'] ?></span>元免手续费<?php }?>
                                    </p>
                                    <p style="color: red;">满<?php echo $Config['takecash'] ?>元可以申请提现，申请提现需先解决投诉信息，否则无法到账。</p>
                                    <p style="color: red;">当日22:00-00:00统一结算.</p>
                                    <p style="color: red; font-weight: bold;">平台T+1结算，除当日的销售额。</p>
                                </td>
                            </tr>
                            <?php if($Config['takecash']>=0): ?>
                            <tr>
                                <td class="right">验证码:</td>
                                <td>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="chkcode" style="width: 122px" maxlength="4">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="../includes/libs/chkcode.php" align="absbottom" style="border: 1px solid #ccc" onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" title="点击刷新验证码">
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td class="right"></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="申请结算">
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php else: ?>
                            <tr>
                                <td></td>
                                <td>当前账户余额为0.00元，暂不能申请结算！</td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </form>
                </div>


            </div>

        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($){ 
       
    function checkForm(){
        var tf=<?php echo $Config['takecash_f'] ?>;
        var tt=<?php echo $Config['takecash_t'] ?>;
        var ts=<?php echo $Config['takecash_state'] ?>;
        if(ts==1){
            alert('<?php echo $Config['takecash_msgtip'] ?>');
            return false; 
        }
        var tn=<?php echo date('G') ?>;
        if(tn<tf || tn>tt){
            alert('当前系统允许提现时间从 '+tf+'点至 '+tt+'点，其他时间暂不能申请提现!');
            return false;
        }
        var chkcode=$.trim($('[name=chkcode]').val());
        if(chkcode==''){
            alert('请输入验证码！');
            $('[name=chkcode]').focus();
            return false;
        }

        var money=$.trim($('[name=money]').val());
        if(money=='' || money<=0){
            alert('请输入申请大于0的结算金额！');
            $('[name=money]').focus();
            return false;
        }

		<?php if($Config['takecash']>0): ?>
        var takecash=<?php echo $Config['takecash'] ?>;
        if(money<takecash){
            alert('平台最低提现金额为'+takecash+'元！');
            $('[name=money]').focus();
            return false;
        }
		<?php endif; ?>

        if(money><?php echo $apply_money ?>){
		    alert('账户余额不足！');
        $('[name=money]').focus();
        return false;
    }

    return true;
    }
</script>
<script src="<?php echo USER_THEME ?>/assets/js/jquery.inputmask.bundle.min.js"></script>
