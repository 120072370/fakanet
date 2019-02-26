<?php
class Admin_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."tgusers $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
			$ob=new AdminLogs_Model();			
		    while($row=$this->db->fetch_array($result)){
				$userLog=$ob->getOneData($row['id']);
				if($userLog){
				    $logip=$userLog['logip'];
					$logtime=$userLog['logtime'];
				} else {
				    $logip='';
					$logtime='';
				}
				$row['utype']=intval($row['utype']);
			    $row['username']=htmlspecialchars($row['username']);
				$row['is_state']=intval($row['is_state']);
				$row['addtime']=htmlspecialchars($row['addtime']);
				$row['lastlogip']=$logip;
				$row['lastlogtime']=$logtime;
				$row['is_safe']=intval($row['is_safe']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."admin $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."admin(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."admin SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."admin WHERE id=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."userlogs WHERE userid=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."admin WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['utype']=intval($row['utype']);
			$row['username']=htmlspecialchars($row['username']);
			$row['userpass']=htmlspecialchars($row['userpass']);
			$row['userkey']=htmlspecialchars($row['userkey']);
			$row['is_state']=intval($row['is_state']);
			$row['addtime']=htmlspecialchars($row['addtime']);
			$row['adminlimit']=htmlspecialchars($row['adminlimit']);
			$row['is_safe']=intval($row['is_safe']);
			return $row;
		}
		return false;
	}

	function getAdminIDbyUsername($username){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."admin WHERE username='$username'");
		if($this->db->num_rows($result)>0){
			$row=$this->db->fetch_array($result);
		    return $row[0];
		} else {
		    return '0';
		}
	}

	function getUsernamebyAdminID($adminid){
	    $result=$this->db->query("SELECT username FROM ".DB_PREFIX."admin WHERE id=$adminid");
		if($this->db->num_rows($result)>0){
			$row=$this->db->fetch_array($result);
		    return $row[0];
		} else {
		    return '0';
		}
	}
}
?>