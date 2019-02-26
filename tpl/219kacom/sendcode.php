<?php if(!defined('WY_ROOT')) exit; ?>
<script type="text/javascript" src="tpl/219kacom/js/city.js"></script>
<script type="text/javascript" src="tpl/219kacom/js/formValidator_min.js"></script>
<script type="text/javascript" src="tpl/219kacom/js/formValidatorRegex.js"></script>


<div class="w">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style=" margin-bottom:1px; border:solid 1px #e6e6e6;">
<tr>
<td align="center" style="padding:20px;">

<form id="reg" name="reg" action="regsave.htm" method="POST" >
</div>
    <div id="register_main">
		<div class="register_main_content">

		    <div class="register_option">基本信息</div>
			
<table>
			<tr>
			<td class="r_o_t" width="150"> 用户名：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[username]" id="newusername" /></td>
			<td class="r_o_m" width="420"><span id="newusernameTip">请填写要注册的商户名，用于登陆凭证(注册后不可更改)</span></td>
			</tr>

			<tr>
			<td class="r_o_t"> 邮箱地址：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[email]" id="newemail" /></td>
			<td class="r_o_m"><span id="newemailTip">请填写您的邮箱地址</span></td>
			</tr>

			<tr>
			<td class="r_o_t"> 手机号码：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[phone]" id="newmobile" /></td>
			<td class="r_o_m"><span id="newmobileTip">请填写您的手机号码</span></td>
			</tr>

			<tr>
			<td class="r_o_t"> 身份证号：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[idcard]" id="newidcard" /></td>
			<td class="r_o_m"><span id="newidcardTip">请填写身份证号码</span></td>
			</tr>

			<tr>
			<td class="r_o_t"> 联系QQ：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[qq]" id="newqq" /></td>
			<td class="r_o_m"><span id="newqqTip">请填写您的联系QQ号码</span></td>
			</tr>

			<tr>
			<td class="r_o_t"> 密码：<span>*</span></td>
			<td class="r_o_i"><input type="password" name="reginfo[password]" id="password1" /></td>
			<td class="r_o_m"><span id="password1Tip">请填写密码</span></td>
			</tr>

			<tr>
			<td class="r_o_t"> 密码确认：<span>*</span></td>
			<td class="r_o_i"><input type="password" name="reginfo[confirmpassword]" id="password2" /></td>
			<td class="r_o_m"><span id="password2Tip">请再次输入确认密码</span></td>
			</tr>
			</table>
	<strong style="font-size:14px;color:red">申明：赌博、淫秽色情、爱奇艺 、百度云盘、黄色论坛邀请码、诱导交友、欺诈钓鱼等类别禁止注册，一经发现封停账号。所注册信息 将提交有关部门.追究法律责任.  
</strong>
		    <div class="register_option line">详细信息</div>
			<table>
			<tr>
			<td class="r_o_t" width="150">收款方式：<span>*</span> </td>
			<td class="r_o_i">
			<select name="reginfo[ptype]" id="ptype" onChange="selectptype()">
			<option value="1" selected>银行账户</option>
			<option value="2">支付宝</option>
			<!--<option value="3">财付通</option>-->
			</select></td>
			<!--<td class="r_o_m" width="420"><span>&nbsp; 建议使用财付通</span></td>-->
			</tr>



			<tr class="pt bank">
			<td class="r_o_t"> 开户银行：<span>*</span></td>
			<td class="r_o_i">
			<select name="reginfo[bank]" id="bank">
				<!--<option value="中国工商银行">工商银行</option>
				<option value="中国银行">中国银行</option>
				<option value="交通银行">交通银行</option>
				<option value="中国农业银行">农业银行</option>
				<option value="中国建设银行">建设银行</option>
				<option value="中国民生银行">民生银行</option>
				<option value="中国光大银行">光大银行</option>
				<option value="中国邮政储蓄">中国邮政储蓄</option>
			<!--	<option value="中信银行">中信银行</option>-->
				<option value="中国工商银行">工商银行</option>
				<option value="中国建设银行">建设银行</option>
				<option value="中国农业银行">农业银行</option>
				<!--<option value="招商银行">招商银行</option>
				<option value="兴业银行">兴业银行</option>
				<!--<option value="上海浦东发展银行">上海浦东发展银行</option>-->
				<!--<option value="广东发展银行">广东发展银行</option>-->
				<!--<option value="深圳发展银行">深圳发展银行</option>-->

			</select></td>
			<td class="r_o_m"><span>&nbsp; 请选择您的开户银行，注册后不能修改</span></td>
			</tr>

			<tr class="pt bank">
			<td class="r_o_t"> 开户城市：<span>*</span></td>
			<td class="r_o_i">
			<div id="residecitybox">
			<script type="text/javascript">
                showprovince('resideprovince', 'residecity', '', 'residecitybox');
                showcity('residecity', '', 'resideprovince', 'residecitybox'); 
			</script>
			</div>			</td>
			<td class="r_o_m"><span id="residecityTip">请选择您的开户行所在城市，注册后不能修改。</span></td>
			</tr>

			<tr class="pt bank">
			<td class="r_o_t"> 支行地址：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[addr]" id="address" /></td>
			<td class="r_o_m"><span id="addressTip">&nbsp;请填写开户行准确的地址信息，不清楚的可以暂时不填写。</span></td>
			</tr>

			<tr class="pt bank">
			<td class="r_o_t"> 收款账号：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[card]" id="ubank_no1" /></td>
			<td class="r_o_m"><span id="ubank_no1Tip">请填写您的账号，注册后不能修改</span></td>
			</tr>

			<tr class="pt alipay">
			<td class="r_o_t"> 支付宝账号：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[alipay]" id="alipay" /></td>
			<td class="r_o_m"><span id="alipayTip">请填写您的支付宝账号，注册后不能修改</span></td>
			</tr>

			<tr class="pt tenpay">
			<td class="r_o_t"> 财付通账号：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[tenpay]" id="tenpay" /></td>
			<td class="r_o_m"><span id="tenpayTip">请填写您的财付通账号，注册后不能修改</span></td>
			</tr>

			<tr>
			<td class="r_o_t"> 真实姓名：<span>*</span></td>
			<td class="r_o_i"><input type="text" name="reginfo[realname]" id="ubank_user" /></td>
			<td class="r_o_m"><span id="ubank_userTip">请填写您的姓名，注册后不能修改。</span></td>
			</tr>

              <td class="r_o_t"> 验证码：<span>*</span></td>
			  <td class="r_o_i"><input type="text" name="reginfo[chkcode]" id="chkcode" maxlength="5" style="width:150px" />

<img onclick="javascript:this.src='images/chkcode.htm'+new Date().getTime();"src="includes/libs/chkcode.htm?t=80003" style="border:1px solid #bcbcbc" align="absmiddle" title="点击刷新验证码" /></td>

			  <td class="r_o_m"><span id="chkcodeTip">请填写验证码。</span></td>

			</table>


			<div style="margin:20px 0;font-size:14px;text-align:center">
			<input type="radio" name="agree" value="yes" id="r1" checked> <label for="r1">同意</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="agree" value="no" id="r2"> <label for="r2">不同意</label>
			</div>

			<div style="text-align:center"><input type="submit" value="" class="register_button" /></div>

		</div>
	</div>
	</form>		</table>
	</div></div>


<script type="text/javascript">

function is_checked(){
    if($('#is_superman').is(':checked')){
	    $('#s-m').show();
		$("#superman_user").attr("disabled",false).unFormValidator(false);
	} else {
	    $('#s-m').hide();
		$("#superman_user").attr("disabled",true).unFormValidator(true);
	}
}

$('#is_superman').click(function(){
    is_checked();
})
    var selectptype=function(){
		var val=$('#ptype').val();
		
	    if(val=='1'){
			$("#residecity").attr("disabled",false).unFormValidator(false);
			$("#ubank_no1").attr("disabled",false).unFormValidator(false);
			$("#address").attr("disabled",false);
			$("#bank").attr("disabled",false);
			$('tr.bank').show();
			
			$("#alipay").attr("disabled",true).unFormValidator(true);
			$("#tenpay").attr("disabled",true).unFormValidator(true);  
			$('tr.pt:not(.bank)').hide();			
			
		} else if(val=='2'){		
			$("#alipay").attr("disabled",false).unFormValidator(false);
		    $('tr.alipay').show();
			$('tr.pt:not(.alipay)').hide();			
			$("#residecity").attr("disabled",true).unFormValidator(true);
			$("#ubank_no1").attr("disabled",true).unFormValidator(true);
			$("#address").attr("disabled",true);
			$("#bank").attr("disabled",true);
			$("#tenpay").attr("disabled",true).unFormValidator(true);

		} else if(val=='3'){
			$("#tenpay").attr("disabled",false).unFormValidator(false);
		    $('tr.tenpay').show();
			$('tr.pt:not(.tenpay)').hide();	
			$("#residecity").attr("disabled",true).unFormValidator(true);
			$("#ubank_no1").attr("disabled",true).unFormValidator(true);
			$("#address").attr("disabled",true);
			$("#bank").attr("disabled",true);
			$("#alipay").attr("disabled",true).unFormValidator(true);	
		}
	}

$(function(){
	$("#newusername").focus();
	
	$("#r2").click(function(){
		$(".register_button").attr("disabled",true);
		$(".register_button").addClass('notallowsubmit');
	});

    $("#r1").click(function(){
		$(".register_button").attr("disabled",false);
		$(".register_button").removeClass('notallowsubmit');
	});

	$.formValidator.initConfig({formid:"reg",onerror:function(msg){alert(msg)},onsuccess:function(){ return true; }});
	$("#newusername").formValidator({onshow:"请填写要注册的商户名，用于登陆凭证(注册后不可更改)",onfocus:"用户名至少6个字符,最多20个字符",onempty:"用户名是您登陆账户的凭证，一定要填写哦",oncorrect:"该用户名可以注册"}).inputValidator({min:6,max:20,onerror:"你填写的用户名长度不正确,请确认"}).regexValidator({regexp:"username",datatype:"enum",onerror:"用户名只能为字母或数字，且必须由字母开头"})
	    .ajaxValidator({
	    type : "get",
		url : "checkuser.htm",
		success : function(data){
            if(data=='0'){
                return true;
			} else {
                return false;
			}
		},
		buttons: $(".register_button"),
		error: function(){alert("服务器没有返回数据，可能服务器忙，请重试！");},
		onerror : "该用户名已被使用，请更换！",
		onwait : "正在对用户名进行合法性校验，请稍候..."
	});

	$("#newemail").formValidator({onshow:"请填写您的邮箱地址",onfocus:"用于找回密码、接收校验信息等操作",oncorrect:"邮箱地址填写完成",defaultvalue:"@"}).inputValidator({min:6,max:100,onerror:"你填写的邮箱地址长度不正确,请确认"}).regexValidator({regexp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",onerror:"你填写的邮箱格式不正确"});
	$("#newmobile").formValidator({onshow:"请填写您的手机号码",onfocus:"请填写您的手机号码，用于紧急联系或身份验证。",oncorrect:"手机号码填写完成",onempty:"手机号码一定要填写哦"}).inputValidator({min:11,max:11,onerror:"手机号码必须是11位的,请确认"}).regexValidator({regexp:"mobile",datatype:"enum",onerror:"你输入的手机号码格式不正确"});
	$("#newidcard").formValidator({empty:true,onshow:"身份证",onfocus:"身份证",oncorrect:"请确认无误，注册后不能修改。",onempty:"注册后不能修改"}).inputValidator({max:18,onerror:"最多18位字符"});
	$("#newqq").formValidator({onshow:"请填写联系QQ号码",onfocus:"请填写联系QQ号码",oncorrect:"QQ填写完成。",onempty:"QQ一定填写哦"}).inputValidator({min:5,max:12,onerror:"最少5位，最多12位字符"});
	$("#password1").formValidator({onshow:"请填写密码",onfocus:"密码不能为空",oncorrect:"密码填写完成"}).inputValidator({min:6,empty:{leftempty:false,rightempty:false,emptyerror:"密码两边不能有空符号"},onerror:"密码不能为空,请确认"});
	$("#password2").formValidator({onshow:"请填写重复密码",onfocus:"两次密码必须一致哦",oncorrect:"密码一致"}).inputValidator({min:6,empty:{leftempty:false,rightempty:false,emptyerror:"重复密码两边不能有空符号"},onerror:"重复密码不能为空,请确认"}).compareValidator({desid:"password1",operateor:"=",onerror:"2次密码不一致,请确认"});
	$("#BankList").formValidator({onshow:"请选择您的开户银行，注册后不能修改。",onfocus:"请选择您的开户银行。",oncorrect:"开户行填写完成，注册后不能修改。",onempty:"开户银行一定要填写哦"}).inputValidator({min:1,onerror:"开户银行一定要选择哦"});
	$("#residecity").formValidator({onshow:"请选择您的开户银行所在城市，注册后不能修改。",onfocus:"请选择您的开户银行所在城市",oncorrect:"请确认无误，注册后不能修改。",onempty:"开户银行所在城市一定要选哦"}).inputValidator({min:1,onerror:"请选择您的开户银行所在城市"});
	$("#ubank_no1").formValidator({onshow:"请填写您的账号，注册后不能修改。",onfocus:"请填写您的账号，仔细填写哦",oncorrect:"账号填写完成！"}).regexValidator({regexp:"^.{6,30}$",onerror:"你填写的账号格式不正确"});
	$("#ubank_no2").formValidator({onshow:"请再填写一次账号",onfocus:"要确保账号两次输入一样哦",oncorrect:"账号一致"}).regexValidator({regexp:"^.{6,30}$",onerror:"你填写的账号格式不正确"}).compareValidator({desid:"ubank_no1",operateor:"=",onerror:"2次账号不一致,请确认"});
    $("#ubank_user").formValidator({onshow:"请填写您的姓名，注册后不能修改。",onfocus:"请填写您的姓名，也就是支付账号姓名，注册后不能修改。",oncorrect:"姓名填写完成，注册后不能修改。",onempty:"姓名一定要填写哦"}).inputValidator({min:2,onerror:"开户人姓名一定要填写真实姓名哦"});
	$("#alipay").formValidator({onshow:"请填写您的支付宝账号，注册后不能修改。",onfocus:"请填写您的账号，仔细填写哦",oncorrect:"账号填写完成！",onempty:"支付宝一定要填写哦"}).inputValidator({min:10,onerror:"支付宝账号一定要填写哦"});
	$("#tenpay").formValidator({onshow:"请填写您的财付通账号，注册后不能修改。",onfocus:"请填写您的账号，仔细填写哦",oncorrect:"账号填写完成！",onempty:"财付通一定要填写哦"}).inputValidator({min:5,onerror:"财付通账号一定要填写哦"});

selectptype();
});
</script>

		</div>
	  </div><!--/box end-->
	</div><!--/left end-->
  </div><!--/content end-->﻿<div class="safely"></div>
