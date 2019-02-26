<?php
require_once 'common.php';

$action=_G('action');

if($action==''){
	$title='登陆密码修改';
    require View::getView('header');
	require View::getView('userPwd');
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
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}
?>