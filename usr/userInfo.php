<?php
require_once 'common.php';
$action=_G('action');
	if(!$_SESSION['login_user_safe_key']){
		$t='1';
		$wyt='';
	    $url='userInfo.php';
		require View::getView('header');
		require View::getView('safepwd');
		require View::getView('footer');
		View::Output();
		exit;
	}
if($action==''){

	$title='商户信息';
	$user=new Users_Model();
	$users=$user->getOneData($_SESSION['login_userid']);
	if($users){
		$email=$users['email'];
		$tel=$users['tel'];
		$tel_check=$users['tel_check'];
		$qq=$users['qq'];
		$sitename=$users['sitename'];
		$siteurl=$users['siteurl'];
		$is_getgood=$users['is_getgood'];
		$is_invent=$users['is_invent'];
		$is_paytype=$users['is_paytype'];
		$statistics=$users['statistics'];
		$is_contact_limit=$users['is_contact_limit'];
		$template=$users['template'];
		$go_page_theme=$users['go_page_theme'];
        $is_notfiy = $users['is_notfiy'];
        $siteintr = $users["siteintr"];

        $openid_wx=$users['openid_wx'];
	}

    if(empty($openid_wx))
        $openid_wx="";
    else
        $openid_wx="trueopenid";

	$ptype='';
	$realname='';
	$bank='';
	$card='';
	$addr='';
	$alipay='';
	$tenpay='';

	$info=new UserInfo_Model();
	$userInfo=$info->getOneData($_SESSION['login_userid']);
	if($userInfo){
		$ptype=$userInfo['ptype'];
		$realname=$userInfo['realname'];
		$idcard=$userInfo['idcard'];
		$bank=$userInfo['bank'];
		$card=$userInfo['card'];
		$addr=$userInfo['addr'];
		$alipay=$userInfo['alipay'];
		$tenpay=$userInfo['tenpay'];

       // $wx_openid=$userInfo['wx_openid'];
        $wx_nickname=$userInfo['wx_nickname'];
	}

    require View::getView('header');
	require View::getView('userInfo');
	require View::getView('footer');
	View::Output();
}

if($action=='editsave'){
	
    $tel=_P('tel');
	//$qq=_P('qq');
	$sitename=_P('sitename');
	$siteurl=_P('siteurl');
	$is_getgood=_P('is_getgood','int');
	$is_invent=_P('is_invent','int');
	$is_paytype=_P('is_paytype','int');
	$is_contact_limit=_P('is_contact_limit','int');
	$template=_P('template');
	$go_page_theme=_P('go_page_theme');
    $is_notfiy = _P("is_notfiy");
    $siteintr = _P("siteintr");
    $email = _P("email");
    //if(strlen($sitename)>50 || strlen($siteurl)>80){
    //    Redirect('?edit_err=true');
    //}
	$data=array(
		'tel'=>$tel,
		//'qq'=>$qq,
        'email'=>$email,
		'sitename'=>$sitename,
		'siteurl'=>$siteurl,
		'is_getgood'=>$is_getgood,
		'is_invent'=>$is_invent,
		'is_paytype'=>$is_paytype,
		'is_contact_limit'=>$is_contact_limit,
		'template'=>$template,
		'go_page_theme'=>$go_page_theme,
        'is_notfiy'=>$is_notfiy,
        'siteintr'=>$siteintr,
	);
    if($tel !=""){
        $ob=new Users_Model();
        $ob->updateData($_SESSION['login_userid'],$data);
    }
    $bank= _P('bank');
    $ptype= _P('ptype');
    $card= _P('card');
    $idcard= _P('idcard');
    $resideprovince= _P('resideprovince');
    $residecity= _P('residecity');
    $addr= _P('addr');
    $alipay= _P('alipay');
    $tenpay= _P('tenpay');
    $wx_openid= _P('wx_openid');
    $wx_nickname= _P('wx_nickname');
    $realname = _P("realname");

    $bank1='';
    $card1='';
    $addr1='';
    $alipay1='';
    $tenpay1='';
    $wx_openid1 ='';
    $wx_nickname1 ='';
    if($ptype==1){
        $bank1=$bank;
        $card1=$card;
        $addr1=$resideprovince.' '.$residecity.' '.$addr;
    } else if($ptype==2){
        $alipay1=$alipay;
    } else if($ptype==3){
        $tenpay1=$tenpay;
    }else if ($ptype == 4){
        $wx_openid1 = $wx_openid;
        $wx_nickname1 = $wx_nickname;
    }
    if($realname != "" && $ptype != ""){
        $info=array('realname'=>$realname,'bank'=>$bank1,'card'=>$card1,'addr'=>$addr1,'alipay'=>$alipay1,'tenpay'=>$tenpay1,'ptype'=>$ptype,'idcard'=>$idcard,'wx_openid'=>$wx_openid1,'wx_nickname'=>$wx_nickname1);
        $ob1=new UserInfo_Model();
        $ob1->updateData($_SESSION['login_userid'],$info);
    }

	$msg='<span class="green">商户资料修改保存成功！</span>';
	$url='userInfo.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}

if($action=='is_invent_desc'){
    require View::getView('is_invent_desc');
	View::Output();
}
?>