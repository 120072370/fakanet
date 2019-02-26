function Checks() {
    
        }
        else if (document.getElementById("password").value == "请输入登陆密码") {
            alert("请输入密码");
            return false;
        }

        else if (document.getElementById("VerifyCode_txt").value == "" || document.getElementById("VerifyCode_txt").value == "请输入验证码") {
            alert("请输入验证码");
            return false;
        }
        else {
            return true;
        }
    }

    else {
        return true;
    }
}

function Search() {
    if (document.getElementById("js_search_q_input").value == "") {
        alert("请输入订单号");
        return false;
    }
    else if (document.getElementById("js_search_q_input").value != "") {
        var input = document.getElementById("js_search_q_input").value;
        var isemail = /^[0-9]*[1-9][0-9]*$/;
        if (input == "请输入订单号") {
            alert("请输入订单号!");
            return false;
        }
        if (input.length < 17) {
            alert("你输入的订单号不正确!");

            return false
        }
        else {
            return true;
        }
    }

    else {
        return true;
    }
}

function Login() {
    
        }
        else if (document.getElementById("password").value == "") {
            alert("请输入密码");
            return false;
        }

        else if (document.getElementById("img_valid").value == "" || document.getElementById("img_valid").value == "请输入验证码") {
            alert("请输入验证码");
            return false;
        }
        else {
            return true;
        }
    }

    else {
        return true;
    }
}         