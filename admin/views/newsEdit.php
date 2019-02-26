<?php if(!defined('WY_ROOT')) exit;?>
<script charset="utf-8" src="views/editor4/kindeditor-min.js"></script>
<script charset="utf-8" src="views/editor4/lang/zh_CN.js"></script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="contenttext"]', {
					allowFileManager : false
				});
			});
		</script>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 新闻管理  <span>&raquo;</span> 编辑文章</div>
<div class="main">
<style>
#title_color a{display:inline-block;padding:5px 10px;background:#fff;color:#000;text-decoration:none;}
#showstyle{display:none;position:relative;border:1px solid #ccc;background:#f1f1f1;padding:10px}
#showstyle a{display:inline-black;padding:5px 10px;color:#fff;margin-right:10px}
</style>

<form name="add" method="post" action="?action=editsave&id=<?php echo $id ?>">
<table class="register">
<tr>
<td width="100" class="right">文章分类</td>
<td>
<select name="classid" class="input">
<?php
if($newsClass):
foreach($newsClass as $key => $val):
?>
<option value="<?php echo $val['id'] ?>" <?php echo $val['id']==$classid ? 'selected' : '' ?>><?php echo $val['classname'] ?></option>
<?php
endforeach;
endif;
?>
</select>
</td>
</tr>

<tr>
<td class="right">文章标题</td>
<td><input type="text" class="input" name="title" size="100" maxlength="90" value="<?php echo $title ?>" /></td>
</tr>

<tr>
<td class="right">添加日期</td>
<td><input type="text" class="input" name="addtime" size="100" maxlength="20" value="<?php echo $newaddtime ?>" /></td>
</tr>

<tr>
<td class="right"></td>
<td>
<input type="checkbox" name="is_bold" id="is_bold" value="bold" <?php echo $is_bold=='bold' ? 'checked' : '' ?> /><label for="is_bold"> <strong>加粗显示</strong> </label> 
<span id="title_color"><a href="javascript:void(0)" onclick="show_style()" title="点击更改">标题颜色</a></span>
<input type="hidden" name="is_color" value="000000" />
<div id="showstyle" style="display:none">
<a href="javascript:void(0)" style="background:#000000" onClick="select_style('000000')">000000</a>
<a href="javascript:void(0)" style="background:#009f0b"  onClick="select_style('009f0b')">009f0b</a>
<a href="javascript:void(0)" style="background:#ff0000"  onClick="select_style('ff0000')">ff0000</a>
<a href="javascript:void(0)" style="background:#d3009f"  onClick="select_style('d3009f')">d3009f</a>
<a href="javascript:void(0)" style="background:#5d0046"  onClick="select_style('5d0046')">5d0046</a>
<a href="javascript:void(0)" style="background:#0020aa"  onClick="select_style('0020aa')">0020aa</a>
<a href="javascript:void(0)" style="background:#990000"  onClick="select_style('990000')">990000</a>
<a href="javascript:void(0)" style="background:#666600"  onClick="select_style('666600')">666600</a>
<a href="javascript:void(0)" style="background:#ff6600"  onClick="select_style('ff6600')">ff6600</a>
</div>
</td>
</tr>

<tr>
<td class="right">文章内容</td>
<td><textarea name="contenttext" style="width:700px;height:300px;visibility:hidden;"><?php echo $content ?></textarea></td>
</tr>

<tr>
<td class="right"></td>
<td>
<input type="checkbox" name="is_popup" value="1" <?php echo $is_popup==1 ? 'checked' : '' ?> id="c1" /> <label for="c1">允许动弹出此文章</label>
<input type="checkbox" name="is_display_home" value="1" <?php echo $is_display_home==1 ? 'checked' : '' ?> id="c2" /> <label for="c2">允许显示在首页</label>
</td>
</tr>

<tr>
<td class="right"></td>
<td><input type="submit" class="button_bg_2" onclick="add()" value="保存文章" /></td>
</tr>
</table>
</form>
</div>

<script>
$('[type=submit]').click(function(){
	var $title=$.trim($('[name=title]').val());
	if($title==''){
		alert('公告标题不能为空！');
		$('[name=title]').focus();
		return false;
		}
	})
	
var show_style=function(){
	$('#showstyle').toggle();
	}

var select_style=function(val){
	$('#title_color a').css({'color':'#'+val})
		$('[name=is_color]').val(val);
	}

$(function(){
	$('#is_bold').click(function(){
		if($(this).attr('checked')){
			$('#title_color a').css({'font-weight':'bold'});
			} else {
			$('#title_color a').css({'font-weight':'100'});
		}
	})
})
						
$(function(){
	<?php if($is_color!=''):?>
		select_style('<?php echo $is_color ?>');
	<?php endif;?>
	<?php if($is_bold!=''):?>
		$('#title_color a').css({'font-weight':'bold'});
	<?php endif;?>
})
</script>