<?php if(!defined('WY_ROOT')) exit; ?>
  <div id="content" class="b_clear b_m_b">
    <div class="pc_image_4"></div>
    <div class="b_l b_m_t area-l">
	  <div class="area-box">
	    <div class="area-t">
		  <span class="b_l servico"></span><div class="b_l serbn">联系我们</div>
		</div>
		<div class="clear"></div>
		<div class="area-c" style="height:303px;">
		     <div style="margin-top:10px;">
                 <a target="_blank" class="qq_on" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=<?php echo $this->config['sitename'] ?>&menu=yes"><span>商户接入咨询<br /><?php echo $this->config['qq'] ?></span></a>
             </div>
             <div style="margin-top:10px;">
                 <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=<?php echo $this->config['sitename'] ?>&menu=yes" class="qq_off" title="<?php echo $this->config['sitename'] ?>商务"><span>支付问题-01<br /><?php echo $this->config['qq'] ?></span></a>
		         <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=<?php echo $this->config['sitename'] ?>&menu=yes" class="qq_off" title="<?php echo $this->config['sitename'] ?>商务"><span>支付问题-02<br /><?php echo $this->config['qq'] ?></span></a>
		         <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=<?php echo $this->config['sitename'] ?>&menu=yes" class="qq_off" title="<?php echo $this->config['sitename'] ?>商务"><span>投诉举报-01<br /><?php echo $this->config['qq'] ?></span></a>
             </div>
		     <div style="margin-top:20px;"><img src="tpl/green/common/images/email.png" alt="Email"></div>
		</div>
	  </div><!--/box end-->
	</div><!--/left end-->
	<div class="b_r b_m_t area-r">
<?php require 'login_common.php'; ?>
	</div><!--/right end-->
  </div><!--/content end-->
