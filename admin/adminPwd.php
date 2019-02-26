<?php
require_once 'common.php';
$action=_G('action');
$ob=new Admin_Model();

if($action==''){
	require View::getView('header');
	require View::getView('adminPwd');
	require View::getView('footer');
	View::Output();
}

if($action=='save'){
    $oldpass=_P('oldpass');
    $newpass=_P('newpass');
    $confirmnewpass=_P('confirmnewpass');

    if($oldpass=='' || $newpass==''){
		$msg='<span class="red">选项不能为空！</span>';
		$url='adminPwd.php';
		$img='error';
		require View::getView('header');
	    require View::getView('msg');
		require View::getView('footer');
		View::Output();
		exit;
	}

    if($newpass!=$confirmnewpass){
		$msg='<span class="red">两次输入的密码不一样！</span>';
		$url='adminPwd.php';
		$img='error';
		require View::getView('header');
	    require View::getView('msg');
		require View::getView('footer');
		View::Output();
		exit;
	}

	$data=$ob->getOneData($_SESSION['login_adminid']);
	if(!$data){
		Redirect('出现意外错误！','login.php?action=logout');
	}

	if($data['userpass']!=md5(md5($oldpass))){
		$msg='<span class="red">旧的登陆密码输入错误！</span>';
		$url='adminPwd.php';
		$img='error';
		require View::getView('header');
	    require View::getView('msg');
		require View::getView('footer');
		View::Output();
		exit; 
	}

    $data=array(
        'userpass'=>md5(md5($newpass)),
    );
    $ob->updateData($_SESSION['login_adminid'],$data);

	$msg='<span class="green">管理员登陆密码修改成功！</span>';
	$url='adminPwd.php';
	$img='success';
	require View::getView('header');
	require View::getView('msg');
	require View::getView('footer');
	View::Output();
	exit;
}