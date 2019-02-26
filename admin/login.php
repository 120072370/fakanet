<?php
require_once '../init.php';
define('VIEW_PATH',dirname(__FILE__).'/views/');
$action=_G('action');
session_start();
if($action=='login'){
	$usr=_P('usr');
	$pwd=_P('pwd');
	$safepwd=_P('safepwd');
	$chk=_P('chk');
	if($chk=='' || strtolower($chk)<>$_SESSION['chkcode']) Redirect('?a=true');
	if($usr=='') Redirect('?b=true');
	if(strlen($usr)<5 || strlen($usr)>20) Redirect('?c=true');
	if($pwd=='') Redirect('?d=true');
	if(strlen($pwd)<6 || strlen($pwd)>20) Redirect('?e=true');
	$ob=new Admin_Model();
	if($adminuserid=$ob->getAdminIDbyUsername($usr)){
	  $data=$ob->getOneData($adminuserid);
	  if($data){
		if($data['is_state']==0 && md5(md5($pwd))==$data['userpass'] ){
			//验证IP
            //if($data['is_verifyip']==1){
            //    if(strpos($data['verifyip'],get_wx_client_ip())===false){
            //        Redirect('?f=true');
            //    }
            //} else if($data['is_verifyip']==2){
            //    $ip_arr=explode('.',get_wx_client_ip());
            //    $prefix_ip=$ip_arr[0].'.'.$ip_arr[1];
            //    if(strpos($data['verifyip'],$prefix_ip)===false){
            //        Redirect('?f=true');
            //    }
            //}

			//安全码
			if($data['is_safe']){
			   if($safepwd==''){
			       Redirect('?g=true');
			   } else {
			       if($data['userkey']!=md5(md5($safepwd))){
				       Redirect('?h=true');
				   }
			   }
			}

		  $_SESSION['login_adminname']=$usr;
		  $_SESSION['login_adminid']=$adminuserid;
		  $_SESSION['login_adminutype']=$data['utype'];
		  $_SESSION['login_adminlimit']=explode('|',$data['adminlimit']);

		  $logs=new AdminLogs_Model();
		  $data=$logs->getOneData($adminuserid);
		  if($data){
		      $_SESSION['login_adminlogip']=$data['logip'];
			  $_SESSION['login_adminlogtime']=$data['logtime'];
		  }
		  $logs->addData(array('userid'=>$adminuserid,'logtime'=>date('Y-m-d H:i:s'),'logip'=>get_wx_client_ip()));
		  redirect('./');
		}
	  }
	}    
	}
	
if($action=='logout'){
    if(isset($_SESSION['login_adminname'])){
		$_SESSION['login_adminname']=='';
		$_SESSION['login_adminid']=='';
		$_SESSION['login_adminlimit']=='';
		unset($_SESSION['login_adminname']);
		unset($_SESSION['login_adminid']);
		unset($_SESSION['login_adminlimit']);
		session_destroy();
		redirect('login.php');
	}
}

require View::getView('login');
View::Output();