var phone_str = /^1(3|4|5|7|8)\d{9}$/;
var email_str = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
$(document).ready(function() {
	bootbox.setDefaults('locale','zh_CN');
	$('[data-toggle="popover"]').popover();
	/*勾选邮箱接收*/
	$('[name=is_email]').change(function() {
		var c =$(this).is(':checked');
		if(c){
			$('#email').show();
		}else{
			$('#email').hide();
			$('[name=email]').val('');
		}
	});

	/*勾选手机接收*/
	$('[name=is_sms]').change(function() {
		var c =$(this).is(':checked');
		if(c){
			var g = $('[name=goodid]').val();
			if(g==''){
				ad_alert('请选择要购买的商品');
				$(this).prop('checked', false);
				return false;
			};
			var num = $.trim($('[name=contact]').val());
			if(num==''){
				ad_alert('请填写您的手机号码');
				$(this).prop('checked', false);
				return false;
			}
		};
		goodschk();
	});

	/*是否使用优惠券*/
	$('[name=is_coupon]').change(function() {
		var c =$(this).is(':checked');
		if(c){
			$('#coupon').show();
		}else{
			$('#coupon').hide();
			$('[name=coupon]').val('');
			$('#bargain').val('0')
			goodschk();
		}
	});

	/*付款类型选择*/
	$('#banktab a:first').tab('show');
	$('#banktab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
		var h = $(this).attr('href');
		if(h=='#card'){
			$('#step_card').show();
		}else{
			$('#step_card').hide();
		}
		$('#paytype').val(h.replace('#', ''));
		$('.pay-list li').removeClass('active');
		$('.pay-list li input').prop('checked', false);
	});

	/*付款方式选择*/
	$('.pay-list li').click(function(){
		$('.pay-list li').removeClass('active');
		$(this).addClass('active');
		$(this).find("input[type='radio']").prop('checked', true);
	});
});

/*点卡选择*/
$('#card .pay-list li').unbind('click').click(function(e) {
	var pid = $(this).find("input[type='radio']").val();
	get_pay_card_info(pid);
	e.stopPropagation();
	return false;
});

$('.modal').on('hidden.bs.modal', function () {
	$('[name=isagree]').prop('checked', true);
});

/*限制输入格式*/
var onKeyNum = function(e){
	var key = window.event ? e.keyCode:e.which;
	var keychar = String.fromCharCode(key);
	reg = /\d/;
	return reg.test(keychar);
}

/*检测邮箱格式*/
var checkemail = function(){
	var email = $.trim($('[name=email]').val());
	if(email && !email_str.test(email)){
		ad_alert('您输入的邮箱地址不正确');
		$('[name=email]').val('');
	}
}

/*弹出提示*/
var ad_alert = function(str){
	bootbox.alert({
		buttons: {
			ok: {label: '确定'}
		},
		message: str,
		callback: function() {return true;},
		title: "提示"
	});
}

/*充值卡数量*/
var select_card_quantity = function(){
	var quantity = $('[name=cardquantity]').val();
	quantity = quantity-1;
	$('.card_list_add').html('');
	for(var i=1; i<=quantity; i++) {
		$('.card_list_add').append($('.card_list:first').clone());
	}
}

/*选中分类,获取商品列表*/
var selectcateid = function(){
	var cateid = parseInt($('[name=cateid]').val());
	$('[name=goodid]').html('<option value="">请选择商品</option>');
	if (cateid) {
		$.ajax({
			url : "/links/buycom/get_good_list",
			type : 'POST',
			dataType : 'json',
			data: {'uid': uid, 'cateid': cateid, t:new Date().getTime()},
			error: function () {
				ad_alert('获取失败，请稍后重试');
			},
			success : function(result){
				if (result.status == '1'){
					var data = result.data;
					for(var i=0; i<data.length; i++){
						$('[name=goodid]').append('<option value="' + data[i].id + '">' + data[i].good_name + '</option>');
					}
				}else{
					ad_alert(result.info);
				}
			}
		});
	}
}

/*选定商品*/
var selectgoodid = function(){
	var goodid = parseInt($('[name=goodid]').val());
	if (goodid) {
		$.ajax({
			url : "/links/buycom/get_good_info",
			type : 'POST',
			dataType : 'json',
			data: {'uid': uid, 'goodid': goodid, t:new Date().getTime()},
			error: function () {
				ad_alert('获取失败，请稍后重试');
			},
			success : function(result){
				if (result.status == '1'){
					var data = result.data;
					if(data.kucun==0){
						ad_alert('当前商品库存为空,暂时不能购买');
						$('[name=quantity]').val('1').attr('disabled', true);
						$('#kucun').val('0');
						$('#price').val('0');
						$('#discount').val('0');
						$('#low_limit').val('1');
						$('#contact_limit').val('0');
						$('#sms_charge').val('0');
						$('#is_coupon').hide();
						$('[name=is_coupon]').prop('checked',false);
						$('#coupon').hide();
						$('[name=coupon]').val('');
						$('#goodInvent').text('');
						$('#moneybox').hide();
						$('#goodinfo').hide();
						$('#showDiscount').hide();
					}else{
						$('[name=quantity]').val(data.low_limit).attr('disabled', false).removeAttr('disabled');
						$('#kucun').val(data.kucun);
						$('#price').val(data.price);
						$('#discount').val(data.is_discount);
						$('#low_limit').val(data.low_limit);
						$('#contact_limit').val(data.contact_limit);
						$('#sms_charge').val(data.sms_charge);
						if(data.is_coupon=='1'){//优惠券
							$('#is_coupon').show();
							$('[name=coupon]').val('');
							$('#bargain').val('0')
						}else{
							$('#is_coupon').hide();
							$('[name=is_coupon]').prop('checked',false);
							$('#coupon').hide();
							$('[name=coupon]').val('');
							$('#bargain').val('0')
						}
						if(data.is_discount=='1'){//批发优惠
							$('#showDiscount').show();
						}else{
							$('#showDiscount').hide();
						}
						if(data.description){//商品介绍
							$('#goodinfo').html(data.description).show();
						}else{
							$('#goodinfo').hide();
						}
						$('#goodInvent').text(data.invent);//库存提示
						if(data.contact_limit=='0'){//联系方式
							$('#contact_text').text('请填写手机号码');
							if(data.sms_charge=='0'){
								$('#is_sms').text(' 短信接收付款结果(费用0.1元)');
							} else {
								$('#is_sms').text(' 短信接收付款结果(免费)');
							}
							$('#smsbox').show();
						}else if(data.contact_limit=='1'){
							$('#contact_text').text('字母+数字,且字母开头');
							$('#smsbox').hide();
						}else if(data.contact_limit=='2'){
							$('#contact_text').text('请填写您的QQ号码');
							$('#smsbox').hide();
						}else if(data.contact_limit=='3'){
							$('#contact_text').text('请填写您的邮箱地址');
							$('#smsbox').hide();
						}
						changequantity();
						if(data.is_pwd_for_buy=='1'){//购买密码
							var h = '<div style="color:#cc3333;line-height:24px;clear:both;overflow:hidden;">';
							h += '<div style="font-weight:bold;color:red;text-align:center;">';
							h += '<input type="password" name="pwdforbuy" class="input" maxlength="20">';
							h += '<input type="submit"  onclick="verify_pwdforbuy()" id="verify_pwdforbuy" value="验证密码">';
							h += '<p id="verify_pwdforbuy_msg" style="display:none;"></p>';
							h += '</div>';
							h += '</div>';

							bootbox.alert({
								buttons: {
								   ok: {label: '关闭',className: 'hidden'}
								},
								message: h,
								callback: function() {
									return true;
								},
								title: '访问密码'
							});
							$('.bootbox-close-button').hide();
						}
					}
				}else{
					ad_alert(result.info);
				}
			}
		});
	}
}

/*判断购买密码*/
var verify_pwdforbuy = function (){
	var pwdforbuy=$.trim($('[name=pwdforbuy]').val());
	if(pwdforbuy==''){
		$('#verify_pwdforbuy_msg').text('请填写验证码').show();
		return false;
	}
	var reg=/^([a-z0-9A-Z]+){6,20}$/;
	if(!reg.test(pwdforbuy)){
		$('#verify_pwdforbuy_msg').text('验证码为6-20个数字、字母或字母加数字的组合').show();
		return false;
	}

	var goodid = parseInt($('[name=goodid]').val());
	$.ajax({
		url : "/links/buycom/check_pwd_for_buy",
		type : 'POST',
		dataType : 'json',
		data: {'uid': uid, 'goodid': goodid, 'pwdforbuy':pwdforbuy, t:new Date().getTime()},
		beforeSend: function(){
			$('#verify_pwdforbuy_msg').text('').hide();
		},
		error: function () {
			$('#verify_pwdforbuy_msg').text('验证失败，请刷新重试').show();
		},
		success : function(result){
			if (result.status == '1'){
				bootbox.hideAll();
			}else{
				$('#verify_pwdforbuy_msg').text(result.info).show();
			}
		}
	});
}

/*判断库存*/
var changequantity = function(){
	var quantity = parseInt($('[name=quantity]').val());
	var kucun = parseInt($('#kucun').val());
	if(quantity >= 1){
		if(quantity > kucun){
			$('[name=quantity]').val('1');
			ad_alert('当前商品剩余库存数量不足');
		}
		goodDiscount();
	}else{
		$('#moneybox').hide();
		$('#allmoey').text('');
	}
}

/*获取批发优惠价格*/
var goodDiscount = function(){
	var discount = parseInt($('#discount').val());
	var quantity = parseInt($('[name=quantity]').val());
	var goodid = parseInt($('[name=goodid]').val());
	if(discount==1){
		$.post(
			'/links/buycom/get_discount',
			{'uid': uid, 'goodid': goodid, 'quantity': quantity, t:new Date().getTime()},
			function(result){
				if(result.status == '1'){
					$('#price').val(result['data']['price']);
					if(result['data']['str']==''){
						$('#showDiscount').hide();
					}else{
						$('#showDiscount').attr('data-content', result['data']['str']).show();
					}
					goodschk();
				}
			}
		);
		return;
	}
	goodschk();
}

/*计算折扣价格*/
var goodschk = function(){
	var quantity = parseInt($('[name=quantity]').val());
	var price = parseFloat($('#price').val());
	var bargain = parseFloat($('#bargain').val());
	var all_price = parseFloat(price * quantity).toFixed(2);
	var txt = '商品单价 <b>' + price + '</b> 元，购买数量 <b>' + quantity + '</b> 张';
	var ck = $('[name=is_sms]').is(':checked');
	var sms_charge = parseInt($('#sms_charge').val());
	//console.log(ck);
	if(quantity>=1){
		$('#moneybox').show();
		if(ck){
			//console.log(ck);
			if(sms_charge==0){
				var a = (parseFloat(all_price)+0.1).toFixed(2);
			}else{
				var a = parseFloat(all_price).toFixed(2);
			}

			//console.log(a);
			$('#allmoey').text(a + ' 元');
			txt += '，订单金额 <b>' + a + '</b> 元';
		}else{
			$('#allmoey').text(all_price + ' 元');
			txt += '，订单金额 <b>' + all_price + '</b> 元';
		}
		$('#moneytip').html(txt).show();
	}

	if(bargain){
		if(ck){
			var a = (parseFloat(all_price)-parseFloat(bargain)+0.1).toFixed(2);
			$('#allmoey').text(a + ' 元');
			txt += '，优惠 <b>' + bargain + '</b> 元，应付 <b>' + a + '</b> 元';
		}else{
			$('#allmoey').text((all_price-bargain).toFixed(2) + ' 元');
			txt += '，优惠 <b>' + bargain + '</b> 元，应付 <b>' + (all_price-bargain).toFixed(2) + '</b> 元';
		};
		$('#moneytip').html(txt);
	}
}

/*检测优惠券是否可用*/
var checkCoupon = function(){
	var coupon = $.trim($('[name=coupon]').val());
	var goodid = parseInt($('[name=goodid]').val());
	var quantity = parseInt($('[name=quantity]').val());
	if(coupon!=''){
		if(/^[a-zA-Z0-9]+$/.test(coupon)){
			$.post(
				'/links/buycom/check_coupon',
				{'uid': uid, 'goodid': goodid, 'coupon': coupon, 'quantity': quantity, t:new Date().getTime()},
				function(result){
					if(result.status == '1'){
						$('#bargain').val(result.data);
						goodschk();
					}else{
						$('#bargain').val('0');
						$('[name=coupon]').val('');
						ad_alert(result.info);
					}
				}
			);
			return;
		}else{
			$('#bargain').val('0');
			$('[name=coupon]').val('');
			ad_alert('优惠券填写错误');
		}
	}
	goodschk();
}

/*点卡规则和面额*/
var get_pay_card_info = function(pid){
	if(pid!=0 && !isNaN(pid)){
		var option='<option value="">请选择充值卡面额</option>';
		$.post(
			'/links/buycom/get_pay_card_info',
			{'pid': pid, t:new Date().getTime()},
			function(result){
				if(result.status == '1'){
					$('.cardvalue').each(function(){
						$(this).html(option + result.data.payprice);
					});
					if(result.data.paylength && result['data']['paylength'].indexOf('|')>0){
						$('#cardNoLength').val(result['data']['paylength'].split('|')[0]);
						$('#cardPwdLength').val(result['data']['paylength'].split('|')[1]);
					}
				}
			}
		);
	}
}

$('#buyform').submit(function() {
	if($('[name=isagree]').is(':checked')==false){
		ad_alert('请阅读和同意用户协议,才能继续购买');
		return false;
	}

	var cateid = $('[name=cateid]').val();
	if(cateid==''){
		ad_alert('请选择商品分类');
		return false;
	}

	var goodid = $('[name=goodid]').val();
	if(goodid==''){
		ad_alert('请选择要购买的商品');
		return false;
	}

	var quantity = parseInt($.trim($('[name=quantity]').val()));
	if(isNaN(quantity) || quantity<=0 || quantity==''){
		ad_alert('请填写正确的购买数量');
		return false;
	}

	var low_limit = parseInt($('#low_limit').val());
	if(isNaN(low_limit) || low_limit<=0) {low_limit=1;}
	if(quantity<low_limit) {
		ad_alert('本商品限制了最少购买数量,购买数量不能少于 <b style="color:red;">' + low_limit + '</b> 张');
		return false;
	}

	var kucun = parseInt($('#kucun').val());
	if(kucun==0){
		ad_alert('商品库存为空，暂无法购买');
		return false;
	}

	if(kucun>0 && quantity>kucun){
		ad_alert('商品库存不足，请修改购买数量');
		return false;
	}

	var contact_limit = $.trim($('#contact_limit').val());
	var contact = $.trim($('[name=contact]').val());
	if(contact==''){
		ad_alert('请填写联系方式');
		return false;
	}
	if(contact_limit=='0'){
		if(!phone_str.test(contact)){
			ad_alert('联系方式必须为手机号码');
			$('[name=contact]').val('');
			return false;
		}
	}else if(contact_limit=='1'){
		if(!/^[a-zA-Z]{1,}[1-9]{1}[0-9]{4,13}$/.test(contact)){
			ad_alert('联系方式为字母+QQ,且必须字母开头');
			$('[name=contact]').val('');
			return false;
		}
	}else if(contact_limit=='2'){
		if(!/^[1-9]{1}[0-9]{4,13}$/.test(contact)){
			ad_alert('联系方式为QQ号码');
			$('[name=contact]').val('');
			return false;
		}
	}else if(contact_limit=='3'){
		if(!email_str.test(contact)){
			ad_alert('联系方式必须为邮箱');
			$('[name=contact]').val('');
			return false;
		}
	}

	if($('[name=is_email]').is(':checked')){
		if($.trim($('[name=email]').val())==''){
			ad_alert('您选择把支付结果发送到邮箱，但没有填写您的邮箱');
			return false;
		}
		if(!email_str.test($.trim($('[name=email]').val()))){
			$('[name=email]').val('');
			ad_alert('邮箱格式错误');
			return false;
		}
	}

	if($('[name=is_coupon]').is(':checked')){
		if($.trim($('[name=coupon]').val())==''){
			ad_alert('您选择了使用优惠券，但您没有填写优惠券');
			return false;
		}
	}

	var select_pid = false;
	$('[name=pid]').each(function(){
		if($(this).is(':checked')){
			select_pid = true;
		}
	});
	if(select_pid==false){
		ad_alert('请选择付款方式');
		return false;
	}

	var paytype = $('#paytype').val();
	var cte = '';
	if(paytype == 'card'){
		var cardNoLength = $('#cardNoLength').val();
		var cardPwdLength = $('#cardPwdLength').val();

		var i=1;
		$('.cardvalue').each(function(){
			if($(this).val()==''){
				cte += '请选择第' + i +'张充值卡的面值<br/>';
			}
			i++;
		})

		if(cte == ''){
			var i=1;
			$('.cardnum').each(function(){
				if($(this).val()==''){
					cte += '请填写第' + i +'张充值卡的充值卡卡号<br/>';
				} else {
					var cardno = $(this).val();
					if(cardNoLength!='0' && cardPwdLength!='0' && cardNoLength!=cardno.length){
						cte += '第' + i +'张充值卡的卡号长度应该是' + cardNoLength +'位<br/>';
					}
				}
				i++;
			})
		}

		if(cte==''){
			var i=1;
			$('.cardpwd').each(function(){
				if($(this).val()==''){
					cte += '请填写第' + i +'张充值卡的充值卡密码<br/>';
				} else {
					var cardpwd = $(this).val();
					if(cardNoLength!='0' && cardPwdLength!='0' && cardPwdLength!=cardpwd.length){
						cte += '第' + i +'张充值卡的密码长度应该是' + cardPwdLength +'位<br/>';
					}
				}
				i++;
			})
		}
	}

	if(cte!=''){
		ad_alert(cte);
		return false;
	}


	if(nyro=='1'){
		$('.nyroModal').nyroModal({
			closeOnEscape: false,
			showCloseButton: false,
			closeOnClick:false,
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