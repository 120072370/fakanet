<?php
/**
 * 图片验证码生成
 * @copyright (c) Emlog All Rights Reserved
 */

session_start();

$randCode = '';
$chars = '123456789';
for ( $i = 0; $i < 4; $i++ ){
	$randCode .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
}

$_SESSION['chkcode'] = strtolower($randCode);

$img = imagecreate(150,40);
$bgColor = isset($_GET['mode']) && $_GET['mode'] == 't' ? imagecolorallocate($img,245,245,245) : imagecolorallocate($img,255,255,255);
$pixColor = imagecolorallocate($img,mt_rand(30, 180), mt_rand(10, 100), mt_rand(40, 250));

for($i = 0; $i < 4; $i++){
	$x = $i * 30 + mt_rand(0, 9) - 2;
	$y = mt_rand(0, 20);
	$text_color = imagecolorallocate($img, mt_rand(30, 180), mt_rand(10, 100), mt_rand(40, 250));
	imagechar($img, 50, $x + 5, $y + 3, $randCode[$i], $text_color);
}
for($j = 0; $j < 60; $j++){
	$x = mt_rand(0,150);
	$y = mt_rand(0,40);
	imagesetpixel($img,$x,$y,$pixColor);
}
header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);
