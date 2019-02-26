

/**
 * 检查表单
 * @returns {Boolean}
 */
function checkForm() {
    //alert(document.getElementById("password").value == "请输入登陆密码");
    if (document.getElementById("username").value == "") {
        alert("请输入用户名");
        return false;
    } else if (document.getElementById("username").value != "") {
        var email = document.getElementById("username").value;
        //var isemail = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
        //                    var isemail = /^\w+([-\.]\w+)*@\w+([\.-]\w+)*\.\w{2,4}$/;
        if (email == "请输入用户名") {
            alert("请输入用户名!");
            return false;
        }
        if (email.length < 1) {
            alert("用户名长度不够！");
            return false;
        }
        if (email.length > 30) {
            alert("用户名长度太长！");
            return false;
        }

        if (document.getElementById("password").value == "" || document.getElementById("password").value == "请输入登陆密码") {
            alert("请输入密码");
            return false;
        } else if (document.getElementById("chkcode").value == "" || document.getElementById("chkcode").value == "请输入验证码") {
            alert("请输入验证码");
            return false;
        }
    }
    //alert(document.getElementById("password").value == "请输入登陆密码");
    $("#loginForm").submit();
    return true;
}
