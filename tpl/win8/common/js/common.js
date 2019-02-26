var msg1="请输入正确的商户订单号！";
jQuery(document).ready(
	function(){
		$('.menu a,#slides a,ul.m-nav a,input[type="button"],input[type="submit"],input[type="image"],a.jqTransformSelectOpen,.m-note a').bind('focus',function(){if(this.blur){this.blur();};});
		$('a[rel*=target],.hezuo ul li a,.foot-info a').attr('target', '_blank');
		if($('.login-c').length>0) {
		  if($('.login-c input:eq(0)').val().length>0) {
			        jQuery('.login-c input:eq(0)').css({color:"#333"});
					jQuery("#nametxt").css({display:"none"});
          }
          if($('.login-c input:eq(1)').val().length>0) {
			        jQuery('.login-c input:eq(1)').css({color:"#333"});
					jQuery("#passtxt").css({display:"none"});
          }
		  if($('.login-c input:eq(2)').val().length>0) {
			        jQuery('.login-c input:eq(2)').css({color:"#333"});
					jQuery("#codetxt").css({display:"none"});
          }
		}
		$('.tipsb_c:eq(0)').fadeIn(200);
        $("#question a").click(function() {
            $('.tipsb_c').fadeOut(200);
            var p = $(this).parent().next().fadeIn(600);
        });

		$("#nametxt").click(function(){$("#nametxt").css({display:"none"});document.aspnetForm.loginName.focus();});
		$("#passtxt").click(function(){$("#passtxt").css({display:"none"});document.aspnetForm.loginPass.focus();});
		$("#codetxt").click(function(){$("#codetxt").css({display:"none"});document.aspnetForm.checkCode.focus();});
		$("#rnametxt").click(function(){$("#rnametxt").css({display:"none"});document.reg.login_name.focus();});
		$("#rpasstxt").click(function(){$("#rpasstxt").css({display:"none"});document.reg.passwd1.focus();});
		$("#rpass2txt").click(function(){$("#rpass2txt").css({display:"none"});document.reg.passwd2.focus();});
		$("#rlianxitxt").click(function(){$("#rlianxitxt").css({display:"none"});document.reg.full_name.focus();});
		$("#rqqtxt").click(function(){$("#rqqtxt").css({display:"none"});document.reg.qq.focus();});
		$("#rmailtxt").click(function(){$("#rmailtxt").css({display:"none"});document.reg.email.focus();});
		//$(".submit").click(function(){if($("#ddh").val().length<8){alert(msg1);return false;}});    
		$('#ddh').bind('onkeydown',function(){if($(this).val().length<18){alert(msg1);return false;
}});    
		jQuery('.searchbox .input').focus(
			function() {
				if(jQuery(this).val() == '输入订单号') {
					jQuery(this).css({color:"#555"}).val('');
				}
			}
		).blur(
			function(){
				if(jQuery(this).val() == '') {
					jQuery(this).css({color:"#999"}).val('输入订单号');
				}
			}
		);
		jQuery('.login-c input:eq(0)').focus(
			function() {
				if(jQuery(this).val().length<1) {
					jQuery(this).css({color:"#333"});
					jQuery("#nametxt").css({display:"none"});
				}
			}
		).blur(
			function(){
				if(jQuery(this).val().length<1) {
					jQuery("#nametxt").css({display:"block"});
				}
			}
		);
		jQuery('.login-c input:eq(1)').focus(
			function() {
				if(jQuery(this).val().length<1) {
					jQuery(this).css({color:"#333"});
					jQuery("#passtxt").css({display:"none"});
				}
			}
		).blur(
			function(){
				if(jQuery(this).val().length<1) {
					jQuery("#passtxt").css({display:"block"});
				}
			}
		);
		jQuery('.login-c input:eq(2)').focus(
			function() {
				if(jQuery(this).val().length<1) {
					jQuery(this).css({color:"#333"});
					jQuery("#codetxt").css({display:"none"});
				}
			}
		).blur(
			function(){
				if(jQuery(this).val().length<1) {
					jQuery("#codetxt").css({display:"block"});
				}
			}
		);
		jQuery('.reg-form input:eq(0)').focus(
			function() {
				if(jQuery(this).val().length<1) {
					jQuery(this).css({color:"#333"});
					jQuery("#rnametxt").css({display:"none"});
				}
			}
		).blur(
			function(){
				if(jQuery(this).val().length<1) {
					jQuery("#rnametxt").css({display:"block"});
				}
			}
		);
		jQuery('.reg-form input:eq(1)').focus(
			function() {
				if(jQuery(this).val().length<1) {
					jQuery(this).css({color:"#333"});
					jQuery("#rpasstxt").css({display:"none"});
				}
			}
		).blur(
			function(){
				if(jQuery(this).val().length<1) {
					jQuery("#rpasstxt").css({display:"block"});
				}
			}
		);
		jQuery('.reg-form input:eq(2)').focus(
			function() {
				if(jQuery(this).val().length<1) {
					jQuery(this).css({color:"#333"});
					jQuery("#rpass2txt").css({display:"none"});
				}
			}
		).blur(
			function(){
				if(jQuery(this).val().length<1) {
					jQuery("#rpass2txt").css({display:"block"});
				}
			}
		);
		jQuery('.reg-form input:eq(3)').focus(
			function() {
				if(jQuery(this).val().length<1) {
					jQuery(this).css({color:"#333"});
					jQuery("#rlianxitxt").css({display:"none"});
				}
			}
		).blur(
			function(){
				if(jQuery(this).val().length<1) {
					jQuery("#rlianxitxt").css({display:"block"});
				}
			}
		);
		jQuery('.reg-form input:eq(4)').focus(
			function() {
				if(jQuery(this).val().length<1) {
					jQuery(this).css({color:"#333"});
					jQuery("#rqqtxt").css({display:"none"});
				}
			}
		).blur(
			function(){
				if(jQuery(this).val().length<1) {
					jQuery("#rqqtxt").css({display:"block"});
				}
			}
		);
		jQuery('.reg-form input:eq(5)').focus(
			function() {
				if(jQuery(this).val().length<1) {
					jQuery(this).css({color:"#333"});
					jQuery("#rmailtxt").css({display:"none"});
				}
			}
		).blur(
			function(){
				if(jQuery(this).val().length<1) {
					jQuery("#rmailtxt").css({display:"block"});
				}
			}
		);
		$("a#topclose").click( function(){$('#topnote').fadeOut();$.get("?writein=close");});
		$("a#apidown").click( function(){$.get("?writein=log");});
		xOffset = 0;
	    yOffset = 39;			
	    $(".Btips").bind('mouseover',function(e){										  
		this.t = this.title;
		this.title = "";
		var ll=$(this).offset().left;
		var tt=$(this).offset().top;
		$("body").append("<div id='tooltip'><p id='tipbox'><a class='tipimg'></a>"+ this.t +"</p></div>");
		$("#tooltip")
			.css("top",(tt+yOffset) + "px")
			.css("left",(ll-xOffset) + "px")
			.fadeIn("fast");		
        }),
	    $(".Btips").bind('mouseout',function(){
		this.title = this.t;		
		$("#tooltip").remove();
        });	
		}
)

$(function(){
    $.post('getData.php',{t:new Date().getTime()},function(data){
	    if(data){
		    arr=data.split(',');
			$('#cachewrap1').text(arr[0]);
			$('#cachewrap2').text(arr[1]);
			$('#cachewrap3').text(arr[2]);
		}
	})
})