<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding:10px;">
<?php if($data['ptype']==1): ?>
<p>收款账号：<?php echo $data['card'] ?></p>
<p style="margin-top:20px">收款方式：<?php echo $data['bank'] ?></p>
<?php elseif($data['ptype']==2): ?>
<p>收款账号：<?php echo $data['alipay'] ?></p>
<p style="margin-top:20px">收款方式：支付宝收款</p>
<?php elseif($data['ptype']==3): ?>
<p>收款账号：<?php echo $data['tenpay'] ?></p>
<p  style="margin-top:20px">收款方式：财付通收款</p>
<?php endif; ?>
<p style="margin-top:20px">收款人：<?php echo $data['realname'] ?></p>
</div>