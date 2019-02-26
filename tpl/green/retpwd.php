<?php if (!defined('WY_ROOT')) exit; ?>
<div id="dowebok">
    <div class="section section1">
        <div class="back_bg">
            <div class="back_title">
                找 回 密 码
            </div>
            <div class="back_con">
                <form name="ft" method="post" action="retpwd.htm">
		    <p>用户名：<input name="username" type="text" placeholder="用户名" class="user" required></p>
		    <p>邮&nbsp;箱：<input name="email" type="text" placeholder="注册邮箱" class="user" required></p>
		    <p>验证码：<img onclick="javascript:this.src = this.src + '?t=new Date().getTime()';" src="includes/libs/chkcode.htm" width="90" height="40" style="float:right;"><input name="chkcode" type="text" placeholder="验证码" class="user" style="width:210px;">
		    </p>
		    <p><button class="btn_zh" style="font-size: 18px;">立即找回</button><font style="font-size:12px; float:right; font-weight:lighter">没有账号，<a href="/register.htm" style="color:#0acffe; display:inline">立即注册</a></font></p>

		    <input type="radio" name="ftype" value="1" id="r1" checked> 
		    <div id="clear"></div>
		</form>
            </div>
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

<script type="text/javascript">
    $(document).ready(function () {
        $.formValidator.initConfig({formID: "form1", theme: 'ArrowSolidBox', mode: 'AlertTip', onError: function (msg) {
                alert(msg)
            }, inIframe: true});
        $("#userEmail").formValidator({onShow: "账号必须为邮箱格式", onFocus: "邮箱至少6个字符,最多30个字符", onCorrect: "该用户名可以注册"}).inputValidator({min: 6, max: 30, onError: "邮箱长度必须为6-30位之间"}).regexValidator({regExp: "email", dataType: "enum", onError: "你输入的邮箱格式不正确"});
        $("#idCard").formValidator({onShow: "请输入15或18位的身份证", onFocus: "输入15或18位的身份证", onCorrect: "输入正确"}).functionValidator({fun: isCardID});
        $("#VerifyCode").formValidator({onShow: "请输入验证码", onFocus: "请输入正确的验证码", onCorrect: "输入正确"}).inputValidator({min: 4, max: 5, onError: "请输入正确的验证码"});
        $.formValidator.reloadAutoTip();
    });
    function reloadAutoTip() {
        $.formValidator.reloadAutoTip();
    }
</script>




