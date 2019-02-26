<?php
require_once 'init.php';
//$classid=trim($_POST[class_id]);
$classid=_P('class_id','int');
if($classid){
function get_datetime($str){
	$str=explode(" ",$str);
	echo $str[0];
}
$db=Mysql::getInstance();
$re=$db->query("SELECT * FROM ".DB_PREFIX."news where classid='$classid' order by id desc");
echo "<dd style='margin:0px;padding:0px;'>";
if($db->num_rows($re)>0){
    while($row=$db->fetch_array($re)){
		echo "<li style='padding:0px;margin:0px;height:40px;line-height:40px;'>";
		echo "<dl style='height:30px;width:100px;float:left;'><a href='view.htm?id={$row['id']}' >[";
		echo get_datetime($row['addtime']);
		echo "]</a></dl>";
		echo "<dl style='height:30px;width:276px;text-indent:10px;float:left;'><a href='view.htm?id={$row['id']}' >";
		echo $row['title'];
		echo "</a></dl>";
		echo "</li>\n";
	}
}
echo "</dd>";
}
?>