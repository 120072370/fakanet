<html>
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title ?>_<?php echo $title;?></title>
		<link href="/lin/blue/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="/lin/blue/css/newmobile.css" rel="stylesheet" type="text/css">
		<link href="/lin/blue/css/nyro.css" rel="stylesheet" type="text/css">
		<link href="/lin/blue/css/thickbox.css" rel="stylesheet" type="text/css">
		<script src="/lin/blue/js/jquery.min.js" type="text/javascript"></script>
		<script src="/lin/blue/js/nyro.js" type="text/javascript"></script>
	</head>

	<body>
		<!-- top -->
		<div class="pay_top">
			<p>
				商户名称： <?php echo $sitename ?>
				<br>
				在线客服： <?php echo $qq ?>
			</p>
		</div>
		<!-- 查询 客服 -->
		<div class="top_btn">
			<a href="/orderquery.htm" target="_blank">
				<img src="/lin/default/images/yc88-net1.png" /></i> 订单查询
			</a>
			<a  href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq ?>&Site=<?php echo $sitename ?>&Menu=yes">
				<img src="/lin/default/images/yc88-net2.png" /></i> 联系客服
			</a>
		</div>
		<form name="p" method="post" class="nyroModal" action="wap.php" target="_blank">
			<input type="checkbox" name="isagree" value="true" checked="" style="display: none;">
			<input type="hidden" name="userid" value="<?php echo $userid ?>" />
			<input type="hidden" name="token" value="<?php echo $token ?>" />
			<input type="hidden" name="cardNoLength" value="0" />
			<input type="hidden" name="cardPwdLength" value="0" />
			<input type="hidden" name="api_username" value="<?php echo _G('username') ?>" />
			<input type="hidden" name="paytype" id="paytype" value="alipay" />
			<div class="choose_goods">
				<span class="choose_title">1. 选择商品</span>
				<?php if(!$goodid): ?>
				<div class="s_box">
					<span>商品分类</span>
					<?php if($cateid): ?>
					<?php echo $catename ?> 
					<script>
							$(function() {
								selectcateid();
							})
						</script>
					<input type="hidden" name="cateid" id="cateid" value="<?php echo $cateid ?>" />
					<?php else: ?>
					<select name="cateid" id="cateid" onChange="selectcateid()">
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
				<?php endif; ?>
				<div class="s_box">
					<span>商品名称</span>
					<span id="loading" style="display:none"><img src="green/images/load.gif" /> 加载中...</span>
					<?php if($goodid): ?>
					<?php echo $goodname ?> 
					<script>$(function() {
		selectgoodid();
	})</script>
					<input type="hidden" name="goodid" id="goodid" value="<?php echo $goodid ?>" />
					<?php else: ?>
					<select name="goodid" id="goodid" onChange="selectgoodid()">
						<option value="">请选择商品</option>
					</select>
					<?php endif; ?>
					<input type="hidden" name="is_discount" id="is_discount" value="0" />
					<input type="hidden" name="coupon_ctype" value="0" />
					<input type="hidden" name="coupon_value" value="0" />
				</div>
				<p class="pinfo2">
					<span class="s_left">商品单价</span>
					<span class="s_right">
					<a href="javascript:void(0)" id="isdiscount" style="float: left; display:none">
						查看批发价格
					</a> <strong class="red" id="price">0.00</strong> 元 </span>
					<input type="hidden" name="paymoney" value="" />
					<input type="hidden" name="danjia" value="" />
				</p>
				<div id="discountdetail"></div>
				<p>
					<span class="s_left">购买数量</span><span class="s_right"> <font color="green" id="goodInvent" style="float: left"></font>
					<input type="text" onKeyUp="changequantity()" name="quantity" value="1" style="width:100px;" >
					&nbsp;</span>
				</p>
				<p>
					<span class="s_left">联系方式</span>
					<span class="s_right" >
					<input name="contact" type="text" style="height:40px; width: 85%;" placeholder="建议手机号码" >
					</span>
				</p>

				<p style="display:none" id="pwdforsearch1">
					<span class="s_left">取卡密码</span><span class="s_right">
					<input name="pwdforsearch1" type="text"  style="height:40px;">
					</span>
				</p>
				<p style="display:none" id="pwdforsearch2">
					<input type="checkbox" name="is_pwdforsearch" value="1" id="is_pwdforsearch" />
					<label for="is_pwdforsearch" style="color:red;text-decoration:underline;font-size:12px">使用取卡密码(如果不使用，请不要勾选！)</label>

				</p>
				<p id="pwdforsearchinput" style="display:none">
					<span class="s_left" style="font-size:12px;width:40%"> 请输入取卡密码：</span>
					<span class="s_right" style="width:55%">
					<input type="text" name="pwdforsearch2" class="input"style="height:40px" />
					</span>
				</p>
				<p>
					<input type="checkbox" name="isemail" value="1" id="isemail" />
					<label for="isemail" style="color:red;text-decoration:underline;font-size:12px">交易成功后也将支付结果发送到我的邮箱</label>

				</p>
				<p id="email" style="display:none">
					<span class="s_left" style="font-size:12px;width:40%"> Email：</span>
					<span class="s_right" style="width:55%">
					<input type="text" class="input" style="padding:0 3px;height:40px" name="email" />
					</span>
				</p>
				<p style="display:none" id="goodCoupon">

					<label for="is_coupon" style="font-size:12px">
					<input type="checkbox" name="is_coupon" value="1" id="is_coupon" />
					是否使用优惠券(如果没有，请不要勾选)</label>
				</p>
				<p id="couponcode" style="display:none;font-size:12px">
					请输入您的优惠卷：
					<input type="text" name="couponcode" style="height:40px; width:120px;" onBlur="checkCoupon()" placeholder="请输入您的优惠卷">
					<span id="checkcoupon" style="display:none">
					<img src="/lin/blue/images/load.gif">
					正在查询...</span>
				</p>
				<p></p>
			</div>
			<!-- 应付总额 -->
			<div class="price" id="payinfo">
				应付总额 <span class="red tprice">10.00</span> 元
				<div class="pinfo3" style="display:none">
					<span class="red payname"></span> 的折价率为：<span class="red rate">100</span><span class="red">%</span>
				</div>
			</div>
			<div id="buy_border">
				<div class="step">
					2. 选择支付方式
				</div>
				<div id="step_two">
					<ul id="select_pay" style="display: none;">
						<li class="selected">
							<input type="radio" style="display:none" name="paytype" value="bank" id="bank" checked="">
							<label for="bank" style="display:none">
							<img src="/lin/blue/images/sm.png" align="absmiddle">
							扫码支付</label>
						</li>
					</ul>
					<div class="paylist">
						<label>
						<div class="box">
							<input name="pid" type="radio" value="ALIWAP" checked="">
							&nbsp;
							<img src="/lin/blue/images/zfb1.png" width="238" height="60" style="vertical-align:middle">
							<span class="span_on"></span>
						</div> </label>
						<label>
						<div class="box">
							<input name="pid" type="radio" value="WXAPP">
							&nbsp;
							<img src="/lin/blue/images/wx1.png" width="238" height="60" style="vertical-align:middle">
							<span></span>
						</div> </label>
						<label>
						<div class="box">
							<input name="pid" type="radio" value="QQCODE">
							&nbsp;
							<img src="/lin/blue/images/qq1.png" width="238" height="60" style="vertical-align:middle">
							<span></span>
						</div> </label>
						<div style="clear:left"></div>
					</div>
				</div>
			</div>
			<div id="submit">
				<input type="submit" value="确认提交，进行下一步" class="next_btn">
			</div>

		</form>
		<script type="text/javascript">var whytext = $('#cardwhy').html();
$(function() {
	$('#isagree').click(function() {
		$('#agreement').toggle();
	})
	$('[name=isagree]').click(function() {
		$('#agreement').toggle();
	})
	$('#isemail').click(function() {
		if($(this).is(':checked')) {
			$('#email').show();
			$('[name=email]').focus();
		} else {
			$('#email').hide();
		}
	});

	$('#is_coupon').click(function() {
		if($(this).is(':checked')) {
			$('#couponcode').show();
			$('[name=couponcode]').focus();
		} else {
			$('#couponcode').hide();
			$('#checkcoupon').hide();
		}
	});

	$('#is_pwdforsearch').click(function() {
		if($(this).is(':checked')) {
			$('#pwdforsearchinput').show();
			$('[name=pwdforsearch2]').focus();
		} else {
			$('#pwdforsearchinput').hide();
		}
	});

	$('#select_pay li').each(function() {
		$(this).hover(function() {
			$(this).addClass('cursor');
		})
	})

	$('#select_pay li').click(function() {
		var id = $(this).find('input').attr('id');
		$('#' + id).attr('checked', true);
		$('#' + id + 's').show().siblings().hide();
		$($('#' + id).parent()).addClass('selected').siblings().removeClass('selected');
		if(id != 'card') {
			$('#step_three').hide();
		} else {
			$('#step_three').show();
		}
	});

	$.extend($.fn.nyroModal.settings, {
		modal: true,
		minHeight: 490,
		minWidth: 550
	});
	$('#report').nyroModal({
		autoSizable: false,
		resizable: false,
		windowResize: false,
		width: 520,
		height: 420
	});

	$(document).on('click', '#verify_pwdforbuy', function() {
		//$("#verify_pwdforbuy").on('click',function(){

		var pwdforbuy = $.trim($('[name=pwdforbuy]').val());
		if(pwdforbuy == '') {
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
		}, function(data) {
			if(data == 'ok') {
				$('#verify_pwdforbuy_msg').hide();
				alert('验证成功，请继续购买！');
				parent.$.nyroModalRemove();
			} else {
				$('#verify_pwdforbuy_msg').hide();
				alert("验证失败");
				$('#verify_pwdforbuy').attr('disabled', false);
				return false;
			}
		})
	});

	$('.paylist ul li').each(function() {
		$(this).hover(
			function() {
				$(this).addClass('yb');
				$(this).addClass('cursor');
			},
			function() {
				$(this).removeClass("yb");
			});

		$(this).click(function() {
			$('.paylist li').removeClass('ybh');
			$(this).addClass('ybh');
			$(this).find('input').attr('checked', true);
			var pname = $(this).find('img').attr('alt');
			$('#select_pay li').each(function() {
				if($(this).hasClass('selected')) {
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
var pwdforbuy = function() {
	var user_popup_message = '<div style="padding:10px;color:#cc3333;line-height:24px"><p style="float:left;font-size:14px;font-weight:bold;color:blue;">访问密码：</p><p style="clear:both;font-size:12px;font-weight:bold;color:red;"><input type="password" name="pwdforbuy" class="input" maxlength="20"> <input type="submit"  id="verify_pwdforbuy" value="验证密码"> <span id="verify_pwdforbuy_msg" style="display:none"><img src="/lin/blue/images/load.gif"> 正在验证...</span></p><ul><li>1.本商品购买设置了安全密码</li><li>2.只有成功验证密码后才能继续购买</li></ul><p></p></div>';
	$.nyroModalManual({
		minHeight: 137,
		Width: 420,
		content: user_popup_message
	});
}

var checkCoupon = function() {
	var couponcode = $.trim($('[name=couponcode]').val());
	var userid = 30;
	$('#checkcoupon').show();
	$.post('ajax.php', {
		action: 'checkCoupon',
		couponcode: couponcode,
		userid: userid,
		t: new Date().getTime()
	}, function(data) {
		if(data) {
			var d = data.split('|');
			if(d[0] == 'err') {
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

var get_pay_card_info = function() {
	var channelid = 0;
	$('.paylist li').each(function() {
		if($(this).find('input').is(':checked')) {
			channelid = $(this).find('input').val();
		}
	})

	if(channelid != 0 && !isNaN(channelid)) {
		var option = '<option value="">请选择充值卡面额</option>';
		$.post('ajax.php', {
			action: 'getpaycardinfo',
			channelid: channelid
		}, function(data) {
			$('.cardvalue').each(function() {
				$(this).html(option + data);
			})
		})
	}
}

var select_card_quantity = function() {
	var quantity = $('[name=cardquantity]').val();
	quantity = quantity - 1;
	$('.card_list_add').html('');
	for(var i = 1; i <= quantity; i++) {
		$('.card_list_add').append($('.card_list:first').clone());
	}
}

var selectcateid = function() {
	var cateid = $('#cateid').val();
	$('#loading').show();
	$('#goodid').hide();
	var option = '<option value="">请选择商品</option>';
	if(cateid > 0) {
		$.post('ajax.php', {
			action: 'getgoodList',
			cateid: cateid
		}, function(data) {
			if(data == 'ok') {
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

var selectgoodid = function() {
	if($('#goodid option:selected').attr('data-mima') == 1) {
		pwdforbuy();
	}
	var goodid = $('#goodid').val();
	$('#price').html('<img src="/lin/blue/images/load.gif" />');

	$.post('ajax.php', {
		action: 'getgoodInfo',
		goodid: goodid
	}, function(data) {
		if(data) {
			var d = data.split(',');
			$('#price').html(d[0]);
			if(d[3] == 0) {
				$('#goodCoupon').hide();
			}
			if(d[3] == 1) {
				$('#goodCoupon').show();
			}
			if(d[4] == 0) {
				$('#pwdforsearch2').hide();
				$('#pwdforsearch1').hide();
			}
			if(d[4] == 1) {
				$('#pwdforsearch2').hide();
				$('#pwdforsearch1').show();
			}
			if(d[4] == 2) {
				$('#pwdforsearch1').hide();
				$('#pwdforsearch2').show();
			}
			if(d[5] > 0) {
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
			$('[name=danjia]').val(d[0]);
			$('#goodInvent').html(d[1]);
			$('[name=is_discount]').val(d[2]);
			getrate();
			goodDiscount();
			$('.pinfo1').hide();
			$('.pinfo2').show();
			$('.pinfo3').hide();
		}
	})
}

var changequantity = function() {
	goodDiscount();
	goodschk();
}

var goodDiscount = function() {
	var is_discount = $('[name=is_discount]').val();
	var quantity = parseInt($.trim($('[name=quantity]').val()));
	var goodid = $('#goodid').val();
	if(is_discount == 1) {
		$.post('ajax.php', {
			action: 'getDiscount',
			goodid: goodid,
			quantity: quantity
		}, function(data) {
			if(data > 0) {
				$('#price').html(data);
				$('[name=danjia]').val(data);
				goodschk();
			}
		})
	}
}

var getrate = function() {
	var uid = 30;
	var goodid = $('[name=goodid]').val();
	var cateid = $('[name=cateid]').val();
	var channelid = 0;
	$('[name=pid]').each(function() {
		if($(this).is(':checked')) {
			channelid = $(this).val();
		}
	})
	if(isNaN(channelid)) {
		if(channelid != 'ALIPAY' && channelid != 'TENPAY') {
			channelid = 'bank';
		}
	}

	if(goodid == '') {
		goodid = 0;
	}
	if(cateid == '') {
		cateid = 0;
	}
	$.post('ajax.php', {
		action: 'getrate',
		userid: uid,
		cateid: cateid,
		goodid: goodid,
		channelid: channelid
	}, function(data) {
		$('.rate').html(data);
		goodschk();
	});
}

var goodschk = function() {
	var dprice = parseFloat($('#price').text());
	var quantity = parseInt($.trim($('[name=quantity]').val()));
	var rate = parseFloat($('.rate').first().text());
	var tprice = parseFloat(dprice * quantity / rate * 100);
	var gprice = parseFloat(dprice * quantity);

	var coupon_ctype = $('[name=coupon_ctype]').val();
	var coupon_value = $('[name=coupon_value]').val();

	if(coupon_ctype == 1) {
		tprice = (tprice - coupon_value);
	} else if(coupon_ctype == 100) {
		tprice = parseFloat(tprice - (tprice * coupon_value / 100));
	}

	tprice = $('#card').attr('checked') ? Math.ceil(tprice.toFixed(2)) : tprice.toFixed(1);
	gprice = $('#card').attr('checked') ? Math.ceil(gprice.toFixed(2)) : gprice.toFixed(1);

	$('.tprice').html(tprice);
	$('.gprice').html(gprice);
	$('[name=paymoney]').val(tprice);
}

$('#submit').click(function() {
	if($('[name=isagree]').is(':checked') == false) {
		alert('请阅读和同意用户协议，才能继续购买！');
		$('[name=isagree]').focus();
		return false;
	}
	var cateid = $('[name=cateid]').val();
	if(cateid == '') {
		alert('请选择商品分类！');
		$('[name=cateid]').focus();
		return false;
	}
	var goodid = $('[name=goodid]').val();
	if(goodid == '') {
		alert('请选择要购买的商品！');
		$('[name=goodid]').focus();
		return false;
	}
	var quantity = $.trim($('[name=quantity]').val());
	if(isNaN(quantity) || quantity <= 0 || quantity == '') {
		alert('购买数量填写错误，最小数量为1！');
		$('[name=quantity]').focus();
		return false;
	}
	var kucun = $('[name=kucun]').val();
	kucun = kucun == '' ? 0 : parseInt(kucun);
	if(kucun == 0) {
		alert('库存为空，暂无法购买！');
		$('[name=quantity]').focus();
		return false;
	}
	if(kucun > 0 && quantity > kucun) {
		alert('库存不足，请修改购买数量！');
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
	if(!reg.test(contact)) {
		alert('请填写您的联系方式，联系方式至少5位以上');
		$('[name=contact]').focus();
		return false;
	}

	var is_contact_limit = 0;
	if(is_contact_limit == 1) {
		var reg = /^[\d]+$/;
		if(!reg.test(contact)) {
			alert('联系方式必须全部为数字！');
			$('[name=contact]').focus();
			return false;
		}
	} else if(is_contact_limit == 2) {
		var reg = /^[a-zA-Z]+$/;
		if(!reg.test(contact)) {
			alert('联系方式必须全部为英文字母！');
			$('[name=contact]').focus();
			return false;
		}
	} else if(is_contact_limit == 3) {
		var reg = /^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i;
		if(!reg.test(contact)) {
			alert('联系方式必须为数字和字母的组合！');
			$('[name=contact]').focus();
			return false;
		}
	} else if(is_contact_limit == 4) {
		var reg = /^(([a-z]+)([_])([a-z]+)|([0-9]+)([_])([0-9]+))$/i;
		if(!reg.test(contact)) {
			alert('联系方式必须有数字和下划红或者字母和下划线组合！');
			$('[name=contact]').focus();
			return false;
		}
	} else if(is_contact_limit == 5) {
		var reg = /[\u4e00-\u9fa5]/;
		if(!reg.test(contact)) {
			alert('联系方式必须是中文！');
			$('[name=contact]').focus();
			return false;
		}
	} else if(is_contact_limit == 6) {
		var reg = /^([0-9a-zA-Z_-])+@([0-9a-zA-Z_-])+((\.[0-9a-zA-Z_-]{2,3}){1,2})$/;
		if(!reg.test(contact)) {
			alert('联系方式必须是邮箱！');
			$('[name=contact]').focus();
			return false;
		}
	} else if(is_contact_limit == 7) {
		var reg = /^(\d){11}$/;
		if(!reg.test(contact)) {
			alert('联系方式必须为您的手机号码！');
			$('[name=contact]').focus();
			return false;
		}
	}

	if($('#pwdforsearch1').is(':visible')) {
		var pwdforsearch = $.trim($('[name=pwdforsearch1]').val());
		var reg = /^([0-9A-Za-z]+){6,20}$/;
		if(pwdforsearch == '' || !reg.test(pwdforsearch)) {
			alert('请填写取卡密码！长度为6-20个数字、字母或组合！');
			$('[name=pwdforsearch1]').focus();
			return false;
		}
	}

	if($('#is_pwdforsearch').is(':checked')) {
		var pwdforsearch = $.trim($('[name=pwdforsearch2]').val());
		var reg = /^([0-9A-Za-z]+){6,20}$/;
		if(pwdforsearch == '' || !reg.test(pwdforsearch)) {
			alert('您选择了使用取卡密码，请填写取卡密码！长度为6-20个数字、字母或组合！');
			$('[name=pwdforsearch2]').focus();
			return false;
		}
	}

	if($('#isemail').is(':checked')) {
		if($.trim($('[name=email]').val()) == '') {
			alert('您选择了把支付结果发送到邮箱选项，但您没有填写邮箱！');
			$('[name=email]').focus();
			return false;
		}
	}

	if($('#is_coupon').is(':checked')) {
		if($.trim($('[name=couponcode]').val()) == '') {
			alert('您选择了使用优惠券，但您没有填写优惠券！');
			$('[name=couponcode]').focus();
			return false;
		}

		var coupon_ctype = $('[name=coupon_ctype]').val();
		if(coupon_ctype == 0) {
			alert('您选择了使用优惠券，但所填写的优惠券无效！');
			$('[name=couponcode]').focus();
			return false;
		}
	}

	var select_pid = false;
	$('[name=pid]').each(function() {
		if($(this).is(':checked')) {
			select_pid = true;
		}
	})
	if(select_pid == false) {
		alert('请选择支付方式！');
		$('[name=pid]').first();
		return false;
	}

	var pty = '';
	$('#select_pay li').each(function() {
		if($(this).find('input').attr('checked')) {
			pty = $(this).find('input').val();
		}
	});

	var cte = '';
	if(pty == 'card') {
		var cardNoLength = $('[name=cardNoLength]').val();
		var cardPwdLength = $('[name=cardPwdLength]').val();

		var i = 1;
		$('.cardvalue').each(function() {
			if($(this).val() == '') {
				cte = cte + "第" + i + "张卡 请选择充值卡面值!\n";
			}
			i++;
		})

		var i = 1;
		$('.cardnum').each(function() {
			if($(this).val() == '') {
				cte = cte + "第" + i + "张卡 请填写充值卡号!\n";
			} else {
				var cardno = $(this).val();
				if(cardNoLength != '0' && cardPwdLength != '0' && cardNoLength != cardno.length) {
					cte = cte + "第" + i + "张卡 充值卡号长度为" + cardNoLength + "位!\n";
				}
			}
			i++;
		})

		var i = 1;
		$('.cardpwd').each(function() {
			if($(this).val() == '') {
				cte = cte + "第" + i + "张卡 请填写充值卡密!\n";
			} else {
				var cardpwd = $(this).val();
				if(cardNoLength != '0' && cardPwdLength != '0' && cardPwdLength != cardpwd.length) {
					cte = cte + "第" + i + "张卡 充值卡密长度为" + cardPwdLength + "位!\n";
				}
			}
			i++;
		})
	}

	if(cte != '') {
		alert(cte);
		return false;
	}

	return true;
});

function getCardLength() {
	$('.paylist ul li').each(function() {
		if($(this).find('input').attr('checked')) {
			pid = $(this).find('input').val();
		}
	});

	$('[name=cardNoLength]').val(0);
	$('[name=cardPwdLength]').val(0);

	$.post('ajax.php', {
		action: 'getCardLength',
		channelid: pid
	}, function(data) {
		if(data) {
			$('[name=cardNoLength]').val(data.split('|')[0]);
			$('[name=cardPwdLength]').val(data.split('|')[1]);
		}
	})
}
$(function() {
	$(".box").click(function() {
		$(".box span").removeClass("span_on");
		$(this).children("span").addClass("span_on");
	});
});</script>

		<div style="display:none"></div>

		</div>

		<div class="saladict-container"></div>
	</body>
</html>