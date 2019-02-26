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


                    <div class="col-md-7">
                        <blockquote class="blockquote-default">
                            <p><strong>流水号:<a href="javascript:void(0)" style="text-decoration:underline" onclick="showview('userMoney.php?action=show&id=<?php echo $val['id'] ?>')"><?php echo $val['id'] ?></a></strong></p>
                            <p>支付日期:<?php echo $val['addtime'] ?></p>
                            <p>转账金额:<?php echo $val['money'] ?></p>
                            <p>手续费:<?php echo $val['fee'] ?></p>
                            <p>到账金额:<?php echo $val['is_state']==1 ? number_format(($val['money']-$val['fee']),2,'.','') : '0.00' ?></p>
                            <p>清算方式:<?php echo $pid ?></p>
                            <p>状态:<?php echo $is_state ?></p>
                        </blockquote>
                    </div>

                    <?php endforeach; ?>
                    <div class="col-md-7">
                        <blockquote class="blockquote-blue">
                            <p>
                                <!--全部结算金额 <strong class="red"><?php echo $total_money ?></strong> 元&nbsp;-->
                                全部到账金额 <strong class="red"><?php echo $total_pay ?></strong> 元&nbsp;
							手续费 <strong class="red"><?php echo $total_fee ?></strong> 元
                            </p>
                        </blockquote>
                    </div>
                    <div class="col-md-12">
                        <div class="dataTables_paginate paging_bootstrap"><?php echo $pagelist ?></div>
                    </div>
                    <?php else: ?>

                    <div class="col-md-7">
                        <div class="alert alert-warning">暂无记录</div>
                    </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
