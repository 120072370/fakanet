<?php
require_once 'common.php';

$action=_G('action');
$do=_G('do');

$username='';
$fdate=$tdate=date('Y-m-d');
$channelid='';
$cons='';
	
if($do=='search'){
    $username=_G('username');
	$fdate=_G('fdate');
	$tdate=_G('tdate');
	$channelid=_G('channelid','int');
}

if($username!=''){
	$cons.=$cons!='' ? ' AND ' : '';
	$cons.="userid=".Users_Model::getUserIDbyUsername($username)."";
}

if($fdate<>'' && isDate($fdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)>='".$fdate."'";
}

if($tdate<>'' && isDate($tdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)<='".$tdate."'";
}

if($channelid && $channelid!=0){
	if($cons<>'') $cons.=' AND ';
	$cons .="channelid=".$channelid."";
}

$cons=$cons=='' ? '' : "WHERE {$cons}";

if($action==''){
	$lists=array();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$offset=($page-1)*$pagesize;	
	$db=Mysql::getInstance();
	//$result=$db->query("SELECT userid FROM ".DB_PREFIX."buylist $cons GROUP BY userid");
	//$totalsize=$db->num_rows($result);
    $result=$db->query("SELECT userid FROM ".DB_PREFIX."buylist $cons GROUP BY userid ORDER BY count(orderid) DESC");
	$totalsize=$db->num_rows($result);
	if($totalsize>0){
	    while($row=$db->fetch_array($result)){
		    //提交订单数和提交金额
			$res=$db->query("SELECT orderid FROM ".DB_PREFIX."buylist $cons AND userid=".$row['userid']."");
			$total_orders=$db->num_rows($res);
			$total_money=0;
			if($total_orders>0){
			    while($row1=$db->fetch_array($res)){
				    $res2=$db->query("SELECT sum(money) FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND orderid LIKE '".$row1['orderid']."%'");
					$row2=$db->fetch_array($res2);
					$total_money+=$row2[0];
				}
			}
			
			//成功订单数、金额、收入
			$res=$db->query("SELECT orderid FROM ".DB_PREFIX."buylist $cons AND userid=".$row['userid']." AND is_status<>0 AND is_status<>4");
			$success_orders=$db->num_rows($res);
			$success_money=0;
			$income_money=0;
			$sys_income_money=0;
			if($success_orders>0){
			    while($row1=$db->fetch_array($res)){
				    $res2=$db->query("SELECT sum(realmoney),sum(realmoney*price),sum(realmoney*(platformPrice)) FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND orderid LIKE '".$row1['orderid']."%'");
					$row2=$db->fetch_array($res2);
					$success_money+=$row2[0];
					$income_money+=$row2[1];
					$sys_income_money+=$row2[2];
				}
			}

			$sys_income_money=$sys_income_money<0 ? 0 :$sys_income_money;

			$lists[]=array(
			    'userid'=>$row['userid'],
				'username'=>Users_Model::getUsernamebyUserID($row['userid']),
				'total_orders'=>$total_orders,
				'success_orders'=>$success_orders,
				'total_money'=>$total_money,
				'success_money'=>$success_money,
				'income_money'=>$income_money,
				'sys_income_money'=>$sys_income_money,
				'fail_orders'=>$total_orders-$success_orders,
			);
		}
	}
	//$totalpage=ceil($totalsize / $pagesize);
	//$pagelist=getpagelist('?username='.$username.'&fdate='.$fdate.'&tdate='.$tdate.'&do='.$do.'&p=' , $page , $totalpage , $totalsize);
	$cache=Cache::getInstance();
	$channels=$cache->get('channelList');
	require View::getView("header");
	require View::getView("ordersForUser");
	require View::getView("footer");
	View::Output();
}