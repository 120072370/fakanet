<?php if(!defined('WY_ROOT')) exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>举报与投诉查询</title>
    <script src="../includes/libs/jquery.min.js" type="text/javascript"></script>
    <style>
.search_main_complaints{MARGIN: 0px auto; OVERFLOW: hidden; HEIGHT: auto;font-size:12px}
.sa{text-align:center}
.sa input[type=text]{line-height:18px;border-top:1px solid #666;border-left:1px solid #666;border-bottom:1px solid #ccc;border-right:1px solid #ccc}
table.complaints{border-collapse:collapse;width:92%;margin:auto}
table.complaints td{border:1px solid #ccc;line-height:23px;padding-left:10px}
table.complaints td.tdbg{background-color:#f1f1f1;text-align:right;color:#333}
.btn{cursor:pointer;width:125px; height:35px; background:url(http://<?php echo $config['siteurl'] ?>/lin/gray/images/tjbg.png); font-size:12px; color:#000; font-weight:bold; border:none; display:inline-block;line-height:35px;text-decoration:none}
table.complaints_search{margin-bottom:10px;width:300px;margin:auto;}
</style>
</head>
<body>
    <form name='s' action='http://<?php echo _S('HTTP_HOST') ?>/lin/report.php?action=search' method='post' class="nyroModal">
        <div class="search_main_complaints">
            <p class="sa">
                查询凭证：<input type="text" name="report_contact" maxlength="16" size="20" />
                验证码：<input type="text" name="chkcodeforsearch" maxlength="5" size="5" />
                <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" style="border: 1px solid #bcbcbc" src="../includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码" />
            </p>
            <table class="complaints_search">
                <tr>
                    <td>
                        <input name="submit" type="submit" class="btn" value="立即查询" /></td>
                    <td>
                        <button name="back" type="button" class="btn" onclick="$('#nyroModalFull',window.parent.document).fadeOut();parent.location.reload()">关闭</button></td>
                </tr>
            </table>
            </p>
	<?php if($data): ?>
            <p>
                <table class="complaints">
                    <tr>
                        <td class="tdbg" width="100">提交日期：</td>
                        <td><?php echo $data['addtime'] ?></td>
                    </tr>
                    <tr>
                        <td class="tdbg">查询凭证：</td>
                        <td><?php echo $data['orderid'] ?></td>
                    </tr>
                    <tr>
                        <td class="tdbg">举报投诉原因：</td>
                        <td><?php echo $data['reason'] ?></td>
                    </tr>
                    <tr>
                        <td class="tdbg">联系方式：</td>
                        <td><?php echo $data['contact'] ?></td>
                    </tr>
                    <tr>
                        <td class="tdbg">补充说明：</td>
                        <td><?php echo $data['remark'] ?></td>
                    </tr>
                    <tr>
                        <td class="tdbg">处理状态：</td>
                        <td><?php
              switch($data['is_state']){
                  case '0': echo '<span style="color:red">未处理</span>'; break;
                  case '1': echo '<span style="color:blue">处理中...</span>'; break;
                  case '2': echo '<span style="color:green">已处理</span>'; break;
              }
                            ?></td>
                    </tr>
                    <?php if($data['result']): ?>
                    <tr>
                        <td class="tdbg">处理结果：</td>
                        <td>
                            <?php 
                              switch($data['is_state']){
                                  case '0': echo '<span style="color:red">正在处理中...</span>'; break;
                                  case '1': echo '<span style="color:blue">已经通知卖家联系您解决！请耐心等候！</span>'; break;
                                  case '2': echo '<span style="color:green">'.$data['result'].'</span>'; break;
                              }
                              echo $data['result'];
                            ?></td>
                    </tr>
                    <?php endif; ?>
                </table>
            </p>
            <?php endif; ?>

        </div>
    </form>
    <script>

        $(function () {
            $('[name=submit]').click(function () {
                var contact = $.trim($('[name=report_contact]').val());
                if (contact == '') {
                    alert('请填写查询凭证！');
                    $('[name=report_contact]').focus();
                    return false;
                }

                var chkcode = $.trim($('[name=chkcodeforsearch]').val());
                if (chkcode == '') {
                    alert('请填写验证码！');
                    $('[name=chkcode]').focus();
                    return false;
                }
            })
        })
    </script>
</body>
</html>
