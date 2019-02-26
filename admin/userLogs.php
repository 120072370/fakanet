<?php
require_once 'common.php';

$action=_G('action');
$do=_G('do');
$ob=new UserLogs_Model();

$username='';

$cons='';
	
$username=_G('username');
$ip=_G('ip');
$fdate=_G('fdate');
$tdate=_G('tdate');
if(!$fdate) $fdate=$tdate=date('Y-m-d');

if($username){
	if($cons<>'') $cons.=' AND ';
	$cons .="userid=".Users_Model::getUserIDbyUsername($username)."";
}

if($fdate<>'' && isDate($fdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(logtime)>='".$fdate."'";
}

if($tdate<>'' && isDate($tdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(logtime)<='".$tdate."'";
}

if($ip){
    $cons.=$cons ? ' AND ' : '';
	$cons.="logip LIKE '%".$ip."%'";
}

$cons=$cons!='' ? "WHERE ".$cons : '';

if($action==''){
	$page=_G('p','int');
	if($page==false || $page==0) $page=1;
	$pagesize=20;
	$totalsize=$ob->getDataNum($cons);
	$lists=$ob->getData($page,$pagesize,$cons);
	$totalpage=ceil($totalsize / $pagesize);
	$pagelist=getpagelist('?username='.$username.'&fdate='.$fdate.'&tdate='.$tdate.'&ip='.$ip.'&p=' , $page , $totalpage , $totalsize);
	require View::getView("header");
	require View::getView("userLogs");
	require View::getView("footer");
	View::Output();
}

if($action=='del'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$ob->deleteData($id);
	redirect('?del_suc=true');
}
	
if($action=='delall'){
	$ids=array();
	if(isset($_POST['listid'])) $ids=$_POST['listid'];
	if(count($ids)==0) redirect('?del_err=true');
		foreach($ids as $id){
			$ob->deleteData(intval($id));
		}
	redirect('?del_suc=true');
}

if($action=='deldata'){
    $username=_G('username');
	$fdate=_G('fdate');
	$tdate=_G('tdate');
    $t='userLogs';
	require View::getView('clearup');
	View::Output();
	exit;
}

if($action=='exedeldata'){
    $username=_P('username');
	$fdate=_P('fdate');
	$tdate=_P('tdate');
	require View::getView('header');
	
	if($fdate && isDate($fdate) && $tdate && isDate($tdate)){
		$cons="date(logtime)>='".$fdate."' AND date(logtime)<='".$tdate."'";
		$cons.=$username ? "AND userid=".Users_Model::getUserIDbyUsername($username)."" : "";
		$cons=$cons ? "WHERE ".$cons : "";
		$db=Mysql::getInstance();
		$db->query("DELETE FROM ".DB_PREFIX."userLogs $cons");

		$msg='<span class="green">已成功清除当前登陆日志！</span>';
		$img='success';
		$url=_S('HTTP_REFERER');		
		require View::getView('msg');
	} else {
		$msg='<span class="red">登陆日志清除失败！</span>';
		$img='error';
		$url=_S('HTTP_REFERER');
	    require View::getView('msg');
	}
	require View::getView('footer');
	View::Output();
}