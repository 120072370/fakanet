<?php if(!defined('WY_ROOT')) exit; ?>
				<div class="right_title">API充值列表</div>

				<div class="main">
					<div style="padding:0 10px 10px 10px">
						<form name="search" method="get" action="">
						时间范围：<input type="text" name="fdate" class="input" style="width:150px" id="txtDate" onclick="SelectDate(this)" size="10" readonly="readonly" value="<?php echo $fdate ?>" />&nbsp;
						至 <input type="text" name="tdate" class="input" style="width:150px" id="txtDate1" onclick="SelectDate(this)" size="10" readonly="readonly" value="<?php echo $tdate ?>" />&nbsp;&nbsp;

						<p style="margin-top:10px">
						支付类型：<select name="channelid">
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
						</select>&nbsp;
						查询类别：<select name="st">
						<option value="st1"<?php echo $st=='st1' ? ' selected' : '' ?>>订单号</option>
						<option value="st2"<?php echo $st=='st2' ? ' selected' : '' ?>>充值卡号</option>
						<option value="st3"<?php echo $st=='st3' ? ' selected' : '' ?>>联系方式</option>
						<option value="st4"<?php echo $st=='st4' ? ' selected' : '' ?>>商品名称</option>
						<option value="st5"<?php echo $st=='st5' ? ' selected' : '' ?>>账号或角色名</option>
						</select>&nbsp;&nbsp;
						<input type="text" name="kw" class="input" value="<?php echo $kw ?>" />
						

						<input type="submit" class="button_bg_1" value="查询" />
						<input type="hidden" name="do" value="search" />
						</p>
						
						</form>
					</div>

				    <table class="table_style_3" cellspacing="1">
					    <tr>
						<th class="border_right border_bottom">订单编号</th>
						<th class="border_right border_bottom">交易时间</th>
						<th class="border_right border_bottom">商品名称</th>
						<th class="border_right border_bottom">支付方式</th>
						<th class="border_right border_bottom">金额</th>
						<th class="border_right border_bottom">购买者信息</th>
						<th class="border_right border_bottom">账号或角色名</th>
						<th width="50" class="border_right border_bottom">状态</th>
						<th width="35" class="border_bottom">管理</th>
						</tr>
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
						<tr class="lightbox" id="s<?php echo $val['orderid'] ?>">
						<td  width="120" class="border_right border_bottom"><a href="../orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank"><?php echo $val['orderid'] ?></a></td>
						<td class="border_right border_bottom"><?php echo $val['addtime'] ?></td>
						<td  width="130" class="border_right border_bottom"><?php echo $val['goodname'] ?>(<span class="red"><?php echo $val['quantity'] ?></span>张)</td>
						<td width="80" class="border_right border_bottom"><?php echo $val['channelname'] ?></td>
						<td class="border_right border_bottom"><?php echo $val['price'] ?></td>
						<td class="border_right border_bottom"><?php echo $val['contact'] ?></td>
						<td class="border_right border_bottom"><?php echo $val['api_username'] ?></td>
						<td class="border_right border_bottom"><?php echo $is_status ?></td>
						<td class="border_bottom"><a href="javascript:void(0)" title="API订单通知" onclick="Boxy.load('?action=ApiReturn&orderid=<?php echo $val['orderid'] ?>',{title:'API订单通知'})">通知</a></td>
						</tr>
						<?php endforeach; ?>
						<tr><td colspan="9" class="bg" style="padding-left:10px"><?php echo $pagelist ?></td></tr>
						<?php else: ?>
						<tr><td colspan="9">暂无记录</td></tr>						
						<?php endif; ?>
					</table>
				</div>