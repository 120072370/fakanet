<?php
require_once '../init.php';
define('VIEW_PATH',WY_ROOT.'/lin/default/');
$orderid=_G('orderid');
if($orderid==''){
	$msg='出现意外错误，没有找到相关内容！';
    require View::getView('msg');
	View::Output();
	exit;
}
$card_value_url='../view.htm?id=48';

$Cache=Cache::getInstance();
//get config
$config=$Cache->get('config');
$config_sitename=$config['sitename'];
$config_siteurl=$config['siteurl'];
$config_copyright=$config['copyright'];

$sitename='';
$siteurl='';
$qq='';
$is_card_display=0;
$is_bank_display=0;
$is_alipay_display=0;
$is_tenpay_display=0;
$is_weixin_display=0;
$is_ALIWAP_display=0;
$is_QQCODE_display=0;
$is_display=0;

$flag=false;
//订单是否已关闭
$ob=new Orders_Model();
$data=$ob->getOneData($orderid);
if($data){
    $flag=$data['is_state']==1 ? false : true;
	$userid=$data['userid'];
	$price=$data['price']*$data['quantity'];
	$goodname=$data['goodname'];
	$realmoney=$data['realmoney'];
	$goodid=$data['goodid'];
	$channelid=$data['channelid'];
	$quantity=1;
}

if(!$flag){
    $msg='支付链接不存在或已关闭，暂不能购买！';
    require View::getView('msg');
	View::Output();
	exit;
}

$channels=array();
$db=Mysql::getInstance();
$result=$db->query("SELECT c.channelname,c.id,p.imgurl FROM ".DB_PREFIX."userprice as u,".DB_PREFIX."channellist as c,".DB_PREFIX."pay as p WHERE u.channelid=c.id and c.payid=p.payid and u.is_state=0 and c.payid<>24 and c.payid<>25 and c.payid<>26 and c.is_state=0 and userid=$userid");
if($db->num_rows($result)>0){
	$is_card_display=1;
    while($row=$db->fetch_array($result)){
	    $channels[]=array('channelname'=>$row['channelname'],'channelid'=>$row['id'],'imgurl'=>$row['imgurl']);
	}
}

//bankpay state
$UP=new UserPrice_Model();
$userPrice=$UP->getData("WHERE userid=$userid AND is_state=0");
$channelList=$Cache->get('channelList');
if($channelList){
    foreach($channelList as $key=>$val){
	    if($val['payid']==25 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
					$is_alipay_display=1;
					break;
				}
			}
		} else if($val['payid']==26 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
					$is_tenpay_display=1;
					break;
				}
			}
		} else if($val['payid']==27 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
					$is_weixin_display=1;
					break;
				}
			}
		} else if($val['payid']==28 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
					$is_ALIWAP_display=1;
					break;
				}
			}
		} else if($val['payid']==29 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
					$is_QQCODE_display=1;
					break;
				}
			}
		} else if($val['payid']==24 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
				    $is_bank_display=1;
					break;
				}
			}
		}
	}
}

//首显付款
$user=new Users_Model();
$users=$user->getOneData($userid);
if($users){
	$is_paytype=$users['is_paytype'];
	$user_sitename=$users['sitename'];
	$user_siteurl=$users['siteurl'];
	$user_qq=$users['qq'];
	$is_user_paytype=$users['is_paytype'];
	$go_page_theme=$users['go_page_theme'];
}

$goodname='';
if($goodid){
	$good=new GoodList_Model();
    $goodList=$good->getOneData($goodid);
	$flag=false;
	if($goodList){
		$goodname=$goodList['goodname'];
		$is_display=$goodList['is_display'];
		$remark=$goodList['remark'];
		$is_good_paytype=$goodList['is_paytype'];
		$good_sitename=$goodList['sitename']=='' ? $sitename : $goodList['sitename'];
		$good_siteurl=$goodList['siteurl']=='' ? $siteurl : $goodList['siteurl'];
		$good_qq=$goodList['qq']=='' ? $qq : $goodList['qq'];
		$flag=true;
	}
}

if(!$flag){
    $msg='商品不存在下已下架，暂不能购买！';
    require View::getView('msg');
	View::Output();
	exit;
}

$go_page_theme=$go_page_theme ? $go_page_theme : 'default';

$is_paytype=isset($is_good_paytype) && $is_good_paytype ? $is_good_paytype : $is_user_paytype;//首显付款
//$is_display=$is_display!=0 ? $is_paytype : $is_display;

$is_bank_display=$is_bank_display && $is_display==0 ? 1 : $is_bank_display;
$is_card_display=$is_card_display && $is_display==0 ? 1 : $is_card_display;
$is_card_display=$is_bank_display && $is_display==1 ? 0 : $is_card_display;
$is_bank_display=$is_card_display && $is_display==2 ? 0 : $is_bank_display;

if(!$is_bank_display && ($is_paytype==1 || $is_paytype==2)  && !$is_alipay_display && !$is_weixin_display && $is_tenpay_display){$is_paytype=4;}
if(!$is_bank_display && ($is_paytype==1 || $is_paytype==2)  && $is_alipay_display && !$is_weixin_display && !$is_tenpay_display){$is_paytype=3;}
if(!$is_bank_display && ($is_paytype==1 || $is_paytype==2)  && $is_alipay_display && !$is_weixin_display && !$is_tenpay_display){$is_paytype=5;}
if(!$is_bank_display && $is_paytype==1){$is_paytype=2;}
if(!$is_card_display && $is_paytype==2){$is_paytype=1;}
if(!$is_bank_display && !$is_card_display && !$is_alipay_display && !$is_weixin_display && $is_tenpay_display){$is_paytype=4;}
if(!$is_bank_display && !$is_card_display && $is_alipay_display && !$is_weixin_display && !$is_tenpay_display){$is_paytype=3;}
if(!$is_bank_display && !$is_card_display && $is_alipay_display && !$is_weixin_display && $is_tenpay_display){$is_paytype=3;}
if(!$is_bank_display && !$is_card_display && $is_alipay_display && !$is_weixin_display && $is_tenpay_display){$is_paytype=5;}
$sitename=$good_sitename=='' ? $user_sitename : $good_sitename;
$siteurl=$good_siteurl=='' ? $user_siteurl : $good_siteurl;
$qq=$good_qq=='' ? $user_qq : $good_qq;
$title=$goodname!='' ? $goodname.' - ' : '';
$title.= $config['sitename'];
require View::getView('go');
View::Output();
?>