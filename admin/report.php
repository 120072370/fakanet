<?php
require_once 'common.php';

$action=_G('action');

if($action==''){
	$is_read=_G('is_read');
	$is_state=_G('is_state');
	$reason=_G('reason');
	$keyword=_G('keyword');
	$cons='';
	if($is_read){
	    $cons.=$cons ? ' AND ' : '';
		$cons.=$is_read=='r0' ? "is_read=0" : "is_read=1";
	}

	if($is_state){
	    $cons.=$cons ? ' AND ' : '';
		switch($is_state){
		    case 's0': $cons.="is_state=0"; break;
			case 's1': $cons.="is_state=1"; break;
			case 's2': $cons.="is_state=2"; break;
		}
	}

	if($reason){
	    $cons.=$cons ? ' AND ' : '';
		$cons.="reason='$reason'";
	}

	if($keyword){
	    $cons.=$cons ? ' AND ' : '';
		$cons.="contact LIKE '%".$keyword."%' OR userid=".Users_Model::getUserIDbyUsername($keyword)." OR userid='$keyword' OR orderid='$keyword' ";
	}

	$cons=$cons ? 'WHERE '.$cons.' ORDER BY id DESC' : 'ORDER BY id DESC';

	$title='投诉举报';
	$ob=new Report_Model();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
    $totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('report.php?is_read='.$is_read.'&is_state='.$is_state.'&reason='.$reason.'&keyword='.$keyword.'&p=',$page,$totalpage,$totalsize);
    require View::getView('header');
	require View::getView('report');
	require View::getView('footer');
	View::Output();
}

if($action=='write'){
	$id=_G('id','int');
	require View::getView('reportResult');
	View::Output();
}

if($action=='save'){
    $id=_G('id','int');
	$content=_G('content');
	if(!$id || !$content){
	    echo 'error';exit;
	}
	$data=array('result'=>$content,'updatetime'=>time());
	$ob=new Report_Model();
	$ob->updateData($id,$data);
	echo 'ok';
	exit;
}

if($action=='view'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$ob=new Report_Model();
	$data=$ob->getOneData($id);
	if($data){
		if($data['id']==$id){
		    $ob->updateData($id,array('is_read'=>1));
		}
	}
	require View::getView('viewReport');
	View::Output();
}

if($action=='del'){
    $id=_G('id','int');
    $id=$id===false ? 0 : $id;
	$ob=new Report_Model();
    $ob->deleteData($id);
    echo 'ok';
}

if($action=='delall'){
    $listid=$_POST['listid'];
	if(count($listid)<=0){
	    Redirect('?del_err_1=true');
	}
	$ob=new Report_Model();
	foreach($listid as $id){
        $ob->deleteData(intval($id));
	}
	Redirect('?del_suc=true');
}

if($action=='setAllRead'){
	$db=Mysql::getInstance();
	$db->query("UPDATE ".DB_PREFIX."complaints SET is_read=1 WHERE is_read=0");
	Redirect(_S('HTTP_REFERER'));
}

if($action=='updateState'){
	$id=_G('id','int');
	$t=_G('t','int');
    $to_user= _G('userid','int');

    $reason =_G("reason");
    $contact =_G("contact");
    $orderid = _G("orderid");
    $notfiy =_G("notfiy");
	$ob=new Report_Model();
	$ob->updateData($id,array('is_state'=>$t));
    if($notfiy){
        if($t ==2){
            $notfiyapi = @new WxNotfiy_Customer();
            $remark = "投诉凭证号：".$orderid."的投诉信息已成功处理，感谢您的配合！";
            $resultnot = $notfiyapi->apiReportNotfiy($to_user,$reason,$contact,"已处理",$remark,"#2D7218");
        }
    }


	Redirect(_S('HTTP_REFERER'));
}
?>