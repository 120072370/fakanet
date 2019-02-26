<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	$title='收件箱 - 站内消息';
	$ob=new Message_Model();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$cons="WHERE to_user=".$_SESSION['login_userid']." AND is_receiver=0 ORDER BY id DESC";
    $totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('message.php?p=',$page,$totalpage,$totalsize,$pagesize);
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
	$cons="WHERE from_user=".$_SESSION['login_userid']." AND is_sender=0 ORDER BY id DESC";
    $totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('message.php?action=outbox&p=',$page,$totalpage,$totalsize,$pagesize);
    require View::getView('header');
	require View::getView('message');
	require View::getView('footer');
	View::Output();
}

if($action=='write'){
	require View::getView('CreateMessage');
	View::Output();
}

if($action=='save'){
    $title=_P('title');
	$content=_P('content');
	$typeid=_P('typeid');
    //$title=='' || strlen($title)>50 ||
	if( $content=='' || strlen($content)>500){
	    Redirect('?add_err=true');
	}
    $title = "来自[".$_SESSION["login_username"]."]的新消息！";
	//$title=$typeid<>'' ? '['.$typeid.'] '.$title : $title;

	$data=array('from_user'=>$_SESSION['login_userid'],'to_user'=>1,'title'=>$title,'content'=>$content,'addtime'=>date('Y-m-d H:i:s'));
	$ob=new Message_Model();
	$ob->addData($data);
	if($typeid){
	    Redirect('green/wenda.php','反馈已提交！非常感谢~！');
	} else {
	    Redirect('?action=outbox&add_suc=true');
	}
}

if($action=='view'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$ob=new Message_Model();
	$data=$ob->getOneData($id);
	if($data){
	    if($data['from_user']!=$_SESSION['login_userid'] && $data['to_user']!=$_SESSION['login_userid']){
		    $data=array();
		}
	}
	if($data){
		if($data['to_user']==$_SESSION['login_userid']){
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
			if($data['from_user']==$_SESSION['login_userid']){
				$ob->deleteData($id,$t='s');
			}elseif($data['to_user']==$_SESSION['login_userid']){
				$ob->deleteData($id,$t='r');
			}
		}
	}
	Redirect('?del_suc=true');
}

if($action=='op'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$ob=new Message_Model();
	$data=$ob->getOneData($id);
	if($data){
	    if($data['to_user']==$_SESSION['login_userid']){
		    if($data['is_read']){
			    $ob->updateData($id,array('is_read'=>0));
			} else {
			    $ob->updateData($id,array('is_read'=>1));
			}
		}
	}
	Redirect(_S('HTTP_REFERER'));
}

if($action=='delForMobile'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$ob=new Message_Model();
	$data=$ob->getOneData($id);
	if($data){
		if($data['from_user']==$_SESSION['login_userid']){
			$ob->deleteData($id,$t='s');
		}elseif($data['to_user']==$_SESSION['login_userid']){
			$ob->deleteData($id,$t='r');
		}
	}

	Redirect('?action=outbox&del_suc=true');
}
?>