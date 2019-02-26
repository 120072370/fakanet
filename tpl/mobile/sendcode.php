
<div style="margin-top:0px;padding-top:8px;background-color:#f1f1f1">
<ul class="nav nav-tabs" role="tablist">
<li role="presentation">&nbsp;&nbsp;&nbsp;</li>﻿<li role="presentation" class="active"><a href="#">注册新用户</a></li></ul>
<div class="tab-content" style="padding:10px 20px">
<div role="tabpanel" class="tab-pane active content_style">
<form method="post" action="/regsave.htm">
 <label><input type="radio" name="reginfo[istg]" id="" value="0" checked="checked" />商户会员（卖家中心）</label>
    	    <label><input type="radio" name="reginfo[istg]" id="" value="1" />推广会员（商品推广中心）</label>
<div class="form-group"><label for="newusername">用户名<small>(*必填)</small></label>
<input class="form-control" id="newusername" name="reginfo[username]" required="" type="text"></div>
<div class="form-group"><label for="email">邮箱地址<small>(*必填)</small></label>
<input class="form-control" id="email" name="reginfo[email]" required="" type="text"></div>
<div class="form-group"><label for="phone">手机号码<small>(*必填)</small></label>
<input class="form-control" id="phone" name="reginfo[phone]" required="" type="text"></div>
<div class="form-group"><label for="idcard">身份证号<small>(*必填)</small></label>
<input class="form-control" id="idcard" name="reginfo[idcard]" required="" type="text"></div>
<div class="form-group"><label for="qq">联系QQ<small>(*必填)</small></label>
<input class="form-control" id="qq" name="reginfo[qq]" required="" type="text"></div>
<div class="form-group"><label for="password">登录密码<small>(*必填)</small></label>
<input class="form-control" id="password" name="reginfo[password]" required="" type="password"></div>
<div class="form-group"><label for="confrimpassword">确认密码<small>(*必填)</small></label>
<input class="form-control" id="confirmpassword" name="reginfo[confirmpassword]" required="" type="password"></div>
<div class="form-group"><label for="ptype">收款方式<small>(*必填)</small></label>
<select name="reginfo[ptype]" class="form-control" id="ptype" onchange="selectType()">
<option value="1" selected="">银行账户</option>
<option value="2">支付宝</option>
<option value="3">财付通</option>
</select>
</div>
<div class="form-group ptype p1">
<label for="bank">选择银行<small>(*必填)</small></label>
<select name="reginfo[bank]" class="form-control" id="bank">
				<option value="中国工商银行">工商银行</option>
				<option value="中国银行">中国银行</option>
				<option value="交通银行">交通银行</option>
				<option value="中国农业银行">农业银行</option>
				<option value="中国建设银行">建设银行</option>
				<option value="中国民生银行">民生银行</option>
				<option value="中国光大银行">光大银行</option>
				<option value="中国邮政储蓄">中国邮政储蓄</option>
			<!--	<option value="中信银行">中信银行</option>-->
				<option value="招商银行">招商银行</option>
				<option value="兴业银行">兴业银行</option>
</select></div>
<div class="form-group ptype p1">
<label for="addr">开户地址<small>(*必填)</small></label>
<input class="form-control" id="addr" name="reginfo[addr]" type="text"></div>
<div class="form-group ptype p1"><label for="card">收款账号<small>(*必填)</small></label>
<input class="form-control" id="card" name="reginfo[card]" type="text"></div>
<div style="display: none;" class="form-group ptype p2">
<label for="alipay">支付宝账号<small>(*必填)</small></label>
<input class="form-control" id="alipay" name="reginfo[alipay]" type="text"></div>
<div style="display: none;" class="form-group ptype p3">
<label for="tenpay">财付通账号<small>(*必填)</small></label>
<input class="form-control" id="tenpay" name="reginfo[tenpay]" type="text"></div>
<div class="form-group"><label for="realname">真实姓名<small>(*必填)</small></label>
<input class="form-control" id="realname" name="reginfo[realname]" required="" type="text"></div>
<div class="form-group"><label for="chkcode">验证码<small>(*必填)</small></label>
<input class="form-control" id="chkcode" name="reginfo[chkcode]" required="" maxlength="5" style="width:150px" type="text">
<img onclick="javascript:this.src='includes/libs/chkcode.htm?t='+new Date().getTime();"src="includes/libs/chkcode.htm?t=80003" style="border:1px solid #bcbcbc" align="absmiddle" title="点击刷新验证码" /></div>
	<strong style="font-size:14px;color:red">申明：赌博、淫秽色情、百度云盘、黄色论坛邀请码、诱导交友、欺诈钓鱼等类别禁止注册，一经发现封停账号。所注册信息 将提交有关部门.追究法律责任. 敬请各商户自律！！</strong>
<div class="form-group">
<label for="agree"><input id="agree" name="reginfo[agree]" checked="" type="checkbox"> 
<a href="/register/info" target="_blank">阅读并同意用户注册协议</a></label></div>
<div class="form-group">
<button type="submit" id="regbtn" class="btn btn-success btn-block">立即注册</button></div>
</form>
</div>
</div>
</div>﻿	</div>




</form>
		</div>
	</div>
	</div>
</div>
<script type='text/javascript' src='pub_images/js_user_reg.js'></script>
<div style="clear:both;"></div>