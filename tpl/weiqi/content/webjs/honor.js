// JavaScript Document
	var num = 0;
	var aLen = $(".companyHonorlist li").length;
	var oLi = $(".companyHonorlist li");
	var divWidth = $('.companyHonorlist').width();
	var liWidth = $('.companyHonorlist li').width();

	$('.companyHonorlist ul').css('width',liWidth*aLen);
	$('.companyHonorlist ul li:eq(0)').addClass('cur');
	$('.companyHonorScroll').find('.bd:first').show();

	oLi.each(function(index,element){
		oLi.click(function(){
			var num = $(this).index();
			$('.companyHonorScroll .bd').eq(num).show().siblings(".bd").hide();
			$('.companyHonorScroll .bd').eq(num).find("ul").css({"left":"0"});
            oLi.eq(num).addClass("cur").siblings().removeClass("cur");
		})
	})
	 $('.companyHonorlist-prev').click(function(e){
        if(!$(this).hasClass('active')){
            var that = $(this);
            $(this).addClass('active');
            var index = $(".companyHonor").find('.cur').index();
            if (index == 0){
                 $(this).removeClass('active');
                 return false;
            } 
            $(".companyHonor").find('.cur').removeClass('cur').prev().addClass('cur');
            $('.companyHonorScroll .bd').eq(index-1).show().siblings(".bd").hide();
			$('.companyHonorScroll .bd').eq(index-1).find("ul").css({"left":"0"});
            var left = parseInt($('.companyHonorlist ul').css('left'));
            if(liWidth+left>0){
                $(this).removeClass('active');
                 return false;
            }
            $('.companyHonorlist ul').animate({'left':left+liWidth},300,function(){
                that.removeClass('active');
				console.log(1)
            });
        }
    });
	$('.companyHonorlist-next').click(function(e){
        if(!$(this).hasClass('active')){
            var that = $(this);
            $(this).addClass('active');
            var index = $(".companyHonor").find('.cur').index();
            if (index == aLen-1){
                $(this).removeClass('active');
                 return false;
            }
            $(".companyHonor").find('.cur').removeClass('cur').next().addClass('cur');
            $('.companyHonorScroll .bd').eq(index+1).show().siblings(".bd").hide();
			$('.companyHonorScroll .bd').eq(index+1).find("ul").css({"left":"0"});
            var left = parseInt($('.companyHonorlist ul').css('left'));
            if(liWidth-left>(aLen-3)*liWidth){
                $(this).removeClass('active');
                 return false;
            }
            $('.companyHonorlist ul').animate({'left':left-liWidth},300,function(){
                that.removeClass('active');
				console.log(2)
            });
        }
    });