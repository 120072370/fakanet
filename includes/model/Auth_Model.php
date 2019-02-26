<?php
class Auth_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."auths $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=htmlspecialchars($row['id']);
				$row['url']=htmlspecialchars($row['url']);
				$row['type']=htmlspecialchars($row['type']);
				$row['status']=htmlspecialchars($row['status']);
				$row['user_id']=htmlspecialchars($row['user_id']);
				$row['remark']=htmlspecialchars($row['remark']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."auths $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."auths(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateAll($id, $data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."auths SET $items WHERE user_id=$id");
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."auths SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."auths WHERE id=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."auths");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['id']=htmlspecialchars($row['id']);
			$row['url']=htmlspecialchars($row['url']);
			$row['type']=htmlspecialchars($row['type']);
			$row['status']=htmlspecialchars($row['status']);
			$row['user_id']=htmlspecialchars($row['user_id']);
			$row['remark']=htmlspecialchars($row['remark']);
			return $row;
		}
		return false;
	}
}
?>