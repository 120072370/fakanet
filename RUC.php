<?php
require 'init.php';
$cacheName=_P('cacheName');
if($cacheName){
    $cache=Cache::getInstance();
	$cache->updateCache($cacheName,1);
	echo 'ok';
} 
?>