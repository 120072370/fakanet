<?php if(!defined('WY_ROOT')) exit; ?>
<div class="row">
    <div class="col-md-6">

        <form name="write" method="post" onsubmit="return checkForm()" action="?action=save" class="form-horizontal form-groups-bordered">

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">收件人：管理员</label>
            </div>
           <!-- <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">标题</label>
                <div class="col-sm-4">
                    <input type="text" name="title" class="form-control" maxlength="50" />
                </div>
                <div class="col-sm-4">
                    <span class="text-danger">撤销投诉消息，标题请按格式回复，如:投诉凭证+处理结果+撤销投诉</span>
                </div>
            </div>-->
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">内容</label>
                <div class="col-sm-4">
                    <textarea name="content" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-sm-4">
                    <span class="text-danger">
                        撤销投诉消息格式：投诉凭证号+投诉人联系方式+处理结果。<br />
                        如：投诉凭证：8059DFDE7368BBD1，买家联系方式：232222；已联系买家补卡完成。
                    </span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <input type="submit" class="btn btn-success" value="发送消息" />
                </div>
                <div class="col-sm-4">
                </div>
            </div>

        </form>
    </div>
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
