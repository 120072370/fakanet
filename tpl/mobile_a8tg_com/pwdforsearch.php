<?php if(!defined('WY_ROOT')) exit; ?>
<link rel="stylesheet" href="tpl/weiqi/css/regapp.css" />
<div style="margin-top: 0px; padding-top: 8px; background-color: #f1f1f1">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">&nbsp;&nbsp;&nbsp;</li>
        ﻿
        <div class="tab-content" style="padding: 10px 20px">
            <div role="tabpanel" class="tab-pane active content_style">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong><?php echo $msg ?>：</strong>
                    </div>
                    <div class="panel-body">
                       <form name="pw" action="<?php echo $url ?>" method="post" onsubmit="return checkForm()">
                           <input type="text" name="pwd" style="border:1px solid #999;padding:5px" maxlength="20" />
                           <button type="submit" class="mui-btn btn-gn">查询</button>

                           </form>

                    </div>
                </div>
            </div>
        </div>
    </ul>
</div>
<script>
    function checkForm() {
        var pwd = $.trim($('[name=pwd]').val());
        var reg = /^([0-9a-zA-Z]+){6,20}$/;
        if (pwd == '' || !reg.test(pwd)) {
            $('[name=pwd]').focus();
            alert('请填写查询密码！长度为6-20个数字、字母或组合！');
            return false;
        }
    }
</script>
