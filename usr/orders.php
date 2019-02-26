<?php
require_once 'common.php';
$action=_G('action');
$do=_G('do');
$ob=new OrdersAnalysis_Model();

$fdate=$tdate='';
$channelid='';
$st='';
$kw='';
$t='';
$t2_cons='';
$is_api='';
$cons="userid=".$_SESSION['login_userid']."";
if($do=='search'){
	$fdate=_G('fdate');
	$tdate=_G('tdate');
	$channelid=_G('channelid','int');
	$st=_G('st');
	$kw=_G('kw');
	$t=_G('t');
	$is_api=_G('is_api');
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

if($is_api!=''){
    $cons.=$cons!='' ? ' AND ' : '';
	$cons.=$is_api=='a0' ? "is_api=0" : "is_api=1";
}

if($st!='' && $kw!=''){
	switch($st){
		case 'st1':
			$kw=strlen($kw)==20 ? substr($kw,0,16) : $kw;
		    $cons.=" AND orderid='$kw'";
	    break;
	    case 'st2':
         $t2_cons="INNER JOIN (SELECT orderid FROM ".DB_PREFIX."orderlist WHERE cardnum = '".$kw."') B ON (A.orderid=B.orderid)";
			//$cons.="orderid=(SELECT LEFT(orderid,16) FROM ".DB_PREFIX."orderlist WHERE is_state=1 and cardnum='$searchtext' LIMIT 1)"; 
         break;
	    case 'st3':
			$cons.=" AND contact='$kw'";
		break;
	    case 'st4':
			$cons.=" AND goodid in(SELECT id FROM ".DB_PREFIX."goodlist WHERE goodname LIKE '%".$kw."%')";
		break;
	  case 'st5':
		  $cons.=" AND orderid in(SELECT orderid FROM ".DB_PREFIX."selllist WHERE cardid=(SELECT id FROM ".DB_PREFIX."goods WHERE cardnum='$kw' and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(addtime)))";
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
	$title='订单查询';
	$cons_old=$cons;
	$cons=$cons=='' ? '' : "WHERE {$cons} ORDER BY id DESC";
	$cons1=$cons_old=='' ? '' : "WHERE is_status=1 and {$cons_old} ORDER BY id DESC";
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$offset=($page-1)*$pagesize;

	$db=Mysql::getInstance();
	$lists=array();
	$result=$db->query("SELECT count(*) FROM ".DB_PREFIX."buylist A $t2_cons $cons");
    //echo $t2_cons."+++".$cons1;
	$totalPrice=$db->query("SELECT sum(price*quantity) as price FROM ".DB_PREFIX."buylist A $t2_cons $cons");
	$totalPrice=$db->fetch_array($totalPrice);
	$totalPrice1=$db->query("SELECT sum(price*quantity) as price FROM ".DB_PREFIX."buylist A $t2_cons $cons1");
	$totalPrice1=$db->fetch_array($totalPrice1);
	$row=$db->fetch_array($result);
	$totalsize=$row[0];
	$result=$db->query("SELECT * FROM ".DB_PREFIX."buylist A $t2_cons $cons LIMIT $offset,$pagesize");	
	if($totalsize>0){
		//$goodList=new GoodList_Model();
	    while($row=$db->fetch_array($result)){
			//$data=$goodList->getOneData($row['goodid']);
			$row['quantity']=intval($row['quantity']);
			$row['price']=number_format($row['price']*$row['quantity'],2,'.','');
			$channelname=Channels_Model::getChannelnamebyChannelID($row['channelid']);
			$row['channelname']=$channelname ? $channelname : '-';
			$row['channelname']=$row['channelid']=='99999' ? '组合支付' : $row['channelname'];
			$row['goodname']=GoodList_Model::getGoodnamebyGoodID($row['goodid']);
			$row['is_discount']=$row['is_discount_state'];
			$row['is_coupon']=$row['is_coupon_state'];
			$row['is_api']=$row['is_api'];
			$row['is_pwdforsearch']=$row['pwdforsearch'] ? 1 : 0;
			$row['contact']=htmlspecialchars($row['contact']);			
			$lists[]=$row;
		}
	}


	$totalpage=ceil($totalsize/$pagesize);
	$pagelist=getpagelist('?do='.$do.'&channelid='.$channelid.'&is_api='.$is_api.'&t='.$t.'&fdate='.$fdate.'&tdate='.$tdate.'&p=',$page,$totalpage,$totalsize,$pagesize);
	$channelList=$cache->get('channelList');
	require View::getView("header");
	require View::getView("orders");
	require View::getView("footer");
	View::Output();
}

if($action=='op'){
    $orderid=strtoupper(_G('orderid'));
	$t=_G('t','int');
	$db=Mysql::getInstance();
	$db->query("UPDATE ".DB_PREFIX."buylist SET is_state=$t WHERE orderid='$orderid'");
    echo 'ok';
	exit;
}

if($action=='batchClose'){
	require View::getView("orderBatchClose");
	View::Output();
}

if($action=='batchCloseSet'){
    $days=_G('days','int');
	$days=$days===false ? 0 : $days;
	$db=Mysql::getInstance();
	$result=$db->query("UPDATE ".DB_PREFIX."buylist SET is_state=1 WHERE userid=".$_SESSION['login_userid']." AND is_status=0 AND addtime<='".date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d')-$days,date('Y')))."'");
	$rows=$db->affected_rows();

	$msg='已成功关闭 <span class="red">'.$rows.'</span> 条订单！';
	$url=_S('HTTP_REFERER');
	require View::getView("header");
	require View::getView("prompt");
	require View::getView("footer");
	View::Output();
}

if($action=='export'){
    $orderid=_G('orderid');
}