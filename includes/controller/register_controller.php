<?php
class register_controller{
	private $cache;

    function __construct($mod){
	    $this->cache=Cache::getInstance();
		$this->config=$this->cache->get('config');
		$this->mod=$mod;
	}

    function display(){
		require View::getView('header');
        $url='./register.htm';
        if(!_G('key')){
            Redirect('sendcode.htm');
            die();
        }
		$ob = new EmailCode_Model();
		$entity = $ob->getOneDataByKey(_G('key'));
		if(!$entity){
			$msg='无效的key！';
		}
		if($entity['status'] == 1){
			$msg='邮箱已激活！不能重复激活。请确认您的邮箱唯一！';
			$url='./';
		}
		if($this->config['reguser']){
			$msg='商户注册已关闭，暂不提供注册！';
			$url='./';
		}
		
		
		$title='商户注册 - '.$this->config['sitename'];        
		if(isset($msg)){
			$ob->updateData($entity['id'], array('status' => 1));
			require View::getView('message');
			require View::getView('footer');
			View::Output(); exit;
		} else {
			$email = $entity['email'];
		    require View::getView($this->mod);
		}
		require View::getView('footer');
		View::Output();
	}
	
	function sendcode(){
		$title='商户注册 - '.$this->config['sitename'];
        require View::getView('header');
		if($this->config['reguser']){
			$msg='商户注册已关闭，暂不提供注册！';
			$url='./';
			require View::getView('message');
		}else{
			//require View::getView($this->mod);
            require View::getView('register');
		}		
		require View::getView('footer');
		View::Output();
	}
	
	function sendMail(){		
		$url='./sendcode.htm';
		$u = new Users_Model();
		$rows = $u->getDataNum("`email` = '" . _P('email') . "'");
		if($rows > 0){
			$msg = '邮箱已存在，不能重复注册!';
			require View::getView('header');
			require View::getView('message');			
			require View::getView('footer');
			View::Output();
			die();
		}
		
		$ob = new EmailCode_Model();
		$id = $ob->addData(array('email' => _P('email'), 'key' => md5(md5(_P('email') . time())), 'status' => 0));
		if(!$id){
			$msg = '生成邀请码时发生异常。邀请邮件发送失败!';
		}
		$entity = $ob->getOneData($id);
		if(!$entity){
			$msg = '获取邀请码时发生异常。邀请邮件发送失败!';
			$ob->deleteData($id);
		}
		require View::getView('header');
		if(isset($msg)){
			require View::getView('message');
		}else{
			$reg_url = "http://{$_SERVER['HTTP_HOST']}/register.htm?key={$entity['key']}";
			$msg = sendMail(_P('email'),'注册邀请链接', "{$this->config['sitename']}提示您点击注册：<a href='{$reg_url}'>{$reg_url}</a>");
			if($msg == 1){
				$url='./';
				$img = 'success';
				$msg = "注册邀请邮件已成功发送！请到您的邮箱：“" . _P('email') . "”查收！";				
				require View::getView('message');
			}else{
				
				if(strpos($msg, 'authenticate')){
					$msg = 'SMTP邮箱配置错误!<br>异常信息：SMTP认证错误，用户名或密码错误.';
				}else{
					$msg = '邮件发送失败。错误信息：' . $msg;
				}			
				$url='./sendcode.htm';
				require View::getView('message');
			}
		}		
		require View::getView('footer');
		View::Output();
	}

    function loginforappcontinue(){
		if(!isset($_SESSION['login_userid'])){
			Redirect('register.htm');
		}

		$title='绑定第三方登陆账号，请继续补充资料 - '.$this->config['sitename'];
        require View::getView('header');
		if($this->config['reguser']){
			$msg='商户注册已关闭，暂不提供注册！';
			$url='./';
			require View::getView('message');
			require View::getView('footer');
			View::Output(); exit;
		} else {

			if(isset($_POST['reginfo']) && $_POST['reginfo']){
				$reginfo=$_POST['reginfo'];

				foreach($reginfo as $key=>$val){
					$$key=makeSafe($val);		
				}

				if($username=='' || $email=='' || $qq=='' || $password=='' || $realname==''){
					$msg='商户注册资料填写不完整！';
					$url='loginforappcontinue.htm';
					require View::getView('message');
				} else if(strlen($username)<6 || strlen($username)>20){
					$msg='商户名称长度必须在6至20个字符之间！';
					$url='loginforappcontinue.htm';
					require View::getView('message'); 
				} else if(!isMail($email)){
					$msg='填写的邮箱格式错误！';
					$url='loginforappcontinue.htm';
					require View::getView('message');
				} else if(strlen($idcard)!=18){
					$msg='身份证号格式错误！';
					$url='register.htm';
					require View::getView('message');  
				} else if(strlen($phone)!=11){
					$msg='填写的手机格式错误！';
					$url='register.htm';
				} else if(strlen($qq)<5 || strlen($qq)>12){
					$msg='填写的QQ号码格式错误！';
					$url='loginforappcontinue.htm';
					require View::getView('message');
				} else if(Users_Model::getUserIDbyUsername($username)){
					$msg='您填写的商户账号已经存在！';
					$url='loginforappcontinue.htm';
					require View::getView('message');     
				} else {
					$bank1='';
					$card1='';
					$addr1='';
					$alipay1='';
					$tenpay1='';
					if($ptype==1){
						$bank1=$bank;
						$card1=$card;
						$addr1=$resideprovince.' '.$residecity.' '.$addr;
					} else if($ptype==2){
						$alipay1=$alipay;
					} else if($ptype==3){
						$tenpay1=$tenpay;
					}

					$data=array(
						'username'=>$username,
						'userpass'=>md5(md5($password)),
						'email'=>$email,
						'qq'=>$qq,
						'utype'=>2,
						'tel'=>$phone,
						'verifycode'=>md5(getRandomString(40)),
						'userkey'=>dwz($username,6),
						'addtime'=>date('Y-m-d H:i:s'),
						'is_apply_settlement'=>1,
						'ctype'=>1,
						'is_state'=>$this->config['userstate'],
						'theme'=>$this->config['theme'],
						'template'=>$this->config['themeforbuy'],
						'go_page_theme'=>$this->config['go_page_theme'],
						'is_user_popup'=>$this->config['buy_page_popup'],
						);
					$ob=new Users_Model();
					$userid=$ob->updateData($_SESSION['login_userid'],$data);

					$info=array('userid'=>$_SESSION['login_userid'],'realname'=>$realname,'bank'=>$bank1,'card'=>$card1,'addr'=>$addr1,'alipay'=>$alipay1,'tenpay'=>$tenpay1,'ptype'=>$ptype);
					$ob=new UserInfo_Model();
					$ob->addData($info);

					//建立商户账户
					$userMoney=new UserMoney_Model();
					$userMoney->addData(array('userid'=>$_SESSION['login_userid']));
					//建立商户分成
					$userPrice=new UserPrice_Model();
					$Cache=Cache::getInstance();
					$channels=$Cache->get('channelList');
					if($channels){
						foreach($channels as $key=>$val){
							$userPrice->addData(array('userid'=>$_SESSION['login_userid'],'price'=>$val['price'],'channelid'=>$val['id']));
						}
					}

				}

				$msg='恭喜，商户注册成功！请使用您的账号和密码登录。';
				$url='login.htm';
				require View::getView('message2');

			} else {
				//获取信息
				$users=new Users_Model();
				$data=$users->getOneData($_SESSION['login_userid']);
				require View::getView('loginforappcontinue');
			}
		}
		require View::getView('footer');
		View::Output();
	}

	function checkuser(){
		$username=_G('newusername');
		if(Users_Model::getUserIDbyUsername($username)){
			echo '1';
			exit;
		} else {
			echo '0';
			exit;
        }
	}
}
?>