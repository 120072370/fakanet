<?php
require_once 'common.php';
$action=_G('action');

if($action==''){
	if(!$_SESSION['login_user_safe_key']){
		$t='1';
		$wyt='';
	    $url=_S('HTTP_REFERER');
		require View::getView('header');
		require View::getView('safepwd');
		require View::getView('footer');
		View::Output();
		exit;
	}
	$goodid=_G('goodid','int');
	$title="添加卡密";
	$good=new GoodList_Model();
	$goodList=$good->getAllData($_SESSION['login_userid']);
    require View::getView('header');
	require View::getView('goods');
	require View::getView('footer');
	View::Output();
}

if($action=='add'){
	if(!$_SESSION['login_user_safe_key']){
		$t='1';
		$wyt='';
	    $url=_S('HTTP_REFERER');
		require View::getView('header');
		require View::getView('safepwd');
		require View::getView('footer');
		View::Output();
		exit;
	}
    $goodid=_P('goodid','int');
	if(GoodList_Model::getUserIDbyGoodID($goodid)!=$_SESSION['login_userid']){
	    Redirect('?add_err=true');
	}
	$msg='';
	$importfrom=_P('importfrom','int');
	$is_check_repeat=_P('is_check_repeat','int');
	$goods=array();
	if($importfrom==1){//通过txt文件上传
	    $file=$_FILES['f'];
		$file_type=$file['type'];
		if($file_type<>'text/plain'){
		    $msg='仅支持TXT格式的文件上传';
		}
		
		$file_size=$file['size'];
		if($file_size<=0 || $file_size>100000){
		    $msg='上传的文件最大支持100KB';
		}
		
		$file_error=$file['error'];
		$file_tmp=$file['tmp_name'];
		if($file_error<>0){
		    $msg='上传出现意外错误，请稍候重试...';
		}
		
		$goods=file($file_tmp);
		if(count($goods)==0 || count($goods)>4000){
		    $msg='文本导入卡密最多500张(500行)';
		}

	} else if($importfrom=2){//读取文本区域信息
		$content=_P('content');
		$goods=$content ? explode("\r\n",$content) : array();
		if(count($goods)==0 || count($goods)>4000){
		    $msg='输入框添加卡密最多500张(500行)';
		}
	}

    if($msg){
		$url='goods.php?goodid='.$goodid;
		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		exit;
	}

	//当前库存数量
	$ob=new Goods_Model();
	$allowQuantity=4000;
	$goodsInvent=$ob->getDataNum("WHERE goodid=$goodid AND is_state=0");	
	$importQuantity=count($goods);
	$totalQuantity=$goodsInvent+$importQuantity;
	$lastQuantity=$allowQuantity-$goodsInvent;
	$lastQuantity=$lastQuantity<0 ? 0 : $lastQuantity;

	if($totalQuantity>$allowQuantity){
		if($lastQuantity>0){
		    $msg='<span class="red">系统允许单个商品库存量('.$allowQuantity.')张,此商品还可以添加('.$lastQuantity.')张,请重新调整添加!</span>';
		} else {
		    $msg='<span class="red">当前商品库存量已超过系统允许库存量('.$allowQuantity.')张,无法继续添加!</span>';			
		}
		$url='goods.php?goodid='.$goodid;
		require View::getView('header');
		require View::getView('prompt');
		require View::getView('footer');
		exit;
	}

	//读取行数据
	$quantity=0;
	foreach($goods as $val){
		$trimval=trim($val);
		$nbsp='';
		//一行中间有多少空格，如果大于1个，则替换成一个空格
		if(substr_count($trimval," ")>1){
			for($i=1;$i<=substr_count($trimval," ");$i++){
				$nbsp .=" ";
		    }
			$trimval=str_replace($nbsp, ' ' , $trimval);
			$nbsp='';
		}
		if(strpos($trimval," ")){
			$arr_cards=explode(' ',$trimval);
			$cardnum=$arr_cards[0];
			$cardpwd=$arr_cards[1];
		} else {
			$cardnum=$trimval;
			$cardpwd='';
		}
		//保存商品信息
		if($cardnum!=''){
			$flag=false;
			if($is_check_repeat){
			    $cons="WHERE userid=".$_SESSION['login_userid']." AND goodid=".$goodid." AND cardnum='".$cardnum."'";
			    $cons=$cardpwd!='' ? $cons." AND cardpwd='".$cardpwd."'" : $cons;
				$flag=$ob->checkCards($cons);
			}

			if(!$flag){
		        $ob->addData(array('userid'=>$_SESSION['login_userid'],'goodid'=>$goodid,'cardnum'=>$cardnum,'cardpwd'=>$cardpwd,'addtime'=>date('Y-m-d H:i:s')));
				$quantity+=1;
			}
		}
    }
	
	if($importfrom==1){
		//给商户发送消息
		$goodname=GoodList_Model::getGoodnamebyGoodID($goodid);
		$title='商品【'.$goodname.'】的卡密导入成功';
		$content='您在'.date('Y-m-d H:i:s').'对商品【'.$goodname.'】提交的TXT文件上传卡密的任务已处理完成，成功导入'.$quantity.'张卡密。请对上传后的卡密进行核对，如有问题请与客服进行联系。';
		$data=array('from_user'=>1,'to_user'=>$_SESSION['login_userid'],'title'=>$title,'content'=>$content,'addtime'=>date('Y-m-d H:i:s'));
		$ob=new Message_Model();
		$ob->addData($data);
	    $msg='<span class="green">您的卡密导入任务已提交，您可以离开本页面，完成后见系统消息。</span>';
	} else {
	    $msg='<span class="green">共'.count($goods).'张卡密，成功添加'.$quantity.'张卡密！</span>';
	}

	//给管理员发送消息
	if($quantity>100){
		$goodname=GoodList_Model::getGoodnamebyGoodID($goodid);
		$title='商户【'.$_SESSION['login_username'].'】为【'.$goodname.'】添加了【'.$quantity.'】张卡密';
		$content='商户 '.$_SESSION['login_username'].' 在 '.date('Y-m-d H:i:s').' 为商品 '.$goodname.' 添加了 '.$quantity.' 张卡密！';
		$data=array('to_user'=>1,'from_user'=>$_SESSION['login_userid'],'title'=>$title,'content'=>$content,'addtime'=>date('Y-m-d H:i:s'));
		$ob=new Message_Model();
		$ob->addData($data);
	}

	$url='goodInvent.php?goodid='.$goodid;

	require View::getView('header');
	require View::getView('prompt');
	require View::getView('footer');
}
?>