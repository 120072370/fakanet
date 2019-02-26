$(document).ready(function(){
	$("#disp_one").click(function (){
		 $("#disp_one").css({"backgroundImage":"url(pub_images/help_menu.png)","color":"#ffffff","height":"50px","width":"100px;","border":"0"});
		 $("#disp_two").css({"backgroundImage":"none","color":"#222222","height":"42px","width":"102px;","border":"1px solid #dfdfdf"});
	     $("#disp_new_two").css("display","none");
		 
	     $("#disp_new_one").css("display","block");
	    }
	);
	$("#disp_two").click(function (){
		 $("#disp_two").css({"backgroundImage":"url(pub_images/help_menu.png)","color":"#ffffff","height":"50px","width":"100px;","border":"0"});
		 $("#disp_one").css({"backgroundImage":"none","color":"#222222","height":"42px","width":"102px;","border":"1px solid #dfdfdf"});
	     $("#disp_new_one").css("display","none");
	     $("#disp_new_two").css("display","block");
	    }
	);
}); 