<?php
include_once 'init_notify.php';
try {
include './includes/libs/Weixin/Wxfw.class.php';
}
catch (Exception $e){
    echo $e->getMessage();
   
}
$ac=isset($_REQUEST['ac'])?$_REQUEST['ac']:'';
if($ac=='bind'){
    $username=$_REQUEST['username'];
	$userpass=md5(md5($_REQUEST['userpass']));
	$info_user=$wddb->getRow("select * from ".DB_PREFIX."users where username='{$username}' and userpass='{$userpass}'");

	if($info_user){
        if($info_user["openid_wx"] != "" && $info_user["openid_wx"] != $openid){
            header('location:?ac=msg&status=2');
        }else{
            $data=array(
          'openid_wx'=>$_REQUEST['openid']
            );
            $wddb->autoExecute(DB_PREFIX.'users', $data,'update',"id=".$info_user['id']);
            header('location:?ac=msg&status=1');
        }
	}else{
		header('location:?ac=msg&status=2');
	}
}else if($ac=='msg'){
	if($_REQUEST['status']==1){
	    $msg=array(
			'status'=>1,
			'style'=>'success',
			'info'=>'绑定成功，关闭此页即可'
		);
    }else if($_REQUEST['status']==2){
            $msg=array(
			'status'=>2,
			'style'=>'success',
			'info'=>'您已绑定过微信，如需解绑，请联系平台客服。'
		);
        }else{
		$msg=array(
			'status'=>0,
			'style'=>'warn',
			'info'=>'用户或密码错误'
		);
	}
}else if($ac==''){
	$sql = "select wx_appid,wx_appsecret from ".DB_PREFIX."config" ;
	$data = $wddb->getrow($sql);
	$wx=new Wxfw(array(
		'appid'=>$data["wx_appid"],
		'secret'=>$data["wx_appsecret"]
	));
	$openid=$wx->get_openid();
}

?>
<?php if($ac=='msg'){ ?>  
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
		<title></title>
		<link rel="stylesheet" type="text/css" href="static/weui/css/weui.min.css"/>
	</head>
	<body>
		<div class="container" id="container">
			<div class="page">
			    <div class="weui-msg">
			        <div class="weui-msg__icon-area"><i class="weui-icon-<?php echo $msg['style']?> weui-icon_msg"></i></div>
			        <div class="weui-msg__text-area">
			            <h2 class="weui-msg__title"><?php echo $msg['info']?></h2>
			        </div>
			    </div>
			</div>
		</div>
	</body>
</html>
<?php }else{ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="static/css/mui.min.css"/>
		<style type="text/css">
		ul,li{ list-style: none; padding: 0; margin: 0;}
		body,.mui-content{ background: #fff;}
		.mui-btn-block{ padding: 10px 0;}
		.mui-input-row label{ width:22%;}
		.mui-input-row label~input, .mui-input-row label~select, .mui-input-row label~textarea{ width:78%;}
		</style>
	</head>
	<body>
		<div class="mui-content">
			<p class="mui-content-padded">绑定后可通过手机微信管理卡密及订单信息</p>
			<form action="?ac=bind" method="post">
				<input type="hidden" name="openid"  value="<?php echo $openid;?>" />
				<ul class="mui-input-group">
					<li class="mui-input-row">
						<label>账号</label>
						<input name="username" type="text" autocomplete="off" class="mui-input-clear mui-input" placeholder="请输入账号">
					</li>
					<li class="mui-input-row">
						<label>密码</label>
						<input name='userpass' autocomplete="off" type="password" class="mui-input mui-input-password" placeholder="请输入密码">
					</li>
				</ul>
				<div class="mui-content-padded">
					<button type="submit" class="mui-btn mui-btn-block mui-btn-success">绑定</button>
				</div>
			</form>
		</div>
		<script src="static/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
<?php } ?>

