var timer;
var t;
$("#sendcode").click(function () {
    alert(11);
    t = 60;
    var phone = $("#newmobile").val();
    console.log(phone);
    if (phone != "") {
        $.post("/sms.php?action=tel_check", { "mobile": phone }, function (result) {
            if (result == "codeerro") {
                $("#chkcodeTip").text("验证码错误");
                $("#chkcodeTip").removeClass("onShow");
                $("#chkcodeTip").addClass("onError");
            }if (result == 0) {
                $("#sendcode").attr("disabled", true);
                $("#sendcode").val("正在发送短信..");
                $("#sendcode").css("background-color", "#e0e0e0");
                timer = setInterval("CountDown()", 1000);

            } else {
                $("#sendcode").val("发送失败请重试");
            }
        });
    }
});

function CountDown() {
    $("#sendcode").val(t + "后重新获取");
    t--;
    if (t <= 0) {
        $("#sendcode").attr("disabled", false);
        $("#sendcode").val("重新获取");
        $("#sendcode").css("background-color", "#FDB63C");
        clearInterval(timer);
    }
}