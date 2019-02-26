<?php
require_once 'common.php';
$action=_G('action');
if($action==''){
	$cateid='';
	$goodname='';
	$is_state='';
	$is_config='';
	$t=_G('t');
	$cons="is_tg=1 and ptfc>0 and price>=10";
	$do=_G('do');
	if($do=='search'){
	    $cateid=_G('cateid','int');
		$goodname=_G('goodname');
		$is_state=_G('is_state');
		$is_config=_G('is_config');
	}
    
	if($cateid!=''){
	    $cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="cateid=$cateid";
	}

	if($goodname!=''){
	    $cons=$cons!='' ? $cons.' AND ' : '';
		$cons.="goodname LIKE '%".$goodname."%'";
	}

	if($is_state!=''){
	    switch($is_state){
		    case 's1': $cons.=" AND is_link_state=1"; break;
			case 's0': $cons.=" AND is_link_state=0"; break;
			default: $cons.="";
		}
	}

	if($is_config!=''){
	    switch($is_config){
		    case 'c1': $cons.=" AND id in(SELECT goodid FROM ".DB_PREFIX."rates)"; break;
			case 'c0': $cons.=" AND id not in(SELECT goodid FROM ".DB_PREFIX."rates)"; break;
			default: $cons.="";
		}
	}

	$cons=$cons!='' ? "WHERE ".$cons." ORDER BY sortid ASC,id DESC" : '';

	$title='商品管理';
	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);

	$ob=new GoodList_Model();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;	
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('?t='.$t.'&cateid='.$cateid.'&is_state='.$is_state.'&is_config='.$is_config.'&goodname='.$goodname.'&do='.$do.'&p=',$page,$totalpage,$totalsize,$pagesize);
    require View::getView('header');
	require View::getView('tg_goodlist');
	require View::getView('footer');
	View::Output();
}

if($action=='add'){
	$title='添加新商品';
	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);
    require View::getView('header');
	require View::getView('goodListAdd');
	require View::getView('footer');
	View::Output();
}

if($action=='addsave'){
    $cateid=_P('cateid','int');
	$goodname=_P('goodname');
	$theme=_P('theme');
	$sortid=_P('sortid','int');
	$price=_P('price','float');
	$cbprice=_P('cbprice','float');
	$invent_report=_P('invent_report','int');
	$is_display=_P('is_display','int');
	$is_paytype=_P('is_paytype','int');
	$is_invent=_P('is_invent','int');
	$is_discount=_P('is_discount','int');
	$is_coupon=_P('is_coupon','int');
	$dis_quantity=isset($_POST['dis_quantity']) ? $_POST['dis_quantity'] : array();
	$dis_price=isset($_POST['dis_price']) ? $_POST['dis_price'] : array();
	$remark=_P('remark');
	$is_display_remark=_P('is_display_remark','int');
	$sitename=_P('sitename');
	$siteurl=_P('siteurl');
	$qq=_P('qq');
	$is_send_mail=_P('is_send_mail','int');
    $is_contact_limit=_P('is_contact_limit','int');
	$is_api=_P('is_api','int');
	$api_return_url=_P('api_return_url');
	$is_message=_P('is_message','int');
	$is_email=_P('is_email','int');
	$is_pwdforsearch=_P('is_pwdforsearch','int');
	$limit_quantity=_P('limit_quantity','int');
	$is_join_main_link=_P('is_join_main_link','int');
	$is_send_sms=_P('is_send_sms','int');
	$is_tg=_P('is_tg');
	$tghyfc=_P('tghyfc');
	$ptfc=_P('ptfc');
	

	if($goodname==''){
	    Redirect('?add_err=true');
	}

	$ob=new GoodCate_Model();
	if($ob->getUserIDbyCateID($cateid)!=$_SESSION['login_userid']){
        Redirect('?add_err=true');
	}

	$data=array(
	    'userid'=>$_SESSION['login_userid'],
		'cateid'=>$cateid,
		'goodname'=>$goodname,
		'theme'=>$theme,
		'sortid'=>$sortid,
		'price'=>$price,
		'cbprice'=>$cbprice,
		'invent_report'=>$invent_report,
		'is_display'=>$is_display,
		'is_paytype'=>$is_paytype,
		'is_invent'=>$is_invent,
		'is_discount'=>$is_discount,
		'is_coupon'=>$is_coupon,
		'remark'=>$remark,
		'sitename'=>$sitename,
		'siteurl'=>$siteurl,
		'qq'=>$qq,
		'is_state'=>1,
		'is_send_mail'=>$is_send_mail,
		'linkid'=>dwz(time()),
		'is_display_remark'=>$is_display_remark,
		'is_contact_limit'=>$is_contact_limit,
		'is_api'=>$is_api,
		'api_return_url'=>$api_return_url,
		'is_email'=>$is_email,
		'is_message'=>$is_message,
		'is_pwdforsearch'=>$is_pwdforsearch,
		'limit_quantity'=>$limit_quantity,
		'is_join_main_link'=>$is_join_main_link,
		'is_send_sms'=>$is_send_sms,
		'is_tg'=>$is_tg,
		'tghyfc'=>$tghyfc,
		'ptfc'=>$ptfc,
	);
	$is_mima=trim(_P('is_mima'));
	if($is_mima==1 && _P('mima')!=''){
		$data['mima']=md5(trim(_P('mima')));
	}else if($is_mima==0){
		$data['mima']='';
	}
	$ob=new GoodList_Model();
	$goodid=$ob->addData($data);

	if($is_discount && $dis_quantity){
	    $ob=new GoodDiscount_Model();
		$qu=count($dis_quantity);
		for($i=0;$i<$qu;$i++){
			$data=array('goodid'=>$goodid,'dis_quantity'=>$dis_quantity[$i],'dis_price'=>$dis_price[$i]);
		    $ob->addData($data);
		}
	}

	$msg='<span class="green">商品添加成功！</span>';
	$url='goodList.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
}

if($action=='verify'){
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
	$t=_G('t','int');
	$t=$t===false ? 0 : $t;

	$ob=new GoodList_Model();
	if($ob->getUserIDbyGoodID($id)==$_SESSION['login_userid']){
	    $ob->updateData($id,array('is_state'=>$t));
	}
    Redirect(_S('HTTP_REFERER'));
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
	//商品下是否有卡密
	$goods=new Goods_Model();
	if($goods->getDataNum("WHERE goodid=$id AND is_state=0")>0){
	    echo '此商品下存在卡密信息，暂不能删除！';
		exit;
	}
	$ob=new GoodList_Model();
	if($ob->getUserIDbyGoodID($id)==$_SESSION['login_userid']){
	    $ob->deleteData($id);
		$rates=new Rates_Model();
		$rates->deleteData("WHERE userid=".$_SESSION['login_userid']." AND goodid=".$id."");
	}
    echo 'ok';
}

if($action=='edit'){
	$title="修改商品信息";
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$ob=new GoodList_Model();
	if($ob->getUserIDbyGoodID($id)==$_SESSION['login_userid']){
	    $data=$ob->getOneData($id);
	}

	$fromurl=_S('HTTP_REFERER');

	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);

	$discount=new GoodDiscount_Model();
	$goodDiscount=$discount->getData("WHERE goodid=$id");

	require View::getView('header');
	require View::getView('goodListEdit');
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
	$id=_G('id','int');
    $cateid=_P('cateid','int');
	$goodname=_P('goodname');
	$theme=_P('theme');
	$sortid=_P('sortid','int');
	$price=_P('price','float');
	$cbprice=_P('cbprice','float');
	$invent_report=_P('invent_report','int');
	$is_display=_P('is_display','int');
	$is_paytype=_P('is_paytype','int');
	$is_invent=_P('is_invent','int');
	$is_discount=_P('is_discount','int');
	$is_coupon=_P('is_coupon','int');
	$dis_quantity=isset($_POST['dis_quantity']) ? $_POST['dis_quantity'] : array();
	$dis_price=isset($_POST['dis_price']) ? $_POST['dis_price'] : array();
	$remark=_P('remark');
	$sitename=_P('sitename');
	$siteurl=_P('siteurl');
	$qq=_P('qq');
	$is_send_mail=_P('is_send_mail','int');
	$is_display_remark=_P('is_display_remark','int');
	$fromurl=_P('fromurl');
	$is_contact_limit=_P('is_contact_limit','int');
	$is_api=_P('is_api','int');
	$api_return_url=_P('api_return_url');
	$is_message=_P('is_message','int');
	$is_email=_P('is_email','int');
	$is_pwdforsearch=_P('is_pwdforsearch','int');
	$limit_quantity=_P('limit_quantity','int');
	$is_join_main_link=_P('is_join_main_link','int');
	$is_send_sms=_P('is_send_sms','int');
	$is_mima=trim(_P('is_mima'));
	if($is_mima==1 && _P('mima')!=''){
	    $mima=md5(trim(_P('mima')));
	}else if($is_mima==0){
		$mima='';
	}
	

	if($goodname==''){
		$msg='<span class="red">商品编辑失败，商品名称不能为空！</span>';
		$url=$fromurl ? $fromurl : 'goodList.php';

		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();exit;
	}

	$ob=new GoodCate_Model();
	if($ob->getUserIDbyCateID($cateid)!=$_SESSION['login_userid']){
        Redirect('?edit_err=true');
	}

	$data=array(
		'cateid'=>$cateid,
		'goodname'=>$goodname,
		'theme'=>$theme,
		'sortid'=>$sortid,
		'price'=>$price,
		'cbprice'=>$cbprice,
		'invent_report'=>$invent_report,
		'is_display'=>$is_display,
		'is_paytype'=>$is_paytype,
		'is_invent'=>$is_invent,
		'is_discount'=>$is_discount,
		'is_coupon'=>$is_coupon,
		'remark'=>$remark,
		'sitename'=>$sitename,
		'siteurl'=>$siteurl,
		'qq'=>$qq,
		'is_send_mail'=>$is_send_mail,
		'is_display_remark'=>$is_display_remark,
		'is_contact_limit'=>$is_contact_limit,
		'api_return_url'=>$api_return_url,
		'is_email'=>$is_email,
		'is_message'=>$is_message,
		'is_pwdforsearch'=>$is_pwdforsearch,
		'limit_quantity'=>$limit_quantity,
		'is_join_main_link'=>$is_join_main_link,
		'is_send_sms'=>$is_send_sms,
	);
	if($is_mima==1 && _P('mima')!=''){
		$data['mima']=md5(trim(_P('mima')));
	}else if($is_mima==0){
		$data['mima']='';
	}
	$ob=new GoodList_Model();
	if($ob->getUserIDbyGoodID($id)==$_SESSION['login_userid']){
	    $ob->updateData($id,$data);
	}

	if($is_discount && $dis_quantity){
	    $ob=new GoodDiscount_Model();
		$ob->deleteData($id);
		$qu=count($dis_quantity);
		for($i=0;$i<$qu;$i++){
			$data=array('goodid'=>$id,'dis_quantity'=>$dis_quantity[$i],'dis_price'=>$dis_price[$i]);
		    $ob->addData($data);
		}
	}

	$msg='<span class="green">商品编辑成功！</span>';
	$url=$fromurl ? $fromurl : 'goodList.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}

if($action=='saveset'){
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
	$good=new GoodList_Model();
	$goodList=$good->getAllData($_SESSION['login_userid']);
	if($goodList){
		$ob=new GoodList_Model();
	    foreach($goodList as $key=>$val){
			$goodname=_P('goodname_'.$val['id']);
			if($goodname!='' && strlen($goodname)<50){
				$ob->updateData($val['id'],array('goodname'=>$goodname));
			}
		}
	}

	$msg='<span class="green">商品设置保存成功！</span>';
	$url=_S('HTTP_REFERER');

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
}

if($action=='editcate'){
    $id=_G('id','int');
	$id=$id===false ? 0 : $id;	
	if(GoodList_Model::getUserIDbyGoodID($id)==$_SESSION['login_userid']){
		$ob=new GoodList_Model();
		$data=$ob->getOneData($id);

		$cate=new GoodCate_Model();
		$goodCate=$cate->getAllData($_SESSION['login_userid']);
	    require View::getView('goodListCate');
		View::Output();
	}
}

if($action=='editcatesave'){
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
	if(GoodList_Model::getUserIDbyGoodID($id)==$_SESSION['login_userid']){
		$cateid=_P('cateid','int');
		$ob=new GoodCate_Model();
		if($ob->getUserIDbyCateID($cateid)!=$_SESSION['login_userid']){
			Redirect('?edit_err=true');
		}
		$ob=new GoodList_Model();
		$ob->updateData($id,array('cateid'=>$cateid));
	}
	Redirect('?edit_suc=true');
}

if($action=='link'){
    $id=_G('id');
	$goodid=_G('goodid','int');
	$is_link_state=0;
	$good=new GoodList_Model();
	$goodList=$good->getAllData($_SESSION['login_userid']);

	if($goodList){
	    foreach($goodList as $key=>$val){
		    if($goodid==$val['id']){
			    $is_link_state=$val['is_link_state'];
				break;
			}
		}
	}
	require View::getView('goodListLink');
	View::Output();
}

if($action=='op'){
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
	$goodid=_G('id','int');
	$flag='关闭';
	$good=new GoodList_Model();
	$goodList=$good->getAllData($_SESSION['login_userid']);
	if($goodList){
	    foreach($goodList as $key=>$val){
		    if($goodid==$val['id']){
				$ob=new GoodList_Model();
				if($val['is_link_state']==0){
					$ob->updateData($goodid,array('is_link_state'=>1));
					$flag='关闭';
				} else {
					$ob->updateData($goodid,array('is_link_state'=>0));
					$flag='开启';
				}				
			}
		}
	}

	$msg='该链接已'.$flag.'成功！';
	$url=_S('HTTP_REFERER');
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
	$id=$id===false ? 0 : $id;
	//商品下是否有卡密
	$goods=new Goods_Model();
	if($goods->getDataNum("WHERE goodid=$id AND is_state=0")>0){
		$msg='<span class="red">此商品下存在卡密信息，暂不能删除！</span>';
		$url=_S('HTTP_REFERER');
		$img='error';

		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();exit;
	}
	$ob=new GoodList_Model();
	if($ob->getUserIDbyGoodID($id)==$_SESSION['login_userid']){
	    $ob->deleteData($id);
		$rates=new Rates_Model();
		$rates->deleteData("WHERE userid=".$_SESSION['login_userid']." AND goodid=".$id."");
	}
		$msg='<span class="red">商品已成功删除！</span>';
		$url=_S('HTTP_REFERER');
		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();exit;
}
?>