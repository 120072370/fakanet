<?php
require_once '../init.php';
$action=_P('action');
if($action=='getgoodList'){
	$cateid=_P('cateid','int');
	$options='';
    $good=new GoodList_Model();
	$goodList=$good->getAllData($cateid,'cateid');
	if($goodList){
	    foreach($goodList as $key=>$val){
		    if($val['is_state'] && !$val['is_join_main_link']){
		    	$have_mima=empty($val['mima'])?0:1;
			    $options.='<option value="'.$val['id'].'" data-mima="'.$have_mima.'">'.$val['goodname'].'</option>';
			}
		}
	}
	echo $options=='' ? 'ok' : $options;
	exit;
}

if($action=='getgoodRemark'){
	$goodid=_P('goodid','int');
	$good=new GoodList_Model();
	$goodList=$good->getOneData($goodid);
	$goodList['remark']=html_entity_decode($goodList['remark']);
	header("Content-Type:application/json; charset=utf-8");
	echo json_encode($goodList);
	die;
}



if($action=='getgoodInfo'){
	$goodid=_P('goodid','int');
	$price=0;
	$goodInvent=0;
	$is_invent=1;
	$is_discount=0;
	$is_coupon=0;
	$is_pwdforsearch=0;
	$limit_quantity=0;

    $good=new GoodList_Model();
	$goodList=$good->getOneData($goodid);
	if($goodList){
		$price=$goodList['price'];
		$is_invent=$goodList['is_invent'];
		$is_discount=$goodList['is_discount'];
		$is_coupon=$goodList['is_coupon'];
		$userid=$goodList['userid'];
		$is_pwdforsearch=$goodList['is_pwdforsearch'];
		$limit_quantity=$goodList['limit_quantity'];
	}

	if($is_invent==0){
		$user=new Users_Model();
	    $users=$user->getOneData($userid);
		$is_invent=$users['is_invent'];
	}
	//get goodinvent
	$ob=new Goods_Model();
	$kucun=$ob->getDataNum("WHERE goodid=$goodid AND is_state=0");
    if($is_invent==2){
	    if($kucun>=100) $goodInvent='<span style="color:green">库存非常多</span>';
		if($kucun<100 && $kucun>=30) $goodInvent='<span style="color:green">库存很多</span>';
		if($kucun<30 && $kucun>10) $goodInvent='<span style="color:blue">库存一般</span>';
		if($kucun<=10 && $kucun>0) $goodInvent='<span style="color:red">库存少量</span>';
		if($kucun==0) $goodInvent='<span style="color:red">无库存</span>';
	} else {
	    $goodInvent='<span style="color:green">库存'.$kucun.'张</span>';
	}
	echo $price.','.$goodInvent.'<input type="hidden" name="kucun" value="'.$kucun.'">,'.$is_discount.','.$is_coupon.','.$is_pwdforsearch.','.$limit_quantity;
	exit;
}

if($action=='getrate'){
    $userid=_P('userid','int');
	$cateid=_P('cateid','int');
	$goodid=_P('goodid','int');
	$channelid=_P('channelid');
	$cache=Cache::getInstance();
 
	$channelList=$cache->get('channelList');
	if($channelList){
		foreach($channelList as $key=>$val){
			if(($val['payid']==24 && $channelid=='bank') || ($val['payid']==25 && $channelid=='ALIPAY') || ($val['payid']==27 && $channelid=='WEIXIN') || ($val['payid']==28 && $channelid=='ALIWAP') || ($val['payid']==29 && $channelid=='QQCODE') || ($val['payid']==26 && $channelid=='TENPAY')){
				$channelid=$val['id'];
				break;
			}
		}
	}

	if($channelid==0){
	    echo '100';
		exit;
	}

	$db=Mysql::getInstance();
	if($goodid){
	    $result=$db->query("SELECT rate FROM ".DB_PREFIX."rates WHERE channelid=$channelid AND userid=$userid AND goodid=$goodid LIMIT 1");
		if($db->num_rows($result)==1){
			$row=$db->fetch_array($result);
		    echo $row[0];
			exit;
		} else {
			$good=new GoodList_Model();
		    $goodList=$good->getOneData($goodid);
			$cateid=$goodList['cateid'];
		}
	}

	if($cateid){
	    $result=$db->query("SELECT rate FROM ".DB_PREFIX."rates WHERE channelid=$channelid AND userid=$userid AND cateid=$cateid LIMIT 1");
		if($db->num_rows($result)==1){
			$row=$db->fetch_array($result);
		    echo $row[0];
			exit;
		}
	}

	$result=$db->query("SELECT rate FROM ".DB_PREFIX."rates WHERE channelid=$channelid AND userid=$userid AND cateid=0 AND goodid=0 LIMIT 1");
	if($db->num_rows($result)==1){
		$row=$db->fetch_array($result);
		echo $row[0];
		exit;
	}

	echo 100;
	exit;
}

if($action=='getpaycardinfo'){
    $channelid=_P('channelid','int');
	$cache=Cache::getInstance();
	$options='';
	$cardname='';
	$cardprice='';
	$payid=0;
	$channelList=$cache->get('channelList');
	if($channelList){
	    foreach($channelList as $key=>$val){
		    if($val['id']==$channelid){
			    $payid=$val['payid'];
				break;
			}
		}
	}

	$pay=$cache->get('pay');
	if($pay){
	    foreach($pay as $key=>$val){
		    if($val['payid']==$payid){
			    $cardname=$val['payname'];
				$cardprice=$val['payprice'];
				break;
			}
		}
	}

	if($cardname!='' && $cardprice!=''){
	    $arr=explode('|',$cardprice);
		foreach($arr as $price){
		    $options.='<option value="'.$price.'">'.$price.'元面值</option>';
		}
	}

	echo $options;
	exit;
}

if($action=='getorderstatus'){
    $orderid=_P('orderid');
	if($orderid==''){
	    echo 'error';
		exit;
	}
	$orderid=strlen($orderid)==20 ? substr($orderid,0,16) : $orderid;
	$db=Mysql::getInstance();
	$is_status=0;
	$result=$db->query("SELECT is_status FROM ".DB_PREFIX."buylist WHERE orderid='{$orderid}'");
	if($db->num_rows($result)>0){
	    $row=$db->fetch_array($result);
		$is_status=$row['is_status'];
	}
	echo $is_status;
	exit;
}

if($action=='getDiscount'){
    $goodid=_p('goodid','int');
	$quantity=_p('quantity','int');
	$newprice=0;
	$discount=new GoodDiscount_Model();
	$goodDiscount=$discount->getData("WHERE goodid=$goodid ORDER BY dis_quantity DESC");
	if($goodDiscount){
		//uasort($goodDiscount,'my_compare');
		//print_r($goodDiscount);exit;
	    foreach($goodDiscount as $key=>$val){
		    if($quantity>=$val['dis_quantity'] && $val['dis_quantity']>0){
			    $newprice=$val['dis_price'];
				break;
			}
		}
	}

	if($newprice<=0){
		$good=new GoodList_Model();
	    $goodList=$good->getOneData($goodid);
		$newprice=$goodList['price'];
	} 
	
	if($newprice>0){
	    echo $newprice;
		exit;
	}
}

if($action=='checkCoupon'){
    $couponcode=_P('couponcode');
	$userid=_P('userid','int');
	$ob=new GoodCoupon_Model();
	$data=$ob->getCoupon($couponcode,$userid);
	if(!$data){
	    echo 'err|优惠券不存在或已过期!';
		exit;
	}

	$day=ceil((strtotime(date('Y-m-d H:i:s'))-strtotime($data['addtime']))/60/60/24);
	if($data['valid']<$day){
	    echo 'err|优惠券已过期!';
		exit;
	}

	echo 'ok|'.$data['coupon'].','.$data['ctype'];
	exit;
}

if($action=='getCardLength'){
    $channelid=_P('channelid','int');
	$paylength='0|0';
	$payid=0;
	$cache=Cache::getInstance();
	$pay=$cache->get('pay');
	$channelList=$cache->get('channelList');
	foreach($channelList as $key=>$val){
	    if($val['id']==$channelid){
		    $payid=$val['payid'];
		    break;
		}
	}

	foreach($pay as $key=>$val){
	    if($val['payid']==$payid){
		    $paylength=$val['paylength'];
		    break;
	    }
    }
	echo $paylength;
	exit;
}
//验证购买密码
/*
if($action=='CheckPwdforbuy'){
	$id=_P('goodid');
	$pwd=md5(_P('pwd'));
	$have=$wddb->getone("select id from ".DB_PREFIX."goodlist where id='".$id."' and mima='".$pwd."'");
	if($have>0){
		ob_clean();
	   echo 'ok';die;
	}
    
}*/
?>