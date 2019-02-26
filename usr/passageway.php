<?php
require_once 'common.php';

$action=_G('action');
if($action==''){
	$title='支付方式管理';

	$ob=new UserPrice_Model();
	$lists=$ob->getData("WHERE userid=".$_SESSION['login_userid']."");

    require View::getView('header');
	require View::getView('channels');
	require View::getView('footer');
	View::Output();
}

if($action=='op'){
	if(!$_SESSION['login_user_safe_key']){
		$t='1';
		$wyt='';
	    $url=_S('HTTP_REFERER');
		require View::getView('header');
		require View::getView('safepwd');
		require View::getView('footer');
		View::Output();
		exit;
	}
    $id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$t=_G('t','int');
	$ob=new UserPrice_Model();
	$data=$ob->getOneDatabyID($id);
	if($data){
	    if($data['userid']==$_SESSION['login_userid']){
		    if($data['is_state']==0){
			    $ob->updateData($id,array('is_state'=>1));
			} else {
			    $ob->updateData($id,array('is_state'=>0));
			}
		}
	}
	//$cache=Cache::getInstance();
	//$cache->updateCache('userPrice');
	echo 'ok';
}

if($action=='opForMobile'){
	if(!$_SESSION['login_user_safe_key']){
		$t='1';
		$wyt='';
	    $url=_S('HTTP_REFERER');
		require View::getView('header');
		require View::getView('safepwd');
		require View::getView('footer');
		View::Output();
		exit;
	}
    $id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$t=_G('t','int');
	$ob=new UserPrice_Model();
	$data=$ob->getOneDatabyID($id);
	if($data){
	    if($data['userid']==$_SESSION['login_userid']){
		    if($data['is_state']==0){
			    $ob->updateData($id,array('is_state'=>1));
			} else {
			    $ob->updateData($id,array('is_state'=>0));
			}
		}
	}
	//$cache=Cache::getInstance();
	//$cache->updateCache('userPrice');
	Redirect(_S('HTTP_REFERER'));
}

?>