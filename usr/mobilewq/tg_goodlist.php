<?php if(!defined('WY_ROOT')) exit; ?>
<style>
td.astyle a{color:#000}
td.astyle a.red{color:red}
td.astyle a.green{color:green}
select{color:#000}
.right_title a{display:inline-block;width:126px;height:27px;line-height:27px;background:url(weiqi/images/bg.gif) no-repeat}
.right_title a.current{background:url(weiqi/images/main_right_title_bg.gif) no-repeat;color: #fff;font-weight:bold}
</style>
				<div class="right_title">商品管理</div>
				<div class="main">
				<!--<div class="right_title" style="float:left;position:relative;margin-top:-38px;left:125px"><a href="?action=add">添加新商品</a></div>
				<!--<div class="right_title" style="float:left;position:relative;margin-top:-38px;left:125px"><a href="goodlist.php?t=2"<?php echo $t=='2' ? ' class="current"' : '' ?>>商品管理2</a></div>-->

				<?php if(_G('add_suc')): ?><div id="tipMsg" class="actived">商品添加成功</div><?php endif; ?>
				<?php if(_G('add_err')): ?><div id="tipMsg" class="errmsg">商品添加失败</div><?php endif; ?>
				<?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">商品修改保存成功</div><?php endif; ?>
				<?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">商品修改保存失败</div><?php endif; ?>
				<script>setTimeout(hideMsg,2600)</script>
				<div style="padding-bottom:10px">
				    <form name="search" method="get" action="">
					商品名称:<input type="text" class="input" name="goodname" style="width:100px" value="<?php echo $goodname ?>" maxlength="30" />
					<input type="hidden" name="do" value="search">
					<input type="submit" class="button_bg_1" value="查询">
					</form>
				</div>
				    <form name="cate" method="post" action="?action=saveset">
				    <table class="table_style_3" cellspacing="1">
					    <tr>
						<th class="border_right border_bottom">商品名称</th>
						<th class="border_right border_bottom">商品价格</th>
						<th class="border_right border_bottom">推广分成(%)</th>
						<th class="border_bottom">商品管理</th>
						</tr>
						<?php if($lists): ?>
						<?php 
						foreach($lists as $key=>$val): 
						?>
						<tr class="lightbox" id="record_<?php echo $val['id'] ?>">
						<td width="213" class="border_right border_bottom astyle" height="20" style="text-align:left;padding-left:5px;">

						<!--<input type="text" name="goodname_<?php echo $val['id'] ?>" class="input" value="<?php echo $val['goodname'] ?>" />-->
						<span style="line-height:121%;"><a href="javascript:void(0)" onclick="Boxy.load('?action=link&id=<?php echo $val['linkid'] ?>&goodid=<?php echo $val['id'] ?>',{title:'获取商品[<?php echo $val['goodname'] ?>]链接'})"><?php echo $val['goodname'] ?></a><?php echo $val['is_api'] ? '<span style="color:red;vertical-align:super;font-size:9px">API</span>' : '' ?></span>
						<!--
						<?php if($val['is_link_state']): ?>
						    <a href="javascript:void(0)" onclick="if(confirm('是否要开启该商品的独立页面？'))Boxy.load('?action=link&id=<?php echo $val['linkid'] ?>&goodid=<?php echo $val['id'] ?>',{title:'获取商品[<?php echo $val['goodname'] ?>]链接'})" title="<?php echo $val['goodname'] ?>">
						<?php else: ?>
						    <a href="../lin/?id=<?php echo $val['linkid'] ?>" target="_blank" title="<?php echo $val['goodname'] ?>"><?php endif; ?><?php echo strlen($val['goodname'])>16 ? subString($val['goodname'],0,16).'...' : $val['goodname'] ?></a>
						-->						</td>					
						<td class="border_right border_bottom"><?php echo $val['price'] ?></td>
						<td class="border_bottom border_right astyle">
							<?php 
								echo($val["tghyfc"]);
							?>						</td>
						
						<td class="border_bottom astyle"><a href="<?php $url = "http://{$_SERVER['HTTP_HOST']}";echo $url.'/prt/index.php?id='.$val["linkid"].'&from='.$_SESSION["login_userid"];?>" target="_blank">
						  <?php
								    $url = "http://{$_SERVER['HTTP_HOST']}";	
								    echo $url.'/prt/index.php?id='.$val["linkid"].'&from='.$_SESSION["login_userid"];
							    ?>
						</a></td>
						</tr>
						<?php endforeach; ?>
						<td colspan="5" class="bg" style="padding-left:10px;"><?php echo $pagelist ?></td></tr>
						<?php else: ?>
						<td colspan="5">暂无商品</td></tr>
						<?php endif; ?>
					</table>
					
					</form>
				</div>
