<?php if(!defined('WY_ROOT')) exit; ?>
<?php if($t): ?>
    <div style="border:0px solid #ccc;padding:10px;width:550px">
	<?php if($data): ?>
	    <h3 style="color:red;text-align:center;border-bottom:1px dotted #ccc;padding-bottom:10px"><?php echo $data['title'] ?></h3>
		<div style="line-height:26px;font-size:14px;padding:10px;height:300px;overflow:auto"><?php echo $data['content'] ?></div>
		<div style="text-align:right"><?php echo $this->config['sitename'] ?> <?php echo $data['addtime'] ?></div>
	<?php endif; ?>
	</div>
<?php else: ?>
    <div style="border:1px solid #ccc;padding:20px;width:910px;margin:auto;">
	<?php if($data): ?>
	    <h3 style="color:red;text-align:center;border-bottom:1px dotted #ccc;padding-bottom:10px;font-size:18px"><?php echo $data['title'] ?></h3>
		<div style="line-height:26px;font-size:14px;padding:10px"><?php echo $data['content'] ?></div>
		<div style="text-align:right"><?php echo $this->config['sitename'] ?> <?php echo $data['addtime'] ?></div>
	<?php endif; ?>
	</div>
<?php endif ?>
