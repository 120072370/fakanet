<?php 
require_once '../init.php';
define('VIEW_PATH',WY_ROOT.'/lin/report/');
$cache=Cache::getInstance();
$config=$cache->get('config');
$action=_G('action');

if($action==''){
	session_start();
	$userid=_G('uid');
	$t=_G('t');
//if(!$_SESSION['flag']){
	$uid=_P('userid');
	$report_type=htmlentities(_P('report_type'));
	$report_url=htmlentities(_P('report_url'));
	$contact=htmlentities(_P('report_contact'));
	$remark=htmlentities(_P('remark'));
	if($uid && $report_url && $report_type && $contact){
		
		//发送邮件	
		$username=Users_Model::getUsernamebyUserID($uid);
		$message = "以下是被举报投诉的商户详情：<br />";
		$message .= "商户ID：{$uid}<br />";
		$message .= "商户名称：{$username}<br />";
		$message .= "举报URL地址：{$report_url}<br />";
		$message .= "举报原因：{$report_type}<br />";
		$message .= "补充说明：{$remark}<br />";
		$message .= "举报人联系方式：{$contact}<br />";
		sendMail($config['email'],'关于对商户['.$username.']的举报投诉!',$message);
		
		$orderid=getRandomString(16);
		$data=array(
		    'userid'=>$uid,
			'reason'=>$report_type,
			'url'=>$report_url,
			'contact'=>$contact,
			'remark'=>$remark,
			'addtime'=>time(),
			'updatetime'=>time(),
			'orderid'=>$orderid,
			'ip'=>_S('REMOTE_ADDR'),
		);
		$report=new Report_Model();
		$report->addData($data);
		//$_SESSION['flag']=1;
		$result= '举报成功，我们将尽快处理！查询凭证：<strong style="color:blue">'.$orderid.'</strong>';
	}
//} else {
    //$result='您已经提交过投诉，正在处理中！如还需投诉请关闭浏览器重新提交！';
//}
	require View::getView('report');
	View::Output();
}

if($action=='search'){
	session_start();
	$data='';
	$contact=htmlentities(_P('report_contact'));
	if($contact && _P('chkcodeforsearch') && strtolower(_P('chkcodeforsearch'))==$_SESSION['chkcode']){
	    $_SESSION['chkocde']='';
		unset($_SESSION['chkcode']);
		$report=new Report_Model();
		$data=$report->getOneDataByOrderid($contact);
	}

    require View::getView('search');
	View::Output();
}
?>