<?php if(!defined('WY_ROOT')) exit; ?>
<!--/header end-->

<style>
.st{height:35px;border:1px solid #d5d5d5; font-family:Geneva, Arial, Helvetica, sans-serif}
</style>

<div class="clear"></div>
  <div class="w-980">
  <div class="banner1"></div>
    <div class="bigbox b_m_t">
	  <div class="bigbox-t">
	    <div class="titbn"><h4>订单查询</h4></div>
	  </div>
	  <div class="clear"></div>
	  <div class="bigbox-c">
    <form name="s" method="get" onsubmit="return checkForm()" action="orderquery.htm">
			<table style="margin:auto">
			<tr>
			<td>
			<select name="st">
				<option value="orderid"<?php echo $st=='orderid' ? ' selected' : '' ?>>订单号</option>

			</select>
			</td>
			<td style="padding-left:10px">
			<input type="text" name="kw" class="search_input" maxlength="50" size="17" value="" />
			</td>
			<td valign="middle" style="padding-left:10px;padding-top:25px">
			<div style="height:59px;line-height:80px"><img style="cursor:pointer" onclick="if($('[name=kw]').val()){s.submit();}else{$('[name=kw]').focus();alert('请填写查询内容！');}" src="/tpl/win8/common/images/search_button.gif" /></div>
			</td>
			</tr>
			</table>
			</form>
			</div>
	</div><!--/bigbox end-->
				
   <div class="b_m_t bigbox">
	  <div class="bigbox-t">
	    <div class="titbn"><h4>最近交易订单</h4> <span style="padding-top:8px; display:inline-block"> &nbsp;(注：仅保留最近50笔本机订单交易记录，产生了支付金额的订单为已付款订单!)</span></div>
	  </div>
	  <div class="clear"></div>
	  <div class="bigbox-c">

		<table class="tabledata" cellpadding="0" cellspacing="0" border="1" align="center">
		 <thead>
		   <tr>
		     <td>提交时间</td>
		     <td>网站订单号</td>
		     <td>支付类型</td>
		     <td>订单金额</td>
			 <td>付款金额</td>		 
			 <td>订单状态</td>
		   </tr>
		 </thead>

		 <tbody>
			<?php if($lists): ?>
			<?php foreach($lists as $key=>$val): ?>
				<tr>
					<td><?php echo $val['addtime'] ?></td>
					<td><?php echo $val['orderid'] ?></td>
					<td><?php echo $val['channelname'] ?></td>
					<td><?php echo number_format($val['price']*$val['quantity'],2,'.','') ?></td>
					<td<?php echo $val['realmoney']>0 ? '  class="green"' : '' ?>><?php echo number_format($val['realmoney'],2,'.','') ?></td>
					<td><a href="orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank">点击查看</a></td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr><td colspan="6">您还没有订单交易记录</td></tr>
			<?php endif; ?>
        </tbody>
	</table>
	</div>
	</div><!--/bigbox end-->
</div><!--/content end-->
<div class="clear"></div>