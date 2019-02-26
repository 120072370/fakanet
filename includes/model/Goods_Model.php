<?php
class Goods_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."goods $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
				$row['goodid']=intval($row['goodid']);
				//$row['goodname']=GoodList_Model::getGoodnamebyGoodID(intval($row['goodid']));
			    $row['cardnum']=htmlspecialchars($row['cardnum']);
				$row['cardpwd']=htmlspecialchars($row['cardpwd']);
				$row['is_state']=intval($row['is_state']);
				$row['addtime']=htmlspecialchars($row['addtime']);
				$row['updatetime']=htmlspecialchars($row['updatetime']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."goods $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."goods(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."goods SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."goods WHERE is_state=0 AND id=$id");
		$res=$this->db->query("SELECT orderid FROM ".DB_PREFIX."selllist WHERE cardid=".$id."");
		if($this->db->num_rows($res)){
			while($row2=$this->db->fetch_array($res)){
				$this->db->query("UPDATE ".DB_PREFIX."buylist SET is_receive=0 WHERE orderid='".$row2['orderid']."'");
				$this->db->query("DELETE FROM ".DB_PREFIX."selllist WHERE cardid=".$id."");
			}
		}
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."goods WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['cardnum']=htmlspecialchars($row['cardnum']);
		    $row['cardpwd']=htmlspecialchars($row['cardpwd']);
		    $row['is_state']=intval($row['is_state']);
		    $row['addtime']=htmlspecialchars($row['addtime']);
		    $row['updatetime']=htmlspecialchars($row['updatetime']);
			return $row;
		}
		return false;
	}

	private function getUserID($id){
	    $result=$this->db->query("SELECT userid FROM ".DB_PREFIX."goods WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false; 
	}

	static function getUserIDbyRecordID($id){
        $ob=new Goods_Model();
		return $ob->getUserID($id);
	}

	function checkCards($cons){
        $result=$this->db->query("SELECT id FROM ".DB_PREFIX."goods $cons");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false; 
	}

	function getAllData($cons=''){
		$data=array();
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."goods $cons");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['goodname']=GoodList_Model::getGoodnamebyGoodID(intval($row['goodid']));
			    $row['cardnum']=htmlspecialchars($row['cardnum']);
				$row['cardpwd']=htmlspecialchars($row['cardpwd']);
				$row['addtime']=htmlspecialchars($row['addtime']);
				$row['updatetime']=htmlspecialchars($row['updatetime']);
				$data[]=$row;
			}
		}
		return $data;
	}
}
?>