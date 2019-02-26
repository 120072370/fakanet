<?php if(!defined('WY_ROOT')) exit; ?>
	<style type="text/css">
		select{width: 20%; display: inline-block !important; height: 32px;vertical-align: middle;}
		.search_select{width: 150px; display: inline-block !important; height: 32px;vertical-align: middle;padding: 0 !important;
	</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">交易渠道分析</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
				<div class="main">
				<div style="padding:10px">
				    <form name="search" method="get" action="">
					开始日期：<input type="text" name="fdate" data-format="yyyy-mm-dd" class="input datepicker" id="txtDate"  size="10" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
					至 <input type="text" name="tdate" data-format="yyyy-mm-dd" class="input datepicker"  id="txtDate1"  size="10" readonly="readonly" value="<?php echo $tdate ?>" />&nbsp;&nbsp;
					<input type="submit" class="btn btn-success" value="查询" />
					<input type="button" onclick="javascript:window.location.href='?do=export&fdate=<?php echo $fdate ?>    &tdate=<?php echo $tdate ?>    '" class="btn btn-info" value="批量导出" />
					<input type="hidden" name="do" value="search" />
					</form>
				</div>
				
				    <table class="table table-bordered table-responsive" cellspacing="1">
                        <thead>
					    <tr>
						<th class="border_right border_bottom">支付方式</th>
						<th class="border_right border_bottom">提交订单数</th>
						<th class="border_right border_bottom">已付订单数</th>
						<th class="border_right border_bottom">未付订单数</th>
						<th class="border_right border_bottom">订单总金额</th>
						<th class="border_right border_bottom">订单实收金额</th>
						<th class="border_bottom">订单总收入</th>
						</tr>
                            </thead>
						<?php if($lists): ?>
						<?php
                                  $t1=$t2=$t3=$t4=$t5=$t6=0;
                                  foreach($lists as $key=>$val):
                                      if($val['total_orders']!=0):
                        ?>
						<tr class="lightbox">
						<td class="border_right border_bottom"><?php echo $val['channelname'] ?></td>
						<td class="border_right border_bottom"><?php echo $val['total_orders'] ?></td>
						<td class="border_right border_bottom"><?php echo $val['success_orders'] ?></td>
						<td class="border_right border_bottom"><?php echo $val['total_orders']-$val['success_orders'] ?></td>
						<td class="border_right border_bottom"><?php echo number_format($val['total_money'],2,'.','') ?></td>
						<td class="border_right border_bottom"><?php echo number_format($val['success_money'],2,'.','') ?></td>
						<td class="border_bottom"><?php echo number_format($val['income_money'],2,'.','') ?></td>
						</tr>
						<?php
                                      endif;
                                      $t1+=$val['total_orders'];
                                      $t2+=$val['success_orders'];
                                      $t3+=$val['total_orders']-$val['success_orders'];
                                      $t4+=$val['total_money'];
                                      $t5+=$val['success_money'];
                                      $t6+=$val['income_money'];
                                  endforeach; ?>
						<tr>
						<td class="bg border_right bold">合计</td>
						<td class="bg border_right bold"><?php echo $t1 ?></td>
						<td class="bg border_right bold"><?php echo $t2 ?></td>
						<td class="bg border_right bold"><?php echo $t3 ?></td>
						<td class="bg border_right bold"><?php echo number_format($t4,2,'.','') ?></td>
						<td class="bg border_right bold"><?php echo number_format($t5,2,'.','') ?></td>
						<td class="bg bold"><?php echo number_format($t6,2,'.','') ?></td>
                        </tr>
						<?php else: ?>
						<tr><td colspan="7">暂无记录</td></tr>						
						<?php endif; ?>
					</table>
				</div>
				</div>
            </div>
        </div>
    </div>
<script src="<?php echo USER_THEME ?>/assets/js/bootstrap-datepicker.js"></script>