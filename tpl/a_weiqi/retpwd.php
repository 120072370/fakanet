<?php if(!defined('WY_ROOT')) exit; ?>
<link href="tpl/weiqi/content/webcss/reg.css" rel="stylesheet" type="text/css">
<script src="tpl/weiqi/js/reg.js" type="text/javascript"></script>

<div class="page_init">
    <div class="InNews_reg" style="height: 500px;">
        <div class="OnlineReg" style="height: 450px; min-height: 450px;">
            <h3>找回密码</h3>
            <form name="ft" method="post" action="retpwd.htm">
                <ul>
                    <li style="color: red;text-align: center;">
                        <?php echo $msg ?>
                    </li>
                    <li>
                        <label>
                            找回方式：
                        </label>
                        <input type="radio" name="ftype" value="1" id="r1" checked="">
                        <span for="r1">通过手机号</span>&nbsp;&nbsp;
                <input type="radio" name="ftype" value="2" id="r2">
                        <span for="r2">通过邮件</span>
                    </li>
                    <li>
                        <label>用户名：</label>
                        <input type="text" name="username" id="username" maxlength="20" class="middle" />
                    </li>

                    <li id="mailtab" style="display:none">
                        <label>邮箱：</label>
                        <input type="text" name="email" id="email"  class="middle" />
                    </li>

                    <li style="height: 45px;">
                        <label>验 证 码 ：</label>
                        <input type="text" name="chkcode" id="chkcode" maxlength="5" style="width: 70px" class="middle" />
                        <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" />
                    </li>
                     <li id="phtab" >
                        <label>手机号：</label>
                        <input type="text" name="phone" id="newmobile" style="width:18%" class="middle" />
                         <input type="button" id="sendcode1" class="sendcode" value="发送验证码" />
                           <span style="color:red" id="phonecodeTip"></span>
                    </li>
                    <li id="phtab1" >
                        <label>短信验证码：</label>
                        <input type="text" name="phonecode" id="phonecode" style="width:18%"  class="middle" />
                        <span style="color:red" id="chkcodeTip"></span>
                    </li>
                    <li class="button">
                        <input type="submit" class="m-reg"  value="确认提交" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("input[name='ftype']").click(function () {
            if ($(this).val() == 1) {
                $("#phtab").show();
                $("#phtab1").show();
                $("#mailtab").hide();
            } else {
                $("#phtab").hide();
                $("#phtab1").hide();
                $("#mailtab").show();
            }
        });

        $("form").submit(function (e) {
            if ($("input[name='username']").val() == "") {
                alert("请填写用户名");
                return false;
            }
            if ($("input[name='ftype']:checked").val() == 1) {
                if ($("input[name='phone']").val() == "") {
                    alert("请填写手机号");
                    return false;
                }
                if ($("input[name='phone']").val().length != 11) {
                    alert("手机号格式不正确！");
                    return false;
                }
                if ($("input[name='phonecode']").val() == "") {
                    alert("请填写短信验证码");
                    return false;
                }
            } else {
                if ($("input[name='email']").val() == "") {
                    alert("请填写邮箱");
                    return false;
                }
            }
            if ($("input[name='chkcode']").val() == "") {
                alert("请填写验证码");
                return false;
            }
            return true;
        });
    });
  
</script>
