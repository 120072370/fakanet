<link rel="stylesheet" href="tpl/weiqi/css/regapp.css" />
<link rel="stylesheet" href="tpl/weiqi/css/footstrap.css" />

<script src="tpl/weiqi/js/js/jquery.js"></script>
<script src="tpl/weiqi/js/js/footstrap.js"></script>

<script src="tpl/weiqi/js/formValidator_min.js" type="text/javascript"></script>
<script src="tpl/weiqi/js/formValidatorRegex.js" type="text/javascript"></script>

<script src="tpl/weiqi/js/reg.js" type="text/javascript"></script>

<div style="margin-top: 0px; padding-top: 8px; background-color: #f1f1f1">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">&nbsp;&nbsp;&nbsp;</li>
        ﻿<li role="presentation" class="active"><a href="#">注册新用户</a></li>
    </ul>
    <div class="tab-content" style="padding: 10px 20px">
        <div role="tabpanel" class="tab-pane active content_style">
            <form method="post" action="/regsave.htm" id="reg">
                <label>
                    <input type="radio" name="reginfo[istg]" id="" value="0" checked="checked" />商户会员（卖家中心）</label>
                <!--<label><input type="radio" name="reginfo[istg]" id="" value="1" />推广会员（商品推广中心）</label>-->
                <div class="form-group">
                    <label for="newusername">用户名<small>(*必填)</small></label>
                    <input class="form-control" id="newusername" name="reginfo[username]" required="" type="text" value="">
                    <span id="newusernameTip" class="onError">您填写的用户名长度不正确，请确认</span>
                </div>
                <div class="form-group">
                    <label for="password">登录密码<small>(*必填)</small></label>
                    <input class="form-control" id="password" name="reginfo[password]" required="" type="password" value="">
                    <span id="passwordTip" class="onShow">请填写登录密码，至少6位字符</span>
                </div>
                <div class="form-group">
                    <label for="confrimpassword">确认密码<small>(*必填)</small></label>
                    <input class="form-control" id="confirmpassword" name="reginfo[confirmpassword]" required="" type="password" value="">
                    <span id="confirmpasswordTip" class="onShow">请确认登录密码</span>
                </div>
                <div class="form-group">
                    <label for="qq">联系QQ<small>(*必填)</small></label>
                    <input class="form-control" id="qq" name="reginfo[qq]" required="" type="text" value="">
                    <span id="qqTip" class="onShow">请填写您的QQ号码</span>
                </div>
                <div class="form-group">
                    <label for="chkcode">验证码<small>(*必填)</small></label>
                    <input class="form-control" id="chkcode" name="reginfo[chkcode]" required="" maxlength="5" style="width: 100%" type="text">
                    <img onclick="javascript:this.src='includes/libs/chkcode.htm?t='+new Date().getTime();" src="includes/libs/chkcode.htm?t=80003" style="border: 1px solid #bcbcbc" align="absmiddle" title="点击刷新验证码" />
                    <span id="chkcodeTip" class="onShow"></span>
                </div>
                <div class="form-group">
                    <label for="phone">手机号码<small>(*必填)</small></label>
                    <div class="input-group">
                        <input class="form-control" id="newmobile" name="reginfo[phone]" required="" type="text" value="">
                       
                    </div>
                    <span id="newmobileTip" class="onShow">请填写您的手机号码</span>
                </div>
             
                <div class="form-group">
                    <label for="agree">
                        <input id="agree" name="reginfo[agree]" checked="" type="checkbox">
                        <a href="/statement.htm" target="_blank">阅读并同意用户注册协议</a></label>
                    <label class="onError">
                        注册完成后，请立即完善商户收款信息及店铺基本信息
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" id="regbtn" class="btn btn-success btn-block">立即注册</button>
                </div>
                <div class="form-group" style="color: red">
                    <p style="color: red">
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
                </div>
            </form>
        </div>
    </div>
</div>
﻿	</div>

</form>
		</div>
	</div>
	</div>
</div>
<div style="clear: both;"></div>
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
        $("#phone").formValidator({
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

        $("#qq").formValidator({
            onshow: "请填写您的QQ号码",
            onfocus: "请填写您的QQ号码",
            oncorrect: "QQ号码填写完成",
            onempty: "QQ号码必须填写"
        }).inputValidator({
            min: 5,
            max: 12,
            onerror: "最少5位，最多12位字符"
        });
        $("#password").formValidator({
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
        $("#confirmpassword").formValidator({
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
            desid: "password",
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
            onerror: "验证码4字符"
        });
        
    });
</script>
