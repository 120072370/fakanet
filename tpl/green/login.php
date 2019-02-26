<?php if (!defined('WY_ROOT')) exit; ?>


<div id="dowebok">
    <div class="section section1">
        <div class="reg_bg">
            <div class="reg_title">
                商 户 登 陆
            </div>
	    <form name="login" method="post" action="userlogin.htm">
                <input type="hidden" name="t" value="1">
		<div class="reg_con" style="height: 420px;">
		    <p>用户名：<input name="username"  type="text" placeholder="用户名在5-30位" class="user"></p>
		    <p>密 码：<input type="password" placeholder="密码长度在6到20个字符之间" class="user" name="password" ></p>
		    <p>验证码：<img onclick="javascript:this.src = this.src + '?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码"   style="width:98px; height:42px;float:right; margin-left: 10px"><input type="text" name="chkcode" id="chkcode" placeholder="验证码" class="user" style="width:292px"></p>
		    <p style=" font-size:12px; margin-left: 430px;font-style: normal; height: 30px; line-height: 30px;"><a href="/retpwd.htm" target="_blank" style="display:inline;">忘记密码？</a></p>
                    <button class="btn_zc" style="float:left; margin-left: 120px;font-size: 16px;">立即登陆</button>
		    </p>
		    <div class="reg_right"><div class="dl_box">还没有帐号？ <a href="/register.html" class="zjdl">立即注册</a></div><img src="/new2/ykl500.png" width="500" height="217"></div>
		</div>
            </form>
        </div>
    </div>
</div>
<script src="/new2/main.js"></script>
<script>
                        $(function () {
                            $('#dowebok').fullpage({
                                scrollingSpeed: 300,
                                loopBottom: true,
                                anchors: ['page1', 'page2', 'page3', 'page4', 'page5', 'page6'],
                                menu: '#menu',
                                resize: false,
                                scrollBar: true,
                                afterRender: function () {
                                    wow = new WOW({
                                        animateClass: 'animated',
                                    });
                                    wow.init();
                                }
                            });
                        });
</script>



