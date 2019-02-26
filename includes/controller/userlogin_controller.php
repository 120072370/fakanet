<?php
class userlogin_controller{
	private $cache;

    function __construct($mod){
	    $this->cache=Cache::getInstance();
		$this->config=$this->cache->get('config');
		$this->mod=$mod;
	}

    function display(){
		$title=$this->config['sitename'];
		require View::getView('header');
		$username=_P('username');
		$password=_P('password');
		$chkcode=_P('chkcode');

		if($username=='' || $password=='' || $chkcode == ''){
			$msg='商户登陆信息填写不完整！';
			$url='login.htm';			
			require View::getView('message');
		} else {
		    $user=new Users_Model();
            //if(!$login_userid=Users_Model::getUserIDbyUsername($username)){
            //    $msg='登陆商户名不存在！';
            //    $url='login.htm';			
            //    require View::getView('message');
            //}else 
            if($chkcode != $_SESSION['chkcode']){
                $msg='验证码错误！';
				$url='login.htm';			
				require View::getView('message');
            }
            else if(!$login_userid=Users_Model::getLogin($username,md5(md5($password)))){
                $msg='用户名或密码错误！';
                $url='login.htm';			
                require View::getView('message');
            }else {
			    $data=$user->getOneData($login_userid);
				if($data['is_state']==1 || $data['utype']!=2){
					$msg='登陆商户未审核，请联系客服开通账号！';
					$url='login.htm';			
					require View::getView('message');
				} else if($data['is_state']==2){
					$msg='您的帐号存在风险，已经被冻结，请联系客服处理！';
					$url='login.htm';
					require View::getView('message'); 
				} else if($data['userpass']!=md5(md5($password))) {
					$msg='登陆商户密码错误！';
					$url='login.htm';			
					require View::getView('message'); 
				} else {
					$_SESSION['login_username']=$data["username"];
					$_SESSION['login_userid']=$login_userid;
					$_SESSION['login_session_verify']=sha1($data["username"].$login_userid.WY_CACHE_TOKEN);
					$_SESSION['login_userkey']=$data['userkey'];
					$_SESSION['login_user_theme']=$data['theme'];
					$_SESSION['login_user_lastaccess']=date('Y-m-d H:i:s');
					$_SESSION['is_apply_settlement']=$data['is_apply_settlement'];
					$_SESSION['login_user_ctype']=$data['ctype'];
					$_SESSION['login_is_api']=$data['is_api'];
					$_SESSION['is_auth']=$data['is_auth'];
					$_SESSION['istg']=$data['istg'];
					//update session_id
					$_SESSION['login_session_id']=session_id();
					$user->updateData($login_userid,array('verifycode'=>$_SESSION['login_session_id']));

					$logs=new UserLogs_Model();
					$data=$logs->getOneData($login_userid);
					if($data){
					    $_SESSION['login_logip']=$data['logip'];
					    $_SESSION['login_logtime']=$data['logtime'];
					} else {
					    $_SESSION['login_logip']=get_wx_client_ip();
					    $_SESSION['login_logtime']=date('Y-m-d H:i:s');      
					}
					
					$logs->addData(array('userid'=>$login_userid,'logtime'=>date('Y-m-d H:i:s'),'logip'=>get_wx_client_ip()));
					redirect('usr/');
				}
			}
		}

		require View::getView('footer');
		View::Output();
	}
}
?>