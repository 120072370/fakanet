<?php if(!defined('WY_ROOT')) exit; ?>
﻿<style>
.st{height:35px;border:1px solid #d5d5d5; font-family:Geneva, Arial, Helvetica, sans-serif}
.Crumbs p a { color: #999; }
.Crumbs h2 { font-size: 18px; }
.Crumbs h2 span { font-size: 14px; color: #adadad }
.Crumbs h2 span span { font-size: 24px; padding-right: 5px; }
.Crumbs h2 i { width: 32px; height: 32px; display: inline-block; position: relative; top: 10px; margin-right: 10px; }
.Crumbs .help i { background-position: -445px -34px; }
.Crumbs .card i { background-position: -445px 0; }
.search_input{border:1px solid #ccc;background:#fff;font-weight:200}
.search_button{cursor:pointer;background:url(tpl/219kacom/images/search_button.gif);width:111px;height:59px;border:0;}
.search_tip{border-top:0px solid #dadada;padding:15px 20px;margin-top:10px;font-size:13px}
.search_tip strong{color:#003584}
.search_tip p{margin:20px 0;color:#424242}
.search_tip p span{color:#844700}
button {
	background-color: #4d90fd;
	border: 1px solid #3079ed;
	color: #fff;
	cursor: pointer;
}
.tabledata{width:50%;margin:10px auto;border:1px solid #ccc;}
.tabledata tr{background-color:#fff}
.tabledata thead td{border:1px solid #ccc;font-size:14px;font-weight:700;text-align:center;background:url(tpl/219kacom/images/titbg.png) repeat-x;height:48px;line-height:48px}
.tabledata tbody td{border:1px solid #ccc;height:35px;line-height:35px;text-align:center}span.right,span.wrong{background:url(tpl/219kacom/images/right.png) no-repeat 0 10px;margin:0 auto;width:17px;height:35px;overflow:hidden;display:block;text-indent:-9999px}span.wrong{background:url(../images/wrong.png) no-repeat 0 10px}
#cardinfo{border:1px solid #f00;padding:3px;text-align:left;color:blue;line-height:20px}

</style>
<div class="Banner">
<div class="img" style="background-image: url(images/banquery.jpg);"></div>
</div>
<div class="Crumbs w">
<h2 class="card"><i></i>订单查询<span><span>/</span>  Order</span></h2>
</div>
<div class=" w">
<div class="tb"></div>
<div class="block">
	  <div >
    <form name="s" method="get" onSubmit="return checkForm()" action="orderquery.htm">
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
			<input type="text" name="kw" class="search_input" maxlength="50" style="width:220px;height:30px" value="<?php echo $kw ?>" />
			</td>
			
		<td valign="middle" style="padding-left:10px;padding-top:25px">
			<div style="height:59px"><button type="submit" onClick="if($('[name=kw]').val()){s.submit();}else{$('[name=kw]').focus();alert('请填写查询内容！');return false;}">立即查询</button></div>
			</td>
			</tr>
			</table>
			</form>
			</div>
	</div><!--/bigbox end-->
				<ul>
<?php if(!$st && !$kw): ?>

		
			<div class="search_tip">
			<strong>订单查询方式介绍：</strong>
			<p><span>订单号查询：</span>此订单号是您在支付提交的时系统分配的一个交易凭证，输入对应的交易订单号查询即可了解该订单的详情。</p>
			<p><span>支付卡号查询：</span>支付卡号指的是选择了”充值卡支付“的订单交易时候填写的“卡号”，并非网银付款的付款帐号。</p>
			<p><span>联系方式查询：</span>订单提交时，平台让您预留的联系方式(QQ号、手机、E-mail)的凭证信息。<span style="color:red;text-decoration:underline">(推荐您选择的此查询方式)</span></p>
			<p><span>备注：</span>订单查询仅能查询最近30天的数据,通过“支付卡号”可以查询到该凭证的所有交易记录.</p>
		</div>

<?php endif; ?>
	</div><!--/bigbox end-->
				<ul>


<?php if($st!='orderid' && $st!='' && $kw!=''): ?>
		<div class="search_result">
		    <div align="center"><span>查询时间：<?php echo date('Y-m-d H:i:s') ?></span>
		      
	          </div>
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
					<td><a href="orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank">点击查看</a></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				    <tr><td colspan="6">暂无记录</td></tr>
				<?php endif; ?>
		  </table>
			</div>
		</div>
<?php endif; ?>

<?php if($st=='orderid' && $kw!=''): ?>
		<div class="search_result">
		
		    <div align="center"><span>查询时间：<?php echo date('Y-m-d H:i:s') ?></span>
		        <?php if($lists): ?>
		        <?php if($lists[0]['is_status']==1): ?>
		        <a href="javascript:void(0)" onClick="javascript:window.location.href='orderquery.htm?do=export&orderid=<?php echo $orderid ?>'" style="position:relative;margin-top:-20px;left:500px;color:blue;text-decoration:underline">导出订单卡密到文本TXT</a>
		        <?php endif; ?>
		        <?php endif; ?>
		      
	      </div>
		    <table class="tabledata" cellpadding="0" cellspacing="0" border="1" align="center">
		 <thead>
		   <tr>
		     <td>订单时间</td>
		     <td>订单号</td>
		     <td width="35%">卡密<span id="tips" style="font-weight:100"></span></td>
		     <td>订单金额</td>
			 <td>支付金额</td>		 
			 <td>订单状态</td>
		   </tr>
		 </thead>

		 <tbody>
													<tr>
		<div class="Bannerr">
<div class="foot"></div>
</div>
				<?php if($lists): ?>
				<?php 
				foreach($lists as $key=>$val): 
				$userid=$val['userid'];
				$goodremark=$val['goodremark'];
				$is_display_remark=$val['is_display_remark'];
				$order_status=$val['is_status'];
				?>
					<tr>
					<td><?php echo $val['addtime'] ?></td>
					<td><?php echo $val['orderid'] ?></td>
					<td>
					<div id="cardinfo">
                        <?php if($val['is_state']==0): ?>
						    <img src="tpl/skyblue/images/load.gif" align="absmiddle" /> 请稍候，正在查询(请勿刷新)......
							<script>
							$(function(){
								getgoods();
							})

							var getgoods=function(){
								$.ajax({
								   type: "GET",
								   url: "checkgoods.htm?orderid=<?php echo $kw ?>",
								   dataType: "json",
								   cache: false,
								   timeout: 10000,
								   error: function(XMLHttpRequest, textStatus, errorThrown){
								       alert('取卡过程中出现故障，请重试！');
								       window.location.reload();
								   },
								   success: function(data){
									$('#cardinfo').html(data.msg); 
									if(data.status == 1){
										$('#tips').html('(已发货/购买数：<font color="green">' + data.num + '</font>/' + data.quantity + ')');										
									}
								   }
								});
							}
							</script>
						<?php else: ?>
						该订单已人工处理
						<?php endif; ?>
                    </div>
					</td>
					<td><?php echo $val['price']*$val['quantity'] ?></td>
					<td><?php echo $val['realmoney'] ?></td>
					<td style="line-height:20px">
					<?php if($val['is_state']==0): ?>
					    <?php if($val['is_status']==0): ?>
						<a href="lin/go.php?orderid=<?php echo $val['orderid'] ?>" target="_blank">未付款<br />马上付款</a></a>
						<?php elseif($val['is_status']==2): ?>
						<a href="lin/go.php?orderid=<?php echo $val['orderid'] ?>" target="_blank">部分付款<br />继续支付</a></a>
						<?php elseif($val['is_status']==1): ?>
						<span class="green">完成付款<br />订单完成</span>
						<?php elseif($val['is_status']==4): ?>
						<span class="red">完成付款<br />订单已退款</span>
						<?php endif; ?>
					<?php else: ?>
					订单已关闭
					<?php endif; ?>
					</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				    <tr><td colspan="6">暂无记录</td></tr>
				<?php endif; ?>
		  </table>
			</div>

		   <div align="center"><strong style="display:block;margin-top:10px">订单支付详情</strong>
		     </div>
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

				<?php if($orderList): ?>
				<?php foreach($orderList as $key=>$val): ?>
					<tr>
					<td><?php echo $val['addtime'] ?></td>
					<td><?php echo $val['channelname'] ?></td>
					<td><?php echo $val['cardnum']=='' ? '-' : $val['cardnum'] ?></td>
					<td><?php echo $val['money'] ?></td>
					<td><?php echo $val['realmoney'] ?></td>
					<td><?php echo $val['is_state']==1 ? '<span class="green">成功</span>' : '<span class="red">失败</span>' ?></td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				    <tr><td colspan="6">暂无记录</td></tr>
				<?php endif; ?>
		     </table>
				<?php if($goodremark): ?>
				    <?php if($is_display_remark==1 && $order_status==1): ?>
				    <p style="border:1px solid #eff3dc;background:#f5fde6;color:#800000;font-size:14px;padding:5px 20px;margin-top:15px">您购买商品名称：<?php echo $goodremark ?></p>
					    <?php elseif($is_display_remark==0): ?>
				        <p style="border:1px solid #eff3dc;background:#f5fde6;color:#800000;font-size:14px;padding:5px 20px;margin-top:15px">您购买商品名称：<?php echo $goodremark ?></p>
					    <?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
<?php endif; ?>
	<script>
	$(function(){
	$.extend($.fn.nyroModal.settings,{ modal: true, minHeight: 400, minWidth: 500});
	$('#report').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 320, height: 280 });
	})
	</script>
</ul>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
