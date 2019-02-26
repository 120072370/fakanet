<?php
include 'phpqrcode.php'; 
QRcode::png(urldecode($_REQUEST['url']));
?>