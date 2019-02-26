<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding: 10px;">
    <form name="write" method="post" onsubmit="return checkForm()" action="?action=save">
        <table class="table table-bordered table-responsive">
            <tr>
                <td class="right">收件人：</td>
                <td>管理员</td>
            </tr>

           <!-- <tr>
                <td class="right" >标题：</td>
                <td>
                    <input type="text" name="title" class="input" maxlength="50" />
                    <p class="text-danger">撤销投诉消息，标题请按格式回复，如:投诉凭证+处理结果+撤销投诉</p>
                </td>
            </tr>-->

            <tr>
                <td class="right">内容：</td>
                <td>
                    <textarea name="content" cols="50" rows="5" class="input textarea"></textarea>
                    <p class="text-danger">  撤销投诉消息格式：投诉凭证号+投诉人联系方式+处理结果。<br />
                        如：投诉凭证：8059DFDE7368BBD1，买家联系方式：232222；已联系买家补卡完成。</p>
                </td>
            </tr>

            <tr>
                <td class="right"></td>
                <td>
                    <input type="submit" class="btn btn-success" value="发送消息" />
                     
                </td>
            </tr>
    </form>
</div>
<script>
    var checkForm = function () {
        //var title = $.trim($('[name=title]').val());
        //if (title == '') {
        //    alert('标题不能为空！');
        //    $('[name=title]').focus();
        //    return false;
        //}

        var content = $.trim($('[name=content]').val());
        if (content == '') {
            alert('消息内容不能为空！');
            $('[name=content]').focus();
            return false;
        }

        if (content.length > 300) {
            alert('消息内容最多300个字符！');
            $('[name=content]').focus();
            return false;
        }
    }
</script>
