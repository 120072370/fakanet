<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	$title='申请结算';
	//账户余额
	$total=$wddb->getone("select unpaid from ".DB_PREFIX."usermoney where userid=".$_SESSION['login_userid']);
	//申请金额
	$total_sqje=$wddb->getone("select sum(money) from ".DB_PREFIX."payments where userid=".$_SESSION['login_userid']." and (is_state=0 or is_state=100)");
	//可申请金额
	$total_ksqje=$total-$total_sqje;
	
    require View::getView('header');
	require View::getView('userSqjs');
	require View::getView('footer');
	View::Output();
}

if($action=='editsave'){
	$uid=$_SESSION['login_userid'];
	$maxmoney=$_REQUEST['maxmoney'];
	if($maxmoney<$_REQUEST['money']){
	    $msg='<span class="red">金额无效！</span>';
		$url='userSqjs.php';
		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();
	}
	$rs_user=$wddb->getrow("SELECT * FROM ".DB_PREFIX."userinfo where id=$uid");
	$remark='';
	if($rs_user['ptype']==1){
		$remark.='姓名：'.$rs_user['realname']."\n";	
		$remark.='开户银行：'.$rs_user['bank']."\n";
		$remark.='开户地址：'.$rs_user['addr']."\n";
		$remark.='银行卡号：'.$rs_user['card']."\n";
	}else if($rs_user['ptype']==2){
		$remark.='姓名：'.$rs_user['realname']."\n";	
		$remark.="支付宝：".$rs_user['alipay'];
	}else if($rs_user['ptype']==3){
		$remark.='姓名：'.$rs_user['realname']."\n";	
		$remark.="财付通：".$rs_user['tenpay'];
	}else if($rs_user['ptype']==4){
		$remark.='姓名：'.$rs_user['realname']."\n";	
		$remark.="微信号：".$rs_user['wx_nickname'];
	}
	$data=array(
		'userid'=>$uid,
		'pid'=>2,
		'money'=>$_REQUEST['money'],
		'fee'=>$_REQUEST['fee'],
		'remark'=>$remark,
		'addtime'=>date('Y-m-d H:i:s'),
		'updatetime'=>time(),
		'is_state'=>0
	);
	$wddb->autoExecute(DB_PREFIX."payments",$data);
	$msg='<span class="green">提现申请成功！</span>';
	$url='userSqjs.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}
?>