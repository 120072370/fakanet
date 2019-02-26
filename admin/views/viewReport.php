<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding:10px;width:450px">
<?php if($data): ?>
<table  class="tablelistinfo" cellspacing="1">
<?php if(!_G('t','int')): ?>
<tr>
<td width="100" class="right bg">提交日期：</td>
<td><?php echo $data['addtime'] ?></td>
</tr>

<tr>
<td class="right bg">凭证号码：</td>
<td><?php echo $data['orderid'] ?></td>
</tr>

<tr>
<td class="right bg">投诉原因：</td>
<td><?php echo $data['reason'] ?></td>
</tr>

<tr>
<td class="right bg">举报地址：</td>
<td><a href="<?php echo $data['url'] ?>" target="_blank"><?php echo $data['url'] ?></a></td>
</tr>

<tr>
<td class="right bg">商户名称：</td>
<td><?php echo $data['username'] ?></td>
</tr>

<tr>
<td class="right bg">联系方式：</td>
<td><?php echo $data['contact'] ?></td>
</tr>

<tr>
<td width="100" class="right bg">投诉内容：</td>
<td style="line-height:20px"><?php echo $data['remark'] ?></td>
</tr>

<td class="right bg">处理状态：</td>
<td><?php
switch($data['is_state']){
	case '0': echo '<span style="color:red">未处理</span>'; break;
	case '1': echo '<span style="color:blue">处理中...</span>'; break;
	case '2': echo '<span style="color:green">已处理</span>'; break;
}
?></td>

<?php if($data['result']): ?>
<tr>
<td class="right bg">处理结果：</td>
<td style="line-height:20px">
<?php echo $data['result'] ?></td>
</tr>

<tr>
<td class="right bg">处理日期：</td>
<td><?php echo $data['is_state'] ? $data['updatetime'] : '' ?></td>
</tr>
<?php endif; ?>
<?php endif; ?>

<?php if(_G('t','int')==1): ?>
<tr>
<td width="100" class="right bg">投诉内容：</td>
<td style="line-height:20px"><?php echo $data['remark'] ?></td>
</tr>
<td class="right bg">处理状态：</td>
<td><?php
switch($data['is_state']){
	case '0': echo '<span style="color:red">未处理</span>'; break;
	case '1': echo '<span style="color:blue">处理中...</span>'; break;
	case '2': echo '<span style="color:green">已处理</span>'; break;
}
?></td>
<?php endif; ?>

<?php if(_G('t','int')==2): ?>
<?php if($data['result']): ?>
<tr>
<td width="100" class="right bg">处理结果：</td>
<td style="line-height:20px">
<?php echo $data['result'] ?></td>
</tr>

<tr>
<td class="right bg">处理日期：</td>
<td><?php echo $data['is_state'] ? $data['updatetime'] : '' ?></td>
</tr>
<?php else: ?>
<tr>
<td width="100" class="right bg">处理结果：</td>
<td style="line-height:20px">
未填写处理结果！</td>
</tr>
<?php endif; ?>
<?php endif; ?>
</table>
<?php endif; ?>
</div>