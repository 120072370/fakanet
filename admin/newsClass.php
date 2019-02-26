<?php
require_once 'common.php';

$action=_G('action');
$ob=new NewsClass_Model();

if($action==''){	
	$lists=$ob->getData();
	require View::getView("header");
	require View::getView("newsClass");
	require View::getView("footer");
	View::Output();
}
	
if($action=='add'){
	$cname=_P('cname');
	if($cname=='') redirect('?add_err=true');
	$ob->addData(array('classname'=>$cname));
	$Cache=Cache::getInstance();
	$Cache->updateCache('newsClass');
	redirect('?add_suc=true');
}
	

if($action=='edit'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$class=$ob->getOneData($id);
	extract($class);
	require View::getView("header");
	require View::getView("newsClassEdit");
	require View::getView("footer");
	View::Output();
}
	
if($action=='editsave'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$cname=_P('cname');
	if($cname=='') redirect('?edit_err=true');
	$ob->updateData($id,array('classname'=>$cname));
	$Cache=Cache::getInstance();
	$Cache->updateCache('newsClass');
	redirect('?edit_suc=true');
}
	
if($action=='del'){
	$id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$ob->deleteData($id);
	$Cache=Cache::getInstance();
	$Cache->updateCache('newsClass');
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