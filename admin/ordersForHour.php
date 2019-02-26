<?php
require_once 'common.php';

$action=_G('action');
$do=_G('do');
$ob=new OrdersAnalysis_Model();

$username='';
$fdate=date('Y-m-d');
$cons='';
	
if($do=='search'){
    $username=_G('username');
	$fdate=_G('fdate');
}

if($username!=''){
    $cons=$cons!='' ? $cons.' AND ' : '';
	$cons=$cons."userid=".Users_Model::getUserIDbyUsername($username)."";
}

if($fdate<>'' && isDate($fdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)='".$fdate."'";
}

if($action==''){
	$cons=$cons=='' ? '' : "WHERE {$cons}";	
	$lists=$ob->anaForHour($cons);
	require View::getView("header");
	require View::getView("ordersForHour");
	require View::getView("footer");
	View::Output();
}