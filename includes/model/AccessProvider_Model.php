<?php
class AccessProvider_Model{
    private $db;
	function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData(){
	    $data=array();
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."accessprovider");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
			    $row['email']=htmlspecialchars($row['email']);
				$row['accessID']=htmlspecialchars($row['accessID']);
				$row['accessKey']=htmlspecialchars($row['accessKey']);
				$row['accessType']=htmlspecialchars($row['accessType']);
				$row['accessName']=htmlspecialchars($row['accessName']);
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
		$this->db->query("INSERT INTO ".DB_PREFIX."accessprovider(".$fileds.") VALUES(".$values.")");
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}

		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."accessprovider SET ".$items." WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."accessprovider WHERE id=$id");
	}
}
?>