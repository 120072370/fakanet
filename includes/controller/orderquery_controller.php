<?php
class orderquery_controller{
	private $cache;
	private $db;

    function __construct($mod){
	    $this->cache=Cache::getInstance();
		$this->db=Mysql::getInstance();
		$this->config=$this->cache->get('config');
		$this->mod=$mod;
	}

    function display(){
		$do=_G('do');
		$cons='';
		$st=_G('st');
		$kw=_G('kw');
		$pwd=_P('pwd');

		$kw=$st=='orderid' ? strtoupper($kw) : $kw;
		$orderid=strtoupper(_G('orderid'));

		if($do=='export' && $orderid){
			$data='';
		    $result=$this->db->query("SELECT cardnum,cardpwd FROM ".DB_PREFIX."goods WHERE id in(SELECT cardid FROM ".DB_PREFIX."selllist WHERE orderid='".$orderid."')");
			$count=$this->db->num_rows($result);
			if($count>0){
			    while($row=$this->db->fetch_array($result)){
					$cardpwd=$row['cardpwd'] ? '卡密：'.$row['cardpwd'] : '';
				    $data.="卡号：".$row['cardnum']."\t".$cardpwd."\r\n";
				}
			} else {
			    $data='出卡记录已删除，订单出卡记录仅保留30天。';
			}

			$content="订单号".$orderid." 导出内容共计".$count."条记录；\r\n注：".$this->config['sitename']."订单记录只保存30天，请自行注意妥善保存购买结果。\r\n";
			$filename=$orderid.'.txt';
			$content.=$data;
			exportFile($filename,$content);
		}

		if($orderid){
		    $st='orderid';
			$kw=strlen($orderid)==20 ? substr($orderid,0,16) : $orderid;
		}

		switch($st){
		    case 'orderid': $cons="WHERE (orderid='$kw' or contact='$kw') AND is_status<>4 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(addtime)"; break;
			case 'contact': $cons="WHERE contact='$kw' AND is_status<>4 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(addtime) "; break;
			case 'cardnum': $cons="WHERE orderid=(SELECT LEFT(orderid,16) FROM ".DB_PREFIX."orderlist WHERE cardnum='$kw' LIMIT 1) AND is_status<>4 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(addtime) "; break;
			default: $cons="WHERE orderid='$kw' AND is_status<>4";
		}

		$cons.=$cons!='' ? " ORDER BY id DESC" : '';

		$lists=array();
		if($st=='contact' || $st=='cardnum' || $st=='orderid'){
			$result=$this->db->query("SELECT userid,goodid,orderid,addtime,channelid,price,is_status,is_state,is_receive,quantity,couponcode,pwdforsearch FROM ".DB_PREFIX."buylist $cons");
			if($this->db->num_rows($result)>0){
				$users=new Users_Model();
			    while($row=$this->db->fetch_array($result)){
					$userData=$users->getOneData($row['userid']);
					$is_search_tips=$userData['is_search_tips'];
					if($is_search_tips){
					    $row['search_tips']=$this->config['search_tips'];
					} else {
					    $row['search_tips']='';
					}
					$remark='';
					$good=new GoodList_Model();
					$goodList=$good->getOneData($row['goodid']);
					if($goodList){
						$remark=$goodList['remark'];
						$is_display_remark=$goodList['is_display_remark'];
					}
					$row['goodremark']=$remark;
					$row['is_display_remark']=$is_display_remark;
					$channelname=Channels_Model::getChannelnamebyChannelID($row['channelid']);
					$row['channelname']=$channelname ? $channelname : '-';
					$row['channelname']=$row['channelid']=='99999' ? '组合支付' : $row['channelname'];

                    $row['qq'] = $userData['qq'];
                    //$row['$pwdforsearch'] =

					$res=$this->db->query("SELECT sum(realmoney*rates/100) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$row['orderid']."%' AND is_state=1");
					$row2=$this->db->fetch_array($res);
					$realmoney=$row2[0]==null ? 0 : $row2[0];
					$couponcode=$row['couponcode'];

					$row['realmoney']=number_format($realmoney,2,'.','');
					$lists[]=$row;
				}
			} else {
                $msg='没有找到相关的订单!';
				$url='orderquery.htm';
				$title='跳转中...';
				require View::getView('header');
				require View::getView('message');
				require View::getView('footer');
				View::Output();exit;
			}
		}

		$orderList=array();
		if($st=='orderid'){
			//判断订单是否设置了查询密码
				if(!$pwd){
					$_SESSION['pwd_for_search']='';
					$result=$this->db->query("SELECT pwdforsearch FROM ".DB_PREFIX."buylist WHERE is_status=1 AND orderid='$kw' LIMIT 1");
					$row=$this->db->fetch_array($result);
					if($row[0]){
						$_SESSION['pwd_for_search']=$row[0];
						$msg='请输入查询密码：';
						$url='orderquery.htm?orderid='.$kw;
						$title='验证查询-';
						require View::getView('header');
						require View::getView('pwdforsearch');
						require View::getView('footer');
						View::Output();exit;
					}
				}

				if($_SESSION['pwd_for_search']){
					if($_SESSION['pwd_for_search']!=$pwd){
						$msg='查询密码输入错误!';
						$url='orderquery.htm?orderid='.$kw;
						$title='跳转中...';
						require View::getView('header');
						require View::getView('message');
						require View::getView('footer');
						View::Output();exit;
				    }
				}

		    $result=$this->db->query("SELECT addtime,realmoney,price,rates,channelid,cardnum,money,is_state FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$kw."%'");
			if($this->db->num_rows($result)>0){
				$cache=Cache::getInstance();
				$channelList=$cache->get('channelList');
			    while($row=$this->db->fetch_array($result)){
					if($row['channelid']==0){
					    $row['channelname']='优惠券';
						$row['cardnum']=$couponcode;
					} else {
				        $row['channelname']=Channels_Model::getChannelnamebyChannelID($row['channelid']);
					}

					$row['realmoney']=number_format($row['realmoney']*$row['rates']/100,2,'.','');
					$orderList[]=$row;
				}
			}
		}

		$title='订单查询 - '.$this->config['sitename'];

        require View::getView('header');
		require View::getView($this->mod);
		require View::getView('footer');
		View::Output();
	}

	function myorders(){
		$kw='';
		$st='';
		$myorders=_C('myorders');
		if($myorders){
		    $myorders=strpos($myorders,'|') ? $myorders : $myorders.'|a';
		}

		$myorders_arr=$myorders && strpos($myorders,'|') ? explode('|',$myorders) : array();

		$lists=array();
		if($myorders){
			foreach($myorders_arr as $orderid){
				$result=$this->db->query("SELECT orderid,addtime,channelid,price,quantity FROM ".DB_PREFIX."buylist WHERE orderid='$orderid' AND is_status<>4");
				if($this->db->num_rows($result)>0){
					while($row=$this->db->fetch_array($result)){
						$channelname=Channels_Model::getChannelnamebyChannelID($row['channelid']);
						$row['channelname']=$channelname ? $channelname : '-';
						$row['channelname']=$row['channelid']=='99999' ? '组合支付' : $row['channelname'];

						$res=$this->db->query("SELECT sum(realmoney*rates/100) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$row['orderid']."%' AND is_state=1");
						$row2=$this->db->fetch_array($res);
						$realmoney=$row2[0]==null ? 0 : $row2[0];

						$row['realmoney']=number_format($realmoney,2,'.','');

						$lists[]=$row;
					}
			    }
			}
		}

		$title='订单记录 - '.$this->config['sitename'];
        require View::getView('header');
		require View::getView($this->mod);
		require View::getView('footer');
		View::Output();
	}

	function verify(){
	    $UserID=_P('UserID','int');
		$OrderID=_P('OrderID');
		$flag=0;
		if($UserID && $OrderID){
			$result=$this->db->query("SELECT id FROM ".DB_PREFIX."buylist WHERE is_status=1 AND userid=$UserID AND orderid='$OrderID' LIMIT 1");
			if($this->db->num_rows($result)==1){
				$flag=1;
			}
		}
		echo $flag;
		exit;
	}
}
?>