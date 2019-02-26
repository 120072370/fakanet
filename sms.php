<?php
session_start();
require_once 'init.php';
$action=$_REQUEST['action'];

$uid=18;//接口ID
$key='57075d043ef48';

$mobile=$_POST['mobile'];
$chkcode = $_POST["chkcode"];
$username = $_POST["username"];

$OperID = "";
$OperPass = "";

$address="";

//会员中心验证手机
if($action=='tel_check'){
    if($mobile != "" && strlen($mobile) == 11){
        if($chkcode != $_SESSION['chkcode']){
            echo "codeerro";
            exit;
        }
        $db=Mysql::getInstance();

        $rows=$db->query("select id from ".DB_PREFIX."phonecode where phone='".$mobile."' and status = 0");
        $rows=$db->num_rows($rows);
		if($rows > 10){
            echo "numerro";
            exit;
		}
        
        $rows=$db->query("select id from ".DB_PREFIX."users where tel='".$mobile."'");
        $rows=$db->num_rows($rows);
		if($rows > 0){
            echo "phoneerro";
            exit;
		}

        $code=rand(1000,9999);
        $param=array(
            'OperID'=>$OperID,
            'OperPass'=>$OperPass,
            'DesMobile'=>$mobile,
            'Content'=>urlencode(mb_convert_encoding("【】亲爱的用户，您的验证码是：".$code."，有效期3分钟。","gb2312","utf-8")),
        );
        //签名验证
        ksort($param);
        $re=wd_http('http://'.$address.'/HttpQuickProcess/submitMessageAll',$param,'POST');
        $string_arr = explode(",", $re);
        if($string_arr[0] == "03"){
            $data=array(
             'phone'=>$mobile,
             'code'=>$code,
             'createtime'=>date("Y-m-d H:i:s")
             );
            $wddb->autoExecute(DB_PREFIX."phonecode", $data,'INSERT',"");
            echo "0";
        }else{
            echo $re;
        }
    }

}else if($action=='tel_retpwd'){
    if($mobile != "" && $username !=""){
        if($chkcode != $_SESSION['chkcode']){
            echo "codeerro";
            exit;
        }
        $db=Mysql::getInstance();
        $rows=$db->query("select id from ".DB_PREFIX."users where username='".$username."' and  tel='".$mobile."' and ctype=1");
        $rows=$db->num_rows($rows);
		if($rows == 0){
            echo "phoneerro";
            exit;
		}

        $code=rand(1000,9999);
        $param=array(
            'OperID'=>$OperID,
            'OperPass'=>$OperPass,
            'DesMobile'=>$mobile,
            'Content'=>urlencode(mb_convert_encoding("【】您的验证码是：".$code."，有效期3分钟。","gb2312","utf-8")),
        );
        //签名验证
        ksort($param);
        $re=wd_http('http://'.$address.'/HttpQuickProcess/submitMessageAll',$param,'POST');
        $string_arr = explode(",", $re);
        if($string_arr[0] == "03"){
            $data=array(
             'phone'=>$mobile,
             'code'=>$code,
             'createtime'=>date("Y-m-d H:i:s")
             );
            $wddb->autoExecute(DB_PREFIX."phonecode", $data,'INSERT',"");
            echo "0";
        }else{
            echo "1";
        }
    }

}
else if($action=='surplus'){//查询余额
    $param=array(
               'OperID'=>$OperID,
               'OperPass'=>$OperPass,
           );
    ksort($param);
    $re=wd_http('http://124.251.7.68:8100/QxtSms_surplus/surplus',$param,'GET');
    echo $re;

}else if($action=='notice'){//售卡通知
	$code=$_REQUEST['orderid'];
	$name=$wddb->getone("select username from ".DB_PREFIX."users as a inner join ".DB_PREFIX."buylist as b on a.id=b.userid where b.orderid='".$code."'");
	$price=$wddb->getone("select money from ".DB_PREFIX."orderlist where orderid='".$code."'");
	$param=array(
		'uid'=>$uid,
		'tid'=>12327,
		'tvalue'=>urlencode("#code#=$code&#name#=$name&#price#=$price"),
		'key'=>$key,
		'time'=>time(),
		'mobile'=>$mobile,
	);
	//签名验证
	ksort($param);
	$str='';
	foreach($param as $k=>$v){
		$str.=$v;
	}
	$sign=md5($str);
	$param['sign']=$sign;
	$re=wd_http('http://app.a8tg.com/sms',$param);
	$redata=json_decode($re,true);
	if($redata['status']==1){
	    $_SESSION['code']=$code;
	}
	ajaxReturn($redata);


}else if($action=='validate'){
	$code=$_SESSION['code'];
	if($_REQUEST['code']==$code){
		$uid=$_SESSION['login_userid'];
		$data=array(
			'tel_check'=>1,
			'utime'=>time()
		);
		$re=$wddb->autoExecute(DB_PREFIX.'users',$data,'update','id='.$uid);
		ajaxReturn(array(
			'status'=>1,
			'info'=>'验证通过',
			're'=>$re
		));
	}else {
		ajaxReturn(array(
			'status'=>0,
			'info'=>'验证码错误'
		));
	}
}else if($action=='telshow'){
	$uid=$_SESSION['login_userid'];
	$utime=$wddb->getone("select utime from ".DB_PREFIX."users where id=".$uid);
	if(time()-$utime<86400){
	    ajaxReturn(array(
			'status'=>0,
			'info'=>'24小时只能更换一次手机号'
		));
	}
}

?>