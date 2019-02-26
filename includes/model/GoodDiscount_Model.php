<?php
class GoodDiscount_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($cons=''){
		$data=array();
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."gooddiscount $cons");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['goodid']=intval($row['goodid']);
				$row['dis_quantity']=intval($row['dis_quantity']);
				$row['dis_price']=makeSafe($row['dis_price'],'float');
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
		$this->db->query("INSERT INTO ".DB_PREFIX."gooddiscount(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function deleteData($goodid){
	    $this->db->query("DELETE FROM ".DB_PREFIX."gooddiscount WHERE goodid=$goodid");
	}
}
?>