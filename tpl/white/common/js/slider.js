var MYAPP=MYAPP||{};(function(C,B){var A={total_page:0,current_page:0,change_id:0,elements:null,buttons:null,showPageContent:function(){var D=this.elements.find(".current");D.parent().css("zIndex","11");D.fadeIn(350);},hidePageContent:function(){var D=this.elements.find(".current");D.parent().css("zIndex","10");D.fadeOut(350);},changePage:function(){this.elements.find(".slider-bg").removeClass("current");this.elements.children(":nth-child("+this.current_page+")").children().addClass("current");this.buttons.children("a").removeClass("active");this.buttons.children("a:nth-child("+this.current_page+")").addClass("active");},toNextPage:function(){if(this.current_page===this.total_page){this.current_page=1;}else{this.current_page++;}this.changePage();},toASpecificPage:function(D){this.hidePageContent();this.current_page=D;this.changePage();this.showPageContent();},bindChangeButton:function(){var D=this;this.buttons.delegate("a","click",function(){var E=C(this);var F=E.index()+1;D.toASpecificPage(F);clearInterval(D.change_id);D.change_id=setInterval(function(){D.setTimer();},8000);});},setTimer:function(){this.hidePageContent(this.current_page);this.toNextPage();this.showPageContent(this.current_page);},init:function(D,F){var E=this;this.elements=D;this.buttons=F;this.total_page=D.find("li").length;this.current_page=1;this.bindChangeButton();this.showPageContent(this.current_page);this.change_id=setInterval(function(){E.setTimer();},8000);}};C(document).ready(function(){A.init(C("#slider"),C("#slider-number-box"));});})(jQuery,MYAPP);
