/*
www.gyyx.cn
更新时间：2012/4/9
By yanli
*/
//document.domain = "gyyx.cn";
var aurl = "";
var SnsUserInfo = {};
//$.getScript("http://a.gyyx.cn/StatServer.ashx?v=&s=14&r=" + escape(document.referrer) + "&rand=" + Math.random());
$(document).ready(function () {

    $("form input[type='text']").attr({ "autocomplete": "off" });


    //表单项焦点事件绑定
    $(".tips").hide();
    $("p").find("input").focus(function () {
        var obj = $(this);
        var t = $(this).val();
        var $tips = $(this).siblings(".tips");
        if (t.length == 0) {
            $(".tips").hide();
            $tips.show();
            $(this).siblings(".error").hide();
            $tips.mouseover(function () {
                obj.unbind('blur');
                $tips.mouseout(function () {
                    obj.blur(function () { $tips.hide(); });
                });
            });

        }
        $(this).siblings(".rep_tg").remove();
    });
    //取消原因焦点事件绑定开始   By yanli 2011.11.14
    $(".sec_txt").focus(function () {
        var t = $(this).val();
        if (t.length == 0) {
            $(".tips").show();
        }
    });
    $(".sec_txt").keyup(function () {
        var t = $(this).val();
        if (t.length != 0) {
            $(".tips").hide();
        }
        if (t.length == 0) {
            $(".tips").show();
        }
    });
    $(".sec_txt").blur(function () {
        $(".tips").hide();
        var t = $(this).val();
        if (t.length > 0) { // 最小长度限制从10修改为0
            if ($(this).attr("class").indexOf("valid") != -1) {
                $(this).after('<span class="rep_tg"></span>');
            }
        }
    });
    //取消原因焦点事件绑定结束   By yanli 2011.11.14

    $("p[class!='spacon']").find("input[type='text'], input[type='password']").blur(function () {
        var t = $(this).attr('id'); /* By yanli 2011.11.23 */
        $(this).siblings(".tips").hide();
        var logform = $(".Login_form").attr("class");
        if ($(this).attr('lang') != 'datePicker') {
            if (($(this).valid()) && logform != "Login_form" && t != 'extension' && $(this).val().length > 0) {   //yanli	2012.4.8
                $(this).after('<span class="rep_tg"></span>');
            } else {
                $(this).siblings(".rep_tg").remove();
            }
        }
    });
    $("p").find("input").bind("keyup", function () {
        var t = $(this).val();
        if (t.length == 0) {
            $(this).siblings(".tips").show();
            $(this).siblings(".error").remove();
        } else {
            $(this).siblings(".tips").hide();
        }
    });

    $(".psw_check").bind("keyup", function (e) {    /* By yanli 2012.3.23  */
        var a = $.CheckStr($(this).val());
        var t = $("#Strength");
        $(this).siblings("span.error, span.rep_tg, span.m_fault, .error_w2, .gerror_w2").remove();
        $("span.rep_gray").show();
        if ($(this).val().length == 0) { $(this).siblings(".tips").show(); $("span.rep_gray").hide(); }
        if (a == 0) t.attr("class", "rep_orange_ruo");
        if (a == 1) t.attr("class", "rep_orange_zhong");
        if (a == 2) t.attr("class", "rep_orange_qiang");

        $(".psw_check").bind("mouseup", function () {
            $(this).siblings("span.error, span.rep_tg, span.m_fault, .error_w2, .gerror_w2").remove();
            if ($(this).val().length > 0) { $("span.rep_gray").show(); }
        });
    });

    $(".psw_check").bind("blur", function () {
        $(this).siblings("span.rep_gray").hide();
    });
    //绑定推广员表单功能
    $("input[name='extender']").bind("focus", function () {
        $(this).select();
    });

    //绑定刷新验证码事件
    $(".flash_pagecode").bind("click", function () {
        $("input[name='checkcode']").focus();
        $(this).attr("src", "CheckCode.aspx?fileName=" + Math.random() + ".png");
    });
    $(".flash_pagecode").css("cursor", "pointer");
    $(".flash_pagecode").attr("title", "点击刷新");
    $(".f_pagecode_txt").attr({ 'href': 'javascript:void(0);' });
    $(".f_pagecode_txt").bind("click", function () {
        $("input[name='checkcode']").focus();
        $(".flash_pagecode").attr("src", "CheckCode.aspx?fileName=" + Math.random() + ".png");
        return false;
    });

    //载入通行证页面顶部 2011/12/31
    $(".mtopbj").TopLoading(".llogin");


    //载入通行证页面底部导航
//    $.getScript("http://www.gyyx.cn/inc/top_bottom.js?r=" + Math.random(), function () {
//        $('.head_login').html(HtmlStr.head_login);
//        $('.head_logout').html(HtmlStr.head_logout);
//        $('.bottom').html(HtmlStr.bottom);
//        //头部广告背景图片
//        $(".header").css({ "background": HtmlStr.headerAd.backimg });
//        //头部logo链接地址
//        $.getScript("http://static.gyyx.cn/stage/gyyx_banner.js?r=" + Math.random(), function () {
//            $(".gh a").attr({ "href": bannerHref.logoHref,
//                "target": bannerHref.target
//            });
//        });
        
//        //头部导航对应效果
//        $(".mnav li a").each(function () {
//            var url = location.href;
//            var urlweb = url.split("/")[2];
//            var href = $(this).attr("href");
//            var href = href.split("/")[2];
//            if (urlweb == href) {
//                $(this).parent().addClass("on");
//                $(this).parent().siblings().removeClass("on");
//                return false;
//            }
//        });
//    });

    //绑定密码找回功能鼠标样式 2011/11/1
    $(".code_filegray, .code_mailgray, .code_phonegray").css({
        cursor: function () {
            $(this).children("a").attr("href", "javascript:void(0);");
            return "default";
        }
    });
    $(".code_file, .code_mail, .code_phone, .code_old, .code_card").css({ //2012-03-21 添加 old 和card
        cursor: function () {
            var href = $(this).children("a").attr("href");
            $(this).click(function () {
                location.href = href;
            });
            return "pointer";
        }
    });

    //隐藏服务器端错误汇总信息 2011/11/1
    $('div.m_fault1').css({
        display: function () {
            if ($(this).text() == "") {
                return "none";
            } else {
                return "block";
            }
        }
    });

    //为SNS链接绑定参数
    $("a[href='http://my.gyyx.cn/']").locationSnsUrl();
});

$.extend({
    //计算字符复杂程度
    CheckStr: function (s) {
        var ls = 0; //0：弱 1：中 2：强
        if (s.match(/[0-9]/g)) ls++;
        if (s.match(/[a-zA-Z]/g)) ls++;
        //if(s.match(/[A-Z]/g)) ls++;
        if (s.match(/[^0-9a-zA-Z]/g)) ls++;
        if (s.length >= 1 && s.length <= 3) {
            ls = 0;
        } else if ((s.length >= 4 && s.length <= 9) && ls == 1) {
            ls = 0;
        } else if ((s.length >= 10 && s.length <= 16) && ls == 1) {
            ls = 1;
        } else if ((s.length >= 4 && s.length <= 6) && ls == 2) {
            ls = 0;
        } else if ((s.length >= 7 && s.length <= 9) && ls == 2) {
            ls = 1;
        } else if ((s.length >= 10 && s.length <= 16) && ls == 2) {
            ls = 2;
        } else if ((s.length >= 4 && s.length <= 9) && ls == 3) {
            ls = 1;
        } else if ((s.length >= 10 && s.length <= 16) && ls == 3) {
            ls = 2;
        }
        if (ls > 2) ls = 2;
        return ls;
    },
    Timer: function (obj, s) {//短信发送倒计时
        var loop = setInterval(function () {
            if (s > 1) {
                s = s - 1;
                obj.text(s);
            } else {
                clearInterval(loop);
                obj.closest('span').html('<a href="javascript:void(0);">重发短信</a>');
                $('.m_yzm1 a').bind('click', function () {
                    $.ajax({
                        url: aurl + "?r=" + Math.random() + "&tmpkey=" + $('#tmpid').val(),
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        data: {
                            ramcode: function () { return $(".ramcode").val() },
                            __RequestVerificationToken: function () { return $("input[name='__RequestVerificationToken']").val() }
                        },
                        success: function (data) {
                            var d = data.IsLogin;
                            if (d) {
                                if (!data.IsSuccess) {
                                    $(".m_yzm1").empty();
                                    $(".m_yzm1").html(data.Message);
                                } else {
                                    if ($("b.s").size() == 0) {
                                        $(".m_yzm1").html("<b class='s'>" + data.PushTime + "</b>秒后可再次获取。");
                                        $.Timer($("b.s"), data.PushTime);
                                    }
                                }
                            } else {
                                $(".m_yzm1").html("<a href='" + data.LoginUrl + "'>" + data.Message + "</a>");
                            }
                        }
                    });
                });
            }
        }, 1000);
    }
});

jQuery.fn.extend({
    PageTimer: function (s, url) {//页面计时跳转功能
        if (s > 1) {
            s = s - 1;
            this.text(s);
            $('input:eq(0)').val(s);
        } else {
            location.href = url;
        }
    },
    GetMail: function () {//重发认证邮箱信件
        this.attr("link", $(this).attr("href"));
        this.attr("href", "javascript:void(0);");
        this.bind("click", function () {
            var Murl = $(this).attr("link");
            var input = $("input[name='__RequestVerificationToken']");
            $.ajax({
                url: Murl + "?r=" + Math.random(),
                type: "POST",
                dataType: "json",
                cache: false,
                data: {
                    __RequestVerificationToken: function () { return input.val(); },
                    tmpKey: $("input[name='tmpKey']").val()
                },
                success: function (data) {
                    var d = data.IsLogin;
                    var c = data.IsSuccess;
                    var e = data.Message;
                    var url = data.LoginUrl;
                    if (d) {
                        if (c) {
                            var span = document.createElement("span");
                            //var txt = document.createTextNode(e);
                            $(span).attr({ "class": "mail_dengs1" });
                            $(span).html(e);
                            $(".mail_info").empty();
                            $(".mail_info").append(span);
                            $(".mail_btn").removeAttr("disabled");
                        } else {
                            var span = document.createElement("span");
                            //var txt = document.createTextNode(e);
                            $(span).attr({
                                "class": "mail_dengs1",
                                "style": "color: #999;background: none;padding-left: 70px;white-space:nowrap !important;"
                            });
                            $(span).html(e);
                            $(".mail_info").empty();
                            $(".mail_info").append(span);
                            $(".mail_info").attr({ "style": "white-space:nowrap !important;" });
                        }
                    } else {
                        var a = document.creareElement("a");
                        if (url == null) url = "http://www.gyyx.cn";
                        $(a).attr({ "href": url });
                        $(".mail_info").empty();
                        $(".mail_info").append(a);
                    }
                }
            });
        });
    },
    GotoMail: function () {//自动绑定邮箱跳转地址  By  yanli 2011.11.28
        var Daytank = {
            mail: ["qq.com", "sohu.com", "sina.cn", "sina.com", "126.com", "163.com", "yahoo.com", "yahoo.com.cn", "139.com", "tom.com", "21cn.com", "51.com", "yeah.net"], //常用的http://mail.的邮箱
            www: ["gmail.com", "hotmail.com"]//常用的http://www.的邮箱
        };
        $('.mail_btn').hide();
        var md = $('.mail_addr').text().split("@");
        var Daymd = md[1];
        $.each(Daytank.mail, function (i) {
            if (Daytank.mail[i] == Daymd) {
                md = "http://mail." + Daymd;
                $('.mail_btn').show();
            }
        });
        $.each(Daytank.mail, function (i) {
            if (Daytank.www[i] == Daymd) {
                md = "http://www." + Daymd;
                $('.mail_btn').show();
            }
        });
        this.bind("click", function () {
            location.href = md;
        });
    },
    PushSms: function () {//向绑定手机号码发送验证码
        this.attr("href", "javascript:void(0);");
        this.bind("click", function () {
            $.ajax({
                url: aurl + "?r=" + Math.random() + "&tmpkey=" + $('#tmpid').val(),
                type: "POST",
                dataType: "json",
                cache: false,
                data: {
                    ramcode: function () { return $(".ramcode").val(); },
                    __RequestVerificationToken: function () { return $("input[name='__RequestVerificationToken']").val(); }
                },
                success: function (data) {
                    var d = data.IsLogin;
                    if (d) {
                        if (data.IsSuccess || data.IsCountDown) {
                            if ($("b.s").size() == 0) {
                                $(".m_yzm1").html("<b class='s'>" + data.PushTime + "</b>秒后可再次获取。");
                                $.Timer($("b.s"), data.PushTime);
                            }
                        } else {
                            $(".m_yzm1").empty();
                            $(".m_yzm1").html(data.Message);
                        }
                    } else {
                        $(".m_yzm1").html("<a href='" + data.LoginUrl + "'>" + data.Message + "</a>");
                    }
                }
            });

            $(".m_yzm").remove();
        });
        $(".m_yzm1").append($(".m_yzm a")); // by angki  update: 2012/4/8
        $(".m_yzm a").remove(); // by angki  update: 2012/4/8
    },
    SecLevel: function () {//显示用户安全级别
        var $this = $(this);
        var score = $this.val();
        var starClass = {
            'text': 'login_fen',
            'gray': 'l_gray',
            'red': { 'full': 'l_red', 'half': 'l_redb', 'text': 'l_reds' },
            'yellow': { 'full': 'l_yellow', 'half': 'l_yellowb', 'text': 'l_yellows' },
            'green': { 'full': 'l_green', 'half': 'l_greenb', 'text': 'l_greens' }
        }

        var level = function (d) {//判断显示星星的颜色
            if (d <= 4) return starClass.red;
            else if (d > 4 && d < 8) return starClass.yellow;
            else return starClass.green;
        }

        var addItem = function (d) {
            var span_1 = document.createElement('span');
            var span_2 = document.createElement('span');
            var span_3 = document.createElement('span');
            var span_4 = document.createElement('span');
            var span_5 = document.createElement('span');
            var label_1 = document.createElement('label');
            var label_2 = document.createElement('label');
            var txt_1 = document.createTextNode(d * 10);
            var txt_2 = document.createTextNode('分');
            var c = level(d);

            $(span_1).attr({ 'id': 'sc_1', 'class': starClass.gray });
            $(span_2).attr({ 'id': 'sc_2', 'class': starClass.gray });
            $(span_3).attr({ 'id': 'sc_3', 'class': starClass.gray });
            $(span_4).attr({ 'id': 'sc_4', 'class': starClass.gray });
            $(span_5).attr({ 'id': 'sc_5', 'class': starClass.gray });

            $this.after(span_1);
            $(span_1).after(span_2);
            $(span_2).after(span_3);
            $(span_3).after(span_4);
            $(span_4).after(span_5);
            $(label_1).addClass(c.text);
            $(label_1).append(txt_1);
            $(span_5).after(label_1);
            $(label_2).addClass(starClass.text);
            $(label_2).append(txt_2);
            $(label_1).after(label_2);

            if (d % 2 && d - 1 > 0) {
                for (i = 1; i <= (d - 1) / 2; i++) {
                    $('#sc_' + i).addClass(c.full);
                }
                $('#sc_' + (d + 1) / 2).addClass(c.half);
            } else if (d - 1 > 0) {
                for (i = 1; i <= d / 2; i++) {
                    $('#sc_' + i).addClass(c.full);
                }
            } else {
                $('#sc_1').addClass(c.half);
            }
        }

        var count = function (val) {
            var c = val / 10;
            addItem(c);
        }

        count(score);
    },
    CountStr: function (obj) {//计算文本域中字数
        var sLength = 100; 	//最大字数限制
        var $this = $(this);
        var $obj = $(obj);
        var c;
        $obj.text(sLength);
        $this.bind('keydown', function () {
            c = $this.val().length;
            var d = window.event.keyCode;
            if (window.event.keyCode == 13) window.event.returnValue = false;
            if (sLength - c == 0 && d != 8 && (d < 37 && d > 40)) window.event.returnValue = false;
        });
        $this.bind('keyup', function () {
            c = $this.val().length;
            if (sLength - c < 0) {
                $this.val($this.val().substring(0, sLength));
                $obj.text(0);
            } else {
                $obj.text(sLength - c);
            }
        });
    },
    TopLoading: function (LoginObj) {
        var $obj = $(this);
        var $LoginObj = $(LoginObj);

        var BulidingLoginInfoItem = function (item) {

            $LoginObj.empty();

            var div_loguser = document.createElement("div");
            var div_myinfo = document.createElement("div");
            var div_text = document.createElement("div");

            var img = document.createElement("img");

            var p_tit = document.createElement("p");
            var p_goth = document.createElement("p");
            var p_pad = document.createElement("p");
            var p_pmsg = document.createElement("p");
            var p_1 = document.createElement("p");
            var p_2 = document.createElement("p");

            var span_userName = document.createElement("span");
            var span_myrm = document.createElement("span");
            var span_mygm = document.createElement("span");
            var span_spc01 = document.createElement("span");

            var a_logout = document.createElement("a");
            var a_goth = document.createElement("a");
            var a_topup = document.createElement("a");
            var a_space = document.createElement("a");
            var a_game = document.createElement("a");
            var a_changeIcon = document.createElement("a");
            var a_profile = document.createElement("a");
            var a_privacy = document.createElement("a");
            var a_setSpace = document.createElement("a");
            var a_msg = document.createElement("a");

            var a_img = document.createElement("a");
            var a_NickName = document.createElement("a");

            $(img).attr({ "src": item.UserAvatar, "alt": item.NickName, "title": item.NickName });

            $(a_img).attr({ "href": "http://home.gyyx.cn/" + item.UserId + "/", "target": "_blank" });
            $(a_img).locationSnsUrl();

            $(a_NickName).attr({ "href": "http://home.gyyx.cn/" + item.UserId + "/", "target": "_blank" });
            $(a_NickName).locationSnsUrl();

            $(a_logout).append("退出");
            $(a_logout).attr({ "href": "http://reg.gyyx.cn/Logout" });

            $(a_goth).append("通行证");
            $(a_goth).attr({ "href": "http://account.gyyx.cn/Member/UserPass", "class": "goth" });

            $(a_topup).append("充值");
            $(a_topup).attr({ "href": "http://pay.gyyx.cn/", "class": "topup" });

            $(a_space).append("我的空间");
            $(a_space).attr({ "href": "http://home.gyyx.cn/" + item.UserId + "/", "target": "_blank" });
            $(a_space).locationSnsUrl();

            $(a_game).append("我的游戏");
            $(a_game).attr({ "href": "http://my.gyyx.cn/game/interestGame.do", "target": "_blank" });
            $(a_game).locationSnsUrl();

            $(a_changeIcon).append("修改头像");
            $(a_changeIcon).attr({ "href": "http://my.gyyx.cn/Setting/UpdateAvatar.do", "target": "_blank" });
            $(a_changeIcon).locationSnsUrl();

            $(a_profile).append("个人资料");
            $(a_profile).attr({ "href": "http://my.gyyx.cn/Setting/BasicInfo.do", "target": "_blank" });
            $(a_profile).locationSnsUrl();

            $(a_privacy).append("隐私设置");
            $(a_privacy).attr({ "href": "http://my.gyyx.cn/Setting/Privacy.do", "target": "_blank" });
            $(a_privacy).locationSnsUrl();

            $(a_setSpace).append("应用设置");
            $(a_setSpace).attr({ "href": "http://my.gyyx.cn/Setting/AppSetting.do", "target": "_blank" });
            $(a_setSpace).locationSnsUrl();

            $(a_msg).append(item.UnReadCount);
            $(a_msg).attr({ "href": "http://my.gyyx.cn/Message/SystemMessage.do", "target": "_blank" });
            $(a_msg).locationSnsUrl();

            $(div_loguser).addClass("loguser");
            $(div_myinfo).addClass("myinfo");
            $(div_text).addClass("text");

            $(p_tit).addClass("tit");
            $(p_pad).addClass("pad");
            $(p_pmsg).addClass("pmsg");

            $(a_img).append(img);
            $(div_loguser).append(a_img);
            $(a_NickName).append(item.NickName);
            $(span_userName).append(a_NickName);
            $(p_tit).append(span_userName);
            $(p_tit).append(a_logout);
            $(p_goth).append(a_goth);
            $(p_goth).append(a_topup);
            $(div_text).append(p_tit);
            $(div_text).append(p_goth);
            $(div_loguser).append(div_text);

            $(span_myrm).addClass("myrm");
            $(span_myrm).append(a_space);
            $(span_mygm).addClass("mygm");
            $(span_mygm).append(a_game);
            $(p_pad).append(span_myrm);
            $(p_pad).append(span_mygm);

            $(p_1).append(a_changeIcon);
            $(p_1).append(a_profile);

            $(p_2).append(a_privacy);
            $(p_2).append(a_setSpace);

            $(p_pmsg).addClass("pmsg");
            $(span_spc01).addClass("spc01");
            $(span_spc01).append(a_msg);
            $(p_pmsg).append(span_spc01);
            $(p_pmsg).append("条新消息");

            $(div_myinfo).append(p_pad);
            $(div_myinfo).append(p_1);
            $(div_myinfo).append(p_2);
            $(div_myinfo).append(p_pmsg);

            $LoginObj.append(div_loguser);
            $LoginObj.append(div_myinfo);
        }

        var ShowLoginInfo = function (userObj) {//载入首页登录用户信息SNS
            if ($LoginObj.html() != null) {
                var oldHtmlStr = $LoginObj.html();
                $.ajax({
                    url: "http://snsapi.gyyx.cn/RecommUser/GetUserInfo.do?jsoncallback=?",
                    dataType: "json",
                    timeout: 5000,
                    data: {
                        gyyxid: userObj.UserID,
                        caller: userObj.Caller,
                        random: userObj.Key,
                        sign: userObj.CheckValue,
                        r: Math.random()
                    },
                    beforeSend: function () {
                        var div = document.createElement("div");
                        var img = document.createElement("img");

                        $(img).attr({
                            "src": "http://www.gyyx.cn/Content/spr/images/loding.gif",
                            "style": "vertical-align: middle;margin-right:5px;"
                        });
                        $(div).append(img);
                        $(div).append("正在加载用户信息...");
                        $(div).attr({ "style": "text-align:center;color:#999;" });
                        $LoginObj.find("p").remove();
                        $LoginObj.append(div);
                    },
                    success: function (data) {
                        if (data.success) {
                            var item = jQuery.parseJSON(data.content);
                            BulidingLoginInfoItem(item);
                        } else {
                            $LoginObj.empty();
                            $LoginObj.html(oldHtmlStr);
                        }
                    },
                    error: function () {
                        var itemobj = {
                            "UserId": 0,
                            "GyyxId": 0,
                            "UserAvatar": "http://www.gyyx.cn/Content/common/images/Unknown_48.jpg",
                            "NickName": userObj.Account,
                            "UnReadCount": 0
                        };
                        BulidingLoginInfoItem(itemobj);
                    }
                });
            }

            if ($("a.SNS_NickName").html() != null) {		//将 p 改成 a ,登录成功后替换 href 属性值。 By 张建 2012/2/3		
                var oldHtmlStr = $LoginObj.html();
                $.ajax({
                    url: "http://snsapi.gyyx.cn/RecommUser/GetUserInfo.do?jsoncallback=?",
                    dataType: "json",
                    timeout: 3000,
                    data: {
                        gyyxid: userObj.UserID,
                        caller: userObj.Caller,
                        random: userObj.Key,
                        sign: userObj.CheckValue,
                        r: Math.random()
                    },
                    success: function (data) {
                        if (data.success) {
                            var item = jQuery.parseJSON(data.content);
                            $("a.SNS_NickName").append(item.NickName);
                            $("a.SNS_NickName").attr({ "href": "http://home.gyyx.cn/" + item.UserId });
                            $("a.SNS_NickName").locationSnsUrl();
                            $("img.SNS_UserPic").attr({ "src": item.UserAvatar });
                            $("a.SNS_UserPic").attr({ "href": "http://home.gyyx.cn/" + item.UserId });
                            $("a.SNS_UserPic").locationSnsUrl();
                        }
                    },
                    error: function () {
                        $("a.SNS_NickName").append(userObj.Account);
                        $("img.SNS_UserPic").attr({ "src": "http://www.gyyx.cn/Content/common/images/Unknown_48.jpg" });
                    }
                });
            }
        }

        var DisplayLoginInfo = function (obj) { //登录成功载入用户信息 by yanli
            $LoginObj.empty();

            var logHtml = '' +
                '<div class="loguser">' +
                '   <div class="text">' +
                '          <p class="tit"><label><strong>通行证帐号</strong></label></p>' +
                '          <p class="tit"><span><a href="http://account.gyyx.cn/Member/UserPass"  target="_blank"> ' + obj.Account + '</a></span> <label><a href="http://reg.gyyx.cn/Logout">退出</a></label></p>' +
                '          <p><a href="http://account.gyyx.cn/Member/UserPass" class="goth">通行证</a><a href="http://pay.gyyx.cn/" class="topup">充值</a><a href="http://change.gyyx.cn/" class="topup">兑换</a></p>' +
                '      </div>' +
                '</div>' +
                '<div class="myinfo">' +
				'    <div class="in_01"><span><a class="phone_index new" href="#"></a></span>' +
                '        <a class="phone_op" href="#"></a></div>' +
			    '</div>';

            $.ajax({
                url: "http://account.gyyx.cn/MobilePhone/IsPhoneAuthed?jsoncallback=?",
                dataType: "jsonp",
                data: {
                    r: Math.random()
                },
                success: function (data) {
                    if (data.Result) {
                        $(".in_01 span a.phone_index").attr({
                            "href": data.IndexUrl
                        });
                        $(".in_01 a.phone_index").append("已通过认证手机");
                        $(".in_01 a.phone_op").attr({
                            "href": data.Url
                        });
                        $(".in_01 a.phone_op").append("修改");
                    } else {
                        $(".in_01 a.phone_index").hide();
                        $(".in_01 span").attr({
                            "class": "in_red"
                        });
                        $(".in_01 span").append("尚未认证手机")
                        $(".in_01 a.phone_op").attr({
                            "href": data.Url
                        });
                        $(".in_01 a.phone_op").append("绑定");
                    }
                }
            });

            $LoginObj.append(logHtml);
        }

        $.ajax({//载入通行证页面顶部导航条 By angki  2011/12/31
            url: "http://reg.gyyx.cn/Login/Status?jsoncallback=?",
            dataType: "json",
            async: false,
            data: { r: Math.random() },
            success: function (data) {
                var div_1 = document.createElement("div");
                var div_2 = document.createElement("div");
                var div_3 = document.createElement("div");
                var span = document.createElement("span");
                var a_1 = document.createElement("a");
                var a_2 = document.createElement("a");
                var a_3 = document.createElement("a");
                var a_4 = document.createElement("a");
                var a_5 = document.createElement("a");

                var uid = [14, 192854751, 192909678];

                SnsUserInfo = data;
                //$("ul.uname").SNS_PopularityUser(".Sns_PopUserFalse"); //载入首页人气玩家信息
                if (data.IsLogin) {
                    var txt = document.createTextNode("您好，");

                    $(a_1).attr({ "href": "http://account.gyyx.cn/Member/UserPass" });
                    $(a_1).append(data.Account);

                    $(a_2).attr({ "href": "http://reg.gyyx.cn/Logout" });
                    $(a_2).append("退出");

                    if (data.IsSimpleUser) {    //判断账号是否完善三项注册资料
                        $(a_5).attr({ "href": "http://account.gyyx.cn/Member/CompleteInfo",
                            "class": "regcolor",
                            "target": "_blank"
                        });
                        $(a_5).append("完善注册资料");
                        $(a_5).show();
                    } else {
                        $(a_5).hide();
                    }

                    /* Show Hot Image by angki 2012/4/9 */
                    $.each(uid, function (i, item) {
                        if (data.UserID == item) $(document).st_tools();
                    });

                    //ShowLoginInfo(data);
                    DisplayLoginInfo(data);
                } else {
                    var txt = document.createTextNode("您好，欢迎来到光宇社区");
                    $(a_1).attr({ "href": "http://reg.gyyx.cn/Login/Index" });
                    $(a_1).append("请登录");

                    $(a_2).attr({ "href": "http://account.gyyx.cn/Member/Register" });
                    $(a_2).append("免费注册");

                    /* del by angki 20130418 不再需要用脚本相应回车事件 */
                    //$(window).keydown(function (event) {
                    //    if (event.keyCode == 13) $("form").submit();
                    //});
                }

                $(span).append(a_1);
                $(span).append(a_2);
                $(span).append(a_5);

                $(div_2).append(txt);
                $(div_2).append(span);
                $(div_2).addClass("nologin");

                $(a_3).attr({ "href": "http://faq.gyyx.cn/jianhu/jz_2010.html", "target": "_blank" });
                $(a_3).append("家长监护");

                $(a_4).attr({ "href": "http://bbs.gyyx.cn/", "target": "_blank" });
                $(a_4).append("游戏论坛");

                $(div_3).append(a_3);
                $(div_3).append(a_4);
                $(div_3).addClass("trlk");

                $(div_1).append(div_2);
                $(div_1).append(div_3);
                $(div_1).addClass("mtop");

                $obj.append(div_1);
            }
        });
    },
    SNS_PopularityUser: function (CtrlObj) {//获取人气玩家列表
        var $this = $(this);
        var $CtrlObj = $(CtrlObj);

        var LoadingJson = function () {
            $.ajax({
                url: "http://snsapi.gyyx.cn/RecommUser/GetPopularityUser.do?jsoncallback=?",
                dataType: "json",
                timeout: 3000,
                data: {
                    gyyxid: SnsUserInfo.UserID,
                    caller: SnsUserInfo.Caller,
                    count: 9,
                    random: SnsUserInfo.Key,
                    sign: SnsUserInfo.CheckValue,
                    r: function () { return Math.random(); }
                },
                success: function (data) {
                    if (data.success) {
                        var item = jQuery.parseJSON(data.content);
                        $this.empty();
                        $.each(item, function (i, d) {
                            var li = document.createElement("li");
                            var _Str = "<a class='snspopuser' target='_blanck' href='http://home.gyyx.cn/" + d.UserId + "/'title='" + d.NickName + "'><img src='" + d.UserAvatar + "' alt='" + d.NickName + "' title='" + d.NickName + "' />" + d.NickName + "</a>";
                            $(li).append(_Str);
                            $this.append(li);
                        });
                        $(".snspopuser").locationSnsUrl();
                    }
                },
                error: function () {
                    $this.empty();
                    var li = document.createElement("li");
                    var _Str = "<div align='center'>暂时没有用户数据</div>";
                    $(li).append(_Str);
                    $this.append(li);
                }
            });
        }

        $CtrlObj.attr({ "href": "javascript:void(0);" });

        $CtrlObj.bind("click", function () {
            LoadingJson();
        });

        LoadingJson();
    },
    locationSnsUrl: function () {
        $(this).attr('href',
                    'http://account.gyyx.cn/Member/Status?redirectURL=' + encodeURIComponent($(this).attr('href')));
    },
    LeftLinkNav: function (OpenObj) {
        var $this = $(this);
        var $OpenObj = $(OpenObj);
        var $OpenClass = OpenObj.replace(".", "");

        $.each($this, function (i, obj) {
            var $thislink = $(obj).find("a").attr("href").replace("#", "");

            $(obj).find("a").attr({
                "rel": $thislink,
                "href": "javascript:void(0);"
            })

            $(obj).find("a").bind("click", function () {
                $("ul." + $(this).attr("rel")).slideToggle("fast", function () {
                    $(obj).find("span").toggleClass("open");
                });
            });

            if ($thislink != $OpenClass) {
                $("ul." + $thislink).hide();
            } else {
                $(obj).find("span").addClass("open");
            }
        });
    },
    OpenLeftNav: function (data) { // Added by Martin 2012/02/06
        var myLi = $("li:contains(" + data + "):first");
        myLi.removeClass("k-plus k-minus k-plus-disabled k-minus-disabled");
        myLi.find(".k-icon").removeClass("k-plus").addClass("k-minus");
        myLi.find(".k-group").css({ "display": "block", "height": "auto", "overflow": "visible" });
    }
});