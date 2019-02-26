<?php
class Config_Model{
	private $db;
	
	function __construct(){
		$this->db=mysql::getInstance();
    }
		
	function addData($data){
		$field=array();
		$value=array();
		foreach($data as $key=>$val){
			$field[]=$key;
			$value[]="'$val'";
			}
		$fields=implode(',',$field);
		$values=implode(',',$value);
		$this->db->query("INSERT INTO ".DB_PREFIX."config(".$fields.") VALUES(".$values.")");
    }
	
	function updateData($data){
		global $wddb;
		$wddb->autoExecute(DB_PREFIX."config", $data,'update',"1");
    }
		
	function deleteData(){
		$this->db->query("DELETE FROM ".DB_PREFIX."config");
    }

	function getOneData(){
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."config");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['sitename']=htmlspecialchars($row['sitename']);
			$row['siteurl']=htmlspecialchars($row['siteurl']);
			$row['keyword']=htmlspecialchars($row['keyword']);
			$row['description']=htmlspecialchars($row['description']);
			$row['template']=htmlspecialchars($row['template']);
			$row['qq']=htmlspecialchars($row['qq']);
			$row['tel']=htmlspecialchars($row['tel']);
			$row['reguser']=htmlspecialchars($row['reguser']);
			$row['userstate']=htmlspecialchars($row['userstate']);
			$row['copyright']=htmlspecialchars($row['copyright']);
			$row['tongji']=htmlspecialchars($row['tongji']);
			$row['smtp']=htmlspecialchars($row['smtp']);
			$row['email']=htmlspecialchars($row['email']);
			$row['authkey']=htmlspecialchars($row['authkey']);
			return $row;
		}
		return false;
    }	
}