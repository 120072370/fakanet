<?php if(!defined('WY_ROOT')) exit; ?>
<form name="link" method="post" action="orders.php?action=batchCloseSet">
    <div style="padding: 10px">
        <strong>时间范围：</strong>
        下单时间在
        <select name="days">
            <option value="1">1天</option>
            <option value="3">3天</option>
            <option value="7">7天</option>
            <option value="14">14天</option>
            <option value="30">30天</option>
        </select>
        前
        <br />
        <br />
        <p style="text-align: center">
            <input type="submit" class="btn btn-success" value="保存设置" />&nbsp;&nbsp;
        </p>

        <p  class="alert alert-danger">
            提示：订单关闭后，未付款的订单将无法继续支付！
        </p>
    </div>
</form>
