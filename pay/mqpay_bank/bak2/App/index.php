<SCRIPT language="JavaScript">
javascript:window.history.forward(1);                       //防止重复提交验证禁止返回
</SCRIPT>

<?php
////////////////////////////////////手机客户端浏览器///////////////////////////////////////////////
error_reporting(0);
require('../Data/config.php');
date_default_timezone_set("PRC");

////////////////////////////////POST 或者GET 接收用户提交参数值/////////////////////////////////////////////////////////
if(!empty($_POST)){
		if($_POST['account'] <= "0"){
	echo "<script> alert('会员账号不可为空,请正确填写会员账号！');parent.location.href='../'; </script>"; 	
}   
        if($_POST['money'] <= "0"){
	echo "<script> alert('付款金额不可为空,请正确填写充值金额！');parent.location.href='../'; </script>"; 
}  
    $user = $_POST["account"];                    //付款账号
    $mode =	$_POST['type'];                       //支付方式
    $money = $_POST["money"];                     //付款金额
	
}else{
		if($_GET['account'] <= "0"){
	echo "<script> alert('会员账号不可为空,请正确填写会员账号！');parent.location.href='../'; </script>"; 
}  
        if($_GET['money'] <= "0"){
	echo "<script> alert('付款金额不可为空,请正确填写充值金额！');parent.location.href='../'; </script>"; 
}  
    $user = $_GET["account"];                    //付款金额
    $money = $_GET["money"];                      //付款金额
    $mode =	$_GET['type'];                        //支付方式
}

$money = sprintf("%01.2f",$money);

$userkey = md5(date('YmdHis',time()).$money.$user.$mode.rand(100000000,999999999));
$utime = substr(date('YmdHis',time()),0,8);
file_put_contents('../Data/Order/'.$utime."-".$money.".mdb", "1"); 

/////////////////支付宝/////////////////////////
if($mode==1){
	//$Mobile="alipays://platformapi/startapp?appId=20000116";  //启动支付宝转账
	$Mobile="alipays://platformapi/startapp?appId=20000056";  //启动支付宝扫码
	$bx="支付宝";
	$Whether="../images/Alipay/".$money.".jpg";      
	if(file_exists($Whether)){
		$skm="../images/Alipay/".$money.".jpg";   //读取支付宝已设定金额收款二维码  注意：图片重命名： 10.00.jpg  50.00.jpg  100.00.jpg  等等.....
}else{
	    $skm="../images/Other/Alipay.jpg";           //读取支付宝没有设定金额收款二维码  适合免设定金额使用..
}
}
	
//////////////////微信////////////////////////	
if($mode==2){
	$Mobile="weixin://scanqrcode";       //启动微信扫码
	$bx="微信";
	$Whether="../images/WeChat/".$money.".jpg";        
	if(file_exists($Whether)){
        $skm="../images/WeChat/".$money.".jpg";     //读取微信已设定金额收款二维码     注意：图片重命名： 10.00.jpg  50.00.jpg  100.00.jpg  等等.....
}else{
        $skm="../images/Other/WeChat.jpg";          //读取微信没有设定金额收款二维码     适合免设定金额使用...
}
}

//////////////////QQ钱包/////////////////////////
if($mode==3){
	$Mobile="mqq://";   //启动QQ扫码
	$bx="QQ钱包";
	$Whether="../images/Tenpay/".$money.".jpg";    
	if(file_exists($Whether)){
       $skm="../images/Tenpay/".$money.".jpg";     //读取QQ钱包已设定金额收款二维码     注意：图片重命名： 10.00.jpg  50.00.jpg  100.00.jpg  等等.....
}else{
       $skm="../images/Other/Tenpay.jpg";          //读取QQ钱包没有设定金额收款二维码     适合免设定金额使用...
}	
}

header("Cache-control:no-cache,no-store,must-revalidate");
header("Pragma:no-cache");
header("Expires:0");	
?>

<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>盾支付-网银在线安全快捷支付客户端！</title>
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="app.css" rel="stylesheet" type="text/css">
<style type="text/css">
input {background-color: #ff3300; submit: 1px solid black; color: white}
body {
	background-color: #666;
}
body,td,th {
	color: #000;
}
</style>
<!-- 
要详细了解文件顶部 html 标签周围的条件注释:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

如果您使用的是 modernizr (http://www.modernizr.com/) 的自定义内部版本，请执行以下操作:
* 在此处将链接插入 js 
* 将下方链接移至 html5shiv
* 将“no-js”类添加到顶部的 html 标签
* 如果 modernizr 内部版本中包含 MQ Polyfill，您也可以将链接移至 respond.min.js 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script type="text/JavaScript">
<!--
<!--

//-->

function get_state() {
	var xmlhttp = null;
	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
  
	if (xmlhttp!=null)
	{
		serverUrl = "../request.php?userkey=<?php echo $userkey;?>&t=<?php echo $utime;?>&m=<?php echo $money;?>&s=<?php echo $user;?>&d=<?php echo $mode;?>";
		xmlhttp.open( "GET", serverUrl, false );
		xmlhttp.send( null );
		xmlhttp.responseText
		if (xmlhttp.responseText == "0"){
		document.getElementById("ewm").src = "../images/img/logcg.jpg";
        window.setTimeout("window.location='../standard/Success.php?goto=https%3A%2F%2Fshenghuo.alipay.com%2Fsend%2Fpayment&Thesecretkey='+'<?php echo $userkey;?>'",1500);
		
			return true;
		}else{
			return false;
		}
	}
	else
	{
		return false;
	}
}

//setInterval("get_state();",500);    //请求时间单位 1000 = 1秒/次

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<script src="respond.min.js"></script>
</head>
<body>
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
    <p>&nbsp;</p>
    <div align="center">
      <table width="313" border="1" cellpadding="1" cellspacing="1">
        <tr>
          <td width="297" height="500"><p align="center">&nbsp;</p>
            <p align="center"><?php echo $bx;?>支付确认：<?php echo $money;?>元</p>
            <p align="center"><a href="#"><img src="<?php echo $skm;?>" name="ewm" width="170" height="170" id="ewm" align="middle"></a></p>
          <p align="center">距离该订单过期还有：
		    <script type="text/javascript">
var t=300;//设定跳转的时间
setInterval("refer()",1000); //启动1秒定时
function refer(){ 
	if(t==0){
		document.getElementById('show').innerHTML="0"; //显示倒计时
		document.getElementById("ewm").src = "../images/img/ssx.jpg";
		window.setTimeout("window.location='<?php echo $Callback;?>'",1000);  //设定订单超时跳转的链接地址
		window.clearTimeout(t1);     //去掉定时器 
	}
	document.getElementById('show').innerHTML=t+" 秒"; //显示倒计时
	t--; //计数器递减
}
            </script>
        <span id="show"></p>
	<form name="form1" method="post" action="<?php echo $Mobile;?>" target="_black">
            <div align="center">
              <input type="submit" name="Client" id="Client" style="width:200px; height:35px" value="打开<?php echo $bx;?>客户端付款">
            </div>
          </form>
          <form name="form2" method="" action="../index.php" target="_black">
            <p align="center">
              <input type="submit" name="Return" id="Return" style="width:200px; height:35px" value="返回主页面">
            </p>
        </form>
          <p align="center">温馨提示:</p>
          <p align="center">截屏保存二维码相册打开<?php echo $bx;?>选中扫码识别，请勿关闭窗口！</p></td>
        </tr>
      </table>
    </div>
    <div align="center"></div>
    <div align="center">
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
  </div>
</div>
</body>
</html>
