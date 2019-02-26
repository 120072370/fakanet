
<div id="full_table" style="height:621px;min-width:1200px;background:url(pub_images/about_banner.jpg) no-repeat center;min"></div>
<div id="full_table" style="min-height:600px;">
    <div id="tab1200" style="height:120px;padding-top:20px;">
	    <dd style="position:relative;height:60px;line-height:40px;width:1200px;min-width:1000px;font-size:16px;font-weight:600;color:#444444;">首页 > 新闻资讯</dd>
		<dd id="help_m" style="position:relative;height:60px;line-height:40px;width:1200px;min-width:1200px;">
		    <ul style="font-size:16px;font-weight:600px;">
				<li id="disp_one" style="float:left;margin-right:20px;height:50px;width:102px;text-align:center;color:#ffffff;background:url('pub_images/help_menu.png');">最新公告</li>
				<li id="disp_two" style="float:left;margin-right:20px;height:40px;width:100px;text-align:center;color:#000000;border:1px solid #dfdfdf;">新闻动态</li>
		    </ul>
		</dd>
	</div>
    <div id="tab1200" style="height:120px;padding-top:20px;">
	<hr style="height:2px;background-color:#e3e3e3;width:1100px;border:0;">
<style type="text/css">
.disp_new_one{position:relative;height:auto;}
</style>
	<?php 
	function get_datetime($str){$str=explode(" ",$str);echo $str[0];}
	echo "<ul id='disp_new_one' class='disp_new_one'>\n";
	for($i=0;$i<=count($lists)-1;$i++){
		$addtime=$lists[$i][addtime];
		echo "<li style='position:relative;height:90px;width:1100px;margin:0 auto;float:none;padding-top:20px;'>\n";
		echo "<dd style='position:relative;height:90px;font-size:14px;'>\n";
		echo "    <dl style='position:relative;width:1000px;height:30px;line-height:30px;font-size:16px;*font-size:14px;font-weight:600;'><a href='view.htm?id=".$lists[$i][id]."'>".$lists[$i][title]."</a></dl>\n";
		echo "    <dl style='position:relative;width:1000px;height:20px;line-height:20px;'>发布时间:";
		echo get_datetime($addtime);
		echo "</dl>\n";
		echo "    <dl style='position:relative;width:980px;height:20px;line-height:20px;text-align:right;'><a href='view.htm?id=".$lists[$i][id]."'>详细</a></dl>\n";
		echo "</dd>\n";
		     if($i!=count($lists)-1){
			     echo "<hr style='height:2px;background-color:#e3e3e3;width:1000px;border:0;'>\n";
		     }
		echo "</li>\n";
	}
	echo "</ul>\n";
	
	echo "<ul id='disp_new_two' class='disp_new_one' style='display:none;'>\n";
	for($s=0;$s<=count($result)-1;$s++){
		$addtime=$result[$s][addtime];
		echo "<li style='position:relative;height:90px;width:1100px;margin:0 auto;float:none;padding-top:20px;'>\n";
		echo "<dd style='position:relative;height:90px;font-size:14px;'>\n";
		echo "    <dl style='position:relative;width:1000px;height:30px;line-height:30px;font-size:16px;*font-size:14px;font-weight:600;'><a href='view.htm?id=".$result[$s][id]."'>".$result[$s][title]."</a></dl>\n";
		echo "    <dl style='position:relative;width:1000px;height:20px;line-height:20px;'>发布时间:";
		echo get_datetime($addtime);
		echo "</dl>\n";
		
		echo "    <dl style='position:relative;width:980px;height:20px;line-height:20px;text-align:right;'><a href='view.htm?id=".$result[$i][id]."'>详细</a></dl>\n";
		echo "</dd>\n";
		     if($s!=count($result)-1){
			     echo "<hr style='height:2px;background-color:#e3e3e3;width:1000px;border:0;'>\n";
		     }
		echo "</li>\n";
	}
	echo "</ul>\n";
	?>
	<hr style="height:2px;background-color:#e3e3e3;width:1100px;border:0;">
	</div>
</div>
<script type='text/javascript' src='pub_images/dispnews.js'></script>
<div style="position:relative;height:40px;clear:both;width:100%;"></div>
