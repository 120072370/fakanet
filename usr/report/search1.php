<?php if(!defined('WY_ROOT')) exit;?>

<script src="../includes/libs/jquery.min.js" type="text/javascript"></script>
<style>

</style>

<form name='s' action='report.php?action=search1' method='post' class="nyroModal" target="_blank">
    <div class="search_main_complaints">
        <p class="sa">
            查询凭证：<input type="text" name="report_contact" maxlength="16" size="20" />
        </p>
        <table class="table table-responsive">
            <tr>
                <td>
                    <input name="submit" type="submit" class="btn btn-success" value="立即查询" /></td>

            </tr>
        </table>
      
        <table class="table table-bordered table-responsive" 
            <tr>
                <td class="tdbg" width="100">提交日期：</td>
                <td id="addtime"><?php echo $data['addtime'] ?></td>
            </tr>
            <tr>
                <td class="tdbg">查询凭证：</td>
                <td id="orderid"><?php echo $data['orderid'] ?></td>
            </tr>
            <tr>
                <td class="tdbg">举报投诉原因：</td>
                <td id="reason"><?php echo $data['reason'] ?></td>
            </tr>
            <tr>
                <td class="tdbg">联系方式：</td>
                <td id="contact"><?php echo $data['contact'] ?></td>
            </tr>
            <tr>
                <td class="tdbg">补充说明：</td>
                <td id="remark"><?php echo $data['remark'] ?></td>
            </tr>
            <tr>
                <td class="tdbg">处理状态：</td>
                <td id="is_state"><?php
                  switch($data['is_state']){
                      case '0': echo '<span style="color:red">未处理</span>'; break;
                      case '1': echo '<span style="color:blue">处理中...</span>'; break;
                      case '2': echo '<span style="color:green">已处理</span>'; break;
                  }
                    ?></td>
            </tr>
            
            <tr>
                <td class="tdbg">处理结果：</td>
                <td id="result">
                    <?php 
                      switch($data['is_state']){
                          case '0': echo '<span style="color:red">正在处理中...</span>'; break;
                          case '1': echo '<span style="color:blue">已经通知卖家联系您解决！请耐心等候！</span>'; break;
                          case '2': echo '<span style="color:green">'.$data['result'].'</span>'; break;
                      }
                      echo $data['result'];
                    ?></td>
            </tr>
         
        </table>
       

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

           
            var form = $("[name=s]");
            $.ajax({
                type: "post",
                url: form.attr("action"),
                data: form.serialize(),  
                dataType: "json", 
                success: function (data) {
                    if (data != null) {
                        $("#addtime").text(data.addtime);
                        $("#orderid").text(data.orderid);
                        $("#reason").text(data.reason);
                        $("#contact").text(data.contact);
                        $("#remark").text(data.remark);
                     
                        if (data.is_state == 0) {
                            $("#is_state").html('<span style="color:red">正在处理中...</span>');
                            $("#result").html('<span style="color:red">正在处理中...</span>');
                        } else if (data.is_state == 1) {
                            $("#is_state").html('<span style="color:blue">处理中...</span>');
                            $("#result").html('<span style="color:red">已经通知卖家联系您解决！请耐心等候！</span>');
                        } else if (data.is_state == 2) {
                            $("#is_state").html('<span style="color:green">已处理</span>');
                            $("#result").html('<span style="color:green">' + data.result + '</span>');
                        }
                        
                    }
                    
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
            return false;
        })
    })
</script>
