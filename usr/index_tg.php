<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
    //if($_SESSION['istg']=='1'){
    //    header("location:tg_orders.php");
    //}
	$title='账户信息';
	
	//收益统计
	$orderids=$wddb->getCol("SELECT orderid FROM ".DB_PREFIX."buylist WHERE fromid='".$_SESSION['login_userid']."' AND UNIX_TIMESTAMP(addtime)>'".(strtotime(date('Y-m-d'))-2505600)."' AND (is_status=1 OR is_status=2)");
	foreach ($orderids as $k => &$v) {
		$v="'".$v."'";
	}
	if($orderids){
	    $orderids=implode(',', $orderids);
		$money_list=$wddb->getAll("SELECT date(addtime) as k,sum(realmoney*price) as v FROM ".DB_PREFIX."orderlist WHERE orderid in (".$orderids.") and channelid<>0 and payorderid<>'' group by date(addtime)");
	}else{
		$money_list=array();
	}
	
	$stime=strtotime(date('Y-m-d'))-2505600;
	$etime=time();
	$shouyi_days=array();
	$shouyi_moneys=array();
	for ($i=$stime; $i <$etime ; $i+=86400) {
		$have=false;
		foreach ($money_list as $k => $v) {
			if($v['k']==date('Y-m-d',$i)){
			    array_push($shouyi_moneys,number_format($v['v'],2,'.',''));
				$have=true;
			}
		}
		if(!$have){
			array_push($shouyi_moneys,0);
		}
		array_push($shouyi_days,date('d',$i));
	}
	$shouyi_moneys=implode(',', $shouyi_moneys);
	$shouyi_days=implode(',', $shouyi_days);
	
	//帐户完整度
	$info_user=$wddb->getRow("select tel,email,openid_wx from ".DB_PREFIX."users where id=".$_SESSION['login_userid']);
	$info_user['realname']=$wddb->getOne("select realname from ".DB_PREFIX."userinfo where userid=".$_SESSION['login_userid']);
	$safe_num=0;
	if(!empty($info_user['tel'])){
	    $safe_num+=25;
	}
	if(!empty($info_user['email'])){
	    $safe_num+=25;
	}
	if(!empty($info_user['openid_wx'])){
	    $safe_num+=25;
	}
	if(!empty($info_user['realname'])){
	    $safe_num+=25;
	}
	if($safe_num>=75){
	    $safe_info='安全';
	}
	
	
	//今日收入
	$result=$db->query("SELECT orderid FROM ".DB_PREFIX."buylist WHERE fromid='".$_SESSION['login_userid']."' AND date(addtime)='".date('Y-m-d')."' AND (is_status=1 OR is_status=2)");
	$today_money=0;
	if($db->num_rows($result)){
        //WHERE is_status=1 and is_status=1 and `fromid`=155 ORDER BY id DESC
        $totalPrice2=$db->query("SELECT sum(price*tghyfc/100) as price FROM ".DB_PREFIX."buylist A $t2_cons $cons1");
        $totalPrice2=$db->fetch_array($totalPrice2);
	    while($row=$db->fetch_array($result)){
          

            //$res=$db->query("SELECT sum(realmoney*price) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$row['orderid']."%' and channelid<>0 and payorderid<>''");
            //$row1=$db->fetch_array($res);
            //$today_money+=$row1[0];
		}
	}

	$today_money=number_format($today_money,2,'.','');

	//昨天收入
	$result=$db->query("SELECT orderid FROM ".DB_PREFIX."buylist WHERE fromid='".$_SESSION['login_userid']."' AND date(addtime)='".date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y')))."' AND (is_status=1 OR is_status=2)");
	$yestoday_money=0;
	if($db->num_rows($result)){
	    while($row=$db->fetch_array($result)){
		    $res=$db->query("SELECT sum(realmoney*price) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$row['orderid']."%'  and channelid<>0 and payorderid<>''");
			$row1=$db->fetch_array($res);
			$yestoday_money+=$row1[0];
		}
	}

	$yestoday_money=number_format($yestoday_money,2,'.','');

	//上次结算金额和上次结算时间
	$result=$db->query("SELECT money,date(addtime) as addtime,fee FROM ".DB_PREFIX."payments WHERE userid=".$_SESSION['login_userid']." AND is_state=1 ORDER BY id DESC LIMIT 1");
	$last_paymoney=0;
	$last_paytime='';
	if($db->num_rows($result)==1){
	    $row=$db->fetch_array($result);
		$last_paymoney=$row['money'] - $row["fee"];
		$last_paytime=$row['addtime'];
	}
    //待结算金额
    $result=$db->query("SELECT money,date(addtime) as addtime,fee FROM ".DB_PREFIX."payments WHERE userid=".$_SESSION['login_userid']." AND is_state=0 ORDER BY id DESC LIMIT 1");
	$last_whpaymoney=0;
	if($db->num_rows($result)==1){
	    $row=$db->fetch_array($result);
		$last_whpaymoney=$row['money'] - $row["fee"];
	}

    //累计提现
    $result=$db->query("SELECT sum(money-fee) FROM ".DB_PREFIX."payments WHERE userid=".$_SESSION['login_userid']." AND is_state=1");
	$row=$db->fetch_array($result);
    if($db->num_rows($result)==1){
        $total_payfee=$row[0]==null ? '0.00' : number_format($row[0],2);
    }


	//成交订单数
	$result=$db->query("SELECT count(*) FROM ".DB_PREFIX."buylist WHERE fromid=".$_SESSION['login_userid']." AND is_status=1");
	$row=$db->fetch_array($result);
	$total_success_orders=$row[0]==null ? 0 : $row[0];

	//今日成交订单数
	$result=$db->query("SELECT count(*),sum(quantity) FROM ".DB_PREFIX."buylist WHERE fromid=".$_SESSION['login_userid']." AND is_status=1 AND date(addtime)='".date('Y-m-d')."'");
	$row=$db->fetch_array($result);
	$today_success_orders=$row[0]==null ? 0 : $row[0];
    $today_sell_cards=$row[1]==null ? 0 : $row[1];

	//昨日成交订单数
	$result=$db->query("SELECT count(*) FROM ".DB_PREFIX."buylist WHERE fromid=".$_SESSION['login_userid']." AND is_status=1 AND date(addtime)='".date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y')))."'");
	$row=$db->fetch_array($result);
	$yestoday_success_orders=$row[0]==null ? 0 : $row[0];

	//今日卖出卡量
	/*$result=$db->query("SELECT count(*) FROM ".DB_PREFIX."goods WHERE is_state=1 AND userid=".$_SESSION['login_userid']." AND date(updatetime)='".date('Y-m-d')."'");
	$row=$db->fetch_array($result);
	$today_sell_cards=$row[0]==null ? 0 : $row[0];
	*/

	//今日卖出成本和利润
	$result=$db->query("SELECT sum(cbprice*quantity) FROM ".DB_PREFIX."buylist WHERE is_status=1 AND is_receive=1 AND fromid=".$_SESSION['login_userid']." AND date(addtime)='".date('Y-m-d')."'");
	$row=$db->fetch_array($result);
	$today_sell_cbprice=$row[0]==null ? 0 : $row[0];
	$today_sell_profit=$today_money-$today_sell_cbprice;

	$today_sell_profit=number_format($today_sell_profit,2,'.','');

	//昨日卖出利润
	$result=$db->query("SELECT sum(cbprice*quantity) FROM ".DB_PREFIX."buylist WHERE is_status=1 AND fromid=".$_SESSION['login_userid']." AND date(addtime)='".date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y')))."'");
	$row=$db->fetch_array($result);
	$yestoday_sell_cbprice=$row[0]==null ? 0 : $row[0];
	$yestoday_sell_profit=$yestoday_money-$yestoday_sell_cbprice;

	$yestoday_sell_profit=number_format($yestoday_sell_profit,2,'.','');

	//自动弹出
	$is_popup='';
	if($news){
	    foreach($news as $key=>$val){
		    if($val['is_popup'] && ($val['classid']==1 or $val['classid']==4)){
			    $is_popup.=$is_popup ? ',"'.$val['id'].'"' : '"'.$val['id'].'"';
			}
		}
	}

	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize= 5;
	$cons="WHERE classid=1 OR classid=4 ORDER BY id DESC";
	$ob=new News_Model();
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('?p=',$page,$totalpage,$totalsize,$pagesize);

    require View::getView('header');
	require View::getView('index_tg');
	require View::getView('footer');
	View::Output();
}

if($action=='view'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$t=_G('t','int');
	$ob=new News_Model();
	$data=$ob->getOneData($id);
	if($t==2){
	    if($data){
		    echo '{"title":'.json_encode($data['title']).',"content":'.json_encode($data['content']).',"titlecolor":'.json_encode($data['is_color']).',"addtime":'.json_encode($data['addtime']).'}';
			exit;
		}
	} else {
	    require View::getView('viewNews');
	    View::Output();
	}
}

if($action=='checkInbox'){
    $ob=new Message_Model();
	echo $ob->getUnRead("WHERE to_user=".$_SESSION['login_userid']." AND is_read=0");
	exit;
}

if($action=='changeTheme'){
    $theme=_G('theme');
	$t=array_key_exists($theme,$themeList) && $theme ? $theme : 'default';
	$_SESSION['login_user_theme']=$t;
	$ob=new Users_Model();
	$ob->updateData($_SESSION['login_userid'],array('theme'=>$t));
	$msg='<span class="green">请稍候，商户中心主题 <span class="red">'.$themeList[$t].'</span> 正在切换...</span>';
	$url=_S('HTTP_REFERER');

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
}
?>