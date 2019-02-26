<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding:10px;width:350px;max-height:300px;overflow-x:auto;">
<?php if($lists): ?>
<p style="margin:10px 0"><strong>订单号码：<?php echo $orderid ?></strong></p>

<?php foreach($lists as $key=>$val): ?>
<p style="color:#cc3333">类型：<?php echo $val['channelname'] ?></p>
<?php if($val['cardnum'] && $val['cardpwd']): ?>
<p style="margin:6px 0">卡号：<?php echo $val['cardnum'] ?></p>
<p>卡密：<?php echo $val['cardpwd'] ?></p>
<?php endif; ?>
<p style="margin:6px 0">面值：<?php echo $val['money'] ?></p>
<p>实额：<?php echo $val['realmoney'] ?></p>
<p style="margin:10px 0;border-bottom:1px solid #ccc"></p>
<?php endforeach; ?>
<?php if($updatetime): ?>
<p>支付日期：<?php echo $updatetime ?></p>
<?php endif; ?>
<?php endif; ?>
</div>