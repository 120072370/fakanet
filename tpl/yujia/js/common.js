$(function(){
   
  
   // 轮播
   $(".slider").slide({mainCell:".bd ul",autoPage:0,effect:"fold",autoPlay:true});
  
   $.defauleVal = function(obj){
    	obj.each(function(){
    		var txt = $(this).val();
	    	$(this).focus(function(){
	    		if($(this).val() == txt ){
	    			$(this).val('').addClass('c2')
	    		}
	    	}).blur(function(){
	    		if($(this).val() == '' ){
	    			$(this).val(txt).removeClass('c2');
	    		}
	    	})
    	})
    	
    }
    $.defauleVal($('.txts'))
    
   
   
  
     
});





















