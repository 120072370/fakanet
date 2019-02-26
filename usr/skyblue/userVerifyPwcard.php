<?php if(!defined('WY_ROOT')) exit; ?>
				<div class="right_title">密保卡验证</div>
				<div class="main">
				    <form name="pwcardverify" method="post" onsubmit="return checkFormIsPwCard()" action="?action=verifypwcard">
				    <table class="table_style_2">
					    <tr><td colspan="2"><span style="font-size:12px;font-weight:100;color:red">验证密保口令后才能继续操作！</span></td></tr>
					    <tr>
						<td width="80" class="bold right">密保卡坐标:</td>
						<td><div style="padding:2px 0;text-align:center;background:#f1f1f1;border:1px solid #ccc;width:60px;font-family:'微软雅黑','黑体'"><h2><?php echo $pcc1.' '.$pcc2 ?></h2></div></td>
						</tr>

					    <tr>
						<td class="bold right">对应的数字:</td>
						<td><input type="text" class="input" name="pwcard" maxlength="6" /></td>
						</tr>

					    <tr>
						<td class="bold right"></td>
						<td><input type="submit" class="button_bg_2" value="提交验证" /></td>						
						</tr>
					</table>
					</form>
</div>
					<script>
					var checkFormIsPwCard=function(){
						var pwdcard=$.trim($('[name=pwcard]').val());
						if(pwdcard=='' || pwdcard.length!=6){
							alert('坐标对应的数字只能是6位数！');
							$('[name=pwcard]').focus();
							return false;
						}

						return true;
					}
					</script>