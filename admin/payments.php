<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);
require_once 'common.php';
require_once "lib/wx/WxPay.PayTransfers.php";
//require_once WY_ROOT."/pay/weixin_bank/lib/WxPay.Data.php";

$action=_G('action');
$do=_G('do');
$ob=new Payments_Model();

$username='';
$fdate=$tdate=date('Y-m-d');
$cons='';
$is_state='';
$iet='';
$paycid='';
$snum='';
$bank='';

if($do=='search'){
	$username=_G('username');
	$fdate=_G('fdate');
	$tdate=_G('tdate');
	$iet=_G('iet');
	$paycid=_G('paycid');
	$is_state=_G('is_state');
	$snum=_G('snum','int');
	$bank=_G('bank');
}

if($username){
	$cons=$cons!='' ? $cons.' AND ' : '';
	$cons.="(userid=".Users_Model::getUserIDbyUsername($username)." OR userid='$username' OR userid in(SELECT userid FROM ".DB_PREFIX."userinfo WHERE realname LIKE '%".$username."%') OR userid in(SELECT userid FROM ".DB_PREFIX."userinfo WHERE card LIKE '%".$username."%') OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE qq LIKE '%".$username."%') OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE tel LIKE '%".$username."%') OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE email LIKE '%".$username."%'))";
}

if($paycid!=''){
    $cons=$cons!='' ? $cons.' AND ' : '';
    if($paycid=='t1') $paycid1='1';
    if($paycid=='t2') $paycid1='2';
    $cons.="pid=$paycid1";
}

if($is_state!=''){
    if($is_state=='s0') $is_state1=0;
    if($is_state=='s1') $is_state1=1;
    if($is_state=='s2') $is_state1=2;
    $cons=$cons!='' ? $cons.' AND ' : '';
    $cons.="is_state=$is_state1";
}

if($fdate<>'' && isDate($fdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)>='".$fdate."'";
}

if($tdate<>'' && isDate($tdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)<='".$tdate."'";
}

if($snum){
    $cons.=$cons ? ' AND ' : '';
	$cons.="id=$snum";
}

if($bank){
	$cons.=$cons ? ' AND ' : '';
	if($bank=='支付宝'){
	    $cons.="userid in(SELECT userid FROM ".DB_PREFIX."userinfo WHERE ptype=2)";
	}elseif($bank=='财付通'){
	    $cons.="userid in(SELECT userid FROM ".DB_PREFIX."userinfo WHERE ptype=3)";
	}elseif($bank=='微信钱包'){
	    $cons.="userid in(SELECT userid FROM ".DB_PREFIX."userinfo WHERE ptype=4)";
	}else{
	    $cons.="userid in(SELECT userid FROM ".DB_PREFIX."userinfo WHERE bank='$bank' AND ptype=1)";
	}	
}

$cons=$cons!='' ? "WHERE ".$cons : '';

if($action==''){
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$totalsize=$ob->getDataNum($cons);
	$lists=$ob->getData($page,$pagesize,$cons." order by id desc");
	$totalpage=ceil($totalsize / $pagesize);
	$pagelist=getpagelist('?do='.$do.'&username='.$username.'&snum='.$snum.'&paycid='.$paycid.'&is_state='.$is_state.'&fdate='.$fdate.'&tdate='.$tdate.'&bank='.$bank.'&p=' , $page , $totalpage , $totalsize);

	//今日结算总金额
	$today_lists=$ob->getTotalData("WHERE date(addtime)='".date('Y-m-d')."' AND is_state=1");
	$today_pay=0;
	if($today_lists){
	    foreach($today_lists as $key=>$val){
		    $today_pay+=$val['money'];
		}
	}
	//总统计
	$total_lists=$ob->getTotalData($cons);
	$total_pay=$total_fee=$total_realmoney=0;
	if($total_lists){
	    foreach($total_lists as $key=>$val){
		    $total_pay+=$val['money'];
			$total_realmoney+=$val['realmoney'];
			$total_fee+=$val['fee'];
		}
	}
	require View::getView("header");
	require View::getView("payments");
	require View::getView("footer");
	View::Output();
}

if($action=='edit'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$data=$ob->getOneData($id);
	$Cache=Cache::getInstance();
	$Config=$Cache->get('config');
    $userid = $data['userid'];
    $addtime = $data["addtime"];

 

    $info_user=$wddb->getRow("select * from ".DB_PREFIX."userinfo where userid=".$data['userid']);
	if($data['money']<$Config['freemin']){
        $fee = sprintf("%.2f",$data['money']*$Config['shouxufeilv']/100);
        if($fee <1){
            $fee = $Config['zuidishouxufei'];
        }
        $data['fee']=$fee;
		$data['money']=$data['money']-$data['fee'];
    }

    $datalast=$ob->getLastOneData($userid,$addtime);
    if($datalast){
        $lastaddtime = $datalast["addtime"];
    }else{
        $lastaddtime= "1900-1-1 00:00:00";
    }

    $strfs = "";
    switch ($info_user['ptype']) {
        case '1':
            $strfs = "银行付款";
            $info='收款方式：银行付款';
            $info.='<br>账号：'.$info_user['bank'];
            $info.='<br>姓名：'.$info_user['realname'];
            break;
        case '2':
            $strfs = "支付宝";
            $info='收款方式：支付宝';
            $info.='<br>账号：'.$info_user['alipay'];
            $info.='<br>姓名：'.$info_user['realname'];
            break;
        case '3':
            $strfs = "财付通";
            $info='收款方式：财付通';
            $info.='<br>账号：'.$info_user['tenpay'];
            $info.='<br>姓名：'.$info_user['realname'];
            break;
        case '4':
            $strfs = "微信钱包";
            $info='收款方式：微信钱包';
            $info.='<br>昵称：'.$info_user['wx_nickname'];
            $info.='<br>姓名：'.$info_user['realname'];
            break;
    }
    
    $data["ptype"] =$info_user['ptype'];
    $data["realname"] = $info_user['realname'];
    $data["openid"] = $info_user['wx_openid'];
    $data["Trondeo"] = getRandomString(10);

	$info.="<br>".$data["Trondeo"] ;
    
    $data['remark']=$info;

	extract($data);

    if($userid){
        $ob=new UserMoney_Model();
        $datas=$ob->getOneData($userid);
        $unpaid=$datas['unpaid'];
        $yestodayUserIncome=$datas['yestodayUserIncome'];
    } else {
        $unpaid=0;
        $yestodayUserIncome=0;
    }
    
    //累计销售额
    $datau=$ob->allUserIncome($userid,$lastaddtime,$addtime);
    $allUserIncome = $datau;
    //$db=Mysql::getInstance();
   

	require View::getView("paymentsEdit");
	View::Output();
}

if($action=='editsave'){
	$id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$is_state=_P('is_state','int');
	$paycid=_P('paycid','int');
	$remark=_P('remark');
	$money=_P('money','float');
	$fee=_P('fee','float');
    $ptype = _P("ptype");
    $realname= _P("realname");
	
	$is_statepay=$wddb->getOne("select is_state from ".DB_PREFIX."payments where id=".$id);
	//if($is_state==1 && $is_statepay == 0){
    //$Trondeo = getRandomString(10);
    $data=array('is_state'=>$is_state,'pid'=>$paycid,'remark'=>$remark,'money'=>$money,'fee'=>$fee, 'updatetime'=>time());
    $userid=$wddb->getOne("select userid from ".DB_PREFIX."payments where id=".$id);
    

    //更新结算金额
    global $wddb;
    
    $ob->updateData($id,$data);
    //客户申请结算，不更新余额
    // $ob_usermoney=new UserMoney_Model();
    //$ob_usermoney->updateMoney($userid,$money);

    
    
    if($is_state == 1){
        $user=$wddb->getrow("select * from ".DB_PREFIX."users where id=".$userid);
        //发送微信通知
        if($user["openid_wx"] != ""){
            include_once WY_ROOT.'/includes/libs/Weixin/Wxfw.class.php';
            $config=$wddb->getrow("select * from ".DB_PREFIX."config");
            $wx=new Wxfw(array(
                'appid'=>$config['wx_appid'],
                'secret'=>$config['wx_appsecret']
            ));
            $remark=preg_split("/[\n\r]+/s",$remark ,-1,PREG_SPLIT_NO_EMPTY);
            $remark=implode(' ',$remark);
            $data=array(
                'touser'=>$user['openid_wx'],
                'template_id'=>$config['wx_notice_money'],
                'url'=>"http://{$_SERVER['HTTP_HOST']}",
                'data'=>array(
                    'first'=>array(
                        'value'=>'结算通知',
                    ),
                    'keyword1'=>array(
                        'value'=>"Weiqi_".$pid
                    ),
                    'keyword2'=>array(
                        'value'=> $money."元"
                    ),
                    'keyword3'=>array(
                        'value'=>$fee.'元'
                    ),
                    'keyword4'=>array(
                        'value'=>($money-$fee).'元'
                    ),
                    'keyword5'=>array(
                        'value'=>date('Y年m月d日 H:i',time())
                    ),
                    'remark'=>array(
                        'value'=>$remark
                    ),
                    
                ),
            );
            $re=$wx->api('message/template/send','',$data,'POST');
        }
    }
    // }
	$msg='<span class="green">记录修改保存成功！</span>';
	$img='success';
	$url=_S('HTTP_REFERER');
	require View::getView('header');
	require View::getView('msg');
	require View::getView('footer');
	View::Output();
}

if($action=='del'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$ob->deleteData($id);
	echo 'ok';
}

if($action=='delall'){
	$ids=array();
	if(isset($_POST['listid'])) $ids=$_POST['listid'];
	if(count($ids)==0) redirect('?del_err=true');
    foreach($ids as $id){
        $ob->deleteData(intval($id));
    }
	$msg='<span class="green">记录清除成功！</span>';
	$img='success';
	$url=_S('HTTP_REFERER');
	require View::getView('header');
	require View::getView('msg');
	require View::getView('footer');
	View::Output();
}

if($action=='deldata'){
	$username=_G('username');
	$paycid=_G('paycid');
	$is_state=_G('is_state');
	$fdate=_G('fdate');
	$tdate=_G('tdate');
    $t='payments';
	require View::getView('clearup');
	View::Output();
	exit;
}

if($action=='exedeldata'){
	$username=_P('username');
	$paycid=_P('paycid');
	$is_state=_P('is_state');
	$fdate=_P('fdate');
	$tdate=_P('tdate');
	$cons='';

	require View::getView('header');	
	
	if($username){
		$cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="userid=".Users_Model::getUserIDbyUsername($username)."";
	}

	if($paycid!=''){
		$cons=$cons!='' ? $cons.' AND ' : '';
		if($paycid=='t1') $paycid1='1';
		if($paycid=='t2') $paycid1='2';
		$cons.="pid=$paycid1";
	}

	if($is_state!=''){
		if($is_state=='s0') $is_state1=0;
		if($is_state=='s1') $is_state1=1;
		if($is_state=='s2') $is_state1=2;
		$cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="is_state=$is_state1";
	}

	if($fdate<>'' && isDate($fdate)){
		if($cons<>'') $cons.=' AND ';
		$cons .="date(addtime)>='".$fdate."'";
	}

	if($tdate<>'' && isDate($tdate)){
		if($cons<>'') $cons.=' AND ';
		$cons .="date(addtime)<='".$tdate."'";
	}

	$cons=$cons!='' ? "WHERE ".$cons : '';

    if($cons){
		$db=Mysql::getInstance();
		$db->query("DELETE FROM ".DB_PREFIX."payments $cons");
		$msg='<span class="green">已成功清除当前结算记录！</span>';
		$img='success';
		$url=_S('HTTP_REFERER');		
		require View::getView('msg');
	} else {
		$msg='<span class="red">结算记录清除失败！</span>';
		$img='error';
		$url=_S('HTTP_REFERER');
	    require View::getView('msg');
	}
	require View::getView('footer');
	View::Output();
}

if($action=='applyforuser'){
    $id=_G('id','int');
	$t=_G('t','int');
    $ob->updateData($id,array('paycid'=>$t));
	Redirect(_S('HTTP_REFERER'));
}

if($action=='updateState'){
	$id=_G('id','int');
	$t=_G('t','int');
	$ob=new Payments_Model();
	$ob->updateData($id,array('is_state'=>$t,'updatetime'=>time()));
	Redirect(_S('HTTP_REFERER'));
}

if($action=='editpaywx'){
    $id=_G('id','int');
    $yest=_G("yest");
    if($id){
        if($yest == '1'){
            $obs=new UserMoney_Model();
            $datab=$obs->getOneData($id);
            $userid = $datab['userid'];
        }else{
            $data=$ob->getOneData($id);
            $userid = $data['userid'];
        }
       
        $info_user=$wddb->getRow("select * from ".DB_PREFIX."userinfo where userid=".$userid);
        $user = $wddb->getRow("select username,openid_wx from ".DB_PREFIX."users where id=".$userid);
        $openid_wx = $user["openid_wx"];
        $username = $user["username"];
        $realname = $info_user["realname"];

        $Cache=Cache::getInstance();
        $Config=$Cache->get('config');
        if($yest == '1'){
            $unpaid=$datab['unpaid'];
            $yestodayUserIncome=$datab['yestodayUserIncome'];
            $dmoney = $unpaid - $yestodayUserIncome;
            if($dmoney<$Config['freemin']){
                $fee = sprintf("%.2f",$yestodayUserIncome*$Config['shouxufeilv']/100);
                if($fee <1){
                    $fee = $Config['zuidishouxufei'];
                }
                $datab['fee']=$fee;
                $money=$dmoney-$datab['fee'];
            }else{
                $money=$dmoney;
            }
        }else{
            if($data['money']<$Config['freemin']){
                $fee = sprintf("%.2f",$data['money']*$Config['shouxufeilv']/100);
                if($fee <1){
                    $fee = $Config['zuidishouxufei'];
                }
                $data['fee']=$fee;
                $data['money']=$data['money']-$data['fee'];
            }
            $money = $data['money'];
        }
    }
	require View::getView("viewpayweixin");
	View::Output();
}
if($action=='posteditpaywx'){
    $realname = _P("realname");
    $openid_wx = _P("openid_wx");
    $Trondeo = _P("Trondeo");
    $money = _P("money1");
    $is_Check = _P("is_Check");
    $remake = _P("remake");
    $safepwd = _P("safepwd");

    $ob=new Admin_Model();
    $data=$ob->getOneData($_SESSION['login_adminid']);

    if($safepwd==''){
        echo "非法访问！";
        exit;
    } else {
        if($data['userkey']!=md5(md5($safepwd))){
            echo "非法访问。";
            exit;
        }
    }
    
    if($realname != "" && $openid_wx != "" && $Trondeo != "" && $money != ""){
        $PayTran = new PayTransfers();
        $input = new WxPayTransfers();
        $input->SetOpenid($openid_wx);
        $input->SetAmount($money * 100);
        $input->SetCheckName($is_Check);
        $input->SetDesc($remake);
        $input->Setre_user_name($realname);
        $input->SetTradeno($Trondeo);

        $result = $PayTran->PayTranbank($input);
        if($result["return_code"]=="SUCCESS"){
            echo "支付成功，金额：".$money."元";
        }else{
            echo "结算失败".$result["return_msg"];
        }
    }else{
        echo "参数不全";
    }
}