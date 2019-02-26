<?php
class checkgoods_controller{
	private $db;

    function __construct(){
		$this->db=Mysql::getInstance();
	}

	function insertSearch($orderid){
	    $this->db->query("INSERT INTO ".DB_PREFIX."searchlist(orderid,addtime) VALUES('$orderid','".time()."')");
	}
	
	function readSearch($orderid){
		$data=array();
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."searchlist WHERE orderid='$orderid' ORDER BY id DESC");
		if($this->db->num_rows($result)>1){
		    while($row=$this->db->fetch_array($result)){
			    $data[]=$row['addtime'];
			}
		}
		return $data;
	}

	function delSearch($orderid){
	    $this->db->query("DELETE FROM ".DB_PREFIX."searchlist WHERE orderid='$orderid'");
	}

    function display(){
		$orderid=_G('orderid');
		if(!$orderid){
			echo json_encode(
					array(
					'status'=>0,
					'quantity'=>0,
					'msg'=>'抱歉，查询失败！'
					)
				);
			exit;
		}

		//insert		
		$this->insertSearch($orderid);
        //read
		$searchList=$this->readSearch($orderid);
		if($searchList){
		    $d1=$searchList[0];
			$d2=$searchList[1];
			$d3=$d1-$d2;
			if($d3<=2){
				$this->delSearch($orderid);
			    echo json_encode(
						array(
						'status'=>0,
						'quantity'=>0,
						'msg'=>'请求次数太多，无法处理此次查询！'
						)
					);
				exit;
			}
		}

		$this->delSearch($orderid);
		

		//订单状态
		$result=$this->db->query("SELECT price,goodid,quantity,is_receive,is_status,contact FROM ".DB_PREFIX."buylist WHERE orderid='".$orderid."' LIMIT 1");
		if($this->db->num_rows($result)!=1){
			echo json_encode(
					array(
					'status'=>0,
					'quantity'=>0,
					'msg'=>'抱歉，订单查询失败，请稍后重试！'
					)
				);
			exit;   
		}

		$row=$this->db->fetch_array($result);
		
		if($row['is_status']==0){
			echo json_encode(
					array(
					'status'=>0,
					'quantity'=>0,
					'msg'=>'<span style="color:red">订单未付款，请重新支付，或联系客服处理！</span>'
					)
				);
			exit;
		}
		
		if($row['is_status']==2){
			$res=$this->db->query("SELECT sum(realmoney*rates/100) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$orderid."%' AND is_state=1");
			$row2=$this->db->fetch_array($res);
			$realmoney=$row2[0]==null ? 0 : $row2[0];
			
			echo json_encode(
					array(
					'status'=>0,
					'quantity'=>0,
					'msg'=>'已经支付成功'.number_format($realmoney,2,'.','').'元,还需'.number_format($row['price']*$row['quantity']-$realmoney,2,'.','').'元<br /><a href=lin/go.htm?orderid='.$orderid.' target=_blank><span style=font-size:14px;font-weight:bold;color:red>继续支付</span></a>,补足余额后即可发货'
					)
				);

			exit;
		} 
		
		if($row['is_status']==1){

			if($row['is_receive']==1){
				//已领取，获取领取到的卡密
				$goods='';
				$res=$this->db->query("SELECT b.cardnum,b.cardpwd FROM ".DB_PREFIX."selllist as a, ".DB_PREFIX."goods as b WHERE a.cardid=b.id AND a.orderid='".$orderid."'");
				if($this->db->num_rows($res)>0){
					while($row1=$this->db->fetch_array($res)){
						$cardpwd=$row1['cardpwd'] ? '<br />卡密：'.$row1['cardpwd'] : '';
						$goods.=$goods ? '<br />卡号：'.$row1['cardnum'].$cardpwd : '卡号：'.$row1['cardnum'].$cardpwd;
				
					}
				}
					
				echo json_encode(
						array(
						'status'=>1,
						'quantity'=>$row['quantity'],
						'msg'=>$goods
						)
					);

				exit;
			} 
			
			if($row['is_receive']==0){

				//成功，未领取，直接取出卡密
				//购买数量和库存量对比
				$res=$this->db->query("SELECT count(*) FROM ".DB_PREFIX."goods WHERE is_state=0 AND goodid=".$row['goodid']."");
				$row2=$this->db->fetch_array($res);
				$kucun=$row2[0]==null ? 0 : $row2[0];
				if($kucun<$row['quantity']){
					echo json_encode(
						array(
						'status'=>0,
						'quantity'=>0,
						'msg'=>'当前商品库存不足，请联系客服!'
						)
					);
					exit;
				}

				//获取商品
				$goods='';
				$res=$this->db->query("SELECT id,cardnum,cardpwd FROM ".DB_PREFIX."goods WHERE is_state=0 AND goodid=".$row['goodid']." ORDER BY id ASC LIMIT ".$row['quantity']."");
				if($this->db->num_rows($res)>0){
					while($row2=$this->db->fetch_array($res)){
						$cardpwd=$row2['cardpwd'] ? '<br />卡密：'.$row2['cardpwd'] : '';
						$goods.=$goods ? '<br />卡号：'.$row2['cardnum'].$cardpwd : '卡号：'.$row2['cardnum'].$cardpwd;
						//更新商品状态和保存领取信息
						$this->db->query("UPDATE ".DB_PREFIX."goods SET is_state=1,updatetime='".date('Y-m-d H:i:s')."' WHERE id=".$row2['id']."");
						$this->db->query("INSERT INTO ".DB_PREFIX."selllist(orderid,cardid,addtime) VALUES('".$orderid."',".$row2['id'].",'".date('Y-m-d H:i:s')."')");
					}
				} else {
					echo json_encode(
						array(
						'status'=>0,
						'quantity'=>0,
						'msg'=>'当前商品库存不足，请联系客服!'
						)
					);
					exit;
				}

				//更新订单领取状态
				$this->db->query("UPDATE ".DB_PREFIX."buylist SET is_receive=1 WHERE orderid='".$orderid."'");

				echo json_encode(
					array(
					'status'=>1,
					'quantity'=>$row['quantity'],
					'msg'=>$goods
					)
				);
	
				$this->sendMail($row['goodid'],$row['quantity'],$row['contact'],$goods,$orderid);
				exit;
			}
		}

		echo json_encode(
				array(
				'status'=>0,
				'quantity'=>0,
				'msg'=>'抱歉，订单查询失败，请稍后重试！'
				)
			);
		exit;
	}


    function sendMail($goodid,$quantity,$contact,$goods,$orderid){
		//库存报警
		$invent_report=0;
		$is_email=0;
		$is_message=0;
		$goodname='';
		$username='';
		$cache=Cache::getInstance();
		$config=$cache->get('config');

		$good=new GoodList_Model();
		$goodList=$good->getOneData($goodid);

		$invent_report=$goodList['invent_report'];
		$goodname=$goodList['goodname'];
		$userid=$goodList['userid'];
		$is_send_mail=$goodList['is_send_mail'];
		$is_email=$goodList['is_email'];
		$is_message=$goodList['is_message'];

		$user=new Users_Model();
		$users=$user->getOneData($userid);
		$email=$users['email'];
		$username=$users['username'];

		if($invent_report>0 && $email && ($is_email || $is_message)){
			$res=$this->db->query("SELECT count(*) FROM ".DB_PREFIX."goods WHERE goodid=".$goodid." AND is_state=0");
			$row2=$this->db->fetch_array($res);
			$kucun=$row2[0]==null ? 0 : $row2[0];
			if($kucun<=$invent_report){
				$message = "尊敬的用户{$username}，您托管销售的[{$goodname}]商品的库存数量不足 (当前还有[{$kucun}]张)，请您注意添加库存哦！";
				if($is_email){
					sendMail($email,$config['sitename'].' ['.$goodname.']商品库存数量不足提示！',$message);
				}
				if($is_message){
					$title='您的['.$goodname.']商品库存数量不足提醒！';
					$data=array('from_user'=>1,'to_user'=>$userid,'title'=>$title,'content'=>$message,'addtime'=>date('Y-m-d H:i:s'));
					$ob=new Message_Model();
					$ob->addData($data);
				}
			}
		}


		
	
		//发卡成功后发送邮件
		if($is_send_mail && $email){
			$message="尊敬的用户{$username}，您托管销售的[{$goodname}]商品成功出售！<br />";
			$message.="出售数量：{$quantity}<br />";
			$message.="商品信息：<br />";
			$message.="{$goods}<br />";
			$message.='订 单 号：'.$orderid.' <a href="http://'.$config['siteurl'].'/orderquery.htm?orderid='.$orderid.'">[查看详细]</a>';
			$message.="<br />联系方式：{$contact}";

			
			sendMail($email,'[商户：'.$username.']恭喜您成功出售('.$quantity.'件)['.$goodname.']！',$message);
		}
	}
}
?>