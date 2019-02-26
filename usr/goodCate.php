<?php
require_once 'common.php';
$action=_G('action');
if($action==''){
	$title='商品分类';
	$ob=new GoodCate_Model();
	$page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$cons="WHERE userid=".$_SESSION['login_userid']." ORDER BY sortid ASC,id DESC";
	$totalsize=$ob->getDataNum($cons);
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize,$cons);
	$pagelist=getpagelist('?p=',$page,$totalpage,$totalsize,$pagesize);
    require View::getView('header');
	require View::getView('goodCate');
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
	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);
	if($goodCate){
		$ob=new GoodCate_Model();
	    foreach($goodCate as $key=>$val){
			$catename=_P('catename_'.$val['id']);
			$sortid=_P('sortid_'.$val['id'],'int');
			if($catename!='' ){
				$ob->updateData($val['id'],array('catename'=>$catename,'sortid'=>$sortid));
			}
		}
	}
	$catename=_P('catename');
	$sortid=_P('sortid','int');
	if($catename!='' && $sortid!=''){
	    $ob=new GoodCate_Model();
		$cateid=$ob->addData(array('userid'=>$_SESSION['login_userid'],'catename'=>$catename,'sortid'=>$sortid,'linkid'=>getRandomString(16)));
	}

	$msg='<span class="green">设置保存成功！</span>';
	$url='goodCate.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
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
	//分类下是否有商品
	$goodList=new GoodList_Model();
	if($goodList->getDataNum("WHERE cateid=$id")>0){
	    echo '此分类下存在商品，暂不能删除！';
		exit;
	}
	$ob=new GoodCate_Model();
	if($ob->getUserIDbyCateID($id)==$_SESSION['login_userid']){
	    $ob->deleteData($id);
		$rates=new Rates_Model();
		$rates->deleteData("WHERE userid=".$_SESSION['login_userid']." AND cateid=".$id."");
	}
    echo 'ok';
}

if($action=='edit'){
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$ob=new GoodCate_Model();
	if($ob->getUserIDbyCateID($id)==$_SESSION['login_userid']){
	    $data=$ob->getOneData($id);
	}
	require View::getView('header');
	require View::getView('goodCateEdit');
	require View::getView('footer');
	View::Output();
}

if($action=='save'){
	if(!$_SESSION['login_user_safe_key']){
		$t='1';
		$wyt='';
		require View::getView('header');
		require View::getView('safepwd');
		require View::getView('footer');
		View::Output();
		exit;
	}
    $id=_G('id','int');
	$id=$id==false ? 0 : $id;
	$catename=_P('catename');
	$sortid=_P('sortid','int');
	$sitename=_P('sitename');
	$siteurl=_P('siteurl');
	$qq=_P('qq');
    $theme=_P('theme');

	if($catename==''){
	    Redirect('?edit_err=true');
	}
	$data=array(
	    'catename'=>$catename,
		'sortid'=>$sortid,
		'sitename'=>$sitename,
		'siteurl'=>$siteurl,
		'qq'=>$qq,
		'theme'=>$theme,
	);
	$ob=new GoodCate_Model();
	if($ob->getUserIDbyCateID($id)==$_SESSION['login_userid']){
	    $data=$ob->updateData($id,$data);
	}

	$msg='<span class="green">设置保存成功！</span>';
	$url='goodCate.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
}

if($action=='link'){
    $id=_G('id');
	$cateid=_G('cateid','int');
	$is_link_state=0;
	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);

	if($goodCate){
	    foreach($goodCate as $key=>$val){
		    if($cateid==$val['id']){
			    $is_link_state=$val['is_link_state'];
				break;
			}
		}
	}
   
    //siteurl
	$siteurl=$wddb->getone("select siteurl from ".DB_PREFIX."config");
	
	
	//短网址
	global $wddb;
	$shoukayuming=$wddb->getone("select shoukayuming from ".DB_PREFIX."config");
	$shoukayuming=preg_split("/[\n\r]+/s", $shoukayuming,-1,PREG_SPLIT_NO_EMPTY);

	$goodurl=array();
	foreach ($shoukayuming as $k => $v) {
		$url='http://'.$v.'/cay/'.$id;
		//if($k==0){
		    $re=wd_http('http://api.t.sina.com.cn/short_url/shorten.json',array('source'=>'1408865487','url_long'=>$url));
			$re=json_decode($re,true);
			$goodurl[$k]=$re[0]['url_short'];
		//}else{
		//	$goodurl[$k]=$url;
		//}
    }


	require View::getView('goodCateLink');
	View::Output();
}

if($action=='op'){
	$cateid=_G('id','int');
	$flag='关闭';
	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($_SESSION['login_userid']);

	if($goodCate){
	    foreach($goodCate as $key=>$val){
		    if($cateid==$val['id']){
				$ob=new GoodCate_Model();
				if($val['is_link_state']==0){
					$ob->updateData($cateid,array('is_link_state'=>1));
					$flag='关闭';
				} else {
					$ob->updateData($cateid,array('is_link_state'=>0));
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

if($action=='add'){
	$title='添加分类';
	require View::getView('header');
	require View::getView('goodCateAdd');
	require View::getView('footer');
	View::Output();
}

if($action=='addsave'){
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
    $catename=_P('catename');
	$sortid=_P('sortid','int');
	$sitename=_P('sitename');
	$siteurl=_P('siteurl');
	$siteurl=$siteurl && strpos(strtolower($siteurl),'http://')>=0 ? str_replace('http://','',strtolower($siteurl)) : $siteurl;
	$qq=_P('qq');
	if($catename==''){
	    Redirect('?edit_err=true');
	}
	$ob=new GoodCate_Model();
	$ob->addData(array('userid'=>$_SESSION['login_userid'],'linkid'=>getRandomString(16),'catename'=>$catename,'sortid'=>$sortid,'sitename'=>$sitename,'siteurl'=>$siteurl,'qq'=>$qq));

	$msg='<span class="green">商品分类添加成功！</span>';
	$url='goodCate.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
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
	//分类下是否有商品
	$goodList=new GoodList_Model();
	if($goodList->getDataNum("WHERE cateid=$id")>0){
	    Redirect('?del_err_1=true');
	}
	$ob=new GoodCate_Model();
	if($ob->getUserIDbyCateID($id)==$_SESSION['login_userid']){
	    $ob->deleteData($id);
		$rates=new Rates_Model();
		$rates->deleteData("WHERE userid=".$_SESSION['login_userid']." AND cateid=".$id."");
	}

	$msg='<span class="green">商品分类删除成功！</span>';
	$url='goodCate.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
}
?>