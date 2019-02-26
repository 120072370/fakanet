<?php
//---------------------------------------------------------
//�Ƹ�ͨ��ʱ����֧������ʾ�����̻����մ��ĵ����п�������
//---------------------------------------------------------
require_once ('inc.php');
require_once ("classes/RequestHandler.class.php");
require_once ("./tenpay_config.php");

//�����ţ��˴���ʱ�����������ɣ��̻������Լ����������ֻҪ����ȫ��Ψһ����
$out_trade_no = _G('orderid');


/* ����֧��������� */
$reqHandler = new RequestHandler();
$reqHandler->init();
$reqHandler->setKey($key);
$reqHandler->setGateUrl("https://gw.tenpay.com/gateway/pay.htm");

//----------------------------------------
//����֧������ 
//----------------------------------------
$reqHandler->setParameter("partner", $partner);
$reqHandler->setParameter("out_trade_no", $out_trade_no);
$reqHandler->setParameter("total_fee", _G('price','float')*100);  //�ܽ��
$reqHandler->setParameter("return_url",  $return_url);
$reqHandler->setParameter("notify_url", $notify_url);
$reqHandler->setParameter("body", $out_trade_no);
$reqHandler->setParameter("bank_type", 'DEFAULT');  	  //�������ͣ�Ĭ��Ϊ�Ƹ�ͨ
//�û�ip
$reqHandler->setParameter("spbill_create_ip", _S('REMOTE_ADDR'));//�ͻ���IP
$reqHandler->setParameter("fee_type", "1");               //����
$reqHandler->setParameter("subject", $out_trade_no);          //��Ʒ���ƣ����н齻��ʱ���

//ϵͳ��ѡ����
$reqHandler->setParameter("sign_type", "MD5");  	 	  //ǩ����ʽ��Ĭ��ΪMD5����ѡRSA
$reqHandler->setParameter("service_version", "1.0"); 	  //�ӿڰ汾��
$reqHandler->setParameter("input_charset", "UTF-8");   	  //�ַ���
$reqHandler->setParameter("sign_key_index", "1");    	  //��Կ���

//ҵ���ѡ����
$reqHandler->setParameter("attach", "");             	  //�������ݣ�ԭ�����ؾͿ�����
$reqHandler->setParameter("product_fee", "");        	  //��Ʒ����
$reqHandler->setParameter("transport_fee", "0");      	  //��������
$reqHandler->setParameter("time_start", date("YmdHis"));  //��������ʱ��
$reqHandler->setParameter("time_expire", "");             //����ʧЧʱ��
$reqHandler->setParameter("buyer_id", "");                //�򷽲Ƹ�ͨ�ʺ�
$reqHandler->setParameter("goods_tag", "");               //��Ʒ���
$reqHandler->setParameter("trade_mode","1");              //����ģʽ��1.��ʱ����ģʽ��2.�н鵣��ģʽ��3.��̨ѡ�����ҽ���֧�������б�ѡ�񣩣�
$reqHandler->setParameter("transport_desc","");              //����˵��
$reqHandler->setParameter("trans_type","1");              //��������
$reqHandler->setParameter("agentid","");                  //ƽ̨ID
$reqHandler->setParameter("agent_type","");               //����ģʽ��0.�޴���1.��ʾ������ģʽ��2.��ʾ����ģʽ��
$reqHandler->setParameter("seller_id","");                //���ҵ��̻���



//�����URL
$reqUrl = $reqHandler->getRequestURL();

//��ȡdebug��Ϣ,����������debug��Ϣд����־�����㶨λ����
/**/
$debugInfo = $reqHandler->getDebugInfo();
//echo "<br/>" . $reqUrl . "<br/>";
//echo "<br/>" . $debugInfo . "<br/>";
Redirect($reqUrl);
?>