<?php
require_once 'common.php';

$action=_G('action');
$ob=new UserInfo_Model();

if($action==''){
	$cons='';
    $do=_G('do');
	$keyword=_G('keyword');
	$ctype=_G('ctype','int');
	$is_state=_G('is_state');
	if($keyword!=''){
		$cons.=$cons ? ' AND ' : '';  
		$cons.="realname like '%".$keyword."%' or bank like '%".$keyword."%' or card like '%".$keyword."%' or addr like '%".$keyword."%' or alipay like '%".$keyword."%' or tenpay like '%".$keyword."%' or userid in(SELECT id FROM ".DB_PREFIX."users WHERE id='$keyword') OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE username like '%".$keyword."%') OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE qq like '%".$keyword."%')  OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE tel like '%".$keyword."%')  OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE email like '%".$keyword."%')";
	}
	if($ctype){
		$cons.=$cons ? ' AND ' : '';
		$cons.="userid in(SELECT id FROM ".DB_PREFIX."users WHERE ctype=$ctype)";
	}
	switch($is_state){
		case 's0': $cons.=$cons ? ' AND ' : ''; $cons.="userid in(SELECT id FROM ".DB_PREFIX."users WHERE is_state=0)"; break;
		case 's1': $cons.=$cons ? ' AND ' : ''; $cons.="userid in(SELECT id FROM ".DB_PREFIX."users WHERE is_state=1)"; break;
	}
	
	$cons=$cons ? "WHERE $cons" : '';
	
	$page=_G('p','int');
	if($page==false) $page=1;
	$pagesize=20;
	$cons=$cons!='' ? $cons." ORDER BY id DESC" : "ORDER BY id DESC";
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize / $pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$PageList=getpagelist('?do='.$do.'&keyword='.$keyword.'&ctype='.$ctype.'&is_state='.$is_state.'&p=' , $page , $totalpage , $totalsize , $pagesize);
	require View::getView('header');
	require View::getView('userInfo');
	require View::getView('footer');
	View::Output();
}

if($action=='edit'){
    $id=_G('id','int');
    $id=$id==false ? 1 : $id;
    $data=$ob->getOneData($id);
    extract($data);
    require View::getView('userInfoEdit');
    View::Output();
}

if($action=='editsave'){
    $id=_G('id','int');
    $id=$id==false ? 0 : $id;
    $is_safe=_P('is_safe','int');
    $safekey=_P('safekey');
    $is_login=_P('is_login');
    $ptype=_P('ptype','int');
    $bank=_P('bank');
    $card=_P('card');
	$addr=_P('addr');
	$realname=_P('realname');
	$idcard=_P('idcard');
	$alipay=_P('alipay');
	$tenpay=_P('tenpay');

    $wx_openid=_P('wx_openid');
    $wx_nickname=_P('wx_nickname');
    $data=array(
        'is_safe'=>$is_safe,
        'is_login'=>$is_login,
        'realname'=>$realname,
		'idcard'=>$idcard,
        'ptype'=>$ptype,
		'bank'=>$bank,
		'card'=>$card,
		'addr'=>$addr,
		'alipay'=>$alipay,
		'tenpay'=>$tenpay,
        'wx_openid'=>$wx_openid,
        'wx_nickname'=>$wx_nickname,
    );	

    if($safekey!='') $data=$data+array('safekey'=>md5(md5($safekey)));
    $ob->updateData($id,$data);
    
    Redirect(_S('HTTP_REFERER'),'信息修改成功！');
}

if($action=='getuserinfo'){
    $userid=_G('userid','int');
	$userid=$userid==false ? 0 : $userid;
	$data=$ob->getOneData($userid);
	if($data){
	    require View::getView('viewuserbankinfo');
		View::Output();
		exit;
	}
}

if($action=='delPwcard'){
    $userid=_G('userid','int');
	$data=$ob->getOneData($userid);
	if($data){
	    $pwcardsn=$data['sn'];
		$ob->updateData($userid,array('is_pwcard'=>0,'sn'=>0,'pwCardCol'=>''));
		$db=Mysql::getInstance();
		$db->query("DELETE FROM ".DB_PREFIX."pwcard WHERE sn=$pwcardsn");
	}
	Redirect(_S('HTTP_REFERER'),'密保卡格式化成功！');
}