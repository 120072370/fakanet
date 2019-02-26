<?php
require_once 'common.php';

$CACHE=Cache::getInstance();
$action=_P('action');
if($action=='save'){
    //$file_name=md5_file($_FILES["file"]["tmp_name"]);
    //$folder="/upload/";
    //$file_exts=".".pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    //$file_url=$folder.$file_name.$file_exts;
    //move_uploaded_file($_FILES["file"]["tmp_name"], WY_ROOT.$file_url);
		
	$site_arr=array();
	$config=$_POST['config'];
	if(!empty($_FILES["file"]["tmp_name"])){
		//$config['weixin']=$file_url;
	}
	
	if($config){
	    foreach($config as $key=>$val){
		    $site_arr[$key]=$key=='tongji' ? $val : makeSafe($val);
		}
	}
	
	$CONFIG=new Config_Model();
	//$CONFIG->deleteData();
	//$CONFIG->addData($site_arr);
	$CONFIG->updateData($site_arr);
	$CACHE->updateCache('config');
	redirect('set.php?op_suc=true');
}
	

$CONFIG=new Config_Model();
$data=$CONFIG->getOneData();
if($data) extract($data);

require View::getView('header');
require View::getView('set');
require View::getView('footer');
View::Output();
?>