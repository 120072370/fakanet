<?php
require_once 'common.php';

$action=_G('action');
$do=_G('do');
$ob=new OrdersAnalysis_Model();

$cons="userid=".$_SESSION['login_userid']." AND is_status<>0 AND is_status<>4";	

$fdate=_G('fdate');
$tdate=_G('tdate');
$cateid=_G('cateid','int');
$channelid=_G('channelid','int');
$orderid=_G('orderid');
$goodid=_G('goodid','int');

if(!$fdate || !$tdate){
    $fdate=$tdate=date('Y-m-d');
}

if($fdate<>''){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)>='".$fdate."'";
}

if($tdate<>''){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)<='".$tdate."'";
}

if($cateid!='' && $goodid==''){
    $cons.=$cons!='' ? " AND goodid in(SELECT id FROM ".DB_PREFIX."goodlist WHERE cateid=$cateid)" : '';
}

if($goodid!=''){
    $cons.=$cons!='' ? " AND goodid = $goodid" : '';
}

if($channelid!=''){
    $cons.=$cons!='' ? " AND channelid = $channelid" : '';
}

if($orderid!=''){
    $cons.=$cons!='' ? " AND orderid='$orderid'" : '';
}

if($action==''){
	$title='收益统计';
	$cons=$cons=='' ? '' : "WHERE {$cons}";

	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$offset=($page-1)*$pagesize;

	$db=Mysql::getInstance();
	$lists=array();

	$result=$db->query("SELECT id FROM ".DB_PREFIX."buylist $cons");
	$totalsize=$db->num_rows($result);

	if($do=='export'){
		$data='';
	    $result=$db->query("SELECT goodid,orderid,is_receive,channelid,quantity,addtime,price,cbprice,is_status,is_coupon_state,is_discount_state,pwdforsearch FROM ".DB_PREFIX."buylist $cons ORDER BY id DESC");
	} else {
	    $result=$db->query("SELECT goodid,orderid,is_receive,channelid,quantity,addtime,price,cbprice,is_status,is_coupon_state,is_discount_state,pwdforsearch FROM ".DB_PREFIX."buylist $cons ORDER BY id DESC LIMIT $offset,$pagesize");
	}
	if($totalsize>0){
	    while($row=$db->fetch_array($result)){
			$row['quantity']=$row['is_status']==1 ? intval($row['quantity']) : 0;
			$row['quantity']=$row['is_receive']==1 ? intval($row['quantity']) : 0;
			$channelname=Channels_Model::getChannelnamebyChannelID($row['channelid']);
			$row['channelname']=$channelname ? $channelname : '-';
			$row['channelname']=$row['channelid']=='99999' ? '组合支付' : $row['channelname'];
			$row['is_discount']=$row['is_discount_state'];
			$row['is_coupon']=$row['is_coupon_state'];
			$row['is_api']=$row['is_api'];
			$row['is_pwdforsearch']=$row['pwdforsearch'] ? 1 : 0;
			$goodname=GoodList_Model::getGoodnamebyGoodID($row['goodid']);
			$row['goodname']=$goodname ? $goodname : '-';
			$row['goodprice']=$row['price'];
			$row['cbprice']=$row['cbprice'];

			//收入
			$res=$db->query("SELECT sum(realmoney*price),sum(money) FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND is_state=1 AND orderid LIKE '".$row['orderid']."%'");
			$row1=$db->fetch_array($res);
			$row['income']=$row1[0]==null ? 0 : $row1[0];
			$row['money']=$row1[1]==null ? 0 : $row1[1];
			
			$lists[]=$row;
			if($do=='export'){
				$l=number_format($row['income']-($row['cbprice']*$row['quantity']),2,'.','');
				$data.="".$goodname."\t".$row['quantity']."\t".$row['cbprice']."\t".$row['goodprice']."\t".$row['income']."\t".$l."\t".$row['channelname']."\t".$row['addtime']."\r\n";
			}
		}
	}

	//总统计
	$t_lists=array();
    $result=$db->query("SELECT orderid,is_receive,quantity,price,cbprice,is_status FROM ".DB_PREFIX."buylist $cons");
	$totalsize=$db->num_rows($result);
	if($totalsize>0){
	    while($row=$db->fetch_array($result)){
			$row['quantity']=$row['is_status']==1 ? intval($row['quantity']) : 0;
			$row['quantity']=$row['is_receive']==1 ? intval($row['quantity']) : 0;
			$row['goodprice']=$row['price'];
			$row['cbprice']=$row['cbprice'];
			//收入
			$res=$db->query("SELECT sum(realmoney*price),sum(money) FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND is_state=1 AND orderid LIKE '".$row['orderid']."%'");
			$row1=$db->fetch_array($res);
			$row['income']=$row1[0]==null ? 0 : $row1[0];
			$row['money']=$row1[1]==null ? 0 : $row1[1];
			
			$t_lists[]=$row;
		}
	}

	if($do=='export'){
        $content="商品名称\t数量\t进价\t面额\t收入\t利润\t支付方式\t下单时间\r\n";
        $filename='收益统计_'.date('Y').date('m').date('d').'.xls';
		$content.=$data;
        exportFile($filename,$content);
    }


	$totalpage=ceil($totalsize/$pagesize);
	$pagelist=getpagelist('?do='.$do.'&cateid='.$cateid.'&channelid='.$channelid.'&orderid='.$orderid.'&fdate='.$fdate.'&tdate='.$tdate.'&p=',$page,$totalpage,$totalsize,$pagesize);

	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);

	$cache=Cache::getInstance();
	$channelList=$cache->get('channelList');
	require View::getView("header");
	require View::getView("analyforuser");
	require View::getView("footer");
	View::Output();
}

if($action=='getgoodlist'){
    $cateid=_G('cateid','int');
	$goodid=_G('goodid','int');
	$good=new GoodList_Model();
	$goodList=$good->getAllData($_SESSION['login_userid']);
	$data='';
	if($goodList){
	    foreach($goodList as $key=>$val){
		    if($val['cateid']==$cateid){
				$selected=$val['id']==$goodid ? 'selected' : '';
			    $data.='<option value="'.$val['id'].'" '.$selected.'>'.$val['goodname'].'</option>';
			}
		}
	}

	echo $data ? '<select name="goodid"><option value="">请选择</option>'.$data.'</select>' : '';
	exit;
}