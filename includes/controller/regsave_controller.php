<?php
class regsave_controller{
	private $cache;

    function __construct($mod){
	    $this->cache=Cache::getInstance();
		$this->config=$this->cache->get('config');
		$this->mod=$mod;
	}

    function display(){
		$title=$this->config['sitename'];
		require View::getView('header');
		$reginfo=isset($_POST['reginfo']) ? $_POST['reginfo'] : array();
		if(!$reginfo) Redirect('register.htm');

		foreach($reginfo as $key=>$val){
		    $$key=makeSafe($val);		
		}
        //if($chkcode != $_SESSION['chkcode']){
        //    $msg='验证码错误！';
        //    $url='register.htm';			
        //    require View::getView('message');
        //}
        //if($username=='' || $email=='' || $phone=='' || $qq=='' || $password=='' ){
        //    $msg='商户注册资料填写不完整！';
        //    $url='register.htm';
        //    require View::getView('message');
        //} else if(strlen($username)<6 || strlen($username)>20){
        //    $msg='商户名称长度必须在6至20个字符之间！';
        //    $url='register.htm';
        //    require View::getView('message'); 
        //} else if(!isMail($email)){
        //    $msg='填写的邮箱格式错误！';
        //    $url='register.htm';
        //    require View::getView('message'); 
        //} 
        //else if(strlen($idcard)!=18){
        //    $msg='身份证号格式错误！';
        //    $url='register.htm';
        //    require View::getView('message');  
        //} 
        if($username==''  || $phone=='' ||  $password=='' ){
            $msg='商户注册资料填写不完整！';
            $url='register.htm';
            require View::getView('message');
        } 
        else if(strlen($username)<6 || strlen($username)>20){
            $msg='商户名称长度必须在6至20个字符之间！';
            $url='register.htm';
            require View::getView('message'); 
        } 
        //else if(!isMail($email)){
        //    $msg='填写的邮箱格式错误！';
        //    $url='register.htm';
        //    require View::getView('message'); 
        //} 
        else if(strlen($phone)!=11){
			$msg='填写的手机格式错误！';
			$url='register.htm';
		    require View::getView('message');    
		} 
        else if(strlen($qq)<5 || strlen($qq)>12){
            $msg='填写的QQ号码格式错误！';
            $url='register.htm';
            require View::getView('message');
        }else if(Users_Model::getUserIDbyUsername($username)){
			$msg='您填写的商户账号已经存在！';
			$url='register.htm';
		    require View::getView('message');     
		} 
        else if(Users_Model::getUserIDbyPhone($phone)){
			$msg='您填写的手机号已经存在,请直接登录！';
			$url='register.htm';
		    require View::getView('message');     
		} 
       else {
		    $bank1='';
			$card1='';
			$addr1='';
			$alipay1='';
			$tenpay1='';
            $ptype =0;

            $is_apply_settlement = 1;//默认商户可以申请提现
            //if($ctype!=1 && $ctype!=2){$ctype=1;}
            //$is_apply_settlement=$ctype==1 ? 1 : 0;
            $ctype = 1;
			$data=array('username'=>$username,'userpass'=>md5(md5($password)),'email'=>'','tel'=>$phone,'qq'=>$qq,'utype'=>2,'verifycode'=>md5(getRandomString(40)),'userkey'=>dwz($username,6),'addtime'=>date('Y-m-d H:i:s'),'is_apply_settlement'=>$is_apply_settlement,'ctype'=>$ctype,'is_state'=>$this->config['userstate'],'theme'=>$this->config['theme'],'template'=>$this->config['themeforbuy'],'go_page_theme'=>$this->config['go_page_theme'],'is_user_popup'=>$this->config['buy_page_popup'],'superman'=>$superman == '' ? 0 : $superman,'istg'=>$istg=='1'?1:0,'tel_check'=>1);
			$ob=new Users_Model();
			$userid=$ob->addData($data);

			$info=array('userid'=>$userid,'realname'=>$realname,'bank'=>$bank1,'card'=>$card1,'addr'=>$addr1,'alipay'=>$alipay1,'tenpay'=>$tenpay1,'ptype'=>$ptype,'idcard'=>$idcard);
			$ob=new UserInfo_Model();
			$ob->addData($info);
			//建立商户账户
			$userMoney=new UserMoney_Model();
			$a2 = $userMoney->addData(array('userid'=>$userid));
			
			//建立商户分成
			$userPrice=new UserPrice_Model();
			$Cache=Cache::getInstance();
			$channels=$Cache->get('channelList');
			if($channels){
				foreach($channels as $key=>$val){
					$userPrice->addData(array('userid'=>$userid,'price'=>$val['price'],'channelid'=>$val['id']));
				}
			}

            //更新短信验证码状态
            Users_Model::updatePhoneCodebyPhone($phone,$phonecode);
			$msg='恭喜，商户注册成功！请登陆。';
			$url='login.htm';
			require View::getView('message2');
		}

		require View::getView('footer');
		View::Output();
	}
}
?>