<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	$title='商户支付链接';
    require View::getView('header');
	require View::getView('paylinks');
	require View::getView('footer');
	View::Output();
}

if($action=='editsave'){
	
    $domain=_P('domain');
	if(empty($domain)){
	    $msg='<span class="red">域名为空！</span>';
		$img="error";
		$url='paylinks.php';

		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();die;
	}
	$db=Mysql::getInstance();
	$result=$db->query("SELECT domainnot FROM ".DB_PREFIX."config");
	$result=$db->fetch_array($result);
	$domainnot=$result['domainnot'];
	$domainnot=preg_split("/[,\n\r|]+/s",$domainnot ,-1,PREG_SPLIT_NO_EMPTY);
	if(in_array($domain, $domainnot)){
	   $msg='<span class="red">此域名为系统保留关键字，请更换！</span>';
		$img="error";
		$url='paylinks.php';

		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();die;
	}
	
    $result=$db->query("SELECT domain FROM ".DB_PREFIX."users where domain='{$domain}'");
	$result=$db->fetch_array($result);
	if(!empty($result['domain'])){
	   $msg='<span class="red">域名已经占用，请更换！</span>';
		$img="error";
		$url='paylinks.php';

		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();die;
	}
	//check oldpassword
	$ob=new Users_Model();
	$data=array(
		'domain'=>$domain,
	);
	$ob=new Users_Model();
	$ob->updateData($_SESSION['login_userid'],$data);

	$msg='<span class="green">二级域名修改成功！</span>';
	$url='paylinks.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}
?>