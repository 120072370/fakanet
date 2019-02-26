<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	if(!$_SESSION['login_user_safe_key']){
		$t='1';
		$wyt='';
	    $url='coupon.php';
		require View::getView('header');
		require View::getView('safepwd');
		require View::getView('footer');
		View::Output();
		exit;
	}
	$is_state='s1';
	$cateid=0;
	$keyword='';
	$cons="userid=".$_SESSION['login_userid']."";
	$do=_G('do');
	if($do=='search'){
	    $is_state=_G('is_state');
		$cateid=_G('cateid','int');
		$keyword=_G('keyword');
	}
    
	if($is_state!=''){
		switch($is_state){
		    case 's1': $is_state1=0;break;
			case 's2': $is_state1=1;break;
			case 's3': $is_state1=2;break;
			default: $is_state1=0;
		}
	    $cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="is_state=$is_state1";
	}

	if($cateid!=''){
	    $cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="cateid=$cateid";
	}

	if($keyword!=''){
	    $cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="couponcode='$keyword'";
	}

	$cons=$cons!='' ? "WHERE ".$cons." ORDER BY updatetime DESC,id DESC" : '';

	$title='优惠券管理';
	$ob=new GoodCoupon_Model();
	$ob->updateVaid("WHERE userid=".$_SESSION['login_userid']."");
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;	
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('?cateid='.$cateid.'&keyword='.$keyword.'&is_state='.$is_state.'&do='.$do.'&p=',$page,$totalpage,$totalsize,$pagesize);

	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);

    require View::getView('header');
	require View::getView('coupon');
	require View::getView('footer');
	View::Output();
}

if($action=='add'){
	$title='生成优惠券';
	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);
    require View::getView('header');
	require View::getView('couponAdd');
	require View::getView('footer');
	View::Output();
}

if($action=='addsave'){
    $coupon=_P('coupon','int');
	$ctype=_P('ctype','int');
	$quantity=_P('quantity','int');
	$valid=_P('valid','int');
	$cateid=_P('cateid','int');
	$remark=_P('remark');
	$is_export=_P('is_export','int');
	if($coupon==0 || $quantity==0 || $ctype==0){
	    Redirect('?add_err=true');
	}

	$ob=new GoodCoupon_Model();
	$quantity=$quantity>200 ? 200 : $quantity;
	$lists='';
	for($i=1;$i<=$quantity;$i++){
		$couponcode=getRandomString(16);
		$data=array(
			'userid'=>$_SESSION['login_userid'],
			'cateid'=>$cateid,
			'coupon'=>$coupon,
			'ctype'=>$ctype,
			'valid'=>$valid,
			'remark'=>$remark,
			'addtime'=>date('Y-m-d H:i:s'),
			'couponcode'=>$couponcode,
		);
		
		$ob->addData($data);
		$ctype2=$ctype==1 ? '' : '%';
		$lists.="".$couponcode."\t".$coupon.$ctype2."\t".date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d')+$valid,date('Y')))."\t".date('Y-m-d H:i:s')."\r\n";
	}

	if($is_export){
	    $content="优惠券号码\t折扣面额\t有效期至\t生成日期\r\n";
		$filename='优惠券_'.date('Y').date('m').date('d').'.txt';
		$content.=$lists;
		exportFile($filename,$content);
	}

	$msg='<span class="green">恭喜您，成功生成<span class="red"> '.$quantity.' </span>张优惠券！</span>';
	$url='coupon.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
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
	$listid=isset($_POST['listid']) ? $_POST['listid'] : array();
	if(count($listid)==0){
	    Redirect('?del_err_1=true');
	}

	$ob=new GoodCoupon_Model();

	foreach($listid as $id){
	    if(GoodCoupon_Model::getUserIDbyRecordID(intval($id))==$_SESSION['login_userid']){
		    $ob->deleteData(intval($id));
		}
	}

	$msg='<span class="green">成功删除<span class="red"> '.count($listid).' </span>张优惠券！</span>';
	$url=_S('HTTP_REFERER');

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}

if($action=='edit'){
	$title="修改优惠券信息";
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$ob=new GoodCoupon_Model();
	if($ob->getUserIDbyRecordID($id)==$_SESSION['login_userid']){
	    $data=$ob->getOneData($id);
	}

	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);

	require View::getView('header');
	require View::getView('couponEdit');
	require View::getView('footer');
	View::Output();
}

if($action=='editsave'){
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
    $coupon=_P('coupon','int');
	$ctype=_P('ctype','int');
	$valid=_P('valid','int');
	$cateid=_P('cateid','int');
	$remark=_P('remark');
	$id=_G('id','int');
	$id=$id===false ? 0 : $id;
	if($coupon==0 || $ctype==0){
	    Redirect('?edit_err=true');
	}

    $ob=new GoodCoupon_Model();
	$data=array(
		'cateid'=>$cateid,
		'coupon'=>$coupon,
		'ctype'=>$ctype,
		'valid'=>$valid,
		'remark'=>$remark,
		'is_state'=>0,
		'addtime'=>date('Y-m-d H:i:s'),
	);
	
	$ob->updateData($id,$data);

	$msg='<span class="green">优惠券修改保存成功！</span>';
	$url='coupon.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
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
	$id=$id==false ? 0 : $id;
	$ob=new GoodCoupon_Model();
	if(GoodCoupon_Model::getUserIDbyRecordID($id)==$_SESSION['login_userid']){
		$ob->deleteData($id);
    }
	$msg='<span class="green">成功删除<span class="red"> 1 </span>张优惠券！</span>';
	$url=_S('HTTP_REFERER');

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}
?>