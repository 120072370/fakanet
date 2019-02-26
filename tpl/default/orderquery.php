<?php if(!defined('WY_ROOT')) exit; ?>
<div id="full_table">
    <div id="tab1200" style="hieght:120px;padding-top:20px;">
	    <dd style="position:relative;height:60px;line-height:40px;width:1200px;min-width:1000px;font-size:16px;font-weight:600;color:#444444;">首页 > 帮助中心</dd>
		<dd id="help_m" style="position:relative;height:60px;line-height:40px;width:1200px;min-width:1200px;">
		    <ul style="font-size:16px;font-weight:600px;">
		        <a href="faq.htm"><li style="float:left;margin-right:20px;height:40px;width:100px;text-align:center;color:#000000;border:1px solid #dfdfdf;">帮助中心</li></a>
		        <a href="login.htm"><li style="float:left;margin-right:20px;height:40px;width:100px;text-align:center;color:#000000;border:1px solid #dfdfdf;">登陆平台</li></a>
		        <a href="sendcode.htm"><li style="float:left;margin-right:20px;height:40px;width:100px;text-align:center;color:#000000;border:1px solid #dfdfdf;">免费注册</li></a>
		        <a href="retpwd.htm"><li style="float:left;margin-right:20px;height:40px;width:100px;text-align:center;color:#000000;border:1px solid #dfdfdf;">找回密码</li></a>
		        <a href="orderquery.htm"><li style="float:left;margin-right:20px;height:50px;width:102px;text-align:center;color:#ffffff;background:url('pub_images/help_menu.png');">订单查询</li></a>
		    </ul>
		</dd>
	</div>
	<div id="tab1200" style="height:860px;" >
	    <div id="company_ch" style="width:400px;z-index:1;background:#ffffff;">[订单查询]</div>
		<div id="company_en" style="height:30px;line-height:30px;width:300px;">ORDER INQUIRY</div>
		<div id="company_button"></div>
	<dd style="position:absolute;width:1200px;height:750px;top:60px;line-height:40px;font-size:16px;letter-spacing:3px;margin:0 auto;border:1px solid #dfdfdf;">
	  <div id="search_main">
          <div class="search_title" style="margin:140px 0 0 0;border:20px solid #dddddd;height:100px;">
		    <form name="s" method="get" onsubmit="return checkForm()" action="orderquery.htm">
			<div style="height:50px;width:460px;margin:30px auto;">

			    <dl style="height:32px;width:100px;float:left;">
			    <select name="st" style="position:relative;height:33px;width:100px;line-height:30px;border-radius: 5px;border:1px solid #dfdfdf;margin:-3px 0;">
			    <option value="contact"<?php echo $st=='contact' ? ' selected' : '' ?> style="height:30px;line-height:30px;">联系方式</option>
			    <option value="orderid"<?php echo $st=='orderid' ? ' selected' : '' ?> style="height:30px;line-height:30px;">订单号</option>
			    <option value="cardnum"<?php echo $st=='cardnum' ? ' selected' : '' ?> style="height:30px;line-height:30px;">充值卡号</option>
			    </select>
			    </dl>
			
			    <dl style="padding-left:10px;height:31px;float:left;width:280px;">
				<input type="text" name="kw" class="search_input" maxlength="50" size="17" value="<?php echo $kw ?>" style="position:relative;height:31px;width:250px;top:-3px;border-radius: 5px;border:1px solid #dfdfdf;line-height:30px;"/>
				</dl>
			
			    <dl style="padding-left:10px;height:30px;width:56px;float:left;">
			    <img style="cursor:pointer" onclick="if($('[name=kw]').val()){s.submit();}else{$('[name=kw]').focus();alert('请填写查询内容！');}" src="pub_images/search.jpg" style="width:56px;height:30px;"/>
			    </dl>

			</div>
			</form>
		  </div>
		  <div style="clear:both;"></div>
<?php if(!$st && !$kw): ?>
		  <div class="search_tip" style="position:relative;height:200px;float:none;width:1100px;line-height:60px;text-aligin:left;font-size:14px;margin:100px auto;">
			<b style="font-size:18px;font-weight:600;">订单查询方式介绍：<hr style="height:2px;background-color:#c5c5c5;width:1100px;border:0;"></b></br>
			订单号查询：订单号是您在提交支付的时候，系统自动分配的一个交易凭证，输入对应的订单号即可查询该订单的详情。</br>
			支付卡号查询：支付卡号是您选择使用充值卡支付方式进行付款的充值卡卡号。</br>
			联系方式查询：订单提交时您所预留的联系方式（QQ号码、手机号码、E-mail）订单查询凭证信息。推荐使用此方式查询）</br>
			备注：订单查询仅能查询最近30天的数据，通过联系方式可以查询到该订单的所有交易记录.
		  </div>
<?php endif; ?>
        
	
<?php if($st!='orderid' && $st!='' && $kw!=''): ?>
		<div class="search_result">
		    <span>查询时间：<?php echo date('Y-m-d H:i:s') ?></span>
			<div class="search_list">
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
		
		    <span style="font-size:16px;font-weight:600;">查询时间：<?php echo date('Y-m-d H:i:s') ?></span>
		    <?php if($lists): ?>
			<?php if($lists[0]['is_status']==1): ?>
			<a href="javascript:void(0)" onclick="javascript:window.location.href='orderquery.htm?do=export&orderid=<?php echo $orderid ?>'" style="position:relative;margin-top:-20px;left:500px;color:blue;text-decoration:underline">导出订单卡密到文本TXT</a>
			<?php endif; ?>
			<?php endif; ?>
			<div class="search_list">
                <table>
				    <tr>
					<th width="20%">订单时间</th>
					<th width="15%">订单号</th>
					<th width="35%">卡密<span id="tips" style="font-weight:100"></span></th>
					<th width="10%">订单金额</th>
					<th width="10%">支付金额</th>
					<th width="10%">订单状态</th>
					</tr>

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
					<div id="cardinfo" style=" overflow-y: scroll; height:200px;   ">
                        <?php if($val['is_state']==0): ?>
						    <img src="tpl/default/images/load.gif" align="absmiddle" /> 请稍候，正在查询(请勿刷新)......
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
									    $('#tips').html('(已发货/购买数：<font color="green">' + data.quantity + '</font>/' + data.quantity + ')');
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

		   <strong style="display:block;margin-top:10px;font-size:16px;font-weight:600;">订单支付详情</strong>
		   <p style="display:block;float:right;position:relative;margin-top:-10px;padding-right:10px"><a href="lin/report.php?uid=<?php echo $userid ?>&t=1" class="nyroModal" id="report" style="color:red">举报投诉</a></p>
		  <div class="search_list">
                <table>
				    <tr>
					<th width="20%">支付时间</th>
					<th width="15%">支付类型</th>
					<th width="25%">卡号</th>
					<th width="10%">面额</th>
					<th width="10%">卡价值</th>
					<th width="20%">支付状态</th>
					</tr>

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
				        <p style="border:1px solid #eff3dc;background:#f5fde6;color:#800000;font-size:14px;padding:5px 20px;margin-top:15px">&nbsp;</p>
					<?php elseif($is_display_remark==0): ?>
				        <p style="border:1px solid #eff3dc;background:#f5fde6;color:#800000;font-size:14px;padding:5px 20px;margin-top:15px"><?php echo $goodremark ?></p>
					<?php endif; ?>
				<?php endif; ?>
		  </div>
		</div>
<?php endif; ?>
	</div>
	<script>
	$(function(){
	$.extend($.fn.nyroModal.settings,{ modal: true, minHeight: 400, minWidth: 500});
	$('#report').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 320, height: 280 });
	})
	</script>
	</dd>
	</div>
</div>