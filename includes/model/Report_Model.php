<?php
class Report_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."complaints $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
				$row['reason']=htmlspecialchars($row['reason']);
			    $row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
				$row['contact']=htmlspecialchars($row['contact']);
				$row['url']=htmlspecialchars($row['url']);
				$row['is_read']=intval($row['is_read']);
				$row['is_state']=intval($row['is_state']);
				$row['remark']=htmlspecialchars($row['remark']);
				$row['result']=htmlspecialchars($row['result']);
				$row['addtime']=date('Y-m-d H:i:s',intval($row['addtime']));
				$row['updatetime']=date('Y-m-d H:i:s',intval($row['updatetime']));
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."complaints $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."complaints(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."complaints SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."complaints WHERE id=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."complaints WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['reason']=htmlspecialchars($row['reason']);
			$row['contact']=htmlspecialchars($row['contact']);
			$row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
			$row['remark']=htmlspecialchars($row['remark']);
			$row['result']=htmlspecialchars($row['result']);
			$row['url']=htmlspecialchars($row['url']);
			$row['is_state']=intval($row['is_state']);
			$row['is_read']=intval($row['is_read']);
			$row['addtime']=date('Y-m-d H:i:s',intval($row['addtime']));
			$row['updatetime']=date('Y-m-d H:i:s',intval($row['updatetime']));
			return $row;
		}
		return false;
	}

	function getOneDataByOrderid($orderid){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."complaints WHERE orderid='$orderid' LIMIT 1");
		if($this->db->num_rows($result)==1){
		    $row=$this->db->fetch_array($result);
			$row['reason']=htmlspecialchars($row['reason']);
			$row['contact']=htmlspecialchars($row['contact']);
			$row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
			$row['remark']=htmlspecialchars($row['remark']);
			$row['result']=htmlspecialchars($row['result']);
			$row['url']=htmlspecialchars($row['url']);
			$row['is_state']=intval($row['is_state']);
			$row['is_read']=intval($row['is_read']);
			$row['addtime']=date('Y-m-d H:i:s',intval($row['addtime']));
			$row['updatetime']=date('Y-m-d H:i:s',intval($row['updatetime']));
			return $row;
		}
		return false;
	}

	function getCountResult($cons){
	    $result=$this->db->query("SELECT count(*) FROM ".DB_PREFIX."complaints $cons");
		$row=$this->db->fetch_array($result);
		return $row[0]==null ? 0 : $row[0];
	}
}
?>