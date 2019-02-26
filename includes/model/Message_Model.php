<?php
class Message_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."message $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
				$row['from_userid']=intval($row['from_user']);
				$row['to_userid']=intval($row['to_user']);
			    $row['from_user']=Users_Model::getUsernamebyUserID(intval($row['from_user']));
				$row['to_user']=Users_Model::getUsernamebyUserID(intval($row['to_user']));				
				$row['title']=htmlspecialchars($row['title']);
				$row['content']=htmlspecialchars($row['content']);
				$row['is_read']=intval($row['is_read']);
				$row['addtime']=htmlspecialchars($row['addtime']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."message $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."message(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."message SET $items WHERE id=$id");
	}

	function deleteData($id,$t){
		$is_receiver=0;
		$is_sender=0;
		$result=$this->db->query("SELECT is_receiver,is_sender FROM ".DB_PREFIX."message WHERE id=$id");
		if($this->db->num_rows($result)==1){
		    $row=$this->db->fetch_array($result);
			$is_receiver=$row['is_receiver'];
			$is_sender=$row['is_sender'];
		}

		if(($t=='s' && $is_receiver) || ($t=='r' && $is_sender)){
	        $this->db->query("DELETE FROM ".DB_PREFIX."message WHERE id=$id");
		} else {
		    if($t=='s'){
			    $this->updateData($id,array('is_sender'=>1));
			}else{
			    $this->updateData($id,array('is_receiver'=>1));
			}
		}
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."message WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['from_user']=intval($row['from_user']);
			$row['to_user']=intval($row['to_user']);
			$row['title']=htmlspecialchars($row['title']);
			$row['content']=htmlspecialchars($row['content']);
			$row['is_read']=intval($row['is_read']);
			$row['addtime']=htmlspecialchars($row['addtime']);
			return $row;
		}
		return false;
	}

	function getUnRead($cons){
	    $result=$this->db->query("SELECT count(*) FROM ".DB_PREFIX."message $cons");
		$row=$this->db->fetch_array($result);
		return $row[0]==null ? 0 : $row[0];
	}
}
?>