<?php
require_once 'init.php';
if($_SERVER['SERVER_NAME']!=get_domain()){
	$mydomain=explode('.',$_SERVER['SERVER_NAME']);
    $mydomain=$mydomain[0];
	$db=Mysql::getInstance();
	$re=$db->query("select userkey from ".DB_PREFIX."users where domain='".$mydomain."'");
	$re=$db->fetch_row($re);
	$userkey=$re[0];
	$re=$db->query("select siteurl from ".DB_PREFIX."config");
	$re=$db->fetch_row($re);
	$siteurl=$re[0];
	if(!empty($userkey)){
	    header("location:http://".$siteurl."/lin/".$userkey);
	}
}
$APP=AppCenter::getInstance();
$APP->run();

?>