<?php
require_once 'common.php';

$action=_G('action');
$ob=new TgProducts_Model();
$logs=new AdminLogs_Model();

$menuList=array('users'=>'商户信息',
'userinfo'=>'商户接入信息',
'userlogs'=>'商户登陆日志',
'orders'=>'订单管理',
'ordersforuser'=>'商户订单分析',
'ordersforchannel'=>'交易渠道分析',
'ordersforhour'=>'24小时交易分析',
'usermoney'=>'商户结算',
'payments'=>'结算记录',
'accessprovider'=>'通道接入信息',
'channels'=>'通道列表',
'newsclass'=>'文章分类管理',
'news'=>'文章列表管理',
'adminpwd'=>'管理员密码修改',
'adminlist'=>'管理员列表',
'message'=>'站内消息管理',
'set'=>'系统设置',
'index'=>'系统首页',
'report'=>'投诉举报',
'goods'=>'商品管理',
);

if($action==''){
	$cons='';
    $do=_G('do');
	$keyword=_G('keyword');
	if($do=='search' && $keyword!=''){	    
		$cons="WHERE username like '%".$keyword."%'";
	}
	$page=_G('p','int');
	if($page==false) $page=1;
	$pagesize=20;
	$cons=$cons!='' ? $cons." ORDER BY id DESC" : "ORDER BY id DESC";
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize / $pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$PageList=getpagelist('?do='.$do.'&keyword='.$keyword.'&p=' , $page , $totalpage , $totalsize);
	require View::getView('header');
	require View::getView('tg_products');
	require View::getView('footer');
	View::Output();
}

if($action=='add'){
	require View::getView('header');
    require View::getView('tg_products_add');
	require View::getView('footer');
	View::Output();
}

if($action=='addsave'){
    $title=_P('title');
    $url=_P('url');
    $fencheng1=_P('fencheng1','int');
	$fencheng2=_P('fencheng2','int');
	$ctime=time();

    $data=array(
        'title'=>$title,
        'url'=>$url,
        'fencheng1'=>$fencheng1,
        'fencheng2'=>$fencheng2,
        'ctime'=>$ctime,
    );
    $ob->addData($data);
	$msg='<span class="green">添加成功！</span>';
	$url='tg_products.php';
	$img='success';
	require View::getView('header');
	require View::getView('msg');
	require View::getView('footer');
	View::Output();
	exit;
}

if($action=='del'){
    $id=_G('id','int');
    $id=$id===false ? 0 : $id;
    $ob->deleteData($id);
    echo 'ok';
}

if($action=='delall'){
    $ids=isset($_POST['listsid']) ? $_POST['listsid'] : array();
    if(count($ids)==0)Redirect('?del_err=true');
    foreach($ids as $id){
        $ob->deleteData(intval($id));
    }
    Redirect('?del_suc=true');
}

if($action=='edit'){
    $id=_G('id','int');
    $id=$id===false ? 0 : $id;
    $data=$ob->getOneData($id);
    require View::getView('header');
	require View::getView('tg_products_mod');
	require View::getView('footer');
    View::Output();
}

if($action=='modsave'){
    $id=_P('id');
    $title=_P('title');
    $url=_P('url');
    $fencheng1=_P('fencheng1','int');
	$fencheng2=_P('fencheng2','int');

    $data=array(
        'title'=>$title,
        'url'=>$url,
        'fencheng1'=>$fencheng1,
        'fencheng2'=>$fencheng2,
    );
    $ob->updateData($id,$data);

	$msg='<span class="green">编辑成功！</span>';
	$url='tg_products.php';
	$img='success';
	require View::getView('header');
	require View::getView('msg');
	require View::getView('footer');
	View::Output();
	exit;
}

if($action=='adminlogs'){	
    $username=_G('username');
	$cons='';
	$fdate=_G('fdate');
	$tdate=_G('tdate');
	if(!$fdate) $fdate=$tdate=date('Y-m-d');

	if($username){
		if($cons<>'') $cons.=' AND ';
		$cons .="userid=".$ob->getAdminIDbyUsername($username)."";
	}

	if($fdate<>'' && isDate($fdate)){
		if($cons<>'') $cons.=' AND ';
		$cons .="date(logtime)>='".$fdate."'";
	}

	if($tdate<>'' && isDate($tdate)){
		if($cons<>'') $cons.=' AND ';
		$cons .="date(logtime)<='".$tdate."'";
	}
	$cons=$cons!='' ? "WHERE ".$cons : '';

	$page=_G('p','int');
	if($page==false || $page==0) $page=1;
	$pagesize=20;
	$totalsize=$logs->getDataNum($cons);
	$lists=$logs->getData($page,$pagesize,$cons);
	$totalpage=ceil($totalsize / $pagesize);
	$pagelist=getpagelist('?action=adminlogs&username='.$username.'&fdate='.$fdate.'&tdate='.$tdate.'&p=' , $page , $totalpage , $totalsize);
	require View::getView('header');
	require View::getView('adminlogs');
	require View::getView('footer');
	View::Output();
}

if($action=='dellogs'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$logs->deleteData($id);
	redirect('?action=adminlogs&del_suc=true');
}
	
if($action=='delalllogs'){
	$ids=array();
	if(isset($_POST['listid'])) $ids=$_POST['listid'];
	if(count($ids)==0) redirect('?del_err=true');
		foreach($ids as $id){
			$logs->deleteData(intval($id));
		}
	redirect('?action=adminlogs&del_suc=true');
}

if($action=='deldatalogs'){
    $username=_G('username');
	$fdate=_G('fdate');
	$tdate=_G('tdate');
    $t='adminlogs';
	require View::getView('clearup');
	View::Output();
	exit;
}

if($action=='exedeldatalogs'){
    $username=_P('username');
	$fdate=_P('fdate');
	$tdate=_P('tdate');
	require View::getView('header');
	
	if($fdate && isDate($fdate) && $tdate && isDate($tdate)){
		$cons="date(logtime)>='".$fdate."' AND date(logtime)<='".$tdate."'";
		$cons.=$username ? "AND userid=".$ob->getAdminIDbyUsername($username)."" : "";
		$cons=$cons ? "WHERE ".$cons : "";
		$db=Mysql::getInstance();
		$db->query("DELETE FROM ".DB_PREFIX."adminLogs $cons");

		$msg='<span class="green">已成功清除当前登陆日志！</span>';
		$img='success';
		$url=_S('HTTP_REFERER');		
		require View::getView('msg');
	} else {
		$msg='<span class="red">登陆日志清除失败！</span>';
		$img='error';
		$url=_S('HTTP_REFERER');
	    require View::getView('msg');
	}
	require View::getView('footer');
	View::Output();
}