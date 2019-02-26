<?php
if (!defined('WY_ROOT'))
	exit ;
 ?>
<link rel="stylesheet" href="/tpl/new/Skin/Home/Red/css/style.css" />
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
			<ul class="login_i">
			<form name="login" method="post" action="setnewpwd.htm">
			    <input type="hidden" name="verifycode" value="<?php echo $verifycode ?>" />
				<li class="login_t">商户账号</li>
				<li class="login_f"><input type="text" name="username" maxlength="20" /></li>
				<li class="login_t">重设密码</li>
				<li class="login_f"><input type="password" name="password" maxlength="20" /></li>
				<li class="login_t">验证码</li>
				<li class="login_f"><input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></li>
				<li class="button"><input type="submit" class="reset_pwd" value="" /></li>
			</form>
			</ul>
			</div>
	</div>
			</form>
			</ul>
		</div>
	</div>
			</div>
		</div>
	</div>
	<div class="safely"></div>
</div>