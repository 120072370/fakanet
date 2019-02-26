
/**
 * 上传成功
 * 
 * @param {Object} file
 * @param {Object} serverData
 * @memberOf {TypeName} 
 */
function uploadSuccess(file, serverData) {
	try {
		serverData = eval('('+serverData+')');
		var elId = this.settings.current_file_type;
		if(serverData["errcode"] == 0){
        	$("#"+elId+"New").remove();
        	$("#"+elId+"Tip").html("<span class='bice'>"+serverData.msg+"</span>");
        	$("#"+elId+"Input").val(serverData.data);
			$("#"+elId).val(serverData.data);			
        	setSuccessPage(elId,serverData.data);
        }
        else
        {
        	$("#"+elId+"Tip").html("<span class='red'>"+serverData["msg"]+"</span>");
        }
	} catch (ex) {
		this.debug(ex);
	}
}

/**
 * 浏览文件框关闭后触发的事件
 * 
 * @param {Object} numFilesSelected
 * @param {Object} numFilesQueued
 * @memberOf {TypeName} 
 */
function fileDialogComplete(numFilesSelected, numFilesQueued) {
	try {
		//用户取消选择
		if(numFilesSelected <1){
			return;
		}
		var elId = this.settings.current_file_type;
		if(elId.indexOf("otherFile") != -1 && this.settings.post_params.isNew != "0"){
			if(!document.getElementById(elId+"Name") || !document.getElementById(elId+"Name").value){
				$("#"+elId+"Tip").html("<span class='red'>请先填写附件名称!</span>");
				return;
			}
			var params = this.settings.post_params;
			params.attachName=document.getElementById(elId+"Name").value;
			params.newOtherFile = "newOtherFile";
			//this.addSetting("post_params",params);
			this.setPostParams(params);
		}
		//setStartPage(elId);
		this.startUpload();
	} catch (ex)  {
        this.debug(ex);
	}
}

/**
 * 上传错误处理
 * 
 * @param {Object} file
 * @param {Object} errorCode
 * @param {Object} message
 */
function uploadError(file, errorCode, message) {
	try {
		var elId = this.settings.current_file_type;
		switch (errorCode) {
		case SWFUpload.UPLOAD_ERROR.HTTP_ERROR:
			$("#"+elId+"Tip").html("<span class='red'>通信错误:"+errorCode+",请设置浏览器为兼容模式后进行操作</span>");
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_FAILED:
			$("#"+elId+"Tip").html("<span class='red'>"+serverData["errorString"]+"</span>");
			break;
		case SWFUpload.UPLOAD_ERROR.IO_ERROR:
			$("#"+elId+"Tip").html("<span class='red'>上传文件失败，服务器写入文件失败!</span>");
			break;
		case SWFUpload.UPLOAD_ERROR.SECURITY_ERROR:
			$("#"+elId+"Tip").html("<span class='red'>上传文件失败，权限不足!</span>");
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED:
			$("#"+elId+"Tip").html("<span class='red'>上传文件失败，文件大小不能超过2M!</span>");
			break;
		case SWFUpload.UPLOAD_ERROR.FILE_VALIDATION_FAILED:
			$("#"+elId+"Tip").html("<span class='red'>上传文件失败，文件`"+file.name+"`验证失败!</span>");
			break;
		case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
			break;
		default:
			$("#"+elId+"Tip").html("<span class='red'>上传文件失败!</span>");
			break;
		}
	} catch (ex) {
        this.debug(ex);
    }
}

function fileQueueError(file, errorCode, message) {
	try {
		var elId = this.settings.current_file_type;
		
		if (errorCode === SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED) {
			$("#"+elId+"Tip").html("<span class='red'>上传文件过多!</span>");
			return;
		}
		switch (errorCode) {
		case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
			$("#"+elId+"Tip").html("<span class='red'>上传文件失败，文件大小不能超过2M！</span>");
			break;
		case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
			$("#"+elId+"Tip").html("<span class='red'>上传文件失败，文件为空！</span>");
			break;
		case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
			$("#"+elId+"Tip").html("<span class='red'>上传文件失败，文件格式不正确！</span>");
			break;
		default:
			if (file !== null) {
				$("#"+elId+"Tip").html("<span class='red'>上传文件失败！</span>");
			}
			break;
		}
	} catch (ex) {
        this.debug(ex);
    }
}

/**
 * 该方法在startupload方法之前调用，用来判断文件是否校验成功
 * 如：文件过大或者格式不正确
 * 
 * @param {Object} file
 * @memberOf {TypeName} 
 * @return {TypeName} 
 */
function uploadStart(file) {
	try {
		var elId = this.settings.current_file_type;
		if(file.fileStatus == SWFUpload.FILE_STATUS.ERROR){
			return false;
		} else {
			alert(elId);
			$("#"+elId+"Tip").html("<img src='skyblue/images/load.gif' /><span>文件上传中...</span>");
			setStartPage(elId);
		}
	}
	catch (ex) {}
	
	return true;
}