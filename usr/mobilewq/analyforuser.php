<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    .input {
        height: 32px;
    }

    select {
        height: 32px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">收益统计</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">

                <div class="main">
                    <div class="col-md-12">
                        <form name="search" method="get" action="">
                            <select name="cateid" onchange="selectGood()" class="form-control">
                                <option value="">请选择商品分类</option>
                                <?php 
                                if($goodCate): 
                                    foreach($goodCate as $key=>$val):
                                        if($val['userid']==$_SESSION['login_userid']):
                                ?>
                                <option value="<?php echo $val['id'] ?>" <?php echo $cateid==$val['id'] ? 'selected' : '' ?>><?php echo $val['catename'] ?></option>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </select>&nbsp;<span id="goodlist" style="display: none">正在加载...</span>
                            <!--<p style="margin:10px 0">-->
                            时间范围：<input type="text" name="fdate"  data-format="yyyy-mm-dd" class="form-control datepicker" id="txtDate"  size="10" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
					至
                            <input type="text" name="tdate" data-format="yyyy-mm-dd" class="form-control datepicker" id="txtDate1"  size="10" readonly="readonly" value="<?php echo $tdate ?>" />
                            <!--时间范围：<input name="fdate" id="txtD1" style="width:160px" class="Wdate input" type="text" size="12" style="vertical-align:middle;" onFocus="var d5222=$dp.$('txtD2');WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',onpicked:function(){txtD2.focus();},maxDate:'#F{$dp.$D(\'txtD2\')}',maxDate:'2020-10-01 00:00'})" value="" /> 到 <input  name="tdate" id="txtD2" style="width:160px" class="Wdate input" type="text" size="12" style="vertical-align:middle;" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'txtD1\')}',maxDate:'2020-10-01 00:00'})" value="" />-->
                            <!--</p>-->
                            <br />
                            <select name="channelid" class="form-control">
                                <option value="">请选择支付方式</option>
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
                            </select>&nbsp;
					<input type="text" class="form-control" name="orderid" value="<?php echo $orderid ?>"placeholder="请输入订单号" />
                            <br />
                            <input type="submit" class="btn btn-success" value="查询" />
                            <input type="button" onclick="javascript:window.location.href='?do=export&cateid=<?php echo $cateid ?>    &goodid=<?php echo $goodid ?>    &fdate=<?php echo $fdate ?>    &tdate=<?php echo $tdate ?>    &channelid=<?php echo $channelid ?>    &orderid=<?php echo $orderid ?>    '" class="btn btn-info" value="批量导出" />
                            <input type="hidden" name="do" value="search" />
                        </form>
                    </div>
                    <hr />


                    <?php if($lists): ?>
                    <?php 
                              $t1=0;
                              $t2=0;
                              $t3=0;
                              $t4=0;
                              $t5=0;
                              foreach($lists as $key=>$val): 
                                  $l=number_format($val['income']-($val['cbprice']*$val['quantity']),2,'.','');
                    ?>

                    <div class="well">
                        <p>商品名称：<a href="../orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank"><?php echo $val['goodname'] ?></a><?php echo $val['is_api'] ? '<span style="color:red;vertical-align:super;font-size:9px">API</span>' : '' ?> <?php echo $val['is_discount'] ? '<span style="color:red;vertical-align:super;font-size:9px">批</span>' : '' ?> <?php echo $val['is_coupon'] ? '<span style="color:red;vertical-align:super;font-size:9px">券</span>' : '' ?> <?php echo $val['is_pwdforsearch'] ? '<span style="color:red;vertical-align:super;font-size:9px">取</span>' : '' ?></p>
                        <p>数量：<?php echo $val['quantity'] ?></p>
                        <p>进价：<?php echo $val['cbprice'] ?>元</p>
                        <p>面额：<?php echo $val['goodprice'] ?>元</p>
                        <p>收入：<?php echo number_format($val['income'],2,'.','') ?>元</p>
                        <p>利润：<?php echo $l ?>元</p>
                        <p>支付方式：<?php echo $val['channelname'] ?></p>
                        <p>下单时间：<?php echo $val['addtime'] ?></p>
                    </div>

                    <?php
                                  $t1+=$val['quantity'];
                                  $t2+=$val['income'];
                                  $t3+=$val['income']-($val['cbprice']*$val['quantity']);
                                  $t4+=$val['goodprice'];
                                  $t5+=$val['money'];
                              endforeach; 

                              //总的统计
                              $t_t1=$t_t2=$t_t3=$t_t4=0;
                              if($t_lists){
                                  foreach($t_lists as $key=>$val){
                                      $t_t1+=$val['quantity'];
                                      $t_t2+=$val['income'];
                                      $t_t3+=$val['income']-($val['cbprice']*$val['quantity']);
                                      $t_t4+=$val['goodprice'];
                                  }
                              }
                    ?>
                    <div class="alert alert-info">
                        总计卖出<strong class="red"><?php echo $t_t1 ?></strong>张卡，
						   总收入<strong class="red"><?php echo number_format($t_t2,2,'.','') ?></strong>元，
						   总利润<strong class="red"><?php echo number_format($t_t3,2,'.','') ?></strong>元，
						   总面额<strong class="red"><?php echo number_format($t_t4,2,'.','') ?></strong>元
						   <!--商品总销售价<strong class="red"><?php echo number_format($t5,2,'.','') ?></strong>元-->
                    </div>

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
				<?php if($goodid): ?>
    $(function(){
        selectGood();
    })
				<?php endif; ?>
				
    var selectGood=function(){
        var cateid=$('[name=cateid]').val();
        if(cateid==''){
            $('#goodList').hide();
            $('$goodList').html('');
        } else {
            $('#goodList').show();
        }

        $.get('analyforuser.php',{action:'getgoodlist',cateid:cateid,goodid:<?php echo $goodid ? $goodid : 0 ?>},function(data){
            if(data!=''){
                $('#goodList').html(data);
            } else {
                $('$goodList').hide();
                alert('此分类下没有商品！');
            }
        })
    }
</script>
<script src="<?php echo USER_THEME ?>/assets/js/bootstrap-datepicker.js"></script>
