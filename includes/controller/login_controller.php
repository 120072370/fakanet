<?php
class login_controller{
	private $cache;

    function __construct($mod){
	    $this->cache=Cache::getInstance();
		$this->config=$this->cache->get('config');
		$this->mod=$mod;
	}

    function display(){
        if(isset($_SESSION['login_username']) && isset($_SESSION['login_userid'])){
            redirect('usr/');
            exit;
        }

		$title='商户登陆 - '.$this->config['sitename'];
        require View::getView('header');
		require View::getView($this->mod);
		require View::getView('footer');
		View::Output();
	}
}
?>