<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo $title ?></title>
<link href="/lin/crown/css/style.css" rel="stylesheet" type="text/css" />
<link href="/lin/crown/css/nyro.css" rel="stylesheet" type="text/css" />

<script src="../includes/libs/jquery.min.js" type="text/javascript"></script>
<script src="green/js/nyro.js" type="text/javascript"></script>
<script>
(function(){
    var bp = document.createElement('script');
    bp.src = '//push.zhanzhang.baidu.com/push.js';
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
</head>

<body>
<div id="container">
<div id=header><div class=logo><a href="../"><img src="/images/logo.gif"></A></div>


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
				<input type="text" name="kw" class="input" style="width:150px" onclick="this.value=''" value="输入关键字查询交易记录" />
				<input type="submit" class="submit" value="支付结果查询" />
				</form>
			</div>
		</div>
		<form name="p" method="post" class="nyroModal" action="req.php" target="_blank">
		<input type="hidden" name="userid" value="<?php echo $userid ?>" />
		<input type="hidden" name="token" value="<?php echo $token ?>" />        <input type="hidden" name="cardNoLength" value="0" />
		<input type="hidden" name="cardPwdLength" value="0" />
		<input type="hidden" name="api_username" value="<?php echo _G('username') ?>" />
			<table id="buy_info">
		    <tr>
			    <td width="500">所属商户：<span><?php echo $sitename ?></span></td>
				<td width="400">商户网站：<span><a href="<?php echo $siteurl ?>" target="_blank"><span><?php echo $siteurl ?></span></td>
			</tr>
		    <tr>
			    <td>在线客服：<span><?php echo $qq ?> <a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq ?>&Site=<?php echo $sitename ?>&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo $qq ?>:41" alt="点击这里给我发消息" align="absmiddle"></a></span></td>
				<td style="text-align:right"><div align="left">商户信誉：<img src="/lin/gray/images/s_cap_5.gif" align="absmiddle" title="皇冠店铺值得信赖商家" /></div></td>
			</tr>
			<tr>
			    <td colspan="2">发货类型：<span><img src="default/images/ico_1.gif" align="absmiddle" title="自动发货" />&nbsp&nbsp;<strong class="red">自动发货</strong> (订单支付成功后，即可在网页上获得卡密，也可通过“订单查询”来获取卡密信息)</span></td>
			</tr>
			<tr>
			    <td colspan="2"><input type="checkbox" name="isagree" value="true" checked /> <span class="green"><a href="javascript:void(0)" id="isagree">同意并认真阅读用户合作协议(免责声明，点击阅读)>></a></span></td>
			</tr>
		</table>

		<div class="step"><div style="float: right; padding-right: 46px;"> 可用手机扫描二维码购买</div><img src="green/images/step_1.gif" align="absmiddle" />&nbsp;&nbsp;第一步：选择商品</div>
		<ul id="step_one" style="position: relative; padding-bottom: 100px;">
			<li><?php $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];?><img src="/usr/ewm.php?url=<?php echo urlencode($url);?>" style="width:250px ; height: 250px; position: absolute; right: 0; top: 0;"></li>
		<?php if(!$goodid): ?>
		    <li><span class="red">*</span> 商品分类：<?php if($cateid): ?><?php echo $catename ?>
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
			</li>
		<?php endif; ?>
			<li><span class="red">*</span> 商品名称：<span id="loading" style="display:none"><img src="green/images/load.gif" /> 加载中...</span><?php if($goodid): ?><?php echo $goodname ?>
			    <script>$(function(){selectgoodid();})</script>
			    <input type="hidden" name="goodid" id="goodid" value="<?php echo $goodid ?>" />			    
			<?php else: ?><select name="goodid" id="goodid" onchange="selectgoodid()">
				    <option value="">请选择商品</option>
				</select>
			<?php endif; ?>
			<input type="hidden" name="is_discount" id="is_discount" value="0" />
			<input type="hidden" name="coupon_ctype" value="0" />
			<input type="hidden" name="coupon_value" value="0" />
			</li>
			<li><span class="red">*</span> 单&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价：<strong class="red" id="price">0.00</strong> 元<input type="hidden" name="paymoney" value="" /><input type="hidden" name="danjia" value="" /><span style="cursor: pointer; color: #900; font-size:14px;padding-left:15px;" id="showWholesaleRule">查看批发价格</span>
<div id="WholesaleRuleText" style="display:none;clear: both; border: 1px solid rgb(213, 213, 213); font-size: 12px; background-color: rgb(247, 254, 239); color: rgb(0, 0, 255); padding: 10px; margin: 5px; width: 200px;">
</div></li>
			<li><span class="red">*</span> 购买数量：<input type="text" class="input" onkeyup="changequantity()" name="quantity" value="<?php echo _G('num') ? _G('num') : ($limit_quantity ? $limit_quantity : 1) ?>" style="width:100px;"<?php echo $limit_quantity ? ' disabled="disabled" readonly="readonly" title="'.$limit_quantity_tip.'"' : '' ?> /> <span class="green" id="goodInvent"></span> <span id="limit_quantity_tip" class="gray" style="<?php echo $limit_quantity ? '' : 'display:none' ?>">(<?php echo $limit_quantity_tip ?>)</span></li>
			<li><span class="red">*</span> 联系方式：<input type="text" class="input" name="contact" style="width:120px" /> <span class="gray"><span style="text-decoration:underline;color:#993399">订单查询的重要凭证</span> </span></li>

			<li style="height:22px;line-height:22px;<?php echo $is_pwdforsearch==1 ? '' : 'display:none' ?>" id="pwdforsearch1"><span class="red">*</span> 取卡密码：<input type="text" class="input" name="pwdforsearch1" style="width:120px" /> <span style="text-decoration:underline;color:red">(长度为6-20个数字、字母或组合)</span></li>

			<li style="height:22px;line-height:22px;<?php echo $is_pwdforsearch==2 ? '' : 'display:none' ?>" id="pwdforsearch2"><input type="checkbox" name="is_pwdforsearch" value="1" id="is_pwdforsearch" /> <label for="is_pwdforsearch" style="color:red;text-decoration:underline">是否使用取卡密码(如果不使用，请不要勾选！)</label> <span id="pwdforsearchinput" style="display:none"> 请输入取卡密码：<input type="text" name="pwdforsearch2" class="input" style="width:120px;padding:0 3px;" /></span></li>

			<li style="height:22px;line-height:22px;"><input type="checkbox" name="isemail" value="1" id="isemail" /> <label for="isemail">交易成功后同时也将支付结果发送到我的邮箱!</label> <span id="email" style="display:none">Email：<input type="text" class="input" style="padding:0 3px;" name="email" /></span></li>

			<li style="height:22px;line-height:22px;<?php echo $is_coupon ? '' : 'display:none' ?>" id="goodCoupon"><input type="checkbox" name="is_coupon" value="1" id="is_coupon" /> <label for="is_coupon" style="color:red;text-decoration:underline">是否使用优惠券(如果没有，请不要勾选！)</label> <span id="couponcode" style="display:none"> 请输入优惠券：<input type="text" name="couponcode" class="input" style="padding:0 3px;"  onkeyup="checkCoupon()" /></span> <span id="checkcoupon" style="display:none"><img src="default/images/load.gif" /> 正在查询...</span></li>
		</ul>
<div id="payinfo">
		<div class="pinfo2" style="display: block;">商品详情:<br> 
			<div class="goodinfo">
			    
			</div>
		</div>				
		<div style="clear:left"></div>
		</div>
		
		<div id="payinfo">
		<div class="pinfo1" style="display:none">请选择最佳支付方式进行支付购买</div>
		<div class="pinfo2">应付金额<span class="red tprice">0.00</span>元<span class="bt">(人民币)</span></div>
		<div class="pinfo3" style="float:right;display:none">
		<span class="red payname" ></span> 的折价率为：<span class="red rate">100</span><span class="red">%</span></div>
		<div style="clear:left"></div>
		</div>

		<div class="step"><img src="default/images/step_2.gif" align="absmiddle" />&nbsp;&nbsp;第二步：选择支付途径</div>
		<div id="step_two">
		    <ul id="select_pay">
			    <?php if($is_bank_display): ?>
			    <li<?php echo $is_paytype==1 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="bank" id="bank" <?php echo $is_paytype==1 ? 'checked' : '' ?> /> <label for="bank"><img src="default/images/bank.gif" align="absmiddle" /> 网银支付</label>
				</li>
				<?php endif; ?>

				<?php if($is_card_display): ?>
				<li<?php echo $is_paytype==2 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="card" id="card" <?php echo $is_paytype==2 ? 'checked' : '' ?> /> <label for="card"><img src="default/images/card.gif" align="absmiddle" /> 充值卡付款</label>
				</li>
				<?php endif; ?>
<!--
			    <?php if($is_alipay_display): ?>
			    <li<?php echo $is_paytype==3 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="alipay" id="alipay" <?php echo $is_paytype==3 ? 'checked' : '' ?> /> <label for="alipay"><img src="default/images/bank.gif" align="absmiddle" /> 支付宝付款</label>
				</li>
				<?php endif; ?>

			    <?php if($is_tenpay_display): ?>
			    <li<?php echo $is_paytype==4 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="tenpay" id="tenpay" <?php echo $is_paytype==4 ? 'checked' : '' ?> /> <label for="tenpay"><img src="default/images/bank.gif" align="absmiddle" /> 财付通付款</label>
				</li>
				<?php endif; ?>
				
				<?php if($is_weixin_display): ?>
			    <li<?php echo $is_paytype==5 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="tenpay" id="WEIXIN" <?php echo $is_paytype==5 ? 'checked' : '' ?> /> <label for="WEIXIN"><img src="default/images/bank.gif" align="absmiddle" /> 微信付款</label>
				</li>
				<?php endif; ?>
				
				<?php if($is_qqcode_display): ?>
			    <li<?php echo $is_paytype==6 ? ' class="selected"' : '' ?>>
				<input type="radio" style="display:none" name="paytype" value="tenpay" id="QQCODE" <?php echo $is_paytype==6 ? 'checked' : '' ?> /> <label for="QQCODE"><img src="default/images/bank.gif" align="absmiddle" />  Q Q 钱 包</label>-->
				</li>
				<?php endif; ?>
			</ul>

			<div class="paylist">
			    <?php if($is_bank_display): ?>
			    <div id="banks" style="<?php echo $is_paytype==1 ? 'display:block' : 'display:none' ?>">
			    <ul>
				   <!-- <li><input name="pid" type="radio" value="ICBC-NET" /> <img src="default/images/ICBC-NET.gif" alt="中国工商银行" align="absmiddle" /></li>
				    <li><input name="pid" type="radio" value="BOCO-NET" /> <img src="default/images/BOCO-NET.gif" alt="中国交通银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="CEB-NET" /> <img src="default/images/CEB-NET.gif" alt="中国光大银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="CMBC-NET" /> <img src="default/images/CMBC-NET.gif" alt="中国民生银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="ABC-NET" /> <img src="default/images/ABC-NET.gif" alt="中国农业银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="SPDB-NET" /> <img src="default/images/SPDB-NET.gif" alt="中国上海浦东发展银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="CIB-NET" /> <img src="default/images/CIB-NET.gif" alt="中国兴业银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="ECITIC-NET" /> <img src="default/images/ECITIC-NET.gif" alt="中国中信银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="CCB-NET" /> <img src="default/images/CCB-NET.gif" alt="中国建设银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="CBHB-NET" /> <img src="default/images/CBHB-NET.gif" alt="中国渤海银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="PAB-NET" /> <img src="default/images/PAB-NET.gif" alt="中国平安银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="HXB-NET" /> <img src="default/images/HXB-NET.gif" alt="中国华夏银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="CMBCHINA-NET" /> <img src="default/images/CMBCHINA-NET.gif" alt="中国招商银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="SDE-NET" /> <img src="default/images/SDE-NET.gif" alt="中国顺德农信社" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="GZCB-NET" /> <img src="default/images/GZCB-NET.gif" alt="中国广州市商业银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="GNXS-NET" /> <img src="default/images/GNXS-NET.gif" alt="中国广州市农信社" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="BOC-NET" /> <img src="default/images/BOC-NET.gif" alt="中国人民银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="GDB-NET" /> <img src="default/images/GDB-NET.gif" alt="中国广东发展银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="SDB-NET" /> <img src="default/images/SDB-NET.gif" alt="中国深圳发展银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="BJRCB-NET" /> <img src="default/images/BJRCB-NET.gif" alt="中国北京农村商业银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="POST-NET" /> <img src="default/images/POST-NET.gif" alt="中国邮政储蓄所" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="NBCB-NET" /> <img src="default/images/NBCB-NET.gif" alt="中国宁波银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="HKBEA-NET" /> <img src="default/images/HKBEA-NET.gif" alt="中国东亚银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="BCCB-NET" /> <img src="default/images/BCCB-NET.gif" alt="中国北京银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="NJCB-NET" /> <img src="default/images/NJCB-NET.gif" alt="中国南京银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="SHRCB-NET" /> <img src="default/images/SHRCB-NET.gif" alt="中国上海农村商业银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="SHB-NET" /> <img src="default/images/SHB-NET.gif" alt="上海银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="CZ-NET" /> <img src="default/images/CZ-NET.gif" alt="浙商银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="SCCB-NET" /> <img src="default/images/SCCB-NET.gif" alt="河北银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="HZBANK-NET" /> <img src="default/images/HZBANK-NET.gif" alt="杭州银行" align="absmiddle" /></li>
					<li><input name="pid" type="radio" value="NCBBANK-NET" /> <img src="default/images/NCBBANK-NET.gif" alt="南洋商业银行" align="absmiddle" /></li>-->
					
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

				<div id="alipays" style="<?php echo $is_paytype==3 ? 'display:block' : 'display:none' ?>">
					<ul>
					<li><input name="pid" type="radio" value="ALIPAY" /> <img src="default/images/ALIPAY.gif" alt="支付宝支付" align="absmiddle" /></li>
					</ul>
					<div style="clear:left"></div>
				</div>

				<div id="tenpays" style="<?php echo $is_paytype==4 ? 'display:block' : 'display:none' ?>">
					<ul>
					<li><input name="pid" type="radio" value="TENPAY" /> <img src="default/images/TENPAY.gif" alt="财付通支付" align="absmiddle" /></li>
					
					</ul>
					<div style="clear:left"></div>
				</div>
				
				<div id="WEIXINs" style="<?php echo $is_paytype==5 ? 'display:block' : 'display:none' ?>">
					<ul>
					
					<li><input name="pid" type="radio" value="WEIXIN" /> <img src="default/images/WEIXIN.gif" alt="微信支付" align="absmiddle" /></li>
					
					</ul>
					<div style="clear:left"></div>
				</div>

				    <div id="QQCODEs" style="<?php echo $is_paytype==5 ? 'display:block' : 'display:none' ?>">
					<ul>
					
					<li><input name="pid" type="radio" value="QQCODE" /> <img src="/lin/default/images/QQCODE.gif" alt="QQ钱包" align="absmiddle" /></li>
					
					</ul>
					<div style="clear:left"></div>
				</div>
			    <?php if($is_card_display): ?>
				<div id="cards" style="<?php echo $is_paytype==2 ? 'display:block' : 'display:none' ?>">
				<ul>
				<?php
				if($channels):
				foreach($channels as $key=>$val):
				/*if($val['channelid']==24 || $val['channelid']==25 || $val['channelid']==26 || $val['channelid']==27 || $val['channelid']==28 ||$val['channelid']==29 || $val['channelid']==30){
					    continue;
					}*/
				?>
			        <li><input type="radio" name="pid" value="<?php echo $val['channelid'] ?>" /> <img src="default/images/<?php echo $val['imgurl'] ?>" align="absmiddle" alt="<?php echo $val['channelname'] ?>" /> <?php echo $val['channelname'] ?></li>
				<?php
				endforeach;
				endif;
				?>             	
			    </ul><p style="clear:left">
                <div class="card_tips"><strong>提示：</strong>请根据你的实际情况选择最佳的方式进行购买支付,卡类换购有一定比率,如：购买10元的商品,可能需要15元面值的卡!</div></p>
				</div>
				<?php endif; ?>				
			</div>
		</div>

		<?php if($is_card_display): ?>
		<div id="step_three" style="<?php echo $is_paytype==2 ? 'display:block' : 'display:none' ?>">
			<div class="step" style="margin-top:10px"><img src="default/images/step_3.gif" align="absmiddle" />&nbsp;&nbsp;第三步:填写支付卡信息（账号,密码,面值）</div>

			<div id="cardlist">
				<p style="padding-left:10px;"><span class="red">*</span> 充卡数量：<select onchange="select_card_quantity()" name="cardquantity">
					<option value="1">1张卡</option>
					<option value="2">2张卡</option>
					<option value="3">3张卡</option>
					<option value="4">4张卡</option>
					<option value="5">5张卡</option>
					<option value="6">6张卡</option>
					<option value="7">7张卡</option>
					<option value="8">8张卡</option>
					<option value="9">9张卡</option>
					<option value="10">10张卡</option>
				</select></p>

				<div class="card_list">
				<ul>
					<li><span class="red">*</span> 点卡面值：<select name="cardvalue[]" class="cardvalue"><option value="">请选择充值卡面额</option></select></li>
					<li><span class="red">*</span> 充值卡号：<input type="text" class="input cardnum" size="30" name="cardnum[]" /></li>
					<li><span class="red">*</span> 充值卡密：<input type="text" class="input cardpwd" size="30" name="cardpwd[]" /></li>
				</ul>
				</div>
				<div class="card_list_add"></div>
			</div>

			<ul id="carddesc">
			    <li><span class="red">*</span> 此卡的换购价值率为<strong class="red rate">100</strong><strong class="red">%</strong>购买当前<strong class="red gprice">0.00</strong>元的商品要<strong class="red tprice">0</strong>元面额的卡。</li>
			    <li><span class="red">*</span> <span style="background:#0066cc;color:#fff">请保证您选的金额和卡内实际金额相符，否则会支付失败或卡作废。</span></li>
			    <li><span class="red">*</span> 为确保支付顺利完成，支付前建议您先查看<strong class="green"><a href="<?php echo $card_value_url ?>" target="_blank">各卡种支付的面额及格式</a></strong>。</li>
			</ul>
		</div>
		<?php endif; ?>
		<p style="clear:left">
		<div id="protect">
<!--<p><strong>免责声明</strong>（向陌生人付款，请注意交易风险，否则造成的经济损失自负！）</p>-->
				<p>投诉处理QQ: <strong style="color:#800080;text-decoration:underline"><a target="blank" style="color:green" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $config['qq'] ?>&amp;site=<?php echo $config['sitename'] ?>&amp;menu=yes"><?php echo $config_qq ?></a></strong>   服务热线:<strong><?php echo $config_tel ?></strong>假卡/诈骗/钓鱼等请务必购买当天22点之前投诉，逾期不支持退款</p>
				<h3>
				<span class="STYLE2"><span class="STYLE3"><span class="STYLE1">如果您购买以后不会使用售后相关问题，请联系卖家客服QQ:<?php echo $qq ?></span> <a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq ?>&Site=<?php echo $sitename ?>&Menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo $qq ?>:41" alt="点击这里给我发消息" align="absmiddle"></a></span>		</div>
			</p>

		<div id="submit"><input type="image" id="submit" src="/lin/gray/images/button.jpg" /></div>

		</form>
	</div>

	<div id="footer"><?php echo $config_copyright ?>
	  <p>&nbsp;</p>
	</div>
</div>

<div id="cardwhy" style="display: none;">
  <p style="text-align:center; color:red; font-size:14px;"><br>为什么使用充值卡购买会比商品原价格高呢?<br></p>
  <p align="left"><br>1.各类充值卡虽然都是使用人民币购买的,但却不能等价于人民币.<br>
	<BR>2.由于各种充值卡都有一定的底线购买价格,即通常我们说的批发价.<br>
	<BR>3.由于各种充值卡的底线价格与商品的实际价格存在直接的差异,所以导致了充值卡购买往往会比商品价格高出.
　</p>
  <p style="text-align:center; color:#333; margin-top:10px;"><input type="button" class="nyroModalClose" value="我知道了!" /></p>
</div>

<script>
var whytext=$('#cardwhy').html();
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

	$.extend($.fn.nyroModal.settings,{ modal: true, minHeight: 490, minWidth: 550});
	$('#report').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 520, height: 420 });
	<?php if($is_user_popup): ?>
	var user_popup_message='<?php echo $user_popup_message ?>';
    $.nyroModalManual({minHeight:<?php echo $nyroHeight ?>,Width:680,content: user_popup_message});
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
	
	//购买限制
	var pwdforbuy=function(){
		var user_popup_message='<div style="padding:10px;color:#cc3333;line-height:24px"><p style="float:left;font-size:14px;font-weight:bold;color:blue;">访问密码：</p><p style="clear:both;font-size:12px;font-weight:bold;color:red;"><input type="password" name="pwdforbuy" class="input" maxlength="20"> <input type="submit"  id="verify_pwdforbuy" value="验证密码"> <span id="verify_pwdforbuy_msg" style="display:none"><img src="default/images/load.gif"> 正在验证...</span></p><ul><li>1.本商品购买设置了安全密码</li><li>2.只有成功验证密码后才能继续购买</li></ul><p></p></div>';
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
	    if(channelid!='ALIPAY' && channelid!='TENPAY'){
		    channelid='bank';
		}
	}

	if(goodid==''){goodid=0;}
	if(cateid==''){cateid=0;}
	$.post('ajax.php',{action:'getrate',userid:uid,cateid:cateid,goodid:goodid,channelid:channelid},function(data){		
	    $('.rate').html(data);goodschk();
	});	
	/*xin*/
	$.post('ajax.php',{action:'getgoodRemark',goodid:goodid},function(data){		
	    $(".goodinfo").html(data.remark);
	});	
}

var goodschk=function(){
    var dprice=parseFloat($('#price').text());	
	var quantity=parseInt($.trim($('[name=quantity]').val()));
	var rate=parseFloat($('.rate').first().text());
	var tprice=parseFloat(dprice*quantity/rate*100);
	var gprice=parseFloat(dprice*quantity);
    
	var coupon_ctype=$('[name=coupon_ctype]').val();
	var coupon_value=$('[name=coupon_value]').val();

	if(coupon_ctype==1){
	    tprice=(tprice-coupon_value);
	} else if(coupon_ctype==100){
	    tprice=parseFloat(tprice-(tprice*coupon_value/100));
	}

	tprice=$('#card').attr('checked') ? Math.ceil(tprice.toFixed(2)) : tprice.toFixed(1);
	gprice=$('#card').attr('checked') ? Math.ceil(gprice.toFixed(2)) : gprice.toFixed(1);

	$('.tprice').html(tprice);
	$('.gprice').html(gprice);
	$('[name=paymoney]').val(tprice);
}

$('#submit').click(function(){
	if($('[name=isagree]').is(':checked')==false){
	    alert('请阅读和同意用户协议，才能继续购买！');
		$('[name=isagree]').focus();
		return false;
	}
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
<div style="display:none">
<?php if($statistics) echo $statistics ?>
<?php if($config['tongji']) echo $config['tongji'] ?>
</div>
</body>
</html>