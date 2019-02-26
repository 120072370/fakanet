<?php if(!defined('WY_ROOT')) exit; ?>

<div class="new-hftw-bar">
            <div id="slider" class="mui-slider">
                <div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted bg-fff">
                    <a class="mui-control-item mui-active" href="javascript:void(0)#item1mobile">最新动态</a>
                   </div>
                <div id="sliderGroup" class="mui-slider-group">
                    <div id="item1mobile" class="mui-control-content bg-fff mui-active">
                        <ul class="lawyer-card lawyer-card2">
                             <?php 
                             if($lists): 
                                 $i=1;
                                 foreach($lists as $key=>$val):

                                     $addtime=strtotime($val['addtime']);
                                     $now=strtotime(date('Y-m-d H:i:s'));
                                     $days=ceil(($now-$addtime)/86400);
                             ?>
                             <li>
                                <a  href="view.htm?id=<?php echo $val['id'] ?>" class="mui-btn btn-sl btn-gn-line advice-me"  data-isvip="1">
                                    查看详情</a>
                                <p class="lr-name f12"><a href="view.htm?id=<?php echo $val['id'] ?>" class="fl mr10"><?php echo $val['title'] ?></a></p>
                                <time class="block lh20 f12 s-c999 mt5"><?php echo date('Y-m-d',$addtime) ?></time>
                               
                            </li>
				   <!-- <li><font color="gray"><?php echo date('Y-m-d',$addtime) ?></font> <a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" class="Btips" title="<?php echo $val['title'] ?>" style="color:#333;"><?php echo $val['title'] ?></a></li>-->
				<?php
                                 endforeach;
                             endif;
                ?>			  
                          
                        </ul>

                        <div style="margin-left:20px;margin-bottom:10px;margin-top:10px"><?php echo $pagelist ?></div>
                    </div>
                    
                </div>
            </div>
        </div>