<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding: 10px; width: 350px;">

    <table>
        <tr>
            <td class="right" height="30">通知模板：</td>
            <td>
                <select id="notmb" name="notmb" onchange="change()">
                    <option value="0" selected="selected">投诉举报通知</option>
                    <option value="1">违规通知-商品问题</option>
                    <option value="2">违规通知-卡密问题</option>
                    <option value="3">商家警告通知</option>
                </select></td>
        </tr>
        <tr>
            <td class="right" height="30">收件人：</td>
            <td>
                <input type="text" name="touser" class="input" value="<?php echo isset($uname) ? $uname :'' ?>" maxlength="50" size="37" /></td>
        </tr>

        <tr>
            <td class="right" height="30">发送微信通知：</td>
            <td>
                <input id="notfiy" name="notfiy" type="radio" value="1" />发送
                <input id="notfiy" name="notfiy" type="radio" checked="checked" value="0" />不发送
            </td>
        </tr>

        <tr>
            <td class="right" height="30">标题：</td>
            <td>
                <input type="text" name="title" class="input" maxlength="100" size="37" value="<?php echo $title?>" /></td>
        </tr>

        <tr>
            <td class="right">内容：</td>
            <td>
                <textarea name="content" cols="34" rows="5" class="input"><?php echo $content ?></textarea></td>
        </tr>

        <tr>
            <td class="right"></td>
            <td>
                <input type="button" onclick="checkForm()" class="button_bg_2" value="发送消息" />
                <span id="msgtip"></span></td>
        </tr>
    </table>
</div>
<script>
    var change = function () {
        var val = $("#notmb").val();
        if (val == 1) {
            $('[name=title]').val($("#notmb").find("option:selected").text());
            $('[name=content]').val("请尽快下架带有QQ、扣扣等字样的商品，三小时之内不修改，立即封号并冻结资金!禁售商品请查看平台公告！");
        } else if (val == 2) {
            $('[name=title]').val($("#notmb").find("option:selected").text());
            $('[name=content]').val("请尽快下架无效卡密，三小时之内不修改，立即封号并冻结资金!具体规则请查看平台公告！");
        }
        else if (val == 3) {
            $('[name=title]').val($("#notmb").find("option:selected").text());
            $('[name=content]').val("请及时提高商品质量和售后服务，避免被投诉，否则暂停结算！");
        }
    }

    var checkForm = function () {
        var touser = $.trim($('[name=touser]').val());
        if (touser == '') {
            alert('收件人不能为空！');
            $('[name=touser]').focus();
            return false;
        }

        var title = $.trim($('[name=title]').val());
        if (title == '') {
            alert('标题不能为空！');
            $('[name=title]').focus();
            return false;
        }

        var content = $.trim($('[name=content]').val());
        if (content == '') {
            alert('消息内容不能为空！');
            $('[name=content]').focus();
            return false;
        }

        if (content.length > 200) {
            alert('消息内容最多200个字符！');
            $('[name=content]').focus();
            return false;
        }
        $('#msgtip').html('<img src="views/images/load.gif" align="absmiddle"> 请稍候，正在发送...');

        var reason = '<?php echo $reason ?>';
        var orderid = '<?php echo $orderid ?>';
        var contact = '<?php echo $contact ?>';
        var goodsorderid = '<?php echo $goodsorderid ?>';
        var notfiy = $('[name=notfiy]:checked').val();

        var val = $("#notmb").val();
    
        if (val > 0) {
            reason = $("#notmb").find("option:selected").text();
        }

        $.get('message.php', { action: 'save', notmb: val, notfiy: notfiy, title: title, content: content, touser: touser, goodsorderid: goodsorderid, reason: reason, orderid: orderid, contact: contact, t: new Date().getTime() }, function (data) {
            //  alert(data);
            if (data == 'ok') {
                $('#msgtip').html('');
                alert('短消息发送成功！');
            } else if (data == "ok_no") {
                $('#msgtip').html('');
                alert('短消息发送成功！微信通知失败！' + data);
            } else {
                $('#msgtip').html('');
                alert('短消息发送失败！' + data);
            }
        })
    }
</script>
