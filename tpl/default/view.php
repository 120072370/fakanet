<?php if(!defined('WY_ROOT')) exit; ?>
 <div id="full_table" style="height:621px;min-width:1200px;background:url(pub_images/about_banner.jpg) no-repeat center;min"></div>
 <div id="full_table" style="min-height:600px;">
    <div id="tab1200" style="hieght:120px;padding-top:20px;">
	<dd style="position:relative;height:60px;line-height:40px;width:1200px;min-width:1000px;font-size:16px;font-weight:600;color:#444444;">首页 > <a href="news.htm" style="font-size:16px;font-weight:600;color:#444444;">新闻资讯</a></dd>
	</div>
	<div id="tab1200" style="hieght:120px;padding-top:20px;min-height:200px;">
	
<?php if($t): ?>
    <div style="border:0px solid #ccc;padding:10px;width:550px;min-height:200px;">
	<?php if($data): ?>
	    <h3 style="color:red;text-align:center;border-bottom:1px dotted #ccc;padding-bottom:10px"><?php echo $data['title'] ?></h3>
		<div style="line-height:26px;font-size:14px;padding:10px;height:300px;overflow:auto"><?php echo $data['content'] ?></div>
		<div style="text-align:right"><?php echo $this->config['sitename'] ?> <?php echo $data['addtime'] ?></div>
	<?php endif; ?>
	</div>
<?php else: ?>
    <div style="position:relative;border:1px solid #ccc;padding:20px;min-height:500px;">
	<?php if($data): ?>
	    <h3 style="color:red;text-align:center;border-bottom:1px dotted #ccc;padding-bottom:10px;font-size:18px"><?php echo $data['title'] ?></h3>
		<div style="position:relative;line-height:26px;font-size:14px;padding:10px"><?php echo $data['content'] ?></div>
		<div style="position:absolute;text-align:right;bottom:0px;right:0px;height:40px;line-height:40px;width:300px;text-align:left;"><?php echo $this->config['sitename'] ?> <?php echo $data['addtime'] ?></div>
	<?php endif; ?>
	</div>
	
<?php endif ?>
<div style="height:40px;"></div>
</div>
</div>