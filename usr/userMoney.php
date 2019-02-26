<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	$title='结算记录';
	$ob=new Payments_Model();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$cons="WHERE userid=".$_SESSION['login_userid']." ORDER BY id DESC";
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('?p=',$page,$totalpage,$totalsize,$pagesize);

	//统计总金额
    $db=Mysql::getInstance();
	$result=$db->query("SELECT sum(money-fee),sum(fee),sum(money) FROM ".DB_PREFIX."payments WHERE userid=".$_SESSION['login_userid']." AND is_state=1");
	$row=$db->fetch_array($result);
	$total_pay=$row[0]==null ? '0.00' : number_format($row[0],2);
	$total_fee=$row[1]==null ? '0.00' : $row[1];
	$total_money=$row[2]==null ? '0.00' : $row[2];

    require View::getView('header');
	require View::getView('userMoney');
	require View::getView('footer');
	View::Output();
}

if($action=='show'){
    $id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$ob=new UserInfo_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data){
	    require View::getView('userMoneyInfo');
		View::Output();
		exit;
	}
}
?>