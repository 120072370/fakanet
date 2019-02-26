<?php if(!defined('WY_ROOT')) exit; ?>
<div style="margin-top:0px;padding-top:8px;background-color:#f1f1f1">
<ul class="nav nav-tabs" role="tablist">
<li role="presentation">&nbsp;&nbsp;&nbsp;</li>﻿
<div class="tab-content" style="padding:10px 20px">
<div role="tabpanel" class="tab-pane active content_style">
<form name="s" method="get" action="/orderquery.htm">
<div class="form-group">
<label>请选择查询方式</label>
<select name="st" class="form-control">
			<option value="orderid"<?php echo $st=='orderid' ? ' selected' : '' ?>>订单号</option>
			<option value="contact"<?php echo $st=='contact' ? ' selected' : '' ?>>联系方式</option>
			<option value="cardnum"<?php echo $st=='cardnum' ? ' selected' : '' ?>>充值卡号</option>
</select></div>
<div class="form-group">
<label>查询内容</label>
<input name="kw" class="form-control" maxlength="50" size="17" value="<?php echo $kw ?>" required="" type="text"></div>
<div class="form-group text-center"><button type="submit" class="btn btn-success btn-block" onclick="if($('[name=kw]').val()){s.submit();}else{$('[name=kw]').focus();alert('请填写查询内容！');return false;}">立即查询</button>
</div>
</form>
<?php if(!$st && !$kw): ?>
<div class="panel panel-default">
<div class="panel-heading">
<strong>订单查询方式介绍</strong>
</div>
<div class="panel-body">
<p><strong>订单号查询：</strong>
此订单号是您在支付提交的时系统分配的一个交易凭证，输入对应的交易订单号查询即可了解该订单的详情。</p>
<p><strong>支付卡号查询：</strong>支付卡号指的是选择了”充值卡支付“的订单交易时候填写的“卡号”，并非网银付款的付款帐号。</p>
<p><strong>联系方式查询：</strong>订单提交时，平台让您预留的联系方式(QQ号、手机、E-mail)的凭证信息。<span style="color:red;text-decoration:underline">(推荐您选择的此查询方式)</span></p>
<p><strong>备注：</strong>
订单查询仅能查询最近30天的数据,通过“联系方式”或“支付卡号”可以查询到该凭证的所有交易记录.</p>	
</div>
<?php endif; ?>
</div>
<?php if($st!='orderid' && $st!='' && $kw!=''): ?>
<div class="search_result">
<span>查询时间：<?php echo date('Y-m-d H:i:s') ?></span>
<div class="panel panel-primary">
<div class="panel-heading">
<strong>交易订单</strong><span id="tips"></span>
</div>
<?php if($lists): ?>
<?php foreach($lists as $key=>$val): ?>
<div class="panel-body">
<p>提交时间：<strong><?php echo $val['addtime'] ?></strong></p>
<p>订单号码：<strong><?php echo $val['orderid'] ?></strong></p>
<p>支付类型：<strong><?php echo $val['channelname'] ?></strong></p>
<p>商品金额：<strong><?php echo $val['price'] ?></strong>元</p>
<p>实付金额：<strong><?php echo $val['realmoney'] ?></strong>元</p></div>
<div class="panel-footer text-center">
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
<?php endif; ?></div></div>
</div>

<script>
	$(function(){
	$.extend($.fn.nyroModal.settings,{ modal: true, minHeight: 400, minWidth: 500});
	$('#report').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 320, height: 280 });
	})
	</script>﻿













