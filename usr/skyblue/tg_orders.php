<?php if(!defined('WY_ROOT')) exit; ?>
<style type="text/css">
		.search_select{width: 15%; display: inline-block; height: 32px;vertical-align: middle;}
	    
	</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">推广记录</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">

                <div class="main">
                    <div style="padding: 0 10px 10px 10px">
                        <form name="search" method="get" action="">
                            时间范围：<input type="text" name="fdate" data-format="yyyy-mm-dd" class="input datepicker" style="width:150px" id="txtDate" onclick="SelectDate(this)" size="10" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
						至
                            <input type="text" name="tdate"  data-format="yyyy-mm-dd" class="input datepicker" style="width:150px" id="txtDate1" onclick="SelectDate(this)" size="10" readonly="readonly" value="<?php echo $tdate ?>" />&nbsp;&nbsp;

						<p style="margin: 10px 0">
                            支付状态：
                            <select name="t">
                                <option value="t0"<?php echo $t=='t0' ? ' selected' : '' ?>>所有</option>
                                <option value="t1"<?php echo $t=='t1' ? ' selected' : '' ?>>未付款</option>
                                <option value="t4"<?php echo $t=='t4' ? ' selected' : '' ?>>已退款</option>
                                <option value="t2"<?php echo $t=='t3' ? ' selected' : '' ?>>部分付款</option>
                                <option value="t3"<?php echo $t=='t3' ? ' selected' : '' ?>>付款成功</option>
                            </select>&nbsp;&nbsp;
						支付类型：<select name="channelid">
                            <option value="">请选择</option>
                            <?php 
                            if($channelList): 
                                foreach($channelList as $key=>$val):
                            ?>
                            <option value="<?php echo $val['id'] ?>" <?php echo $channelid==$val['id'] ? 'selected' : '' ?>><?php echo $val['channelname'] ?></option>
                            <?php
                                endforeach;
                            endif;
                            ?>
                            <option value="99999" <?php echo $channelid==99999 ? 'selected' : '' ?>>组合支付</option>
                        </select>&nbsp;&nbsp;
						商品类型：<select name="is_api">
                            <option value="" <?php echo $is_api=='' ? 'selected' : '' ?>>全部</option>
                            <option value="a0" <?php echo $is_api=='a0' ? 'selected' : '' ?>>在线售卡</option>
                            <option value="a1" <?php echo $is_api=='a1' ? 'selected' : '' ?>>在线充值</option>
                        </select>

                        </p>

                            <p style="margin-top: 10px">
                                <!--查询类别：<select name="st">
						<option value="st1"<?php echo $st=='st1' ? ' selected' : '' ?>>订单号</option>
						<option value="st2"<?php echo $st=='st2' ? ' selected' : '' ?>>充值卡号</option>
						<option value="st3"<?php echo $st=='st3' ? ' selected' : '' ?>>联系方式</option>
						<option value="st4"<?php echo $st=='st4' ? ' selected' : '' ?>>商品名称</option>
						<option value="st5"<?php echo $st=='st5' ? ' selected' : '' ?>>商品卡号</option>
						</select>&nbsp;&nbsp;
						<input type="text" name="kw" class="input" value="<?php echo $kw ?>" />
						
-->
                                <input type="submit" class="btn btn-success" value="查询" />
                                <input type="hidden" name="do" value="search" />
                            </p>

                        </form>
                        <p style="color: Red; padding-top: 10px;">
                            订单总金额:<?php echo $totalPrice['price']?> &nbsp; &nbsp;
							成功金额:<?php echo $totalPrice1['price']?>&nbsp; &nbsp;
							分成金额:<?php echo number_format($totalPrice2['price'],2,'.','')?>
                            到账金额：<?php echo number_format($totalPrice3['price'],2,'.','')?>
                        </p>
                    </div>

                    <table class="table table-bordered table-responsive" cellspacing="1">
                        <thead>
                            <tr>
                                <!--<th class="border_right border_bottom">订单编号</th>-->
                                <th class="border_right border_bottom">交易时间</th>
                                <th class="border_right border_bottom">商品名称</th>
                                <th class="border_right border_bottom">支付方式</th>
                                <th class="border_right border_bottom">金额</th>
                                <th class="border_right border_bottom">分成（%）</th>
                                <th class="border_right border_bottom">购买者信息</th>
                                <th width="50" class="border_right border_bottom">状态</th>
                                <!--<th width="35" class="border_bottom">管理</th>-->
                            </tr>
                        </thead>
                        <?php if($lists): ?>
                        <?php 
                                  foreach($lists as $key=>$val):
                                      switch($val['is_status']){
                                          case '0'; $is_status='<span class="gray">未付款</span>';break;
                                          case '1'; $is_status='<span class="green">已付款</span>';break;
                                          case '2'; $is_status='<span class="blue">部分付款</span>';break;
                                          case '4'; $is_status='<span class="red">已退款</span>';break;
                                      }
                        ?>
                        <tr class="lightbox" id="s<?php echo $val['orderid'] ?>">
                            <!--<td  width="120" class="border_right border_bottom"><a href="../orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank"><?php echo $val['orderid'] ?></a></td>-->
                            <td class="border_right border_bottom"><?php echo $val['addtime'] ?></td>
                            <td width="130" class="border_right border_bottom"><?php echo $val['goodname'] ?>(<span class="red"><?php echo $val['quantity'] ?></span>张)<span class="red"><?php echo $val['is_api'] ? '<span style="color:red;vertical-align:super;font-size:9px">API</span>' : '' ?> <?php echo $val['is_discount'] ? '<span style="color:red;vertical-align:super;font-size:9px">批</span>' : '' ?> <?php echo $val['is_coupon'] ? '<span style="color:red;vertical-align:super;font-size:9px">券</span>' : '' ?> <?php echo $val['is_pwdforsearch'] ? '<span style="color:red;vertical-align:super;font-size:9px">取</span>' : '' ?></span></td>
                            <td width="110" class="border_right border_bottom"><?php echo $val['channelname'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['price'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['tghyfc'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['contact'] ?></td>
                            <td class="border_right border_bottom"><?php echo $is_status ?></td>
                            <!--<td class="border_bottom">
						    <span id="c<?php echo $val['orderid'] ?>"><a href="javascript:void(0)" style="<?php echo $val['is_state']==1 ? 'color:red' : '' ?>" onclick="op('<?php echo $val['orderid'] ?>',<?php echo $val['is_state']==0 ? 1 : 0 ?>)"><?php echo $val['is_state']==0 ? '关' : '开' ?></a></span>|<a href="javascript:void(0)" onclick="window.location.href='../?mod=orderquery&do=export&orderid=<?php echo $val['orderid'] ?>'" title="导出订单信息">导</a>
						 </td>-->
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="8" class="bg" style="padding-left: 10px"><?php echo $pagelist ?></td>
                        </tr>
                        <?php else: ?>
                        <tr>
                            <td colspan="8">
                                <div class="alert alert-warning">暂无记录</div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var op = function (orderid, t) {
        $.get('orders.php', { action: 'op', orderid: orderid, t: t }, function (data) {
            if (data == 'ok') {
                t1 = t == 0 ? 1 : 0;
                t2 = t == 0 ? '关' : '开';
                $('tr#s' + orderid).css({ 'background': '#f1f1f1' });
                $('#c' + orderid).html('<a href="javascript:void(0)" onclick="op(\'' + orderid + '\',' + t1 + ')">' + t2 + '</a>');
            } else {
                $('#c' + orderid).html('<img src="default/images/load.gif" />');
            }
        })
    }
</script>
<script src="<?php echo USER_THEME ?>/assets/js/bootstrap-datepicker.js"></script>
