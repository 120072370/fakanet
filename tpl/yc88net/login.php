<?php if(!defined('WY_ROOT')) exit; ?>
<link rel="stylesheet" href="/tpl/new/Skin/Home/Red/css/page.css" />
<div class="banner">
    <div class="slide">
        <img src="tpl/yc88net/picture/banner2.jpg" />
    </div>
</div>
<style type="text/css">
    .header {
        height: 330px;
    }

    .center_text h2 {
        margin-top: 25px;
        height: 80px;
        line-height: 80px;
        text-align: center;
        color: #1185e8;
        font-size: 24px;
        margin-bottom: 30px;
    }

    .center_text p {
        line-height: 36px;
    }
</style>
    </div>
<style type="text/css">
    .page_header {
        width: 100%;
        height: 100px;
        overflow: hidden;
        border-bottom: solid 1px #f0f0f0;
    }

        .page_header h1 {
            width: 194px;
            height: 100px;
            line-height: 100px;
            float: left;
            font-size: 40px;
            text-align: center;
        }

        .page_header .recent {
            width: 300px;
            height: 100px;
            line-height: 100px;
            float: right;
        }

    .page_content {
        width: 1198px;
        margin: 0 auto 50px 0;
        border-bottom: solid 1px #f0f0f0;
        border-left: solid 1px #f0f0f0;
        overflow: hidden;
    }

    .left_nav {
        width: 211px;
        float: left;
        margin-top: 25px;
    }

        .left_nav ul li {
            height: 50px;
            line-height: 50px;
            float: none;
            text-align: center;
        }

            .left_nav ul li.active {
                background: #1185e8;
            }

            .left_nav ul li a {
                display: inline-block;
                width: 194px;
                height: 50px;
                line-height: 50px;
            }

            .left_nav ul li.active a {
                color: #ffffff;
            }

    .center_text {
        width: 885px;
        float: right;
        border-left: solid 1px #f0f0f0;
        border-right: solid 1px #f0f0f0;
        padding: 0 50px 80px 50px;
        min-height: 550px;
    }
</style>

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
