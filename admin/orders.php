<?php
require_once 'common.php';

$action=_G('action');
$do=_G('do');
$ob=new Orders_Model();

$searchtype='';
$searchtext='';
$channelid='';
$is_status='';
$is_receive='';
$fdate=$tdate=date('Y-m-d');
$cons='';
$t4_cons='';
$is_api='';
$is_ship='';
	
if($do=='search'){
    $searchtype=_G('searchtype');
    $searchtext=_G('searchtext');
	$fdate=_G('fdate');
	$tdate=_G('tdate');
	$channelid=_G('channelid','int');
	$is_status=_G('is_status');
	$is_receive=_G('is_receive');
	$is_api=_G('is_api');
	$fdate=$fdate==false ? date('Y-m-d') : $fdate;
	$tdate=$tdate==false ? date('Y-m-d') : $tdate;
	$is_ship=_G('is_ship');
}

if($searchtext<>''){
    $cons=$cons=='' ? '' : $cons.' AND ';
    switch($searchtype){
      case 't0':
		  $userid=Users_Model::getUserIDbyUsername($searchtext) ? Users_Model::getUserIDbyUsername($searchtext) : 0;
          $cons.="userid=".$userid."";
      break;
      case 't2':
          $searchtext=strlen($searchtext)==20 ? substr($searchtext,0,16) : $searchtext;
	      $cons.="orderid='{$searchtext}'";
      break;
      case 't3':
          $cons.="contact='{$searchtext}'";
      break;
      case 't4':
          $t4_cons.="INNER JOIN (SELECT orderid FROM ".DB_PREFIX."orderlist WHERE cardnum<>'' AND cardnum = '".$searchtext."' order by id desc  limit 1) B ON (A.orderid=B.orderid))";
	  break;
      case 't5':
          $cons.="fromip='{$searchtext}'";
      break;
	  case 't6':
		  $cons.="orderid in(SELECT orderid FROM ".DB_PREFIX."selllist WHERE cardid in(SELECT id FROM ".DB_PREFIX."goods WHERE cardnum='$searchtext'))";
	  break;
      default:
          $cons.="orderid='{$searchtext}'";
      }
}

if($is_status!=''){
    switch($is_status){
	    case 's1': $is_status1=0;break;
		case 's2': $is_status1=2;break;
		case 's3': $is_status1=1;break;
		case 's4': $is_status1=4;break;
		default: $is_status1=1;
	}

	$cons=$cons!='' ? $cons." AND " : '';
	$cons.="is_status=$is_status1";
}

if($is_api!=''){
    $cons.=$cons ? ' AND ' : '';
	$cons.=$is_api=='a0' ? "is_api=0" : 'is_api=1';
}

if($is_ship!=''){
    $cons.=$cons ? ' AND ' : '';
	$cons.=$is_ship=='a0' ? "is_ship=0" : 'is_ship=1';
}

if($channelid && $channelid!=0){
	if($cons<>'') $cons.=' AND ';
	if($channelid=='999999'){
		$cons .="is_coupon_state=1";
	} elseif($channelid=='9999999'){
		$cons .="is_discount_state=1";
	} else {
		$cons .="channelid=".$channelid."";
	}
}

if($fdate<>'' && isDate($fdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)>='".$fdate."'";
}

if($tdate<>'' && isDate($tdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)<='".$tdate."'";
}

if($is_receive){
	if($cons<>'') $cons.=' AND ';
	$cons .="is_receive=0 AND is_status=1"; 
}

if($action==''){
	$page=_G('p','int');
	if($page==false || $page==0) $page=1;
	$pagesize=20;
	$cons=$cons=='' ? '' : "WHERE {$cons} ORDER BY addtime DESC";
	$offset=($page-1)*$pagesize;
	$db=Mysql::getInstance();

    $result=$db->query("SELECT count(*) FROM ".DB_PREFIX."buylist A $t4_cons $cons");
	$row=$db->fetch_array($result);
	$totalsize=$row[0];
	$lists=array();
	$result=$db->query("SELECT * FROM ".DB_PREFIX."buylist A $t4_cons $cons LIMIT $offset,$pagesize");
    if($totalsize>0){
	    while($row=$db->fetch_array($result)){
		    $channelname=Channels_Model::getChannelnamebyChannelID($row['channelid']);
			$row['channelname']=$channelname ? $channelname : '-';
			$row['channelname']=$row['channelid']=='99999' ? '组合支付' : $row['channelname'];
			$row['goodname']=GoodList_Model::getGoodnamebyGoodID($row['goodid']);
			$row['username']=Users_Model::getUsernamebyUserID($row['userid']);
			//金额
			$res=$db->query("SELECT sum(money),sum(realmoney),sum(realmoney*price),sum(realmoney*(platformPrice)) FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND orderid LIKE '".$row['orderid']."%'");
			$row2=$db->fetch_array($res);
			$row['total_money']=$row2[0];
			$row['success_money']=$row2[1];
			$row['income_money']=$row2[2];
			$row['platformincome_money']=$row2[3];
			$row['contact']=htmlspecialchars($row['contact']);
		    $lists[]=$row;
		}
	}

	$totalpage=ceil($totalsize / $pagesize);
	$pagelist=getpagelist('?searchtype='.$searchtype.'&searchtext='.$searchtext.'&is_status='.$is_status.'&channelid='.$channelid.'&fdate='.$fdate.'&tdate='.$tdate.'&is_receive='.$is_receive.'&is_api='.$is_api.'&is_ship='.$is_ship.'&do='.$do.'&p=' , $page , $totalpage , $totalsize);
    
	//get channels
	$Cache=Cache::getInstance();
	$channels=$Cache->get('channelList');
	require View::getView("header");
	require View::getView("orders");
	require View::getView("footer");
	View::Output();
}
	
if($action=='del'){
	$id=_G('id','int');
	$id=$id==false ? 1 : $id;
	$ob->deleteData($id);
	echo 'ok';
	exit;
}
	
if($action=='delall'){
	$ids=array();
	if(isset($_POST['listid'])) $ids=$_POST['listid'];
	if(count($ids)==0) redirect("?del_err=true");
		foreach($ids as $id){
			$ob->deleteData(intval($id));
		}
	redirect('?del_suc=true');
}

if($action=='refound'){
    $orderid=_G('orderid');
	$t=_G('t','int');
    if($orderid){
		$db=Mysql::getInstance();
		
		if($db->affected_rows()>0){

			//更新商户收入
			$result=$db->query("SELECT (select userid from ".DB_PREFIX."buylist WHERE orderid = '".$orderid."') as userid,sum(realmoney*price) as income FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND orderid LIKE '".$orderid."%'");
			$row=$db->fetch_array($result);
			$income=$row['income']==null ? 0 : $row['income'];			
			if($income>0){
                //查询当前是否有正在提现的操作

                $money_old=$wddb->getone("select unpaid from ".DB_PREFIX."usermoney where userid=".$row['userid']);
                $income = number_format($income,2,'.','');
		        if($money_old >= $income){
                    $db->query("UPDATE ".DB_PREFIX."usermoney SET unpaid=unpaid-$income WHERE userid=".$row['userid']."");
                }else{
                    $result=$wddb->getRow("select * from ".DB_PREFIX."payments where userid=".$row['userid']." and is_state = 0 order by addtime desc");
                    if($result){
                        if($result["money"] >0 && $result["money"] >$income){
                            $pid = $result["id"];
                            $db->query("UPDATE ".DB_PREFIX."payments SET money=money-$income WHERE id=$pid");
                        }
                        else
                        {
                            $msg='订单退款失败，余额不足！'.$result["money"];
                            $img='erro';
                            $url=_S('HTTP_REFERER');
                            require View::getView('header');
                            require View::getView('msg');
                            require View::getView('footer');
                            View::Output();
                            exit;
                        }
                    }else{
                        $msg='订单退款失败，余额不足！'.$result["money"];
                        $img='erro';
                        $url=_S('HTTP_REFERER');
                        require View::getView('header');
                        require View::getView('msg');
                        require View::getView('footer');
                        View::Output();
                        exit;
                    }
                    
                }
			}
            $db->query("UPDATE ".DB_PREFIX."buylist SET is_status=4 WHERE is_status=1 AND orderid='$orderid'");
			//销售的卡返回库存
			if($t){
				$result=$db->query("SELECT cardid FROM ".DB_PREFIX."selllist WHERE orderid='".$orderid."'");
				if($db->num_rows($result)){
					while($row=$db->fetch_array($result)){
					    $db->query("UPDATE ".DB_PREFIX."goods SET is_state=0 WHERE id=".$row[0]."");
					}
				}
			}

            $db->query("UPDATE ".DB_PREFIX."orderlist SET is_state=4,is_pay=0 WHERE is_pay=1 AND orderid='$orderid'");

			$msg='订单退款成功！';
			$img='success';
			$url=_S('HTTP_REFERER');
			require View::getView('header');
			require View::getView('msg');
			require View::getView('footer');
			View::Output();
		} else {
			$msg='订单退款失败！';
			$img='error';
			$url=_S('HTTP_REFERER');
			require View::getView('header');
			require View::getView('msg');
			require View::getView('footer');
			View::Output();
		}
	}
}

if($action=='restore'){
    $orderid=_G('orderid');
	$t=_G('t','int');
    if($orderid){
		$db=Mysql::getInstance();
		$db->query("UPDATE ".DB_PREFIX."buylist SET is_status=1 WHERE is_status=4 AND orderid='$orderid'");
		if($db->affected_rows()>0){
			//更新商户收入
			$result=$db->query("SELECT (select userid from ".DB_PREFIX."buylist WHERE orderid = '".$orderid."') as userid,sum(realmoney*price) as income FROM ".DB_PREFIX."orderlist WHERE channelid<>0 AND orderid LIKE '".$orderid."%'");
			$row=$db->fetch_array($result);
			$income=$row['income']==null ? 0 : $row['income'];			
			if($income>0){
			    $db->query("UPDATE ".DB_PREFIX."usermoney SET unpaid=unpaid+$income WHERE userid=".$row['userid']."");
			}
			//库存的卡标记出售
				$result=$db->query("SELECT cardid FROM ".DB_PREFIX."selllist WHERE orderid='".$orderid."'");
				if($db->num_rows($result)){
					while($row=$db->fetch_array($result)){
					    $db->query("UPDATE ".DB_PREFIX."goods SET is_state=$t WHERE id=".$row[0]."");
					}
				}

			$msg='订单恢复成功！';
			$img='success';
			$url=_S('HTTP_REFERER');
			require View::getView('header');
			require View::getView('msg');
			require View::getView('footer');
			View::Output();
		} else {
			$msg='订单恢复失败！';
			$img='error';
			$url=_S('HTTP_REFERER');
			require View::getView('header');
			require View::getView('msg');
			require View::getView('footer');
			View::Output();
		}
	}
}

if($action=='deldata'){
	$fdate=_G('fdate');
	$tdate=_G('tdate');
	$is_status=_G('is_status');
	$channelid=_G('channelid','int');
	$searchtype=_G('searchtype');
	$searchtext=_G('searchtext');
    $t='orders';
	$cache=Cache::getInstance();
	$channels=$cache->get('channelList');
	require View::getView('clearup');
	View::Output();
	exit;
}

if($action=='exedeldata'){
	$fdate=_P('fdate');
	$tdate=_P('tdate');
	$is_status=_P('is_status');
	$channelid=_P('channelid','int');
	$searchtype=_P('searchtype');
	$searchtext=_P('searchtext');
	$cons='';

	require View::getView('header');
	
	if($searchtext<>''){
		$cons=$cons=='' ? '' : $cons.' AND ';
		switch($searchtype){
		  case 't0':
			  $userid=Users_Model::getUserIDbyUsername($searchtext) ? Users_Model::getUserIDbyUsername($searchtext) : 0;
			  $cons.="userid=".$userid."";
		  break;
		  case 't2':
			  $cons.="orderid='{$searchtext}'";
		  break;
		  case 't3':
			  $cons.="contact='{$searchtext}'";
		  break;
		  case 't4':
			  $cons.="cardnum='{$searchtext}'";
		  break;
		  default:
			  $cons.="orderid='{$searchtext}'";
		  }
	}

	if($is_status!=''){
		switch($is_status){
			case 's1': $is_status1=0;break;
			case 's2': $is_status1=2;break;
			case 's3': $is_status1=1;break;
			case 's4': $is_status1=4;break;
			default: $is_status1=1;
		}
		$cons.=$cons ? " AND is_status=$is_status1" : "is_status=$is_status1";
	}

	if($channelid && $channelid!=0){
		if($channelid=='999999'){
		    $cons .=$cons ? " AND is_coupon_state=1" : "is_coupon_state=1";
		} elseif($channelid=='9999999'){
		    $cons .=$cons ? " AND is_discount_state=1" : "is_discount_state=1";
		} else {
		    $cons .=$cons ? " AND channelid=".$channelid."" : "channelid=".$channelid."";
		}
	}

	if($fdate<>'' && isDate($fdate)){
		$cons .=$cons ? " AND date(addtime)>='".$fdate."'" : "date(addtime)>='".$fdate."'";
	}

	if($tdate<>'' && isDate($tdate)){
		$cons .=$cons ? " AND date(addtime)<='".$tdate."'" : "date(addtime)<='".$tdate."'";
	}

	$cons=$cons ? "WHERE ".$cons : "";
	
    if($cons){
		$db=Mysql::getInstance();
		$db->query("DELETE FROM ".DB_PREFIX."buylist $cons");

		$msg='<span class="green">已成功清除当前订单记录！</span>';
		$img='success';
		$url=_S('HTTP_REFERER');		
		require View::getView('msg');
	} else {
		$msg='<span class="red">订单记录清除失败！</span>';
		$img='error';
		$url=_S('HTTP_REFERER');
	    require View::getView('msg');
	}
	require View::getView('footer');
	View::Output();
}

if($action=='getcards'){
    $orderid=_G('orderid');
	$lists=array();
	$db=Mysql::getInstance();
	$result=$db->query("SELECT updatetime,pwdforsearch FROM ".DB_PREFIX."buylist WHERE orderid='$orderid' LIMIT 1");
	$row=$db->fetch_array($result);
	$updatetime=$row[0];
	$pwdforsearch=$row[1];

	$result=$db->query("SELECT channelid,cardnum,cardpwd,money,realmoney FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$orderid."%'");
    if($db->num_rows($result)>0){
		while($row=$db->fetch_array($result)){
			if($row['channelid']==0){			   
				$res=$db->query("SELECT couponcode FROM ".DB_PREFIX."buylist WHERE orderid='$orderid'");
				$row2=$db->fetch_array($res);
				$row['channelname']='优惠券('.$row2['couponcode'].')';
			} else {
	            $row['channelname']=Channels_Model::getChannelnamebyChannelID($row['channelid']);
			}
			$lists[]=$row;
		}
	}
	require View::getView('paycards');
	View::Output();
}

if($action=='getgoodinfo'){
    $orderid=_G('orderid');
	$db=Mysql::getInstance();
	$result=$db->query("SELECT updatetime,pwdforsearch FROM ".DB_PREFIX."buylist WHERE orderid='$orderid' LIMIT 1");
	$row=$db->fetch_array($result);
	$updatetime=$row[0];
	$pwdforsearch=$row[1];

	$cards='';
	$result=$db->query("SELECT cardid FROM ".DB_PREFIX."selllist WHERE orderid='".$orderid."'");
	if($db->num_rows($result)>0){
	    while($row=$db->fetch_array($result)){
		    $res=$db->query("SELECT cardnum,cardpwd FROM ".DB_PREFIX."goods WHERE id=".$row['cardid']." LIMIT 1");
			if($db->num_rows($res)==1){
			    $row2=$db->fetch_array($res);
				$flag=true;
				$cards.='卡号：'.$row2['cardnum'].''."<br />";
				$cards.=$row2['cardpwd']=='' ? '' : '卡密：'.$row2['cardpwd'].''."<br />";
			}
		}
	} else {
		$flag=false;
	    $cards='卡密还没有提取，您可以 <a href="../orderquery.htm?orderid='.$orderid.'" class="blue" target="_blank">立即提取</a> 卡密';
	}

	require View::getView('getgoodinfo');
	View::Output();
}

if($action=='closeOrder'){
	$fdate=_G('fdate');
	$tdate=_G('tdate');
	$is_status=_G('is_status');
	$channelid=_G('channelid','int');
	$searchtype=_G('searchtype');
	$searchtext=_G('searchtext');
    $t='closeorders';
	$cache=Cache::getInstance();
	$channels=$cache->get('channelList');
	require View::getView('clearup');
	View::Output();
	exit;
}

if($action=='closeAllData'){
	$fdate=_P('fdate');
	$tdate=_P('tdate');
	$is_status=_P('is_status');
	$channelid=_P('channelid','int');
	$searchtype=_P('searchtype');
	$searchtext=_P('searchtext');
	$cons='is_state=0';

	require View::getView('header');
	
	if($searchtext<>''){
		$cons=$cons=='' ? '' : $cons.' AND ';
		switch($searchtype){
		  case 't0':
			  $userid=Users_Model::getUserIDbyUsername($searchtext) ? Users_Model::getUserIDbyUsername($searchtext) : 0;
			  $cons.="userid=".$userid."";
		  break;
		  case 't2':
			  $cons.="orderid='{$searchtext}'";
		  break;
		  case 't3':
			  $cons.="contact='{$searchtext}'";
		  break;
		  case 't4':
			  $cons.="cardnum='{$searchtext}'";
		  break;
		  default:
			  $cons.="orderid='{$searchtext}'";
		  }
	}

	if($is_status!=''){
		switch($is_status){
			case 's1': $is_status1=0;break;
			case 's2': $is_status1=2;break;
			case 's3': $is_status1=1;break;
			case 's4': $is_status1=4;break;
			default: $is_status1=1;
		}
		$cons.=$cons ? " AND is_status=$is_status1" : "is_status=$is_status1";
	}

	if($channelid && $channelid!=0){
		if($channelid=='999999'){
		    $cons .=$cons ? " AND is_coupon_state=1" : "is_coupon_state=1";
		} elseif($channelid=='9999999'){
		    $cons .=$cons ? " AND is_discount_state=1" : "is_discount_state=1";
		} else {
		    $cons .=$cons ? " AND channelid=".$channelid."" : "channelid=".$channelid."";
		}
	}

	if($fdate<>'' && isDate($fdate)){
		$cons .=$cons ? " AND date(addtime)>='".$fdate."'" : "date(addtime)>='".$fdate."'";
	}

	if($tdate<>'' && isDate($tdate)){
		$cons .=$cons ? " AND date(addtime)<='".$tdate."'" : "date(addtime)<='".$tdate."'";
	}

	$cons=$cons ? "WHERE ".$cons : "";
	
    if($cons){
		$db=Mysql::getInstance();
		$db->query("UPDATE ".DB_PREFIX."buylist SET is_state=1 $cons");

		$msg='<span class="green">已成功关闭当前订单记录！</span>';
		$img='success';
		$url=_S('HTTP_REFERER');		
		require View::getView('msg');
	} else {
		$msg='<span class="red">订单记录关闭失败！</span>';
		$img='error';
		$url=_S('HTTP_REFERER');
	    require View::getView('msg');
	}
	require View::getView('footer');
	View::Output();
}