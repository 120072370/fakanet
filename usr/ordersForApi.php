<?php
require_once 'common.php';
$action=_G('action');
$do=_G('do');

if(!isset($_SESSION['login_is_api']) || !$_SESSION['login_is_api']){
	$msg='当前账号未开通API功能，请联系客服开通！';
	$img='error';
	$url=_S('HTTP_REFERER');
	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
	exit;
}

$fdate=$tdate='';
$channelid='';
$st='';
$kw='';
$t='';
$t2_cons='';
$cons="userid=".$_SESSION['login_userid']." AND is_api=1 AND is_status=1";
	
if($do=='search'){
	$fdate=_G('fdate');
	$tdate=_G('tdate');
	$channelid=_G('channelid','int');
	$st=_G('st');
	$kw=_G('kw');
	$t=_G('t');
}
if($fdate<>'' && isDate($fdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)>='".$fdate."'";
}

if($tdate<>'' && isDate($tdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)<='".$tdate."'";
}

if($channelid!=''){
    $cons=$cons!='' ? $cons." AND channelid=$channelid" : '';
}

if($st!='' && $kw!=''){
	switch($st){
		case 'st1':
			$kw=strlen($kw)==20 ? substr($kw,0,16) : $kw;
		    $cons.=" AND orderid='$kw'";
	    break;
	    case 'st2':
          $t2_cons="INNER JOIN (SELECT orderid FROM ".DB_PREFIX."orderlist WHERE cardnum = '".$kw."') B ON (B.orderid=A.orderid)";
         break;
	    case 'st3':
			$cons.=" AND contact='$kw'";
		break;
	    case 'st4':
			$cons.=" AND goodid in(SELECT id FROM ".DB_PREFIX."goodlist WHERE goodname LIKE '%".$kw."%')";
		break;
	    case 'st5':
			$cons.=" AND api_username LIKE '%".$kw."%'";
		break;
		default:
			$kw=strlen($kw)==20 ? substr($kw,0,16) : $kw;
			$cons.=" AND orderid='$kw'";
	}
}

if($t){
    switch($t){
	    case 't1': $cons.=" AND is_status=0"; break;
		case 't2': $cons.=" AND is_status=2"; break;
		case 't3': $cons.=" AND is_status=1"; break;
		case 't4': $cons.=" AND is_status=4"; break;
		default: $cons.='';
	}
}

if($action==''){
	$title='在线充值订单列表';
	$cons=$cons=='' ? '' : "WHERE {$cons} ORDER BY id DESC";
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$offset=($page-1)*$pagesize;

	$db=Mysql::getInstance();
	$lists=array();
	$result=$db->query("SELECT count(*) FROM ".DB_PREFIX."buylist A $t2_cons $cons");
	$row=$db->fetch_array($result);
	$totalsize=$row[0];
	$result=$db->query("SELECT * FROM ".DB_PREFIX."buylist A $t2_cons $cons LIMIT $offset,$pagesize");	
	if($totalsize>0){
	    while($row=$db->fetch_array($result)){
			$row['quantity']=intval($row['quantity']);
			$row['price']=number_format($row['price']*$row['quantity'],2,'.','');
			$channelname=Channels_Model::getChannelnamebyChannelID($row['channelid']);
			$row['channelname']=$channelname ? $channelname : '-';
			$row['channelname']=$row['channelid']=='99999' ? '组合支付' : $row['channelname'];
			$row['goodname']=GoodList_Model::getGoodnamebyGoodID($row['goodid']);
			$row['contact']=htmlspecialchars($row['contact']);			
			$lists[]=$row;
		}
	}


	$totalpage=ceil($totalsize/$pagesize);
	$pagelist=getpagelist('?do='.$do.'&channelid='.$channelid.'&t='.$t.'&fdate='.$fdate.'&tdate='.$tdate.'&p=',$page,$totalpage,$totalsize,$pagesize);

	$good=new GoodList_Model();
	$goodList=$good->getAllData($_SESSION['login_userid']);

	require View::getView("header");
	require View::getView("ordersForApi");
	require View::getView("footer");
	View::Output();
}

if($action=='ApiReturn'){
	$orderid=_G('orderid');
	$db=Mysql::getInstance();
	$row=array();
	$result=$db->query("SELECT a.userid,a.is_api_return,a.api_return_msg,a.api_username,a.quantity,a.goodid,b.api_return_url,c.api_key,sum(d.realmoney) as realmoney FROM ".DB_PREFIX."buylist as a,".DB_PREFIX."goodlist as b,".DB_PREFIX."users as c,".DB_PREFIX."orderlist as d WHERE a.is_api=1 AND a.orderid='$orderid' AND a.userid=".$_SESSION['login_userid']." AND a.userid=c.id AND a.goodid=b.id AND a.orderid=left(d.orderid,16) group by left(d.orderid,16) LIMIT 1");
	if($db->num_rows($result)==1){
	    $row=$db->fetch_array($result);
		$row['UserID']=$row['userid'];
		$row['ProID']=$row['goodid'];
		$row['Key']=$row['api_key'];
		$row['Num']=$row['quantity'];
		$row['OrderID']=$orderid;
		$row['UserName']=$row['api_username'];
		$row['Money']=number_format($row['realmoney'],2,'.','');
		$str='UserID='.$row['UserID'].'&ProID='.$row['ProID'].'&OrderID='.$row['OrderID'].'&Num='.$row['Num'].'&UserName='.$row['UserName'].'&Money='.$row['Money'];
		$sign=strtoupper(md5($str.'&Key='.$row['Key']));
		$row['returnUrl']=$row['api_return_url'].'?'.$str.'&Sign='.$sign;
	}
    require View::getView('ordersForApiReturn');
	View::Output();
}