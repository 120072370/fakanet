<?php if(!defined('WY_ROOT')) exit; ?>

<script src="mobilewq/js/city.js" type="text/javascript"></script>
<script src="mobilewq/js/formValidator_min.js" type="text/javascript"></script>
<script src="mobilewq/js/formValidatorRegex.js" type="text/javascript"></script>

<div class="row">

    <div class="col-sm-6">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">商户信息修改</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">商户修改保存成功</div><?php endif; ?>
                    <?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">商户修改保存失败</div><?php endif; ?>
                    <script>setTimeout(hideMsg, 2600)</script>


                    <form name="edit" id="edit" method="post" onsubmit="return checkForm()" action="?action=editsave" class="form-horizontal form-groups-bordered">
                        <!--     <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商户编号</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="" disabled />
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商户名</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?php echo $_SESSION['login_username'] ?>" disabled />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">电子邮箱</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="email" value="<?php echo $email ?>"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">手机号码</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tel" <?php if($tel_check == 1){ echo 'readonly';}?>  maxlength="11" value="<?php echo $tel ?>" />
                            </div>
                            <!-- <tr class="tel_check_tr" style="display: none;">
                                <td class="right">验证码：</td>
                                <td>
                                    <input type="text" class="input tel_check_input" style="width: 60px;">
                                    <button class="tel_check_btn" type="button">发送验证码</button>&nbsp;<span class="tel_check_err" style="color: #f00;"></span></td>
                            </tr>-->
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商户 QQ</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  name="qq" value="<?php echo $qq ?>" disabled />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">店铺名称</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="sitename" placeholder="店铺名称，展示在购买页面"  maxlength="50" value="<?php echo $sitename ?>" />
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">店铺网址</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="siteurl" maxlength="50" value="<?php echo $siteurl ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">店铺公告</label>
                            <div class="col-sm-4">
                                <textarea rows="5" cols="50" class="form-control" placeholder="填写商家公告，展示在店铺页面" name="siteintr" maxlength="3000"><?php echo $siteintr ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">自动取卡</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_getgood" value="1" id="r1" <?php echo $is_getgood==1 ? 'checked' : '' ?> /><label for="r1">是</label>&nbsp;
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_getgood" value="0" id="r2" <?php echo $is_getgood==0 ? 'checked' : '' ?> /><label for="r2">否</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span class="red">订单付款完成后自动派卡，否则需要买家手动点击领取。</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">库存显示</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_invent" value="1" id="r3" <?php echo $is_invent==1 ? 'checked' : '' ?> /><label for="r3">实际库存数量</label>&nbsp;
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_invent" value="2" id="r4" <?php echo $is_invent==2 ? 'checked' : '' ?> /><label for="r4">显示库存范围</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                (<a href="javascript:void(0)" onclick="showview('?action=is_invent_desc','显示库存范围说明')"><strong class="red">库存显示说明?</strong></a>)
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">首显付款</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_paytype" value="1" id="r6" <?php echo $is_paytype==1 ? 'checked' : '' ?> /><label for="r6">网银支付</label>&nbsp;
                                </div>
                                <!--<input type="radio" name="is_paytype" value="2" id="r7"  /><label for="r7">充值卡支付</label>-->
                            </div>
                            <div class="col-sm-4">
                                <span class="red">设置购买页面默认显示的支付方式。</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">订单微信通知</label>
                            <div class="col-sm-6">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_notfiy" value="1" id="Radio1" <?php echo $is_notfiy==1 ? 'checked' : '' ?> /><label for="r6">开启通知</label>&nbsp;
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_notfiy" value="0" id="Radio2" <?php echo $is_notfiy==0 ? 'checked' : '' ?> /><label for="r7">关闭通知</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span class="red">客户购买成功，发送微信订单通知，需绑定微信公众号。</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">客户信息</label>
                            <div class="col-sm-6">
                                <select name="is_contact_limit" class="form-control">
                                    <option value="0"<?php echo $is_contact_limit==0 ? ' selected' : '' ?>>任意字符</option>
                                    <option value="1"<?php echo $is_contact_limit==1 ? ' selected' : '' ?>>必须为数字</option>
                                    <option value="2"<?php echo $is_contact_limit==2 ? ' selected' : '' ?>>必须为字母</option>
                                    <option value="3"<?php echo $is_contact_limit==3 ? ' selected' : '' ?>>必须为字母和数字</option>
                                    <option value="4"<?php echo $is_contact_limit==4 ? ' selected' : '' ?>>字母或数字、下划线</option>
                                    <option value="5"<?php echo $is_contact_limit==5 ? ' selected' : '' ?>>必须为中文</option>
                                    <option value="6"<?php echo $is_contact_limit==6 ? ' selected' : '' ?>>邮箱账号</option>
                                    <option value="7"<?php echo $is_contact_limit==7 ? ' selected' : '' ?>>手机号码</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <span class="red">客户下单时输入的联系方式或充值账号格式限制</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">店铺主页</label>
                            <div class="col-sm-6">
                                <select name="template" class="form-control">
                                    <option value="" <?php echo $template=='' || $template=='default' ? 'selected' : '' ?>>系统默认</option>
                                    <?php foreach($tplList as $key=>$val): ?>
                                    <option value="<?php echo $key ?>" <?php echo $template==$key ? 'selected' : '' ?>><?php echo $val ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <span class="red">设置购买页面风格样式</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">再次付款</label>
                            <div class="col-sm-6">
                                <select name="go_page_theme" class="form-control">
                                    <?php foreach($goPageList as $key=>$val): ?>
                                    <option value="<?php echo $key ?>" <?php echo $go_page_theme==$key ? 'selected' : '' ?>><?php echo $val ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <span class="red">设置继续付款页面风格样式</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">统计 JS</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="statistics" value="<?php echo $statistics ?>" disabled />
                            </div>
                            <div class="col-sm-4">
                                <span class="red">设置购买页面加载的统计代码(此项设置请联系客服)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="alert alert-info">商户收款信息</div>
                            </div>
                        </div>

                        <div class="form-group bank">
                            <label for="field-1" class="col-sm-3 control-label">收款方式</label>
                            <div class="col-sm-6">
                                <select name="ptype" id="ptype" class="input_login_selected form-control" onchange="selectptype()">
                                    <option value="2" <?php echo $ptype==2 ? 'selected' : '' ?>>支付宝</option>
                                    <option value="1" <?php echo $ptype==1 ? 'selected' : '' ?>>银行账户</option>
                                    <option value="3" <?php echo $ptype==3 ? 'selected' : '' ?>>财付通</option>
                                    <option value="4" <?php echo $ptype==4 ? 'selected' : '' ?>>微信收款</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <span class="red">建议微信收款，需绑定微信公众号</span>
                            </div>
                        </div>


                        <div class="form-group bank" id="bank1" style="display: none;">
                            <label for="field-1" class="col-sm-3 control-label">收款银行</label>
                            <div class="col-sm-6">
                                <select name="bank" id="bank" class="input_login_selected form-control" disabled="disabled">
                                    <option value="中国工商银行">中国工商银行</option>
                                    <option value="中国农业银行">中国农业银行</option>
                                    <option value="招商银行">招商银行</option>
                                    <option value="中国建设银行">中国建设银行</option>
                                    <option value="兴业银行">兴业银行</option>
                                    <option value="中国民生银行">中国民生银行</option>
                                    <option value="交通银行">交通银行</option>
                                    <option value="中信银行">中信银行</option>
                                    <option value="中国光大银行">中国光大银行</option>
                                    <option value="中国银行">中国银行</option>
                                    <option value="中国邮政储蓄">中国邮政储蓄</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <span class="red">请选择您的开户银行</span>
                            </div>
                        </div>


                        <div class="form-group" id="bank2" style="display: none;">
                            <label for="field-1" class="col-sm-3 control-label">开户城市</label>
                            <div class="col-sm-6">
                                <span id="residecitybox">
                                    <script type="text/javascript">
                                        showprovince('resideprovince', 'residecity', '<?php echo trim(substr($addr,0,strpos($addr, ' '))) ?>', 'residecitybox');
                                    </script>
                                    &nbsp;
                          <script type="text/javascript">
                              showcity('residecity', '<?php echo trim(substr($addr,strpos($addr, ' ')+1)) ?>', 'resideprovince', 'residecitybox');
                          </script>
                                </span>

                            </div>
                            <div class="col-sm-4">
                                <span id="residecityTip" class="onShow" style="display: none;"></span>
                            </div>
                        </div>

                        <div id="bank4" style="display: none;" class="form-group bank">
                            <label for="field-1" class="col-sm-3 control-label">收款账号</label>
                            <div class="col-sm-6">
                                <input type="text" name="card" id="ubank_no1" value="<?php echo $card ?>"  class="middle form-control" disabled="disabled">
                            </div>
                            <div class="col-sm-4">
                                <span id="ubank_no1Tip" class="onShow" style="display: none;"></span>
                            </div>
                        </div>


                        <div id="b_alipay" style="display: none;" class="form-group bank">
                            <label for="field-1" class="col-sm-3 control-label">支付宝账号</label>
                            <div class="col-sm-6">
                                <input type="text" name="alipay" id="alipay" value="<?php echo $alipay ?>" class="middle form-control">
                            </div>
                            <div class="col-sm-4">
                                <span id="alipayTip" class="onShow" style="display: inline;"></span>
                            </div>
                        </div>


                        <div id="b_tenpay" style="display: none;" class="form-group bank">
                            <label for="field-1" class="col-sm-3 control-label">财付通账号</label>
                            <div class="col-sm-6">
                                <input type="text" name="tenpay" id="tenpay" value="<?php echo $tenpay ?>" class="middle form-control" disabled="disabled">
                            </div>
                            <div class="col-sm-4">
                                <span id="tenpayTip" class="onShow" style="display: none;"></span>
                            </div>
                        </div>
                        <div id="b_wxpay" style="display: none;" class="form-group bank">
                            <label for="field-1" class="col-sm-3 control-label">微信号</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="wx_openid" id="wx_openid" class="middle form-control" value="<?php echo $openid_wx ?>" >
                                <input type="text" name="wx_nickname" id="wx_nickname" class="middle form-control" value="<?php echo $wx_nickname ?>" >
                            </div>
                            <div class="col-sm-4">
                                <span id="wx_nicknameTip" class="onShow" style="display: none;"></span>
                            </div>
                        </div>
                        <div class="form-group bank">
                            <label for="field-1" class="col-sm-3 control-label">真实姓名</label>
                            <div class="col-sm-6">
                                <input type="text" name="realname" id="ubank_user" value="<?php echo $realname ?>" class="middle form-control">
                            </div>
                            <div class="col-sm-4">
                                <span id="realnameTip" class="onShow">请填写已绑定银行卡的真实姓名，否则不能提现</span>
                            </div>
                        </div>

                        <div class="form-group bank">
                            <label for="field-1" class="col-sm-3 control-label">身份证号</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="idcard" name="idcard" value="<?php echo $idcard ?>" />
                            </div>
                            <div class="col-sm-4">
                                <span id="idcardTip" class="onShow"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-success" value="保存设置" />
                            </div>
                        </div>
                    </form>
                    <script>
                        if ($("#ptype").val() == 4) {
                            $(".bank").find(" input,select").attr("disabled", "disabled");
                        }

                        var selectptype = function () {
                            var val = $('#ptype').val();
                            if (val == '1') {
                                $("#residecity").attr("disabled", false).unFormValidator(false);
                                $("#ubank_no1").attr("disabled", false).unFormValidator(false);
                                $("#address").attr("disabled", false).unFormValidator(false);
                                $("#bank").attr("disabled", false);
                                $('tr.bank').show();
                                $("#alipay").attr("disabled", true).unFormValidator(true);
                                $("#tenpay").attr("disabled", true).unFormValidator(true);
                                $('tr.pt:not(.bank)').hide();
                                $("#bank1").show();
                                $("#bank2").show();
                                $("#bank3").show();
                                $("#bank4").show();
                                $("#b_alipay").hide();
                                $("#b_tenpay").hide();

                                $("#wx_nickname").attr("disabled", true).unFormValidator(true);
                                $("#wx_openid").attr("disabled", true).unFormValidator(true);
                                $("#b_wxpay").hide();
                            } else if (val == '2') {
                                $("#alipay").attr("disabled", false).unFormValidator(false);
                                $('tr.alipay').show();
                                $('tr.pt:not(.alipay)').hide();
                                $("#residecity").attr("disabled", true).unFormValidator(true);
                                $("#ubank_no1").attr("disabled", true).unFormValidator(true);
                                $("#address").attr("disabled", true).unFormValidator(true);
                                $("#bank").attr("disabled", true);
                                $("#tenpay").attr("disabled", true).unFormValidator(true);
                                $("#bank1").hide();
                                $("#bank2").hide();
                                $("#bank3").hide();
                                $("#bank4").hide();
                                $("#b_alipay").show();
                                $("#b_tenpay").hide();

                                $("#wx_nickname").attr("disabled", true).unFormValidator(true);
                                $("#wx_openid").attr("disabled", true).unFormValidator(true);
                                $("#b_wxpay").hide();
                            } else if (val == '3') {
                                $("#tenpay").attr("disabled", false).unFormValidator(false);
                                $('tr.tenpay').show();
                                $('tr.pt:not(.tenpay)').hide();
                                $("#residecity").attr("disabled", true).unFormValidator(true);
                                $("#ubank_no1").attr("disabled", true).unFormValidator(true);
                                $("#address").attr("disabled", true).unFormValidator(true);
                                $("#bank").attr("disabled", true);
                                $("#alipay").attr("disabled", true).unFormValidator(true);
                                $("#bank1").hide();
                                $("#bank2").hide();
                                $("#bank3").hide();
                                $("#bank4").hide();
                                $("#b_alipay").hide();

                                $("#wx_nickname").attr("disabled", true).unFormValidator(true);
                                $("#wx_openid").attr("disabled", true).unFormValidator(true);
                                $("#b_wxpay").hide();

                                $("#b_tenpay").show();
                            } else if (val == '4') {
                                $("#tenpay").attr("disabled", true).unFormValidator(true);
                                $('tr.tenpay').hide();
                                $('tr.pt:not(.tenpay)').hide();
                                $("#residecity").attr("disabled", true).unFormValidator(true);
                                $("#ubank_no1").attr("disabled", true).unFormValidator(true);
                                $("#address").attr("disabled", true).unFormValidator(true);
                                $("#bank").attr("disabled", true);
                                $("#alipay").attr("disabled", true).unFormValidator(true);
                                $("#bank1").hide();
                                $("#bank2").hide();
                                $("#bank3").hide();
                                $("#bank4").hide();
                                $("#b_alipay").hide();
                                $("#b_tenpay").hide();



                                $("#wx_nickname").attr("disabled", false).unFormValidator(false);
                                $("#wx_openid").attr("disabled", false).unFormValidator(false);
                                $("#b_wxpay").show();
                                if ($("#wx_openid").val() == "") {
                                    $("#wx_nicknameTip").html("你还未绑定微信,<a href='userWEIXIN.php'> 前往绑定微信</a>");
                                    $("#wx_nickname").attr("disabled", true);
                                } else {
                                    $("#wx_nickname").attr("disabled", false).unFormValidator(false);
                                }
                            }
                        };



                        $(function () {


                            $("#bank").val('<?php echo $bank ?>');

                            $.formValidator.initConfig({
                                formid: "edit",
                                onerror: function (msg) {
                                    alert(msg)
                                },
                                onsuccess: function () {
                                    return true;
                                }
                            });
                            $("#idcard").formValidator({/*empty:true,*/
                                onshow: "真实有效的身份证",
                                onfocus: "真实有效的身份证",
                                oncorrect: "请确认无误，注册后不能修改",
                                onempty: "身份证号码注册后不能修改"
                            }).inputValidator({
                                min: 17,
                                max: 18,
                                onerror: "身份证号码最多18位字符"
                            });

                            $("#BankList").formValidator({
                                onshow: "请选择您的开户银行，注册后不能修改",
                                onfocus: "请选择您的开户银行",
                                oncorrect: "开户行填写完成，注册后不能修改",
                                onempty: "开户银行必须选择"
                            }).inputValidator({
                                min: 1,
                                onerror: "开户银行必须选择"
                            });
                            $("#residecity").formValidator({
                                onshow: " ",
                                onfocus: "请选择您的开户银行所在城市",
                                oncorrect: " ",
                                onempty: "开户银行所在城市必须选择"
                            }).inputValidator({
                                min: 1,
                                onerror: "请选择您的开户银行所在城市"
                            });
                            $("#ubank_no1").formValidator({
                                onshow: " ",
                                onfocus: "请填写您的收款账号，请确认无误",
                                oncorrect: "收款账号填写完成"
                            }).regexValidator({
                                regexp: "^.{6,30}$",
                                onerror: "您填写的收款账号格式不正确"
                            });
                            $("#ubank_no2").formValidator({
                                onshow: "请确认您的收款账号",
                                onfocus: "请确认两次收款账号一致",
                                oncorrect: "收款账号一致"
                            }).regexValidator({
                                regexp: "^.{6,30}$",
                                onerror: "您填写的收款账号格式不正确"
                            }).compareValidator({
                                desid: "ubank_no1",
                                operateor: "=",
                                onerror: "两次收款账号不一致，请确认"
                            });
                            $("#ubank_user").formValidator({
                                onshow: "请填写收款人真实姓名，收款验证使用",
                                onfocus: "请填写收款人真实姓名，收款验证使用",
                                oncorrect: "收款人姓名填写完成。",
                                onempty: "收款人姓名必须填写"
                            }).inputValidator({
                                min: 2,
                                onerror: "收款人姓名必须填写真实姓名"
                            });
                            $("#alipay").formValidator({
                                onshow: " ",
                                onfocus: "请填写您的账号，仔细填写",
                                oncorrect: "支付宝账号填写完成",
                                onempty: "支付宝账号必须填写"
                            }).inputValidator({
                                min: 10,
                                onerror: "支付宝账号必须填写"
                            });
                            $("#wx_openid").formValidator({
                                onempty: "您还未绑定微信公众号"
                            }).inputValidator({
                                min: 1,
                                onerror: "您还未绑定微信公众号"
                            });
                            $("#wx_nickname").formValidator({
                                onshow: " ",
                                onfocus: "请填写您的微信号，微信需实名认证！",
                                oncorrect: "请确认微信已实名认证,或已绑定银行卡",
                                onempty: "微信号必须填写"
                            }).inputValidator({
                                min: 1,
                                onerror: "微信号必须填写"
                            });
                            $("#tenpay").formValidator({
                                onshow: " ",
                                onfocus: "请填写您的账号，仔细填写",
                                oncorrect: "财付通账号填写完成",
                                onempty: "财付通账号必须填写"
                            }).inputValidator({
                                min: 5,
                                onerror: "财付通账号必须填写"
                            });
                            $("#realname").formValidator({
                                onshow: "请填写已绑定银行卡的真实姓名",
                                onfocus: "请填写已绑定银行卡的真实姓名",
                                oncorrect: "请填写已绑定银行卡的真实姓名",
                                onempty: "请填写已绑定银行卡的真实姓名"
                            }).inputValidator({
                                min: 2,
                                onerror: "请填写已绑定银行卡的真实姓名"
                            });
                            //$("#chkcode").formValidator({
                            //    onshow: "请填写验证码",
                            //    onfocus: "请填写验证码",
                            //    oncorrect: "验证码填写完成",
                            //    onempty: "请填写验证码"
                            //}).inputValidator({
                            //    min: 4,
                            //    max: 4,
                            //    onerror: "验证码4字符"
                            //});
                            selectptype();
                        });

                        var checkForm = function () {
                            var tel = $.trim($('[name=tel]').val());
                            if (tel == '') {
                                alert('手机号码不能为空！');
                                $('[name=tel]').focus();
                                return false;
                            }
                            var reg = /^[1][3,2,4,5,8,6,7,9][0-9]{9}$/;
                            if (!reg.test(tel)) {
                                alert('手机号码格式错误！');
                                $('[name=tel]').focus();
                                return false;
                            }
                            var qq = $.trim($('[name=qq]').val());
                            var reg = /^[\d+]{5,11}$/;
                            if (qq != '' && !reg.test(qq)) {
                                alert('QQ号码格式错误！');
                                $('[name=qq]').focus();
                                return false;
                            }
                            var siteurl = $.trim($('[name=siteurl]').val());
                            if (siteurl != '') {
                                $('[name=siteurl]').val(siteurl.replace(/^http:\/\//i, ''))
                            }
                            return true;
                        }


                        //手机验证
                        jQuery(".tel_check").on('click', function () {
                            jQuery.post(
                                '/sms.php',
                                {
                                    action: "telshow"
                                },
                                function (data) {
                                    if (data.status == 0) {
                                        jQuery(".tel_show_err").html('24小时只能更换一次手机号');
                                        setTimeout(function () {
                                            jQuery(".tel_show_err").html('');
                                        }, 2000);
                                    } else {
                                        jQuery('.tel_check_tr').show();
                                        jQuery(".tel").prop('readonly', false);
                                        jQuery("#tel_check").val(0);
                                    }
                                }
                            );

                        });
                        jQuery(".tel_check_btn").on('click', function () {
                            var the = jQuery(this);
                            if (the.html() == '发送验证码') {
                                var i = 60;
                                var djs = setInterval(function () {
                                    i--;
                                    the.html(i + "秒后可重新发送");
                                    if (i == 0) {
                                        clearInterval(djs);
                                        the.html('发送验证码');
                                    }
                                }, 1000);
                                jQuery.post(
                                    '/sms.php',
                                    {
                                        action: "tel_check",
                                        mobile: jQuery.trim(jQuery(".tel").val())
                                    },
                                    function (data) {
                                        if (data.status == 1) {
                                            //jQuery(".tel_check_err").html('发送成功');
                                            setTimeout(function () {
                                                jQuery(".tel_check_err").html('');
                                            }, 2000);
                                        } else {
                                            jQuery(".tel_check_err").html(data.info);
                                            setTimeout(function () {
                                                jQuery(".tel_check_err").html('');
                                            }, 2000);
                                        }
                                    }
                                );
                            }
                        });
                        jQuery(".tel_check_input").on('blur', function () {
                            var code = jQuery.trim(jQuery(".tel_check_input").val());
                            if (code == "") {
                                return false;
                            }
                            jQuery.post(
                                '/sms.php',
                                {
                                    action: "validate",
                                    code: code
                                },
                                function (data) {
                                    if (data.status == 0) {
                                        jQuery(".tel_check_err").html('验证码错误');
                                        setTimeout(function () {
                                            jQuery(".tel_check_err").html('');
                                        }, 2000);
                                    } else if (data.re === true) {
                                        jQuery(".tel_check_err").html('验证通过');
                                        jQuery(".tel").prop('readonly', true);
                                        jQuery("#tel_check").val(1);
                                        setTimeout(function () {
                                            jQuery(".tel_check_input").closest('tr').hide();
                                            jQuery(".tel_check_err").html('');
                                        }, 2000);
                                    }
                                }
                            );
                        });


                    </script>
                </div>

            </div>

        </div>

    </div>

</div>
