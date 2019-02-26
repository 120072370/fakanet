<?php
error_reporting(0);
require_once('../../init.php');

//get id and key
$cache=Cache::getInstance();
$userid='';
$userkey='';
$accessProvider=$cache->get('accessProvider');
if($accessProvider){
    foreach($accessProvider as $key=>$val){
	    if($val['accessType']=='mqpay'){
			$email=$val['email'];
		    $userid=$val['accessID'];
			$userkey=$val['accessKey'];
			break;
		}
	}
}
?>