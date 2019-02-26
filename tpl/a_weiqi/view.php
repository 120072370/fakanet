<?php if(!defined('WY_ROOT')) exit; ?>

<style>
   table,table tr th, table tr td { border:1px solid #0094ff; }
</style>
<!--{content-->
<div class="wwmain">
    <div class="wwcolumntit">
        <div class="wwcrumbs">
            <a href="index.htm">首页</a>>
                	<a class="cur" href="javascript:;">最新动态</a>
        </div>
        <h3>最新动态</h3>
    </div>
    <div class="newsnav">
        <div class="newsnavdiv">
            <ul class="clearfix">
                <li><a href="news.htm" rel="_menu34">最新动态</a></li>
            </ul>
            <script>
                $("#_topChannel5").addClass("cur");
                $("a[rel='_menu34']").addClass("cur");
            </script>
        </div>
    </div>

    <div class="newscontent clearfix">
        <div class="newsleft fl">
            <div class="newstext">
				<?php
            		global $wddb;
					$id=_G('id','int');
					$data=$wddb->getRow("SELECT *,addtime as newaddtime,date(addtime) as addtime2 FROM ".DB_PREFIX."news WHERE id=".$id);
                    ?>
					  <div style="border: 1px solid #ccc; padding: 20px; margin: auto;">
                    <?php if($data): ?>
                    <div>
                        <span><?php echo $data['addtime'] ?></span>
                        <h3><?php echo $data['title'] ?></h3>
                    </div>
                    <p>
                        <?php echo $data['content'] ?>
                    </p>
                    <div style="text-align: right"><?php echo $this->config['sitename'] ?> <?php echo $data['addtime'] ?></div>
                    <?php endif; ?>
                </div>
              
            </div>
        </div>
        <div class="newsright fl">
            <h4>相关动态</h4>
            <hr>
            <dl>
                	<?php
            		global $wddb;
            		$list=$wddb->getall("select * from ".DB_PREFIX."news where classid=1 and is_display_home = 1  order by id desc limit 0,6");
					foreach ($list as $k => $v) {
						echo '<dd><a href="view.htm?id='.$v['id'].'"  >'.$v['title'].'</a><b></b></dd>';			
					}
                    ?>
                 
            </dl>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!--content}-->
