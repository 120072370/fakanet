<?php
require_once 'common.php';

$action=_G('action');
if($action==''){
	$goodid=_G('goodid','int');
	$cateid='';
	$goodname='';
	$st='';
    $kw='';
	$cons="userid=".$_SESSION['login_userid']." AND is_status<>0 AND is_status<>4";
	$do=_G('do');
	if($do=='search'){
	    $cateid=_G('cateid','int');
		$st=_G('st');
		$kw=_G('kw');
	}
    
	if($cateid!=''){
	    $cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="goodid in(SELECT id FROM ".DB_PREFIX."goodlist WHERE cateid=$cateid)";
	}

	if($goodid!=''){
	    $cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="goodid=$goodid";
	}

	if($st!='' && $kw!=''){
		switch($st){
			case 'st1':
				$cons.=" AND orderid='$kw'";
			break;
			case 'st2':
				$cons.=" AND orderid=(SELECT orderid FROM ".DB_PREFIX."orderlist WHERE cardnum='$kw')";
			break;
			case 'st3':
				$cons.=" AND contact='$kw'";
			break;
			case 'st4':
				$cons.=" AND orderid in(SELECT S.orderid FROM ".DB_PREFIX."selllist AS S,".DB_PREFIX."goods AS G WHERE S.cardid=G.id AND G.userid=".$_SESSION['login_userid']." AND G.cardnum='".$kw."')";
			break;
			default:
				$cons.=" AND orderid='$kw'";
		}
	}

	$cons=$cons!='' ? "WHERE ".$cons." ORDER BY addtime DESC" : '';

	$title='最近卖出卡密';
	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);

	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$offset=($page-1)*$pagesize;

	$db=Mysql::getInstance();
	$lists=array();

	$result=$db->query("SELECT id FROM ".DB_PREFIX."buylist $cons");
	$totalsize=$db->num_rows($result);

	$result=$db->query("SELECT addtime,goodid,quantity,contact,channelid,orderid,is_status,is_receive,is_coupon_state,is_discount_state,pwdforsearch FROM ".DB_PREFIX."buylist $cons LIMIT $offset,$pagesize");
	$totalpage=ceil($totalsize / $pagesize);
	if($totalsize>0){
		//$goodList=new GoodList_Model();
	    while($row=$db->fetch_array($result)){
			//金额和收入
			//$data=$goodList->getOneData($row['goodid']);
			$res=$db->query("SELECT sum(realmoney),sum(realmoney*price) FROM ".DB_PREFIX."orderlist WHERE is_state=1 AND orderid LIKE '".$row['orderid']."%'");
			$row2=$db->fetch_array($res);
			$realmoney=$row2[0]==null ? 0 : $row2[0];
			$income=$row2[1]==null ? 0 : $row2[1];

			$channelname=Channels_Model::getChannelnamebyChannelID($row['channelid']);
			$channelname=$channelname ? $channelname : '-';
			$channelname=$row['channelid']==99999 ? '组合支付' : $channelname;
			$row['channelname']=$channelname;
			$row['realmoney']=$realmoney;
			$row['income']=$income;
			$goodname=GoodList_Model::getGoodnamebyGoodID($row['goodid']);
			$row['is_discount']=$row['is_discount_state'];
			$row['is_coupon']=$row['is_coupon_state'];
			$row['is_api']=$row['is_api'];
			$row['is_pwdforsearch']=$row['pwdforsearch'] ? 1 : 0;
			$row['goodname']=$goodname ? $goodname : '-';
			$lists[]=$row;
		}
	}

	//统计昨日和今日售出条数
	$result=$db->query("SELECT count(*) FROM ".DB_PREFIX."buylist WHERE userid=".$_SESSION['login_userid']." AND is_status=1 AND date(addtime)='".date('Y-m-d')."'");
	$row=$db->fetch_array($result);
	$today_total_quantity=$row[0]==null ? 0 : $row[0];

	$result=$db->query("SELECT count(*) FROM ".DB_PREFIX."buylist WHERE userid=".$_SESSION['login_userid']." AND is_status=1 AND date(addtime)='".date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y')))."'");
	$row=$db->fetch_array($result);
	$yestoday_total_quantity=$row[0]==null ? 0 : $row[0];

	$pagelist=getpagelist('?cateid='.$cateid.'&goodid='.$goodid.'&st='.$st.'&kw='.$kw.'&do='.$do.'&p=',$page,$totalpage,$totalsize,$pagesize,2,5);
    require View::getView('header');
	require View::getView('goodSell');
	require View::getView('footer');
	View::Output();
}

if($action=='getgoodinfo'){
    $orderid=_G('orderid');
	$db=Mysql::getInstance();

	$result=$db->query("SELECT pwdforsearch FROM ".DB_PREFIX."buylist WHERE orderid='$orderid' LIMIT 1");
	$row=$db->fetch_array($result);
	$pwdforsearch=$row[0];

	$cards='';
	$flag=false;
	$result=$db->query("SELECT cardid FROM ".DB_PREFIX."selllist WHERE orderid='".$orderid."'");
	if($db->num_rows($result)>0){
	    while($row=$db->fetch_array($result)){
		    $res=$db->query("SELECT cardnum,cardpwd FROM ".DB_PREFIX."goods WHERE id=".$row['cardid']." LIMIT 1");
			if($db->num_rows($res)==1){
				$flag=true;
			    $row2=$db->fetch_array($res);
				$cards.='卡号：'.$row2['cardnum'].''."<br />";
				$cards.=$row2['cardpwd']=='' ? '' : '卡密：'.$row2['cardpwd'].''."<br />";
			}
		}
	} else {
		$flag=false;
	    $cards='卡密还没有提取，您可以 <a href="../orderquery.htm?orderid='.$orderid.'" class="blue" target="_blank">立即提取</a> 卡密';
	}

	//$cards.=$pwdforsearch ? '<br>取卡密码：'.$pwdforsearch : '';

	require View::getView('getgoodinfo');
	View::Output();
}

if($action=='export'){
	if(!$_SESSION['login_user_safe_key']){
		$t='1';
		$wyt='';
	    $url=_S('HTTP_REFERER');
		require View::getView('header');
		require View::getView('safepwd');
		require View::getView('footer');
		View::Output();
		exit;
	}
	$cateid=_G('cateid','int');
	$goodid=_G('goodid','int');
	$st=_G('st');
	$kw=_G('kw');
	$cons="userid=".$_SESSION['login_userid']." AND is_status<>0";
	
	if($cateid){
	    $cons.=" AND goodid in(SELECT id FROM ".DB_PREFIX."goodlist WHERE cateid=".$cateid.")";
	}

	if($goodid){
	    $cons.=" AND goodid=".$goodid."";
	}

	if($st && $kw){
		switch($st){
			case 'st1':
				$cons.=" AND orderid='$kw'";
			break;
			case 'st2':
				$cons.=" AND orderid=(SELECT orderid FROM ".DB_PREFIX."orderlist WHERE cardnum='$kw')";
			break;
			case 'st3':
				$cons.=" AND contact='$kw'";
			break;
			default:
				$cons.=" AND orderid='$kw'";
		}
	}

	$cons=$cons ? "WHERE ".$cons." ORDER BY addtime DESC" : '';

	$lists=array();
	$db=Mysql::getInstance();
	$result=$db->query("SELECT addtime,goodid,quantity,contact,channelid,orderid,is_status FROM ".DB_PREFIX."buylist $cons");
	if($db->num_rows($result)>0){
	    while($row=$db->fetch_array($result)){
			//金额和收入
			$res=$db->query("SELECT sum(realmoney),sum(realmoney*price) FROM ".DB_PREFIX."orderlist WHERE is_state=1 AND orderid LIKE '".$row['orderid']."%'");
			$row2=$db->fetch_array($res);
			$realmoney=$row2[0]==null ? 0 : $row2[0];
			$income=$row2[1]==null ? 0 : $row2[1];

			//卡密信息
			$cards='';
			$res=$db->query("SELECT cardnum,cardpwd FROM ".DB_PREFIX."goods WHERE id in(SELECT cardid FROM ".DB_PREFIX."selllist WHERE orderid='".$row['orderid']."')");
			if($db->num_rows($res)>0){
			    while($row2=$db->fetch_array($res)){
					$cardpwd=$row2['cardpwd'] ? " 卡密：".$row2['cardpwd']."" : "";
				    $cards.=$cards ? "卡号：".$row2['cardnum'].$cardpwd."" : "卡号：".$row2['cardnum'].$cardpwd."";
				}
			}

			$row['cards']=$cards;
			$row['channelname']=Channels_Model::getChannelnamebyChannelID($row['channelid']);
			$row['realmoney']=$realmoney;
			$row['income']=$income;
			$goodname=GoodList_Model::getGoodnamebyGoodID(intval($row['goodid']));
			$row['goodname']=$goodname ? $goodname : '-';
			$lists[]=$row;
		}
	}

    $content="时间\t订单号\t商品名称\t卡密信息\t支付方式\t购买者信息\t金额\t分成\r\n";
	$data='';
	if($lists){
		foreach($lists as $key=>$val){
			$data.="".$val['addtime']."\t".$val['orderid']."\t".$val['goodname']."\t".$val['cards']."\t".$val['channelname']."\t".$val['contact']."\t".$val['realmoney']."\t".$val['income']."\r\n";			
		}
	}

	$content.=$data;

	$filename='最卡卖卡密信息_'.date('Y').date('m').date('d').'.xls';

    exportFile($filename,$content);
}
?>