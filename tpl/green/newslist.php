<?php if (!defined('WY_ROOT')) exit; ?>



<link href="/new2/help.css" rel="stylesheet" type="text/css">
<br/>
<br/>
<br/>
<br/>


<div id="container">
    <p class="help_mb"><a href="/faq">帮助中心</a> / </p>
    <ul id="news">
	<?php
	if ($lists):
	    $i = 1;
	    foreach ($lists as $key => $val):

		$addtime = strtotime($val['addtime']);
		$now = strtotime(date('Y-m-d H:i:s'));
		$days = ceil(($now - $addtime) / 86400);
		?>

		<li onClick="javascript:window.location.href = '/view.htm?id=<?php echo $val['id'] ?>'">
		    <div class="date"><b><?php echo date('d', $addtime) ?></b><br><br><?php echo date('Y-m', $addtime) ?></div>
		    <div class="news_text">
			<p><a href="/view.htm?id=<?php echo $val['id'] ?>"><?php echo $val['title'] ?></a><br><?php echo $val['title'] ?></p>
		    </div>
		    <i class="fa fa-chevron-circle-right" style="font-size:30px;
		       float:right; margin-top:30px; color:#666"></i>
		    <span></span>
		</li>

		<?php
	    endforeach;
	endif;
	?>
    </ul>
    <div id="clear"></div>
    <div id="container">
        <style>#wypage{font-size:12px;padding:10px auto;margin-left:10px;}#wypage p{float:left;color:#333;}#wypage a{float:left;display:inline-block;border:1px solid #ddd;padding:4px 6px;margin-left:4px;text-decoration:none;color:#333;background-color:#fff;border-radius:3px;}#wypage a:hover{background-color:#0066CC;color:#fff}#wypage a.no-hover:hover{color:#333}#wypage a.wy_page_current{background-color:#0066CC;color:#fff}</style><div class="form-inline"><div id="wypage" class="form-group"> <br/><p>
		   
		<?php echo $pagelist ?>
		
		</p><p style="clear:left"></p></div></div>    </div>
    <div id="clear"></div>
    <div class="help_box"><font size="+1">如果您需要技术支持，请随时联系我们</font><br>电话：<?php echo $this->config['tel'] ?> 客服QQ：<?php echo $this->config['qq'] ?></div>
</div>












 