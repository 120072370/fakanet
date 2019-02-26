<?php
class AppCenter{
	private $cache;
	private static $instance=null;

    function __construct(){
	    $this->cache=Cache::getInstance();
		$this->config=$this->cache->get('config');
		$this->getMod();
	}

	static function getInstance(){
	    if(self::$instance==null){
		    self::$instance=new AppCenter();
		}
	return self::$instance;
	}

	function run(){
        if(!$this->config){
    		echo '配置信息不存在，请登陆管理中心配置。';
			exit;
		}

		if($this->config['sitestate']){
		    echo $this->config['msgtip'];
			exit;
		}
		session_start();
		$ob=new $this->model($this->mod);
		$method=method_exists($ob,$this->method) ? $this->method : 'index';
		$ob->$method();
	}

    function getMod(){
		if(isMobile() && _S('HTTP_HOST')==$_SERVER['HTTP_HOST']){
		    define('VIEW_PATH',WY_ROOT.'/tpl/mobile_a8tg_com/');
		}
		$routes=array(
			array(
		        'mod'=>'index',
			    'model'=>'index_controller',
			    'method'=>'display',
			),
			array(
		        'mod'=>'news',
			    'model'=>'index_controller',
			    'method'=>'newslist',
			),
			array(
		        'mod'=>'orderquery',
			    'model'=>'orderquery_controller',
			    'method'=>'display',
			),
			array(
		        'mod'=>'verify',
			    'model'=>'orderquery_controller',
			    'method'=>'verify',
			),
			array(
		        'mod'=>'myorders',
			    'model'=>'orderquery_controller',
			    'method'=>'myorders',
			),
			array(
		        'mod'=>'checkgoods',
			    'model'=>'checkgoods_controller',
			    'method'=>'display',
			),
			array(
		        'mod'=>'userlogin',
			    'model'=>'userlogin_controller',
			    'method'=>'display',
			),
			array(
		        'mod'=>'login',
			    'model'=>'login_controller',
			    'method'=>'display',
			),
			array(
		        'mod'=>'register',
			    'model'=>'register_controller',
			    'method'=>'sendcode',
			),
			array(
		        'mod'=>'sendcode',
			    'model'=>'register_controller',
			    'method'=>'sendcode',
			),
			array(
		        'mod'=>'send',
			    'model'=>'register_controller',
			    'method'=>'sendMail',
			),
			array(
		        'mod'=>'checkuser',
			    'model'=>'register_controller',
			    'method'=>'checkuser',
			),
			array(
		        'mod'=>'regsave',
			    'model'=>'regsave_controller',
			    'method'=>'display',
			),
			array(
		        'mod'=>'retpwd',
			    'model'=>'retpwd_controller',
			    'method'=>'display',
			),
			array(
		        'mod'=>'setnewpwd',
			    'model'=>'retpwd_controller',
			    'method'=>'newpwd',
			),
			array(
		        'mod'=>'withquestion',
			    'model'=>'retpwd_controller',
			    'method'=>'withquestion',
			),
			array(
		        'mod'=>'view',
			    'model'=>'index_controller',
			    'method'=>'viewarticle',
			),
			array(
		        'mod'=>'result',
			    'model'=>'index_controller',
			    'method'=>'result',
			),
			array(
		        'mod'=>'exit',
			    'model'=>'index_controller',
			    'method'=>'exitfortimeout',
			),
			array(
		        'mod'=>'|viewpop|paytype|tariff|settlement|useful|faq|contact|about|statement|qiye|recruitment|course|goumai|statement|recruitment|detail|downapp|',
			    'model'=>'index_controller',
			    'method'=>'pagecontent',
			),
			array(
		        'mod'=>'bindforappsuccess',
			    'model'=>'index_controller',
			    'method'=>'bindforappsuccess',
			),
			array(
		        'mod'=>'loginforappfail',
			    'model'=>'index_controller',
			    'method'=>'loginforappfail',
			),
			array(
		        'mod'=>'loginforappcontinue',
			    'model'=>'register_controller',
			    'method'=>'loginforappcontinue',
			),
		);

		#前台模板路径
        define('VIEW_PATH',WY_ROOT.'/tpl/'.$this->config['template'].'/');
		$mod=_G('mod');
		$mod=preg_match('/^[a-zA-Z]+$/',$mod) ? strtolower($mod) : 'index';

		//$mod=$mod==false || !file_exists(VIEW_PATH.$mod.'.php') ? 'index' : $mod;
		foreach($routes as $key =>$route){
		    if($mod==$route['mod'] || strpos($route['mod'],$mod)){				
			    $this->model=$route['model'];
				$this->method=$route['method'];
				$this->mod=$mod;
			}
		}
		if(!isset($this->model)){
			$this->model=$routes[0]['model'];
			$this->method=$routes[0]['method'];
			$this->mod=$routes[0]['mod'];
		}
    }
}
?>