<?php
error_reporting(0);
require_once('../../init.php');
require('./Data/config.php');
date_default_timezone_set("PRC");

/* ----------------------POST 或者GET接收配置信息-------------------------- */
if($Receive == "1"){
    $clock = trim(htmlspecialchars($_POST['clock']));        //付款订单时间
    $name = trim(htmlspecialchars($_POST['name']));          //付款说明,可以是用户名或用户ID或订单号，该参数由付款时由用户输入
    $order = trim(htmlspecialchars($_POST['order']));        //支付宝交易号
    $money = trim(htmlspecialchars($_POST['money']));        //付款金额
    $key = trim(htmlspecialchars($_POST['key']));            //易支付软件里面 安全密钥
    $mode = trim(htmlspecialchars($_POST['mode']));          //付款方式 类型 --> 支付宝 财付通 QQ钱包 微信
    $card = trim(htmlspecialchars($_POST['card']));          //卡密管理 充值卡号
    $dense = trim(htmlspecialchars($_POST['dense']));        //卡密管理充值卡密
}
if($Receive == "2"){
    $clock = trim(htmlspecialchars($_GET['clock']));        //付款订单时间
    $name = trim(htmlspecialchars($_GET['name']));          //付款说明,可以是用户名或用户ID或订单号，该参数由付款时由用户输入
    $order = trim(htmlspecialchars($_GET['order']));        //支付宝交易号
    $money = trim(htmlspecialchars($_GET['money']));        //付款金额
    $key = trim(htmlspecialchars($_GET['key']));            //易支付软件里面 安全密钥
    $mode = trim(htmlspecialchars($_GET['mode']));          //付款方式 类型 --> 支付宝 财付通 QQ钱包 微信
    $card = trim(htmlspecialchars($_GET['card']));          //卡密管理 充值卡号
    $dense = trim(htmlspecialchars($_GET['dense']));        //卡密管理充值卡密
}

/* ----------------------验证KEY秘钥通过后执行通知网站回调处理数据-------------------------- */
if ($key == $secretkey){
	$S = substr(date('YmdHis',time()),0,8);       
    
    //if (file_exists('./Data/Order/'.$S."-".sprintf("%01.2f",$money).".mdb")){
    //    file_put_contents('./Data/Order/'.$S."-".sprintf("%01.2f",$money).".mdb", "0");    //用户付款成功通知网站回调	  
    $ob=@new HandleOrders_Model($name,$money,1);
    $ob->updateOrderStatusForBank();
    echo "success";         //发货成功！软件识别标记,请勿修改否则软件无法识别！		
    //}else{
    //    echo 'existence';       //发货失败！软件识别标记,请勿修改否则软件无法识别！	
    //}  	

}else{
    echo 'fail';            //验证秘钥错误！软件识别标记,请勿修改否则软件无法识别！	
}	

?>