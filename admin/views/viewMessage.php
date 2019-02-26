<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding:10px;width:450px">
<?php if($data): ?>
<div style="text-align:center;font-size:14px;font-weight:bold;color:#d80000;padding:10px 0"><?php echo $data['title'] ?></div>
<div style="padding:15px 0;height:100px;overflow:auto"><?php echo $data['content'] ?></div>
<div style="padding:15px 0 10px 0;text-align:right;color:#666"><?php echo $data['addtime'] ?></div>
<?php endif; ?>
</div>