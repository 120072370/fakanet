<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    .form-horizontal span.red {
        color: red;
    }

    .form-horizontal span.green {
        color: green;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">申请结算</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <form name="applyforsettlement" action="?action=apply" method="post" onsubmit="return checkForm()" class="form-horizontal form-groups-bordered">

                       
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">账号名称</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $_SESSION['login_username'] ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">收款方式</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $payname ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">收款人</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $realname ?>" disabled>
                            </div>
                        </div>
                        <?php if($ptype==1): ?>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">开户银行</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $bank ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">卡号/账号</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo substr($card,0,14) ?>*****" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">开户地址</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $addr ?>" disabled>
                            </div>
                        </div>
                        <?php elseif($ptype==2): ?>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">支付宝账号</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $alipay ?>" disabled>
                            </div>
                        </div>
                        <?php elseif($ptype==3): ?>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">财付通账号</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $tenpay ?>" disabled>
                            </div>
                        </div>
                        <?php elseif($ptype==4): ?>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">微信号</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $wx_nickname ?>" disabled>
                                <input type="hidden" class="form-control" value="<?php echo $wx_openid ?>">
                            </div>
                        </div>

                        <?php endif; ?>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">账户余额</label>
                            <div class="col-sm-4">
                                <span class="green"><?php echo number_format($total_money,2,'.','') ?></span><span class="red">元</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">冻结金额</label>
                            <div class="col-sm-4">
                                <span class="red"><?php echo number_format($total_freeze,2,'.','') ?></span>元
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">手续费</label>
                            <div class="col-sm-4">

                                <?php if($apply_money<$Config['freemin']){?>
                                <span class="red bold shouxufei">
                                    <?php echo sprintf("%.2f", $Config['zuidishouxufei']>$apply_money*$Config['shouxufeilv']/100?$Config['zuidishouxufei']:$apply_money*$Config['shouxufeilv']/100);?></span>元
                                <?php }else{?>
                                <span class="red bold">0元
                                      </span>
                                <?php }?>

                            </div>
                        </div>
                        <?php if($total_money>0): ?>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">可提现金额</label>
                            <div class="col-sm-6">
                                <div class="input-spinner">
                                 
                                    <input type="text" data-mask="fdecimal" readonly="readonly" 
                                        class="form-control size-2 input apply_money" name="money" maxlength="6" value="<?php echo $apply_money ?>" data-max="<?php echo $apply_money ?>" data-min="<?php echo $Config['takecash'] >$apply_money?$apply_money : $Config['takecash']?>">
                                   
                                </div>
                            </div>
                           
                        </div>
                         <div class="form-group">
                            <div class="col-xs-12">
                                <p> 当前最低提现金额为<span class="red bold"><?php echo $Config['takecash'] ?></span>元，
                                    费率 <span class="red bold"><?php echo $Config['shouxufeilv'] ?>%</span>
                                <?php if($Config['zuidishouxufei']>0){?>
                                ， 单笔最低手续费 <span class="red bold"><?php echo $Config['zuidishouxufei'];?></span><?php }?> 元
                                    <?php if($Config['freemin']>0){?>
                                ，满<span class="red bold"><?php echo $Config['freemin'] ?></span>元免手续费<?php }?></p>
                                <p style="color: red;">满<?php echo $Config['takecash'] ?>元可以申请提现，申请提现需先解决投诉信息，否则无法到账。</p>
                                <p style="color: red;">当日22:00-00:00统一结算.</p>
                                <p style="color: red;font-weight:bold;">平台T+1结算，除当日的销售额。</p>
                            </div>
                        </div>
                        <?php if($Config['takecash']>=0): ?>
                        <div class="form-group">
                            <label for="field-1" class="col-xs-12 control-label">验证码</label>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="chkcode" maxlength="4">
                            </div>
                            <div class="col-xs-4">
                                <img src="../includes/libs/chkcode.php" align="absbottom" style="border: 1px solid #ccc" onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" title="点击刷新验证码">
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-success" value="申请结算">
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php else: ?>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <div class="alert alert-red">当前账户余额为0.00元，暂不能申请结算！</div>
                            </div>
                        </div>
                        <?php endif; ?>
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
