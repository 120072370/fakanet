<?php
class UserPrice_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($cons=''){
		$data=array();
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."userprice $cons");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
				$row['userid']=intval($row['userid']);
			    $row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
				$row['channleid']=intval($row['channelid']);
				$row['channelname']=Channels_Model::getChannelnamebyChannelID(intval($row['channelid']));
				$row['price']=makeSafe($row['price'],'float');
				$row['is_state']=intval($row['is_state']);
				$row['sortid']=intval($row['sortid']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."userprice $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."userprice(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."userprice SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."userprice WHERE id=$id");
	}

	function getOneData($userid){
		$data=array();
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."userprice WHERE userid=$userid");
		if($this->db->num_rows($result)>0){
			while($row=$this->db->fetch_array($result)){
		        $row['id']=intval($row['id']);
		        $row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
		        $row['channleid']=intval($row['channelid']);
		        $row['channelname']=Channels_Model::getChannelnamebyChannelID(intval($row['channelid']));
		        $row['price']=makeSafe($row['price'],'float');
		        $row['is_state']=intval($row['is_state']);
		        $row['sortid']=intval($row['sortid']);
		        $data[]=$row;
			}
		}
		return $data;
	}

	function getOneDatabyID($id){
		$row=array();
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."userprice WHERE id=$id");
		if($this->db->num_rows($result)>0){
			$row=$this->db->fetch_array($result);
		        $row['userid']=intval($row['userid']);
		        $row['is_state']=intval($row['is_state']);		        
		}
		return $row;
	}
}
?>