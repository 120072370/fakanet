<?php
class News_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT *,date(addtime) as addtime2 FROM ".DB_PREFIX."news $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
			    $row['classid']=intval($row['classid']);
				$row['classname']=NewsClass_Model::getClassnamebyClassID(intval($row['classid']));
				$row['title']=htmlspecialchars($row['title']);
				$row['is_bold']=htmlspecialchars($row['is_bold']);
				$row['is_color']=htmlspecialchars($row['is_color']);
				$row['is_popup']=intval($row['is_popup']);
				$row['is_state']=intval($row['is_state']);
				$row['addtime']=htmlspecialchars($row['addtime']);
				$row['views']=intval($row['views']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."news $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."news(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."news SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."news WHERE id=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT *,addtime as newaddtime,date(addtime) as addtime2 FROM ".DB_PREFIX."news WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['classid']=intval($row['classid']);
		    $row['title']=htmlspecialchars($row['title']);
			$row['content']=($row['content']);
		    $row['is_bold']=htmlspecialchars($row['is_bold']);
		    $row['is_color']=htmlspecialchars($row['is_color']);
		    $row['is_state']=intval($row['is_state']);
		    $row['addtime']=htmlspecialchars($row['addtime2']);
			$row['newaddtime']=htmlspecialchars($row['newaddtime']);
		    $row['views']=intval($row['views']);
			return $row;
		}
		return false;
	}
}
?>