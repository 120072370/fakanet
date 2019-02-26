<html>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">-->
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $title ?>_<?php echo $title;?></title>



    <link rel="stylesheet" href="/atest/assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="/atest/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/atest/assets/css/neon-core.css">
    <link rel="stylesheet" href="/atest/assets/css/neon-theme.css">
    <link rel="stylesheet" href="/atest/assets/css/neon-forms.css">
    <link rel="stylesheet" href="/atest/assets/css/custom.css">
    <link rel="stylesheet" href="/atest/assets/css/skins/white.css">
    <script src="/atest/assets/js/jquery-1.11.0.min.js"></script>

    <link rel="stylesheet" href="/atest/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="/atest/assets/js/select2/select2.css">
    <link rel="stylesheet" href="/atest/assets/js/selectboxit/jquery.selectBoxIt.css">

    <!--[if lt IE 9]><script src="/atest/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
    <script src="/lin/blue/js/nyro.js" type="text/javascript"></script>


</head>

<body class="page-body skin-white">
    <div class="page-container">
        <div class="sidebar-menu">
            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="/index.htm">
                        <img src="/images/logo.png" width="120" alt="" />
                    </a>
                </div>
                <ul class="user-info pull-left pull-right-xs pull-none-xsm">
                    <!--<li>
                        <a href="/index.htm"><i class="glyphicon glyphicon-home"></i>首页
                        </a>
                    </li>-->
                    <li class="notifications dropdown">
                        <a href="/orderquery.htm"><i class="glyphicon glyphicon-search"></i>订单查询
                        </a>
                    </li>
                    <li class="notifications dropdown">
                        <a href="javascript:void(0)" onclick="showAjaxModal('report.php?action=mobile&uid=<?php echo $userid ?>&t=1','举报投诉')"  class="text-danger">
                            <i class="glyphicon glyphicon-warning-sign"></i>投诉举报
                        </a>
                    </li>
                </ul>
            </header>
        </div>

        <div class="main-content " style="padding-top: 0px;">
            <div class="row ">
                <div class="col-md-12 no-padding">
                    <div class="sorted ui-sortable fixed">

                        <div class="panel panel-info" data-collapsed="0">

                            <!-- panel head -->
                            <div class="panel-heading panel-blue">
                                <div class="panel-title"><strong><i class="entypo-user"></i>商家信息</strong></div>

                            </div>

                            <!-- panel body -->
                            <div class="panel-body no-paddingleftright no-buttom panel-bluebody">

                                <div class="tile-stats tile-white-blue no-margin" style="padding:5px;">

                                    <div class="icon"><i class="entypo-paper-plane"></i></div>
                                    <div class="num"><?php echo $sitename ?></div>
                                    <h3>商家客服QQ：<?php echo $qq ?></h3>
                                     <strong><?php echo GetLinUserLevel($level) ?></strong>
                                    <div class="alert alert-default">
                                        <h4 class="btn btn-info">商家公告:
                                        <i class="glyphicon glyphicon-bullhorn"></i>
                                        </h4>
                                        <p><?php echo $siteintr == ""?"商家很懒，没留下任何信息":$siteintr ?></p>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <form name="p" method="post" class="form-horizontal form-groups-bordered nyroModal" action="wap.php" target="_blank">
                            <div class="panel panel-info" data-collapsed="0">
                                <!-- panel head -->
                                <div class="panel-heading panel-blue">
                                    <div class="panel-title"><strong><i class="entypo-layout"></i>选择商品</strong></div>
                                </div>
                                <!-- panel body -->
                                <div class="panel-body">

                                    <input type="checkbox" name="isagree" value="true" checked="" style="display: none;">
                                    <input type="hidden" name="userid" value="<?php echo $userid ?>" />
                                    <input type="hidden" name="token" value="<?php echo $token ?>" />
                                    <input type="hidden" name="cardNoLength" value="0" />
                                    <input type="hidden" name="cardPwdLength" value="0" />
                                    <input type="hidden" name="api_username" value="<?php echo _G('username') ?>" />
                                    <input type="hidden" name="paytype" id="paytype" value="alipay" />
                                     <input type="hidden" name="fromid" value="<?php echo $from ?>" />
                                    <div class="col-sm-12">
                                        <?php if(!$goodid): ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">商品分类</label>
                                            <div class="col-sm-5">
                                                <?php if($cateid): ?>
                                                <h4><?php echo $catename ?></h4>
                                                <script>
                                                    $(function () {
                                                        selectcateid();
                                                    })
                                                </script>
                                                <input type="hidden" name="cateid" id="cateid" value="<?php echo $cateid ?>" />

                                                <?php else: ?>
                                                <select name="cateid" id="cateid" class="form-control selectboxit" onchange="selectcateid()">
                                                    <option value="">请选择分类</option>
                                                    <?php
                                                          if($goodCate):
                                                              foreach($goodCate as $key=>$val):
                                                                  if($val['userid']==$userid):
                                                    ?>
                                                    <option value="<?php echo $val['id'] ?>"><?php echo $val['catename'] ?></option>
                                                    <?php
                                                                  endif;
                                                              endforeach;
                                                          endif;
                                                    ?>
                                                </select>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">商品名称</label>

                                            <span id="loading" style="display: none">
                                                <img src="green/images/load.gif" />
                                                加载中...</span>
                                            <div class="col-sm-5">
                                                <?php if($goodid): ?>
                                                <h4><?php echo $goodname ?></h4>
                                                <script>$(function () { selectgoodid(); })</script>
                                                <input type="hidden" name="goodid" id="goodid" value="<?php echo $goodid ?>" />
                                                <?php else: ?>
                                                <select name="goodid" id="goodid" class="form-control selectboxit" onchange="selectgoodid()">
                                                    <option value="">请选择商品</option>
                                                </select>
                                                <?php endif; ?>
                                                <input type="hidden" name="is_discount" id="is_discount" value="0" />
                                                <input type="hidden" name="coupon_ctype" value="0" />
                                                <input type="hidden" name="coupon_value" value="0" />
                                            </div>
                                        </div>
                                        <div class="form-group" id="goodinfo" style="display: none">
                                            <div class="col-sm-5">
                                                <div class="alert alert-info">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label class="col-sm-3 control-label">商品单价</label>
                                            <span class="s_right">
                                                <strong class="text-danger" id="price">0.00</strong> 元 
                                            </span>
                                            <div class="col-sm-5" id="showWholesaleRule" style="display: none;">
                                                <br />
                                                <a href="javascript:void(0)" class="label label-default ">查看批发价格</a>
                                                <hr />
                                                <p class="label label-info" id="WholesaleRuleText" style="display: none;"></p>
                                                <input type="hidden" name="paymoney" value="" />
                                                <input type="hidden" name="danjia" value="" />
                                                <div id="discountdetail"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">购买数量</label>
                                            <div class="col-sm-5">
                                                <div class="input-spinner">
                                                    <button type="button" class="btn btn-success btn-sm">-</button>
                                                    <input type="text" onkeyup="changequantity()" name="quantity" data-min="1" value="1" class="form-control size-1 input-sm" />
                                                    <button type="button" class="btn btn-success btn-sm">+</button>

                                                    <a href="#" color="green" id="goodInvent" class="btn btn-default" style="margin-left: 9px; display: none;"></a>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">联系方式</label>
                                            <div class="col-sm-5">
                                                <input name="contact" type="text" class="form-control" placeholder="建议手机号码，请勿输入123456等数字">
                                            </div>
                                        </div>

                                        <div class="form-group" style="display: none" id="pwdforsearch1">
                                            <label class="col-sm-3 control-label">取卡密码</label>
                                            <div class="col-sm-5">
                                                <input name="pwdforsearch1" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: none" id="pwdforsearch2">
                                            <div class="col-sm-5">
                                                <div class="checkbox checkbox-replace color-blue">
                                                    <input type="checkbox" name="is_pwdforsearch" value="1" id="is_pwdforsearch" />
                                                    <label for="is_pwdforsearch" style="color: red; text-decoration: underline; font-size: 12px">
                                                        使用取卡密码(如果不使用，请不要勾选！)</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group" style="display: none" id="pwdforsearchinput">
                                            <label class="col-sm-3 control-label">请输入取卡密码</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="pwdforsearch2" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-5">
                                                <div class="checkbox checkbox-replace color-blue">
                                                    <input type="checkbox" name="isemail" id="isemail">
                                                    <label for="isemail">交易成功后将支付结果发送到我的邮箱</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="email" style="display: none">
                                            <label class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="email" />
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: none" id="goodCoupon">
                                            <div class="col-sm-5">
                                                <div class="checkbox checkbox-replace color-blue">
                                                    <input type="checkbox" name="is_coupon" value="1" id="is_coupon" />
                                                    <label for="is_coupon">
                                                        是否使用优惠券(如果没有，请不要勾选)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="couponcode" class="form-group" style="display: none;">
                                            <label class="col-sm-3 control-label">请输入您的优惠卷</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="couponcode" class="form-control" onblur="checkCoupon()" placeholder="请输入您的优惠卷">
                                                <span id="checkcoupon" style="display: none">
                                                    <img src="/lin/blue/images/load.gif">
                                                    正在查询...</span>
                                            </div>
                                        </div>
                                        <div class="alert alert-success" id="payinfo" style="font-size: 18px;">
                                            应付总额 <strong class="text-danger tprice">0.00</strong> 元
				                            <div class="pinfo3" style="display: none">
                                                <span class="red payname"></span>的折价率为：<span class="red rate">100</span><span class="red">%</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="panel panel-info" data-collapsed="0">
                                <!-- panel head -->
                                <div class="panel-heading panel-blue">
                                    <div class="panel-title"><strong><i class="entypo-basket"></i>选择支付方式</strong></div>
                                </div>
                                <div class="panel-body">
                                    <div id="buy_border">

                                        <div id="step_two">
                                            <div class="icheck-list" style="text-align:center;">
                                                <?php if($is_weixin_display): ?>

                                                <div class="checkbox checkbox-replace color-blue">
                                                    <input name="pid" type="radio" value="WXAPP" checked="checked">
                                                    &nbsp;
							<img src="/lin/blue/images/wx1.png" width="150" height="50" style="vertical-align: middle">
                                                </div>
                                                <hr />
                                                <?php endif; ?>
                                                <?php if($is_alipay_display): ?>
                                                <div class="checkbox checkbox-replace color-blue">
                                                    <input name="pid" type="radio" value="ALIWAP">
                                                    &nbsp;
							<img src="/lin/blue/images/zfb1.png" width="150" height="50" style="vertical-align: middle">
                                                </div>
                                                <hr />
                                                <?php endif; ?>
                                                <?php if($is_qqcode_display): ?>
                                                <div class="checkbox checkbox-replace color-blue">
                                                    <input name="pid" type="radio" value="QQCODE">
                                                    &nbsp;
							<img src="/lin/blue/images/qq1.png" width="150" height="50" style="vertical-align: middle">
                                                </div>
                                                <hr />
                                                <?php endif; ?>
                                                 <?php if($is_alipay_mq_display): ?>
                                                <div class="checkbox checkbox-replace color-blue">
                                                    <input name="pid" type="radio" value="MQPAY">
                                                    &nbsp;
							<img src="/lin/blue/images/zfb1.png" width="150" height="50" style="vertical-align: middle">
                                                </div>
                                                <hr />
                                                <?php endif; ?>

                                                <?php if($is_wx_mq_display): ?>
                                                <div class="checkbox checkbox-replace color-blue">
                                                    <input name="pid" type="radio" value="MQPAY">
                                                    &nbsp;
							<img src="/lin/blue/images/wx1.png" width="150" height="50" style="vertical-align: middle">
                                                </div>
                                                <hr />
                                                <?php endif; ?>
                                                <div style="clear: left"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="submit" class="bs-example bs-baseline-top">
                                        <input type="submit" value="确认提交，进行下一步" class="btn btn-blue btn-block btn-lg">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <?php include 'footermobile.php';?>




    <script type="text/javascript">
        var whytext = $('#cardwhy').html();
        var min_quantity=1;

        $(function () {
            $('#isagree').click(function () {
                $('#agreement').toggle();
            })
            $('[name=isagree]').click(function () {
                $('#agreement').toggle();
            })
            $('#isemail').click(function () {
                if ($(this).is(':checked')) {
                    $('#email').show();
                    $('[name=email]').focus();
                } else {
                    $('#email').hide();
                }
            });

            $('#is_coupon').click(function () {
                if ($(this).is(':checked')) {
                    $('#couponcode').show();
                    $('[name=couponcode]').focus();
                } else {
                    $('#couponcode').hide();
                    $('#checkcoupon').hide();
                }
            });

            $('#is_pwdforsearch').click(function () {
                if ($(this).is(':checked')) {
                    $('#pwdforsearchinput').show();
                    $('[name=pwdforsearch2]').focus();
                } else {
                    $('#pwdforsearchinput').hide();
                }
            });

            $('#select_pay li').each(function () {
                $(this).hover(function () {
                    $(this).addClass('cursor');
                })
            })

            $('#select_pay li').click(function () {
                var id = $(this).find('input').attr('id');
                $('#' + id).attr('checked', true);
                $('#' + id + 's').show().siblings().hide();
                $($('#' + id).parent()).addClass('selected').siblings().removeClass('selected');
                if (id != 'card') {
                    $('#step_three').hide();
                } else {
                    $('#step_three').show();
                }
            });

            //$.extend($.fn.nyroModal.settings, {
            //    modal: true,
            //    minHeight: 490,
            //    minWidth: 550
            //});


            $(document).on('click', '#verify_pwdforbuy', function () {
                //$("#verify_pwdforbuy").on('click',function(){

                var pwdforbuy = $.trim($('[name=pwdforbuy]').val());
                if (pwdforbuy == '') {
                    alert('请填写验证码！');
                    $('[name=pwdforbuy]').focus();
                    return false;
                }

                $('#verify_pwdforbuy').attr('disabled', true);
                $('#verify_pwdforbuy_msg').show();

                var goodid = $('#goodid').val();

                $.post('/lin/ajax.php', {
                    pwd: $("[name='pwdforbuy']").val(),
                    goodid: goodid,
                    action: "CheckPwdforbuy"
                }, function (data) {
                    if (data == 'ok') {
                        $('#verify_pwdforbuy_msg').hide();
                        alert('验证成功，请继续购买！');
                        jQuery('#modal-1').modal('hide')
                    } else {
                        $('#verify_pwdforbuy_msg').hide();
                        alert("验证失败");
                        $('#verify_pwdforbuy').attr('disabled', false);
                        return false;
                    }
                })
            });

            $('.paylist ul li').each(function () {
                $(this).hover(
                    function () {
                        $(this).addClass('yb');
                        $(this).addClass('cursor');
                    },
                    function () {
                        $(this).removeClass("yb");
                    });

                $(this).click(function () {
                    $('.paylist li').removeClass('ybh');
                    $(this).addClass('ybh');
                    $(this).find('input').attr('checked', true);
                    var pname = $(this).find('img').attr('alt');
                    $('#select_pay li').each(function () {
                        if ($(this).hasClass('selected')) {
                            var pt = $(this).find('input').attr('id');
                            var bt = pt == 'card' ? '(充值卡面额)(<a href="javascript:void(0)" onclick="$.nyroModalManual({minHeight:160,minWidth:400,content: whytext}); return false;" title="点击查看价格换算公式" class="red">?</a>)' : '(人民币)';
                            $('.bt').html(bt);
                            pname = pt == 'card' ? pname : '';
                        }
                    })

                    $('#payinfo .pinfo1').hide();
                    $('#payinfo .pinfo2').show();
                    $('#payinfo .payname').html('[' + pname + ']');
                    getrate();
                    get_pay_card_info();
                    getCardLength();
                });
            })
        })

        //购买限制
        var pwdforbuy = function () {
            var user_popup_message = '<div style="padding:10px;color:#cc3333;line-height:24px"><p style="float:left;font-size:14px;font-weight:bold;color:blue;">访问密码：</p><p style="clear:both;font-size:12px;font-weight:bold;color:red;"><input type="password" name="pwdforbuy" class="input" maxlength="20"> <input type="submit"  id="verify_pwdforbuy" value="验证密码"> <span id="verify_pwdforbuy_msg" style="display:none"><img src="/lin/blue/images/load.gif"> 正在验证...</span></p><ul><li>1.本商品购买设置了安全密码</li><li>2.只有成功验证密码后才能继续购买</li></ul><p></p></div>';
            var itop = $(document).scrollTop();
            if (ismobile() == "ios") {
                jQuery('#modal-1 .modal-dialog').css("top", 0);
            } else {
                jQuery('#modal-1 .modal-dialog').css("top", itop);
            }
            jQuery('#modal-1 .modal-title').html("验证密码");
            jQuery('#modal-1 .modal-body').html(user_popup_message);
            jQuery('#modal-1').modal('show')
        }

        var checkCoupon = function () {
            var couponcode = $.trim($('[name=couponcode]').val());
            var userid = <?php echo $userid?>;
            $('#checkcoupon').show();
            $.post('ajax.php', {
                action: 'checkCoupon',
                couponcode: couponcode,
                userid: userid,
                t: new Date().getTime()
            }, function (data) {
                if (data) {
                    var d = data.split('|');
                    if (d[0] == 'err') {
                        $('#checkcoupon').html(d[1]);
                    } else {
                        var d_d = d[1].split(',');
                        var ct = d_d[1];
                        var cp = d_d[0];
                        $('[name=coupon_ctype]').val(ct);
                        $('[name=coupon_value]').val(cp);
                        $('#checkcoupon').html('<span class="blue">此优惠券可用，订单提交后将被使用！</span>');
                        goodschk();
                    }
                }
            })
        }

        var get_pay_card_info = function () {
            var channelid = 0;
            $('.paylist li').each(function () {
                if ($(this).find('input').is(':checked')) {
                    channelid = $(this).find('input').val();
                }
            })

            if (channelid != 0 && !isNaN(channelid)) {
                var option = '<option value="">请选择充值卡面额</option>';
                $.post('ajax.php', {
                    action: 'getpaycardinfo',
                    channelid: channelid
                }, function (data) {
                    $('.cardvalue').each(function () {
                        $(this).html(option + data);
                    })
                })
            }
        }

        var select_card_quantity = function () {
            var quantity = $('[name=cardquantity]').val();
            quantity = quantity - 1;
            $('.card_list_add').html('');
            for (var i = 1; i <= quantity; i++) {
                $('.card_list_add').append($('.card_list:first').clone());
            }
        }

        var selectcateid = function () {
            var cateid = $('#cateid').val();
            $('#loading').show();
            $('#goodid').hide();
            $("#goodidSelectBoxItText").html("请选择商品");
            var option = '<option value="">请选择商品</option>';
            if (cateid > 0) {
                $.post('ajax.php', {
                    action: 'getgoodList',
                    cateid: cateid
                }, function (data) {
                    if (data == 'ok') {
                        alert('此分类下没有商品！');
                    } else {
                        $('#loading').hide();
                        $('#goodid').show();
                        $('#goodid').html(option + data);
                    }
                })
            } else {
                $('#loading').hide();
                $('#goodid').show();
                $('#goodid').html(option);
            }
            getrate();
            $('.pinfo1').show();
            $('.pinfo2').hide();
            $('.pinfo3').hide();
        }

        var selectgoodid = function () {
            if ($('#goodid option:selected').attr('data-mima') == 1) {
                pwdforbuy();
            }
            var goodid = $('#goodid').val();
            $('#price').html('<img src="/lin/blue/images/load.gif" />');

            $.post('ajax.php', {
                action: 'getgoodInfo',
                goodid: goodid
            }, function (data) {
                if (data) {
                    var d = data.split(',');
                    $('#price').html(d[0]);
                    if (d[3] == 0) {
                        $('#goodCoupon').hide();
                    }
                    if (d[3] == 1) {
                        $('#goodCoupon').show();
                    }
                    if (d[4] == 0) {
                        $('#pwdforsearch2').hide();
                        $('#pwdforsearch1').hide();
                    }
                    if (d[4] == 1) {
                        $('#pwdforsearch2').hide();
                        $('#pwdforsearch1').show();
                    }
                    if (d[4] == 2) {
                        $('#pwdforsearch1').hide();
                        $('#pwdforsearch2').show();
                    }
                    if (d[5] > 0) {
                        $('[name=quantity]').val(d[5]);
                        $('[name=quantity]').attr({
                            'disabled': 'disabled',
                            'readonly': 'readonly',
                            'title': '无法修改购买数量，是因为本商品限制了购买数量。'
                        });
                        $('#limit_quantity_tip').show();
                    } else {
                        $('[name=quantity]').val(1);
                        $('[name=quantity]').removeAttr('disabled readonly title');
                        $('#limit_quantity_tip').hide();
                    }
                    if(d[6]>1){
                        $('[name=quantity]').val(d[6]);
                        min_quantity=d[6];
                    }else{
                        min_quantity=1;
                    }
                    $('[name=danjia]').val(d[0]);
                    $('#goodInvent').show();
                    $('#goodInvent').html(d[1]);
                    $('[name=is_discount]').val(d[2]);
                    getrate();
                    goodDiscount();
                    goodDiscountDesc(goodid);
                    $('.pinfo1').hide();
                    $('.pinfo2').show();
                    $('.pinfo3').hide();
                }
            })
        }

        var changequantity = function () {
            goodDiscount();
            goodschk();
        }

        var goodDiscount = function () {
            var is_discount = $('[name=is_discount]').val();
            var quantity = parseInt($.trim($('[name=quantity]').val()));
            var goodid = $('#goodid').val();
            if (is_discount == 1) {
                $.post('ajax.php', {
                    action: 'getDiscount',
                    goodid: goodid,
                    quantity: quantity
                }, function (data) {
                    if (data > 0) {
                        $('#price').html(data);
                        $('[name=danjia]').val(data);
                        goodschk();
                    }
                })
            }
        }

        var getrate = function () {
            var uid = 30;
            var goodid = $('select[name=goodid]').val();
            var cateid = $('select[name=cateid]').val();
            var channelid = 0;
            $('[name=pid]').each(function () {
                if ($(this).is(':checked')) {
                    channelid = $(this).val();
                }
            })
            if (isNaN(channelid)) {
                if (channelid != 'ALIPAY' && channelid != 'TENPAY') {
                    channelid = 'bank';
                }
            }

            if (goodid == '') {
                goodid = 0;
            }
            if (cateid == '') {
                cateid = 0;
            }
            $.post('ajax.php', {
                action: 'getrate',
                userid: uid,
                cateid: cateid,
                goodid: goodid,
                channelid: channelid
            }, function (data) {
                $('.rate').html(data);
                goodschk();
            });

            $.post('ajax.php', { action: 'getgoodRemark', goodid: goodid }, function (data) {
                if (data.remark != "") {
                    $("#goodinfo").show();
                    $("#goodinfo .alert").html(data.remark);
                } else {
                    $("#goodinfo").hide();
                    $("#goodinfo .alert").html("");
                }
            });
        }

        var goodschk = function () {
            var dprice = parseFloat($('#price').text());
            var quantity = parseInt($.trim($('[name=quantity]').val()));
            var rate = parseFloat($('.rate').first().text());
            var tprice = parseFloat(dprice * quantity / rate * 100);
            var gprice = parseFloat(dprice * quantity);

            var coupon_ctype = $('[name=coupon_ctype]').val();
            var coupon_value = $('[name=coupon_value]').val();

            if (coupon_ctype == 1) {
                tprice = (tprice - coupon_value);
            } else if (coupon_ctype == 100) {
                tprice = parseFloat(tprice - (tprice * coupon_value / 100));
            }

            tprice = $('#card').attr('checked') ? Math.ceil(tprice.toFixed(2)) : tprice.toFixed(2);
            gprice = $('#card').attr('checked') ? Math.ceil(gprice.toFixed(2)) : gprice.toFixed(2);

            $('.tprice').html(tprice);
            $('.gprice').html(gprice);
            $('[name=paymoney]').val(tprice);
        }

        $('#submit').click(function () {
            if ($('[name=isagree]').is(':checked') == false) {
                alert('请阅读和同意用户协议，才能继续购买！');
                $('[name=isagree]').focus();
                return false;
            }
            var cateid = $('select[name=cateid]').val();
            if (cateid == '') {
                alert('请选择商品分类！');
                $('[name=cateid]').focus();
                return false;
            }
            var goodid = $('select[name=goodid]').val();
            if (goodid == '') {
                alert('请选择要购买的商品！');
                $('[name=goodid]').focus();
                return false;
            }
            var quantity = $.trim($('[name=quantity]').val());
            if (isNaN(quantity) || quantity <= 0 || quantity == '') {
                alert('购买数量填写错误，最小数量为1！');
                $('[name=quantity]').focus();
                return false;
            }
            var kucun = $('[name=kucun]').val();
            kucun = kucun == '' ? 0 : parseInt(kucun);
            if (kucun == 0) {
                alert('库存为空，暂无法购买！');
                $('[name=quantity]').focus();
                return false;
            }
            if (kucun > 0 && quantity > kucun) {
                alert('库存不足，请修改购买数量！');
                $('[name=quantity]').focus();
                return false;
            }
            if(parseInt(min_quantity) > quantity){
                alert('当前商品设定了最小购买数量，最小数量为'+min_quantity+'张！');
                $('[name=quantity]').focus();
                return false;
            }

            /*
            var contact=$.trim($('[name=contact]').val());
            if(contact==''){
            alert('请填写联系方式！');
            $('[name=contact]').focus();
            return false;
            }
            */
            var contact = $.trim($('[name=contact]').val());
            var reg = /^([0-9A-Za-z]+){5,20}$/;
            if (!reg.test(contact)) {
                alert('请填写您的联系方式，联系方式至少5位以上');
                $('[name=contact]').focus();
                return false;
            }

            var is_contact_limit = 0;
            if (is_contact_limit == 1) {
                var reg = /^[\d]+$/;
                if (!reg.test(contact)) {
                    alert('联系方式必须全部为数字！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if (is_contact_limit == 2) {
                var reg = /^[a-zA-Z]+$/;
                if (!reg.test(contact)) {
                    alert('联系方式必须全部为英文字母！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if (is_contact_limit == 3) {
                var reg = /^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i;
                if (!reg.test(contact)) {
                    alert('联系方式必须为数字和字母的组合！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if (is_contact_limit == 4) {
                var reg = /^(([a-z]+)([_])([a-z]+)|([0-9]+)([_])([0-9]+))$/i;
                if (!reg.test(contact)) {
                    alert('联系方式必须有数字和下划红或者字母和下划线组合！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if (is_contact_limit == 5) {
                var reg = /[\u4e00-\u9fa5]/;
                if (!reg.test(contact)) {
                    alert('联系方式必须是中文！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if (is_contact_limit == 6) {
                var reg = /^([0-9a-zA-Z_-])+@([0-9a-zA-Z_-])+((\.[0-9a-zA-Z_-]{2,3}){1,2})$/;
                if (!reg.test(contact)) {
                    alert('联系方式必须是邮箱！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if (is_contact_limit == 7) {
                var reg = /^(\d){11}$/;
                if (!reg.test(contact)) {
                    alert('联系方式必须为您的手机号码！');
                    $('[name=contact]').focus();
                    return false;
                }
            }

            if ($('#pwdforsearch1').is(':visible')) {
                var pwdforsearch = $.trim($('[name=pwdforsearch1]').val());
                var reg = /^([0-9A-Za-z]+){6,20}$/;
                if (pwdforsearch == '' || !reg.test(pwdforsearch)) {
                    alert('请填写取卡密码！长度为6-20个数字、字母或组合！');
                    $('[name=pwdforsearch1]').focus();
                    return false;
                }
            }

            if ($('#is_pwdforsearch').is(':checked')) {
                var pwdforsearch = $.trim($('[name=pwdforsearch2]').val());
                var reg = /^([0-9A-Za-z]+){6,20}$/;
                if (pwdforsearch == '' || !reg.test(pwdforsearch)) {
                    alert('您选择了使用取卡密码，请填写取卡密码！长度为6-20个数字、字母或组合！');
                    $('[name=pwdforsearch2]').focus();
                    return false;
                }
            }

            if ($('#isemail').is(':checked')) {
                if ($.trim($('[name=email]').val()) == '') {
                    alert('您选择了把支付结果发送到邮箱选项，但您没有填写邮箱！');
                    $('[name=email]').focus();
                    return false;
                }
            }

            if ($('#is_coupon').is(':checked')) {
                if ($.trim($('[name=couponcode]').val()) == '') {
                    alert('您选择了使用优惠券，但您没有填写优惠券！');
                    $('[name=couponcode]').focus();
                    return false;
                }

                var coupon_ctype = $('[name=coupon_ctype]').val();
                if (coupon_ctype == 0) {
                    alert('您选择了使用优惠券，但所填写的优惠券无效！');
                    $('[name=couponcode]').focus();
                    return false;
                }
            }

            var select_pid = false;
            $('[name=pid]').each(function () {
                if ($(this).attr('checked')) {
                    select_pid = true;
                }
            })
            if (select_pid == false) {
                alert('请选择支付方式！');
                $('[name=pid]').first();
                return false;
            }

            var form = $("[name=p]");
            console.log(form.serialize());
            showAjaxPostModal(form.attr("action"), form.serialize(), "确认订单-请勿重复刷新");
            return false;
        });

        function showAjaxPostModal(url, data, title) {
            jQuery('#modal-7').modal('show', { backdrop: 'static' });
            $.ajax({
                url: url,
                type: 'post',
                data: data,
                success: function (response) {
                    //var itop = $(document).scrollTop();
                    //if (ismobile() == "ios") {
                    //    jQuery('#modal-7 .modal-dialog').css("top", 0);
                    //} else {
                    //    jQuery('#modal-7 .modal-dialog').css("top", itop);
                    //}
                    $("html,body").animate({ scrollTop: 0 }, 300);
                   
                    jQuery('#modal-7 .modal-title').html(title);
                    jQuery('#modal-7 .modal-body').html(response);
                }
            });
        }


        $('#showWholesaleRule').click(function () {
            $("#WholesaleRuleText").toggle();
        });

        function goodDiscountDesc(goodid) {
            $.post('ajax.php', { action: 'goodDiscountDesc', goodid: goodid }, function (data) {
                console.log(data);
                if (data.length > 0) {
                    $("#showWholesaleRule").show();
                    $("#WholesaleRuleText").html(data);
                }
                else {
                    $("#showWholesaleRule").hide();
                    $("#WholesaleRuleText").hide();
                }
            }, 'text');
        }

        $(function () {
 
            $(".icheck-list .checkbox").click(function () {
                $(".icheck-list .checkbox").removeClass("checked");
                $(".icheck-list .checkbox").find("[name=pid]").prop("checked", false);

                $(this).addClass("checked")
                $(this).find("[name=pid]").prop("checked", true);
            })
        });</script>

</body>
</html>
