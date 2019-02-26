<?php
class TgProducts_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."tg_products $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."tg_products $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."tg_products(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."tg_products SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."tg_products WHERE id=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."tg_products WHERE id=$id");
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


}
?>