<?php
class UserMoney_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."usermoney $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
			$userInfo=new UserInfo_Model();
			$users=new Users_Model();
		    while($row=$this->db->fetch_array($result)){
				//是否已结
				$res=$this->db->query("SELECT count(*) FROM ".DB_PREFIX."payments WHERE userid=".$row['userid']." AND date(addtime)='".date('Y-m-d',mktime(0,0,0,date('m'),date('d'),date('Y')))."'");
				$row2=$this->db->fetch_array($res);
				$row['flag']=$row2[0]==0 ? false : true;

				$info=$userInfo->getOneData($row['userid']);
				switch($info['ptype']){
				    case 1: $row['bank']=$info['bank'];break;
					case 2: $row['bank']='支付宝';break;
					case 3: $row['bank']='财付通';break;
                    case 4: $row['bank']='微信钱包';break;
				}

				$user=$users->getOneData($row['userid']);
				$row['ctype']=$user['ctype'];
				$row['is_apply_settlement']=$user['is_apply_settlement'];
				$row['realname']=$info['realname'];
				$row['id']=intval($row['id']);
				$row['userid']=intval($row['userid']);
			    $row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
				$row['paid']=makeSafe($row['paid'],'float');
				$row['unpaid']=makeSafe($row['unpaid'],'float');
				$row['freeze']=makeSafe($row['freeze'],'float');
				$row['yestodayUserIncome']=$this->yestodayUserIncome($row['userid']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."usermoney $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."usermoney(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."usermoney SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."usermoney WHERE id=$id");
	}

	function getOneData($userid){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."usermoney WHERE userid=$userid");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['id']=intval($row['id']);
			$row['userid']=intval($row['userid']);
			$row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
			$row['paid']=makeSafe($row['paid'],'float');
			$row['unpaid']=makeSafe($row['unpaid'],'float');
			$row['freeze']=makeSafe($row['freeze'],'float');
			$row['yestodayUserIncome']=$this->yestodayUserIncome($row['userid']);
			return $row;
		}
		return false;
	}

    function updateMoney($userid,$money){
    	global $wddb;
		$money_old=$wddb->getone("select unpaid from ".DB_PREFIX."usermoney where userid=".$userid);
		if($money>$money_old){
		    return false;
		}
	    $this->db->query("UPDATE ".DB_PREFIX."usermoney SET unpaid=unpaid-$money,paid=paid+$money WHERE userid=$userid");
	}

	function yestodayUserIncome($userid){
		$income=0;
	    $result=$this->db->query("SELECT orderid FROM ".DB_PREFIX."buylist WHERE userid=".$userid." AND is_status<>0 AND is_status<>4 AND date(addtime)='".date('Y-m-d',mktime(0,0,0,date('m'),date('d')-1,date('Y')))."'");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
			    $res=$this->db->query("SELECT sum(realmoney*price) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$row['orderid']."%' AND is_state=1 AND channelid<>0 AND payorderid<>''");
				$row2=$this->db->fetch_array($res);
				$income+=$row2[0]==null ? 0 : $row2[0];
			}
		}
		return $income;
	}
    //累计销售额
    function allUserIncome($userid,$startdate,$enddate){
		$income=0;
	    $result=$this->db->query("SELECT sum(realmoney*price) as price FROM ".DB_PREFIX."orderlist WHERE orderid in (SELECT orderid FROM ".DB_PREFIX."buylist WHERE userid=".$userid." AND is_status<>0 AND is_status<>4 AND date(addtime)>=date('".$startdate."') and  date(addtime)<date('".$enddate."')) AND is_state=1 AND channelid<>0 AND payorderid<>'' ");
        //if($this->db->num_rows($result)>0){
        //    while($row=$this->db->fetch_array($result)){
        //        $res=$this->db->query("SELECT sum(realmoney*price) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$row['orderid']."%' AND is_state=1 AND channelid<>0 AND payorderid<>''");
        //        $row2=$this->db->fetch_array($res);
        //        $income+=$row2[0]==null ? 0 : $row2[0];
        //    }
        //}
        if($this->db->num_rows($result)>0){
            $row2=$this->db->fetch_array($result);
            $income = number_format($row2['price'],2);
        }
		return $income;
	}
}
?>