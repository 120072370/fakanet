<?php 
require_once '../init.php';
require_once 'common.php';
//session_start();
//if(!$_GET['action']){
//    $url='./sendcode.htm';
//    $msg = '非法操作!请退回首页!';
//    require View::getView('header');		
//    require View::getView('message');
//    require View::getView('footer');
//    exit();
//}

//switch($_GET['action']){
//    case 'info':
//        infomethod();
//        break;
//}

//function infomethod(){
//    $ob = new Admin_Model();
//    $u = $ob->getOneData($_GET['id']);
//    $_SESSION['login_adminname']=$u['username'];
//    $_SESSION['login_adminid']=$u['id'];
//    $_SESSION['login_adminutype']=$u['utype'];
//    $_SESSION['login_adminlimit']=explode('|',$u['adminlimit']);
//}

?>