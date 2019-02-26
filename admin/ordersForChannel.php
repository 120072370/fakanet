<?php
require_once 'common.php';

$action=_G('action');
$do=_G('do');

$username='';
$fdate=$tdate=date('Y-m-d');
$cons='is_status<>4';
$channelid='';
	
if($do=='search'){
    $username=_G('username');
	$fdate=_G('fdate');
	$tdate=_G('tdate');
	$channelid=_G('channelid','int');
}

if($username!=''){
    $cons=$cons!='' ? $cons.' AND ' : '';
	$cons=$cons."userid=".Users_Model::getUserIDbyUsername($username)."";
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

if($action==''){
	$cons=$cons=='' ? '' : "WHERE {$cons}";

   // echo $cons;
	if($do=='search'){
		$lists=array();
		$cache=Cache::getInstance();
		$channels=$cache->get('channelList');
		$db=Mysql::getInstance();
		if($channels){
			$channelList=array_merge($channels,array(array('id'=>'99999','channelname'=>'组合支付')));
			foreach($channelList as $key=>$val){
				$total_orders=0;
				$success_orders=0;
				$total_money=0;
				$success_money=0;
				$income_money=0;
				$s_income_money=0;

				//总订单数量
				$result=$db->query("SELECT orderid FROM ".DB_PREFIX."buylist $cons AND channelid=".$val['id']."");
				$total_orders=$db->num_rows($result);

				//成功订单数量
				$result=$db->query("SELECT orderid FROM ".DB_PREFIX."buylist $cons AND channelid=".$val['id']." AND is_status<>0 AND is_status<>4");
				$success_orders=$db->num_rows($result);

				//金额
				$result=$db->query("SELECT sum(money),sum(realmoney),sum(realmoney*price),sum(realmoney*(platformPrice)) FROM ".DB_PREFIX."orderlist $cons AND channelid=".$val['id']."");
				$row=$db->fetch_array($result);
				$total_money=$row[0]==NULL ? 0 : $row[0];
				$success_money=$row[1]==NULL ? 0 :$row[1];
				$income_money=$row[2]==NULL ? 0 : $row[2];
				$s_income_money=$row[3]==NULL ? 0 : $row[3];

				$lists[]=array(
					'channelid'=>$val['id'],
					'channelname'=>$val['channelname'],
					'total_orders'=>$total_orders,
					'success_orders'=>$success_orders,
					'total_money'=>$total_money,
					'success_money'=>$success_money,
					'income_money'=>$income_money,
					'sys_income_money'=>$s_income_money
					);
			}
		}
	} else {
		$ob=new OrdersAnalysis_Model();
		$lists=$ob->analyForChannel($cons);
		$cache=Cache::getInstance();
		$channels=$cache->get('channelList');
	}
	require View::getView("header");
	require View::getView("ordersForChannel");
	require View::getView("footer");
	View::Output();
}