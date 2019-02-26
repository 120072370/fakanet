<?php if(!defined('WY_ROOT')) exit;$random=mktime(date('Y-m-d H:is:'));?>
<?php if($wyt): ?>
				    <div style="padding:10px;width:280px">
					<table class="table_style_2">
					    <tr>
						<td class="bold right">安全码:</td>
						<td>
						<input type="password" class="input" style="width:180px" name="safepwd_<?php echo $random ?>" maxlength="20" />
						<input type="hidden" name="id" value="<?php echo $id ?>">
						</td>
						</tr>

					    <tr>
						<td></td>
						<td>
						<input type="submit" class="button_bg_1" onclick="op_continue()" value="提交" />&nbsp;&nbsp;
						<input type="button" class="close button_bg_1" name="close" value="退出" />
                        <p class="red" id="msg_<?php echo $random ?>" style="margin-top:8px"></p>
						</td>						
						</tr>
					</table>
					</div>
<?php else: ?>
                <div class="right_title">安全密码</div>
				<div class="main">
				    <table class="table_style_2">
					    <tr>
						<td>
						<strong class="red">此项操作需要安全码才能继续:</strong><br /><br />
						安全码：<input type="password" class="input" style="width:200px" name="safepwd_<?php echo $random ?>" maxlength="20" />
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<p id="err_msg" class="red"></p>
						</td>
						</tr>

					    <tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="button_bg_2" onclick="op_continue()" value="继续操作" /> <span class="red" id="msg_<?php echo $random ?>"></span></td>						
						</tr>
					</table>
				</div>
<?php endif; ?>
				<script>
				var op_continue=function(){
					var safepwd=$.trim($('[name=safepwd_<?php echo $random ?>]').val());					
					if(safepwd==''){
					    alert('请输入安全码！');
						return false;
					}
				    $.get('userSafe.php',{action:'checksafe',safepwd:safepwd},function(data){
					    if(data=='ok'){
							<?php if($t): ?>
								<?php if(isset($url) && $url): ?>
									window.location.href='<?php echo $url ?>';
								<?php else: ?>
									window.location.reload();
								<?php endif; ?>
							<?php else: ?>							
							window.location.href='../usr/';
							<?php endif; ?>
						} else if(data==''){
						    $('#msg_'+<?php echo $random ?>).html('<img src="weiqi/images/load.gif"> 请稍候...');
						} else {
						    $('#msg_'+<?php echo $random ?>).html(data);
						}
					})
				}
				</script>