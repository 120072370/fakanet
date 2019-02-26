<?php if(!defined('WY_ROOT')) exit; ?>
<link href="tpl/weiqi/content/webcss/reg.css" rel="stylesheet" type="text/css">
<script src="tpl/weiqi/js/formValidator_min.js" type="text/javascript"></script>
<script src="tpl/weiqi/js/formValidatorRegex.js" type="text/javascript"></script>
<script src="tpl/weiqi/js/reg.js" type="text/javascript"></script>


<div class="page_init">
    <div class="InNews_reg">
        <div class="OnlineReg">
            <h3>用户注册/USERREG</h3>
            <form id="reg" name="reg" action="regsave.htm" method="POST">
                <ul>
                    <li>
                        <h4>请填写账户信息
                    <br />
                            （注意：买家请勿注册，此为商家入驻注册）
                        </h4>
                        <label>
                            用户名：
                        </label>
                        <input class="middle" type="text" name="reginfo[username]" id="newusername" value="">
                        <span id="newusernameTip" class="onError">您填写的用户名长度不正确，请确认</span>
                    </li>
                    <li>
                        <label>
                            登陆密码：
                        </label>
                        <input type="password" name="reginfo[password]" id="password1" class="middle" value="">
                        <span id="password1Tip" class="onShow">请填写登录密码，至少6位字符</span>
                    </li>

                    <li>
                        <label>
                            确认密码：
                        </label>
                        <input type="password" name="reginfo[confirmpassword]" id="password2" class="middle" value="">
                        <span id="password2Tip" class="onShow">请确认登录密码</span>
                    </li>
                    <li>
                        <label>
                            商家QQ：
                        </label>
                        <input name="reginfo[qq]" id="newqq" class="middle" tabindex="9" maxlength="20">
                        <span id="newqqTip" class="onShow">请填写您的QQ号码</span>

                    </li>
                    <li class="showInput">
                        <label>
                            手机号码：
                        </label>
                        <input type="text" name="reginfo[phone]" id="newmobile" class="middle phone" style="width: 20%" value="">

                        <span id="newmobileTip" class="onShow">请填写您的手机号码</span>
                    </li>
                    <li>
                        <!-- input输入正确加class＝"correct",否则加"error" -->
                        <label for="captcha">
                            验证码：
                        </label>
                        <input type="text" class=" middle code" name="reginfo[chkcode]" id="chkcode" maxlength="10">
                        &nbsp;
              <img onclick="javascript:this.src = this.src + '?t=new Date().getTime()';" style="border: 1px solid #bcbcbc;" src="/includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码">
                        <span id="chkcodeTip" class="onShow">请填写验证码</span>
                    </li>
                    
                    <li class="info1">
                        <h4 class="onError">注册完成后，请立即完善商户收款信息及店铺基本信息
                        </h4>
                    </li>

                    <li></li>

                    <li class="btnarea">
                        <button type="submit" name="Submit" id="submit" class="m-reg">
                            同意以下协议并注册
                        </button>

                    </li>
                    <li class="label">
                        <a href="statement.htm" target="_blank">《点击查看用户注册协议》</a>
                    </li>
                    <li style="color: red;font-size:12px;">
                         <p >
                        特别申明：赌博、淫秽色情、裸聊、诱导交友、欺诈钓鱼、未取得文网棋牌游戏等类别禁止注册，一经发现直接删除商户。
                    </p>
                    <p >
                        重要提示：为提升平台质量，有以下情况的商户，平台有权在不提前告知情况下直接冻结或删除！</p>
                         <p >
1.注册信息严重有误、注册后2天内无任何操作、30天内无交易或没有实质商品。</p>
                    <p >
2.云盘账号、虚假、无效、重复卡密,卡密为联系QQ提卡，抽奖兑奖。</p>
                    <p>
3.对投诉问题24小时内不回复，不处理，消极/野蛮处理投诉的。
                    </p>
                    </li>
                </ul>
            </form>
        </div>

    </div>

</div>


<script type="text/javascript">

    $(function () {
        $("#newusername").focus();
        $.formValidator.initConfig({
            formid: "reg",
            onerror: function (msg) {
                alert(msg)
            },
            onsuccess: function () {
                return true;
            }
        });
        $("#newusername").formValidator({
            onshow: "请填写要注册的用户名",
            onfocus: "用户名至少6个字符，最多20个字符",
            onempty: "用户名必须填写",
            oncorrect: "该用户名可以注册"
        }).inputValidator({
            min: 6,
            max: 20,
            onerror: "您填写的用户名长度不正确，请确认"
        }).regexValidator({
            regexp: "username",
            datatype: "enum",
            onerror: "用户名必须是字母开头，且只能为字母或数字"
        }).ajaxValidator({
            type: "get",
            url: "checkuser.htm",
            success: function (data) {
                if (data == '0') {
                    return true;
                } else {
                    return false;
                }
            },
            buttons: $(".register_button"),
            error: function () {
                alert("服务器没有返回数据，可能服务器忙，请重试！");
            },
            onerror: "该用户名已被使用，请更换！",
            //onwait : "正在对用户名进行合法性校验，请稍候..."
            onwait: "　"
        });
        //$("#newemail").formValidator({
        //    onshow: "请填写您的邮箱地址",
        //    onfocus: "用于找回密码、接收校验信息",
        //    oncorrect: "邮箱填写完成",
        //    defaultvalue: "@"
        //}).inputValidator({
        //    min: 6,
        //    max: 100,
        //    onerror: "您填写的邮箱长度不正确，请确认"
        //}).regexValidator({
        //    regexp: "^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",
        //    onerror: "您填写的邮箱格式不正确，请确认"
        //});
        $("#newmobile").formValidator({
            onshow: "请填写您的手机号码",
            onfocus: "请填写您的手机号码",
            oncorrect: "手机号码填写完成",
            onempty: "手机号码必须填写"
        }).inputValidator({
            min: 11,
            max: 11,
            onerror: "手机号码必须是11位"
        }).regexValidator({
            regexp: "mobile",
            datatype: "enum",
            onerror: "您输入的手机号码格式不正确"
        });

        $("#newqq").formValidator({
            onshow: "请填写您的QQ号码",
            onfocus: "请填写您的QQ号码",
            oncorrect: "QQ号码填写完成",
            onempty: "QQ号码必须填写"
        }).inputValidator({
            min: 5,
            max: 12,
            onerror: "请填写QQ号码，最少5位，最多12位字符"
        });
        $("#password1").formValidator({
            onshow: "请填写登录密码，至少6位字符",
            onfocus: "登录密码不能为空",
            oncorrect: "登录密码填写完成"
        }).inputValidator({
            min: 6,
            empty: {
                leftempty: false,
                rightempty: false,
                emptyerror: "密码两边不能有空符号"
            },
            onerror: "密码不能为空，请确认"
        });
        $("#password2").formValidator({
            onshow: "请确认登录密码",
            onfocus: "两次密码必须一致",
            oncorrect: "密码一致"
        }).inputValidator({
            min: 6,
            empty: {
                leftempty: false,
                rightempty: false,
                emptyerror: "重复密码两边不能有空符号"
            },
            onerror: "重复密码不能为空，请确认"
        }).compareValidator({
            desid: "password1",
            operateor: "=",
            onerror: "两次密码不一致，请确认"
        });

        $("#chkcode").formValidator({
            onshow: "请填写验证码",
            onfocus: "请填写验证码",
            oncorrect: "验证码填写完成",
            onempty: "请填写验证码"
        }).inputValidator({
            min: 4,
            max: 4,
            onerror: "验证码4位字符"
        });

     

    });


</script>
