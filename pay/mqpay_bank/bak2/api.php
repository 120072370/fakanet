<?php
error_reporting(0);
require_once('../../init.php');
require('./Data/config.php');
date_default_timezone_set("PRC");

/* ----------------------POST ����GET����������Ϣ-------------------------- */
if($Receive == "1"){
    $clock = trim(htmlspecialchars($_POST['clock']));        //�����ʱ��
    $name = trim(htmlspecialchars($_POST['name']));          //����˵��,�������û������û�ID�򶩵��ţ��ò����ɸ���ʱ���û�����
    $order = trim(htmlspecialchars($_POST['order']));        //֧�������׺�
    $money = trim(htmlspecialchars($_POST['money']));        //������
    $key = trim(htmlspecialchars($_POST['key']));            //��֧��������� ��ȫ��Կ
    $mode = trim(htmlspecialchars($_POST['mode']));          //���ʽ ���� --> ֧���� �Ƹ�ͨ QQǮ�� ΢��
    $card = trim(htmlspecialchars($_POST['card']));          //���ܹ��� ��ֵ����
    $dense = trim(htmlspecialchars($_POST['dense']));        //���ܹ����ֵ����
}
if($Receive == "2"){
    $clock = trim(htmlspecialchars($_GET['clock']));        //�����ʱ��
    $name = trim(htmlspecialchars($_GET['name']));          //����˵��,�������û������û�ID�򶩵��ţ��ò����ɸ���ʱ���û�����
    $order = trim(htmlspecialchars($_GET['order']));        //֧�������׺�
    $money = trim(htmlspecialchars($_GET['money']));        //������
    $key = trim(htmlspecialchars($_GET['key']));            //��֧��������� ��ȫ��Կ
    $mode = trim(htmlspecialchars($_GET['mode']));          //���ʽ ���� --> ֧���� �Ƹ�ͨ QQǮ�� ΢��
    $card = trim(htmlspecialchars($_GET['card']));          //���ܹ��� ��ֵ����
    $dense = trim(htmlspecialchars($_GET['dense']));        //���ܹ����ֵ����
}

/* ----------------------��֤KEY��Կͨ����ִ��֪ͨ��վ�ص���������-------------------------- */
if ($key == $secretkey){
	$S = substr(date('YmdHis',time()),0,8);       
    
    //if (file_exists('./Data/Order/'.$S."-".sprintf("%01.2f",$money).".mdb")){
    //    file_put_contents('./Data/Order/'.$S."-".sprintf("%01.2f",$money).".mdb", "0");    //�û�����ɹ�֪ͨ��վ�ص�	  
    $ob=@new HandleOrders_Model($name,$money,1);
    $ob->updateOrderStatusForBank();
    echo "success";         //�����ɹ������ʶ����,�����޸ķ�������޷�ʶ��		
    //}else{
    //    echo 'existence';       //����ʧ�ܣ����ʶ����,�����޸ķ�������޷�ʶ��	
    //}  	

}else{
    echo 'fail';            //��֤��Կ�������ʶ����,�����޸ķ�������޷�ʶ��	
}	

?>