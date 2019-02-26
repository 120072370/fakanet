 <?php 
				if($news): 
				$i=1;
				foreach($news as $key=>$val):
				if($i>5) break;
				if($val['classid']==3 && $val['is_display_home']):
				$addtime=strtotime($val['addtime']);
				$now=strtotime(date('Y-m-d H:i:s'));
				$days=ceil(($now-$addtime)/86400);
				?>
				    <li><a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" style="color:#<?php echo $val['is_color'] ?>;<?php echo $val['is_bold']!='' ? 'font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>15 ? subString($val['title'],0,14) : $val['title'] ?></a><?php echo $days>3 ? '' : '<img src="tpl/default/images/news.gif" />' ?></li>
				<?php
				$i++;
				endif;
				endforeach;
				endif;
				?>         