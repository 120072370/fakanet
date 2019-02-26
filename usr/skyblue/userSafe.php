<?php if(!defined('WY_ROOT')) exit; ?>
<style>
   .table_style_2 {
        margin: 8px 0;
    }

    .table_style_2 td {
        padding: 0;
        height: 32px;
    }

    td span.red {
        color: red;
    }

    .title {
        border-bottom: 1px solid #ccc;
        line-height: 25px;
        padding-left: 10px;
        background: #f1f1f1;
    }
</style>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">安全设置</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">修改保存成功</div><?php endif; ?>
                    <?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">修改保存失败</div><?php endif; ?>
                    <?php if(_G('edit_err_1')): ?><div id="tipMsg" class="errmsg">安全密码输入错误</div><?php endif; ?>
                    <script>setTimeout(hideMsg, 2600)</script>

                    <form name="pwcardset" method="post" onsubmit="return checkFormIsPwCard()" action="?action=saveispwcard">
                        <div class="alert alert-success"><span class="green bold">口令卡设置</span>&nbsp<span style="font-size: 12px; font-weight: 100; color: #666">用于商户登陆安全口令验证</span></div>
                        <table class="table_style_2">
                            <?php if($_SESSION['pwcardsn']): ?>
                            <tr>
                                <td width="100" class="bold right">安全开关: </td>
                                <td>
                                    <input type="radio" name="is_pwcard" value="1" id="r1" <?php echo isset($_SESSION['is_pwcard']) && $_SESSION['is_pwcard']==1 ? 'checked' : '' ?>><label for="r1">开启</label>&nbsp;&nbsp;
						<input type="radio" name="is_pwcard" value="2" id="r2" <?php echo isset($_SESSION['is_pwcard']) && $_SESSION['is_pwcard']==2 ? 'checked' : '' ?>><label for="r2">关闭</label>
                                </td>
                            </tr>

                            <tr>
                                <td class="bold right">密保卡坐标:</td>
                                <td>
                                    <div style="padding: 2px 0; text-align: center; background: #f1f1f1; border: 1px solid #ccc; width: 100px; font-family: '微软雅黑','黑体'">
                                        <h2><?php echo $pcc1.' '.$pcc2 ?></h2>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="bold right">对应的数字:</td>
                                <td>
                                    <input type="text" class="input" name="safepwdforispwcard" maxlength="6" /></td>
                            </tr>

                            <tr>
                                <td class="bold right"></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="保存设置" /></td>
                            </tr>

                            <?php else: ?>
                            <tr>
                                <td colspan="2" style="color: red">您还没有生成口令卡，现在<a style="text-decoration: underline; color: blue" href="?action=createPwdCard">立即生成</a>！</td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </form>

                    <script>
                        var checkFormIsPwCard = function () {
                            var pwdcard = $.trim($('[name=safepwdforispwcard]').val());
                            if (pwdcard == '' || pwdcard.length != 6) {
                                alert('坐标对应的数字只能是6位数！');
                                $('[name=safepwdforispwcard]').focus();
                                return false;
                            }

                            return true;
                        }
                    </script>


                    <form name="safekeyset" method="post" onsubmit="return checkFormIsSafe()" action="?action=saveissafe">
                        <div class="alert alert-success"><span class="green bold">修改安全设置</span>&nbsp<span style="font-size: 12px; font-weight: 100; color: #666">用于敏感操作时的验证</span></div>
                        <table class="table_style_2">
                            <tr>
                                <td width="100" class="bold right">安全开关: </td>
                                <td>
                                    <input type="radio" name="is_safe" value="1" id="r1" <?php echo isset($_SESSION['is_safe']) && $_SESSION['is_safe']==1 ? 'checked' : '' ?>><label for="r1">开启</label>&nbsp;&nbsp;
						<input type="radio" name="is_safe" value="2" id="r2" <?php echo isset($_SESSION['is_safe']) && $_SESSION['is_safe']==2 ? 'checked' : '' ?>><label for="r2">关闭</label>&nbsp;&nbsp;<span style="color: #666">打开时，分类、商品、卡密的卡价值、编辑和删除需要验证安全码才能操作</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="bold right">安全密码:</td>
                                <td>
                                    <input type="password" class="input" name="safepwdforissafe" maxlength="20" />&nbsp;&nbsp;<span style="color: #666">需验证安全码才能修改安全开关</span></td>
                            </tr>

                            <tr>
                                <td class="bold right"></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="保存设置" /></td>
                            </tr>
                        </table>
                    </form>

                    <script>
                        var checkFormIsSafe = function () {
                            var safepwd = $.trim($('[name=safepwdforissafe]').val());
                            if (safepwd == '' || safepwd.length < 6 || safepwd.length > 20) {
                                alert('安全密码格式错误，长度在6至20个字符之间！');
                                $('[name=safepwdforissafe]').focus();
                                return false;
                            }

                            return true;
                        }
                    </script>

                    <form name="edit" method="post" onsubmit="return checkFormQuestion()" action="?action=saveQuestion">
                        <div class="alert alert-success"><span class="green bold">修改安全问答</span></div>
                        <table class="table_style_2">

                            <tr>
                                <td width="100" class="bold right">安全密码:</td>
                                <td>
                                    <input type="password" class="input" name="safepwdforqa" maxlength="20" />&nbsp;&nbsp;<span style="color: #666">需验证安全码才能修改安全问题</span></td>
                            </tr>
                            <tr>
                                <td class="bold right">选择问题:</td>
                                <td>
                                    <select name="question" onchange="sq(this.options[this.selectedIndex].value)" class="input" style="width: 206px">
                                        <option value="">不设置问题</option>
                                        <option value="您的母亲的名字是？">您的母亲的名字是？</option>
                                        <option value="您的父亲的名字是？">您的父亲的名字是？</option>
                                        <option value="您上小学时的班主任的名字是？">您上小学时的班主任的名字是？</option>
                                        <option value="您最喜欢的一部电影是？">您最喜欢的一部电影是？</option>
                                        <option value="您最喜欢的一首歌的名字是？">您最喜欢的一首歌的名字是？</option>
                                        <option value="您最喜欢的一本书的名字是？">您最喜欢的一本书的名字是？</option>
                                        <option value="custom">自定义问题</option>
                                    </select>&nbsp;&nbsp;<span style="color: #666">安全提示问题，忘记密码时可用此找回</span>
                                    <div id="custom"></div>
                                </td>
                            </tr>

                            <tr>
                                <td class="bold right">问题答案:</td>
                                <td>
                                    <input type="text" class="input" maxlength="20" name="answer" />
                                    &nbsp;&nbsp;<span style="color: #666">安全提示问题回答</span></td>
                            </tr>

                            <tr>
                                <td class="bold right"></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="保存设置" /></td>
                            </tr>
                        </table>
                    </form>

                    <script>
                        var checkFormQuestion = function () {
                            var safepwd = $.trim($('[name=safepwdforqa]').val());
                            if (safepwd == '' || safepwd.length < 6 || safepwd.length > 20) {
                                alert('安全密码格式错误，长度在6至20个字符之间！');
                                $('[name=safepwdforqa]').focus();
                                return false;
                            }

                            var question = $.trim($('[name=q]').val());
                            if (question == 'custom') {
                                var c_q = $.trim($('[name=custom_question]').val());
                                if (c_q == '') {
                                    $('#err_msg_4').html('请输入自定义问题！');
                                    $('[name=custom_question]').focus();
                                    return false;
                                }
                            }
                            if ($('#err_msg_4').html() != '') { $('#err_msg_4').html(''); }

                            if (question != '') {
                                var answer = $.trim($('[name=answer]').val());
                                if (answer == '') {
                                    $('#err_msg_5').html('请输入问题答案！');
                                    $('[name=answer]').focus();
                                    return false;
                                }
                            }
                            return true;
                        }
                        if ($('#err_msg_5').html() != '') { $('#err_msg_5').html(''); }

                        var sq = function (val) {
                            if (val == 'custom') {
                                $('#custom').html('<br><input type=text class=input size=40 name=custom_question maxlength=50> <span class="red" id=err_msg_4></span>');
                            } else {
                                $('#custom').html('');
                            }
                        }
                    </script>

                    <form name="safeislogin" method="post" onsubmit="return checkFormIsLogin()" action="?action=saveisLogin">
                        <div class="alert alert-success"><span class="green bold">修改唯一登陆</span></div>
                        <table class="table_style_2">

                            <tr>
                                <td width="100" class="bold right">安全密码:</td>
                                <td>
                                    <input type="password" class="input" name="safepwdforislogin" maxlength="20" /></td>
                            </tr>

                            <tr>
                                <td class="bold right">唯一登陆:</td>
                                <td>
                                    <input type="radio" name="is_login" value="1" id="radio1" <?php echo isset($_SESSION['is_login']) && $_SESSION['is_login']==1 ? 'checked' : '' ?> />
                                    <label for="radio1">开启</label>
                                    &nbsp;&nbsp;
						<input type="radio" name="is_login" value="0" id="radio2" <?php echo isset($_SESSION['is_login']) && $_SESSION['is_login']==0 ? 'checked' : '' ?> />
                                    <label for="radio2">关闭</label>
                                    <div class="h10"></div>
                                    <div class="gray">开启后，同一个商户账号多台电脑或同一台电脑多个浏览器只能登陆一个，且最后一次登陆有效！</div>
                                </td>
                            </tr>

                            <tr>
                                <td class="bold right"></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="保存设置" /></td>
                            </tr>
                        </table>
                    </form>

                    <script>
                        var checkFormIsLogin = function () {
                            var safepwd = $.trim($('[name=safepwdforislogin]').val());
                            if (safepwd == '' || safepwd.length < 6 || safepwd.length > 20) {
                                alert('安全密码格式错误，长度在6至20个字符之间！');
                                $('[name=safepwdforislogin]').focus();
                                return false;
                            }

                            return true;
                        }
                    </script>


                    <form name="edit" method="post" onsubmit="return checkFormSafePwd()" action="?action=saveSafePwd">
                        <div class="alert alert-success"><span class="green bold">修改安全密码</span></div>
                        <table class="table_style_2">

                            <tr>
                                <td width="100" class="bold right">旧安全密码:</td>
                                <td>
                                    <input type="password" class="input" name="oldsafepwd" maxlength="20" /></td>
                            </tr>

                            <tr>
                                <td class="bold right">新安全密码:</td>
                                <td>
                                    <input type="password" class="input" name="newsafepwd" maxlength="20" /></td>
                            </tr>

                            <tr>
                                <td class="bold right">确认新安全密码:</td>
                                <td>
                                    <input type="password" class="input" name="confirmnewsafepwd" maxlength="20" /></td>
                            </tr>

                            <tr>
                                <td class="bold right"></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="保存设置" /></td>
                            </tr>
                        </table>
                    </form>

                    <script>
                        var checkFormSafePwd = function () {
                            var oldsafepwd = $.trim($('[name=oldsafepwd]').val());
                            if (oldsafepwd == '' || oldsafepwd.length < 6 || oldsafepwd.length > 20) {
                                alert('旧安全密码格式错误，长度在6至20个字符之间！');
                                $('[name=oldsafepwd]').focus();
                                return false;
                            }

                            var newsafepwd = $.trim($('[name=newsafepwd]').val());
                            if (newsafepwd == '' || newsafepwd.length < 6 || newsafepwd.length > 20) {
                                alert('新安全密码格式错误，长度在6至20个字符之间！');
                                $('[name=newsafepwd]').focus();
                                return false;
                            }

                            var confirmnewsafepwd = $.trim($('[name=confirmnewsafepwd]').val());
                            if (confirmnewsafepwd != newsafepwd) {
                                alert('两次输入的新安全密码不一样！');
                                $('[name=confirmnewsafepwd]').focus();
                                return false;
                            }

                            return true;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
