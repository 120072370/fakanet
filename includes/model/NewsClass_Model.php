<?php
class NewsClass_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData(){
		$data=array();
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."newsclass");
     
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
			    $row['classname']=htmlspecialchars($row['classname']);
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
		$this->db->query("INSERT INTO ".DB_PREFIX."newsclass(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."newsclass SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."newsclass WHERE id=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."newsclass WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['classname']=htmlspecialchars($row['classname']);
			return $row;
		}
		return false;
	}

	static function getClassnamebyClassID($classid){
	    $ob=new NewsClass_Model();
		return $ob->getClassID($classid);
	}

	private function getClassID($classid){
        $result=$this->db->query("SELECT classname FROM ".DB_PREFIX."newsclass WHERE id=$classid");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false;
	}
}
?>