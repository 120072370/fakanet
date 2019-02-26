<?php if(!defined('WY_ROOT')) exit; ?>
<?php echo $msg ?>
<div id="full_table" style="height:1207px;min-width:1200px;background:url(pub_images//login_background.jpg) no-repeat center;">
    <div id="tab1200" style="hieght:120px;padding-top:20px;">
	    <dd style="position:relative;height:60px;line-height:40px;width:1200px;min-width:1000px;font-size:16px;font-weight:600;color:#ffffff;">首页 > 登陆平台</dd>
		<dd id="help_m" style="position:relative;height:60px;line-height:40px;width:1200px;min-width:1200px;">
		    <ul style="font-size:16px;font-weight:600px;">
		        <a href="faq.htm"><li style="float:left;margin-right:20px;height:40px;width:100px;text-align:center;color:#000000;border:1px solid #dfdfdf;color:#ffffff;">帮助中心</li></a>
		        <a href="login.html"><li style="float:left;margin-right:20px;height:40px;width:100px;text-align:center;color:#000000;border:1px solid #dfdfdf;color:#ffffff;">登陆平台</li></a>
		        <a href="sendcode.htm"><li style="float:left;margin-right:20px;height:40px;width:100px;text-align:center;color:#000000;border:1px solid #dfdfdf;color:#ffffff;">免费注册</li></a>
		        <a href="retpwd.htm"><li style="float:left;margin-right:20px;height:50px;width:102px;text-align:center;color:#ffffff;background:url('pub_images//help_menu.png');color:#ffffff;">找回密码</li></a>
		        <a href="orderquery.htm"><li style="float:left;margin-right:20px;height:40px;width:100px;text-align:center;color:#000000;border:1px solid #dfdfdf;color:#ffffff;">订单查询</li></a>
		    </ul>
		</dd>
	</div>
    <div id="tab1200" >
		<div id="company_ch" style="color:#ffffff;">[安全问题]</div>
		<div id="company_en" style="height:30px;line-height:30px;width:300px;color:#ffffff;">SECURITY QUESTION</div>
		<div id="company_button_png"></div>
    <div id="login_main" style="width:500px;margin:50px auto;height:400px;">
		<div class="login_ss">
			<ul class="login_ii">		    
			<form name="ft" method="post" action="withquestion.htm">
			<input type="hidden" value="<?php echo $userid ?>" name="uid" />
			<li class="login_tt" style="position:relative;height:60px;width:450px;">
			    <dd style="color:#ffffff;width:100px;float:left;height:38px;line-height:40px;text-align:center;padding-right:10px;border:1px solid #bbbbbb;border-right:none;color:#ffffff;">安全问题</dd>
			    <dd style="float:left;height:38px;line-height:38px;text-indent:10px;width:300px;BACKGROUND-COLOR:transparent;border:1px solid #bbbbbb;color:#ffffff;"><?php echo $question ?></dd>
			</li>
			<li class="login_ff" style="float:left;height:60px;">
			    <dd style="color:#ffffff;width:100px;float:left;height:38px;line-height:40px;text-align:center;padding-right:10px;border:1px solid #bbbbbb;border-right:none;color:#ffffff;">问题答案</dd>
				<dd style="float:left;"><input type="text" name="answer" maxlength="50" style="height:38px;line-height:38px;text-indent:10px;width:300px;BACKGROUND-COLOR:transparent;border:1px solid #bbbbbb;color:#ffffff;"/>
				</dd>
			</li>
			<li class="login_ff" style="float:left;height:60px;">
			    <dd style="color:#ffffff;width:100px;float:left;height:38px;line-height:40px;text-align:center;padding-right:10px;border:1px solid #bbbbbb;border-right:none;color:#ffffff;">重设密码</dd>
				<dd style="float:left;">
				<input type="password" name="newpassword" maxlength="20" style="height:38px;line-height:38px;text-indent:10px;width:300px;BACKGROUND-COLOR:transparent;border:1px solid #bbbbbb;color:#ffffff;"/>
				</dd>
			</li>
			<li class="login_ff" style="float:left;height:60px;">
			    <dd style="color:#ffffff;width:100px;float:left;height:38px;line-height:40px;text-align:center;padding-right:10px;border:1px solid #bbbbbb;border-right:none;color:#ffffff;">确认密码</dd>
				<dd style="float:left;">
				<input type="password" name="confirmpassword" maxlength="20" style="height:38px;line-height:38px;text-indent:10px;width:300px;BACKGROUND-COLOR:transparent;border:1px solid #bbbbbb;color:#ffffff;"/>
				</dd>
			</li>
			<li class="login_ff" style="float:left;height:60px;">
			    <dd style="color:#ffffff;width:100px;float:left;height:38px;line-height:40px;text-align:center;padding-right:10px;border:1px solid #bbbbbb;border-right:none;color:#ffffff;">验证码</dd>
				<dd style="float:left;">
				<input type="text" name="chkcode" maxlength="5" style="height:38px;line-height:38px;text-indent:10px;width:150px;BACKGROUND-COLOR:transparent;border:1px solid #bbbbbb;color:#ffffff;"/></dd>
				<dd style="width:200px;float:left;">
				<img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></dd>
			</li>
			<li class="button" style="float:left;height:60px;width:450px;text-align:center;">
			    <input type="submit" class="getback_pwd" value="立即重置" style="width:160px;hieght:40px;line-height:38px;background-color:#3ea5d7;font-size:16px;margin:0 auto;border:1px solid #3287cd;color:#ffffff;"/>
			</li>
			</form>
			</ul>
		</div>
	</div>
	<!--直播就到这里请关注我   下午一点继续直播 ！！！ 谢谢观看--->
	
	
	
	
	
	
	
	
	
	
	
</div>	
