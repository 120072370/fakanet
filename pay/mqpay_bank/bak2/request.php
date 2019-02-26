<?php
error_reporting(0);
date_default_timezone_set("PRC");

/* ----------------------AJAX请求请勿修改-------------------------- */
$money = isset($_GET['m']) ? $_GET['m'] : false;              //付款金额
$clock = isset($_GET['t']) ? $_GET['t'] : false;              //验证订单时间
$users = isset($_GET['s']) ? $_GET['s'] : false;              //会员账号
$userd = isset($_GET['d']) ? $_GET['d'] : false;              //支付方式 1=支付宝 2=微信 3=QQ钱包 财付通

if (file_exists('./Data/Order/'.$clock."-".$money.".mdb")){
	$userz = file_get_contents('./Data/Order/'.$clock."-".$money.".mdb");
	
	if ($userz == "0"){
		require('./Data/config.php');
	    $order = date('YmdHisntw');                               //交易订单号随时间生成
		$time = date('Y-m-d H:i:s',time());                       //交易时间
		
		$users = iconv("UTF-8","GB2312//IGNORE",$users);          //中文会员账号，编码转换解码
		
        if($SQL == "1"){
			mysql_query("UPDATE $Table SET $rmb = $rmb + $money WHERE $Member = '$users'");                  //MYSQL处理用户充值到账SQL语句
			//mysql_query("Insert Into 表名 (订单字段名,时间字段名,余额字段名,账号字段名) Values ('$order','$time','$money','$users')");  //增加插入充值交易记录
		}
		if($SQL == "2"){
			mssql_query("UPDATE $Table SET $rmb = $rmb + $money WHERE $Member = '$users'");                  //MYSQL处理用户充值到账SQL语句
            //mssql_query("Insert Into 表名 (订单字段名,时间字段名,余额字段名,账号字段名) Values ('$order','$time','$money','$users')");  //增加插入充值交易记录
		}
		if($SQL == "3"){
            $DNS = "UPDATE $Table SET $rmb = $rmb + $money WHERE $Member = '$users'";                        //MYSQL处理用户充值到账SQL语句	
            //$DNS = "INSERT INTO 表名 (订单字段名,时间字段名,余额字段名,账号字段名) Values ('$order','$time','$money','$users')");
            $result= odbc_exec($Con,$DNS); 

            /*$DNS = "select * 表名";     //查找用户UID
              $rs = @odbc_do($connid,$DNS);
              while(odbc_fetch_row($rs)){
                if(odbc_result($rs,"字段名") == &users){
	               $id = odbc_result($rs,"id");
		           echo odbc_result($rs,"id");
		           break;
	               }	
                   } */    			
		}
		
///////////////////////////////SQL执行结束////////////////////////////////////////////////
    if($SQL == "1"){
		    mysql_close($Con);    
	    }
    if($SQL == "2"){
		    mssql_close($Con);
	    }
    if($SQL == "3"){
		    $Con->Close();
	    }		
		
		file_put_contents('./Data/Order/'.$clock."-".$money.".mdb", "1");                    //SQL请求处理完成后立即写入1
		die('0');
	}
}else{
	    file_put_contents('./Data/Order/'.$clock."-".$money.".mdb", "1");	                 //判断文件是否存在不存在重新写入
}	
	
?>