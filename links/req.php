<?php
require_once '../init.php';
define('VIEW_PATH',WY_ROOT.'/lin/default/');
$userid=_P('userid','int');
$goodid=_P('goodid','int');
$quantity=_P('quantity','int');
$contact=_P('contact');
$is_email=_P('isemail','int');
$is_email=$is_email==false ? 0 : 1;
$is_coupon=_P('is_coupon','int');
$is_coupon=$is_coupon==false ? 0 : 1;
$couponcode=_P('couponcode');
$email=_P('email');
$paytype=_P('paytype');
$pid=_P('pid');
$api_username=_P('api_username');

if(!$userid || !$goodid || !$contact || !$paytype || !$pid || ($is_email && $email=='') || ($is_coupon && $couponcode=='')){
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
	$goodname=$goodList['goodname'];
	$cbprice=$goodList['cbprice'];
	$danjia=$price=$goodList['price'];
	$is_discount=$goodList['is_discount'];
	$cateid=$goodList['cateid'];
	$is_api=$goodList['is_api'];
	$is_pwdforsearch=$goodList['is_pwdforsearch'];
	$limit_quantity=$goodList['limit_quantity'];
	$uid=$goodList['userid'];

} else {
    echo "<script>alert('params error!');parent.$.nyroModalRemove(); </script>";
	exit;
}

if($userid!=$uid){
    echo "<script>alert('params error!');parent.$.nyroModalRemove(); </script>";
	exit;
}

$is_pwdforsearch2=_P('is_pwdforsearch','int');
$pwdforsearch=$is_pwdforsearch ? _P('pwdforsearch'.$is_pwdforsearch) : '';
if(($is_pwdforsearch==1 || $is_pwdforsearch2==1) && !$pwdforsearch){
    echo "<script>alert('请填写取卡密码!');parent.$.nyroModalRemove(); </script>";
	exit;  
}
$pwdforsearch=$is_pwdforsearch2==1 ? $pwdforsearch : ($is_pwdforsearch==1 ? $pwdforsearch : '');

if(!$quantity && !$limit_quantity){
    echo "<script>alert('params error!');parent.$.nyroModalRemove(); </script>";
	exit;   
}
$quantity=$limit_quantity ? $limit_quantity : $quantity;

$is_discount_state=0;
if($is_discount){
	$discount=$danjia;	
	$dis=new GoodDiscount_Model();
	$goodDiscount=$dis->getData("WHERE goodid=$goodid ORDER BY dis_quantity DESC");
	if($goodDiscount){
		//uasort($goodDiscount,'my_compare');
	    foreach($goodDiscount as $key=>$val){
		    if($quantity>=$val['dis_quantity'] && $val['dis_quantity']>0){
			    $discount=$val['dis_price'];
				$is_discount_state=1;
				break;
			}
		}
	}
	$danjia=$discount;
}

$coupon=0;
$is_coupon_state=0;
if($is_coupon){
	$ctype=0;
	$coupon=0;	
    $db=Mysql::getInstance();
	$result=$db->query("SELECT ctype,coupon FROM ".DB_PREFIX."goodcoupon WHERE couponcode='".$couponcode."' AND is_state=0 AND userid=$userid LIMIT 1");
	if($db->num_rows($result)==1){
	    $row=$db->fetch_array($result);
		$ctype=$row['ctype'];
		$coupon=$row['coupon'];
		$is_coupon_state=1;
	}

	if($ctype==1){
		$coupon=$coupon;
	} else if($ctype==100){
		$coupon=$danjia*$coupon/100;
	}
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

if(!isset($accessType)){
    echo "<script>alert('此支付方式未开通！请选择其他支付方式！');parent.$.nyroModalRemove(); </script>";
	exit;
}

//get is_getgood
$is_getgood=0;
$user=new Users_Model();
$users=$user->getOneData($userid);
if($users){
	$is_getgood=$users['is_getgood'];
	$userkey=$users['userkey'];
}

//get paymoney
$rate=getRates($userid,$cateid,$goodid,$channelid);
$paymoney=number_format($danjia*$quantity/$rate*100-$coupon,2,'.','');
$paymoney=$paytype=='card' ? ceil($paymoney) : $paymoney;

$is_status=$coupon>0 ? 2 : 0;
//create buylist
$orderid=getRandomString(16);
$addtime=date('Y-m-d H:i:s');
$db=Mysql::getInstance();
$db->query("INSERT INTO ".DB_PREFIX."buylist(userid,goodid,orderid,price,quantity,channelid,contact,addtime,is_email,email,couponcode,cbprice,fromip,coupon,is_coupon_state,is_discount_state,is_status,is_api,api_username,pwdforsearch) VALUES($userid,$goodid,'$orderid',$danjia,$quantity,$channelid,'$contact','$addtime',$is_email,'$email','$couponcode',$cbprice,'"._S('REMOTE_ADDR')."',$coupon,$is_coupon_state,$is_discount_state,$is_status,$is_api,'$api_username','$pwdforsearch')");

//write cookie
$myorders=_C('myorders');
if($myorders){
	$myorders_arr=strpos($myorders,'|') ? explode('|',$myorders) : array();
	if(count($myorders_arr)>50){
		$myorders=implode('|',array_splice($myorders_arr,0,49));
	}
}
$data=$orderid;
$data.=$myorders ? '|'.$myorders : '';

setcookie('myorders',$data,time() + 60 * 60 * 24 * 30 * 12,'/');

//update coupon
if($is_coupon && $coupon){	
	$db->query("UPDATE ".DB_PREFIX."goodcoupon SET is_state=1,updatetime='".date('Y-m-d H:i:s')."' WHERE userid=$userid AND couponcode='$couponcode'");
    $db->query("INSERT INTO ".DB_PREFIX."orderlist(orderid,money,realmoney,channelid,is_state,is_pay,price,rates,addtime) VALUES('$orderid',$coupon,$coupon,0,1,1,1,100,'".date('Y-m-d H:i:s')."')");
}

if($paytype=='bank' || $paytype=='alipay' || $paytype=='tenpay'|| $paytype=='weixin'|| $paytype=='ALIWAP'|| $paytype=='QQCODE'){

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
	for($i=0;$i<$count;$i++){
	    $cardvalue=makeSafe($cardsvalue[$i],'int');
		$cardnum=makeSafe($cardsnum[$i]);
		$cardpwd=makeSafe($cardspwd[$i]);
		$payorderid=getOrderNum();
		$result=$db->query("SELECT COUNT(*) FROM ".DB_PREFIX."orderlist WHERE orderid='$orderid' AND cardnum='$cardnum'");
		$row=$db->fetch_array($result);
		$total_nums=$row[0]==null ? 0 : $row[0];
		if($total_nums==0){
			$db->query("INSERT INTO ".DB_PREFIX."orderlist(orderid,payorderid,money,rates,cardnum,cardpwd,channelid,addtime) VALUES('$orderid','$payorderid',$cardvalue,$rate,'$cardnum','$cardpwd',$channelid,'".date('Y-m-d H:i:s')."')");

			$cardnums=$cardnums!='' ? $cardnums.','.$cardnum : $cardnum;
			$cardpwds=$cardpwds!='' ? $cardpwds.','.$cardpwd : $cardpwd;
			$cardvalues=$cardvalues!='' ? $cardvalues.','.$cardvalue : $cardvalue;
			$payorderids=$payorderids!='' ? $payorderids.','.$payorderid : $payorderid;
		}
	}


	//create redirect url
	$redirectUrl='http://'._S('HTTP_HOST').'/pay/'.$accessType.'_card/send_'.$accessType.'.php';
	$params=array('price'=>$paymoney,'orderid'=>$orderid,'pid'=>$pid,'cardvalue'=>$cardvalues,'cardnum'=>$cardnums,'cardpwd'=>$cardpwds,'payorderid'=>$payorderids);

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
			$db->query("UPDATE ".DB_PREFIX."buylist SET returnmsg='{$returnMsg}' WHERE orderid='{$neworderid}'");
		}
	}
	}
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
	return $ratevalue==0 ? 100 : $ratevalue;
}
?>