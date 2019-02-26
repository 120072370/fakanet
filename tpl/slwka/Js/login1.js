//首页TAB标签
function qiehuana(num){
		for(var id = 0;id<=15;id++)
		{
			if(id==num)
			{
				document.getElementById("qhcona"+id).style.display="block";
				document.getElementById("mynava"+id).className="nava_on";
			}
			else
			{
				document.getElementById("qhcona"+id).style.display="none";
				document.getElementById("mynava"+id).className="nava_off";
			}
		}
	}

	function qiehuanb(num){
		for(var id = 0;id<=15;id++)
		{
			if(id==num)
			{
				document.getElementById("qhconb"+id).style.display="block";
				document.getElementById("mynavb"+id).className="navb_on";
			}
			else
			{
				document.getElementById("qhconb"+id).style.display="none";
				document.getElementById("mynavb"+id).className="navb_off";
			}
		}
	}

	function qiehuanc(num){
		for(var id = 0;id<=15;id++)
		{
			if(id==num)
			{
				document.getElementById("qhconc"+id).style.display="block";
				document.getElementById("mynavc"+id).className="navc_on";
			}
			else
			{
				document.getElementById("qhconc"+id).style.display="none";
				document.getElementById("mynavc"+id).className="navc_off";
			}
		}
	}

	function qiehuand(num){
		for(var id = 0;id<=15;id++)
		{
			if(id==num)
			{
				document.getElementById("qhcond"+id).style.display="block";
				document.getElementById("mynavd"+id).className="navd_on";
			}
			else
			{
				document.getElementById("qhcond"+id).style.display="none";
				document.getElementById("mynavd"+id).className="navd_off";
			}
		}
	}


//首页焦点图
$(function() {
	var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
	var len = $("#focus ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;
	
	//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
	var btn = "<div class='btnBg'></div><div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	$("#focus").append(btn);
	$("#focus .btnBg").css("opacity",0);

	//为小按钮添加鼠标滑入事件，以显示相应的内容
	$("#focus .btn span").css("opacity",0.4).mouseenter(function() {
		index = $("#focus .btn span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseenter");

	//上一页、下一页按钮透明度处理
	$("#focus .preNext").css("opacity",0).hover(function() {
		$(this).stop(true,false).animate({"opacity":"0.5"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0"},300);
	});

	//上一页按钮
	$("#focus .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});

	//下一页按钮
	$("#focus .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
	$("#focus ul").css("width",sWidth * (len));
	
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$("#focus").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); //此4000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
		$("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
		//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
		$("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
	}
});

//首页网游交易手风琴
var show_king_id = 1;
function show_king_list(e,k)
{
    if(show_king_id == k) return true;
        o = document.getElementById("a"+show_king_id);
        o.className = "bg";
    e.className = " ";
    show_king_id = k;
}

//客服验证弹出层
var EX = {
		  addEvent:function(k,v){
		    var me = this;
		    if (me.addEventListener)
		      me.addEventListener(k, v, false);
		    else if(me.attachEvent)
		      me.attachEvent("on" + k, v);
		    else
		      me["on" + k] = v;
		  },
		  removeEvent:function(k,v){
		    var me = this;
		    if (me.removeEventListener)
		      me.removeEventListener(k, v, false);
		    else if (me.detachEvent)
		      me.detachEvent("on" + k, v);
		    else
		      me["on" + k] = null;
		  },
		  stop:function(evt){
		    evt = evt || window.event;
		    evt.stopPropagation?evt.stopPropagation():evt.cancelBubble=true;
		  }
		};

		var url = '#'; 
		function show_pop(){ 
		var o = document.getElementById('pop'); 
		o.style.display = ""; 
		setTimeout(function(){EX.addEvent.call(document,'click',hide_pop);});
		} 
		function hide_pop(){ 
		var o = document.getElementById('pop'); 
		o.style.display = "none"; 
		EX.removeEvent.call(document,'click',hide_pop);
		} 
		
//		document.getElementById('pop').onclick = EX.stop;
		$(document).ready(function(){
		
		
			$('.sidelist').mousemove(function(){
			$(this).find('.i-list_1').show();
			$(this).find('h3').addClass('hover_1');
			});
			$('.sidelist').mouseleave(function(){
			$(this).find('.i-list_1').hide();
			$(this).find('h3').removeClass('hover_1');
			});
			$('.sidelist').mousemove(function(){
			$(this).find('.i-list_2').show();
			$(this).find('h3').addClass('hover_2');
			});
			$('.sidelist').mouseleave(function(){
			$(this).find('.i-list_2').hide();
			$(this).find('h3').removeClass('hover_2');
			});
			$('.sidelist').mousemove(function(){
			$(this).find('.i-list_3').show();
			$(this).find('h3').addClass('hover_3');
			});
			$('.sidelist').mouseleave(function(){
			$(this).find('.i-list_3').hide();
			$(this).find('h3').removeClass('hover_3');
			});
			$('.sidelist').mousemove(function(){
			$(this).find('.i-list_4').show();
			$(this).find('h3').addClass('hover_4');
			});
			$('.sidelist').mouseleave(function(){
			$(this).find('.i-list_4').hide();
			$(this).find('h3').removeClass('hover_4');
			});
			$('.sidelist').mousemove(function(){
			$(this).find('.i-list_5').show();
			$(this).find('h3').addClass('hover_5');
			});
			$('.sidelist').mouseleave(function(){
			$(this).find('.i-list_5').hide();
			$(this).find('h3').removeClass('hover_5');
			});
			$('.sidelist').mousemove(function(){
			$(this).find('.i-list_6').show();
			$(this).find('h3').addClass('hover_6');
			});
			$('.sidelist').mouseleave(function(){
			$(this).find('.i-list_6').hide();
			$(this).find('h3').removeClass('hover_6');
			});
		
			jQuery.ajax({
				type : 'get',
				url : '/loginCheckReturn.action?ip=' + Math.round(Math.random()*10000),
				success : function(resultData) {
					var result = resultData.split('#');
					if (result[0] == '200' && result.length > 2) {
						 jQuery('.btn_title a:eq(0)').attr('class', 'bn_1');
						 jQuery('.btn_title a:eq(1)').attr('class', 'bn_2');
						 jQuery('.btn_title a:eq(2)').attr('class', 'bn_3');
						 jQuery('.btn_title a:eq(0)').attr('href', '/gamelistshow.html');
						 jQuery('.btn_title a:eq(1)').attr('href', '/release.html');
						 jQuery('.btn_title a:eq(2)').attr('href', '/personal.html');
					}
				}
			});
		
		
		
			$("#btn_verityInput_qq").click(function(){
				search();
			});
		});
		
		function search(){
			var txt = $('#txt_verityInput_qq').val();
			var txt_default = document.getElementById('txt_verityInput_qq').defaultValue;
			if (txt == txt_default || jQuery.trim(txt) == '') {
				alert('请输入qq号码');
				return false;
			} else {
				window.open("/tradesafe/safeCenter.action?txt="+txt);
				return false;
			}
		}
		
		//支持回车查询
		function entersearch(){
			var event = window.event || arguments.callee.caller.arguments[0];
	        if (event.keyCode == 13)
	        {
	            search();
	        }
		}