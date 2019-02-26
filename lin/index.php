<?php
require_once '../init.php';


$linkid=_G('id');
$from=_G('fromid');
setcookie('fromid',$from);

if($linkid==''){
	$msg='出现意外错误，没有找到相关内容！';
    require_once 'msg.php';
	exit;
}

$card_value_url='../view.htm?id=48';

$Cache=Cache::getInstance();
$userid=false;
$is_card_display=0;
$is_bank_display=0;
$is_alipay_display=0;
$is_tenpay_display=0;
$is_weixin_display=0;
$is_ALIWAP_display=0;
$is_QQCODE_display=0;

$is_alipay_mq_display=0;
$is_wx_mq_display=0;

$good_is_contact_limit=99;
//get goodlist
$catename='';
$goodname='';
$sitename='';
$siteurl='';
$qq='';
$goodid='';
$cateid='';
$is_display=0;
$is_state=1;
$is_coupon=0;
$is_pwdforsearch=0;
$limit_quantity=0;
$min_quantity=1;
$limit_quantity_tip='无法修改购买数量，是因为本商品限制了购买数量。';
$min_quantity_tip='此商品设定了最少购买数量。';
$good=new GoodList_Model();
$goodList=$good->getAllData($linkid,'linkid');
if($goodList){
    foreach($goodList as $key=>$val){
	    if($linkid==$val['linkid']){
			$goodid=$val['id'];
		    $userid=$val['userid'];
			$goodname=$val['goodname'];
			$is_display=$val['is_display'];//支付方式
			$is_state=$val['is_state'];
			$good_is_link_state=$val['is_link_state'];
			$good_theme=$val['theme'];
			$remark=$val['remark'];
			$is_good_paytype=$val['is_paytype'];//首显付款
			$good_sitename=$val['sitename'];
			$good_siteurl=$val['siteurl'];
			$good_qq=$val['qq'];
			$is_coupon=$val['is_coupon'];
			$good_is_contact_limit=$val['is_contact_limit'];
			$is_pwdforsearch=$val['is_pwdforsearch'];
			$limit_quantity=$val['limit_quantity'];
            $min_quantity = $val['min_quantity'];

            
			break;
		}
	}
}

//get goodcate
if(!$userid){
	$cate=new GoodCate_Model();
	$goodCate=$cate->getAllData($linkid,'all');
	if($goodCate){
		foreach($goodCate as $key=>$val){
			if($linkid==$val['linkid']){
				$cateid=$val['id'];
				$userid=$val['userid'];
				$catename=$val['catename'];
				$cate_sitename=$val['sitename']=='' ? $sitename : $val['sitename'];
				$cate_siteurl=$val['siteurl']=='' ? $siteurl : $val['siteurl'];
				$cate_qq=$val['qq']=='' ? $qq : $val['qq'];
				$cate_is_link_state=$val['is_link_state'];
				$cate_theme=$val['theme'];
				break;
			}
		}
	}
}

//get userinfo
$cons=$userid ? "WHERE id=$userid" : "WHERE userkey='$linkid'";
$user=new Users_Model();
$users=$user->getAllData($cons);
if($users){
	foreach($users as $key=>$val){
		$sitename=$val['sitename'];
		$siteurl=$val['siteurl'];
		$qq=$val['qq'];
		$userid=$val['id'];
		$is_user_paytype=$val['is_paytype'];
		$is_contact_limit=$val['is_contact_limit'];
		$is_link_state=$val['is_link_state'];
		$is_user_popup=$val['is_user_popup'];
		$template=$val['template'];
		$statistics=$val['statistics'];
		$userkey=$val['userkey'];
        $siteintr  = $val["siteintr"];
        $is_userstate = $val["is_state"];
        $level = $val['level'];
		$flag=true;
	}
}
$statistics=$statistics ? '<script src="'.$statistics.'" type="text/javascript"></script>' : '';
$is_link_state=isset($is_link_state) ? $is_link_state : 0;
$is_link_state=isset($cate_is_link_state) ? $cate_is_link_state : $is_link_state;
$is_link_state=isset($good_is_link_state) ? $good_is_link_state : $is_link_state;
$is_contact_limit=$good_is_contact_limit==99 ? $is_contact_limit : $good_is_contact_limit;

if($is_userstate == 2 ||$is_userstate == 1){
    $msg='该商户由于违规未处理，已冻结店铺！';
    require_once 'msg.php';
	exit;
}

if(!$userid || $is_link_state || $is_state!=1){
    $msg='商品链接不存在或已下架关闭，暂不能购买！';
    require_once 'msg.php';
	exit;
}


//get config
$config=$Cache->get('config');
$config_sitename=$config['sitename'];
$config_siteurl=$config['siteurl'];
$config_qq=$config['qq'];
$config_tel=$config['tel'];
$config_copyright=$config['copyright'];

$template=isset($cate_theme) && ($cate_theme!='' && $cate_theme!='default') ? $cate_theme : $template;
$template=isset($good_theme) && ($good_theme!='' && $good_theme!='default') ? $good_theme : $template;

$template=$template=='' || $template=='white' ? 'default' : $template;
define('VIEW_PATH',WY_ROOT.'/lin/'.$template.'/');

//get paytype
$channels=array();
$db=Mysql::getInstance();
$result=$db->query("SELECT c.channelname,c.id,p.imgurl FROM ".DB_PREFIX."userprice as u,".DB_PREFIX."channelist as c,".DB_PREFIX."pay as p WHERE u.channelid=c.id and c.payid=p.payid and u.is_state=0 and c.payid<>24 and c.payid<>25 and c.payid<>26 and c.payid<>27 and c.payid<>28 and c.payid<>29 and c.payid<>30 and c.is_state=0 and userid=$userid");
if($db->num_rows($result)>0){
	$is_card_display=1;
    while($row=$db->fetch_array($result)){
	    $channels[]=array('channelname'=>$row['channelname'],'channelid'=>$row['id'],'imgurl'=>$row['imgurl']);
	}
}

//bankpay state
$price=new UserPrice_Model();
$userPrice=$price->getData("WHERE userid=$userid AND is_state=0");

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
                    //if(!isMobile()){
                    //    $is_weixin_display=1;
                    //}else  if(isMobile() &&  is_weixin()){
                    //    $is_weixin_display=1;
                    //}
					break;
				}
			}
		} else if($val['payid']==28 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
					$is_aliwap_display=1;
					break;
				}
			}
	    } else if($val['payid']==29 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
					$is_wxapp_display=1;
					break;
				}
			}
		} else if($val['payid']==30 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
					$is_qqcode_display=1;
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
		}else if($val['payid']==201 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
				    $is_alipay_mq_display=1;
					break;
				}
			}
		}else if($val['payid']==202 && $userPrice){
		    foreach($userPrice as $key2=>$val2){
			    if($val['id']==$val2['channelid']){
				    $is_wx_mq_display=1;
					break;
				}
			}
		}
	}
}

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


$token='';

//get index home
$title=isset($sitename)&&$sitename!='' ? $sitename.'('.$config_sitename.')' : $config_sitename;
$title=isset($catename)&&$catename!='' ? $catename.'('.$config_sitename.')' : $title;
$title=isset($goodname)&&$goodname!='' ? $goodname.'('.$config_sitename.')' : $title;
$sitename=isset($cate_sitename) && $cate_sitename!='' ? $cate_sitename : $sitename;
$sitename=isset($good_sitename) && $good_sitename!='' ? $good_sitename : $sitename;
$siteurl=isset($cate_siteurl) && $cate_siteurl!='' ? $cate_siteurl : $siteurl;
$siteurl=isset($good_siteurl) && $good_siteurl!='' ? $good_siteurl : $siteurl;
$qq=isset($cate_qq) && $cate_qq!='' ? $cate_qq : $qq;
$qq=isset($good_qq) && $good_qq!='' ? $good_qq : $qq;

$user_popup_message='<div style="padding:10px;color:#cc3333;line-height:24px"><p style="float:left;font-size:14px;font-weight:bold;color:blue;">购买须知：</p><div style="float:right; font-size:14px; padding-left:20px;"><a href="#" style="color:#0064ff;text-decoration:none;display:inline-block;background:url(http://'.$config['siteurl'].'/lin/gray/images/x.png) left no-repeat;padding-left:15px;" class="nyroModalClose">关闭</a></div><p style="clear:both;font-size:12px;font-weight:bold;color:red;">本站仅提供发卡服务，相关售后问题请自行联系商家解决，由此产生的交易纠纷，本站概不负责！</p><p style="clear:both;font-size:14px;font-weight:bold;color:red;">如遇支付完成不出卡问题，由于系统缓存，请稍后查询即可！</p></div>';

$user_popup_message2='<div style="padding:10px;color:#333;line-height:25px"><p style="float:left;font-size:14px;font-weight:bold;color:blue">防骗,防损失,防钓鱼,防欺诈,爱发平台安全风险提示如下(建议阅读后再付款购买)：</p><div style="float:right; font-size:14px; padding-left:20px;"><a href="#" style="color:#0064ff;text-decoration:none;display:inline-block;background:url(http://'.$config['siteurl'].'/lin/gray/images/x.png) left no-repeat;padding-left:15px;" class="nyroModalClose">关闭</a></div><p style="clear:both;font-size:14px;font-weight:bold;color:red;">免责声明（向陌生人付款,请注意交易风险,否则造成的经济损失自负！诚信为本，造福于民!）</p><p>01、本站仅是提供自动发卡服务,并非销售商,相关售后问题并不负责,由此产生的交易纠纷由双方自行处理，与本站无关!</p><p>02、本站仅是提供自动发卡服务,并非销售商,只保证卡密正确有效,软件操作使用和相关售后问题请自行联系卖家处理解决!</p><p>03、仅提供卡密有效,建议先咨询卖家软件用途后购买，购买的卡密充值成功表示交易成功,非卡密问题不退款!!!!!</p><p>04、您选择的10元面额但使用30元卡购买，则系统默认为您实际支付金额为10元，高于部分不予退还。</p><p>05、请不要相信和购买低于市场正常价位的商品,充值卡、会议、游戏币、游戏帐号或者装备、QQ业务、破解软件等；</p><p>06、请不要轻易相信任何解封器、刷卡器、刷钻业务、修改器（网络版）等这些夸大事实商品；</p><p>07、购买电影网站充值卡看电影的用户，请先咨询网站销售管理员是否可以正常观看后再买，避免不必要的损失更麻烦！</p><p>08、在购买万成商品后,如果存在问题请立刻(付款当天)联系（'.$config['sitename'].'）进行处理,尽量挽回您的损失!</p><p>09、如果上述分析提示您已经阅读，交易产生后无可挽回的损失及纠纷请自己负责承担！</p><p>10、软件东西大家都清楚,有些软件可能会不更新,或者直接关闭等问题,考虑清楚后购买,风险自担,<strong>同意请继续购买</strong></p><p>11、如果您在支付过程中遇到虚假商品或取卡问题,请与企业客服QQ代表联系：<strong style="color:#800080;text-decoration:underline"><a target="blank" style="color:#800080" href="http://wpa.qq.com/msgrd?v=3&uin='.$config['qq'].'&Site='.$config['sitename'].'&Menu=yes">'.$config_qq.'</a></strong> 服务热线：<strong style="color:red;text-decoration:underline">'.$config_tel.'</strong></p></div>';

$nyroHeight=190;
if($is_user_popup){
    $user_popup_message=$is_user_popup==1 ? $user_popup_message : $user_popup_message2;
	$nyroHeight=$is_user_popup==1 ? 120 : 350;
}

if(isMobile()){
    require View::getView('mobile');
	View::Output();
}else{
	require View::getView('main');
	View::Output();
}
?>