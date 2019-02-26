function checkform() {
    if ($("input[name='username']").val() == "") {
        alert("请输入用户名");
        $("input[name='username']").focus();
        return false
    }
    if ($("input[name='password']").val() == "") {
        alert("请输入密码");
        $("input[name='password']").focus();
        return false
    }
    if ($("input[name='VCode']").val() == "") {
        alert("请输入验证码");
        $("input[name='VCode']").focus();
        return false
    }
    
    var data = { username: $("input[name='username']").val(), password: $("input[name='password']").val(), VCode: $("input[name='VCode']").val(), t: Date() };

    $.post("/Account/Login.html", data, function (result) {
        if (result.Success == 0) {
            alert(result.Content);
            Change();
            return false;
        } else {
            location.href = result.Content;
        }
    });
    return false;
}

//更换验证码图片
function Change() {
    $("#codeimg").attr("src", "Account/VerifyImage.html?r=" + Math.random());
}