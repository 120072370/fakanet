//YI TU NETWORK STUDIO 
$(document).ready(function(){
	var u1="about.htm",u2="course.htm",u3="qiye.htm",u4="useful.htm",u5="statement.htm",u6="goumai.htm";
	var p1="contact.htm", p2="recruitment.htm";
//关于我们
	$("#wevs li").each(function(index){
		$(this).click(function(){
 			switch (index){
				case 0:window.location.href=u1;break;
				case 1:window.location.href=u2;break;
				case 2:window.location.href=u3;break;
				case 3:window.location.href=u4;break;
				case 4:window.location.href=u5;break;
				case 5:window.location.href=u6;break;
			} 
    });
	$(this).mouseover(function(){$(this).css({"background-color":"#37b3f9","color":"#ffffff","cursor":"pointer"});});
	$(this).mouseout( function(){$(this).css({"background-color":"#ffffff","color":"#666666"});});	
    });
//人才招聘
	$("#person li").each(function(index){
		$(this).click(function(){
 			switch (index){
				case 0:window.location.href=p1;break;
				case 1:window.location.href=p2;break;
			} 
    });
	$(this).mouseover(function(){$(this).css({"background-color":"#37b3f9","color":"#ffffff","cursor":"pointer"});});
	$(this).mouseout( function(){$(this).css({"background-color":"#ffffff","color":"#666666"});});	
    });
//
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});