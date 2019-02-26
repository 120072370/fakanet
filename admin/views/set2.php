<?php
//dezend by http://www.yunlu99.com/ QQ:270656184
if (!defined('WY_ROOT')) {
	exit();
}

if (_g('op_suc')) {
	echo '<div class="actived">配置成功！</div>';
}

echo "\r\n <div class=\"addr\"><span>当前位置：</span><a href=\"./\">管理中心</a> <span>&raquo;</span> 系统设置  <span></div>\r\n<div class=\"main\">\r\n<form name=\"add\" method=\"post\" onsubmit=\"return checkForm()\" action=\"?action=save\">\r\n<div class=\"options\">\r\n    <a href=\"javascript:void(0)\" id=\"set01\" class=\"current\">基本设置</a>\r\n\t<a href=\"javascript:void(0)\" id=\"set02\">模板风格</a>\r\n\t<a href=\"javascript:void(0)\" id=\"set03\">联系方式</a>\r\n\t<a href=\"javascript:void(0)\" id=\"set04\">提现功能</a>\r\n\t<a href=\"javascript:void(0)\" id=\"set05\">邮件服务</a>\r\n\t<a href=\"javascript:void(0)\" id=\"set06\">字词过滤</a>\r\n\t<a href=\"javascript:void(0)\" id=\"set07\">缓存同步</a>\r\n</div>\r\n\r\n<table class=\"tableset\" id=\"dis_set01\">\r\n<tr>\r\n<td width=\"120\" class=\"right\">站点名称</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[sitename]\" id=\"sitename\" size=\"60\" value=\"";
echo isset($sitename) ? $sitename : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td width=\"120\" class=\"right\">标题说明</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[sitetitle]\" id=\"sitetitle\" size=\"60\" value=\"";
echo isset($sitetitle) ? $sitetitle : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">站点URL</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[siteurl]\" id=\"siteurl\" size=\"60\" value=\"";
echo isset($siteurl) ? $siteurl : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">关键字</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[keyword]\" id=\"keyword\" size=\"60\" value=\"";
echo isset($keyword) ? $keyword : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">站点简介</td>\r\n<td><textarea name=\"config[description]\" id=\"description\" cols=\"54\" class=\"input\" rows=\"3\">";
echo isset($description) ? $description : '';
echo "</textarea></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">注册审核</td>\r\n<td>\r\n<select name=\"config[userstate]\" class=\"input\">\r\n<option value=\"0\" ";
if (isset($userstate) && ($userstate == '0')) {
	echo 'selected';
}

echo ">自动审核</option>\r\n<option value=\"1\" ";
if (isset($userstate) && ($userstate == '1')) {
	echo 'selected';
}

echo ">手动审核</option>\r\n</select>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">用户注册</td>\r\n<td>\r\n<select name=\"config[reguser]\" class=\"input\">\r\n<option value=\"0\" ";
if (isset($reguser) && ($reguser == '0')) {
	echo 'selected';
}

echo ">开启注册</option>\r\n<option value=\"1\" ";
if (isset($reguser) && ($reguser == '1')) {
	echo 'selected';
}

echo ">关闭注册</option>\r\n</select> \r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">站点开关</td>\r\n<td>\r\n<select name=\"config[sitestate]\" class=\"input\">\r\n<option value=\"0\" ";
if (isset($sitestate) && ($sitestate == '0')) {
	echo 'selected';
}

echo ">站点开启</option>\r\n<option value=\"1\" ";
if (isset($sitestate) && ($sitestate == '1')) {
	echo 'selected';
}

echo ">站点关闭</option>\r\n</select> \r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">站点关闭提示</td>\r\n<td><textarea name=\"config[msgtip]\" id=\"msgtip\" cols=\"52\" class=\"input\" rows=\"3\" >";
echo isset($msgtip) ? $msgtip : '';
echo "</textarea></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">统计代码</td>\r\n<td><textarea name=\"config[tongji]\" id=\"tongji\" cols=\"52\" class=\"input\" rows=\"3\" >";
echo isset($tongji) ? stripslashes($tongji) : '';
echo "</textarea></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">结算手续费率</td>\r\n<td><input type=\"text\" name=\"config[fee]\" class=\"input\" size=\"10\" value=\"";
echo isset($fee) ? $fee : 0;
echo '"> % &nbsp;&nbsp;手续费上限 <input type="text" name="config[fee_top]" class="input" size="10" value="';
echo isset($fee_top) ? $fee_top : 50;
echo "\"> 元</td>\r\n</tr>\r\n</table>\r\n\r\n<table class=\"tableset\" id=\"dis_set02\" style=\"display:none\">\r\n<tr>\r\n<td width=\"120\" class=\"right\">商户后台主题</td>\r\n<td><select name=\"config[theme]\" class=\"input\">\r\n";

foreach ($themeList as $key => $val) {
	echo "\t\t\t\t\t\t\r\n<option value=\"";
	echo $key;
	echo '" ';
	echo isset($theme) && ($theme == $key) ? 'selected' : '';
	echo '>';
	echo $val;
	echo "</option>\r\n";
}

echo "</select>\r\n</td>\t\t\t\t\t\t\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">商户购买页面</td>\r\n<td><select name=\"config[themeforbuy]\" class=\"input\">\r\n<option value=\"default\" ";
echo isset($themeforbuy) && (($themeforbuy == '') || ($themeforbuy == 'default')) ? 'selected' : '';
echo ">白色风格</option>\r\n";

foreach ($tplList as $key => $val) {
	echo "\t\t\t\t\t\t\r\n<option value=\"";
	echo $key;
	echo '" ';
	echo isset($themeforbuy) && ($themeforbuy == $key) ? 'selected' : '';
	echo '>';
	echo $val;
	echo "</option>\r\n";
}

echo "</select>\r\n</td>\t\t\t\t\t\t\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">继续支付页面</td>\r\n<td><select name=\"config[go_page_theme]\" class=\"input\">\r\n";

foreach ($goPageList as $key => $val) {
	echo "\t\t\t\t\t\t\r\n<option value=\"";
	echo $key;
	echo '" ';
	echo isset($go_page_theme) && ($go_page_theme == $key) ? 'selected' : '';
	echo '>';
	echo $val;
	echo "</option>\r\n";
}

echo "</select>\r\n</td>\t\t\t\t\t\t\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">网站首页模板</td>\r\n<td><select name=\"config[template]\" class=\"input\">\r\n";
$tpl_dir = WY_ROOT . '/tpl/';
$dir = opendir($tpl_dir);

while ($tpl_name = readdir($dir)) {
	if (!strpos($tpl_name, '.') && ($tpl_name != '.') && ($tpl_name != '..')) {
		echo '<option value="';
		echo $tpl_name;
		echo '" ';
		if (isset($template) && ($template == $tpl_name)) {
			echo 'selected';
		}

		echo '>';
		echo $tpl_name;
		echo "</option>\r\n";
	}
}

echo "</select>\r\n</td>\r\n</tr>\r\n</table>\r\n\r\n<table class=\"tableset\" id=\"dis_set03\" style=\"display:none\">\r\n<tr>\r\n<td width=\"120\" class=\"right\">客服电话</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[tel]\" size=\"60\" value=\"";
echo isset($tel) ? $tel : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">客服QQ</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[qq]\" size=\"60\" value=\"";
echo isset($qq) ? $qq : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">联系地址</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[address]\" size=\"60\" value=\"";
echo isset($address) ? $address : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">客服邮箱</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[servicemail]\" size=\"60\" value=\"";
echo isset($servicemail) ? $servicemail : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">版权信息</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[copyright]\" size=\"60\" value=\"";
echo isset($copyright) ? $copyright : '';
echo "\"></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">备案号码</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[icp]\" size=\"60\" maxlength=\"20\" value=\"";
echo isset($icp) ? $icp : '';
echo "\"></td>\r\n</tr>\r\n\r\n</table>\r\n\r\n<table class=\"tableset\" id=\"dis_set04\" style=\"display:none\">\r\n<tr>\r\n<td width=\"120\" class=\"right\">提现开关</td>\r\n<td>\r\n<select name=\"config[takecash_state]\" class=\"input\">\r\n<option value=\"0\" ";
if (isset($takecash_state) && ($takecash_state == '0')) {
	echo 'selected';
}

echo ">提现开启</option>\r\n<option value=\"1\" ";
if (isset($takecash_state) && ($takecash_state == '1')) {
	echo 'selected';
}

echo ">提现关闭</option>\r\n</select> \r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">允许提现时间</td>\r\n<td>\r\n从<select name=\"config[takecash_f]\">\r\n";

for ($i = 0; $i < 24; $i++) {
	echo '<option value="';
	echo $i;
	echo '"';
	echo isset($takecash_f) && ($takecash_f == $i) ? ' selected' : '';
	echo '>';
	echo $i;
	echo "点</option>\r\n";
}

echo "</select>\r\n至<select name=\"config[takecash_t]\">\r\n";

for ($i = 0; $i < 24; $i++) {
	echo '<option value="';
	echo $i;
	echo '"';
	echo isset($takecash_t) && ($takecash_t == $i) ? ' selected' : '';
	echo '>';
	echo $i;
	echo "点</option>\r\n";
}

echo "</select>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">提现关闭提示</td>\r\n<td><textarea name=\"config[takecash_msgtip]\" id=\"takecash_msgtip\" cols=\"52\" class=\"input\" rows=\"3\" >";
echo isset($takecash_msgtip) ? $takecash_msgtip : '';
echo "</textarea></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">最低提现金额</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[takecash]\" id=\"takecash\" size=\"60\" maxlength=\"7\" value=\"";
echo isset($takecash) ? $takecash : '';
echo "\"></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">提现次数限制</td>\r\n<td>最多允许<select name=\"config[takecash_times]\">\r\n";

for ($i = 1; $i <= 5; $i++) {
	echo '<option value="';
	echo $i;
	echo '"';
	echo isset($takecash_times) && ($takecash_times == $i) ? ' selected' : '';
	echo '>';
	echo $i;
	echo "次</option>\r\n";
}

echo "</select></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">超过限制提示</td>\r\n<td><textarea name=\"config[takecash_times_msg]\" id=\"takecash_times_msg\" cols=\"52\" class=\"input\" rows=\"3\" >";
echo isset($takecash_times_msg) ? $takecash_times_msg : '';
echo "</textarea></td>\r\n</tr>\r\n</table>\r\n\r\n<table class=\"tableset\" id=\"dis_set05\" style=\"display:none\">\r\n<tr>\r\n<td width=\"120\" class=\"right\">SMTP服务器</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[smtp]\" size=\"60\" maxlength=\"50\" value=\"";
echo isset($smtp) ? $smtp : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">邮箱账号</td>\r\n<td><input type=\"text\" class=\"input\" name=\"config[email]\" size=\"60\" maxlength=\"50\" autocomplete=\"off\" value=\"";
echo isset($email) ? $email : '';
echo "\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\">邮箱账号密码</td>\r\n<td><input type=\"password\" class=\"input\" name=\"config[authkey]\" size=\"60\" maxlength=\"50\" autocomplete=\"off\" value=\"";
echo isset($authkey) ? $authkey : '';
echo "\"></td>\r\n</tr>\r\n</table>\r\n\r\n<table class=\"tableset\" id=\"dis_set06\" style=\"display:none\">\r\n<tr>\r\n<td width=\"120\" class=\"right\">过滤开关</td>\r\n<td>\r\n<select name=\"config[filter_state]\" class=\"input\">\r\n<option value=\"0\" ";
if (isset($filter_state) && ($filter_state == '0')) {
	echo 'selected';
}

echo ">关闭过滤</option>\r\n<option value=\"1\" ";
if (isset($filter_state) && ($filter_state == '1')) {
	echo 'selected';
}

echo ">开启过虑</option>\r\n</select> \r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">危险关键字</td>\r\n<td><textarea name=\"config[filter_dangerwords]\" id=\"filter_dangerwords\" cols=\"52\" class=\"input\" rows=\"3\" >";
echo isset($filter_dangerwords) ? $filter_dangerwords : '';
echo "</textarea></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">安全关键字</td>\r\n<td><textarea name=\"config[filter_safewords]\" id=\"filter_safewords\" cols=\"52\" class=\"input\" rows=\"3\" >";
echo isset($filter_safewords) ? $filter_safewords : '';
echo "</textarea></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\"></td>\r\n<td>设置对应的安全关键字用来替换危险的关键字，例如 <span class=\"red\">危险|危险</span> 对应的安全关键字为 <span class=\"green\">安全|安全</span></td>\r\n</tr>\r\n</table>\r\n\r\n<table class=\"tableset\" id=\"dis_set07\" style=\"display:none\">\r\n<tr>\r\n<td width=\"120\" class=\"right\">缓存同步</td>\r\n<td>\r\n<select name=\"config[cache_syn_state]\" class=\"input\">\r\n<option value=\"0\" ";
if (isset($cache_syn_state) && ($cache_syn_state == '0')) {
	echo 'selected';
}

echo ">关闭同步</option>\r\n<option value=\"1\" ";
if (isset($cache_syn_state) && ($cache_syn_state == '1')) {
	echo 'selected';
}

echo ">开启同步</option>\r\n</select> \r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\">同步的机器IP</td>\r\n<td><textarea name=\"config[cache_syn_ip]\" id=\"cache_syn_ip\" cols=\"52\" class=\"input\" rows=\"3\" >";
echo isset($cache_syn_ip) ? $cache_syn_ip : '';
echo "</textarea></td>\r\n</tr>\r\n\r\n<tr>\r\n<td class=\"right\"></td>\r\n<td>多个IP中间用 <span class=\"green\">\"|\"</span> 隔开。</td>\r\n</tr>\r\n</table>\r\n\r\n<table>\r\n<tr>\r\n<td width=\"120\"></td>\r\n<td></td>\r\n</tr>\r\n<tr>\r\n<td class=\"right\"></td>\r\n<td><input type=\"submit\" name=\"submit\" class=\"button_bg_2\" value=\"保存设置\" /></td>\r\n</tr>\r\n</table>\r\n<input type=\"hidden\" name=\"action\" value=\"save\" />\r\n</form>\r\n</div>\r\n\r\n<script>\r\nsetTimeout(hideMsg,2600);\r\n\r\n\$('.options a').each(function(){\r\n    \$(this).click(function(){\r\n\t\t\$('.options a').removeClass('current');\r\n\t\t\$(this).addClass('current');\r\n\t    var cname=\$(this).attr('id');\r\n\t\t\$('table.tableset').hide();\r\n\t\t\$('#dis_'+cname).show();\r\n\t\t\$.cookie('set_options',cname,{expires:365})\r\n\t})\r\n\tvar cname=\$(this).attr('id');\r\n\tif(\$.cookie('set_options')==cname){\r\n\t\t\$('.options a').removeClass('current');\r\n\t\t\$(this).addClass('current');\r\n\t    var cname=\$(this).attr('id');\r\n\t\t\$('table.tableset').hide();\r\n\t\t\$('#dis_'+cname).show();\r\n\t}\r\n})\r\n\r\nfunction checkForm(){\r\n    var sitename=\$('#sitename').val();\r\n\tif(sitename==''){\r\n\t    alert('站点名称不能为空！');\r\n\t\t\$('#sitename').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n\tif(sitename.length>=90){\r\n\t    alert('站点名称最多90个字符！');\r\n\t\t\$('#sitename').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n    var sitetitle=\$('#sitetitle').val();\r\n\tif(sitetitle!='' && sitetitle.length>=90){\r\n\t    alert('站点标题说明最多90个字符！');\r\n\t\t\$('#sitetitle').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n    var siteurl=\$('#siteurl').val();\r\n\tif(siteurl==''){\r\n\t    alert('站点URL不能为空！');\r\n\t\t\$('#siteurl').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n\tif(siteurl.length>=50){\r\n\t    alert('站点URL最多50个字符！');\r\n\t\t\$('#siteurl').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n    var keyword=\$('#keyword').val();\r\n\tif(keyword!='' && keyword.length>=100){\r\n\t    alert('站点关键字最多100个字符！');\r\n\t\t\$('#keyword').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n    var description=\$('#description').val();\r\n\tif(description!='' && description.length>=100){\r\n\t    alert('站点简介说明最多100个字符！');\r\n\t\t\$('#description').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n    var msgtip=\$('#msgtip').val();\r\n\tif(msgtip==''){\r\n\t    alert('站点关闭提示不能为空！');\r\n\t\t\$('#msgtip').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n\tif(msgtip.length>=400){\r\n\t    alert('站点关闭提示最多400个字符！');\r\n\t\t\$('#msgtip').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n    var takecash_msgtip=\$('#takecash_msgtip').val();\r\n\tif(takecash_msgtip==''){\r\n\t    alert('提现关闭提示不能为空！');\r\n\t\t\$('#takecash_msgtip').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n\tif(takecash_msgtip.length>=400){\r\n\t    alert('提现关闭提示最多400个字符！');\r\n\t\t\$('#takecash_msgtip').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n\tvar takecash=\$('#takecash').val();\r\n\tif(takecash==''){\r\n\t    alert('最低提现金额不能为空！');\r\n\t\t\$('#takecash').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n    var takecash_times_msg=\$('#takecash_times_msg').val();\r\n\tif(takecash_times_msg==''){\r\n\t    alert('提现次数超过限制提示语不能为空！');\r\n\t\t\$('#takecash_times_msg').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n\tif(takecash_times_msg.length>=400){\r\n\t    alert('提现次数超限制提示语最多400个字符！');\r\n\t\t\$('#takecash_times_msg').focus();\r\n\t\treturn false;\r\n\t}\r\n\r\n    var tongji=\$('#tongji').val();\r\n\tif(tongji!='' && tongji.length>=800){\r\n\t    alert('统计代码最多800个字符！');\r\n\t\t\$('#tongji').focus();\r\n\t\treturn false;\r\n\t}\r\n}\r\n</script>";

?>
