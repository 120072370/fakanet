<?php if(!defined('WY_ROOT')) exit; ?>

  <div class="banner">
            <ul>
                <!--  <li>
                        <img src="tpl/weiqi/img/2016102817013299.jpg" alt="banner">
                        <div class="bannerconbox">
                            
                        </div>
                    </li>-->
                <li>
                    <img src="tpl/weiqi/content/webimages/lpic28.jpg" alt="1">
                    <div class="bannerconbox">
                        <div class="bannercon">
                            <h3>最值得信赖的发卡平台</h3>
                            <h4>全方位的虚拟物品交易平台</h4>
                            <dl class="left1">
                                <dt>1240<em>+</em></dt>
                                <dd>商家数量</dd>
                            </dl>
                            <!--  <dl class="right1">
                                <dt>128<i>万</i><em>+</em></dt>
                                <dd>交易次数</dd>
                            </dl>-->
                            <dl class="middle1">
                                <dt>3500<i>万</i><em>+</em></dt>
                                <dd>2017年交易次数</dd>
                            </dl>
                        </div>
                    </div>
                </li>

            </ul>
            <a href="javascript:;" class="bannerPrev bannerbtn"></a>
            <a href="javascript:;" class="bannerNext bannerbtn"></a>
        </div>
        <div class="Online">
            <h3>用户登陆/USERLOGIN</h3>
            <form method="post" action="userlogin.htm" id="loginForm">
                <ul>
                    <li><span>用户名：</span><i><input id="username" placeholder="手机号/用户名"  name="username" class="m-btn" type="text"></i></li>
                    <li><span>密码：</span><i><input class="m-btn" id="password" name="password" type="password"></i></li>
                    <li><span>验证码</span><i><input class="m-btn code"  name="chkcode" id="chkcode" type="text"  maxlength="4" tabindex="3">
                     &nbsp;<img align="bottom"  onclick="javascript:this.src = this.src + '?t=new Date().getTime()';
                                                                    return false;" src="/includes/libs/chkcode.htm" title="看不清，换一个"  style="width:100px;height:35px; vertical-align: middle;">
                                                                    </i></li>
                                                                    <li><span>&nbsp;</span><a hidefocus="true" class="a_1" title="忘记密码？" href="/retpwd.htm">忘记密码？</a></li>
                    <li><span>&nbsp;</span><i><input class="m-submit" type="button" onClick="return checkForm();"  value="立即登陆">
                        <a class="m-reg" href="register.htm">立即注册</a></i>
                    </li>
                </ul>
            </form>
        </div>
    </div>