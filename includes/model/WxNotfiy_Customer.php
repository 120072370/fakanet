<?php
class WxNotfiy_Customer{
    private $db;
    function __construct(){
	    $this->db=Mysql::getInstance();
	}

    //投诉通知
    function apiReportNotfiy($to_userid,$reason,$contact,$result,$remark="",$resultcolor="#ff0000"){
		global $wddb;
        $config=$wddb->getrow("select * from ".DB_PREFIX."config");
        $user=$wddb->getrow("select * from ".DB_PREFIX."users where id=".$to_userid."");
        //发送微信通知
        if($user["openid_wx"] != ""){
            include_once WY_ROOT.'/includes/libs/Weixin/Wxfw.class.php';
            $wx=new Wxfw(array(
                'appid'=>$config['wx_appid'],
                'secret'=>$config['wx_appsecret']
            ));
            $data=array(
                'touser'=>$user['openid_wx'],
                'template_id'=> "zY7l-80sPqR20keDeUT0ZOa-fJQ1Xfv02gAM-yXH0-k",
                'url'=>"http://{$_SERVER['HTTP_HOST']}/usr/message.php",
                 'topcolor'=>'#FF0000',
                'data'=>array(
                    'first'=>array(
                        'value'=>"订单投诉通知"
                    ),
                    'keyword1'=>array(
                        'value'=>$reason  //投诉内容
                    ),
                    'keyword2'=>array(
                        'value'=>  "联系方式：".$contact, //投诉人
                        'color'=>"#ff0000"
                    ),
                    'keyword3'=>array(
                        'value'=>date('Y年m月d日 H:i',time())  //投诉时间
                    ),
                    'keyword4'=>array(
                        'value'=>$result, //处理结果
                         'color'=>$resultcolor
                    ),
                    'remark'=>array(
                        'value'=>$remark,
                        'color'=>"#ff0000"
                    ),
                ),
            );
            // echo $data;
            $re=$wx->api('message/template/send','',$data,'POST');
            //if($re["errcode"]!= 0){
            //    echo "ok_no";
            //    exit;
            //}
        }
        
	}

    //违规通知
    function apiReportWGNotfiy($to_userid,$reason,$contact,$remark="",$resultcolor="#ff0000"){
		global $wddb;
        $config=$wddb->getrow("select * from ".DB_PREFIX."config");
        $user=$wddb->getrow("select * from ".DB_PREFIX."users where id=".$to_userid."");
        //发送微信通知
        if($user["openid_wx"] != ""){
            include_once WY_ROOT.'/includes/libs/Weixin/Wxfw.class.php';
            $wx=new Wxfw(array(
                'appid'=>$config['wx_appid'],
                'secret'=>$config['wx_appsecret']
            ));
            $data=array(
                'touser'=>$user['openid_wx'],
                'template_id'=> "cPGmPGYBBvaTGxlZdQL-CAHOV6-ujZMHciemSHXK_ks",
                'url'=>"http://{$_SERVER['HTTP_HOST']}/usr/message.php",
                 'topcolor'=>'#FF0000',
                'data'=>array(
                    'first'=>array(
                        'value'=>"店铺违规通知"
                    ),
                    'keyword1'=>array(
                        'value'=>$reason  //违规内容
                    ),
                    'keyword2'=>array(
                        'value'=>  $contact, //处理方式
                        'color'=>"#ff0000"
                    ),
                    'remark'=>array(
                        'value'=>$remark,
                        'color'=>"#ff0000"
                    ),
                ),
            );
            $re=$wx->api('message/template/send','',$data,'POST');
        }
        
	}
    //警告通知
    function apiReportJGNotfiy($to_userid,$reason,$contact,$remark="",$resultcolor="#ff0000"){
		global $wddb;
        $config=$wddb->getrow("select * from ".DB_PREFIX."config");
        $user=$wddb->getrow("select * from ".DB_PREFIX."users where id=".$to_userid."");
        //发送微信通知
        if($user["openid_wx"] != ""){
            include_once WY_ROOT.'/includes/libs/Weixin/Wxfw.class.php';
            $wx=new Wxfw(array(
                'appid'=>$config['wx_appid'],
                'secret'=>$config['wx_appsecret']
            ));
            $data=array(
                'touser'=>$user['openid_wx'],
                'template_id'=> "_zefOo-LcIz1QCv7VoG6B_PIi7ni5JWgDEPDjCAxgI0",
                'url'=>"http://{$_SERVER['HTTP_HOST']}/usr/message.php",
                'topcolor'=>'#FF0000',
                'data'=>array(
                    'first'=>array(
                        'value'=>"商家警告通知",
                        'color'=>"#ff0000"
                    ),
                    'keyword1'=>array(
                        'value'=>$reason  //处罚原因
                    ),
                    'keyword2'=>array(
                        'value'=>  $contact, //说明
                        'color'=>"#ff0000"
                    ),
                    'remark'=>array(
                        'value'=>$remark
                    ),
                ),
            );
            $re=$wx->api('message/template/send','',$data,'POST');
        }
        
	}
}
