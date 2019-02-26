<?php if(!defined('WY_ROOT')) exit; ?>

<!--底部开始-->
</div>﻿<div class="safely"></div>
<div class="footer">
    <div class="f-content">
        <div class="row">
            <div class="f-contentl">
			<p style="margin-bottom: 10px;"><img src="tpl/219kacom/images/logo2.png" alt="yekepay"></p>
            </div>

            <div style="clear:both"></div>
        </div>
        <div class="final-intro" style="  position: relative;top:4px;">
<span style=" font-size: 18px;display: inline-block; color:#cccccc;">
                CopyRight 2013-<?php echo date('Y') ?> <?php echo $this->config['copyright'] ?>
		 <br>
        <?php if($this->config['icp']): ?> <a href="http://www.miibeian.gov.cn" target="_blank"> <?php echo $this->config['icp'] ?> </a>
        <?php endif; ?>
        <?php echo $this->config['tongji'] ?></div>



        </div>
    </div>
    <div style="clear:both"></div>
</div>
</body>
</html>
