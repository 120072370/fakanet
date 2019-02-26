<?php
error_reporting(0);
require_once('../../init_notify.php');

//get id and key
$cache=Cache::getInstance();
$userid='';
$userkey='';
$accessProvider=$cache->get('accessProvider');
if($accessProvider){
    foreach($accessProvider as $key=>$val){
	    if($val['accessType']=='tenpay'){
			$email=$val['email'];
		    $userid=$val['accessID'];
			$userkey=$val['accessKey'];
			break;
		}
	}
}

function GetBankCode($bankid){
	$bankcode="8001";
	if($bankid=='ICBC-NET') $bankcode="1002";
	if($bankid=='CMBCHINA-NET') $bankcode="1001";
	if($bankid=='ABC-NET') $bankcode="1005";
	if($bankid=='CCB-NET') $bankcode="1003";
	if($bankid=='BCCB-NET') $bankcode="1032";
	if($bankid=='BOCO-NET') $bankcode="1020";
	if($bankid=='CIB-NET') $bankcode="1009";
	if($bankid=='NJCB-NET') $bankcode="8001";
	if($bankid=='CMBC-NET') $bankcode="1006";
	if($bankid=='CEB-NET') $bankcode="1022";
	if($bankid=='BOC-NET') $bankcode="1052";
	if($bankid=='PAB-NET') $bankcode="1010";
	if($bankid=='CBHB-NET') $bankcode="8001";
	if($bankid=='HKBEA-NET') $bankcode="8001";
	if($bankid=='NBCB-NET') $bankcode="8001";
	if($bankid=='ECITIC-NET') $bankcode="1021";
	if($bankid=='SDB-NET') $bankcode="1008";
	if($bankid=='GDB-NET') $bankcode="1027";
	if($bankid=='SHB-NET') $bankcode="1024";
	if($bankid=='SPDB-NET') $bankcode="1004";
	if($bankid=='POST-NET') $bankcode="1028";
	if($bankid=='BJRCB-NET') $bankcode="8001";
	if($bankid=='HXB-NET') $bankcode="1025";
	if($bankid=='CZ-NET') $bankcode="8001";
	if($bankid=='HZBANK-NET') $bankcode="8001";
	return $bankcode;
}
?>