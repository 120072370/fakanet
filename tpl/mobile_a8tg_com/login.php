<?php if(!defined('WY_ROOT')) exit;?>
<link rel="stylesheet" href="tpl/mobile_a8tg_com/css/regapp.css" />
<link rel="stylesheet" href="tpl/mobile_a8tg_com/css/footstrap.css" />
<div style="margin-top: 0px; padding-top: 8px; background-color: #f1f1f1">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">&nbsp;&nbsp;&nbsp;</li>
        <script type="text/JavaScript">
<!--
    function MM_goToURL() { //v3.0
        var i, args = MM_goToURL.arguments; document.MM_returnValue = false;
        for (i = 0; i < (args.length - 1) ; i += 2) eval(args[i] + ".location='" + args[i + 1] + "'");
    }
    //-->http://www.219ka.com/
        </script>
        <li role="presentation" class="active"><a href="#">商户登录</a></li>
    </ul>
    <div class="tab-content" style="padding: 10px 20px">
        <div role="tabpanel" class="tab-pane active content_style">

            <form method="post" action="/userlogin.htm">
                <div class="form-group">
                    <label>用户名：</label>
                    <div class="userbox">
                        <input class="form-control" id="username" placeholder="手机号/用户名" name="username" required="" type="text">
                    </div>
                </div>

                <div class="field">
                    <label>密码：</label>
                    <div class=" pwd">
                        <input class="form-control" id="password" name="password" required="" type="password">
                    </div>
                    <div class="form-group">
                        <label for="chkcode">验&nbsp;证&nbsp;码</label>
                        <input class="form-control" id="chkcode" name="chkcode" required="" type="text">
                        <span class="input-group-addon">
                            <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="../includes/libs/chkcode.htm" class="chkcode" title="点击刷新验证码" height="50" align="absmiddle"></span>
                    </div>
                </div>
                <div class="field submitlogin">

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">立即登录</button>
                        <a href="/register.htm" class="btn btn-default btn-block">注册新用户</a>
                        <p class="text-center" style="margin-top: 10px"><a href="retpwd.htm">找回密码？</a></p>

                    </div>
                </div>
            </form>
        </div>
    </div>
