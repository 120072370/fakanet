<?php
require_once '../init.php';
define('VIEW_PATH',dirname(__FILE__).'/views/');
session_start();

if(!isset($_SESSION['login_adminname'])) redirect('login.php');

//短消息
$ob=new Message_Model();
$message=$ob->getUnRead("WHERE to_user=".$_SESSION['login_adminid']." AND is_read=0");
//投诉
$report=new Report_Model();
$report_unread=$report->getCountResult("WHERE is_read=0");
$report_unhandle=$report->getCountResult("WHERE is_state=0");

$verify_page=strtolower(substr(basename(_S('SCRIPT_NAME')),0,-4));

if(!in_array($verify_page,$_SESSION['login_adminlimit'])){
	$msg='<span class="red">您所在的用户组没有权限管理此页面！</span>';
	$img='error';
	$url=_S('HTTP_REFERER');
    require View::getView('header');
    require View::getView('msg');
	require View::getView('footer');
	View::Output();
	exit;
}
//管理IP请求限制
$ob=new Admin_Model();
$data=$ob->getOneData($_SESSION['login_adminid']);

//if($data['is_verifyip']==1){
//    if(strpos($data['verifyip'],get_wx_client_ip())===false){
//        $msg='<span class="red">您的IP非法访问此页面！</span>';
//        $img='error';
//        $url="login.php?action=logout";
//        require View::getView('header');
//        require View::getView('msg');
//        require View::getView('footer');
//        View::Output();
//        exit;
//    }
//}