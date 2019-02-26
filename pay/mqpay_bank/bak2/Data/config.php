<?php
/* ----------------------数据库连接配置信息-------------------------- */
//$root = 'root';              //SQL数据库账号
//$pwd = 'root';               //SQL数据库密码
//$mdb = 'SQL';                //SQL数据库名

//$Table = "sql_2090";         //MYSQL数据库表名
//$Member = "users";           //数据库用户账号字段名
//$rmb = "money";              //数据库用户余额字段名

/* ----------------------软件配置验证安全密钥-------------------------- */
$Receive = "1";                           //1：软件配置POST接收模式  2：软件配置GET接收模式 
$number = "2";                           //1：不支持小数点金额收款  2：支持小数点金额收款   
$Callback = "http://pay.zgxcjy.com/pay/mqpay_bank/api.php";           //你网站域名回调网站地址
$mone = "蚂蚁金服网络科技有限公司";              //你的收款账号或者公司名称
$secretkey = "108i8dqzqwqQA4v8XX1s";           //软件配置安全验证KEY秘钥

/* ----------------------数据库连接-------------------------- */
//$SQL = "1";                  //1：MYSQL数据连接   2：MSSQL数据连接   3：ACCESS数据库连接 

//if($SQL == "1"){
//    $Con = mysql_connect("localhost", "$root", "$pwd") or die("MYSQL数据库连接失败，请检测账号密码是否正确！");
//    mysql_select_db("$mdb", $Con);
//}
//if($SQL == "2"){
//    $Con = mssql_connect('127.0.0.1,1433',$root,$pwd) or die("MSSQL数据库连接失败，请检测账号密码是否正确！");  
//    mssql_select_db($mdb,$Con); 
//}
//if($SQL == "3"){
//    $connstr = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=" . realpath("data/123456.mdb");    //ACCESS数据库连接文件位置
//    $Con = odbc_connect($connstr,"","",SQL_CUR_USE_ODBC);
//} 

?>