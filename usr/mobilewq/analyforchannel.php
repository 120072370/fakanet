<?php if(!defined('WY_ROOT')) exit; ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">交易渠道分析</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <div class="col-md-12">
                        <form name="search" method="get" action="">
                            开始日期：<input type="text" name="fdate" data-format="yyyy-mm-dd" class="form-control datepicker" id="txtDate"  size="10" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
					至
                            <input type="text" name="tdate" data-format="yyyy-mm-dd" class="form-control datepicker"  id="txtDate1"  size="10" readonly="readonly" value="<?php echo $tdate ?>" />&nbsp;&nbsp;
                        <br />
                            <input type="submit" class="btn btn-success" value="查询" />
                            <input type="button" onclick="javascript:window.location.href='?do=export&fdate=<?php echo $fdate ?>    &tdate=<?php echo $tdate ?>    '" class="btn btn-info" value="批量导出" />
                            <input type="hidden" name="do" value="search" />
                        </form>
                    </div>
                     <hr />

                    <?php if($lists): ?>
                    <?php
                              $t1=$t2=$t3=$t4=$t5=$t6=0;
                              foreach($lists as $key=>$val):
                                  if($val['total_orders']!=0):
                    ?>
                    <div class="well">
                        <p>支付方式：<?php echo $val['channelname'] ?></p>
                        <p>提交订单数：<?php echo $val['total_orders'] ?></p>
                        <p>已付订单数：<?php echo $val['success_orders'] ?></p>
                        <p>未付订单数：<?php echo $val['total_orders']-$val['success_orders'] ?></p>
                        <p>订单总金额：<?php echo number_format($val['total_money'],2,'.','') ?></p>
                        <p>订单实收金额：<?php echo number_format($val['success_money'],2,'.','') ?></p>
                        <p>订单总收入：<?php echo number_format($val['income_money'],2,'.','') ?></p>
                    </div>
                    <?php
                                  endif;
                                  $t1+=$val['total_orders'];
                                  $t2+=$val['success_orders'];
                                  $t3+=$val['total_orders']-$val['success_orders'];
                                  $t4+=$val['total_money'];
                                  $t5+=$val['success_money'];
                                  $t6+=$val['income_money'];
                              endforeach; ?>
                    <div class="alert alert-info">
                        <p>
                            <strong>合计：
                            </strong>
                        </p>
                        <p>提交订单数：<?php echo $t1 ?></p>
                        <p>已付订单数：<?php echo $t2 ?></p>
                        <p>未付订单数：<?php echo $t3 ?></p>
                        <p>订单总金额：<?php echo number_format($t4,2,'.','') ?></p>
                        <p>订单实收金额：<?php echo number_format($t5,2,'.','') ?></p>
                        <p>订单总收入：<?php echo number_format($t6,2,'.','') ?></p>
                    </div>
                    <?php else: ?>
                    <div class="well alert alert-info">暂无记录</div>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo USER_THEME ?>/assets/js/bootstrap-datepicker.js"></script>
