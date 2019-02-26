<?php if(!defined('WY_ROOT')) exit; ?>
<style type="text/css">
    .tip {
        z-index: 999;
        color: #ea4c88;
        text-decoration: none;
        font-size: 14px;
        padding: 15px;
        margin: 20px 0;
        border: 1px solid #e0e1ff;
        border-radius: 5px;
        background: #f5f4ff;
        color: #7b7dea;
        line-height: 24px;
        letter-spacing: 0.2rem;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">商户结算记录</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">

                <div class="main">
                    <div class="alert alert-info">
                        结算状态公供参考,点击流水号或状态可以看到备注信息,已结算款项最迟在当天21时之前到账.
                    </div>
                    <table class="table table-bordered table-responsive" >
                        <thead>
                        <tr>
                            <th class="border_right border_bottom">流水号</th>
                            <th class="border_right border_bottom">支付日期</th>
                            <th class="border_right border_bottom">转账金额</th>
                            <th class="border_right border_bottom">手续费</th>
                            <th class="border_right border_bottom">到账金额</th>
                            <th class="border_right border_bottom">清算方式</th>
                            <th class="border_bottom">状态</th>
                        </tr>
                            </thead>
                        <?php if($lists): ?>
                        <?php 
                                  foreach($lists as $key=>$val): 
                                      $pid=$val['pid']==1 ? '自动清算' : '商户提款';
                                      switch($val['is_state']){
                                          case '0': $is_state='待处理';break;
                                          case '1': $is_state='<span class="green">已完成</span>';break;
                                          case '2': $is_state='已拒绝';break;
                                      }
                        ?>
                        <tr class="lightbox">
                            <td class="border_right border_bottom"><a href="javascript:void(0)" 
                                style="text-decoration:underline" onclick="showview('userMoney.php?action=show&id=<?php echo $val['id'] ?>')"><?php echo $val['id'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['addtime'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['money'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['fee'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['is_state']==1 ? number_format(($val['money']-$val['fee']),2,'.','') : '0.00' ?></td>
                            <td class="border_right border_bottom"><?php echo $pid ?></td>
                            <td class="border_bottom"><?php echo $is_state ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="7" class="bg" style="text-align: left; padding-left: 15px">
                                <div style="float: left; color: #666600">
                                    <!--全部结算金额 <strong class="red"><?php echo $total_money ?></strong> 元&nbsp;-->
                                    全部到账金额 <strong class="red"><?php echo $total_pay ?></strong> 元&nbsp;
							手续费 <strong class="red"><?php echo $total_fee ?></strong> 元
                                </div>
                                <div style="float: right"><?php echo $pagelist ?></div>
                            </td>
                        </tr>
                        <?php else: ?>
                        <tr>
                            <td colspan="7">
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
