
		<script src="/tpl/new/Skin/Public/Validator/formValidator-4.1.3.js" type="text/javascript"></script>
		<script src="/tpl/new/Skin/Public/Validator/formValidatorRegex.js" type="text/javascript"></script>
		<script src="/tpl/new/Skin/Home/red/js/reg.js" type="text/javascript"></script>
		<link href="/tpl/new/Skin/Home/red/css/reg.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="/tpl/new/Skin/Home/Red/css/page.css" />
		<div class="content">
			<div class="page_gonggao">
				<div class="page_header">
					<h1>
						免费注册
					</h1>
					<div class="recent">
						<span>当前位置：
							<a href="/">
								首页
							</a> > 免费注册</span>
					</div>
				</div>
				<div class="page_content">
					<div class="left_nav">
						<ul>
							<li><a href="/login.htm">登录平台</a></li>
							<li class="nav_current"><a href="/sendcode.htm">免费注册</a></li>
							<li><a href="/retpwd.htm">找回密码</a></li>
							<li><a href="/orderquery.htm">交易查询</a></li>
							</ul>
				  </div>
					<div class="center_text">
						<h2>
							免费注册
						</h2>
						<div class="form">
							<div class="login_2">
								<script src="/tpl/new/Skin/Home/yellow/js/city.js" type="text/javascript">
								</script>
								<div class="rep_cbot">
									<form action="regsave.htm" autocomplete="off" id="form1" method="post">
										<input type="hidden" name="reginfo[ctype]" value="1" />
										</label><input type="radio" name="reginfo[istg]" id="" value="0" checked="checked" />商户</a>
    	                                <input type="radio" name="reginfo[istg]" id="" value="1" />推广会员</label>
										<p>
											<label>
												用户名：<span>*</span>
											</label>
											<input class="input_login wbk" id="username" maxlength="30" name="reginfo[username]" type="text" value="" />
										</p>
										<p>
											<label>
												登录邮箱：<span>*</span>
											</label>
											<input class="input_login wbk" id="userEmail" maxlength="30" name="reginfo[email]" type="text" value="" />
										</p>
										<p>
											<label>
												密&nbsp;&nbsp;&nbsp;码：<span>*</span>
											</label>
											<input class="psw_check input_login wbk" id="userPass" maxlength="30" name="reginfo[password]" type="password" />
										</p>
										<p>
											<label>
												确认密码：<span>*</span>
											</label>
											<input class="input_login wbk" id="ConfirmPassword" maxlength="30" name="reginfo[confirmpassword]" type="password" />
										</p>
										<p>
											<label>
												腾讯QQ：<span>*</span>
											</label>
											<input class="input_login wbk" id="qq" maxlength="11" name="reginfo[qq]" type="text" value="" />
										</p>
										<p>
											<label>
												手&nbsp;&nbsp;&nbsp;&nbsp;机：<span>*</span>
											</label>
											<input class="input_login wbk" id="mobile" maxlength="11" name="reginfo[phone]" type="text" value="" />
										</p>
										<p>
											<label>
												身份证号：<span>*</span>
											</label>
											<input class="input_login wbk" id="idCard" maxlength="18" name="reginfo[idcard]" type="text" value="" />
											<span class="red">&nbsp;&nbsp;&nbsp;--账号所有者唯一凭证</span>
										</p>
										<p>
											<label>收款方式：<span>*</span></label>
											<select class="input_login wbk" data-val="true" data-val-number="字段 BankInfoId 必须是一个数字。" data-val-required="The BankInfoId field is required." id="BankInfoId" name="reginfo[ptype]">
												<option value="1" selected>银行账户</option>
												<option value="2">支付宝</option>
												<option value="3">财付通</option>
											</select>
										</p>
										<p class="bank">
											<label>开户银行：<span>*</span></label>
											<select class="input_login wbk" name="reginfo[bank]" id="bank">
												<option value="中国工商银行">中国工商银行</option>
												<option value="上海浦东发展银行">上海浦东发展银行</option>
												<option value="中国农业银行">中国农业银行</option>
												<option value="招商银行">招商银行</option>
												<option value="中国建设银行">中国建设银行</option>
												<option value="兴业银行">兴业银行</option>
												<option value="广东发展银行">广东发展银行</option>
												<option value="深圳发展银行">深圳发展银行</option>
												<option value="中国民生银行">中国民生银行</option>
												<option value="交通银行">交通银行</option>
												<option value="中信银行">中信银行</option>
												<option value="中国光大银行">中国光大银行</option>
												<option value="中国银行">中国银行</option>
												<option value="支付宝">支付宝</option>
												<option value="中国邮政储蓄">中国邮政储蓄</option>
											</select>
										</p>
										<p>
											<label class="register1_span2">姓名：<span>*</span></label>
											<input class="input_login wbk" id="userName" maxlength="5" name="reginfo[realname]" type="text" value="" />
											<span class="red">&nbsp;&nbsp;&nbsp;------姓名乱写，无法结算</span>
										</p>
										<p class="bank">
											<label class="register1_span2" >银行卡号：<span>*</span></label>
											<input class="input_login wbk" id="bankNo" maxlength="50" name="reginfo[card]" type="text" value="" />
											<span class="red">&nbsp;&nbsp;&nbsp;--银行卡号请认真核对清楚</span>
										</p>
										<p class="alipay" style="display: none;">
											<label class="register1_span2" >支付宝账号：<span>*</span></label>
											<input class="input_login wbk" id="bankNo" maxlength="50" name="reginfo[alipay]" type="text" value="" />
											<span class="red">&nbsp;&nbsp;&nbsp;--支付宝账号请认真核对清楚</span>
										</p>
										<p class="tenpay" style="display: none;">
											<label class="register1_span2">财付通账号：<span>*</span></label>
											<input class="input_login wbk" id="bankNo" maxlength="50" name="reginfo[tenpay]" type="text" value="" />
											<span class="red">&nbsp;&nbsp;&nbsp;--财付通账号请认真核对清楚</span>
										</p>
										<p  class="bank">
											<label class="register1_span2">
												开户行地区：<span>*</span>
											</label>
											<input class="input_login wbk" id="bankAddress" maxlength="50" name="reginfo[addr]" type="text" value="" />
											<span class="green">&nbsp;&nbsp;&nbsp;------例如：湖北省荆州市</span>
										</p>
										<p class="rep_mt" style="_float: left; _display: block">
											<span class="rep_tytxt">
												同意《
												<a href="/xieyi.doc" target="_blank">
													用户协议
												</a>》(甲方在本网站注册成功视为无条件接受本协议所有条款)
											</span>
										</p>
										<label>特别注意：<span>*</span></label><span class="red" style=font-size:16px;>&nbsp;&nbsp;&nbsp;任何钓鱼,云盘,自己充值洗钱，全部冻结不结算</span>
										<p class="rep_pad" style="_float: left; _padding-left: 0 !important;">
											<input id="Submit1"
											type="submit" value="同意协议注册账号" class="rep_button" />
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="safely">
			</div>
		</div>
