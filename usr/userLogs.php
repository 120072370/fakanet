<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	$title='用户登陆日志';
	$ob=new UserLogs_Model();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$cons="WHERE userid=".$_SESSION['login_userid']." AND logtime>='".date('Y-m-d H:i:s',mktime(date('s'),date('i'),date('H'),date('m'),date('d')-30,date('Y')))."'";
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('?p=',$page,$totalpage,$totalsize,$pagesize);

    require View::getView('header');
	require View::getView('userLogs');
	require View::getView('footer');
	View::Output();
}
?>