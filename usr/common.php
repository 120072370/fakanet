<?php
require_once '../init.php';
$lifeTime = 24 * 3600; 
session_set_cookie_params($lifeTime); 
session_start();

$action=_G('action');
if(isMobile()){$_SESSION['login_user_theme']='mobilewq';}
$theme=!isset($_SESSION['login_user_theme']) || $_SESSION['login_user_theme']=='' ? 'default' : $_SESSION['login_user_theme'];
define('USER_THEME',$theme);
define('VIEW_PATH',dirname(__FILE__).'/'.$theme.'/');

if(!isset($_SESSION['login_username'])){
    if(isMobile()){
        Redirect('/login.htm','您还没有登录，请登录后操作。');
	} else {
	     Redirect('login.php?action=logout','您还没有登录，请登录后操作。');
	}
}

if(!isset($_SESSION['login_session_verify']) || $_SESSION['login_session_verify']!=sha1($_SESSION['login_username'].$_SESSION['login_userid'].WY_CACHE_TOKEN)){
	Redirect('login.php?action=logout','您的账号存在异常，请重新登录。');
}

if(!isset($_SESSION['loginforadmin'])){
	$user=new Users_Model();
	$userdata=$user->getOneData($_SESSION['login_userid']);
	if($userdata['is_state']){
		Redirect('login.php?action=logout','您的账号状态已关闭，请联系客服。');
	}
}


if(!isset($_SESSION['is_apply_settlement'])){
    $_SESSION['is_apply_settlement']=0;
}

$Cache=Cache::getInstance();
if(!defined('SITENAME') || !defined('SITEURL')){
	$Config=$Cache->get('config');
	if($Config){
		define('SITENAME',$Config['sitename']);
		define('SITEURL',$Config['siteurl']);
		define('SITETEL',$Config['tel']);
		define('SITEQQ',$Config['qq']);
		define('COPYRIGHT',$Config['copyright']);
	}
}

$session_lastaccess=strtotime($_SESSION['login_user_lastaccess']);
$current_time=strtotime(date('Y-m-d H:i:s'));
if((($current_time-$session_lastaccess)/60)<=30){
   $_SESSION['login_user_lastaccess']=date('Y-m-d H:i:s');
} else {
		echo '<script src="../includes/libs/jquery.min.js" type="text/javascript"></script><script src="../includes/libs/plugin-cookie.js" type="text/javascript"></script>';
		echo '<script>$.cookie("user_set_popup_'.$_SESSION['login_userid'].'","0",{expires:0});</script>';

    if(isset($_SESSION['login_username'])){
		foreach($_SESSION as $key=>$val){
			if(!strpos($key,'admin') && isset($_SESSION[$key])){
				$_SESSION[$key]='';
				unset($_SESSION[$key]);
			}
		}
	}

Redirect('../exit.htm');
}

if(!isset($_SESSION['is_safe'])){
	$info=new UserInfo_Model();
	$userInfo=$info->getOneData($_SESSION['login_userid']);
	if($userInfo){
		$_SESSION['is_safe']=$userInfo['is_safe'];
		$_SESSION['is_login']=$userInfo['is_login'];
		$_SESSION['is_pwcard']=$userInfo['is_pwcard'];
		$_SESSION['pwcardsn']=$userInfo['sn'];
	}
}


//verify login
if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
	$user=new Users_Model();
    $users=$user->getOneData($_SESSION['login_userid']);
	if($users && $users['verifycode']!=$_SESSION['login_session_id']){
		Redirect('login.php?action=logout','检测到用户 '.$_SESSION['login_username'].' 在其他地方登陆，您将安全退出！');
	}
}

if(!isset($_SESSION['login_user_safe_key'])){
    $_SESSION['login_user_safe_key']=false;
} else {
    if($_SESSION['is_safe']!=1) $_SESSION['login_user_safe_key']=true;
}

//短消息
$message=0;
$ob=new Message_Model();
$message=$ob->getUnRead("WHERE to_user=".$_SESSION['login_userid']." AND is_read=0 AND is_receiver=0");

//公告
$cache=Cache::getInstance();
$news=$cache->get('news');

if($action=='verifypwcard'){	
    $pwcard=_P('pwcard');
	if($pwcard=='' || strlen($pwcard)!=6){
	    Redirect('?edit_err=true');
	}
	$pcc1=substr($_SESSION['pwCardCol'],0,2);
	$pcc2=substr($_SESSION['pwCardCol'],-2);
	$db=Mysql::getInstance();
	$pccv='';
	$result=$db->query("SELECT cv FROM ".DB_PREFIX."pwcard WHERE ck='$pcc1' AND sn=".$_SESSION['pwcardsn']." LIMIT 1");
	if($db->num_rows($result)==1){
	    while($row=$db->fetch_array($result)){
		    $pccv=$row['cv'].$pccv;
		}
	}

	$result=$db->query("SELECT cv FROM ".DB_PREFIX."pwcard WHERE ck='$pcc2' AND sn=".$_SESSION['pwcardsn']." LIMIT 1");
	if($db->num_rows($result)==1){
	    while($row=$db->fetch_array($result)){
		    $pccv.=$row['cv'];
		}
	}

	if($pwcard==$pccv){
		$_SESSION['login_user_pwcard']=true;
		$msg='<span class="green">密保口令验证成功！</span>';
		$url=_S('HTTP_REFERER');

		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();exit;
	}	
}

if(isset($_SESSION['is_login']) && $_SESSION['is_pwcard']==1 && (!isset($_SESSION['login_user_pwcard']) || !$_SESSION['login_user_pwcard'])){
	$msg='<span class="red">当前账号开启了密保口令，验证口令后才能操作！</span>';
	$url=_S('HTTP_REFERER');
	$img='error';
    $title='密保卡验证';

    $ob=new UserInfo_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);

	$pwCardCol=$data['pwCardCol'];
	$pcc1=$pcc2='';
	if($pwCardCol){
		$pwCardColArr=explode(',',$pwCardCol);
		$pccArr=array_rand($pwCardColArr,2);
		$pcc1=$pwCardColArr[$pccArr[0]].rand(1,8);
		$pcc2=$pwCardColArr[$pccArr[1]].rand(1,8);
		$_SESSION['pwCardCol']=$pcc1.$pcc2;
	}

	require View::getView('header');
	require View::getView('userVerifyPwcard');
	require View::getView('footer');
	View::Output();exit;
}

	$db=Mysql::getInstance();

	//当前金额(未结)
    $result=$db->query("SELECT paid,unpaid,freeze FROM ".DB_PREFIX."usermoney WHERE userid='".$_SESSION['login_userid']."'");
	$row=$db->fetch_array($result);
	$total_money=number_format($row['unpaid']+$row['freeze'],2,'.','');

?>