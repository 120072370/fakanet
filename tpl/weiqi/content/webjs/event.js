var num = 0;
	var aLen = $(".growth-list li").length;
	var oLi = $(".growth-list li");
	var divWidth = $('.growth-list').width();
	var liWidth = $('.growth-list li').width();

	$('.growth-list ul').css('width',liWidth*aLen);
	$('.growth-list ul li:eq(0)').addClass('cur');
	$('.development').find('.growth-con:first').show();
	
	
	$('.growth-con').each(function() {
		
		
       $(this).find('dl:eq(0)').show().addClass('cur');; 
	   
    });

	oLi.each(function(){
		oLi.click(function(){
			var num = $(this).index();
			$('.growth-con').eq(num).show().siblings('.growth-con').hide();
            oLi.eq(num).addClass("cur").siblings().removeClass("cur");
		});
	});
	
	
	
		
	   $('.big-next').click(function(){
		   
		   var dllen = $(this).parent('.growth-con').find('dl').length; 
		   
				var index = $(this).parent('.growth-con').find('.cur').index();
				if (index == dllen-1){
					 return false;
				} 
				$(this).parent('.growth-con').find('dl.cur').removeClass('cur').next('dl').addClass('cur');
				$(this).parent('.growth-con').find('dl').hide().eq(index+1).show();
		});
	   
	    $('.big-prev').click(function(){
			
			
		   var dllen = $(this).parent('.growth-con').find('dl').length; 
				var index = $(this).parent('.growth-con').find('.cur').index();
				if (index == 0){
					 return false;
				} 
				$(this).parent('.growth-con').find('dl.cur').removeClass('cur').prev('dl').addClass('cur');
				$(this).parent('.growth-con').find('dl').hide().eq(index-1).show();
		});
	
	
	
    $('.small-prev').click(function(){
        if(!$(this).hasClass('active')){
            var that = $(this);
            $(this).addClass('active');
            var index = $(".growth-list").find('.cur').index();
            if (index == 0){
                 $(this).removeClass('active');
                 return false;
            } 
            $(".growth-list").find('.cur').removeClass('cur').prev().addClass('cur');
            $('.growth-con').eq(index-1).show().siblings('.growth-con').hide();
            var left = parseInt($('.growth-list ul').css('left'));
            if(liWidth+left>0){
                $(this).removeClass('active');
                 return false;
            }
            $('.growth-list ul').animate({'left':left+liWidth},300,function(){
                that.removeClass('active');
            });
        }
    });
    
    $('.samll-next').click(function(){
        if(!$(this).hasClass('active')){
            var that = $(this);
            $(this).addClass('active');
            var index = $(".growth-list").find('.cur').index();
            if (index == aLen-1){
                $(this).removeClass('active');
                 return false;
            }
            $(".growth-list").find('.cur').removeClass('cur').next().addClass('cur');
            $('.growth-con').eq(index+1).show().siblings('.growth-con').hide();
            var left = parseInt($('.growth-list ul').css('left'));
            if(liWidth-left>(aLen-3)*liWidth){
                $(this).removeClass('active');
                 return false;
            }
            $('.growth-list ul').animate({'left':left-liWidth},300,function(){
                that.removeClass('active');
            });
        }
    });