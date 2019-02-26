<?php if(!defined('WY_ROOT')) exit; ?>
<style>
.tlist{border-collapse:collapse}
.tlist th{border:1px #ccc solid;text-align:left;background-color:#f1f1f1;line-height:28px;padding-left:5px;color:#333}
.tlist td{border:1px solid #ccc;line-height:28px;padding-left:5px}
</style>
				<div class="right_title">直充到账文档</div>
				
				<div class="main">

				    <br />
					<p style="color:#669900;font-weight:bold">API密钥：</p>
					<p style="margin:10px 0;background:#f1f1f1;border-top:1px solid #ccc;border-bottom:1px solid #ccc;line-height:23px;padding-left:10px;font-weight:bold"><?php echo $data['api_key'] ?></p>

					<br />
					<p style="color:#669900;font-weight:bold">文档下载：</p>
					<p style="margin:10px 0;background:#f1f1f1;border-top:1px solid #ccc;border-bottom:1px solid #ccc;line-height:23px;padding-left:10px;font-weight:bold"><a href="../api/api.rar" target="_blank">接口文档说明和示例</a></p>

					<br />
					<p style="color:#669900;font-weight:bold">参数说明：</p>
					<p style="margin:10px 0;">
					    <table width="99%" class="tlist">
						<tr>
						<th width="40" style="text-align:center">序号</th>
						<th width="80">参数名称</th>
						<th>说明</th>
						</tr>

						<tr>
						<td style="text-align:center">1</td>
						<td>UserID</td>
						<td>您的商户编号</td>
						</tr>

						<tr>
						<td style="text-align:center">2</td>
						<td>ProID</td>
						<td>您的商品ID</td>
						</tr>

						<tr>
						<td style="text-align:center">3</td>
						<td>OrderID</td>
						<td>订单编号</td>
						</tr>

						<tr>
						<td style="text-align:center">4</td>
						<td>Num</td>
						<td>充值数量</td>
						</tr>

						<tr>
						<td style="text-align:center">5</td>
						<td>UserName</td>
						<td>充值账号或者角色名</td>
						</tr>

						<tr>
						<td style="text-align:center">6</td>
						<td>Money</td>
						<td>充值金额</td>
						</tr>

						<tr>
						<td style="text-align:center">7</td>
						<td>Sign</td>
						<td>API验证签名串</td>
						</tr>
						</table>
					</p>
					<br />
					<p class="red" style="font-weight:bold">注意：</p>
					<p class="red">1、参数区分大小写</p>
					<p class="red">2、Sign签名串格式为（MD5加密串大写格式）：UserID=10000&ProID=12&OrderID=DF03FLFF6EH&Num=1&UserName=xiaobai&Money=10.00&Key=97bf79620724060dee3276296f9caeb9</p>
					<p class="red">3、例如上面字符串的加密结果为：C7B04423FEF758CE19F61E441318916D</p>


					<br />
					<p style="color:#669900;font-weight:bold">在线充值订单：</p>
					<p style="margin:10px 0;background:#f1f1f1;border-top:1px solid #ccc;border-bottom:1px solid #ccc;line-height:23px;padding-left:10px;font-weight:bold"><a href="ordersForApi.php">查看订单列表</a></p>
				</div>
				