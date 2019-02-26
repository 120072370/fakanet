<?php

	$html_new=array();
	$html_new[0]='<link href="/lin/blue/css/style.css" rel="stylesheet" type="text/css" />';
	$html_new[1]='<link href="/lin/gray/css/style.css" rel="stylesheet" type="text/css" />';
	$html_new[2]='<link href="/lin/orange/css/style.css" rel="stylesheet" type="text/css" />';
	$html_new[3]='<link href="/lin/crown/css/style.css" rel="stylesheet" type="text/css" />';

	
	$num=array_rand($html_new);
	echo "document.write('".$html_new[$num]."')";
	?>