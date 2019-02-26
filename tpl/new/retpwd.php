<?php
if (!defined('WY_ROOT'))
	exit ;
 ?>
<link rel="stylesheet" href="/tpl/new/Skin/Home/Red/css/style.css" />
<link rel="stylesheet" href="/tpl/new/Skin/Home/Red/css/page.css" />
<div class="content">
	<div class="page_gonggao">
		<div class="page_header">
			<h1>找回密码</h1>
			<div class="recent"> <span>当前位置：<a href="/">首页 </a> > 找回密码</span> </div>
		</div>
		<div class="page_content">
			<div class="left_nav">
				<ul>
					<li><a href="/login.htm">登录平台</a></li>
					<li><a href="/sendcode.htm">免费注册</a></li>
					<li class="nav_current"><a href="/retpwd.htm">找回密码</a></li>
					<li><a href="/orderquery.htm">交易查询</a></li>
					</ul>
		  </div>
			<div class="center_text">
				<h2>找回方式</h2>
			    <?php echo $msg ?>
    <div id="login_main">
		<div class="login_s">
        <div class="login_t"></div>
			<ul class="login_i">
			<form name="ft" method="post" action="retpwd.htm">
				<li class="login_t"></li>
                <li class="login_t"></li>
                <li class="login_t">
                <input type="radio" name="ftype" value="1" id="r1" checked> <label for="r1">通过邮件</label>&nbsp;&nbsp;
			    <input type="radio" name="ftype" value="2" id="r2"> <label for="r2">通过安全问题</label>
                </li>
				<li class="login_t"></li>
				<li class="login_t">商户账号<span class="login_f">
				  <input type="text" name="username" maxlength="20" />
				</span></li>
                <li class="login_f"></li>
                <li class="login_t">验证码
                  <input type="text" name="chkcode" maxlength="5" style="width:180px" /><img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></span></li>
                <li class="login_f"></li>
				<li class="button"><input type="submit" class="getback_pwd" value="" /></li>
			</form>
			</ul>
		</div>
	</div>
			</div>
		</div>
	</div>
	<div class="safely"></div>
</div>