 <?php
if(!defined('WY_ROOT')) exit;
 ?>
 <div class="addr"><span>当前位置：</span><a href="./">管理中心</a> <span>&raquo;</span> 系统环境</div>
<div class="main">
<table class="tablestyle">
    <tr>
    	<td class="bg right">IP：</td>
        <td class="bg bold"><?php 
                            $ip_arr=explode('.',_S('REMOTE_ADDR'));
                            $prefix_ip=$ip_arr[0].'.'.$ip_arr[1].'.'.$ip_arr[2].'.'.$ip_arr[3];
                            echo get_wx_client_ip();
                            ?></td>
    </tr>
   
	<!--<tr>
    	<td class="bg right">服务器系统：</td>
        <td class="bg bold"><?php echo php_uname() ?></td>
    </tr>
    
	<tr>
    	<td class="right">PHP版本号：</td>
        <td class="bold"><?php echo phpversion() ?></td>
    </tr>
    
	<tr>
    	<td class="bg right">后台路径：</td>
        <td class="bg bold"><?php echo dirname(__FILE__) ?></td>
    </tr>
    
	<tr>
    	<td class="right">服务器语言：</td>
        <td class="bold"><?php echo _S('HTTP_ACCEPT_LANGUAGE') ?></td>
    </tr>
	<tr>
	  <td class="bg right">PHP安装路径：</td>
	  <td class="bg bold"><?php echo DEFAULT_INCLUDE_PATH ?></td>
  </tr>
	<tr>
	  <td class="right">服务器IP：</td>
	  <td class="bold"><?php echo GetHostByName(_S('HTTP_HOST')) ?></td>
  </tr>
	<tr>
	  <td class="bg right">PHP运行方式：</td>
	  <td class="bg bold"><?php echo php_sapi_name() ?></td>
  </tr>
	<tr>
	  <td class="right">文档主目录：</td>
	  <td class="bold"><?php echo _S('DOCUMENT_ROOT') ?></td>
  </tr>
	<tr>
	  <td class="bg right">进程用户名：</td>
	  <td class="bg bold"><?php echo get_current_user() ?></td>
  </tr>
	<tr>
	  <td class="right">服务器WEB端口：</td>
	  <td class="bold"><?php echo _S('SERVER_PORT') ?></td>
  </tr>
	<tr>
	  <td class="bg right">ZEND版本号：</td>
	  <td class="bg bold"><?php echo zend_version() ?></td>
  </tr>
	<tr>
	  <td class="right">服务器系统目录：</td>
	  <td class="bold"><?php echo _S('SystemRoot') ?></td>
  </tr>-->

    <tr>
	  <td class="right">短信剩余条数：</td>
	  <td class="bold"><strong id="ss"></strong>条</td>
  </tr>
</table>
</div>
<script>
    $.get("/sms.php?action=surplus", function (result) {
        $("#ss").text(result);
    })
</script>