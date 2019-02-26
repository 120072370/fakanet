<?php if(!defined('WY_ROOT')) exit;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>举报与投诉</title>
<style>
table.search_result_report{padding:0;width:300px}
table.search_result_report td{padding:0}
table.search_result_report td a{text-decoration:none}
#main1 { CLEAR: both; DISPLAY: block;  MARGIN: 0px auto; OVERFLOW: hidden; WIDTH: 420px; PADDING-TOP: 9px; HEIGHT: 420px;}
.cuowuDl{  MARGIN: 20px auto 10px; text-align:left; width:420px; }
.cuowuDl dt{width:100px; float:left;  } 
.cuowuDl span{ width:100px; margin-top:0px; float:left; }

.cuowuDl dt{ width:320px; float:left; line-height:23px; display:block;}
.cuowuDl dt s{ text-decoration:none; color:#666;}
.cuowuDl dt strong{color:#f00; font-size:18px;}
.cuowuDl dd { clear:both;}
div button{ margin:10px 10px 0 0; background:url(http://<?php echo $config['siteurl'] ?>/lin/default/images/botton_bg.gif) no-repeat; width:125px; height:35px; border:0; cursor: pointer;font-weight: bold; }
.yhbottishi1  { background-color:#FFF6D6; border:1px solid #FADBA5; clear:both; margin: 0 auto; padding:10px; text-align:left; width:440px; height:auto; color:#FF0000; font-size:14px; line-height:30px; }
.yhbottishi1 img { margin-right:20px; float:left; }

.cz_db { height:28px; line-height:25px; text-align:left; }
.cz_db strong { color:#F00; }
.cz_db span { color:#f00; padding-right:5px; font-size:12px; }
.cz_db em { color:#888; font-style:normal; }

.tips { margin:0 25px 0 25px; padding-top:13px; text-align:left; }
.tips2 { margin:0; padding-top:13px; text-align:left; border-bottom:1px dashed #ccc; padding-bottom:10px; margin-bottom:15px; }
.tips strong { color:#6FBC00; font-weight:bold; display:inline-block; height:20px; line-height:16px; }
.tips a { color:#797979; text-decoration:underline; }
.tips a:hover { color:#f60; text-decoration:underline; }
.tips ol{list-style:none}
.tips li { color:#797979; line-height:20px; }
.tips li span { color:#f60; }

.sb {background:#fff; width:420px; height:auto; padding:10px 20px; text-align:left; margin:0 auto; }
.sbbt { height:40px; line-height:40px; text-align:left; border-bottom:1px dashed #ccc; }
.sbbtb { float:left; font-size:16px; font-weight:bold; color:#666666; }
.sbbtx { float:right; font-size:16px; padding-left:20px;}
.sbbtx a {display:inline-block;background:url(http://<?php echo $config['siteurl'] ?>/lin/gray/images/x.png) left 13px no-repeat; color:#0072e5; text-decoration:none;padding-left:15px }
.snextb { margin:15px auto 0 auto; height:45px; text-align:center; }
.snext { width:81px; height:33px; background:url(http://<?php echo $config['siteurl'] ?>/lin/gray/images/nextbg.png); font-size:14px; color:#FFF; font-weight:bold; border:none; }
.stjbtn {cursor:pointer;width:125px; height:35px; background:url(http://<?php echo $config['siteurl'] ?>/lin/gray/images/tjbg.png); font-size:12px; color:#000; font-weight:bold; border:none; display:inline-block;line-height:35px;text-decoration:none}
.czjb { background:url(http://<?php echo $config['siteurl'] ?>/lin/gray/images/jbbg.png) 350px 10px no-repeat; height:auto; }
.font14 { font-size:14px; }

</style>
</head>
<body>
<form name='report' action='http://<?php echo _S('HTTP_HOST') ?>/lin/report.php?t=<?php echo $t ?>' method='post' class="nyroModal">
<input type="hidden" name="userid" value="<?php echo $userid ?>" />
<?php if($t): ?>
<div class="sb">
  <div class="sbbt">
    <div class="sbbtb">投诉举报</div>
    <div class="sbbtx"><a href="#" class="nyroModalClose">关闭</a></div>
  </div>
  <div class="czjb">
    <div class="cz_db" style="padding-top:10px;"><span>*</span>举报原因：
    <select name="report_type">
	<option value="">--请选择--</option>
	<option value="无效卡密">无效卡密</option>
	<option value="虚假商品">虚假商品</option>
	<option value="非法商品">非法商品</option>
	<option value="侵权商品">侵权商品</option>
	<option value="不能购买">不能购买</option>
	<option value="恐怖色情">恐怖色情</option>
	<option value="其他投诉">其他投诉</option>
    </select>
    <input type="hidden" name="report_url" value="<?php echo _S('HTTP_REFERER') ?>" />
    </div>
    <div class="cz_db"><span>*</span>联系方式：
      <input type="text" name="report_contact" size="16" class="ipt" /> <em>(QQ，Email，手机)</em>
    </div>
    <div class="cz_db"><span>*</span>补充说明： </div>
    <div>
      <textarea name="remark" id="remark" cols="44" rows="5" style="width:370px; height:80px;"></textarea>
    </div>
    <div class="tips tips2">
      <ol>
        <li><span>如果你看到含有色情，暴力，反动或任何不健康的内容，请直接举报！</span></li>
      </ol>
    </div>
    <div class="snextb">
	    <table width="300" class="search_result_report" style="margin:auto">
		<tr>
		<td><input type="submit" name="submit" class="stjbtn" value="提 交" /></td>
		<td><a class="nyroModal stjbtn" href="http://<?php echo $config['siteurl'] ?>/lin/report.php?action=search" target="_blank">举报结果查询</a></td>
		</tr>
		</table>
		<p style="margin-top:10px;color:red;text-align:center;font-weight:bold"><?php echo $result ?></p>
    </div>	
  </div>
</div>

<?php else: ?>
<div id="main1">
	<dl class="cuowuDl">
    <span><img src="http://<?php echo $config['siteurl'] ?>/lin/default/images/cuowu.gif"/></span>
    	<dt>
        <b>举报原因：</b>
		<select name="report_type">
		<option value="">--请选择--</option>
		<option value="无效卡密">无效卡密</option>
		<option value="虚假商品">虚假商品</option>
		<option value="非法商品">非法商品</option>
		<option value="侵权商品">侵权商品</option>
		<option value="不能购买">不能购买</option>
		<option value="恐怖色情">恐怖色情</option>
		<option value="其他投诉">其他投诉</option>
		</select><br/>
        <b>举报网址：</b><br /><?php echo _S('HTTP_REFERER') ?><input type="hidden" name="report_url" value="<?php echo _S('HTTP_REFERER') ?>" /><br/>
		<b>联系方式：</b><input type="text" name="report_contact" size="16" class="J_Select210" /> (QQ、E-mail、手机)<br/>
		<b>补充说明：</b><textarea rows="3" name="remark" cols="28" style="width:310px; height:80px"></textarea>
       </dt>
        
	</dl>
		<div class="yhbottishi1 einfo">
		<img src="http://<?php echo $config['siteurl'] ?>/lin/default/images/shengming.gif">如果你看到的页面含有色情、暴力、反动或任何不健康的内容，请直接举报。
		</div>
        <div style="width: 420px; margin: 0pt auto; text-align: center;" id="di1">
			<table width="300" class="search_result_report" style="margin:auto">
			<tr>
			<td><input type="submit" name="submit" class="stjbtn" value="提 交" /></td>
			<td><a class="nyroModal stjbtn" href="http://<?php echo $config['siteurl'] ?>/lin/report.php?action=search" target="_blank">举报结果查询</a></td>
			</tr>
			</table>
			<p style="margin-top:10px;color:red;text-align:center;font-weight:bold"><?php echo $result ?></p>
        </div>    
</div>
<?php endif; ?>
</form>
<script>
$(function(){
    $('[name=report]').submit(function(){
	    var report_type=$('[name=report_type]').val();
		if(report_type==''){
		    alert('请选择举报原因！');
			$('[name=report_type]').focus();
			return false;
		}

		var contact=$('[name=report_contact]').val();
		if(contact==''){
		    alert('请填写联系方式，凭填写的联系方式查询处理结果！');
			$('[name=report_contact]').focus();
			return false;
		}
	})
})
</script>
</body>
</html>