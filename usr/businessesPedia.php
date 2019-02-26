<?php
require_once 'common.php';

$action=_G('action');

if($action==''){
	$title='商家百科';

	//公告
	$cache=Cache::getInstance();
	$news=$cache->get('news');

	//自动弹出
	$is_popup='';
	if($news){
	    foreach($news as $key=>$val){
		    if($val['is_popup'] && $val['classid']==3){
			    $is_popup.=$is_popup ? ',"'.$val['id'].'"' : '"'.$val['id'].'"';
			}
		}
	}

	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$cons="WHERE classid=3 ORDER BY id DESC";
	$ob=new News_Model();
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('?p=',$page,$totalpage,$totalsize,$pagesize);

    require View::getView('header');
	require View::getView('businessesPedia');
	require View::getView('footer');
	View::Output();
}

if($action=='view'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$t=_G('t','int');
	$ob=new News_Model();
	$data=$ob->getOneData($id);
	if($t==2){
	    if($data){
		    echo '{"title":'.json_encode($data['title']).',"content":'.json_encode($data['content']).',"titlecolor":'.json_encode($data['is_color']).',"addtime":'.json_encode($data['addtime']).'}';
			exit;
		}
	} else {
	    require View::getView('viewNews');
	    View::Output();
	}
}

if($action=='viewForMobile'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$t=_G('t','int');
	$mobileFlag=true;
	$ob=new News_Model();
	$data=$ob->getOneData($id);
	require View::getView('header');
	require View::getView('viewNews');
	require View::getView('footer');
	View::Output();
}
?>