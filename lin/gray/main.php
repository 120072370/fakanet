<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $title ?></title>

    <link href="/tpl/weiqi/content/webcss/global.css" rel="stylesheet" type="text/css">
    <link href="/tpl/weiqi/content/webcss/layout.css?1234" rel="stylesheet" type="text/css">
    <link href="/lin/gray/css/lin.css?1254" rel="stylesheet" type="text/css">
    <link href="/lin/default/css/nyro.css" rel="stylesheet" type="text/css">

    <script src="/includes/libs/jquery.min.js" type="text/javascript"></script>

</head>
<body>
    <div class="page_init">
        <!--{头部-->
        <div class="head">
            <div class="web clearfix">
                <h1>
                    <a href="/index.htm">
                        <img src="/images/logo.png" alt="" style="width: 240px">
                    </a>
                </h1>
                <ul class="nav clearfix">
                    <li>
                        <h3>
                            <a href="/index.htm">首页</a>
                        </h3>
                    </li>
                    <li>
                        <h3>
                            <a href="/orderquery.htm" id="_topChannel2">卡密查询</a>
                        </h3>
                    </li>
                    <li>
                        <h3>
                            <a href="/faq.htm" id="_topChannel4">帮助中心</a>
                        </h3>
                    </li>
                    <li>
                        <h3>
                            <a href="report.php?uid=<?php echo $userid ?>&t=1" class="nyroModal" id="A1" style="color:red;font-weight:bold;">举报投诉</a>
                        </h3>
                    </li>
                </ul>
            </div>
        </div>
        <!--头部}-->


        <div class="tophead">
            <div class="OnlineInfo">
                <div class="buy_info">
                    <h1><?php echo $sitename ?></h1>
                     <h2><?php echo GetLinUserLevel($level) ?></h2>
                     <?php if(!empty($siteurl)):?>
                        <p>商家网站：<a href='<?php echo $siteurl ?>'  target="_blank"><?php echo $siteurl ?></a></p>
                        <?php endif;?>
                    <p>
                        商家客服：<?php echo $qq ?> <a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq ?> &Site=&Menu=yes">
                            <img border="0" src="/lin/default/images/button_11.gif" alt="点击这里给我发消息" align="absmiddle"></a>
                    </p>

                </div>
            </div>
            <div class="OnlineInfo2">
                <div class="inter">
                    <h2>商家公告</h2>
                </div>
                <div class="interp">
                    <p>
                        <?php echo $siteintr == ""?"商家很懒，没留下任何信息":$siteintr ?>
                    </p>
                </div>

                <div class="buy_code qrcodeTable1">
                    <dl>
                        <dt id="qrcodetable1"></dt>
                        <dd>手机扫描二维码购买</dd>
                    </dl>
                </div>
            </div>
        </div>

        <form name="p" method="post" class="nyroModal" action="req.php" target="_blank">
            <input type="hidden" name="userid" value="<?php echo $userid ?>" />
            <input type="hidden" name="token" value="<?php echo $token ?>" />
            <input type="hidden" name="cardNoLength" value="0" />
            <input type="hidden" name="cardPwdLength" value="0" />
            <input type="hidden" name="api_username" value="<?php echo _G('username') ?>" />
             <input type="hidden" name="fromid" value="<?php echo $from ?>" />
            <div class="page_initcontent">
                <div class="content">
                    <div class="Onlinelin ">
                        <div class="buy_form">
                            <div class="form_header">
                                <h1>选择商品</h1>
                            </div>
                            <div class="form">
                                <div class="input_group">
                                    <?php if(!$goodid): ?>
                                    <label for="feilei">商品分类</label>
                                    <span class="out_select">
                                        <span class="inner_select">
                                            <?php if($cateid):?>
                                            <?php echo $catename ?>
                                            <script>$(function(){selectcateid();})</script>
                                            <input type="hidden" name="cateid" id="cateid" value="<?php echo $cateid ?>" />
                                            <?php else: ?><select name="cateid" id="cateid" onchange="selectcateid()">
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
                                <div class="input_group">
                                    <label for="name">商品名称</label>
                                    <span class="out_select">
                                        <span class="inner_select">
                                            <span id="loading" style="display: none">
                                                <img src="green/images/load.gif" />
                                                加载中...</span><?php if($goodid):?>
                                                                        <?php echo $goodname ?>
                                            <script>$(function(){selectgoodid();})</script>

                                            <input type="hidden" name="goodid" id="goodid" value="<?php echo $goodid ?>" />
                                            <?php else: ?><select id="goodid" name="goodid" onchange="selectgoodid()">
                                                <option value="">请选择商品</option>
                                            </select>
                                            <?php endif; ?>
                                            <input type="hidden" name="is_discount" id="is_discount" value="0" />
                                            <input type="hidden" name="coupon_ctype" value="0" />
                                            <input type="hidden" name="coupon_value" value="0" />
                                        </span>
                                    </span>
                                </div>
                                <div class="input_group gremark" style="display: none" id="gremark">
                                    <span style="border: 1px solid rgb(221, 221, 221); background-color: rgb(238, 255, 253); padding: 5px 10px; width: 90%; color: rgb(51, 51, 51); border-radius: 2px; margin-top: 5px; margin-left: 25px;"></span>
                                </div>
                                <!--<div class="input_group" style="display: none"   id="payinfo">
                                <span>商品详情:   </span>
                                <span class="goodinfo"  
                                    style="border: 1px solid rgb(221, 221, 221); height:100%; border-radius: 2px; margin-top: 5px; margin-left: 25px;">
                                </span>
                            </div>-->
                                <div class="input_group" id="payinfo" style="display: none;">
                                    <span>商品详情:   </span>
                                    <div class="goodinfo"></div>
                                </div>
                                <div class="input_group jiage">
                                    <label for="price">商品单价</label>
                                    <span><span class="price" id="price">0.00</span> 元<input type="hidden" name="paymoney" value="" /><input type="hidden" name="danjia" value="" /></li></span>
                                    <span style="cursor: pointer; color: #900; font-size: 14px; padding-left: 15px;" id="showWholesaleRule">查看批发价格</span>
                                    <input type="hidden" name="paymoney" value="" /><input type="hidden" name="danjia" value="" />
                                </div>
                                <div class="input_group" id="WholesaleRuleText" style="display: none; clear: both; border: 1px solid rgb(213, 213, 213); font-size: 12px; background-color: rgb(247, 254, 239); color: rgb(0, 0, 255); padding: 10px; margin: 2px; height: 100%;">
                                </div>
                                <div class="input_group">
                                    <label for="nums">购买数量</label>
                                    <input type="number" class="input num" min="<?php echo $min_quantity ?>"  onclick="changequantity()" onkeyup="changequantity()" name="quantity" value="<?php echo _G('num') ? _G('num') : ($limit_quantity ? $limit_quantity : 1) ?>" ;"<?php echo $limit_quantity ? ' disabled="disabled" readonly="readonly" title="'.$limit_quantity_tip.'"' : '' ?> />
                                    <span class="green" id="goodInvent"></span><span id="limit_quantity_tip" class="gray" style="<?php echo $limit_quantity ? '' : 'display:none' ?>">(<?php echo $limit_quantity_tip ?>)</span></li>
                            <span id="goodInvent"></span>
                                </div>
                                <div class="input_group">
                                    <label for="tel">联系方式</label>
                                    <input id="contact" type="text" class="input" name="contact" />
                                    <span class="gray"><span>必填，作为购买者凭证</span>
                                </div>
                                <div class="input_group" style="<?php echo $is_pwdforsearch==1 ? '' : 'display:none' ?>"  id="pwdforsearch1">
                                    <span class="red">*取卡密码：</span>
                                    <input type="text" class="input" name="pwdforsearch1" />
                                    <span style="text-decoration: underline; color: red">(长度为6-20个数字、字母或组合)</span>
                                </div>
                                <div  class="input_group" style="<?php echo $is_pwdforsearch==2 ? '' : 'display:none' ?>"  id="pwdforsearch2">
                                    <input type="checkbox" name="is_pwdforsearch" value="1" id="is_pwdforsearch" />
                                    <span for="is_pwdforsearch" style="color: red; text-decoration: underline">是否使用取卡密码</span>
                                </div>
                                <div class="input_group" style="display: none" id="pwdforsearchinput">
                                    <span>请输入取卡密码</span>
                                    <input type="text" name="pwdforsearch2" class="input" />
                                </div>
                                <div class="input_group">
                                    <input type="checkbox" name="isemail" value="1" id="isemail" />
                                    <span for="isemail">是否成功支付送到邮箱!</span>
                                </div>
                                <div class="input_group" id="email" style="display: none">
                                    <label for="nums">邮箱地址</label>
                                    <input type="text" class="input" name="email" />
                                </div>
                                <div class="input_group" style="<?php echo $is_coupon ? '' : 'display:none' ?>" id="goodCoupon">
                                    <input type="checkbox" name="is_coupon" value="1" id="is_coupon" />
                                    <span style="color: red; text-decoration: underline">是否使用优惠券</span>
                                </div>
                                <div class="input_group" style="display:none" id="couponcode">
                                    <label for="nums">输入优惠券</label>
                                    <input type="text" name="couponcode" class="input" onkeyup="checkCoupon()" />
                                    <span id="checkcoupon" style="display: none">
                                        <img src="default/images/load.gif" />
                                        正在查询...</span>
                                </div>
                                <div class="input_group">
                                    <div class="sum pinfo2">
                                        <p>您应付总额为<span class="price tprice">0.00</span>元<span class="price bt">（人民币）</span></p>
                                    </div>
                                    <div class="sum pinfo3" style="display: none;">
                                        <p><span class="red payname"></span>的折价率为：<span class="red rate">100</span><span class="red">%</span></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div style="clear: both;"></div>
                    <div class="charge">
                        <div class="choose_charge">
                            <ul>
                                <li class=" active">
                                    <input type="radio" style="display: none" name="paytype" value="bank" id="bank" checked />
                                    <span>选择支付方式</span></li>

                            </ul>
                        </div>
                        <div class="card" id="banks" style="display: block">
                            <ul>
                                <?php if($is_weixin_display): ?>
                                <li>
                                    <a href="javascript:void(0)">
                                        <label for="bank(85)" class="payclass">
                                            <input type="radio" style="display: none;" name="pid" value="WEIXIN" myval="40" id="bank(85)" />
                                            <img src="/lin/blue/images/zhifu/WEIXIN.gif" title="微信扫码" disabled="disabled" />
                                        </label>
                                    </a>
                                    <i></i>
                                </li>
                                <?php endif; ?>
                                <?php if($is_alipay_display): ?>
                                <li>
                                    <a href="javascript:void(0)">
                                        <label for="alipays">
                                            <input type="radio" style="display: none;" name="pid" value="ALIPAY" myval="2" id="alipays" />
                                            <img src="/lin/blue/images/zhifu/ALIPAY1.gif" title="支付宝" disabled="disabled" />
                                        </label>
                                    </a>
                                    <i></i>
                                </li>
                                <?php endif; ?>
                                <?php if($is_tenpay_display): ?>
                                <li>
                                    <a href="javascript:void(0)">
                                        <label for="tenpays">
                                            <input type="radio" name="pid" style="display: none;" value="TENPAY" myval="3" id="tenpays" />
                                            <img src="/lin/blue/images/zhifu/TENPAY.gif" title="财付通" disabled="disabled" />
                                        </label>
                                    </a>
                                    <i></i>
                                </li>
                                <?php endif; ?>
                                <?php if($is_qqcode_display): ?>
                                <li>
                                    <a href="javascript:void(0)">
                                        <label for="bank(45)">
                                            <input type="radio" name="pid" style="display: none;" value="QQCODE" myval="4" id="bank(45)" />
                                            <img src="/lin/blue/images/zhifu/QQCODE.gif" title="QQ钱包" disabled="disabled" />
                                        </label>
                                    </a>
                                    <i></i>
                                </li>
                                <?php endif; ?>
                                 <?php if($is_alipay_mq_display): ?>
                            <li>
                                <a href="javascript:void(0)">
                                    <label for="alipays">
                                        <input type="radio" name="pid" value="MQPAY" myval="5" id="mqpay" /><img src="/lin/default/images/zhifu/ALIPAY1.gif" title="支付宝" disabled="disabled" />
                                    </label>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if($is_wx_mq_display): ?>
                            <li>
                                <a href="javascript:void(0)">
                                    <label for="alipays">
                                        <input type="radio" name="pid" value="MQWXPAY" myval="5" id="Radio1" /><img src="/lin/default/images/zhifu/WEIXIN.gif" title="微信支付" disabled="disabled" />
                                    </label>
                                </a>
                            </li>
                            <?php endif; ?>

                            </ul>
                        </div>
                        <div class="card paylist" style="display: none">

                            <ul>
                                <?php
                                if($channels):
                                    foreach($channels as $key=>$val):
                                        if($val['channelid']==24 || $val['channelid']==25 || $val['channelid']==26 || $val['channelid']==27 || $val['channelid']==28 ||$val['channelid']==29 || $val['channelid']==30){
                                            continue;
                                        }
                                ?>
                                <li>
                                    <a href="javascript:void(0)">
                                        <label for="<?php echo $val['channelid'] ?>">
                                            <input type="radio" name="pid" value="<?php echo $val['channelid'] ?>" myval="2" id="<?php echo $val['channelid'] ?>" /><?php echo $val['channelname'] ?>
                                        </label>
                                    </a>
                                </li>
                                <?php
                                    endforeach;
                                endif;
                                ?>

                            </ul>
                            <div class="card_tips">
                                此卡的换购价值率为<strong class="red rate">100</strong><strong class="red">%</strong>购买当前<strong class="red gprice">0.00</strong>元的商品要<strong class="red tprice">0</strong>元面额的卡
                            </div>
                            <div class="card_tips">
                                用100元的点卡购买10元的商品，剩下的90元不退回，请使用和商品价格一样的点卡购买，避免不必要的损失
                            </div>
                        </div>

                        <div id="submit" class="zf">
                            <input name="image" type="image" id="image" src="/lin/default/images/button.gif" />
                        </div>
                    </div>

                    <div style="clear: both;"></div>
                    <!-- <div id="footer_ied">
                        <div class="wrap_ied">
                            <p>免责声明（向陌生人付款,请注意交易风险,否则造成的经济损失自负！）</p>
                              <p>
                                请认证核对商品信息，如遇商品： 假卡/诈骗/钓鱼等请务必购买当天22点之前投诉，逾期不支持退款。
                         <a href="report.php?uid=<?php echo $userid ?>&t=1" class="nyroModal" id="A2" style="color:red;font-weight:bold;">举报投诉</a>
                            </p>
                            <p>本平台仅提供自动发卡服务，并非销售商，不负责商品相关售后问题。</p>
                            <p>如产生交易纠纷请与商家自行协商处理，与<span style="font-size:12px"><?php echo $config_sitename ?></span>平台无关！</p>
                            <p>如果您在支付过程中遇到虚假商品或取卡问题,请联系平台客服。 </p>
                            <p><a href="index.htm" target="_blank">微奇发卡 版权所有</a></p>
                        </div>
                    </div>-->
                    <?php include 'footer.php';?>
                </div>

            </div>




        </form>

    </div>


    <script src="/lin/default/Js/jquery.qrcode.js" type="text/javascript"></script>
    <script src="/lin/default/Js/qrcode.js" type="text/javascript"></script>
    <script src="/lin/default/js/nyro.js" type="text/javascript"></script>
    <script type="text/javascript">
        var min_quantity=1;
        $(document).ready(function(){

            $("#qrcodetable1").qrcode({
                render	: "dt",
                text	: window.location.href,
                width: "160",
                height: "155"
            });
        });
  
        $(".card li").click(function(){
            $(".card li").removeClass("checked");
            $(".card li").find("input:radio").removeAttr("checked");
            
            $(this).addClass("checked");
            $(this).find("input:radio").attr("checked","checked");
            
        });


        $(function(){
           

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

            

            $.extend($.fn.nyroModal.settings,{ modal: true, minHeight: 550, minWidth: 550});
            $('#report').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 520, height: 420 });
            <?php if($is_user_popup): ?>
            var user_popup_message='<?php echo $user_popup_message ?>';
            $.nyroModalManual({minHeight:<?php echo $nyroHeight ?>,Width:680,content: user_popup_message});
            <?php endif; ?>
	
        });
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
                    $("#payinfo").show();
                }
       
                $(".goodinfo").html(data.remark);
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
        }

        $('#submit').click(function(){
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

            return true;
        });

       
        function goodDiscountDesc( goodid )
        {
            $.post('ajax.php',{action:'goodDiscountDesc',goodid:goodid},function(data){
                console.log(data);
                if( data.length > 0 )
                {
                    $("#showWholesaleRule").show();
                    $("#WholesaleRuleText").html(data);
                }
                else
                {
                    $("#showWholesaleRule").hide();
                    $("#WholesaleRuleText").hide();
                }
            },'text');
        }
       
    </script>

    <div style="display: none">
        <?php if($statistics) echo $statistics ?>
        <?php if($config['tongji']) echo $config['tongji'] ?>
    </div>

</body>
</html>
