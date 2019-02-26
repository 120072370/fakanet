<?php
class Channels_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."channellist $cons ORDER BY sortid DESC,id DESC LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
			    $row['channelname']=htmlspecialchars($row['channelname']);
				$row['accessType']=htmlspecialchars($row['accessType']);
				$row['gateway']=htmlspecialchars($row['gateway']);
				$row['price']=makeSafe($row['price'],'float');
				$row['platformPrice']=makeSafe($row['platformPrice'],'float');
				$row['is_state']=intval($row['is_state']);
				$row['sortid']=intval($row['sortid']);
				$row['payid']=intval($row['payid']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."channellist $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."channellist(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."channellist SET ".$items." WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."channellist WHERE id=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."rates WHERE channelid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."userprice WHERE channelid=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."channellist WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['channelname']=htmlspecialchars($row['channelname']);
		    $row['accessType']=htmlspecialchars($row['accessType']);
		    $row['gateway']=htmlspecialchars($row['gateway']);
		    $row['price']=makeSafe($row['price'],'float');
		    $row['platformPrice']=makeSafe($row['platformPrice'],'float');
		    $row['is_state']=intval($row['is_state']);
		    $row['sortid']=intval($row['sortid']);
		    $row['payid']=intval($row['payid']);
			return $row;
		}
		return false;
	}

	static function getChannelnamebyChannelID($channelID){
        $ob=new Channels_Model();
		return $ob->getChannelID($channelID);
	}

	private function getChannelID($channelID){
	    $result=$this->db->query("SELECT channelname FROM ".DB_PREFIX."channellist WHERE id=$channelID");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false;
	}
}
?>