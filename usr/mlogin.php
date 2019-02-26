<?php
require_once '../init.php';
define('VIEW_PATH',dirname(__FILE__).'/mobilewq/');
$action=_G('action');
session_start();
if($action=='login'){
    //if(!isset($_SESSION['login_username'])){
    //    Redirect('./');
    //    exit;
    //}

	$usr=_P('usr');
	$pwd=_P('pwd');
	if($usr=='') Redirect('?b=true');
	if(strlen($usr)<5 || strlen($usr)>20) Redirect('?c=true');
	if($pwd=='') Redirect('?d=true');
	if(strlen($pwd)<6 || strlen($pwd)>20) Redirect('?e=true');
	$user=new Users_Model();
	if($login_userid=Users_Model::getUserIDbyUsername($usr)){
	  $data=$user->getOneData($login_userid);
	  if($data){
		if($data['is_state']==0 && $data['utype']==2 && md5(md5($pwd))==$data['userpass'] ){
		  $_SESSION['login_username']=$usr;
		  $_SESSION['login_userid']=$login_userid;
		  $_SESSION['login_session_verify']=sha1($usr.$login_userid.WY_CACHE_TOKEN);
		  $_SESSION['login_userkey']=$data['userkey'];
		  $_SESSION['login_user_theme']=$data['theme'];
		  $_SESSION['login_user_lastaccess']=date('Y-m-d H:i:s');
		  //update session_id
		  $_SESSION['login_session_id']=session_id();
		  $user->updateData($login_userid,array('verifycode'=>$_SESSION['login_session_id']));

		  $logs=new UserLogs_Model();
		  $data=$logs->getOneData($login_userid);
		  if($data){
		      $_SESSION['login_logip']=$data['logip'];
			  $_SESSION['login_logtime']=$data['logtime'];
		  } else {
		      $_SESSION['login_logip']='';
			  $_SESSION['login_logtime']='';      
		  }
		  $logs->addData(array('userid'=>$login_userid,'logtime'=>date('Y-m-d H:i:s'),'logip'=>_S('REMOTE_ADDR')));
		  Redirect('./');
		}
	  }
	}    
	}
	
if($action=='logout'){
    if(isset($_SESSION['login_username'])){
		$_SESSION['login_username']=='';
		$_SESSION['login_userid']=='';
		$_SESSION['login_user_lastaccess']='';
		unset($_SESSION['login_username']);
		unset($_SESSION['login_userid']);
		unset($_SESSION['login_user_lastaccess']);
		Redirect('../');
	}
}
	
require View::getView('login');
View::Output();