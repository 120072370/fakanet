<?php
/* *
 * �����ļ�
 * �汾��3.2
 * ���ڣ�2011-03-25
 * ˵����
 * ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
 * �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
	
 * ��ʾ����λ�ȡ��ȫУ����ͺ��������id
 * 1.������ǩԼ֧�����˺ŵ�¼֧������վ(www.alipay.com)
 * 2.������̼ҷ���(https://b.alipay.com/order/myorder.htm)
 * 3.�������ѯ���������(pid)��������ѯ��ȫУ����(key)��
	
 * ��ȫУ����鿴ʱ������֧�������ҳ��ʻ�ɫ��������ô�죿
 * ���������
 * 1�������������ã������������������������
 * 2���������������ԣ����µ�¼��ѯ��
 */

require_once 'inc.php';
//�����������������������������������Ļ�����Ϣ������������������������������
//���������id����2088��ͷ��16λ������
$aliapy_config['partner']      = $userid;

//��ȫ�����룬�����ֺ���ĸ��ɵ�32λ�ַ�
$aliapy_config['key']          = $userkey;

//ǩԼ֧�����˺Ż�����֧�����ʻ�
$aliapy_config['seller_email'] =$email;

//ҳ����תͬ��֪ͨҳ��·����Ҫ�� http://��ʽ������·�����������?id=123�����Զ������
//return_url����������д��http://localhost/create_direct_pay_by_user_php_gb/return_url.php ������ᵼ��return_urlִ����Ч
$aliapy_config['return_url']   = 'http://'.$_SERVER['HTTP_HOST'].'/pay/alipay_bank/return_url.php';

//�������첽֪ͨҳ��·����Ҫ�� http://��ʽ������·�����������?id=123�����Զ������
$aliapy_config['notify_url']   = 'http://'.$_SERVER['HTTP_HOST'].'/pay/alipay_bank/notify_url.php';

//�����������������������������������Ļ�����Ϣ������������������������������


//ǩ����ʽ �����޸�
$aliapy_config['sign_type']    = 'MD5';

//�ַ������ʽ Ŀǰ֧�� gbk �� utf-8
$aliapy_config['input_charset']= 'utf-8';

//����ģʽ,�����Լ��ķ������Ƿ�֧��ssl���ʣ���֧����ѡ��https������֧����ѡ��http
$aliapy_config['transport']    = 'http';

$alipay_config['service'] = 'create_partner_trade_by_buyer';
?>