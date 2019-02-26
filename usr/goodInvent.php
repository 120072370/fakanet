<?php
require_once 'common.php';
$action=_G('action');
if($action==''){
	$goodid=_G('goodid','int');
	$cateid='';
	$goodname='';
	$cons="userid=".$_SESSION['login_userid']." AND is_state=0";
	$do=_G('do');
	if($do=='search'){
	    $cateid=_G('cateid','int');
	}
    
	if($cateid!=''){
	    $cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="goodid in(SELECT id FROM ".DB_PREFIX."goodlist WHERE cateid=$cateid)";
	}

	if($goodid!=''){
	    $cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="goodid=$goodid";
	}

	$cons=$cons!='' ? "WHERE ".$cons." ORDER BY id DESC" : '';

	$title='库存卡密';
	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);

	$good=new GoodList_Model();
	$goodList=$good->getAllData($_SESSION['login_userid']);

	$ob=new Goods_Model();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;	
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('?cateid='.$cateid.'&goodid='.$goodid.'&do='.$do.'&p=',$page,$totalpage,$totalsize,$pagesize);
    require View::getView('header');
	require View::getView('goodInvent');
	require View::getView('footer');
	View::Output();
}

if($action=='del'){
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
	$id=_G('id','int');	
	$id=$id===false ? 0 : $id;	
	if(Goods_Model::getUserIDbyRecordID($id)==$_SESSION['login_userid']){
		$ob=new Goods_Model();
	    $ob->deleteData($id);
	}
    echo 'ok';
}

if($action=='delall'){
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
    $listid=$_POST['listid'];
	if(count($listid)<=0){
	    Redirect('?del_err_1=true');
	}
	$ob=new Goods_Model();
	foreach($listid as $id){
	    if(Goods_Model::getUserIDbyRecordID($id)==$_SESSION['login_userid']){
		    $ob->deleteData($id);
		}
	}
	Redirect(_S('HTTP_REFERER'),'清除成功！');
}

if($action=='delForMobile'){
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
	$id=_G('id','int');	
	$id=$id===false ? 0 : $id;	
	if(Goods_Model::getUserIDbyRecordID($id)==$_SESSION['login_userid']){
		$ob=new Goods_Model();
	    $ob->deleteData($id);
	}
    Redirect(_S('HTTP_REFERER'),'卡密删除成功！');
}

if($action=='delForGoodID'){
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
    $goodid=_G('goodid');
	if(!$goodid){
	    Redirect(_S('HTTP_REFERER'));
	}

	$db=Mysql::getInstance();
	$result=$db->query("SELECT id FROM ".DB_PREFIX."goods WHERE is_state=0 AND goodid=$goodid AND userid=".$_SESSION['login_userid']."");
	if($db->num_rows($result)){
	    while($row=$db->fetch_array($result)){
		    $res=$db->query("SELECT orderid FROM ".DB_PREFIX."selllist WHERE cardid=".$row['id']."");
			if($db->num_rows($res)){
				while($row2=$db->fetch_array($res)){
			        $db->query("UPDATE ".DB_PREFIX."buylist SET is_receive=0 WHERE orderid='".$row2['orderid']."'");
					$db->query("DELETE FROM ".DB_PREFIX."selllist WHERE cardid=".$row['id']."");
				}
			}
          $db->query("DELETE FROM ".DB_PREFIX."goods WHERE id=".$row['id']."");
		}
	}
	Redirect(_S('HTTP_REFERER'),'此商品卡密信息清除成功！');
}

if($action=='export'){
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
	$cateid=_G('cateid','int');
	$goodid=_G('goodid','int');	
	$cons="WHERE userid=".$_SESSION['login_userid']."";
	$lists='';
    
	//$content="商品名称\t\t卡号\t\t密码\t\t时间\r\n";
    $content="商品名称\t\t卡密\r\n";
	if($cateid){
	    $cons="WHERE is_state=0 AND userid=".$_SESSION['login_userid']." AND goodid in(SELECT id FROM ".DB_PREFIX."goodlist WHERE cateid=".$cateid.")";
	}

	if($goodid){
	    $cons="WHERE is_state=0 AND userid=".$_SESSION['login_userid']." AND goodid=".$goodid."";
	}

	$ob=new Goods_Model();
	$data=$ob->getAllData($cons);
	if($data){
		foreach($data as $key=>$val){
			$cardpwd=$val['cardpwd'] ? $val['cardpwd'] : '';
			//$lists.="".$val['goodname']."\t\t".$val['cardnum']."\t\t".$cardpwd."\t\t".$val['addtime']."\r\n";			
            $lists.="".$val['goodname']."\t\t".$val['cardnum'].$cardpwd."\r\n";			
		}
	}

	$content.=$lists;

	$filename='库存卡信息_'.date('Y').date('m').date('d').'.txt';

    exportFile($filename,$content);
}
?>