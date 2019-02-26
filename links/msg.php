<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转页面</title>
<style>
body{margin:0 auto; padding:0; text-align:center; font-family: arial,"宋体", arial; background:#fff; font-size:12px; color:#000; line-height:22px;}
#main{CLEAR: both; DISPLAY: block;  MARGIN: 100px auto; OVERFLOW: hidden; WIDTH: 500px; PADDING-TOP: 9px; HEIGHT: auto;height:76px}
.msg{background-color:#FFF6D6; border:1px solid #FADBA5; clear:both; margin: 0 auto; padding:10px; text-align:left;color:#FF0000; font-size:14px; }
</style>
</head>
<body>
<div id="main" class="msg">
	<table>
        <tr>
			<td width="80"><img src="default/images/cuowu.gif"/></td>
			<td><strong style="font-size:16px"><?php echo $msg ?></strong><br />3秒后返回首页，无法跳转请<a href="../">点击此链接！</a></strong></td>    
		</tr>
	</table>
</div>
<script>
setTimeout(jumpUrl,3000);
function jumpUrl(){
    window.location.href='../';
}
</script>
</body>
</html>