<?php
error_reporting(E_ERROR);

require_once 'common.php';
require_once '/includes/libs/Weixin/Wxfw.class.php';
$action=_G('action');
if($action==''){
	$db=Mysql::getInstance();
	$sql = "select wx_appid,wx_appsecret from wqfaka_config" ;
	$data = $db->query($sql);
	$data = $db->fetch_array($data);
	$wx=new Wxfw(array(
		'appid'=>$data["wx_appid"],
		'secret'=>$data["wx_appsecret"]
	));
	
	require View::getView('header');
	require View::getView('userWeixin');
	require View::getView('footer');
	View::Output();
}
if($action=='1'){
	$db=Mysql::getInstance();
	$sql = "select wx_appid,wx_appsecret from wqfaka_config" ;
	$data = $db->query($sql);
	$data = $db->fetch_array($data);
//	var_dump($data);
	$wx=new Wxfw(array(
		'appid'=>$data["wx_appid"],
		'secret'=>$data["wx_appsecret"]
	));
	$data=array(
		'action_name'=>'QR_LIMIT_SCENE',
		'action_info'=>array(
			'scene'=>array(
				'scene_id'=>$_SESSION['login_userid']
			)
		)
	);
	$re=$wx->api('qrcode/create','',$data,'POST');
	$ticket=$re['ticket'];
	$ewm='https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.$ticket;
	
	$title='绑定微信';

	
    require View::getView('header');
	require View::getView('userWEIXIN');
	require View::getView('footer');
	View::Output();
}

if($action=='editsave'){
	
    $oldpassword=_P('oldpassword');
    $password=_P('newpassword');
	$confirm_password=_P('confirmpassword');
	if($oldpassword=='' || strlen($password)<6 || strlen($password)>20 || $password!=$confirm_password){
	    Redirect('?edit_err=true');
	}
	//check oldpassword
	$ob=new Users_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data['userpass']!=md5(md5($oldpassword))){
	    Redirect('?edit_err_1=true');
	}
	$data=array(
		'userpass'=>md5(md5($password)),
	);
	$ob=new Users_Model();
	$ob->updateData($_SESSION['login_userid'],$data);

	$msg='<span class="green">登陆密码修改保存成功！</span>';
	$url='userPwd.php';

	require View::getView('header');
	require View::getView('userWeixin');
	require View::getView('footer');
	View::Output();
}

?>