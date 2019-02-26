$(function(){
	$('.p2, .p3').hide();
	$('#agree').click(function(){
		if($(this).is(':checked')){
			$('#regbtn').attr('disabled',false);
		} else {
			$('#regbtn').attr('disabled',true);
		}
	});
	
	$('#newusername').keyup(function(){
		var username=$(this).val();
		if(username==''){
			alert('请填写要注册的用户名!');
			return false;
		}
		
		$.get('/register/checkuser.htm',{newusername:username},function(data){
			if(data=='1'){
				alert(username+' 用户名已存在，请重新填写！');
				return false
			}
		});
	});
})

function selectType(){
	$('.ptype').hide();
	var tid=$('#ptype').val();
	$('.p'+tid).show();
}


function getgoods(orderid){
	$.getJSON('/checkgoods.htm',{orderid:orderid,t:new Date().getTime()},function(data){			
		if(data){
			$('#cardinfo').html(data.msg);
			if(data.status == 1){
				$('#tips').html('(已发货/购买数：<font color="red">' + data.quantity + '</font>/' + data.quantity + ')');						
			}
		}
	});
}

function checkForm(){
 var pwd=$.trim($('[name=pwd]').val());
 var reg=/^([0-9a-zA-Z]+){6,20}$/;
 if(pwd=='' || !reg.test(pwd)){
     $('[name=pwd]').focus();
	 alert('请填写查询密码！长度为6-20个数字、字母或组合！');
	 return false;
 }
}