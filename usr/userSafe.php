<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	$title='初始化安全设置';
    $ob=new UserInfo_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);

	$title=isset($_SESSION['is_safe']) && $_SESSION['is_safe']==0 ? $title : '安全设置';
    require View::getView('header');
	if(isset($_SESSION['is_safe']) && $_SESSION['is_safe']==0 && !$data['safekey']){
	    require View::getView('userSafeInit');
	} else {
		$pcc1=$pcc2='';
		if($data['sn']){
			$pwCardCol=$data['pwCardCol'];
			$pwCardColArr=explode(',',$pwCardCol);
			$pccArr=array_rand($pwCardColArr,2);
			$pcc1=$pwCardColArr[$pccArr[0]].rand(1,8);
			$pcc2=$pwCardColArr[$pccArr[1]].rand(1,8);
			$_SESSION['pwCardCol']=$pcc1.$pcc2;
		}
	    require View::getView('userSafe');
	}
	require View::getView('footer');
	View::Output();
}

if($action=='safeinit'){
	
    $userpwd=_P('userpwd');
    $safepwd=_P('safepwd');
	$confirmsafepwd=_P('confirmsafepwd');
	$question=_P('question');
	$custom_question=_P('custom_question');
	$answer=_P('answer');
	$is_login=_P('is_login','int');
	$question=$question=='custom' ? $custom_question : $question;
	$answer=$question=='' ? '' : $answer;
	if($userpwd=='' || $safepwd=='' || strlen($safepwd)<6 || strlen($safepwd)>20 || $safepwd!=$confirmsafepwd){
	    Redirect('?edit_err=true');
	}
	//check oldpassword
	$ob=new Users_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data['userpass']!=md5(md5($userpwd))){
	    Redirect('?edit_err_1=true');
	}
	$data=array(
		'safekey'=>md5(md5($safepwd)),
		'question'=>$question,
	    'answer'=>$answer,
		'is_login'=>$is_login,
		'is_safe'=>2,
	);
	$_SESSION['is_safe']=2;
	$_SESSION['is_login']=$is_login;
	$ob=new UserInfo_Model();
	$ob->updateData($_SESSION['login_userid'],$data);

	$msg='<span class="green">商户安全已成功初始化！</span>';
	$url='userSafe.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}

if($action=='saveSafePwd'){
	
    $oldsafepwd=_P('oldsafepwd');
    $newsafepwd=_P('newsafepwd');
	$confirmnewsafepwd=_P('confirmnewsafepwd');
	if($oldsafepwd=='' || $newsafepwd=='' || strlen($newsafepwd)<6 || strlen($newsafepwd)>20 || $newsafepwd!=$confirmnewsafepwd){
	    Redirect('?edit_err=true');
	}
	//check oldpassword
	$ob=new UserInfo_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data['safekey']!=md5(md5($oldsafepwd))){
	    Redirect('?edit_err_1=true');
	}
	$data=array(
		'safekey'=>md5(md5($newsafepwd)),
	);
	$ob=new UserInfo_Model();
	$ob->updateData($_SESSION['login_userid'],$data);

	$msg='<span class="green">安全密码设置保存成功！</span>';
	$url='userSafe.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}

if($action=='saveispwcard'){	
    $pwcard=_P('safepwdforispwcard');
    $is_pwcard=_P('is_pwcard','int');
	if($pwcard=='' || strlen($pwcard)!=6){
	    Redirect('?edit_err=true');
	}
	$pcc1=substr($_SESSION['pwCardCol'],0,2);
	$pcc2=substr($_SESSION['pwCardCol'],-2);
	$db=Mysql::getInstance();
	$pccv='';
	
	$result=$db->query("SELECT cv FROM ".DB_PREFIX."pwcard WHERE ck='$pcc1' AND sn=".$_SESSION['pwcardsn']." LIMIT 1");
	if($db->num_rows($result)==1){
	    while($row=$db->fetch_array($result)){
		    $pccv=$row['cv'].$pccv;
		}
	}

	$result=$db->query("SELECT cv FROM ".DB_PREFIX."pwcard WHERE ck='$pcc2' AND sn=".$_SESSION['pwcardsn']." LIMIT 1");
	if($db->num_rows($result)==1){
	    while($row=$db->fetch_array($result)){
		    $pccv.=$row['cv'];
		}
	}

	if($pwcard!=$pccv){
		$msg='<span class="red">密保口令设置失败！</span>';
		$url='userSafe.php';
		$img='error';

		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		View::Output();exit;
	}

	$ob=new UserInfo_Model();	
	$data=array(
		'is_pwcard'=>$is_pwcard,
	);
	$_SESSION['is_pwcard']=$is_pwcard;
	$_SESSION['login_user_pwcard']=true;
	$ob=new UserInfo_Model();
	$ob->updateData($_SESSION['login_userid'],$data);

	$msg='<span class="green">密码口令卡设置成功！</span>';
	$url='userSafe.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}

if($action=='saveisLogin'){
	
    $safepwd=_P('safepwdforislogin');
    $is_login=_P('is_login','int');
	if($safepwd=='' || strlen($safepwd)<6 || strlen($safepwd)>20){
	    Redirect('?edit_err=true');
	}
	//check oldpassword
	$ob=new UserInfo_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data['safekey']!=md5(md5($safepwd))){
	    Redirect('?edit_err_1=true');
	}
	$data=array(
		'is_login'=>$is_login,
	);
	$_SESSION['is_login']=$is_login;
	$ob=new UserInfo_Model();
	$ob->updateData($_SESSION['login_userid'],$data);

	$msg='<span class="green">安全唯一登陆设置成功！</span>';
	$url='userSafe.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}

if($action=='saveQuestion'){
	
    $safepwd=_P('safepwdforqa');
	$question=_P('question');
	$custom_question=_P('custom_question');
	$answer=_P('answer');

	$question=$question=='custom' ? $custom_question : $question;
	$answer=$question=='' ? '' : $answer;
	if($safepwd=='' || strlen($safepwd)<6 || strlen($safepwd)>20){
	    Redirect('?edit_err=true');
	}
	//check oldpassword
	$ob=new UserInfo_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data['safekey']!=md5(md5($safepwd))){
	    Redirect('?edit_err_1=true');
	}
	$data=array(
		'question'=>$question,
		'answer'=>$answer,
	);

	$ob=new UserInfo_Model();
	$ob->updateData($_SESSION['login_userid'],$data);

	$msg='<span class="green">安全问题设置保存成功！</span>';
	$url='userSafe.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}

if($action=='saveissafe'){
	
    $safepwd=_P('safepwdforissafe');
    $is_safe=_P('is_safe','int');
	if($safepwd=='' || strlen($safepwd)<6 || strlen($safepwd)>20){
	    Redirect('?edit_err=true');
	}
	//check oldpassword
	$ob=new UserInfo_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data['safekey']!=md5(md5($safepwd))){
	    Redirect('?edit_err_1=true');
	}
	$data=array(
		'is_safe'=>$is_safe,
	);
	$_SESSION['is_safe']=$is_safe;
	$_SESSION['login_user_safe_key']=$is_safe==2 ? true : false;
	$ob=new UserInfo_Model();
	$ob->updateData($_SESSION['login_userid'],$data);

	$msg='<span class="green">安全密码设置保存成功！</span>';
	$url='userSafe.php';

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
	View::Output();
}

if($action=='verifyCode'){
	$t=_G('t','int');
	$wyt=_G('wyt','int');	
	require View::getView('safepwd');
	View::Output();
}

if($action=='checksafe'){
    $safepwd=_G('safepwd');
	if($safepwd==''){
	    echo '请填写安全密码！';
		exit;
	}
	$ob=new UserInfo_Model();
	$data=$ob->getOneData($_SESSION['login_userid']);
	if($data){
	    if($data['safekey']==md5(md5($safepwd))){
		    $_SESSION['login_user_safe_key']=true;
			echo 'ok';
			exit;
		} else {
		    echo '安全密码错误！';
			exit;
		}
	} else {
	    echo '意外错误，请稍候重试！';
		exit;
	}
}

if($action=='createPwdCard'){
    if(!$_SESSION['pwcardsn']){
		$im=imagecreatefromjpeg('default/images/pwcardbg.jpg');
		//生成序列号
		$sn1=rand(100,999);
		$sn2=rand(100,999);
		$sn3=rand(100,999);
		$sn4=rand(1,9);
		$cardno='序列号：10 000 000 '.$sn1.' '.$sn2.' '.$sn3.' '.$sn4;
		$pwcardsn=$sn1.$sn2.$sn3.$sn4;
		$black=imagecolorallocate($im,0,0,0);
		$x=$colx=25;
		$y=$rowy=20;
		imagefttext($im,10,0,$x,$y,$black,'default/images/msyh.ttf',$cardno);
		$cardcol=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$arrRand=array_rand($cardcol,10);
		//col
		$allColName=array();
		for($i=0;$i<10;$i++){
			$colx+=$i==0 ? 20 : 35;
			$colname=$cardcol[$arrRand[$i]];
			$allColName[]=$colname;
			imagefttext($im,10,0,$colx,40,$black,'default/images/tahoma.ttf',$colname);
		}
		//row
		for($i=1;$i<=8;$i++){
			$rowy+=$i==1 ? 40 : 25;
			imagefttext($im,10,0,$x,$rowy,$black,'default/images/tahoma.ttf',$i);
		}
		//sn
		$x=40;
		$numList=array();
		for($i=0;$i<10;$i++){
			$y=60;
			for($j=1;$j<=8;$j++){
				$colname=$cardcol[$arrRand[$i]];
				$num=rand(100,999);
				$numList[$colname.$j]=$num;
				imagefttext($im,10,0,$x,$y,$black,'default/images/tahoma.ttf',$num);
				$y+=25;
			}
			$x+=35;
		}

		//save
		$_SESSION['pwcardsn']=$pwcardsn;
		$_SESSION['is_pwcard']=2;
		$ob=new UserInfo_Model();
		$pwCardCol=implode(',',$allColName);
		$ob->updateData($_SESSION['login_userid'],array('sn'=>$pwcardsn,'is_pwcard'=>2,'pwCardCol'=>$pwCardCol));
		$db=Mysql::getInstance();
		foreach($numList as $key=>$val){
		   $db->query("INSERT INTO ".DB_PREFIX."pwcard(ck,cv,sn) VALUES('$key',$val,$pwcardsn)");
		}

		$filename=SITENAME.'-'.$cardno.'.jpg';
		$filename=mb_convert_encoding($filename,'gbk','utf-8');
		imagejpeg($im,'./userpwdcards/'.$filename,100);
		imagedestroy($im);

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.$filename . '"');
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize('./userpwdcards/'.$filename));
		ob_clean();
		flush();
		readfile('./userpwdcards/'.$filename);
		//rename('./'.$filename, './userpwdcards/'.$filename);
		exit;
	} else {
	    Redirect('userSafe.php');
	}
}
?>