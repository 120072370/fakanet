<?php if(!defined('WY_ROOT')) exit; ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo $title ?></title>
<link href="/lin/blue/css/style.css" rel="stylesheet" type="text/css" />
<link href="/lin/blue/css/nyro.css" rel="stylesheet" type="text/css" />
<script src="../includes/libs/jquery.min.js" type="text/javascript"></script>
<script src="blue/js/nyro.js" type="text/javascript"></script>
</head>

<body>
<div id="container">
<div id=header><div class=logo><a href="../"><img src="/images/logo.gif" width="300"></A></div>

	<div id="main">
	    <div id="buy_top">
		    <div id="buy_top_title">您目前订购的商户信息</div>
			<div id="search">
				<form name="search" method="get" action="../orderquery.htm" target="_blank">
				<select name="st">
				<option value="orderid">订单号</option>
				<option value="contact">联系方式</option>
				<option value="cardnum">充值卡号</option>
				</select>
				<input type="text" name="kw" class="input" style="width:150px" onClick="this.value=''" value="输入关键字查询交易记录" />
				<input type="submit" class="submit" value="支付结果查询" />
				</form>
			</div>
		</div>
		<form name="p" method="post" class="nyroModal" action="reqGo.php" target="_blank">
				<input type="hidden" name="cardNoLength" value="0" />
		<input type="hidden" name="cardPwdLength" value="0" />
	    <table id="buy_info">
		    <tr>
	        <td width="500">所属商户：<span style="margin-right:300px"><?php echo $sitename ?></span></td>
			<td>商户网站：<span><?php echo $siteurl ?></span></td>
			</tr>

			<tr>
			<td>在线客服：<span><?php echo $qq ?> <a target="blank" href="tencent://message/?uin=<?php echo $qq ?>&Site=<?php echo $sitename ?>&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo $qq ?>:41" alt="点击这里给我发消息" align="absmiddle"></a></span></td>
			<td></td>
			</tr>
	    </table>

		<div class="step"><img src="default/images/step_1.gif" align="absmiddle" />&nbsp;&nbsp;第一步：选择商品</div>
		<ul id="step_one">
			<li>
			    <span class="red">*</span> 订&nbsp;&nbsp;单&nbsp;号：<span class="red"><?php echo $orderid ?></span>
			    <input type="hidden" name="orderid" value="<?php echo $orderid ?>" />
				<input type="hidden" name="quantity" value="<?php echo $quantity ?>" />
				<input type="hidden" name="userid" value="<?php echo $userid ?>" />
				<input type="hidden" name="dprice" value="<?php echo $price-$realmoney ?>" />
			</li>
			<li><span class="red">*</span> 商品名称：<?php echo $goodname ?>
			    <input type="hidden" name="goodid" id="goodid" value="<?php echo $goodid ?>" />			    
			</li>
			<li>
			    <span class="red">*</span> 补充金额：<strong class="red" id="price"><?php echo $price-$realmoney ?></strong> 元
			    <input type="hidden" name="paymoney" value="<?php echo $price-$realmoney ?>" />
			</li>
		</ul>

		<div id="payinfo">
		<div class="pinfo1" style="display:none">请选择最佳支付方式进行支付购买</div>
		<div class="pinfo2">应付金额<span class="red tprice"><?php echo $price-$realmoney ?></span>元<span class="bt">(人民币)</span></div>
		<div class="pinfo3" style="float:right;display:none">
		<span class="red payname" ></span> 的折价率为：<span class="red rate">100</span><span class="red">%</span></div>
		<div style="clear:left"></div>
		</div>

		<div class="step"><img src="default/images/step_2.gif" align="absmiddle" />&nbsp;&nbsp;第二步：选择支付途径</div>
		<div id="step_two">
		    <ul id="select_pay">
			    <!--<?php if($is_bank_display): ?>
			    <li<?php echo $is_paytype==1 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="bank" id="bank" <?php echo $is_paytype==1 ? 'checked' : '' ?> /> <label for="bank"><img src="default/images/bank.gif" align="absmiddle" /> 网银支付</label>
				</li>
				<?php endif; ?>

				<?php if($is_card_display): ?>
				<li<?php echo $is_paytype==2 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="card" id="card" <?php echo $is_paytype==2 ? 'checked' : '' ?> /> <label for="card"><img src="default/images/card.gif" align="absmiddle" /> 充值卡付款</label>
				</li>
				<?php endif; ?>-->

			    <?php if($is_alipay_display): ?>
          <li class="selected">
				<input type="radio" style="display:none" name="paytype" value="alipay" id="alipay" <?php echo $is_paytype==3 ? 'checked' : '' ?> /> <label for="alipay"> 支付宝付款</label>
				</li>
				<?php endif; ?>
	<?php if($is_weixin_display): ?>
			    <li<?php echo $is_paytype==5 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="tenpay" id="WEIXIN" <?php echo $is_paytype==5 ? 'checked' : '' ?> /> <label for="WEIXIN">微信付款</label>
				</li>
				<?php endif; ?>
          <!--<?php if($is_tenpay_display): ?>
			    <li<?php echo $is_paytype==4 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="tenpay" id="tenpay" <?php echo $is_paytype==4 ? 'checked' : '' ?> /> <label for="tenpay"><img src="default/images/bank.gif" align="absmiddle" /> 财付通付款</label>
				</li>
				<?php endif; ?>
				
			
				
				<?php if($is_qqcode_display): ?>
			    <li<?php echo $is_paytype==6 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="tenpay" id="QQCODE" <?php echo $is_paytype==6 ? 'checked' : '' ?> /> <label for="QQCODE"><img src="default/images/bank.gif" align="absmiddle" />  Q Q 钱 包</label>
       
				</li> -->
				<!--<?php endif; ?>-->
			</ul>

			<div class="paylist">
			    <?php if($is_bank_display): ?>
			    <div id="banks" style="<?php echo $is_paytype==1 ? 'display:block' : 'display:none' ?>">
			    <ul>
				   
					
					<?php if($is_weixin_display): ?>
                                <li>
                                    <a href="javascript:void(0)">
                                        <label for="bank(85)" class="payclass">

                                            <input type="radio" name="pid" value="WEIXIN" myval="40" id="bank(85)" /><img src="/lin/default/images/zhifu/WEIXIN.gif" title="微信扫码" disabled="disabled"/>
											
									
                                        </label>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($is_alipay_display): ?>
                                <li>
                                    <a href="javascript:void(0)">
                                        <label for="alipays">
                                            <input type="radio" name="pid"  value="ALIPAY" myval="2" id="alipays" /><img src="/lin/default/images/zhifu/ALIPAY1.gif" title="支付宝" disabled="disabled"/>
                                        </label>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($is_tenpay_display): ?>   
                               	<li>
                                    <a href="javascript:void(0)">
                                    <label for="tenpays">
                                            <input type="radio" name="pid" value="TENPAY" myval="3" id="tenpays" /><img src="/lin/default/images/zhifu/TENPAY.gif" title="财付通" disabled="disabled"/>
                                        </label>
                                    </a>
                                </li>
                                <?php endif; ?>
								<?php if($is_qqcode_display): ?>
								<li>
                                    <a href="javascript:void(0)">
                                    <label for="bank(45)">
                                            <input type="radio" name="pid" value="QQCODE" myval="4" id="bank(45)" /><img src="/lin/default/images/QQCODE.png" title="QQ钱包" disabled="disabled"/>
                                        </label>
                                    </a>
                                </li>
                               <?php endif; ?>
							   
				</ul>
					<div style="clear:left"></div>
				</div>
				<?php endif; ?>



        <!--<div id="tenpays" style="<?php echo $is_paytype==4 ? 'display:block' : 'display:none' ?>">
					<ul>
					<li><input name="pid" type="radio" value="TENPAY" /> <img src="default/images/TENPAY.gif" alt="财付通支付" align="absmiddle" /></li>
					
					</ul>
					<div style="clear:left"></div>
				</div>-->
        <div id="alipays" style="<?php echo $is_paytype==3 ? 'display:block' : 'display:none' ?>">
          <ul>
            <li>
              <input name="pid" type="radio" value="ALIPAY" />
              <img src="default/images/ALIPAY.gif" alt="支付宝支付" align="absmiddle" />
            </li>
          </ul>
          <div style="clear:left"></div>
        </div>
        
				<div id="WEIXINs" style="<?php echo $is_paytype==5 ? 'display:block' : 'display:none' ?>">
          <ul>
					
					<li><input name="pid" type="radio" value="WEIXIN" /> <img src="default/images/WEIXIN.gif" alt="微信支付" align="absmiddle" /></li>
					
					</ul>
					<div style="clear:left"></div>
				</div>

				    <!--<div id="QQCODEs" style="<?php echo $is_paytype==5 ? 'display:block' : 'display:none' ?>">
					<ul>
					
					<li><input name="pid" type="radio" value="QQCODE" /> <img src="/lin/default/images/QQCODE.gif" alt="QQ钱包" align="absmiddle" /></li>
					
					</ul>
					<div style="clear:left"></div>
				</div>-->
		

		<p style="clear:left">
		<div id="protect">
			<p><strong>免责声明</strong>（向陌生人付款，请注意交易风险，否则造成的经济损失自负！）</p>
			<p>本站仅是提供自动发卡服务，并非销售商，相关售后问题并不负责，由此产生的交易纠纷由双方自行处理，与爱发发卡平台无关！</p>
			<p>如果您在支付过程中遇到虚假商品或取卡问题，请与企业客服QQ代表联系：<strong><a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $config['qq'] ?>&Site=<?php echo $config['sitename'] ?>&Menu=yes" title="点击直接QQ会话"><?php echo $config['qq'] ?></a></strong> 服务热线：<strong><?php echo $config['tel'] ?></strong></p>
        </div>
		</p>

		<div id="submit"><input type="image" id="submit" src="blue/images/button.gif" /></div>

		</form>
	</div>
  
  

	<div id="footer"><?php echo $config_copyright ?></div>
</div>
<!--<div id="cardwhy" style="display: none;">
  <p style="text-align:center; color:red; font-size:14px;"><br>为什么使用充值卡购买会比商品原价格高呢?<br></p>
  <p align="left"><br>1.各类充值卡虽然都是使用人民币购买的,但却不能等价于人民币.<br>
	<BR>2.由于各种充值卡都有一定的底线购买价格,即通常我们说的批发价.<br>
	<BR>3.由于各种充值卡的底线价格与商品的实际价格存在直接的差异,所以导致了充值卡购买往往会比商品价格高出.
　</p>
  <p style="text-align:center; color:#333; margin-top:10px;"><input type="button" class="nyroModalClose" value="我知道了!" /></p>
</div>-->

<script>
var whytext=$('#cardwhy').html();
$(function(){
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
  $("#protect").show();
  $("#submit").show();
  })

  $.extend($.fn.nyroModal.settings,{ modal: true, minHeight: 450, minWidth: 550 });

  $('.paylist li').each(function(){
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
			$('#payinfo .pinfo1').hide();
			$('#payinfo .pinfo2').show();
			if(pname!=''){$('.pinfo3').show();} else {$('.pinfo3').hide();}
			$('#payinfo .payname').html('['+pname+']');
			getrate();
			get_pay_card_info();
			getCardLength();
		});
	})
})

var getrate=function(){
    var uid=<?php echo $userid ?>;
	var goodid=$('[name=goodid]').val();
	var cateid=$('[name=cateid]').val();
	var channelid=0;
	$('[name=pid]').each(function(){
	    if($(this).is(':checked')){ channelid=$(this).val();}
	})
	if(isNaN(channelid)){
	    if(channelid!='ALIPAY' && channelid!='TENPAY'){
		    channelid='bank';
		}
	}
	if(goodid==''){goodid=0;}
	if(cateid==''){cateid=0;}
	$.post('ajax.php',{action:'getrate',userid:uid,cateid:cateid,goodid:goodid,channelid:channelid},function(data){
	    $('.rate').html(data);goodschk();
	});
	
}

var goodschk=function(){
    var dprice=parseFloat($('#price').text());	
	var quantity=parseInt($.trim($('[name=quantity]').val()));
	var rate=parseFloat($('.rate').first().text());
	var tprice=parseFloat(dprice*quantity/rate*100);
	var gprice=parseFloat(dprice*quantity);


	tprice=$('#card').attr('checked') ? Math.ceil(tprice.toFixed(2)) : tprice.toFixed(2);
	gprice=$('#card').attr('checked') ? Math.ceil(gprice.toFixed(2)) : gprice.toFixed(2);

	$('.tprice').html(tprice);
	$('.gprice').html(gprice);
	$('[name=paymoney]').val(tprice);
}

var get_pay_card_info=function(){
	var channelid=0;
    $('.paylist li').each(function(){
	    if($(this).find('input').is(':checked')){
		    channelid=$(this).find('input').val();
		}
	})

	if(channelid!=0 && !isNaN(channelid)){
		var option='<option value="">请选择点卡面值</option>';
	    $.post('ajax.php',{action:'getpaycardinfo',channelid:channelid},function(data){
            $('.cardvalue').html(option+data);
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

$('#submit').click(function(){

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

	var pty='';
	$('#select_pay li').each(function(){
	    if($(this).find('input').attr('checked')){
		    pty=$(this).find('input').val();
		}
	});

		var cte='';
	if(pty=='card'){
		var cardNoLength=$('[name=cardNoLength]').val();
		var cardPwdLength=$('[name=cardPwdLength]').val();

		var i=1;
		$('.cardvalue').each(function(){
			if($(this).val()==''){
				cte=cte+"第"+i+"张卡 请选择充值卡面值!\n";
			}
			i++;
		})

		var i=1;
		$('.cardnum').each(function(){
			if($(this).val()==''){
				cte=cte+"第"+i+"张卡 请填写充值卡号!\n";
			} else {
				var cardno=$(this).val();
			    if(cardNoLength!='0' && cardPwdLength!='0' && cardNoLength!=cardno.length){
				    cte=cte+"第"+i+"张卡 充值卡号长度为"+cardNoLength+"位!\n";
				}
			}
			i++;
		})

		var i=1;
		$('.cardpwd').each(function(){
			if($(this).val()==''){
				cte=cte+"第"+i+"张卡 请填写充值卡密!\n";
			} else {
				var cardpwd=$(this).val();
			    if(cardNoLength!='0' && cardPwdLength!='0' && cardPwdLength!=cardpwd.length){
				    cte=cte+"第"+i+"张卡 充值卡密长度为"+cardPwdLength+"位!\n";
				}
			}
			i++;
		})
	}
	
	if(cte!=''){
	    alert(cte);
		return false;
	}

	return true;
});

function getCardLength(){
	$('.paylist ul li').each(function(){
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

</script>
</body>
</html>