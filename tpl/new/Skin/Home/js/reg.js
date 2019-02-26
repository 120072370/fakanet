$(document).ready(function () {
    changeBank($("#BankInfoId").val());
    $("#BankInfoId").change(function () {
        changeBank($(this).val());
    });
    $.formValidator.initConfig({ formID: "form1", theme: 'ArrowSolidBox', mode: 'AutoTip', onError: function (msg) { alert(msg) }, inIframe: true });
    $("#userEmail").formValidator({ onShow: "账号必须为邮箱格式", onFocus: "邮箱至少6个字符,最多30个字符", onCorrect: "该用户名可以注册" }).inputValidator({ min: 6, max: 30, onError: "邮箱长度必须为6-30位之间" }).regexValidator({ regExp: "email", dataType: "enum", onError: "你输入的邮箱格式不正确" });
    $("#userPass").formValidator({ onShow: "请输入密码", onFocus: "密码不能为空", onCorrect: "密码合法" }).inputValidator({ min: 1, empty: { leftEmpty: false, rightEmpty: false, emptyError: "密码两边不能有空符号" }, onError: "密码不能为空,请确认" });
    $("#ConfirmPassword").formValidator({ onShow: "输再次输入密码", onFocus: "确认密码不能为空", onCorrect: "密码一致" }).inputValidator({ min: 1, empty: { leftEmpty: false, rightEmpty: false, emptyError: "确认密码两边不能有空符号" }, onError: "确认密码不能为空,请确认" }).compareValidator({ desID: "userPass", operateor: "=", onError: "两次密码不一致,请确认" });

    $("#qq").formValidator({ onShow: "请输入联系QQ", onFocus: "只能输入5-11位之间纯数字哦", onCorrect: "输入正确" }).inputValidator({ min: 5, max: 11, onError: "QQ长度必须为5-11位之间" }).regexValidator({ regExp: "qq", dataType: "enum", onError: "QQ格式不正确" })
    $("#mobile").formValidator({ onShow: "请输入你的手机号码", onFocus: "请输入你的手机号码", onCorrect: "输入正确" }).inputValidator({ min: 11, max: 11, onError: "手机号码必须是11位的,请确认" }).regexValidator({ regExp: "mobile", dataType: "enum", onError: "你输入的手机号码格式不正确" });
    $("#idCard").formValidator({ onShow: "请输入15或18位的身份证", onFocus: "输入15或18位的身份证", onCorrect: "输入正确" }).functionValidator({ fun: isCardID });
    $("#userName").formValidator({ onShow: "请输入收款人姓名", onFocus: "收款人姓名必须为中文", onCorrect: "输入正确" }).regexValidator({ regExp: "chinese", dataType: "enum", onError: "收款人名只能为中文" });
    $("#bankNo").formValidator({ onShow: "请输入收款账号", onFocus: "请输入正确的收款账号", onCorrect: "输入正确" }).inputValidator({ min: 5, max: 30, onError: "请输入正确的收款账号" });
    $("#bankAddress").formValidator({ empty: true, onShow: "请输入开户行地址", onFocus: "请输入正确的开户行地址", onCorrect: "输入正确", onEmpty: "请输入开户行地址" }).inputValidator({ min: 5, max: 30, onError: "请输入正确的开户行地址,请确认" });
    $("#VerifyCode").formValidator({
        onShow: "请输入验证码", onFocus: "请输入正确的验证码", onCorrect: "输入正确",
        tipCss : 
		{left:110}
		

    }).inputValidator({ min: 5, max: 5, onError: "请输入正确的验证码" });
    $.formValidator.reloadAutoTip();
});
function reloadAutoTip() {
    $.formValidator.reloadAutoTip();
}
function changeBank(bank) {
    if (bank == "1") {
        $("#div_openingBank1").css("display", "none");
        $("#li_bankUser").html("收款姓名：<span>*</span>");
        $("#li_bankAccount").html("支付宝账号：<span>*</span>");
    }
    else if (bank == "2") {
        $("#div_openingBank1").css("display", "none");
        $("#li_bankUser").html("收款姓名：<span>*</span>");
        $("#li_bankAccount").html("财付通账号：<span>*</span>");
    }
    else {
        $("#div_openingBank1").css("display", "block");
        $("#li_bankUser").html("开户姓名：<span>*</span>");
        $("#li_bankAccount").html("银行账号：<span>*</span>");
    }
}