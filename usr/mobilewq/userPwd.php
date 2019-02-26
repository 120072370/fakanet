<?php if(!defined('WY_ROOT')) exit; ?>

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
                <?php if(_G('edit_suc')): ?><div id="tipMsg" class="alert alert-success">密码修改保存成功</div><?php endif; ?>
                <?php if(_G('edit_err')): ?><div id="tipMsg" class="alert alert-danger">密码修改保存失败</div><?php endif; ?>
                <?php if(_G('edit_err_1')): ?><div id="tipMsg" class="alert alert-danger">旧密码输入错误</div><?php endif; ?>
                <script>setTimeout(hideMsg, 2600)</script>
                <form name="edit" method="post" onsubmit="return checkForm()" action="?action=editsave" class="form-horizontal form-groups-bordered">

                     <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">旧密码</label>
                            <div class="col-sm-4">
                                 <input type="password" class="form-control" name="oldpassword" maxlength="20" />
                            </div>
                          <div class="col-sm-4">
                              </div>
                        </div>

                     <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">新密码</label>
                            <div class="col-sm-4">
                                  <input type="password" class="form-control" name="newpassword" maxlength="20" />
                            </div>
                          <div class="col-sm-4">
                              * 密码为6至20个长度的字符
                              </div>
                        </div>
                     <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">重新输入新密码</label>
                            <div class="col-sm-4">
                                  <input type="password" class="form-control" name="confirmpassword" maxlength="20" />
                            </div>
                          <div class="col-sm-4">
                              * 密码为6至20个长度的字符
                              </div>
                        </div>
                    <div class="form-group">
                           
                          <div class="col-sm-4">
                              <input type="submit" class="btn btn-success" value="保存设置" />
                              </div>
                        </div>

                  
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