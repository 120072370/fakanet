<?php
/* *
 * ���ܣ���ʱ���ʽӿڽ���ҳ
 * �汾��3.2
 * �޸����ڣ�2011-03-25
*/
require_once 'inc.php';
require_once 'alipay.config.php';
require_once 'lib/alipay_service.class.php';

/**************************�������**************************/

//�������//

//�������վ����ϵͳ�е�Ψһ������ƥ��
$out_trade_no = $_REQUEST['orderid'];
//�������ƣ���ʾ��֧��������̨��ġ���Ʒ���ơ����ʾ��֧�����Ľ��׹���ġ���Ʒ���ơ����б��
$subject      = "CardPay";
//����������������ϸ��������ע����ʾ��֧��������̨��ġ���Ʒ��������
$body         = "CardPay";
//�����ܽ���ʾ��֧��������̨��ġ�Ӧ���ܶ��
$total_fee    = $_REQUEST['price'];

if(empty($out_trade_no) && empty($total_fee))
{
    header('Location: /viewpop.htm');
    die;
}

//��չ���ܲ�������Ĭ��֧����ʽ//

//Ĭ��֧����ʽ��ȡֵ������ʱ���ʽӿڡ������ĵ��е���������б�
$paymethod    = '';
//Ĭ���������ţ������б������ʱ���ʽӿڡ������ĵ�����¼�����������б�
$defaultbank  = '';


//��չ���ܲ�������������//

//������ʱ���
$anti_phishing_key  = '';
//��ȡ�ͻ��˵�IP��ַ�����飺��д��ȡ�ͻ���IP��ַ�ĳ���
$exter_invoke_ip = $_SERVER['REMOTE_ADDR'];
//ע�⣺
//1.������ѡ���Ƿ��������㹦��
//2.exter_invoke_ip��anti_phishing_keyһ����ʹ�ù�����ô���Ǿͻ��Ϊ�������
//3.���������㹦�ܺ󣬷��������������Ա���֧��SSL�������úøû�����
//ʾ����
//$exter_invoke_ip = '202.1.1.1';
//$ali_service_timestamp = new AlipayService($aliapy_config);
//$anti_phishing_key = $ali_service_timestamp->query_timestamp();//��ȡ������ʱ�������


//��չ���ܲ�����������//

//��Ʒչʾ��ַ��Ҫ�� http://��ʽ������·�����������?id=123�����Զ������
$show_url			="http://".$_SERVER['HTTP_HOST']."/pay/alipay/show.php";
//�Զ���������ɴ���κ����ݣ���=��&�������ַ��⣩��������ʾ��ҳ����
$extra_common_param = 'pay';

//��չ���ܲ�����������(��Ҫʹ�ã��밴��ע��Ҫ��ĸ�ʽ��ֵ)
$royalty_type		= "";			//������ͣ���ֵΪ�̶�ֵ��10������Ҫ�޸�
$royalty_parameters	= "";

//����Ҫ����Ĳ�������
$parameter = array(
		"service"			=> "create_direct_pay_by_user",
		"payment_type"		=> "1",
		
		"partner"			=> trim($aliapy_config['partner']),
		"_input_charset"	=> trim(strtolower($aliapy_config['input_charset'])),
        "seller_email"		=> trim($aliapy_config['seller_email']),
        "return_url"		=> trim($aliapy_config['return_url']),
        "notify_url"		=> trim($aliapy_config['notify_url']),
		
		"out_trade_no"		=> $out_trade_no,
		"subject"			=> $subject,
		"body"				=> $body,
		"total_fee"			=> $total_fee,
		
		"paymethod"			=> $paymethod,
		"defaultbank"		=> $defaultbank,
		
		"anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip,
		
		"show_url"			=> $show_url,
		"extra_common_param"=> $extra_common_param,
		
		"royalty_type"		=> $royalty_type,
		"royalty_parameters"=> $royalty_parameters
);

//���켴ʱ���ʽӿ�
$alipayService = new AlipayService($aliapy_config);
$html_text = $alipayService->create_direct_pay_by_user($parameter);
echo $html_text;
?>
