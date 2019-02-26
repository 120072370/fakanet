<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	$goodid=_G('goodid','int');
	$title="商户支付链接";

	$good=new GoodList_Model();
	$goodList=$good->getAllData($_SESSION['login_userid']);

	$user=new Users_Model();
	$users=$user->getOneData($_SESSION['login_userid']);
	$is_link_state=$users['is_link_state'];
	
	//siteurl
	$siteurl=$wddb->getone("select siteurl from ".DB_PREFIX."config");
	
	
	//短网址
	global $wddb;
	$shoukayuming=$wddb->getone("select shoukayuming from ".DB_PREFIX."config");
	$shoukayuming=preg_split("/[\n\r]+/s", $shoukayuming,-1,PREG_SPLIT_NO_EMPTY);
	
	$mypaylinks=array();
	foreach ($shoukayuming as $k => $v) {
		$url = "http://".$v."/".$_SESSION['login_userkey'].".html";
		$mypaylinks[$k]=$url;
	}
	
	$goodurl=array();
	foreach ($shoukayuming as $k => $v) {
		$url='http://'.$v.'/lin/'.$_SESSION['login_userkey'];
		//if($k==0){
		    $re=wd_http('http://api.t.sina.com.cn/short_url/shorten.json',array('source'=>'1408865487','url_long'=>$url));
			$re=json_decode($re,true);
			$goodurl[$k]=$re[0]['url_short'];
        //}else{
        //    $goodurl[$k]=$url;
        //}
		
	}
	

    require View::getView('header');
	require View::getView('paylinks');
	require View::getView('footer');
	View::Output();
}

if($action=='preview'){
    require View::getView('preview');
	View::Output();
}

if($action=='op'){
    $ob=new Users_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data){
	    if($data['is_link_state']==0){
		    $ob->updateData($_SESSION['login_userid'],array('is_link_state'=>1));
		} else {
		    $ob->updateData($_SESSION['login_userid'],array('is_link_state'=>0));
		}

		echo $data['is_link_state'];
		exit;
	}
}


?>