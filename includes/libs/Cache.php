<?php
if(!defined('WY_ROOT')) exit;
class Cache {
	private $cache_path;//path for the cache
	private static $instance=null;
	private $db;
	private $remoteIpList;
	
	public function __construct(){
		$this->cache_path=WY_ROOT.'/cache/';
		$this->db=Mysql::getInstance();
	}
		
	static function getInstance(){
		if(self::$instance==null){
			self::$instance=new Cache();
	    }
		return self::$instance;
	}

	//returns the filename for the cache
	private function fileName($key){
		if(!file_exists($this->cache_path)) mkdir($this->cache_path);
		return $this->cache_path.md5($key.WY_CACHE_TOKEN).'.php';
	}

	//creates new cache files with the given data, $key== name of the cache, data the info/values to store
	public function put($key, $data,$cons=''){		
		$values = serialize($data);
		$filename = $this->fileName($key);
		$file = fopen($filename, 'w');
	    if ($file){//able to create the file
	        fwrite($file, $values);
	        fclose($file);
	    }
	    else return false;
		if($cons=='') $this->remoteUpdateCache($key);
	}

	//returns cache for the given key
	public function get($key){
		$filename = $this->fileName($key);
		if (!file_exists($filename) || !is_readable($filename)){//can't read the cache
			return false;
		}
			$file = fopen($filename, "r");// read data file
	        if ($file){//able to open the file
	            $data = fread($file, filesize($filename));
	            fclose($file);
	            return unserialize($data);//return the values
	        }
	        else return false;
 	}

function updateCache($cacheName='',$cons=''){
    if(is_string($cacheName)){
	  $data=array();
	  $data=$this->$cacheName($cons);
	  $this->put($cacheName,$data,$cons);
	}

	if(is_array($cacheName)){
	    foreach($cacheName as $method){
		    $data=array();
		    $data=$this->$method();
			$this->put($method,$data,$cons);
		}
	}
}

function newsClass(){
    $cache=array();
    $result=$this->db->query("SELECT * FROM ".DB_PREFIX."newsclass");
		if($this->db->num_rows($result)>0){
		  while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
				'id'=>intval($row['id']),
				'classname'=>htmlspecialchars($row['classname']),
			);
		  }
  }
  return $cache;
}

function news(){
    $cache=array();
    $result=$this->db->query("SELECT *,Date(addtime) as addtime FROM ".DB_PREFIX."news WHERE is_state=0 ORDER BY id DESC");
		if($this->db->num_rows($result)>0){
		  while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
				'id'=>intval($row['id']),
				'classid'=>intval($row['classid']),
				'title'=>htmlspecialchars($row['title']),
				'is_color'=>htmlspecialchars($row['is_color']),
				'is_bold'=>htmlspecialchars($row['is_bold']),
				'is_popup'=>intval($row['is_popup']),
				'is_display_home'=>intval($row['is_display_home']),
				'views'=>intval($row['views']),
				'addtime'=>htmlspecialchars($row['addtime']),
			);
		  }
  }
  return $cache;
}

function channelList(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."channellist WHERE is_state=0 ORDER BY sortid DESC");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
				'channelname'=>htmlspecialchars($row['channelname']),
				'accessType'=>htmlspecialchars($row['accessType']),
				'gateway'=>htmlspecialchars($row['gateway']),
				'price'=>makeSafe($row['price'],'float'),
				'platformPrice'=>makeSafe($row['platformPrice'],'float'),
				'payid'=>intval($row['payid']),
				'id'=>intval($row['id']),
				);
		}
	}
return $cache;
}

function config(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."config");
	if($this->db->num_rows($result)>0){
	    $row=$this->db->fetch_array($result);
	    	foreach ($row as $k => $v) {
			$cache[$k]=$v;
		}
		return $cache;
		$cache=array(
            'sitename'=>htmlspecialchars($row['sitename']),
			'sitetitle'=>htmlspecialchars($row['sitetitle']),
            'siteurl'=>htmlspecialchars($row['siteurl']),
            'keyword'=>htmlspecialchars($row['keyword']),
            'description'=>htmlspecialchars($row['description']),
            'template'=>htmlspecialchars($row['template']),
			'theme'=>htmlspecialchars($row['theme']),
			'themeforbuy'=>htmlspecialchars($row['themeforbuy']),
            'qq'=>htmlspecialchars($row['qq']),
            'tel'=>htmlspecialchars($row['tel']),
			'address'=>htmlspecialchars($row['address']),
			'servicemail'=>htmlspecialchars($row['servicemail']),
            'reguser'=>intval($row['reguser']),
            'userstate'=>intval($row['userstate']),
            'copyright'=>htmlspecialchars($row['copyright']),
            'tongji'=>$row['tongji'],
            'smtp'=>htmlspecialchars($row['smtp']),
			'email'=>htmlspecialchars($row['email']),
			'authkey'=>htmlspecialchars($row['authkey']),
			'icp'=>htmlspecialchars($row['icp']),
			'takecash'=>makeSafe($row['takecash'],'float'),
			'sitestate'=>intval($row['sitestate']),
			'msgtip'=>htmlspecialchars($row['msgtip']),
			'takecash_f'=>intval($row['takecash_f']),
			'takecash_t'=>intval($row['takecash_t']),
			'takecash_state'=>intval($row['takecash_state']),
			'takecash_msgtip'=>htmlspecialchars($row['takecash_msgtip']),
			'go_page_theme'=>htmlspecialchars($row['go_page_theme']),
			'buy_page_popup'=>intval($row['buy_page_popup']),
			'filter_state'=>intval($row['filter_state']),
			'filter_dangerwords'=>htmlspecialchars($row['filter_dangerwords']),
			'filter_safewords'=>htmlspecialchars($row['filter_safewords']),
			'takecash_times'=>intval($row['takecash_times']),
			'takecash_times_msg'=>htmlspecialchars($row['takecash_times_msg']),
			'cache_syn_state'=>intval($row['cache_syn_state']),
			'cache_syn_ip'=>htmlspecialchars($row['cache_syn_ip']),
		);
	}
return $cache;
}

function userPrice(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."userprice WHERE is_state=0 ORDER BY sortid DESC");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
				'id'=>intval($row['id']),
			    'price'=>makeSafe($row['price'],'float'),
				'userid'=>intval($row['userid']),
				'channelid'=>intval($row['channelid']),
				'channelname'=>Channels_Model::getChannelnamebyChannelID(intval($row['channelid'])),
			);
		}
	}
return $cache;
}

function goodCate(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodcate ORDER BY sortid ASC,id DESC");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
				'linkid'=>htmlspecialchars($row['linkid']),
			    'catename'=>htmlspecialchars($row['catename']),
				'userid'=>intval($row['userid']),
				'id'=>intval($row['id']),
				'sortid'=>intval($row['id']),
				'sitename'=>htmlspecialchars($row['sitename']),
				'siteurl'=>htmlspecialchars($row['siteurl']),
				'qq'=>htmlspecialchars($row['qq']),
				'is_link_state'=>intval($row['is_link_state']),
				'theme'=>htmlspecialchars($row['theme']),
			);
		}
	}
return $cache;
}

function goodList(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."goodlist ORDER BY sortid ASC,id DESC");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
				'linkid'=>htmlspecialchars($row['linkid']),
			    'goodname'=>htmlspecialchars($row['goodname']),
				'cateid'=>intval($row['cateid']),
				'userid'=>intval($row['userid']),
				'id'=>intval($row['id']),
				'price'=>makeSafe($row['price'],'float'),
				'cbprice'=>makeSafe($row['cbprice'],'float'),
				'remark'=>htmlspecialchars($row['remark']),
				'sitename'=>htmlspecialchars($row['sitename']),
				'siteurl'=>htmlspecialchars($row['siteurl']),
				'qq'=>htmlspecialchars($row['qq']),
				'is_display'=>intval($row['is_display']),
				'is_paytype'=>intval($row['is_paytype']),
				'invent_report'=>intval($row['invent_report']),
				'is_invent'=>intval($row['is_invent']),
				'is_discount'=>intval($row['is_discount']),
				'is_coupon'=>intval($row['is_coupon']),
				'is_state'=>intval($row['is_state']),
				'is_link_state'=>intval($row['is_link_state']),
				'theme'=>htmlspecialchars($row['theme']),
				'is_send_mail'=>intval($row['is_send_mail']),
				'is_display_remark'=>intval($row['is_display_remark']),
				'is_contact_limit'=>intval($row['is_contact_limit']),
				'is_api'=>intval($row['is_api']),
				'is_email'=>intval($row['is_email']),
				'is_message'=>intval($row['is_message']),
				'is_pwdforsearch'=>intval($row['is_pwdforsearch']),
				'limit_quantity'=>intval($row['limit_quantity']),
				'is_join_main_link'=>intval($row['is_join_main_link']),
			);
		}
	}
return $cache;
}

function rates(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."rates");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
			    'rate'=>makeSafe($row['rate'],'float'),
				'cateid'=>intval($row['cateid']),
				'goodid'=>intval($row['goodid']),
				'userid'=>intval($row['userid']),
				'channelid'=>intval($row['channelid']),
			);
		}
	}
return $cache;
}

function pay(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."pay");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
			    'payid'=>intval($row['payid']),
				'payname'=>htmlspecialchars($row['payname']),
				'paytype'=>htmlspecialchars($row['paytype']),
				'payprice'=>htmlspecialchars($row['payprice']),
				'paylength'=>htmlspecialchars($row['paylength']),
				'imgurl'=>htmlspecialchars($row['imgurl']),
			);
		}
	}
return $cache;
}

function payList(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."paylist");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
			    'payid'=>intval($row['payid']),
				'gateway'=>htmlspecialchars($row['gateway']),
				'accessType'=>htmlspecialchars($row['accessType']),
			);
		}
	}
return $cache;
}

function accessProvider(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."accessprovider");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
			    'email'=>htmlspecialchars($row['email']),
				'accessID'=>htmlspecialchars($row['accessID']),
				'accessKey'=>htmlspecialchars($row['accessKey']),
				'accessType'=>htmlspecialchars($row['accessType']),
				'accessName'=>htmlspecialchars($row['accessName']),
			);
		}
	}
return $cache;
}

function userInfo(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."userinfo");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
			    'userid'=>intval($row['userid']),
				'ptype'=>intval($row['ptype']),
				'realname'=>htmlspecialchars($row['realname']),
				'idcard'=>htmlspecialchars($row['idcard']),
				'bank'=>htmlspecialchars($row['bank']),
				'card'=>htmlspecialchars($row['card']),
				'addr'=>htmlspecialchars($row['addr']),
				'alipay'=>htmlspecialchars($row['alipay']),
				'tenpay'=>htmlspecialchars($row['tenpay']),
				'is_login'=>intval($row['is_login']),
				'is_safe'=>intval($row['is_safe']),
				'user_tpl'=>htmlspecialchars($row['user_tpl']),
				'is_pwcard'=>intval($row['is_pwcard']),
				'sn'=>$row['sn'],
				'pwCardCol'=>htmlspecialchars($row['pwCardCol']),
			);
		}
	}
return $cache;
}

function users(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."users");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
			    'id'=>intval($row['id']),
				'userkey'=>htmlspecialchars($row['userkey']),
				'verifycode'=>htmlspecialchars($row['verifycode']),
				'qq'=>htmlspecialchars($row['qq']),
				'tel'=>htmlspecialchars($row['tel']),
				'email'=>htmlspecialchars($row['email']),
				'sitename'=>htmlspecialchars($row['sitename']),
				'siteurl'=>htmlspecialchars($row['siteurl']),
				'is_getgood'=>intval($row['is_getgood']),
				'is_invent'=>intval($row['is_invent']),
				'is_paytype'=>intval($row['is_paytype']),
				'statistics'=>$row['statistics'],
				'is_contact_limit'=>intval($row['is_contact_limit']),
				'is_link_state'=>intval($row['is_link_state']),
			    'is_user_popup'=>intval($row['is_user_popup']),
				'template'=>htmlspecialchars($row['template']),
				'go_page_theme'=>htmlspecialchars($row['go_page_theme']),
				'is_api'=>intval($row['is_api']),
			);
		}
	}
return $cache;
}

function goodDiscount(){
    $cache=array();
	$result=$this->db->query("SELECT * FROM ".DB_PREFIX."gooddiscount");
	if($this->db->num_rows($result)>0){
	    while($row=$this->db->fetch_array($result)){
		    $cache[]=array(
			    'goodid'=>intval($row['goodid']),
				'dis_quantity'=>intval($row['dis_quantity']),
				'dis_price'=>($row['dis_price']),
			);
		}
	}
return $cache;
}

function remoteUpdateCache($cacheName){
    $currentIp=GetHostByName(_S('HTTP_HOST'));
	$ob=new Config_Model();
	$config=$ob->getOneData();
	$cache_syn_state=$config['cache_syn_state'];
	$cache_syn_ip=$config['cache_syn_ip'];
	if($cache_syn_state && $cache_syn_ip){
		$remoteIpList=explode('|',$cache_syn_ip);
		foreach($remoteIpList as $ip){
			if($ip!=$currentIp){
				$url='http://'.$ip.':12222/RUC.php';
				if(GetHttpStatusCode($url)==200){
					$params=array('cacheName'=>$cacheName);
					HttpClient::quickPost($url,$params);
				}
			}
		}
	}
}

}
?>