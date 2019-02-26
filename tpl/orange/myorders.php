<?php if(!defined('WY_ROOT')) exit; ?>
	<div id="search_main">
        <div class="search_title">
		    <form name="s" method="get" onsubmit="return checkForm()" action="orderquery.htm">
			<table>
			<tr>
			<td style="height:60px;">
			<select name="st">
			<option value="orderid"<?php echo $st=='orderid' ? ' selected' : '' ?>>订单号</option>
			<option value="contact"<?php echo $st=='contact' ? ' selected' : '' ?>>联系方式</option>
			<option value="cardnum"<?php echo $st=='cardnum' ? ' selected' : '' ?>>充值卡号</option>
			</select>
			</td>
			<td style="padding-left:10px;height:60px;">
			<input type="text" name="kw" class="search_input" maxlength="50" size="17" value="<?php echo $kw ?>" />
			</td>
			<td valign="middle" style="padding-left:10px;height:60px;">
			<img style="cursor:pointer" onclick="if($('[name=kw]').val()){s.submit();}else{$('[name=kw]').focus();alert('请填写查询内容！');}" src="tpl/orange/images/search_button.png" />
			</td>
			</tr>
			</table>
			</form>
		</div>

		<div class="search_result">
		    <p style="float:left;margin:15px 0 18px;">查询时间：<?php echo date('Y-m-d H:i:s') ?></p>
			<p style="float:right;margin:15px 0 18px;">仅保留最近50条本机订单交易记录，产生了支付金额的订单为已付款订单！</p>
			<div class="search_list" style="clear:both">
                <table>
				    <tr>
					<th width="25%">订单时间</th>
					<th width="20%">订单号</th>
					<th width="10%">支付方式</th>
					<th width="15%">订单金额</th>
					<th width="15%">支付金额</th>
					<th width="15%">订单状态</th>
					</tr>
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
				</table>
			</div>
		</div>
	</div>
