<?php if(!defined('WY_ROOT')) exit; ?>
		<style>
		.login-c input{font-family:"Microsoft YaHei",Verdana,Arial;}
		</style>
		<div class="login">
	    <div class="login-t"><h4>商户登录</h4></div>
		<div class="login-c" style="height:100%">
		  <form class="login-form" id="loginform" name="aspnetForm" method="post" action="userlogin.htm">
		   <span id="nametxt">商户账号</span><input name="username" id="loginName" type="text" class="input" />
		   <span id="passtxt">登录密码</span><input name="password" id="loginPass" type="password" class="input" />
		   <span class="b_r b_m_l" style="line-height:30px"><a href="retpwd.htm">忘记密码？</a></span><span id="logincode" class="b_r" title="点击刷新验证码"><img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';"  src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码" /></span><span id="codetxt">验证码</span><input name="chkcode" id="checkCode" type="text" class="b_l input" style="width:70px;" />
		   <div class="clear"></div>
		   <input name="Login" type="submit" class="dl" value="" title="登录"/><input type="button" onclick="javascript:window.location.href='register.htm'" class="zc" value="" title="注册" />
		  </form>
		  <a href="apps/Connect2.0/" class="qqlogin">使用QQ帐号快速登录</a>
		  <a href="apps/WeiboSDK/" class="weibo">使用新浪微博快速登录</a>
		</div>
		</div>
