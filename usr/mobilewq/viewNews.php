<?php if(!defined('WY_ROOT')) exit; ?>
<div style="padding:10px;">

<?php if($data): ?>
<div id="newstitle" style="text-align:center;font-size:14px;font-weight:bold;color:red;padding:10px 0"><?php echo $data['title'] ?></div>
<div id="newscontent" style="padding:15px 0;height:350px;overflow:auto;line-height:22px"><?php echo $data['content'] ?></div>
<?php if($t): ?>
<div style="text-align:right"><a href="javascript:nt('prev')" style="color:#cc3333">«上一条</a> <a href="javascript:nt('next')" style="color:#cc3333">下一条»</a></div>
<?php endif; ?>
<table width="100%" style="height:30px">
<tr>
<td><?php if($t): ?>
<input type="checkbox" id="user_set_popup" onclick="userSetPopup()" value="1" style="line-height:22px;"><label for="user_set_popup" style="font-family:arial;line-height:18px;">一天内不再提示</label>
<?php endif; ?>
</td>
<td><div style="text-align:right;color:#000"><?php echo SITENAME ?> <span id="newsdate"><?php echo $data['addtime'] ?></span></div></td>
</tr>
<table>
<?php endif; ?>
</div>