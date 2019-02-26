<?php
class Orders_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."buylist $cons ORDER BY id DESC LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['id']=intval($row['id']);
				$row['username']=Users_Model::getUsernamebyUserID(intval($row['userid']));
			    $row['orderid']=htmlspecialchars($row['orderid']);
				$row['is_state']=intval($row['is_state']);
				$row['addtime']=htmlspecialchars($row['addtime']);
				$row['price']=makeSafe($row['price'],'float');
				$row['channelname']=Channels_Model::getChannelnamebyChannelID(intval($row['channelid']));
				$row['goodname']=GoodList_Model::getGoodnamebyGoodID(intval($row['goodid']));
				$row['contact']=htmlspecialchars($row['contact']);
				$row['quantity']=intval($row['quantity']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."buylist $cons");
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
		$this->db->query("INSERT INTO ".DB_PREFIX."buylist(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."buylist SET $items WHERE id=$id");
	}

	function deleteData($id){
		$this->db->query("DELETE FROM ".DB_PREFIX."buylist WHERE orderid=(SELECT orderid FROM ".DB_PREFIX."buylist WHERE id=$id)");
		$this->db->query("DELETE FROM ".DB_PREFIX."selllist WHERE orderid=(SELECT orderid FROM ".DB_PREFIX."buylist WHERE id=$id)");
	    $this->db->query("DELETE FROM ".DB_PREFIX."buylist WHERE id=$id");
	}

	function getOneData($orderid){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."buylist WHERE orderid='$orderid' LIMIT 1");
		if($this->db->num_rows($result)==1){
			$row=$this->db->fetch_array($result);
			$row['goodname']=GoodList_Model::getGoodnamebyGoodID($row['goodid']);
			$res=$this->db->query("SELECT sum(realmoney*rates/100) FROM ".DB_PREFIX."orderlist WHERE orderid LIKE '".$orderid."%' AND is_state=1");
			$row2=$this->db->fetch_array($res);
			$realmoney=$row2[0]==null ? 0 : $row2[0];
			$row['realmoney']=number_format($realmoney,2,'.','');
		    return $row;
		} else {
		    return false;
		}
	}

    function getOneDataCon($orderid,$con){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."buylist WHERE orderid='$orderid' $con LIMIT 1");
		if($this->db->num_rows($result)==1){
			$row=$this->db->fetch_array($result);
			
		    return $row;
		} else {
		    return false;
		}
	}
}
?>