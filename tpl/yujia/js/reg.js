$(document).ready(function () {
    var username = $("#username").val();
    var password = $("#password").val();
    var passwordCompare = $("#txtConfirmPass").val();
    var email = $("#email").val();
    var qq = $("#qq").val();
    var mobile = $("#mobile").val();
    var branch = $("#branch").val();
    var truename = $("#truename").val();
    var idcard = $("#idcard").val();
    var cardno = $("#cardno").val();
                jQuery.validator.addMethod("idcard_exp",  //身份证验证规则：15位自动将年份变成4位
                    function (value, element, params) {
                        if (value.length == 15 || value.length == 18) {
                            if (value.length == 15) {
                                value = value.substring(0, 6) + "19" + value.substring(6, 15);
                            }
                            var exp = new RegExp(/^((1[1-5])|(2[1-3])|(3[1-7])|(4[1-6])|(5[0-4])|(6[1-5])|71|(8[12])|91)\d{4}((19\d{2}(0[13-9]|1[012])(0[1-9]|[12]\d|30))|(19\d{2}(0[13578]|1[02])31)|(19\d{2}02(0[1-9]|1\d|2[0-8]))|(19([13579][26]|[2468][048]|0[48])0229))\d{3}(\d|X|x)?$/);     //实例化正则对象，参数为传入的正则表达式
                            return exp.test(value);
                        } else {
                            return false;
                        }
                    },
                    "格式错误");

                    jQuery.validator.addMethod("email_exp",  //验证卡号和邮箱账号
                function (value, element, params) {
                    if (value.length > 4 && value.length < 30) {
                        if (value.indexOf("@") != -1) {
                            var exp = new RegExp(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/);     //实例化正则对象，参数为传入的正则表达式
                            return exp.test(value);
                        }
//                        else if (value.indexOf("<") == -1 && value.indexOf(">") == -1 && value.indexOf(" ") == -1) {
//                            var exp = new RegExp("^[0-9]*$");     //实例化正则对象，参数为传入的正则表达式
//                            return exp.test(value);
//                        }

                    } else {
                        return false;
                    }
                },
                "格式错误");

                    jQuery.validator.addMethod("cardno_exp",  //验证卡号和邮箱账号
                function (value, element, params) {
                    if (value.length > 4 && value.length < 30) {
                        if (value.indexOf("@") != -1) {
                            var exp = new RegExp(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/);     //实例化正则对象，参数为传入的正则表达式
                            return exp.test(value);
                        }
                        else if (value.indexOf("<") == -1 && value.indexOf(">") == -1 && value.indexOf(" ") == -1) {
                            var exp = new RegExp("^[0-9]*$");     //实例化正则对象，参数为传入的正则表达式
                            return exp.test(value);
                        }

                    } else {
                        return false;
                    }
                },
                "格式错误");

    jQuery.validator.addMethod("branch_exp",  //验证地址
                function (value, element, params) {
                    if (value.indexOf("<") == -1 && value.indexOf(">") == -1 && value.indexOf(" ") == -1 && value.length < 50) {
                        var exp = new RegExp(/[\u4E00-\u9FA5,.]/);     //实例化正则对象，参数为传入的正则表达式
                        return exp.test(value);
                    } else {
                        return false;
                    }
                },
                "格式错误");

    jQuery.validator.addMethod("qq_exp",  //QQ号码验证5位
                function (value, element, params) {
                    if (value.length > 4 && value.length < 12) {
                        var exp = new RegExp("^[0-9]*$");     //实例化正则对象，参数为传入的正则表达式
                        return exp.test(value);
                    } else {
                        return false;
                    }
                },
                "格式错误");


    jQuery.validator.addMethod("mobile_exp",  //验证手机号码
                function (value, element, params) {
                    if (value.length == 11) {
                        var exp = new RegExp(/^(13[0-9]|15[0-35-9]|18[01235-9]|147|190)([0-9])*$/);
                        return exp.test(value);
                    } else {
                        return false;
                    }
                },
                "格式错误");


    jQuery.validator.addMethod("truename_exp",  //真实姓名必须是中文
                function (value, element, params) {
                    var exp = new RegExp("^[\u4e00-\u9fa5]{0,}$");
                    return exp.test(value);
                },
                "格式错误");

    jQuery.validator.addMethod("username_exp",  //用户名规则检测:第一位必须是A-Za-z
                function (value, element, params) {
                    var exp = new RegExp("^[a-zA-Z][A-Za-z0-9]+$");
                    return exp.test(value);
                }, "格式错误");

    jQuery.validator.addMethod("psw_exp",  //密码规则：不包含><   并且不包含空格
                function (value, element, params) {
                    var exp = new RegExp("^(.){4,16}$");
                    var exp1 = new RegExp("^[\u4e00-\u9fa5]+$");
                    if (value.indexOf("<") == -1 && value.indexOf(">") == -1 && value.indexOf(" ") == -1 && exp1.test(value) == false) {
                        return exp.test(value);
                    } else {
                        return false;
                    }
                }, "格式错误");

    jQuery.validator.addMethod("repeat", //判断同一字符重复出现
		     function (value, element) {
		         var flag = false;
		         var vaus = value.substring(0, 1)
		         for (var i = 1; i < value.length; i++) {
		             var valsub = value.substring(i, i + 1);
		             if (vaus != valsub) { flag = true; return flag; }
		         }
		         return flag;
		     }, "请勿使用连续字符设置密码，请您重新输入！");

    jQuery.validator.addMethod("continuous", //判断连续字符密码
		     function (value, element) {
		         var str1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		         var str2 = "abcdefghijklmnopqrstuvwxyz";
		         var str3 = "0123456789";
		         var flag = true;
		         var exp = new RegExp("^[a-z]+$");
		         var lower = exp.test(value);

		         //如果是非小写字母
		         if (isNaN(value) == true && lower == false) {
		             for (var i = 0; i < str1.length; i++) {
		                 if (value.substring(0, value.length) == str1.substring(i, i + value.length)) {
		                     flag = false;
		                     return flag;
		                 }
		             }
		             return flag;
		         }
		         //如果是小写字母
		         if (isNaN(value) == true && lower == true) {
		             for (var i = 0; i < str2.length; i++) {
		                 if (value.substring(0, value.length) == str2.substring(i, i + value.length)) {
		                     flag = false;
		                     return flag;
		                 }
		             }
		             return flag;
		         }
		         //如果是数字
		         if (isNaN(value) == false) {
		             for (var i = 0; i < str3.length; i++) {
		                 if (value.substring(0, value.length) == str3.substring(i, i + value.length)) {
		                     flag = false; return flag;
		                 }
		             }
		             return flag;
		         }
		     }, "请勿使用连续字符设置密码，请您重新输入！");

    //表单验证
    $(".reg_form").validate({
        //debug:true,
        errorElement: "span",
        onkeyup: false,
        onblur: true,
        rules: {
            email: {
                required: true,
                minlength: 8,
                maxlength: 30,
                email_exp: true,
                remote: {
                    url: "Tools/CheckUser.ashx",
                    type: "GET",
                    data: {
                        email: function () { return $("input[name='email']").val() },
                        r: Math.random()
                    }
                }
            },
            password: {
                required: true,
                minlength: 4,
                maxlength: 16,
                psw_exp: true,
                repeat: true,
                continuous: true
            },
            passwordCompare: {
                required: true,
                minlength: 4,
                maxlength: 16,
                equalTo: ".psw_check"
            },
//            email: {
//                required: true,
//                email_exp: true
//            },
            qq: {
                required: true,
                qq_exp: true
            },
            mobile: {
                required: true,
                mobile_exp: true
            },
            branch: {
                required: true,
                branch_exp: true
            },
            truename: {
                required: true,
                minlength: 2,
                maxlength: 8,
                truename_exp: true
            },
            idcard: {
                required: true,
                idcard_exp: true
            },
            cardno: {
                required: true,
                cardno_exp: true
            },
            extender: {
                remote: "http://extend.gyyx.cn/ExtendManage/CheckExist?jsoncallback=?"
            },
            checkcode: {
                required: true,
                remote: {
                    url: "http://account.gyyx.cn/ValidateCode/CheckValidateCode/",
                    type: "GET",
                    data: {
                        validateCode: function () { return $("input[name='checkcode']").val() },
                        r: Math.random()
                    }
                }
            },
            agree: {
                required: true
            }
        },
        messages: {
            username: {
                required: "此项为必填项",
                minlength: "对不起，您的格式错误，请重新输入！",
                maxlength: "对不起，您的格式错误，请重新输入！",
                username_exp: "对不起，您的格式错误，请重新输入！",
                remote: jQuery.format("{0} 用户名已被使用，请您重新填写用户名！")
            },
            password: {
                required: "此项为必填项",
                minlength: "密码须在4-16字符之间，请您重新输入！",
                maxlength: "密码须在4-16字符之间，请您重新输入！",
                psw_exp: "对不起，格式不正确，请您重新输入！",
                repeat: "请勿使用连续字符设置密码，请您重新输入！",
                continuous: "请勿使用连续字符设置密码，请您重新输入！"
            },
            passwordCompare: {
                required: "此项为必填项",
                minlength: "密码必须在4-16个字符之间，请您重新输入！",
                maxlength: "密码必须在4-16个字符之间，请您重新输入！",
                equalTo: "两次输入的密码不一致，请重新输入！"
            },
            email: {
                required: "此项为必填项",
                minlength: "登录邮箱格式不正确，请输入正确的邮箱地址",
                maxlength: "登录邮箱格式不正确，请输入正确的邮箱地址",
                email_exp: "登录邮箱格式不正确，请输入正确的邮箱地址",
                remote: jQuery.format("{0} 用户名已被使用，请您重新填写用户名！")
            },
            qq: {
                required: "此项为必填项",
                qq_exp: "QQ不正确，请输入正确的QQ号码"
            },
            mobile: {
                required: "此项为必填项",
                mobile_exp: "手机号码不正确，请输入正确的手机号码"
            },
            branch: {
                required: "此项为必填项",
                branch_exp: "请输入正确的开户行地址或分行名称"
            },
            truename: {
                required: "此项为必填项",
                minlength: "您输入的格式错误，真实姓名只能填写中文",
                maxlength: "您输入的格式错误，真实姓名只能填写中文",
                truename_exp: "您输入的格式错误，真实姓名只能填写中文"
            },
            idcard: {
                required: "此项为必填项",
                idcard_exp: "您输入的身份证号码不正确，请重新填写"
            },
            cardno: {
                required: "此项为必填项",
                cardno_exp: "您输入的收款帐号不正确，请重新填写"
            },
            extender: {
                remote: "推广员账号错误"
            },
            checkcode: {
                required: "此项为必填项",
                remote: function () {
                    $(".flash_pagecode").attr("src", "CheckCode.aspx?fileName=" + Math.random() + ".png");
                    return "对不起，您输入的验证码不正确";
                }
            },
            agree: {
                required: "此项为必填项"
            }
        }
    });
});

        function refresh() {
            document.getElementById("authImg").src = '*.images?now=' + new Date();
        }
        jQuery(function ($) {
            changeBank($("#idBank").val());

            $("#idAdd").click(function () {
                if (!chkUser()) {
                    return;
                }

                var vercode = $("#idVercode").val();
                if (vercode == "") {
                    alert("请输入验证码");
                    $("#idVercode").focus();
                    return;
                }

                $.ajax
	    ({
	        type: "post",
	        url: "/gamemanager/checkSameName.html",
	        data: "userName999=" + $("#idUserName999").val(),
	        success: function (re) {
	            var result = eval("(" + re + ")");
	            if (result.info == "fail") {
	                alert("该商户名称已被注册");
	                $("#idUserName999").select();
	                return;
	            }
	            else {
	                document.addUserForm.submit();
	            }
	        }
	    });
            });

            $("#idBank").change(function () {
                changeBank($(this).val());
            });
        });
        function changeBank(bank) {
            if (bank == "5") {
                $("#div_openingBank1").css("display", "none");
                $("#info_openingBank1").css("display", "none");
                $("#div_openingBank").css("display", "none");
                $("#info_openingBank").css("display", "none");
                $("#li_bankUser").html("收款姓名：<span>*</span>");
                $("#li_bankAccount").html("ＱＱ账号：<span>*</span>");
            }
            else if (bank == "4") {
                $("#div_openingBank1").css("display", "none");
                $("#info_openingBank1").css("display", "none");
                $("#div_openingBank").css("display", "none");
                $("#info_openingBank").css("display", "none");
                $("#li_bankUser").html("收款姓名：<span>*</span>");
                $("#li_bankAccount").html("支付宝账号：<span>*</span>");
            }
            else {
                $("#div_openingBank1").css("display", "block");
                $("#info_openingBank1").css("display", "block");
                $("#div_openingBank").css("display", "block");
                $("#info_openingBank").css("display", "block");
                $("#li_bankUser").html("开户姓名：<span>*</span>");
                $("#li_bankAccount").html("银行账号：<span>*</span>");
            }
        }
