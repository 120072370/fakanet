<?php
require 'common.php';

$action=_G('action');
if($action==''){
    require View::getView('header');
    require View::getView('main');
    require View::getView('footer');
}

if($action=='recache'){
    $cache=Cache::getInstance();
	$cache->updateCache(array('config','channelList','news','newsClass','pay','payList','accessProvider'));
	echo 'true';
}

if($action=='checkInbox'){
    $ob=new Message_Model();
	echo $ob->getUnRead("WHERE to_user=".$_SESSION['adminid']." AND is_read=0");
	exit;
}