var browser = {
    versions: function () {
        var u = navigator.userAgent, app = navigator.appVersion;
        return {//移动终端浏览器版本信息   
            trident: u.indexOf('Trident') > -1, //IE内核  
            presto: u.indexOf('Presto') > -1, //opera内核  
            webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核  
            gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核  
            mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端  
            ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端  
            android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器  
            iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器  
            iPad: u.indexOf('iPad') > -1, //是否iPad    
            webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部  
        };
    }(),
    language: (navigator.browserLanguage || navigator.language).toLowerCase()
}
if (browser.versions.mobile || browser.versions.ios || browser.versions.android || browser.versions.iPhone || browser.versions.iPad) {
    window.location = "/m/index.html";
}

$(function () {
    //搜索
    $("#topSearch").submit(function () {
        var keywords = $(":input[name=searchtext]").val();
        if (keywords == "" || keywords == "请输入搜索关键字") {
            return false;
        }
        window.location.href = "/search.html?searchtext=" + escape(keywords);
        return false;
    })
    //banner
    if ($(".banner ul li").length > 0) {
        if ($(".banner ul li").length < 2) {
            $(".banner .bannerPrev,.banner .bannerNext").hide();
        }
        $('.banner ul').cycle({
            fx: 'fade',
            speed: 800,
            prev: '.banner .bannerPrev',
            next: '.banner .bannerNext',
        })
    }

    $("input[type=text]").each(function () {
        var _this = $(this);
        var input_val = _this.val();
        $(_this).focus(function () {
            var fo_val = $(this).val();
            if (fo_val == input_val) {
                $(this).val("");
            }
        });
        $(_this).blur(function () {
            var bl_val = $(this).val();
            if (bl_val == "") {
                $(this).val(input_val);
            }
        });
    });

    $('.search span').click(function () {
        $('.searchBox').toggle();
    });

    $('.searchBox').mouseleave(function () {
        $(this).hide();
    });


    $('.guige').click(function () {
        var index = $(this).index();
        $('.guige0').hide().eq(index).show();
        $(this).addClass('cur').siblings().siblings().siblings();
    })

    //关于我们滚动
    var lilength = $(".wwmemberdiv ul li").length;
    var ulwidth = $(".wwmemberdiv ul").width(lilength * $(".wwmemberdiv ul li").outerWidth());
    var liwidth = $(".wwmemberdiv ul li").outerWidth();
    var linum = 0;

    $(".wwmemberdiv ul li a").each(function (index, element) {
        if ($(this).hasClass("cur")) {
            thisin = $(this).parent().index() + 1;
            less = thisin - 7;
            if (thisin > 7) {
                if ($(".wwmemberdiv ul").is(":animated")) return false;
                $(".wwmemberdiv ul").css({ "left": -(less * liwidth) })
            }
        }
    });

    $(".wwmembercosle .wwmemberright").click(function () {
        if ($(".wwmemberdiv ul").is(":animated")) return false;
        if (lilength - linum <= 7) return false;
        var aboutleft = $(".wwmemberdiv ul").position().left;
        if (aboutleft == -((lilength - 7) * liwidth)) return false;
        console.log(aboutleft)
        linum++;
        $(".wwmemberdiv ul").stop(true, true).animate({ left: aboutleft - liwidth }, 300);
    })
    $(".wwmembercosle .wwmemberleft").click(function () {
        if ($(".wwmemberdiv ul").is(":animated")) return false;
        var aboutleft = $(".wwmemberdiv ul").position().left;
        if (aboutleft == 0) return false;
        linum--;
        $(".wwmemberdiv ul").stop(true, true).animate({ left: aboutleft + liwidth }, 300);
    })

    if ($(".development ul.slide li").length > 0) {
        $('.development ul.slide').cycle({
            fx: 'fade',
            speed: 800,
            prev: '#prev',
            next: '#next',
            timeout: false
        })
    }

    //首页
    $(".InBusinessList01 ul li:last").css("margin-right","0")
    $(".InBusinessconBtn a").click(function () {
        var index = $(this).index();
        $(this).addClass("cur").siblings().removeClass("cur");
        $(".InBusinessconSwitch").eq(index).show().siblings(".InBusinessconSwitch").hide();
        if (index == 1) {
            $(".InBusinessList02 ul").width($(".InBusinessList02 ul li").length * $(".InBusinessList02 ul li").outerWidth());
        }
        if ($(".InBusinessList02 ul li").length < 13) {
            $(".InBusinessPrev,.InBusinessNext").hide();
        }
    })

    $(".InBusinessPrev").click(function () {
        if ($(this).siblings("ul").is(":animated") || $(this).siblings("ul").position().left == 0) return false;
        $(this).siblings("ul").stop(true, true).animate({ left: 0 }, 300)
    })
    $(".InBusinessNext").click(function () {
        if ($(this).siblings("ul").is(":animated") || $(this).siblings("ul").position().left == -727) return false;
        $(this).siblings("ul").stop(true, true).animate({ left: -727 }, 300)
    })

    $(".InVendorsList ul").width($(".InVendorsList ul li").length / 2 * $(".InVendorsList ul li").outerWidth())
    var clinum = 0;
    $(".InVendorsListPrev").click(function () {
        if ($(".InVendorsList ul").is(":animated")) return false;
        if (clinum == 0) return false;
        clinum--;
        var Aleft = $(".InVendorsListCon ul").position().left;
        $(".InVendorsListCon ul").stop(true, true).animate({ left: Aleft + 224 * 5 })
    })
    $(".InVendorsListNext").click(function () {
        if ($(".InVendorsList ul").is(":animated")) return false;
        if (clinum == ($(".InVendorsList ul li").length - 10) / 10) return false;
        clinum++;
        var Aleft = $(".InVendorsListCon ul").position().left;
        $(".InVendorsListCon ul").stop(true, true).animate({ left: Aleft - 224 * 5 })
    })
    $(".zcityycont:first").show();
    $(".zcityycont").each(function (i) {
        var thisid = $(this);
        $(this).find(".zcityscrollcont").attr("id", "Scroll" + i);
        $(this).find(".zcitylistcont").attr("id", "ScroLeft" + i);
        $(this).find(".zcityscrollline").attr("id", "ScroRight" + i);
        $(this).find(".zcityscrollline span").attr("id", "ScroLine" + i);
        new Slider(getS("Scroll" + i), getS("ScroLine" + i), getS("ScroRight" + i), { topvalue: 500, bottomvalue: -500 });
    });
    $(".citybtn a").click(function () {
        var thisrel = $(this).attr("rel");
        var hiderel;
        $(".zcityycont").each(function () {
            hiderel = $(this).attr("rel");
            if (thisrel == hiderel) {
                $(this).fadeIn(300);
            }
            else {
                $(this).fadeOut(300);
            };
        });
        $(".zcityycont").each(function (i) {
            var thisid = $(this);
            $(this).find(".zcityscrollcont").attr("id", "Scroll" + i);
            $(this).find(".zcitylistcont").attr("id", "ScroLeft" + i);
            $(this).find(".zcityscrollline").attr("id", "ScroRight" + i);
            $(this).find(".zcityscrollline span").attr("id", "ScroLine" + i);
            new Slider(getS("Scroll" + i), getS("ScroLine" + i), getS("ScroRight" + i), { topvalue: 500, bottomvalue: -500 });
        });
    });

    $(".closecitycont").click(function () {
        $(this).parent(".zcityycont").fadeOut(300);
    });
	
	$(".select dt p").click(function () {
		$(".select dd").stop().slideToggle(200);
	});
	$('.select dd p a').click(function () {
		$(".select dt p").html($(this).text());
		$(".select dd").stop().slideUp(200);
	});
	$('.selectdiv').mouseleave(function(){
		$(".selectdiv dd").slideUp(200);	
	})
	
	
	//----------------首页滚屏更新1101
	//if ($(".page_init").length > 0) {
	//    $(document).ready(function (e) {
	//        var flag = true;
	//        var offset_arr = new Array();
	//        $(".page_init").each(function (index, element) {
	//            offset_arr.push($(this).offset().top);
	//        });
	//        var now_index = 0;
	//        $(window).mousewheel(function (event, delta) {
	//            if (flag) {
	//                if (delta > 0) {	//shang
	//                    if (now_index >= 0) {
	//                        flag = false;
	//                        now_index = now_index - 1 < 0 ? 0 : now_index - 1;
	//                        $("body").animate({ scrollTop: offset_arr[now_index] + "px" }, 1000, function () {
	//                            flag = true;
	//                        });
	//                    }
	//                }
	//                else if (delta < 0) { 	//xia
	//                    if (now_index < offset_arr.length) {
	//                        flag = false;
	//                        now_index = now_index + 1 > offset_arr.length - 1 ? offset_arr.length - 1 : now_index + 1;
	//                        $("body").animate({ scrollTop: offset_arr[now_index] + "px" }, 1000, function () {
	//                            flag = true;
	//                        });
	//                    }
	//                }
	//            }
	//            return false;
	//        });
	//        //拿到当前所在区域屏幕数
	//        function GetNumOfScreenNow() {
	//            var now_scrolltop = $(window).scrollTop();
	//            for (var i = 0; i < offset_arr.length; i++) {
	//                if (offset_arr[i] > now_scrolltop) {
	//                    now_index = i - 1;
	//                    break;
	//                }
	//            }
	//        }
	//        GetNumOfScreenNow();
	//        $(window).scroll(function () {
	//            GetNumOfScreenNow();
	//        });
	//    });
	//}
	//--------------------数字
	if($(".Line").length > 0){
	var bolExec=false;
	$(window).scroll(function(){

	var winheight = $(window).height()/1.1;
	var Current = $(".Line").offset().top;

		if($(document).scrollTop()>Current/1.3&&bolExec==false){
			
			var line=$(".Line"),len=line.length;
			line.each(function(index, element) {
                var t=$.trim($(this).text()).replace(" ","").length;
				var text="";
						for(var j = 0; j < t; j++)
							text+=0;
						$(this).text(text);
            });
			
			function Animate(i){
				if(i<len){
					var _this=line.eq(i), a=0, v=_this.attr("rel")-0,_time=100,vLen=(v+"").length;
					var t=setInterval(function(){
						a+=1;
						var pi = parseInt(v/100*a);
						var text="";
						for(var j = 0; j < vLen - (pi + "").length; j++)
							text+=0;
						_this.text(text+pi);
						if(a == _time / 2)
							Animate(i+1);
						if(a>=_time)
							clearInterval(t);
					},1);
				}
			}
			Animate(0);
			
			bolExec=true;
		}
	
	})	
	}
	
	
	
});



