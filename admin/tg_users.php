<?php
require_once 'common.php';

$action=_G('action');
$ob=new Users_Model();

if($action==''){
	$cons='';
    $do=_G('do');
	$keyword=_G('keyword');
	$ctype=_G('ctype','int');
	$t=_G('t');
	if($keyword!=''){
		$cons.=$cons ? ' AND ' : '';
		$cons.="id='$keyword' OR username like '%".$keyword."%' or qq like '%".$keyword."%' or tel like '%".$keyword."%' or email like '%".$keyword."%' OR id in(SELECT userid FROM ".DB_PREFIX."userinfo WHERE realname like '%".$keyword."%')";
	}
	
	if($ctype){
		$cons.=$cons ? ' AND ' : '';
		$cons.="ctype=$ctype";
	}
	if($t){
		switch($t){
		    case 'st0': $t1=0;break;
			case 'st1': $t1=1;break;
			case 'st2': $t1=2;break;
			default: $t1=0;
		}
		$cons.=$cons ? ' AND ' : '';
	    $cons.="is_state=$t1";
	}
	$cons=$cons ? "WHERE ($cons) and istg=1" : 'WHERE  istg=1';
	$page=_G('p','int');
	if($page==false) $page=1;
	$pagesize=20;
	$cons=$cons!='' ? $cons." ORDER BY id DESC" : "ORDER BY id DESC";
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize / $pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$PageList=getpagelist('?do='.$do.'&keyword='.$keyword.'&ctype='.$ctype.'&t='.$t.'&p=' , $page , $totalpage , $totalsize);
	require View::getView('header');
	require View::getView('tg_users');
	require View::getView('footer');
	View::Output();
}

if(in_array($action, array('auth', 'accept', 'reject', 'accept_all', 'reject_all' ))){
	$auth = new Auth_Model();
	if($action != 'auth'){
		$entity = $auth->getOneData($_GET['id']);
	}	
	if($_GET['action'] == 'accept'){		
		$auth->updateData($_GET['id'], array('status' => 1));
		$row = $auth->getDataNum("where user_id = {$entity['user_id']} AND status = 1");
		if($row >= 5){
			$ob->updateData($_GET[id], array('is_auth' => 1));
		}		
	}else if($_GET['action'] == 'reject'){
		$auth->updateData($_GET['id'], array('status' => -1));
		$row = $auth->getDataNum("where user_id = {$entity['user_id']} AND status = 2");
		if($row < 1){
			$ob->updateData($_GET[id], array('is_auth' => -1));
		}		
	}else if($_GET['action'] == 'accept_all'){
		$ob->updateData($_GET[id], array('is_auth' => 1));
		$auth->updateAll($_GET['id'], array('status' => 1));
	}else if($_GET['action'] == 'reject_all'){
		$ob->updateData($_GET[id], array('is_auth' => 0));
		$auth->updateAll($_GET['id'], array('status' => -1));
	}
	$list = $auth->getData(1, 10, "where user_id = " . ($action == 'auth' ? $_GET['id'] : $entity['user_id']));
	$user = $ob->getOneData(($action == 'auth' ? $_GET['id'] : $entity['user_id']));
	require View::getView('header');
    require View::getView('userAuth');
	require View::getView('footer');
	View::Output();
}

if($action=='add'){
	require View::getView('header');
    require View::getView('usersRegister');
	require View::getView('footer');
	View::Output();
}

if($action=='addsave'){
    $username=_P('username');
    $userpass=_P('userpass');
    $is_state=_P('is_state','int');
	$ctype=_P('ctype','int');
    $email=_P('email');
    $qq=_P('qq');
    $tel=_P('tel');
    $utype=2;
    $istg = _P("is_tg",'int');
	$sitename=_P('sitename');
	$siteurl=_P('siteurl');
	$is_user_popup=_P('is_user_popup','int');
	$is_search_tips=_P('is_search_tips','int');
	$statistics=isset($_POST['statistics']) ? $_POST['statistics'] : '';
    if($username=='' || $userpass=='' || $qq==''  || $tel=='' || $utype==''){
	    Redirect('?add_err_1=true');
	}
    if($ob->getUserIDbyUsername($username)){
	    Redirect('?add_err_2=true');
	}
	//create userkey
	$userkey=dwz($username,6);
    $data=array(
        'username'=>$username,
        'userpass'=>md5(md5($userpass)),
        'email'=>$email,
        'qq'=>$qq,
        'is_state'=>$is_state,
        'tel'=>$tel,
        'utype'=>$utype,
		'sitename'=>$sitename,
		'siteurl'=>$siteurl,
        'addtime'=>date('Y-m-d H:i:s'),
		'userkey'=>strtoupper($userkey),
		'statistics'=>$statistics,
		'ctype'=>$ctype,
		'is_user_popup'=>$is_user_popup,
		'is_search_tips'=>$is_search_tips,
        'istg'=>$istg
    );
    $ob->addData($data);
	$userid=Users_Model::getUserIDbyUsername($username);
	//建立商户账户
	$userMoney=new UserMoney_Model();
	$userMoney->addData(array('userid'=>$userid));
	//建立商户收款信息
	$userInfo=new UserInfo_Model();
	$userInfo->addData(array('userid'=>$userid));
	//建立商户分成
	$userPrice=new UserPrice_Model();
	$Cache=Cache::getInstance();
	$channels=$Cache->get('channelList');
	if($channels){
		foreach($channels as $key=>$val){
	        $userPrice->addData(array('userid'=>$userid,'price'=>$val['price'],'channelid'=>$val['id']));
		}
	}

    Redirect('?add_suc=true');
}

if($action=='del'){
    $id=_G('id','int');
    $id=$id===false ? 0 : $id;
    $ob->deleteData($id);
    echo 'ok';
}

if($action=='delall'){
    $ids=isset($_POST['listsid']) ? $_POST['listsid'] : array();
    if(count($ids)==0)Redirect('?del_err=true');
    foreach($ids as $id){
        $ob->deleteData(intval($id));
    }
    Redirect('?del_suc=true');
}

if($action=='edit'){
    $id=_G('id','int');
    $id=$id===false ? 0 : $id;
    $data=$ob->getOneData($id);
    extract($data);
    require View::getView('header');
	require View::getView('usersEdit');
	require View::getView('footer');
    View::Output();
}

if($action=='editsave'){
    $id=_G('id','int');
    $id=$id===false ? 0 : $id;
    $userpass=_P('userpass');
    $is_state=_P('is_state','int');
    $email=_P('email');
    $qq=_P('qq');
    $tel=_P('tel');
    $utype=2;
	$is_user_popup=_P('is_user_popup','int');
	$is_apply_settlement=_P('is_apply_settlement','int');
	$sitename=_P('sitename');
	$siteurl=_P('siteurl');
	$theme=_P('theme');
	$template=_P('template');
	$ctype=_P('ctype','int');
	$statistics=isset($_POST['statistics']) ? $_POST['statistics'] : '';
	$go_page_theme=_P('go_page_theme');
	$is_api=_P('is_api','int');
	$api_key=_P('api_key');
	$is_search_tips=_P('is_search_tips','int');
	$userkey=_P('userkey');
	$superman=_P('superman','int');
	$app_uid=_P('app_uid');
	$app_state=_P('app_state');

    $data=array(
        'qq'=>$qq,
        'email'=>$email,
        'is_state'=>$is_state,
        'tel'=>$tel,
        'utype'=>$utype,
		'sitename'=>$sitename,
		'siteurl'=>$siteurl,
		'statistics'=>$statistics,
		'is_user_popup'=>$is_user_popup,
		'is_apply_settlement'=>$is_apply_settlement,
		'theme'=>$theme,
		'template'=>$template,
		'ctype'=>$ctype,
		'go_page_theme'=>$go_page_theme,
		'is_api'=>$is_api,
		'api_key'=>$api_key,
		'is_search_tips'=>$is_search_tips,
		'userkey'=>$userkey,
		'superman'=>$superman,
		'app_uid'=>$app_uid,
		'app_state'=>$app_state,
    );
    if($userpass!='') $data=$data+array('userpass'=>md5(md5($userpass)));
    $ob->updateData($id,$data);
    
	$msg='<span class="green">编辑保存成功！</span>';
	$img='success';
	$url=_S('HTTP_REFERER');                
	require View::getView('header');
	require View::getView('msg');
	require View::getView('footer');
	View::Output();
}

if($action=='setUserPrice'){
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$ob=new UserPrice_Model();
	$data=$ob->getData("WHERE userid=$id order by channelid asc");
	$userPrice=array();
	if($data){
	    foreach($data as $key=>$val){
	        if($id==$val['userid']){
		        $userPrice[]=array('channelid'=>$val['channelid'],'channelname'=>$val['channelname'],'id'=>$val['id'],'price'=>$val['price'],'is_state'=>$val['is_state']);
		    }
	    }
	}
    require View::getView('userPrice');
	View::Output();
}

if($action=='saveUserPrice'){
	$userid=_G('userid','int');
	$userPrice=new UserPrice_Model();
	$data=$userPrice->getOneData($userid);
	if($data){
	    foreach($data as $key=>$val){
	        $price=_P('price_'.$val['id'],'float');
			$is_state=_P('is_state_'.$val['id'],'int');
		    $userPrice->updateData($val['id'],array('price'=>$price,'is_state'=>$is_state));
	    }
	}
	Redirect(_S('HTTP_REFERER'),'设置成功！');
}

if($action=='message'){
	$uname=_G('uname');
    require View::getView('CreateMessage');
	View::Output();
}

if($action=='loginusercenter'){
    $userid=_G('id','int');
	$data=$ob->getOneData($userid);
	if($data){
		$_SESSION['login_username']=$data['username'];
		$_SESSION['login_userid']=$userid;
		$_SESSION['login_session_verify']=sha1($data['username'].$userid.WY_CACHE_TOKEN);
		$_SESSION['login_userkey']=$data['userkey'];
		$_SESSION['login_session_id']=$data['verifycode'];
		$_SESSION['login_user_lastaccess']=date('Y-m-d H:i:s');
		$_SESSION['login_user_theme']=$data['theme'];
		$_SESSION['login_logtime']='';
		$_SESSION['login_logip']='';
		$_SESSION['login_user_safe_key']=false;
		$_SESSION['login_user_pwcard']=true;
		$_SESSION['login_user_ctype']=$data['ctype'];
		$_SESSION['is_apply_settlement']=$data['is_apply_settlement'];
		$_SESSION['login_is_api']=$data['is_api'];
		$_SESSION['loginforadmin']=true;
		$_SESSION['istg']=$data['istg'];
	}
	Redirect('../usr/');
}

if($action=='getuserinfo'){
    $userid=_G('userid','int');
	$userid=$userid==false ? 0 : $userid;
	$user=new Users_Model();
	$data=$user->getOneData($userid);
	if($data){
	    require View::getView('viewuserinfo');
		View::Output();
		exit;
	}
}

if($action=='deldata'){
    $t='users';
	require View::getView('clearup');
	View::Output();
	exit;
}

if($action=='exedeldata'){
	$day=_P('day');
	$day=$day==false || $day<15 ? 15 : $day;
	require View::getView('header');	
	
	if($day){
		$user=new Users_Model();
		$users=$user->getAllData();
		if($users){
			$userLogs=new UserLogs_Model();
		    foreach($users as $key=>$val){
			    $data=$userLogs->getOneData($val['id']);
				$formatdate1=strtotime(date('Y-m-d H:i:s'));
				$formatdate2=$data ? strtotime($data['logtime']) : $formatdate1;
				$d=ceil(($formatdate1-$formatdate2)/60/60/24);
				if($d>=$day){
				    $ob->deleteData($val['id']);
				}
			}
		}

		$msg='<span class="green">已成功清除当前商户记录！</span>';
		$img='success';
		$url=_S('HTTP_REFERER');		
		require View::getView('msg');
	} else {
		$msg='<span class="red">商户记录清除失败！</span>';
		$img='error';
		$url=_S('HTTP_REFERER');
	    require View::getView('msg');
	}
	require View::getView('footer');
	View::Output();
}

if($action=='verifyuser'){
    $userid=_G('userid','int');
	$t=_G('t','int');
	$userid=$userid==false ? 0 : $userid;
	//$t=$t ? 1 : 0;
    $ob->updateData($userid,array('is_state'=>$t));
	Redirect(_S('HTTP_REFERER'));
}

if($action=='popupforuser'){
    $userid=_G('userid','int');
	$t=_G('t','int');
	$userid=$userid==false ? 0 : $userid;
    $ob->updateData($userid,array('is_user_popup'=>$t));
	Redirect(_S('HTTP_REFERER'));
}

if($action=='applyforuser'){
    $userid=_G('userid','int');
	$t=_G('t','int');
	$userid=$userid==false ? 0 : $userid;
	$t=$t ? 1 : 0;
    $ob->updateData($userid,array('is_apply_settlement'=>$t));
	Redirect(_S('HTTP_REFERER'));
}

if($action=='ctype'){
    $userid=_G('userid','int');
	$t=_G('t','int');
	$userid=$userid==false ? 0 : $userid;
	$t1=$t==2 ? 1 : 0;
    $ob->updateData($userid,array('ctype'=>$t,'is_apply_settlement'=>$t1));
	Redirect(_S('HTTP_REFERER'));
}

if($action=='getApiKey'){
	$length=_G('length');
	if($length=='32'){
        echo strtolower(getRandomString($length));exit;
	} else {
	    echo getRandomString($length);exit;
	}
}