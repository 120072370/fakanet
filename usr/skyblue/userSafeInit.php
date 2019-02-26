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
</style>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">初始化安全设置</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">安全设置保存成功</div><?php endif; ?>
                    <?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">安全设置保存失败</div><?php endif; ?>
                    <?php if(_G('edit_err_1')): ?><div id="tipMsg" class="errmsg">登陆密码错误</div><?php endif; ?>
                    <script>setTimeout(hideMsg, 2600)</script>
                    <form name="edit" method="post" onsubmit="return checkForm()" action="?action=safeinit">
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td width="120" class="bold right">登陆密码:</td>
                                <td>
                                    <input type="password" class="input" name="userpwd" maxlength="20" />
                                    <span id="err_msg_1" class="red"></span></td>
                            </tr>

                            <tr>
                                <td class="bold right">安全密码:</td>
                                <td>
                                    <input type="password" class="input" name="safepwd" maxlength="20" />
                                    <span id="err_msg_2" class="red"></span></td>
                            </tr>

                            <tr>
                                <td class="bold right">重新输入安全密码:</td>
                                <td>
                                    <input type="password" class="input" name="confirmsafepwd" maxlength="20" />
                                    <span id="err_msg_3" class="red"></span></td>
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
                                    </select>
                                    <div id="custom"></div>
                                </td>
                            </tr>

                            <tr>
                                <td class="bold right">问题答案:</td>
                                <td>
                                    <input type="text" class="input" maxlength="20" name="answer" />
                                    <span id="err_msg_5" class="red"></span></td>
                            </tr>

                            <tr>
                                <td class="bold right">唯一登陆:</td>
                                <td>
                                    <input type="radio" name="is_login" value="1" id="radio1" /><label for="radio1">开启</label>
                                    <input type="radio" name="is_login" value="0" id="radio2" checked /><label for="radio2">关闭</label>
                                    <span style="background-color: yellow; border: 1px solid orange; color: black; line-height: 20px; padding-left: 5px; position: absolute">开启后,同一账号多台电脑或同一台电脑多个浏览器只能登陆一个,且最后一次登陆有效！</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="bold right"></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="保存设置" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var checkForm = function () {
            var userpwd = $.trim($('[name=userpwd]').val());
            if (userpwd == '' || userpwd.length < 6 || userpwd.length > 20) {
                $('#err_msg_1').html('请输入登陆密码！长度在6至20个字符之间！');
                $('[name=userpwd]').focus();
                return false;
            }
            if ($('#err_msg_1').html() != '') { $('#err_msg_1').html(''); }

            var safepwd = $.trim($('[name=safepwd]').val());
            if (safepwd == '' || safepwd.length < 6 || safepwd.length > 20) {
                $('#err_msg_2').html('请输入安全密码！长度在6至20个字符之间！');
                $('[name=safepwd]').focus();
                return false;
            }
            if ($('#err_msg_2').html() != '') { $('#err_msg_2').html(''); }

            var confirmsafepwd = $.trim($('[name=confirmsafepwd]').val());
            if (confirmsafepwd != safepwd) {
                $('#err_msg_3').html('两次输入的安全不一样！');
                $('[name=confirmsafepwd]').focus();
                return false;
            }
            if ($('#err_msg_3').html() != '') { $('#err_msg_3').html(''); }

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
</div>
