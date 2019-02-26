<?php if(!defined('WY_ROOT')) exit; ?>
<!--/header end-->
<link href="/includes/libs/boxy.0.1.4/stylesheets/boxy-blk.css" rel="stylesheet" type="text/css" />
<script src="/includes/libs/boxy.0.1.4/javascripts/jquery.boxy1.js" type="text/javascript"></script>
  <div class="banner">
	<!-- passport 登录 -->
	<div class="w-980 login-area pr">
		<div class="login-box pa">
			<h2 class="hidden"></h2>
			<ul class="login-tab">
				<li class="tab-item tab-item-left tab-selected">
					<a href="#" onclick="return false;" hidefocus="true">用户登录</a>
				</li>
				<li class="login-nav-separate">
					<span>&nbsp;&nbsp;</span>
				</li>
				<li class="tab-item tab-item-right">
					<a href="#" onclick="return false;" hidefocus="true"></a>
				</li>
			</ul>
			<div id="bp_pass_login_form" class="tang-pass-login">
			<form name="login" method="post" action="userlogin.htm">
			<p class="pass-generalErrorWrapper">
				<span class="pass-generalError pass-generalError-error"></span>
			</p>
			<p class="pass-form-item pass-form-item-password">
				<label class="pass-label">账号</label>
				<input class="pass-text-input pass-text-input-userName pass-username" type="text" name="username" maxlength="20" value="输入登陆账号" onfocus="if (value =='输入登陆账号'){value =''}" onblur="if (value ==''){value='输入登陆账号'}" />
			</p>
			<p class="pass-form-item pass-form-item-password">
				<label class="pass-label">密码</label>
				<input class="pass-text-input pass-text-input-password" type="password" name="password" maxlength="20" />
			</p>
			<p class="pass-form-item pass-form-item-password">
				<label class="pass-label">验证码</label>
			</p>
			<p class="pass-form-item pass-form-item-password">
				<input class="pass-verifyCode" type="text" name="chkcode" maxlength="5" value="输入验证码" onfocus="if (value =='输入验证码'){value =''}" onblur="if (value ==''){value='输入验证码'}" />
				<img class="pass-change-verifyCode" onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="/includes/libs/chkcode.htm" style="border:0px solid #bcbcbc" align="absmiddle" title="点击刷新验证码" />
			</p>	
			<p class="pass-form-item pass-form-item-submit"><input class="pass-button pass-button-submit" value="登录" type="submit"></p>
				</form>
			</div>
			<div class="login-box-bottom">
				<a href="register.htm" class="register">注册账号</a>
				<a href="retpwd.htm" class="f-pass">忘记密码？</a>
			</div>
		</div>
	</div>
	<!-- end of passport 登录 -->

	<ul id="slider" class="pr">
	<li>
		<div class="slider-bg current" style="background-image:url(/tpl/white/common/images/banner-pic-1.jpg);">
		</div>
	</li>
	<li>
		<div class="slider-bg" style="background-image:url(/tpl/white/common/images/banner-pic-2.jpg);">
		</div>
	</li>
	<li>
		<div class="slider-bg" style="background-image: url(/tpl/white/common/images/banner-pic-3.jpg);">
		</div>
	</li>
	<li>
		<div class="slider-bg" style="background-image:url(/tpl/white/common/images/banner-pic-4.jpg);">
		</div>
	</li>
</ul>
<div id="slider-number-box">
		<a class="active" href="###"></a>&nbsp;<a href="###"></a>&nbsp;<a href="###"></a>&nbsp;<a href="####"></a>
</div>
</div>
<div class="wrapper1">
	<div class="w-980">
		<div class="intro clearfix">
			<div class="intro-item wallet fl first">
				<h2>
					<span class="hidden">帮助中心</span>
					<a href="javascript:;"></a>
				</h2>
				<ul class="clearfix">
					<li><a href="useful.htm">商家如何接入</a> |&nbsp;</li>
					<li><a href="faq.htm">常见问题</a>&nbsp;</li>
				</ul>
			</div>
			<div class="intro-item life fl">
				<h2>
					<span class="hidden">生活助手</span>
					<a href="javascript:;"></a>
				</h2>
				<ul class="clearfix">
					<li><a href="#bankpay" title="网银支付" class="boxy">网银支付</a> |&nbsp;</li>
					<li><a href="#szxpay" title="充值卡支付" class="boxy">充值卡支付</a> |&nbsp;</li>
					<li><a href="#ydpay" title="充值卡支付" class="boxy" />移动支付</a></li>
				</ul>
			</div>

<div id="bankpay" style="display: none;">
            <div class="float_left displayblock">
                <div class="paytextbox">
				<h1>产品优势：</h1>
                    <h2>1.收款与订单结合，交易笔笔清晰<br />
						2.支持多家银行，满足企业需求<br />
						3.实时收款，加速企业资金回笼<br />
						4.支付无限额，接入便捷<br />
						5.对账清晰，节约企业成本<br />
						6.安全保障 严密可靠<br />
					</h2>
				<h1>产品特点：</h1>
					<h2>您的企业客户可以在下完订单后，直接通过其企业网银付款，款项与订单相结合，笔笔清晰，实时可查<br />
					覆盖范围广泛，可以带来更多的潜在客户和交易量<br />
					补单机制、人工补单系统的双重保障，高支付成功率，实现真正零掉单<br />
					</h2>

                </div>
            </div>
        </div>

<div id="szxpay" style="display: none;">
            <div class="float_left displayblock">
                <div class="paytextbox">
				<h1>产品优势：</h1>
                    <h2>1.商品自由定价，适用全部商品<br />
						2.刺激用户进行再次消费<br />
						3.支持所有全国性充值卡<br />
						4.提供特色商家营销工具<br />
					</h2>
				<h1>产品特点：</h1>
					<h2>商家可以自由对所有的产品定价，不用将商品的价格按照充值卡的面额定价<br />
					客户可以使用全国发行的神州行充值卡、联通充值卡、电信充值卡、骏网一卡通进行支付，支持面额为50、100等多种面额充值卡<br />
					开通此系列支付服务，商家即可免费享用多种促销工具，如“优惠券”、“积分”等，无需再次开发，还可以根据商家自身的特点提供定制的市场营销方案，帮助商家更好的开展市场推广工作<br />
					</h2>

                </div>
            </div>
        </div>

<div id="ydpay" style="display: none;">
            <div class="float_left displayblock">
                <div class="paytextbox">
				<h1>使用方法：</h1>
                    <h2>1．网上支付：您在中国移动支付网站上购物时，可以使用手机支付账户完成您的交易<br />
						2．短信支付：您选定商品后，将"商品编号"发送到商户指定的特定的号码下订单，回复"Y"直接支付，支付成功后会收到手机支付平台发送的确认信息<br />
					</h2>
				<h1>支付种类：</h1>
					<h2>1、按用户支付的额度，可以分为微支付和宏支付。 <br />
						2、按完成支付所依托的技术条件，可以分为近场支付和远程支付。 <br />
						3、按支付账户的性质，可以分为银行卡支付、第三方支付账户支付、通信代收费账户支付。 <br />
						4、按支付的结算模式，可以分为及时支付和担保支付。 <br />
						5、按用户账户的存放模式，可分为在线支付和离线支付。 <br />
					</h2>

                </div>
            </div>
        </div>


			<div class="intro-item baidu fl last">
				<h2>
					<span class="hidden">联系我们</span>
					<a href="javascript:;"></a>
				</h2>
				<ul class="clearfix">
					<li><a href="contact.htm">查看联系方式</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
   $('.boxy').boxy();
})
</script>