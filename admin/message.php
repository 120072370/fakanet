<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	$title='收件箱 - 站内消息';
	$ob=new Message_Model();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$cons="WHERE to_user=".$_SESSION['login_adminid']." AND is_receiver=0 ORDER BY id DESC";
    $totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('message.php?p=',$page,$totalpage,$totalsize);
    require View::getView('header');
	require View::getView('message');
	require View::getView('footer');
	View::Output();
}

if($action=='outbox'){
	$title='发件箱 - 站内消息';
	$ob=new Message_Model();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$cons="WHERE from_user=".$_SESSION['login_adminid']." AND is_sender=0 ORDER BY id DESC";
    $totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('message.php?action=outbox&p=',$page,$totalpage,$totalsize);
    require View::getView('header');
	require View::getView('message');
	require View::getView('footer');
	View::Output();
}

if($action=='write'){
	$uname=_G('uname');
    $content = _G("content");
    $title = _G("title");

    $reason = _G("reason");
    $orderid = _G("orderid");
    $contact = _G("contact");
    $goodsorderid = _G("goodsorderid");

	require View::getView('CreateMessage');
	View::Output();
}

if($action=='save'){
    $title=_G('title');
	$content=_G('content');
	$to_user=_G('touser');
    $notfiy=_G('notfiy');

    $reason = _G("reason");
    $orderid = _G("orderid");
    $contact = _G("contact");
    $goodsorderid = _G("goodsorderid");
    $notmb = _G("notmb");

	if($to_user=='' || $title=='' || strlen($title)>100 || $content=='' || strlen($content)>200){
	    echo 'error';exit;
	}
	$to_user=Users_Model::getUserIDbyUsername($to_user);
    if($to_user != 0){
        $data=array('from_user'=>$_SESSION['login_adminid'],'to_user'=>$to_user,'title'=>$title,'content'=>$content,'addtime'=>date('Y-m-d H:i:s'));
        $ob=new Message_Model();
        $ob->addData($data);
        //Redirect('?action=outbox&add_suc=true');
        
        if($notfiy){
            $notfiyapi = @new WxNotfiy_Customer();
            if($notmb == 0){
                $remark = "商品订单号：".$goodsorderid."，请到后台查看站内信并及时处理投诉，请将处理结果回复站内信至管理员！";
                $resultnot = $notfiyapi->apiReportNotfiy($to_user,$reason,$contact,"待处理",$remark);
            }else if($notmb == 3){
                $remark = $content;
                $resultwx = $notfiyapi->apiReportJGNotfiy($to_user,'投诉过多',"您已累计被投诉次数大于5次。",$remark);
            }else{
                $remark = $content;
                $resultwx = $notfiyapi->apiReportWGNotfiy($to_user,$reason,"三小时之内不修改立即封号",$remark);
            }
        }
        
        echo 'ok';
    }else
    {
        echo "erro";
    }
	exit;
}

if($action=='view'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$ob=new Message_Model();
	$data=$ob->getOneData($id);
	if($data){
	    if($data['from_user']!=$_SESSION['login_adminid'] && $data['to_user']!=$_SESSION['login_adminid']){
		    $data=array();
		}
	}
	if($data){
		if($data['to_user']==$_SESSION['login_adminid']){
		    $ob->updateData($id,array('is_read'=>1));
		}
	}
	require View::getView('viewMessage');
	View::Output();
}

if($action=='delall'){
    $listid=$_POST['listid'];
	if(count($listid)<=0){
	    Redirect('?del_err_1=true');
	}
	$ob=new Message_Model();
	foreach($listid as $id){
		$id=intval($id);
		$data=$ob->getOneData($id);
		if($data){
			if($data['from_user']==$_SESSION['login_adminid']){
				$ob->deleteData($id,$t='s');
				$ob->updateData($id,array('is_read'=>1));
			}elseif($data['to_user']==$_SESSION['login_adminid']){
				$ob->deleteData($id,$t='r');
				$ob->updateData($id,array('is_read'=>1));

			}
		}
	}
	Redirect('?del_suc=true');
}

if($action=='setAllRead'){
	$db=Mysql::getInstance();
	$db->query("UPDATE ".DB_PREFIX."message SET is_read=1 WHERE to_user=1 AND is_read=0");
	Redirect(_S('HTTP_REFERER'));
}

if($action=='clear'){
    $t='message';
	$fdate=date('Y-m-d',mktime(0,0,0,date('m')-1,01,date('Y')));
	$tdate=date('Y-m-d',mktime(0,0,0,date('m')-1,31,date('Y')));
	require View::getView('clearup');
	View::Output();
}

if($action=='exedeldata'){
    $mtype=_P('mtype');
	$fdate=_P('fdate');
	$tdate=_P('tdate');
	$cons="";
	if($mtype){
		$cons.=$cons ? ' AND ' : '';
		switch($mtype){
			case 'send': $cons.="from_user=1"; break;
			case 'receive': $cons.="to_user=1"; break;
			case 'all': $cons.="(from_user=1 or to_user=1)"; break;
			default: $cons.="(from_user=1 or to_user=1)";
		}
	}

	if(isDate($fdate)){
	    $cons.=$cons ? ' AND ' : '';
		$cons.="date(addtime)>='".$fdate."'";
	}

	if(isDate($tdate)){
	    $cons.=$cons ? ' AND ' : '';
		$cons.="date(addtime)<='".$tdate."'";
	}
    
	$cons=$cons ? 'WHERE '.$cons : '';

	$db=Mysql::getInstance();
	$db->query("DELETE FROM ".DB_PREFIX."message $cons");
	Redirect('?del_suc=true');
}
?>