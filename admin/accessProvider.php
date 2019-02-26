<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
    $ob=new AccessProvider_Model();
	$lists=$ob->getData();
	require View::getView('header');
	require View::getView('accessProvider');
	require View::getView('footer');
	View::Output();
}

if($action=='add'){
    $accessType=_P('accessType');
	$email=_P('email');
	$accessID=_P('accessID');
	$accessKey=_P('accessKey');
	$accessName=_P('accessName');
	if($accessType=='' || $accessID=='' || $accessKey=='' || $accessName=='') Redirect('?add_err=true');
	$data=array('accessType'=>$accessType,'email'=>$email,'accessID'=>$accessID,'accessKey'=>$accessKey,'accessName'=>$accessName);
	$ob=new AccessProvider_Model();
    $ob->addData($data);
	$Cache=Cache::getInstance();
	$Cache->updateCache('accessProvider');
	Redirect('?add_suc=true');
}

if($action=='save'){
    $id=_G('id','int');
	$email=_P('email');
	$accessID=_P('accessID');
	$accessKey=_P('accessKey');
	$data=array('email'=>$email,'accessID'=>$accessID,'accessKey'=>$accessKey);
	$ob=new AccessProvider_Model();
    $ob->updateData($id,$data);
	$Cache=Cache::getInstance();
	$Cache->updateCache('accessProvider');
	Redirect('?edit_suc=true');
}

if($action=='del'){
    $id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$ob=new AccessProvider_Model();
	$ob->deleteData($id);
	echo 'ok';
}
?>