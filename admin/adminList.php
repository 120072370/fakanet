<?php
require_once 'common.php';
$action=_G('action');
$ob=new Admin_Model();
$logs=new AdminLogs_Model();

$menuList=array('users'=>'商户信息',
'userinfo'=>'商户接入信息',
'tg_users'=>'推广会员信息',
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
'tg_goods'=>'推广商品订单',
'tg_orders'=>'平台推广订单',
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
	require View::getView('adminList');
	require View::getView('footer');
	View::Output();
}

if($action=='add'){
	require View::getView('header');
    require View::getView('adminadd');
	require View::getView('footer');
	View::Output();
}

if($action=='addsave'){
    $username=_P('username');
    $userpass=_P('userpass');
    $is_state=_P('is_state','int');
    $is_safe=_P('is_safe','int');
	$is_verifyip=_P('is_verifyip','int');
    $userkey=_P('userkey');
    $adminlimit=isset($_POST['adminlimit']) ? $_POST['adminlimit'] : array();
    $utype=_P('utype','int');
	$verifyip=_P('verifyip');	

    if($username=='' || $userpass==''){
		$msg='<span class="red">登陆用户名和密码不能为空！</span>';
		$url='adminList.php';
		$img='error';
		require View::getView('header');
	    require View::getView('msg');
		require View::getView('footer');
		View::Output();
		exit;
	}

	if($ob->getAdminIDbyUsername($username)){
		$msg='<span class="red">登陆用户名已存在！</span>';
		$url=_S('HTTP_REFERER');
		$img='error';
		require View::getView('header');
	    require View::getView('msg');
		require View::getView('footer');
		View::Output();
		exit;
	}

	$adminlimit=$adminlimit ? implode('|',$adminlimit) : '';

    $data=array(
        'username'=>$username,
        'userpass'=>md5(md5($userpass)),
        'is_state'=>$is_state,
        'utype'=>$utype,
		'adminlimit'=>strtolower($adminlimit),
        'addtime'=>date('Y-m-d H:i:s'),
		'is_safe'=>$is_safe,
		'userkey'=>md5(md5($userkey)),
		'verifyip'=>$verifyip,
		'is_verifyip'=>$is_verifyip,
    );
    $ob->addData($data);

	$msg='<span class="green">管理员账号添加成功！</span>';
	$url='adminList.php';
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
	require View::getView('adminEdit');
	require View::getView('footer');
    View::Output();
}

if($action=='editsave'){
    $id=_G('id','int');
    $id=$id===false ? 0 : $id;
    $userpass=_P('userpass');
    $is_state=_P('is_state','int');
    $is_safe=_P('is_safe','int');
	$is_verifyip=_P('is_verifyip','int');
    $userkey=_P('userkey');
    $adminlimit=isset($_POST['adminlimit']) ? $_POST['adminlimit'] : array();
    $utype=_P('utype','int');
	$verifyip=_P('verifyip');

	$adminlimit=$adminlimit ? implode('|',$adminlimit) : '';

    $data=array(
        'is_state'=>$is_state,
        'utype'=>$utype,
		'adminlimit'=>$adminlimit,
		'is_safe'=>$is_safe,
		'verifyip'=>$verifyip,
		'is_verifyip'=>$is_verifyip,
    );
    if($userpass!='') $data+=array('userpass'=>md5(md5($userpass)));
	if($userkey!='') $data+=array('userkey'=>md5(md5($userkey)));
    $ob->updateData($id,$data);

	$msg='<span class="green">管理员账号编辑成功！</span>';
	$url='adminList.php';
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