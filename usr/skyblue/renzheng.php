<?php if(!defined('WY_ROOT')) exit; ?>
<?php
	session_start();	
	if($_GET['action'] == 'save'){
		$user = new Users_Model();
		$user->updateData($_SESSION['login_userid'], array('is_auth' => 2));
		$_SESSION['is_auth'] = 2;
		$auth = new Auth_Model();
		$auth->addData(array('url' => $_POST['orgFile'], 'type' => '身份证扫描件', 'status' => 2, 'user_id' => $_SESSION['login_userid']));
		$auth->addData(array('url' => $_POST['eyeFile1'], 'type' => '协议扫描件(一)', 'status' => 2, 'user_id' => $_SESSION['login_userid']));
		$auth->addData(array('url' => $_POST['eyeFile2'], 'type' => '协议扫描件(二)', 'status' => 2, 'user_id' => $_SESSION['login_userid']));
		$auth->addData(array('url' => $_POST['eyeFile3'], 'type' => '协议扫描件(三)', 'status' => 2, 'user_id' => $_SESSION['login_userid']));
		$auth->addData(array('url' => $_POST['eyeFile4'], 'type' => '协议扫描件(四)', 'status' => 2, 'user_id' => $_SESSION['login_userid']));
	}
?>
<script type="text/javascript" charset="utf-8" src="/usr/a8tg/js/fileupload/upload.js"></script>
<script type="text/javascript" charset="utf-8" src="/usr/a8tg/js/fileupload/swfupload.js"></script>
<script type="text/javascript" charset="utf-8" src="/usr/a8tg/js/fileupload/swfupload.queue.js"></script>
<script type="text/javascript" charset="utf-8" src="/usr/a8tg/js/fileupload/urahandlers.js"></script>
<script type="text/javascript">
	$(function(){
		$('#submit').click(function(){
			  if(!document.getElementById("orgFileInput").value){
				 alert("请上传身份证扫描件");
				 return false;
			  }		  
			  if(!document.getElementById("eyeFile1Input").value){
				 alert("请上传协议扫描件（一）");
				 return false;
			  }
			  if(!document.getElementById("eyeFile2Input").value){
				 alert("请上传协议扫描件（二）");
				 return false;
			  }
			  if(!document.getElementById("eyeFile3Input").value){
				 alert("请上传协议扫描件（三）");
				 return false;
			  }
			  if(!document.getElementById("eyeFile4Input").value){
				 alert("请上传协议扫描件（四）");
				 return false;
			  }
			  
			return true;
		});
	});
	
	function setStartPage(elId){
		$("#"+elId+"Tip").html("<img src='weiqi/images/load.gif' /><span>文件上传中...</span>");
	}
	
	function setSuccessPage(elId,url){
		$("#"+elId+"Url").html("<a class='blue' target='_blank' href='/"+url.substring(1)+"'>[点击查看]</a>");
	}
	
	var allAttach = ["orgFile",
					 "eyeFile1",
					 "eyeFile2",
					 "eyeFile3",
					 "eyeFile4"
					 ];
	var allAttachType ={"orgFile":3001,
						 "eyeFile1":4001,
						 "eyeFile2":4002,
						 "eyeFile3":4003,
						 "eyeFile4":4004
					 };
	window.onload = function(){
		for(var i=0 ;i<allAttach.length; i++)
		{
			var params = {"attachType":allAttachType[allAttach[i]],"userid":3400};
			var fileType = "*.jpg;*.jpeg;*.bmp;*.png;*.gif";
			var fileDesc = "Image Files";
			orgFileSwf = new SWFUpload({  
  
				// 处理文件上传的url  
				upload_url: "/usr/fileupload.php",      
				// 上传文件限制设置  
				file_size_limit : "2048",  // 2MB  
				file_types : fileType,   //此处也可以修改成你想限制的类型，比如：*.doc;*.wpd;*.pdf  
				file_types_description : fileDesc,  
				file_upload_limit : "0",  
				file_queue_limit : "1",
				file_post_name: "orgFile", //项目自定义配置，传递当前操作的附件类型
				post_params:params,  
				// 事件处理设置（所有的自定义处理方法都在handler.js文件里）  
				file_dialog_complete_handler : fileDialogComplete,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				file_queue_error_handler : fileQueueError,
				//upload_complete_handler : uploadComplete,
				// 按钮设置  
				button_placeholder_id : allAttach[i]+"Button",
				button_action:SWFUpload.BUTTON_ACTION.SELECT_FILE,
				current_file_type: allAttach[i], 
				button_text: "上传",
				button_text_left_padding:10,
				button_text_top_padding:5,
				button_width: 48,
				button_height: 22,  
				button_disabled:(''==='disabled'),
				// swf设置 
				flash_url : "default/js/fileupload/swfupload.swf",
				debug: false  
			});
		}
	}
</script>
<div class="b_r m-r">
	<div class="b_clear">
		<div class="right_title">商户信息认证</div>
			<div class="main_content">
				<?php if($_SESSION['is_auth'] == 1){ ?>
					<div style="text-align:center;">实名认证已通过!</div>
				<?php } else if($_SESSION['is_auth'] == 2){ ?>
					<div style="text-align:center;">实名认证审核中!</div>
				<?php } else if($_SESSION['is_auth'] == 0){ ?>
				<form name="save" method="post" action="?action=save">
					<table class="table_style_2">
						<tr>
							<td colspan="5" style="text-align:center">&nbsp;</td>
						</tr>
						<tr>
							<td class="right" style="width: 109px;">身份证正面扫描件：</td>
							<td>
								<input type="text" class="input" readonly="true" value="" id="orgFileInput" style="width: 300px;" />
								<span id="orgFileButton" /></span>
								<input style="display:none;" value="" size="56" id="orgFile" name="orgFile"/>
								<div id="divStatus"></div>
							</td>
							<td id="orgFileUrl">
								<span class="red">*</span>
							</td>
							<td class="right">
								<a target='_blank' href="../upload/image/20131220/sfzyb.jpg" class="blue">[查看图例]</a>
							</td>
						</tr>
						<tr class="tip">
							<td>&nbsp;</td>
							<td id="orgFileTip">请上传清晰彩色原件扫描图片或数码照,文件必须为JPG/JPEG/BMP格式，大小不超过2MB</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="5" style="text-align:center">&nbsp;</td>
						</tr>
						<tr>
							<td class="right"><span class="right" style="width: 109px;">身份证反面扫描件</span>：</td>
							<td>
								<input type="text" class="input" readonly="true" value="" id="eyeFile1Input" style="width: 300px;" />
								<span id="eyeFile1Button" /></span>
								<input style="display:none;" value="" size="56" id="eyeFile1" name="eyeFile1"/>
								<div id="divStatus"></div>
							</td>
							<td id="eyeFile1Url">
								<span class="red">*</span>
							</td>
							<td class="right">
								<a target='_blank' href="../upload/image/20131220/1.jpg" class="blue">[查看图例]</a>
							</td>
						</tr>
						<tr class="tip">
							<td>&nbsp;</td>
							<td id="eyeFile1Tip">请上传清晰彩色原件扫描图片或数码照,文件必须为JPG/JPEG/BMP格式，大小不超过2MB
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="5" style="text-align:center">&nbsp;</td>
						</tr>
						<tr>
							<td class="right">手拿身份证半身照：</td>
							<td>
								<input type="text" class="input" readonly="true" value="" id="eyeFile2Input" style="width: 300px;" />
								<span id="eyeFile2Button" /></span>
								<input style="display:none;" value="" size="56" id="eyeFile2" name="eyeFile2"/>
								<div id="divStatus"></div>
							</td>
							<td id="eyeFile2Url">
								<span class="red">*</span>
							</td>
							<td class="right">
								<a target='_blank' href="../upload/image/20131220/2.jpg" class="blue">[查看图例]</a>							</td>
						</tr>
						<tr class="tip">
							<td>&nbsp;</td>
							<td id="eyeFile2Tip">请上传清晰彩色原件扫描图片或数码照,文件必须为JPG/JPEG/BMP格式，大小不超过2MB
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="5" style="text-align:center">&nbsp;</td>
						</tr>
						<tr>
							<td class="right">个人半身照（清晰）：</td>
							<td>
								<input type="text" class="input" readonly="true" value="" id="eyeFile3Input" style="width: 300px;" />
								<span id="eyeFile3Button" /></span>
								<input style="display:none;" value="" size="56" id="eyeFile3" name="eyeFile3"/>
								<div id="divStatus"></div>
							</td>
							<td id="eyeFile3Url">
								<span class="red">*</span>
							</td>
							<td class="right">
								<a target='_blank' href="../upload/image/20131220/3.jpg" class="blue">[查看图例]</a>
							</td>
						</tr>
						<tr class="tip">
							<td>&nbsp;</td>
							<td id="eyeFile3Tip">请上传清晰彩色原件扫描图片或数码照,文件必须为JPG/JPEG/BMP格式，大小不超过2MB
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="5" style="text-align:center">&nbsp;</td>
						</tr>
						<tr>
							<td class="right">发卡平台协议扫描件：</td>
							<td>
								<input type="text" class="input" readonly="true" value="" id="eyeFile4Input" style="width: 300px;" />
								<span id="eyeFile4Button" /></span>
								<input style="display:none;" value="" size="56" id="eyeFile4" name="eyeFile4"/>
								<div id="divStatus"></div>
							</td>
							<td id="eyeFile4Url">
								<span class="red">*</span>
							</td>
							<td class="right">
								<a target='_blank' href="../upload/image/20131220/4.jpg" class="blue">[查看图例]</a>
							</td>
						</tr>
						<tr class="tip">
							<td>&nbsp;</td>
							<td id="eyeFile4Tip">请上传清晰彩色原件扫描图片或数码照,文件必须为JPG/JPEG/BMP格式，大小不超过2MB
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="5" style="text-align:center">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align:center">
								<input id="submit" type="submit" class="button_bg_2" value="提交审核">
							</td>
							<td>
								<a style="color:red;" target='_blank' href="../upload/image/20140101/xieyi.zip" class="blue">点击下载协议文本</a>							</td>
						</tr>
						<tr>
							<td colspan="5" style="text-align:center">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align:center">
								<span style="color:blue;font-weight:bold;">未提交认证资料和审核不通过的账号,支付方式的分成比率较已经审核的账号低,为了不影响您的收益,请尽快进行身份认证
								</span>
							</td>
						</tr>
					</table>
				</form>
				<?php } ?>			
			</div>
		</div>
	</div>
</div>