<?php
require_once '../init.php';
define('VIEW_PATH',WY_ROOT.'/lin/default/');

$paymoney=_P('paymoney','float');
$orderid=_P('orderid');
$paytype=_P('paytype');
$goodid=_P('goodid','int');
$userid=_P('userid','int');
$pid=_P('pid');
$quantity=_P('quantity','int');
$couponcode='';

if(!$paymoney || !$paytype || !$pid || !$orderid || !$goodid || !$quantity || !$userid){
    echo "<script>alert('params error!');parent.$.nyroModalRemove(); </script>";
	exit;
}

$cache=Cache::getInstance();
//get config
$config=$cache->get('config');
$config_sitename=$config['sitename'];
$config_siteurl=$config['siteurl'];

//get goodname
$good=new GoodList_Model();
$goodList=$good->getOneData($goodid);
if($goodList){
	$goodname=$val['goodname'];
	$cateid=$val['cateid'];
}

//get channelid accessType
$channelid=$pid;
$channelList=$cache->get('channelList');
if($paytype=='bank' || $paytype=='alipay' || $paytype=='tenpay'||$paytype=='WEIXIN'|$paytype=='ALIWAP'|$paytype=='QQCODE'){
	if($pid=='ALIPAY'){
	    $payid=25;
	} else if($pid=='TENPAY'){
		$payid=26;
	} else if($pid=='WEIXIN'){
		$payid=27;
	} else if($pid=='QQCODE'){
		$payid=29;
	} else if($pid=='ALIWAP'){
		$payid=28;
	} else {
	    $payid=24;
	}
	foreach($channelList as $key=>$val){
		if($val['payid']==$payid){
			$channelid=$val['id'];
			$accessType=$val['accessType'];
			break;
		}
	}

} else {

	foreach($channelList as $key=>$val){
		if($val['id']==$channelid){
			$payid=$val['payid'];
			$accessType=$val['accessType'];
			break;
		}
	}

	//get cardimgurl
	$pay=$cache->get('pay');
	foreach($pay as $key=>$val){
	    if($val['payid']==$payid){
		    $imgurl=$val['imgurl'];
			break;
		}
	}
}

//get is_getgood
$is_getgood=0;
$user=new Users_Model();
$users=$user->getOneData($userid);
if($users){
	$is_getgood=$users['is_getgood'];
}

if(!isset($accessType)){
    echo "<script>alert('此支付方式未开通4！请选择其他支付方式！');parent.$.nyroModalRemove(); </script>";
	exit;
}

$rate=getRates($userid,$cateid,$goodid,$channelid);



$db=Mysql::getInstance();
if($paytype=='bank' || $paytype=='alipay' || $paytype=='tenpay'||$paytype=='WEIXIN'|$paytype=='ALIWAP'|$paytype=='QQCODE'){
	$orderid .= date('is');
	$payorderid=getOrderNum();
    $db->query("INSERT INTO ".DB_PREFIX."orderlist(orderid,payorderid,money,rates,channelid,addtime) VALUES('$orderid','$payorderid',$paymoney,$rate,$channelid,'".date('Y-m-d H:i:s')."')");

	//create redirect url
	$redirectUrl='http://'._S('HTTP_HOST').'/pay/'.$accessType.'_bank/send_'.$accessType.'.php?price='.$paymoney.'&orderid='.$orderid.'&payorderid='.$payorderid.'&pid='.$pid;
	
	require View::getView('bank');
	View::Output();

} else {

	$cardsvalue=$_POST['cardvalue'];
	$cardsnum=$_POST['cardnum'];
	$cardspwd=$_POST['cardpwd'];
	if(count($cardsvalue)==0 || count($cardsnum)==0 || count($cardspwd)==0){
		echo "<script>alert('cardinfo error!');parent.$.nyroModalRemove(); </script>";
		exit; 
	}
	$count=count($cardsvalue);
	$cardnums='';
	$cardpwds='';
	$cardvalues='';
    $payorderids='';

	if($accessType!='ofpay'){
		$neworderid=$orderid.mt_rand(1000,9999);
	for($i=0;$i<$count;$i++){
	    $cardvalue=makeSafe($cardsvalue[$i],'int');
		$cardnum=makeSafe($cardsnum[$i]);
		$cardpwd=makeSafe($cardspwd[$i]);
		$payorderid=getOrderNum();		

        $db->query("INSERT INTO ".DB_PREFIX."orderlist(orderid,payorderid,money,rates,cardnum,cardpwd,channelid,addtime) VALUES('$neworderid','$payorderid',$cardvalue,$rate,'$cardnum','$cardpwd',$channelid,'".date('Y-m-d H:i:s')."')");

		$cardnums=$cardnums!='' ? $cardnums.','.$cardnum : $cardnum;
		$cardpwds=$cardpwds!='' ? $cardpwds.','.$cardpwd : $cardpwd;
		$cardvalues=$cardvalues!='' ? $cardvalues.','.$cardvalue : $cardvalue;
		$payorderids=$payorderids!='' ? $payorderids.','.$payorderid : $payorderid;
	}

	//create redirect url
	$redirectUrl='http://'._S('HTTP_HOST').'/pay/'.$accessType.'_card/send_'.$accessType.'.php';
	$params=array('price'=>$paymoney,'orderid'=>$neworderid,'pid'=>$pid,'cardvalue'=>$cardvalues,'cardnum'=>$cardnums,'cardpwd'=>$cardpwds,'payorderid'=>$payorderids);

	$returnMsg=HttpClient::quickPost($redirectUrl,$params);
	$returnMsg=trim(strip_tags(mb_convert_encoding($returnMsg,'utf-8','gb2312')));
	$returnMsg=strlen($returnMsg)>100 ? subString($returnMsg,0,100) : $returnMsg;
	//update orders
	$db->query("UPDATE ".DB_PREFIX."buylist SET returnmsg='{$returnMsg}' WHERE orderid='{$orderid}'");
    if($returnMsg!="ok"){
		echo "<script>alert('".$returnMsg."');parent.$.nyroModalRemove(); </script>";
		exit;
	}

	} else {


	for($i=0;$i<$count;$i++){
	    $cardvalue=makeSafe($cardsvalue[$i],'int');
		$cardnum=makeSafe($cardsnum[$i]);
		$cardpwd=makeSafe($cardspwd[$i]);
		$payorderid=getOrderNum();
		$neworderid=$orderid.mt_rand(1000,9999);

		$result=$db->query("SELECT COUNT(*) FROM ".DB_PREFIX."orderlist WHERE orderid='$neworderid' AND cardnum='$cardnum'");
		$row=$db->fetch_array($result);
		$total_nums=$row[0]==null ? 0 : $row[0];
		if($total_nums==0){
			$db->query("INSERT INTO ".DB_PREFIX."orderlist(orderid,payorderid,money,rates,cardnum,cardpwd,channelid,addtime) VALUES('$neworderid','$payorderid',$cardvalue,$rate,'$cardnum','$cardpwd',$channelid,'".date('Y-m-d H:i:s')."')");

			//create redirect url
			$redirectUrl='http://'._S('HTTP_HOST').'/pay/'.$accessType.'_card/send_'.$accessType.'.php';
			$params=array('price'=>$cardvalue,'orderid'=>$neworderid,'pid'=>$pid,'cardvalue'=>$cardvalue,'cardnum'=>$cardnum,'cardpwd'=>$cardpwd,'payorderid'=>$payorderid);

			$returnMsg=HttpClient::quickPost($redirectUrl,$params);
			$returnMsg=trim(strip_tags(mb_convert_encoding($returnMsg,'utf-8','gb2312')));
			$returnMsg=strlen($returnMsg)>100 ? subString($returnMsg,0,100) : $returnMsg;
			//update orders
			$db->query("UPDATE ".DB_PREFIX."buylist SET returnmsg='{$returnMsg}' WHERE orderid='{$orderid}'");
		}
	}
	}
	$orderid=strlen($orderid)==20 ? substr($orderid,0,16) : $orderid;
	require View::getView('card');
	View::Output();
}

function getOrderNum(){
    $y=date('Y');
	$m=date('m');
	$d=date('d');
	$h=date('H');
	$i=date('i');
	$s=date('s');
	$r=mt_rand(100000,999999);
	return $y.$m.$d.$h.$i.$s.$r;
}

function getRates($userid,$cateid,$goodid,$channelid){	
	$ratevalue=100;
	$rate=new Rates_Model();
	$rates=$rate->getData("WHERE userid=$userid");
	if($rates){
		foreach($rates as $key=>$val){
			if($goodid && $val['goodid']==$goodid && $val['channelid']==$channelid){
				return $val['rate'];break;
			}
		}

		foreach($rates as $key=>$val){
			if($cateid && $val['cateid']==$cateid && $val['channelid']==$channelid){
				return $val['rate'];break;
			}
		}

		foreach($rates as $key=>$val){
			if($val['goodid']==0 && $val['cateid']==0 && $val['channelid']==$channelid){
				return $val['rate'];break;
			}
		}
	}
	return $ratevalue;
}
?>