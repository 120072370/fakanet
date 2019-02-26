<?php
if(!defined('WY_ROOT')) exit;
?>
<div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> <a href="tg_products.php">推广商品列表</a>  <span>&raquo;</span> 添加推广商品</div>
<div class="main"> 
<style>
td p{padding:5px 0;display:none}
td.right{text-align:right}
.input{width:250px}
</style>
<form name="add" method="post" action="?action=addsave">
<table class="register">

<tr>
<td class="right">商品名称：</td>
<td><input type="text" name="title" autocomplete="off" class="input" size="40" maxlength="50" /> <span class="err_msg" id="err_msg_1">* </span></td>
</tr>
<tr>
<td class="right">链接：</td>
<td><input type="text" name="url" autocomplete="off" class="input" size="40" maxlength="50" /> <span class="err_msg" id="err_msg_1">* </span></td>
</tr>
<tr>
<td class="right">会员分成：</td>
<td><input type="text" name="fencheng1" autocomplete="off" class="input" size="40" maxlength="50" /> <span class="err_msg" id="err_msg_1">* </span></td>
</tr>
<tr>
<td class="right">平台分成：</td>
<td><input type="text" name="fencheng2" autocomplete="off" class="input" size="40" maxlength="50" /> <span class="err_msg" id="err_msg_1">* </span></td>
</tr>
<tr>
<td class="right"></td>
<td><input type="submit" class="button_bg_2" value="保存添加" /> <span id="returnMsg"></span></td>
</tr>
</table>
</form>
</div>

