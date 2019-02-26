<?php
class retpwd_controller{
	private $cache;

    function __construct($mod){
	    $this->cache=Cache::getInstance();
		$this->config=$this->cache->get('config');
		$this->mod=$mod;
	}

    function display(){
		$title='找回密码 - '.$this->config['sitename'];
        require View::getView('header');
		$msg='';
		$ftype=_P('ftype');
		$username=_P('username');
		$chkcode=_P('chkcode');
        $email = _P("email");
        $phone = _P("phone");

        $phonecode = _P("phonecode");

        if($username!='' && strtolower($chkcode)!=''){

            
            if($username!='' && strtolower($chkcode)==$_SESSION['chkcode']){
                $userid=Users_Model::getUserIDbyUsername($username);
                if(!$userid){
                    $msg='<div class="retmsg">用户名不存在！</div>';
                } else {						
                    if($ftype==1){//手机号找回
                        $user=new Users_Model();
                        $users=$user->getOneData($userid);

                        if($phone != $users['tel']){
                            $msg='<div class="retmsg">手机号填写错误。</div>';
                        } else if(Users_Model::getPhoneCodebyPhone($phone,$phonecode) == '0'){
                            $msg='<div class="retmsg">您填写的短信验证码不正确！</div>'; 
                        } else{
                            
                            ////send email
                            $verifycode=md5(getRandomString(40));
                            $ob=new Users_Model();
                            $ob->updateData($userid,array('verifycode'=>$verifycode,'userpass'=>md5(md5($verifycode))));
                            $linkurl='http://'.$this->config['siteurl'].'/setnewpwd.htm?token='.$verifycode;
                            //$message = "尊敬的用户 {$username}：<br />请点击以下链接找回您的密码：{$linkurl}";
                            //sendMail($email,$this->config['sitename'].' 邮件找回密码',$message);
                            //$title='找回密码 - '.$this->config['sitename'];

                            Users_Model::updatePhoneCodebyPhone($phone,$phonecode);

                            $msg='验证成功，请点击链接修改密码';
                            $url=$linkurl;
                            require View::getView('message2');
                            require View::getView('footer');
                            View::Output();
                            exit;
                        }

                    } else if($ftype==2){
                        
                        $user=new Users_Model();
                        $users=$user->getOneData($userid);

                        if($email != $users['email']){
                            $msg='<div class="retmsg">邮箱填写错误。</div>';
                        }else{
                            //send email
                            $verifycode=md5(getRandomString(40));
                            $ob=new Users_Model();
                            $ob->updateData($userid,array('verifycode'=>$verifycode,'userpass'=>md5(md5($verifycode))));
                            $linkurl='<a href="http://'.$this->config['siteurl'].'/setnewpwd.htm?token='.$verifycode.'">http://'.$this->config['siteurl'].'/setnewpwd.htm?token='.$verifycode.'</a>';
                            $message = "尊敬的用户 {$username}：<br />请点击以下链接找回您的密码：{$linkurl}";
                            sendMail($email,$this->config['sitename'].' 邮件找回密码',$message);
                            $title='找回密码 - '.$this->config['sitename'];

                            $msg='重置密码链接已发送至您的邮箱，请查收！（如未收到邮件，请到垃圾邮件中查看）';
                            $url='login.htm';
                            require View::getView('message2');
                            require View::getView('footer');
                            View::Output();
                            exit;
                        }
                        //$question='';
                        //$ob=new UserInfo_Model();
                        //$userInfo=$ob->getOneData($userid);
                        //if($userInfo){
                        //    $question=$userInfo['question'];
                        //}

                        //if($question==''){
                        //    $msg='<div class="retmsg">未设置安全问题，请使用其他方式找回密码！</div>';
                        //} else {
                        //    require View::getView('withquestion'); 
                        //    require View::getView('footer');
                        //    View::Output();
                        //    exit;
                        //}
					}
				}
			}else{
                $msg='<div class="retmsg">验证码错误</div>';
            }
        }
		//require View::getView($this->mod);
        require View::getView('retpwd');
		require View::getView('footer');
		View::Output();
	}

    

	function newpwd(){
		$msg='';
		$title='重设密码 - '.$this->config['sitename'];
		require View::getView('header');
		$verifycode=_G('token');
		$token=_P('verifycode');
		$username=_P('username');
		$password=_P('password');
		$chkcode=_P('chkcode');
        
        if($token!='' && $username!='' && $password!='' && strtolower($chkcode)!=''){
            
            if(strtolower($chkcode)==$_SESSION['chkcode']){
                $userid=Users_Model::getUserIDbyUsername($username);
                if($userid){
                    $ob=new Users_Model();
                    $users=$ob->getOneData($userid);
                    if($users){
                        if($users['verifycode']==$token){
                            if(strlen($password)<6 || strlen($password)>20){
                                $msg='<div class="retmsg">密码长度在6至20个字符之间！</div>';
                            } else {
                                $ob->updateData($userid,array('userpass'=>md5(md5($password)),'verifycode'=>md5(getRandomString(40))));
                                $msg='登陆密码重设成功，请登陆！';
                                $url='login.htm';
                                require View::getView('message2');
                                require View::getView('footer');
                                View::Output(); exit;
                            }
                        }else{
                            $msg='非法进入！';
                            $url='login.htm';
                            require View::getView('message2');
                            require View::getView('footer');
                            View::Output(); exit;
                        }
                    }
                } else {
                    $msg='用户名不存在！';
                    $url='setnewpwd.htm?token='.$token;
                    require View::getView('message2');
                    require View::getView('footer');
                    View::Output(); exit;
                }
            }else{
                $msg='验证码错误！';
                $url='setnewpwd.htm?token='.$token;
                require View::getView('message2');
                require View::getView('footer');
                View::Output(); exit;
            }
        }
		//require View::getView($this->mod);
        require View::getView('setnewpwd');
        
		require View::getView('footer');
		View::Output(); 
	}

	function withquestion(){
		$msg='';
		$title='重设密码 - '.$this->config['sitename'];
		require View::getView('header');

	    $answer=_P('answer');
		$userid=_P('uid','int');
		$newpassword=_P('newpassword');
		$confirmpassword=_P('confirmpassword');
		$chkcode=_P('chkcode');

		if($answer=='' || $userid=='' || $newpassword=='' || strtolower($chkcode)!=$_SESSION['chkcode']){
			$msg='<div class="retmsg">选项填写不完整！</div>';
			require View::getView('retpwd');
			require View::getView('footer');
			View::Output(); exit;
		}

		if(strlen($newpassword)<6 || strlen($newpassword)>20){
			$msg='<div class="retmsg">登陆密码长度在6至20个字符之间！</div>';
			require View::getView('retpwd');
			require View::getView('footer');
			View::Output(); exit;
		}

		if($newpassword != $confirmpassword){
			$msg='<div class="retmsg">两次输入的密码不一样！</div>';
			require View::getView('retpwd');
			require View::getView('footer');
			View::Output(); exit;
		}

		$ob=new UserInfo_Model();
		$userInfo=$ob->getOneData($userid);
		if($userInfo){
		    if($userInfo['answer']!=$answer){
				$msg='<div class="retmsg">安全问题答案错误，重设密码失败！</div>';
				require View::getView('retpwd');
				require View::getView('footer');
				View::Output(); exit;
			} else {
			    $ob=new Users_Model();
				$ob->updateData($userid,array('userpass'=>md5(md5($newpassword))));
				$msg='登陆重设成功，请登陆！';
				$url='login.htm';
				require View::getView('message2');
				require View::getView('footer');
				View::Output(); exit;
			}
		}

		require View::getView($this->mod);
		require View::getView('footer');
		View::Output(); 
	}
}
?>