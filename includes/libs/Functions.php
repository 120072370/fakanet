<?php
function __autoload($class){
	$classDir=array('libs','model','controller','PHPMailerv51');
	foreach($classDir as $dir){
		$is_class=false;
	    if(file_exists(WY_ROOT.'/includes/'.$dir.'/'.$class.'.php')){
		    require_once WY_ROOT.'/includes/'.$dir.'/'.$class.'.php';
			$is_class=true;
			break;
		}
	}

    if($is_class==false){
	    echo $class.' load fail';
		exit;
	}
}

function _P($param,$t='string'){
    $value=isset($_POST[$param]) ? $_POST[$param] : false;
	$value=$value ? filterWords($value) : $value;
	return makeSafe($value,$t);
}

function _G($param,$t='string'){
    $value=isset($_GET[$param]) ? $_GET[$param] : false;
	return makeSafe($value,$t);
}

function _C($param,$t='string'){
    $value=isset($_COOKIE[$param]) ? $_COOKIE[$param] : false;
	return makeSafe($value,$t);
}

function _S($param,$t='string'){
    $value=isset($_SERVER[$param]) ? $_SERVER[$param] : false;
	return makeSafe($value,$t);
}

function _R($param,$t='string'){
    $value=isset($_REQUEST[$param]) ? $_REQUEST[$param] : false;
	return makeSafe($value,$t);
}

function makeSafe($value,$t='string'){
	$value=trim($value);

    if($t=='int'){
	    return intval($value);
	} elseif($t=='float'){
	    return is_numeric($value) ? $value : 0;
	} else {
		$value=strip_tags($value);
	    if(get_magic_quotes_gpc()){
            return $value;
		} else {
		    if(function_exists('addslashes')){
			    return addslashes($value);
			} else {
			    return mysql_real_escape_string($value);
			}
		}
	}
}

/**
 * 截取编码为utf8的字符串
 *
 * @param string $strings 预处理字符串
 * @param int $start 开始处 eg:0
 * @param int $length 截取长度
 */
function subString($strings,$start,$length){
	if (function_exists('mb_substr')) {
		return mb_substr($strings, $start, $length, 'utf8');
	}
	$str = substr($strings, $start, $length);
	$char = 0;
	for ($i = 0; $i < strlen($str); $i++){
		if (ord($str[$i]) >= 128)
            $char++;
	}
	$str2 = substr($strings, $start, $length+1);
	$str3 = substr($strings, $start, $length+2);
	if ($char % 3 == 1){
		if ($length <= strlen($strings)){
			$str3 = $str3 .= '...';
		}
		return $str3;
	}
	if ($char%3 == 2){
		if ($length <= strlen($strings)){
			$str2 = $str2 .= '...';
		}
		return $str2;
	}
	if ($char%3 == 0){
		if ($length <= strlen($strings)){
			$str = $str .= '...';
		}
		return $str;
	}
}

function getRandomString($len){
    $chars = array("A", "B", "C", "D", "E", "F", "G","H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R","S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2","3", "4", "5", "6", "7", "8", "9");
    $charsLen = count($chars) - 1;
    shuffle($chars);
    $output = "";
    for ($i=0; $i<$len; $i++){
        $output .= $chars[mt_rand(0, $charsLen)];
    }
	$output=substr(strtoupper(md5(md5(uniqid()).md5(microtime()).md5($output))),0,$len);
    return $output;
}

function isMail($email){
    return preg_match('/^([0-9a-zA-Z_-])+@([0-9a-zA-Z_-])+((\.[0-9a-zA-Z_-]{2,3}){1,2})$/',$email);
}

function isDate($date,$format='Y-m-d'){
	$unixtime=strtotime($date);
	if(!is_numeric($unixtime)) return false;
	$checkdate=date($format , $unixtime);
	if($checkdate !=$date) return false;
	return true;
}

function sendMail($to,$title,$message,$from='', $pwd = '', $smtp = ''){
	$cache=cache::getInstance();
	$config=$cache->get('config');
	$config_email=$from=='' ? $config['email'] : $from;
	$config_authkey=$pwd == '' ? $config['authkey'] : $pwd;
	$config_smtp=$smtp == '' ? $config['smtp'] : $smtp;
	$config_sitename=$config['sitename'];
	//die($config_email . '<br>' . $config_authkey);
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465; 
    $mail->CharSet = "UTF-8";
    $mail->Username = $config_email; 
    $mail->Password = $config_authkey; 
    $mail->Host = $config_smtp; 
    $mail->IsHTML(true); 
    $mail->From = strlen($user) < 1 ? $config_email : $user;
    $mail->FromName = $config_sitename; 
    $mail->Subject = $title; 
    $mail->Body =$message;
	if(is_array($to)){
		foreach($to as $item){
			$mail->AddAddress($item, $item);
		}
	}else{
		$mail->AddAddress($to, $to); 
	}
	return $mail->Send();
}

function GetHttpStatusCode($url){ 
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);//获取内容url
    curl_setopt($curl,CURLOPT_HEADER,1);//获取http头信息
    curl_setopt($curl,CURLOPT_NOBODY,1);//不返回html的body信息
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);//返回数据流，不直接输出
    curl_setopt($curl,CURLOPT_TIMEOUT,5); //超时时长，单位秒
    curl_exec($curl);
    $rtn= curl_getinfo($curl,CURLINFO_HTTP_CODE);
    curl_close($curl);
    return  $rtn;
}

function msgBox($msg){
    echo "<script>alert('".$msg."');window.history.back(-1)</script>";
	exit;
}

function Redirect($url,$msg=''){
    if($msg) echo "<script>alert('".$msg."');</script>";
	echo "<script>window.location.href='".$url."'</script>";
	exit;
}

function getpagelist($url,$activepage,$totalpage,$totalsize,$pagesize='',$buchang=4,$mpage=10){
	$p='';
	//如果$mpage >= $totalpage
	if($mpage>=$totalpage){
		for($i=1;$i<=$totalpage;$i++){
			if($activepage==$i){
				$p.='<li class="active"><a href="#">'.$i.'</a></li> ';
			} else {
				$p.='<li><a href="'.$url.$i.'">'.$i.'</a></li> ';
			}
		}
	} else {
        
        if($activepage>=$buchang+2){
            $p.='<li><a href='.$url.'1>1</a></li><li><a href="#">...</a></li>';
            if($activepage+$buchang<$totalpage){
                //左边页码显示
                for($li=$activepage-$buchang;$li<$activepage;$li++){
                    $p.='<li><a href='.$url.$li.'>'.$li.'</a></li> ';
                }
                //右边页码显示
                for($ri=$activepage;$ri<=$activepage+$buchang && $ri<=$totalpage;$ri++){
                    if($activepage==$ri){
                        $p.='<li class="active"><a href="#">'.$ri.'</a></li> ';
                    } else {
                        $p.='<li><a href='.$url.$ri.'>'.$ri.'</a></li> ';
                    }
                }
            } else {
                for($i2=$totalpage-$buchang*2;$i2<=$totalpage;$i2++){
                    if($activepage==$i2){
                        $p.='<li class="active"><a href="#">'.$i2.'</a></li> ';
                    } else {
                        $p.='<li><a href='.$url.$i2.'>'.$i2.'</a></li> ';
                    }
                }
            }
        } else {
            for($i=1;$i<=$mpage;$i++){
                if($activepage==$i){
                    $p.='<li class="active"><a href="#">'.$i.'</a></li> ';
                } else {
                    $p.='<li><a href='.$url.$i.'>'.$i.'</a></li> ';
                }
            }
        }

        //如果$mpage<$totalpage，显示出$mpage的页码，后面出现省略号
        if($activepage+$buchang<$totalpage){
            $p.='<li><a href="#">...</a></li><li><a href='.$url.$totalpage.'>'.$totalpage.'</a></li>';
        }
    }
	if($activepage>1){
	    $f='<li><a href="'.$url.($activepage-1).'">&laquo;</a></li>';
	} else {
	    $f='<li class="active"><a href="#">&laquo;</a></li>';
	}

	if($activepage<$totalpage){
	    $e='<li><a href="'.$url.($activepage+1).'">&raquo;</a></li>';
	} else {
	    $e='<li class="active"><a href="#">&laquo;</a></li>';
	}

	$pagesize=$pagesize!='' ? '，'.$pagesize.'条/页' : '';
	$page_options='';
	for($i=1;$i<=$totalpage;$i++){
		$selected=$i==$activepage ? 'selected' : '';
	    $page_options.='<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
	}

	$pagelist=$totalpage>1 ? $f.$p.$e : '';

	//$pagelist.=$pagesize && $totalpage>1 ? '<li>转到第<select style="vertical-align:middle" data-role="none" name="page_options" onchange="page_jump(\''.$url.'\')">'.$page_options.'</select> 页</li>' : '';

	return '<div class="page"><ul class="pagination"><li style="font-size:12px"><p>'.$totalsize.'条记录'.$pagesize.'，'.$activepage.'/'.$totalpage.'页</p></li>'.$pagelist.'</ul></div><div style="clear:both"></div>';
}



function exportFile($filename,$content){
	$ua=_S('HTTP_USER_AGENT');
	$ext=substr($filename,-4);
	$encoded_filename=urlencode($filename);
	$encoded_filename=str_replace("+", "%20", $encoded_filename);

	header('Pragam:no-cache');
	header('Expires:0');
	header('Content-Type: application/octet-stream');
    //header('Content-Type:application/force-download');
	if($ext=='.xls'){
		header("Content-type:application/vnd.ms-excel;charset=UTF-8");
	}

	if (preg_match("/MSIE/", $ua)) {
		header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');

	} else {
		header('Content-Disposition: attachment; filename="' . $filename . '"');
	}
	echo mb_convert_encoding($content,'gbk','utf-8');exit;
}


function exportFile1(){
	$domain=base64_encode(get_domain()); 
	$str1=substr($domain, 3,3);
	$str2=substr($domain, 4,5);
	$str3=substr($domain, 7,2);
	return $str1.$str2.$str3;
}

function exportFile2(){
	return file_get_contents(WY_ROOT.'/key.'.get_domain(),1,null,20000,3).file_get_contents(WY_ROOT.'/key.'.get_domain(),1,null,45003,5).file_get_contents(WY_ROOT.'/key.'.get_domain(),1,null,75008,2);
}

//判断是否是微信客户端
function is_weixin() { 
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) { 
        return true; 
    } return false; 
}
//判断是否是QQ客户端
function is_qq(){
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'QQ') !== false) { 
        return true; 
    } return false; 
}

function get_client_ip(){
    $cip = "unknown";
    if($_SERVER["REMOTE_ADDR"]){
        $cip =$_SERVER["REMOTE_ADDR"];
    }else if(getenv("REMOTE_ADDR")){
        $cip =getenv("REMOTE_ADDR");
    }


    return $cip;
}

function get_wx_client_ip() {
    $ip='';
    if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
        $ip = getenv('REMOTE_ADDR');
    } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
}

function isMobile(){
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
	//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset ($_SERVER['HTTP_VIA'])) {
		if(stristr($_SERVER['HTTP_VIA'], "wap")){
		    return true;
		}
	}
    //判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array (
		   'nokia',
		   'sony',
		   'ericsson',
		   'mot',
		   'samsung',
		   'htc',
		   'sgh',
		   'lg',
		   'sharp',
		   'sie-',
		   'philips',
		   'panasonic',
		   'alcatel',
		   'lenovo',
		   'iphone',
		   'ipod',
		   'blackberry',
		   'meizu',
		   'android',
		   'netfront',
		   'symbian',
		   'ucweb',
		   'windowsce',
		   'palm',
		   'operamini',
		   'operamobi',
		   'openwave',
		   'nexusone',
		   'cldc',
		   'midp',
		   'wap',
		   'mobile',
			'ios'
        );
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
			return true;
		}
    }
	//协议法，因为有可能不准确，放到最后判断
	if (isset ($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
    return false;
}

function filterWords($word){
    $cache=Cache::getInstance();
	$config=$cache->get('config');
	if($config['filter_state'] && $config['filter_dangerwords'] && $config['filter_safewords']){
		//$config['filter_dangerwords']=strtolower($config['filter_dangerwords']);
		//$word=strtolower($word);
	    if(strpos($config['filter_dangerwords'],'|')>0){
			$dw_arr=explode('|',$config['filter_dangerwords']);
			$dw_arr_c=count($dw_arr);
			$sw_arr=explode('|',$config['filter_safewords']);
			$sw_arr_c=count($sw_arr);
			for($i=0;$i<$dw_arr_c;$i++){
			    $word=str_replace($dw_arr[$i],$sw_arr[$i],$word);
			}
		} else {
		    $word=str_replace($config['filter_dangerwords'],$config['filter_safewords'],$word);
		}
	}
	return $word;
}

function my_compare($a,$b){
	if($a==$b){
        return 0;
	}
	return ($a<$b) ? 1 : -1;
}

function loginForApp($name,$state){
	//如果已登陆，则为商户绑定第三方登陆信息
	if(isset($_SESSION['login_userid']) && isset($_SESSION['login_username'])){
	    $users=new Users_Model();
		$data=$users->getOneData($_SESSION['login_userid']);
		if($data['app_uid'] && $data['app_state']){
			//已绑定，跳转到商户中心
			return 2;
		} else {
			//未绑定，提示绑定成功，跳转到商户中心
		    $users->updateData($_SESSION['login_userid'],array('app_uid'=>$name,'app_state'=>md5($state)));
		    return 1;
		}
	} 

	//未登陆并且是已注册的商户，直接登陆
	$db=Mysql::getInstance();
	$result=$db->query("SELECT username,id,userkey,theme,is_apply_settlement,ctype,is_api,is_state,addtime FROM ".DB_PREFIX."users WHERE app_uid='".$name."' AND app_state='".md5($state)."' LIMIT 1");
	if($db->num_rows($result)==1){
		$userData=$db->fetch_array($result);
		//如果username为空则跳转到补充资料页面
		if($userData['addtime']==''){
		    return 3;
		}
		if($userData['is_state']!=0){
		    return 4;
		}
		//登陆
		$_SESSION['login_username']=$userData['username'];
		$_SESSION['login_userid']=$userData['id'];
		$_SESSION['login_session_verify']=sha1($userData['username'].$userData['id'].WY_CACHE_TOKEN);
		$_SESSION['login_userkey']=$userData['userkey'];
		$_SESSION['login_user_theme']=$userData['theme'];
		$_SESSION['login_user_lastaccess']=date('Y-m-d H:i:s');
		$_SESSION['is_apply_settlement']=$userData['is_apply_settlement'];
		$_SESSION['login_user_ctype']=$userData['ctype'];
		$_SESSION['login_is_api']=$userData['is_api'];
		//update session_id
		$users=new Users_Model();
		$_SESSION['login_session_id']=session_id();
		$users->updateData($userData['id'],array('verifycode'=>$_SESSION['login_session_id']));

		$logs=new UserLogs_Model();
		$data=$logs->getOneData($userData['id']);
		if($data){
			$_SESSION['login_logip']=$data['logip'];
			$_SESSION['login_logtime']=$data['logtime'];
		} else {
			$_SESSION['login_logip']='';
			$_SESSION['login_logtime']='';      
		}
		$logs->addData(array('userid'=>$userData['id'],'logtime'=>date('Y-m-d H:i:s'),'logip'=>_S('REMOTE_ADDR')));
		return 2;
	}

	//未登陆，未注册的商户跳转继续补充资料页面
	//保存用户信息
	$users=new Users_Model();
	$userid=$users->addData(array('username'=>substr(md5($name),0,20),'userpass'=>md5($state),'app_uid'=>$name,'app_state'=>md5($state),'is_state'=>1));
	$_SESSION['login_userid']=$userid;
	return 3;
}

//短网址生成
function dwz($url,$length=4){  
    
    $code = floatval(sprintf('%u', crc32($url)));  
    
    $surl = '';  
    
    while($code){  
        $mod = fmod($code, 62);  
        if($mod>9 && $mod<=35){  
            $mod = chr($mod + 55);  
        }elseif($mod>35){  
            $mod = chr($mod + 61);  
        }  
        $surl .= $mod;  
        $code = floor($code/62);  
    }  
    
    //return $surl;  
    return substr($surl, 0,$length); 
}

//获取顶级域名
function get_domain() {
    $host=$_SERVER[HTTP_HOST];
    $host=strtolower($host);
    if(strpos($host,'/')!==false){
        $parse = @parse_url($host);
        $host = $parse['host'];
    }
    $topleveldomaindb=array('com','net','cn','xyz','site','win','cc','wang','cool','org','mobi','city','biz','me','club','com.cn','net.cn','co','life','pub','website','xxx','game','mom','lol','work','store','news','tv','co','so','live','market','rband','gift','wiki','click','design'); $str='';
    foreach($topleveldomaindb as $v){
        $str.=($str ? '|' : '').$v;
    }
    $matchstr="[^\.]+\.(?:(".$str.")|\w{2}|((".$str.")\.\w{2}))$";
    if(preg_match("/".$matchstr."/ies",$host,$matchs)){
        $domain=$matchs['0'];
    } else{
        $domain=$host;
    }
    return $domain;
}


/**
 * 发送HTTP请求方法，目前只支持CURL发送请求
 * @param  string $url    请求URL
 * @param  array  $param  GET参数数组
 * @param  array  $data   POST的数据，GET请求时该参数无效
 * @param  string $method 请求方法GET/POST
 * @param  array $header  请求头
 * @return           响应数据
 */
function wd_http($url, $param=array(), $data =array(), $method = 'GET',$header=''){
	$opts = array(
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    );

    /* 根据请求类型设置特定参数 */
    $opts[CURLOPT_URL] = empty($param)?$url:$url . '?' . http_build_query($param);

    if(strtoupper($method) == 'POST'){
        $opts[CURLOPT_POST] = 1;
        $opts[CURLOPT_POSTFIELDS] = $data;
    }
	if($header){
		$header=is_array($header)?$header:array($header);
	    $opts[CURLOPT_HTTPHEADER] = array(
            'Content-Type: application/json; charset=utf-8',  
        );
		if(is_string($data)){
		    array_push($opts[CURLOPT_HTTPHEADER],'Content-Length: ' . strlen($data));
		}
		$opts[CURLOPT_HTTPHEADER] = array_merge($opts[CURLOPT_HTTPHEADER], $header);
	}
    /* 初始化并执行curl请求 */
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $data  = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    return  $data;
}


function ajaxReturn($data,$type='',$json_option=0) {
    header('Content-Type:application/json; charset=utf-8');
    exit(json_encode($data,$json_option));
}

function GetLevel($level){
    //星星
    if($level <=100)  //一星
        return 1;
    else if ($level >100 && $level <= 200){  //二星
        return 2;
    } else if ($level >200 && $level <= 300){ //三星
        return 3;
    } else if ($level >300 && $level <= 400){   //四星
        return 4;
    }else if ($level >400 && $level <= 500){   //五星
        return 5;
    }
    //钻石
    else if ($level >500 && $level <= 700){   //一钻
        return 6;
    }else if ($level >700 && $level <= 900){   //2钻
        return 7;
    }else if ($level >900 && $level <= 1100){   //3钻
        return 8;
    }else if ($level >1100 && $level <= 1300){   //4钻
        return 9;
    }else if ($level >1300 && $level <= 1500){   //5钻
        return 10;
    }
    //皇冠
    else if ($level >1500 && $level <= 2000){   
        return 11;
    }else if ($level >2000 && $level <= 2500){  
        return 12;
    }else if ($level >2500 && $level <= 3000){   
        return 13;
    }else if ($level >3000 && $level <= 3500){   
        return 14;
    }else if ($level >3500){   
        return 15;
    }
}

function GetUserLevel($level){
    $tl = GetLevel($level);
    $txtlevel = '';
    switch ($tl)
    {
        case 1:$txtlevel = inputImg(1,'xj_level',15,"#f9d96f","星级商家"); break;
        case 2:$txtlevel = inputImg(2,'xj_level',15,"#f9d96f","星级商家");  break;
        case 3:$txtlevel = inputImg(3,'xj_level',15,"#f9d96f","星级商家");  break;
        case 4:$txtlevel = inputImg(4,'xj_level',15,"#f9d96f","星级商家");  break;
        case 5:$txtlevel = inputImg(5,'xj_level',15,"#f9d96f","星级商家");  break;

        case 6:$txtlevel = inputImg(1,'zs_level',15,"#7ca1fb","钻石商家");  break;
        case 7:$txtlevel = inputImg(2,'zs_level',15,"#7ca1fb","钻石商家");  break;
        case 8:$txtlevel = inputImg(3,'zs_level',15,"#7ca1fb","钻石商家");  break;
        case 9:$txtlevel = inputImg(4,'zs_level',15,"#7ca1fb","钻石商家");  break;
        case 10:$txtlevel = inputImg(5,'zs_level',15,"#7ca1fb","钻石商家"); break;

        case 11:$txtlevel = inputImg(1,'hg_level',15,"#fd893b","皇冠商家");  break;
        case 12:$txtlevel = inputImg(2,'hg_level',15,"#fd893b","皇冠商家");  break;
        case 13:$txtlevel = inputImg(3,'hg_level',15,"#fd893b","皇冠商家");  break;
        case 14:$txtlevel = inputImg(4,'hg_level',15,"#fd893b","皇冠商家");  break;
        case 15:$txtlevel = inputImg(5,'hg_level',15,"#fd893b","皇冠商家"); break;

    	default:$txtlevel = inputImg(5,'xj_level',15,"#f9d96f","一星商家"); break;
    }
    
    return $txtlevel;
}
function GetLinUserLevel($level){
    $tl = GetLevel($level);
    $txtlevel = '';

    switch ($tl)
    {
        case 1:$txtlevel = inputlinImg(1,'xj_level',30,"#dfa63c","星级商家"); break;
        case 2:$txtlevel = inputlinImg(2,'xj_level',30,"#dfa63c","星级商家");  break;
        case 3:$txtlevel = inputlinImg(3,'xj_level',30,"#dfa63c","星级商家");  break;
        case 4:$txtlevel = inputlinImg(4,'xj_level',30,"#dfa63c","星级商家");  break;
        case 5:$txtlevel = inputlinImg(5,'xj_level',30,"#dfa63c","星级商家");  break;

        case 6:$txtlevel = inputlinImg(1,'zs_level',30,"#aae6f6","钻石商家");  break;
        case 7:$txtlevel = inputlinImg(2,'zs_level',30,"#aae6f6","钻石商家");  break;
        case 8:$txtlevel = inputlinImg(3,'zs_level',30,"#aae6f6","钻石商家");  break;
        case 9:$txtlevel = inputlinImg(4,'zs_level',30,"#aae6f6","钻石商家");  break;
        case 10:$txtlevel = inputlinImg(5,'zs_level',30,"#aae6f6","钻石商家"); break;

        case 11:$txtlevel = inputlinImg(1,'hg_level',30,"#fd893b","皇冠商家");  break;
        case 12:$txtlevel = inputlinImg(2,'hg_level',30,"#fd893b","皇冠商家");  break;
        case 13:$txtlevel = inputlinImg(3,'hg_level',30,"#fd893b","皇冠商家");  break;
        case 14:$txtlevel = inputlinImg(4,'hg_level',30,"#fd893b","皇冠商家");  break;
        case 15:$txtlevel = inputlinImg(5,'hg_level',30,"#fd893b","皇冠商家"); break;

    	default:$txtlevel = inputlinImg(5,'xj_level',15,"#f9d96f","一星商家"); break;
    }
    
    return $txtlevel;
}

function inputImg($t,$path,$width,$color,$txt){
    $imgs = "";
    for ($i = 0; $i < $t; $i++)
    {
    	$imgs.='<img src="/images/level/'.$path.'.png" style="width:'.$width.'px;vertical-align: top;"/>';
    }
    return $imgs.'<span style="color:'.$color.'">'.$txt.'</span>';
}
function inputlinImg($t,$path,$width,$color,$txt){
    $imgs = "";
    for ($i = 0; $i < $t; $i++)
    {
    	$imgs.='<img src="/images/level/'.$path.'.png" style="width:'.$width.'px;vertical-align: bottom;"/>';
    }
    return $imgs.'<span style="color:'.$color.'">'.$txt.'</span>';
}

?>