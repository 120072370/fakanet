<?php
class GoodCate_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodcate $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
			    $row['catename']=htmlspecialchars($row['catename']);
				$row['is_state']=intval($row['is_state']);
				$row['sortid']=intval($row['sortid']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."goodcate $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."goodcate(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."goodcate SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."goodcate WHERE id=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodcate WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['catename']=htmlspecialchars($row['catename']);
		    $row['is_state']=intval($row['is_state']);
		    $row['sortid']=intval($row['sortid']);
			$row['sitename']=htmlspecialchars($row['sitename']);
			$row['siteurl']=htmlspecialchars($row['siteurl']);
			$row['qq']=htmlspecialchars($row['qq']);
			return $row;
		}
		return false;
	}

	function getAllData($id,$t=''){
		switch($t){
			case 'linkid': $cons="WHERE linkid='$id'"; break;
			case 'all': $cons=""; break;
			default: $cons="WHERE userid='$id'";
		}

		$data=array();
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodcate $cons ORDER BY sortid ASC, id DESC");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['catename']=htmlspecialchars($row['catename']);
				$row['is_state']=intval($row['is_state']);
				$row['sortid']=intval($row['sortid']);
				$row['sitename']=htmlspecialchars($row['sitename']);
				$row['siteurl']=htmlspecialchars($row['siteurl']);
				$row['qq']=htmlspecialchars($row['qq']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getUserIDbyCateID($cateid){
	    $result=$this->db->query("SELECT userid FROM ".DB_PREFIX."goodcate WHERE id=$cateid");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false;
	}

	function getCatenamebyCateID($cateid){
	    $result=$this->db->query("SELECT catename FROM ".DB_PREFIX."goodcate WHERE id=$cateid");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false;
	}

	static function getcatename($cateid){
	    $ob=new GoodCate_Model();
		return $ob->getCatenamebyCateID($cateid);
	}
}
?>