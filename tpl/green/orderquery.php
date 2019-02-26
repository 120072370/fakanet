<?php if (!defined('WY_ROOT')) exit; ?>

<script src="/new2/main.js"></script>
<script>
    $(function () {
        $("#menu_bg").removeClass("wow slideInDown");
    });
</script>


		
<!--orderid-->

<link href="/new2/order.css" rel="stylesheet" type="text/css">
<link href="/new2/basic.css" rel="stylesheet" type="text/css">

<div id="dowebok">
    <div class="section section1">
        <div class="wid960">
            <div class="tab">
                <ul>
                    <li id="tow2" class="on" onclick='setTab("tow", 2, 3)'>通过订单编号查询</li>
                    <li id="tow1"  onclick='setTab("tow", 1, 3)'>通过联系方式查询</li>
                </ul>
            </div>
            <div class="tabList">
                <div id="cont_tow_1" class="one">
                    <form action="" method="get">
                        <input type="hidden" name="st" value="contact">
                        <input name="kw" type="text" value="<?php echo $kw ?>" placeholder="请输入下单时填写的联系方式" class="t1">
                        <button class="btn_order"><i class="fa fa-search"></i> 立即查询</button>
                    </form>
                    <div style="clear:both"></div>
                    <p class="p_jg"> <font style="font-size:18px"><i class="fa fa-calendar"></i> <b>查询结果</b>

		    <table width="100%" border="1" cellspacing="0" cellpadding="10" class="order_tb">
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

			<?php if ($st != 'orderid' && $st != '' && $kw != ''): ?>

    			<tbody>
				<?php if ($lists): ?>
				    <?php foreach ($lists as $key => $val): ?>
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

			<?php endif; ?>		    
		    </table>	    











                    </p>
                    <p class="p_order"><font color="#404040"><b>联系方式查询</b></font>：订单提交时您所预留的联系方式（<font color="#404040"><b>QQ号码、手机号码、E-mail</b>）订单查询凭证信息。<font color="#404040"><b>（推荐使用此方式查询）</b></font><br><font color="#404040"><b>注意事项说明</b></font>：订单查询仅能查询最近一周内的数据，通过 <b>联系方式</b> 可以查询到该订单的所有交易记录。</p>
                </div>
                <div id="cont_tow_2" class="one block">
                    <form action="" method="get">
                        <input type="hidden" name="st" value="orderid">
                        <input name="kw" type="text" value="<?php echo $kw ?>" placeholder="请输入您的订单编号" class="t1">
                        <button class="btn_order"><i class="fa fa-search"></i> 立即查询</button>
                    </form>
                    <div style="clear:both"></div>
                    <p class="p_jg"><i class="fa fa-calendar"></i> <font style="font-size:18px"><b>查询结果</b>



		    <table width="100%" border="1" cellspacing="0" cellpadding="10" class="order_tb">
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




			<?php if ($st == 'orderid' && $kw != ''): ?>

			    <?php if ($lists): ?>
				<?php if ($lists[0]['is_status'] == 1): ?>
	    			<p style="text-align:right;padding-right:10px;line-height:30px">
	    			    <a href="javascript:void(0)" onclick="javascript:window.location.href = 'orderquery.htm?do=export&orderid=<?php echo $orderid ?>'" style="position:relative;margin-top:-20px;color:blue;text-decoration:underline">导出订单卡密到文本TXT</a>
	    			</p>
				<?php endif; ?>
			    <?php endif; ?>


    			<tbody>
				<?php if ($lists): ?>
				    <?php
				    foreach ($lists as $key => $val):
					$userid = $val['userid'];
					$goodremark = $val['goodremark'];
					$is_display_remark = $val['is_display_remark'];
					$order_status = $val['is_status'];
					$search_tips = $val['search_tips'];
					?>
	    			    <tr>
	    				<td><?php echo $val['addtime'] ?></td>
	    				<td><?php echo $val['orderid'] ?></td>
	    				<td>
	    				    <div id="cardinfo" style="text-align:left;padding-left:10px">
						    <?php if ($val['is_state'] == 0): ?>
							<img src="tpl/green/common/images/load.gif" align="absmiddle" /> 请稍候，正在查询(请勿刷新)......
							<script>
							    $(function () {
								getgoods();
							    })

							    var getgoods = function () {
								$.ajax({
								    type: "GET",
								    url: "checkgoods.htm?orderid=<?php echo $kw ?>",
								    dataType: "json",
								    cache: false,
								    timeout: 10000,
								    error: function (XMLHttpRequest, textStatus, errorThrown) {
									alert('取卡过程中出现故障，请重试！');
									window.location.reload();
								    },
								    success: function (data) {
									$('#cardinfo').html(data.msg);
									if (data.status == 1) {
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
	    				<td><?php echo $val['price'] * $val['quantity'] ?></td>
	    				<td><?php echo $val['realmoney'] ?></td>
	    				<td style="line-height:20px">
						<?php if ($val['is_state'] == 0): ?>
						    <?php if ($val['is_status'] == 0): ?>
		    				    <a href="links/go.php?orderid=<?php echo $val['orderid'] ?>" style="color:red" target="_blank">未付款<br />马上付款</a></a>
						    <?php elseif ($val['is_status'] == 2): ?>
		    				    <a href="links/go.php?orderid=<?php echo $val['orderid'] ?>" style="color:blue" target="_blank">部分付款<br />继续支付</a></a>
						    <?php elseif ($val['is_status'] == 1): ?>
		    				    <span style="color:green">完成付款<br />订单完成</span>
						    <?php elseif ($val['is_status'] == 4): ?>
		    				    <span style="color:red">完成付款<br />订单已退款</span>
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
    			</tbody>



			<?php endif; ?>	    

		    </table>	   


                    </p>
                    <p class="p_order">
			<a class="btn_aa" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes"><i class="fa fa-qq"></i> 支付问题联系平台</a>
		    </p>
		    <p class="p_order"><font color="#404040"><b>订单号码查询</b></font>：订单号是您在提交支付的时候，系统自动分配的一个交易凭证，输入对应的订单号即可查询该订单的详情。<br><font color="#404040"><b>注意事项说明</b></font>：订单查询仅能查询最近30天的数据，通过 <b>订单编号</b> 可以查询到该订单的交易记录。</p>
		</div>

            </div>
        </div>

        <div style="clear:both"></div>
    </div>
</div>


<?php if ($st == 'contact') { ?> 
<script type="text/javascript">
setTab("tow", 1, 3)
</script>
<?php } else { ?>
<script type="text/javascript">
setTab("tow", 2, 3)
</script>
<?php } ?>	