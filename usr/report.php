<?php 
require_once '../init.php';
define('VIEW_PATH',WY_ROOT.'/usr/report/');
$cache=Cache::getInstance();
$config=$cache->get('config');
$action=_G('action');


if($action=='search1'){
	session_start();
	$data='';
	$contact=htmlentities(_P('report_contact'));
	if($contact){
		$report=new Report_Model();
		$data=$report->getOneDataByOrderid($contact);
        echo json_encode($data);
        exit;
	}

    require View::getView('search1');
    View::Output();
}
?>