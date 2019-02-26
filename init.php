<?php
//error_reporting(0);
ini_set('html_errors',false);
ini_set('display_errors',false);
ob_start();
header('Content-type:text/html;charset=utf-8');
date_default_timezone_set('PRC');
define('WY_ROOT',dirname(__FILE__));
include_once WY_ROOT.'/360_safe3.php';
require_once WY_ROOT.'/a8tgconfig/config.php';
require_once WY_ROOT.'/includes/libs/Functions.php';
require_once WY_ROOT.'/includes/libs/class.mysql.php';
require_once WY_ROOT.'/includes/libs/txprotect.php';
//$wddb= new cls_mysql(DBSERVER.":".DBPORT, DBUSER, DBPASS, DBNAME,'utf8');  //如果数据库端口修改成其他非3306端口 请使用这个
$wddb= new cls_mysql(DBSERVER, DBUSER, DBPASS, DBNAME,'utf8');//如果您的数据库端口为3306端口 使用这个
//theme,'a8tg'=>'经典蓝','modern'=>'现代''default'=>'默认',,'modern'=>'现代'
$themeList=array('skyblue'=>'微奇模板');
//theme for goonpage
//$goPageList=array('default'=>'白色风格','green'=>'绿色风格');
$goPageList=array('default'=>'默认风格');
//theme for buypage
//$tplList=array('white'=>'经典风格','blue'=>'商务蓝风格','gray'=>'商务红风格','orange'=>'商务绿风格','crown'=>'商务灰风格','917ka'=>'新风格');
$tplList=array('blue'=>'绝地风格','gray'=>'CF穿越火线风格','baibian'=>'新版简洁风格','orange'=>'列表支付风格');
//user_ctype
$userCtype=array('1'=>'商户提现','2'=>'自动提现','3'=>'审核模式','4'=>'暂停结算','5'=>'贵宾会员','6'=>'超级会员');

$userlevel=array(100=>'星级商家',500=>'黄金商家',1000=>'钻石商户',2000=>'皇冠商家');

//banks
$selectBanks=array('中国工商银行','上海浦东发展银行','中国农业银行','招商银行','中国建设银行','兴业银行','广东发展银行','深圳发展银行','中国民生银行','交通银行','中信银行','中国光大银行','中国银行','中国邮政储蓄','支付宝','财付通','微信钱包');

//限制域名
$host1=$wddb->getone("select zhuyuming from ".DB_PREFIX."config");
$host1=preg_split("/[\n\r]+/s", $host1,-1,PREG_SPLIT_NO_EMPTY);
$host2=$wddb->getone("select shoukayuming from ".DB_PREFIX."config");
$host2=preg_split("/[\n\r]+/s", $host2,-1,PREG_SPLIT_NO_EMPTY);
if(in_array($_SERVER['HTTP_HOST'], $host1) && in_array($_SERVER['HTTP_HOST'], $host2)){
   
}else{
    if((strpos($_SERVER['PHP_SELF'], '/lin/')!==false || strpos($_SERVER['PHP_SELF'], '/prt/')!==false || strpos($_SERVER['PHP_SELF'], '/cay/')!==false || strpos($_SERVER['PHP_SELF'], '/usr/mypaylinks.php')!==false) && in_array($_SERVER['HTTP_HOST'], $host1)){
        header("location:http://".$host2[0].$_SERVER['REQUEST_URI']);
    }else if((strpos($_SERVER['PHP_SELF'], '/lin/')===false && strpos($_SERVER['PHP_SELF'], '/prt/')===false && strpos($_SERVER['PHP_SELF'], '/cay/')===false && strpos($_SERVER['PHP_SELF'], '/usr/mypaylinks.php')===false) && in_array($_SERVER['HTTP_HOST'], $host2)){
        header("location:http://".$host1[0].$_SERVER['REQUEST_URI']);
    } 
}
