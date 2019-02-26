<?php if(!defined('WY_ROOT')) exit; ?>
<link rel="stylesheet" type="text/css" href="tpl/a8tg/Css/global.css">
<link rel="stylesheet" type="text/css" href="tpl/a8tg/Css/Public.css">
<link href="tpl/a8tg/Css/login.css" rel="stylesheet" type="text/css">
<script src="tpl/a8tg/Js/input.js" type="text/javascript"></script>
<script type="text/javascript" src="tpl/a8tg/Js/kefu.js"></script>

<div class="right search"  style="display: none" >
            <div id="menu_con">
                <div style="display:block" id="qhcon0">
                    <div style="height: 30px">
                        <input name="js_search_q_input" type="text" id="js_search_q_input" style="background: transparent; border: 1px solid #ffffff;
                            height: 20px; width: 309px;" onkeydown="enterSearch(event);" value="请输入订单号" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}">
                        <button id="search_bnt" type="button" onclick="$('#search').click()">
                        </button>
                        <input type="submit" name="search" value="" onclick="return Search();" id="search" style="display: none;">
                    </div>
                </div>
                <div style="display: none" id="qhcon1">
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>

	<div class="news_login">
        <div class="center">
            <div class="left" style="margin: 20px 0 0;">
                <img src="tpl/a8tg/images/login_left_1.png"></div>
            <div class="news_login_right">
                <s:token>
                <ul> 
                	<form name="login" method="post" action="userlogin.htm">
                    <h1>
                        账户登录</h1>
                    <li>用户名</li>
                    <li>
                        <input name="username" type="text" class="input_login wbcd" tabindex="1"></li>
                    <li>密&nbsp;&nbsp;&nbsp;码 </li>
                    <li>
                        <input name="password" type="password" id="password" class="input_login wbcd" tabindex="2" autocomplete="off"></li>
                    <li>
                        <div style="float: left">
                            <input type="text" name="chkcode" maxlength="5" style="width:70px" tabindex="3"/> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码" />
                        <div style="float: left; margin-left: 10px; display: inline;">
                        </div>
                    </li>
                    <div class="clear">
                    </div>
                    <li>
                      <div style="float: left; margin-top: 5px; margin-left: -10px">
                            <input type="image" name="hlkOK" id="hlkOK" tabindex="4" src="tpl/a8tg/images/login_dl_1.png" onclick="return Login();"> 
                        <a href="/retpwd.htm">找回密码</a>                        </div>
                        <div style="float: right; line-height: 32px; margin: 5px 6px 0 0">
                            还没有账号？&nbsp;<a href="register.htm" tabindex="5" style="text-decoration: underline;" class="ls">立即注册</a></div>
                    </li>
                	</form>
                    <div class="clear">
                    </div>
                </ul>
            </s:token></div>
        </div>
    </div>