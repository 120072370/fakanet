<?php
//==================================================================================================
//
//��֧������ǩԼ��ʱ���˸���������ӿ��ύ
//��ҳ�����ڽ����ݿ����Ѽ�¼�Ķ������͵�֧������վ���и���
//
//���ӿ�ʾ��������ʾ�˽ӿڹ������̣��������޸�ʾ��������м��ɣ�Ҳ���Ը��ݿ����ĵ����б�д�ӿڴ���
//������������μ��ɽӿڵ���վ��Ҳ������ϵQQ��40386277���Ѽ���
//
//==================================================================================================
//��ȡ������
$Amount = isset($_REQUEST['price'])?$_REQUEST["price"]:0;
//��ȡ����˵��������ʹ�ö����ţ��ύ��֧����ǰ�Ƚ�������Ϣ��¼�����ݿ⣩
$Title = isset($_GET['orderid'])?$_GET["orderid"]:'';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
    <title>֧��������֧��</title>
</head>
<body>
    <form action="standard/index.php" method="post" name="alidirect" accept-charset="gb2312" onsubmit="document.charset='utf8'">
        <input type="hidden" name="goto" value="https://excashier.alipay.com">
        <input type="hidden" name="money" value="<?php echo $Amount;?>">
        <input type="hidden" name="payOrderId" value="<?php echo $Title;?>" />
        <input type="hidden" name="Order" value="<?php echo $Title;?>" />
        <input type="hidden" name="type" value="1">
        <input type="hidden" name="account" value="lh123456">
    </form>
    <script>document.alidirect.submit();</script>
</body>
</html>
