<?php
class HandleOrders_Model{
    private $db;
	private $orderid;
	private $realmoney;
	private $t;
	private $userid;

    function __construct($orderid,$realmoney,$t,$payorderids='',$values='',$states=''){
	    $this->db=Mysql::getInstance();
		$this->price=0;
		$this->platformPrice=0;
		$this->orderid=$orderid;
		$this->realmoney=$realmoney;
		$this->t=$t;
		$this->payorderids=$payorderids;
		$this->values=$values;
		$this->states=$states;
		$this->userid=0;
		$this->neworderid=strlen($this->orderid)==20 ? substr($this->orderid,0,16) : $this->orderid;
	}

	private function getPriceRate(){
		//get userprice
		$price=new UserPrice_Model();
		$userPrice=$price->getData("WHERE userid=".$this->userid."");
		if($userPrice && $this->t==1){
			foreach($userPrice as $key=>$val){
				if($val['channelid']==$this->channelid){
					$this->price=$val['price'];
					break;
				}
			}
		}
		//get platformPrice
		$cache=Cache::getInstance();
		$channelList=$cache->get('channelList');
		if($channelList && $this->t==1){
			foreach($channelList as $key=>$val){
				if($val['id']==$this->channelid){
                    if($this->price != $val['price']){
                        $this->platformPrice=1-$this->price;
                    }else{
                        $this->platformPrice=$val['platformPrice'];
                    }
					break;
				}
			}
		}
	}

	function getOrderInfo(){
		$this->orderStatus=0;
	    $result=$this->db->query("SELECT contact,userid,price,goodid,channelid,quantity,is_email,email,is_api,api_username FROM ".DB_PREFIX."buylist WHERE orderid='".$this->neworderid."' AND is_status<>1 AND is_status<>4 LIMIT 1");
		if($this->db->num_rows($result)==1){
		    $row=$this->db->fetch_array($result);
			$this->orderStatus=1;
			$this->money=$row['price']*$row['quantity'];
			$this->userid=$row['userid'];
			$this->contact=$row['contact'];
			$this->goodid=$row['goodid'];
			$this->quantity=$row['quantity'];
			$this->is_email=$row['is_email'];
			$this->email=$row['email'];
			$this->cid=$row['channelid'];
			$this->is_api=$row['is_api'];
			$this->api_username=$row['api_username'];
		}
		return;
	}

    function updateOrderStatusForBank(){
    	global $wddb;
	    $this->getOrderInfo();
		if($this->orderStatus){
			//update order
			$this->db->query("UPDATE ".DB_PREFIX."orderlist SET is_state=".$this->t.",realmoney=".$this->realmoney." WHERE orderid='".$this->orderid."' and channelid<>0 and payorderid<>''");
			
			//更新提成信息
			if($this->t==1){
				$this->updatePrice();
			    $this->updateStatus();				
			    $this->updateUserMoney($smsprice);	
			    
				//发送微信通知
                
				$user=$wddb->getrow("select * from ".DB_PREFIX."users where id=".$this->userid);

                if($user['is_notfiy'] == 1){//是否发送微信模板消息
                    include_once WY_ROOT.'/includes/libs/Weixin/Wxfw.class.php';
                    $config=$wddb->getrow("select * from ".DB_PREFIX."config");
                    $wx=new Wxfw(array(
                        'appid'=>$config['wx_appid'],
                        'secret'=>$config['wx_appsecret']
                    ));
                    $data=array(
                        'touser'=>$user['openid_wx'],
                        'template_id'=>$config['wx_notice_order'],
                        //'url'=>"http://{$_SERVER['HTTP_HOST']}/usr/orders.php?fdate=&tdate=&t=t0&channelid=&is_api=&st=st1&kw=".$this->orderid."&do=search",
                        'url'=>"http://{$_SERVER['HTTP_HOST']}/orderquery.htm?st=orderid&kw=".$this->orderid,
                        'data'=>array(
                            'first'=>array(
                                'value'=>'微奇发卡平台新订单通知',
                            ),
                            'keyword1'=>array(
                                'value'=>$this->orderid  //订单号
                            ),
                            'keyword2'=>array(
                                'value'=>$this->email  //客户名称
                            ),
                            'keyword3'=>array(
                                'value'=>$this->money.'元'  //订单金额
                            ),
                            'keyword4'=>array(
                                'value'=>$this->quantity  //数量
                            ),
                            'keyword5'=>array(
                                'value'=>date('Y年m月d日 H:i',time())
                            ),
                            'remark'=>array(
                                'value'=>'尊敬的商户：感谢您使用微奇发卡，您在本平台有一笔新订单，请注意查收，官方网址 http://'.$_SERVER['HTTP_HOST'].''
                                //'value'=>$this->contact  //联系方式
                            ),
                            
                        ),
                    );
                    $re=$wx->api('message/template/send','',$data,'POST');
                }
				/**
				//发送通知短信
				$smsprice=$wddb->getOne("select smsprice from ".DB_PREFIX."config");
				$is_send_sms=$wddb->getOne("select is_send_sms from ".DB_PREFIX."goodlist as a inner join ".DB_PREFIX."buylist as b on a.id=b.goodid where b.orderid='".$this->orderid."'");
				if($is_send_sms==1){
                $tel=$wddb->getOne("select tel from ".DB_PREFIX."users as a inner join ".DB_PREFIX."buylist as b on a.id=b.userid where b.orderid='".$this->orderid."'");
                $param=array(
                'mobile'=>$tel,
                'action'=>'notice',
                'orderid'=>$this->orderid
                );
                $re=wd_http('http://'.$_SERVER['HTTP_HOST'].'/sms.php',$param);
				}else{
                $smsprice=0;
				}
                 **/
                
			}
		}
	}

	function updateOrderStatusForCard(){
	    global $wddb;		
	    $this->getOrderInfo();
		if($this->orderStatus){
			//update order
			if(strpos($this->payorderids,',')){//卡组处理
			    $arr_payorderid=explode(',',$this->payorderids);
				$arr_value=explode(',',$this->values);
				$arr_state=explode(',',$this->states);
				$count=count($arr_payorderid);

				for($i=0;$i<$count;$i++){
					//实际金额等于0，表示充值卡支付失败
					$t=$arr_value[$i]==0 ? 2 : 1;
				    $this->db->query("UPDATE ".DB_PREFIX."orderlist SET is_state=".$t.",realmoney=".$arr_value[$i].",returnmsg='".$arr_state[$i]."' WHERE orderid='".$this->orderid."' AND cardnum='".$arr_payorderid[$i]."' and channelid<>0 and payorderid<>''");
				}

			} else {//单卡处理
			    $this->db->query("UPDATE ".DB_PREFIX."orderlist SET is_state=".$this->t.",realmoney=".$this->values.",returnmsg='".$this->states."' WHERE orderid='".$this->orderid."' AND cardnum='".$this->payorderids."' and channelid<>0 and payorderid<>''");
			}
			
			//发送微信通知
			$user=$wddb->getrow("select * from ".DB_PREFIX."users where id=".$this->userid);
			include_once WY_ROOT.'/includes/libs/Weixin/Wxfw.class.php';
			$config=$wddb->getrow("select * from ".DB_PREFIX."config");
			$wx=new Wxfw(array(
				'appid'=>$config['wx_appid'],
				'secret'=>$config['wx_appsecret']
			));
			$data=array(
				'touser'=>$user['openid_wx'],
				'template_id'=>$config['wx_notice_order'],
				'url'=>"http://{$_SERVER['HTTP_HOST']}/usr/orders.php?fdate=&tdate=&t=t0&channelid=&is_api=&st=st1&kw=".$this->orderid."&do=search",
				'data'=>array(
					'first'=>array(
						'value'=>'您收到一个新的订单',
						
					),
					'keyword1'=>array(
						'value'=>$this->contact
						
					),
					'keyword2'=>array(
						'value'=>$this->money.'元'
						
					),
					'keyword3'=>array(
						'value'=>$this->orderid
						
					),
					'keyword4'=>array(
						'value'=>date('Y年m月d日 H:i',time())
						
					),
					'remark'=>array(
						'value'=>$this->contact
					),
					
				),
			);
			$re=$wx->api('message/template/send','',$data,'POST');
			
			//发送通知短信
			$smsprice=$wddb->getOne("select smsprice from ".DB_PREFIX."config");
			$is_send_sms=$wddb->getOne("select is_send_sms from ".DB_PREFIX."goodlist as a inner join ".DB_PREFIX."buylist as b on a.id=b.goodid where b.orderid='".$this->orderid."'");
			if($is_send_sms==1){
			    $tel=$wddb->getOne("select tel from ".DB_PREFIX."users as a inner join ".DB_PREFIX."buylist as b on a.id=b.userid where b.orderid='".$this->orderid."'");
				$param=array(
					'mobile'=>$tel,
					'action'=>'notice',
					'orderid'=>$this->orderid
				);
				$re=wd_http('http://'.$_SERVER['HTTP_HOST'].'/sms.php',$param);
			}else{
				$smsprice=0;
			}
			
			$this->updatePrice();
			$this->updateStatus();			
			$this->updateUserMoney($smsprice);
		}
	}

	private function updateStatus(){		
		$this->is_status=0;
		$res=$this->db->query("SELECT sum(realmoney*rates/100) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$this->neworderid."%' AND is_state=1");
		$row2=$this->db->fetch_array($res);
		$realmoney=$row2[0]==null ? 0 : $row2[0];
		$realmoney=number_format($realmoney,2,'.','');
		$this->money=number_format($this->money,2,'.','');

		if($realmoney==0){
			$this->is_status=0;
		} else if($realmoney<$this->money){
			$this->is_status=2;//部分成功
		} else if($realmoney>=$this->money){
			$this->is_status=1;
		}
		$channelid=$this->cid==$this->channelid ? $this->cid : '99999';
		$this->db->query("UPDATE ".DB_PREFIX."buylist SET is_status=".$this->is_status." , channelid=".$channelid." , updatetime='".date('Y-m-d H:i:s')."' WHERE orderid='".$this->neworderid."'");
	}

	private function updatePrice(){
	    $result=$this->db->query("SELECT id,channelid FROM ".DB_PREFIX."orderlist WHERE orderid='".$this->orderid."' and channelid<>0 and payorderid<>''");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
			    $this->channelid=$row['channelid'];
				$this->getPriceRate();
				$this->db->query("UPDATE ".DB_PREFIX."orderlist SET price=".$this->price.", platformPrice=".$this->platformPrice." WHERE id=".$row['id']."");
			}
		}
	}

	private function updateUserMoney($smsprice=0){
		$this->realmoneyForApi=0;
	    if($this->t==1){
		    $result=$this->db->query("SELECT sum(realmoney*price) as income,sum(realmoney) as realmoney FROM ".DB_PREFIX."orderlist WHERE orderid='".$this->orderid."' AND is_state=1 AND is_pay=0 LIMIT 1");
			if($this->db->num_rows($result)==1){
				$row=$this->db->fetch_array($result);
				$income=$row['income']-$smsprice;
				$this->realmoneyForApi=$row['realmoney'];
				$this->db->query("UPDATE ".DB_PREFIX."orderlist SET is_pay=1 WHERE orderid='".$this->orderid."'");
				$this->db->query("UPDATE ".DB_PREFIX."usermoney SET unpaid=unpaid+".$income." WHERE userid=".$this->userid."");
			}
		}

		//成功后操作
		if($this->is_status==1){
		    $this->sendMail();
			$this->apiReturn();
		}
	}

	private function sendMail(){
		//成功后发送邮件
		if($this->is_email && $this->email){
			$price='';
			$goodname='';
			$goodList=new GoodList_Model();
			$data=$goodList->getOneData($this->goodid);
			if($data){
				$price=$data['price'];
				$goodname=$data['goodname'];
			}

			//交易成后发送邮件
			if($price && $goodname){
				$cache=Cache::getInstance();
				$config=$cache->get('config');
				$url='<a href="http://'.$config['siteurl'].'/orderquery.htm?orderid='.$this->neworderid.'">http://'.$config['siteurl'].'/orderquery.htm?orderid='.$this->orderid.'</a>';
				$message = "恭喜您！您的订单已经付款成功，以下是订单详情：<br />";
				$message .= "交易订单号：{$this->neworderid}<br />";
				$message .= "商品名称：{$goodname}<br />";
				$message .= "商品单价：{$price}<br />";
				$message .= "购买数量：{$this->quantity}<br />";
				$message .= "支付结果：{$url}<br />";
				$message .= "(点击打开以上链接可查看到已成功付款的卡密信息)<br />";
                $message .= "WeiQi-微奇发卡全自动发卡引导者，感谢您使用本平台购买商品！";
				sendMail($this->email,'WeiQi-微奇发卡，恭喜您，['.$goodname.']购买成功！',$message);
			}
		}
	}

	private function apiReturn(){
		//API通知
		if($this->is_api){
			$goodList=new GoodList_Model();
			$data=$goodList->getOneData($this->goodid);
			if($data && $data['api_return_url']){
				$api_return_msg='error';
				$is_api_return=2;
				if(GetHttpStatusCode($data['api_return_url'])=='200'){
					$users=new Users_Model();
					$userData=$users->getOneData($this->userid);
					$sign=strtoupper(md5('UserID='.$this->userid.'&ProID='.$this->goodid.'&OrderID='.$this->neworderid.'&Num='.$this->quantity.'&UserName='.$this->api_username.'&Money='.$this->realmoneyForApi.'&Key='.$userData['api_key']));
					$params=array(
						'UserID'=>$this->userid,
						'ProID'=>$this->goodid,
						'OrderID'=>$this->neworderid,
						'Num'=>$this->quantity,
						'UserName'=>$this->api_username,
						'Money'=>$this->realmoneyForApi,
						'Sign'=>$sign,
						);
					$returnMsg=HttpClient::quickPost($data['api_return_url'],$params);
					$returnMsg=trim(strtolower($returnMsg));
					if($returnMsg=='success'){
						$api_return_msg='success';
						$is_api_return=1;
					}
				}//->GetHttpStatusCode!=200
				//更新通知状态
				$this->db->query("UPDATE ".DB_PREFIX."buylist SET is_api_return=$is_api_return,api_return_msg='$api_return_msg' WHERE orderid='".$this->neworderid."'");
			}
		}//->api通知结束
	}
}
?>