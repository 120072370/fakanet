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
                    <div style="padding: 10px">
                        <form name="search" method="get" action="">
                            <select name="cateid" onchange="selectGood()">
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
                            时间范围：<input type="text" name="fdate"  data-format="yyyy-mm-dd" class="input datepicker" style="width:150px" id="txtDate"  size="10" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
					至
                            <input type="text" name="tdate" data-format="yyyy-mm-dd" class="input datepicker" style="width:150px" id="txtDate1"  size="10" readonly="readonly" value="<?php echo $tdate ?>" />
                            <!--时间范围：<input name="fdate" id="txtD1" style="width:160px" class="Wdate input" type="text" size="12" style="vertical-align:middle;" onFocus="var d5222=$dp.$('txtD2');WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',onpicked:function(){txtD2.focus();},maxDate:'#F{$dp.$D(\'txtD2\')}',maxDate:'2020-10-01 00:00'})" value="" /> 到 <input  name="tdate" id="txtD2" style="width:160px" class="Wdate input" type="text" size="12" style="vertical-align:middle;" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'txtD1\')}',maxDate:'2020-10-01 00:00'})" value="" />-->
                            <!--</p>-->

                            <select name="channelid">
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
					<input type="text" class="input" name="orderid" value="<?php echo $orderid ?>"placeholder="请输入订单号" />

                            <input type="submit" class="btn btn-success" value="查询" />
                            <input type="button" onclick="javascript:window.location.href='?do=export&cateid=<?php echo $cateid ?>    &goodid=<?php echo $goodid ?>    &fdate=<?php echo $fdate ?>    &tdate=<?php echo $tdate ?>    &channelid=<?php echo $channelid ?>    &orderid=<?php echo $orderid ?>    '" class="btn btn-info" value="批量导出" />
                            <input type="hidden" name="do" value="search" />
                        </form>
                    </div>

                    <table class="table table-bordered table-responsive" cellspacing="1">
                         <thead>
                        <tr>
                            <th class="border_right border_bottom">商品名称</th>
                            <th class="border_right border_bottom">数量</th>
                            <th class="border_right border_bottom">进价</th>
                            <th class="border_right border_bottom">面额</th>
                            <th class="border_right border_bottom">收入</th>
                            <th class="border_right border_bottom">利润</th>
                            <th class="border_right border_bottom">支付方式</th>
                            <th class="border_bottom">下单时间</th>
                        </tr>
                             </thead>
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
                        <tr class="lightbox">
                            <td class="border_right border_bottom"><a href="../orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank"><?php echo $val['goodname'] ?></a><?php echo $val['is_api'] ? '<span style="color:red;vertical-align:super;font-size:9px">API</span>' : '' ?> <?php echo $val['is_discount'] ? '<span style="color:red;vertical-align:super;font-size:9px">批</span>' : '' ?> <?php echo $val['is_coupon'] ? '<span style="color:red;vertical-align:super;font-size:9px">券</span>' : '' ?> <?php echo $val['is_pwdforsearch'] ? '<span style="color:red;vertical-align:super;font-size:9px">取</span>' : '' ?></td>
                            <td class="border_right border_bottom"><?php echo $val['quantity'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['cbprice'] ?>元</td>
                            <td class="border_right border_bottom"><?php echo $val['goodprice'] ?>元</td>
                            <td class="border_right border_bottom"><?php echo number_format($val['income'],2,'.','') ?>元</td>
                            <td class="border_right border_bottom"><?php echo $l ?>元</td>
                            <td class="border_right border_bottom"><?php echo $val['channelname'] ?></td>
                            <td class="border_bottom"><?php echo $val['addtime'] ?></td>
                        </tr>
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
                        <tr>
                            <td colspan="8" class="border_bottom" style="padding-left: 10px; background: #f2fae3; text-align: left">总计卖出<strong class="red"><?php echo $t_t1 ?></strong>张卡，
						   总收入<strong class="red"><?php echo number_format($t_t2,2,'.','') ?></strong>元，
						   总利润<strong class="red"><?php echo number_format($t_t3,2,'.','') ?></strong>元，
						   总面额<strong class="red"><?php echo number_format($t_t4,2,'.','') ?></strong>元
						   <!--商品总销售价<strong class="red"><?php echo number_format($t5,2,'.','') ?></strong>元-->
                            </td>
                        </tr>

                        <tr>
                            <td colspan="8" class="bg" style="padding-left: 10px"><?php echo $pagelist ?></td>
                        </tr>
                        <?php else: ?>
                        <tr>
                            <td colspan="8">暂无记录</td>
                        </tr>
                        <?php endif; ?>
                    </table>
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
