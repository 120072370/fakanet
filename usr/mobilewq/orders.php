<?php if(!defined('WY_ROOT')) exit; ?>
<style type="text/css">
    .search_select {
        display: inline-block;
    }

    .input {
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">订单查询</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">

                <div class="main">
                    <div style="padding: 0 10px 10px 10px">
                        <form name="search" method="get" action="">
                            时间范围：
                            <input type="text" name="fdate" data-format="yyyy-mm-dd" class="form-control datepicker"  id="txtDate" size="10" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
						至
                            <input type="text" name="tdate" class="form-control datepicker" data-format="yyyy-mm-dd"  id="txtDate1"  size="10" readonly="readonly" value="<?php echo $tdate ?>" />&nbsp;&nbsp;
                            <br />
                            支付状态：<select name="t" class="search_select form-control">
                                <option value="t0"<?php echo $t=='t0' ? ' selected' : '' ?>>所有</option>
                                <option value="t1"<?php echo $t=='t1' ? ' selected' : '' ?>>未付款</option>
                                <option value="t4"<?php echo $t=='t4' ? ' selected' : '' ?>>已退款</option>
                                <option value="t2"<?php echo $t=='t3' ? ' selected' : '' ?>>部分付款</option>
                                <option value="t3"<?php echo $t=='t3' ? ' selected' : '' ?>>付款成功</option>
                            </select>&nbsp;&nbsp;
						支付类型：<select name="channelid" class="search_select form-control">
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
						商品类型：<select name="is_api" class="search_select form-control">
                            <option value="" <?php echo $is_api=='' ? 'selected' : '' ?>>全部</option>
                            <option value="a0" <?php echo $is_api=='a0' ? 'selected' : '' ?>>在线售卡</option>
                            <option value="a1" <?php echo $is_api=='a1' ? 'selected' : '' ?>>在线充值</option>
                        </select>

                            <p style="margin-top: 10px">
                                查询类别：<select name="st" class="search_select form-control">
                                    <option value="st1"<?php echo $st=='st1' ? ' selected' : '' ?>>订单号</option>
                                    <option value="st2"<?php echo $st=='st2' ? ' selected' : '' ?>>充值卡号</option>
                                    <option value="st3"<?php echo $st=='st3' ? ' selected' : '' ?>>联系方式</option>
                                    <option value="st4"<?php echo $st=='st4' ? ' selected' : '' ?>>商品名称</option>
                                    <option value="st5"<?php echo $st=='st5' ? ' selected' : '' ?>>商品卡号</option>
                                </select>&nbsp;&nbsp;
						<input type="text" name="kw" placeholder="输入关键词" class="form-control" value="<?php echo $kw ?>" />

                                <br />
                                <input type="submit" class="btn btn-success" value="查询" />
                                <input type="hidden" name="do" value="search" />
                                <a href="javascript:void(0)" title="批量关闭未付订单" onclick="showview('?action=batchClose','批量关闭未付订单')" class="btn btn-danger">批量关闭未付订单</a>
                            </p>

                        </form>
                        <!--<p style="color:Red; padding-top: 10px;">订单总金额:<?php echo $totalPrice['price']?> &nbsp; &nbsp;成功金额:<?php echo $totalPrice1['price']?></p>-->
                    </div>
                    <hr />
                 
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
                        <div class="well" id="s<?php echo $val['orderid'] ?>">
                            <p class="text-info">订单编号:<a href="../orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank"><?php echo $val['orderid'] ?></a></p>
                            <p>交易时间:<?php echo $val['addtime'] ?></p>
                            <p>商品名称:<?php echo $val['goodname'] ?>(<span class="red"><?php echo $val['quantity'] ?></span>张)<span class="red"><?php echo $val['is_api'] ? '<span style="color:red;vertical-align:super;font-size:9px">API</span>' : '' ?> <?php echo $val['is_discount'] ? '<span style="color:red;vertical-align:super;font-size:9px">批</span>' : '' ?> <?php echo $val['is_coupon'] ? '<span style="color:red;vertical-align:super;font-size:9px">券</span>' : '' ?> <?php echo $val['is_pwdforsearch'] ? '<span style="color:red;vertical-align:super;font-size:9px">取</span>' : '' ?></span></p>
                            <p>支付方式:<?php echo $val['channelname'] ?></p>
                            <p>金额:<?php echo $val['price'] ?></p>
                            <p>购买者信息:<?php echo $val['contact'] ?></p>
                            <p class="text-danger">状态:<?php echo $is_status ?></p>
                            <p>管理: 
                                <span id="c<?php echo $val['orderid'] ?>">
                                    <a href="javascript:void(0)"  <?php echo $val['is_state']==1 ? 'class="btn btn-red btn-xs "' : 'class="btn btn-success btn-xs "' ?> onclick="op('<?php echo $val['orderid'] ?>',<?php echo $val['is_state']==0 ? 1 : 0 ?>)"><?php echo $val['is_state']==0 ? '关' : '开' ?></a></span>|
                                <a href="javascript:void(0)" class="btn btn-info btn-xs"  onclick="window.location.href='../?mod=orderquery&do=export&orderid=<?php echo $val['orderid'] ?>'" title="导出订单信息">导出</a></p>
                        </div>
                       <!-- <tr class="lightbox" >
                            <td class="border_right border_bottom"></td>
                            <td class="border_right border_bottom"><?php echo $val['addtime'] ?></td>
                            <td class="border_right border_bottom"></td>
                            <td class="border_right border_bottom"><?php echo $val['channelname'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['price'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['contact'] ?></td>
                            <td class="border_right border_bottom"><?php echo $is_status ?></td>
                            <td class="border_bottom">
                               
                            </td>
                        </tr>-->
                        <?php endforeach; ?>
                        <div class="col-md-12">
                            <div class="dataTables_paginate paging_bootstrap"><?php echo $pagelist ?></div>
                        </div>
                        <?php else: ?>
                        <div class="col-md-12">
                                <div class="alert alert-warning">暂无记录</div>
                            </div>
                        <?php endif; ?>
                   
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
                $('#c' + orderid).html('<img src="weiqi/images/load.gif" />');
            }
        })
    }

</script>
<script src="<?php echo USER_THEME ?>/assets/js/bootstrap-datepicker.js"></script>
