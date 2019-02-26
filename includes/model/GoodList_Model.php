<?php
class GoodList_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodlist $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
			$ob=new Goods_Model();
		    while($row=$this->db->fetch_array($result)){
				//是否设置价值比例
				$res=$this->db->query("SELECT count(*) FROM ".DB_PREFIX."rates WHERE goodid=".$row['id']."");
				$row2=$this->db->fetch_array($res);
				$row['is_config_rates']=$row2[0] ? $row[0] : 0;
				$row['sellGoods']=$ob->getDataNum("WHERE goodid=".$row['id']." AND is_state=1");
				$row['kucunGoods']=$ob->getDataNum("WHERE goodid=".$row['id']." AND is_state=0");
				$row['id']=intval($row['id']);
			    $row['goodname']=htmlspecialchars($row['goodname']);
				$row['price']=makeSafe($row['price'],'float');
				$row['cbprice']=makeSafe($row['cbprice'],'float');
				$row['is_state']=intval($row['is_state']);
				$row['sortid']=intval($row['sortid']);
				$row['remark']=htmlspecialchars($row['remark']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."goodlist $cons");
		return $this->db->num_rows($result);
	}

	function addData($data){
		global $Config;
		//敏感词处理
		$minganci=$Config['minganci'];
		$minganci=preg_split("/[\n\r\|,]+/s",$minganci ,-1,PREG_SPLIT_NO_EMPTY);
		$blacklist = "/" . implode("|", $minganci) . "/i";
		
		if(preg_match($blacklist, $data['goodname'], $matches) || preg_match($blacklist, $data['sitename'], $matches)  || preg_match($blacklist, $data['remark'], $matches) ){
		    $data['is_state']=2;
		}else if(!isset($data['is_state'])){
			$data['is_state']=1;
		}
		
	    $filed=array();
		$value=array();
		foreach($data as $key=>$val){
		    $filed[]=$key;
			$value[]="'$val'";
		}
		$fileds=implode(',',$filed);
		$values=implode(',',$value);
		$this->db->query("INSERT INTO ".DB_PREFIX."goodlist(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
		global $Config;
		//敏感词处理
		$minganci=$Config['minganci'];
		$minganci=preg_split("/[\n\r\|,]+/s",$minganci ,-1,PREG_SPLIT_NO_EMPTY);
		$blacklist = "/" . implode("|", $minganci) . "/i";
		
		if(preg_match($blacklist, $data['goodname'], $matches) || preg_match($blacklist, $data['sitename'], $matches)  || preg_match($blacklist, $data['remark'], $matches) ){
		    $data['is_state']=2;
		}else if(!isset($data['is_state'])){
			$data['is_state']=1;
		}
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."goodlist SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."goodlist WHERE id=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodlist WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
		    $row['goodname']=htmlspecialchars($row['goodname']);
			$row['price']=makeSafe($row['price'],'float');
			$row['cbprice']=makeSafe($row['cbprice'],'float');
		    $row['is_state']=intval($row['is_state']);
		    $row['sortid']=intval($row['sortid']);
			$row['remark']=htmlspecialchars($row['remark']);
			$row['invent_report']=intval($row['invent_report']);
			$row['is_diplay']=intval($row['is_display']);
			$row['is_paytype']=intval($row['is_paytype']);
			$row['sitename']=htmlspecialchars($row['sitename']);
			$row['siteurl']=htmlspecialchars($row['siteurl']);
			$row['qq']=htmlspecialchars($row['qq']);
			return $row;
		}
		return false;
	}

	function getAllData($id,$t=''){
		switch($t){
		    case 'cateid': $cons="WHERE cateid='$id' and is_state=1"; break;
			case 'linkid': $cons="WHERE linkid='$id' and is_state=1"; break;
			case 'id': $cons="WHERE id='$id' and is_state=1"; break;
			default: $cons="WHERE userid='$id' and is_state=1";
		}

		$data=array();
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodlist $cons ORDER BY sortid ASC, id DESC");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$row['goodname']=htmlspecialchars($row['goodname']);
				$row['price']=makeSafe($row['price'],'float');
				$row['cbprice']=makeSafe($row['cbprice'],'float');
				$row['is_state']=intval($row['is_state']);
				$row['sortid']=intval($row['sortid']);
				$row['remark']=htmlspecialchars($row['remark']);
				$row['invent_report']=intval($row['invent_report']);
				$row['is_diplay']=intval($row['is_display']);
				$row['is_paytype']=intval($row['is_paytype']);
				$row['sitename']=htmlspecialchars($row['sitename']);
				$row['siteurl']=htmlspecialchars($row['siteurl']);
				$row['qq']=htmlspecialchars($row['qq']);
				$data[]=$row;
			}
		}
		return $data;
	}

	private function getUserID($goodid){
	    $result=$this->db->query("SELECT userid FROM ".DB_PREFIX."goodlist WHERE id=$goodid");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false; 
	}

	static function getUserIDbyGoodID($goodid){
        $ob=new GoodList_Model();
		return $ob->getUserID($goodid);
	}

	static function getGoodnamebyGoodID($goodid){
        $ob=new GoodList_Model();
		return $ob->getGoodname($goodid);
	}

	private function getGoodname($goodid){
	    $result=$this->db->query("SELECT goodname FROM ".DB_PREFIX."goodlist WHERE id=$goodid");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return false;
	}
}
?>