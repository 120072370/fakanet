<?php if(!defined('WY_ROOT')) exit; ?>
<div class="lawyer-infor-bar bg-fff">


<?php
            		global $wddb;
					$id=_G('id','int');
					$data=$wddb->getRow("SELECT *,addtime as newaddtime,date(addtime) as addtime2 FROM ".DB_PREFIX."news WHERE id=".$id);
                    ?>
				
    <?php if($t): ?>
    <?php if($data): ?>
    <h2 class="h35-title" style="border-bottom: 1px dotted #ccc;"><?php echo $data['title'] ?></h2>
    <?php echo $data['content'] ?>
    <p>
        <?php echo $this->config['sitename'] ?> <?php echo $data['addtime'] ?>
    </p>
    <p></p>
    <?php endif; ?>

    <?php else: ?>
    <?php if($data): ?>
    <h2 class="h35-title" style="border-bottom: 1px dotted #ccc;"><?php echo $data['title'] ?></h2>
    <?php echo $data['content'] ?>
    <p>
        <?php echo $this->config['sitename'] ?> <?php echo $data['addtime'] ?>
    </p>
    <p></p>
    <?php endif; ?>
    <?php endif ?>
</div>
