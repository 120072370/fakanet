<?php
require_once 'common.php';
$action=_G('action');
$do=_G('do');
$ob=new OrdersAnalysis_Model();

$cons="userid=".$_SESSION['login_userid']."";

$fdate=_G('fdate');
$tdate=_G('tdate');

if($fdate==false) $fdate=$tdate=date('Y-m-d');

if($fdate<>'' && isDate($fdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)>='".$fdate."'";
}

if($tdate<>'' && isDate($tdate)){
	if($cons<>'') $cons.=' AND ';
	$cons .="date(addtime)<='".$tdate."'";
}

if($action==''){
	$title='渠道分析';
	$cons=$cons=='' ? '' : "WHERE {$cons}";
	$ob=new OrdersAnalysis_Model();
	$lists=$ob->analyForChannel($cons);

	if($do=='export'){
		$data='';
        $content="支付方式\t提交订单数\t已付订单数\t未付订单数\t订单总金额\t订单实收金额\t订单总收入\r\n";
        $filename='渠道分析_'.date('Y').date('m').date('d').'.xls';
		if($lists){
			$t1=$t2=$t3=$t4=$t5=$t6=0;
		    foreach($lists as $key=>$row){
				$unpaid_orders=$row['total_orders']-$row['success_orders'];
			    $data.="".$row['channelname']."\t".$row['total_orders']."\t".$row['success_orders']."\t".$unpaid_orders."\t".number_format($row['total_money'],2,'.','')."\t".number_format($row['success_money'],2,'.','')."\t".number_format($row['income_money'],2,'.','')."\r\n";
				//统计
				$t1+=$row['total_orders'];
				$t2+=$row['success_orders'];
				$t3+=$unpaid_orders;
				$t4+=$row['total_money'];
				$t5+=$row['success_money'];
				$t6+=$row['income_money'];
			}
			$data.="合计\t".$t1."\t".$t2."\t".$t3."\t".$t4."\t".$t5."\t".$t6."";
		}
		$content.=$data;
        exportFile($filename,$content);
    }
	
	require View::getView("header");
	require View::getView("analyforchannel");
	require View::getView("footer");
	View::Output();
}