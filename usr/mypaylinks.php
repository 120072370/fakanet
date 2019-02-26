<?php
session_start();
require_once '../init.php';
$db=Mysql::getInstance();
$re=$db->query("select xianlu from ".DB_PREFIX."config");
$re=$db->fetch_array($re);
$xianlu=preg_split("/[\n\r]+/s", $re['xianlu'],-1,PREG_SPLIT_NO_EMPTY);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/usr/default/css/style1.css" rel="stylesheet" type="text/css" />
<title>自动发卡平台-多线路负载分流</title>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_topb">
  <tr>
    <td height="172"><table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="130" align="center"><img src="/images/logo.gif" width="365" height="75" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" class="mt25">
  <tr>
    <td><table width="1100" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="242" height="48" align="center" bgcolor="#43B6D3"><table width="750" border="0" align="left" cellspacing="0" cellpadding="0">
          <tr>
             <td width="220" height="48" align="center" bgcolor="#43B6D3"></td>
             <td width="45" height="48" align="right" bgcolor="#FF8D35"></td> 
             <td width="255" align="left" bgcolor="#FF8D35" style="font-size:18px; color:#FFF">请选择任何一条可以访问的地址进入</td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#ffffff" class="border prall20">
    	<style type="text/css">
    	#list_adr{ margin-top: 40px;}
    	#list_adr li{ width:33.33%; float:left; padding: 0 0 40px 0;}
    	#list_adr li table{margin: auto;}
    	</style>
    	<ul id="list_adr">
    		<?php 
    		for($i=0;$i<count($xianlu);$i++){
    		$v=preg_split("/[|]+/s", $xianlu[$i],-1,PREG_SPLIT_NO_EMPTY);
    		?>
    		<li><table width="221" border="0" cellspacing="0" cellpadding="0" class="table_bod" onmouseover="this.style.background='#FF8D35'" onmouseout="this.style.background=''">
          <tr>
            <td width="40" height="44" align="center"><img src="/usr/default/images/9_35.png" width="15" height="18" /></td>
            <td width="179"><a href="<?php echo $v[1]?>/lin/<?php echo $_REQUEST['id']?>" target="_blank"><?php echo $v[0] ?></a></td>
          </tr>
        </table></li>
        <?php }?>
    	</ul>
    	</td>
  </tr>
</table>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" class="mt25">
  <tr>
    <td><table width="1100" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="242" height="48" align="center" bgcolor="#43B6D3"><table width="750" border="0" align="left" cellspacing="0" cellpadding="0">
          <tr>
             <td width="220" height="48" align="center" bgcolor="#43B6D3"></td>
             <td width="45" height="48" align="right" bgcolor="#FF8D35"></td> 
             <td width="255" align="left" bgcolor="#FF8D35" style="font-size:18px; color:#FFF">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 自动发卡平台温馨提示您</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#ffffff" class="border prall20" style="padding:30px;" ><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_bod1">
      <tr>
        <td width="51" height="44" align="center" bgcolor="#414141" style="color:#FFF; font-size:16px;">1</td>
        <td style="font-size:16px; padding-left:20px;">本页面为全静态页面，365天缓存于腾讯云端CDN，缓存节点超过400+，无视一切DDOS和CC攻击</td>
      </tr>
    </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_bod1">
      <tr>
        <td width="51" height="44" align="center" bgcolor="#414141" style="color:#FFF; font-size:16px;">2</td>
        <td style="font-size:16px; padding-left:20px;">当您选择的一条线路发生故障无法访问时，请尝试选择其他线路，多线路负载保证服务可用性</td>
      </tr>
    </table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_bod1">
      <tr>
        <td width="51" height="44" align="center" bgcolor="#414141" style="color:#FFF; font-size:16px;">3</td>
        <td style="font-size:16px; padding-left:20px;">本平台服务范围仅限提供商品寄售、为买家提供自动发卡的便捷服务</td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_bod1">
        <tr>
          <td width="51" height="44" align="center" bgcolor="#414141" style="color:#FFF; font-size:16px;">4</td>
          <td style="font-size:16px; padding-left:20px;">购买结束后如果对订单结果有疑问请记住订单编号,咨询商家客服</td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt25 border2">
  <tr>
    <td bgcolor="#FFFFFF"><table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" class="mt25">
      <tr>
        <td height="50" align="right"><img src="/usr/default/images/9_36jpg.jpg" width="61" height="65" /></td>
        <td width="300" align="center"><table width="300" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" align="center" valign="top">抵制不良商家 注意自我保护 谨防受骗上当</td>
          </tr>
          <tr>
            <td height="30" align="center" valign="bottom">合适娱乐益脑 合理安排时间 享受健康生活</td>
          </tr>
        </table></td>
        <td align="left"><img src="/usr/default/images/9_37.jpg" width="60" height="65" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</div>

</body>


</html>
