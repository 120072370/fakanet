<?php if(!defined('WY_ROOT')) exit; ?>

<style>
table.table_style_3{border: 1px solid #eee;}
table.table_style_3 td{padding:0;height:40px;padding: 8px 15px;}
table.table_style_3 td:nth-child(1){width: 30%;background: #f5f4ff;font-weight: bold;border-right: 1px solid #eee;}
table.table_style_3 td:nth-child(2){text-align: left;}		
.table_style_3 td{padding:0px 0}
</style>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">换购价值比率</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
				<div class="main">
				<?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">设置保存成功</div><?php endif; ?>
				<?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">设置保存失败</div><?php endif; ?>
				<script>setTimeout(hideMsg,2600)</script>
				<div style="padding:5px 10px;line-height:22px;font-size: 16px;">说明：价值比率就是此卡的真实价值，比如买家要买100元的商品，当价值比率为100%时需要100的卡可以购得商品，如果价值比率为50%，就需要消费200元的卡能才购买到此商品！</div>
				<div style="padding:0 0 10px 10px;font-size: 16px;"class="bold">
				<?php if($str!=''): ?>
				    <?php echo $str ?> <a href="?action=set&goodid=<?php echo $goodid ?>&cateid=<?php echo $cateid ?>" onclick="if(!confirm('是否要设置默认的换购比率？'))return false">默认换购的价值比率>></a>
				<?php else: ?>
				    您现在看到的是 <span class="green">全部商品</span> 默认换购的价值比率 (注：每一种商品都可以在"商品列表"管理中单独设置)
			    <?php endif; ?>
				</div>			
				
				    <form name="edit" method="post" action="?action=editsave">
				    <table class="table_style_3" cellspacing="1">
					<?php
                       if($channels): 
					   foreach($channels as $key=>$val):
					   if($val['payid']!=24 && $val['payid']!=25 && $val['payid']!=26&& $val['payid']!=27&& $val['payid']!=28&& $val['payid']!=29&& $val['payid']!=30):
					       $rate=100;
						   if($data){
						       foreach($data as $key2=>$val2){
							       if($val2['channelid']==$val['id']){
								       $rate=$val2['rate'];
									   break;
								   }
							   }
						   }
					?>
					    <tr class="lightbox">
						<td width="120" class="bold right border_bottom border_right" style="color:#333"><?php echo $val['channelname'] ?>:</td>
						<td class="border_bottom" style="text-align:left;padding-left:5px"><input type="text" class="input" onkeyup="md(<?php echo $val['id'] ?>)" style="width:120px" name="rate[<?php echo $val['id'] ?>]" value="<?php echo $rate ?>" maxlength="6" id="i_<?php echo $val['id'] ?>" /> <span class="red">%</span> 
						注：单价<span class="red" id="i_<?php echo $val['id'] ?>_p"><?php echo $goodprice ?></span>元的商品，
						需要消费<span class="red" id="i_<?php echo $val['id'] ?>_b"><?php echo number_format($goodprice/$rate*100,2,'.','') ?></span>元的卡才能购买。</td>
						</tr>
					<?php
					endif;
					    endforeach;
						endif;
                    ?>
					<tr>
					<td colspan="2" class="bg" style="text-align:left">
					    <p style="padding-left:127px"><input type="submit" class="btn btn-success" value="保存设置" /></p>
                        <input type="hidden" name="cateid" value="<?php echo $cateid ?>" />
						<input type="hidden" name="goodid" value="<?php echo $goodid ?>" />
					</td>
					</tr>
					</table>
					</form>
				</div>
                </div>
            </div>
        </div>
    </div>
				<script>
				<?php if(!$_SESSION['login_user_safe_key']): ?>
				$(function(){
				userSafeVerify(1);return false;
				})				
				<?php endif ?>

				var md=function(id){
				    var rate=parseFloat($.trim($('#i_'+id).val()));
					if(rate<=0 || rate>100){
						$('#i_'+id).val(100);
					    alert('价值比例设置不正确！');
						return false;
					}
					var price=parseFloat($('#i_'+id+'_p').html());
					var b=price/rate*100;
					$('#i_'+id+'_b').html(b.toFixed(2));
				}
				</script>