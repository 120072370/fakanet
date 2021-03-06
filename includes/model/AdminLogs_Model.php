<?php
class AdminLogs_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."adminlogs $cons ORDER BY id DESC LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
			$ob=new Admin_Model();
		    while($row=$this->db->fetch_array($result)){
			    $row['username']=$ob->getUsernamebyAdminID(intval($row['userid']));
				$row['logip']=htmlspecialchars($row['logip']);
				$row['logtime']=htmlspecialchars($row['logtime']);
				$row['id']=intval($row['id']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."adminlogs $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."adminlogs(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."adminlogs SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."adminlogs WHERE id=$id");
	}

	function getOneData($userid){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."adminlogs WHERE userid=$userid ORDER BY id DESC LIMIT 1");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['logtime']=htmlspecialchars($row['logtime']);
			$row['logip']=htmlspecialchars($row['logip']);
			return $row;
		}
		return false;
	}
}
?>