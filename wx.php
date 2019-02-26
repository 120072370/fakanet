<?php
error_reporting(E_ALL ^ E_NOTICE); 
require_once 'init.php';

define('IS_GET',        $_SERVER['REQUEST_METHOD'] =='GET' ? true : false);
define('IS_POST',       $_SERVER['REQUEST_METHOD'] =='POST' ? true : false);
define('IS_AJAX',       ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')  || strstr($_SERVER['REQUEST_URI'],'callback') ) ? true : false);
include_once WY_ROOT.'/includes/libs/Weixin/Wechat.class.php';
$token = 'weiqihdweiqifaka'; 
$AESKey = '';

/* 加载微信SDK */
$wechat = new Wechat($token);
/* 获取请求信息 */
$data = $wechat->request();

if($data && is_array($data)){
    $content = "感谢您关注发卡平台，如遇商品问题，请联系购买页面上的商家客服解决问题。\r\n平台每天晚上22:00-00:00点统一结算，如有投诉信息未处理，不予结算，如有疑问请联系24小时QQ客服专线："; //回复内容，回复不同类型消息，内容的格式有所不同
    $type    = ''; //回复消息的类型

    /* 响应当前请求(自动回复) */
    if($data['Event']=='SCAN'){
		$uid=$data['EventKey'];
		$openid=$data['FromUserName'];
		//修改
		$db=Mysql::getInstance();
        if($uid !=0 && $openid != ""){
            $info_user=$wddb->getRow("select * from ".DB_PREFIX."users where id =".$uid);
            if($info_user["openid_wx"] !="" && $info_user["openid_wx"] != $openid){
                $wechat->response('您已绑定过其他微信，如需解绑，请联系平台客服！','text');
            }else if($info_user["openid_wx"] !="" && $info_user["openid_wx"] == $openid){
                $wechat->response('您已绑定过该微信！','text');
            }else{
                $sql = "update wqfaka_users set openid_wx='".$openid."' where id =".$uid;
                if($db->query($sql)){
                    $wechat->response('恭喜您，绑定成功！','text');
                }else{
                    $wechat->response("很可惜，您绑定失败，请点击右下角商户中心->微信绑定，进行绑定。",'text');
                } 
            }
        }else{
            $wechat->response("很可惜，您绑定失败，请点击右下角商户中心->微信绑定，进行绑定。",'text');
        }
	}else if($data['Event']=='subscribe'){
        $txt= "欢迎您关注微奇发卡平台，我们坚持做业内最稳定的发卡平台，为商户提供更加全面的虚拟支付服务。
\r\n <a href='http://www..cn'>立即访问平台</a> \r\n <a href='http://www..cn/sendcode.htm'>商户入驻</a>";
		$qrscene=preg_split("/[_]+/s", $data['EventKey'],-1,PREG_SPLIT_NO_EMPTY);
		$uid=$qrscene[1]>0?$qrscene[1]:0;
		$openid=$data['FromUserName'];
		//修改
        //if($uid !=0 && $openid != ""){
        //    $db=Mysql::getInstance();
        //    $sql = "update wqfaka_users set openid_wx='".$openid."' where id =".$uid;
        //    if($db->query($sql)){
        //        $txt = $txt."\n\n"."恭喜您，绑定成功！";
        //    }else{
        //        $txt = $txt."\n\n"."很可惜，您绑定失败，请点击右下角商户中心->微信绑定，进行绑定。";
        //    } 
        //}
        $db=Mysql::getInstance();
        if($uid !=0 && $openid != ""){
            $info_user=$wddb->getRow("select * from ".DB_PREFIX."users where id =".$uid);
            if($info_user["openid_wx"] !="" && $info_user["openid_wx"] != $openid){
                $txt = $txt."\n\n您已绑定过其他微信，如需解绑，请联系平台客服！";
            }else if($info_user["openid_wx"] !="" && $info_user["openid_wx"] == $openid){
                $txt = $txt."\n\n您已绑定过该微信！";
            }else{
                $sql = "update wqfaka_users set openid_wx='".$openid."' where id =".$uid;
                if($db->query($sql)){
                    $txt = $txt."\n\n"."恭喜您，绑定成功！";
                }else{
                    $txt = $txt."\n\n"."很可惜，您绑定失败，请点击右下角商户中心->微信绑定，进行绑定。";
                } 
            }
        }else{
            $txt = $txt."\n\n很可惜，您绑定失败，请点击右下角商户中心->微信绑定，进行绑定。";
        }
        $wechat->response($txt,'text');		//关注事件

	}else if ($data['Event']  ="unsubscribe"){
        //取消关注
        $openid=$data['FromUserName'];
        if($openid != ""){
            //$sql = "update wqfaka_users set openid_wx='' where openid_wx =".$openid;
            //if($db->query($sql)){
            //}
        }
    }else{
        $wechat->response($content,'text');	
    }
    if($data["MsgType"] == "text"){
        $wechat->response($content,'text');	
    }else{
        $wechat->response($content,'text');	
    }
}
