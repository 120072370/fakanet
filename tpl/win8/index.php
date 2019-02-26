<?php if(!defined('WY_ROOT')) exit; ?>

<!--/header end-->
<link href="/includes/libs/boxy.0.1.4/stylesheets/boxy-blk.css" rel="stylesheet" type="text/css" />
<script src="/includes/libs/boxy.0.1.4/javascripts/jquery.boxy1.js" type="text/javascript"></script>

  <div class="banner">
	<!-- passport 登录 -->
	<div class="w-980 login-area pr">
		<div class="login-box pa">
			<h2 class="hidden"></h2>
			<ul class="login-tab">
				<li class="tab-item tab-item-left tab-selected">
					<a href="#" onclick="return false;" hidefocus="true">用户登录</a>
				</li>
				<li class="login-nav-separate">
					<span>&nbsp;&nbsp;</span>
				</li>
				<li class="tab-item tab-item-right">
					<a href="#" onclick="return false;" hidefocus="true"></a>
				</li>
			</ul>
			<div id="bp_pass_login_form" class="tang-pass-login">
			<form name="login" method="post" action="userlogin.htm">
			<p class="pass-generalErrorWrapper">
				<span class="pass-generalError pass-generalError-error"></span>
			</p>
			<p class="pass-form-item pass-form-item-password">
				<label class="pass-label">账号</label>
				<input class="pass-text-input pass-text-input-userName pass-username" type="text" name="username" maxlength="20" value="输入登陆账号" onfocus="if (value =='输入登陆账号'){value =''}" onblur="if (value ==''){value='输入登陆账号'}" />
			</p>
			<p class="pass-form-item pass-form-item-password">
				<label class="pass-label">密码</label>
				<input class="pass-text-input pass-text-input-password" type="password" name="password" maxlength="20" />
			</p>
			<p class="pass-form-item pass-form-item-password">
				<label class="pass-label">验证码</label>
			</p>
			<p class="pass-form-item pass-form-item-password">
				<input class="pass-verifyCode" type="text" name="chkcode" maxlength="5" value="输入验证码" onfocus="if (value =='输入验证码'){value =''}" onblur="if (value ==''){value='输入验证码'}" />
				<img class="pass-change-verifyCode" onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="/includes/libs/chkcode.htm" style="border:0px solid #bcbcbc" align="absmiddle" title="点击刷新验证码" />
			</p>	
			<p class="pass-form-item pass-form-item-submit"><input class="pass-button pass-button-submit" value="登录" type="submit"></p>
			  </form>
			</div>
			<div class="login-box-bottom">
				<a href="register.htm" class="register">注册账号</a>
				<a href="retpwd.htm" class="f-pass">忘记密码？</a>
			</div>
		</div>
	</div>
	<!-- end of passport 登录 -->

	<ul id="slider" class="pr">
	<li>
		<div class="slider-bg current" style="background-image:url(/tpl/win8/common/images/banner-pic-1.jpg);">
		</div>
	</li>
	<li>
		<div class="slider-bg" style="background-image:url(/tpl/win8/common/images/banner-pic-2.jpg);">
		</div>
	</li>
	<li>
		<div class="slider-bg" style="background-image: url(/tpl/win8/common/images/banner-pic-3.jpg);">
		</div>
	</li>
	<li>
		<div class="slider-bg" style="background-image:url(/tpl/win8/common/images/banner-pic-4.jpg);">
		</div>
	</li>
</ul>
<div id="slider-number-box">
		<a class="active" href="./"></a>&nbsp;<a href="#"></a>&nbsp;<a href="#"></a>&nbsp;<a href="##"></a></div>
</div>
  <div class="demopage">
  <div class="demopage">
    <div id="s3" class="scrollDiv">
      <div class="ggtitle">最新动态</div>
      <div class="gglist">
        <ul style="margin-top: 0px;">
        </ul>
      </div>
      <div class="shangxia"><span id="btn1" class="ggshang"><img src="\tpl\win8\common\images\zuo.gif" /></span><span id="btn2" class="ggxia"><img src="\tpl\win8\common\images\you.gif" /></span> </div>
      <div class="fenxiang">
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_b" style="line-height: 12px;"> <img src="http://bdimg.share.baidu.com/static/images/type-button-1.jpg?cdnversion=20120831" /> <a class="shareCount"></a> </div>
        <script type="text/javascript" id="bdshare_js" data="type=button&amp;uid=0" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
  </script>
        <!-- Baidu Button END -->
      </div>
    </div>
    <script type="text/javascript">
	(function($){
		$.fn.extend({
			Scroll:function(opt,callback){
					//参数初始化
					if(!opt) var opt={};
					var _btnUp = $("#"+ opt.up);//Shawphy:向上按钮
					var _btnDown = $("#"+ opt.down);//Shawphy:向下按钮
					var timerID;
					var _this=this.eq(0).find("ul:first");
					var     lineH=_this.find("li:first").height(), //获取行高
							line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,10), //每次滚动的行数，默认为一屏，即父容器高度
							speed=opt.speed?parseInt(opt.speed,10):500; //卷动速度，数值越大，速度越慢（毫秒）
							timer=opt.timer //?parseInt(opt.timer,10):3000; //滚动的时间间隔（毫秒）
					if(line==0) line=1;
					var upHeight=0-line*lineH;
					//滚动函数
					var scrollUp=function(){
							_btnUp.unbind("click",scrollUp); //Shawphy:取消向上按钮的函数绑定
							_this.animate({
									marginTop:upHeight
							},speed,function(){
									for(i=1;i<=line;i++){
											_this.find("li:first").appendTo(_this);
									}
									_this.css({marginTop:0});
									_btnUp.bind("click",scrollUp); //Shawphy:绑定向上按钮的点击事件
							});
	
					}
					//Shawphy:向下翻页函数
					var scrollDown=function(){
							_btnDown.unbind("click",scrollDown);
							for(i=1;i<=line;i++){
									_this.find("li:last").show().prependTo(_this);
							}
							_this.css({marginTop:upHeight});
							_this.animate({
									marginTop:0
							},speed,function(){
									_btnDown.bind("click",scrollDown);
							});
					}
				   //Shawphy:自动播放
					var autoPlay = function(){
							if(timer)timerID = window.setInterval(scrollUp,timer);
					};
					var autoStop = function(){
							if(timer)window.clearInterval(timerID);
					};
					 //鼠标事件绑定
					_this.hover(autoStop,autoPlay).mouseout();
					_btnUp.css("cursor","pointer").click( scrollUp ).hover(autoStop,autoPlay);//Shawphy:向上向下鼠标事件绑定
					_btnDown.css("cursor","pointer").click( scrollDown ).hover(autoStop,autoPlay);
	
			}      
		})
	})(jQuery);
	
	$(document).ready(function(){
		$("#s3").Scroll({line:4,speed:500,timer:3000,up:"btn1",down:"btn2"});
	});
	</script>
  </div>
  <div class="lary_2">
    <div class="news">
      <h2>最近动态<a href="news.htm">更多&gt;&gt;</a></h2>
      <ul>
        
        <?php 
						if($news): 
						$i=1;
						foreach($news as $key=>$val):
						if($i>6) break;
						if($val['classid']==1 && $val['is_display_home']):
						$addtime=strtotime($val['addtime']);
						$now=strtotime(date('Y-m-d H:i:s'));
						$days=ceil(($now-$addtime)/86400);
						?>
        <li><span><?php echo $val['addtime'] ?></span><a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" style="color:#<?php echo $val['is_color'] ?>;<?php echo $val['is_bold']!='' ? 'font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>18 ? subString($val['title'],0,25) : $val['title'] ?></a><?php echo $days>3 ? '' : '<img src="/tpl/win8/common/images/news.gif" />' ?></li>
        <?php
						$i++;
						endif;
						endforeach;
						endif;
						?>
      </ul>
      <div class="dibg"></div>
    </div>
    <div class="jiesuan">
      <h2>商家百科<a href="./">更多&gt;&gt;</a></h2>
      <ul>
        <?php 
						if($news): 
						$i=1;
						foreach($news as $key=>$val):
						if($i>6) break;
						if($val['classid']==3 && $val['is_display_home']):
						$addtime=strtotime($val['addtime']);
						$now=strtotime(date('Y-m-d H:i:s'));
						$days=ceil(($now-$addtime)/86400);
						?>
        <li><span><?php echo $val['addtime'] ?></span><a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" style="color:#<?php echo $val['is_color'] ?>;<?php echo $val['is_bold']!='' ? 'font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>18 ? subString($val['title'],0,25) : $val['title'] ?></a><?php echo $days>3 ? '' : '<img src="/tpl/win8/common/images/news.gif" />' ?></li>
        <?php
						$i++;
						endif;
						endforeach;
						endif;
						?>
      </ul>
      <div class="jsdibg"></div>
    </div>
    <div class="lianxi">
      <h2><span>联系方式</span></h2>
      <div class="lxnr"> <a href="tencent://message/?uin=<?php echo $this->config['qq'] ?>" target="_blank" title="企业53KF在线"><img src="/tpl/win8/common/images/qiyeQQ.jpg" border="0" /></a><a href="tencent://message/?uin=351075088" target="_blank" title="企业53KF在线"></a> </div>
    </div>
  </div>
  <p>
    <script type="text/javascript">

$(function(){
   $('.boxy').boxy();
})
  </script></p>
  <div class="hzhb">
    <h2><span>合作伙伴</span></h2>
    <ul>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb1.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb2.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb3.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb4.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb5.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb6.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb7.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb8.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb9.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb10.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb11.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb12.gif" /></a></li>
      <li><a href="http://www.a8tg.com"><img src="/tpl/win8/images/hb13.gif" /></a></li>
    </ul>
  </div>
  <p>&nbsp;</p>
  