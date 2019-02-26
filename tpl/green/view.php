<?php if (!defined('WY_ROOT')) exit; ?>
<link href="/new2/help.css" rel="stylesheet" type="text/css">
<br/>
<br/>
<br/>
<br/>
<!-- 问题分类 -->
<div id="container">
    <p class="help_mb"><a href="/faq">帮助中心</a> / <?php echo $data['title'] ?><a onclick="window.history.back();" style="float: right; padding-right: 10px">←返回</a></p>
    <div class="detail">
	<h1 style="margin-bottom:20px;text-align:center;"><?php echo $data['title'] ?></h1>
	<div style="text-align:center;color:#999"><?php echo $this->config['sitename'] ?> <?php echo $data['addtime'] ?></div><br />
	<div class="content">
	
	<?php echo $data['content'] ?>
	
	</div>
	<div id="clear"></div>
    </div>
      <div class="help_box"><font size="+1">如果您需要技术支持，请随时联系我们</font><br>电话：<?php echo $this->config['tel'] ?> 客服QQ：<?php echo $this->config['qq'] ?></div>
</div>







