<?php
class GoodCoupon_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodcoupon $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				switch($row['is_state']){
				    case '0':
						$valid_second=$row['valid']*60*60*24;
						$remain_second=strtotime($row['addtime'])+$valid_second-strtotime(date('Y-m-d H:i:s'));
						if($remain_second/60/60/24<1){
							if($remain_second/60/60<1){
								if($remain_second/60<1){
									$is_state=$remain_second.'秒后';
								} else {
									$is_state=intval($remain_second/60).'分钟后';
								}
							} else {
								$is_state=intval($remain_second/60/60).'小时后';
							}
						} else {
							$is_state=intval($remain_second/60/60/24).'天后';
						}
					break;
					case '1':
						$is_state='已使用';
					break;
					case '2':
						$is_state='已过期';
					break;
				}

				//使用的订单号
				$orderid='';
				if($row['is_state']==1){
				    $res=$this->db->query("SELECT orderid FROM ".DB_PREFIX."buylist WHERE couponcode='".$row['couponcode']."' LIMIT 1");
					if($this->db->num_rows($res)==1){
					    $row2=$this->db->fetch_array($res);
						$orderid=$row2['orderid'];
					}
				}

				$row['orderid']=$orderid;
				$row['couponcode']=htmlspecialchars($row['couponcode']);
			    $row['catename']=$row['cateid'] ? GoodCate_Model::getcatename($row['cateid']) : '全部';
				$row['coupon']=intval($row['coupon']);
				$row['addtime']=htmlspecialchars($row['addtime']);
				$row['valid']=intval($row['valid']);
				$row['is_state']=$is_state;
				$data[]=$row;
			}
		}
		return $data;
	}

	function updateVaid($cons){
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodcoupon $cons AND is_state=0");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$valid_second=$row['valid']*60*60*24;
				$remain_second=strtotime($row['addtime'])+$valid_second-strtotime(date('Y-m-d H:i:s'));
				if($remain_second<=0){
				    $this->updateData($row['id'],array('is_state'=>2,'updatetime'=>date('Y-m-d H:i:s')));
				}
			}
		}
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."goodcoupon $cons");
		return $this->db->num_rows($result);
	}

	function addData($data){
	    $filed=array();
		$value=array();
		foreach($data as $key=>$val){
		    $filed[]=$key;
			$value[]="'$val'";
		}
		$fileds=implode(',',$filed);
		$values=implode(',',$value);
		$this->db->query("INSERT INTO ".DB_PREFIX."goodcoupon(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."goodcoupon SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."goodcoupon WHERE id=$id AND is_state=0");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodcoupon WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['coupon']=intval($row['coupon']);
		    $row['ctype']=intval($row['ctype']);
		    $row['valid']=intval($row['valid']);
		    $row['cateid']=intval($row['cateid']);
		    $row['remark']=htmlspecialchars($row['remark']);
			return $row;
		}
		return false;
	}

	function getCoupon($code,$userid){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodcoupon WHERE couponcode='$code' AND userid=$userid AND is_state=0 LIMIT 1");
		if($this->db->num_rows($result)==1){
		    $row=$this->db->fetch_array($result);
		    $row['coupon']=intval($row['coupon']);
		    $row['ctype']=intval($row['ctype']);
		    $row['valid']=intval($row['valid']);
		    $row['cateid']=intval($row['cateid']);
			return $row;
		}
		return false;
	}

	private function getUserID($id){
	    $result=$this->db->query("SELECT userid FROM ".DB_PREFIX."goodcoupon WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false; 
	}

	static function getUserIDbyRecordID($id){
        $ob=new GoodCoupon_Model();
		return $ob->getUserID($id);
	}
}
?>