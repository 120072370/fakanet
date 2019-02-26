<?php if(!defined('WY_ROOT')) exit; ?>
<link href="tpl/weiqi/content/webcss/reg.css" rel="stylesheet" type="text/css">

<div class="page_init">
    <div class="InNews_reg" style="height: 600px;">
        <div class="OnlineReg">
            <h3>密码重置</h3>
            <form name="ft" method="post" action="newpwd.htm">
                <ul>
                    <li style="color: red;">
                        <?php echo $msg ?>
                    </li>
                    <input type="hidden" name="verifycode" value="<?php echo $verifycode ?>" />
                    <li class="login_t">用户名</li>
                    <li class="login_f">
                        <input type="text" name="username" maxlength="20" class="middle" /></li>
                    <li class="login_t">重设密码</li>
                    <li class="login_f">
                        <input type="password" name="password" maxlength="20" class="middle" /></li>
                    <li class="login_t">验证码</li>
                    <li class="login_f">
                        <input type="text" name="chkcode" maxlength="5" style="width: 70px" class="middle" />
                        <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></li>
                    <li class="button">
                        <input type="submit" class="m-reg" value="确认提交" /></li>
                </ul>
            </form>
        </div>
    </div>
</div>


