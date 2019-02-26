<?php 
require_once '../init.php';
define('VIEW_PATH',WY_ROOT.'/lin/report/');
$cache=Cache::getInstance();
$config=$cache->get('config');
$action=_G('action');

if($action==''){
	session_start();
	$userid=_G('uid');
	$t=_G('t');
    if(!$_SESSION['flag']){
        $uid=_P('userid');
        header("Content-type: text/html; charset=utf-8");
        $report_type=$_REQUEST['report_type'];
        $report_url=htmlentities(_P('report_url'));
        $contact=htmlentities(_P('report_contact'));
        $remark=$_REQUEST['remark'];
        $goodorderid=$_REQUEST['report_orderid'];
        if($uid && $report_url && $report_type && $contact){
            
            $order = new Orders_Model();
            $result=  $order->getOneDataCon($goodorderid,' and is_status=1  and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(updatetime)');
            if($result){
                $orderid=getRandomString(16);
                $data=array(
                    'userid'=>$uid,
                    'reason'=>$report_type,
                    'url'=>$report_url,
                    'contact'=>$contact,
                    'remark'=>$remark,
                    'addtime'=>time(),
                    'updatetime'=>time(),
                    'orderid'=>$orderid,
                    'ip'=>_S('REMOTE_ADDR'),
                      'goodsorderid'=>$result['orderid'],
                );
                $report=new Report_Model();
                $report->addData($data);
                $_SESSION['flag']=1;
                $result= '举报成功，我们将尽快处理！查询凭证：<strong style="color:blue">'.$orderid.'</strong>';
            }else{
                $result='未查询到该订单号！';  
            }
            //发送邮件	
            //$username=Users_Model::getUsernamebyUserID($uid);
            //$message = "以下是被举报投诉的商户详情：<br />";
            //$message .= "商户ID：{$uid}<br />";
            //$message .= "商户名称：{$username}<br />";
            //$message .= "举报URL地址：{$report_url}<br />";
            //$message .= "举报原因：{$report_type}<br />";
            //$message .= "补充说明：{$remark}<br />";
            //$message .= "举报人联系方式：{$contact}<br />";
            //sendMail($config['email'],'关于对商户['.$username.']的举报投诉!',$message);
            
            
        }
    } else {
        $result='您已经提交过投诉，正在处理中！如还需投诉请关闭浏览器重新提交！';
    }
	require View::getView('report');
	View::Output();
}

if($action=='postadd'){
	session_start();
	$userid=_G('uid');
	$t=_G('t');
    if(!$_SESSION['flag']){
        $uid=_P('userid');
        $report_type=_P('report_type');
        //header("Content-type: text/html; charset=utf-8");
        //$report_type=$_REQUEST['report_type'];
        $report_url=htmlentities(_P('report_url'));
        $contact=htmlentities(_P('report_contact'));
        $remark=$_REQUEST['remark'];
        $goodorderid=$_REQUEST['report_orderid'];

        if($uid && $report_url && $report_type && $contact){
            
            $order = new Orders_Model();
            $result=  $order->getOneDataCon($goodorderid,' and is_status=1 and DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(updatetime)');
            if($result){
                $orderid=getRandomString(16);
                $data=array(
                    'userid'=>$uid,
                    'reason'=>$report_type,
                    'url'=>$report_url,
                    'contact'=>$contact,
                    'remark'=>$remark,
                    'addtime'=>time(),
                    'updatetime'=>time(),
                    'orderid'=>$orderid,
                    'ip'=>_S('REMOTE_ADDR'),
                    'goodsorderid'=>$result['orderid']
                );
                $report=new Report_Model();
                $report->addData($data);
                $_SESSION['flag']=1;
                print '举报成功，我们将尽快处理！查询凭证：<strong style="color:blue">'.$orderid.'</strong>';
            }else{
                print '未查询到该订单号！';  
            }
            
        }else{
            print '举报失败,请稍后重试！';
        }
        
    } else {
        print '您已经提交过投诉，正在处理中！如还需投诉请关闭浏览器重新提交！';
    }

}

if($action=='mobile'){
    $userid=_G('uid');
    $t=_G('t');
	require View::getView('reportmobile');
	View::Output();
}


if($action=='search'){
	session_start();
	$data='';
	$contact=htmlentities(_P('report_contact'));
	if($contact && _P('chkcodeforsearch') && strtolower(_P('chkcodeforsearch'))==$_SESSION['chkcode']){
	    $_SESSION['chkocde']='';
		unset($_SESSION['chkcode']);
		$report=new Report_Model();
		$data=$report->getOneDataByOrderid($contact);
	}

    require View::getView('search');
	View::Output();
}

if($action=='search1'){
	session_start();
	$data='';
	$contact=htmlentities(_P('report_contact'));
	if($contact && _P('chkcodeforsearch') && strtolower(_P('chkcodeforsearch'))==$_SESSION['chkcode']){
	    $_SESSION['chkocde']='';
		unset($_SESSION['chkcode']);
		$report=new Report_Model();
		$data=$report->getOneDataByOrderid($contact);
	}

    require View::getView('search1');
	View::Output();
}
?>