<?php

class QpayMchConf
{
	
	const MCH_ID = '1509607141';
	const SUB_MCH_ID = '';
	const MCH_KEY = '087605b58600bf77cc1dd7fdeae24f8d';
	const KEY = '087605b58600bf77cc1dd7fdeae24f8d';
	const CERT_FILE_PATH =  'apiclient_cert.pem';
	const KEY_FILE_PATH  = 	'apiclient_key.pem';
	const NOTIFY_URL = "http://".$_SERVER['HTTP_HOST']."/pay/qqpay_bank/notify_url.php";
}
class QPayConf_pub
{
	
	const MCH_ID = '1509607141';
	const SUB_MCH_ID = '';
	const MCH_KEY = '087605b58600bf77cc1dd7fdeae24f8d';
	const KEY = '087605b58600bf77cc1dd7fdeae24f8d';
	const CERT_FILE_PATH =  'apiclient_cert.pem';
	const KEY_FILE_PATH  = 	'apiclient_key.pem';
	const NOTIFY_URL = "http://".$_SERVER['HTTP_HOST']."/pay/qqpay_bank/notify_url.php";
}