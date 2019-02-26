<?php
require_once 'common.php';

$action=_G('action');
$ob=new News_Model();

if($action==''){
    $classid=_G('classid','int');
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$cons=$classid ? "WHERE classid=$classid ORDER BY id DESC" : "ORDER BY id DESC";
	$totalsize=$ob->getDataNum($cons);
	$lists=$ob->getData($page,$pagesize,$cons);
	$totalpage=ceil($totalsize / $pagesize);
	$pagelist=getpagelist('?classid='.$classid.'&p=' , $page , $totalpage , $totalsize);

	$cache=Cache::getInstance();
	$newsClass=$cache->get('newsClass');
	require View::getView("header");
	require View::getView("news");
	require View::getView("footer");
	View::Output();
}
	
if($action=='add'){
	$classid=_P('classid','int');
	$title=_P('title');
	$is_bold=_P('is_bold');
	$is_color=_P('is_color');
	$is_popup=_P('is_popup','int');
	$is_display_home=_P('is_display_home','int');
	$is_popup=$is_popup==false ? 0 : 1;
	$is_display_home=$is_display_home==false ? 0 :1;
	$addtime=_P('addtime');
	$content=$_POST['contenttext'];
	if($title=='' || $classid=='' || $content=='') redirect('?add_err=true');
	$data=array('classid'=>$classid , 'title'=>$title , 'content'=>$content , 'addtime'=>$addtime , 'is_color'=>$is_color , 'is_bold'=>$is_bold,'is_popup'=>$is_popup,'is_display_home'=>$is_display_home);
	$ob->addData($data);
	$cache=Cache::getInstance();
	$cache->updateCache('news');
	redirect('?add_suc=true');
}
	

if($action=='edit'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$Cache=Cache::getInstance();
	$newsClass=$Cache->get('newsClass');
	$news=$ob->getOneData($id);
	extract($news);
	require View::getView("header");
	require View::getView("newsEdit");
	require View::getView("footer");
	View::Output();
}
	
if($action=='editsave'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$classid=_P('classid','int');
	$title=_P('title');
	$is_bold=_P('is_bold');
	$is_color=_P('is_color');
	$is_popup=_P('is_popup','int');
	$is_display_home=_P('is_display_home','int');
	$addtime=_P('addtime');
	$is_popup=$is_popup==false ? 0 : 1;
	$is_display_home=$is_display_home==false ? 0 :1;
	$content=$_POST['contenttext'];
	if($title=='' || $classid=='' || $content=='') redirect('?edit_err=true');
	$data=array('classid'=>$classid , 'title'=>$title , 'content'=>$content , 'is_color'=>$is_color , 'is_bold'=>$is_bold,'is_popup'=>$is_popup,'is_display_home'=>$is_display_home,'addtime'=>$addtime);
	$ob->updateData($id,$data);
	$cache=Cache::getInstance();
	$cache->updateCache('news');
	redirect('?edit_suc=true');
}
	
if($action=='del'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$ob->deleteData($id);
	$cache=Cache::getInstance();
	$cache->updateCache('news');
	echo 'ok';
}
	
if($action=='delall'){
	$ids=array();
	if(isset($_POST['listid'])) $ids=$_POST['listid'];
	if(count($ids)==0) redirect('?del_err=true');
		foreach($ids as $id){
			$ob->deleteData(intval($id));
		}
	$cache=Cache::getInstance();
	$cache->updateCache('news');
	redirect('?del_suc=true');
}

if($action=='addNews'){
	$Cache=Cache::getInstance();
	$newsClass=$Cache->get('newsClass');
	require View::getView("header");
    require View::getView('newsAdd');
	require View::getView("footer");
	View::Output();
}