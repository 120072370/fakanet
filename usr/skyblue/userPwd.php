<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    table.table_style_2 {
        border: 1px solid #eaeaea;
        width: 68%;
    }

        table.table_style_2 td {
            padding: 0;
            height: 40px;
            padding: 8px 15px;
        }

            table.table_style_2 td:nth-child(1) {
                width: 30%;
                background: #f5f4ff;
                font-weight: bold;
                border-right: 1px solid #eaeaea;
            }

            table.table_style_2 td:nth-child(2) {
                text-align: left;
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
            <div class="panel-title">登陆密码修改</div>
        </div>
        <!-- panel body -->
        <div class="panel-body">
            <div class="main">
                <?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">密码修改保存成功</div><?php endif; ?>
                <?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">密码修改保存失败</div><?php endif; ?>
                <?php if(_G('edit_err_1')): ?><div id="tipMsg" class="errmsg">旧密码输入错误</div><?php endif; ?>
                <script>setTimeout(hideMsg, 2600)</script>
                <form name="edit" method="post" onsubmit="return checkForm()" action="?action=editsave">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td width="120" class="bold right">旧密码:</td>
                            <td>
                                <input type="password" class="input" name="oldpassword" maxlength="20" />
                                * 密码为6至20个长度的字符</td>
                        </tr>

                        <tr>
                            <td class="bold right">新密码:</td>
                            <td>
                                <input type="password" class="input" name="newpassword" maxlength="20" /></td>
                        </tr>

                        <tr>
                            <td class="bold right">重新输入新密码:</td>
                            <td>
                                <input type="password" class="input" name="confirmpassword" maxlength="20" /></td>
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
    <script>
        var checkForm = function () {
            var oldpassword = $.trim($('[name=oldpassword]').val());
            if (oldpassword == '') {
                alert('旧密码不能为空！');
                $('[name=oldpassword]').focus();
                return false;
            }

            if (oldpassword.length < 6 || oldpassword.length > 20) {
                alert('旧密码长度为6至20个字符之间！');
                $('[name=oldpassword]').focus();
                return false;
            }

            var newpassword = $.trim($('[name=newpassword]').val());
            if (newpassword == '') {
                alert('新密码不能为空！');
                $('[name=newpassword]').focus();
                return false;
            }

            if (newpassword.length < 6 || newpassword.length > 20) {
                alert('新密码长度为6至20个字符之间！');
                $('[name=newpassword]').focus();
                return false;
            }

            var confirmpassword = $.trim($('[name=confirmpassword]').val());
            if (confirmpassword != newpassword) {
                alert('两次输入的新密码不一样！');
                $('[name=confirmpassword]').focus();
                return false;
            }
            return true;
        }
    </script>
</div>
</div>