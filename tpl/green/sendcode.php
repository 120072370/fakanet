<?php if (!defined('WY_ROOT')) exit; ?>
<form id="reg" name="reg" action="regsave.htm" method="POST" >
    <div id="dowebok">
	<div class="section section1">
	    <div class="reg_bg">
		<div class="reg_title">
		    商 户 注 册
		</div>

                <input type="hidden" name="reginfo[token]" value="1500867060">
		<div class="reg_con">

		    <script src="/Skin/Home/yellow/js/city.js" type="text/javascript"></script>
		    <div class="rep_cbot">
			<div class="b_l b_m_t area-l">
			    <div class="area-box">

				<div class="clear"></div>
				<div class="area-c" style="height:100%">

				    <script src="tpl/default/js/city.js" type="text/javascript"></script>
				    <script src="tpl/default/js/formValidator_min.js" type="text/javascript"></script>
				    <script src="tpl/default/js/formValidatorRegex.js" type="text/javascript"></script>

				    <div id="register_main">
					<div class="register_main_content">


					    <p>用户名：<input name="reginfo[username]" id="newusername" type="text" placeholder="用户名在5-30位" class="user"><span id="newusernameTip"></span></p>
					    <p>邮箱地址：<input name="reginfo[email]" id="newemail" type="text" placeholder="请填写您的邮箱地址" class="user"><span id="newemailTip"></span></p>
					    <p>手机号码：<input name="reginfo[phone]" id="newmobile" type="text" placeholder="请填写您的手机号码" class="user"><span id="newmobileTip"></span></p>
					    <p>身份证号码：<input name="reginfo[idcard]" id="newidcard" type="text" placeholder="请填写身份证号码" class="user"><span id="newidcardTip"></span></p>
					    <p>联系QQ：<input name="reginfo[qq]" id="newqq" type="text" placeholder="请填写您的QQ号码" class="user"><span id="newqqTip"></span></p>
					    <p>密码：<input name="reginfo[password]" id="password1" type="password" placeholder="请填写密码" class="user"><span id="password1Tip"></span></p>
					    <p>密码确认：<input name="reginfo[confirmpassword]" id="password2" type="password" placeholder="密码确认" class="user"><span id="password2Tip"></span></p>
					    <p>收款方式：
						<select name="reginfo[ptype]" id="ptype" onchange="selectptype()" style="	width:400px;
							height:40px;
							line-height:40px;
							padding:0 10px;
							color:#ccc;
							font-size:16px;
							float:right;
							vertical-align:middle;
							background:#fff;
							border:1px solid #eee;
							border-radius:5px;">
						    <option value="1" selected>银行账户</option>
						    <option value="2">支付宝</option>
						    <option value="3">财付通</option>
						</select>
					    </p>

					    <p class="bank">开户银行：
						<select name="reginfo[bank]" id="bank"  style="	width:400px;
							height:40px;
							line-height:40px;
							padding:0 10px;
							color:#ccc;
							font-size:16px;
							float:right;
							vertical-align:middle;
							background:#fff;
							border:1px solid #eee;
							border-radius:5px;">
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



					    <p class="bank">开户银行：
						<a id="residecitybox" style="display: inline-block;float: right;">
						    <script type="text/javascript">
                                                        showprovince('resideprovince', 'residecity', '', 'residecitybox');
                                                        showcity('residecity', '', 'resideprovince', 'residecitybox');
						    </script>
						</a>
					    </p>


					    <style>
						#residecitybox select{width:200px;
								      height:40px;
								      line-height:40px;
								      padding:0 10px;
								      color:#ccc;
								      font-size:16px;
								      float:left;
								      vertical-align:middle;
								      background:#fff;
								      border:1px solid #eee;
								      border-radius:5px;}

					    </style>



					    <input name="reginfo[ctype]" value="1"  type="hidden"/>		
					    <p class="bank">支行地址：<input name="reginfo[addr]" id="address" type="text" placeholder="请填写开户行准确的地址信息，不清楚的可以暂时不填写" class="user"><span id="addressTip"></span></p>
					    <p class="bank">收款账号：<input name="reginfo[card]" id="ubank_no1" type="text" placeholder="请填写您的账号，注册后不能修改" class="user"><span id="ubank_no1Tip"></span></p>

					    <p class="alipay" >支付宝账号：<input name="reginfo[alipay]" id="alipay" type="text" placeholder="请填写您的支付宝账号，注册后不能修改" class="user"><span id="alipayTip"></span></p>

					    <p class="tenpay">财付通账号：<input name="reginfo[tenpay]" id="tenpay" type="text" placeholder="请填写您的财付通账号，注册后不能修改" class="user"><span id="tenpayTip"></span></p>
					    <p class="">真实姓名：<input name="reginfo[realname]" id="ubank_user" type="text" placeholder="请填写您的姓名，注册后不能修改" class="user"><span id="ubank_userTip"></span></p>
					    <p class="">推荐上级：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="is_superman" id="is_superman" style="width:20px;padding:0;margin:0;float: none"><label for="is_superman"style="width:300px;padding:0;margin:0;font-weight: normal">无上级可不勾选!<span id="is_superman"></span></p>


					    <p id="s-m" style="display: none">上级编号：

						<input name="reginfo[superman]" id="superman_user" type="text" placeholder="使用上级推荐，请务必填写推荐人的商户编号" class="user"><span id="superman_user"></span>
					    </p>

					    <p><font style=" font-size:12px; margin-left: 120px;">点击"立即注册"，即表示您已同意并愿意遵守<a href="/settlement.htm" target="_blank" style="display:inline; font-weight:bold">《有卡啦平台服务协议》</a></font></p>

					    <div style="display: none">
						<input type="radio" name="agree" value="yes" id="r1" checked> <label for="r1">同意</label>&nbsp;&nbsp;&nbsp;
						<input type="radio" name="agree" value="no" id="r2"> <label for="r2">不同意</label>
					    </div>


					</div>
				    </div>

				</div>
			    </div>

			    <script type="text/javascript">
                                function is_checked() {
                                    if ($('#is_superman').is(':checked')) {
                                        $('#s-m').show();
                                        $("#superman_user").attr("disabled", false).unFormValidator(false);
                                    } else {
                                        $('#s-m').hide();
                                        $("#superman_user").attr("disabled", true).unFormValidator(true);
                                    }
                                }

                                $('#is_superman').click(function () {
                                    is_checked();
                                })

                                var selectptype = function () {
                                    var val = $('#ptype').val();

                                    if (val == '1') {
                                        $("#residecity").attr("disabled", false).unFormValidator(false);
                                        $("#ubank_no1").attr("disabled", false).unFormValidator(false);
                                        $("#address").attr("disabled", false);
                                        $("#bank").attr("disabled", false);
                                        $('.bank').show();

                                        $("#alipay").attr("disabled", true).unFormValidator(true);
                                        $("#tenpay").attr("disabled", true).unFormValidator(true);
                                        $('.tenpay').hide();
                                        $('.alipay').hide();

                                    } else if (val == '2') {
                                        $("#alipay").attr("disabled", false).unFormValidator(false);
                                        $('.alipay').show();
                                        $('.tenpay').hide();
                                        $('.bank').hide();

                                        $("#residecity").attr("disabled", true).unFormValidator(true);
                                        $("#ubank_no1").attr("disabled", true).unFormValidator(true);
                                        $("#address").attr("disabled", true);
                                        $("#bank").attr("disabled", true);
                                        $("#tenpay").attr("disabled", true).unFormValidator(true);




                                    } else if (val == '3') {
                                        $("#tenpay").attr("disabled", false).unFormValidator(false);

                                        $('.alipay').hide();
                                        $('.tenpay').show();
                                        $('.bank').hide();


                                        $("#residecity").attr("disabled", true).unFormValidator(true);
                                        $("#ubank_no1").attr("disabled", true).unFormValidator(true);
                                        $("#address").attr("disabled", true);
                                        $("#bank").attr("disabled", true);
                                        $("#alipay").attr("disabled", true).unFormValidator(true);
                                    }
                                }

                                $(function () {
                                    $("#newusername").focus();

                                    $("#r2").click(function () {
                                        $(".register_button").attr("disabled", true);
                                        $(".register_button").addClass('notallowsubmit');
                                    });

                                    $("#r1").click(function () {
                                        $(".register_button").attr("disabled", false);
                                        $(".register_button").removeClass('notallowsubmit');
                                    });

                                    $.formValidator.initConfig({formid: "reg", onerror: function (msg) {
                                            alert(msg)
                                        }, onsuccess: function () {
                                            return true;
                                        }});
                                    $("#newusername").formValidator({onshow: "请填写要注册的用户名", onfocus: "用户名至少6个字符，最多20个字符", onempty: "用户名必须填写", oncorrect: "该用户名可以注册"}).inputValidator({min: 5, max: 20, onerror: "您填写的用户名长度不正确，请确认"}).regexValidator({regexp: "username", datatype: "enum", onerror: "用户名必须是字母开头，且只能为字母或数字"})
                                            .ajaxValidator({
                                                type: "get",
                                                url: "checkuser.htm",
                                                success: function (data) {
                                                    if (data == '0') {
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }
                                                },
                                                buttons: $(".register_button"),
                                                error: function () {
                                                    alert("服务器没有返回数据，可能服务器忙，请重试！");
                                                },
                                                onerror: "该用户名已被使用，请更换！",
                                                onwait: "正在对用户名进行合法性校验，请稍候..."
                                            });

                                    $("#newemail").formValidator({onshow: "请填写您的邮箱地址", onfocus: "用于找回密码、接收校验信息等操作", oncorrect: "邮箱地址填写完成", defaultvalue: ""}).inputValidator({min: 6, max: 100, onerror: "你填写的邮箱地址长度不正确,请确认"}).regexValidator({regexp: "^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$", onerror: "你填写的邮箱格式不正确"});
                                    $("#newmobile").formValidator({onshow: "请填写您的手机号码", onfocus: "请填写您的手机号码", oncorrect: "手机号码填写完成", onempty: "手机号码必须填写"}).inputValidator({min: 11, max: 11, onerror: "手机号码必须是11位"}).regexValidator({regexp: "mobile", datatype: "enum", onerror: "您输入的手机号码格式不正确"});
                                    $("#newidcard").formValidator({empty: true, onshow: "真实有效的身份证", onfocus: "真实有效的身份证", oncorrect: "请确认无误，注册后不能修改", onempty: "身份证号码注册后不能修改"}).inputValidator({max: 18, onerror: "身份证号码最多18位字符"});
                                    $("#newqq").formValidator({onshow: "请填写您的QQ号码", onfocus: "请填写您的QQ号码", oncorrect: "QQ号码填写完成", onempty: "QQ号码必须填写"}).inputValidator({min: 5, max: 12, onerror: "最少5位，最多12位字符"});
                                    $("#password1").formValidator({onshow: "请填写登录密码，至少6位字符", onfocus: "登录密码不能为空", oncorrect: "登录密码填写完成"}).inputValidator({min: 6, empty: {leftempty: false, rightempty: false, emptyerror: "密码两边不能有空符号"}, onerror: "密码不能为空，请确认"});
                                    $("#password2").formValidator({onshow: "请确认登录密码", onfocus: "两次密码必须一致", oncorrect: "密码一致"}).inputValidator({min: 6, empty: {leftempty: false, rightempty: false, emptyerror: "重复密码两边不能有空符号"}, onerror: "重复密码不能为空，请确认"}).compareValidator({desid: "password1", operateor: "=", onerror: "两次密码不一致，请确认"});
                                    $("#BankList").formValidator({onshow: "请选择您的开户银行，注册后不能修改", onfocus: "请选择您的开户银行", oncorrect: "开户行填写完成，注册后不能修改", onempty: "开户银行必须选择"}).inputValidator({min: 1, onerror: "开户银行必须选择"});
                                    $("#residecity").formValidator({onshow: "请选择您的开户银行所在城市，注册后不能修改", onfocus: "请选择您的开户银行所在城市", oncorrect: "请确认无误，注册后不能修改", onempty: "开户银行所在城市必须选择"}).inputValidator({min: 1, onerror: "请选择您的开户银行所在城市"});
                                    $("#ubank_no1").formValidator({onshow: "请填写您的收款账号，注册后不能修改", onfocus: "请填写您的收款账号，请确认无误", oncorrect: "收款账号填写完成"}).regexValidator({regexp: "^.{6,30}$", onerror: "您填写的收款账号格式不正确"});
                                    $("#ubank_no2").formValidator({onshow: "请确认您的收款账号", onfocus: "请确认两次收款账号一致", oncorrect: "收款账号一致"}).regexValidator({regexp: "^.{6,30}$", onerror: "您填写的收款账号格式不正确"}).compareValidator({desid: "ubank_no1", operateor: "=", onerror: "两次收款账号不一致，请确认"});
                                    $("#ubank_user").formValidator({onshow: "请填写收款人姓名，注册后不能修改", onfocus: "请填写收款人姓名，注册后不能修改", oncorrect: "收款人姓名填写完成。", onempty: "收款人姓名必须填写"}).inputValidator({min: 2, onerror: "收款人姓名必须填写真实姓名"});
                                    $("#alipay").formValidator({onshow: "请填写您的支付宝账号，注册后不能修改", onfocus: "请填写您的账号，仔细填写", oncorrect: "支付宝账号填写完成", onempty: "支付宝账号必须填写"}).inputValidator({min: 10, onerror: "支付宝账号必须填写"});
                                    $("#tenpay").formValidator({onshow: "请填写您的财付通账号，注册后不能修改", onfocus: "请填写您的账号，仔细填写", oncorrect: "财付通账号填写完成", onempty: "财付通账号必须填写"}).inputValidator({min: 5, onerror: "财付通账号必须填写"});
                                    selectptype();
                                });
			    </script>

			</div> </div>



		    <button class="btn_zc">立即注册</button>
		    <div class="reg_right">
			<div class="dl_box">已有账号直接登录？ <a href="/login.htm" class="zjdl">登录</a></div>
			<img src="/new2/ykl500.png" width="500" height="217">
			<div class="protect">
			    <p><strong>特别申明：</strong>特别申明：赌博、淫秽色情、裸聊、诱导交友、欺诈钓鱼、未取得文网棋牌游戏等类别禁止注册，一经发现封停账号拒绝结算等处理。</p>
			    <p><strong>重要提示：</strong>为提升平台质量，有以下情况的商户，平台有权在不提前告知情况下直接冻结或删除！ </p>
			    <p>1.注册信息严重有误、注册后3天内无任何操作、60天内无交易或没有实质商品。</p>
			    <p>2.云盘账号、虚假、无效、重复卡密、卡密为联系QQ提卡。</p>
			    <p>3.不回复或消极处理客户投诉。</p>
			</div>
		    </div>

		</div>
		<div class="clear"></div>
	    </div>

	</div>
    </div>
</form>
<script src="/new2/main.js"></script>



