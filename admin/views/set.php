<?php
if(!defined('WY_ROOT')) exit;
if(_G('op_suc')) echo '<div class="actived">配置成功！</div>';
?>

 <div class="addr"><span>当前位置：</span><a href="./">管理中心</a> <span>&raquo;</span> 系统设置  <span></div>
<div class="main">
<form name="add" method="post" enctype="multipart/form-data" onsubmit="return checkForm()" action="?action=save">
<div class="options">
    <a href="javascript:void(0)" id="set01" class="current">基本设置</a>
	<a href="javascript:void(0)" id="set02">模板风格</a>
	<a href="javascript:void(0)" id="set03">联系方式</a>
	<a href="javascript:void(0)" id="set04">提现功能</a>
	<a href="javascript:void(0)" id="set05">邮件服务</a>
	<a href="javascript:void(0)" id="set06">敏感字词</a>
	<a href="javascript:void(0)" id="set07">缓存同步</a>
	<a href="javascript:void(0)" id="set08">线路域名</a>
	<!--<a href="javascript:void(0)" id="set09">短信费用</a>-->
	<a href="javascript:void(0)" id="set10">微信设置</a>
</div>

<table class="tableset" id="dis_set01">
<tr>
<td width="120" class="right">站点名称</td>
<td><input type="text" class="input" name="config[sitename]" id="sitename" size="60" value="<?php echo isset($sitename) ? $sitename : '' ?>"></td>
</tr>
<tr>
<td width="120" class="right">标题说明</td>
<td><input type="text" class="input" name="config[sitetitle]" id="sitetitle" size="60" value="<?php echo isset($sitetitle) ? $sitetitle : '' ?>"></td>
</tr>
<tr>
<td class="right">二级域名</td>
<td><input type="text" class="input" name="config[siteurl]" id="siteurl" size="60" value="<?php echo isset($siteurl) ? $siteurl : '' ?>">商家自定义二级域名设置，显示的首页域名</td>
</tr>
<tr>
<td class="right">首页域名</td>
<td><textarea cols="50" rows="5" name="config[zhuyuming]" id="siteurl"><?php echo isset($zhuyuming) ? $zhuyuming : '' ?></textarea>一行一个(abc.com,www.ab.com,xyz.com)</td>
</tr>
<tr>
<td class="right">售卡域名</td>
<td><textarea cols="50" rows="5" name="config[shoukayuming]" id="siteurl"><?php echo isset($shoukayuming) ? $shoukayuming : '' ?></textarea>一行一个(def.com,www.def.com,ghi.com)</td>
</tr>
<tr>
<td class="right">支付域名：</td>
<td><input type="text" class="input" name="config[wxpay_host]" size="60" value="<?php echo isset($wxpay_host) ? $wxpay_host :'' ?>">支付域名，所有通道都会跳转这个域名上进行支付，请不要带有http://</td>
</tr>
<tr>
<td class="right">关键字</td>
<td><input type="text" class="input" name="config[keyword]" id="keyword" size="60" value="<?php echo isset($keyword) ? $keyword : '' ?>"></td>
</tr>
<tr>
<td class="right">站点简介</td>
<td><textarea name="config[description]" id="description" cols="54" class="input" rows="3"><?php echo isset($description) ? $description : '' ?></textarea></td>
</tr>

<tr>
<td class="right">用户审核</td>
<td>
<select name="config[userstate]" class="input">
<option value="0" <?php if(isset($userstate) && $userstate=='0') echo "selected" ?>>自动审核</option>
<option value="1" <?php if(isset($userstate) && $userstate=='1') echo "selected" ?>>手动审核</option>
</select>
</td>
</tr>
<tr>
<td class="right">用户注册</td>
<td>
<select name="config[reguser]" class="input">
<option value="0" <?php if(isset($reguser) && $reguser=='0') echo "selected" ?>>开启注册</option>
<option value="1" <?php if(isset($reguser) && $reguser=='1') echo "selected" ?>>关闭注册</option>
</select> 
</td>
</tr>

<tr>
<td class="right">注册公告</td>
<td>
<select name="config[buy_page_popup]" class="input">
<option value="0" <?php if(isset($buy_page_popup) && $buy_page_popup=='0') echo "selected" ?>>关闭公告</option>
<option value="1" <?php if(isset($buy_page_popup) && $buy_page_popup=='1') echo "selected" ?>>公告提示1</option>
<option value="2" <?php if(isset($buy_page_popup) && $buy_page_popup=='2') echo "selected" ?>>公告提示2</option>
</select> 
</td>
</tr>

<tr>
<td class="right">站点开关</td>
<td>
<select name="config[sitestate]" class="input">
<option value="0" <?php if(isset($sitestate) && $sitestate=='0') echo "selected" ?>>站点开启</option>
<option value="1" <?php if(isset($sitestate) && $sitestate=='1') echo "selected" ?>>站点关闭</option>
</select> 
</td>
</tr>

<tr>
<td class="right">站点关闭提示</td>
<td><textarea name="config[msgtip]" id="msgtip" cols="52" class="input" rows="3" ><?php echo isset($msgtip) ? $msgtip : '' ?></textarea></td>
</tr>
<!--
<tr>
<td class="right">统计代码</td>
<td><textarea name="config[tongji]" id="tongji" cols="52" class="input" rows="3" ><?php echo isset($tongji) ? stripslashes($tongji) : '' ?></textarea></td>
</tr>
-->

<tr>
<td class="right">领取卡密提示</td>
<td><textarea name="config[search_tips]" id="msgtip" cols="52" class="input" rows="3" ><?php echo isset($search_tips) ? $search_tips : '' ?></textarea></td>
</tr>

<!--

<tr>
<td class="right">微信二维码</td>
<td><?php echo isset($weixin) ? '<img src="'.$weixin.'" width="100" height="100">' : '' ?><input type="hidden" name="config[weixin]" value="<?php echo isset($weixin) ? $weixin : '' ?>" /><input type="file" name="file" /></td>
</tr>-->


</table>

<table class="tableset" id="dis_set02" style="display:none">
<tr>
<td width="120" class="right">商户后台主题</td>
<td><select name="config[theme]" class="input">
<?php foreach($themeList as $key=>$val): ?>						
<option value="<?php echo $key ?>" <?php echo isset($theme) && $theme==$key ? 'selected' : '' ?>><?php echo $val ?></option>
<?php endforeach; ?>
</select>
</td>						
</tr>

<tr>
<td class="right">商户购买页面</td>
<td><select name="config[themeforbuy]" class="input">
<option value="default" <?php echo isset($themeforbuy) && ($themeforbuy=='' || $themeforbuy=='default') ? 'selected' : '' ?>>系统默认</option>
<?php foreach($tplList as $key=>$val): ?>						
<option value="<?php echo $key ?>" <?php echo isset($themeforbuy) &&  $themeforbuy==$key ? 'selected' : '' ?>><?php echo $val ?></option>
<?php endforeach; ?>
</select>
</td>						
</tr>

<tr>
<td class="right">继续支付页面</td>
<td><select name="config[go_page_theme]" class="input">
<?php foreach($goPageList as $key=>$val): ?>						
<option value="<?php echo $key ?>" <?php echo isset($go_page_theme) &&  $go_page_theme==$key ? 'selected' : '' ?>><?php echo $val ?></option>
<?php endforeach; ?>
</select>
</td>						
</tr>

<tr>
<td class="right">网站首页模板</td>
<td><select name="config[template]" class="input">
<?php
$tpl_dir=WY_ROOT.'/tpl/';
$dir=opendir($tpl_dir);
while($tpl_name =readdir($dir)):
if(!strpos($tpl_name,'.') && $tpl_name!='.' && $tpl_name!='..'):
?>
<option value="<?php echo $tpl_name ?>" <?php if(isset($template) && $template==$tpl_name) echo "selected" ?>><?php echo $tpl_name ?></option>
<?php
endif; 
endwhile;
?>
</select>
</td>
</tr>
</table>

<table class="tableset" id="dis_set03" style="display:none">
<tr>
<td width="120" class="right">客服电话</td>
<td><input type="text" class="input" name="config[tel]" size="60" value="<?php echo isset($tel) ? $tel :'' ?>"></td>
</tr>
<tr>
<td class="right">客服QQ</td>
<td><input type="text" class="input" name="config[qq]" size="60" value="<?php echo isset($qq) ? $qq :'' ?>"></td>
</tr>
<tr>
<td class="right">联系地址</td>
<td><input type="text" class="input" name="config[address]" size="60" value="<?php echo isset($address) ? $address :'' ?>"></td>
</tr>
<tr>
<td class="right">客服邮箱</td>
<td><input type="text" class="input" name="config[servicemail]" size="60" value="<?php echo isset($servicemail) ? $servicemail :'' ?>"></td>
</tr>
<tr>
<td class="right">版权信息</td>
<td><input type="text" class="input" name="config[copyright]" size="60" value="<?php echo isset($copyright) ? $copyright : '' ?>"></td>
</tr>

<tr>
<td class="right">备案号码</td>
<td><input type="text" class="input" name="config[icp]" size="60" maxlength="20" value="<?php echo isset($icp) ? $icp : '' ?>"></td>
</tr>

</table>

<table class="tableset" id="dis_set04" style="display:none">
<tr>
<td width="120" class="right">提现开关</td>
<td>
<select name="config[takecash_state]" class="input">
<option value="0" <?php if(isset($takecash_state) && $takecash_state=='0') echo "selected" ?>>提现开启</option>
<option value="1" <?php if(isset($takecash_state) && $takecash_state=='1') echo "selected" ?>>提现关闭</option>
</select> 
</td>
</tr>

<tr>
<td class="right">提现关闭提示</td>
<td><textarea name="config[takecash_msgtip]" id="takecash_msgtip" cols="52" class="input" rows="3" ><?php echo isset($takecash_msgtip) ? $takecash_msgtip : '' ?></textarea></td>
</tr>

<tr>
<td class="right">允许提现时间</td>
<td>
从<select name="config[takecash_f]">
<?php for($i=0;$i<24;$i++): ?>
<option value="<?php echo $i ?>"<?php echo isset($takecash_f) && $takecash_f==$i ? ' selected' : '' ?>><?php echo $i ?>点</option>
<?php endfor; ?>
</select>
至<select name="config[takecash_t]">
<?php for($i=0;$i<24;$i++): ?>
<option value="<?php echo $i ?>"<?php echo isset($takecash_t) && $takecash_t==$i ? ' selected' : '' ?>><?php echo $i ?>点</option>
<?php endfor; ?>
</select>
</td>
</tr>



<tr>
<td class="right">最低提现金额</td>
<td><input type="text" class="input" name="config[takecash]" id="takecash" size="60" maxlength="7" value="<?php echo isset($takecash) ? $takecash : '' ?>"></td>
</tr>

<tr>
<td class="right">提现次数限制</td>
<td>最多允许<select name="config[takecash_times]">
<?php for($i=1;$i<=5;$i++): ?>
<option value="<?php echo $i ?>"<?php echo isset($takecash_times) && $takecash_times==$i ? ' selected' : '' ?>><?php echo $i ?>次</option>
<?php endfor; ?>
</select></td>
</tr>

<tr>
<td class="right">手续费率</td>
<td><input type="number" class="input" name="config[shouxufeilv]" id="shouxufeilv" size="60" maxlength="7" value="<?php echo isset($shouxufeilv) ? $shouxufeilv : '' ?>"> (百分比，输入数字即可；例如 10, 则表示收取10%)</td>
</tr>

<tr>
<td class="right">单笔最低手续费</td>
<td><input type="number" class="input" name="config[zuidishouxufei]" id="zuidishouxufei" size="60" maxlength="7" value="<?php echo isset($zuidishouxufei) ? $zuidishouxufei : '' ?>"> </td>
</tr>

<tr>
<td class="right">满多少免手续费</td>
<td><input type="number" class="input" name="config[freemin]" id="freemin" size="60" maxlength="7" value="<?php echo isset($freemin) ? $freemin : '' ?>"> (请输入整数)</td>
</tr>


<tr style="display: none;">
<td class="right">超过限制提示</td>
<td><textarea name="config[takecash_times_msg]" id="takecash_times_msg" cols="52" class="input" rows="3" ><?php echo isset($takecash_times_msg) ? $takecash_times_msg : '' ?></textarea></td>
</tr>
</table>

<table class="tableset" id="dis_set05" style="display:none">
<tr>
<td width="120" class="right">SMTP服务器</td>
<td><input type="text" class="input" name="config[smtp]" size="60" maxlength="50" value="<?php echo isset($smtp) ? $smtp : '' ?>"></td>
</tr>
<tr>
<td class="right">邮箱账号</td>
<td><input type="text" class="input" name="config[email]" size="60" maxlength="50" autocomplete="off" value="<?php echo isset($email) ? $email : '' ?>"></td>
</tr>
<tr>
<td class="right">邮箱账号密码</td>
<td><input type="password" class="input" name="config[authkey]" size="60" maxlength="50" autocomplete="off" value="<?php echo isset($authkey) ? $authkey : '' ?>"></td>
</tr>
</table>

<table class="tableset" id="dis_set06" style="display:none">
<tr>
<td width="120" class="right">过滤开关</td>
<td>
<select name="config[filter_state]" class="input">
<option value="0" <?php if(isset($filter_state) && $filter_state=='0') echo "selected" ?>>关闭过滤</option>
<option value="1" <?php if(isset($filter_state) && $filter_state=='1') echo "selected" ?>>开启过虑</option>
</select> 
</td>
</tr>

<tr>
<td class="right">危险关键字</td>
<td><textarea name="config[filter_dangerwords]" id="filter_dangerwords" cols="52" class="input" rows="3" ><?php echo isset($filter_dangerwords) ? $filter_dangerwords : '' ?></textarea></td>
</tr>

<tr>
<td class="right">安全关键字</td>
<td><textarea name="config[filter_safewords]" id="filter_safewords" cols="52" class="input" rows="3" ><?php echo isset($filter_safewords) ? $filter_safewords : '' ?></textarea></td>
</tr>

<tr>
<td class="right">敏感关键字</td>
<td><textarea name="config[minganci]" id="minganci" cols="52" class="input" rows="3" ><?php echo isset($minganci) ? $minganci : '' ?></textarea></td>
</tr>

<tr>
<td class="right"></td>
<td>敏感词是防止同行或一些不法商户发布不法信息来营销平台，发布不法信息去举报导致网址误报，以|线隔开例如：<span class="red">色情|赌博|做爱</span> 设计到敏感词都会在商户审核里需要审核后才可以上架</td>
</tr>
</table>

<table class="tableset" id="dis_set07" style="display:none">
<tr>
<td width="120" class="right">缓存同步</td>
<td>
<select name="config[cache_syn_state]" class="input">
<option value="0" <?php if(isset($cache_syn_state) && $cache_syn_state=='0') echo "selected" ?>>关闭同步</option>
<option value="1" <?php if(isset($cache_syn_state) && $cache_syn_state=='1') echo "selected" ?>>开启同步</option>
</select> 
</td>
</tr>

<tr>
<td class="right">同步的机器IP</td>
<td><textarea name="config[cache_syn_ip]" id="cache_syn_ip" cols="52" class="input" rows="3" ><?php echo isset($cache_syn_ip) ? $cache_syn_ip : '' ?></textarea></td>
</tr>

<tr>
<td class="right"></td>
<td>多个IP中间用 <span class="green">“|”</span> 隔开。</td>
</tr>
</table>

<table class="tableset" id="dis_set08" style="display:none">
<tr>
<td class="right">多线路域名</td>
<td>一行一条，格式为：名称|地址；例如：vip一线|http://vip1.abc.com<br><textarea name="config[xianlu]" id="xianlu" cols="52" class="input" rows="3" ><?php echo isset($xianlu) ? $xianlu : '' ?></textarea></td>
</tr>

<tr>
<td class="right">保留二级域名</td>
<td>用“|”分隔，例如：www|vip1|vip2<br><textarea name="config[domainnot]" id="domainnot" cols="52" class="input" rows="3" ><?php echo isset($domainnot) ? $domainnot : '' ?></textarea></td>
</tr>

</table>

<table class="tableset" id="dis_set09" style="display:none">
<tr>
<td class="right">短信价格(元/条)</td>
<td><input type="text" class="input" name="config[smsprice]" size="60" value="<?php echo isset($smsprice) ? $smsprice :'' ?>"></td>
</tr>
</table>


<table class="tableset" id="dis_set10" style="display:none">
<tr>
<td class="right">微信APPID：</td>
<td><input type="text" class="input" name="config[wx_appid]" size="60" value="<?php echo isset($wx_appid) ? $wx_appid :'' ?>"></td>
</tr>
<!--<tr>
<td class="right">微信MCHID：</td>
<td><input type="text" class="input" name="config[wx_mchid]" size="60" value="<?php echo isset($wx_mchid) ? $wx_mchid :'' ?>"></td>
</tr>
<tr>
<td class="right">微信KEY：</td>
<td><input type="text" class="input" name="config[wx_key]" size="60" value="<?php echo isset($wx_key) ? $wx_key :'' ?>"></td>
</tr>-->
<tr>
<td class="right">微信APPSECRET：</td>
<td><input type="text" class="input" name="config[wx_appsecret]" size="60" value="<?php echo isset($wx_appsecret) ? $wx_appsecret :'' ?>"></td>
</tr>

<tr>
<td class="right">微信消息</td>
<td></td>
</tr>
<tr>
<td class="right">卖家售卡通知：</td>
<td><input type="text" class="input" name="config[wx_notice_order]" size="60" value="<?php echo isset($wx_notice_order) ? $wx_notice_order :'' ?>"></td>
</tr>
<tr>
<td class="right">结算通知：</td>
<td><input type="text" class="input" name="config[wx_notice_money]" size="60" value="<?php echo isset($wx_notice_money) ? $wx_notice_money :'' ?>"></td>
</tr>

</table>



<table>
<tr>
<td width="120"></td>
<td></td>
</tr>
<tr>
<td class="right"></td>
<td><input type="submit" name="submit" class="button_bg_2" value="保存设置" /></td>
</tr>
</table>
<input type="hidden" name="action" value="save" />
</form>
</div>

<script>
setTimeout(hideMsg,2600);

$('.options a').each(function(){
    $(this).click(function(){
		$('.options a').removeClass('current');
		$(this).addClass('current');
	    var cname=$(this).attr('id');
		$('table.tableset').hide();
		$('#dis_'+cname).show();
		$.cookie('set_options',cname,{expires:365})
	})
	var cname=$(this).attr('id');
	if($.cookie('set_options')==cname){
		$('.options a').removeClass('current');
		$(this).addClass('current');
	    var cname=$(this).attr('id');
		$('table.tableset').hide();
		$('#dis_'+cname).show();
	}
})

function checkForm(){
    var sitename=$('#sitename').val();
	if(sitename==''){
	    alert('站点名称不能为空！');
		$('#sitename').focus();
		return false;
	}

	if(sitename.length>=90){
	    alert('站点名称最多90个字符！');
		$('#sitename').focus();
		return false;
	}

    var sitetitle=$('#sitetitle').val();
	if(sitetitle!='' && sitetitle.length>=180){
	    alert('站点标题说明最多180个字符！');
		$('#sitetitle').focus();
		return false;
	}

    var siteurl=$('#siteurl').val();
	if(siteurl==''){
	    alert('站点URL不能为空！');
		$('#siteurl').focus();
		return false;
	}

	if(siteurl.length>=50){
	    alert('站点URL最多50个字符！');
		$('#siteurl').focus();
		return false;
	}

    var keyword=$('#keyword').val();
	if(keyword!='' && keyword.length>=200){
	    alert('站点关键字最多200个字符！');
		$('#keyword').focus();
		return false;
	}

    var description=$('#description').val();
	if(description!='' && description.length>=500){
	    alert('站点简介说明最多500个字符！');
		$('#description').focus();
		return false;
	}

    var msgtip=$('#msgtip').val();
	if(msgtip==''){
	    alert('站点关闭提示不能为空！');
		$('#msgtip').focus();
		return false;
	}

	if(msgtip.length>=400){
	    alert('站点关闭提示最多400个字符！');
		$('#msgtip').focus();
		return false;
	}

    var takecash_msgtip=$('#takecash_msgtip').val();
	if(takecash_msgtip==''){
	    alert('提现关闭提示不能为空！');
		$('#takecash_msgtip').focus();
		return false;
	}

	if(takecash_msgtip.length>=400){
	    alert('提现关闭提示最多400个字符！');
		$('#takecash_msgtip').focus();
		return false;
	}

	var takecash=$('#takecash').val();
	if(takecash==''){
	    alert('最低提现金额不能为空！');
		$('#takecash').focus();
		return false;
	}

    var takecash_times_msg=$('#takecash_times_msg').val();
	if(takecash_times_msg==''){
	    alert('提现次数超过限制提示语不能为空！');
		$('#takecash_times_msg').focus();
		return false;
	}

	if(takecash_times_msg.length>=400){
	    alert('提现次数超限制提示语最多400个字符！');
		$('#takecash_times_msg').focus();
		return false;
	}

    var tongji=$('#tongji').val();
	if(tongji!='' && tongji.length>=1000){
	    alert('统计代码最多1000个字符！');
		$('#tongji').focus();
		return false;
	}
}
</script>