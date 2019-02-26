<?php
class Users_Model{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

	function getData($page,$pagesize,$cons=''){
		$data=array();
	    $offset=($page-1)*$pagesize;
		$result=$this->db->query("SELECT * FROM ".DB_PREFIX."users $cons LIMIT $offset,$pagesize");
		if($this->db->num_rows($result)>0){
			$ob=new UserLogs_Model();
			$userInfo=new UserInfo_Model();
		    while($row=$this->db->fetch_array($result)){
				$userLog=$ob->getOneData($row['id']);
				if($userLog){
				    $logip=$userLog['logip'];
					$logtime=$userLog['logtime'];
				} else {
				    $logip='';
					$logtime='';
				}
				$info=$userInfo->getOneData($row['id']);
				$row['realname']=$info['realname'];
				$row['utype']=intval($row['utype']);
			    $row['username']=htmlspecialchars($row['username']);
				$row['tel']=htmlspecialchars($row['tel']);
				$row['qq']=htmlspecialchars($row['qq']);
				$row['email']=htmlspecialchars($row['email']);
				$row['is_state']=intval($row['is_state']);
				$row['addtime']=htmlspecialchars($row['addtime']);
				$row['lastlogip']=$logip;
				$row['lastlogtime']=$logtime;
				$row['sitename']=htmlspecialchars($row['sitename']);
				$row['siteurl']=htmlspecialchars($row['siteurl']);
				$data[]=$row;
			}
		}
		return $data;
	}

	function getDataNum($cons=''){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."users $cons");
		return $this->db->num_rows($result);
	}

	function addData($data){
	    $filed=array();
		$value=array();
		foreach($data as $key=>$val){
		    $filed[]="`{$key}`";
			$value[]="'$val'";
		}
		$fileds=implode(',',$filed);
		$values=implode(',',$value);
		$this->db->query("INSERT INTO ".DB_PREFIX."users(".$fileds.") VALUES(".$values.")");
		return $this->db->insert_id();
	}

	function updateData($id,$data){
	    $item=array();
		foreach($data as $key=>$val){
		    $item[]="$key='$val'";
		}
		$items=implode(',',$item);
		$this->db->query("UPDATE ".DB_PREFIX."users SET $items WHERE id=$id");
	}

	function deleteData($id){
	    $this->db->query("DELETE FROM ".DB_PREFIX."users WHERE id=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."userprice WHERE userid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."goods WHERE userid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."goodcate WHERE userid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."goodlist WHERE userid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."rates WHERE userid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."userlogs WHERE userid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."userinfo WHERE userid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."usermoney WHERE userid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."payments WHERE userid=$id");
		$this->db->query("DELETE FROM ".DB_PREFIX."buylist WHERE userid=$id");
	}

	function getOneData($id){
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."users WHERE id=$id");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			$row['utype']=intval($row['utype']);
			$row['username']=htmlspecialchars($row['username']);
			$row['userpass']=htmlspecialchars($row['userpass']);
			$row['qq']=htmlspecialchars($row['qq']);
			$row['tel']=htmlspecialchars($row['tel']);
			$row['email']=htmlspecialchars($row['email']);
			$row['is_state']=intval($row['is_state']);
			$row['addtime']=htmlspecialchars($row['addtime']);
			$row['sitename']=htmlspecialchars($row['sitename']);
			$row['siteurl']=htmlspecialchars($row['siteurl']);
            $row['level']=$row['level'];
			return $row;
		}
		return false;
	}

	function getAllData($cons=''){
		$data=array();
	    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."users $cons");
		if($this->db->num_rows($result)>0){
		    while($row=$this->db->fetch_array($result)){
				$data[]=$row;
			}
		}
		return $data;
	}

	private function getUserID($param,$filed,$column){
	    $result=$this->db->query("SELECT $column FROM ".DB_PREFIX."users WHERE $filed='$param'");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return '0';
	}

    private function getPhoneByPhone($phone){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."users WHERE tel='$phone' and ctype=1");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return '0';
	}
    
	private function getLoginByUsername($username,$pass){
	    $result=$this->db->query("SELECT id FROM ".DB_PREFIX."users WHERE (username='$username' || tel='$username') and userpass='$pass' order by id desc limit 1");
		if($this->db->num_rows($result)>0){
		    $row=$this->db->fetch_array($result);
			return $row[0];
		}
		return '0';
	}

    private function getPhoneCode($phone,$code){
        $result=$this->db->query("SELECT code FROM ".DB_PREFIX."phonecode WHERE phone='$phone' and code = $code and status = 0 and createtime>= DATE_ADD(NOW(), INTERVAL -4 MINUTE) limit 1");
		if($this->db->num_rows($result)>0){
		    return '1';
		}
		return '0';
    }
    private function updatePhoneCode($phone,$code){
        $result=$this->db->query("update ".DB_PREFIX."phonecode set status = 1 WHERE phone='$phone' and code = $code");
		if($this->db->num_rows($result)>0){
		    return '1';
		}
		return '0';
    }

	static function getUserIDbyUsername($username){
        $ob=new Users_Model();
		return $ob->getUserID($username,'username','id');
	}

    static function getLogin($username,$pass){
        $ob=new Users_Model();
		return $ob->getLoginByUsername($username,$pass);
	}

	static function getUsernamebyUserID($userid){
        $ob=new Users_Model();
		return $ob->getUserID($userid,'id','username');
	}
    static function getUserIDbyPhone($phone){
        $ob=new Users_Model();
		return $ob->getPhoneByPhone($phone);
	}

    static function getPhoneCodebyPhone($phone,$code){
        $ob=new Users_Model();
		return $ob->getPhoneCode($phone,$code);
	}
    static function updatePhoneCodebyPhone($phone,$code){
        $ob=new Users_Model();
		return $ob->updatePhoneCode($phone,$code);
	}
}
?>