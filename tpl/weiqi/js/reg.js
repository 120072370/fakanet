var timer;
var t;
$(function () {
    $("#sendcode").click(function () {
        telcheck();
    });

    $("#sendcode1").click(function () {
        telretpwd();
    });
    function telcheck() {
        t = 60;
        var phone = $("#newmobile").val();
        var chkcode = $("#chkcode").val();
        if (phone != "" && chkcode != "" && phone.length == 11) {
            $.post("/sms.php?action=tel_check", { mobile: phone, chkcode: chkcode }, function (result) {
                console.log(result);
                if (result == "codeerro") {
                    $("#chkcodeTip").text("验证码错误");
                    $("#chkcodeTip").removeClass("onShow");
                    $("#chkcodeTip").removeClass("onCorrect");
                    $("#chkcodeTip").addClass("onError");
                } else if (result == "phoneerro") {
                    $("#newmobileTip").text("手机号已存在，请直接登录");
                    $("#newmobileTip").removeClass("onShow");
                    $("#newmobileTip").removeClass("onCorrect");
                    $("#newmobileTip").addClass("onError");
                } else if (result == "numerro") {
                    $(".sendcode").attr("disabled", true);
                    $(".sendcode").val("操作过于频繁..");
                    $(".sendcode").text("操作过于频繁..");
                    $(".sendcode").css("background-color", "#e0e0e0");
                }else if (result == 0) {
                    $("#chkcodeTip").text("");
                    $("#newmobileTip").text("");
                    $(".sendcode").attr("disabled", true);
                    $(".sendcode").val("正在发送短信..");
                    $(".sendcode").text("正在发送短信..");
                    $(".sendcode").css("background-color", "#e0e0e0");
                    timer = setInterval("CountDown()", 1000);

                } else {
                    $("#sendcode").val("发送失败请重试");
                }
            });
        } else {
            alert("请填写正确的手机号或验证码！");
        }
        return false;
    }
    function telretpwd() {
        t = 60;
        var phone = $("#newmobile").val();
        var chkcode = $("#chkcode").val();
        var username = $("#username").val();
        if (username != "" && phone != "" && chkcode != "" && phone.length == 11) {
            $.post("/sms.php?action=tel_retpwd", { mobile: phone, chkcode: chkcode, username: username }, function (result) {
                console.log(result);
                if (result == "codeerro") {
                    $("#chkcodeTip").text("验证码错误");
                } else if (result == "phoneerro") {
                    $("#phonecodeTip").text("手机号或用户名填写错误");
                } else if (result == "numerro") {
                    $(".sendcode").attr("disabled", true);
                    $(".sendcode").val("操作过于频繁..");
                    $(".sendcode").text("操作过于频繁..");
                    $(".sendcode").css("background-color", "#e0e0e0");
                } else if (result == 0) {
                    $("#chkcodeTip").text("");
                    $("#phonecodeTip").text("");
                    $(".sendcode").attr("disabled", true);
                    $(".sendcode").val("正在发送短信..");
                    $(".sendcode").css("background-color", "#e0e0e0");
                    timer = setInterval("CountDown()", 1000);
                } else {
                    $(".sendcode").val("发送失败请重试");
                }
            });
        } else {
            alert("信息填写不完整！");
        }
        return false;   
    }
});
function CountDown() {
    $(".sendcode").val(t + "后重新获取");
    $(".sendcode").text(t + "后重新获取");
    t--;
    if (t <= 0) {
        $(".sendcode").attr("disabled", false);
        $(".sendcode").val("重新获取");
        $(".sendcode").text("重新获取");
        $(".sendcode").css("background-color", "#FDB63C");
        clearInterval(timer);
    }
}