<?php if(!defined('WY_ROOT')) exit; ?>
<link rel="stylesheet" href="/tpl/new/Skin/Home/Red/css/page.css" />
<div class="content">
	<div class="page_gonggao">
		<div class="page_header">
			<h1>登录平台</h1>
			<div class="recent"> <span>当前位置：<a href="/">首页 </a> &gt; 登录平台</span> </div>
		</div>
		<div class="page_content">
			<div class="left_nav">
				<ul>
					<li class="nav_current"><a href="/login.htm">登录平台</a></li>
					<li><a href="/sendcode.htm">免费注册</a></li>
					<li><a href="/retpwd.htm">找回密码</a></li>
					<li><a href="/orderquery.htm">交易查询</a></li>
				</ul>
			</div>
			<div class="center_text">
				<h2>登录平台</h2>
				<div class="form">
					<div class="login_1">
						<form action="userlogin.htm" autocomplete="off" method="post">
							<div class="login_table">
								<div class="r_text">
									<label for="user">用户名</label>
									<span style="display:inline-block;position:relative;">
									<div id="mailListBox_0" class="justForJs out_box" style="min-width:392px;_width:392px;position:absolute;left:-6000px;top:42px;z-index:1;"></div>
									<input value="请输入商户账号" class="input_login wbcd" id="userEmail" name="username" onblur="if(!value){value=yellowValue;}" onfocus="if(value=='请输入商户账号'){this.value='';}" onkeydown="enterSearch(event);" tabindex="1" type="text">
									</span> </div>
								<div class="r_text">
									<label for="passwd"><span>密</span>码</label>
									<input value="请输入商户登录密码" class="input_login wbcd" id="userPass" name="password" onblur="if(!value){value=yellowValue;}" onfocus="if(value=='请输入商户登录密码'){this.value='';}" onkeydown="enterSearch(event);" tabindex="2" type="password">
								</div>
								<div class="r_text">
									<label for="code">验证码</label>
									<input type="text" id="code" placeholder="请输入验证码" class="pass_text" name="chkcode" required>
									<img id="code_img" src="includes/libs/chkcode.htm" onclick="javascript:this.src=this.src+'?t=new Date().getTime()';"> </div>
								<div class="btn_login">
									<input type="submit" class="login_btn th" value="立即登录">
								</div>
								<div class="text_center"> <a href="/retpwd.htm">忘记密码？</a> <em class="red_link">还没有账号？ <a href="/sendcode.htm">马上注册 &gt;</a></em> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
