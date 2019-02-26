<?php if(!defined('WY_ROOT')) exit; ?>
<link href="includes/libs/boxy.0.1.4/stylesheets/boxy-blue.css" rel="stylesheet" type="text/css" />
<script src="includes/libs/boxy.0.1.4/javascripts/jquery.boxy.js" type="text/javascript"></script>
<style>
.boxy-wrapper{width:550px}
</style>
    <div id="index_main">
	    <div id="index_main_left">
		    <div id="logins">
			    <div id="login_title">商户登陆</div>
				<ul id="login_info">
				<form name="login" method="post" action="userlogin.htm">
				    <li class="l_i_t">商户账号</li>
					<li class="l_i_f"><input type="text" name="username" maxlength="20" /></li>
				    <li class="l_i_t">登陆密码<a tabindex="999" href="retpwd.htm">找回密码</a></li>
					<li class="l_i_f"><input type="password" name="password" maxlength="20" /></li>
				    <li class="l_i_t">验证码</li>
					<li class="l_i_f"><input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码" /></li>
					<li class="button"><input type="submit" class="login_submit" value="" /> <input type="button" onclick="javascript:location.href='register.htm'" class="login_register" /></li>
				</form>
				</ul>
			</div>

			<div id="service_qq">
			    <ul id="qq_list">
				    <li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&Site=<?php echo $this->config['sitename'] ?>&Menu=yes" title="点击直接QQ会话">支付问题</a></li>
					<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&Site=<?php echo $this->config['sitename'] ?>&Menu=yes" title="点击直接QQ会话">商户加盟</a></li>
					<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&Site=<?php echo $this->config['sitename'] ?>&Menu=yes" title="点击直接QQ会话">投诉反馈</a></li>
				</ul>
			</div>
        </div>
		<div id="index_main_center">
		    <div class="banner"></div>
			<div class="notice">
			    <table>
				<tr>
				<td width="28" style="padding-left:12px;" height="30"><img src="tpl/skyblue/images/notice.png" /></td>
				<td><div id="notice_list">
					<?php
					$i=0;
					if($news): 
					foreach($news as $key=>$val):
					if($i>=5) break;
					if($val['classid']==4 && $val['is_display_home']):
					?>
					<a href="javascript:void(0)" onclick="Boxy.load('view.htm?id=<?php echo $val['id'] ?>&t=1',{title:'<?php echo $val['title'] ?>'})" style="color:#<?php echo $val['is_color'] ?><?php echo $val['is_bold']!='' ? ';font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>20 ? subString($val['title'],0,20) : $val['title'] ?></a>					
					<?php
					$i++;
					endif;
					endforeach;
					endif;
					?>
				</div></td>
				<td width="60">
				<div id="notice_link">
				<?php
				if($i):
				for($t=0;$t<$i;$t++):
                ?>
				<a href="javascript:void(0)">&#8226;</a>
				<?php
				endfor;
				endif;
				?>
				</div></td>
				</tr>
				</table>
			</div>
			
			<script>				
				$(function(){
					var cn=$('#notice_list a').index();
				    if(cn>=0){
					    $('#notice_list a').first().show();
						$('#notice_link a').first().addClass('current');
						var L=$('#notice_list a').last();
						var F=$('#notice_list a').first();
						setInterval(function(){
						    if(L.is(':visible')){
							    F.fadeIn();if(cn>0){L.hide();}
								$('#notice_link a').removeClass('current');
								$('#notice_link a').first().addClass('current');
							} else {
							    $('#notice_link a.current').removeClass('current').next().addClass('current');
								$('#notice_list a:visible').addClass('current');
								$('#notice_list a.current').next().fadeIn();
								$('#notice_list a.current').hide().removeClass('current');
							}
						},3000);
					}

					$('#notice_link a').each(function(i){
					    $(this).click(function(){
						    $('#notice_link a').removeClass('current');
							$(this).addClass('current');
							$('#notice_list a').hide();
							$('#notice_list a').eq(i).fadeIn();
						})
					})
				})
             </script>
		</div>
		<div id="index_main_right">
		    <div class="contact_tel"></div>
			<div class="news_box">
			    <div class="box_title">最新动态</div>
				<ul>
				<?php 
				if($news): 
				$i=1;
				foreach($news as $key=>$val):
				if($i>5) break;
				if($val['classid']==1 && $val['is_display_home']):
				$addtime=strtotime($val['addtime']);
				$now=strtotime(date('Y-m-d H:i:s'));
				$days=ceil(($now-$addtime)/86400);
				?>
				    <li><a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" style="color:#<?php echo $val['is_color'] ?>;<?php echo $val['is_bold']!='' ? 'font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>15 ? subString($val['title'],0,14) : $val['title'] ?></a><?php echo $days>3 ? '' : '<img src="tpl/skyblue/images/news.gif" />' ?></li>
				<?php
				$i++;
				endif;
				endforeach;
				endif;
				?>
				</ul>
			</div>

			<div class="news_box">
			    <div class="box_title">商家百科</div>
				<ul>
				<?php 
				if($news): 
				$i=1;
				foreach($news as $key=>$val):
				if($i>5) break;
				if($val['classid']==3 && $val['is_display_home']):
				$addtime=strtotime($val['addtime']);
				$now=strtotime(date('Y-m-d H:i:s'));
				$days=ceil(($now-$addtime)/86400);
				?>
				    <li><a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" style="color:#<?php echo $val['is_color'] ?>;<?php echo $val['is_bold']!='' ? 'font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>15 ? subString($val['title'],0,14) : $val['title'] ?></a><?php echo $days>3 ? '' : '<img src="tpl/skyblue/images/news.gif" />' ?></li>
				<?php
				$i++;
				endif;
				endforeach;
				endif;
				?>
				</ul>
			</div>
		</div>
		<div style="clear:left"></div>
	</div>

	<div id="partner">
		<div class="partner_title">合作伙伴</div>
		<div class="partner_list">
		<a ><img src="tpl/skyblue/images/hb1.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb2.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb3.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb4.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb5.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb6.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb7.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb8.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb9.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb10.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb11.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb12.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb13.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb14.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb15.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb16.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb17.gif" /></a>
		<a ><img src="tpl/skyblue/images/hb18.gif" /></a>
		</div>
	</div>
