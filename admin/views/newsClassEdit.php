<?php if(!defined('WY_ROOT')) exit;?>
 <div class="addr"><span>当前位置：</span><a href="./">首页</a> <span>&raquo;</span> 文章管理  <span>&raquo;</span> 编辑分类</div>
<div class="main">
<form name="add" method="post" action="?action=editsave&id=<?php echo $id ?>">
<input type="text" class="input" name="cname" size="30" maxlength="30" value="<?php echo $classname ?>" />
<input type="submit" class="button_bg_2" value="保存分类" />
</form>
<script>
$('[type=submit]').click(function(){
	var $ob=$('[name=cname]');
	var $cname=$.trim($ob.val());
	if($cname==''){
		alert('分类名称不能为空！');
		$ob.focus();
		return false;
		}
	else{
		var reg1=/[^\a-zA-Z\u4e00-\u9fa5]/g;
		if(reg1.test($cname)){
			alert('分类名称只能是汉字或字母！');
			$ob.focus();
			return false;
			}
		}
	})
</script>
</div>