<?php
/**
* 	配置账号信息
*/

class WxPayConfig
{
	const APPID = '';
	const MCHID = '';
	const KEY = '';
	const APPSECRET = '';
	
	
    //const SSLCERT_PATH =  dirname(__FILE__).'/pay/weixin_bank/cert/apiclient_cert.pem';
    //const SSLKEY_PATH = dirname(__FILE__).'/pay/weixin_bank/cert/apiclient_key.pem';

    const SSLCERT_PATH =  '../cert/apiclient_cert.pem';
	const SSLKEY_PATH = '../cert/apiclient_key.pem';
	
	
	const CURL_PROXY_HOST = "0.0.0.0";//"10.152.18.220";
	const CURL_PROXY_PORT = 0;//8080;
	
	
	const REPORT_LEVENL = 1;
}
