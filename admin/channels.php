<?php
require_once 'common.php';

$action=_G('action');

if($action==''){
    $page=_G('p','int');
	$page=$page==false ? 1 : $page;
	$pagesize=20;
	$ob=new Channels_Model();
	$totalsize=$ob->getDataNum();
	$totalpage=ceil($totalsize/$pagesize);
	$lists=$ob->getData($page,$pagesize);
	$pagelist=getpagelist('?p=',$page,$totalpage,$totalsize);

	$cache=Cache::getInstance();
	$accessProvider=$cache->get('accessProvider');
	require View::getView('header');
	require View::getView('channels');
	require View::getView('footer');
	View::Output();
}

if($action=='add'){
	$Cache=Cache::getInstance();
	$accessProvider=$Cache->get('accessProvider');
	$id=0;
    require View::getView('channelsAdd');
	View::Output();
}

if($action=='addsave'){
    $channelname=_P('channelname');
	$price=_P('price','float');
	$platformPrice=_P('platformPrice','float');
    $accessType=_P('accessProvider');
    $gateway=_P('gateway');
    $sortid=_P('sortid','int');
	$is_state=_P('is_state','int');
	$flag=_P('flag','int');
	$cardlength=_P('cardlength');
	if($channelname=='' || $price=='' || $accessType=='' || $gateway==''){
	   Redirect('?add_err=true');
	}
	//get payid
	$Cache=Cache::getInstance();
	$payList=$Cache->get('payList');
	foreach($payList as $key=>$val){
	    if($accessType==$val['accessType'] && $gateway==$val['gateway']){
		    $payid=$val['payid'];
			break;
		}
	}
	$data=array(
		'channelname'=>$channelname,
		'price'=>$price,
		'platformPrice'=>$platformPrice,
		'accessType'=>$accessType,
		'gateway'=>$gateway,
		'sortid'=>$sortid,
		'payid'=>$payid,
		'is_state'=>$is_state,
	);

	$ob=new Channels_Model();
	$channelid=$ob->addData($data);
	//为所有商户更新此通道
		$user=new Users_Model();
		$users=$user->getAllData();
	if($users){
		foreach($users as $key=>$val){
			$userid=$val['id'];
			$userPrice=new UserPrice_Model();
			$userPrice->addData(array('userid'=>$userid,'channelid'=>$channelid,'price'=>$price));
		}
	}
	$Cache->updateCache('channelList');

	//保存卡密位数
	$db=Mysql::getInstance();
	$db->query("UPDATE ".DB_PREFIX."pay SET paylength='$cardlength' WHERE payid=$payid");
	$Cache->updateCache('pay');
	Redirect('?add_suc=true');
}

if($action=='edit'){
    $id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$ob=new Channels_Model();
	$data=$ob->getOneData($id);
	extract($data);
	$Cache=Cache::getInstance();
	$accessProvider=$Cache->get('accessProvider');
	$cardlength='0|0';
	$pay=$Cache->get('pay');
	foreach($pay as $key=>$val){
	    if($payid==$val['payid']){
		    $cardlength=$val['paylength'];
			break;
		}
	}
	require View::getView('channelsEdit');
	View::Output();
}

if($action=='editsave'){
	$id=_G('id','int');
    $channelname=_P('channelname');
	$price=_P('price','float');
	$platformPrice=_P('platformPrice','float');
    $accessType=_P('accessProvider');
    $gateway=_P('gateway');
    $sortid=_P('sortid','int');
	$is_state=_P('is_state','int');
	$flag=_P('flag','int');
	$cardlength=_P('cardlength');
	if($channelname=='' || $price=='' || $accessType=='' || $gateway==''){
	    Redirect('?edit_err=true');
	}
	//get payid
	$Cache=Cache::getInstance();
	$payList=$Cache->get('payList');
	foreach($payList as $key=>$val){
	    if($accessType==$val['accessType'] && $gateway==$val['gateway']){
		    $payid=$val['payid'];
			break;
		}
	}

	$data=array(
		'channelname'=>$channelname,
		'price'=>$price,
		'platformPrice'=>$platformPrice,
		'accessType'=>$accessType,
		'gateway'=>$gateway,
		'sortid'=>$sortid,
		'payid'=>$payid,
		'is_state'=>$is_state,
	);


	$ob=new Channels_Model();
	$ob->updateData($id,$data);
	//if($flag){//为所有商户更新此通道		
		$UP=new UserPrice_Model();
		$userPrice=$UP->getData("WHERE channelid=$id");
		//更新所有的channel信息
		
		foreach($userPrice as $key=>$val){
		    if($val['channelid']==$id){
			    $UP->updateData($val['id'],array('price'=>$price));
			}
		}

		//检查所有用户的channelList
		$user=new Users_Model();
		$users=$user->getAllData();
		if($users){
		    foreach($users as $key=>$val){
			    $userPrice=$UP->getData("WHERE userid=".$val['id']." AND channelid=".$id."");
				if(!$userPrice){
			        $UP->addData(array('userid'=>$val['id'],'channelid'=>$id,'price'=>$price,'is_state'=>$is_state));
				}
			}			
		}
	//}
	
	$Cache->updateCache('channelList');

	//保存卡密位数
	$db=Mysql::getInstance();
	$db->query("UPDATE ".DB_PREFIX."pay SET paylength='$cardlength' WHERE payid=$payid");
	$Cache->updateCache('pay');
	Redirect('?edit_suc=true');
}

if($action=='del'){
    $id=_G('id','int');
	$id=$id===false ? 0 : $id;
	$ob=new Channels_Model();
	$ob->deleteData($id);
	$Cache=Cache::getInstance();
	$Cache->updateCache(array('channelList'));
	echo 'ok';
}

if($action=='delall'){
    $ids=isset($_POST['listsid']) ? $_POST['listsid'] : array();
    if(count($ids)==0)Redirect('?del_err=true');
	$ob=new Channels_Model();
    foreach($ids as $id){
        $ob->deleteData(intval($id));
    }
	$Cache=Cache::getInstance();
	$Cache->updateCache(array('channelList'));
    Redirect('?del_suc=true');
}

if($action=='getGateway'){
    $accessType=_G('accessType');
	$wg=_G('gateway');
	$Cache=Cache::getInstance();
	$paylist=$Cache->get('payList');
	$pay=$Cache->get('pay');
	$gateway=array();
	if($paylist){
	foreach($paylist as $key=>$val){
		if($val['accessType']==$accessType){
			foreach($pay as $key2=>$val2){
			    if($val['payid']==$val2['payid']){
				    $payname=$val2['payname'];
					break;
				}
			}
		    $gateway[]=array('gateway'=>$val['gateway'],'payname'=>$payname);
		}	    
	}
	}

	$gws='';
	if($gateway){
		foreach($gateway as $key=>$val){
			$selected=$wg==$val['gateway'] ? 'selected' : '';
		    $gws.='<option value="'.$val['gateway'].'" '.$selected.'>'.$val['payname'].'</option>'."\n";
		}
	    
	}
	echo '<select name="gateway" class="input"><option value="">请选择网关</option>'.$gws.'</select>';
}

if($action=='changeAccess'){
    $t=_G('t');
	$cache=Cache::getInstance();
	$payList=$cache->get('payList');	
	if($payList){
		$db=Mysql::getInstance();
	    foreach($payList as $key=>$val){
		    if($val['accessType']==$t){
			    $db->query("UPDATE ".DB_PREFIX."channellist SET gateway='".$val['gateway']."',accessType='".$t."' WHERE payid=".$val['payid']."");
			}
		}
	}
	Redirect('?c_suc=true');
}
?>