<?php
require_once 'common.php';
$action=_G('action');
$goodid=_G('goodid','int');
$cateid=_G('cateid','int');

if($action==''){
	$title='换购价值设置';
	$goodprice=100;
	$cons="userid=".$_SESSION['login_userid']."";
	if($cateid!=''){
		$cons="WHERE userid=".$_SESSION['login_userid']." AND cateid=$cateid";
		$ob=new GoodCate_Model();
		$str='您现在修改是分类：<span class="blue">'.$ob->getCatenamebyCateID($cateid).'</span> 的价值比率';
	}

	if($goodid!=''){
		$cons="WHERE userid=".$_SESSION['login_userid']." AND goodid=$goodid";
		$str='您现在修改是商品：<span class="blue">'.GoodList_Model::getGoodnamebyGoodID($goodid).'</span> 的价值比率';
		//商品价格
		$good=new GoodList_Model();
		$goodList=$good->getOneData($goodid);
		$goodprice=$goodList['price'];
	}

	if($cateid=='' && $goodid==''){
	    $cons="WHERE userid=".$_SESSION['login_userid']." AND goodid=0 AND cateid=0";
		$str='';
	}

	$Cache=Cache::getInstance();
	$channels=$Cache->get('channelList');

	$ob=new Rates_Model();
	$data=$ob->getData($cons);
    require View::getView('header');
	require View::getView('rates');
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
    $goodid=_P('goodid','int');
	$cateid=_P('cateid','int');
	if($goodid=='' && $cateid==''){
	    $ob=new Rates_Model();
		$ob->deleteData("WHERE userid=".$_SESSION['login_userid']." AND goodid=0 AND cateid=0");
		$rates=isset($_POST['rate']) ? $_POST['rate'] : array();

		if($rates){
		    foreach($rates as $key=>$val){
			    $ob->addData(array('userid'=>$_SESSION['login_userid'],'channelid'=>$key,'rate'=>$val));
			}
		}

		Redirect('?edit_suc=true');

	} elseif ($cateid!=''){
	    $goodCate=new GoodCate_Model();
		if($goodCate->getUserIDbyCateID($cateid)==$_SESSION['login_userid']){
			$ob=new Rates_Model();
			$ob->deleteData("WHERE userid=".$_SESSION['login_userid']." AND goodid=0 AND cateid=$cateid");
			$rates=isset($_POST['rate']) ? $_POST['rate'] : array();

			if($rates){
				foreach($rates as $key=>$val){
					$ob->addData(array('userid'=>$_SESSION['login_userid'],'channelid'=>$key,'rate'=>$val,'cateid'=>$cateid));
				}
			}
		}

		Redirect('?cateid='.$cateid.'&edit_suc=true');

	} elseif($goodid!=''){

		if(GoodList_Model::getUserIDbyGoodID($goodid)==$_SESSION['login_userid']){
			$ob=new Rates_Model();
			$ob->deleteData("WHERE userid=".$_SESSION['login_userid']." AND goodid=$goodid AND cateid=0");
			$rates=isset($_POST['rate']) ? $_POST['rate'] : array();

			if($rates){
				foreach($rates as $key=>$val){
					$ob->addData(array('userid'=>$_SESSION['login_userid'],'channelid'=>$key,'rate'=>$val,'goodid'=>$goodid));
				}
			}
		}

		Redirect('?goodid='.$goodid.'&edit_suc=true');
	}	
}

if($action=='set'){
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
    if($goodid){
	    if(GoodList_Model::getUserIDbyGoodID($goodid)==$_SESSION['login_userid']){
			$ob=new Rates_Model();
			$ob->deleteData("WHERE userid=".$_SESSION['login_userid']." AND goodid=$goodid AND cateid=0");

			$rates=$ob->getData("WHERE userid=".$_SESSION['login_userid']."");

			if($rates){
			    foreach($rates as $key=>$val){
				    if($val['goodid']==0 && $val['cateid']==0){
					    $ob->addData(array('userid'=>$_SESSION['login_userid'],'channelid'=>$val['channelid'],'rate'=>$val['rate'],'goodid'=>$goodid));
					}
				}
			}
		}
	}

    if($cateid){
		$goodCate=new GoodCate_Model();
	    if($goodCate->getUserIDbyCateID($cateid)==$_SESSION['login_userid']){
			$ob=new Rates_Model();
			$ob->deleteData("WHERE userid=".$_SESSION['login_userid']." AND cateid=$cateid AND goodid=0");
			$rates=$ob->getData("WHERE userid=".$_SESSION['login_userid']."");

			if($rates){
			    foreach($rates as $key=>$val){
				    if($val['goodid']==0 && $val['cateid']==0){
					    $ob->addData(array('userid'=>$_SESSION['login_userid'],'channelid'=>$val['channelid'],'rate'=>$val['rate'],'cateid'=>$cateid));
					}
				}
			}
		}
	}

	Redirect(_S('HTTP_REFERER'));
}
?>