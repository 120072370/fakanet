<?php
class UserInfo_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."userinfo $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['ptype']=intval($row['ptype']);
				$row['userid']=intval($row['userid']);
			    $row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
				$row['realname']=htmlspecialchars($row['realname']);
				$row['bank']=htmlspecialchars($row['bank']);
				$row['card']=htmlspecialchars($row['card']);
				$row['addr']=htmlspecialchars($row['addr']);
				$row['alipay']=htmlspecialchars($row['alipay']);
				$row['tenpay']=htmlspecialchars($row['tenpay']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."userinfo $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."userinfo(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."userinfo SET $items WHERE userid=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."userinfo WHERE userid=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."userinfo WHERE userid=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['ptype']=intval($row['ptype']);
			$row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
			$row['realname']=htmlspecialchars($row['realname']);
			$row['card']=htmlspecialchars($row['card']);
			$row['bank']=htmlspecialchars($row['bank']);
			$row['addr']=htmlspecialchars($row['addr']);
			$row['alipay']=htmlspecialchars($row['alipay']);
			$row['tenpay']=htmlspecialchars($row['tenpay']);
			$row['safekey']=htmlspecialchars($row['safekey']);
			$row['question']=htmlspecialchars($row['question']);
			$row['answer']=htmlspecialchars($row['answer']);
			$row['is_login']=intval($row['is_login']);
			$row['is_safe']=intval($row['is_safe']);
			return $row;
		}
		return false;
	}
}
?>