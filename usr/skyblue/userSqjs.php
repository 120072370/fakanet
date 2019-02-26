<?php if(!defined('WY_ROOT')) exit; ?>
<style>
table.table_style_2 td{padding:0;height:32px;}
td span.red{color:red}
</style>
				<div class="right_title">申请结算</div>
				<div class="main">
				<?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">密码修改保存成功</div><?php endif; ?>
				<?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">密码修改保存失败</div><?php endif; ?>
				<?php if(_G('edit_err_1')): ?><div id="tipMsg" class="errmsg">旧密码输入错误</div><?php endif; ?>
				<script>setTimeout(hideMsg,2600)</script>
				    <form name="edit" method="post" onsubmit="return checkForm()" action="?action=editsave">
				    <input type="hidden" name="maxmoney" id="maxmoney" value="<?php echo $total;?>" />
				    <table class="table_style_2">
					    <tr>
						<td width="120" class="bold right">账户余额:</td>
						<td><span style="color: red;"><?php echo $total;?></span>元</td>
						</tr>

					    <tr>
						<td class="bold right">可结算金额:</td>
						<td><span style="color: red;"><?php echo $total_ksqje;?></span>元</td>
						</tr>

					    <tr>
						<td class="bold right">申请金额:</td>
						<td><input type="number" min="1" name="money" step="0.01" class="input sqje" max="<?php echo $total_ksqje;?>" name="sqje" maxlength="20" /><span style="color: red;">(请在10:00-17:30之间申请结算，其它时间不能申请结算操作)</span></td>
						</tr>
						
						<tr>
						<td class="bold right">手续费:</td>
						<td><input type="number" name="fee" readonly class="input sxf" name="sxf" maxlength="20" /><span style="color: red;">(满500元免手续费  最低50元申请结算  每笔1%手续费)</span></td>
						</tr>

					    <tr>
						<td class="bold right"></td>
						<td><input type="submit" class="button_bg_2" value="提现申请" /></td>						
						</tr>
					</table>
					</form>
					<script>
					jQuery(document).ready(function($){ 
					    try{
					        jQuery('.sqje').on('keyup',function () {
					        	var the=jQuery(this);
					        	if (the.val()-0>the.attr('max')) {
					        		alert('最多可结算'+the.attr('max')+'元');
					        		the.val(the.attr('max'));
					        	}else if(the.val()<500){
					        		if (Number(the.val()*0.01).toFixed(2)<1) {
					        			jQuery('.sxf').val(1);
					        		}else{
					        			jQuery('.sxf').val(Number(the.val()*0.01).toFixed(2));
					        		}
					        	}else{
					        		jQuery('.sxf').val(0);
					        	}
					        	
					        });
					        jQuery('.sqje').on('blur',function () {
					        	var the=jQuery(this);
					        	if (the.val()-0>the.attr('max')) {
					        		alert('最多可结算'+the.attr('max')+'元');
					        		the.val(the.attr('max'));
					        	}else if(the.val()<500){
					        		if (Number(the.val()*0.01).toFixed(2)<1) {
					        			jQuery('.sxf').val(1);
					        		}else{
					        			jQuery('.sxf').val(Number(the.val()*0.01).toFixed(2));
					        		}
					        	}else{
					        		jQuery('.sxf').val(0);
					        	}
					        });
					    }catch(e){}
					});
					var checkForm=function(){
						return true;
					}					
					</script>
				</div>
				