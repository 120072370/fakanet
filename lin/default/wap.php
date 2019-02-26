<?php if(!defined('WY_ROOT')) exit; ?>

<form name="p" method="post" action="<?php echo $redirectUrl ?>" target="_blank">
    <div id="main_bank" style="overflow-y: auto;">
        <div class="alert alert-info">
            <p>您的订单号：<strong><?php echo strlen($orderid)==20 ? substr($orderid,0,16) : $orderid ?></strong></p>
            <p>请保存好您的订单号，方便日后查询交易记录。</p>
            <p class="text-danger">支付金额：<strong><?php echo $paymoney ?>元</strong></p>
            <?php if($couponcode): ?>
            <p>优&nbsp;惠&nbsp;券：</p><?php echo $couponcode ?> (优惠金额:<span style="color: red"><?php echo $coupon ?></span>元)
                <?php endif; ?>
            <p>
                支付方式：
            <img src="default/images/<?php echo $pid ?>.gif" style="width:90px;" />
            </p>
            <p>商品名称：<?php echo isset($goodname) ? $goodname : '' ?></p>
            <p>购买数量：<strong><?php echo $quantity ?></strong></p>
        </div>
        <div id="d1">
            <button class="btn btn-green" name="submit" type="submit" onclick="document.getElementById('d1').style.display='none';document.getElementById('d2').style.display=''">
                确认支付
            </button>
            <button name="back" type="button" class="btn btn-info " data-dismiss="modal">
                重新下单
            </button>
        </div>

        <div id="d2" style="display:none;">
            <button class="btn btn-green" name="back" type="button" data-dismiss="modal">
                继续购买
            </button>
            <button class="btn btn-info" onclick="query_url()" name="button" type="button">
                查看结果
            </button>
        </div>
    </div>
</form>

<script type="text/javascript">
    function query_url() {
        try {
            parent.location.href = '../orderquery.htm?orderid=<?php echo strlen($orderid)==20 ? substr($orderid,0,16) : $orderid ?>';
        } catch (err) {
            window.location.href = '../orderquery.htm?orderid=<?php echo strlen($orderid)==20 ? substr($orderid,0,16) : $orderid ?>';
        }
        return false;
    }
</script>
