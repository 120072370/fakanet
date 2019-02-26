<?php
require_once 'common.php';
$action=_G('action');

if(!isset($_SESSION['login_is_api']) || !$_SESSION['login_is_api']){
	$msg='当前账号未开通API功能，请联系客服开通！';
	$img='error';
	$url=_S('HTTP_REFERER');
	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
	exit;
}

if($action==''){
    $title='直充到账文档';
	$ob=new Users_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	require View::getView('header');
	require View::getView('apiForUser');
	require View::getView('footer');
	View::Output();
}
?>