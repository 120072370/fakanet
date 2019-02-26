<?php
class index_controller{
	private $cache;
	private $db;

    function __construct($mod){
	    $this->cache=Cache::getInstance();
		$this->config=$this->cache->get('config');
		$this->db=Mysql::getInstance();
		$this->mod=$mod;
	}

    function display(){
		//文章信息
		$id=_G('id','int');
		if($id){
		    $ob=new News_Model();
			$data=$ob->getOneData($id);
			if($data){
			    require View::getView('viewpop');
				View::Output(); exit;
			}
		}
		$news=$this->cache->get('news');
		$title=$this->config['sitename'];
		require View::getView('header');
		require View::getView('index');
		require View::getView('footer');
        
		View::Output();
	}

	function newslist(){
	    $ob=new News_Model();
		$title='最新动态 - '.$this->config['sitename'];
		$classid=1;
		$page=_G('p','int');
		$page=$page==false ? 1 : $page;
		$pagesize=20;
		$cons=$classid ? "WHERE classid=$classid AND is_display_home=1 ORDER BY id DESC" : "ORDER BY id DESC";
		$totalsize=$ob->getDataNum($cons);
		$totalpage=ceil($totalsize / $pagesize);
		$page=$page>$totalpage ? $totalpage : $page;
		$lists=$ob->getData($page,$pagesize,$cons);

		$pagelist=getpagelist('?p=' , $page , $totalpage , $totalsize);

		require View::getView('header');
		require View::getView('newslist');
		require View::getView('footer');	
	}

	function viewarticle(){
		$title=$this->config['sitename'];
	    $id=_G('id','int');
		$t=_G('t','int');
		$id=$id==false ? 0 : $id;
		$ob=new News_Model();
		$data=$ob->getOneData($id);
		if(!$data){
			$msg='文章信息不存在！';
			$url='./';
            require View::getView('header');
		    require View::getView('message');
		    require View::getView('footer');
		    View::Output(); exit;
		}
		
		if($t){
		    require View::getView('view');
		} else {
			$title=$data['title'].' - '.$title;
			require View::getView('header');
			require View::getView('view');
			require View::getView('footer');			
		}
		View::Output();
	}

	function pagecontent(){
		switch($this->mod){
		    case 'paytype': $title='付款方式'; break;
			case 'tariff': $title='资费标准'; break;
			case 'settlement': $title='结算模式'; break;
			case 'useful': $title='使用流程'; break;
			case 'faq': $title='帮助中心'; break;
			case 'contact': $title='联系我们'; break;
			case 'qiye': $title='公司资质'; break;
			case 'nopage': $title='公告'; break;
			case 'recruitment': $title='人才招聘'; break;
			case 'statement': $title='免责声明'; break;
			case 'goumai': $title='购买流程'; break;
			case 'detail': $title='防御部署'; break;
			case 'course': $title='发展历程'; break;
			default: $title='';
		}
		$title=$title!='' ? $title.' - ' : '';
		$title.=$this->config['sitename'];
        require View::getView('header');
		require View::getView($this->mod);
		require View::getView('footer');
		View::Output();
	}

	function result(){
	    $orderid=_G('orderid');
		if(!$orderid) Redirect('./');
		$neworderid=strlen($orderid)==20 ? substr($orderid,0,16) : $orderid;
		//if(!preg_match('/^[0-9A-Z]+{16}$/',$neworderid)) Redirect('./');
		$result=$this->db->query("SELECT userid FROM ".DB_PREFIX."buylist WHERE orderid='$neworderid' LIMIT 1");
		if($this->db->num_rows($result)==0) Redirect('./');
		$row=$this->db->fetch_array($result);
		$userid=$row[0];

		$user=new Users_Model();
		$users=$user->getOneData($userid);
		$is_getgood=$users['is_getgood'];

		if($is_getgood) Redirect('orderquery.htm?orderid='.$orderid.'');

		$result=$this->db->query("SELECT channelid,realmoney FROM ".DB_PREFIX."orderlist WHERE orderid='$orderid' AND payorderid<>'' LIMIT 1");
		$channelname='';
		$realmoney=0;
		if($this->db->num_rows($result)==1){
		    $row=$this->db->fetch_array($result);
			$channelname=Channels_Model::getChannelnamebyChannelID($row['channelid']);
			$realmoney=$row['realmoney'];
		}
		require View::getView('result');
		View::Output();
	}

	function exitfortimeout(){
		$title=$this->config['sitename'];
		$msg='商户账号登陆超时，请重新登陆！';
		$url='login.htm';
        require View::getView('header');
		require View::getView('message');
		require View::getView('footer');
		View::Output();
	}

	function bindforappsuccess(){
		$msg='<span style="color:green">您的第三方登录账号已绑定成功！</span>';
		$url='usr/';
		$img='success';
        require View::getView('header');
		require View::getView('message2');
		require View::getView('footer');
		View::Output();
	}

	function loginforappfail(){
		$msg='商户账号登陆登录失败！';
		$url='login.htm';
        require View::getView('header');
		require View::getView('message');
		require View::getView('footer');
		View::Output();
	}
}
?>