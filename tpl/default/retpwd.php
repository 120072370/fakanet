<?php if(!defined('WY_ROOT')) exit; ?>
<?php echo $msg ?>
<div id="full_table" style="height:700px;min-width:1200px;background:url(pub_images//login_background.jpg) no-repeat center;">
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
	    <div id="company_ch" style="color:#ffffff;">[登陆平台]</div>
		<div id="company_en" style="height:30px;line-height:30px;width:300px;color:#ffffff;">LAND PLATFORM</div>
		<div id="company_button_png"></div>
		<div id="company_en" style="height:30px;line-height:30px;width:300px;color:#ffffff;padding-top:10px;font-size:20px;">-找回方式-</div>
		<div id="company_en" style="height:350px;line-height:30px;width:600px;">   
		    <div style="position:absolute;width:600px;height:300px;background-color:#aaaaaa;opacity:0.45;box-shadow: 0px 0px 10px #00bfff;border-radius:5px;filter:alpha(opacity=50);"></div>
			<div style="position:relative;width:500px;margin:20px auto;padding:50px;">
			    
			    <form name="ft" method="post" action="retpwd.htm">
			         <li class="login_t" style="height:60px;width:500px;color:#ffffff;text-align:left;line-height:50px;">
					     <dd for="r1" style="color:#ffffff;width:40px;float:left;height:20px;line-height:20px;text-align:right;padding-right:10px;padding-top:10px;*padding-top:13px;_padding-top:13px;">
			                 <input type="radio" name="ftype" value="1" id="r1" checked style="vertical-align:middle; height:16px; width:16px;">
						 </dd>
						 <dd for="r1" style="color:#ffffff;width:80px;float:left;height:40px;line-height:40px;text-align:left;padding-right:10px;">邮件认证</dd>
						 
						 <dd for="r1" style="color:#ffffff;width:40px;float:left;height:20px;line-height:20px;text-align:right;padding-right:10px;padding-top:10px;*padding-top:13px;_padding-top:13px;">
			                 <input type="radio" name="ftype" value="2" id="r2" style="vertical-align:middle; height:16px; width:16px;">
						 </dd>
						 <dd for="r1" style="color:#ffffff;width:80px;float:left;height:40px;line-height:40px;text-align:left;padding-right:10px;">安全问题</dd>
			         </li>
	                 
			         <li style="height:60px;width:500px;color:#ffffff;text-align:left;line-hieght:50px;">
			             <div style="color:#ffffff;width:100px;float:left;height:38px;line-height:40px;text-align:right;padding-right:10px;border:1px solid #bbbbbb;border-right:none;color:#ffffff;">商户账号:</div>
						 <div style="position:relative;color:#ffffff;width:300px;float:left;">
						     <input type="text" name="username" maxlength="20" style="position:relative;height:38px;line-height:38px;text-indent:10px;width:300px;BACKGROUND-COLOR:transparent;border:1px solid #bbbbbb;color:#ffffff;*left:-10px;*top:-1px;"/>
						 </div>
					 </li>
					 
					 
			         <li class="login_t" style="height:60px;width:500px;color:#ffffff;text-align:left;line-hieght:50px;">
					     <dd for="r1" style="color:#ffffff;width:100px;float:left;height:38px;line-height:38px;text-align:right;padding-right:10px;border:1px solid #bbbbbb;border-right:none;color:#ffffff;">验证码:</dd>
						 <dd style="color:#ffffff;width:150px;float:left;">
			                <input type="text" name="chkcode" maxlength="5" style="position:relative;height:38px;width:150px;line-height:38px;text-indent:10px;BACKGROUND-COLOR:transparent;border:1px solid #bbbbbb;color:#ffffff;*left:-10px;*top:-1px;"/>
					     </dd>
						 <dd style="color:#ffffff;width:200px;float:left;">
						     <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" />
						 </dd>
					 </li>
			         <li class="button"><input type="submit" class="getback_pwd" value="立即找回" style="width:160px;hieght:40px;line-height:38px;background-color:#3ea5d7;font-size:16px;border:1px solid #3287cd;color:#ffffff;" /></li>
			    </form>
			</div>
			
		</div>
	</div>
  </div>
 <div style="clear:both;"></div>