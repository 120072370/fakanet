<?php
require_once 'common.php';
$action=_G('action');
//if(!$_SESSION['is_apply_settlement']){
//    $msg='<span class="red">当前账户未开通申请结算功能！</span>';
//    $img='error';
//    $url=_S('HTTP_REFERER');
//    require View::getView('header');
//    require View::getView('prompt');
//    require View::getView('footer');
//    View::Output();
//    exit;
//}

$db=Mysql::getInstance();
//当前金额(未结)
$result=$db->query("SELECT paid,unpaid,freeze FROM ".DB_PREFIX."usermoney WHERE userid='".$_SESSION['login_userid']."'");
$row=$db->fetch_array($result);
$total_money=$row['unpaid'];
$total_freeze=$row['freeze'];

//今日收入
$result=$db->query("SELECT orderid FROM ".DB_PREFIX."buylist WHERE userid='".$_SESSION['login_userid']."' AND date(addtime)='".date('Y-m-d')."' AND (is_status=1 OR is_status=2)");
$today_money=0;
if($db->num_rows($result)){
	while($row=$db->fetch_array($result)){
		$res=$db->query("SELECT sum(realmoney*price) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$row['orderid']."%' and channelid<>0 and payorderid<>''");
		$row1=$db->fetch_array($res);
		$today_money+=$row1[0];
	}
}

$apply_money=number_format($total_money-$today_money,2,'.','');

if($Config['takecash_state']==1){
	$msg='<span class="red">'.$Config['takecash_msgtip'].'</span>';
	$img='error';
	$url=_S('HTTP_REFERER');
	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
	exit;
}

if($apply_money<=0){
	$msg='<span class="red">当前账户可申请结算金额不足，暂不能申请结算！</span>';
	$img='error';
	$url=_S('HTTP_REFERER');
	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
	exit;
}

//时间限制
$tf=$Config['takecash_f'];
$tt=$Config['takecash_t'];
$tn=date('G');

if($tn<$tf || $tn>$tt){
	$msg='<span class="red">当前系统允许提现时间从 '.$tf.'点至 '.$tt.'点，其他时间暂不能申请提现!</span>';
	$img='error';
	$url=_S('HTTP_REFERER');
	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
	exit;
}

//提现申请次数限制
$config=new Config_Model();
$config=$config->getOneData();

$payments=new Payments_Model();
$tnt=$payments->getDataNum("WHERE pid<>1 AND userid=".$_SESSION['login_userid']." AND date(addtime)='".date('Y-m-d')."'");
if($tnt>=$config['takecash_times']){
	$msg='<span class="red">当日商户申请提现次数最多为'.$config['takecash_times'].'次！</span>';
	$img='error';
	$url=_S('HTTP_REFERER');
	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
	exit;
}

if($action==''){
    $tn=date('G');
    $title='申请结算';
	$ob=new UserInfo_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data){
		$ptype=$data['ptype'];
	    switch($ptype){
		    case '1': $payname='网上银行';break;
			case '2': $payname='支付宝';break;
			case '3': $payname='财付通';break;
            case '4': $payname='微信钱包';break;
			default: $payname='';
		}
		$realname=$data['realname'];
		$bank=$data['bank'];
		$card=$data['card'];
		$addr=$data['addr'];
		$alipay=$data['alipay'];
		$tenpay=$data['tenpay'];

        $wx_nickname=$data['wx_nickname'];
        $wx_openid=$data['wx_openid'];
	} else {
	    $ptype=0;
		$realname='';
		$bank='';
		$card='';
		$addr='';
		$alipay='';
		$tenpay='';
	}

    if($realname =='')
    {
        $msg='<span class="red">请先完善收款信息！</span>';
        $img='error';
        $url="userinfo.php";
        require View::getView('header');
        require View::getView('prompt');
        require View::getView('footer');
        View::Output();
        exit;
    }

	require View::getView('header');
	require View::getView('applyForSettlement');
	require View::getView('footer');
	View::Output();
}

if($action=='apply'){
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
    $chkcode=_P('chkcode');
	$money=_P('money');

    $money = str_replace( ',', '', $money);

	if($chkcode=='' || $chkcode!=$_SESSION['chkcode']){
	    $msg='<span class="red">验证码输入错误！</span>';
		$img='error';
		$url='applyForSettlement.php';
		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();
		exit;
	}

	$tf=$Config['takecash_f'];
	$tt=$Config['takecash_t'];
	$tn=date('G');

	if($tf==$tt){
	    $msg='<span class="red">当前系统已暂停商户提现功能(周六周日不结算)，暂不能申请提现!</span>';
		$img='error';
		$url='applyForSettlement.php';
		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();
		exit;
	}

	if($tn<$tf || $tn>$tt){
	    $msg='<span class="red">当前系统允许提现时间从 '.$tf.'点至 '.$tt.'点，其他时间暂不能申请提现!</span>';
		$img='error';
		$url='applyForSettlement.php';
		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();
		exit;
	}

	if($money>$apply_money){
	    $msg='<span class="red">申请结算失败！</span>';
		$img='error';
		$url='applyForSettlement.php';
		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();
		exit;
	}

	if($Config['takecash']>0 && $money<$Config['takecash']){
	    $msg='<span class="red">申请结算失败，当前最低提现金额为'.$Config['takecash'].'！</span>';
		$img='error';
		$url='applyForSettlement.php';
		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();
		exit;
	}
	$data=array('userid'=>$_SESSION['login_userid'] , 'money'=>$money , 'addtime'=>date('Y-m-d H:i:s') ,'pid'=>2,'remark'=>'');

	//保存结算记录
	$payments=new Payments_Model();
	$payments->addData($data);
	//更新结算金额
	$ob=new UserMoney_Model();
	$ob->updateMoney($_SESSION['login_userid'],$money);
	//update buyList is_pay
	$db=Mysql::getInstance();
	$db->query("update ".DB_PREFIX."buylist SET is_ship=1 WHERE is_status=1 AND userid=".$_SESSION['login_userid']." AND date(addtime)<='".date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y')))."'");

	//发送短信
	$title='商户['.$_SESSION['login_username'].']申请提现通知';
	$content='商户 '.$_SESSION['login_username'].' 于 '.date('Y-m-d H:i:s').' 申请提现，申请提现金额为 ['.$money.'] 元。';
	$data=array('from_user'=>$_SESSION['login_userid'],'to_user'=>1,'title'=>$title,'content'=>$content,'addtime'=>date('Y-m-d H:i:s'));
	$ob=new Message_Model();
	$ob->addData($data);
//sendMail($config['servicemail'],$config['sitename'].'有商户申请提现',$content);

	$msg='<span class="green">申请结算成功，请等待客服处理！</span>';
	$url='userMoney.php';
	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
	exit;
}
?>