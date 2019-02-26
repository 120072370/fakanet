<?php if(!defined('WY_ROOT')) exit; ?>
<link rel="stylesheet" type="text/css" href="/tpl/win8/common/css/stylel.css" />
<style>
.box-r ul li{width:400px}
.o ul li{}
</style>
  <div id="content" class="b_clear b_m_b">
    <div class="b_l b_m_t area-l">
	  <div class="area-box">
	    <div class="area-t">
		  <div class="titbn"><h4>最新动态</h4></div>
		</div>
		<div class="clear"></div>
		<div class="area-c box-r"  style="height:100%">
			  <ul class="o">
                <?php 
				if($lists): 
				$i=1;
				foreach($lists as $key=>$val):

				$addtime=strtotime($val['addtime']);
				$now=strtotime(date('Y-m-d H:i:s'));
				$days=ceil(($now-$addtime)/86400);
				?>
				    <li><font color="gray"><?php echo date('Y-m-d',$addtime) ?></font> <a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" class="Btips" title="<?php echo $val['title'] ?>" style="color:#333;"><?php echo $val['title'] ?></a></li>
				<?php
				endforeach;
				endif;
				?>			  
			  </ul>	
			  
		</div>
		<div style="position:relative;margin-left:20px;margin-bottom:10px;margin-top:-10px"><?php echo $pagelist ?></div>
	  </div><!--/box end-->
	</div><!--/left end-->
	<div class="b_r b_m_t area-r">
<?php require 'login_common.php'; ?>
	</div><!--/right end-->
  </div><!--/content end-->