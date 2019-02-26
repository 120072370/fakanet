<?php if(!defined('WY_ROOT')) exit;?>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span>  订单管理  <span>&raquo;</span> 24小时订单分析</div>
<div class="main">
<!--####搜索查询####-->
<form name="s" method="get" action="">
商户名：<input type="text" class="input" size="20" name="username" value="<?php echo $username ?>" /> 
&nbsp;
选择日期：<input type="text" name="fdate" class="input" id="txtDate" onclick="SelectDate(this)" size="12" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
<input type="submit"  class="button_bg_2" value="立即查询" />
<input type="hidden" name="do" value="search" />
</form>
<div class="h10"></div>
<!--####信息列表####-->
<table border="0" cellspacing="1" class="tablelist">
<tr>
<th>时间段</th>
<th>提交订单</th>
<th>成功订单</th>
<th>失败订单</th>
<th>提交金额</th>
<th>成功金额</th>
<th>商户收入</th>
<th>平台收入</th>
</tr>

<?php
if($lists): 
$t1=$t2=$t3=$t4=$t5=$t6=$t7=0;
foreach($lists as $key=>$row):
if($row['total_orders']!=0):
?>

<tr class="lightbox">
<td><?php echo $key<10 ? '0'.$key : $key ?>:00</td>
<td><?php echo $row['total_orders'] ?></td>
<td><?php echo $row['success_orders'] ?></td>
<td><?php echo $row['fail_orders'] ?></td>
<td><?php echo number_format($row['total_money'],2,'.','') ?></td>
<td><?php echo number_format($row['success_money'],2,'.','') ?></td>
<td><?php echo number_format($row['income_money'],2,'.','') ?></td>
<td><?php echo number_format($row['sys_income_money'],2,'.','') ?></td>
</tr>
<?php
endif;
$t1=$t1+$row['total_orders'];
$t2=$t2+$row['success_orders'];
$t3=$t3+$row['fail_orders'];
$t4=$t4+$row['total_money'];
$t5=$t5+$row['success_money'];
$t6=$t6+$row['income_money'];
$t7=$t7+$row['sys_income_money'];
endforeach;
?>

<tr class="graybg" style="background-color:yellow">
<td style="text-align:right" class="bold">统计：</td>
<td><span class="bold"><?php echo $t1 ?></span>条订单</td>
<td><span class="bold"><?php echo $t2 ?></span>条订单</td>
<td><span class="bold"><?php echo $t1-$t2 ?></span>条订单</td>
<td><span class="bold"><?php echo number_format($t4,2,'.','') ?></span>元</td>
<td><span class="bold"><?php echo number_format($t5,2,'.','') ?></span>元</td>
<td><span class="bold"><?php echo number_format($t6,2,'.','') ?></span>元</td>
<td><span class="bold"><?php echo number_format($t7,2,'.','') ?></span>元</td>
</tr>
</table>
<?php endif; ?>
</div>