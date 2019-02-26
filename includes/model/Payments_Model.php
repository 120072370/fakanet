<?php
class Payments_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."payments $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
			$userInfo=new UserInfo_Model();
		    while($row=$this->db->fetch_array($result)){
				$info=$userInfo->getOneData($row['userid']);
				switch($info['ptype']){
				    case 1: $row['bank']=$info['bank'];break;
					case 2: $row['bank']='支付宝';break;
					case 3: $row['bank']='财付通';break;
                    case 4: $row['bank']='微信钱包';break;
				}
				$row['realname']=$info['realname'];
				$row['id']=intval($row['id']);
				$row['userid']=intval($row['userid']);
			    $row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
				$row['pid']=intval($row['pid']);
				$row['money']=makeSafe($row['money'],'float');
				$row['is_state']=intval($row['is_state']);
				$row['remark']=htmlspecialchars($row['remark']);
				$row['updatetime']=date('Y-m-d H:i:s',intval($row['updatetime']));
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."payments $cons");
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
       
		$this->db->query("INSERT INTO ".DB_PREFIX."payments(".$fileds.") VALUES(".$values.")");
        //echo "INSERT INTO ".DB_PREFIX."payments(".$fileds.") VALUES(".$values.")";
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$re=$this->db->query("UPDATE ".DB_PREFIX."payments SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."payments WHERE id=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."payments WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['userid']=intval($row['userid']);
		    $row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
		    $row['pid']=intval($row['pid']);
		    $row['money']=makeSafe($row['money'],'float');
			$row['fee']=makeSafe($row['fee'],'float');
		    $row['is_state']=intval($row['is_state']);
		    $row['remark']=htmlspecialchars($row['remark']);
            $row['addtime']=$row['addtime'];
			return $row;
		}
		return false;
	}

	function getTotalData($cons=''){
		$data=array();
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."payments $cons");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['money']=makeSafe($row['money'],'float');
				$row['realmoney']=$row['is_state']==1 ? $row['money'] : 0;
				$data[]=$row;
			}
		}
		return $data;
	}

    function getLastOneData($userid,$date){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."payments WHERE userid=$userid and date(addtime) < date('".$date."') order by id desc limit 1");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['userid']=intval($row['userid']);
		    $row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
		    $row['pid']=intval($row['pid']);
		    $row['money']=makeSafe($row['money'],'float');
			$row['fee']=makeSafe($row['fee'],'float');
		    $row['is_state']=intval($row['is_state']);
		    $row['remark']=htmlspecialchars($row['remark']);
            $row['addtime']=$row['addtime'];
			return $row;
		}
		return false;
	}
}
?>