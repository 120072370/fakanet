<?php if(!defined('WY_ROOT')) exit; ?>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">
  
    <title><?php echo $title ?></title>
    <link href="baibian/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="baibian/static/css/font-awesome.min.css" rel="stylesheet">
    <link href="baibian/static/css/style.css?2222" rel="stylesheet">
    <script src="baibian/static/js/jquery.min.js"></script>
    <!--[if lte IE 9]><script src="baibian/static/js/html5.min.js"></script><script src="baibian/static/js/respond.min.js"></script><![endif]-->
</head>
<body>
    <noscript>
        <h1 style="color: red">您的浏览器不支持JavaScript，请更换浏览器或开启JavaScript设置!</h1>
    </noscript>
    <div class="logonav">
        <div class="container">
            <div class="pull-left">
                <a href="/index.htm">
                    <img src="/images/logo.png" alt="logo" style="width: 200px; height: 50px;"></a>
            </div>
            <div class="pull-right"><a href="/faq.htm">联系我们</a><a href="/orderquery.htm">订单查询</a><a href="report.php?uid=<?php echo $userid ?>&t=1" id="report">举报投诉</a></div>
        </div>
    </div>

    <div class="container m-t-lg">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #2D89EF; color: #fff;">
                        <div class="panel-title"><em class="fa fa-list"></em>商家信息</div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="90">店铺名称：</td>
                                    <td><?php echo $sitename ?></td>
                                </tr>
                                <tr>
                                    <td>卖家QQ：</td>
                                    <td style="vertical-align: middle;"><a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq ?>&Site=&Menu=yes"><?php echo $qq ?></a>
                                        <a target="blank" href="tencent://message/?uin=<?php echo $qq ?>&Site=&Menu=yes">
                                            <img border="0" src="baibian/static/picture/2a0cd510f02c474487b2232fd029a25a.gif" alt="点击这里给我发消息" align="absmiddle"></a></td>
                                </tr>
                                <tr>
                                    <td>商户网站：</td>
                                    <td><a rel="nofollow" target="blank" href="<?php echo $siteurl ?>"><?php echo $siteurl ?></a></td>
                                </tr>
                                <tr>
                                    <td>发货类型：</td>
                                    <td>
                                        <img src="baibian/static/picture/ico_1.gif" align="absmiddle" title="自动发货">&nbsp;<strong class="text-red">自动发货</strong></td>
                                </tr>
                                <tr>
                                    <td>店铺公告：</td>
                                    <td><p><?php echo $siteintr == ""?"商家很懒，没留下任何信息":$siteintr ?></p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer text-center">
                        <input type="checkbox" name="isagree" value="true" checked><a href="javascript:$('#myModal').modal('show');" class="text-green">同意并阅读用户购买协议</a>
                    </div>
                </div>
                <div class="panel panel-default hidden-sm hidden-xs">
                    <div class="panel-heading" style="background: #2D89EF; color: #fff;">
                        <div class="panel-title"><em class="fa fa-list"></em>免责声明</div>
                    </div>
                    <div class="panel-body">
                        <p class="text-red">向陌生人付款，请注意交易风险，否则造成的经济损失自负！</p>
                        <p>本站仅是提供自动发卡服务，并非销售商，相关售后问题并不负责，由此产生的交易纠纷由双方自行处理，与易佰科技寄售平台无关！</p>
                        <p>如果您在支付过程中遇到虚假商品或取卡问题，请与我们联系。</p>

                    </div>
                </div>
            </div>

            <div class="col-md-8 form-inline">
                <form name="p" method="post" action="/lin/req.php" class="nyroModal" id="buyform" target="_blank">
                    <input type="hidden" name="userid" value="<?php echo $userid ?>" />
                    <input type="hidden" name="token" value="<?php echo $token ?>" />
                    <input type="hidden" name="cardNoLength" value="0" />
                    <input type="hidden" name="cardPwdLength" value="0" />
                    <input type="hidden" name="fromid" value="<?php echo $from ?>" />
                    <input type="hidden" name="api_username" value="<?php echo _G('username') ?>" />
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background: #F05033; color: #fff;">
                            <div class="panel-title"><em class="fa fa-list"></em>选择商品</div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-7" id="sheet">
                                    <div class="form-group">
                                         <?php if(!$goodid): ?>
                                        <label class="control-label">商品分类</label>

                                       
                                        <span class="inner_select">
                                            <?php if($cateid):?>
                                            <?php echo $catename ?>
                                            <script>$(function(){selectcateid();})</script>
                                            <input type="hidden" name="cateid" id="cateid" value="<?php echo $cateid ?>" />
                                            <?php else: ?><select name="cateid" id="cateid" class="form-control" onchange="selectcateid()">
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
                                            <?php endif;?>
                                            <?php endif; ?>
                                        </span>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">商品名称</label>

                                        <span class="out_select">
                                            <span class="inner_select">
                                                <span id="loading" style="display: none">
                                                    <img src="baibian/images/load.gif" />

                                                    加载中...</span><?php if($goodid):
                                                                                                                                                                                                                                                                                                                                               ?><?php echo $goodname ?>
                                                <script>$(function(){selectgoodid();})</script>
                                                <input type="hidden" name="goodid" id="goodid" value="<?php echo $goodid ?>" />
                                                <?php else: ?>
                                                <select id="goodid" class="form-control" name="goodid" onchange="selectgoodid()">
                                                    <option value="">请选择商品</option>
                                                </select>
                                                <?php endif; ?>
                                                <input type="hidden" name="is_discount" id="is_discount" value="0" />
                                                <input type="hidden" name="coupon_ctype" value="0" />
                                                <input type="hidden" name="coupon_value" value="0" />
                                            </span>
                                        </span>

                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="paymoney" value="" /><input type="hidden" name="danjia" value="" />
                                        <label class="control-label">购买数量</label>
                                        <!--<input type="text" class="form-control" name="quantity" onkeypress="return onKeyNum(event);" onblur="changequantity()" disabled="disabled">
                                        <div class="help-text" id="Div1">

                                        </div>-->
                                        <input type="number" class="form-control" min="<?php echo $min_quantity ?>"  onclick="changequantity()" onkeyup="changequantity()" name="quantity" value="<?php echo _G('num') ? _G('num') : ($limit_quantity ? $limit_quantity : 1) ?>" ;"<?php echo $limit_quantity ? ' disabled="disabled" readonly="readonly" title="'.$limit_quantity_tip.'"' : '' ?> />
                                        <span class="help-text" id="goodInvent"></span>
                                        <span id="limit_quantity_tip" class="help-text" style="<?php echo $limit_quantity ? '' : 'display:none' ?>">
                                            (<?php echo $limit_quantity_tip ?>)</span>
                                    <span id="goodInvent"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">联系方式</label>
                                        <input id="contact" type="text" class="form-control" name="contact" />
                                        <span class="help-text"><span>请填写手机号</span>
                                    </div>

                                    <div class="form-group" style="<?php echo $is_pwdforsearch==1 ? '' : 'display:none' ?>"  id="pwdforsearch1">
                                        <label class="control-label">取卡密码：</label>
                                        <input type="text" class="form-control" name="pwdforsearch1" />
                                        <span style="text-decoration: underline; color: red">(长度为6-20个数字、字母或组合)</span>
                                    </div>
                                    <div  class="form-group" style="<?php echo $is_pwdforsearch==2 ? '' : 'display:none' ?>"  id="pwdforsearch2">
                                        <input type="checkbox" name="is_pwdforsearch" value="1" id="is_pwdforsearch" />
                                        <span for="is_pwdforsearch" style="color: red; text-decoration: underline">是否使用取卡密码</span>
                                    </div>
                                    <div class="form-group" style="display: none" id="pwdforsearchinput">
                                        <span class="control-label">请输入取卡密码</span>
                                        <input type="text" name="pwdforsearch2" class="form-control" />
                                    </div>

                                    <div class="form-group" id="moneybox" style="display: none;">
                                        <label class="control-label">应付总额</label>
                                        <span class="price tprice" id="allmoey">0.00</span>
                                        <a tabindex="0" role="button" data-container="body" data-html="true" data-toggle="popover" data-placement="bottom" data-content="" id="showWholesaleRule">查看批发价格</a>
                                    </div>
                                    <div class="form-group" id="WholesaleRuleText" style="display: none; clear: both; border: 1px solid rgb(213, 213, 213); font-size: 12px; background-color: rgb(247, 254, 239); color: rgb(0, 0, 255); padding: 10px; margin: 2px; height: 100%;">
                                    </div>
                                    <!-- <div class="form-group text-red" id="smsbox" style="display: none;">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="is_sms" value="1"><span id="is_sms">短信接收付款结果(费用0.1元)</span></label>
                                        </div>
                                    </div>-->
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="isemail" id="isemail" value="1">
                                                将支付结果发送到邮箱</label>
                                        </div>
                                    </div>
                                    <div class="form-group" id="email" style="display: none;">
                                        <label class="control-label">邮箱地址</label>
                                        <input type="text" class="form-control" name="email" placeholder="请输入邮箱地址">
                                    </div>
                                    <div class="form-group" style="<?php echo $is_coupon ? '' : 'display:none' ?>" id="goodCoupon">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="is_coupon" id="is_coupon" value="1">
                                                使用优惠券,如果没有,请勿勾选</label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="<?php echo $is_coupon ? '' : 'display:none' ?>" id="couponcode">
                                        <label class="control-label">优惠券</label><input type="text" class="form-control" name="couponcode" onblur="checkCoupon()">
                                        <span id="checkcoupon" style="display: none">
                                            <img src="default/images/load.gif" />
                                            正在查询...</span>
                                    </div>
                                </div>
                                <div class="col-xs-5" id="code">
                                    <div id="qrcodeTable"></div>
                                    <div class="QRTip"><i class="fa fa-camera"></i>使用手机扫描二维码购买</div>
                                </div>
                            </div>
                            <div id="goodinfo" class="goodinfo"></div>
                            <div class="alert alert-warning" id="moneytip">
                                商品单价：<b id="price">0.00</b>元 ,订单金额<b class="price tprice">0.00</b>元
                            </div>
                            <div style="display: none;">
                                <p><span class="red payname"></span>的折价率为：<span class="red rate">100</span><span class="red">%</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background: #F05033; color: #fff;">
                            <div class="panel-title"><em class="fa fa-list"></em>付款方式</div>
                        </div>
                        <div class="panel-body">
                            <input type="hidden" name="paytype" value="bank" id="bank" />
                            <ul class="paytype nav nav-tabs clearfix" id="banktab">
                                <?php if($is_weixin_display): ?>
                                <li><a rel="nofollow" href="#weixin" data-toggle="tab"><b>微信</b></a></li>
                                <?php endif; ?>
                                <?php if($is_alipay_display): ?>
                                <li><a rel="nofollow" href="#alipay" data-toggle="tab"><b>支付宝</b></a></li>
                                <?php endif; ?>
                                <?php if($is_qqcode_display): ?>
                                <li><a rel="nofollow" href="#qpay" data-toggle="tab"><b>QQ钱包</b></a></li>
                                <?php endif; ?>
                            </ul>
                            <div class="bank-content clearfix">
                                <?php if($is_weixin_display): ?>
                                <div class="tab-pane" id="weixin">
                                    <ul class="pay-list">
                                        <li>
                                            <label>
                                                <input type="radio" name="pid" value="WEIXIN" checked><img src="baibian/images/WEIXIN.gif" align="absmiddle" alt="微信"><span>微信</span></label></li>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php if($is_alipay_display): ?>
                                <div class="tab-pane" id="alipay">
                                    <ul class="pay-list">
                                        <li>
                                            <label>
                                                <input type="radio" name="pid" value="ALIPAY" id="alipays"><img src="baibian/images/ALIPAY1.gif" align="absmiddle" alt="支付宝"><span>支付宝</span></label></li>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <?php if($is_qqcode_display): ?>
                                <div class="tab-pane" id="qpay">
                                    <ul class="pay-list">
                                        <li>
                                            <label>
                                                <input type="radio" name="pid" value="QQCODE"><img src="baibian/images/QQCODE.gif" align="absmiddle" alt="QQ钱包"><span>QQ钱包</span></label></li>
                                    </ul>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="text-center m-b-lg">
                        <button type="submit" class="btn btn-danger btn-lg" id="submit"><i class="fa fa-check-square-o fa-lg"></i>&nbsp;&nbsp;确认提交，进行下一步</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="myModalLabel" class="modal-title">用户购买协议</h4>
                </div>
                <div class="modal-body">
                    <ul style="padding: 0;">
                        <li style="text-indent: 16px;">买卖双方使用本系统，且约定买卖合同项下的货款，通过买方即时向卖方支付的交易方式，该项服务一般适用于您与交易对方彼此都有充分信任的小额交易。</li>
                        <li style="text-indent: 16px;">使用本系统是基于您对交易对方的充分信任，一旦您选用该方式，相对应的交易为非担保性质的交易，您将自行承担所有交易风险并自行处理所有相关的交易纠纷。</li>
                        <li style="text-indent: 16px;">使用本系统请确定购买的数量及金额，卡类购买超出部分将不会找零，如果支付购买过程中出现余额不足，请通过订单号查询补足金额支付即可获取卡密。</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">我同意协议</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="H1" class="modal-title">购买提示</h4>
                </div>
                <div class="modal-body">
                    <?php echo str_replace(PHP_EOL,'<br>',$siteintr) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
     <div id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="H2" class="modal-title">网站提示</h4>
                </div>
                <div class="modal-body">
                    <?php echo str_replace(PHP_EOL,'<br>',$user_popup_message) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden"></div>
    <script src="baibian/static/js/bootstrap.min.js"></script>
    <script src="baibian/static/js/bootbox.min.js"></script>


     <link rel="stylesheet" href="baibian/static/css/nyro.css">
    <script type="text/javascript" src="baibian/static/js/nyro.js"></script>

    <!-- <script src="/lin/default/js/nyro.js" type="text/javascript"></script>-->
   
    <!--[if IE 6]><script type="text/javascript" src="baibian/static/js/nyromodal-ie6.min.js"></script><![endif]-->
    <script>
  

        var nyro = '1';
        var min_quantity=1;
        var whytext=$('#cardwhy').html();
        $(function(){
            $('form')[0].reset();

            $('#showWholesaleRule').click(function(){ 
                $("#WholesaleRuleText").toggle();
            });
	
            $('#isagree').click(function(){ $('#agreement').toggle(); })
            $('[name=isagree]').click(function(){ $('#agreement').toggle();	})
            $('#isemail').click(function(){
                if($(this).is(':checked')){
                    $('#email').show();
                    $('[name=email]').focus();
                } else {
                    $('#email').hide();
                }
            });

            $('#is_coupon').click(function(){
                if($(this).is(':checked')){
                    $('#couponcode').show();
                    $('[name=couponcode]').focus();
                } else {
                    $('#couponcode').hide();
                    $('#checkcoupon').hide();
                }
            });

            $('#is_pwdforsearch').click(function(){
                if($(this).is(':checked')){
                    $('#pwdforsearchinput').show();
                    $('[name=pwdforsearch2]').focus();
                } else {
                    $('#pwdforsearchinput').hide();
                }
            });

            $('#select_pay li').each(function(){
                $(this).hover(function(){$(this).addClass('cursor');})	    
            })

            $('#select_pay li').click(function(){
                var id=$(this).find('input').attr('id');
                $('#'+id).attr('checked',true);
                $('#'+id+'s').show().siblings().hide();
                $($('#'+id).parent()).addClass('selected').siblings().removeClass('selected');
                if(id!='card'){
                    $('#step_three').hide();
                } else {
			<?php if ($is_display!=1): ?>
                    $('#step_three').show();
			<?php endif; ?>
                }
            });

            $.extend($.fn.nyroModal.settings,{ modal: true, minHeight: 550, minWidth: 550});
            $('#report').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 520, height: 420 });
	        <?php if($is_user_popup): ?>
            $('#myModal3').modal('show');
            <?php endif; ?>

            <?php if($siteintr !=""): ?>
            $('#myModal2').modal('show');
             <?php endif; ?>
	
	<?php
	$mima=$wddb->getone("select mima from ".DB_PREFIX."goodlist where linkid='".$linkid."'");
	if(!empty($mima)){
		echo "pwdforbuy();";
	}
    ?>
            $(document).on('click','#verify_pwdforbuy',function(){
                //$("#verify_pwdforbuy").on('click',function(){
		
                var pwdforbuy=$.trim($('[name=pwdforbuy]').val());
                if(pwdforbuy==''){
                    alert('请填写验证码！');
                    $('[name=pwdforbuy]').focus();
                    return false;
                }
        
		
                $('#verify_pwdforbuy').attr('disabled',true);
                $('#verify_pwdforbuy_msg').show();

                var goodid = $('#goodid').val();

                $.post('/prt/ajax.php', {pwd:$("[name='pwdforbuy']").val(), goodid: goodid,action:"CheckPwdforbuy"}, function (data) {
                    if(data=='ok'){
                        $('#verify_pwdforbuy_msg').hide();
                        alert('验证成功，请继续购买！');
                        parent.$.nyroModalRemove();
                    } else {
                        $('#verify_pwdforbuy_msg').hide();
                        alert("验证失败");
                        $('#verify_pwdforbuy').attr('disabled',false);
                        return false;
                    }
                })
            });

	
            $('.paylist ul li').each(function(){
                $(this).hover(
                    function(){
                        $(this).addClass('yb');
                        $(this).addClass('cursor');
                    },
                    function(){$(this).removeClass("yb");
                    });

                $(this).click(function(){
                    $('.paylist li').removeClass('ybh');
                    $(this).addClass('ybh');
                    $(this).find('input').attr('checked',true);
                    var pname=$(this).find('img').attr('alt');
                    $('#select_pay li').each(function(){
                        if($(this).hasClass('selected')){
                            var pt=$(this).find('input').attr('id');
                            var bt=pt=='card' ? '(充值卡面额)(<a href="javascript:void(0)" onclick="$.nyroModalManual({minHeight:160,minWidth:400,content: whytext}); return false;" title="点击查看价格换算公式" class="red">?</a>)' : '(人民币)';
                            $('.bt').html(bt);
                            pname=pt=='card' ? pname : '';
                        }
                    })
                    $('#payinfo').show();
                    //  $('#payinfo .pinfo1').hide();
                    //$('#payinfo .pinfo2').show();
                    if(pname!=''){$('#payinfo').show();} else {$('#payinfo').hide();}
                    $('#payinfo .goodinfo').html(pname);
                    getrate();
                    get_pay_card_info();
                    getCardLength();
                });
            })
        })
	
        //购买限制
        var pwdforbuy=function(){
            var user_popup_message='<div style="padding:10px;color:#cc3333;line-height:24px"><p style="float:left;font-size:14px;font-weight:bold;color:blue;">访问密码：</p><p style="clear:both;font-size:12px;font-weight:bold;color:red;"><input type="password" name="pwdforbuy" class="input" maxlength="20"> <input type="submit"  id="verify_pwdforbuy" value="验证密码" class="lin_submit"> <span id="verify_pwdforbuy_msg" style="display:none"><img src="default/images/load.gif"> 正在验证...</span></p><ul><li>1.本商品购买设置了安全密码</li><li>2.只有成功验证密码后才能继续购买</li></ul><p></p></div>';
            $.nyroModalManual({minHeight:137,Width:420,content: user_popup_message});
        }
	
        var checkCoupon=function(){
            var couponcode=$.trim($('[name=couponcode]').val());
            var userid=<?php echo $userid ?>;
            $('#checkcoupon').show();
            $.post('ajax.php',{action:'checkCoupon',couponcode:couponcode,userid:userid,t:new Date().getTime()},function(data){
                if(data){
                    var d=data.split('|');
                    if(d[0]=='err'){
                        $('#checkcoupon').html(d[1]);
                    } else {
                        var d_d=d[1].split(',');
                        var ct=d_d[1];
                        var cp=d_d[0];
                        $('[name=coupon_ctype]').val(ct);
                        $('[name=coupon_value]').val(cp);
                        $('#checkcoupon').html('<span class="blue">此优惠券可用，订单提交后将被使用！</span>');
                        goodschk();
                    }
                }
            })
        }

        var get_pay_card_info=function(){
            var channelid=0;
            $('.paylist li').each(function(){
                if($(this).find('input').is(':checked')){
                    channelid=$(this).find('input').val();
                }
            })

            if(channelid!=0 && !isNaN(channelid)){
                var option='<option value="">请选择充值卡面额</option>';
                $.post('ajax.php',{action:'getpaycardinfo',channelid:channelid},function(data){
                    $('.cardvalue').each(function(){
                        $(this).html(option+data);
                    })
                })
            }
        }

        var select_card_quantity=function(){
            var quantity=$('[name=cardquantity]').val();
            quantity=quantity-1;
            $('.card_list_add').html('');
            for(var i=1;i<=quantity;i++){
                $('.card_list_add').append($('.card_list:first').clone());
            }	
        }

        var selectcateid=function(){
            var cateid=$('#cateid').val();
            $('#loading').show();
            $('#goodid').hide();
            var option='<option value="">请选择商品</option>';
            if(cateid>0){
                $.post('ajax.php',{action:'getgoodList',cateid:cateid},function(data){
                    if(data=='ok'){
                        alert('此分类下没有商品！');
                    }else {
                        $('#loading').hide();
                        $('#goodid').show();
                        $('#goodid').html(option+data);
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

        var selectgoodid=function(){
            if($('#goodid option:selected').attr('data-mima')==1){
                pwdforbuy();
            }
            var goodid=$('#goodid').val();
            $('#price').html('<img src="green/images/load.gif" />');
	
            $.post('ajax.php',{action:'getgoodInfo',goodid:goodid},function(data){
                if(data){
                    var d=data.split(',');
                    $('#price').html(d[0]);
                    if(d[3]==0){$('#goodCoupon').hide();}
                    if(d[3]==1){$('#goodCoupon').show();}
                    if(d[4]==0){$('#pwdforsearch2').hide();$('#pwdforsearch1').hide();}
                    if(d[4]==1){$('#pwdforsearch2').hide();$('#pwdforsearch1').show();}
                    if(d[4]==2){$('#pwdforsearch1').hide();$('#pwdforsearch2').show();}
                    if(d[5]>0){
                        $('[name=quantity]').val(d[5]);
                        $('[name=quantity]').attr({'disabled':'disabled','readonly':'readonly','title':'<?php echo $limit_quantity_tip ?>'});
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
                    $('#goodInvent').html(d[1]);
                    $('[name=is_discount]').val(d[2]);
                    getrate();
                    goodDiscount();
                    goodDiscountDesc( goodid );
                    $('.pinfo1').hide();
                    $('.pinfo2').show();
                    $('.pinfo3').hide();
                }
            })
        }

        var changequantity=function(){
            goodDiscount();
            goodschk();
        }

        var goodDiscount=function(){
            var is_discount=$('[name=is_discount]').val();
            var quantity=parseInt($.trim($('[name=quantity]').val()));
            var goodid=$('#goodid').val();
            if(is_discount==1){
                $.post('ajax.php',{action:'getDiscount',goodid:goodid,quantity:quantity},function(data){
                    if(data>0){
                        $('#price').html(data);
                        $('[name=danjia]').val(data);
                        goodschk();
                    }
                })
            }
        }

        var getrate=function(){
            var uid=<?php echo $userid ?>;
            var goodid=$('[name=goodid]').val();
            var cateid=$('[name=cateid]').val();
            var channelid=0;
            $('[name=pid]').each(function(){
                if($(this).is(':checked')){ channelid=$(this).val();}
            })
            if(isNaN(channelid)){
                if(channelid!='ALIPAY' && channelid!='TENPAY'& channelid!='WEIXIN'& channelid!='ALIWAP'& channelid!='QQCODE'){
                    channelid='bank';
                }
            }

            if(goodid==''){goodid=0;}
            if(cateid==''){cateid=0;}
            $.post('ajax.php',{action:'getrate',userid:uid,cateid:cateid,goodid:goodid,channelid:channelid},function(data){		
                $('.rate').html(data);goodschk();
            });	
	
            $.post('ajax.php',{action:'getgoodRemark',goodid:goodid},function(data){		
                if(data.remark != ""){
                    $("#goodinfo").show();
                    $(".goodinfo").html(data.remark);
                }
       
               
            });	
        }
        var goodschk=function(){
            var dprice=parseFloat($('#price').text());	
            var quantity=parseInt($.trim($('[name=quantity]').val()));
            var rate=parseFloat($('.rate').first().text());
            //var tprice=parseFloat(dprice*quantity/rate*10);
            var tprice=parseFloat(dprice*quantity/rate*100);
            var gprice=parseFloat(dprice*quantity);
	
            var coupon_ctype=$('[name=coupon_ctype]').val();
            var coupon_value=$('[name=coupon_value]').val();

            if(coupon_ctype==1){
                tprice=(tprice-coupon_value);
            } else if(coupon_ctype==100){
                tprice=parseFloat(tprice-(tprice*coupon_value/100));
            }

            tprice=$('#card').attr('checked') ? Math.ceil(tprice.toFixed(2)) : tprice.toFixed(2);
            gprice=$('#card').attr('checked') ? Math.ceil(gprice.toFixed(2)) : gprice.toFixed(2);

            $('.tprice').html(tprice);
            $('.gprice').html(gprice);
            $('[name=paymoney]').val(tprice);

            $('#moneybox').show();
            $('#moneytip').show();
            //var txt = '商品单价 <b>' + dprice + '</b> 元，购买数量 <b>' + quantity + '</b> 张';
            //$('#moneytip').html(txt);
        }

        $('#buyform').submit(function(){
            //if($('[name=isagree]').is(':checked')==false){
            // alert('请阅读和同意用户协议，才能继续购买！');
            //	$('[name=isagree]').focus();
            //return false;
            //}
            var cateid=$('[name=cateid]').val();
            if(cateid==''){
                alert('请选择商品分类！');
                $('[name=cateid]').focus();
                return false;
            }
            var goodid=$('[name=goodid]').val();
            if(goodid==''){
                alert('请选择要购买的商品！');
                $('[name=goodid]').focus();
                return false;
            }
            var quantity=$.trim($('[name=quantity]').val());
            if(isNaN(quantity) || quantity<=0 || quantity==''){
                alert('购买数量填写错误，最小数量为1！');
                $('[name=quantity]').focus();
                return false;
            }
            var kucun=$('[name=kucun]').val();
            kucun=kucun=='' ? 0 : parseInt(kucun);
            if(kucun==0){
                alert('库存为空，暂无法购买！');
                $('[name=quantity]').focus();
                return false;
            }
            if(kucun>0 && quantity>kucun){
                alert('库存不足，请修改购买数量！');
                $('[name=quantity]').focus();
                return false;
            }
  
            if(quantity < parseInt(min_quantity) ){
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

            var is_contact_limit=<?php echo $is_contact_limit ?>;
            if(is_contact_limit==1){
                var reg=/^[\d]+$/;
                if(!reg.test(contact)){
                    alert('联系方式必须全部为数字！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if(is_contact_limit==2){
                var reg=/^[a-zA-Z]+$/;
                if(!reg.test(contact)){
                    alert('联系方式必须全部为英文字母！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if(is_contact_limit==3){
                var reg=/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i;
                if(!reg.test(contact)){
                    alert('联系方式必须为数字和字母的组合！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if(is_contact_limit==4){
                var reg=/^(([a-z]+)([_])([a-z]+)|([0-9]+)([_])([0-9]+))$/i;
                if(!reg.test(contact)){
                    alert('联系方式必须有数字和下划红或者字母和下划线组合！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if(is_contact_limit==5){
                var reg=/[\u4e00-\u9fa5]/;
                if(!reg.test(contact)){
                    alert('联系方式必须是中文！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if(is_contact_limit==6){
                var reg=/^([0-9a-zA-Z_-])+@([0-9a-zA-Z_-])+((\.[0-9a-zA-Z_-]{2,3}){1,2})$/;
                if(!reg.test(contact)){
                    alert('联系方式必须是邮箱！');
                    $('[name=contact]').focus();
                    return false;
                }
            } else if(is_contact_limit==7){
                var reg=/^(\d){11}$/;
                if(!reg.test(contact)){
                    alert('联系方式必须为您的手机号码！');
                    $('[name=contact]').focus();
                    return false;
                }
            }

            if($('#pwdforsearch1').is(':visible')){
                var pwdforsearch=$.trim($('[name=pwdforsearch1]').val());
                var reg=/^([0-9A-Za-z]+){6,20}$/;
                if(pwdforsearch=='' || !reg.test(pwdforsearch)){
                    alert('请填写取卡密码！长度为6-20个数字、字母或组合！');
                    $('[name=pwdforsearch1]').focus();
                    return false;
                }
            }

            if($('#is_pwdforsearch').is(':checked')){
                var pwdforsearch=$.trim($('[name=pwdforsearch2]').val());
                var reg=/^([0-9A-Za-z]+){6,20}$/;
                if(pwdforsearch=='' || !reg.test(pwdforsearch)){
                    alert('您选择了使用取卡密码，请填写取卡密码！长度为6-20个数字、字母或组合！');
                    $('[name=pwdforsearch2]').focus();
                    return false;
                }
            }

            if($('#isemail').is(':checked')){
                if($.trim($('[name=email]').val())==''){
                    alert('您选择了把支付结果发送到邮箱选项，但您没有填写邮箱！');
                    $('[name=email]').focus();
                    return false;
                }
            }

            if($('#is_coupon').is(':checked')){
                if($.trim($('[name=couponcode]').val())==''){
                    alert('您选择了使用优惠券，但您没有填写优惠券！');
                    $('[name=couponcode]').focus();
                    return false;
                }

                var coupon_ctype=$('[name=coupon_ctype]').val();
                if(coupon_ctype==0){
                    alert('您选择了使用优惠券，但所填写的优惠券无效！');
                    $('[name=couponcode]').focus();
                    return false;
                }
            }

            var select_pid=false;
            $('[name=pid]').each(function(){
                if($(this).is(':checked')){
                    select_pid=true;
                }
            })
            if(select_pid==false){
                alert('请选择支付方式！');
                $('[name=pid]').first();
                return false;
            }

            if(nyro=='1'){
                $('.nyroModal').nyroModal({
                    closeOnEscape: true,
                    showCloseButton: true,
                    closeOnClick:true,
                    resizable: true,
                    sizes:{
                        minH: 470,
                        minW: 560
                    }
                });
                $('.nyroModal').nmCall();
                return false;
            }

            return true;
        });

        function getCardLength(){
            $('.pay-list ul li').each(function(){
                if($(this).find('input').attr('checked')){
                    pid=$(this).find('input').val();
                }
            });

            $('[name=cardNoLength]').val(0);
            $('[name=cardPwdLength]').val(0);

            $.post('ajax.php',{action:'getCardLength',channelid:pid},function(data){			
                if(data){
                    $('[name=cardNoLength]').val(data.split('|')[0]);
                    $('[name=cardPwdLength]').val(data.split('|')[1]);
                }
            })
        }
        function goodDiscountDesc( goodid )
        {
            $.post('ajax.php',{action:'goodDiscountDesc',goodid:goodid},function(data){
                console.log(data);
                if( data.length > 0 )
                {
                    $("#showWholesaleRule").show(  );
                    $("#WholesaleRuleText").html( data );
                }
                else
                {
                    $("#showWholesaleRule").hide(  );
                    $("#WholesaleRuleText").hide(  );
                }
            },'text');
        }
    </script>


    <script src="baibian/static/js/jquery.qrcode.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#qrcodeTable").qrcode({
                text	: window.location.href,
                width: "220",
                height: "220"
            });
        });
       
    </script>
    <div style="display: none">
        <?php if($statistics) echo $statistics ?>
        <?php if($config['tongji']) echo $config['tongji'] ?>
    </div>


</body>
</html>
