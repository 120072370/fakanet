<?php
require_once ("./classes/ResponseHandler.class.php");
$resHandler = new ResponseHandler();
//�̻�������
$out_trade_no = $resHandler->getParameter("out_trade_no");
echo "<script>window.location.href='../../result.htm?orderid=".$out_trade_no."'</script>";	
?>