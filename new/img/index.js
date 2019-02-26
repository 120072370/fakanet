// JavaScript Document

$(function(){
	var num=0;
//顶部导航交互
	$(".nav ul li a").mouseenter(function(){
		$(".nav ul li").removeClass("active");
		$(this).parent("li").addClass("active");
	})
//充值选择切换
	//$(".card").hide();
	//$(".card").first().show();
	//$(".card_info").hide();
	$(".choose_charge ul li a").click(function(){
		$(".choose_charge ul li").removeClass("active");
		$(this).parent("li").addClass("active");
		var id = $(this).parent("li").find('input').attr('id');
		$('#' + id).attr("checked", "checked");
		num=$(this).parent("li").index();
		$(".card").hide();
		$(".card").eq(num).show();
		if(num==1){
			$(".card_info").show();
		}else if(num==0){
			$(".card_info").hide();
		}
	})
})