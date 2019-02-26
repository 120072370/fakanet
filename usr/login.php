<?php
require_once '../init.php';
define('VIEW_PATH',dirname(__FILE__).'/default/');
$action=_G('action');
session_start();
if($action=='login'){

    //if(!isset($_SESSION['login_username'])){
    //    Redirect('./');
    //    exit;
    //}
	$usr=_P('usr');
	$pwd=_P('pwd');
	$chk=_P('chk');
	if($chk=='' || strtolower($chk)<>$_SESSION['chkcode']) redirect('?a=true');
	if($usr=='') redirect('?b=true');
	if(strlen($usr)<5 || strlen($usr)>20) redirect('?c=true');
	if($pwd=='') redirect('?d=true');
	if(strlen($pwd)<6 || strlen($pwd)>20) redirect('?e=true');
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
		  $_SESSION['login_is_apply_settlement']=$data['is_apply_settlement'];
		  $_SESSION['login_user_ctype']=$data['ctype'];
		  $_SESSION['login_is_api']=$data['is_api'];
		  $_SESSION['is_auth']=$data['is_auth'];
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
		  $logs->addData(array('userid'=>$login_userid,'logtime'=>date('Y-m-d H:i:s'),'logip'=>get_wx_client_ip()));
		  Redirect('./');
		}
	  }
	}
}
	
if($action=='logout'){
    if(isset($_SESSION['login_username'])){
		foreach($_SESSION as $key=>$val){
			if(!strpos($key,'admin') && isset($_SESSION[$key])){
				$_SESSION[$key]='';
				unset($_SESSION[$key]);
			}
		}		
	}
	Redirect('../');
}
	
require View::getView('login');
View::Output();