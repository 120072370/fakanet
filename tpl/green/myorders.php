<?php if(!defined('WY_ROOT')) exit; ?>
<link href="tpl/green/common/css/page.css" rel="stylesheet" type="text/css" />

<div class="content">
  <div class="page_banner">
     <img src="banner/images/banner_1.jpg" />
  </div>
  <div class="new_wnwl">
  <div class="page_gonggao">
			
				<div class="page_content">
					<div id="content" class="main b_clear b_m_b">
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
			<option value="contact"<?php echo $st=='contact' ? ' selected' : '' ?>>联系方式</option>
			<option value="cardnum"<?php echo $st=='cardnum' ? ' selected' : '' ?>>充值卡号</option>
			</select>
			</td>
			<td style="padding-left:10px">
			<input type="text" name="kw" class="search_input" maxlength="50" size="17" value="<?php echo $kw ?>" />
			</td>
			<td valign="middle" style="padding-left:10px;padding-top:25px">
			<div style="height:59px;line-height:80px"><img style="cursor:pointer" onclick="if($('[name=kw]').val()){s.submit();}else{$('[name=kw]').focus();alert('请填写查询内容！');}" src="tpl/green/common/images/search_button.gif" /></div>
			</td>
			</tr>
			</table>
			</form>
			</div>
	</div><!--/bigbox end-->
				
   <div class="b_m_t bigbox">
	  <div class="bigbox-t">
	    <div class="titbn"><h4>最近交易订单</h4> <span style="padding:8px 0 0 400px; display:inline-block;">仅保留最近50笔本机订单交易记录，产生了支付金额的订单为已付款订单！</span></div>
	  </div>
	  <div class="clear"></div>
	  <div class="bigbox-c">

		<table class="tabledata" cellpadding="0" cellspacing="0" border="1" align="center">
		 <thead>
		   <tr>
		     <td>提交时间</td>
		     <td>商户订单</td>
		     <td>支付类型</td>
		     <td>订单金额</td>
			 <td>实际付款</td>		 
			 <td>付款状态</td>
		   </tr>
		 </thead>

		 <tbody>
				<?php if($lists): ?>
				<?php foreach($lists as $key=>$val): ?>
					<tr>
					<td><?php echo $val['addtime'] ?></td>
					<td><?php echo $val['orderid'] ?></td>
					<td><?php echo $val['channelname'] ?></td>
					<td><?php echo $val['price'] ?></td>
					<td><?php echo $val['realmoney'] ?></td>
					<td><a href="orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank" style="color:red">点击查看</a></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<tr><td colspan="6" align="center" style="color:#003300;;height:140px;line-height:140px">提示：没有找到订单</td></tr>
				<?php endif; ?>

        </tbody>
		</table>

	  </div>
	</div><!--/bigbox end-->
</div>
					
				</div>
			</div>
		</div>


</div>
</div>



<!--/content end-->
