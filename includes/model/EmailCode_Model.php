<?php
class EmailCode_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}
	
	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."emailcode $cons");
		return $this->db->num_rows($result);
	}
	
	function addData($data){
	    $filed=array();
		$value=array();
		foreach($data as $key=>$val){
		    $filed[]= "`$key`";
			$value[]="'$val'";
		}
		$fileds=implode(',',$filed);
		$values=implode(',',$value);
		$this->db->query("INSERT INTO ".DB_PREFIX."emailcode(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."emailcode SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."emailcode WHERE id=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."emailcode WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['id']=intval($row['id']);
			$row['email']=htmlspecialchars($row['email']);
			$row['key']=htmlspecialchars($row['key']);
			$row['status']=intval($row['status']);
			return $row;
		}
		return false;
	}

	function getOneDataByKey($key){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."emailcode WHERE `key` = '{$key}'");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['id']=intval($row['id']);
			$row['email']=htmlspecialchars($row['email']);
			$row['key']=htmlspecialchars($row['key']);
			$row['status']=intval($row['status']);
			return $row;
		}
		return false;
	}

	function getAllData($cons=''){
		$data=array();
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."emailcode $cons");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$data[]=$row;
			}
		}
		return $data;
	}
}
?>