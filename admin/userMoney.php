<?php
require_once 'common.php';
$action=_G('action');
$ob=new UserMoney_Model();
$username=_G('username');

if($action==''){
	$cons="unpaid<>0";

	if($username){
		$cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="userid=".Users_Model::getUserIDbyUsername($username)." OR userid='$username' OR userid in(SELECT userid FROM ".DB_PREFIX."userinfo WHERE realname LIKE '%".$username."%') OR userid in(SELECT userid FROM ".DB_PREFIX."userinfo WHERE card LIKE '%".$username."%') OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE qq LIKE '%".$username."%') OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE tel LIKE '%".$username."%') OR userid in(SELECT id FROM ".DB_PREFIX."users WHERE email LIKE '%".$username."%')";
	}
        $ctype=_G('ctype','int');
        $sort=_G('sort');
        $sort=$sort ? $sort : 'unpaid';
        $page=_G('p','int');
        $page=$page==false ? 1 : $page;
        $pagesize=20;

        $cons.=$ctype ? " AND userid in(SELECT id FROM ".DB_PREFIX."users WHERE ctype=$ctype)" : '';
        switch($sort){
            case 'totalincome': $cons.=' ORDER BY unpaid+paid DESC';break;
                case 'paid': $cons.=' ORDER BY paid DESC';break;
                default: $cons.=' ORDER BY unpaid DESC';
        }
        $cons=$cons ? "WHERE ".$cons : '';
      
        $totalsize=$ob->getDataNum($cons);
        $lists=$ob->getData($page,$pagesize,$cons);
        $totalpage=ceil($totalsize / $pagesize);
        $pagelist=getpagelist('?sort='.$sort.'&ctype='.$ctype.'&p=' , $page , $totalpage , $totalsize);
        require View::getView("header");
        require View::getView("usermoney");
        require View::getView("footer");
        View::Output();
}
        
if($action=='addsave'){ 
        $is_state=_P('is_state','int');
        $pid=_P('pid','int');
        $username=_P('username');
        $money=_P('money','float');
        $remark=_P('remark');
        $fee=_P('fee','float');
        $fee=$fee==false ? 0 : $fee;

        if($username=='' || $money=='' || $money==0){
            Redirect('?add_err_1=true');
        }

        if(!$userid=Users_Model::getUserIDbyUsername($username)){
            Redirect('?add_err_2=true');
        }
        if(!$userMoney=$ob->getOneData($userid)){
            Redirect('?add_err_2=true');
        }
        $unpaid=$userMoney['unpaid'];
        if($unpaid<=0){
                Redirect('?add_err_3=true');
        }

        if($unpaid<$money){
                Redirect('?add_err_4=true');
        }

        if($is_state == 1){

            $data=array('is_state'=>$is_state , 'userid'=>$userid , 'money'=>$money , 'addtime'=>date('Y-m-d H:i:s') , 'remark'=>$remark."\n".$Trondeo , 'pid'=>$pid , 'fee'=>$fee , 'updatetime'=>time());

            //保存结算记录
            $payments=new Payments_Model();
            $payments->addData($data);
            //更新结算金额
            $ob->updateMoney($userid,$money);
            
            
            $user=$wddb->getrow("select * from ".DB_PREFIX."users where id=".$userid);
            //发送微信通知
            if($user["openid_wx"] !=""){
                
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
            //update buyList is_pay
            $db=Mysql::getInstance();
            $db->query("update ".DB_PREFIX."buylist SET is_ship=1 WHERE is_status=1 AND userid=$userid AND date(addtime)='".date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y')))."'");

            $msg='<span class="green">商户结算保存成功！</span>';
            $img='success';
            $url=_S('HTTP_REFERER');                
            require View::getView('header');
            require View::getView('msg');
            require View::getView('footer');
            View::Output();
        }
}

if($action=='add'){
        $userid=_G('userid','int');
        if($userid){
            $data=$ob->getOneData($userid);
                $username=$data['username'];
                $unpaid=$data['unpaid'];
                $yestodayUserIncome=$data['yestodayUserIncome'];
                //$wx_openid = $data["openid_wx"];
        } else {
            $username='';
                $unpaid=0;
                $yestodayUserIncome=0;
        }
        //是否已结
        $db=Mysql::getInstance();
        $result=$db->query("SELECT count(*) FROM ".DB_PREFIX."payments WHERE userid=$userid AND date(addtime)='".date('Y-m-d',mktime(0,0,0,date('m'),date('d'),date('Y')))."'");
        $row=$db->fetch_array($result);
        $flag=$row[0]==0 ? false : true;
		
		//提现信息
		$db=Mysql::getInstance();
        $re=$db->query("SELECT * FROM ".DB_PREFIX."userinfo where userid=$userid");
		$rs_userinfo=$db->fetch_array($re);
		//手续费率
		$config=$db->query("select freemin,shouxufeilv from ".DB_PREFIX."config");
		$config=$db->fetch_array($config);
        $Trondeo = getRandomString(10);
    	require View::getView('userMoneyAdd');
        View::Output();
}