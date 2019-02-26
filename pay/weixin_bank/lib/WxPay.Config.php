<?php
/**
* 	配置账号信息
*/

class WxPayConfig
{
	const APPID = 'wxe76361ff234d1e12';
	const MCHID = '1496257872';
	const KEY = '087605b58600bf77cc1dd7fdeae24f8d';
	const APPSECRET = '2df3714aee2573fb35b779850212028d';
	
	
    //const SSLCERT_PATH =  dirname(__FILE__).'/pay/weixin_bank/cert/apiclient_cert.pem';
    //const SSLKEY_PATH = dirname(__FILE__).'/pay/weixin_bank/cert/apiclient_key.pem';

    const SSLCERT_PATH =  '../cert/apiclient_cert.pem';
	const SSLKEY_PATH = '../cert/apiclient_key.pem';
	
	
	const CURL_PROXY_HOST = "0.0.0.0";//"10.152.18.220";
	const CURL_PROXY_PORT = 0;//8080;
	
	
	const REPORT_LEVENL = 1;
}
