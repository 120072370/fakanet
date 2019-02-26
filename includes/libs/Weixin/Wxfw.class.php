<?php
//微信服务号操作类

class Wxfw {
    
	/**
     * 微信api根路径
     * @var string
     */
    private $apiURL    = 'https://api.weixin.qq.com/cgi-bin';
	private $oauthApiURL = 'https://api.weixin.qq.com/sns';
	

    /**
     * 构造方法，用于实例化微信SDK
     * 自动回复消息时实例化该SDK
     * @param  $scope 获取用户信息类型  默认不获取  snsapi_base,snsapi_userinfo
	 * @param  $getjsapi  是否获取jsapi参数 
	 * @param  $getjsapiadmin  是否获取企业管理组jsapi参数
	 * @param  $appid 
	 * @param  $secret
     */
    public function __construct($config=array()){
    	foreach ($config as $k => $v) {
    		$this->$k=$v;
    	}
		$this->appid=isset($config['appid'])?$config['appid']:C('WEIXIN.AppID');
		$this->secret=isset($config['secret'])?$config['secret']:C('WEIXIN.AppSecret');
    }
	
	
	/**
     * 获取openid
	 * @param  $scope  snsapi_base  snsapi_userinfo 
     * @return string openid
     */
    public function get_openid($scope='snsapi_base'){
    	$token=$this->get_access_token_web($scope);
		return $token['openid'];
    }
	
	/**
     * 获取jsapi
     * @return array jsapi信息
     */
    public function get_jsapi(){
    	$param=array(
    		'type'=>'jsapi'
		);
		$jsapi_ticket=$this->api('ticket/getticket',$param);
		$noncestr=uniqid();
		$timestamp=time();
		$url="http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$param=array(
			'noncestr'=>$noncestr,
			'jsapi_ticket'=>$jsapi_ticket['ticket'],
			'timestamp'=>$timestamp,
			'url'=>$url,
		);
		ksort($param);
		$signstr="";
		$i=0;
		foreach ($param as $k => $v) {
			if($i==0){
			    $signstr.=$k.'='.$v;
			}else{
				$signstr.="&".$k.'='.$v;
			}
			$i++;
		}
		return array(
			'appId'=>C('WEIXIN.AppID'),
			'timestamp'=>$timestamp,
			'nonceStr'=>$noncestr,
			'signature'=>sha1($signstr)
		);
    }
	
	
	/**
     * 获取网页授权access_token
	 * @param  $scope  snsapi_base  snsapi_userinfo 
     * @return array 网页授权access_token
     */
    public function get_access_token_web($scope='snsapi_base'){
    	$code=isset($_REQUEST['code'])?$_REQUEST['code']:'';
		if(empty($code)){
			$url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
			header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->appid.'&redirect_uri='.$url.'&response_type=code&scope='.$scope.'&state=1234#wechat_redirect');
			die;
		}
		$param = array(
            'appid'  => $this->appid,
            'secret' => $this->secret,
            'code'=>$code,
            'grant_type'=>'authorization_code',
        );
        $url = "{$this->oauthApiURL}/oauth2/access_token";
    	$token=self::http($url, $param);
		return json_decode($token,true);
    }
	
	
	/**
     * 获取access_token，用于后续接口访问
     * @return array access_token信息，包含 token 和有效期
     */
    public function get_access_token($type = 'client', $code = null){
        $param = array(
            'appid'  => $this->appid,
            'secret' => $this->secret,
            'grant_type' => 'client_credential'
        );
        $url = "{$this->apiURL}/token";
		$token = self::http($url, $param);
		$token = json_decode($token,true);
		return $token['access_token'];
    }
	
	/**
     * 调用微信api获取响应数据
     * @param  string $name   API名称
     * @param  string $data   POST请求数据
     * @param  string $method 请求方式
     * @param  string $param  GET请求参数
     * @return array          api返回结果
     */
    public function api($name, $param = '', $data = '', $method = 'GET'){
        $params = array('access_token' => $this->get_access_token());

        if(!empty($param) && is_array($param)){
            $params = array_merge($params, $param);
        }

        $url  = "{$this->apiURL}/{$name}";
        if(!empty($data)){
            //保护中文，微信api不支持中文转义的json结构
            array_walk_recursive($data, function(&$value){
                $value = urlencode($value);
            });
            $data = urldecode(json_encode($data));
        }
        $data = self::http($url, $params, $data, $method);
		$data=json_decode($data, true);
		if($data['errcode']>0){
			$params['access_token']=$this->get_access_token();
		    $data = self::http($url, $params, $data, $method);
			$data=json_decode($data, true);
		}
        return $data;
    }
	
	
    /**
     * 发送HTTP请求方法，目前只支持CURL发送请求
     * @param  string $url    请求URL
     * @param  array  $param  GET参数数组
     * @param  array  $data   POST的数据，GET请求时该参数无效
     * @param  string $method 请求方法GET/POST
     * @return array          响应数据
     */
    protected static function http($url, $param, $data = '', $method = 'GET'){
        $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        );

        /* 根据请求类型设置特定参数 */
        $opts[CURLOPT_URL] = $url . '?' . http_build_query($param);

        if(strtoupper($method) == 'POST'){
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $data;
            
            if(is_string($data)){ //发送JSON数据
                $opts[CURLOPT_HTTPHEADER] = array(
                    'Content-Type: application/json; charset=utf-8',  
                    'Content-Length: ' . strlen($data),
                );
            }
        }

        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        //发生错误，抛出异常
        //if($error) throw new \Exception('请求发生错误：' . $error);

        return  $data;
    }

}
