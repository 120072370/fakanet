<?php
class Rates_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($cons=''){
		$data=array();
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."rates $cons");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
				$row['channelid']=intval($row['channelid']);
				$row['rate']=makeSafe($row['rate'],'float');
				$row['cateid']=intval($row['cateid']);
				$row['goodid']=intval($row['goodid']);
				$data[]=$row;
			}
		}
		return $data;
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
		$this->db->query("INSERT INTO ".DB_PREFIX."rates(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."rates SET $items WHERE id=$id");
	}

	function deleteData($cons){
	    $this->db->query("DELETE FROM ".DB_PREFIX."rates $cons");
	}

	function getOneData($userid,$channelid='',$cateid='',$goodid=''){
		$cons="userid=$userid";
		$cons=$channelid!='' ? $cons." AND channelid=$channelid" : $cons;
		$cons=$channelid!='' ? $cons." AND cateid=$cateid" : $cons;
		$cons=$channelid!='' ? $cons." AND goodid=$goodid" : $cons;
		$cons="WHERE $cons";
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."rates $cons");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['id']=intval($row['id']);
		    $row['channelname']=Channels_Model::getChannelnamebyChannelID(intval($row['channelid']));
		    $row['rate']=makeSafe($row['rate'],'float');
		    $row['cateid']=intval($row['cateid']);
		    $row['goodid']=intval($row['goodid']);
			return $row;
		}
		return false;
	}

	static function getUserIDbyRateID($rateid){
	    $result=$this->db->query("SELECT userid FROM ".DB_PREFIX."goodcate WHERE id=$rateid");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false;
	}
}
?>