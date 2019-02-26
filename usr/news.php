<?php
require_once 'common.php';
$action=_G('action');
if($action==''){
	$title='通知公告';

	//公告
	$cache=Cache::getInstance();
	$news=$cache->get('news');

	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$cons="WHERE classid=1 or classid=4 ORDER BY id DESC";
	$ob=new News_Model();
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('?p=',$page,$totalpage,$totalsize,$pagesize);

    require View::getView('header');
	require View::getView('businessesPedia');
	require View::getView('footer');
	View::Output();
}

if($action=='viewForMobile'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$t=_G('t','int');
	$mobileFlag=true;
	$ob=new News_Model();
	$data=$ob->getOneData($id);
	require View::getView('header');
	require View::getView('viewNews');
	require View::getView('footer');
	View::Output();
}
?>