// JavaScript Document

$(function(){
	var num=0;
	$(".banner img").css("display","none");
	$(".banner img").first().css("display","block");
	var lengthImg=$(".banner img").length;
//按钮添加
	for(var i=0;i<lengthImg;i++){
		$(".btn ul").append("<li></li>");
	}
	$(".btn ul li").first().addClass("current");
//游戏图片自动切换
	function fadeIn(){
		if(num<lengthImg-1){
			num=num+1;
		}else{
			num=0;
		}
		$(".banner img").css("display","none");
		$(".banner img").eq(num).fadeIn(0);
//按钮自动切换
		$(".btn ul li").removeClass("current");
		$(".btn ul li").eq(num).addClass("current");
	}
	var startToggle=setInterval(fadeIn,8000);
//按钮点击切换
	$(".btn ul li").mouseenter(function(){
		clearInterval(startToggle);
	}).mouseleave(function(){
		startToggle=setInterval(fadeIn,8000);
	})
	$(".btn ul li").click(function(){
		var x=$(this).index();
		$(".btn ul li").removeClass("current");
		$(this).addClass("current");
		$(".banner img").css("display","none");
		$(".banner img").eq(x).fadeIn(0);
		num=x;
	})
//导航效果
	$(".nav").mouseenter(function(){
		$(".header_nav").css("background-color","#000000");
	}).mouseleave(function(){
		$(".header_nav").css("background","none");
	})
	
	
	
	
//下载按钮交互
	$("#Andriod dt a").mouseenter(function(){
		$(".code").css("right","460px");
		$("#code_android").css("display","block");
	}).mouseleave(function(){
		$("#code_android").css("display","none");
	})
	$("#iPhone dt a").mouseenter(function(){
		$(".code").css("right","340px");
		$("#code_iphone").css("display","block");
	}).mouseleave(function(){
		$("#code_iphone").css("display","none");
	})
	$("#iPad dt a").mouseenter(function(){
		$(".code").css("right","220px");
		$("#code_ipad").css("display","block");
	}).mouseleave(function(){
		$("#code_ipad").css("display","none");
	})

})