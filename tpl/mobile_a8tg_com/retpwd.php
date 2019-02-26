<?php if(!defined('WY_ROOT')) exit; ?>
<link rel="stylesheet" href="tpl/mobile_a8tg_com/css/regapp.css" />
<script src="tpl/weiqi/js/reg.js" type="text/javascript"></script>
<div class="lawyer-infor-bar bg-fff">
  <div class="tab-content" style="padding: 10px 20px">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">&nbsp;&nbsp;&nbsp;</li>
        <li role="presentation" class="active"><a href="#">找回密码</a></li>
    </ul>
    <div class="tab-content" style="padding: 10px 20px">
        <div role="tabpanel" class="tab-pane active content_style">
            <form method="post" action="/retpwd.htm">
               <div class="form-group">
                        <label style="color: red;text-align: center;"><?php echo $msg ?></label>
                    </div>
                <div class="form-group">
                      <label for="username">找回方式</label>
                    <label class="radio-inline">
                        <input id="radio1" name="ftype" value="1" checked="" type="radio">
                        通过手机号</label>
                    <label class="radio-inline">
                        <input id="radio2" name="ftype" value="2" type="radio">
                        通过邮件</label>
                </div>
                <div class="form-group">
                    <label for="username">用户名</label>
                    <input class="form-control" id="username" name="username"  required="" type="text">
                </div>
                <div class="form-group" id="mailtab" style="display:none">
                    <label for="username">邮箱</label>
                    <input class="form-control" id="email" name="email"  type="text">
                </div>

                <div class="form-group">
                    <label for="chkcode">验&nbsp;证&nbsp;码</label>
                    <div class="input-group">
                        <input class="form-control" id="chkcode" name="chkcode" required="" type="text">
                        <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" class="chkcode" title="点击刷新验证码" height="50" align="absmiddle"></span>
                    </div>
                </div>
                 <div class="form-group" id="phtab">
                    <label for="username">手机号</label>
                    <div class="input-group">
                        <input class="form-control" id="newmobile" name="phone"  type="text" value="">
                        <span class="input-group-btn">
                            <button class="btn btn-primary sendcode" id="sendcode1">发送短信验证码</button>
                        </span>
                    </div>
                    <span id="phonecodeTip" class="onShow" style="color:red"></span>
                </div>
                <div class="form-group"  id="phtab1">
                    <label for="username">手机验证码</label>
                    <input class="form-control" id="phonecode" name="phonecode"  type="text">
                     <span style="color:red" id="chkcodeTip"></span>
                </div>
                <div class="form-group">
                        <input class="btn btn-success btn-block" style="font-size: 18px; padding: 10px 10px;" value="立即找回" type="submit">
                    </div>
                  
            </form>
        </div>
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