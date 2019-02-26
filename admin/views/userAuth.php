 <?php
	if(!defined('WY_ROOT')) exit;	
	
?>

<div class="addr">
	<span>当前位置：</span>
	<a href="./">首页</a> 
	<span>&raquo;</span> 
	商户管理  
	<span>&raquo;</span> 
	审核实名认证资料
</div>
<div class="main">
	<table class="tablelist">
		<tr>
			<th>资料名称</th><th>资料图片</th><th>操作</th>
		</tr>
		<?php foreach($list as $item){ ?>
			<tr>
				<td><?php echo $item['type'];?>：</td>
				<td>
					<a href="<?php echo $item['url'];?>" target="_blank"><img alt="<?php echo $item['type'];?>" style="width: 100px; height:100px;" src="<?php echo $item['url'];?>"/></a>
				</td>
				<td>
					<?php if($item['status'] == 2){ ?>
						<input type="button" onclick="change_status('accept', <?php echo $item['id'];?>)" class="button_bg_1" value="通过" />
						<input type="button" onclick="change_status('reject', <?php echo $item['id'];?>)" class="button_bg_1" value="驳回" />
					<?php }else if($item['status'] == 1){
						echo '已通过';
					}else if($item['status'] == -1){
						echo '已驳回';
					}?>					
				</td>
			</tr>
		<?php }?>
		<tr>
			<td colspan="3" style="text-align:center;">
				<?php
					if($user['is_auth'] == 0){
						echo '商家未提交认证资料';
					} else if ($user['is_auth'] == 1){
						echo '认证通过';
					} else if ($user['is_auth'] == 2){?>
				<input type="button" class="button_bg_1" onclick="change_status('accept_all', <?php echo $item['user_id'];?>)" value="全部通过 " />
				<input type="button" class="button_bg_1" onclick="change_status('reject_all', <?php echo $item['user_id'];?>)" value="全部驳回 " />
				<?php } else if ($user->is_auth == -1){
						echo '已全部驳回';
					}
				?>
				
			</td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	function change_status(type, id){
		window.location.href = '?action=' + type + '&id=' + id;
	}
</script>
<style type="text/css">
	.tablelist td{
		background-color: #fff;
		valign: top;
	}
</style>