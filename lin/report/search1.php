<?php if(!defined('WY_ROOT')) exit;?>

<script src="../includes/libs/jquery.min.js" type="text/javascript"></script>
<style>

</style>

<form name='s' action='http://<?php echo _S('HTTP_HOST') ?>/lin/report.php?action=search' method='post' class="nyroModal" target="_blank">
    <div class="search_main_complaints">
        <p class="sa">
            查询凭证：<input type="text" name="report_contact" maxlength="16" size="20" />
            验证码：<input type="text" name="chkcodeforsearch" maxlength="5" size="5" />
            <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" style="border: 1px solid #bcbcbc" src="../includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码" />
        </p>
        <table class="table table-responsive">
            <tr>
                <td>
                    <input name="submit" type="submit" class="btn btn-success" value="立即查询" /></td>

            </tr>
        </table>
        <?php if($data): ?>
        <p>
            <table class="table table-bordered table-responsive">
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
