<?php if(!defined('WY_ROOT')) exit; ?>
<link href="includes/libs/boxy.0.1.4/stylesheets/boxy-orange.css" rel="stylesheet" type="text/css" />
<script src="includes/libs/boxy.0.1.4/javascripts/jquery.boxy.js" type="text/javascript"></script>
<style>
.boxy-wrapper{width:550px}
</style>
<div id="pagecontent">
		<div id="banner">
			<img src="tpl/orange/images/banner_01.jpg" />
			<img src="tpl/orange/images/banner_02.jpg" style="display:none" />
			<div id="select_round">
				<a class="round_img"></a>
				<a class="round_img"></a>
			</div>
			<script>
				$(function(){
					var banners=$('#banner img').index();
					//$('#banner img').first().show();
				    if(banners>=0){
						$('#select_round a').first().addClass('round_select');
						var L=$('#banner img').last();
						var F=$('#banner img').first();
						setInterval(function(){
						    if(L.is(':visible')){
							    F.fadeIn();if(banners>0){L.hide();}
								$('#select_round a').removeClass('round_select');
								$('#select_round a').first().addClass('round_select');
							} else {
							    $('#select_round a.round_select').removeClass('round_select').next().addClass('round_select');
								$('#banner img:visible').addClass('round_select');
								$('#banner img.round_select').next().fadeIn();
								$('#banner img.round_select').hide().removeClass('round_select');
							}
						},5000);
					}

					$('#select_round a').each(function(i){
					    $(this).click(function(){
						    $('#select_round a').removeClass('round_select');
							$(this).addClass('round_select');
							$('#banner img').hide();
							$('#banner img').eq(i).fadeIn();
						})
					})
				})
			</script>
        </div>

		<div id="notice">
		    <div class="notice_title">平台公告：</div>
			<div class="notice_list">
					<?php
					$i=0;
					if($news): 
					foreach($news as $key=>$val):
					if($i>=5) break;
					if($val['classid']==4 && $val['is_display_home']):
					?>
					<a href="javascript:void(0)" onclick="Boxy.load('view.htm?id=<?php echo $val['id'] ?>&t=1',{title:'<?php echo $val['title'] ?>'})" style="color:#<?php echo $val['is_color'] ?><?php echo $val['is_bold']!='' ? ';font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>40 ? subString($val['title'],0,40) : $val['title'] ?></a>					
					<?php
					$i++;
					endif;
					endforeach;
					endif;
					?>
			</div>
			<div class="notice_choice"><a href="javascript:void(0)" title="上一条"><</a><a href="javascript:void(0)" title="下一条">></a></div>
			<div class="clear"></div>
			<script>
			    $(function(){
				    var notice_list_num=$('.notice_list a').index();
					if(notice_list_num>=0){
					    $('.notice_list a').first().show();
						var L=$('.notice_list a').last();
						var F=$('.notice_list a').first();

						setInterval(function(){
						    if(L.is(':visible')){
							    F.fadeIn();if(notice_list_num>0){L.hide();}
							} else {
							    $('.notice_list a:visible').addClass('current_notice');
								$('.notice_list a.current_notice').next().fadeIn();
								$('.notice_list a.current_notice').hide().removeClass('current_notice');
							}
						},3000)
					}
					
					$('.notice_choice a').each(function(){
					    $(this).click(function(){
							var notice_list_num=$('.notice_list a').index();
						    var L=$('.notice_list a').last();
						    var F=$('.notice_list a').first();
						    if(L.is(':visible')){
							    F.fadeIn();if(notice_list_num>0){L.hide();}
							} else {
							    $('.notice_list a:visible').addClass('current_notice');
								$('.notice_list a.current_notice').next().fadeIn();
								$('.notice_list a.current_notice').hide().removeClass('current_notice');
							}
						})
					})
				})
			</script>
		</div>

		<div id="index_content">
		    <div class="index_content_left">
			    <p><img src="tpl/orange/images/tel.png" /></p>
				<p><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&Site=<?php echo $this->config['sitename'] ?>&Menu=yes" title="与平台客服联系"><img src="tpl/orange/images/qq.png" /></a></p>
				<p><img src="tpl/orange/images/mobile.png" /></p>
			</div>
			<div class="index_content_center">
			    <div class="news_box">
				    <div class="news_box_title">最新动态</div>
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
					    <li><span><?php echo $val['addtime'] ?></span><a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" style="color:#<?php echo $val['is_color'] ?>;<?php echo $val['is_bold']!='' ? 'font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>18 ? subString($val['title'],0,25) : $val['title'] ?></a><?php echo $days>3 ? '' : '<img src="tpl/orange/images/news.gif" />' ?></li>
						<?php
						$i++;
						endif;
						endforeach;
						endif;
						?>
					</ul>
				</div>

			    <div class="news_box news_box_top">
				    <div class="news_box_title">商家百科</div>
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
					    <li><span><?php echo $val['addtime'] ?></span><a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" style="color:#<?php echo $val['is_color'] ?>;<?php echo $val['is_bold']!='' ? 'font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>18 ? subString($val['title'],0,25) : $val['title'] ?></a><?php echo $days>3 ? '' : '<img src="tpl/orange/images/news.gif" />' ?></li>
						<?php
						$i++;
						endif;
						endforeach;
						endif;
						?>
					</ul>
				</div>
			</div>
			<div class="index_content_right">
			    <div class="login_box">
				    <div class="login_box_title">商户登陆</div>
					<div class="login_box_content">
					    <form name="login" action="userlogin.htm" method="post">
						    <p class="login_text">商户账号</p>
							<p><input type="text" name="username" class="login_input" /></p>
						    <p class="login_text">登录密码<a href="retpwd.htm" tabindex="999" style="margin-left:85px;font-size:12px;color:#ff6c00">忘记密码？</a></p>
							<p><input type="password" name="password" class="login_input" /></p>
						    <p class="login_text">验证码</p>
							<p><input type="text" name="chkcode" maxlength="5" class="login_input chkcode" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absbottom" title="点击刷新验证码" /></p>
							<p class="btn">
							<input type="submit" class="btn_1" value="" />&nbsp;&nbsp;
							<input type="button" class="btn_2" onclick="javascript:window.location.href='register.htm';" value="" />
							</p>
						</form>
					</div>
					<p style="text-align:center;margin-top:10px"><img src="tpl/orange/images/api_login.jpg" /></p>
				    <p style="text-align:center;margin-top:8px"><a href="apps/WeiboSDK"><img src="tpl/orange/images/weibo_btn.png" title="用微博账号登陆" /></a></p>
				    <p style="text-align:center;margin-top:8px"><a href="apps/Connect2.0"><img src="tpl/orange/images/qq_btn.png" title="用QQ账号登陆" /></a></p>
				</div>
			</div>
			<div style="clear:left"></div>
		</div>

		<div id="partner">
		    <div class="partner_title">合作伙伴</div>
			<div class="partner_list">
				<a><img src="tpl/orange/images/hb1.gif" /></a>
				<a><img src="tpl/orange/images/hb2.gif" /></a>
				<a><img src="tpl/orange/images/hb3.gif" /></a>
				<a><img src="tpl/orange/images/hb4.gif" /></a>
				<a><img src="tpl/orange/images/hb5.gif" /></a>
				<a><img src="tpl/orange/images/hb6.gif" /></a>
				<a><img src="tpl/orange/images/hb7.gif" /></a>
				<a><img src="tpl/orange/images/hb8.gif" /></a>
				<a><img src="tpl/orange/images/hb9.gif" /></a>
				<a><img src="tpl/orange/images/hb10.gif" /></a>
				<a><img src="tpl/orange/images/hb11.gif" /></a>
				<a><img src="tpl/orange/images/hb12.gif" /></a>
				<a><img src="tpl/orange/images/hb13.gif" /></a>
				<a><img src="tpl/orange/images/hb14.gif" /></a>
				<a><img src="tpl/orange/images/hb15.gif" /></a>
				<a><img src="tpl/orange/images/hb16.gif" /></a>
				<a><img src="tpl/orange/images/hb17.gif" /></a>
				<a><img src="tpl/orange/images/hb18.gif" /></a>
			</div>
		</div>
</div>
